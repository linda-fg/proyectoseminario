<?php 
    include "../../clases/Conexion.php";
    $con = new Conexion();
    $conexion = $con->Conectar();
    $sql = "SELECT                     persona.id_cliente AS idPersona,
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
?>

<table class="table table-sm dt-responsive nowrap" 
        style="width: 100%" id="tablaAsignacionDataTable">
    <thead>
        <th>Cliente</th>
        <th>Proyecto</th>
        <th>Empresa</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Descripcion</th>
        <th class="text-center">Eliminar</th>
    </thead>
    <tbody>
    <?php while ($mostrar = mysqli_fetch_array($respuesta)) {
    ?>
        <tr>
            <td><?php echo $mostrar['nombrePersona'];?></td>
            <td><?php echo $mostrar['nombreProyecto']?></td>
            <td><?php echo $mostrar['empresa']?></td>
            <td><?php echo $mostrar['direccion']?></td>
            <td><?php echo $mostrar['telefono']?></td>
            <td><?php echo $mostrar['descripcion']?></td>
            <td class="text-center">
                <button class="btn btn-outline-danger btn-sm"
                    onclick="eliminarAsignacion(<?php echo $mostrar['idAsignacion'];?>)">
                    <span class="fas fa-trash-alt"></span>
                </button>
            </td>
        </tr>
    <?php 
        }
    ?>
    </tbody>
</table>
<script>
    $(document).ready(function() {
        $('#tablaAsignacionDataTable').DataTable({
            language: {
                url: "../public/datatable/es-ES.json"
            }
        });
    })
</script>