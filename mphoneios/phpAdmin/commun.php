<?php
	header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
	//error_reporting(E_ALL ^ E_DEPRECATED);
	require_once "../phpCommun/fonctionsSql.php";
	require_once "../classes/class.stock.php";
	// require_once "../classes/class.article.php";
	// require_once "../classes/class.ligneStock.php";
	// require_once "../classes/class.ligneSortie.php";
	// require_once "../classes/class.sortie.php";
	require_once "../classes/class.utilisateur.php";
	session_start();
	require_once "../phpCommun/db_connection.php";
if (!$_SESSION["Positiontype"]=="Admin") {
		header('Location: ../phpCommun/login.php');
	}
	$utilisateur=$_SESSION["utilisateur"];
?>