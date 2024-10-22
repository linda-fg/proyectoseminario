<?php 

	session_start();
	include "../../clases/Gestor.php";
	$Gestor = new Gestor();
	$con = new Conexion();
	$conexion = $con->conectar();
	$idCategoria = $_POST['categoriasArchivos'];
	$idUsuario = $_SESSION['usuario']['id'];
	$idCliente = $_POST['idPersona'];
	
	if ($_FILES['archivos']['size'] > 0) {
		$carpeta = '../../archivos/'.$idUsuario;
			if (!file_exists($carpeta)) {
			
				mkdir($carpeta, 0777, true);
			}


		$totalArchivos = count($_FILES['archivos']['name']);

		for ($i=0; $i < $totalArchivos; $i++) { 
			$nombreArchivo = $_FILES['archivos']['name'][$i];
			$explode = explode('.', $nombreArchivo);
			$tipoArchivo = array_pop($explode);

			$rutaAlmacenamiento = $_FILES['archivos']['tmp_name'][$i];
			
			$rutaFinal = $carpeta."/".$nombreArchivo;
			
			$datosRegistroArchivo = array("idUsuario" => $idUsuario,
											"idCategoria" => $idCategoria,
											"idCliente" => $idCliente,
											"nombreArchivo" => $nombreArchivo,
											"tipo" => $tipoArchivo,
											"ruta" => $rutaFinal
													); 
			if (move_uploaded_file($rutaAlmacenamiento, $rutaFinal)) {
				$respuesta = $Gestor->agregarRegistroArchivo($datosRegistroArchivo);
			} 
			
		}
		echo $respuesta;
	}else {
		echo 0;
	}



?>
