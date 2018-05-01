<?php
session_start();
?>
var whichInit = 1;
// var myPortfolio
var myPortfolioPrsn=null;
var myPortfolioPrtc=null;
// var portTableString
var portTableStringPrsn = "";
var portTableStringPrtc = "";

// var portArr = [];
var portArrPrsn = [];
var portArrPrtc = [];

// var urlPort = [];
var urlPortPrsn = [];
var urlPortPrtc = [];

var portIntrvlIdPrsn = [];
var portIntrvlIdPrtc = [];

var prsnRootFiat="";
var prtcRootFiat="";

var prsnPortfolioWithAmtAsValue=null;
var prtcPortfolioWithAmtAsValue=null;

function triggerLoadTableAndUrl(whichInit){
	if(whichInit == 1){
		var myPortfolioInit = <?php echo $_SESSION['prsn_portfolio'];?>;
		prsnRootFiat=Object.keys(myPortfolioInit)[0];
		myPortfolioPrsn=myPortfolioInit[prsnRootFiat];
		console.log("Personal");
		console.log(prsnRootFiat);
		console.log(myPortfolioPrsn);
		portTableStringPrsn = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th>Diff</th><th style="width: 60px">%</th></tr>';
		loadTableAndUrl(myPortfolioPrsn, portTableStringPrsn, portArrPrsn, urlPortPrsn, "portfolioTablePersonal", portIntrvlIdPrsn, whichInit, prsnPortfolioWithAmtAsValue);
	}
	else if (whichInit == 2){
		var myPortfolioInit = <?php echo $_SESSION['prtc_portfolio'];?>;	
		prtcRootFiat=Object.keys(myPortfolioInit)[0];
		myPortfolioPrtc=myPortfolioInit[prtcRootFiat];
		console.log("Practice");
		console.log(prtcRootFiat);
		console.log(myPortfolioPrtc);
		portTableStringPrtc = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th>Diff</th><th style="width: 60px">%</th></tr>';
		loadTableAndUrl(myPortfolioPrtc, portTableStringPrtc, portArrPrtc, urlPortPrtc,  "portfolioTablePractice", portIntrvlIdPrtc, whichInit, prtcPortfolioWithAmtAsValue);
	}
}



