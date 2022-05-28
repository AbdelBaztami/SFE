<?php
	require "commun.php";
	$nomStock=$_POST["NomStock"];
	$selDestinataire=$_POST["selDestinataire"];
	$stock=new stock();
	$stock->nom=$nomStock;
	$stock->utiliseBeneficiaire=$selDestinataire;
	$stock->insert();
	// Redirection
	header('Location: gererStocks.php');
?>