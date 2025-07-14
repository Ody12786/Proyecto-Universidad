<?php
$conex = new mysqli("localhost", "root", "", "roka_sport_gil");

if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}
$conex->set_charset("utf8");
?>
