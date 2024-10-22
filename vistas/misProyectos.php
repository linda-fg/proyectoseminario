
<?php 

	include "header.php"; 
	if (isset($_SESSION['usuario']) &&
		$_SESSION['usuario']['id'] == 1 || $_SESSION['usuario']['id'] == 2) {
		include "../clases/Conexion.php";
		$con = new Conexion();
		$conexion = $con->conectar();
		$idUsuario = $_SESSION['usuario']['id'];
		$sql = "SELECT
					persona.id_persona AS idPersona
				FROM 
					t_usuarios AS usuario
						INNER JOIN
					t_persona AS persona ON usuario.id_persona = persona.id_persona
					AND usuario.id_usuario = '$idUsuario'";
		$respuesta = mysqli_query($conexion, $sql);
		$idPersona = mysqli_fetch_array($respuesta)[0];

		$sql = "SELECT 
						persona.id_cliente AS idPersona,
                        CONCAT(persona.nombre, ' ', persona.apellido) AS nombrePersona,
					proyecto.id_proyecto AS idProyecto,
					proyecto.nombre AS nombreProyecto,
                   asignacion.id_usuario AS idUsuario,
					asignacion.id_asignacion AS idAsignacion,
					asignacion.empresa AS empresa,
					asignacion.direccion AS direccion,
					asignacion.telefono AS telefono,
					asignacion.descripcion AS descripcion,
					 asignacion.fecha_insert AS fecha

				FROM
					t_asignacion1 AS asignacion
						INNER JOIN
					t_clientes AS persona ON asignacion.id_cliente = persona.id_cliente
						INNER JOIN
					t_cat_equipo AS proyecto ON asignacion.id_proyecto = proyecto.id_proyecto 
                    	AND asignacion.id_usuario = '$idPersona' ORDER BY fecha";
		$respuesta = mysqli_query($conexion, $sql);
	
?>

			<!-- Page Content -->
			<div class="container">
			  <div class="card border-0 shadow my-5">
			    <div class="card-body p-5">
			      <h1 class="fw-light">Mis Solicitudes de Proyectos</h1>
			      <p class="lead">
			      	 <div class="row">
			      	 	<label></label>
      					<?php while ($mostrar = mysqli_fetch_array($respuesta)) { 
      						
	  					?>
			      			<div class="col-sm-4 ">
			      				<label></label><br>
								<div class="card bg-info mb-3" style="width: 18rem;">
										  
										  <div class="card-body card-header text-white">
										 
										    <h5 class="card-title font-weight-bold"> <?php echo $mostrar['nombreProyecto']; ?></h5>
										    <p class="card-text d-inline-block text-truncate" style="max-width: 150px;"> <?php echo $mostrar['descripcion']; ?> </p>
										   
										  </div>
										  <ul class="list-group list-group-flush">
										    <li class="list-group-item">  Cliente: <?php echo $mostrar['nombrePersona']; ?> </li>
										    <li class="list-group-item">  Empresa: <?php echo $mostrar['empresa']; ?> </li>
										    <li class="list-group-item"> Telefono: <?php echo $mostrar['telefono']; ?></li>
										    <li class="list-group-item">Direccion: <?php echo $mostrar['direccion']; ?></li>
										    
										  </ul>
										  
								</div>

			      			</div> 
			      			<?php } ?><br><br><br><br>
      				</div>
			      </p>
			    </div>
			  </div>
			</div>


<?php 
	include"footer.php"; 

	}else {
		header("location:../index.html");
	}
?>