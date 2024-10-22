<?php
    include "../../../clases/Conexion.php";
    include "../../../clases/Usuarios.php";
    $Usuarios = new Usuarios();
    $datos = array(
            'idUsuario' => $_POST['idUsuario'],
            'nombre' => $_POST['nombreu'],
            'apellido' => $_POST['apellidou'],
            'direccion' => $_POST['direccionu'],
            'fecha_nacimiento' => $_POST['fechau'],
            'sexo' => $_POST['sexou'],
            'telefono' => $_POST['telefonou'],
            'correo' => $_POST['correou'],
            'usuario' => $_POST['usuariou'],
            'idRol' => $_POST['idRolu'],
            'ubicacion' => $_POST['ubicacionu']
    );
    echo $Usuarios->actualizarUsuario($datos);
?>