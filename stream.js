function startStream(currSubList) {
	console.log("STREAMING STARTS HERE!!!!!");
	var currentPrice = {};
	var socket = io.connect('https://streamer.cryptocompare.com/');
	//Format: {SubscriptionId}~{ExchangeName}~{FromSymbol}~{ToSymbol}
	//Use SubscriptionId 0 for TRADE, 2 for CURRENT, 5 for CURRENTAGG eg use key '5~CCCAGG~BTC~USD' to get aggregated data from the CCCAGG exchange 
	//Full Volume Format: 11~{FromSymbol} eg use '11~BTC' to get the full volume of BTC against all coin pairs
	//For aggregate quote updates use CCCAGG ags market
	// var aggSub="5~CCCAGG~"+globalCryptoValue+"~"+globalFiatValue;
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
	var FLAGS=["what","up","down","what","noChange"];
	currFSymb=SYMBOLS[globalFiatValue] || symbol;
	currCSymb=SYMBOLS[globalCryptoValue] || symbol;
	var displayVals=[];
	console.log(currSubList);
	var subscription = currSubList;
	socket.emit('SubAdd', { subs: subscription });
	socket.emit('SubRemove', { subs: subscription });
	socket.on("m", function(message) {
		
		console.log(message);
		var messageType = message.substring(0, message.indexOf("~"));
		//console.log("message Type: "+messageType);
		if (messageType == 2) {
			//dataUnpack(message);
			var valuesArray = message.split("~");
			var market=valuesArray[1].toLowerCase();
			displayVals[market+"flg"]=FLAGS[parseInt(valuesArray[4])];
			displayVals[market+"b"]=currFSymb+" "+valuesArray[5];
			displayVals[market+"tc"]=currCSymb+" "+valuesArray[7];
			displayVals[market+"tf"]=currFSymb+" "+valuesArray[8];
			displayVals[market+"vc"]=currCSymb+" "+valuesArray[10];
			displayVals[market+"vf"]=currFSymb+" "+valuesArray[11];
			displayVals[market+"p"]=parseFloat(((valuesArray[5]-valuesArray[12])/valuesArray[12])*100).toFixed(2)+"%";
		}
		else if (messageType == 11) {
			//decorateWithFullVolume(message);
		}
		else if (messageType == 3){
			displayData();
			console.log("Done First");
		}
	});

	// var dataUnpack = function(message) {
	// 	var data = CCC.CURRENT.unpack(message);
	// 	console.log(data);
	// 	var from = data['FROMSYMBOL'];
	// 	var to = data['TOSYMBOL'];
	// 	var fsym = CCC.STATIC.CURRENCY.getSymbol(from);
	// 	var tsym = CCC.STATIC.CURRENCY.getSymbol(to);
	// 	var pair = from + to;

	// 	if (!currentPrice.hasOwnProperty(pair)) {
	// 		currentPrice[pair] = {};
	// 	}

	// 	for (var key in data) {
	// 		currentPrice[pair][key] = data[key];
	// 	}

	// 	if (currentPrice[pair]['LASTTRADEID']) {
	// 		currentPrice[pair]['LASTTRADEID'] = parseInt(currentPrice[pair]['LASTTRADEID']).toFixed(0);
	// 	}
	// 	currentPrice[pair]['CHANGE24HOUR'] = CCC.convertValueToDisplay(tsym, (currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']));
	// 	currentPrice[pair]['CHANGE24HOURPCT'] = ((currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']) / currentPrice[pair]['OPEN24HOUR'] * 100).toFixed(2) + "%";
	// 	//displayData(currentPrice[pair], from, tsym, fsym);
	// };

	// var decorateWithFullVolume = function(message) {
	// 	var volData = CCC.FULLVOLUME.unpack(message);
	// 	console.log(volData);
	// 	var from = volData['SYMBOL'];
	// 	var to = 'USD';
	// 	var fsym = CCC.STATIC.CURRENCY.getSymbol(from);
	// 	var tsym = CCC.STATIC.CURRENCY.getSymbol(to);
	// 	var pair = from + to;

	// 	if (!currentPrice.hasOwnProperty(pair)) {
	// 		currentPrice[pair] = {};
	// 	}

	// 	currentPrice[pair]['FULLVOLUMEFROM'] = parseFloat(volData['FULLVOLUME']);
	// 	currentPrice[pair]['FULLVOLUMETO'] = ((currentPrice[pair]['FULLVOLUMEFROM'] - currentPrice[pair]['VOLUME24HOUR']) * currentPrice[pair]['PRICE']) + currentPrice[pair]['VOLUME24HOURTO'];
	// 	//displayData(currentPrice[pair], from, tsym, fsym);
	// };

	function displayData(){
		// console.log(($('#abucoinsb').is(':visible')));
		// if(($('marketsDataTable').is(':visible'))){
			for(marketElem in displayVals){
				if(marketElem[marketElem.length-1] == 'g'){
				}
				else{
					// console.log(marketElem);
					document.getElementById(marketElem).innerHTML=displayVals[marketElem];
				}
			}
			console.log("dataLoaded");
		// }
	}

	// var displayData = function(messageToDisplay, from, tsym, fsym) {
	// 	var priceDirection = messageToDisplay.FLAGS;
	// 	var fields = CCC.CURRENT.DISPLAY.FIELDS;

	// 	for (var key in fields) {
	// 		if (messageToDisplay[key]) {
	// 			if (fields[key].Show) {
	// 				switch (fields[key].Filter) {
	// 					case 'String':
	// 						$('#' + key + '_' + from).text(messageToDisplay[key]);
	// 						break;
	// 					case 'Number':
	// 						var symbol = fields[key].Symbol == 'TOSYMBOL' ? tsym : fsym;
	// 						$('#' + key + '_' + from).text(CCC.convertValueToDisplay(symbol, messageToDisplay[key]))
	// 						break;
	// 				}
	// 			}
	// 		}
	// 	}

	// 	$('#PRICE_' + from).removeClass();
	// 	if (priceDirection & 1) {
	// 		$('#PRICE_' + from).addClass("up");
	// 	}
	// 	else if (priceDirection & 2) {
	// 		$('#PRICE_' + from).addClass("down");
	// 	}

	// 	if (messageToDisplay['PRICE'] > messageToDisplay['OPEN24HOUR']) {
	// 		$('#CHANGE24HOURPCT_' + from).removeClass();
	// 		$('#CHANGE24HOURPCT_' + from).addClass("pct-up");
	// 	}
	// 	else if (messageToDisplay['PRICE'] < messageToDisplay['OPEN24HOUR']) {
	// 		$('#CHANGE24HOURPCT_' + from).removeClass();
	// 		$('#CHANGE24HOURPCT_' + from).addClass("pct-down");
	// 	}
	// };
}
