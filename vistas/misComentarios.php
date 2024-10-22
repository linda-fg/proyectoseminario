
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
            comentarios.id_comentario AS idComentario, 
            comentarios.id_cliente AS idPersona, 
            comentarios.comentario AS comentario, 
            cliente.id_cliente AS idCliente, 
            CONCAT(cliente.nombre, ' ', cliente.apellido) AS nombrePersona, 
            cliente.id_usuario AS idUsuario, 	 							
        	asignacion.id_proyecto AS idProyecto,
            asignacion.id_usuario AS idUsuario, 					
            asignacion.id_asignacion AS idAsignacion, 					
            asignacion.empresa AS empresa, 					
            asignacion.direccion AS direccion, 					
            asignacion.telefono AS telefono, 					
            asignacion.descripcion AS descripcion, 					 
            comentarios.fecha AS fecha, 
            reporte.id_reporte AS idReporte, 					
            reporte.id_usuario AS idUsuario, 
            reporte.id_proyecto AS idProyecto,
            proyecto.id_proyecto AS idProyecto,
			proyecto.nombre AS nombreProyecto 
            FROM t_comentarios AS comentarios 
			INNER JOIN 
			t_clientes AS cliente 	ON comentarios.id_cliente = cliente.id_cliente 
			INNER JOIN 
			t_asignacion1 AS asignacion ON cliente.id_cliente = asignacion.id_cliente 
			INNER JOIN 
			t_reportes AS reporte ON asignacion.id_proyecto = reporte.id_proyecto 
            INNER JOIN
					t_cat_equipo AS proyecto ON reporte.id_proyecto = proyecto.id_proyecto

			WHERE comentarios.id_cliente = '$idPersona' ORDER BY comentarios.fecha ASC";
		$respuesta = mysqli_query($conexion, $sql);
	//	$datosUsuario = mysqli_fetch_array($respuesta);
	
?>

			<!-- Page Content -->
			<div class="container">
			  <div class="card border-0 shadow my-5">
			    <div class="card-body p-5">
			      <h1 class="fw-light">Mis Comentarios</h1>
			      <p class="lead">
			      	 
			      	 	<label></label>
      					<button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarComentario"><span class="fas fa-plus-circle"></span> Agregar Comentario</button>
      					<a href="levantarReporte.php" class="btn btn-outline-primary">Volver</a><hr>
      			<!--		<div class="card bg-info mb-3">
						  <div class="card-header">
						    <h1 class="card-title  text-center"><b>Informacion</b></h1>
						  </div>
						  <div class="card-body">
						    
						    
						    	
								<ul class="list-group list-group-flush">
								<li class="list-group-item">  Cliente:  <?php echo $datosUsuario['nombrePersona']; ?> </li>
								<li class="list-group-item">  Empresa: <?php echo $datosUsuario['empresa']; ?> </li>
								<li class="list-group-item"> Telefono: <?php echo $datosUsuario['telefono']; ?> </li>
								<li class="list-group-item">Direccion: <?php echo $datosUsuario['direccion']; ?> </li>
								<li class="list-group-item">Proyecto: <?php echo $datosUsuario['nombreProyecto']; ?> </li>
										    
							</ul><br>
								<?php 
									
									while ($mostrar = mysqli_fetch_array($respuesta)) {
									
								?>
							<ul class="list-group list-group-flush" id="tablaComentario">
								
								<li class="list-group-item">    Comentario:   <?php echo $mostrar['comentario']; ?></li>
								<li class="list-group-item">  Fecha y Hora:  <?php echo $mostrar['fecha']; ?></li><br>
								
										   
							</ul>
									<?php
											}
										?> 
						    <p class="card-text"></p>
						    
						  </div>
						  <div class="card-footer text-muted">
						   
						  </div>
						</div> -->


