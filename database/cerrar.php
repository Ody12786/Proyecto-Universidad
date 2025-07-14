<?php

session_start();

$sesion=$_SESSION['usuario'];

if($sesion === null || $sesion ===''){
    header("location:../login.php");
    die();
}

    session_destroy();
    header("location: ../login.php")
?>