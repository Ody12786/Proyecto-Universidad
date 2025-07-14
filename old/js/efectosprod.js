
// let formulario =document.getElementById('proveedor');

let menu = document.querySelector('.sub-menu');
let tabla = document.getElementById('mostrar');
let tabla_ver = document.getElementById('ver');


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