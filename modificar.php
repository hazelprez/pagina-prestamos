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

     <!-- 
        Campo IDOLD -> id=idOLD name=idOLD                                                    
        Campo ID -> id=inputID name=inputID
        Campo Contraseña -> id=contrasena name=contrasena
        Campo Nombre -> id=nombre name=nombre
        Select Tipo Empleado -> id=tipoEmp name=tipoEmp
        Campo Salario -> id=salario name=salario
        Select Sexo -> id=sexo name=sexo
        URL foto -> id=urlFoto name=urlFoto
     -->

     <script>
        function valida() {
            var id = document.getElementById('id').value;
            var nombre = document.getElementById('nombre').value;
            var tipoEmp = document.getElementById('tipoEmp').value;
            var url = document.getElementById('url').value;
            var contra = document.getElementById('contrasena').value;
            var salario = document.getElementById('salario').value;
            var sexo = document.getElementById('sexo').value;

            if (id!= '' && nombre !='' && tipoEmp !='Tipo de empleado' && salario !='' && sexo  !='Sexo' && url  !='' && contra !='') {
                return true;
            } else {
                alert('Por favor llena todos los campos');
                return false;
            }
        }
    </script>

    <?php
        $leer = fopen('datos/registros.txt','r');
        $flag = true;
        while(!feof($leer)){
            $Id = fgets($leer);
            $contrasena = fgets($leer);
            $userName = fgets($leer);
            $tipoEmp = fgets($leer);
            $salario = fgets($leer);
            $sexo = fgets($leer);
            $imagen = fgets($leer);
            if($Id == $_SESSION['id']){
                break;
            }
        }
        fclose($leer);
        ?>

    <title>Prestamos</title>

    <!-- Iconos y fuentes-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Estilo-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
                    <h1 class="h3 mb-4 text-gray-800">Perfil</h1>

                    <div class="row">

                        <div class="col-lg-12">

                            <!-- En estas tarjetas va el contenido -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                        <h6 class="m-0 font-weight-bold text-primary">Llene los campos para actualizar los datos
                                        </h6>
                                    </div>
                                    <div class="card-body">
                                    <div class="row">

                                        <!-- Area Chart -->
                                        <div class="col-xl-8 col-lg-7">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <!-- <div class="chart-area"> -->
                                                       
                                                        <form class="user" action="php/modificar.php" method="post" onsubmit="return valida();">
                                                            <div class="form-group">
                                                                <label for="inputID">ID</label>
                                                                <input type="text" class="form-control form-control-user"
                                                                id="inputID" name="inputID" value="<?php echo $_SESSION['id']?>" readonly>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputContrasena">Contraseña</label>
                                                                <input type="text" class="form-control form-control-user"
                                                                id="contrasena" name="contrasena" value="<?php echo $contrasena?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputNombre">Nombre</label>
                                                                <input type="text" class="form-control form-control-user"
                                                                id="nombre" name="nombre" value="<?php echo $userName?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <select class="form-select" id="tipoEmp" name="tipoEmp" aria-label="Default select example" value="<?php echo $tipoEmp?>">
                                                                    <option selected><?php echo $tipoEmp?></option>
                                                                    <option value="Administrador">Administrador</option>
                                                                    <option value="Empleado">Empleado</option>
                                                                  </select>
                                                                </div>
                                                                <div class="form-group">
                                                                <label for="inputSalario">Salario</label>
                                                                <input type="text" class="form-control form-control-user"
                                                                    id="salario" name="salario" value="<?php echo $salario?>">
                                                                </div>
                                                            <div class="form-group">
                                                                <select class="form-select" id="sexo" name="sexo" aria-label="Default select example" value="<?php echo $sexo?>">
                                                                    <option selected><?php echo $sexo?></option>
                                                                    <option value="Masculino">Masculino</option>
                                                                    <option value="Femenino">Femenino</option>
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="inputURL">URL de la Foto</label>
                                                                <input type="text" class="form-control form-control-user"
                                                                id=urlFoto name=urlFoto value="<?php echo $imagen?>">
                                                            </div>
                                                            <button type="su" id="btnModificar" class="btn btn-primary" style="margin-left: 520px;">Guardar cambios</button>
                                                        </form>
                                                    <!-- </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5">
                                            <div class="card shadow mb-4">
                                                <!-- Card Header - Dropdown -->
                                                <div
                                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                                    <h6 class="m-0 font-weight-bold text-primary">Foto de perfil</h6>
                                                </div>
                                                <!-- Card Body -->
                                                <div class="card-body">
                                                    <div class="chart-pie pt-4 pb-2">
                                                        <input type="image" class="rounded-circle" src="<?php echo $imagen?>" style="width: 250px; height: 250px; margin-left: 20px; border: 1px solid black;" id="foto" name="inputFoto">
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        </div>
                                    </div>
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