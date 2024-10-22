<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../public/img/login-logo.ico" type="image/x-icon">
    <link rel="stylesheet" href="../public/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="../public/css/plantilla.css">
    <link rel="stylesheet" href="../public/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/datatable/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../public/fontawesome/css/all.css">
    <link rel="stylesheet" href="../public/datatable/buttons.dataTables.min.css">
    <link rel="stylesheet" href="../public/select2/bootstrap-select.min.css">
    <title>MOTOSIN</title>
</head>

<body style="background-image: linear-gradient(-225deg, #77FFD2 0%, #6297DB 48%, #1EECFF 100%);">
    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
        <div class="container">
            <a class="navbar-brand" href="inicio.php">GRUPO MOTOSIN</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                    
                    <?php 
                        if ($_SESSION['usuario']['rol'] == 1) {
                    ?>
                    <li class="nav-item">
                      <a class="nav-link" href="misDispositivos.php">Proyectos</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="misReportes.php">Reportes</a>
                    </li>
                    <?php 
                        } elseif ($_SESSION['usuario']['rol'] == 2) {
                    ?>

                    <!-- Administrador vistas-->
                    <li class="nav-item">
                      <a class="nav-link" href="usuarios.php"><span class="fas fa-user"></span> Usuarios</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="clientes.php"><span class="fas fa-address-book"></span> Clientes</a>
                    </li>
                     <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa fa-folder-open"></span> Cotizaciones  </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="nav-link" href="asignacion.php"><span class="fas fa-address-book"></span> Asignacion</a>
                          <div class="dropdown-divider"></div>
                          <a class="nav-link" href="misProyectos.php"><span class="fa fa-edit"></span> Solicitudes</a>
                          
                        </div>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fa fa-folder-open"></span> Proyectos  </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="proyectos.php"><span class="fa fa-book"></span>  Nombre Proyecto</a>
                          <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="gestor3.php"><span class="fa fa-arrow-circle-up"></span>   Subir Proyectos</a>
                          
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" 
                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="fas fa-file-alt"></span> Reportes  </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="nav-link" href="reportes.php"><span class="fas fa-file-alt"></span> Reportes</a>
                          <div class="dropdown-divider"></div>
                          <a class="nav-link" href="levantarReporte.php"><span class="fas fa-file-alt"></span> Agregar Reporte</a>
                          
                        </div>
                    </li>
                    <?php 
                        }
                    ?>
                    <li class="nav-item dropdown">
                        <a style="color: red;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="fas fa-user-check"></span> Usuario: <?php echo $_SESSION['usuario']['nombre'];?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
<!--                    <a class="dropdown-item" href="#"
                                data-toggle="modal"
                                data-target="#modalActualizarDatosPersonales"
                                onclick="obtenerDatosPersonalesInicio('<?php echo $_SESSION['usuario']['id'];?>')">
                            <span class="fas fa-user-edit"></span> Editar datos
                        </a> 
                        <div class="dropdown-divider"></div> -->
                        <a class="dropdown-item" href="../procesos/usuarios/login/salir.php">
                            <span class="fas fa-sign-out-alt"></span> Salir
                        </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    </body>

 </html>