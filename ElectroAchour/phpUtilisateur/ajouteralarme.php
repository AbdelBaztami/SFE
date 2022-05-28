
<?php
	require "inc_commun.php";
	require "header_et_menu.php";
?>
<center>
<br>
<h1 class="stock">Ajout d'une alarme : </h1>
<br>

<form method="POST" action="ajouteralarme_trt.php" encrypt="multipart/form-data">
<table class="tableCommune">
<tr><th align="left">Refference&nbsp;&nbsp;&nbsp;</th><td><input autofocus size="40" type="text" value="" name="txtReference" required></td></tr>
<tr><th align="left">Nom Complet&nbsp;&nbsp;&nbsp;</th><td><input autofocus size="35" type="text" value="" name="txtNomComplet" required></td></tr>
<tr><th align="left">Montant&nbsp;&nbsp;&nbsp;</th><td><input autofocus size='12' name="txtMontant" required></input><br></td></tr>
<tr><th align="left">Payment&nbsp;&nbsp;&nbsp;</th><td><input autofocus size='3' name="txtPayment" required></input><br></td></tr>
<tr><th align="left">Date (jj/mm/aaaa)&nbsp;&nbsp;&nbsp;</th><td><input autofocus size='9' name="txtDate" required></input><br></td></tr>
<tr><th align="left">Heure (hh:mm:ss)&nbsp;&nbsp;&nbsp;</th><td><input autofocus size="5" type="text" value="" name="txtHeure" required></td></tr>
</table>
<br><br>


<button class="menu" value="Ajouter">Ajouter</button><br>
<a class="menu" href="consulteralarme.php">*** Retour liste des alarmes ***</a><br>
<a class="menu" href="pagePrincipale.php">*** Retour Page Accueil ***</a><br>
</center>

<?php require "footer.php" ?>