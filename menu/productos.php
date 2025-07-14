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
    

    <div  class="contenedor">

<div class="opciones" >
    
<!-- <img class="logo"src="../img/logo.SVG" alt="logo"> -->
        <div class="contlogo" >
                    <!-- <img src="../img/carpeta.svg" alt="" title="Proveedores" class="pro" >
                        <h4 class="pro" >Proveedores</h4> -->
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


                                            <div class="Cusu"  id="mPro">
                                            <img src="../img/carpeta.svg" alt="" titlt="Productos" class="produ" >
                                                <h4 class="produ" >Productos</h4>
                                            </div>

                                            <div class="opcion pro" id="mPro">
                                    <img src="../img/truck.svg" alt="" title="Proveedores" class="pro" >
                                        <h4 class="pro" >Proveedores</h4>
                                    </div>

                                    <div class="opcion mat" id="mMat" >
                                    <img src="../img/materia.svg" alt="" title="Materia Prima" class="mat" >
                                        <h4 class="mat" >Materia</h4>

                                    </div> 


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

                        <div class="Productos" id="mostrar">
                                   <div class="registro_producto">
                                        <div class="encabezado">
                                                    <h4>Registro Producto</h4> 
                                                            <hr>
                                        </div>
                                       
<!--                                                                            solicitando matrial para crear productos     -->
                                                    <form id="producto_fabricado" action="" method="post">

                                                                <div class="orden">
                                                                    <input type="text" name="lote" id="lote"  placeholder="Codigo de producto" maxlength="6"  onkeypress="return SoloNumeros(event)" required> 
                                                                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" maxlength="20" onkeypress="return SoloLetras(event)"  required>
                                                                    <!-- <input type="text" name="tipo" id="tipo" placeholder="tipo de producto" required> -->
                                                                    <select name="tipo" id="tipo">
                                                                    <option value="">Tipo de tela</option>
                                                                        <option value="Polyester">Polyester</option>
                                                                        <option value="Algodon">Algodon</option>
                                                                        <option value="Licra">Licra</option>
                                                                        <option value="Polilicra">Polilicra</option>
                                                                        <option value="Drill">Drill</option>
                                                                        <option value="Atletica">Atlética</option>
                                                                        <option value="Muselina">Muselina</option>
                                                                        <option value="Superpoly">Superpoly</option>
                                                                        <option value="Tafeta">Tafeta Memory</option>
                                                                        <option value="Mono">Mono</option>
                                                                        <option value="SPT">SPT</option>
                                                                        <option value="Driffit">Driffit</option>
                                                                        <option value="Grandes">Grandes Ligas</option>
                                                                    </select>
                                                                    <!-- <input type="text" name="talla" id="talla" placeholder="Talla" required> -->
                                                                    <select name="talla" id="talla">
                                                                    <option value="">Talla</option>
                                                                        <option value="14">14</option>
                                                                        <option value="16">16</option>
                                                                        <option value="18">18</option>
                                                                        <option value="S">S</option>
                                                                       

                                                                    
                                                                        <option value="M">M</option>
                                                                        <option value="L">L</option>
                                                                        <option value="XL">XL</option>
                                                                        <option value="XL">XXL</option>
                                                                    </select>
                                                                    </div>

                                                                    <div class="orden">
                                                                    <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion" maxlength="20" required>
                                                                    <input type="text" name="cantidad" id="valor"  placeholder="Cantidad" maxlength="6" onkeypress="return SoloNumeros(event)" required> 

                                                                    <select name="medida" id="medida">
                                                                    <option value="">Seleccion</option>
                                                                        <option value="1">Unidades</option>
                                                                        <!-- <option value="2">Pares</option> -->
                                                                        <option value="12">Docenas</option>
                                                                    </select>
                                                                     
                                                                    <input type="text" name="precio" id="precio"  placeholder="Precio" maxlength="6" onkeypress="return SoloNumerosComa(event)" required> 
                                                                    <!-- <input type="date" name="fechar" id="fecha"  placeholder="">  -->
                                                                    
                                                                    </div>                         
                                                            <div class ="columnni">
                                                                <!-- <button  id="gistrar" class="btn-avz" >Registrar</button> -->
                                                                <input type="button" name="enviar" id="gistrar" class="btn-avz" value="Registrar">
                                                                    <!-- <input type="submit" name="enviar" id="registrar" class="btn-avz" value="Registrar"> -->
                                                            </div>
                                                    </form>

                                        </div>

                                </div>
                     <!-- </div> -->


                            


                                        <!-- tabla productos Finalizados -->



                        <div class="mostrarTabla"  id="ver">
                                        <div class="producto_inventariado">
                                                    <div class="encabezado"> 
                                                        <h4>Productos Finalizados</h4> 
                                                        <hr>
                                                    </div>
                                                    <div class="cuadro">
                                                <label for="prod_inv">Busqueda de Producto</label>
                                                <input type="search"  class="prod_inv" id="prod_inv" placeholder="Buscar Producto">
                                            </div>

                                                <div>
                                                    <table width="100%"  class="ver-prod" id="">
                                                        <thead>
                                                                <tr>
                                                                <th>Codigo</th>
                                                                <th>Nombre</th>
                                                                <th>Tipo</th>
                                                                <th>Talla</th>
                                                            
                                                                <th>Unidades</th>
                                                              
                                                                <th>Precio Total</th>
                                                                <th>Estado</th>

                                                                
                                                    
                                                            </tr>

                                                        </thead>
                                                        <tbody id="inpor1"  class="ver-productos">
                                                    
                                                        </tbody>
                                                    </table>
                                                    <a class="a" href="../vistas/todosproductos.php" target="_blank"><button class="reporte">Reporte</button></a></section> 
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
<script src="../js/rutas.js"></script>
<script type="text/javascript" src="../js/efectosprod.js"></script>
<script type="text/javascript"   src="../js/hola.js"></script>

<!--<script type="text/javascript"  src="../js/modales.js"></script>-->
<script type="text/javascript"  src="../js/bus.js"></script>

</html>