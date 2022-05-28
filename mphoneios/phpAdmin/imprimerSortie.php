<?php
	require "inc_commun.php";
	$idSortie=$_GET["id"];
	$sortie = sortie::charger($idSortie, $stock);
	$bUtiliseBeneficiaire=($stock->utiliseBeneficiaire=="O");
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
<h1 class="stock"><?php echo $sortie->nom;?></h1>

<table width="400px" class="tableCommune">
<tr><th width="20%" nowrap align="left">Date (jj/mm/aaaa)&nbsp;&nbsp;&nbsp;</th><td width="80%"><?php echo $sortie->date;?></td></tr>
<tr><th nowrap align="left">Commentaire&nbsp;&nbsp;&nbsp;</th><td><?php echo str_replace("\n", "<br>", $sortie->commentaire);?></td></tr>
<tr><th nowrap align="left">Ressources&nbsp;&nbsp;&nbsp;</th><td><?php echo str_replace("\n", "<br>", $sortie->ressources);?></td></tr>
</table>
<br><br>
<table class="tableCommune">
<tr><th>Nom</th><?php if ($bUtiliseBeneficiaire) echo "<th>Bénéficiaire</th>";?><th>Prix unit.<br>(TTC)</th><th>Quantité</th><th>Prix total<br>(TTC)</th></tr>
<?php
	foreach ($sortie->tLigneSortie as $ligneSortie) {
		$nom=$ligneSortie->article->nom;
		$prixTTCSortie=$ligneSortie->prixTTCSortie;
		$quantite=afficherEntierSansDec($ligneSortie->quantite);
		$prixTotal=$prixTTCSortie * $quantite;
		$prixTotal=number_format($prixTotal, 2, '.', ' ');
		echo "<tr>";
		echo "<td>$nom</td>";
		if ($bUtiliseBeneficiaire) echo "<td>$ligneSortie->beneficiaire</td>";
		echo "<td class=\"tdPrix\">$prixTTCSortie</td><td class=\"tdQuantite\">$quantite</td><td class=\"tdPrix\">$prixTotal</td></tr>";
	}
	$colSpan=($bUtiliseBeneficiaire?4:3);
	echo "<tr><td colspan='$colSpan'><b>Total</b></td><td class=\"tdPrix\"><b>$sortie->coutTTCTotal</b></td></tr>";
?>
</table><br>
<a class="menu" href="javascript:window.print()">Imprimer</a><br>
<a class="menu" href="javascript:window.close()">Fermer</a>
<h1 class="signature">Signature et (ou) cachet de societe</h1>
</CENTER>
<br><br>
</body>
</html>