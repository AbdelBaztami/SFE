<?php
require "inc_commun.php";
$ID=mysqli_real_escape_string($link,$_GET['ID']);
$req="select * from fournisseur where (ID='$ID')";
$rs=mysqli_query($link,$req) or die(mysqli_error($link));
$ET=mysqli_fetch_assoc($rs);
unset($_SESSION['stock']);
require "header_et_menu.php";
?>
<center>
<br>
<h1 class="stock">Modifier un fournisseur : </h1>
<br>

<form method="POST" action="Editerfournisseur_trt.php" encrypt="multipart/form-data">
<table class="tableCommune">
<tr><th align="left">Nom de fournisseur&nbsp;&nbsp;&nbsp;</th><td><input autofocus size="35" type="text" value="<?php echo ($ET['NomComplet'])?>" name="txtNomFournisseur" required></td></tr>
<tr><th align="left">Montant TTC&nbsp;&nbsp;&nbsp;</th><td><input size="12" name="txtTTC" value="<?php echo ($ET['MontantTTC'])?>" required></input><br></td></tr>
<tr><th align="left">Avance&nbsp;&nbsp;&nbsp;</th><td><input size="12" name="txtAvance" value="<?php echo ($ET['Avance'])?>" required></input><br></td></tr>
<tr><th align="left">Date&nbsp;&nbsp;&nbsp;</th><td><input size="9" name="txtDateF" value="<?php $DateF=mysqli_real_escape_string($link,$ET['Date']); $dateFormated = explode('-', $DateF);
        $DateF = $dateFormated[2].'/'.$dateFormated[1].'/'.$dateFormated[0];  
        echo ($DateF)?>" required></input><br></td></tr>
<tr><th align="left">Dernier Delai&nbsp;&nbsp;&nbsp;</th><td><input size="5" type="text" value="<?php $Delai=mysqli_real_escape_string($link,$ET['DernierDelai']); $DelaiFormated = explode('-', $Delai);
        $Delai = $DelaiFormated[2].'/'.$DelaiFormated[1].'/'.$DelaiFormated[0];  
        echo ($Delai)?>" name="txtDelai" required></td></tr>
</table>
<br>
<br><br>


<button class="menu" value="Modifier">Modifier</button><br>
<a class="menu" href="consulterfournisseur.php">Retour liste des fournisseurs</a><br>
<a class="menu" href="pagePrincipale.php">Retour Page Accueil</a><br>
<?php
mysqli_free_result($rs);
mysqli_close($link);
require "footer.php"
?>