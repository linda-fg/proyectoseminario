<?php 
session_start();

include "../../clases/Conexion.php";
$con = new Conexion();
$conexion = $con->conectar();
$idUsuario =  $_SESSION['usuario']['id'];
$sql="SELECT archivos.id_archivo AS idArchivo,
				       usuarios.usuario AS nombreUsuario,
				       clientes.nombre AS nombreCliente,
				         clientes.apellido AS apellidoCliente,
				       categorias.nombre AS nombreProyecto,
				       archivos.id_proyecto AS nombreArchivo,
				       archivos.tipo AS tipoArchivo,
				       archivos.ruta AS rutaArchivo,
				       archivos.fecha_insert AS fecha
			FROM t_archivos AS archivos
			INNER JOIN t_usuarios AS usuarios ON archivos.id_usuario = usuarios.id_usuario
			INNER JOIN t_cat_equipo AS categorias ON archivos.id_proyecto = categorias.id_proyecto
			INNER JOIN t_clientes AS clientes ON archivos.id_persona = clientes.id_cliente
			AND archivos.id_usuario = '$idUsuario'";
$respuesta = mysqli_query($conexion, $sql);

?>





<div class="row">
	<div class="col-sm-12">
		<div class="table-responsive">
			<table class="table table-lg table-bordered table-dark table-striped dt-responsive " 
			id="tablaGestorDataTable" style="width:100%">
			
			<thead>
				<th>Nombre Cliente</th>
				<th>Nombre Proyecto</th>
				
				<th>Tipo de archivo</th>
				
				<th style="text-align: center;">Visualizar</th>	
				<th style="text-align: center;">Eliminar</th>
					
			</thead>
			<tbody>
				<?php 
				/*
					Arreglo de extensiones validas
				*/

				$extensionesValidas = array('png', 'PNG', 'jpg', 'pdf', 'mp3', 'mp4',
											'JPEG', 'jpeg', 'jpe', 'GIF', 'gif','WEBP', 'webp', 
											 'txt');
				/*
					Arreglo de extensiones validas
				*/

					while ($mostrar = mysqli_fetch_array($respuesta)) {	
					$rutaDescarga = "../archivos/".$idUsuario."/".$mostrar['nombreArchivo'];
					$nombreArchivo = $mostrar['nombreArchivo'];
					$idArchivo = $mostrar['idArchivo'];



					?>  

					<tr>

						<td><?php echo $mostrar['nombreCliente']; ?>  <?php echo $mostrar['apellidoCliente']; ?></td>
						<td><?php echo $mostrar['nombreProyecto']; ?></td>
						<td><?php echo $mostrar['tipoArchivo']; ?></td>
						

							<td style="text-align: center;">
								<?php 
								


								for ($i=0; $i < count($extensionesValidas); $i++) { 
									if ($extensionesValidas[$i] == $mostrar['tipoArchivo']) {
										?>
										<span class="btn btn-primary btn-sm" 
										data-toggle="modal" 
										data-target="#modalVisualizar"
										onclick="obtenerArchivoPorId('<?php echo $idArchivo ?>')"><span class="fas fa-eye"></span></span>
										<?php 
									}
								}
								?>		
							</td>
							

							<td style="text-align: center;"><span 
								class="btn btn-danger btn-sm" onclick="eliminarArchivo(<?php echo $mostrar[0] ?>)" 
								><span class="fas fa-trash-alt"></span></span></td>

								

							</tr> 
						<?php } ?> 	
					</tbody>
					
				</table>
			</div>
		</div>
	</div>
	<script>
		$(document).ready(function(){
			$('#tablaGestorDataTable').DataTable({
				language : {
					url : "../public/datatable/es-ES.json"
				}
			});
		});
	</script>
