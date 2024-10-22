<?php  
    session_start();
    include "../../clases/Conexion.php";
    include "../../clases/Reportes.php";
    $idUsuario = $_SESSION['usuario']['id'];
    $Reportes = new Reportes();
    $datos =array(
        'idReporte' => $_POST['idReporte'],
        'observacion' => $_POST['observacion'],
        'estatus' => $_POST['estatus'],
        'idUsuario' => $idUsuario
    );
    echo $Reportes->actualizarSolucion($datos);
?>