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

function updateMarketsDataTblNotINR () {
    var mktSubsTbl=[]; 
    var xhttpOtherFiatMkts = new XMLHttpRequest();
    var tableString='<table id="example1" class="table table-bordered table-striped">'+
            '<thead><tr><th>Name</th><th>Price</th><th>Last Trade</th><th>24H Volume</th><th>24H Change</th></tr></thead><tbody id="MarketsDataTable">';
    xhttpOtherFiatMkts.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
            var subList = JSON.parse(this.responseText)[globalFiatValue];
            var aggSub=subList.CURRENTAGG; 
            currSubList=subList.CURRENT;
            for(mktSub in currSubList){
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
            startStream(currSubList);
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
var tableString='<table id="example1" class="table table-bordered table-striped">'+
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
document.getElementById("marketsDataTable").innerHTML=tableString;
$(function () {
    $('#example1').DataTable()
})
updateMarketsDataTblINR();
}   

if( globalFiatValue != "INR" ){
    updateMarketsDataTblNotINR();
}

}