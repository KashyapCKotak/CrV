// globalCryptoValue = "BTC";
// globalFiatValue = "USD";
// Accepts a url and a callback function to run.
var arbitrage = [];

var openINRAjaxes=0;
// var mktSubs=[];

function requestCrossDomain(site) {
 
    // If no url was passed, exit.
    if (!site) {
        alert('No site was passed.');
        return false;
    }
 
    // Take the provided url, and add it to a YQL query. Make sure you encode it!
    var yql = 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + site + '"') + '&format=json&callback=?';
 
    // Request that YSQL string, and run a callback function.
    // Pass a defined function to prevent cache-busting.
    $.getJSON(yql, cbFunc);
 
    function cbFunc(data) {
        // If we have something to work with...
        if (data.query.results) {
            console.log("It Worked !!!!!!!!!!!!!!!!!!!!!!");
            console.log(data);
        }
        // Else, Maybe we requested a site that doesn't exist, and nothing returned.
        else throw new Error('Nothing returned from getJSON.');
    }
}

function afterINRAjax(){
    console.log("All ajaxes Done");
}

//requestCrossDomain("https://www.unocoin.com/trade?all");
function updateMarketsDataTblINR(){
    var highestS = 0;
    var highestSElement = "";
    var lowestB = 9999999.99;
    var lowestBElement = "";
    arbitrage = [];
    ////////////////////////// Zebpay ///////////////////////////////////////////
    var xhhtpMktblZebpay = new XMLHttpRequest(); //TODO: add support for IE
    openINRAjaxes++;
    xhhtpMktblZebpay.onreadystatechange = function() {
        if (xhhtpMktblZebpay.readyState == 4 && xhhtpMktblZebpay.status == 200) {
            var zebpaydata = JSON.parse(this.responseText);
            var Zebpayb=parseFloat(zebpaydata.buy).toFixed(2);
            var Zebpays=parseFloat(zebpaydata.sell).toFixed(2);
            document.getElementById("Zebpayb").innerHTML=Zebpayb;
            document.getElementById("Zebpays").innerHTML=Zebpays;
            if(Zebpayb < lowestB){
                lowestB = Zebpayb;
                lowestBElement = "Zebpayb";
            }
            if(Zebpays > highestS){
                highestS = Zebpays;
                highestSElement = "Zebpays";
            }
            arbitrage.push({
                n: "Zebpay",
                b: parseFloat(zebpaydata.buy).toFixed(2),
                s: parseFloat(zebpaydata.sell).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblZebpay.open("GET", "https://live.zebapi.com/api/v1/ticker?currencyCode=inr", true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
    xhhtpMktblZebpay.send();
    ////////////////////////// Koinex ///////////////////////////////////////////
    var xhhtpMktblKoinex = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblKoinex.onreadystatechange = function() {
        if (xhhtpMktblKoinex.readyState == 4 && xhhtpMktblKoinex.status == 200) {
            var KoinexData = JSON.parse(this.responseText);
            var Koinexb=parseFloat(KoinexData.stats.BTC.lowest_ask).toFixed(2);
            var Koinexs=parseFloat(KoinexData.stats.BTC.highest_bid).toFixed(2);
            document.getElementById("Koinexb").innerHTML=Koinexb;
            document.getElementById("Koinexs").innerHTML=Koinexs;
            if(Koinexb < lowestB){
                lowestB = Koinexb;
                lowestBElement = "Koinexb";
            }
            if(Koinexs > highestS){
                highestS = Koinexs;
                highestSElement = "Koinexs";
            }
            arbitrage.push({
                n: "Koinex",
                b: parseFloat(KoinexData.stats.BTC.lowest_ask).toFixed(2),
                s: parseFloat(KoinexData.stats.BTC.highest_bid).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblKoinex.open("GET", "https://koinex.in/api/ticker", true);//https://koinex.in/api/ticker
    xhhtpMktblKoinex.send();
    ////////////////////////// Unocoin ///////////////////////////////////////////
    var xhhtpMktblUnocoin = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblUnocoin.onreadystatechange = function() {
        if (xhhtpMktblUnocoin.readyState == 4 && xhhtpMktblUnocoin.status == 200) {
            var UnocoinData = JSON.parse(this.responseText);
            var Unocoinb=parseFloat(UnocoinData.query.results.json.buy).toFixed(2);
            var Unocoins=parseFloat(UnocoinData.query.results.json.sell).toFixed(2);
            document.getElementById("Unocoinb").innerHTML=Unocoinb;
            document.getElementById("Unocoins").innerHTML=Unocoins;
            if(Unocoinb < lowestB){
                lowestB = Unocoinb;
                lowestBElement = "Unocoinb";
            }
            if(Unocoins > highestS){
                highestS = Unocoins;
                highestSElement = "Unocoins";
            }
            arbitrage.push({
                n: "Unocoin",
                b: parseFloat(UnocoinData.query.results.json.buy).toFixed(2),
                s: parseFloat(UnocoinData.query.results.json.sell).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };

    xhhtpMktblUnocoin.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.unocoin.com/trade?all' + '"') + '&format=json', true);
    xhhtpMktblUnocoin.send();
    ////////////////////////// Pocketbits ///////////////////////////////////////////
    var xhhtpMktblPocketbits = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblPocketbits.onreadystatechange = function() {
        if (xhhtpMktblPocketbits.readyState == 4 && xhhtpMktblPocketbits.status == 200) {
            var PocketbitsData = JSON.parse(this.responseText);
            var Pocketbitsb=parseFloat(PocketbitsData.query.results.json.buy).toFixed(2);
            var Pocketbitss=parseFloat(PocketbitsData.query.results.json.sell).toFixed(2);
            document.getElementById("Pocketbitsb").innerHTML=Pocketbitsb;
            document.getElementById("Pocketbitss").innerHTML=Pocketbitss;
            if(Pocketbitsb < lowestB){
                lowestB = Pocketbitsb;
                lowestBElement = "Pocketbitsb";
            }
            if(Pocketbitss > highestS){
                highestS = Pocketbitss;
                highestSElement = "Pocketbitss";
            }
            arbitrage.push({
                n: "Pocketbits",
                b: parseFloat(PocketbitsData.query.results.json.buy).toFixed(2),
                s: parseFloat(PocketbitsData.query.results.json.sell).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };

    xhhtpMktblPocketbits.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://pocketbits.in/api/ticker' + '"') + '&format=json', true);
    xhhtpMktblPocketbits.send();
    ////////////////////////// Coinsecure ///////////////////////////////////////////
    var xhhtpMktblCoinsecure = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblCoinsecure.onreadystatechange = function() {
        if (xhhtpMktblCoinsecure.readyState == 4 && xhhtpMktblCoinsecure.status == 200) {
            var CoinsecureData = JSON.parse(this.responseText);
            var Coinsecureb=parseFloat(CoinsecureData.query.results.json.message.ask/100).toFixed(2);
            var Coinsecures=parseFloat(CoinsecureData.query.results.json.message.bid/100).toFixed(2);
            document.getElementById("Coinsecureb").innerHTML=Coinsecureb;
            document.getElementById("Coinsecures").innerHTML=Coinsecures;
            if(Coinsecureb < lowestB){
                lowestB = Coinsecureb;
                lowestBElement = "Coinsecureb";
            }
            if(Coinsecures > highestS){
                highestS = Coinsecures;
                highestSElement = "Coinsecures";
            }
            arbitrage.push({
                n: "Coinsecure",
                b: parseFloat(CoinsecureData.query.results.json.message.ask/100).toFixed(2),
                s: parseFloat(CoinsecureData.query.results.json.message.bid/100).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblCoinsecure.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://api.coinsecure.in/v1/exchange/ticker' + '"') + '&format=json', true);
    xhhtpMktblCoinsecure.send();
    ////////////////////////// Paxful ///////////////////////////////////////////
    ////////////////////////// Coindelta ////////////////////////////////////////
    var xhhtpMktblCoindelta = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblCoindelta.onreadystatechange = function() {
        if (xhhtpMktblCoindelta.readyState == 4 && xhhtpMktblCoindelta.status == 200) {
            var Coindeltadata = JSON.parse(this.responseText);
            var Coindeltab=parseFloat(Coindeltadata[0].Ask).toFixed(2);
            var Coindeltas=parseFloat(Coindeltadata[0].Bid).toFixed(2);
            document.getElementById("Coindeltab").innerHTML=Coindeltab;
            document.getElementById("Coindeltas").innerHTML=Coindeltas;
            if(Coindeltab < lowestB){
                lowestB = Coindeltab;
                lowestBElement = "Coindeltab";
            }
            if(Coindeltas > highestS){
                highestS = Coindeltas;
                highestSElement = "Coindeltas";
            }
            arbitrage.push({
                n: "Coindelta",
                b: parseFloat(Coindeltadata[0].Ask).toFixed(2),
                s: parseFloat(Coindeltadata[0].Bid).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblCoindelta.open("GET", "https://coindelta.com/api/v1/public/getticker/", true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
    xhhtpMktblCoindelta.send();
    ////////////////////////// Coinome ///////////////////////////////////////////
    var xhhtpMktblCoinome = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblCoinome.onreadystatechange = function() {
        if (xhhtpMktblCoinome.readyState == 4 && xhhtpMktblCoinome.status == 200) {
            var Coinomedata = JSON.parse(this.responseText);
            var Coinomeb=parseFloat(Coinomedata.query.results.json['btc-inr']['lowest_ask']).toFixed(2);
            var Coinomes=parseFloat(Coinomedata.query.results.json['btc-inr']['highest_bid']).toFixed(2);
            document.getElementById("Coinomeb").innerHTML=Coinomeb;
            document.getElementById("Coinomes").innerHTML=Coinomes;
            if(Coinomeb < lowestB){
                lowestB = Coinomeb;
                lowestBElement = "Coinomeb";
            }
            if(Coinomes > highestS){
                highestS = Coinomes;
                highestSElement = "Coinomes";
            }
            arbitrage.push({
                n: "Coinome",
                b: parseFloat(Coinomedata.query.results.json['btc-inr']['lowest_ask']).toFixed(2),
                s: parseFloat(Coinomedata.query.results.json['btc-inr']['highest_bid']).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblCoinome.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.coinome.com/api/v1/ticker.json' + '"') + '&format=json', true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
    xhhtpMktblCoinome.send();
    ////////////////////////// Buyucoin ///////////////////////////////////////////
    var xhhtpMktblBuyucoin = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblBuyucoin.onreadystatechange = function() {
        if (xhhtpMktblBuyucoin.readyState == 4 && xhhtpMktblBuyucoin.status == 200) {
            var Buyucoindata = JSON.parse(this.responseText);
            var Buyucoinb=parseFloat(Buyucoindata.query.results.json.BuyUcoin_data.btc_buy_price).toFixed(2);
            var Buyucoins=parseFloat(Buyucoindata.query.results.json.BuyUcoin_data.btc_sell_price).toFixed(2);
            document.getElementById("Buyucoinb").innerHTML=Buyucoinb;
            document.getElementById("Buyucoins").innerHTML=Buyucoins;
            if(Buyucoinb < lowestB){
                lowestB = Buyucoinb;
                lowestBElement = "Buyucoinb";
            }
            if(Buyucoins > highestS){
                highestS = Buyucoins;
                highestSElement = "Buyucoins";
            }
            arbitrage.push({
                n: "Buyucoin",
                b: parseFloat(Buyucoindata.query.results.json.BuyUcoin_data.btc_buy_price).toFixed(2),
                s: parseFloat(Buyucoindata.query.results.json.BuyUcoin_data.btc_sell_price).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblBuyucoin.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.buyucoin.com/api/v1/btc/' + '"') + '&format=json', true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
    xhhtpMktblBuyucoin.send();
    ////////////////////////// LocalBitcoins ///////////////////////////////////////////
    var xhhtpMktblLocalBitcoins = new XMLHttpRequest(); //TODO: add support for IE
    xhhtpMktblLocalBitcoins.onreadystatechange = function() {
        if (xhhtpMktblLocalBitcoins.readyState == 4 && xhhtpMktblLocalBitcoins.status == 200) {
            var LocalBitcoinsData = JSON.parse(this.responseText);
            var LocalBitcoinsb=parseFloat(LocalBitcoinsData.query.results.json.asks[0].json[0]).toFixed(2);
            var LocalBitcoinss=parseFloat(LocalBitcoinsData.query.results.json.bids[0].json[0]).toFixed(2);
            document.getElementById("LocalBitcoinsb").innerHTML=LocalBitcoinsb;
            document.getElementById("LocalBitcoinss").innerHTML=LocalBitcoinss;
            if(LocalBitcoinsb < lowestB){
                lowestB = LocalBitcoinsb;
                lowestBElement = "LocalBitcoinsb";
            }
            if(LocalBitcoinss > highestS){
                highestS = LocalBitcoinss;
                highestSElement = "LocalBitcoinss";
            }
            arbitrage.push({
                n: "LocalBitcoins",
                b: parseFloat(LocalBitcoinsData.query.results.json.asks[0].json[0]).toFixed(2),
                s: parseFloat(LocalBitcoinsData.query.results.json.bids[0].json[0]).toFixed(2)
            });
            openINRAjaxes--;
            if(openINRAjaxes==0){
                afterINRAjax();
            }
        }
    };
    xhhtpMktblLocalBitcoins.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://localbitcoins.com/bitcoincharts/INR/orderbook.json' + '"') + '&format=json', true);
    xhhtpMktblLocalBitcoins.send();

    console.log("lowestB: "+lowestB);
    console.log("highestS: "+highestS);
}
//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////

function calcArbitrage(){

}

//////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////
var SYMBOLS = {
    'BTC': 'Ƀ',
    'LTC': 'Ł',
    'DAO': 'Ð',
    'USD': '$',
    'CNY': '¥',
    'EUR': '€',
    'GBP': '£',
    'JPY': '¥',
    'PLN': 'zł',
    'RUB': '₽',
    'ETH': 'Ξ',
    'GOLD': 'Gold g',
    'INR': '₹',
    'BRL': 'R$'
  };
    currFSymb=SYMBOLS[globalFiatValue] || globalFiatValue;
    currCSymb=SYMBOLS[globalCryptoValue] || globalCryptoValue;
/**
 * marketDet={marketName:[url nos,urls,paths buy/sell/vol crypto/vol fiat/last price crypto/last price fiat/change%/open or yesterday's price,crypto small case,fiat small case]}
 * prices={marketb:market last buy price,markets:market last sell price}
 * aliases={search for aliases and repeat the finding process}
 * pairMark={paris:markes array}
 */
var prices={"zebpayb":0,"zebpays":0,"koinexb":0,"koinexs":0,"unocoinb":0,"unocoins":0}; 
var markDet={"zebpay":[1,"https://www.zebapi.com/api/v1/market/ticker-new/(crypto)/(fiat)","buy/?/volume/?/?/?/pricechange/?",false,false], // [url Numbers, urls, buy/sell/vol to/vol from/ ]
            "koinex":[1,"https://koinex.in/api/ticker","stats:fiat:crypto:lowest_ask/?/vol_24hrs/trade_volume/?/last_traded_price/per_change/?",false,true],
            "unocoin":[1,"https://api.unocoin.com/api/trades/btc/buy","buying_price/?/?/?/?/?/?/?",false,false],
            "coindelta":[1,"https://api.coindelta.com/api/v1/public/getticker/","{(MarketName)=(crypto-fiat)}:Ask/?/?/?/?/Last/?/?",true,true],
            "buyucoin":[1,"http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20json%20where%20url%3D%22https%3A%2F%2Fwww.buyucoin.com%2Fapi%2Fv1.2%2Fcurrency%2Fmarkets%22&format=json","query:results:json:data:crypto_fiat:ask/?/vol/?/?/last_trade/change/?",true,true],
            "bitbns":[1,"http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20json%20where%20url%3D%22https%3A%2F%2Fbitbns.com%2Forder%2FgetTickerWithVolume%2F%22&format=json","query:results:json:crypto:highest_buy_bid/?/volume|volume/volume|rate/?/last_traded_price/?/yes_price",false,false],
            "unodax":[1,"https://api.unocoin.com/api/exchange/unodax-ticker","stats:fiat:crypto:last_traded_price/?/vol_24hrs/?/?/last_traded_price/per_change/?",false,true],
            "wazirx":[1,"http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20json%20where%20url%3D%22https%3A%2F%2Fapi.wazirx.com%2Fapi%2Fv2%2Ftickers%22","query:results:json:cryptofiat:buy/?/volume/?/?/last/?/open",true,true],
            "cxihub":[1,"https://api.cxihub.com/market/v1/ticker","data:{(market)=(fiat/crypto)}:buy/?/volume/?/?/?/changePercent/?",true,true],
            "coindcx":[1,"https://api.coindcx.com/exchange/ticker","{(market)=(cryptofiat)}:bid/?/?/?/?/last_price/change_24_hour/?",false,false]
            //usd/bch
            };
            
var aliases={"BTC":"bitcoin","ETH":"ether"};
var pairMark={"BTC/INR":["zebpay","koinex","unocoin","coindelta",/*"buyucoin","bitbns",*/"unodax",/*"wazirx",*/"cxihub"],
            "ETH/BTC":["coindcx"]};

// dispArray=[];
function getData(mark,crypto,fiat,sign){
    console.log(crypto+"/"+fiat+":"+mark);
    let URLnos=markDet[mark][0];
    let markLength=markDet[mark].length;
    let paths=(URLnos==1) ? [markDet[mark][1+URLnos]] : (URLnos==2) ? [markDet[mark][1+URLnos],markDet[mark][2+URLnos]] : "error";
    let newFiat=fiat;
    let newCrypto=crypto;
    if(markDet[mark][markLength-1]){
        newFiat=fiat.toLowerCase();
    }
    if(markDet[mark][markLength-2]){
        newCrypto=crypto.toLowerCase();
    }
    // if(markDet[mark][markLength-3].length>0){
    //     newFiat=markDet[mark][markLength-2][fiat];
    // }
    // if(markDet[mark][markLength-4].length>0){
    //     newCrypto=markDet[mark][markLength-2][crypto];
    // }
    // console.log(paths);
    for(let i=1;i<=URLnos;i++){
        paths[i-1]=paths[i-1].replace(/crypto/g,newCrypto);
        paths[i-1]=paths[i-1].replace(/fiat/g,newFiat);
        let marketUrl=markDet[mark][i].replace(/\(crypto\)/g,newCrypto);
        marketUrl=marketUrl.replace(/\(fiat\)/g,newFiat);
        let xhttpMarket = new XMLHttpRequest();
        xhttpMarket.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                let percent="NA";
                let currObj=null;
                try{
                currObj=JSON.parse(this.responseText);
                } catch(e){
                    console.log("Error");
                    console.log(this.responseText);
                }
                let currPath=paths[i-1].split(":");
                let buy=0; let sell=0;
                console.log(currPath);
                let gotPath=true;
                for(let j=0;j<currPath.length-1;j++){
                    if(currPath[j].indexOf('{')!=-1){
                        gotPath=false;
                        console.log(currObj);
                        let subPath=currPath[j].substr(1,currPath[j].indexOf('}')-1);
                        subPath=subPath.split('=');
                        var where=subPath[0].substr(1,subPath[0].indexOf(')')-1);
                        var value=subPath[1].substr(1,subPath[1].indexOf(')')-1);
                        for(object in currObj){
                            if(currObj[object][where]==value){
                                currObj=currObj[object];
                                gotPath=true;
                                break;
                            }
                        }
                        if(gotPath)
                            continue;
                    }
                    currObj=currObj[currPath[j]];
                }
                if(gotPath){
                    // console.log(currPath[currPath.length-1].split("/")[0]);
                    // console.log(currPath[currPath.length-1].split("/")[1]);
                    displayVals[mark+"flg"]=0;displayVals[mark+"b"]=currFSymb+""+0;
                    displayVals[mark+"bn"]=0;displayVals[mark+"tc"]="NA";displayVals[mark+"tf"]="NA";
                    displayVals[mark+"vc"]="NA";displayVals[mark+"vf"]="NA";displayVals[mark+"od"]="NA";
                    displayVals[mark+"p"]="NA";
                    let oldBuy=(mark+"b" in prices && prices[mark+"b"]==0) ? -1 : (!(mark+"b" in prices)) ? -1 : prices[mark+"b"];
                    console.log(currPath);
                    let allPaths=currPath[currPath.length-1].split("/");
                    if(URLnos==1){
                        tempBuy=Math.pow(parseFloat(currObj[allPaths[0]]),sign);
                        console.log(tempBuy);
                        buy=parseFloat(tempBuy).toFixed(2);
                        console.log(buy);
                        if(buy==0.00){
                            console.log("in");
                            console.log(Math.pow(tempBuy,sign));
                            buy=tempBuy.toFixed(Math.max(-Math.log10(tempBuy) + 2, 2));
                        }
                        mktSubsTbl.push(mark);//Adding to mktSubsTbl array to display in arbitrage
                        prices[mark+"b"]=buy;
                        displayVals[mark+"bn"]=buy;
                        displayVals[mark+"b"]=currFSymb+""+buy;
                        if(allPaths[2] !="?"){
                            // sell=Math.pow(currObj[currPath[currPath.length-1].split("/")[1]],sign);
                            // prices[mark+"s"]=sell;
                            if(allPaths[2].indexOf("|")!=-1){
                                console.log("in volume |");
                                let tempPath=allPaths[2].split("|");
                                let tempObj=null;
                                for(let i=0;i<tempPath.length-1;i++){
                                    tempObj=currObj[tempPath[i]];
                                }
                                displayVals[mark+"vc"]=currFSymb+parseFloat(tempObj[tempPath[tempPath.length-1]]).toFixed(2);
                            }
                            else
                                displayVals[mark+"vc"]=currCSymb+parseFloat(currObj[allPaths[2]]).toFixed(2);
                        }
                        if(allPaths[3] !="?"){
                            if(allPaths[3].indexOf('|')!=-1){
                                let tempPath=allPaths[3].split("|");
                                let tempObj=null;
                                for(let i=0;i<tempPath.length-1;i++){
                                    tempObj=currObj[tempPath[i]];
                                }
                                displayVals[mark+"vf"]=currFSymb+parseFloat(tempObj[tempPath[tempPath.length-1]]).toFixed(2);
                            }
                            else
                                displayVals[mark+"vf"]=currFSymb+parseFloat(currObj[allPaths[3]]).toFixed(2);
                        }
                        if(allPaths[4] !="?"){
                            displayVals[mark+"tc"]=currCSymb+parseFloat(currObj[allPaths[4]]).toFixed(2);
                        }
                        if(allPaths[5] !="?"){
                            displayVals[mark+"tf"]=currFSymb+parseFloat(currObj[allPaths[5]]).toFixed(2);
                        }
                        if(allPaths[6] !="?"){
                            displayVals[mark+"p"]=parseFloat(currObj[allPaths[6]]).toFixed(2)+"%";
                            percent=parseInt(currObj[allPaths[6]]);
                        }
                        if(allPaths[7] !="?" && displayVals[mark+"p"]=="NA"){
                            displayVals[mark+"p"]=parseFloat(((buy-currObj[allPaths[7]])/currObj[allPaths[7]])*100).toFixed(2)+"%";
                        }
                    }
                    else if(URLnos==2 && i==1){
                        buy=Math.pow(currObj[currPath[currPath.length-1].split("/")[0]],sign);
                        prices[mark+"b"]=buy;
                    }
                    else if(URLnos==2 && i==2){
                        sell=Math.pow(currObj[currPath[currPath.length-1].split("/")[0]],sign);
                        prices[mark+"s"]=sell;
                    }
                    (oldBuy<prices[mark+"b"]) ? displayVals[mark+"flg"]=1 : (oldBuy>prices[mark+"b"]) ? displayVals[mark+"flg"]=2 : (oldBuy==prices[mark+"b"]) ? displayVals[mark+"flg"]=3 : displayVals[mark+"flg"]=0;
                    if(percent>0){
                        displayVals[mark+"p"]="<span style='color:#3D9400'>"+displayVals[mark+"p"]+"</span>";
                        displayVals[mark+"b"]="<span style='color:#3D9400'>"+displayVals[mark+"b"]+"</span>";
                    }
                    else if(percent<0){
                        displayVals[mark+"p"]="<span style='color:#A11B0A'>"+percent+"%</span>";
                        displayVals[mark+"b"]="<span style='color:#A11B0A'>"+displayVals[mark+"b"]+"</span>";
                    }
                    //newTblRow=marketTable.insertRow(parseInt(marketTable.rows.length/2));
                    if(oldBuy==-1){
                        let newTblRow=document.createElement("tr");
                        marketTable=document.getElementById("MarketsDataTable");
                        newTblRow.style.animationDuration="15s";
                        (percent=="NA" || percent==0) ? newTblRow.style.animationName="pulseColorYellowMkt" : (percent>0) ? newTblRow.style.animationName="pulseColorGreenMkt" : (percent<0) ? newTblRow.style.animationName="pulseColorRedMkt" : newTblRow.style.animationName="pulseColorYellowMkt";
                        (percent=="NA" || percent==0) ? displayVals[mark+"flg"]=3 : (percent>0) ? displayVals[mark+"flg"]=1 : (percent<0) ? displayVals[mark+"flg"]=2 : displayVals[mark+"flg"]=3;
                        let newTblData='<td>'+mark.charAt(0).toUpperCase()+mark.slice(1)+'</td><td id="'+mark+'b">'+displayVals[mark+"b"]+'</td><td id="'+mark+'t"><span id="'+mark+'tf">'+displayVals[mark+"tf"]+'</span><br><span id="'+mark+'tc">'+displayVals[mark+"tc"]+'</span></td><td id="'+mark+'v"><span id="'+mark+'vf">'+displayVals[mark+"vf"]+'</span><br><span id="'+mark+'vc">'+displayVals[mark+"vc"]+'</span></td><td id="'+mark+'p">'+displayVals[mark+"p"]+'</td>';
                        newTblRow.innerHTML=newTblData;
                        document.getElementById("MarketsDataTable").appendChild(newTblRow);
                        console.log("rendered");
                    }
                    console.log(JSON.stringify(prices));
                }
            }
        };
        xhttpMarket.open("GET", marketUrl, true);
        xhttpMarket.send();
    }
}
/**
 * return pair. if pait=="absent", stop checking for more
 */
function getPairsPrice(crypto,fiat){
    if(crypto in aliases)
        getPairsPrice(aliases[crypto],fiat);
    if(fiat in aliases)
        getPairsPrice(crypto,aliases[fiat]);  
    if(crypto in aliases && fiat in aliases)
        getPairsPrice(aliases[crypto],aliases[fiat]);  
    console.log("in getPairsPrice");
    let pair=pairMark.hasOwnProperty(crypto+"/"+fiat) ? crypto+"/"+fiat : pairMark.hasOwnProperty(fiat+"/"+crypto) ? fiat+"/"+crypto : "absent";
    let sign=1;
    if(pair==fiat+"/"+crypto){
        sign=-1;
        let temp=fiat;
        fiat=crypto;
        crypto=temp;
    }
    else
        sign=1;
    console.log(sign);
    console.log(pair);
    if(pair != "absent"){
        let markets=pairMark[pair];
        for(mark in markets){
            getData(markets[mark],crypto,fiat,sign);
        }
    }
    return pair;
}
// getPairsPrice("BTC","INR");

function updateMarketsDataTblNotINR () {
    console.log("IN updateMarketsDataTblNotINR");
    mktSubsTbl=[]; 
    var xhttpOtherFiatMkts = new XMLHttpRequest();
    var tableString='<table class="table table-bordered">'+
            '<thead id="MarketsTable"><tr><th>Name</th><th>Price</th><th>Last Trade</th><th>24H Volume</th><th>24H Change</th></tr></thead><tbody id="MarketsDataTable">';
    xhttpOtherFiatMkts.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            console.log("Streaming Started");
            var subList = JSON.parse(this.responseText)[globalFiatValue];
            currSubAgg=subList.CURRENTAGG; 
            currSubList=subList.CURRENT;
            for(let mktSub in currSubList){
                // mktSubs.push(currSubList[mktSub]);
                mktSubsTbl.push(currSubList[mktSub].substring(currSubList[mktSub].indexOf("~")+1, currSubList[mktSub].indexOf("~",2)));
                tableString = tableString + '<tr style="animation-duration:15s"><td>'+mktSubsTbl[mktSub]+'</td><td id="'+mktSubsTbl[mktSub].toLowerCase()+'b">⌛</td><td id="'+mktSubsTbl[mktSub].toLowerCase()+'t"><span id="'+mktSubsTbl[mktSub].toLowerCase()+'tf">⌛</span><br><span id="'+mktSubsTbl[mktSub].toLowerCase()+'tc">⌛</span></td><td id="'+mktSubsTbl[mktSub].toLowerCase()+'v"><span id="'+mktSubsTbl[mktSub].toLowerCase()+'vf">⌛</span><br><span id="'+mktSubsTbl[mktSub].toLowerCase()+'vc">⌛</span></td><td id="'+mktSubsTbl[mktSub].toLowerCase()+'p">⌛</td></tr>';
            }
            // console.log(mktSubs);
            tableString = tableString + '</tbody></table>';
            document.getElementById("marketsDataTable").innerHTML=tableString;
            // $(function () {
            //     $('#example1').DataTable()
            // });
            currSubList.push(currSubAgg);
            startStream(currSubList);
            console.log("Streaming Started");
            let pairPresent="absent";
            getPairsPrice(globalCryptoValue,globalFiatValue);
            otherMarketsTimer=setInterval(function (){
                pairPresent=getPairsPrice(globalCryptoValue,globalFiatValue);
            }, 60000);
            // if(pairPresent=="absent"){
            //     clearInterval(otherMarketsTimer);
            //     pairPresent="something";
            // }
        }
    };
    xhttpOtherFiatMkts.open("GET", "https://min-api.cryptocompare.com/data/subs?fsym="+globalCryptoValue+"&tsyms="+globalFiatValue, true);
    xhttpOtherFiatMkts.send();
    //////////////////////////// ^ NEW ^ ////////////////////////////////
    // arbitrage = [];
    // var xhttpOtherFiatMkts = new XMLHttpRequest();
    // xhttpOtherFiatMkts.onreadystatechange = function() {
    // if (this.readyState == 4 && this.status == 200) {
    //  var otherFiatSnapshot = JSON.parse(this.responseText);
    //  console.log(otherFiatSnapshot.query.results.json.Data);
    //  var otherFiatMkts = otherFiatSnapshot.query.results.json.Data.Exchanges;
    //  var tableString='<table id="example1" class="table table-bordered table-striped">'+
    //         '<thead><tr><th>Name</th><th>Price</th><th>24H Volume</th></tr></thead><tbody id="MarketsDataTable">';
    // var lclBtcString = "";
    // var highestPrc = 0;
    // var highestPrcElement = "";
    // var lowestPrc = 999999.99;
    // var lowestPrcElement = "";
    // for(var i=0;i<otherFiatMkts.length;i++){
    //     if(otherFiatMkts[i].VOLUME24HOURTO != 0)
    //         if(otherFiatMkts[i].MARKET == "LocalBitcoins"){
    //             lclBtcString = '<tr><td>LocalBitcoin</td><td id="LocalBitcoinb">'+otherFiatMkts[i].PRICE+'</td><td id="LocalBitcoins">'+parseFloat(otherFiatMkts[i].VOLUME24HOURTO).toFixed(2)+'</td></tr>';
    //             if(parseFloat(otherFiatMkts[i].PRICE) > highestPrc){
    //                 highestPrc = otherFiatMkts[i].PRICE;
    //                 highestPrcElement = "LocalBitcoinb";
    //             }
    //             if(parseFloat(otherFiatMkts[i].PRICE) < lowestPrc){
    //                 lowestPrc = otherFiatMkts[i].PRICE;
    //                 lowestPrcElement = "LocalBitcoinb";
    //             }
    //             arbitrage.push({
    //                 n: "Localbitcoins",
    //                 p: parseFloat(otherFiatMkts[i].PRICE).toFixed(2),
    //                 v: parseFloat(otherFiatMkts[i].VOLUME24HOURTO).toFixed(2)
    //             });
    //         }
    //         else{
    //             tableString = tableString + '<tr><td>'+otherFiatMkts[i].MARKET+'</td><td id="'+otherFiatMkts[i].MARKET+'b">'+otherFiatMkts[i].PRICE+'</td><td id="'+otherFiatMkts[i].MARKET+'s">'+parseFloat(otherFiatMkts[i].VOLUME24HOURTO).toFixed(2)+'</td></tr>';
    //             if(parseFloat(otherFiatMkts[i].PRICE) > highestPrc){
    //                 highestPrc = otherFiatMkts[i].PRICE;
    //                 highestPrcElement = otherFiatMkts[i].MARKET+"b";
    //             }
    //             if(parseFloat(otherFiatMkts[i].PRICE) < lowestPrc){
    //                 lowestPrc = otherFiatMkts[i].PRICE;
    //                 lowestPrcElement = otherFiatMkts[i].MARKET+"b";
    //             }
    //             arbitrage.push({
    //                 n: otherFiatMkts[i].MARKET,
    //                 p: parseFloat(otherFiatMkts[i].PRICE).toFixed(2),
    //                 v: parseFloat(otherFiatMkts[i].VOLUME24HOURTO).toFixed(2)
    //             });
    //         }
          
    // }
    // tableString = tableString + lclBtcString + '</tbody></table>';
    // document.getElementById("marketsDataTable").innerHTML=tableString;
    // $(function () {
    //     $('#example1').DataTable()
    // })
//     document.getElementById(lowestPrcElement).parentElement.style.backgroundColor = "#85FF9D";
//     document.getElementById(highestPrcElement).parentElement.style.backgroundColor = "#ffbcbc";
//     }
//   };
//   xhttpOtherFiatMkts.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.cryptocompare.com/api/data/coinsnapshot/?fsym='+globalCryptoValue+'&tsym='+globalFiatValue+'"') + '&format=json', true);
//   xhttpOtherFiatMkts.send();
}

function getMarketData(){

if( globalCryptoValue == "BTC" && globalFiatValue == "INR"){
// var marketsToLoad = [{"name":"Zebpay","site":"www.zebpay.com","dataurl":"https://www.zebapi.com/api/v1/market/ticker/btc/inr"},
// {"name":"Unocoin","site":"www.unocoin.com","dataurl":"https://www.zebapi.com/api/v1/market/ticker/btc/inr"}];
//////////////////////////////////////////////////////////////////////////
var tableString='<table id="example1" class="table table-bordered">'+
'<thead><tr><th>Name</th><th>Buy(lowest Ask)</th><th>Sell(highest Bid)</th></tr></thead><tbody id="MarketsDataTable">'+
'<tr><td><a href="https://www.koinex.in">Koinex</a></td><td id="Koinexb">loading</td><td id="Koinexs">loading</td></tr>'+
'<tr><td><a href="https://www.unocoin.com">Unocoin</a></td><td id="Unocoinb">loading</td><td id="Unocoins">loading</td></tr>'+
'<tr><td><a href="https://www.coindelta.com">Coindelta</a></td><td id="Coindeltab">loading</td><td id="Coindeltas">loading</td></tr>'+
'<tr><td><a href="https://www.coinsecure.in">Coinsecure</a></td><td id="Coinsecureb">loading</td><td id="Coinsecures">loading</td></tr>'+
'<tr><td><a href="https://www.coinome.com">Coinome</a></td><td id="Coinomeb">loading</td><td id="Coinomes">loading</td></tr>'+
'<tr><td><a href="https://www.buyucoin.com">Buyucoin</a></td><td id="Buyucoinb">loading</td><td id="Buyucoins">loading</td></tr>'+
//'<tr><td><a href="https://www.paxful.com">Paxful</a></td><td id="Paxfulb">loading</td><td id="Paxfuls">loading</td></tr>'+
'<tr><td><a href="https://www.pocketbits.in">PocketBits</a></td><td id="Pocketbitsb">loading</td><td id="Pocketbitss">loading</td></tr>'+
'<tr><td><a href="https://www.localbitcoins.com">LocalBitcoins</a></td><td id="LocalBitcoinsb">loading</td><td id="LocalBitcoinss">loading</td></tr>'+
'<tr><td><a href="https://www.zebpay.com">Zebpay</a></td><td id="Zebpayb">loading</td><td id="Zebpays">loading</td></tr></tbody></table>';
//document.getElementById("marketsDataTable").innerHTML=tableString;
// $(function () {
//     $('#example1').DataTable()
// })
//updateMarketsDataTblINR();
updateMarketsDataTblNotINR();
}   

else if( globalFiatValue != "INR" ){
    updateMarketsDataTblNotINR();
}
else{
    updateMarketsDataTblNotINR();
}


}