function loadTableAndUrl(myPortfolio, portTableString, portArr, urlPort, domElement, portIntrvlId, whichInit, myPortfolioWithAmtAsValue){
var baseCurrency = "";
if (whichInit == 1)
	baseCurrency = prsnRootFiat;
else if (whichInit == 2)
	baseCurrency = prtcRootFiat;

myPortfolioWithAmtAsValue = JSON.parse(JSON.stringify(myPortfolio));

urlPort = [];
portArr = [];
var rowCounter = 1;
var totalInvst = parseFloat(0.0).toFixed(2);
var totalValue = parseFloat(0.0).toFixed(2);
var diffFiatList = [];
var fiatConvRates = null;
var waitForRates = true;
var waitForValues = true;

var doneUpdtFlg = false;
var updtTimeout = 20000;

for(fiatPort in myPortfolio){
	if(baseCurrency != fiatPort)
		diffFiatList.push(fiatPort);
	var portCurrentCryptoList = [];
	for(cryptoPort in myPortfolio[fiatPort]){
		portTableString = portTableString + '<tr><td>'+rowCounter+'</td><td>'+cryptoPort+'/'+fiatPort+'</td><td>'+myPortfolio[fiatPort][cryptoPort].amt+'</td><td>'+myPortfolio[fiatPort][cryptoPort].invst+'</td><td id="'+cryptoPort+'/'+fiatPort+whichInit+'val">⌛</td><td><span id="'+cryptoPort+'/'+fiatPort+whichInit+'diff" class="badge bg-green">--</span></td><td><span id="'+cryptoPort+'/'+fiatPort+whichInit+'prcnt" class="badge bg-green">--</span></td></tr>';
		rowCounter++;
		portCurrentCryptoList.push(cryptoPort);
	}
	var portTempObj = {};
	portTempObj.fiat=fiatPort;
	portTempObj.crypto=portCurrentCryptoList;
	portArr.push(portTempObj);
}

portTableString = portTableString + '<tr class="portfolioTotalRow"><td> </td><td>Grand Total</td><td> </td><td id="total'+whichInit+'invst">⌛</td><td id="total'+whichInit+'val">⌛</td><td><span id="total'+whichInit+'diff" class="badge bg-green">--</span></td><td><span id="total'+whichInit+'prcnt" class="badge bg-green">--</span></td></tr>';
portTableString = portTableString + '</table>';

// console.log(domElement);
document.getElementById(domElement).innerHTML=portTableString;

//////////////////////// Build URL ////////////////////////////

for(fiatPort1 in portArr){
	var tempUrl = "https://min-api.cryptocompare.com/data/price?fsym=";
	tempUrl = tempUrl + portArr[fiatPort1].fiat + "&tsyms=";
	for(cryptoPort1 in portArr[fiatPort1].crypto){
		if(cryptoPort1 == 0){
			tempUrl = tempUrl + portArr[fiatPort1].crypto[cryptoPort1];
		}
		else{
			tempUrl = tempUrl + ',' + portArr[fiatPort1].crypto[cryptoPort1];
		}
	}
	urlPort.push(tempUrl);
}
////////////////////////////////////////////////////////////////////////

////////////////////////// NEW FUNCTION ///////////////////////////////////////
function updateTotalPort(){
	var invstListForPie = [];
	for(fiatPort in myPortfolioWithAmtAsValue){
		for(cryptoPort in myPortfolioWithAmtAsValue[fiatPort]){
			if(fiatPort == baseCurrency){
				convertedInvst = parseFloat(myPortfolioWithAmtAsValue[fiatPort][cryptoPort].invst).toFixed(2);
				convertedVal = parseFloat(myPortfolioWithAmtAsValue[fiatPort][cryptoPort].amt).toFixed(2);

				totalInvst = parseFloat(totalInvst) + parseFloat(convertedInvst);
				totalValue = parseFloat(totalValue) + parseFloat(convertedVal);

				myPortfolioWithAmtAsValue[fiatPort][cryptoPort].invst = parseFloat(convertedInvst);
				if(invstListForPie.hasOwnProperty(cryptoPort)){
					invstListForPie[cryptoPort] = parseFloat(invstListForPie[cryptoPort]) + parseFloat(convertedInvst);
				}
				else{
					invstListForPie[cryptoPort] = parseFloat(convertedInvst);
				}
			}
			else{
				console.log("!!!!!!!!!!!!!!!!");
				convertedInvst = parseFloat(myPortfolioWithAmtAsValue[fiatPort][cryptoPort].invst).toFixed(2);
				convertedVal = parseFloat(myPortfolioWithAmtAsValue[fiatPort][cryptoPort].amt).toFixed(2);

				convertedInvst = parseFloat(convertedInvst) * (1/parseFloat(fiatConvRates[fiatPort]));
				convertedVal = parseFloat(convertedVal)*(1/parseFloat(fiatConvRates[fiatPort]));

				convertedInvst = parseFloat(convertedInvst).toFixed(2);
				convertedVal = parseFloat(convertedVal).toFixed(2);
				totalInvst = parseFloat(totalInvst) + parseFloat(convertedInvst);
				totalValue = parseFloat(totalValue) + parseFloat(convertedVal);
				myPortfolioWithAmtAsValue[fiatPort][cryptoPort].invst = parseFloat(convertedInvst);
				if(invstListForPie.hasOwnProperty(cryptoPort)){
					invstListForPie[cryptoPort] = parseFloat(invstListForPie[cryptoPort]) + parseFloat(convertedInvst);
				}
				else{
					invstListForPie[cryptoPort] = parseFloat(convertedInvst);
				}
			}
		}
	}
	var totalDiff = parseFloat(parseFloat(totalValue) - parseFloat(totalInvst)).toFixed(2);
	var totalPrcnt = parseFloat((parseFloat(totalDiff)/parseFloat(totalInvst))*100).toFixed(2);
	document.getElementById("total"+whichInit+"invst").innerHTML=parseFloat(totalInvst).toFixed(2);
	document.getElementById("total"+whichInit+"val").innerHTML=parseFloat(totalValue).toFixed(2);
	document.getElementById("total"+whichInit+"diff").innerHTML=totalDiff;
	document.getElementById("total"+whichInit+"prcnt").innerHTML=totalPrcnt + "%";
	if(totalInvst<totalValue){
		document.getElementById("total"+whichInit+"prcnt").className="badge bg-green";
		document.getElementById("total"+whichInit+"diff").className="badge bg-green";
	}
	else if(totalInvst>totalValue){
		document.getElementById("total"+whichInit+"prcnt").className="badge bg-red";
		document.getElementById("total"+whichInit+"diff").className="badge bg-red";
	}
	else{
		document.getElementById("total"+whichInit+"prcnt").className="badge bg-yellow";
		document.getElementById("total"+whichInit+"diff").className="badge bg-yellow";
	}


    drawPie(invstListForPie,1);
    myPortfolioWithAmtAsValue = JSON.parse(JSON.stringify(myPortfolio));
}

function loadCurrValuePort(fiatPort2, isLastFiat, lastFiat){
	var xhttpPort = new XMLHttpRequest(); // TODO: IE support
	xhttpPort.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var currvalPort = JSON.parse(this.responseText);
			for(currCrpto in currvalPort){
				var currVal1=parseFloat((1/currvalPort[currCrpto])*myPortfolio[fiatPort2][currCrpto].amt).toFixed(2);
				document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'val').innerHTML=currVal1;
				myPortfolioWithAmtAsValue[fiatPort2][currCrpto].amt = currVal1;
				var currPortDiff = (currVal1-myPortfolio[fiatPort2][currCrpto].invst);
				document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').innerHTML=parseFloat((currPortDiff/myPortfolio[fiatPort2][currCrpto].invst)*100).toFixed(2) + "%";
				document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').innerHTML=parseFloat(currPortDiff).toFixed(2);
				if(myPortfolio[fiatPort2][currCrpto].invst<currVal1){
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').className="badge bg-green";
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').className="badge bg-green";
				}
				else if(myPortfolio[fiatPort2][currCrpto].invst>currVal1){
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').className="badge bg-red";
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').className="badge bg-red";
				}
				else{
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').className="badge bg-yellow";
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').className="badge bg-yellow";
				}
				currVal1 = 0;
			}
			doneUpdtFlg = true;
			if(isLastFiat == lastFiat){
				waitForValues = false;
				if(waitForRates == false){
					waitForValues = true;
					waitForRates = true;
					console.log("Rates Completed");
					updateTotalPort();
				}
			}
		}
	};
	xhttpPort.open("GET", urlPort[urlPort1], true);
	xhttpPort.send();
}


