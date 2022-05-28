<?php
require "inc_commun.php";
$ID=mysqli_real_escape_string($link,$_GET['ID']);
$NomComplet=$_POST['txtNomFournisseur'];
$MontantTTC=$_POST['txtTTC'];
$Avance=$_POST['txtAvance'];
$DateF=$_POST['txtDateF'];
$dateFormated = explode('/', $DateF);
$DateF = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];
$Delai=$_POST['txtDelai'];
$DelaiFormated = explode('/', $Delai);
$Delai = $DelaiFormated[2].'-'.$DelaiFormated[1].'-'.$DelaiFormated[0];
$req="update fournisseur set NomComplet='$NomComplet',MontantTTC='$MontantTTC',Avance='$Avance',Date='$DateF',DernierDelai='$Delai' where ID='$ID'";
mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
header("Location:consulterfournisseur.php")
?>