<?php 
	session_start();
	
	include "../../clases/Gestor.php";
	$Gestor = new Gestor();
	$idArchivo = $_POST['idArchivo'];
	
	echo $Gestor->obtenerRutaArchivo($idArchivo);


?>