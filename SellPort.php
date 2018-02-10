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
if($_POST["portfolioType"] == "personal") {
	$portType = "prsn_portfolio";
}
else if ($_POST["portfolioType"] == "practice") {
	$portType = "prtc_portfolio";
}

$cryptoview_user=$_SESSION["cryptoview_user"];

$sql1 = "SELECT  $portType  FROM `portfolio` WHERE `username` LIKE '$cryptoview_user'";
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
	$tempArray = json_decode($row1[$portType], true);
		//error_log(json_encode($tempArray));

	if(array_key_exists($_POST['cryptoVal'], $tempArray["prsnprtf"])) {
			//error_log("--------------crypto TRUE");
		if(array_key_exists($_POST['fiatVal'], $tempArray["prsnprtf"][$_POST['cryptoVal']])){
				//error_log("-----------------fiat exists");
			$tempCryptAmt=$tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]["amt"];
			$tempFiatInvst=$tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]["invst"];

			if(($tempCryptAmt-$_POST['cryptoAmt'])<0){
				echo "Insuffecient Balance";
				return;
			}

			$tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]["invst"]=($tempFiatInvst/$tempCryptAmt)*($tempCryptAmt-$_POST['cryptoAmt']);

			$tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]["amt"]=$tempCryptAmt-$_POST['cryptoAmt'];

			if($tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]["amt"]==0){
				unset($tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]);
			}
			if(sizeof($tempArray["prsnprtf"][$_POST['cryptoVal']],0)==0){
				unset($tempArray["prsnprtf"][$_POST['cryptoVal']]);
			}
				//error_log(print_r($tempArray["prsnprtf"][$_POST['cryptoVal']][$_POST['fiatVal']]["invst"]));
		}
		else{
				//error_log("-----------------add fiat");
			echo "You do not have portfolio for " . $_POST['cryptoVal'] . "/" . $_POST['fiatVal'] . " pair.";
			return;
				//error_log(print_r($tempArray["prsnprtf"][$_POST['cryptoVal']]));
		}
	}
	else {
			//error_log("----------------FALSE");
		echo "You do not have any portfolio for " . $_POST['cryptoVal'] . ".";
		return;
			//error_log(json_encode($tempArray));
			//error_log("----------------added crypto");
	}

	$tempArrayString = json_encode($tempArray);
	$sql2 = "UPDATE `portfolio` SET $portType = '$tempArrayString' WHERE `username` LIKE '$cryptoview_user'";
		//error_log($sql2);
	$mysqli->query($sql2);
	if(($mysqli->affected_rows) > 0 ) {
		if(($mysqli->affected_rows)==1) {
			if($portType=="prsn_portfolio"){
				$_SESSION['prsn_portfolio'] = $tempArrayString;
				echo "Personal Portfolio Updated!";
			}
			if($portType=="prtc_portfolio"){
				$_SESSION['prtc_portfolio'] = $tempArrayString;
				echo "Practice Portfolio Updated!";
			}
		}
		else {
			if($portType=="prsn_portfolio"){
				$_SESSION['prsn_portfolio'] = $tempArrayString;
				echo "Updated, But something wrong while executing this operation. Please contact support immediately";
			}
			if($portType=="prtc_portfolio"){
				$_SESSION['prtc_portfolio'] = $tempArrayString;
				echo "Updated, But something wrong while executing this operation. Please contact support immediately";
			}
		}
	}
	else {
		echo "Update Unsuccessful";
	}
}
else{
	header("Location: /pages/login.php");
}
?>