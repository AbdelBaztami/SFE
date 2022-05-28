<?php
$sname= "127.0.0.1";
$unmae= "root";
$password = "";

$db_name = "system_db";

$link = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$link) {
	echo "Connection failed!";
}