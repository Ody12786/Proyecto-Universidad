

$(buscar());

function buscar(consulta){
    $.ajax({
        url:'../database/busqusu.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){

        $('#inpor4').html(respuesta)
        // console.log(respuesta)


    })
    .fail(function(){
        console.log('error')
    })
}



$(document).on('keyup', '#usu', function(){
    var valor=$(this).val()
    if(valor !== ""){
        // console.log(valor)

        buscar(valor)
    }
else{
    buscar()

}

})