<?php
require "commun.php";
require 'header_second.php';
$req="select * from employes";
$rs=mysqli_query($link,$req) or die(mysqli_error($link));
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
                            <div class="card-body">
                                <table id="datatablesSimple">
                                    <thead>
                                        <tr>
                                            <th>Nom</th>
                                            <th>Prenom</th>
                                            <th>CIN</th>
                                            <th>Position</th>
                                            <th>Age</th>
                                            <th>Date de début</th>
                                            <th>Salaire</th>
                                            <th>Modif.</th>
                                            <th>Supr.</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <th>Nom</th>
                                        <th>Prenom</th>
                                        <th>CIN</th>
                                        <th>Position</th>
                                        <th>Age</th>
                                        <th>Start date</th>
                                        <th>Salary</th>
                                    </tfoot>
                                    <tbody>
                                        <?php while ($ET=mysqli_fetch_assoc($rs)) {?>
                                        <tr>
                                        <td><?php echo ($ET['Nom']) ?></td>
                                        <td><?php echo ($ET['Prenom']) ?></td>
                                        <td><?php echo ($ET['CIN']) ?></td>
                                        <td><?php echo ($ET['position']) ?></td>
                                        <td><?php echo ($ET['Age']) ?></td>
                                        <td><?php $Date=$ET['Date de debut']; $dateFormated = explode('-', $Date);
                                        $Date = $dateFormated[2].'/'.$dateFormated[1].'/'.$dateFormated[0]; 
                                        echo ($Date) ?></td>
                                        <td><?php echo ($ET['Salaire']) ?></td>
                                        <td><a href="Editeremp.php?CIN=<?php echo ($ET['CIN'])?>">Editer</a></td>
                                        <td><a href="Suprimeremp.php?CIN=<?php echo ($ET['CIN'])?>">Supprimer</a></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
<?php require 'footer_second.php';?>