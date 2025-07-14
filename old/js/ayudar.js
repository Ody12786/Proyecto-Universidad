
let mensaje= document.querySelector('.mensajes');


$(document).on('click' , '.btn-exito' , function (e){
    e.preventDefault();
    console.log($(this).parent().parent().children().first())
    let parent = $(this).parent().parent().children();
        $(parent).remove();

});



$('#gg-facturar').click(function(e){

    let idfactura = document.getElementById('fac').value

    let form = $("#exito").serialize();

    console.log(form)
    $.ajax({
        url:'../database/final.php',
        type:'POST',
        data: form,
       
       
    success:function(vs){
       //   console.log(vs)
         
        if(vs ==1){
            mensaje.innerHTML = `<div class="exito">
            <p >Compra Exitosa</p></div>`;
            // window.location.href=('imprimirfac.php?id='+idfactura)
            window.location.href=('../menu/ventas.php')
           
            return;
        } else if(vs ==2){
            mensaje.innerHTML = `<div class="error">
            <p >Ocurrio un Error</p></div>`;
            return;
        }

    }})
  





})

let btn_can=document.getElementById('salir')
btn_can.addEventListener('click',e=>{
    window.location.href = '../menu/ventas.php';
})


// $(document).on('click' , '.btn-exito' , function (e){
//     e.preventDefault();

//     let row=$(this).parent().parent()[0]
//     console.log(row)

// });