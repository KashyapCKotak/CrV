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

function triggerLoadTableAndUrl(whichInit){
	if(whichInit == 1){
		var myPortfolioInit = <?php echo $_SESSION['prsn_portfolio'];?>;
		prsnRootFiat=Object.keys(myPortfolioInit)[0];
		myPortfolioPrsn=myPortfolioInit[prsnRootFiat];
		console.log("Personal");
		console.log(prsnRootFiat);
		console.log(myPortfolioPrsn);
		portTableStringPrsn = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th>Diff</th><th style="width: 60px">%</th></tr>';
		loadTableAndUrl(myPortfolioPrsn, portTableStringPrsn, portArrPrsn, urlPortPrsn, "portfolioTablePersonal", portIntrvlIdPrsn, whichInit);
	}
	else if (whichInit == 2){
		var myPortfolioInit = <?php echo $_SESSION['prtc_portfolio'];?>;	
		prtcRootFiat=Object.keys(myPortfolioInit)[0];
		myPortfolioPrtc=myPortfolioInit[prtcRootFiat];
		console.log("Practice");
		console.log(prtcRootFiat);
		console.log(myPortfolioPrtc);
		portTableStringPrtc = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th>Diff</th><th style="width: 60px">%</th></tr>';
		loadTableAndUrl(myPortfolioPrtc, portTableStringPrtc, portArrPrtc, urlPortPrtc,  "portfolioTablePractice", portIntrvlIdPrtc, whichInit);
	}
}



function loadTableAndUrl(myPortfolio, portTableString, portArr, urlPort, domElement, portIntrvlId, whichInit){
urlPort = [];
portArr = [];
var rowCounter = 1;
for(fiatPort in myPortfolio){fiatPort
	var portCurrentCryptoList = [];
	for(cryptoPort in myPortfolio[fiatPort]){
		portTableString = portTableString + '<tr><td>'+rowCounter+'</td><td>'+cryptoPort+'/'+fiatPort+'</td><td>'+myPortfolio[fiatPort][cryptoPort].amt+'</td><td>'+myPortfolio[fiatPort][cryptoPort].invst+'</td><td id="'+cryptoPort+'/'+fiatPort+whichInit+'val">loading</td><td><span id="'+cryptoPort+'/'+fiatPort+whichInit+'diff" class="badge bg-green">--</span></td><td><span id="'+cryptoPort+'/'+fiatPort+whichInit+'prcnt" class="badge bg-green">--</span></td></tr>';
		rowCounter++;
		portCurrentCryptoList.push(cryptoPort);
	}
	var portTempObj = {};
	portTempObj.fiat=fiatPort;
	portTempObj.crypto=portCurrentCryptoList;
	portArr.push(portTempObj);
}
portTableString = portTableString + '</table>';
console.log(domElement);
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

///////////////////////////////////////////////////////////////
var doneUpdtFlg = false;
var updtTimeout = 20000;

triggerLoadCurrValuePort();

function triggerLoadCurrValuePort(){
	doneUpdtFlg = false;
	console.log(urlPort);
	console.log(portArr);
	for(urlPort1 in urlPort){
		loadCurrValuePort(portArr[urlPort1].fiat);
	}
}

portIntrvlId[0] = setInterval(function() {
	if(doneUpdtFlg == false){
		updtTimeout = updtTimeout + 10000;
		//console.log(updtTimeout); //TODO : not working properly
	}
	console.log("updt");
	console.log(portIntrvlId);
	triggerLoadCurrValuePort();
},updtTimeout);

////////////////////////// NEW FUNCTION ///////////////////////////////////////

function loadCurrValuePort(fiatPort2){
	var xhttpPort = new XMLHttpRequest(); // TODO: IE support
	xhttpPort.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var currvalPort = JSON.parse(this.responseText);
			for(currCrpto in currvalPort){
				console.log(" In For " + currCrpto + "/" + fiatPort2);
				// console.log(urlPort[urlPort1]);
				console.log(currvalPort);
				console.log(currvalPort[currCrpto])
				console.log(myPortfolio[fiatPort2][currCrpto].amt);
				var currVal=(1/currvalPort[currCrpto])*myPortfolio[fiatPort2][currCrpto].amt;
				document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'val').innerHTML=parseFloat(currVal).toFixed(2);
				var currPortDiff = (currVal-myPortfolio[fiatPort2][currCrpto].invst);
				document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').innerHTML=parseFloat((currPortDiff/myPortfolio[fiatPort2][currCrpto].invst)*100).toFixed(2) + "%";
				document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').innerHTML=parseFloat(currPortDiff).toFixed(2);
				if(myPortfolio[fiatPort2][currCrpto].invst<currVal){
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').className="badge bg-green";
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').className="badge bg-green";
				}
				else if(myPortfolio[fiatPort2][currCrpto].invst>currVal){
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').className="badge bg-red";
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').className="badge bg-red";
				}
				else{
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'prcnt').className="badge bg-yellow";
					document.getElementById(currCrpto+'/'+fiatPort2+whichInit+'diff').className="badge bg-yellow";
				}
			}
		}
		doneUpdtFlg = true;
	};
	xhttpPort.open("GET", urlPort[urlPort1], true);
	xhttpPort.send();
}
}
////////////////////////////////////////////////////////////////////