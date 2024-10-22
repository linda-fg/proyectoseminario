<?php 
		session_start();
		include "../../clases/Conexion.php";
		$con = new Conexion();
		$conexion = $con->conectar();
		$idUsuario =  $_SESSION['usuario']['id'];
		$contador = 1;
		$sql = "SELECT 
						reporte.id_reporte AS idReporte,
						reporte.id_usuario AS idUsuario,
                        CONCAT(persona.nombre, ' ', persona.apellido, ' ', persona.direccion) AS nombrePersona,
					proyecto.id_proyecto AS idProyecto,
					proyecto.nombre AS nombreProyecto,
					reporte.descripcion AS descripcion,
					reporte.estatus AS estatus ,
					reporte.observacion AS observacion,
					reporte.fecha_insert AS fecha, 
                    asignacion.id_asignacion AS idAsignacion,
                    asignacion.id_cliente AS cliente,
                    cliente.id_cliente AS idPersona,
                    CONCAT(cliente.nombre, ' ', cliente.apellido) AS nombreCliente

				FROM
					t_reportes AS reporte
						INNER JOIN
					t_usuarios AS usuario ON reporte.id_usuario = usuario.id_usuario
						INNER JOIN
					t_persona AS persona ON usuario.id_persona = persona.id_persona
                    INNER JOIN
					t_cat_equipo AS proyecto ON reporte.id_proyecto = proyecto.id_proyecto
                    INNER JOIN
					t_asignacion1 AS asignacion ON reporte.id_proyecto = asignacion.id_proyecto
                    INNER JOIN 
                    t_clientes AS cliente ON asignacion.id_cliente = cliente.id_cliente
						AND reporte.id_usuario ='$idUsuario'";

		$respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-lg table-bordered table-dark table-striped dt-responsive " 
		id="tablaAsignacionDataTable1" style="width:100%">
	<thead>
		<th>#</th>
		<th>Clientes</th>
		<th>Proyecto</th>
		<th>Fecha</th>	
		<th>Descripcion</th>
		<th>Estatus</th>
		<th>Observaciones</th>
			
		<th>Eliminar</th>

	</thead>
	<tbody>
		<?php while ($mostrar = mysqli_fetch_array($respuesta)) {	?>
		<tr>
			<td><?php echo $contador++; ?></td>
			<td><?php echo $mostrar['nombreCliente']; ?></td>
			<td><?php echo $mostrar['nombreProyecto']; ?></td>
			<td><?php echo $mostrar['fecha']; ?></td>
			<td><?php echo $mostrar['descripcion']; ?></td>
			<td>
				<?php 
					$estatus = $mostrar['estatus']; 
					$cadenaEstatus = '<span class="badge badge-success">Abierto</span>';
					if ($estatus == 0) {
						$cadenaEstatus = '<span class="badge badge-danger">Cerrado</span>';
					}
					echo $cadenaEstatus;
				?>
				
			</td>
			<td><?php echo $mostrar['observacion']; ?></td>
			
			<td style="text-align: center;">
				<?php 
					if ($mostrar['observacion'] == "") {
				
				?>

				<button class="btn btn-danger btn-sm"
						onclick="eliminarReporteCliente1(<?php echo $mostrar['idReporte'] ?>)"
				><span class="fas fa-trash-alt"></span>  Eliminar</button>
				<?php
					}
				?>
			</td>

			
		</tr> 
		<?php } ?>
	</tbody>
	
</table>
<script>
	$(document).ready(function(){
	$('#tablaAsignacionDataTable1').DataTable({
	language : {
				url : "../public/datatable/es-ES.json"
			} /*,	dom: 'Bfrtip',
   				buttons : {
					buttons : [
					{ extend : 'copy',  className : 'btn btn-outline-info',    text : '<i class="far fa-copy"></i> Copiar' },
					{ extend : 'csv',   className : 'btn btn-outline-primary', text : '<i class="fas fa-file-csv"></i> CSV' },
					{ extend : 'excel', className : 'btn btn-outline-success', text : '<i class="fas fa-file-excel"></i> XSL' },
					{ extend : 'pdf',   className : 'btn btn-outline-danger',  text : '<i class="fas fa-file-pdf"></i> PDF' },

					],
					dom : {
						button : {
							className : 'btn'
						}
					}

				} */
	});
});
</script>
