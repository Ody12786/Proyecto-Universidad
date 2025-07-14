<?php
include("../database/connect_db.php");
session_start();

$sesion=$_SESSION['usuario'];


if($sesion === null || $sesion ===''){
    header("location:../login.php");
}

$query="SELECT tipo FROM usuario WHERE nombre = '$sesion'";

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
    <link rel="stylesheet" href="../css/styleProductos.css">

</head>

<body>

<!-- 
    <header class="banner">

    </header> -->
    

    <div  class=contenedor>


                              <div class="opciones" >
                                      <div class="contlogo" >
                                    <img src="../img/logomesa.png" alt="" title="Proveedores" class="pro" >
                                       
                                    </div>

                             

                                    <div class="menu" id="menu">

                                                                                <?php
                                                                
                                                                while($row = mysqli_fetch_row($resultado))   {?>
                                                                
                                            
                                                        <div class="opcion usu"  id="mUsu" display="none">
                                                            <img src="../img/usu.svg" alt="" title="Usuarios" class="usu" >
                                                            <h4 class="usu" >Usuarios</h4>
                                                        </div>

                                                        <input type="hidden" id="delegation" value="<?php echo $row['0'] ;?>">
                                                <?php };?>


                                            <div class="Cusu"  id="mPro">
                                            <img src="../img/carpeta.svg" alt="" titlt="Productos" class="produ" >
                                                <h4 class="produ" >Productos</h4>
                                            </div>

                                            <!-- <div class="opcion mat" id="mMat" >
                                            <img src="../img/carpeta.svg" alt="" title="Materia Prima" class="mat" >
                                                <h4 class="mat" >Materia</h4>

                                            </div> -->

                                            <!-- <div class="opcion produ"  id="mProd">
                                                <img src="../img/carpeta.svg" alt="" title="Productos" class="produ" >
                                                <h4 class="produ" >Productos</h4>
                                            </div> -->

                                            <div class="opcion cli"  id="mCli">

                                            <img src="../img/auriculares.svg" alt="" title="Clientes" class="cli" >
                                                <h4 class="cli">Clientes</h4>
                                            </div>

                                            <div class="opcion  ven"  id="mVentas">

                                            <img src="../img/crecer.svg" alt="" title="Ventas" class="ven">
                                                <h4 class="ven">Ventas</h4>
                                            </div>
                                    </div>

                                 </div>
                                    <section  class="sub-menu">

                                            
                                            <!-- <div class="registro">Solicitar material</li> -->
                                            <div class="registro">Productos</div>
                                            <div  class="ver">Ver Productos</div>
                                            <div  class="volver">Cerrar sesion</div >
                                            


                                    </section>

                        
                     <!-- </div> -->


                                  <?php  
                                //    estos son datos rescatados del link
                                          $id=$_REQUEST['id'];
                                        //  $nombre=$_REQUEST['nombre']; ?>


                                    <?php  

                                                                      
                        $modal ="SELECT Nombre,Tipo ,Cantidad, Medida, Existencia,Descripcion,Talla, Precio_unit,Precio_total,fecha ,Estado
                        FROM Producto where lote_prod = $id"; ?>


                                        <!-- tabla productos Finalizados -->



                        <div class="productoha"  id="verha">
                                        <div class="producto_inventariadoha">
                                                    <div class="encabezado"> 
                                                        <h4>Descripcion de Producto</h4> 
                                                        <hr>
                                                    </div>
                                                    <div class="cuadroha">

                                                    <?php  
                                                    $resultad = mysqli_query($conex,$modal);
                                                    while($row = mysqli_fetch_row($resultad))   {?>

                                         
                                                    <!-- datos del producto -->
                                                    <br>
                                                    
                                                     
                                                     <h4>Datos Producto</h4>  <br>
                                                     <form action="" Method="POST" id="cambio">
                                                     <div id="premernombre">
                                                         <div
                                                     <label class="lettera"> Codigo: <strong><?php echo $id;  ?></label></strong></div>
                                                            <!-- <label class="lettera">Producto: <strong><input type="text" id="nom" name="nompp" value="" onkeypress="return SoloLetras(event)"></strong></label> -->
                                                            <div> <label class="lettera">Producto: <strong><?php echo $row['0'];  ?></strong></label>
                                                    </div></div>
                                                        <div id="segundonombre">
                                                        <div>
                                                           <label class="lettera">Tipo: <strong><?php echo $row['1'];  ?> </label></strong>
                                                            <!-- <label class="lettera">Tipo: <strong><select name="tipo" id="tipo">
                                                                    <option value="</option>
                                                                        <option value="Polyester">Polyester</option>
                                                                        <option value="Algodon">Algodon</option>
                                                                        <option value="Licra">Licra</option>
                                                                        <option value="Polilicra">Polilicra</option>
                                                                        <option value="Drill">Drill</option>
                                                                    </select> </label></strong> -->

                                                        </div>
                                                            <?php if($row['3'] == 1){
                                                                $il="Unidades";
                                                            

                                                            } else{
                                                                $il="Docenas";
                                                            }
                                                            
                                                            if($row['10']== 1){
                                                                $ilo="Habilitado";
                                                            }else{
                                                                $ilo="Anulado";
                                                            }
                                                            
                                                            ?>
                             <!-- <label class="lettera">Descripcion: <strong><input type="text" id="desc" name="desc" value="" onkeypress="return SoloLetras(event)"></label></strong> -->
                                                            <label class="lettera">Descripcion: <strong><?php echo $row['5'];  ?></label></strong>
                                                            </div></div>
                                                            

                                                           <div id="ver">
                                                            
                                                        
                                                            <label class="lettera">Talla: <strong> <select name="talla" id="talla" >
                                                                    
                                                            <option value="<?php echo $row['6'];  ?>"><?php echo $row['6'];  ?></option>
                                                                        <option value="14">14</option>
                                                                        <option value="16">16</option>
                                                                        <option value="18">18</option>
                                                                        <option value="S">S</option>
                                    
                                                                        <option value="M">M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                        <option value="XL">XXL</option>
                                                                    </select></label></strong>
                                                            <label class="lettera">Cantidad: <strong><input type="text" id="camcan" name="canti" value="<?php echo $row['2'];  ?>" onkeypress="return SoloNumeros(event)">
                                                            <select name="medida" id="medida">
                                                                    <option value="<?php echo $row['3'] ?>"><?php echo $il ?></option>
                                                                        <option value="1">Unidades</option>
                                                                        <!-- <option value="2">Pares</option> -->
                                                                        <option value="12">Docenas</option>
                                                                    </select></label></strong><br>                                                 
                                                            
                                            
                                                            <label class="lettera">Precio: <strong><input type="text" id="campre" name="precio" value="<?php echo $row['8'];  ?>" onkeypress="return SoloNumeros(event)">$</label></strong>
                                                            <label class="lettera">Fecha ingresado: <strong><input type="date" id="fecc" name="fecc" value="<?php echo $row['9'];  ?>" ></label></strong> <br>
                                                            <label class="lettera">Unidades: <strong><input type="text" id="camcane" name="cantie" value="<?php echo $row['4'];  ?>"  onkeypress="return SoloNumeros(event)"></label></strong>
                                                            <label class="lettera">Precio C/U: <strong><?php echo $row['7'];  ?></label></strong><br>
                                                           
                                                        <label class="letter" for="estatusImp">Estatus: 
                                                            
                                                                <input type="hidden" name="id" value="<?php echo $id;?>">
                                                                                    <select name="estatus" class="imp" id="estatusImp"></label>
                                                                                                <option value="<?php echo $row['10'];?>"><?php echo $ilo;?></option>
                                                                                                 <option value="1">Habilitar </option>
                                                                                                <option class="primere" value="0"> Anular</option>
                                                                                                

                                                                                    </select> 
                                                                                    </form>
                                                            </div>


                                                            <div id="estandar">



                                                            
                                                           
                                                         
                                                         <label class="lettera"> Codigo: <strong><?php echo $id;  ?></label></strong><br>
                                                                <!-- <label class="lettera">Producto: <strong><input type="text" id="nom" name="nompp" value="" onkeypress="return SoloLetras(event)"></strong></label> -->
                                                                <label class="lettera">Producto: <strong><?php echo $row['0'];  ?></strong></label><br>
                                                    
                                                               <label class="lettera">Tipo: <strong><?php echo $row['1'];  ?> </label></strong><br>
                                                                                                                         <!-- <label class="lettera">Descripcion: <strong><input type="text" id="desc" name="desc" value="" onkeypress="return SoloLetras(event)"></label></strong> -->
                                                                <label class="lettera">Descripcion: <strong><?php echo $row['5'];  ?></label></strong><br>
                                                              
                                                            <label class="lettera">Talla: <strong> <?php echo $row['6'];  ?></label></strong><br>
                                                            <label class="lettera">Cantidad: <strong><?php echo $row['2']."-". $il;  ?></label></strong><br>                                                 
                                                            
                                                        
                                                            <label class="lettera">Precio: <strong><?php echo $row['8']."$";  ?></label></strong><br>
                                                            <label class="lettera">Fecha ingresado: <strong><?php echo $row['9'];  ?></label></strong> <br>
                                                            <label class="lettera">Unidades: <strong><?php echo $row['4'];  ?></label></strong><br>
                                                            <label class="lettera">Precio C/U: <strong><?php echo $row['7'];  ?></label></strong><br>
                                                            

                                                            
                                                        <label class="letter" for="estatusImp">Estatus: <?php echo $ilo;?>
                                                            
                                                                                    
                                                                   </div>                             


                                                         
                                                            <section class="btn-reporte">

                                                            <a class="btn-a" href="productos.php"><button class="estilo-boton">Volver</button> </a>
                                                             <button id="btn-gg">Guardar</button>
                                                             
                                                             
                                                            </section> 
                                                            
                                                      
                                                            <br>
                                                <!-- Datos del Cliente -->

                                                    
                                                                                
                                                                                
                                                                                
                                                                                 
                                                                                <?php } mysqli_free_result($resultad);
                                                                                
                                                                                                        
                                                                                                ?>

                                                                            </div>
                                                                                

                                                               
                                                    
                                                
                                            </div>

                                                <div>
                                                  
                                                    <!-- <a class="a" href="../vistas/todosproductos.php" target="_blank"><button class="reporte">Reporte</button></a></section>  -->
                                                </div>



                                    </div>

                        </div>












                        <div class="mensajes"></div>
    </div>
    <?php
  include("inferior.html");


?>
</body>
<script type="text/javascript" src="../js/campos.js"> </script>
<script src="../js/ayuda.js"></script>
<!-- <script type="text/javascript" src="../js/efectos.js"></script> -->
<!-- <script type="text/javascript"   src="../js/hola.js"></script> -->

<!-- <script type="text/javascript"  src="../js/modal.js"></script> -->
<!-- <script type="text/javascript"  src="../js/bus.js"></script> -->

</html>