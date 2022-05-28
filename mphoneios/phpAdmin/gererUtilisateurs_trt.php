<?php
	require_once "../phpCommun/fonctionsSql.php";
	require_once "../phpCommun/db_connection.php";
	require_once "../classes/class.utilisateur.php";
	require_once "../classes/class.stock.php";
	require "commun.php";
	$action=$_GET["action"];
	if ($action=="Supprimer") {
		$idUtilisateur=$_GET["idUtilisateur"];
		utilisateur::delete($idUtilisateur);
	}
	// Redirection
	header('Location: gererUtilisateurs.php');
?>