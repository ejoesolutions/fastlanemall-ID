<?php
$dbHost = "localhost";
$dbUsername = "goldfast_cf";//kgtcommy_wakalah
$dbPassword = "admin@@123_";//admin@123
$dbName = "goldfast_coffee";//kgtcommy_wakalah

function mysql_conn($dbhost, $dbusername, $dbpassword, $dbname){
	global $conn;
	$conn = new mysqli($dbhost, $dbusername, $dbpassword, $dbname);
	if ($conn->connect_error) {
		die("Connection Aborted : " . $conn->connect_error);
	}
}

mysql_conn($dbHost, $dbUsername, $dbPassword, $dbName);


date_default_timezone_set("Asia/Kuala_Lumpur");
?>