function loadFiatConvObj(){
	var fiatConvertUrl = "";
	fiatConvertUrl = "https://min-api.cryptocompare.com/data/price?fsym="+baseCurrency+"&tsyms=";
	for(diffFiats in diffFiatList){
		if(diffFiats == 0){
			fiatConvertUrl = fiatConvertUrl + diffFiatList[diffFiats];
		}
		else{
			fiatConvertUrl = fiatConvertUrl + ',' + diffFiatList[diffFiats];
		}
	}
	var xhttp = new XMLHttpRequest();
  	xhttp.onreadystatechange = function() {
    	if (this.readyState == 4 && this.status == 200) {
     		fiatConvRates = JSON.parse(this.responseText);
			waitForRates = false;
			if(waitForValues == false){
				waitForRates = true;
				waitForValues = true;
				console.log("Values Completed");
				updateTotalPort();
			}
    	}
  	};
  	xhttp.open("GET", fiatConvertUrl, true);
  	xhttp.send();
}

function triggerLoadCurrValuePort(){
	doneUpdtFlg = false;
	loadFiatConvObj();
	for(urlPort1 in urlPort){
		loadCurrValuePort(portArr[urlPort1].fiat,urlPort1,(urlPort.length-1));
	}
}
//////////////////////////////////////////////////////////////////////////////

triggerLoadCurrValuePort();

portIntrvlId[0] = setInterval(function() {
	if(doneUpdtFlg == false){
		updtTimeout = updtTimeout + 10000;
	}
	triggerLoadCurrValuePort();
},updtTimeout);

}//full function end

