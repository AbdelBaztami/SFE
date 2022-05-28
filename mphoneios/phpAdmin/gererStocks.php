<?php
	require "commun.php";
	require "header_second.php";
?>
<script type="text/javascript">
function supprimer(idStock) {
	if (confirm('Etes vous sur(e) de vouloir SUPPRIMER ce stock ?')) {
		window.location="gererStocks_trt.php?action=Supprimer&idStock=" + idStock;
	}
}
</script>
<div class="container-fluid px-4">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Gestion des stocks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Stocks</li>
                        </ol>
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                liste des stocks
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
										<tr>
											<th>Nom</th>
											<th>Modifier</th>
											<th>Supprimer</th>
										</tr>
									</thead>
									<tbody>
										<?php
											$stocks = stock::chargerToutSansLigne();
											foreach ($stocks as $stock) {
												echo "<tr><td>$stock->nom</td><td><a href=\"modifierStock.php?idStock=$stock->idStock\">Modifier</a></td><td><a href=\"javascript:supprimer($stock->idStock);\">Supprimer</a></td></tr>";
											}
										?>
									</tbody>
								</table><br>
								<center>
									<button class="emp_btn" name="Ajouter un stock" type="submit" onclick="javascript:window.location='ajouterStock.php'" value="Ajouter un stock">Ajouter un stock</button><br><br>
</center>

</table>
</div>
                        </div>
                    </div>
                </main>
<?php
	require "footer_second.php";
?>