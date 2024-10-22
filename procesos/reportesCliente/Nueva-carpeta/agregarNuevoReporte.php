<?php 
	session_start();
	$idUsuario = $_SESSION['usuario']['id'];
	$datos = array(
	'idProyectoC' => $_POST['idProyectoC'],
	'descripcionC' => $_POST['descripcionC'],
	'idUsuario' => $idUsuario
	);

	include "../../../clases/Reportes1.php";
	$Reportes1 = new Reportes1();
	echo $Reportes1->agregarReporteCliente1($datos);