<?php
session_start();?>
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

var portIntrvlId;

if(whichInit == 1){
	var myPortfolioInit = <?php echo $_SESSION['prsn_portfolio'];?>;
	myPortfolioPrsn=myPortfolioInit.prsnprtf;
	portTableStringPrsn = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th>Diff</th><th style="width: 60px">%</th></tr>';
	loadTableAndUrl(myPortfolioPrsn, portTableStringPrsn, portArrPrsn, urlPortPrsn, "portfolioTablePersonal");
}
else if (whichInit == 2){
	var myPortfolioInit = <?php echo $_SESSION['prtc_portfolio'];?>;	
	myPortfolioPrtc=myPortfolioInit.prtcprtf;
	portTableStringPrtc = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th>Diff</th><th style="width: 60px">%</th></tr>';
	loadTableAndUrl(myPortfolioPrtc, portTableStringPrtc, portArrPrtc, urlPortPrtc,  "portfolioTablePractice");
}



function loadTableAndUrl(myPortfolio, portTableString, portArr, urlPort, domElement){
var rowCounter = 1;
// var myPortfolio1 = JSON.parse(myPortfolio);
// console.log(JSON.stringify(myPortfolio));
for(cryptoPort in myPortfolio){
	// console.log(cryptoPort);
	var portCurrentFiatList = [];
	for(fiatPort in myPortfolio[cryptoPort]){
		// console.log(fiatPort);
		portTableString = portTableString + '<tr><td>'+rowCounter+'</td><td>'+cryptoPort+'/'+fiatPort+'</td><td>'+myPortfolio[cryptoPort][fiatPort].amt+'</td><td>'+myPortfolio[cryptoPort][fiatPort].invst+'</td><td id="'+cryptoPort+'/'+fiatPort+'val">loading</td><td><span id="'+cryptoPort+'/'+fiatPort+'diff" class="badge bg-green">--</span></td><td><span id="'+cryptoPort+'/'+fiatPort+'prcnt" class="badge bg-green">--</span></td></tr>';
		// console.log(portTableString);
		rowCounter++;
		portCurrentFiatList.push(fiatPort);
	}
	var portTempObj = {};
	portTempObj.crypto=cryptoPort;
	portTempObj.fiat=portCurrentFiatList;
	portArr.push(portTempObj);
}
portTableString = portTableString + '</table>';
document.getElementById(domElement).innerHTML=portTableString;

//////////////////////// Build URL ////////////////////////////

for(cryptoPort1 in portArr){
	var tempUrl = "https://min-api.cryptocompare.com/data/price?fsym=";
	tempUrl = tempUrl + portArr[cryptoPort1].crypto + "&tsyms=";
	for(fiatPort1 in portArr[cryptoPort1].fiat){
		if(fiatPort1 == 0){
			tempUrl = tempUrl + portArr[cryptoPort1].fiat[fiatPort1];
		}
		else{
			tempUrl = tempUrl + ',' + portArr[cryptoPort1].fiat[fiatPort1];
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
	for(urlPort1 in urlPort){
		loadCurrValuePort(portArr[urlPort1].crypto);
	}
}

portIntrvlId = setInterval(function() {
	if(doneUpdtFlg == false){
		updtTimeout = updtTimeout + 10000;
		console.log(updtTimeout);
	}
	console.log("updt");
	triggerLoadCurrValuePort();
},updtTimeout);

////////////////////////// NEW FUNCTION ///////////////////////////////////////

function loadCurrValuePort(currCrpto){
	var xhttpPort = new XMLHttpRequest(); // TODO: IE support
	xhttpPort.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			var currvalPort = JSON.parse(this.responseText);
			for(fiatPort2 in currvalPort){
				var currVal=currvalPort[fiatPort2]*myPortfolio[currCrpto][fiatPort2].amt;
				document.getElementById(currCrpto+'/'+fiatPort2+'val').innerHTML=parseFloat(currVal).toFixed(2);
				var currPortDiff = (currVal-myPortfolio[currCrpto][fiatPort2].invst);
				document.getElementById(currCrpto+'/'+fiatPort2+'prcnt').innerHTML=parseFloat((currPortDiff/myPortfolio[currCrpto][fiatPort2].invst)*100).toFixed(2) + "%";
				document.getElementById(currCrpto+'/'+fiatPort2+'diff').innerHTML=parseFloat(currPortDiff).toFixed(2);
				if(myPortfolio[currCrpto][fiatPort2].invst<currVal){
					document.getElementById(currCrpto+'/'+fiatPort2+'prcnt').className="badge bg-green";
					document.getElementById(currCrpto+'/'+fiatPort2+'diff').className="badge bg-green";
				}
				else if(myPortfolio[currCrpto][fiatPort2].invst>currVal){
					document.getElementById(currCrpto+'/'+fiatPort2+'prcnt').className="badge bg-red";
					document.getElementById(currCrpto+'/'+fiatPort2+'diff').className="badge bg-red";
				}
				else{
					document.getElementById(currCrpto+'/'+fiatPort2+'prcnt').className="badge bg-yellow";
					document.getElementById(currCrpto+'/'+fiatPort2+'diff').className="badge bg-yellow";
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
