<?php 
    include "header.php";
    if (isset($_SESSION['usuario']) 
        && $_SESSION['usuario']['rol'] == 1 || $_SESSION['usuario']['rol'] == 2) {
            $idUsuario = $_SESSION['usuario']['id'];
        include "../clases/Conexion.php";
        $con = new Conexion();
        $conexion = $con->conectar();
?>
    <!-- Page Content -->
    <div class="container">
        <div class="card border-0 shadow my-5">
            <div class="card-body p-5">
                <h1 class="fw-light">Bienvenido: <?php echo $_SESSION['usuario']['nombre'];?></h1>
                <p class="lead">
                    <div class="row">
                        <div class="col-sm-4"><b>Nombre: </b><span id="nombre"></span></div>
                        <div class="col-sm-4"><b>Apellido: </b><span id="apellido"></span></div>
                        <div class="col-sm-4"><b>Direccion: </b><span id="direccion"></span></div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4"><b>Telefono: </b><span id="telefono"></span></div>
                        <div class="col-sm-4"><b>Correo: </b><span id="correo"></span></div>
                        <div class="col-sm-4"><b>Edad: </b><span id="edad"></span></div>
                    </div><hr>

                    <!-- CONTEOS DE TABLAS - RESUMENES ESTADISITICAS -->
                  <div class="container">
                    <div class="row">
                        
                        <div class="col-sm-4">
                            <?php
                                $sql = "SELECT COUNT(id_cliente) AS clientes FROM t_clientes";
                                $respuesta = mysqli_query($conexion, $sql);
                            ?>
                            <div class="card bg-success text-black text-center mb-3" style="max-width: 18rem;">
                                <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                              <div class="card-header"><b>Total de Clientes</b></div>
                              <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $mostrar['clientes']; ?></h5>
                                <p class="card-text"></p>
                              </div>
                              <?php } ?>
                            </div>  
                        </div>
                        <div class="col-sm-4">
                            <?php
                                $sql = "SELECT COUNT(id_proyecto) AS proyecto FROM t_cat_equipo";
                                $respuesta = mysqli_query($conexion, $sql);
                            ?>
                            <div class="bg-info   text-black text-center mb-1" style="max-width: 18rem;">
                                <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                              <div class="card-header"><b>Total de Proyectos </b></div>
                              <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $mostrar['proyecto']; ?></h5>
                                <p class="card-text"></p>
                              </div>
                              <?php } ?>
                            </div>  
                        </div>
                        <div class="col-sm-4">
                            <?php
                                $sql = "SELECT COUNT(estatus) AS estatus FROM t_reportes";
                                $respuesta = mysqli_query($conexion, $sql);
                            ?>
                            <div class="bg-warning  text-black text-center mb-1" style="max-width: 18rem;">
                                <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                              <div class="card-header"><b>Total de Solicitudes</b></div>
                              <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $mostrar['estatus']; ?></h5>
                                <p class="card-text"></p>
                              </div>
                              <?php } ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <?php
                                $sql = "SELECT COUNT(*) AS cantidad_reportes_activos FROM t_reportes WHERE estatus = 1";
                                $respuesta = mysqli_query($conexion, $sql);
                            ?>
                            <div class="text-black text-center mb-1" style="max-width: 18rem; background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(255,146,11,1) 0%);">
                                <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                              <div class="card-header"><b>Total de Comentarios Activos</b></div>
                              <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $mostrar['cantidad_reportes_activos']; ?></h5>
                                <p class="card-text"></p>
                              </div>
                              <?php } ?>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <?php
                                $sql = "SELECT COUNT(*) AS cantidad_reportes_inactivos FROM t_reportes WHERE estatus = 0";
                                $respuesta = mysqli_query($conexion, $sql);
                            ?>
                            <div class="text-black text-center mb-1" style="max-width: 18rem; background: radial-gradient(circle, rgba(63,94,251,1) 0%, rgba(230,29,23,1) 0%);">
                                <?php while ($mostrar = mysqli_fetch_array($respuesta)) { ?>
                              <div class="card-header"><b>Total de Comentarios Inactivos</b></div>
                              <div class="card-body">
                                <h5 class="h1 card-title"><?php echo $mostrar['cantidad_reportes_inactivos']; ?></h5>
                                <p class="card-text"></p>
                              </div>
                              <?php } ?>
                            </div>
                        </div>
                        
                    </div>
                 </div> 



                 <!-- GRAFICAS -->

                 <div class="panel panel-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div id="cargaLineal"></div>
                            </div>
                            
                        </div>
                    </div>

                     <div class="panel panel-body">
                        <div class="row">
                            
                            <div class="col-sm-12">
                                <div id="cargaBarras"></div>
                            </div>
                        </div>
                    </div>
                    

                </p>
            </div>
        </div>
    </div>
<?php
    include "footer.php";
?>
    <script src="../public/js/inicio/personales.js"></script>
    <script>
        let idUsuario = '<?php echo $idUsuario;?>';
        datosPersonalesInicio(idUsuario);
    </script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#cargaLineal').load('lineal.php');
            $('#cargaBarras').load('barras.php');
            
        });
    </script>

    <script src="../public/plotly/plotly-latest.min.js"></script>
<?php
    } else {
        header("location:../index.html");
    }
?>