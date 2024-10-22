<?php 
	session_start();
	
	include "../../clases/Gestor.php";
	$Gestor = new Gestor();
	$idArchivo = $_POST['idArchivo'];
	$idUsuario = $_SESSION['usuario']['id'];
	$nombreArchivo = $Gestor->obtenerNombreArchivo($idArchivo);

	if ($nombreArchivo == "") {
		echo 1;
	} else {
		$rutaEliminar = "../../archivos/" . $idUsuario . "/" . $nombreArchivo;
	


	if (unlink($rutaEliminar)) {
		echo $Gestor->eliminarRegistroArchivo($idArchivo);
	}else {
		echo 0;
	}
}

?>

	