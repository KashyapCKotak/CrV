function updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, transType) {
	var lclPrtObj;
	console.log(myPortfolioPrsn);
	if(portType == "Personal"){
		lclPrtObj = myPortfolioPrsn;
		// console.log(myPortfolioPrsn);
		lclPortTableString = portTableStringPrsn;
		// console.log(portTableStringPrsn);
		lclPortArr = portArrPrsn;
		// console.log(portArrPrsn);
		lclUrlPort = urlPortPrsn;
		// console.log(urlPortPrsn);
		domElement = "portfolioTablePersonal";
		portIntrvlId = portIntrvlIdPrsn;
		whichTypeNumber = 1;
		// console.log(portIntrvlIdPrsn);
	}
	else if(portType == "Practice"){
		lclPrtObj = myPortfolioPrtc;
		lclPortTableString = portTableStringPrtc;
		lclPortArr = portArrPrtc;
		lclUrlPort = urlPortPrtc;
		domElement = "portfolioTablePractice";
		portIntrvlId = portIntrvlIdPrtc;
		whichTypeNumber = 2;
	}

	console.log("LOOOOOOK");
	console.log(lclPrtObj);
// var tempArray[$portJsonRoot] = lclPrtObj;
// cryptoVal = selectedCryptoValue
// fiatVal = selectedFiatValue
// console.log(myPortfolioPrsn);

	/////////////////////////// BUY //////////////////////////////
	if(transType == 1){
		// console.log("in buy");
		if(lclPrtObj.hasOwnProperty(selectedFiatValue)) {
			if(lclPrtObj[selectedFiatValue].hasOwnProperty(selectedCryptoValue)) {
				lclPrtObj[selectedFiatValue][selectedCryptoValue]["invst"]=parseFloat(parseFloat(lclPrtObj[selectedFiatValue][selectedCryptoValue]["invst"])+parseFloat(inputFiatAmount));
				lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"]=parseFloat(parseFloat(lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"])+parseFloat(inputCryptoAmount));
			}
			else{
				lclPrtObj[selectedFiatValue][selectedCryptoValue]=JSON.parse('{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}');
			}
		}
		else {
			lclPrtObj[selectedFiatValue]=JSON.parse('{"'+ selectedCryptoValue +'":{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}}');
		}
	}
	////////////////////////////// SELL //////////////////////////
	else if(transType == 2){
		if(lclPrtObj.hasOwnProperty(selectedFiatValue)) {
			//error_log("--------------crypto TRUE");
			if(lclPrtObj[selectedFiatValue].hasOwnProperty(selectedCryptoValue)){
					//error_log("-----------------fiat exists");
				var tempCryptAmt=lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"];
				var tempFiatInvst=lclPrtObj[selectedFiatValue][selectedCryptoValue]["invst"];

				if((tempCryptAmt-inputCryptoAmount)<0){
					return 0;
				}

				lclPrtObj[selectedFiatValue][selectedCryptoValue]["invst"]=(tempFiatInvst/tempCryptAmt)*(tempCryptAmt-inputCryptoAmount);
				lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"]=tempCryptAmt-inputCryptoAmount;

				if(lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"]==0){
					delete lclPrtObj[selectedFiatValue][selectedCryptoValue];
				}

				if($.isEmptyObject(lclPrtObj[selectedFiatValue])){
					delete lclPrtObj[selectedFiatValue];
				}
					//error_log(print_r(lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"]));
			}
			else{
					//error_log("-----------------add fiat");
				console.log("You do not have portfolio for this pair");
				return 0;
					//error_log(print_r(lclPrtObj[selectedCryptoValue]));
			}
		}
		else {
				//error_log("----------------FALSE");
			console.log("You do not have any portfolio for fiat");
			return 0;
				//error_log(json_encode($tempArray));
				//error_log("----------------added crypto");
		}
	}
	//////////////////// UPDATE ///////////////////////
	else if (transType == 3){
		if(lclPrtObj.hasOwnProperty(selectedFiatValue)) {
			if(lclPrtObj[selectedFiatValue].hasOwnProperty(selectedCryptoValue)) {
				lclPrtObj[selectedFiatValue][selectedCryptoValue]["invst"]=parseFloat(inputFiatAmount);
				lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"]=parseFloat(inputCryptoAmount);
				
				if(lclPrtObj[selectedFiatValue][selectedCryptoValue]["amt"]==0){
					delete lclPrtObj[selectedFiatValue][selectedCryptoValue];
				}
				if($.isEmptyObject(lclPrtObj[selectedFiatValue])){
					delete lclPrtObj[selectedFiatValue];
				}
			}
			else{
				lclPrtObj[selectedFiatValue][selectedCryptoValue]=JSON.parse('{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}');
			}
		}
		else {
			lclPrtObj[selectedFiatValue]=JSON.parse('{"'+ selectedCryptoValue +'":{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}}');
		}
	}
	// console.log(portIntrvlId);
	clearInterval(portIntrvlId[0]);
	console.log("LOOOOOOK AGAIN");
	console.log(lclPrtObj);
	console.log(myPortfolioPrtc);
	loadTableAndUrl(lclPrtObj, lclPortTableString, lclPortArr, lclUrlPort, domElement, portIntrvlId, whichTypeNumber);
}