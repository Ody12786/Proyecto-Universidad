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
                                    <div class="Cusu"  id="mPro">
                                    <img src="../img/carpeta.svg" alt="" titlt="Productos" class="produ" >
                                        <h4 class="produ" >Clientes</h4>
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

                                           
                                            <div class="registro">Registrar Clientes</div>
                                            <div  class="ver">Clientes registrados</div>
                                            <div  class="volver">Cerrar sesion</div>
                                            
                                    </section>


                     <div class="Productos" id="mostrar">
                                <div class="registro_producto">
                                <!-- <div class="registro_persona"> -->
                                            <div class="encabezado"> 
                                                <h4>Registro Persona</h4> 
                                                <hr>
                                            </div>
                                    
                                        <div class="seccion_persona">
                                                <form id="clientesForm" action="" method="post">
                                                <!-- <div class ="columnn"> -->
                                                <!-- <label for="nombre">Nombre:</label> -->
                                                <input type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" 
                                                minlength="3" maxlength="16" autofocus  onkeypress="return SoloLetras(event)" require>
                                                <!-- <label for="apellido">Apellido</label> -->
                                                <input type="text" name="apellido" id="apellido" placeholder="Ingrese Apellido"
                                                minlength="3" maxlength="16"  onkeypress="return SoloLetras(event)">
                                                <!-- <label for="cedula">Cedula</label> -->
                                                <input type="text" name="cedula" id="cedula" minlength="6" maxlength="8"  
                                                placeholder="Cedula"  onkeypress="return SoloNumeros(event)" >
                                                <!-- <label for="carnet">Numero de Carnet:</label> -->
                                                <!-- </div>
                                                <div class ="columnn"> -->
                                            
                                                <select name="sexo" id="genero">
                                                             <option value="">Genero</option>
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                        </select>

                                                        <!-- <input type="text" name="afiliacion" id="afiliacion"  placeholder="Numero de Afiliacion"
                                                onkeypress="return SoloNumeros(event)" minlength="6"maxlength="6" >    -->
                                                <!-- <div class="rad">
                                                <label for="sexo">Genero: </label> 
                                                <input type="radio" value="Masculino"  name="sexo" id="vene" class="radio" checked> M
                                                <input type="radio" value="Femenino" name="sexo"  id="ext" class="radio"> F
                                                </div> -->
                                                <!-- </div>               -->
                                                <div class ="columnn">
                                                <input type="button" name="enviar" id="clientes" class="btn-avz" value="Registrar">
                                                </div>
                                                </form>
                                
                                    </div>


                                </div>
                    </div>


                            <div class="mostrarTabla"  id="ver">
                                        <div class="tabla_producto">
                                                    <div class="encabezado"> 
                                                        <h4>Lista de Clientes</h4> 
                                                        <hr>
                                                    </div>
                                                    <div class="cuadro">
                                                <label for="">Busqueda de Cliente</label>
                                                <input type="search"  class="solicitud" id="solicli">
                                            </div>

                                                <div>
                                                    <table width="100%"  class="table" id="">
                                                        <thead>
                                                                <tr>
                                                                
                                                                <th>Nombre</th>
                                                                <th>Apellido</th>
                                                                <th>Cedula</th>
                                                                <th>Nº Afiliacion</th>
                                                                
                                                                
                                                    
                                                            </tr>

                                                        </thead>
                                                        <tbody id="inpor1"  class="ver-clientes">
                                                    
                                                        </tbody>
                                                    </table>
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
<script type="text/javascript" src="../js/registro.js"></script>
<script type="text/javascript" src="../js/campos.js"> </script>
<script type="text/javascript" src="../js/tabla.js"> </script>
<script type="text/javascript" src="../js/bus.js"> </script>

</html>