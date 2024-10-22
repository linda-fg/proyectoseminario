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

<div id="graficaLineal"></div>

<script type="text/javascript">
	function crearCadenaLineal(json){
		var parsed = JSON.parse(json);
		var arr = [];
		for(var x in parsed){
			arr.push(parsed[x]);
		}
		return arr;
	}
</script>


<script type="text/javascript">

	datosX=crearCadenaLineal('<?php echo $datosX ?>');
	datosY=crearCadenaLineal('<?php echo $datosY ?>');

	var trace1 = {
		x: datosX,
		y: datosY,
		type: 'scatter',
		line: {
    		color: 'rgb(55, 128, 191)',
		    width: 3
		  },
		 marker: {
    		color: 'rgb(128, 0, 128)',
		    size: 9
		  }
			
	};
		var layout = {
		  title: 'Grafica de Proyectos',
		  
		};
	var data = [trace1];

	Plotly.newPlot('graficaLineal', data, layout);
</script>