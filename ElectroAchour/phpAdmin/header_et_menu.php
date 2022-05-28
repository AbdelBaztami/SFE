<?php
	require "../phpCommun/header1.php";
?>
<div class="BandeauHaut">
	<img src="../img/LOGO_ACHOUR.png">
	<div class="administration">
	<span class="spanTitreAdministration">Administration</span>
	</div>
	<div class="deconnection">
		<br><br>
		<a class="lienFondVert" href="../phpCommun/logout_trt.php">Se déconnecter</a><p class="compte">compte : 
    <?php echo "$utilisateur->prenom $utilisateur->nom";?><br></p>
</div>
</div>