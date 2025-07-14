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
    <link rel="stylesheet" href="../css/styleVenta.css">

</head>

<body>


    <!-- <header class="banner">

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

                                                <div class="opcion pro" id="mPro">
                                    <img src="../img/truck.svg" alt="" title="Proveedores" class="pro" >
                                        <h4 class="pro" >Proveedores</h4>
                                    </div>

                                    <div class="opcion mat" id="mMat" >
                                    <img src="../img/materia.svg" alt="" title="Materia Prima" class="mat" >
                                        <h4 class="mat" >Materia</h4>

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

                                    <!-- <div class="opcion  ven"  id="mVentas">

                                    <img src="../img/crecer.svg" alt="" title="Ventas" class="ven">
                                        <h4 class="ven">Ventas</h4>
                                    </div> -->



                        </div>

                    </div>

                    <section  class="sub-menu">

                                            
                                            <div class="registro">Efectuar venta</div>
                                            <div class="ver">Ver Ventas</div>
                                            <div class="volver">Cerrar sesion</div>
                                           


                                    </section>


                     <div class="Productos" id="mostrar">
                                <div class="registro_producto">
                                        <div class="encabezado">
                                                    <h4>Vender Productos</h4> 
                                                            <hr>
                                        </div>
                                        <div class="seccion_venta">
                                                
                                                    <div class ="columnn" id ="columnn">

                                                                    <!-- <input type="text" name="carnet" id="carnet"  placeholder="Numero de Carnet">  -->
                                                                    <!-- <label for="usuario">Nombre de usuario</label> -->
                                                                    <div>
                                                                        
                                                                    <input type="text" name="cedula" id="cedula" class="ced" autofocus  placeholder="Cedula Cliente">

                                                                    <input type="text" name="bcv" id="bcv" class="bcv"    placeholder="Valor $ BCV" onkeypress="return SoloNumeros(event)">
                                                                    <button id="aceptar" class="btn-avz">Aceptar</button>
                                                                </div>
                                                                   
                                                                    <div class="desple">
                                                                    <ul class="completar"></ul></div>
                                                                    <!-- <label for="contrasena">contraseña</label> -->
                                                                    
                                                        
                                                                    <!-- <input type="submit" name="enviar" id="registrar" class="btn-avz" value="Registrar"> -->
                                                            </div>

                                                            <div class="azul" id="azul">
                                                            <form action="" id="buscardor">
                                                            <input type="text" name="lote" id="lote" placeholder="lote de producto" class="minilote"> 
                                                            <input type="hidden" name="cli" id="cli" placeholder="cedula cliente" class="minicli">
                                                            <!-- <input type="text" name="identificador" id="identificador" placeholder="cedula cliente"> -->
                                                            <input type="text" name="cantidad" id="cantidad" placeholder="cantidad" class="minicant"  onkeypress="return SoloNumeros(event)">  
                                                                    <div class="despleg">
                                                                    <ul class="completare"></ul></div>  
                                                                    
                                                                    
                                                                        <select name="unidad" id="unidad" class="miniunidad">
                                                                        <!-- <option value="">opcion</option> -->
                                                                        <option value="1">Unidades</option>
                                                                        <!-- <option value="2">Pares</option> -->
                                                                        <!-- <option value="12">Docenas</option> -->
                                                                    </select>

                                                                        <div class="rad">
                                                                        <select name="metodo" id="metodo" class="miniunidad">
                                                                        <!-- <option value="">opcion</option> -->
                                                                        <option value="1">Dolares</option>
                                                                        <!-- <option value="2">Pares</option> -->
                                                                        <option value="2">Bolivares</option>
                                                                    </select>
                                                                            </div>
                                                                       
                                                                        <input type="hidden" class="precio_f" id="precio_f" placeholder="Total a Pagar" class="miniprecio">
                                                                    <!-- <input type="text" name="cant" id="cant" placeholder="cantidad a solicitar ">  
                                                                    <input type="text" name="unidad" id="unidad" placeholder="unidad">                         -->
                                                                    </form>
                                                                    
                                                                   <a href="#"> <button id="agregar" class="btn-avz">Agregar</button></a>
                                                            </div>
                                                    

                                        </div>

                                        <div class="factura">
                                        <!-- <template id="template"> -->
                                                <div class="avere">
                                                                <!-- <form class="temp" action="" method="POST"> -->
                                                                  
                                                                        
                                                                        </div>
                                                                        <!-- </template> -->
                                            <!-- <div class="cli_f"></div>
                                            <div class="prod_f"></div> -->
                                            <div class="cont_tem">
                                           
                                                                        <!-- <input type="text" class="ced_enviar"> -->
                                                                        <table width="100%"  class="hacerventa" id="">
                                                        <thead>
                                                                <tr>
                                                            
                                                                
                                                                <th>Codigo</th>
                                                                <th>Nombre</th>
                                                                <th>Tipo     </th>
                                                                <th>Talla</th>
                                                                <th>Cantidad solicitada</th>
                                                                <th>Precio a Pagar</th>
                                                                <th>Precio Bolivares</th>
                                                    
                                                            </tr>

                                                        </thead><form id="prueba" action=""> 
                                                        <tbody id="inporven"  class="hacer-ventas">
                                                        
                                                        <tr class="fija"></tr>
                                                        </tbody>
                                                        </form>
                                                    </table>
                                                    <!-- <input type="submit" id="vendd" name="enviar" value="facturar"> -->
                                                                       
                                            <button id="vendd" name="enviar">Ver</button>
                                                   
                                                    <div class="cont_factura">

                                                                
                                            
                                            </div>    
                                                                     
                                                                </div>
                                                                
                                        </div>

                                </div>
                    </div>


                            <div class="mostrarTabla"  id="ver">
                                        <div class="tabla_producto">
                                                    <div class="encabezado"> 
                                                        <h4>Registro de Ventas</h4> 
                                                        <hr>
                                                    </div>

                                                <div class="tabla-over">
                                                    <table width="100%"  class="table" id="">
                                                        <thead>
                                                                <tr>
                                                            
                                                                <th>Cedula</th>
                                                                <th>Nombre Cliente</th>
                                                                <th>Codigo de producto</th>
                                                                <th>Nombre</th>
                                                                <th>Tipo</th>
                                                                <th>Talla</th>
                                                                <th>Fecha de la compra</th>
                                                    
                                                            </tr>

                                                        </thead>
                                                        <tbody id="inpor1"  class="ver-ventas">
                                                    
                                                        </tbody>
                                                    </table>
                                                    
                                                </div>

                                                <div class="columna-reporte"><a class="a" href="../vistas/todosventas.php" target="_blank"><button class="reporte">Reporte</button></a></section> 
                                               </div>

                                    </div>

                                    

                        </div>


                        <div class="mensajes"></div>

</div>

<?php
  include("inferior.html");


?>
</body>
<script src="../js/rutas.js"></script>
<script type="text/javascript" src="../js/efectos.js"></script>
<script type="text/javascript" src="../js/completar.js"></script>
<script type="text/javascript" src="../js/venta.js"></script>
<!-- <script type="text/javascript" src="../js/ayuda.js"></script> -->
<script type="text/javascript" src="../js/tabla.js"></script>
<script type="text/javascript" src="../js/campos.js"></script>



</html>