let mensaje= document.querySelector('.mensajes');
$('.inicio').on('click', e =>{
    e.preventDefault();
    var datos = $('#formu').serialize()


     let input= document.querySelector('.oso')
     let inputclave=document.querySelector('#contraseña')

    if(input.value == "" || inputclave.value== ""){
   
       alert('Ingrese datos para continuar');
        return
    }
    // alert(input,inputclave)
    $.ajax({
        url:'registro/session.php',
        type:'POST',
        data: datos,

        success:function(resp){ // inicia
            
            if(resp == 1){
                window.location="menu/menu.php";
                return

            }
            if(resp == 2){
  
                alert('datos invalidos');
                return

            }else{
                alert('acaba de ocurrir un error');
                return

            }
        }



        }) //ajax

})