
<?php session_start();
		
		include "../../clases/Clientes.php";
	    $con = new Conexion();
	    $obj = new Clientes();
		$conexion = $con->conectar();
		$idUsuario =  $_SESSION['usuario']['id'];
		$sql="SELECT id_cliente, 
				nombre,
					apellido,
					direccion,
					fecha_nacimiento,
					sexo,
					correo,
					telefono 
		from t_clientes";
		$respuesta = mysqli_query($conexion, $sql);
 ?>

<table class="table table-sm table-striped table-dark table-bordered dt-responsive nowrap" 
		id="tablaUsuariosDataTable" style="width:100%">
	<thead>
		
		<th>Nombre</th>
		<th>Apellido</th>
		<th>Direccion</th>
		
		<th>Sexo</th>
		<th>Telefono</th>
		<th>Correo</th>
	<!--	<th>Editar</th> 
		<th>Eliminar</th> -->

	</thead>
		<tbody>
			<?php 
				while($mostrar = mysqli_fetch_array($respuesta)) {
			?>
			<tr>
				
				<td><?php echo $mostrar['nombre']; ?></td>
				<td><?php echo $mostrar['apellido']; ?></td>
				<td><?php echo $mostrar['direccion']; ?></td>
				
				<td style="text-align: center;"><?php echo $mostrar['sexo']; ?></td>
				<td><?php echo $mostrar['telefono']; ?></td>
				<td><?php echo $mostrar['correo']; ?></td>
				
				
				
			<!--		
				<td style="text-align: center;">
				<button class="btn btn-danger btn-sm" 
				onclick="eliminarClientes(<?php echo $mostrar[0] ?>)"><span class="fas fa-trash-alt"></span>   Eliminar</button><br><br>
				</td> -->
			</tr>
		<?php } ?>
		</tbody>

</table>

<script>
	$(document).ready(function(){
	$('#tablaUsuariosDataTable').DataTable({
		language : {
				url : "../public/datatable/es-ES.json"
			}
	});
});
</script>
