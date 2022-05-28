<?php
require "commun.php";
require_once 'header_second.php';
require_once "../phpCommun/fonctionsSql.php";
require_once "../phpCommun/db_connection.php";
$CIN=mysqli_real_escape_string($link,$_GET['CIN']);
$req="select * from employes where (CIN='$CIN')";
$rs=mysqli_query($link,$req) or die(mysqli_error($link));
$ET=mysqli_fetch_assoc($rs);
?>
<div class="container-fluid px-4">
<div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Gestion des Employés</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Employés</li>
                        </ol>

                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Editer employé
                            </div>
                            <div class="card-body"><br>
                                <form method="POST" action="editerEmp_trt.php" encrypt="multipart/form-data">
                                    Nom : &emsp;&emsp;&nbsp;<input autofocus size="20" type="text" value="<?php echo ($ET['Nom']) ?>" name="nom" required><br><br>
                                    Prenom : &emsp;<input autofocus size="20" type="text" value="<?php echo ($ET['Prenom']) ?>" name="prenom" required><br><br>
                                    CIN : &emsp;&emsp;&emsp;<input autofocus size='20' name="cin" value="<?php echo ($ET['CIN']) ?>" required></input><br><br>
                                    Position : &ensp;&ensp;<input autofocus size='20' name="position" value="<?php echo ($ET['position']) ?>" required></input><br><br>
                                    Age : &emsp;&emsp;&nbsp;<input autofocus size="2" type="number" min='18' value="<?php echo ($ET['Age']) ?>" name="age" required><br><br>
                                    Date de début : <input autofocus size='10' type="date" name="date" value="<?php $Date=$ET['Date de debut']; $dateFormated = explode('-', $Date);
                                    $Date = $dateFormated[2].'/'.$dateFormated[1].'/'.$dateFormated[0];  
                                    echo ($Date)?>" required></input><br><br>
                                    Salaire (DHS) : &emsp;&emsp;&nbsp;<input autofocus size='12' type="number" name="salaire" value="<?php echo ($ET['Salaire']) ?>" min='0' required></input><br>
                            </div><center>
                            <button class="emp_btn" name="editer" type="submit" value="Editer">Editer</button><br><br></form>
                            <a href="GestionEmp.php"><button class="emp_btn">Retour</button><br><br></center>
                        </div>
                    </div>
                </main>
<?php require 'footer_second.php';?>