let menu = document.querySelector('.sub-menu');
let tabla = document.getElementById('mostrar');
let tabla_ver = document.getElementById('ver');
let modal=document.querySelector('.modal');



        modal.style.display="none";
        modal.style.opacity="0";
        tabla.style.display="none";
        tabla_ver.style.display="none";
        tabla_ver.style.opacity="0";
        tabla.style.opacity="0";

    menu.addEventListener('click', function(e){
      /*  console.log(e.target);*/
        
        let registro = document.querySelector('.registro');
        let ver = document.querySelector('.ver');
        let volver=document.querySelector('.volver');
        let asignar=document.querySelector('.asignar');
        
        if(e.target === registro){
            tabla.style.display="block";
            tabla.style.opacity="1";
            modal.style.display="none";
            
            tabla_ver.style.display="none";
           
            e.preventDefault()
            
        }if(e.target === ver){
            tabla_ver.style.display="block";
            tabla_ver.style.opacity="1";
            modal.style.display="none";
            
            tabla.style.display="none";
           
            e.preventDefault()

        }
        if(e.target === asignar){
            modal.style.display="block";
            modal.style.opacity="1";
            tabla_ver.style.display="none";
            
            tabla.style.display="none";
           
            e.preventDefault()

        }
        if(e.target === volver){
            tabla.style.display="none";
            tabla_ver.style.display="none";
            modal.style.display="none";
            tabla_ver.style.opacity="0";
            tabla.style.opacity="0";
            modal.style.opacity="0";
            window.location="../database/cerrar.php";
            return;
           
            

        }
    });






 let tablaoo=document.querySelector('.tabla_material');

 let modal=document.querySelector('.modal');

     modal.style.display="none";

     modal.style.opacity="0";



 tablaoo.addEventListener('click', e=>{
     var boton=document.querySelector('.boton');
     if(e.target == boton){

        let cod = e.target.value;
        modal.style.display="block";
    
         modal.style.opacity="1";   
        tabla.style.display="none";
         tabla_ver.style.display="none";
        tabla_ver.style.opacity="0";
       tabla.style.opacity="0"; 
    
    
    
       let cancelar=document.getElementById('cancelar')
        cancelar.addEventListener('click',e=>{
    
           modal.style.display="none";
    
          modal.style.opacity="0";
    
       })
        let registrar=document.getElementById('registt')
        $('#registt').click(function(){
             let codigo= cod;
            let rif= document.getElementById('riff').value
            let cantidad= document.getElementById('cantidad').value
           let fecha= document.getElementById('fechap').value
    
    
             console.log(codigo)
          $.ajax({
             url:'../database/materia.php',
            type:'POST',
            data: {codigo:codigo, rif:rif, cantidad:cantidad, fecha:fecha},
        
                success:function(vs){
                     if(vs == 1){
                         alert('exit0')                     }else if (vs ==2){
alert('error')                    }
                   
       
                 }
    
    
                 
        
        
             })
    
        })

     }
   


      


    




 })