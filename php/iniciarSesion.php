<?php

$clave = (int) $_REQUEST['userName'];
$password = ($_REQUEST['password']);

$leer = fopen('../datos/registros.txt','r');
$flag = true;
while(!feof($leer)){
    $Id = fgets($leer);
    $contrasena = fgets($leer);
    $userName = fgets($leer);
    $tipoEmp = fgets($leer);
    $salario = fgets($leer);
    $sexo = fgets($leer);
    $imagen = fgets($leer);

    if((int)$clave==$Id && (substr_compare($password,$contrasena,0,strlen($password)) == 0)){
        $flag = false;
        break;
        }
}
fclose($leer);
if($flag){
    header('Location: ../login.html');
}else{
    header('Location: ../info.php?id='.$Id);
}
?>