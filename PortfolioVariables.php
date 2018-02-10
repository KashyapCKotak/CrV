<?php
session_start();?>
var whichInit = 1;
if(whichInit == 1){
	var myPortfolioInit = <?php echo $_SESSION['prsn_portfolio'];?>;
	myPortfolio=myPortfolioInit.prsnprtf;
}
else if (whichInit == 2){
	var myPortfolioInit = <?php echo $_SESSION['prtc_portfolio'];?>;	
	myPortfolio=myPortfolioInit.prtcprtf;
}