<?php
	$idCategoria = $_POST['id_proyecto'];
    include "../../clases/Proyectos.php";
    $Proyectos = new Proyectos();

    echo json_encode($Proyectos->obtenerCategoria($idCategoria));

?>