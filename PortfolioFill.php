<?php
session_start();?>
var which = 1;
	if(which == 1){
		var myPortfolio = <?php echo $_SESSION['prsn_portfolio'];?>;
	}
	else if (which == 2){
		var myPortfolio = <?php echo $_SESSION['prtc_portfolio'];?>;	
	}
	var portTableString = null;
	var portCurrentFiatList = [];
	var portObj = {};
	var portCurrentCrypto = null;
	var portTempObj = {};

	// var myPortfolio1 = JSON.parse(myPortfolio);
	for(cryptoPort in myPortfolio.prsnprtf){
		currentCrypto = cryptoPort;
		for(fiatPort in myPortfolio.prsnprtf.cryptoPort){
			portTableString = portTableString + '<tr><td>1.</td><td>'+cryptoPort+'/'+fiatPort+'</td><td>9999999.6523</td><td>58569689.56</td><td>98569689.56</td><td><span class="badge bg-green">55%</span></td></tr>';
			portCurrentFiatList.push(fiatPort);
		}
		portTempObj.crypto=cryptoPort;
		portTempObj.fiat=portCurrentFiatList;
		portObj.push(portTempObj);
	}
	console.log(portObj);