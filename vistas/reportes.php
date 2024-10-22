<?php 
    include "header.php";
    if (isset($_SESSION['usuario']) && $_SESSION['usuario']['rol'] == 2) {
        $idUsuario = $_SESSION['usuario']['id'];
?>
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Gestionar Reportes</h1>
                <p class="lead">
                    <hr>
                    <div id="tablaReportesAdminLoad"></div>
                </p>
            </div>
        </div>
    </div>
<?php
    include "reportesAdmin/modalAgregarSolucion.php";
    include "footer.php";
?>
    <script src="../public/js/reportesAdmin/reportesAdmin.js"></script>
<?php
    } else {
        header("location:../index.php");
    }
?>