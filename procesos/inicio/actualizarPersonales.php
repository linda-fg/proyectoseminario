<?php
    session_start();
    $idUsuario = $_SESSION['usuario']['id'];
    include "../../clases/Conexion.php";
    include "../../clases/Inicio.php";
    $Inicio = new Inicio();
    $datos = array(
        'nombre' => $_POST['nombreInicio'],
        'apellido' => $_POST['apellidoInicio'],
        'direccion' => $_POST['direccionInicio'],
        'telefono' => $_POST['telefonoInicio'],
        'correo' => $_POST['correoInicio'],
        'fecha_nacimiento' => $_POST['fechaInicio'],
        'idUsuario' => $idUsuario
    );
    echo $Inicio->actualizarPersonales($datos);
?>