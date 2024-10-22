<?php 

	include "header.php"; 
	if (isset($_SESSION['usuario']) &&
		$_SESSION['usuario']['id'] == 1 || $_SESSION['usuario']['id'] == 2) {
		$idUsuario = $_SESSION['usuario']['id'];
		include "../clases/Conexion.php";
		$con = new Conexion();
		$conexion = $con->conectar();
	
?>
			<!-- Page Content -->
			<div class="container">
			  <div class="card border-0 shadow my-5">
			    <div class="card-body p-5">
			      <h1 class="fw-light">Proyectos</h1>
			      <p class="lead"> 
			      	<button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearProyecto"><span class="fas fa-plus-circle"></span>  Agregar Nuevo Proyecto</button>
			      	<hr>
      				<div id="tablaCategoriasLoad"></div>

			      </p>
			      
			    </div>
			  </div>
			</div>

<?php 

	include "categorias/modalProyectos.php";
	include "categorias/modalActualizarCategorias.php";
	include "footer.php"; 

?>

	<script src="../public/js/proyectos/proyectos.js"></script>

<?php	
	}else {
		header("location:../index.html");
	}
?>