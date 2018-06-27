<?php 
error_reporting(E_ALL);
ini_set('display_errors', 1);

	require 'database.php'; 

	if(!empty($_GET['idCli'])) {
		$idCli = $_GET['idCli'];
	} else {
		$idCli = NULL;
	} ;

	if(!empty($_GET['idRoom'])) {
		$idRoom = $_GET['idRoom'];	
	} else {
		$idRoom = NULL;
	} ;

	$filRes = New Reservation;
	$filRes->readResa($idCli, $idRoom);
 ?>