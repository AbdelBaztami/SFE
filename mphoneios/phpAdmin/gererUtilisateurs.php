<?php
	require_once "../phpCommun/fonctionsSql.php";
	require_once "../phpCommun/db_connection.php";
	require_once "../classes/class.utilisateur.php";
	require_once "../classes/class.stock.php";
	require "commun.php";
	require "header_second.php";
?>
<script type="text/javascript">
function supprimer(idUtilisateur) {
	if (confirm('Etes vous sur(e) de vouloir SUPPRIMER cet utilisateur ?')) {
		window.location="gererUtilisateurs_trt.php?action=Supprimer&idUtilisateur=" + idUtilisateur;
	}
}
</script>

<div class="container-fluid px-4">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Gestion des Employés</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Employés</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                liste des utilisateurs
                            </div>
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
											<th>Nom</th><th>Prénom</th><th>Username</th><th>Gère le(s) stock(s)</th><th>Position</th><th>Modifier</th><th>Supprimer</th></tr></thead>
<?php
	$tUtilisateurs = utilisateur::chargerTout();
	$tTousStocks = stock::chargerToutSansLigne();
	foreach ($tUtilisateurs as $util) {
		$nomsStock="";
		foreach ($util->tStocks as $idStockForm) {
			$nomsStock.="<li>".$tTousStocks[$idStockForm]->nom."</li>";
		}
		echo "<tr><td>$util->nom</td><td>$util->prenom</td><td>$util->uname</td><td>$nomsStock</td><td>$util->position</td><td><a href=\"modifierUtilisateur.php?Username=$util->uname\">Modifier</a></td><td><a href=\"javascript:supprimer('$util->idUtilisateur');\">Supprimer</a></td></tr>";
	}
?>
</table>
<br><center>
<button class="emp_btn" name="Ajouter un utilisateur" type="submit" onclick="javascript:window.location='ajouterUtilisateur.php'" value="Ajouter un utilisateur">Ajouter un utilisateur</button><br><br></form>
</center>
</div>
                        </div>
                    </div>
                </main>
<br><br><br><br>
<?php
	require "footer_second.php";
?>