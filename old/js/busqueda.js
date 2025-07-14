$(buscar());

function buscar(consulta){
    $.ajax({
        url:'../database/busqeMateria.php',
        type:'POST',
        datatype:'html',
        data:{consulta:consulta},
    })
    .done(function(respuesta){

        $('#inpor1').html(respuesta)
        // console.log(respuesta)


    })
    .fail(function(){
        console.log('error')
    })
}



$(document).on('keyup', '#soliprod', function(){
    var valor=$(this).val()
    if(valor !== ""){
        // console.log(valor)

        buscar(valor)
    }
else{
    buscar()

}

})


