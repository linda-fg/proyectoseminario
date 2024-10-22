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
                        CONCAT(persona.nombre, ' ', persona.apellido) AS nombrePersona,
                    proyecto.id_proyecto AS idProyecto,
                    proyecto.nombre AS nombreProyecto,
                    reporte.descripcion AS descripcion,
                    reporte.estatus AS estatus ,
                    reporte.observacion AS observacion,
                    reporte.fecha_insert AS fecha,
                    cliente.id_cliente AS idPersona,
                    CONCAT(cliente.nombre, ' ', cliente.apellido) AS nombreCliente,
                    cliente.direccion AS direccion,
                    cliente.telefono AS telefono,
                    asignacion.id_asignacion AS idAsignacion,
                    asignacion.id_cliente AS cliente

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
                    ORDER BY reporte.fecha_insert DESC";
    $respuesta = mysqli_query($conexion, $sql);
?>

<table class="table table-sm table-bordered dt-responsive nowrap" 
        style="width: 100%" id="tablaReportesAdminDataTable">
    <thead>
        <th class="text-center">#</th>
        <th class="text-center">Usuario</th>
        <th class="text-center">Cliente</th>
        <th class="text-center">Proyecto</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Telefono</th>
        <th class="text-center">Fecha</th>
        <th class="text-center">Estatus</th>
        <th class="text-center">Descripcion</th>
        <th class="text-center">Observacion</th>
        <th class="text-center">Eliminar</th>
    </thead>
    <tbody>
        <?php while ($mostrar = mysqli_fetch_array($respuesta)) {
            
        ?>
        <tr>
            <td class="text-center"><?php echo $contador++;?></td>
            <td class="text-center"><?php echo $mostrar['nombrePersona'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreCliente'];?></td>
            <td class="text-center"><?php echo $mostrar['nombreProyecto'];?></td>
            
            <td class="text-center"><?php echo $mostrar['direccion'];?></td>
            <td class="text-center"><?php echo $mostrar['telefono'];?></td>
            <td class="text-center"><?php echo $mostrar['fecha'];?></td>
            
            <td class="text-center"><?php 
                    $estatus = $mostrar['estatus'];
                    $cadenaEstatus = '<span class="badge badge-success">Abierto</span>';
                    if($estatus == 0) {
                    $cadenaEstatus = '<span class="badge badge-danger">Cerrado</span>';
                    }
                    echo $cadenaEstatus;
                ?>
            </td>
            <td class="text-center"><?php echo $mostrar['descripcion'];?></td>
            <td class="text-center">
                <button class="btn btn-outline-info btn-sm"
                        onclick="obtenerDatosSolucion('<?php echo $mostrar['idReporte'];?>')"
                        data-toggle="modal" data-target="#modalAgregarSolucionReporte">
                    <span class="fas fa-check"></span>
                </button>
                <?php echo $mostrar['observacion'];?>
            </td>
            <td class="text-center">
                <?php 
                    if ($mostrar['observacion'] == "") {
                        
                ?>
                    <button class="btn btn-outline-danger btn-sm" onclick="eliminarReporteAdmin(<?php echo $mostrar['idReporte']?>)">
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
        $('#tablaReportesAdminDataTable').DataTable({
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