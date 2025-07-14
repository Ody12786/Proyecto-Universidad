<?php
include("../database/connect_db.php");
session_start();

$sesion=$_SESSION['usuario'];


if($sesion === null || $sesion ===''){
    header("location:../login.php");
}

$query="SELECT tipo FROM usuario WHERE usuario = '$sesion'";
$resultado= $conex->query($query);

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
    <link rel="stylesheet" href="../css/styleVenta.css">

</head>

<body>


    <!-- <header class="banner">

    </header> -->
    

<div  class=contenedor>

                   


                    <div class="opciones" >
                    <div class="contlogo" >
                                 
                                    </div>

           

                               <div class="menu" id="menu">

                                    <div class="opcion usu"  id="mUsu">
                                        <img src="../img/usu.svg" alt="" title="Usuarios" class="usu" >
                                        <h4 class="usu" >Usuario</h4>
                                    </div>



                                    <div class="opcion produ"  id="mProd">
                                        <img src="../img/carpeta.svg" alt="" title="Productos" class="produ" >
                                        <h4 class="produ" >Productos</h4>
                                    </div>

                                    <div class="opcion cli"  id="mCli">

                                    <img src="../img/auriculares.svg" alt="" title="Clientes" class="cli" >
                                        <h4 class="cli">Clientes</h4>
                                    </div>

                                    <div class="Cusu"  id="mPro">
                                        <img src="../img/crecer.svg" alt="" titlt="Clientes" class="cli" >
                                        <h4 class="cli">Ventas</h4>
                                </div>

        


                        </div>

                    </div>

                    <section  class="sub-menu">

                                            
                                            <div class="registro">Efectuar venta</div>
                                            <div class="ver">Ver Ventas</div>
                                            <div class="volver">Cerrar sesion</div>
                                           


                                    </section>

                                    </div>


                                    <?php  
                                //    estos son datos rescatados del link
                                          $id=$_REQUEST['id'];
                                        //  $nombre=$_REQUEST['nombre']; ?>


                                    <?php     
                                    
                                    
                                    $consulta="SELECT c.Cic,p.Nombre_p,p.Apellido, v.F_venta, e.Id_prod,e.Cant_ped,k.Nombre,k.Tipo, k.Talla,e.MontoTotal
                                    FROM Venta v INNER JOIN Venta_incluye_producto e 
                                    INNER JOIN Cliente c  INNER JOIN Persona p 
                                    INNER JOIN Producto k";
                                    $modal ="SELECT m.nombre,m.cantidad ,m.volumen, m.codigo_lote, m.fecha_recibido,
                                    c.rif, c.nombre_empresa, c.direccion, c.correo, c.dominio,c.codigo,c.telefono,
                                    s.cantidad,s.volumen, s.codigo_lote,s.estatus,s.codigo_solicitud, s.fecha_entregado,s.fecha_solicitud
                                    
                                    FROM solicitud s INNER JOIN material m ON 
                                    
                                    s.codigo_lote=m.codigo_lote 
         
                                    INNER JOIN clientes c ON s.rif_cliente=c.rif  where s.codigo_solicitud = $id ";
                                                                                     
                                                                                  
                                                                                  
                                                                                  ?>
