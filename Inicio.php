<?php 
   include "Conexion.php";
    class Inicio extends Conexion {
        public function actualizarPersonales($datos) {
            $conexion = Conexion::conectar();
            $idUsuario = $datos['idUsuario'];
            $sql = "SELECT id_persona FROM t_usuarios WHERE id_usuario = '$idUsuario'"; 
            $respuesta = mysqli_query($conexion, $sql);
            $idPersona = mysqli_fetch_array($respuesta)[0];
            $sql = "UPDATE t_persona 
                    SET 
                            nombre = ?,
                            apellido = ?,
                            direccion = ?,
                            telefono = ?,
                            correo = ?,
                            fecha_nacimiento = ?
                    WHERE id_persona = ?";
            $sql = $conexion->prepare($sql);
            $query->bind_param("ssssssi", $datos['nombre'],
                                            $datos['apellido'],
                                            $datos['direccion'],
                                            $datos['telefono'],
                                            $datos['correo'],
                                            $datos['fecha_nacimiento'],
                                            $idPersona);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>