<?php
include('../database/connect_db.php');
session_start();

if ($conex->connect_error) {
    echo "<tr><td colspan='4'>Error de conexión a la base de datos.</td></tr>";
    exit;
}

$consulta = '';
if (isset($_POST['consulta'])) {
    $consulta = $conex->real_escape_string($_POST['consulta']);
}

$sql = "SELECT rif, nombres, empresa, contacto FROM Proveedor";

if ($consulta !== '') {
    $sql .= " WHERE rif LIKE '%$consulta%' OR nombres LIKE '%$consulta%' OR empresa LIKE '%$consulta%' OR contacto LIKE '%$consulta%'";
}

$sql .= " ORDER BY empresa ASC";

$resultado = $conex->query($sql);

if (!$resultado) {
    echo "<tr><td colspan='5'>Error en la consulta: " . htmlspecialchars($conex->error) . "</td></tr>";
    exit;
}

if ($resultado->num_rows > 0) {
    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . htmlspecialchars($row['rif']) . "</td>";
        echo "<td>" . htmlspecialchars($row['nombres']) . "</td>";
        echo "<td>" . htmlspecialchars($row['empresa']) . "</td>";
        echo "<td>" . htmlspecialchars($row['contacto']) . "</td>";
        echo "<td>
        <button class='btn btn-primary btn-editar' data-rif='" . htmlspecialchars($row['rif']) . "'>Editar</button>
        <button class='btn btn-danger btn-eliminar' data-rif='" . htmlspecialchars($row['rif']) . "'>Eliminar</button>
      </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='5'>No se encontraron proveedores.</td></tr>";
}
?>