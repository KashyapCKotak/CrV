console.log(globalCryptoValue == "BTC");
var tableString;
if( globalCryptoValue == "BTC" ){
    // var marketsToLoad = [{"name":"Zebpay","site":"www.zebpay.com","dataurl":"https://www.zebapi.com/api/v1/market/ticker/btc/inr"},
    // {"name":"Unocoin","site":"www.unocoin.com","dataurl":"https://www.zebapi.com/api/v1/market/ticker/btc/inr"}];
    //////////////////////////////////////////////////////////////////////////
    tableString='<table id="example1" class="table table-bordered table-striped">'+
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
    updateMarketsDataTbl();

    // Accepts a url and a callback function to run.
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
    //requestCrossDomain("https://www.unocoin.com/trade?all");
    function updateMarketsDataTbl(){
        ////////////////////////// Zebpay ///////////////////////////////////////////
        var xhhtpMktblZebpay = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblZebpay.onreadystatechange = function() {
            if (xhhtpMktblZebpay.readyState == 4 && xhhtpMktblZebpay.status == 200) {
                var zebpaydata = JSON.parse(this.responseText);
                document.getElementById("Zebpayb").innerHTML=parseFloat(zebpaydata.buy).toFixed(2);
                document.getElementById("Zebpays").innerHTML=parseFloat(zebpaydata.sell).toFixed(2);
            }
        };
        xhhtpMktblZebpay.open("GET", "https://live.zebapi.com/api/v1/ticker?currencyCode=inr", true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
        xhhtpMktblZebpay.send();
        ////////////////////////// Koinex ///////////////////////////////////////////
        var xhhtpMktblKoinex = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblKoinex.onreadystatechange = function() {
            if (xhhtpMktblKoinex.readyState == 4 && xhhtpMktblKoinex.status == 200) {
                var KoinexData = JSON.parse(this.responseText);
                document.getElementById("Koinexb").innerHTML=parseFloat(KoinexData.stats.BTC.lowest_ask).toFixed(2);
                document.getElementById("Koinexs").innerHTML=parseFloat(KoinexData.stats.BTC.highest_bid).toFixed(2);
            }
        };
        xhhtpMktblKoinex.open("GET", "https://koinex.in/api/ticker", true);//https://koinex.in/api/ticker
        xhhtpMktblKoinex.send();
        ////////////////////////// Unocoin ///////////////////////////////////////////
        var xhhtpMktblUnocoin = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblUnocoin.onreadystatechange = function() {
            if (xhhtpMktblUnocoin.readyState == 4 && xhhtpMktblUnocoin.status == 200) {
                var UnocoinData = JSON.parse(this.responseText);
                document.getElementById("Unocoinb").innerHTML=parseFloat(UnocoinData.query.results.json.buy).toFixed(2);
                document.getElementById("Unocoins").innerHTML=parseFloat(UnocoinData.query.results.json.sell).toFixed(2);
            }
        };

        xhhtpMktblUnocoin.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.unocoin.com/trade?all' + '"') + '&format=json', true);
        xhhtpMktblUnocoin.send();
        ////////////////////////// Pocketbits ///////////////////////////////////////////
        var xhhtpMktblPocketbits = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblPocketbits.onreadystatechange = function() {
            if (xhhtpMktblPocketbits.readyState == 4 && xhhtpMktblPocketbits.status == 200) {
                var PocketbitsData = JSON.parse(this.responseText);
                document.getElementById("Pocketbitsb").innerHTML=parseFloat(PocketbitsData.query.results.json.buy).toFixed(2);
                document.getElementById("Pocketbitss").innerHTML=parseFloat(PocketbitsData.query.results.json.sell).toFixed(2);
            }
        };

        xhhtpMktblPocketbits.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://pocketbits.in/api/ticker' + '"') + '&format=json', true);
        xhhtpMktblPocketbits.send();
        ////////////////////////// Coinsecure ///////////////////////////////////////////
        var xhhtpMktblCoinsecure = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblCoinsecure.onreadystatechange = function() {
            if (xhhtpMktblCoinsecure.readyState == 4 && xhhtpMktblCoinsecure.status == 200) {
                var CoinsecureData = JSON.parse(this.responseText);
                document.getElementById("Coinsecureb").innerHTML=parseFloat(CoinsecureData.query.results.json.message.ask/100).toFixed(2);

                document.getElementById("Coinsecures").innerHTML=parseFloat(CoinsecureData.query.results.json.message.bid/100).toFixed(2);
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
                document.getElementById("Coindeltab").innerHTML=parseFloat(Coindeltadata[0].Ask).toFixed(2);
                document.getElementById("Coindeltas").innerHTML=parseFloat(Coindeltadata[0].Bid).toFixed(2);
            }
        };
        xhhtpMktblCoindelta.open("GET", "https://coindelta.com/api/v1/public/getticker/", true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
        xhhtpMktblCoindelta.send();
        ////////////////////////// Coinome ///////////////////////////////////////////
        var xhhtpMktblCoinome = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblCoinome.onreadystatechange = function() {
            if (xhhtpMktblCoinome.readyState == 4 && xhhtpMktblCoinome.status == 200) {
                var Coinomedata = JSON.parse(this.responseText);
                this.responseType
                document.getElementById("Coinomeb").innerHTML=parseFloat(Coinomedata.query.results.json['BTC-INR']['lowest_ask']).toFixed(2);
                document.getElementById("Coinomes").innerHTML=parseFloat(Coinomedata.query.results.json['BTC-INR']['highest_bid']).toFixed(2);
            }
        };
        xhhtpMktblCoinome.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.coinome.com/api/v1/ticker.json' + '"') + '&format=json', true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
        xhhtpMktblCoinome.send();
        ////////////////////////// Buyucoin ///////////////////////////////////////////
        var xhhtpMktblBuyucoin = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblBuyucoin.onreadystatechange = function() {
            if (xhhtpMktblBuyucoin.readyState == 4 && xhhtpMktblBuyucoin.status == 200) {
                var Buyucoindata = JSON.parse(this.responseText);
                this.responseType
                document.getElementById("Buyucoinb").innerHTML=parseFloat(Buyucoindata.query.results.json.BuyUcoin_data.btc_buy_price).toFixed(2);
                document.getElementById("Buyucoins").innerHTML=parseFloat(Buyucoindata.query.results.json.BuyUcoin_data.btc_sell_price).toFixed(2);
            }
        };
        xhhtpMktblBuyucoin.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://www.buyucoin.com/api/v1/btc/' + '"') + '&format=json', true);//old link: https://www.zebapi.com/api/v1/market/ticker/btc/inrdsfgcsh
        xhhtpMktblBuyucoin.send();
        ////////////////////////// LocalBitcoins ///////////////////////////////////////////
        var xhhtpMktblLocalBitcoins = new XMLHttpRequest(); //TODO: add support for IE
        xhhtpMktblLocalBitcoins.onreadystatechange = function() {
            if (xhhtpMktblLocalBitcoins.readyState == 4 && xhhtpMktblLocalBitcoins.status == 200) {
                var LocalBitcoinsData = JSON.parse(this.responseText);
                document.getElementById("LocalBitcoinsb").innerHTML=parseFloat(LocalBitcoinsData.query.results.json.asks[0].json[0]).toFixed(2);
                document.getElementById("LocalBitcoinss").innerHTML=parseFloat(LocalBitcoinsData.query.results.json.bids[0].json[0]).toFixed(2);
            }
        };

        xhhtpMktblLocalBitcoins.open("GET", 'http://query.yahooapis.com/v1/public/yql?q=' + encodeURIComponent('select * from json where url="' + 'https://localbitcoins.com/bitcoincharts/INR/orderbook.json' + '"') + '&format=json', true);
        xhhtpMktblLocalBitcoins.send();
    }
}