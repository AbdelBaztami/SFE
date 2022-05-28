<?php require "inc_commun.php";
$req="select * from alarme";
$rs=mysqli_query($link,$req) or die(mysqli_error($link));
unset($_SESSION['stock']);
require "header_et_menu.php";
?>
<center>
<br>
<h1 class="stock">Contenu des alarmes : </h1>
<br>
<table class="tableCommune">
<tr>
    <th>Reference</th>
    <th>Nom Complet</th>
    <th>Montant</th>
    <th>Payment</th>
    <th>Date<br> (aaaa-mm-jj)</th>
    <th>Heure<br>(hh:mm:ss)</th>
    <th>Modif.</th>
    <th>Supr.</th>
</tr>

<?php while ($ET=mysqli_fetch_assoc($rs)) {?>
    <tr>
        <td><?php echo ($ET['Reference']) ?></td>
        <td><?php echo ($ET['Nomcomplet']) ?></td>
        <td><?php echo ($ET['Montant']) ?></td>
        <td><?php echo ($ET['Payment']) ?></td>
        <td><?php $Date=mysqli_real_escape_string($link,$ET['Date']); $dateFormated = explode('-', $Date);
        $Date = $dateFormated[2].'/'.$dateFormated[1].'/'.$dateFormated[0];  
        echo ($Date) ?></td>
        <td><?php echo ($ET['Heure']) ?></td>
        <td><a href="Editeralarme.php?Reference=<?php echo ($ET['Reference'])?>">Editer</a></td>
        <td><a href="Suprimeralarme.php?Reference=<?php echo ($ET['Reference'])?>">Supprimer</a></td>
    </tr>
    
<?php } ?>

</table><br><br><br>

<a class="menu" href="ajouteralarme.php">Ajouter une alarme</a><br>
<a class="menu" href="pagePrincipale.php">*** Retour Page Accueil ***</a>
</center>
<?php require "footer.php" ?>