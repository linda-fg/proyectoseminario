<?php
    session_start();
    include "../../clases/Conexion.php";
    include "../../clases/Asignacion.php";
    $Asignacion = new Asignacion();
    $con = new Conexion();
    $conexion = $con->conectar();
    $idUsuario = $_SESSION['usuario']['id'];
    $idPersona1 = $_POST['idPersona1'];
    $idProyecto1 = $_POST['idProyecto1'];

    $datos = array(
            'idUsuario' => $idUsuario,
            'idPersona' => $_POST['idPersona1'],
            'idProyecto' => $_POST['idProyecto1'],
            'empresa' => $_POST['empresa1'],
            'direccion' => $_POST['direccion1'],
            'telefono' => $_POST['telefono1'],
            'descripcion' => $_POST['descripcion1']

    );

    echo $Asignacion->agreagarAsignacion($datos);
?>