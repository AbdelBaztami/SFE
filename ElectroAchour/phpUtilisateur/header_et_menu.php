<?php
	require "../phpCommun/header1.php";
?>
<div class="BandeauHaut">
	<img src="../img/LOGO_ACHOUR.png">
	&emsp;&emsp;&emsp;
	<div class="administration">
	<span class="spanNomStock"><?php echo "$stock->nom";?></span>
	</div>
	<div class="deconnection">
		<br><br>
		<a class="lienFondVert" href="../phpCommun/logout_trt.php">Se déconnecter</a><p class="compte">compte : 
    <?php echo "$utilisateur->prenom $utilisateur->nom";?><br></p>
</div>
</div>
<!-- <td colspan="2" style="padding-top:0px;padding-left:0px;padding-right:0px;padding-bottom:0px;">
	<table class="tableBandeauHaut">
	<tr>
	<td><img src="../img/GSS.png"></td>
	<td width="100%" align="center">
	Stock actuel<br>
	<span class="spanNomStock"><?php //echo "$stock->nom";?></span>
	</td>
	<td nowrap align="right" style="padding:5px;">
	<?php //echo "$utilisateur->prenom $utilisateur->nom";?><br>
	<a class="lienFondVert" href="../phpCommun/logout_trt.php">Se déconnecter</a>
	</td>
	</tr>
	</table>
</td>
</tr>
<tr height="100%">
<td width="90%" valign="top"> -->