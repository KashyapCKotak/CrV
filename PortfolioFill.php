<?php
session_start();?>
var which = 1;
if(which == 1){
	var myPortfolio = <?php echo $_SESSION['prsn_portfolio'];?>;
}
else if (which == 2){
	var myPortfolio = <?php echo $_SESSION['prtc_portfolio'];?>;	
}
var portTableString = '<table class="table table-condensed table-striped"><tr><th style="width: 10px">#</th><th>Name</th><th>Quantity</th><th>Investment</th><th>Value</th><th style="width: 80px">%</th></tr>';
var portArr = [];
var portCurrentCrypto = null;
var rowCounter = 1;


// var myPortfolio1 = JSON.parse(myPortfolio);
console.log(JSON.stringify(myPortfolio));
for(cryptoPort in myPortfolio.prsnprtf){
	console.log(cryptoPort);
	currentCrypto = cryptoPort;
	var portCurrentFiatList = [];
	for(fiatPort in myPortfolio.prsnprtf[cryptoPort]){
		console.log(fiatPort);
		portTableString = portTableString + '<tr><td>'+rowCounter+'</td><td>'+cryptoPort+'/'+fiatPort+'</td><td>'+myPortfolio.prsnprtf[cryptoPort][fiatPort].amt+'</td><td>'+myPortfolio.prsnprtf[cryptoPort][fiatPort].invst+'</td><td id="'+cryptoPort+'/'+fiatPort+'val">loading</td><td><span id="'+cryptoPort+'/'+fiatPort+'prcnt" class="badge bg-green">--</span></td></tr>';
		console.log(portTableString);
		rowCounter++;
		portCurrentFiatList.push(fiatPort);
	}
	var portTempObj = {};
	portTempObj.crypto=cryptoPort;
	portTempObj.fiat=portCurrentFiatList;
	portArr.push(portTempObj);
}
document.getElementById("portfolioTablePersonal").innerHTML=portTableString;
////////////////////// AJAX here only //////////////////////////////
////////////////////////////////////////////////////////////////////


