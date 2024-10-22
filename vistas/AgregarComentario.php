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
                <h1 class="fw-light">COMENTARIOS</h1>
                <p class="lead">
                    <button class="btn btn-outline-primary" data-toggle="modal" data-target="#modalAgregarComentario"><span class="fas fa-plus-circle"></span>
                        Asignar Comentario
                    </button>
                    <a href="levantarReporte.php" class="btn btn-outline-primary"><span class=" fa fa-arrow-circle-left"></span> Volver</a>
                    <hr>
                    <div id="tablaComentariosLoad"></div>
                </p>
            </div>
        </div>
    </div>
<?php
    include "comentarios/modalComentarios.php";
    include "footer.php";
?>
<script src="../public/js/comentario/comentarios.js"></script>
<?php    
    } else {
        header("location:../index.html");
    }
?>