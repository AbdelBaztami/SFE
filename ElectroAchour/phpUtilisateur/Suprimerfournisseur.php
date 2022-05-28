<?php
require "inc_commun.php";
$ID=mysqli_real_escape_string($link,$_GET['ID']);
$req="delete from fournisseur where (ID='$ID')";
mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
header("Location: consulterfournisseur.php");
// require_once " consulterfournisseur.php"
?>