<?php

include("connect_db.php");



    $nombre=trim($_POST['usuario']);
    $pass=trim($_POST['contrasena']);
    $pregunta=trim($_POST['pregunta']);
    $respuesta=trim($_POST['respuesta']);
    $preguntad=trim($_POST['preguntaDos']);
    $respuestad=trim($_POST['respuestaDos']);
    $tipo=$_POST['tipo'];

    $carnet=trim($_POST['carnet']);





    $validar=mysqli_query($conex, "SELECT * FROM Usuario 
    WHERE Nombre ='$nombre'");
    if(mysqli_num_rows($validar) > 0){

        echo 5;//esto quiere decir que el nombre de usuario ya esta en uso.
        exit();
    }else{
 
    $verificar=mysqli_query($conex, "SELECT * FROM Empleado 
    WHERE carnet ='$carnet'");
    if(mysqli_num_rows($verificar) == 0){

        echo 4;//esto quiere decir que el carnet ingresado no existe en el sistema y 
        //no se puede registrar un usuario sin ser empleado de la empresa
        exit();
    }else{


        $consulta = "INSERT INTO Usuario (Nombre,Contrasena,tipo,carnet)
        VALUES('$nombre','$pass','$tipo',$carnet)";
        
       $resultado= mysqli_query($conex,$consulta);

        if($resultado){// si se cumple esta condicional ya habra registrado datos de usuario


            $consultaD = "INSERT INTO Recuperar_contrasena (P1,P2,R1,R2)
            VALUE('$pregunta','$preguntad','$respuesta','$respuestad')";
            $resultadoD= mysqli_query($conex,$consultaD);
            if($resultadoD){
                echo 1;//registro exitoso
                exit();
            }else{
                echo 2;// no registro las preguntas
                exit();
            }

        }else{
            echo 3;//no se pudo registrar el usuario por algun problema
            exit();

        }


    }
   
}


?>