<?php
$hash = '$2y$10$WphVjmKVf5slHd8skKKjROEMhH6eSIsjCamm/zqlLi1UUXNPw8pfW';
$password = '1234567'; // la contraseña que ingresas en el login

if (password_verify($password, $hash)) {
    echo "Contraseña válida";
} else {
    echo "Contraseña inválida";
}
?>
