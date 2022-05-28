<?php
require "inc_commun.php";
$Nomcomplet=$_POST['txtNomFournisseur'];
$TTC=$_POST['txtTTC'];
$Avance=$_POST['txtAvance'];
$Reste=$TTC-$Avance;
$DateF1=$_POST['txtDateF'];
$Delai1=$_POST['txtDelai'];
$dateFormated = explode('/', $DateF1);
$DateF = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];
$DelaiFormated = explode('/', $Delai1);
$Delai = $DelaiFormated[2].'-'.$DelaiFormated[1].'-'.$DelaiFormated[0];
$req="insert into fournisseur (NomComplet,MontantTTC,Avance,Date,DernierDelai) values ('$Nomcomplet','$TTC','$Avance','$DateF','$Delai')";
mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
require "header_et_menu.php";
?>
<CENTER>
<br>
<h1 class="stock">Fournisseur : </h1>
<br>
<table class="tableCommune">
<tr><th>Nom de fournisseur</th><th>Montant TTC</th><th>Avance</th><th>Reste</th><th>Date</th><th>Dernier Delai</th></tr>
<tr><td><?php echo "$Nomcomplet" ?></td><td><?php echo "$TTC" ?></td><td><?php echo "$Avance" ?></td><td><?php echo "$Reste" ?></td><td><?php echo "$DateF1" ?></td><td><?php echo "$Delai1" ?></td></tr>
</table>
<br><br>
<a class="menu" href="pagePrincipale.php">Retour Page Accueil</a>

</CENTER>