<?php 
    include "../../../clases/Conexion.php";
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
        "nombre" => $_POST['nombre'],
        "apellido" => $_POST['apellido'],
        "direccion" => $_POST['direccion'],
        "fecha_nacimiento" => $_POST['fecha'],
        "sexo" => $_POST['sexo'],
        "telefono" => $_POST['telefono'],
        "correo" => $_POST['correo'],
        "usuario" => $_POST['usuario'],
        "password" => sha1($_POST['password']),
        "idRol" => $_POST['idRol'],
        "ubicacion" => $_POST['ubicacion']
    );
    echo $Usuarios->agregaNuevoUsuario($datos);
?>