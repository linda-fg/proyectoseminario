
<?php 
		include "../../clases/Conexion.php";
		$con = new Conexion();
		$conexion = $con->conectar();
		$sql="SELECT id_proyecto,
							nombre,
							descripcion
		from t_cat_equipo";
		$respuesta = mysqli_query($conexion, $sql);
		
?>
<!--	table table-lg table-bordered table-dark table-striped dt-responsive -->
<table class="table table-lg table-bordered table-dark table-striped dt-responsive " 
		id="tablaCategoriasDataTable" style="width:100%">
	<thead>
		<th>Nombre</th>
		<th>Descripcion</th>
<!--	<th>Editar</th>		-->
<!--	<th>Eliminar</th> -->

	</thead>
	<tbody>
			<?php 
				while($mostrar = mysqli_fetch_row($respuesta)) {
					
			?>
		<tr>
			
			<td><?php echo $mostrar[1]; ?></td>
			<td><?php echo $mostrar[2]; ?></td>
<!--			<td style="text-align: center;"><span class="btn btn-warning btn-sm"
				onclick="obtenerDatosCategoria(<?php echo  $mostrar['$id_proyecto']  ?>)"
				data-toggle="modal" data-target="#modalActualizarCategorias"><span class="fas fa-edit"></span></span></td>
		-->	
	<!--		<td style="text-align: center;"><span 
				class="btn btn-danger btn-sm"onclick="eliminarCategorias(<?php echo $mostrar[0] ?>)" 
				><span class="fas fa-trash-alt"></span></span></td> -->

			
		</tr> 
		<?php } ?>
	</tbody>
	
</table>

<script>
	$(document).ready(function(){
	$('#tablaCategoriasDataTable').DataTable({
	language : {
				url : "../public/datatable/es-ES.json"
			}
	});
});
</script>

<!-- 
<script >
	$(document).ready(function(){
		$('#tablaAsignacionDataTable').DataTable({
			language : {
				url : "../public/datatable/es_es.json"
			},
			dom: 'Bfrtip',
			buttons : {
				buttons : [
					{ 	extend : 'copy',  className : 'btn btn-outline-info',    text : '<i class="far fa-copy"></i> Copiar'
						extend : 'csv',   className : 'btn btn-outline-primary', text : '<i class="fas fa-file-csv"></i> CSV'
						extend : 'excel', className : 'btn btn-outline-success', text : '<i class="fas fa-file-excel"></i> XSL'
						extend : 'pdf',   className : 'btn btn-outline-danger',  text : '<i class="fas fa-file-pdf"></i> PDF'}
				],
				dom : {
					button : {
						className : 'btn'
					}
				}
			}
		});
	});

</script> -->