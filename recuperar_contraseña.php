<?php
session_start();

$conex = new mysqli("localhost", "root", "", "roka_sport_gil");
if ($conex->connect_error) {
    die("Error de conexión: " . $conex->connect_error);
}
$conex->set_charset("utf8");

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$errors = [];
$success = false;
$nombre = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = trim($_POST['nombre'] ?? '');

    if (!$nombre) {
        $errors[] = "Por favor ingresa un nombre de usuario válido.";
    } else {
        $sql = "SELECT id_rec, nombre, correo FROM usuario WHERE LOWER(nombre) = LOWER(?) LIMIT 1";
        $stmt = $conex->prepare($sql);
        if (!$stmt) {
            die("Error en la preparación de la consulta: " . $conex->error);
        }
        $stmt->bind_param('s', $nombre);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result && $result->num_rows === 1) {
            $user = $result->fetch_assoc();

            $token = bin2hex(random_bytes(32));
            $expires = date('Y-m-d H:i:s', time() + 3600);

            $sqlInsert = "INSERT INTO password_resets (user_id, token, expires_at) VALUES (?, ?, ?)
                          ON DUPLICATE KEY UPDATE token = VALUES(token), expires_at = VALUES(expires_at)";
            $stmtInsert = $conex->prepare($sqlInsert);
            $stmtInsert->bind_param('iss', $user['id_rec'], $token, $expires);
            $stmtInsert->execute();
            $stmtInsert->close();

            $resetLink = "http://localhost/Roka_Sports/cambiar_contrasena.php?token=$token";

            $mail = new PHPMailer(true);
            try {
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'josedmv424@gmail.com';
                $mail->Password   = 'lausckynpytukgos';
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port       = 587;

                $mail->setFrom('josedmv424@gmail.com', 'Sistema Roka Sports');
                $mail->addAddress($user['correo'], $user['nombre']);
                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de contraseña - Roka Sports';
                $mail->Body    = "
                    <div style='font-family: Arial, sans-serif; max-width: 600px; margin: 0 auto;'>
                        <div style='background: #0f0c29; padding: 20px; border-radius: 8px; color: #fff;'>
                            <h2 style='color: #0d6efd;'>Recuperación de contraseña</h2>
                            <p>Hola <strong>{$user['nombre']}</strong>,</p>
                            <p>Haz clic en el siguiente enlace para restablecer tu contraseña:</p>
                            <div style='margin: 20px 0;'>
                                <a href='{$resetLink}' style='background: #0d6efd; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; display: inline-block;'>
                                    Restablecer contraseña
                                </a>
                            </div>
                            <p style='color: #adb5bd;'>Este enlace expirará en 1 hora.</p>
                            <p style='color: #adb5bd; font-size: 12px;'>Si no solicitaste este cambio, ignora este correo.</p>
                        </div>
                    </div>
                ";

                $mail->send();
                $success = true;
            } catch (Exception $e) {
                $errors[] = "No se pudo enviar el correo. Intenta más tarde.";
            }
        } else {
            $errors[] = "No se encontró un usuario con ese nombre.";
        }
        $stmt->close();
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Recuperación de Contraseña | Roka Sports</title>
    <!-- Bootstrap 5 Dark Theme -->
    <link href="https://bootswatch.com/5/darkly/bootstrap.min.css" rel="stylesheet" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <style>
        :root {
            --bg-dark: #0f0c29;
            --bg-gradient: linear-gradient(135deg, #0f0c29 0%, #302b63 50%, #24243e 100%);
            --primary-accent: rgba(13, 110, 253, 0.7);
            --glass-bg: rgba(26, 26, 46, 0.85);
            --glass-border: rgba(255, 255, 255, 0.15);
        }
        
        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }
        
        .recovery-container {
            max-width: 500px;
            width: 100%;
            padding: 2.5rem;
            background: var(--glass-bg);
            border-radius: 16px;
            border: 1px solid var(--glass-border);
            backdrop-filter: blur(12px);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            animation: fadeIn 0.6s ease-out;
        }
        
        .recovery-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .recovery-header h2 {
            color: #0d6efd;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }
        
        .recovery-header i {
            font-size: 2.5rem;
            color: #0d6efd;
            margin-bottom: 1rem;
        }
        
        .form-control {
            background: rgba(255, 255, 255, 0.08);
            border: 1px solid var(--glass-border);
            color: white;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            background: rgba(255, 255, 255, 0.12);
            border-color: var(--primary-accent);
            box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
            color: white;
        }
        
        .btn-recovery {
            width: 100%;
            padding: 0.75rem;
            border-radius: 8px;
            background: var(--primary-accent);
            border: none;
            font-weight: 500;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-recovery:hover {
            background: rgba(13, 110, 253, 0.9);
            transform: translateY(-2px);
            box-shadow: 0 4px 20px rgba(13, 110, 253, 0.4);
        }
        
        .btn-recovery::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: 0.5s;
        }
        
        .btn-recovery:hover::after {
            left: 100%;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        /* Responsive */
        @media (max-width: 576px) {
            .recovery-container {
                padding: 1.5rem;
                margin: 1rem;
            }
        }
    </style>
</head>
<body>
    <div class="recovery-container">
        <div class="recovery-header">
            <i class="bi bi-shield-lock"></i>
            <h2>Recuperación de Contraseña</h2>
            <p class="text-muted">Ingresa tu nombre de usuario para recibir instrucciones</p>
        </div>

        <?php if ($success): ?>
            <div class="alert alert-success">
                <div class="d-flex align-items-center">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <span>Hemos enviado un correo con instrucciones para restablecer tu contraseña.</span>
                </div>
                <p class="mt-2 mb-0 text-muted small">Si no lo ves en tu bandeja principal, revisa la carpeta de spam.</p>
            </div>
            
            <div class="text-center mt-4">
                <a href="login.php" class="btn btn-outline-primary">
                    <i class="bi bi-arrow-left"></i> Volver al login
                </a>
            </div>
        <?php else: ?>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <div class="d-flex align-items-center mb-2">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i>
                        <strong>Error</strong>
                    </div>
                    <ul class="mb-0 ps-3">
                    <?php foreach ($errors as $error): ?>
                        <li><?=htmlspecialchars($error)?></li>
                    <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form method="POST" action="">
                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre de usuario</label>
                    <div class="input-group">
                        <span class="input-group-text bg-dark border-primary">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" name="nombre" id="nombre" class="form-control" 
                               value="<?=htmlspecialchars($nombre)?>" required 
                               placeholder="Ingresa tu nombre de usuario" />
                    </div>
                </div>

                <button type="submit" class="btn btn-recovery">
                    <i class="bi bi-send"></i> Enviar enlace de recuperación
                </button>
                
                <div class="text-center mt-3">
                    <a href="login.php" class="text-primary small">
                        <i class="bi bi-arrow-left"></i> Volver al inicio de sesión
                    </a>
                </div>
            </form>
        <?php endif; ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>