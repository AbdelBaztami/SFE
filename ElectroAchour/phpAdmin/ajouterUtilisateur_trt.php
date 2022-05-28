<?php
	require "inc_commun.php";
	$nom=$_POST["txtNom"];
	$prenom=$_POST["txtPrenom"];
	$login=$_POST["txtLogin"];
	$password_origin=$_POST["txtPassword"];
	$password_hashed = password_hash($password, PASSWORD_BCRYPT);
	$utilModif=new utilisateur();
	$utilModif->nom=$nom;
	$utilModif->prenom=$prenom;
	$utilModif->login=$login;
	$utilModif->password=$password_hashed;
	$utilModif->tStocks=array();
	if (isset($_POST['chkStock'])) {
		foreach($_POST['chkStock'] as $valeur) {
			$utilModif->tStocks[]=$valeur;
		}
	}
	$utilModif->insert();
	// Redirection
	header('Location: gererUtilisateurs.php');
?>