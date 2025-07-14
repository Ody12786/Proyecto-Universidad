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
    <link rel="stylesheet" href="../css/styleUsuario.css">

</head>

<body>

<!-- 
    <header class="banner">

    </header> -->
    

<div  class=contenedor>

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

                               

                                    <!-- <div class="opcion usu"  id="mUsu">
                                        <img src="../img/usu.svg" alt="" title="Usuarios" class="usu" >
                                        <h4 class="usu" >Usuario</h4>
                                    </div> -->

<!-- 
                                    <div class="opcion pro" id="mPro">
                                    <img src="../img/carpeta.svg" alt="" title="Proveedores" class="pro" >
                                        <h4 class="pro" >Proveedores</h4>
                                    </div>

                                    <div class="opcion mat" id="mMat" >
                                    <img src="../img/carpeta.svg" alt="" title="Materia Prima" class="mat" >
                                        <h4 class="mat" >Materia</h4>

                                    </div> -->

                                    <div class="opcion produ"  id="mProd">
                                        <img src="../img/carpeta.svg" alt="" title="Productos" class="produ" >
                                        <h4 class="produ" >Productos</h4>
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

                                
                                <div class="registro">Registrar Persona</div>
                                <div class="nuevo">Nuevo usuario</div>
                                <div class="ver">Ver Usuarios</div>
                                <div class="volver">Cerrar sesion</div>

                    </section>


                    









                    <div class="mostrar"  id="mostrar">
                                    <div class="registro_persona">
                                            <div class="encabezado"> 
                                                <h4>Registro Persona</h4> 
                                                <hr>
                                            </div>
                                    
                                        <div class="seccion_persona">
                                                <form id="formulario" action="" method="post">
                                                <!-- <div class ="columnn"> -->
                                                <!-- <label for="nombre">Nombre:</label> -->
                                                <input type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" 
                                                autofocus  onkeypress="return SoloLetras(event)">
                                                <!-- <label for="apellido">Apellido</label> -->
                                                <input type="text" name="apellido" id="apellido" placeholder="Ingrese Apellido"
                                                onkeypress="return SoloLetras(event)">
                                                <!-- <label for="cedula">Cedula</label> -->
                                                <input type="text" name="cedula" id="cedula" minlength="6" maxlength="8"  
                                                placeholder="Cedula"  onkeypress="return SoloNumeros(event)" >
                                                <!-- <label for="carnet">Numero de Carnet:</label> -->
                                                <!-- </div>
                                                <div class ="columnn"> -->
                                                <input type="text" name="carnet" id="carnet"  placeholder="Numero de Carnet"
                                                onkeypress="return SoloNumeros(event)" minlength="6" maxlength="6" >  
                                                <select name="sexo" id="genero">
                                                             <option value="">Genero</option>
                                                            <option value="Masculino">Masculino</option>
                                                            <option value="Femenino">Femenino</option>
                                                        </select>
                                                <!-- <div class="rad">
                                                <label for="sexo">Genero: </label> 
                                                <input type="radio" value="Masculino"  name="sexo" id="vene" class="radio" checked> M
                                                <input type="radio" value="Femenino" name="sexo"  id="ext" class="radio"> F
                                                </div> -->
                                                <div class="fec">
                                                <label for="fecha">Fecha de Nacimiento</label><br>
                                                 
                                                </div> 
                                                <input type="date" name="fecha" id="fecha" min="1940-01-01" max="2006-01-01"> 
                                                <!-- </div>               -->
                                                <div class ="columnn">
                                                <input type="button" name="enviar" id="avanzar" class="btn-avz" value="Registrar">
                                                </div>
                                                </form>
                                
                                    </div>


                                    </div>

                    </div>

                    <!-- termina formulario persona -->


                    <div class="mostrar_usuario">
                        <div class="registro_usuario">
                            <div class="encabezado">
                            <h4>Registro Usuario</h4> 
                                                <hr>
                            </div>
                            <div class="seccion_usuario">
                                                <form id="formulario_usuario" action="" method="post">

                                                        <input type="text" name="carnet" id="carnett"  placeholder="Numero de Carnet"
                                                        minlength="6" maxlength="6" onkeypress="return SoloNumeros(event)"> 
                                                        <!-- <label for="usuario">Nombre de usuario</label> -->
                                                        <input type="text" name="usuario" id="usuario" autofocus  
                                                        placeholder="Nombre de usuario" onkeypress="return SinEspacios(event)">
                                                        <!-- <label for="contrasena">contraseña</label> -->
                                                        <select name="tipo" id="tipo">
                                                            <option value="2">Usuario: Estandar</option>
                                                        </select>
                                                        <input type="password" name="contrasena" id="contrasena" 
                                                        placeholder="Ingrese su contrasena" onkeypress="return SinEspacios(event)">
                                                        <!-- <label for="pregunta">1º Pregunta de seguridad</label> -->
                                                        <input type="password" name="confirm" id="confirm" 
                                                        placeholder="confirme contrasena" onkeypress="return SinEspacios(event)">

                                                        <input type="text" name="pregunta" id="pregunta" 
                                                        placeholder="Primera pregunta" minlength="4" maxlength="26">
                                                        <!-- <label for="respuesta">1º Respuesta</label> -->
                                                        <input type="text" name="respuesta" id="respuesta" 
                                                        placeholder="Primera respuesta"  minlength="4" maxlength="26">
                                                        <!-- <label for="preguntaDos">2º Pregunta de seguridad</label> -->
                                                        <input type="text" name="preguntaDos" id="preguntaDos" 
                                                        placeholder="Segunda pregunta"  minlength="4" maxlength="26">
                                                        <!-- <label for="respuestaDos">2º Respuesta</label> -->
                                                        <input type="text" name="respuestaDos" id="respuestaDos" 
                                                        placeholder="Segunda respuesta"  minlength="4" maxlength="26">                           
                                                        <div class ="columnn">
                                                        <input type="button" name="enviar" id="registra" class="btn-avz" value="Registrar">
                                                        </div>
                                                        </form>

                                                    </div>

                        </div>
                    </div>

                    <!-- termina formulario usuario -->












                    <div class="mostrarTabla"  id="ver">
                        <div class="tabla_usuario"> 
                            <!-- alterable con overflow, y el max heigth/width -->
                                <div class="encabezado"> 
                                    <h4>Usuarios Registrados</h4> 
                                    <hr>
                                </div>
                                <div class="cuadro">
                                                <label for="usu">Buscar usuario</label>
                                                <input type="search" class="solicitud" id="usu">
                                            </div>

                            <div>
                                <table width="100%"  class="table" id="">
                                    <thead>
                                            <tr>
                                            <th>Tipo</th>
                                    <th>Nombre Usuario</th>
                                    <th>Numero carnet</th>
                                
                                
                                </tr>

                                </thead>
                                <tbody id="inpor4"  class="ver-usuarios">
                                
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
<script type="text/javascript" src="../js/campos.js"> </script>
<script src="../js/rutas.js"></script>
<script type="text/javascript" src="../js/tabla.js"></script>
<script type="text/javascript" src="../js/efectoTabla.js"></script>
<script type="text/javascript" src="../js/registro.js"></script>
<script type="text/javascript"  src="../js/busqq.js"></script>
</body>

</html>