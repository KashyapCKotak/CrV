<?php
session_start();
session_destroy();
unset($_SESSION['cryptoview_user']);
header("Location: ../dashboard.php");
?>