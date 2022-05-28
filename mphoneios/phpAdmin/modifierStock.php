<?php
		require "commun.php";
		require "header_second.php";
?>
<div class="container-fluid px-4">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Gestion des stocks</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Stock</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Modifier un stock
                            </div>
                            <div class="card-body"><br>
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
<br><br><center>
		<button class="emp_btn" name="valider" type="submit" value="Valider">Valider</button><br><br></form>
</form>
		<button class="emp_btn" onclick="javascript:window.location='gererStocks.php'">Annuler</button><br><br></center>
</div>
</main>
<?php
	require_once "footer_second.php";
?>