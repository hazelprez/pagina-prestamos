<?php
 $idEmpleado=(int)$_REQUEST['idEmpleado'];
 $montoPagar=(float)$_REQUEST['montoPagar'];

$leer=fopen('../datos/prestamos.txt', 'r');
$escribir=fopen('../datos/temp.txt', 'a+');
while(!feof($leer)){
   $id=fgets($leer);
   $adeudo=fgets($leer);
   $quincenas=fgets($leer);

   

   if($idEmpleado!=$id){
    fputs($escribir,$id);
    fputs($escribir,$adeudo);
    fputs($escribir,$quincenas);

}
   else
     if($idEmpleado==$id&&$id!=""){
        $nuevoAdeudo = (float)$adeudo-(float)$montoPagar;
        $nuevaquincenas = (int)$quincenas-1;
     fputs($escribir,$id);
     fputs($escribir,$nuevoAdeudo."\n");
     fputs($escribir,$nuevaquincenas."\n");
 }
 
   
}
fclose($leer);
fclose($escribir);

if(rename("../datos/temp.txt", "../datos/prestamos.txt")){
    header('Location: ../pagar.php');
}
?>
