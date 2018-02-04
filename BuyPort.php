<?php
include ($_SERVER['DOCUMENT_ROOT'].'/AdminLTE-2.4.2/pages/dbconnect.php');

// data: { cryptoVal : selectedCryptoValue, fiatVal : selectedFiatValue, cryptoAmt : inputCryptoAmount, fiatAmt : inputFiatAmount, portfolioType : portType}

// '{"prsnprtf":{"ETH":{"invst":67900.5,"amt":"67950.0"},"BTC":{"invst":62800.0,"amt":"629999.0"},"LTC":{"invst":67900.5,"amt":"67950.0"},"XRP":{"invst":67900.5,"amt":"67950.0"}}}';

function buyPortFunction() {
	if($_POST["portfolioType"] == "personal") {
		$portType = "prsn_portfolio";
	}
	else if ($_POST["portfolioType"] == "practice") {
		$portType = "prtc_portfolio";
	}
	$cryptoview_user=$_SESSION["cryptoview_user"];

	$sql1 = "SELECT  '$portType'  FROM `portfolio` WHERE `username` LIKE '$cryptoview_user'";
	$result1 = $mysqli->query( $sql);
	$num_rows1 = $result->num_rows;
	$row1 = $result->fetch_assoc();

	if($num_rows1 == 1) {
		$newArray = array ($crypto2 => array ($fiat1 => array ("invst" => $invst, "amt" => $amt)));
		var_dump("----------NEW ARRAY---------");
		var_dump($newArray);
		var_dump("----------OLD ARRAY---------");

		$tempArray = json_decode($row[$portType], true);
		var_dump($tempArray);

		if(array_key_exists($crypto2, $tempArray["prsnprtf"])) {
			var_dump("--------------crypto TRUE");
			if(array_key_exists($fiat1, $tempArray["prsnprtf"][$crypto1])){
				var_dump("-----------------fiat exists");
				$tempArray["prsnprtf"][$crypto1][$fiat1]["invst"]=$tempArray["prsnprtf"][$crypto1][$fiat1]["invst"]+50;
				var_dump($tempArray["prsnprtf"][$crypto1][$fiat1]["invst"]);
			}
			else{
				var_dump("-----------------add fiat");
				array_push($tempArray["prsnprtf"][$crypto1],$tempArray["prsnprtf"][$crypto1][$fiat1]=$newArray[$crypto1][$fiat1]);
				var_dump($tempArray["prsnprtf"][$crypto1]);
			}
		}
		else {
			var_dump("----------------FALSE");
			$tempArray["prsnprtf"][$crypto2]=$newArray[$crypto2];
			var_dump($tempArray);
			var_dump("----------------added crypto");
		}
		var_dump(json_encode($tempArray));
		$sql1 = "UPDATE `portfolio` SET '$portType' = 'json_encode($tempArray)' WHERE `username` LIKE '$cryptoview_user'";
		error_log(print_r($sql, TRUE)); 
		if($result1 = $mysqli->query($sql)) {
			if(($mysqli->affected_rows)==1) {
				if(portType=="prsn_portfolio")
					echo "Personal Portfolio Updated!";
				if(portType=="prtc_portfolio")
					echo "Practice Portfolio Updated!";
			}
			else {
				echo "Updated, But something wrong while executing this operation. Please contact support immediately";
			}
		}
		else {
			echo "Update Unsuccessful";
		}
	}
	else{
		header("Location: /pages/login.php");
	}
}
?>