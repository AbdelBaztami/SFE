<?php
require_once "../phpCommun/fonctionsSql.php";
require "../phpCommun/commun.php";
require_once "../phpCommun/db_connection.php";
$CIN=mysqli_real_escape_string($link,$_GET['CIN']);
$req="delete from employes where (CIN='$CIN')";
mysqli_query($link,$req) or die(mysqli_error($link));
header("Location: Gestionemp.php");
?>