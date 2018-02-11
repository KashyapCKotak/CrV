function updtLclPrtObj(selectedCryptoValue, selectedFiatValue, inputCryptoAmount, inputFiatAmount, portType, transType) {
	var lclPrtObj;
	// console.log(myPortfolioPrsn);
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
		// console.log(portIntrvlIdPrsn);
	}
	else if(portType == "Practice"){
		lclPrtObj = myPortfolioPrtc;
		lclPortTableString = portTableStringPrtc;
		lclPortArr = portArrPrtc;
		lclUrlPort = urlPortPrtc;
		domElement = "portfolioTablePersonal";
		portIntrvlId = portIntrvlIdPrtc;
	}

// var tempArray[$portJsonRoot] = lclPrtObj;
// cryptoVal = selectedCryptoValue
// fiatVal = selectedFiatValue
// console.log(myPortfolioPrsn);
	/////////////////////////// BUY //////////////////////////////
	if(transType == 1){
		// console.log("in buy");
		if(lclPrtObj.hasOwnProperty(selectedCryptoValue)) {
			if(lclPrtObj[selectedCryptoValue].hasOwnProperty(selectedFiatValue)) {
				lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"]=parseFloat(parseFloat(lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"])+parseFloat(inputFiatAmount));
				lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"]=parseFloat(parseFloat(lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"])+parseFloat(inputCryptoAmount));
			}
			else{
				lclPrtObj[selectedCryptoValue][selectedFiatValue]=JSON.parse('{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}');
			}
		}
		else {
			lclPrtObj[selectedCryptoValue]=JSON.parse('{"'+ selectedFiatValue +'":{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}}');
		}
	}
	////////////////////////////// SELL //////////////////////////
	else if(transType == 2){
		if(lclPrtObj.hasOwnProperty(selectedCryptoValue)) {
			//error_log("--------------crypto TRUE");
			if(lclPrtObj[selectedCryptoValue].hasOwnProperty(selectedFiatValue)){
					//error_log("-----------------fiat exists");
				var tempCryptAmt=lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"];
				var tempFiatInvst=lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"];

				if((tempCryptAmt-inputCryptoAmount)<0){
					return 0;
				}

				lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"]=(tempFiatInvst/tempCryptAmt)*(tempCryptAmt-inputCryptoAmount);

				lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"]=tempCryptAmt-inputCryptoAmount;

				if(lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"]==0){
					delete lclPrtObj[selectedCryptoValue][selectedFiatValue];
				}
				if($.isEmptyObject(lclPrtObj[selectedCryptoValue])){
					delete lclPrtObj[selectedCryptoValue];
				}
					//error_log(print_r(lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"]));
			}
			else{
					//error_log("-----------------add fiat");
				console.log("You do not have portfolio for pair");
				return 0;
					//error_log(print_r(lclPrtObj[selectedCryptoValue]));
			}
		}
		else {
				//error_log("----------------FALSE");
			console.log("You do not have any portfolio for crypto");
			return 0;
				//error_log(json_encode($tempArray));
				//error_log("----------------added crypto");
		}
	}
	//////////////////// UPDATE ///////////////////////
	else if (transType == 1){
		if(lclPrtObj.hasOwnProperty(selectedCryptoValue)) {
			if(lclPrtObj[selectedCryptoValue].hasOwnProperty(selectedFiatValue)) {
				lclPrtObj[selectedCryptoValue][selectedFiatValue]["invst"]=parseFloat(inputFiatAmount);
				lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"]=parseFloat(inputCryptoAmount);
				if(lclPrtObj[selectedCryptoValue][selectedFiatValue]["amt"]==0){
					delete lclPrtObj[selectedCryptoValue][selectedFiatValue];
				}
				if($.isEmptyObject(lclPrtObj[selectedCryptoValue])){
					delete lclPrtObj[selectedCryptoValue];
				}
			}
			else{
				lclPrtObj[selectedCryptoValue][selectedFiatValue]=JSON.parse('{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}');
			}
		}
		else {
			lclPrtObj[selectedCryptoValue]=JSON.parse('{"'+ selectedFiatValue +'":{"invst":'+ parseFloat(inputFiatAmount) +',"amt":'+ parseFloat(inputCryptoAmount) +'}}');
		}
	}
	// console.log(portIntrvlId);
	clearInterval(portIntrvlId[0]);
	console.log(lclPrtObj);
	loadTableAndUrl(lclPrtObj, lclPortTableString, lclPortArr, lclUrlPort, domElement, portIntrvlId);
}