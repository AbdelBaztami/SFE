<?php
	require "commun.php";
	require "header_second.php";
?>
<script type="text/javascript">
function validerForm() {
	if ( document.formulaire.txtNom.value.trim() == "" ) {
		alert ( "Veuillez saisir un nom !" );
		return false;
	}
	return true;
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
                                modifier employé
                            </div>
                            <div class="card-body"><br>
                                <form method="POST" name="formulaire" onsubmit="return validerForm();" action="ajouterUtilisateur_trt.php">
								<?php
									$username=$_GET["Username"];
									$utilModif = utilisateur::charger($username);
									$_SESSION["utilModif"]=$utilModif;?>
								Username : &emsp;&emsp;&nbsp;<?php echo $utilModif->uname ?><br><br>
								Nom : &emsp;&emsp;&nbsp;<input autofocus size="20" type="text" value="<?php echo $utilModif->nom ?>" name="nom" required><br><br>
                                Prenom : &emsp;<input autofocus size="20" type="text" value="<?php echo $utilModif->prenom ?>" name="prenom" required><br><br>
								Position :&emsp;
								<select name="position" id="position" value="<?php echo $utilModif->position ?>">
									<option value="Employé de stock">--Please choose an option--</option>
									<option value="Admin">Admin</option>
									<option value="Employé de stock">Employé de stock</option>
								</select><br><br>
                                Password : &emsp;<input autofocus size="20" type="password" value="" name="password" required><br><br>
<?php
	echo "Gère le(s) stock(s) :<br>";
		$tTousStocks = stock::chargerToutSansLigne();
		foreach ($tTousStocks as $stockForm) {
			$idStockForm=$stockForm->idStock;
		echo "&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input name=\"chkStock[]\" id=\"id$idStockForm\" type=\"checkbox\" value=\"$idStockForm\"><label for=\"id$idStockForm\">$stockForm->nom</label><br>";
		}

?>
<br>
    </div><center>
                            <button class="emp_btn" name="valider" type="submit" value="Valider">Valider</button><br><br></form>
                            <button class="emp_btn" onclick="javascript:window.location='gererUtilisateurs.php'">Annuler</button><br><br></center>
                        </div></form>
                    </div>
                </main>
<br><br><br><br>
<?php
	require "footer_second.php";
?>