<?php
 $idEmpleado=(int)$_REQUEST['idEmpleado'];
 $montoPrestamo=(float)$_REQUEST['montoPrestamo'];
 $numeroQuincenas=$_REQUEST['numeroQuincenas'];
 $montoMaximo=0;

 $flag = true;

 $leerRegistros=fopen("../datos/registros.txt","r"); 
 while(!feof($leerRegistros)){ 
     $claveid=fgets($leerRegistros);
     $password=fgets($leerRegistros);
     $nombre=fgets($leerRegistros);
     $tipoEmp=fgets($leerRegistros);
     $salario=fgets($leerRegistros);
     $sexo=fgets($leerRegistros);
     $urlFoto=fgets($leerRegistros);

     if($idEmpleado==$claveid){
        $montoMaximo=(float)$salario*3;
    }

 }
 fclose($leerRegistros);

 $leer=fopen("../datos/prestamos.txt","r"); 
 while(!feof($leer)){ 
     $id=fgets($leer);
     $monto=fgets($leer);
     $quincenas=fgets($leer);

     if($idEmpleado==$id){
        $flag = false;
        echo'<script type="text/javascript">
    alert("El empleado tiene un préstamo");
    window.location.href="../solicitar-prestamo.php";
    </script>';

        break;
    }else if($montoPrestamo>$montoMaximo){
        $flag = false;
        echo"<script type='text/javascript'>
    alert('El monto máximo es: $$montoMaximo');
    window.location.href='../solicitar-prestamo.php';
    </script>";
        break;
    }
 }
 fclose($leer);


 if($flag){
    $guardar=fopen("../datos/prestamos.txt", "a+"); 

    fputs($guardar,$idEmpleado."\n");

    fputs($guardar,$montoPrestamo."\n");

    fputs($guardar,$numeroQuincenas."\n");

    fclose($guardar);
    echo'<script type="text/javascript">
    alert("Prestamo otorgado");
    window.location.href="../solicitar-prestamo.php";
    </script>';
 }

?>