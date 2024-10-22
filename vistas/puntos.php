<?php 
		include "../clases/Conexion.php";
		$con = new Conexion();
		$conexion = $con->conectar();
		$sql = "SELECT 				persona.id_cliente AS idPersona,
								       CONCAT(persona.nombre, ' ', persona.apellido) AS nombrePersona,
								       proyecto.id_proyecto AS idProyecto,
								       proyecto.nombre AS nombreProyecto,
								       asignacion.id_asignacion AS idAsignacion,
								       asignacion.empresa AS empresa,
								       asignacion.direccion AS direccion,
								       asignacion.telefono AS telefono,
								       asignacion.descripcion AS descripcion
				FROM t_asignacion1 AS asignacion
				INNER JOIN t_clientes AS persona ON asignacion.id_cliente = persona.id_cliente
				INNER JOIN t_cat_equipo AS proyecto ON asignacion.id_proyecto = proyecto.id_proyecto";
		$respuesta = mysqli_query($conexion, $sql);

		$valoresY=array();//Proyectos
		$valoresX=array();//Nombres

		while ($ver=mysqli_fetch_array($respuesta)) {
			$valoresY[]=$ver[3];
			$valoresX[]=$ver[1];
		}

		$datosX=json_encode($valoresX);
		$datosY=json_encode($valoresY);
		
?>
<div id="graficaPuntos"></div>

<script type="text/javascript">
	function crearCadenaPuntos(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>

<script type="text/javascript">

	datosX=crearCadenaPuntos('<?php echo $datosX ?>');
	datosY=crearCadenaPuntos('<?php echo $datosY ?>');

	var trace1 = {
  x: datosX,
  y: datosY,
  mode: 'markers',
  type: 'scatter',
  marker: { size: 15 }
};





var data = [trace1];

Plotly.newPlot('graficaPuntos', data);
</script>