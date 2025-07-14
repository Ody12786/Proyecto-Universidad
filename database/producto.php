<?php

include("connect_db.php");

// if($conex){
//        echo "todo bien";
//     }
    $lote=trim($_POST['lote']);
    $nombre=trim($_POST['nombre']);
    $tipo=trim($_POST['tipo']);
    $talla=trim($_POST['talla']);
    $cantidad=trim($_POST['cantidad']);
    $cantida=trim($_POST['cantidad']);
    $medida=trim($_POST['medida']);
    $precio=trim($_POST['precio']);
    $descripcion=trim($_POST['descripcion']);
    $fecha=date("y/m/d");
    $estado=1;

   
    $valorunitario=$cantidad*$medida;
    $precio_u=$precio / $valorunitario;

    $exis_uni= $cantida*$medida;

    $validar=mysqli_query($conex, "SELECT * FROM Producto 
    WHERE lote_prod ='$lote'");
    if(mysqli_num_rows($validar) > 0){

        echo 3;//esto quiere decir que ya esta registrada 
        //el lote  en el sistema y es un dato que no se puede repetir.
        exit();
    }else{
            
            $consulta = "INSERT INTO Producto (lote_prod,Nombre,Tipo,Talla,Cantidad,Medida,Estado,Existencia,Descripcion,Precio_unit, Precio_total,fecha)
                                        VALUES('$lote','$nombre','$tipo','$talla','$cantidad','$medida',$estado ,'$exis_uni','$descripcion','$precio_u', '$precio','$fecha')";

            $resultado= mysqli_query($conex,$consulta);
            if($resultado){

                            echo 1;//registro correctamente

                            exit();
                            }else{

                                echo 2;//esto quiere decir que no registro los datos del producto
                                exit(); 
                            }
            
            

            }
  


     
    ?>