<?php



// traer datos de la BASE DE DATOS::::::::
include('../database/connect_db.php');
session_start();

$sesion=$_SESSION['usuario'];


if($sesion === null || $sesion ===''){
    header("location:../login.php");
}

$query="SELECT tipo FROM usuario WHERE nombre = '$sesion'";

$resultado= $conex->query($query);


$id=$_REQUEST['id'];


$query="SELECT c.Cic,p.Nombre_p,p.Apellido, v.F_venta,v.IVA, e.Id_prod,e.Cant_ped,
k.Nombre,k.Tipo, k.Talla,v.Id_ven,k.Descripcion,v.T_pagar,c.N_afiliacion,e.Cant_ped,k.Medida
FROM Venta v INNER JOIN Venta_incluye_producto e ON v.Id_ven = e.Id_ven
 INNER JOIN Cliente c ON v.Cic=c.Cic INNER JOIN Persona p ON c.Cic=p.Ci
 INNER JOIN Producto k ON k.lote_prod=e.Id_prod where v.Fac= $id";


$resultad = mysqli_query($conex,$query);?>


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
    <!-- <link rel="stylesheet" href="../css/styleProductos.css"> -->

</head>

<body>
                                                                            

<div  class=contenedor>

                            <div class="opciones" >
                                                    <div class="contlogo" >
                                                            <!-- <img src="../img/carpeta.svg" alt="" title="Proveedores" class="pro" > -->
                                                                <!-- <h4 class="pro" >Proveedores</h4> -->
                                                </div>

           

                                            <div class="menu" id="menu">

                                                         <?php
                                                                
                                                                while($row = mysqli_fetch_row($resultado))   {?>
                                                                
                                            
                                                        <div class="opcion usu"  id="mUsu">
                                                            <img src="../img/usu.svg" alt="" title="Usuarios" class="usu" >
                                                            <h4 class="usu" >Usuarios</h4>
                                                        </div>

                                                        <input type="hidden" id="delegation" value="<?php echo $row['0'] ;?>">
                                                         <?php };?>



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

                                            
                                                                            <div class="registro"></div>
                                                                            <div class="ver"></div>
                                                                            <div class="volver">Cerrar sesion</div>
                                                                        


                                                                    </section>


                                         <div class="exito-factura" id="">
                                                     <div class="exito_factura" >
                                                            <div class="encabezado">
                                                                    <h4>Factura de Productos</h4> 
                                                                    <hr>
                                                                </div>
                                                                

                                                                  <form id="exito" action="">
                                                                        <table id="tabla" width="500px">
                                                                            <tr class="cabe">
                                                                                <td>Nombre</td>
                                                                                
                                                                                <td>Lote</td>
                                                                                <td>Talla</td>
                                                                                <td>Tipo</td>
                                                                                <td>Descripcion</td>
                                                                                <td>Precio</td>
                                                                                <td>Cantidad</td>
                                                                            </tr>

                                                                        <?php  // echo $resultad;
                                                                        $val=rand(10000,900900);
                                                                        $vali=rand(100,9900);
                                                                        $identificador= $vali+$val;

                                                                            while($mostrar=mysqli_fetch_array($resultad)){ ?>

                                                                            <tr>
                                                                            <td> <?php echo $mostrar['Nombre']; ?> <input type="hidden" name="id[]" value="<?php echo $mostrar['Id_prod']; ?>"></td>
                                                                            <td> <?php echo $mostrar['Id_prod'];?> <input type="hidden" name="cedula" value="<?php echo $mostrar['Cic']; ?>"> <input type="hidden" id="fac" name="factura" value="<?php echo $identificador; ?>"></td>
                                                                            <td> <?php echo $mostrar['Talla'];?> </td>
                                                                            <td> <?php echo $mostrar['Tipo'];?> <input type="hidden" name="medida[]" value="<?php echo $mostrar['Medida']; ?>"</td>
                                                                            <td> <?php echo $mostrar['Descripcion'];?>  <input type="hidden" name="pagar[]" value="<?php echo $mostrar['T_pagar']; ?>"</td>
                                                                            <td> <?php echo $mostrar['T_pagar'];?> <input type="hidden" name="iva[]" value="<?php echo $mostrar['IVA']; ?>"/td>
                                                                            <td> <?php echo $mostrar['Cant_ped'];?>  <input type="hidden" name="cantidad[]" value="<?php echo $mostrar['Cant_ped']; ?>"</td>
                                                                            <td> <button class="btn-exito"> eliminar</button></td>

                                                                        </tr>
                                                                        


                                                                            
                                                                            

                                                                            <?php };
                                                                        ?>
                                                                        </table> </form> 

                                                                        <div><button id="salir">Cancelar</button> <button id="gg-facturar">facturar</button></div>
                                                        </div>
                                                    

                                             </div>



 <div class="mensajes"></div>
                                                                      
</div>
<!-- <script type="text/javascript" src="../js/efectos.js"></script> -->
<script type="text/javascript" src="../js/ayudar.js"></script>
<script src="../js/rutas.js"></script>
    
</body>