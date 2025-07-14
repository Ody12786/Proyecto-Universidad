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
    <link rel="stylesheet" href="../css/styleMenu.css">

</head>

<body>
<header class="bannerM">

</header>

<div  class=contenedor>



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
           <img src="../img/truck.svg" alt="" title="Proveedor" class="pro" >
                <h4 class="pro" >Proveedores</h4>
            </div>

            <div class="opcion mat" id="mMat" >
            <img src="../img/materia.svg" alt="" title="Materia Prima" class="mat" >
                <h4 class="mat" >Materia</h4>

            </div> 

            <div class="opcion produ"  id="mProd">
                <img src="../img/cart-plus.svg" alt="" title="Productos" class="produ" >
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


<script src="../js/rutas.js"></script>




</div>


<?php
  include("inferior.html");


?>



</body>

</html>