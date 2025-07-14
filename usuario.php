<?php


include("database/connect_db.php"); 


// if($conex){
//     echo "todo bien";
// }
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script  src="js/jquery-3.4.1.min.js"> </script> 
    <title>Sistema New</title>
    <link rel="stylesheet" href="css/estilos.css">
 
</head>
<header class="banner">

</header>

<body>
    <div class="contenedor">

        <div class="sectionn">
        <div>
                <h3>Datos del usuario:</h3>
            </div>
            <form id="formulario" action="" method="post">


            <!-- <label for="usuario">Nombre de usuario</label> -->
            <input type="text" name="usuario" id="usuario" autofocus minlength="4" maxlength="9" 
            onkeypress="return SinEspacios(event)"  required placeholder="Nombre de usuario">
            <!-- <label for="contrasena">contraseña</label> -->
            <input type="password" name="contrasena" id="contrasena" placeholder="Ingrese su contrasena" 
             minlength="7" maxlength="17"  onkeypress="return SinEspacios(event)" >
            <!-- <label for="pregunta">1º Pregunta de seguridad</label> -->
            <input type="password" name="confirm" id="confirm" placeholder="confirme contrasena"
            minlength="7" maxlength="17"  onkeypress="return SinEspacios(event)" >

            <select name="tipo" id="tipo">
                <option value="1">Usuario: Administrador</option>
            </select>
            <input type="text" name="carnet" id="carnet"  placeholder="Numero de Carnet"
            onkeypress="return SoloNumeros(event)" required minlength="6"  maxlength="8" > 

            <input type="text" name="pregunta" id="pregunta" placeholder="Primera pregunta"
            onkeypress="return ConEspacios(event)"  required  minlength="4" maxlength="26">
            <!-- <label for="respuesta">1º Respuesta</label> -->
            <input type="text" name="respuesta" id="respuesta" placeholder="Primera respuesta"
            onkeypress="return ConEspacios(event)"  required minlength="4" maxlength="26">
            <!-- <label for="preguntaDos">2º Pregunta de seguridad</label> -->
            <input type="text" name="preguntaDos" id="preguntaDos" placeholder="Segunda pregunta"
            onkeypress="return ConEspacios(event)"  required minlength="4" maxlength="26">
            <!-- <label for="respuestaDos">2º Respuesta</label> -->
            <input type="text" name="respuestaDos" id="respuestaDos" placeholder="Segunda respuesta"
            onkeypress="return ConEspacios(event)"  required minlength="4" maxlength="26">                           

            <input type="submit" name="enviar" id="avanzar" class="btn-avz" value="Continuar">

            </form>
            <?php
            include("registro/register.php");
            ?>


        </div>



    </div>
    

    <script type="text/javascript" src="js/campos.js"> </script>

</body>

</html>




