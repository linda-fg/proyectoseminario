<?php

	include "Conexion.php"; 
	class Gestor extends Conexion{
	
		public function agregarRegistroArchivo($datos){
			$conexion = Conexion::conectar();
			$sql = "INSERT INTO t_archivos (id_usuario,
											id_proyecto,
											id_persona,
											nombre,
											tipo,
											ruta)

							VALUES (?, ?, ?, ?, ?, ?)";

					$query = $conexion->prepare($sql);
					$query->bind_param('iiisss', $datos['idUsuario'],
													$datos['idCategoria'],
													$datos['idCliente'],
													$datos['nombreArchivo'],
													$datos['tipo'],
													$datos['ruta']);
					$respuesta = $query->execute();
					$query->close();
					return $respuesta;

		}

	public function obtenerNombreArchivo($idArchivo){
	  	$conexion = Conexion::conectar();
	  	$sql = "SELECT  nombre
	  			FROM t_archivos
	  			WHERE id_archivo = '$idArchivo'";

		$respuesta = mysqli_query($conexion, $sql);
		return mysqli_fetch_array($respuesta)['nombre'];
	  }

	 public function eliminarRegistroArchivo($idArchivo){
			  	$conexion = Conexion::conectar();
			  	$sql = "DELETE FROM t_archivos WHERE id_archivo = ?";
			  	$query = $conexion->prepare($sql);
			  	$query->bind_param('i', $idArchivo);
			  	$respuesta = $query->execute();
			  	$query->close();
			  	return $respuesta;
			  }



	public function obtenerRutaArchivo($idArchivo){
	  	$conexion = Conexion::conectar();
	  	$sql = "SELECT nombre, tipo FROM t_archivos WHERE id_archivo = '$idArchivo'";
	  	$respuesta = mysqli_query($conexion, $sql);
	  	$datos = mysqli_fetch_array($respuesta);
	  	$nombreArchivo = $datos['nombre'];
		$extension = $datos['tipo'];
		return self::tipoArchivo($nombreArchivo, $extension);
	}



	  public function tipoArchivo($nombre, $extension){

	  	$idUsuario =  $_SESSION['usuario']['id'];
	  	$ruta = "../archivos/".$idUsuario."/".$nombre;
	  	switch ($extension) {
	  		case 'png':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'PNG':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'jpg':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'JPEG':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'jpeg':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'jpe':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'GIF':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'gif':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'WEBP':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		case 'webp':
	  			return '<img src="'.$ruta.'" width="600">';
	  			break;
	  		/*
	  		case 'pdf':
	  			return '<embed src="'.$ruta.'#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />';
	  			break; */
	  		case 'pdf':
	  			return '<iframe src="'.$ruta.'"&embedded=true frameborder="0" style="float:right;"  type="application/pdf"  height="600px" width="770px"></iframe>';
	  			break;
	  		case 'mp3':
	  			return '<audio controls src="'.$ruta.'"></audio>';
	  			break;
	  		case 'mp4':
	  			return '<video src="'.$ruta.'" controls  width="100%" height="600px"></video>';
	  			break;
	  	/*	case 'docx':
                return '<iframe src="https://onlinedocumentviewer.com/Viewer/?'.$ruta.'" width="100%" height="400px"></iframe>';
            	break;  */
            case 'xml':
                return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="text/xml" width="100%" height="420px" />';
                break;
            case 'txt':
                return '<embed src="' . $ruta . '#toolbar=0&navpanes=0&scrollbar=0" type="text/text" width="100%" height="420px" />';
                break;
            case "xlsx": 
            	return '<iframe src="//view.officeapps.live.com/op/embed.aspx?src="'.$ruta.'"" style="width:100%; height:50%; border: none;min-height:500px;"></iframe>';
				break;  
			case "docx": 
				return '<iframe src="https://view.officeapps.live.com/op/view.aspx?src='.$ruta.'" width="100%" height="400px"></iframe>'; 
				break;  
		/*	case "pptx": 
				return '<iframe src="https://view.officeapps.live.com/op/view.aspx?src='.$ruta.'" width="100%" height="400px"></iframe>'; 
				break;
			case "docx": 
				return '<iframe src="//view.officeapps.live.com/op/embed.aspx?src="'.$ruta.'"" style="width:100%; height:50%; border: none;min-height:500px;"></iframe>
					'; 
              	break;  */ 


	  		
	  		default:
	  			# code...
	  			break;
	  	}
	  }






}



?>