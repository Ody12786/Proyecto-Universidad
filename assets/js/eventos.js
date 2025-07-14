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

    // Delegación para botón eliminar
    $(document).on('click', '.btn-eliminar', function() {
        let rif = $(this).data('rif');

        if (confirm('¿Seguro que deseas eliminar el proveedor con RIF: ' + rif + '?')) {
            $.ajax({
                url: '../database/eliminar_proveedor.php',
                type: 'POST',
                data: { rif: rif },
                success: function(response) {
                    alert(response);
                    buscarProveedor(); // Recarga la tabla después de eliminar
                },
                error: function() {
                    alert('Error al eliminar el proveedor');
                }
            });
        }
    });

   
});
