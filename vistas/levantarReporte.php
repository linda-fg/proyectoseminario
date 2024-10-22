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
			      <h1 class="fw-light">Control de Reportes</h1>
			      <p class="lead">
			      	<button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalCrearReporte1"><span class="fas fa-plus-circle"></span> Crear Reporte</button>
			      	<a href="AgregarComentario.php" class="btn btn-outline-primary"><span class="fa fa-eye"></span> Ver Comentarios</a>
			      	
			      	<hr>
      				<div id="tablaReporteCliente1Load"></div>
			      </p>
			      
			    </div>
			  </div>
			</div>



			



<?php 
	
	include "reportesCliente/modalCrearReporte/modalCrearReporte.php";
	include "footer.php"; 

?>
	<script src="../public/js/reportesCliente/reportesCliente1.js"></script>
	

<?php	
	}else {
		header("location:../index.html");
	}

?>