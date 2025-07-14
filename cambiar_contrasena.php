<?php
session_start();
include 'database/connect_db.php';

$token = $_GET['token'] ?? '';
$errors = [];
$success = false;

if (!$token) {
    die("Token inválido.");
}

// Validar el token en la base de datos y obtener el user_id
$sql = "SELECT pr.user_id, u.nombre FROM password_resets pr 
        JOIN usuario u ON pr.user_id = u.id_rec 
        WHERE pr.token = ? AND pr.expires_at > NOW() LIMIT 1";
$stmt = $conex->prepare($sql);
$stmt->bind_param('s', $token);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows !== 1) {
    die("Token inválido o caducado.");
}

$user = $result->fetch_assoc();
$user_id = $user['user_id'];
$user_nombre = $user['nombre'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $password = $_POST['contrasena'] ?? '';
    $confirm = $_POST['confirmar_contrasena'] ?? '';

    if (empty($password) || strlen($password) < 6) {
        $errors[] = "La contraseña debe tener al menos 6 caracteres.";
    }
    if ($password !== $confirm) {
        $errors[] = "Las contraseñas no coinciden.";
    }

    if (empty($errors)) {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $sqlUpdate = "UPDATE usuario SET contrasena = ? WHERE id_rec = ?";
        $stmtUpdate = $conex->prepare($sqlUpdate);
        $stmtUpdate->bind_param('si', $hash, $user_id);
        $stmtUpdate->execute();

        $sqlDelete = "DELETE FROM password_resets WHERE user_id = ?";
        $stmtDelete = $conex->prepare($sqlDelete);
        $stmtDelete->bind_param('i', $user_id);
        $stmtDelete->execute();

        $success = true;
    }
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8" />
<title>Cambiar Contraseña</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>
<body>
<div class="container mt-5">
    <h2>Cambiar Contraseña</h2>

    <?php if ($success): ?>
        <div class="alert alert-success">
            Contraseña actualizada correctamente. <a href="login.php">Iniciar sesión</a>
        </div>
    <?php else: ?>
        <p>Hola, <strong><?=htmlspecialchars($user_nombre)?></strong>. Por favor ingresa tu nueva contraseña.</p>

        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?=htmlspecialchars($error)?></li>
                <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-3">
                <label for="contrasena" class="form-label">Nueva contraseña</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required minlength="6" />
            </div>
            <div class="mb-3">
                <label for="confirmar_contrasena" class="form-label">Confirmar contraseña</label>
                <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control" required minlength="6" />
            </div>
            <button type="submit" class="btn btn-primary">Actualizar contraseña</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>
