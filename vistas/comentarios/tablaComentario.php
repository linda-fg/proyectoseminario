<?php 
        session_start();
        include "../../clases/Conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
        $idUsuario =  $_SESSION['usuario']['id'];
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
            t_clientes AS cliente   ON comentarios.id_cliente = cliente.id_cliente 
            INNER JOIN 
            t_asignacion1 AS asignacion ON cliente.id_cliente = asignacion.id_cliente 
            INNER JOIN 
            t_reportes AS reporte ON asignacion.id_proyecto = reporte.id_proyecto 
            INNER JOIN
                    t_cat_equipo AS proyecto ON reporte.id_proyecto = proyecto.id_proyecto

            ORDER BY comentarios.fecha ASC";
        $respuesta = mysqli_query($conexion, $sql);
    //  $datosUsuario = mysqli_fetch_array($respuesta);
    
?>



<table class="table table-sm  dt-responsive" style="width: 100%" id="tablaComentarioDataTable">
    <thead>
        <th class="text-center">Nombre Cliente 1</th>
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
            <td class="text-center"><?php echo $mostrar['nombrePersona'];?></td>
            <td class="text-center"><?php echo $mostrar['empresa'];?></td>
            <td class="text-center"><?php echo $mostrar['telefono'];?></td>
            <td class="text-center"><?php echo $mostrar['direccion'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreProyecto'];?></td>
            <td class="text-center"><?php echo $mostrar['comentario'];?></td>
            <td class="text-center"><?php echo $mostrar['fecha'];?></td>
 
        </tr>
        <?php 
            }
        ?>
    </tbody>
</table>


<script>
    $(document).ready(function(){
        $('#tablaComentarioDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    });
</script>