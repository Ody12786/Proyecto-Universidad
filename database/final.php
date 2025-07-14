
<?php
include("connect_db.php");


    $cedula=$_REQUEST['cedula'];
    $factura=$_REQUEST['factura'];
    $fecha=date('y/m/d');
    $insertar="";
    $insertare="";
    // $insertarel="";
    // $insertarele="";
    // $iva=$_REQUEST['iva'];
    
    // $vamo$valor=$_REQUEST['vador'];s="";
    $cantProd=count($_REQUEST['id']);


    for($i=0; $i < $cantProd; $i++){
        $insertar=$insertar."('".$factura."','".$fecha."','".$cedula."','".$_REQUEST['id'][$i]."','".$_REQUEST['cantidad'][$i]."','".$_REQUEST['medida'][$i]."','".$_REQUEST['pagar'][$i]."','".$_REQUEST['iva'][$i]."'),";
   }
    $insertar=rtrim($insertar,",");
    
    $queryD="INSERT INTO Factura_total(N_factura,Fecha,Cedula,Id_producto,Cant_sol,Medida_p,Total_pro,Iva)
    VALUES
    $insertar;";
 
    $resultado= mysqli_query($conex,$queryD);
    if($resultado){
       
            echo 1;
        exit();
    }else{
        echo 2;// no registro las ventas
        exit();
    }




?>