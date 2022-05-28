<?php
require_once "../phpCommun/fonctionsSql.php";
require_once "../phpCommun/db_connection.php";
require "commun.php";
if (isset($_POST['editer'])) {
    // receive all input values from the form
    $nom = mysqlEscape($_POST['nom']);
    $prenom = mysqlEscape($_POST['prenom']);
    $cin=mysqlEscape($_POST['cin']);
    $position=mysqlEscape($_POST['position']);
    $age=$_POST['age'];
    $date=$_POST['date'];
    $salaire=$_POST['salaire'];
    $req="UPDATE `employes` SET `Nom`='$nom',`Prenom`='$prenom',`position`='$position',`Age`='$age',`Date de debut`='$date',`Salaire`='$salaire' where CIN='$cin'";
    mysqli_query($link,$req) or die(mysqli_error($link));
    header("Location: GestionEmp.php"); }
?>