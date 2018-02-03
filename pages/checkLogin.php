<?php
	session_start();
        $loggedIn = false;
	if(isset($_SESSION['cryptoview_user'])){
                $loggedIn = true;
        }
?>