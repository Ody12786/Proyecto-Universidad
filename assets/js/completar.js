// console.log('estamos en completar.js')

// completar al momento de crear una facturar
let lista= document.querySelector(".completar")

let input=document.querySelector("#cedula").value

var seccion= document.querySelector('.seccion_venta')

seccion.addEventListener('click', e=>{
    if(e.target !== lista){
        lista.style.display="none"
    }
})




function completar(consulta){
    $.ajax({
        url:'../database/completar.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){
  

        $('.completar').html(respuesta)
        // console.log(respuesta)


    })
    .fail(function(){
        console.log('error')
    })
}



$(document).on('keyup', '#cedula', function(){
    var valor=$(this).val()
    if(valor !== ""){
        // console.log(valor)

        completar(valor)
        lista.style.display="block"
    }
// if(valor == "J-"){
//     completar()
//     lista.style.display="none"

// }
if(valor.lentgh == ""){
    completar()
    lista.style.display="none"

}


})


   function mostrar (rif){
    $("#cedula").val(rif);
    lista.style.display="none"
    

   }




   let list= document.querySelector(".completare")

   let codigo=document.querySelector("#lote").value
   
   var tod= document.querySelector('.seccion_venta')
   
   tod.addEventListener('click', e=>{
       if(e.target !== list){
           list.style.display="none"
       }
   })
   
   
   
   
   function completare(consulta){
       $.ajax({
           url:'../database/complatarpro.php',
           type:'POST',
           datatype:'html',
           data:{consulta:consulta},
       })
       .done(function(respuesta){
     
   
           $('.completare').html(respuesta)
   //         // console.log(respuesta)
   
   
       })
       .fail(function(){
           console.log('error')
       })
   }

   

$(document).on('keyup', '#lote', function(){
    var valore=$(this).val()
    if(valore !== ""){
        // console.log(valor)

        completare(valore)
        list.style.display="block"
    }
// if(valor == "J-"){
//     completar()
//     lista.style.display="none"

// }
if(valore.lentgh == ""){
    completare()
    list.style.display="none"

}


})


   function mostrare (lote){
    $("#lote").val(lote);
    list.style.display="none"

   }

   

   