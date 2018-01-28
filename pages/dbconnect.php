<?php
$db_host = "localhost";
$db_username = "root";
$db_password = "";
$db_name =  "cryptoview";
// $conn = mysql_connect("$db_host", "$db_username", "$db_password") or die("Could not connect to MYSQL");
// @mysql_select_db("$db_name") or die("Could not connect to database schema");

$mysqli = new mysqli($db_host, $db_username, $db_password, $db_name);
if ($mysqli->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$mysqli->select_db($db_name);
?>