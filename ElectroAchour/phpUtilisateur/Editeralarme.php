<?php
require "inc_commun.php";
$Reference=mysqli_real_escape_string($link,$_GET['Reference']);
$req="select * from alarme where (Reference='$Reference')";
$rs=mysqli_query($link,$req) or die(mysqli_error($link));
$ET=mysqli_fetch_assoc($rs);
unset($_SESSION['stock']);
require "header_et_menu.php";
?>
<center>
<br>
<h1 class="stock">Modifier d'une alarme : </h1>
<br>

<form method="POST" action="Editeralarme_trt.php" encrypt="multipart/form-data">
<table class="tableCommune">
<tr><th align="left">Refference&nbsp;&nbsp;&nbsp;</th><td><input autofocus size='40' type="text" value="<?php echo ($ET['Reference']) ?>" name="txtReference" required></td></tr>
<tr><th align="left">Nom Complet&nbsp;&nbsp;&nbsp;</th><td><input autofocus size="35" type="text" value="<?php echo ($ET['Nomcomplet'])?>" name="txtNomComplet" required></td></tr>
<tr><th align="left">Montant&nbsp;&nbsp;&nbsp;</th><td><input size="12" name="txtMontant" value="<?php echo ($ET['Montant'])?>" required></input><br></td></tr>
<tr><th align="left">Payment&nbsp;&nbsp;&nbsp;</th><td><input size="12" name="txtPayment" value="<?php echo ($ET['Payment'])?>" required></input><br></td></tr>
<tr><th align="left">Date&nbsp;&nbsp;&nbsp;</th><td><input size="9" name="txtDate" value="<?php $Date=mysqli_real_escape_string($link,$ET['Date']); $dateFormated = explode('-', $Date);
        $Date = $dateFormated[2].'/'.$dateFormated[1].'/'.$dateFormated[0];  
        echo ($Date)?>" required></input><br></td></tr>
<tr><th align="left">Heure&nbsp;&nbsp;&nbsp;</th><td><input size="5" type="text" value="<?php echo ($ET['Heure'])?>" name="txtHeure" required></td></tr>
</table>
<br><br>
<span class="attention"><b>Attention :</b> Vous ne pouvez pas modifiez les refferences car elles sont des identificateurs.
</span>
<br>
<br><br>


<button class="menu" value="Modifier">Modifier</button><br>
<a class="menu" href="consulteralarme.php">*** Retour liste des alarmes ***</a><br>
<a class="menu" href="pagePrincipale.php">*** Retour Page Accueil ***</a><br>
<?php
mysqli_free_result($rs);
mysqli_close($link);
require "footer.php"
?>