<?php
include("../database/connect_db.php");
session_start();


if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario'])) {
    header("Location: ../login.php");
    exit();
}

if (!isset($_GET['rif'])) {
    echo "No se especificó el proveedor.";
    exit();
}

$rif = $_GET['rif'];

$stmt = $conex->prepare("SELECT rif, nombres, empresa, contacto FROM proveedor WHERE rif = ?");
$stmt->bind_param("s", $rif);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    echo "Proveedor no encontrado.";
    exit();
}

$proveedor = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <title>Editar Proveedor</title>
    <link rel="stylesheet" href="../Bootstrap5/css/bootstrap.min.css" />
</head>
<body>

<!-- Modal siempre visible para edición -->
<div class="modal show d-block" tabindex="-1" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="formEditarProveedor" action="guardar_proveedor.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Editar Proveedor</h5>
          <a href="modulo_proveedor.php" class="btn-close" aria-label="Cerrar"></a>
        </div>
        <div class="modal-body">
          <input type="hidden" name="rif_original" value="<?php echo htmlspecialchars($proveedor['rif']); ?>" />
          <div class="mb-3">
            <label for="rif" class="form-label">RIF</label>
            <input type="text" class="form-control" id="rif" name="rif" value="<?php echo htmlspecialchars($proveedor['rif']); ?>" required minlength="8" maxlength="12" readonly />
          </div>
          <div class="mb-3">
            <label for="nombres" class="form-label">Nombres</label>
            <input type="text" class="form-control" id="nombres" name="nombres" value="<?php echo htmlspecialchars($proveedor['nombres']); ?>" required minlength="3" maxlength="50" />
          </div>
          <div class="mb-3">
            <label for="empresa" class="form-label">Empresa</label>
            <input type="text" class="form-control" id="empresa" name="empresa" value="<?php echo htmlspecialchars($proveedor['empresa']); ?>" required minlength="3" maxlength="50" />
          </div>
          <div class="mb-3">
            <label for="contacto" class="form-label">Contacto</label>
            <input type="text" class="form-control" id="contacto" name="contacto" value="<?php echo htmlspecialchars($proveedor['contacto']); ?>" required minlength="3" maxlength="50" />
          </div>
          <div id="mensajeEditar" class="text-danger"></div>
        </div>
        <div class="modal-footer">
          <a href="modulo_proveedor.php" class="btn btn-secondary">Cancelar</a>
          <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="../Bootstrap5/js/bootstrap.bundle.min.js"></script>
</body>
</html>
