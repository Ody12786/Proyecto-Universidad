
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
  <title>Sistema Roka</title>
  <!-- Bootstrap 5 Dark Theme (Bootswatch) -->
  <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="">   
  <!-- DataTables CSS -->
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.3/css/dataTables.dataTables.min.css">
  <!-- Tu CSS personalizado -->
  <link rel="stylesheet" href="assets/css/estilos.css">
   <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
    <body>
  <!-- Navbar Futurista -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark border-bottom border-primary">
    <div class="container-fluid">
      <!-- Logo + Nombre del Sistema -->
      <a class="navbar-brand d-flex align-items-center" href="#">
        <img src="img/IMG_4124.PNG" alt="Logo" width="80" height="80" class="me-6 rounded-circle bg-primary p-1"> 
        <span class="fs-4 fw-bold text-uppercase">Roka Sports</span>
      </a>
      <!-- Botón para móviles -->
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
      </button>
      <!-- Menú -->
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item">
            <a class="nav-link active" href="#"><i class="bi bi-house-door me-1"></i> Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="bi bi-gear me-1"></i> Contáctanos</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


    <div class="container mt-4">
          <title>login</title>
 
</head>  

<!--login  -->
<div  class="login" id="uno">

<form id="formu" action=""  method="POST">
  <div class="cont_img"> <img src="img/IMG_4124login.png" alt="50"></div>

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
  <!-- Botón para móviles -->
<button class="navbar-toggler d-md-none position-fixed top-1 start-1" 
        type="button" 
        data-bs-toggle="collapse" 
        data-bs-target="#sidebarCollapse"
        style="z-index: 1050;">
    <span class="navbar-toggler-icon"></span>
</button>

<!-- Sidebar modificado -->
<div class="col-md-3 col-lg-2 d-md-block bg-dark sidebar collapse border-end border-primary" id="sidebarCollapse">
    <!-- Contenido del sidebar -->
</div>

</form>

</div>

<div class="mensajes"></div>
</div>
<script  src="assets/js/jquery-3.4.1.min.js"> </script> 
<script src="assets/js/login.js"></script>
</body>


</html>