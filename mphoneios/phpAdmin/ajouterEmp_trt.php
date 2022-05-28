<?php require_once "../phpCommun/fonctionsSql.php";
require_once "../phpCommun/db_connection.php";
require "commun.php";
if (isset($_POST['ajouter'])) {
    // receive all input values from the form
    $nom = mysqlEscape($_POST['nom']);
    $prenom = mysqlEscape($_POST['prenom']);
    $cin=mysqlEscape($_POST['cin']);
    $position=mysqlEscape($_POST['position']);
    $age=$_POST['age'];
    $date=$_POST['date'];
    $salaire=$_POST['salaire'];
    $req="INSERT INTO `employes`(`Nom`, `Prenom`, `CIN`, `position`, `Age`, `Date de debut`, `Salaire`) VALUES ('$nom','$prenom','$cin','$position','$age','$date','$salaire')";
    mysqli_query($link,$req) or die(mysqli_error($link));
    header("Location: Gestionemp.php");
}?>

<?php print_r($date);?>