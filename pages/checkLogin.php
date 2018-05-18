<?php
	session_start();
        $loggedIn = false;
	if(isset($_SESSION['userid'])){
                $loggedIn = true;
        }
?>