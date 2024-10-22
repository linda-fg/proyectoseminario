<?php 

	include "Conexion.php";
	class Proyectos extends Conexion{
		public function agregarNuevoProyecto($datos){
		$conexion = Conexion::conectar();
		$sql = "INSERT INTO t_cat_equipo (id_usuario,
							nombre,
							descripcion)
				VALUES (?, ?, ?)";
		$query = $conexion->prepare($sql);
		$query->bind_param('iss', $datos['idUsuario'],
										$datos['idAgregaProyecto'],
										$datos['descripcion']);
		$respuesta = $query->execute();
		$query->close();
		return $respuesta;
	  }

	  public function eliminarProyecto($idReporte){
	  	$conexion = Conexion::conectar();
	  	$sql = "DELETE FROM t_cat_equipo WHERE id_proyecto = ?";
	  	$query = $conexion->prepare($sql);
	  	$query->bind_param('i', $idReporte);
	  	$respuesta = $query->execute();
	  	$query->close();
	  	return $respuesta;
	  }

        public function obtenerCategoria($idCategoria) {
            $conexion = Conectar::conexion();

            $sql = "SELECT id_proyecto, 
                           nombre,
                           descripcion 
                    FROM t_cat_equipo 
                    WHERE id_proyecto = '$idCategoria'";
            $respuesta = mysqli_query($conexion, $sql);

            $categoria = mysqli_fetch_array($respuesta);
            $datos = array(
                        'id_proyecto' => $categoria['id_proyecto'],   
                        'nombreCategoria' => $categoria['nombre'],
                        'descripcionCategoria' => $categoria['descripcion']       
                     );
            return $datos;
        }

        public function actualizarCategoria($datos) {
            $conexion = Conectar::conexion();

            $sql = "UPDATE t_cat_equipo 
                    SET nombre = ?,
                    	descripcion = ?
                    WHERE id_proyecto = ?";
            $query = $conexion->prepare($sql);
            $query->bind_param("ssi", $datos['categoria'],
            						 $datos['descripcion'],
                                     $datos['idCategoria']);
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }





}