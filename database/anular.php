<?php

 
include("connect_db.php");

$lote=$_POST['id'];
$estado=$_POST['estatus'];
// $nombre=$_POST['nompp'];
// $tipo=$_POST['tipo'];
// $descripcion=$_POST['descu'];
$talla=$_POST['talla'];
$cantidad=$_POST['canti'];
$medida=$_POST['medida'];
$precio=$_POST['precio'];
$fecha=$_POST['fecc'];
$unidad=$_POST['cantie'];


$cambiar="UPDATE  producto SET  Existencia = $unidad,fecha = $fecha,Estado = $estado,Cantidad = $cantidad,Medida = $medida,Talla= $talla,Precio_total = $precio  WHERE lote_prod = $lote";
// UPDATE `producto` SET `Medida` = '$medida', `Existencia` = '$unidad', `Descripcion` = '$descripcion' WHERE `producto`.`lote_prod` = '$lote';
//  echo $cambiar;
$resultado= mysqli_query ($conex,$cambiar); 
if($resultado){
    
            echo 1;
            exit();

    }
    else{
        echo 2;
        exit();
        
        
    }



?>