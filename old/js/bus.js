


$(buscarcli());
$(buscarp());

/*function buscarProveedor(consulta) {
    $.ajax({
        url: '../database/busqprovee.php',
        type: 'POST',
        datatype: 'html',
        data: { consulta: consulta },
    })
    .done(function(respuesta) {
        $('.ver-proveedores').html(respuesta);
    })
    .fail(function() {
        console.log('error');
    });
}

$(document).on('keyup', '#solipro', function() {
    var valor = $(this).val();
    if (valor !== "") {
        buscarProveedor(valor);
    } else {
        buscarProveedor();
    }
});

// Carga inicial al abrir la página
$(document).ready(function() {
    buscarProveedor();
});*/


function buscarcli(consulta){
    $.ajax({
        url:'../database/busqcli.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){

        $('.ver-clientes').html(respuesta)
        // console.log(respuesta)


    })
    .fail(function(){
        console.log('error')
    })
}



$(document).on('keyup', '#solicli', function(){
    var valor=$(this).val()
    if(valor !== ""){
        // console.log(valor)

        buscarcli(valor)
    }
else{
    buscarcli()

}

})


function buscarp(consulta){
    $.ajax({
        url:'../database/busqproducto.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){

        $('.ver-productos').html(respuesta)
        // console.log(respuesta)


    })
    .fail(function(){
        console.log('error')
    })
}



$(document).on('keyup', '#prod_inv', function(){
    var valor=$(this).val()
    if(valor !== ""){
        // console.log(valor)

        buscarp(valor)
    }
else{
    buscarp()

}

})

