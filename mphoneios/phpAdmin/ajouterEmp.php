<?php
require "commun.php";
require_once 'header_second.php';
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
                                liste des employés
                            </div>
                            <div class="card-body"><br>
                                <form method="POST" action="ajouterEmp_trt.php" encrypt="multipart/form-data">
                                    Nom : &emsp;&emsp;&nbsp;<input autofocus size="20" type="text" value="" name="nom" required><br><br>
                                    Prenom : &emsp;<input autofocus size="20" type="text" value="" name="prenom" required><br><br>
                                    CIN : &emsp;&emsp;&emsp;<input autofocus size='20' name="cin" required></input><br><br>
                                    Position : &ensp;&ensp;<!--<input autofocus size='20' type="" name="position" required></input>-->
                                    <select name="position" id="position">
                                        <option value="directeur">Directeur</option>
                                        <option value="asistante">Asistante</option>
                                        <option value="technicien">Technicien</option>
                                        <option value="comptable">Comptable</option>
                                        <option value="livreur">Livreur</option>
                                    </select>
                                    <br><br>
                                    Age : &emsp;&emsp;&nbsp;<input autofocus size="2" type="number" min='18' value="" name="age" required><br><br>
                                    Date de début : <input autofocus size='10' type="date" name="date" required></input><br><br>
                                    Salaire (DHS) : &emsp;&emsp;&nbsp;<input autofocus size='12' type="number" name="salaire" min='0' required></input><br>
                                    </form>
                            </div><center>
                            <button class="emp_btn" name="ajouter" type="submit" value="Ajouter">Ajouter</button><br><br></form>
                            <a href="GestionEmp.php"><button class="emp_btn">Retour</button><br><br></center>
                        </div>
                    </div>
                </main>
<?php require 'footer_second.php';?>