<?php

$id = (int)$_REQUEST['id'];
$contrasena = $_REQUEST['contraseñaUser'];
$nombre = $_REQUEST['nombre'];

if($_REQUEST['tiemp'] == 'Administrador'){
    $tipoEmpleado = 'Administrador';
}

if($_REQUEST['tiemp'] == 'Empleado'){
    $tipoEmpleado = 'Empleado';
}

$salario = $_REQUEST['salario'];

if($_REQUEST['sexo'] == 'Masculino'){
    $sexoEmp = 'Masculino';
}

if($_REQUEST['sexo'] == 'Femenino'){
    $sexoEmp = 'Femenino';
}

$urlImagen = $_REQUEST['urlFoto'];

    $leer =fopen('../datos/registros.txt','r');
    $flag = true;
    while(!feof($leer)){
        $Id = fgets($leer);
        $clave = fgets($leer);
        $nom = fgets($leer);
        $tipoEm = fgets($leer);
        $sal = fgets($leer);
        $sexEmp = fgets($leer);
        $imagen = fgets($leer);

        if($id==$Id){
            $flag = false;
            break;
        }
    }
    fclose($leer);

    if($flag){
        $guardar=fopen('../datos/registros.txt','a+');
        fputs($guardar,$id."\n");
        fputs($guardar,$contrasena."\n");
        fputs($guardar,$nombre."\n");
        fputs($guardar,$tipoEmpleado."\n");
        fputs($guardar,$salario."\n");
        fputs($guardar,$sexoEmp."\n");
        fputs($guardar,$urlImagen."\n");
        fclose($guardar);
        header('Location: ../empleados-eliminar.php');
    }else{
        header('Location: ../registros.php');
    }






?>