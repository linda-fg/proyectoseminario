<?php
    session_start();
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->Conectar();
    $idUsuario = $_SESSION['usuario']['id'];
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

<table class="table table-sm table-bordered dt-responsive nowrap" 
        style="width: 100%" id="tablaReportesClienteDataTable">
    <thead>
        <th class="text-center">#</th>
        <th class="text-center">Persona</th>
        <th class="text-center">Proyecto</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Descripcion</th>
        <th class="text-center">Estatus</th>
        <th class="text-center">Observaciones</th>
        <th class="text-center">Eliminar</th>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) {
            
        ?>
        <tr>
            <td class="text-center"><?php echo $contador++;?></td>
            <td class="text-center"><?php echo $mostrar['nombrePersona'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreProyecto'];?></td>
            <td class="text-center"><?php echo $mostrar['fecha'];?></td>
            <td class="text-center"><?php echo $mostrar['descripcion'];?></td>
            <td class="text-center"><?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaEstatus = '<span class="badge badge-danger">Abierto</span>';
                    if($estatus == 0) {
                    $cadenaEstatus = '<span class="badge badge-success">Cerrado</span>';
                    }
                    echo $cadenaEstatus;
                ?>
            </td>
            <td class="text-center"><?php echo $mostrar['observacion'];?></td>
            <td class="text-center">
                <?php 
                    if ($mostrar['observacion'] == "") {
                        
                ?>
                    <button class="btn btn-outline-danger btn-sm" onclick="eliminarReporteCliente(<?php echo $mostrar['idReporte']?>)">
                        <span class="fas fa-trash-alt"></span>
                    </button>
                <?php 
                    }
                ?>
            </td>
        </tr>
        <?php
            }
        ?>
    </tbody>
</table>
<script>
    $(document).ready(function(){
        $('#tablaReportesClienteDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            },
            dom: 'Bfrtip',
            buttons: {
                buttons: [
                    {
                        extend: 'copy',
                        className: 'btn btn-outline-info',
                        text: '<i class="fas fa-copy"></i> Copiar'
                    },
                    {
                        extend: 'csv',
                        className: 'btn btn-outline-primary',
                        text: '<li class="fas fa-file-csv"></li> CSV'
                    },
                    {
                        extend: 'excel',
                        className: 'btn btn-outline-success',
                        text: '<i class="fas fa-file-excel"></i> XLS'
                    },
                    {
                        extend: 'pdf',
                        className: 'btn btn-outline-danger',
                        text: '<i class="fas fa-file-pdf"></i> PDF'
                    },
                    {
                        extend: 'print',
                        className: 'btn btn-outline-secondary',
                        text: '<i class="fas fa-print"></i> Imprimir'
                    },
                ],
                dom: {
                    button: {
                        className: 'btn'
                    }
                }
            }
        });
    })
</script>