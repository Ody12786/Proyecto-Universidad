function SoloLetras (e){
    key= e.keyCode || e.which;
    tecla = String.fromCharCode(key).toString();
    letras="ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyzàèìòùûûúáéíóü";
    especiales= [8,13];
    
    tecla_especial = false;
    for(var i in especiales){
    
    if(key == especiales[i]){
        tecla_especial = true;
        break;
    }
    
    } 
    
    if(letras.indexOf(tecla) == -1 && !tecla_especial)
    {
        return false;
    }
    
    }


    function SoloNumeros(evt){


        if (window.event){
        keynum = evt.keyCode;
    }
    else{
    keynum = evt.which;
    }
    
    if((keynum > 47 && keynum < 58) || keynum ==8 || keynum == 13 )
    {
        return true;
    }else{

        return false;
    }
    }

    function SinEspacios(evt){


        if (window.event){
        keynum = evt.keyCode;
    }
    else{
    keynum = evt.which;
    }
    
    if(keynum == 32 || keynum == 34 || keynum == 39 || (keynum > 170 && keynum < 222))
    {
        return false;
    }else{
        return true;
    }
    }

    function ConEspacios(evt){


        if (window.event){
        keynum = evt.keyCode;
    }
    else{
    keynum = evt.which;
    }
    
    if( keynum == 34 || keynum == 39 || (keynum > 170 && keynum < 222))
    {
        return false;
    }else{
        return true;
    }
    }



    
    function SoloNumerosComa(evt){


        if (window.event){
        keynum = evt.keyCode;
    }
    else{
    keynum = evt.which;
    }
    
    if((keynum > 47 && keynum < 58) || keynum ==8 || keynum == 13 || keynum == 44)
    {
        return true;
    }else{

        return false;
    }
    }
    