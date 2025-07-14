<?php
include('../database/connect_db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rif = $_POST['rif'] ?? '';

    if ($rif) {
        $stmt = $conex->prepare("DELETE FROM Proveedor WHERE rif = ?");
        $stmt->bind_param("s", $rif);

        if ($stmt->execute()) {
            echo "Proveedor eliminado correctamente.";
        } else {
            echo "Error al eliminar: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "RIF inválido.";
    }
}
$conex->close();
?>
