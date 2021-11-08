<?php 
session_start();  
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Prestamos</title>

    <!-- Iconos y fuentes-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Estilo-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Wrapper principal -->
    <div id="wrapper">

        <!-- Barra lateral de opciones -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Cabecera de la barra lateral -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="info.php?id=<?php echo $_SESSION['id']?>">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Prestamos</div>
            </a>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Registrar -->
            <li class="nav-item">
                <a class="nav-link" href="registros.php">
                    <i class="fas fa-fw fa-check"></i>
                    <span>Registrar</span></a>
            </li>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Perfil -->
            <li class="nav-item">
                <a class="nav-link" href="modificar.php">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Perfil</span></a>
            </li>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Solicitar Prestamo -->
            <li class="nav-item">
                <a class="nav-link" href="solicitar-prestamo.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Solicitar Préstamo</span></a>
            </li>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Pagar -->
            <li class="nav-item">
                <a class="nav-link" href="pagar.php">
                    <i class="fas fa-fw fa-dollar-sign"></i>
                    <span>Pagar</span></a>
            </li>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Empleados -->
            <li class="nav-item">
                <a class="nav-link" href="empleados-eliminar.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Empleados</span></a>
            </li>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Adeudos -->
            <li class="nav-item">
                <a class="nav-link" href="adeudos.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Adeudos</span></a>
            </li>

            <!-- Division -->
            <hr class="sidebar-divider my-0">

            <!-- Historial de prestamos -->
            <li class="nav-item">
                <a class="nav-link" href="grafica-prestamos.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Historial de prestamos</span></a>
            </li>

        </ul>
        <!-- Termina la barra lateral -->

        <!-- Contenido de la pagina -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main -->
            <div id="content">

                <!-- Barra superior  -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Solo contendra el boton de cerrar sesion -->
                    <a href="#" class="btn btn-secondary btn-icon-split" data-toggle="modal" data-target="#logoutModal">
                        <span class="icon text-white-50">
                            <i class="fas fa-arrow-right"></i>
                        </span>
                        <span class="text">Cerrar Sesión</span>
                    </a>

                </nav>
                <!-- Final de la barra superior  -->

                <!-- Inicio del contenido de la pagina -->
                <div class="container-fluid">

                    <!-- Titulo -->
                    <h1 class="h3 mb-4 text-gray-800">Pagar</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- En estas tarjetas va el contenido -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Aqui se mostraran los datos de los pagos que el empleado debe realizar</h6>
                                </div>
                                <div class="card-body">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Adeudo $</th>
                                                <th>Numero de quincenas</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $leer=fopen("datos/prestamos.txt","r"); 
                                        while(!feof($leer)){ 
                                            $claveid=fgets($leer);
                                            $monto=fgets($leer);
                                            $quincenas=fgets($leer);
                                         if((int)$claveid==$_SESSION['id']){
                                             echo '
                                             <tr><td>'.$claveid.'</td><td>'.$monto.'</td><td>'.$quincenas.'</td></tr>';
                                         }
                                     }
                                     fclose($leer);
                                    ?>
                                        </tbody>
                                    </table>
                                    <hr class="sidebar-divider my-0">
                                    <br>
                                    <form action="php/realizarPago.php">
                                    <div class="form-group" id="cajaID">
                                        <label>ID del Empleado</label>
                                        <input type="text" class="form-control form-control-user"
                                            id="idEmpleado" name="idEmpleado" value="<?php echo $_SESSION['id']?>" readonly>
                                    </div>
                                    <label for="montoPagar">Monto a pagar</label>
                                    <input type="text" class="form-control form-control-user" id="montoPagar" name="montoPagar" aria-describedby="emailHelp">
                                    <br>
                                    <button class="btn btn-primary btn-user btn-block" id="btnSolicitar" style="margin-bottom: 20px;">
                                        Pagar
                                    </button>
                                    <a href="#" class="btn btn-info btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-info-circle"></i>
                                        </span>
                                        <span class="text">Descargar</span>
                                    </a>
                                    </form> 
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- Final del Main  -->

        </div>
        <!-- Contenido de la pagina -->

    </div>
    <!-- Final del Wrapper principal -->

    <!-- Modal para cerrar sesion-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Deseas cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Aceptar" si estas seguro de que deseas cerrar sesión</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="login.html">Aceptar</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>




</body>

</html>