
console.log('hola')

let rife=document.getElementById('riff');
let codig=document.getElementById('codigom');
let cantidad=document.getElementById('cantidad');
let fecha=document.getElementById('fechap');

$('#registt').click(function(){
    let datos= $('#materia').serialize();
            $.ajax({
            url:'../database/materia.php',
            type:'POST',
            data: datos,
        
                success:function(vs){
                    if(vs == 1){
                        alert('exit0')
                    }else if (vs ==2){
                        alert('error')
                    }else{
                        alert('Rif no existe')
                    }
                }

})
})