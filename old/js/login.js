$(document).ready(function() {
    const mensaje = document.querySelector('.mensajes');

    $('.inicio').on('click', function(e) {
        e.preventDefault();

        const usuario = $('#nom_usu').val().trim();
        const contrasena = $('#contrasena').val().trim();

        if (!usuario || !contrasena) {
            alert('Ingrese datos para continuar');
            return;
        }

        const datos = $('#formu').serialize();

        $.ajax({
            url: 'registro/session.php',
            type: 'POST',
            data: datos,
            success: function(resp) {
                //console.log("Respuesta del servidor:", resp);
                if (resp == 1) {
                    window.location = 'menu/menu.php';
                } else if (resp == 2) {
                    mensaje.textContent = 'Datos inválidos';
                } else {
                    mensaje.textContent = 'Ocurrió un error inesperado';
                }
            },
            error: function() {
                mensaje.textContent = 'Error en la comunicación con el servidor';
            }
        });
    });
});
