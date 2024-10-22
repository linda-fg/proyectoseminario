<?php 
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
       $idUsuario = $_SESSION['usuario']['id'];
        include "../clases/Conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
?>
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Asignación de Solicitudes</h1>
                <p class="lead">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAsignarEquipo"><span class="fas fa-plus-circle"></span>
                        Asignar Solicitudes De Proyectos
                    </button>
                    <hr>
                    <div id="tablaAsignacionLoad"></div>
                </p>
            </div>
        </div>
    </div>
<?php
    include "asignacion/modalAsignar.php";
    include "footer.php";
?>
<script src="../public/js/asignacion/asignacion.js"></script>
<?php    
    } else {
        header("location:../index.html");
    }
?>