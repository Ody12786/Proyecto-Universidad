<?php

include("connect_db.php");

// if($conex){
//        echo "todo bien";
//     }

// $salida="";
    // $cedula=trim($_POST['cedula']);
    $lote=trim($_POST['lote']);
    $cantidad=trim($_POST['cantidad']);
    $unidad=trim($_POST['unidad']);
    $existe="";
   
    $validar=mysqli_query($conex, "SELECT * FROM Producto 
    WHERE lote_prod ='$lote'");
    if(mysqli_num_rows($validar) <= 0){

        echo 1;//esto quiere decir que no esta registrada 
        //la cedula en el sistema y se debe registrar.
        exit();
    }

    $canExis = "SELECT Existencia,Medida FROM Producto WHERE lote_prod ='$lote'";
    $existencia = mysqli_query($conex,$canExis);

    while($row = mysqli_fetch_assoc($existencia))   { 
        $exist= $row['Existencia'];
        $medida= $row['Medida'];  
 
}


$cantcount=$cantidad * $unidad;


    if($exist < $cantcount){

        echo 3;//esto quiere decir que la cantidad solicitada supera la existencia del material en el inventario
        exit();
    }

        // if($unidad !== $medida){
        //     echo 4;//esto quiere decir que el nombre de usuario ya esta en uso.
        //     exit();
        // }



$consulta="SELECT Nombre, Tipo, Talla, lote_prod, Existencia,Medida, Descripcion,Precio_unit  FROM Producto
WHERE lote_prod ='$lote'";
            
$resultado = mysqli_query($conex,$consulta);

$datos=mysqli_fetch_all($resultado,MYSQLI_ASSOC);





if(!empty ($datos)){
    echo json_encode($datos);


 }  else{
 echo json_encode([]);

 }
 $existe=$cantidad*$unidad;
 $operacion= $exist-$existe;
 $material="UPDATE Producto  SET Existencia = '$operacion'  WHERE  lote_prod ='$lote'";
 $realizar= mysqli_query ($conex,$material);  

?>

    





   
