<?php 

	$idCliente = $_POST['idCliente'];

	include "../../clases/Clientes.php";
	$Clientes = new Clientes();

	echo $Clientes->eliminarClientes($idCliente);