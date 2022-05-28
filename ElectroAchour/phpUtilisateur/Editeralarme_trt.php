<?php
require "inc_commun.php";
$Reference=$_POST['txtReference'];
$Nomcomplet=$_POST['txtNomComplet'];
$Montant=$_POST['txtMontant'];
$Payment=$_POST['txtPayment'];
$Date=$_POST['txtDate'];
$dateFormated = explode('/', $Date);
$Date = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];
$Heure=$_POST['txtHeure'];
$req="update alarme set Nomcomplet='$Nomcomplet',Montant='$Montant',Payment='$Payment',Date='$Date',Heure='$Heure' where Reference='$Reference'";
mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
header("Location: consulteralarme.php")
?>