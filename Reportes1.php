<?php
    include "Conexion.php"; 
    class Reportes1 extends Conexion {
        public function agregarReporteCliente1($datos) {
            $conexion = Conexion::conectar();
            $sql = "INSERT INTO t_reportes (id_usuario,
                                            id_proyecto,
                                            descripcion)
                    VALUES (?, ?, ?)";
            $query = $conexion->prepare($sql);
            $query->bind_param('iis', $datos['idUsuario'],
                                        $datos['idProyectoC'],
                                        $datos['descripcionC']);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
        public function eliminarReporteCliente1($idReporte) {
            $conexion = Conexion::conectar();
            $sql = "DELETE FROM t_reportes WHERE id_reporte = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param('i', $idReporte);
            $respuesta = $query->execute();
            $query->close();
            return $respuesta;
        }
    

 
    }
?>