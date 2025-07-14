<?php
session_start();
include("../database/connect_db.php");

$usuario = $_POST['usuario'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

if ($usuario == '' || $contrasena == '') {
    echo 2;
    exit;
}

$sql = "SELECT * FROM usuario WHERE nombre = ? LIMIT 1";
$stmt = $conex->prepare($sql);
$stmt->bind_param('s', $usuario);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $user = $result->fetch_assoc();

    if (password_verify($contrasena, $user['contrasena'])) {
        $_SESSION['usuario'] = $user['nombre'];
        $_SESSION['id_rec'] = $user['id_rec'];
        echo 1; // Éxito
    } else {
        echo 2; // Contraseña incorrecta
    }
}
?>
