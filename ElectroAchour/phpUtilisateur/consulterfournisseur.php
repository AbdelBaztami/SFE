<?php require "inc_commun.php";
$req="select * from fournisseur";
$rs=mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
require "header_et_menu.php";
?>
<center>
<br>
<h1 class="stock">informations des fournisseurs : </h1>
<br>
<table class="tableCommune">
<tr>
    <th>Nom de fournisseur</th>
    <th>Montant TTC</th>
    <th>Avance</th>
    <th>Reste</th>
    <th>Date d'entrée</th>
    <th>Dernier Delai</th>
    <th>Modif.</th>
    <th>Supr.</th>
</tr>

<?php while ($ET=mysqli_fetch_assoc($rs)) {?>
    <tr>
        <td><?php echo ($ET['NomComplet']) ?></td>
        <td><?php echo ($ET['MontantTTC']) ?></td>
        <td><?php echo ($ET['Avance']) ?></td>
        <td><?php echo ($ET['MontantTTC']-$ET['Avance']) ?></td>
        <td><?php $DateF=mysqli_real_escape_string($link,$ET['Date']); $dateFormated = explode('-', $DateF);
        $DateF = $dateFormated[2].'/'.$dateFormated[1].'/'.$dateFormated[0];  
        echo ($DateF)?></td>
        <td><?php $Delai=mysqli_real_escape_string($link,$ET['DernierDelai']); $DelaiFormated = explode('-', $Delai);
        $Delai = $DelaiFormated[2].'/'.$DelaiFormated[1].'/'.$DelaiFormated[0];  
        echo ($Delai)?></td>
        <td><a href="Editerfournisseur.php?ID=<?php echo ($ET['ID'])?>">Editer</a></td>
        <td><a href="Suprimerfournisseur.php?ID=<?php echo ($ET['ID'])?>">Supprimer</a></td>
    </tr>
    
<?php } ?>

</table><br><br><br>

<a class="menu" href="ajouterfournisseur.php">Ajouter un fournisseur</a><br>
<a class="menu" href="pagePrincipale.php">Retour Page Accueil</a>
</center>
<?php require "footer.php" ?>