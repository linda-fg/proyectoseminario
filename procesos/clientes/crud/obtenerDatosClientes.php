<?php 
include "../../../clases/Clientes.php";
$Clientes = new Clientes();
$idCliente = $_POST['idCliente'];

echo json_encode($Clientes->obtenerDatosClientes($idCliente));