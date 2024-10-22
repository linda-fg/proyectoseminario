<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    include "../../clases/Conexion.php";
    include "../../clases/Reportes.php";
    $Reportes = new Reportes();
    $datos = array(
        'idProyecto' => $_POST['idProyecto'],
        'descripcion' => $_POST['descripcion'],
        'idUsuario' => $idUsuario
    );

    echo $Reportes->agregarReporteCliente($datos);
?>