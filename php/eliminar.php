<?php
    $idd = ($_GET['var']);

    $leer = fopen('../datos/registros.txt','r');
    $escribir = fopen('../datos/registrosTem.txt','a+');
    while(!feof($leer)){
        $Id = fgets($leer);
        $contrasena = fgets($leer);
        $userName = fgets($leer);
        $tipoEmp = fgets($leer);
        $salario = fgets($leer);
        $sexo = fgets($leer);
        $imagen = fgets($leer);

    if((int)$idd !== (int)$Id){
        fputs($escribir,$Id);
        fputs($escribir,$contrasena);
        fputs($escribir,$userName);
        fputs($escribir,$tipoEmp);
        fputs($escribir,$salario);
        fputs($escribir,$sexo);
        fputs($escribir,$imagen);
        }
}
fclose($leer);
fclose($escribir);
if(rename("../datos/registrosTem.txt","../datos/registros.txt")){
    header('Location: ../empleados-eliminar.php');
}
?>