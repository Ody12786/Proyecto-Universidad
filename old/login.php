
<?php


include("database/connect_db.php");

  
        $tipo = 1;

        $validar = mysqli_query($conex, "SELECT * FROM usuario WHERE tipo = '$tipo'");


    if(mysqli_num_rows($validar) == 0){

        echo '<script>
        window.location="index.php";
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
    <link rel="stylesheet" href="css/estiloslog.css">

    <title>login</title>
 
</head>
<body>

<header class="banner">
  


</header>


<div class="container">



<!--login  -->
<div  class="login" id="uno">

<form id="formu" action=""  method="POST">
  <div class="cont_img"> <img src="img/rotsen_logo.png" alt=""></div>

 <input   type="text" name="usuario"    placeholder="Ingrese  usuario" class="cuadro  oso" id="nom_usu"
 maxlength="15" minlength="4" title="Este Campo es obligatorio"   required >
      <br>            
<input   type="password" name="contrasena"   placeholder="Ingrese Contraseña"    class="cuadro" id="contrasena"
  maxlength="12" minlength="03" title="Este Campo es obligatorio"  required>  

  <button type="submit" name='iniciar'   class="btn_inicio inicio">Iniciar sesion</button>
  <br>
  <div>
  <a class="recup" href="recuperar_contraseña.php">¿Se le olvidó su contraseña?
  </a>
</div>
  

</form>

</div>

<div class="mensajes"></div>
</div>
<script  src="js/jquery-3.4.1.min.js"> </script> 
<script src="js/login.js"></script>
</body>


</html>