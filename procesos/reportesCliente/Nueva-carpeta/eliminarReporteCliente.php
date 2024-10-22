<?php 

	$idReporte = $_POST['idReporte'];
	include "../../../clases/Reportes1.php";
	$Reportes1 = new Reportes1();
	echo $Reportes1->eliminarReporteCliente1($idReporte);