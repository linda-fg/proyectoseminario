
<?php 

	include "header.php"; 
	if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
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
			      	<button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarArchivos"><span class="fa fa-arrow-circle-up"></span>  Subir Documentos</button>
			      	<hr>
      				<div id="tablaGestorLoad"></div>
			      </p>
			    </div>
			  </div>
			</div>

<?php 
	include "gestor3/modalAgregarArchivos.php";
	include "gestor3/modalVista.php";
	include "footer.php"; 
?>	
	<script src="../public/js/gestor3/gestor.js"></script>
<?php 
	}else {
		header("location:../index.html");
	}
?>
