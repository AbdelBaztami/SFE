<?php
	require "inc_commun.php";
?>
<!DOCTYPE html>
<html>
<HEAD>
<TITLE class="stock">ELECTRO ACHOUR</TITLE>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta http-equiv="imagetoolbar" content="no">
<META name="keywords" content="gestion,stock">
<LINK media="screen" href="../phpCommun/style.css" type="text/css" rel="stylesheet">
<LINK media="print" href="../phpCommun/stylePrint.css" type="text/css" rel="stylesheet">
<link rel="icon" type="image/x-icon" href="../img/LOGO_ACHOUR.png" />
</HEAD>
<BODY>
	<div class="logo_print">
		<img src="../img/LOGO_ACHOUR2.png">
	</div>
	<div class="datecontent">
		<h1><?php echo(date("d/m/Y")); ?></h1>
	</div><br>
	<div class="titrecontent">
		<h1>ELECTRO ACHOUR</h1>
	</div>
	<script type="text/javascript">
		window.print();
	</script>
	<CENTER>
		<div class="table_content">
	<h1 class="stock">Contenu du stock : <?php
	$tTousStocks = stock::chargerToutSansLigne();
	foreach ($utilisateur->tStocks as $idStockForm) {
		$nomStock=$tTousStocks[$idStockForm]->nom;
		if ($idStockForm==$idStock)
		echo "<tr><td>$nomStock</td></tr>";
	}
?></h1>
	<br>
	<table class="tableCommune">
	<tr><th>Nom</th><th>Prix<br>(TTC)</th><th>Quantite<br>réelle</th><th>Quantite<br>Virtuelle</th></tr>
	<?php
		$total=0;
		chargerStock();
		foreach ($stock->tLigneStock as $ligneStock) {
			$article=$ligneStock->article;
			$idArticle=$article->idArticle;
			$prixTTCCourant=$article->prixTTCCourant;
			$quantiteReelle=$ligneStock->quantiteReelle;
			$quantiteVirtuelle=$ligneStock->quantiteVirtuelle;
			$total+=$quantiteReelle*$prixTTCCourant;
			if ($quantiteReelle==$quantiteVirtuelle) $quantiteVirtuelle="";
			$quantiteReelle=afficherEntierSansDec($quantiteReelle);
			$quantiteVirtuelle=afficherEntierSansDec($quantiteVirtuelle);
			echo "<tr>";
			echo "<td>$article->nom</td>";
			echo "<td class=\"tdPrix\">$prixTTCCourant</td>";
			echo "<td class=\"tdQuantite\">$quantiteReelle</td>";
			echo "<td class=\"tdQuantiteVirtuelle\">$quantiteVirtuelle</td>";
			echo "</tr>";
		}
		$total=number_format($total, 2, '.', ' ');
		echo "<tr><td><b>Total TTC (prix * Qté réelle)</b></td><td><b>$total</b></td></tr>";
	?>
	</table>
	
	<br>
	<a class="menu" href="javascript:window.print()">Imprimer</a><br>
	<a class="menu" href="javascript:window.close()">Fermer</a><br>
</div><br><br><br>
<h1 class="signature">Signature et (ou) cachet de societe</h1>
	</CENTER>
	<br><br>

<?php require "footer.php" ?>