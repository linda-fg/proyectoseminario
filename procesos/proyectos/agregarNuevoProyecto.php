<?php 
	session_start();
	$idUsuario = $_SESSION['usuario']['id'];
	$datos = array(
	'idAgregaProyecto' => $_POST['idAgregaProyecto'],
	'descripcion' => $_POST['descripcion'],
	'idUsuario' => $idUsuario
	);

	include "../../clases/Proyectos.php";
	$Proyectos = new Proyectos();
	echo $Proyectos->agregarNuevoProyecto($datos);