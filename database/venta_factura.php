
<?php
include("connect_db.php");


    $cedula=$_REQUEST['cedulla'];
    $fecha=date('y/m/d');
    $insertar="";
    $insertare="";
    // $insertarel="";
    // $insertarele="";
    $iva=$_REQUEST['iva'];
    $valor=$_REQUEST['vador'];
    // $vamos="";
    $cantProd=count($_REQUEST['loter']);
    
  
    for($i=0; $i < $cantProd; $i++){
        $insertar=$insertar."('".$fecha."','".$valor."','".$_REQUEST['pagar'][$i]."','".$iva."','".$cedula."'),";
   }
    $insertar=rtrim($insertar,",");
    
    $queryD="INSERT INTO Venta (F_venta,Fac,T_pagar,IVA,Cic)
    VALUES
    $insertar;";
        // $verificar=mysqli_query($conex, "SELECT * FROM Venta 
        // WHERE fac ='$valor'");
        // if(mysqli_num_rows($verificar) == 0){

        //     exit();
        // }
 
    $resultado= mysqli_query($conex,$queryD);
    if($resultado){
        // echo $queryD;
        // si se cumple esta condicional ya habra registrado datos de la venta
    // echo 1;
    
    for($i=0; $i < $cantProd; $i++){

        $insertare=$insertare."('".$_REQUEST['loter'][$i]."','".$fecha."','".$_REQUEST['cantidad'][$i]."','".$_REQUEST['unidad'][$i]."','". $_REQUEST['pagar'][$i]."'),";
    }

    $insertare=rtrim($insertare,",");
    $queryDe="INSERT INTO Venta_incluye_producto (Id_prod, F_venta,Cant_ped,Medida,MontoTotal)
     VALUES
    $insertare;";
    // echo $queryDe;
    $resultadoD= mysqli_query($conex,$queryDe);
        if($resultadoD){
            echo $valor;
 

        exit();
    }else{
        echo 2;// no registro las ventas
        exit();
    }
}



?>