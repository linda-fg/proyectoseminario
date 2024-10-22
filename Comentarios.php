<?php 
	include "Conexion.php";
	class Comentarios extends Conexion{
		public function agregarComentario($datos){
		$conexion = Conexion::conectar();
		$sql = "INSERT INTO t_comentarios (id_usuario,
											id_cliente,	
											comentario)
				VALUES (?, ?, ?)";
		$query = $conexion->prepare($sql);
		$query->bind_param('iis', $datos['idUsuario'],	
										$datos['comentarioNombreCliente'],
										$datos['comentarioCliente']);
		$respuesta = $query->execute();
		$query->close();
		return $respuesta;
	  }
}

?>

