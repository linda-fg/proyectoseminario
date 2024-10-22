<?php 

	$datos = array(
			
			'idCliente' => $_POST['idCliente'],
			'nombre' => $_POST['nombrec'],
			'apellido' => $_POST['apellidoc'],
			'direccion' => $_POST['direccionc'],
			'fecha_nacimiento' => $_POST['fechac'],
			'sexo' => $_POST['sexoc'],
			'telefono' => $_POST['telefonoc'],
			'correo' => $_POST['correoc']

	);

	include "../../../clases/Clientes.php";
	$Clientes = new Clientes();
	echo $Clientes->actualizarClientes($datos);