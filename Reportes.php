<?php
     
    class Reportes extends Conexion {
        public function agregarReporteCliente($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_proyecto,
                                            descripcion)
                    VALUES (?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iis', $datos['idUsuario'],
                                        $datos['idProyecto'],
                                        $datos['descripcion']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarReporteCliente($idReporte) {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_reportes WHERE id_reporte = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idReporte);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function obtenerSolucion($idReporte) {
            $conexion = Conexion::conectar();
            $sql = "SELECT observacion,
                        estatus
                FROM t_reportes
                WHERE id_reporte = '$idReporte'";
            $respuesta = mysqli_query($conexion, $sql);
            $reporte = mysqli_fetch_array($respuesta);
            $datos = array(
                "idReporte" => $idReporte,
                "estatus" => $reporte['estatus'],
                "observacion" => $reporte['observacion']
            );
            return $datos;
        }
        public function actualizarSolucion($datos) {
            $conexion = Conexion::conectar();
            $sql = "UPDATE t_reportes 
                    SET id_usuario_tecnico = ?,
                        observacion = ?,
                        estatus = ?
                    WHERE id_reporte = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('isii', $datos['idUsuario'],
                                        $datos['observacion'],
                                        $datos['estatus'],
                                        $datos['idReporte']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;                                        
        }
    }
?>