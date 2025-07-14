
$(buscaru());
 $(buscarm());
$(buscarcli());

$(buscarventa());

/*$(buscarprov());
 function buscarprov(consulta){
     $.ajax({
       url:'../database/tablaP.php',
         type:'POST',
         datatype:'html',
         data:{consulta:consulta},
     })
     .done(function(respuesta){

         $('.ver-proveedor').html(respuesta)
         // body tabla


     })
     .fail(function(){
         // console.log('error')
     })
 }*/




function buscaru(consulta){
    $.ajax({
        url:'../database/tablaU.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){
// Tabla de Clientes, aqui se envia la informacion que vemos en la tabla de Clientes
        $('.ver-usuarios').html(respuesta)
        // body tabla


    })
    .fail(function(){
        // console.log('error')
    })
}

// function buscarm(consulta){
//     $.ajax({
//         url:'../database/tablaM.php',
//         type:'POST',
//         datatype:'html',
//         data:{consulta:consulta},
//     })
//     .done(function(respuesta){
// // Tabla de Clientes, aqui se envia la informacion que vemos en la tabla de Clientes
//         $('.ver-materia').html(respuesta)
//         // body tabla


//     })
//     .fail(function(){
//         // console.log('error')
//     })
// }



// function buscaru(consulta){
//     $.ajax({
//         url:'../database/tablaU.php',
//         type:'POST',
//         datatype:'html',
//         data:{consulta:consulta},
//     })
//     .done(function(respuesta){
// // Tabla de Clientes, aqui se envia la informacion que vemos en la tabla de Clientes
//         $('.ver-usuarios').html(respuesta)
//         // body tabla


//     })
//     .fail(function(){
//         // console.log('error')
//     })
// }

// function buscarm(consulta){
//     $.ajax({
//         url:'../database/tablaM.php',
//         type:'POST',
//         datatype:'html',
//         data:{consulta:consulta},
//     })
//     .done(function(respuesta){
// // Tabla de Clientes, aqui se envia la informacion que vemos en la tabla de Clientes
//         $('.ver-materia').html(respuesta)
//         // body tabla


//     })
//     .fail(function(){
//         // console.log('error')
//     })
// }


function buscarcli(consulta){
    $.ajax({
        url:'../database/tablaCli.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){
// Tabla de Clientes, aqui se envia la informacion que vemos en la tabla de Clientes
        $('.ver-clientes').html(respuesta)
        // body tabla


    })
    .fail(function(){
        // console.log('error')
    })
}

function buscarventa(consulta){
    $.ajax({
        url:'../database/tablaVenta.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){
// Tabla de Clientes, aqui se envia la informacion que vemos en la tabla de Clientes
        $('.ver-ventas').html(respuesta)
        // body tabla


    })
    .fail(function(){
        // console.log('error')
    })
}