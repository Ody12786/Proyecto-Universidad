function buscarProveedor() {
    let consulta = $('#solipro').val();

    $.ajax({
        url: '../database/busqprovee.php',
        type: 'POST',
        data: { consulta: consulta },
        success: function(data) {
            $('#inpor2').html(data);
        }
    });
}

$(document).ready(function() {
    // Carga inicial de la tabla
    buscarProveedor();

    // Búsqueda en tiempo real
    $('#solipro').on('input', function() {
        buscarProveedor();
    });

    // Evento delegado para botón Editar
    $(document).on('click', '.btn-editar', function() {
        let rif = $(this).data('rif');

        $.ajax({
            url: '../eventosProveedor/obtener_proveedor.php',
            type: 'POST',
            dataType: 'json',
            data: { rif: rif },
            success: function(data) {
                if (data) {
                    $('#edit_rif').val(data.rif);
                    $('#edit_rif_original').val(data.rif);
                    $('#edit_nombres').val(data.nombres);
                    $('#edit_empresa').val(data.empresa);
                    $('#edit_contacto').val(data.contacto);

                    var modal = new bootstrap.Modal(document.getElementById('modalEditarProveedor'));
                    modal.show();
                } else {
                    alert('Proveedor no encontrado');
                }
            },
            error: function() {
                alert('Error al obtener datos del proveedor');
            }
        });
    });

    // Evento delegado para botón Eliminar
    $(document).on('click', '.btn-eliminar', function() {
        let rif = $(this).data('rif');

        if (confirm('¿Seguro que deseas eliminar el proveedor con RIF: ' + rif + '?')) {
            $.ajax({
                url: '../eventosProveedor/eliminar_proveedor.php',
                type: 'POST',
                data: { rif: rif },
                success: function(response) {
                    alert(response);
                    buscarProveedor(); // Recarga la tabla
                },
                error: function() {
                    alert('Error al eliminar el proveedor');
                }
            });
        }
    });

    // Manejo del formulario de edición
    $('#formEditarProveedor').submit(function(e) {
        e.preventDefault();

        $.ajax({
            url: '../eventosProveedor/editar_proveedor.php',
            type: 'POST',
            data: $(this).serialize(),
            success: function(response) {
                if (response.trim() === 'ok') {
                    alert('Proveedor actualizado correctamente');
                    var modalEl = document.getElementById('modalEditarProveedor');
                    var modal = bootstrap.Modal.getInstance(modalEl);
                    modal.hide();
                    buscarProveedor();
                } else {
                    $('#mensajeEditar').text(response);
                }
            },
            error: function() {
                $('#mensajeEditar').text('Error al actualizar el proveedor');
            }
        });
    });
});

