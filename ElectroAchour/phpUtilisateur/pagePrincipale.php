<?php
	require "inc_commun.php";
	require "header_et_menu.php";
?>

<CENTER>
<br>
<h1 class="stock">Fournisseurs</h1>
<a class="menu" href="consulterfournisseur.php">Gérer vos Fournisseurs</a><br>
<h1 class="stock">Stock</h1>
<a class="menu" href="visualiserStock.php">Consulter le stock (réel et virtuel)</a><br>
<a class="menu" href="editerStock.php">Modifier le contenu du stock</a><br>
<a class="menu" href="changerStockAGerer.php">Changer le stock à gérer</a><br>

<h1 class="stock">Sorties</h1>
<a class="menu" href="consulterSorties.php">Consulter les sorties</a><br>
<a class="menu" href="ajouterSortie.php">Ajouter une nouvelle sortie</a><br>

<h1 class="stock">Statistiques</h1>
<a class="menu" href="statCoutParMois.php">Coût des sorties, par mois</a>
<br>
<h1 class="stock">Alarmes</h1>
<a class="menu" href="consulteralarme.php">Gérer vos alarmes des chèques</a><br>
<br>
<br>

</CENTER>
<?php
	require "footer.php";
?>