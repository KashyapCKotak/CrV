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

$userid=$_SESSION["userid"];

$sql1 = "SELECT  $portType  FROM `portfolio` WHERE `userid` = '$userid'";
$result1 = $mysqli->query($sql1);
	//error_log(json_encode($sql1));
$num_rows1 = $result1->num_rows;
$row1 = $result1->fetch_assoc();

if($num_rows1 == 1) {
	$newArray = array ($_POST['cryptoVal'] => array ($_POST['fiatVal'] => array ("invst" => $_POST['fiatAmt'], "amt" => $_POST['cryptoAmt'])));
		//error_log("----------NEW ARRAY---------");
		//error_log(json_encode($newArray));
		//error_log("----------OLD ARRAY---------");
		//error_log(json_encode($row1));
	error_log(json_encode($newArray));
	$tempArray = json_decode($row1[$portType], true);
	$portJsonRoot=array_keys($tempArray);
	error_log("This is temp Array");
	error_log(json_encode($tempArray));
	$portJsonRoot=$portJsonRoot[0];
	error_log($portJsonRoot);
	//error_log(json_encode($tempArray));

	if(array_key_exists($_POST['fiatVal'], $tempArray[$portJsonRoot])) {
			//error_log("--------------crypto TRUE");
		if(array_key_exists($_POST['cryptoVal'], $tempArray[$portJsonRoot][$_POST['fiatVal']])){
				//error_log("-----------------fiat exists");
			$tempCryptAmt=$tempArray[$portJsonRoot][$_POST['fiatVal']][$_POST['cryptoVal']]["amt"];
			$tempFiatInvst=$tempArray[$portJsonRoot][$_POST['fiatVal']][$_POST['cryptoVal']]["invst"];

			if(($tempCryptAmt-$_POST['cryptoAmt'])<0){
				echo "Insuffecient Balance";
				return;
			}

			$tempArray[$portJsonRoot][$_POST['fiatVal']][$_POST['cryptoVal']]["invst"]=($tempFiatInvst/$tempCryptAmt)*($tempCryptAmt-$_POST['cryptoAmt']);

			$tempArray[$portJsonRoot][$_POST['fiatVal']][$_POST['cryptoVal']]["amt"]=$tempCryptAmt-$_POST['cryptoAmt'];

			if($tempArray[$portJsonRoot][$_POST['fiatVal']][$_POST['cryptoVal']]["amt"]==0){
				unset($tempArray[$portJsonRoot][$_POST['fiatVal']][$_POST['cryptoVal']]);
			}
			if(sizeof($tempArray[$portJsonRoot][$_POST['fiatVal']],0)==0){
				unset($tempArray[$portJsonRoot][$_POST['fiatVal']]);
			}
				//error_log(print_r($tempArray[$portJsonRoot][$_POST['cryptoVal']][$_POST['fiatVal']]["invst"]));
		}
		else{
				//error_log("-----------------add fiat");
			echo "You do not have portfolio for " . $_POST['cryptoVal'] . "/" . $_POST['fiatVal'] . " pair.";
			return;
				//error_log(print_r($tempArray[$portJsonRoot][$_POST['cryptoVal']]));
		}
	}
	else {
			//error_log("----------------FALSE");
		echo "You do not have portfolio for " . $_POST['cryptoVal'] . "/" . $_POST['fiatVal'] . " pair.";
		return;
			//error_log(json_encode($tempArray));
			//error_log("----------------added crypto");
	}

	$tempArrayString = json_encode($tempArray);
	error_log("!!!!!!!!!!!!!!!!!!!!");
	error_log($tempArrayString);
	 $sql2 = "UPDATE `portfolio` SET $portType = '$tempArrayString' WHERE `userid` = '$userid'";
	//$sql2 = "UPDATE `portfolio` SET $portType = '$tempArrayString' WHERE `username` LIKE 'dhinchak'";
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
				echo "1";//"Personal Portfolio Updated!";
			}
		}
		else {
			if($portType=="prsn_portfolio"){
				$_SESSION['prsn_portfolio'] = $tempArrayString;
				echo "2";//"Updated, But something wrong while executing this operation. Please contact support immediately";
			}
			if($portType=="prtc_portfolio"){
				$_SESSION['prtc_portfolio'] = $tempArrayString;
				echo "2";//"Updated, But something wrong while executing this operation. Please contact support immediately";
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