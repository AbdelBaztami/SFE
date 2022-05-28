<?php
	require "inc_commun.php";
	$nom=$_POST["txtNom"];
	$prenom=$_POST["txtPrenom"];
	$password_origin=$_POST["txtPassword"];
	$password_hashed = password_hash($password, PASSWORD_BCRYPT);
	$utilModif=$_SESSION["utilModif"];
	$utilModif->nom=$nom;
	$utilModif->prenom=$prenom;
	$utilModif->password=$password_hashed;

	$utilModif->tStocks=array();
	if (isset($_POST['chkStock'])) {
		foreach($_POST['chkStock'] as $valeur) {
			$utilModif->tStocks[]=$valeur;
		}
	}
	$utilModif->update();
	
	// Redirection
	header('Location: gererUtilisateurs.php');
?>