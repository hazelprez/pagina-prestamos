<?php
    $IdM = (int) $_REQUEST['inputID'];
    $contrasenaM = $_REQUEST['contrasena'];
    $userNameM = $_REQUEST['nombre'];
    $tipoEmpM = $_REQUEST['tipoEmp'];
    $salarioM = $_REQUEST['salario'];
    $sexoM = $_REQUEST['sexo'];
    $imagenM = $_REQUEST['urlFoto'];

    echo $contrasenaM;
    echo $userNameM;
    echo $tipoEmpM;
    echo $salarioM;
    echo $sexoM;
    echo $imagenM;

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

    if((int)$IdM !== (int)$Id){
        fputs($escribir,$Id);
        fputs($escribir,$contrasena);
        fputs($escribir,$userName);
        fputs($escribir,$tipoEmp);
        fputs($escribir,$salario);
        fputs($escribir,$sexo);
        fputs($escribir,$imagen);
        }
}

    fputs($escribir,$IdM."\n");
    fputs($escribir,$contrasenaM."\n");
    fputs($escribir,$userNameM."\n");
    fputs($escribir,$tipoEmpM."\n");
    fputs($escribir,$salarioM."\n");
    fputs($escribir,$sexoM."\n");
    fputs($escribir,$imagenM."\n");

fclose($leer);
fclose($escribir);
if(rename("../datos/registrosTem.txt","../datos/registros.txt")){
    header('Location: ../modificar.php');
}
?>