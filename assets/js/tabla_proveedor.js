// Función para buscar y cargar proveedores en la tabla
function buscarProveedor(consulta = '') {
    $.ajax({
        url: '../database/busqprovee.php', // Archivo PHP que devuelve filas <tr> en HTML
        type: 'POST',
        dataType: 'html', // Esperamos HTML para insertar en la tabla
        data: { consulta: consulta },
        success: function(respuesta) {
            // Insertar filas dentro del tbody con clase .ver-proveedores
            $('.ver-proveedores').html(respuesta);
        },
        error: function() {
            console.error('Error al cargar los proveedores.');
            $('.ver-proveedores').html('<tr><td colspan="4">Error al cargar los proveedores.</td></tr>');
        }
    });
}

// Evento para búsqueda en tiempo real
$(document).on('keyup', '#solipro', function() {
    let valor = $(this).val().trim();
    buscarProveedor(valor);
});

// Carga inicial para mostrar todos los proveedores al abrir la página
$(document).ready(function() {
    buscarProveedor();
});