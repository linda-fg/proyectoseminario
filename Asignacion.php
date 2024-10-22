<?php 
   
    class Asignacion extends Conexion {
        public function agreagarAsignacion($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_asignacion1 (id_usuario,
                            id_cliente,
                            id_proyecto,
                            empresa,
                            direccion,
                            telefono,
                            descripcion)
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $query = $conexion->prepare($sql);
        $query->bind_param('iiissss', $datos['idUsuario'],
                                        $datos['idPersona'],
                                        $datos['idProyecto'],
                                        $datos['empresa'],
                                        $datos['direccion'],
                                        $datos['telefono'],
                                        $datos['descripcion']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarAsignacion($idAsignacion) {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_asignacion1 WHERE id_asignacion = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idAsignacion);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    }
?>