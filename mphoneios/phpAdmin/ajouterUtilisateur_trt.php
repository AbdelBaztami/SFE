<?php
	session_start();
	require "commun.php";
	require_once "../phpCommun/fonctionsSql.php";
	require_once "../phpCommun/db_connection.php";
	require_once "../classes/class.utilisateur.php";
	require_once "../classes/class.stock.php";
	$nom=$_POST["nom"];
	$prenom=$_POST["prenom"];
	$position=$_POST["position"];
	$uname=$_POST["username"];
	$password_origin=$_POST["password"];
	$password_hashed = password_hash($password, PASSWORD_BCRYPT);
	$utilModif=new utilisateur();
	$utilModif->nom=$nom;
	$utilModif->prenom=$prenom;
	$utilModif->uname=$uname;
	$utilModif->position=$position;
	$utilModif->password=$password_hashed;
	$utilModif->tStocks=array();
	if (isset($_POST['chkStock'])) {
		foreach($_POST['chkStock'] as $valeur) {
			$utilModif->tStocks[]=$valeur;
		}
	}
	$utilModif->insert();
	session_unset();
	// Redirection
	header('Location: gererUtilisateurs.php');
?>