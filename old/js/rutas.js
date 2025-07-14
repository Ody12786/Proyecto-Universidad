let modulos = document.getElementById('menu');
let proveedores = document.getElementById('mPro');
let delegacion = document.getElementById('delegation').value;
let productos = document.getElementById('mProd');
let clientes = document.getElementById('mCli');
let icono = document.getElementById('mUsu');

// Ocultar el icono de usuario si delegacion no es 1
if (delegacion != 1) {
    icono.style.display = "none";
}

modulos.addEventListener('click', e => {
    console.log('diste click');

    // Usamos e.target.classList.contains para detectar la clase clickeada
    if (e.target.classList.contains('usu')) {
        window.location = "modulo_usuario.php";
        return;
    } else if (e.target.classList.contains('pro')) {
        window.location = "modulo_proveedor.php";
        return;
    } else if (e.target.classList.contains('mat')) {
        window.location = "materia.php";
        return;
    } else if (e.target.classList.contains('produ')) {
        window.location = "productos.php";
        return;
    } else if (e.target.classList.contains('cli')) {
        window.location = "clientes.php";
        return;
    } else if (e.target.classList.contains('ven')) {
        window.location = "ventas.php";
        return;
    }
});