<div id="tablaComentariosLoad"></div>

      				<table class="table table-sm   dt-responsive nowrap" style="width: 100%" id="tablaComentarioDataTable">
    <thead>
        <th class="text-center">Nombre Cliente</th>
        <th class="text-center">Empresa</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Proyecto</th>
        <th class="text-center">Comentario</th>
        <th class="text-center">Fecha y Hora:</th>
    </thead>
    <tbody>
        <?php 
            while ($mostrar = mysqli_fetch_array($respuesta)) {
        ?>
        <tr>
            <td><?php echo $mostrar['nombrePersona'];?></td>
            <td><?php echo $mostrar['empresa'];?></td>
            <td><?php echo $mostrar['telefono'];?></td>
            <td><?php echo $mostrar['direccion'];?></td>
            <td><?php echo $mostrar['nombreProyecto'];?></td>
            <td><?php echo $mostrar['comentario'];?></td>
            <td><?php echo $mostrar['fecha']; ?></td>
 
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>

			      </p>
			    </div>
			  </div>
			</div>










			


<?php 
	include "comentarios/modalComentarios.php";
	include "footer.php"; 
?>

<script src="../public/js/comentario/comentarios.js"></script>
<!--
<script type="text/javascript">
	function recargarPagina() { 
	location.reload(); 
}
</script>
-->

<script>
    $(document).ready(function(){
        $('#tablaComentarioDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    });
</script>

<?php 
	}else {
		header("location:../index.html");
	}
?>


<!--


// Obtener los datos del usuario 
/*
$sql = "SELECT comentarios.id_comentario AS idComentario, comentarios.id_cliente AS idPersona, comentarios.comentario AS comentario, cliente.id_cliente AS idCliente, CONCAT(cliente.nombre, ' ', cliente.apellido) AS nombrePersona, cliente.id_usuario AS idUsuario, 	 asignacion.id_proyecto AS idProyecto, asignacion.id_usuario AS idUsuario, asignacion.id_asignacion AS idAsignacion, 	 asignacion.empresa AS empresa, asignacion.direccion AS direccion, asignacion.telefono AS telefono, asignacion.descripcion AS descripcion, comentarios.fecha AS fecha, reporte.id_reporte AS idReporte, 	reporte.id_usuario AS idUsuario, reporte.id_proyecto AS idProyecto, proyecto.id_proyecto AS idProyecto,proyecto.nombre AS nombreProyecto FROM t_comentarios AS comentarios INNER JOIN t_clientes AS cliente 	ON comentarios.id_cliente = cliente.id_cliente INNER JOIN t_asignacion1 AS asignacion ON cliente.id_cliente = asignacion.id_cliente INNER JOIN t_reportes AS reporte ON asignacion.id_proyecto = reporte.id_proyecto INNER JOINt_cat_equipo AS proyecto ON reporte.id_proyecto = proyecto.id_proyecto WHERE comentarios.id_cliente = '$idPersona' ORDER BY fecha"; 

$respuesta = mysqli_query($conexion, $sql); 
$datosUsuario = mysqli_fetch_array($respuesta); ?> 

<div class="container"> 
	<div class="card border-0 shadow my-5"> 
		<div class="card-body p-5"> 
			<h1 class="fw-light">Mis Comentarios</h1> 
			<p class="lead">
				<label></label> 
				<button class="btn btn-primary" data-toggle="modal" data-target="#modalAgregarComentario">Agregar Comentario</button> 
				<a href="levantarReporte.php" class="btn btn-primary">Volver</a> 
				<div class="card bg-info mb-3"> 
					<div class="card-header"> 
						<h1 class="card-title text-center"><b>Informacion</b></h1> 
					</div> 
					<div class="card-body">

<ul class="list-group list-group-flush"> 
	<li class="list-group-item">Cliente: <?php echo $datosUsuario['nombrePersona']; ?></li> 
	<li class="list-group-item">Empresa: <?php echo $datosUsuario['empresa']; ?></li> 
	<li class="list-group-item">Telefono: <?php echo $datosUsuario['telefono']; ?></li> 
	<li class="list-group-item">Direccion: <?php echo $datosUsuario['direccion']; ?></li> 
	<li class="list-group-item">Proyecto: <?php echo $datosUsuario['nombreProyecto']; ?></li> </ul>






$sql = "SELECT 			
            comentarios.id_comentario AS idComentario, 
            comentarios.id_cliente AS idPersona, 
            comentarios.comentario AS comentario, 
            cliente.id_cliente AS idCliente, 
            CONCAT(cliente.nombre, ' ', cliente.apellido) AS nombrePersona, 
            cliente.id_usuario AS idUsuario, 	 							
        	asignacion.id_proyecto AS idProyecto,
            asignacion.id_usuario AS idUsuario, 					
            asignacion.id_asignacion AS idAsignacion, 					
            asignacion.empresa AS empresa, 					
            asignacion.direccion AS direccion, 					
            asignacion.telefono AS telefono, 					
            asignacion.descripcion AS descripcion, 					 
            comentarios.fecha AS fecha, 
            reporte.id_reporte AS idReporte, 					
            reporte.id_usuario AS idUsuario, 
            reporte.id_proyecto AS idProyecto,
            proyecto.id_proyecto AS idProyecto,
			proyecto.nombre AS nombreProyecto 
            FROM t_comentarios AS comentarios 
			INNER JOIN 
			t_clientes AS cliente 	ON comentarios.id_cliente = cliente.id_cliente 
			INNER JOIN 
			t_asignacion1 AS asignacion ON cliente.id_cliente = asignacion.id_cliente 
			INNER JOIN 
			t_reportes AS reporte ON asignacion.id_proyecto = reporte.id_proyecto 
            INNER JOIN
					t_cat_equipo AS proyecto ON reporte.id_proyecto = proyecto.id_proyecto

			WHERE comentarios.id_cliente = '$idPersona' ORDER BY idComentario ASC";



















*/

-->









