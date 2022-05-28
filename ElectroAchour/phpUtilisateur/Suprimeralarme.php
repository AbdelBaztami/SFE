<?php
require "inc_commun.php";
$Reference=mysqli_real_escape_string($link,$_GET['Reference']);
$req="delete from alarme where (Reference='$Reference')";
mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
header("Location: consulteralarme.php");
// require_once " consulteralarme.php"
?>