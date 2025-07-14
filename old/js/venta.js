// console.log('vender')
let mensaje= document.querySelector('.mensajes');
let cedula=document.getElementById('cedula');
let lote=document.getElementById('lote');
let dolar=document.getElementById('bcv');
let cal ="";
// let factura=document.getElementById('facturar');
let columna=document.getElementById('columnn');
let azul=document.getElementById('azul');
// fa
                            
const cont_formulario=document.querySelector('.cont_tem')
const fragment=document.createDocumentFragment()
// const template=document.getElementById('template').content
// const templat=document.getElementById('temple').content  
let bloque=document.querySelector('.avere');
let cliente=document.getElementById('cli');
let btn_ven=document.getElementById('vendd');
btn_ven.style.display="none";
btn_ven.style.opacity="0";
azul.style.display="none";
azul.style.opacity="0";
bloque.style.display="none";



$('#aceptar').click(function(e){
    e.stopPropagation()
    let datos= $('#cedula').val();
   
    let segundo= new Date()
    let vador= segundo.getMilliseconds()

    // let datol= $('#lote').val();
    // console.log('vendido');
    e.preventDefault()
    if(cedula =="" || dolar.value == "" ){
        mensaje.innerHTML = `<div class="error">
        <p >los campos no pueden estar vacios</p></div>`;
        return;
    }else if(cedula.value.length < 7 || cedula.value.length > 9){
        mensaje.innerHTML = `<div class="error">
        <p >Ingrese un numero de cedula valido</p></div>`;
        return;

}
else{
    // factura.style.display="block";

    $.ajax({
        url:'../database/factura.php',
        type:'POST',
        datatype:'html',
        data: {cedula:datos},
    
            success:function(vs){      // inicia
                if(vs ==1){
                    mensaje.innerHTML = `<div class="error">
                    <p >Cedula inexistente en el sistema</p></div>`;

                    return;
                }else{
                    
                    columna.style.opacity="0";
                    columna.style.display="none";
                    azul.style.display="block";
                    azul.style.opacity="1";
                mensaje.innerHTML = `<div class="exito">
                    <p >Cedula Encontrada</p></div>`;
                let arreglo=JSON.parse(vs);
                cliente.value =datos;
                 cal = dolar.value;
                // identificador.value = vador
                bloque.style.display="block";
                let palabra = document.querySelector('.pregunta'); 
                
                // clone.querySelector('.no').textContent = "Nombre:"; 
                let palabrad = document.querySelector('.pregunta-dos'); 
                let palabrat = document.querySelector('.pregunta-tres');
                arreglo.forEach(elemento =>{
                //    palabra.textContent = elemen
                $('.avere').append(

                    `  <h4 class="titulo">Factura</h4>
                    <label class="ce" for="respuesta-uno">Cedula: </label>
                       <label class="pregunta" for="respuesta-uno">${elemento['Ci']}</label>

                       <label class="no" for="respuesta-uno">Nombre: </label>
                       <label class="pregunta-dos" for="respuesta-dos">${elemento['Nombre_p']}</label>
                       
                       <label class="pregunta-tres" for="respuesta-dos">${elemento['Apellido']}</label> <br> `
                 )

                 })


                 
               

                }
            }

            })
}
})
let actualizar="";
let reale="";
let decimalb;
let detalb;
let ivadecimalb;
let ivab ="";
$('#agregar').click(function(e){
    
    let dolares;
    // let nomina=""
    let decimal;
    let detal;
    let ivadecimal;
    let cadena="";
    let iva ="";
    let total ="";
    let segundo= new Date()
    let vador= segundo.getMilliseconds()
    

    let real="";
    let datol= $('#lote').val();
    let form_datolo=document.getElementById('buscardor');
    let datolo= $('#buscardor').serialize();
    
    let cedulla=document.getElementById('cli').value;
    let lote=document.getElementById('lote').value;
    let unidad=document.getElementById('unidad').value;
    let cantidad=document.getElementById('cantidad').value;
    let metodo=document.getElementById('metodo').value;
    let pagar=document.getElementById('precio_f').value;

    if(lote =="" || unidad == ""  || cantidad == "" ){
        mensaje.innerHTML = `<div class="error">
        <p >los campos no pueden estar vacios</p></div>`;
        return;
    }else if(lote.length < 6 || lote.length > 6){
        mensaje.innerHTML = `<div class="error">
        <p >Ingrese un codigo de lote valido</p></div>`;
        return;

}


$.ajax({
    url:'../database/produc.php',
    type:'POST',
    datatype:'html',
    data: datolo,

        success:function(vs){      // inicia
            if(vs ==1){
                mensaje.innerHTML = `<div class="error">
                <p >cedula inexistente en el sistema</p></div>`;
                return
            } else if(vs ==2){
                mensaje.innerHTML = `<div class="error">
                <p >unidades de medida diferentes</p></div>`;
                return
            } else if(vs ==3){
                mensaje.innerHTML = `<div class="error">
                <p >solicitud supera existencia</p></div>`;
                return
            }
        //     else if(vs ==4){
        //     mensaje.innerHTML = `<div class="error">
        //     <p >unidades de medida diferentes</p></div>`;
        //     return
            
        // } 
       
            mensaje.innerHTML = `<div class="exito">
                <p >si existe</p></div>`;
                form_datolo.reset()
                btn_ven.style.display="block";
                btn_ven.style.opacity="1";

               
                
                if(unidad == 12){
                    
                    cadena="Docenas";
                }
                if(unidad == 1){
                   cadena="Unidades";
                }
                
               
        let arreglor=JSON.parse(vs);
            

            arreglor.forEach(elementor =>{

                if(metodo == 1){
                    if(unidad == 1){
                        // existencia es por unidad
                        dolares= elementor.Precio_unit* (unidad*cantidad);
                        detal=dolares*0.13;
                        iva=dolares*0.16;
                        dolares=dolares+detal;
                        total=dolares+iva;
                      

                        // nomina=nomina+total;
                        real = cantidad*1;
                        actualizar = elementor.Existencia-real;
                     
                        decimal= dolares.toFixed(2);
                        ivadecimal=iva.toFixed(2);
                        decimalb=detal*cal;
                        ivadecimalb=iva*cal;
                        decimalb=decimalb.toFixed(2);
                        ivadecimalb=ivadecimalb.toFixed(2);
        
                    }
              
                if(unidad == 12){
                    // existencia es por docena
                    dolares= elementor.Precio_unit* (unidad*cantidad);
                    detal=dolares*0.5;
                    iva=dolares*0.16;
                    dolares=dolares+detal;
                    total=dolares+iva;
                 
                    decimal= dolares.toFixed(2);
                    ivadecimal=iva.toFixed(2);

                    decimalb=detal*cal;
                    ivadecimalb=iva*cal;
                    decimalb=decimalb.toFixed(2);
                    ivadecimalb=ivadecimalb.toFixed(2);

                    decimalb.style.color="red";
                    real = cantidad*12;
                    actualizar = elementor.Existencia-real;
    
                }


                 }
                 else if(metodo == 2){
                    if(unidad == 1){
                        // existencia es por unidad
                        dolares= elementor.Precio_unit* (unidad*cantidad);
                        detalb=dolares*cal;
                        ivab=detalb*0.16;
                        // dolares=dolares+detal;
                        total=detalb+ivab;
    
                        real = cantidad*1;
                        actualizar = elementor.Existencia-real;
                     
                        decimalb= detalb.toFixed(2);
                        ivadecimalb=ivab.toFixed(2);
                        decimal=dolares;
                        ivadecimal=dolares*0.16;
                        decimal=decimal.toFixed(2);
                        ivadecimal=ivadecimal.toFixed(2);
        
                    }
              
                if(unidad == 12){
                    // existencia es por docena
                    dolares= elementor.Precio_unit* (unidad*cantidad);
                    detalb=dolares*cal;
                    ivab=detalb*0.16;
                    // dolares=dolares+detal;
                    total=detalb+ivab;
                 
                    decimalb= detalb.toFixed(2);
                    ivadecimalb=ivab.toFixed(2);
                    decimal=dolares;
                    ivadecimal=dolares*0.16;
                    decimal=decimal.toFixed(2);
                    ivadecimal=ivadecimal.toFixed(2);
                    real = cantidad*12;
                    actualizar = elementor.Existencia-real;
                 }
               
                }
            

            // dolares=dolares.toFixed(0);
            // const cloner =templat.cloneNode(true)
            // clone.querySelector('.temp')
            // cloner.querySelector('.cod').textContent = "codigo:"; 
            // cloner.querySelector('.respuesta').textContent = elementor.lote_prod; 
            // cloner.querySelector('.respuesta-dos').textContent = elementor.Nombre; 
            // // cloner.querySelector('.respuesta-tres').textContent = elementor.Tipo; 
            // cloner.querySelector('.respuesta-cuatro').textContent = elementor.Talla; 
            // let orr= elementor.Precio_unit* (unidad*cantidad) ;
            // cloner.querySelector('.respuesta-cinco').textContent =orr;
            // cloner.querySelector('.respuesta-seis').textContent = cantidad;
            
            
    $('#inporven').append(



       `<tr>
                                                            
       <td> ${elementor['lote_prod']} </td>
       <td>${elementor['Nombre']}</td>
       <td>${elementor['Tipo']}</td>
       <td> ${elementor['Talla']}</td>
       <td> ${cantidad}-${cadena}</td>
       <td> ${decimal}$/ iva ${ivadecimal}$</td>
       <td>  ${decimalb}Bs/ iva ${ivadecimalb}Bs  </td>

   </tr> `
   
    )
    $('#prueba').append(

        `
        <input type="text" name="loter[]" value="${elementor['lote_prod']}">
        <input type="tex" name="cantidad[]" value="${cantidad}">
        <input type="hidden" name="unidad[]" value="${unidad}">
        <input type="hidden" name="cedulla" value="${cedulla}"> 
    
        <input type="hidden" name="pagar[]" value="${total}"> 
        <input type="hidden" name="iva" value="${iva}"> 
        <input type="hidden" name="actual[]" value="${actualizar}"> 
        <input type="hidden" name="vador" value="${vador}"> 
        
     `
     )



         
})
        }
})

// const vaciar=document.getElementById('tyu')


})

let btn_es=document.getElementById('vendd')
let cons=document.getElementById('cont_factura')



btn_ven.addEventListener('click',e=>{
        
    let datto = $('#prueba').serialize()
    console.log('click')
     $.ajax({
         url:'../database/venta_factura.php',
         type:'POST',
         data: datto,
        
        
     success:function(vs){
        //   console.log(vs)
          
         if(vs !=2){
             mensaje.innerHTML = `<div class="exito">
             <p >validando datos</p></div>`;

             e.preventDefault();
             btn_es.style.display="none";
             window.location.href = '../vistas/imprimir.php?id='+vs;
            //  $('.cont_factura').append(`<a href="../vistas/imprimir.php#?id="${vador}"> <input type="button" value="ver"><a/>`)
             
             return;
         } else if(vs ==2){
             mensaje.innerHTML = `<div class="error">
             <p >Ocurrio un Error</p></div>`;
             return;
         }

     }})
   

 })



 