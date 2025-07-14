let menu = document.querySelector('.sub-menu');
let tabla = document.getElementById('mostrar');
let tabla_ver = document.getElementById('ver');
let usuario = document.querySelector('.mostrar_usuario');

        usuario.style.display="none";
        tabla.style.display="none";
        tabla_ver.style.display="none";
        tabla_ver.style.opacity="0";
        tabla.style.opacity="0";
        usuario.style.opacity="0";

    menu.addEventListener('click', function(e){
      /*  console.log(e.target);*/
        
        let registro = document.querySelector('.registro');
        let ver = document.querySelector('.ver');
        let nuevo= document.querySelector('.nuevo');
        let volver=document.querySelector('.volver');
        
        if(e.target === registro){
            tabla.style.display="block";
            tabla.style.opacity="1";
            
            tabla_ver.style.display="none";
            usuario.style.display="none";
           
            e.preventDefault()
            
        }if(e.target === ver){
            tabla_ver.style.display="block";
            tabla_ver.style.opacity="1";
            
            tabla.style.display="none";
            usuario.style.display="none";
           
            e.preventDefault()

        }
        if(e.target === ver){
            tabla_ver.style.display="block";
            tabla_ver.style.opacity="1";
            
            tabla.style.display="none";
            usuario.style.display="none";
           
            e.preventDefault()

        }
        if(e.target === nuevo){

            usuario.style.display="block";
            usuario.style.opacity="1";

            tabla.style.display="none";
            tabla_ver.style.display="none";
            tabla_ver.style.opacity="0";
            tabla.style.opacity="0";

            e.preventDefault()

        }        if(e.target === volver){
            usuario.style.display="none";
            tabla.style.display="none";
            tabla_ver.style.display="none";
            tabla_ver.style.opacity="0";
            tabla.style.opacity="0";
            window.location="../database/cerrar.php";
            return;
           
            e.preventDefault()

        }
    });
