<?php

   include "../../clases/Proyectos.php";
   $Proyectos = new Proyectos();

   $datos = array (
            'idCategoria' => $_POST['idCategoria'],
            'categoria' => $_POST['categoriaU'],
            'descripcion' => $_POST['descripcionU']
            );
   
   echo $Proyectos->actualizarCategoria($datos);

?>