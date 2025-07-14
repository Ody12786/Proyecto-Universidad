// let formulario=document.getElementById('formulario');
let btn=document.getElementById('avanzar');

let nombre=document.getElementById('nombre');
let apellido=document.getElementById('apellido');
let cedula=document.getElementById('cedula');
let carnet=document.getElementById('carnet');
let fecha=document.getElementById('fecha');
// $('#avanzar').click(function(){
    btn.addEventListener('click', e=>{
 

if(cedula.value === ""  || nombre.value==="" || carnet.value === ""  || apellido.value===""){
    alert('ingrese los datos');
    return;

}else if(nombre.value.length <= 2 ){
    alert('ingrese un nombre valido');
    return;
    
}else if(apellido.value.length <= 2 ){
    alert('ingrese un apellido valido')
    return;
    
}else if(cedula.value.length <= 6 || cedula.value.length >= 9){
        alert('ingrese una cedula valido')
        return;
   
}
else if(fecha.value === ""   ){
    alert('ingrese una fecha valido')
    return;  
}

});


