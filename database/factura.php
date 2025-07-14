<?php

include("connect_db.php");

// if($conex){
//        echo "todo bien";
//     }

// $salida="";
    $cedula=trim($_POST['cedula']);
    // $lote=trim($_POST['lote']);
    // $cantidad=trim($_POST['cant']);
    // $unidad=trim($_POST['unidad']);
   
    $validar=mysqli_query($conex, "SELECT * FROM Persona 
    WHERE Ci ='$cedula'");
    if(mysqli_num_rows($validar) <= 0){

        echo 1;//esto quiere decir que no esta registrada 
        //la cedula en el sistema y se debe registrar.
        exit();
    }



$consulta="SELECT Nombre_p, Apellido, Ci FROM Persona 
WHERE Ci ='$cedula'";
            
$resultado = mysqli_query($conex,$consulta);

$datos=mysqli_fetch_all($resultado,MYSQLI_ASSOC);



if(!empty ($datos)){
    echo json_encode($datos);


 }  else{
 echo json_encode([]);

 }


?>


        





   
