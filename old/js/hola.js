
let mensaje= document.querySelector('.mensajes');


$('#gistrar').click(function(e){
    let formulario=document.getElementById('producto_fabricado');
// , nombre, tipo , talla, descripcion, valor, medida
    // Capturando inputs del formulario <<registro persona>>
    let datos= $('#producto_fabricado').serialize();
    let tipo=document.getElementById('tipo')
    let talla=document.getElementById('talla')
    let descripcion=document.getElementById('descripcion');
    let valor=document.getElementById('valor');
    let medida=document.getElementById('medida');
    let  precio=document.getElementById('precio')
    let nombre=document.getElementById('nombre')

    if(nombre.value === ""  || precio.value==="" || medida.value === ""  || talla.value===""  || tipo.value==="" || descripcion.value==="" || valor.value===""){
        mensaje.innerHTML = `<div class="error">
        <p >Complete todos los campos</p></div>`;
        e.preventDefault()
        return;

    }else if(nombre.value.length <= 3 ){
        mensaje.innerHTML = `<div class="error">
        <p >Ingrese un nombre de Producto valido</p></div>`;
        e.preventDefault()
        return;

    }else if(lote.value.length != 6 ){
        mensaje.innerHTML = `<div class="error">
        <p >Ingrese un codigo de producto valido</p></div>`;
        e.preventDefault()
        return;

    }else if(precio.value <= 0 ){
        mensaje.innerHTML = `<div class="error">
        <p >Precio invalido</p></div>`;
        e.preventDefault()
        return;

    }else if(valor.value <= 0 ){
        mensaje.innerHTML = `<div class="error">
        <p >Cantidad invalida</p></div>`;
        e.preventDefault()
        return;

    }

   
    $.ajax({
        url:'../database/producto.php',
        type:'POST',
        data: datos,

        success:function(vs){

            if(vs == 1){
                
                mensaje.innerHTML = `<div class="exito">
                <p >Registro exitoso</p></div>`;

                $(buscarp());
                formulario.reset();
               
                // e.preventDefault();
                return;
               
            
            } else if(vs == 2){
                mensaje.innerHTML = `<div class="error">
                <p >Codigo de lote ya registrado</p></div>`;
                // e.preventDefault()
                return;
                
                
            }    else if(vs == 3){
                mensaje.innerHTML = `<div class="error">
                <p >Ocurrio un Error</p></div>`;
                // e.preventDefault()
                return;

            }

        }


})
})