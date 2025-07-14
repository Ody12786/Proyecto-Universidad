<?php

include("connect_db.php");

// if($conex){
//        echo "todo bien";
//     }

    $nombre=$_REQUEST['nombre'];
    $apellido=trim($_POST['apellido']);
    $cedula=trim($_POST['cedula']);
    $sexo=trim($_POST['sexo']);
    // $afiliacion=trim($_POST['afiliacion']);
   


    $validar=mysqli_query($conex, "SELECT * FROM persona 
    WHERE Ci ='$cedula'");
    if(mysqli_num_rows($validar) > 0){

        echo 5;//esto quiere decir que ya esta registrada 
        //la cedula en el sistema y es un dato que no se puede repetir.
        exit();
    }
    // else{

    //     $verificar=mysqli_query($conex, "SELECT * FROM cliente
    //     WHERE N_afiliacion ='$afiliacion'");
    //     if(mysqli_num_rows($verificar) > 0){
    
    //         echo 4;//esto quiere decir que ya esta registrada 
    //         //el numero de afiliado.
    //         exit();
    //     }
    else{
            
            $consulta = "INSERT INTO persona (Ci,Nombre_p,Apellido,Sexo)
            VALUES('$cedula','$nombre','$apellido','$sexo')";

            $resultado= mysqli_query($conex,$consulta);
            if($resultado){

                           $consultad = "INSERT INTO cliente (Cic)
                            VALUES('$cedula')";
                            $resultadod= mysqli_query($conex,$consultad);

                            echo 1;//registro correctamente

                            exit();
                            }else{

                                echo 2;//esto quiere decir que no registro los datos del cliente
                                exit(); 
                            }
            
            

            }
    


        





   
