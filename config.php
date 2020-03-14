<?php
session_start();
$root	 = "../";
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "db_raport_digital";

$con = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if(mysqli_connect_errno()){
	echo 'ERROR: Could not connect to database!: '.mysqli_connect_error();
}
?>
