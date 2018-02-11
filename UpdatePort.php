<?php
include ($_SERVER['DOCUMENT_ROOT'].'/AdminLTE-2.4.2/pages/dbconnect.php');
session_start();
//error_log("============================================================================================================================================================================================================================================");
//don't display errors
// ini_set('display_errors', 0);
//write errors to log
// ini_set('log_errors', 1);
//error log file name
// ini_set('log_errors', 'c:/wamp64/php_error.log');

// error_reporting(E_ALL);

// data: { cryptoVal : selectedCryptoValue, fiatVal : selectedFiatValue, cryptoAmt : inputCryptoAmount, fiatAmt : inputFiatAmount, portfolioType : portType}

// '{"prsnprtf":{"ETH":{"invst":67900.5,"amt":"67950.0"},"BTC":{"invst":62800.0,"amt":"629999.0"},"LTC":{"invst":67900.5,"amt":"67950.0"},"XRP":{"invst":67900.5,"amt":"67950.0"}}}';

if($_POST["portfolioType"] == "Personal") {
	$portType = "prsn_portfolio";
	$portJsonRoot="prsnprtf";
}
else if ($_POST["portfolioType"] == "Practice") {
	$portType = "prtc_portfolio";
	$portJsonRoot="prtcprtf";
}
$cryptoview_user=$_SESSION["cryptoview_user"];

$sql1 = "SELECT  $portType  FROM `portfolio` WHERE `username` LIKE '$cryptoview_user'";
$result1 = $mysqli->query($sql1);
	//error_log(json_encode($sql1));
$num_rows1 = $result1->num_rows;
$row1 = $result1->fetch_assoc();

if($num_rows1 == 1) {
	$newArray = array ($_POST['cryptoVal'] => array ($_POST['fiatVal'] => array ("invst" => $_POST['fiatAmt'], "amt" => $_POST['cryptoAmt'])));

	$tempArray = json_decode($row1[$portType], true);
	if(array_key_exists($_POST['cryptoVal'], $tempArray[$portJsonRoot])) {
		if(array_key_exists($_POST['fiatVal'], $tempArray[$portJsonRoot][$_POST['cryptoVal']])){
			$tempArray[$portJsonRoot][$_POST['cryptoVal']][$_POST['fiatVal']]["invst"]=$_POST['fiatAmt'];
			$tempArray[$portJsonRoot][$_POST['cryptoVal']][$_POST['fiatVal']]["amt"]=$_POST['cryptoAmt'];
			
			if($tempArray[$portJsonRoot][$_POST['cryptoVal']][$_POST['fiatVal']]["amt"]==0){
				unset($tempArray[$portJsonRoot][$_POST['cryptoVal']][$_POST['fiatVal']]);
			}
			if(sizeof($tempArray[$portJsonRoot][$_POST['cryptoVal']],0)==0){
				unset($tempArray[$portJsonRoot][$_POST['cryptoVal']]);
			}
		}
		else{
			$tempArray[$portJsonRoot][$_POST['cryptoVal']][$_POST['fiatVal']]=$newArray[$_POST['cryptoVal']][$_POST['fiatVal']];
		}
	}
	else {
		$tempArray[$portJsonRoot][$_POST['cryptoVal']]=$newArray[$_POST['cryptoVal']];
	}
	$tempArrayString = json_encode($tempArray);
	$sql2 = "UPDATE `portfolio` SET $portType = '$tempArrayString' WHERE `username` LIKE '$cryptoview_user'";
		//error_log($sql2);
	$mysqli->query($sql2);
	if(($mysqli->affected_rows) > 0 ) {
		if(($mysqli->affected_rows)==1) {
			if($portType=="prsn_portfolio"){
				$_SESSION['prsn_portfolio'] = $tempArrayString;
				echo "1";//"Personal Portfolio Updated!";
			}
			if($portType=="prtc_portfolio"){
				$_SESSION['prtc_portfolio'] = $tempArrayString;
				echo "1";//"Practice Portfolio Updated!";
			}
		}
		else {
			if($portType=="prsn_portfolio"){
				$_SESSION['prsn_portfolio'] = $tempArrayString;
				echo "2";//"Updated, But something wrong while executing this operation. Please contact support immediately";
			}
			if($portType=="prtc_portfolio"){
				$_SESSION['prtc_portfolio'] = $tempArrayString;
				echo "2";//Updated, But something wrong while executing this operation. Please contact support immediately";
			}
		}
	}
	else {
		echo "3";//"Update Unsuccessful";
	}
}
else{
	header("Location: /pages/login.php");
}
header("portfolio.php");
?>