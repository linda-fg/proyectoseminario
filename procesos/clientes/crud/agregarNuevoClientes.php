<?php 
		session_start();
	include "../../../clases/Clientes.php";
	$Clientes = new Clientes();
	$con = new Conexion();
	$conexion = $con->conectar();
	$idUsuario = $_SESSION['usuario']['id'];
	
	$datos = array(
		"idUsuario" => $idUsuario,
		"nombre" => $_POST['nombreI'],
		"apellido" => $_POST['apellidoI'],
		"direccion" => $_POST['direccionI'],
		"fecha_nacimiento" => $_POST['fechaI'],
		"sexo" => $_POST['sexoI'],
		"telefono" => $_POST['telefonoI'],
		"correo" => $_POST['correoI']

	);

	

	echo $Clientes->agregarNuevoClientes($datos);






