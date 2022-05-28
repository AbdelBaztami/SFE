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
                                Ajout d'un stock
                            </div>
                            <div class="card-body"><br>
                                <form method="POST" name="formulaire" onsubmit="return validerForm();" action="ajouterStock_trt.php">
								<b class="stock">Nom de stock :</b><br>
								<br><input autofocus name="NomStock" type="text" value="">
								<br><br><br>
								<b class="parametrage">Paramétrage</b><br>
								<br>
								<p class="Destinataire">Colonne "Destinataire" sur les sortie : <select name="selDestinataire"><option value="O">OUI</option><option selected value="N">NON</option></select></p>
								<br>
							</div><center>
                            <button class="emp_btn" name="valider" type="submit" value="Valider">Valider</button><br><br></form>
                            <button class="emp_btn" onclick="javascript:window.location='gererStocks.php'">Annuler</button><br><br></center>
                        </div></form>
                    </div>
                </main>

<?php
	require "footer_second.php";
?>
