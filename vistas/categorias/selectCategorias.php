<?php 
	session_start();
	
	include "../../clases/Conexion.php";
	$con = new Conexion();
	$conexion = $con->conectar();
		$idUsuario =  $_SESSION['usuario']['id'];
		$sql="SELECT id_proyecto,
				       
				       nombre 
			FROM t_cat_equipo 
			WHERE id_usuario = '$idUsuario'";
		
		$respuesta = mysqli_query($conexion, $sql);
		
?>

<label>Seleccione</label>
<select name="categoriasArchivos" id="categoriasArchivos" class="form-control">
	<option value="">Seleccione</option>
    <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
        <option value="<?php echo $mostrar['id_proyecto']; ?>"> <?php echo $mostrar['nombre']; ?> </option>
    <?php } ?>
</select>

 <label>Nombre del cliente</label>
                      <?php 

                          $sql = "SELECT 
                                        id_cliente,
                                        CONCAT(nombre, ' ', apellido, ',  ', direccion) AS nombre
                                  FROM 
                                        t_clientes ORDER BY nombre";
                          $respuesta = mysqli_query($conexion, $sql);
                      ?>
                      <select name="idPersona" id="idPersona" class="form-control" data-live-search="true" required>
                        <option value="">Seleccione</option>
                        <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                          <option value="<?php echo $mostrar['id_cliente']; ?>"> <?php echo $mostrar['nombre']; ?> </option>
                      <?php   } ?>
                      </select>