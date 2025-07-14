let parte= document.querySelector('.primero');
let apartado= document.querySelector('.segundo');
let mensaje= document.querySelector('.mensajes');
//     }
// #tipo,#productoN,#descripcion,#existencia,#precio
    // apartado.style.opacity="0";
    // apartado.style.display="none";
// registro materia prima
$('#register').click(function(){

    let datos= $('#formulario').serialize();
    let producto= document.getElementById('productoN');
    let tipo= document.getElementById('tipo');
    let precio= document.getElementById('precio');
    let descripcion= document.getElementById('descripcion');
    let existencia= document.getElementById('existencia');

    if(producto.value === ""  || tipo.value==="" || precio.value === ""  || existencia.value==="" || descripcion.value===""){
        
        mensaje.innerHTML = `<div class="error">
        <p >No se puede registrar con campos vacios</p></div>`;
        return;
    
    }else {
        
    


    $.ajax({
        url:'../database/material.php',
        type:'POST',
        data: datos,

        success:function(vs){
            if(vs == 1){
                
                mensaje.innerHTML = `<div class="exito">
                <p >Registro exitoso</p></div>`;
                // apartado.style.display="block";
                // apartado.style.opacity="1";
                // apartado.style.transition=".5s";
                // parte.style.opacity=".3";
                // parte.style.transition=".5s";
                $(buscarm());
                return;

            }
            else if(vs == 2){
               
                mensaje.innerHTML = `<div class="error">
                <p >Error al registrar</p></div>`;
                return;
            }  

        }


})}
})

// registro materia surtida por proveedor  riff cantidad fecha
// $('#registt').click(function(){
    

//     let info=document.getElementById('materia');
//     let datos= $('#materia').serialize();
//     let riff= document.getElementById('riff');
//     let cantidad= document.getElementById('cantidad');
//     let fecha= document.getElementById('fechap');

//     if(riff.value === ""  || cantidad.value==="" || fecha.value === "" ){
//         mensaje.innerHTML = `<div class="error">
//         <p >No se puede registrar con campos vacios</p></div>`;
//         return;
    
//     }else  if(riff.value.length <= 8 || riff.value.length >= 10){
        
//         mensaje.innerHTML = `<div class="error">
//         <p >El rif solo admite 9 caracteres</p></div>`;
//         return;
    
        
//      }else if(cantidad.value <= 0){
  
//         mensaje.innerHTML = `<div class="error">
//         <p >Ingrese la cantidad del producto que viene en el lote</p></div>`;
//         return;
        
//     }else{

//     $.ajax({
//         url:'../database/materia.php',
//         type:'POST',
//         data: datos,

//         success:function(vs){
//             if(vs == 1){
                
                // alert('registro exitoso...')
//                 mensaje.innerHTML = `<div class="exito">
//                 <p >Regstro Exitoso!!</p></div>`;
//                 $(buscarm());
//                 info.reset();
//                 return;
//             }
//             else if(vs == 2){
//                 alert('ocurrio un error...')
//                 mensaje.innerHTML = `<div class="error">
//                 <p >ocurrio un error</p></div>`;
//                 return;
//             }  
//             else if(vs == 3){
               
//                 mensaje.innerHTML = `<div class="error">
//                 <p >Rif no existente en el sistema, proceda a registrar el proveedor.</p></div>`;
//                 return;
//             }  

//         }


    
// })}
// })

