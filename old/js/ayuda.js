

// $('#facturar').click(function(e){
//     console.log('funciona,,,')
//  let cedula=document.getElementById('cedula').value;
//  let lote=document.getElementById('lote').value;
//  let unidad=document.getElementById('unidad').value;
//  let cantidad=document.getElementById('cantidad_compra').value;
//  let pagar=document.getElementById('precio_f').value;

// //  alert(cedula)
//  $.ajax({
//  url:'../database/venta_factura.php',
//  type:'POST',
//  data: {cedula:cedula,
//         lote:lote,
//         cantidad:cantidad,
//         unidad:unidad,
//         pagar:pagar},

//      success:function(vs){
//          if(vs == 1){
//              alert('exit0');
//              $(buscarventa());
//          }else if (vs ==2){
//              alert('error')
//          }else if (vs ==3){
//             alert('cantidad solicitada supera existencia del producto')
//         }else if (vs ==4){
//              alert('unidad invalida')
//          }
//      }
let mensaje= document.querySelector('.mensajes');
// })

// })


// let truele = document.getElementById('caos');
let usuario = document.getElementById('delegation').value;
let desple = document.getElementById('estatusImp')
let estandar = document.getElementById('estandar')
let ver = document.getElementById('ver')
let primer= document.getElementById('premernombre')
let segundo= document.getElementById('segundonombre')
let cambiar = document.getElementById('btn-gg')


let fecha=document.getElementById('fecc')
let cantidad=document.getElementById('camcan')

if(usuario != 2){
    estandar.style.display="none";
    desple.style.display="block";
    ver.style.display="block";

}else {
    // truele.style.display="block";
    estandar.style.display="block";
    cambiar.style.display="none";
    ver.style.display="none";
    primer.style.display="none";
   segundo.style.display="none";
}


$('#btn-gg').click(function(){
 if(fecha.value == ""){
    mensaje.innerHTML = `<div class="error">
    <p >Ingrese la fecha.</p></div>`;
    return;
 } else if(cantidad.value == "" || cantidad.value <= 0){
    mensaje.innerHTML = `<div class="error">
    <p >Ingrese una cantidad valida</p></div>`;
    return;
 }

    let datos= $('#cambio').serialize();
 console.log(datos)

    $.ajax({
        url:'../database/anular.php',
        type:'POST',
        data: datos,

        success:function(vs){ 
            if(vs == 1){
                
            mensaje.innerHTML = `<div class="exito">
            <p >Cambio exitoso</p></div>`;
            cambiar.style.display="none";
           
            return;
        }
        else if(vs == 2){
            // alert('no se realizo el registro completo...')
            mensaje.innerHTML = `<div class="error">
    <p >no se realizo el Cambio completo..'</p></div>`;
    return;
        }


        }


})
})