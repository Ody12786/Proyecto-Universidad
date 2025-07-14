let formulario =document.getElementById('proveedorForm');
let menu = document.querySelector('.sub-menu');
let tabla = document.getElementById('mostrar');
let tabla_ver = document.getElementById('ver');

formulario.addEventListener('submit', function(e) {
    e.preventDefault(); // Evitar recarga de página al enviar

    // Obtener valores de los campos
    let rif = document.getElementById('rif').value.trim();
    let nombres = document.getElementById('nombres').value.trim();
    let empresa = document.getElementById('empresa').value.trim();
    let contacto = document.getElementById('contacto').value.trim();

    // Validar que no estén vacíos
    if (!rif || !nombres || !empresa || !contacto) {
        alert('Por favor, complete todos los campos.');
        return;
    }

    // Crear objeto FormData para enviar los datos
    let formData = new FormData(formulario);

    // Enviar datos con fetch a tu PHP de registro
    fetch('../database/registro_proveedor.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data.trim() === '1') {
            alert('Proveedor registrado correctamente.');
            formulario.reset(); // Limpiar formulario
            // Si tienes función para refrescar tabla, llama aquí
            if (typeof buscarProveedor === 'function') {
                buscarProveedor();
            }
        } else {
            alert('Error: ' + data);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al enviar el formulario.');
    });
});


        tabla.style.display="none";
        tabla_ver.style.display="none";
        tabla_ver.style.opacity="0";
        tabla.style.opacity="0";

    menu.addEventListener('click', function(e){
      /*  console.log(e.target);*/
        
        let registro = document.querySelector('.registro');
        let ver = document.querySelector('.ver');
        let volver=document.querySelector('.volver');
        
        if(e.target === registro){
            tabla.style.display="block";
            tabla.style.opacity="1";
            
            tabla_ver.style.display="none";
           
            e.preventDefault()
            
        }if(e.target === ver){
            tabla_ver.style.display="block";
            tabla_ver.style.opacity="1";
            
            tabla.style.display="none";
           
            e.preventDefault()

        }
        if(e.target === volver){
            tabla.style.display="none";
            tabla_ver.style.display="none";
            tabla_ver.style.opacity="0";
            tabla.style.opacity="0";
            window.location="../database/cerrar.php";
            return;
           
            

        }
    });