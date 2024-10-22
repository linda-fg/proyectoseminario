
<?php 

	include "header.php"; 
	if (isset($_SESSION['usuario']) &&
		$_SESSION['usuario']['id'] == 1 || $_SESSION['usuario']['id'] == 2) {
		//$idUsuario = $_SESSION['usuario']['id'];
		include "../clases/Conexion.php";
		$con = new Conexion();
		$conexion = $con->conectar();
	
?>
			<!-- Page Content -->
			<div class="container">
			  <div class="card border-0 shadow my-5">
			    <div class="card-body p-5">
			      <h1 class="fw-light">Gestionar Proyectos</h1>
			      <p class="lead"> 	
      				<button class="btn btn-primary" data-toggle="modal" data-target="#modalGestor">Subir Proyecto</button>
      				<hr>
      				<div id="tablaGestorArchivos"></div>
			      </p>
			      
			    </div>
			  </div>
			</div>

<?php 
	include "gestor/modalVisualizar.php";
	include "gestor/modalGestor.php";
	include"footer.php"; 

?>

	<script src="../public/js/gestor/gestor.js"></script>
	<script type="text/javascript">
	$(document).ready(function(){
		$('#tablaGestorArchivos').load("gestor/tablaGestor.php");
		$('#categoriasLoad').load("categorias/selectCategorias.php");
		$('#idPersona').load("categorias/selectCategorias.php");
		$('#btnGuardarArchivos').click(function(){
			agregarArchivoGestor();
		});
	});
</script>
	

<?php	
	}else {
		header("location:../index.html");
	}

?>