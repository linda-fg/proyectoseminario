<?php
    
    class Usuarios extends Conexion {
        public function loginUsuario($usuario, $password) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
            $respuesta = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($respuesta) > 0) {
                $datosUsuario = mysqli_fetch_array($respuesta);
                if ($datosUsuario['activo'] == 1) {
                    $_SESSION['usuario']['nombre'] = $datosUsuario['usuario'];
                    $_SESSION['usuario']['id'] = $datosUsuario['id_usuario'];
                    $_SESSION['usuario']['rol'] =  $datosUsuario['id_rol'];
                    return 1;
                } else {
                    return 0;
                }
            } else {
                return 0;
            }
        }
        public function agregaNuevoUsuario($datos) {
            $conexion = Conexion::conectar();
            $idPersona = self::agregarPersona($datos);
            if ($idPersona > 0) {
                $sql = "INSERT INTO t_usuarios (id_rol, 
                                                id_persona, 
                                                usuario, 
                                                password, 
                                                ubicacion) 
                        VALUES (?, ?, ?, ?, ?)";
                $query = $conexion->prepare($sql);
                $query->bind_param("iisss", $datos['idRol'],
                                            $idPersona,
                                            $datos['usuario'],
                                            $datos['password'],
                                            $datos['ubicacion']);
                $respuesta = $query->execute();
                return $respuesta;
            } else {
                return 0;
            }
        }

        public function agregarPersona($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_persona (nombre,
                                          apellido,
                                          direccion,
                                          fecha_nacimiento,
                                          sexo,
                                          telefono,
                                          correo)
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("sssssss", $datos['nombre'],
                                        $datos['apellido'],
                                        $datos['direccion'],
                                        $datos['fecha_nacimiento'],
                                        $datos['sexo'],
                                        $datos['telefono'],
                                        $datos['correo']);
            $respuesta = $query->execute();
            $idPersona = mysqli_insert_id($conexion);
            $query->close();
            return $idPersona;
        }
        
        function calculaTiempo($fechaInicio,$fechaFin){
            //indice 0 = años
            //indice 1= meses
            //indice 2 = dias
            //indice 11 = total en dias 
            $datetime1 = date_create($fechaInicio);
            $datetime2 = date_create($fechaFin);
            $interval = date_diff($datetime1, $datetime2);
        
            $tiempo=array();
        
            foreach ($interval as $valor) {
                $tiempo[]=$valor;
            }
        
            return $tiempo;
        }

        public function obtenerDatosUsuario($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT 
                        usuarios.id_usuario AS idUsuario,
                        usuarios.usuario AS nombreUsuario,
                        roles.nombre AS rol,
                        usuarios.id_rol AS idRol,
                        usuarios.ubicacion AS ubicacion,
                        usuarios.activo AS estatus,
                        usuarios.id_persona AS idPersona,
                        persona.nombre AS nombrePersona,
                        persona.apellido AS apellido,
                        persona.direccion AS direccion,
                        persona.fecha_nacimiento AS fecha_nacimiento,
                        persona.sexo AS sexo,
                        persona.correo AS correo,
                        persona.telefono AS telefono
                    FROM
                        t_usuarios AS usuarios
                            INNER JOIN
                        t_cat_roles AS roles ON usuarios.id_rol = roles.id_rol
                            INNER JOIN
                        t_persona AS persona ON usuarios.id_persona = persona.id_persona
                        AND usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $usuario = mysqli_fetch_array($respuesta);
            $datos = array(
                    'idUsuario' => $usuario['idUsuario'],
                    'nombreUsuario' => $usuario['nombreUsuario'],
                    'rol' => $usuario['rol'],
                    'idRol' => $usuario['idRol'],
                    'ubicacion' => $usuario['ubicacion'],
                    'estatus' => $usuario['estatus'],
                    'idPersona' => $usuario['idPersona'],
                    'nombrePersona' => $usuario['nombrePersona'],
                    'apellido' => $usuario['apellido'],
                    'direccion' => $usuario['direccion'],
                    'fecha_nacimiento' => $usuario['fecha_nacimiento'],
                    'sexo' => $usuario['sexo'],
                    'correo' => $usuario['correo'],
                    'telefono' => $usuario['telefono']
            );
            return $datos;
        }
        public function actualizarUsuario($datos) {
           $conexion = Conexion::conectar();
            $exitoPersona = self::actualizarPersona($datos);
            if ($exitoPersona) {
                $sql = "UPDATE t_usuarios SET id_rol = ?,
                                                usuario = ?,
                                                ubicacion = ?
                        WHERE id_usuario = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('issi', $datos['idRol'],
                                            $datos['usuario'],
                                            $datos['ubicacion'],
                                            $datos['idUsuario']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            } else {
                return 0;
            }
        }
        public function actualizarPersona($datos) {
            $conexion = Conexion::conectar();
            $idPersona = self::obtenerIdPersona($datos['idUsuario']);
            $sql = "UPDATE t_persona SET    nombre = ?,
                                            apellido = ?,
                                            direccion = ?,
                                            fecha_nacimiento = ?,
                                            sexo = ?,
                                            telefono = ?,
                                            correo = ?
                    WHERE id_persona = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('sssssssi',  $datos['nombre'],
                                            $datos['apellido'],
                                            $datos['direccion'],
                                            $datos['fecha_nacimiento'],
                                            $datos['sexo'],
                                            $datos['telefono'],
                                            $datos['correo'],
                                            $idPersona);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta; 
        }
        public function obtenerIdPersona($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT 
                        persona.id_persona AS idPersona
                    FROM
                        t_usuarios AS usuarios
                            INNER JOIN
                        t_persona AS persona ON usuarios.id_persona = persona.id_persona
                            AND usuarios.id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            $idPersona = mysqli_fetch_array($respuesta)['idPersona'];
            return $idPersona;
        }
        public function resetPassword($datos) {
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_usuarios
                    SET password = ?
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('si', $datos['password'],
                                    $datos['idUsuario']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function cambioEstatusUsuario($idUsuario, $estatus) {
            $conexion = Conexion::conectar();
            if ($estatus == 1) {
                $estatus = 0;
            } else {
                $estatus = 1;
            }
            $sql = "UPDATE t_usuarios
                    SET activo = ?
                    WHERE id_usuario = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('ii', $estatus, $idUsuario);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }

        public function buscarReportesUsuario($idUsuario) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_reportes WHERE id_usuario = '$idUsuario'";
            $respuesta = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($respuesta) > 0) {
                return 1;
            } else {
                return 0; 
            }
        }

        public function buscarAsignacionPersona($idPersona) {
            $conexion = Conexion::conectar();
            $sql = "SELECT * FROM t_asignacion1 WHERE id_usuario = '$idPersona'";
            $respuesta = mysqli_query($conexion, $sql);
            if (mysqli_num_rows($respuesta) > 0) {
                return 1;
            } else {
                return 0; 
            }
        }

        public function eliminarUsuario($datos) {
            $conexion = Conexion::conectar();
            $reportes = self::buscarReportesUsuario($datos['idUsuario']);
            $asignaciones = self::buscarAsignacionPersona($datos['idPersona']);
            if ($reportes == 0 && $asignaciones == 0) {
                //Se elimina un usuario
                $sql = "DELETE FROM t_usuarios WHERE id_usuario = ?";
                $query = $conexion->prepare($sql);
                $query->bind_param('i', $datos['idUsuario']);
                $respuesta = $query->execute();
                $query->close();
                return $respuesta;
            } else {
                return 0;
            }
        }
    }
?>