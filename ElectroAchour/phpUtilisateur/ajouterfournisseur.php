<?php
	require "inc_commun.php";
	require "header_et_menu.php";
?>
<center>
<br>
<h1 class="stock">Ajout d'un fournisseur : </h1>
<br>

<form method="POST" action="ajouterfournisseur_trt.php" encrypt="multipart/form-data">
<table class="tableCommune">
<tr><th align="left">Nom Complet&nbsp;&nbsp;&nbsp;</th><td><input autofocus size="35" type="text" value="" name="txtNomFournisseur" required></td></tr>
<tr><th align="left">Montant TTC&nbsp;&nbsp;&nbsp;</th><td><input size='12' name="txtTTC" required></input><br></td></tr>
<tr><th align="left">Avance&nbsp;&nbsp;&nbsp;</th><td><input size='9' name="txtAvance" required></input><br></td></tr>
<tr><th align="left">Date d'entrée &nbsp;&nbsp;&nbsp;</th><td><input size="5" type="text" value="" name="txtDateF" required></td></tr>
<tr><th align="left">Dernier Delai&nbsp;&nbsp;&nbsp;</th><td><input size="5" type="text" value="" name="txtDelai" required></td></tr>
</table>
<br><br>


<button class="menu" value="Ajouter">Ajouter</button><br>
<a class="menu" href="consulteremp.php">Retour liste des fournisseurs</a><br>
<a class="menu" href="pagePrincipale.php">Retour Page Accueil</a><br><br><br>
</center>
<?php require "footer.php" ?>