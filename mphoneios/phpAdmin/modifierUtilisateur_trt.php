<?php
	require "commun.php";
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$position=$_POST["position"];
	$password_origin=$_POST["password"];
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