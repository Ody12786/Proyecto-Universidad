
<?php


include("database/connect_db.php"); 


// if($conex){
//     echo "todo bien";
// }

$tipo = 1;

$validar = mysqli_query($conex, "SELECT * FROM usuario WHERE tipo = '$tipo'");


if(mysqli_num_rows($validar) > 0){

echo '<script>
window.location="login.php";
</script>';

exit();
}else{

}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script  src="js/jquery-3.4.1.min.js"> </script> 
    <title>Sistema Rokka</title>
    <link rel="stylesheet" href="css/estilos.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     <!--CDN de Data_Tables-->
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.2/css/dataTables.dataTables.min.css">
    <!--CDN de icons-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <header class="banner">

    </header>


    <div class="contenedor">

        <div class="section">
            <div>
                <h3>Datos Personales:</h3>
            </div>
            <div class="form">
            <form id="formulario" action="" method="post">

            <!-- <label for="nombre">Nombre:</label> -->
            <input type="text" name="nombre" id="nombre" placeholder="Ingrese Nombre" 
            onkeypress="return SoloLetras(event)"  required autofocus>
            <!-- <label for="apellido">Apellido</label> -->
            <input type="text" name="apellido" id="apellido" placeholder="Ingrese Apellido"
            onkeypress="return SoloLetras(event)"  required>
            <!-- <label for="cedula">Cedula</label> -->
            <input type="text" name="cedula" id="cedula" minlength="7" maxlength="9"  placeholder="Cedula"
            onkeypress="return SoloNumeros(event)" required>
            <!-- <label for="carnet">Numero de Carnet:</label> -->
            <input type="text" name="carnet" id="carnet"  placeholder="Numero de Carnet"
            onkeypress="return SoloNumeros(event)" required minlength="6"  maxlength="8" >  

            <div class="rad">
            <label for="sexo">Genero: </label> 
            <input type="radio" value="Masculino"  name="sexo" id="vene" class="radio" checked> M
            <input type="radio" value="Femenino" name="sexo"  id="ext" class="radio"> F
            </div>
            <div class="fec">
            <label for="fecha">Fecha de Nacimiento</label><br>
            <input type="date" name="fecha" id="fecha" 
            title="Rango permitido desde: 1940-2006" required min="1940-01-01" max="2006-01-01">  
            </div>               

            <input type="submit" name="enviar" id="avanzar" class="btn-avz" value="Continuar">

            </form>
            <?php
            include("registro/persona.php");
            ?>
        
            </div>

        </div>



    </div>
    <!--CDN jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--CDN jq para Data_Tables-->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    
    <script type="text/javascript" src="js/campos.js"> </script>
    <!-- <script type="text/javascript" src="js/super.js"></script> -->
    <!--Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>











<template id="continuacion">


                            </template>

                            <template id="seguridad">
            <label for="carnet">Numero de carnet:</label>
            <input type="text" name="carnet" id="Carnet" autofocus>
            <label for="usuario">Nombre de usuario</label>
            <input type="text" name="usuario" id="usuario" autofocus>
            <label for="contrasena">contraseña</label>
            <input type="password" name="contrasena" id="contrasena">
            <label for="pregunta">1º Pregunta de seguridad</label>
            <input type="text" name="pregunta" id="pregunta" >
            <label for="respuesta">1º Respuesta</label>
            <input type="text" name="respuesta" id="respuesta" >
            <label for="preguntaDos">2º Pregunta de seguridad</label>
            <input type="text" name="preguntaDos" id="preguntaDos">
            <label for="respuestaDos">2º Respuesta</label>
            <input type="text" name="respuestaDos" id="respuestaDos" >
                            </template>