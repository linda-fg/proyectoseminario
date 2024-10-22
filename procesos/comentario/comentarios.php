<?php 
	session_start();
	$idUsuario = $_SESSION['usuario']['id'];
	$datos = array(
	'idUsuario' => $idUsuario,
	'comentarioNombreCliente' => $_POST['comentarioNombreCliente'],
	'comentarioCliente' => $_POST['comentarioCliente']
	
	);

	include "../../clases/Comentarios.php";
	$Comentarios = new Comentarios();
	echo $Comentarios->agregarComentario($datos);   