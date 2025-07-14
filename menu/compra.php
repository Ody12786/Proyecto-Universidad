<?php

include('../database/connect_db.php');
 // if($conex){
   //     echo "todo bien!!";
    //}

    
$id=$_REQUEST['id'];


$query="SELECT c.Cic,p.Nombre_p,p.Apellido, v.F_venta, e.Id_prod,e.Cant_ped,
k.Nombre,k.Tipo, k.Talla,v.Id_ven,k.Descripcion,v.T_pagar,c.N_afiliacion,e.Cant_ped,k.Medida
FROM Venta v INNER JOIN Venta_incluye_producto e ON v.Id_ven = e.Id_ven
 INNER JOIN Cliente c ON v.Cic=c.Cic INNER JOIN Persona p ON c.Cic=p.Ci
 INNER JOIN Producto k ON k.lote_prod=e.Id_prod where v.Fac= $id";


$resultad = mysqli_query($conex,$query);

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <script  src="../js/jquery-3.4.1.min.js"> </script>
    <link rel="stylesheet" href="../css/styleMenu.css">
    <link rel="stylesheet" href="../css/modulos.css">
    <link rel="stylesheet" href="../css/styleProductos.css">

</head>

<body>

<?php

if($resultad->num_rows > 0){


    while($row=$resultad->fetch_assoc()){
        $nombre= $row['Nombre_p'];
        $apellido= $row['Apellido'];
        $afiliacion= $row['N_afiliacion'];
        $cedula= $row['Cic'];
        $lote= $row['Id_prod'];
        $producto= $row['Nombre'];
        $tipo= $row['Tipo'];
        $descripcion= $row['Descripcion'];
        $talla= $row['Talla'];
        $total= $row['T_pagar'];
        $cantidad= $row['Cant_ped'];
        $medida= $row['Medida'];


        $medida;
        if($medida == 1){
            $leer="Unidades";
    
        }
        if($medida == 2){
            $leer="Pares";
    
        }
        if($medida == 12){
            $leer="Docenas";
    
        }
        $contacto=$leer;
    
    
    };

};    ?>
    
</body>



