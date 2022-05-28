<?php
require ("inc_commun.php");
$Reference=mysqli_real_escape_string($link,$_POST['txtReference']);
$Nomcomplet=$_POST['txtNomComplet'];
$Montant=$_POST['txtMontant'];
$Payment=$_POST['txtPayment'];
$Date=$_POST['txtDate'];
$dateFormated = explode('/', $Date);
$Date = $dateFormated[2].'-'.$dateFormated[1].'-'.$dateFormated[0];
$Heure=$_POST['txtHeure'];
$req="insert into alarme (Reference,Nomcomplet,Montant,Payment,Date,Heure) values ('$Reference','$Nomcomplet','$Montant','$Payment','$Date','$Heure')";
mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
// Redirection
// header("Location: alarme.php?id=idalarme");
require "header_et_menu.php";
?>
<CENTER>
<br>
<h1 class="stock">Alarme : </h1>
<br>
<table class="tableCommune">
<tr><th>Reference</th><th>Nom Complet</th><th>Montant</th><th>Payment</th><th>Date</th><th>Heure</th></tr>
<tr><td><?php echo "$Reference" ?></td><td><?php echo "$Nomcomplet" ?></td><td><?php echo "$Montant" ?></td><td><?php echo "$Payment" ?></td><td><?php echo "$Date" ?></td><td><?php echo "$Heure" ?></td></tr>
</table>
<br><br>
<a class="menu" href="consulteralarme.php">*** Retour liste des alarmes ***</a><br>
<a class="menu" href="pagePrincipale.php">*** Retour Page Accueil ***</a>
</CENTER>