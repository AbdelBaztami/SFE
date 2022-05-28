<?php
	require "inc_commun.php";
	require "header_et_menu.php";
?>
<CENTER>

<br>
<h1 class="stock">Modifier un stock</h1>
<br><br>

<form method="POST" action="modifierStock_trt.php">
<?php
	$idStock=$_GET["idStock"];
	$stock = stock::charger($idStock);
	$_SESSION["stock"]=$stock;
	if ($stock->utiliseBeneficiaire=="O") {
		$selectedOui="selected ";
		$selectedNon="";
	} else {
		$selectedOui="";
		$selectedNon="selected ";
	}
?>
	<b class="stock">Nom</b><br>
	<br><input autofocus name="txtNomStock" type="text" value="<?php echo $stock->nom;?>">
	<br><br><br>
	<b class="parametrage">Paramétrage</b><br>
	<br>
	<p class="Destinataire">Colonne "Destinataire" sur les sortie : <select name="selDestinataire"><option <?php echo $selectedOui;?> value="O">OUI</option><option <?php echo $selectedNon;?> value="N">NON</option></select></p>
<br><br>
<button type="submit" class="boutonValider">Valider</button>
&nbsp;&nbsp;&nbsp;
<button type="button" class="boutonAnnuler" onclick="javascript:window.location='gererStocks.php'">Annuler</button>
</form>

</CENTER>
<br><br><br><br>
<?php
	require "footer.php";
?>