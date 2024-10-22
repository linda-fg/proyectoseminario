
<?php 

	include "header.php"; 
	if (isset($_SESSION['usuario']) &&
		$_SESSION['usuario']['id'] == 1 || $_SESSION['usuario']['id'] == 2) {
		$idUsuario = $_SESSION['usuario']['id'];
	
?>
			<!-- Page Content -->
			<div class="container">
			  <div class="card border-0 shadow my-5">
			    <div class="card-body p-5">
			      <h1 class="fw-light">Clientes</h1>
			      <p class="lead">
			      	<button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarClientes">
			      	 <span class="fas fa-user-plus"></span>  Agregar Cliente 
			      	</button>
			      	<hr>
			      	<div id="tablaClientesLoad"></div>
			       </p>
		
			    </div>
			  </div>
			</div>

<?php 

	include "clientes/modalAgregarClientes.php";
	include "clientes/modalActualizarClientes.php";
	
	include "footer.php"; 
?>
	<script src="../public/js/clientes/clientes.js"></script>

<?php 

	}else {
		header("location:../index.html");
	}
?>
