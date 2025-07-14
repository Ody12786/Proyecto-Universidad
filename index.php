<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sistema Roka</title>
  <!-- Bootstrap 5 Dark Theme (Bootswatch) -->
  <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
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
            <a class="nav-link" href="#"><i class="bi bi-gear me-1"></i> Configuración</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


    <div class="container mt-4">
  <!-- Paso 1: Datos Personales (oculto al avanzar) -->
  <div id="datosPersonales" data-aos="fade-right">
    <div class="card bg-dark border-primary">
      <div class="card-header bg-primary text-white">
        <h3 class="mb-0"><i class="bi bi-person-vcard"></i> Datos Personales</h3>
      </div>
      <div class="card-body">
        <form id="formulario">

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
            title="Rango permitido desde: 1940-2020" required min="1940-01-01" max="2020-01-01">  
            </div>               

            <input type="submit" name="enviar" id="avanzar" class="btn-avz" value="Continuar">

            </form>
            <?php
            include("registro/persona.php");
            ?>
       

  <!-- Paso 2: Seguridad (hidden inicialmente) -->
  <div id="formSeguridad" class="d-none" data-aos="fade-left">
    <div class="card bg-dark border-danger mt-4">
      <div class="card-header bg-danger text-white">
        <h3 class="mb-0"><i class="bi bi-lock"></i> Configuración de Seguridad</h3>
      </div>
      <div class="card-body">
        <form id="seguridadForm">
          <!-- Contenido de tu template #seguridad -->
          <div class="row g-3">
            <div class="col-md-6">
              <label for="usuario" class="form-label text-light">Usuario</label>
              <div class="input-group">
                <span class="input-group-text bg-dark border-danger text-light"><i class="bi bi-person-badge"></i></span>
                <input type="text" class="form-control bg-dark text-light border-danger" name="usuario" id="usuario" required>
              </div>
            </div>
            <div class="col-md-6">
              <label for="contrasena" class="form-label text-light">Contraseña</label>
              <div class="input-group">
                <span class="input-group-text bg-dark border-danger text-light"><i class="bi bi-key"></i></span>
                <input type="password" class="form-control bg-dark text-light border-danger" name="contrasena" id="contrasena" required>
              </div>
            </div>
            <!-- Preguntas de seguridad (2 columnas) -->
            <div class="col-md-6">
              <label for="pregunta" class="form-label text-light">Pregunta de Seguridad 1</label>
              <input type="text" class="form-control bg-dark text-light border-danger" name="pregunta" id="pregunta" required>
            </div>
            <div class="col-md-6">
              <label for="respuesta" class="form-label text-light">Respuesta 1</label>
              <input type="text" class="form-control bg-dark text-light border-danger" name="respuesta" id="respuesta" required>
            </div>
            <!-- Segunda pregunta -->
            <div class="col-md-6">
              <label for="preguntaDos" class="form-label text-light">Pregunta de Seguridad 2</label>
              <input type="text" class="form-control bg-dark text-light border-danger" name="preguntaDos" id="preguntaDos" required>
            </div>
            <div class="col-md-6">
              <label for="respuestaDos" class="form-label text-light">Respuesta 2</label>
              <input type="text" class="form-control bg-dark text-light border-danger" name="respuestaDos" id="respuestaDos" required>
            </div>
          </div>
          <button type="submit" class="btn btn-danger btn-lg w-100 mt-4">
            <i class="bi bi-save"></i> Guardar Configuración
          </button>
        </form>
      </div>
    </div>
  </div>
</div>
 <button type="button" class="btn btn-primary btn-lg w-100 mt-3" onclick="mostrarSeguridad()">
            <i class="bi bi-shield-lock"></i> Continuar a Seguridad
          </button>
        </form>
      </div>
    </div>
  </div>
    </div>
    <!--CDN jquery-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!--CDN jq para Data_Tables-->
    <script src="https://cdn.datatables.net/2.3.2/js/dataTables.min.js"></script>
    
    <script type="text/javascript" src="assets/js/campos.js"> </script>
    <!-- <script type="text/javascript" src="js/super.js"></script> -->
     <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  // Inicializar AOS
  AOS.init({
    duration: 1000,       // Duración de la animación en ms
    easing: 'ease-in-out', // Efecto de suavizado
    once: false           // Animación solo una vez (true/false)
  });
</script>
    <!-- Bootstrap JS (Bundle con Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/2.0.3/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#tabla').DataTable();
      });
    </script>

<!-- Reemplaza tu línea de Bootstrap CSS por: -->
<link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet">
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