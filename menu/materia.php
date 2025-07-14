<?php
session_start();
include("../database/connect_db.php");

// Verificar sesión
if (!isset($_SESSION['usuario'])) {
    header("Location:../login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Módulo de Materia Prima</title>
    <link rel="stylesheet" href="../css/menu.css" />
    <link rel="stylesheet" href="../DataTables/datatables.min.css" />
    <link rel="stylesheet" href="../Bootstrap5/css/bootstrap.min.css" />
    <!--Carpeta de iconos-->
    <link rel="stylesheet" href="../FontAwesome/all.min.css" />
</head>

<header>
<nav class="menu-container">
  <div class="menu-toggle" id="menu-toggle">
    <span></span>
    <span></span>
    <span></span>
  </div>

  <div class="menu" id="menu">
    <div class="opcion usu" id="mUsu">
      <img src="../img/usu.svg" alt="Usuarios" title="Usuarios" />
      <h4>Usuarios</h4>
    </div>

    <input type="hidden" id="delegation" value="<?php echo $row['0']; ?>">

    <div class="opcion pro" id="mPro">
      <img src="../img/truck.svg" alt="Proveedor" title="Proveedor" />
      <h4>Proveedores</h4>
    </div>

    <div class="opcion mat" id="mMat">
      <img src="../img/materia.svg" alt="Materia Prima" title="Materia Prima" />
      <h4>Materia</h4>
    </div>

    <div class="opcion produ" id="mProd">
      <img src="../img/cart-plus.svg" alt="Productos" title="Productos" />
      <h4>Productos</h4>
    </div>

    <div class="opcion cli" id="mCli">
      <img src="../img/auriculares.svg" alt="Clientes" title="Clientes" />
      <h4>Clientes</h4>
    </div>

    <div class="opcion ven" id="mVentas">
      <img src="../img/crecer.svg" alt="Ventas" title="Ventas" />
      <h4>Ventas</h4>
    </div>
  </div>
</nav>


</header><br>


<body>
<div class="container mt-5">
    <h2>Módulo de Materia Prima</h2>
    <div class="text-right mb-3" style="margin-top: 10px;">
    <a href="../vistas/imprimir_materia.php" class="btn btn-danger" target="_blank" style="display: inline-block;">
    <img src="../img/fpdf.svg" alt="Reporte PDF" style="width: 24px; height: 24px; cursor: pointer;" />
    </a></div>

    <button class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#materiaModal">Agregar Materia Prima</button>
    <table id="materiaTable" class="display table table-striped" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Cantidad</th>
                <th>Unidad</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<!-- Modal Agregar -->
<div class="modal fade" id="materiaModal" tabindex="-1" aria-labelledby="materiaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="materiaForm" class="modal-content" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="materiaModalLabel">Agregar Materia Prima</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <div class="mb-3">
            <label for="tipo" class="form-label">Tipo de Materia Prima</label>
            <select class="form-select" id="tipo" required>
                <option value="" disabled selected>Seleccione un tipo</option>
                <option value="Hilo de coser overlock">Hilo de coser overlock</option>
                <option value="Hilo de bordado">Hilo de bordado</option>
                <option value="Botones">Botones</option>
                <option value="Elástica">Elástica</option>
                <option value="Cierres por unidad">Cierres por unidad</option>
                <option value="Broches">Broches</option>
                <option value="Ojales">Ojales</option>
                <option value="Cierre mágico">Cierre mágico</option>
                <option value="Tijeras">Tijeras</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione un tipo.</div>
        </div>
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre (detalle o marca)</label>
            <input type="text" class="form-control" id="nombre" placeholder="Ejemplo: Hilo marca X" autocomplete="off" required />
            <div class="invalid-feedback">Por favor, ingrese un nombre válido.</div>
        </div>
        <div class="mb-3">
            <label for="cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="cantidad" min="0.01" step="0.01" required />
            <div class="invalid-feedback">Por favor, ingrese una cantidad válida.</div>
        </div>
        <div class="mb-3">
            <label for="unidad" class="form-label">Unidad de medida</label>
            <select class="form-select" id="unidad" required>
                <option value="" disabled selected>Seleccione unidad</option>
                <option value="metros">Metros</option>
                <option value="unidad">Unidad</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione una unidad.</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
  </div>
</div>

<!-- Modal Editar -->
<div class="modal fade" id="editarMateriaModal" tabindex="-1" aria-labelledby="editarMateriaModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <form id="editarMateriaForm" class="modal-content" novalidate>
      <div class="modal-header">
        <h5 class="modal-title" id="editarMateriaModalLabel">Editar Materia Prima</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
      </div>
      <div class="modal-body">
        <input type="hidden" id="edit_id" />
        <div class="mb-3">
            <label for="edit_tipo" class="form-label">Tipo de Materia Prima</label>
            <select class="form-select" id="edit_tipo" required>
                <option value="" disabled selected>Seleccione un tipo</option>
                <option value="Hilo de coser overlock">Hilo de coser overlock</option>
                <option value="Hilo de bordado">Hilo de bordado</option>
                <option value="Botones">Botones</option>
                <option value="Elástica">Elástica</option>
                <option value="Cierres por unidad">Cierres por unidad</option>
                <option value="Broches">Broches</option>
                <option value="Ojales">Ojales</option>
                <option value="Cierre mágico">Cierre mágico</option>
                <option value="Tijeras">Tijeras</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione un tipo.</div>
        </div>
        <div class="mb-3">
            <label for="edit_nombre" class="form-label">Nombre (detalle o marca)</label>
            <input type="text" class="form-control" id="edit_nombre" required />
            <div class="invalid-feedback">Por favor, ingrese un nombre válido.</div>
        </div>
        <div class="mb-3">
            <label for="edit_cantidad" class="form-label">Cantidad</label>
            <input type="number" class="form-control" id="edit_cantidad" min="0.01" step="0.01" required />
            <div class="invalid-feedback">Por favor, ingrese una cantidad válida.</div>
        </div>
        <div class="mb-3">
            <label for="edit_unidad" class="form-label">Unidad de medida</label>
            <select class="form-select" id="edit_unidad" required>
                <option value="" disabled selected>Seleccione unidad</option>
                <option value="metros">Metros</option>
                <option value="unidad">Unidad</option>
            </select>
            <div class="invalid-feedback">Por favor, seleccione una unidad.</div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
      </div>
    </form>
  </div>
</div>

<script src="../js/jquery-3.4.1.min.js"></script>
<script src="../DataTables/datatables.min.js"></script>
<script src="../Bootstrap5/js/bootstrap.bundle.min.js"></script>
<script src="../js/menu.js"></script>


<script>
$(document).ready(function() {
    let table = $('#materiaTable').DataTable({
        language: {
            emptyTable: "No hay datos disponibles en la tabla",
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            infoEmpty: "Mostrando 0 a 0 de 0 entradas",
            lengthMenu: "Mostrar _MENU_ entradas",
            loadingRecords: "Cargando...",
            processing: "Procesando...",
            search: "Buscar:",
            zeroRecords: "No se encontraron registros coincidentes",
            paginate: {
                first: "Primero",
                last: "Último",
                next: "Siguiente",
                previous: "Anterior"
            }
        },
        columns: [
            { data: 'id' },
            { data: 'tipo' },
            { data: 'nombre' },
            { data: 'cantidad' },
            { data: 'unidad' },
            {
                data: null,
                orderable: false,
                searchable: false,
                render: function(data, type, row) {
                    return `
                        <button class="btn btn-warning btn-sm editar" data-id="${row.id}">Editar</button>
                        <button class="btn btn-danger btn-sm eliminar" data-id="${row.id}">Eliminar</button>
                    `;
                }
            }
        ]
    });

    function cargarMateriaPrima() {
        $.ajax({
            url: 'materia_prima_api.php',
            method: 'GET',
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    table.clear().rows.add(response.data).draw();
                } else {
                    alert('Error al cargar la materia prima: ' + response.message);
                }
            },
            error: function() {
                alert('Error en la comunicación con la API al cargar datos.');
            }
        });
    }

    cargarMateriaPrima();

    $('#materiaForm').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (!this.checkValidity()) {
            $(this).addClass('was-validated');
            return;
        }

        let tipo = $('#tipo').val();
        let nombre = $('#nombre').val().trim();
        let cantidad = parseFloat($('#cantidad').val());
        let unidad = $('#unidad').val();

        $.ajax({
            url: 'materia_prima_api.php',
            method: 'POST',
            contentType: 'application/json',
            data: JSON.stringify({ tipo, nombre, cantidad, unidad }),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#materiaForm')[0].reset();
                    $('#materiaForm').removeClass('was-validated');
                    let modalEl = document.getElementById('materiaModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                    cargarMateriaPrima();
                } else {
                    alert('Error al agregar materia prima: ' + response.message);
                }
            },
            error: function() {
                alert('Error en la comunicación con la API al agregar.');
            }
        });
    });

    $('#materiaTable tbody').on('click', '.eliminar', function() {
        let id = $(this).data('id');
        if (confirm('¿Está seguro de que desea eliminar este registro?')) {
            $.ajax({
                url: 'materia_prima_api.php',
                method: 'DELETE',
                contentType: 'application/json',
                data: JSON.stringify({ id }),
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        alert(response.message);
                        cargarMateriaPrima();
                    } else {
                        alert('Error al eliminar materia prima: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error en la comunicación con la API al eliminar.');
                }
            });
        }
    });

    $('#materiaTable tbody').on('click', '.editar', function() {
        let rowData = table.row($(this).parents('tr')).data();

        $('#edit_id').val(rowData.id);
        $('#edit_tipo').val(rowData.tipo);
        $('#edit_nombre').val(rowData.nombre);
        $('#edit_cantidad').val(rowData.cantidad);
        $('#edit_unidad').val(rowData.unidad);

        let editModal = new bootstrap.Modal(document.getElementById('editarMateriaModal'));
        editModal.show();
    });

    $('#editarMateriaForm').on('submit', function(e) {
        e.preventDefault();
        e.stopPropagation();

        if (!this.checkValidity()) {
            $(this).addClass('was-validated');
            return;
        }

        let id = $('#edit_id').val();
        let tipo = $('#edit_tipo').val();
        let nombre = $('#edit_nombre').val().trim();
        let cantidad = parseFloat($('#edit_cantidad').val());
        let unidad = $('#edit_unidad').val();

        $.ajax({
            url: 'materia_prima_api.php',
            method: 'PUT',
            contentType: 'application/json',
            data: JSON.stringify({ id, tipo, nombre, cantidad, unidad }),
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {
                    alert(response.message);
                    $('#editarMateriaForm')[0].reset();
                    $('#editarMateriaForm').removeClass('was-validated');
                    let modalEl = document.getElementById('editarMateriaModal');
                    let modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                    cargarMateriaPrima();
                } else {
                    alert('Error al actualizar materia prima: ' + response.message);
                }
            },
            error: function() {
                alert('Error en la comunicación con la API al actualizar.');
            }
        });
    });
});

</script>

</body>
</html>