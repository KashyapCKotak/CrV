var displayVals=[];
var displayValsAgg=[];
var FLAGS=["defunct","up","down","what","noChange",];
$('.bitfinext').on('DOMSubtreeModified propertychange', function() {
    console.log("YEEEEEESSSSSSSSS");//TODO
});
function resetStrm(){
	clearInterval(streamUpdtIntvl);
	displayVals=[];
	socket.emit('SubRemove', { subs: subscription });
	console.log("Stream Reset");
}
function displayData(){
		for(var marketElem in displayVals){
			// console.log(marketElem);
			// console.log(marketElem[marketElem.length-1]);
			if(marketElem[marketElem.length-1] == 'g'){
				// document.getElementById(marketElem.substr(0,marketElem.length-3)+"b").parentElement.style.backgroundColor="#f9f9f9";
				if(displayVals[marketElem] == 0){
					document.getElementById(marketElem.substr(0,marketElem.length-3)+"b").parentElement.style.display="none";
				}
				else if(displayVals[marketElem] == 1){//#3D9400
					document.getElementById(marketElem.substr(0,marketElem.length-3)+"b").parentElement.style.animationName="pulseColorGreenMkt";//backgroundColor="#cbf5e0";//"#baf5d8";
				}
				else if(displayVals[marketElem] == 2){//#e84f4f;#A11B0A
					document.getElementById(marketElem.substr(0,marketElem.length-3)+"b").parentElement.style.animationName="pulseColorRedMkt";//backgroundColor="#f5d9d9";//"#f3cccc";
				}
				else{
					document.getElementById(marketElem.substr(0,marketElem.length-3)+"b").parentElement.style.backgroundColor="#f9f9f9";
				}
			}
			else if(marketElem[marketElem.length-1] == 'd' || marketElem[marketElem.length-1] == 'n'){
			}
			else{
				document.getElementById(marketElem).innerHTML=displayVals[marketElem];
			}
		}
		var mainFactsDOM=document.getElementsByClassName("mainFactsValue");
		for(var i=0;i<7;i++){
			mainFactsDOM[i].innerHTML=displayValsAgg[i];
		}
		document.getElementById("mainPrice").innerHTML=displayValsAgg[7];
		// console.log("dataLoaded");
	// }
}
function startStream(currSubList) {
	console.log("STREAMING STARTS HERE!!!!!");
	var currentPrice = {};
	socket = io.connect('https://streamer.cryptocompare.com/');
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
	currFSymb=SYMBOLS[globalFiatValue] || globalFiatValue;
	currCSymb=SYMBOLS[globalCryptoValue] || globalCryptoValue;
	console.log(currSubAgg);
	console.log(currSubList);
	subscription = currSubList;
	socket.emit('SubAdd', { subs: subscription });
	// socket.emit('SubRemove', { subs: subscription });
	socket.on("m", function(message) {
		
		// console.log(message);
		var messageType = message.substring(0, message.indexOf("~"));
		//console.log("message Type: "+messageType);
		if (messageType == 2) {
			dataUnpack(message);
			// var valuesArray = message.split("~");
			// var market=valuesArray[1].toLowerCase();
			// displayVals[market+"flg"]=FLAGS[parseInt(valuesArray[4])];
			// displayVals[market+"b"]=currFSymb+" "+valuesArray[5];
			// displayVals[market+"tc"]=currCSymb+" "+valuesArray[7];
			// displayVals[market+"tf"]=currFSymb+" "+valuesArray[8];
			// displayVals[market+"vc"]=currCSymb+" "+valuesArray[10];
			// displayVals[market+"vf"]=currFSymb+" "+valuesArray[11];
			// displayVals[market+"p"]=parseFloat(((valuesArray[5]-valuesArray[12])/valuesArray[12])*100).toFixed(2)+"%";
			// if(isNaN(parseFloat(((valuesArray[5]-valuesArray[12])/valuesArray[12])*100).toFixed(2))){
			// 	console.log("!!!!!!!!!!!!! NAN !!!!!!!!!!!!!!!!!!");
			// 	console.log(valuesArray[5]+"-"+valuesArray[12]+"/"+valuesArray[12]);
			// }
		}

		else if(messageType == 5){
			// console.log(message);
			dataUnpackAgg(message);
		}

		else if (messageType == 3){
			displayData();
			console.log("Done First");
			streamUpdtIntvl=setInterval(function(){ displayData(); }, 5000);
		}
	});

	var dataUnpack = function(message) {
		var data = CCC.CURRENT.unpack(message);
		// console.log(data);
		// var from = data['FROMSYMBOL'];
		// var to = data['TOSYMBOL'];
		// var fsym = CCC.STATIC.CURRENCY.getSymbol(from);
		// var tsym = CCC.STATIC.CURRENCY.getSymbol(to);
		//var pair = from + to;

		// if (!currentPrice.hasOwnProperty(pair)) {
		// 	currentPrice[pair] = {};
		// }

		// for (var key in data) {
		// 	currentPrice[pair][key] = data[key];
		// }

		// if (currentPrice[pair]['LASTTRADEID']) {
		// 	currentPrice[pair]['LASTTRADEID'] = parseInt(currentPrice[pair]['LASTTRADEID']).toFixed(0);
		// }
		//currentPrice[pair]['CHANGE24HOUR'] = CCC.convertValueToDisplay(tsym, (currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']));
		//currentPrice[pair]['CHANGE24HOURPCT'] = ((currentPrice[pair]['PRICE'] - currentPrice[pair]['OPEN24HOUR']) / currentPrice[pair]['OPEN24HOUR'] * 100).toFixed(2) + "%";
		//displayData(currentPrice[pair], from, tsym, fsym);
		// console.log(data);
		var market=data['MARKET'].toLowerCase();
		for(var dataElem in data){
			if(dataElem == "FLAGS")
				displayVals[market+"flg"]=data[dataElem];
			else if(dataElem == "PRICE"){
				displayVals[market+"b"]=currFSymb+" "+data[dataElem].toFixed(2);
				displayVals[market+"bn"]=data[dataElem].toFixed(4);
			}
			else if(dataElem == "LASTVOLUME")
				displayVals[market+"tc"]=currCSymb+" "+data[dataElem].toFixed(4);
			else if(dataElem == "LASTVOLUMETO")	
				displayVals[market+"tf"]=currFSymb+" "+data[dataElem].toFixed(2);
			else if(dataElem == "VOLUME24HOUR")
				displayVals[market+"vc"]=currCSymb+" "+data[dataElem].toFixed(2);
			else if(dataElem == "VOLUME24HOURTO"){
				displayVals[market+"vf"]=currFSymb+" "+data[dataElem].toFixed(2);
				if(parseFloat(data[dataElem]) == parseFloat(0))
					displayVals[market+"flg"]=0;//hide market
			}
			else if(dataElem == "OPEN24HOUR")
				displayVals[market+"od"]=data[dataElem].toFixed(4);
		}
		var chgpct=parseFloat(((displayVals[market+"bn"]-displayVals[market+"od"])/displayVals[market+"od"])*100).toFixed(2);
		if(chgpct>0){
			displayVals[market+"p"]="<span style='color:#3D9400'>"+chgpct+"%</span>";
			displayVals[market+"b"]="<span style='color:#3D9400'>"+displayVals[market+"b"]+"</span>";
		}
		else if(chgpct<0){
			displayVals[market+"p"]="<span style='color:#A11B0A'>"+chgpct+"%</span>";
			displayVals[market+"b"]="<span style='color:#A11B0A'>"+displayVals[market+"b"]+"</span>";
		}
		else{
			displayVals[market+"p"]=chgpct+"%";
		}
	};

	var dataUnpackAgg=function(message){
		var data = CCC.CURRENT.unpack(message);
		// console.log(data);
		for(var dataElem in data){
			if(dataElem == "VOLUME24HOUR")
				displayValsAgg[2]=currCSymb+" "+data[dataElem].toFixed(2);
			else if(dataElem == "VOLUME24HOURTO")
				displayValsAgg[3]=currFSymb+" "+data[dataElem].toFixed(2);
			else if(dataElem == "OPEN24HOUR"){
				displayValsAgg[4]=currFSymb+" "+data[dataElem].toFixed(2);
				displayValsAgg[9]=data[dataElem].toFixed(2);
			}
			else if(dataElem == "HIGH24HOUR")
				displayValsAgg[5]=currFSymb+" "+data[dataElem].toFixed(2);
			else if(dataElem == "LOW24HOUR")
				displayValsAgg[6]=currFSymb+" "+data[dataElem].toFixed(2);
			else if(dataElem == "PRICE"){
				displayValsAgg[7]=currFSymb+" "+data[dataElem].toFixed(2);
				displayValsAgg[8]=data[dataElem].toFixed(2);
			}
		}
		var chg=parseFloat(displayValsAgg[8]-displayValsAgg[9]).toFixed(2);
		var chgpct=parseFloat((chg/displayValsAgg[9])*100).toFixed(2);
		if(isNaN(chg)){
			console.log(displayValsAgg[8]);
			console.log(displayValsAgg[9]);
			console.log(parseFloat(displayValsAgg[8]-displayValsAgg[9]).toFixed(2));
		}
		if(chgpct>0){
			displayValsAgg[0]="<span style='color:#228b22'>"+currFSymb+" "+chg+"</span>";
			displayValsAgg[1]="<span style='color:#228b22'>"+chgpct+"%</span>";
			displayValsAgg[7]="<span style='animation-name:pulseColorGreen'>"+displayValsAgg[7]+"</span>";
		}
		else if(chgpct<0){
			displayValsAgg[0]="<span style='color:#FF5B5B'>"+currFSymb+" "+chg+"</span>";
			displayValsAgg[1]="<span style='color:#FF5B5B'>"+chgpct+"%</span>";
			displayValsAgg[7]="<span style='animation-name:pulseColorRed'>"+displayValsAgg[7]+"</span>";
		}
		else{
			displayValsAgg[0]=currFSymb+" "+chg;
			displayValsAgg[1]=chgpct+"%";
		}
	}

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