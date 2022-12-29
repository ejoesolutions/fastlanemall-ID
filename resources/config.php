<?php
$dbHost = "localhost";
$dbUsername = "root";
$dbPassword = "";//admin@@123_
$dbName = "goldfast_shop";

//function mysql_conn($dbhost, $dbusername, $dbpassword, $dbname){
	global $conn;
	$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
	if ($conn->connect_error) {
		die("Connection Aborted : " . $conn->connect_error);
	}
//}

//mysql_conn($dbHost, $dbUsername, $dbPassword, $dbName);


date_default_timezone_set("Asia/Kuala_Lumpur");
?>
