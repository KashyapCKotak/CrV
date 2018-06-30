<?php
include ($_SERVER['DOCUMENT_ROOT'].'/AdminLTE-2.4.2/pages/dbconnect.php');
session_start();
error_log("changeBaseCcy");
if(isset($_POST["baseCurrency"])){
    error_log("changeBaseCcy");
    error_log($_SESSION['prsn_portfolio']);
    error_log($_SESSION['prtc_portfolio']);
    if(isset($_SESSION['prsn_portfolio']) && $_SESSION['prsn_portfolio'] != '' && isset($_SESSION['prsn_portfolio']) && $_SESSION['prsn_portfolio'] != ''){
        error_log("changeBaseCcy");
        $prsnObj=json_decode($_SESSION['prsn_portfolio'],true);
        reset($prsnObj);
        $prsnRoot=key($prsnObj);

        $prtcObj=json_decode($_SESSION['prtc_portfolio'],true);
        reset($prtcObj);
        $prtcRoot=key($prtcObj);

        error_log($prtcRoot);

        $newRoot=$_POST["baseCurrency"];

        $prsnObj[$newRoot] = $prsnObj[$prsnRoot];
        unset($prsnObj[$prsnRoot]);
        $prsnObj=json_encode($prsnObj);

        $newRoot=$_POST["baseCurrency"];
        $prtcObj[$newRoot] = $prtcObj[$prtcRoot];
        unset($prtcObj[$prtcRoot]);
        $prtcObj=json_encode($prtcObj);

        error_log($prsnObj);
        error_log($prtcObj);    

        $userid=$_SESSION["userid"];
        $sql1 = "UPDATE `portfolio` SET `prsn_portfolio` = '$prsnObj', `prtc_portfolio` = '$prtcObj' WHERE `userid` = '$userid'";
		// $sql2 = "UPDATE `portfolio` SET $portType = '$tempArrayString' WHERE `username` LIKE 'dhinchak'";
        //error_log($sql2);
        //$sql2 = "UPDATE `portfolio` SET `prtc_portfolio` = '$prtcObj' WHERE `userid` = '$userid'";
		// $sql2 = "UPDATE `portfolio` SET $portType = '$tempArrayString' WHERE `username` LIKE 'dhinchak'";
		//error_log($sql2);
		//$mysqli->query($sql2);
		$mysqli->query($sql1);
		if(($mysqli->affected_rows) > 0 ) {
			if(($mysqli->affected_rows)==1) {
                $_SESSION['prsn_portfolio'] = $prsnObj;
                $_SESSION['prtc_portfolio'] = $prtcObj;
                echo "1";//"Personal Portfolio Updated!";
			}
			else {
                $_SESSION['prsn_portfolio'] = $prsnObj;
                $_SESSION['prtc_portfolio'] = $prtcObj;
                echo "2";//"Something went wrong and its very serious. Please contact support immediately";
			}
		}
		else {
			echo "3";//"Update Unsuccessful";
        }
        
        
		// if(($mysqli2->affected_rows) > 0 ) {
		// 	if(($mysqli2->affected_rows)==1) {
        //         $_SESSION['prtc_portfolio'] = $prtcObj;
        //         echo "1";//"Personal Portfolio Updated!";
		// 	}
		// 	else {
        //         $_SESSION['prtc_portfolio'] = $prtcObj;
        //         echo "2";//"Something went wrong and its very serious. Please contact support immediately";
		// 	}
		// }
		// else {
		// 	echo "3";//"Update Unsuccessful";
		// }
    }
}
?>