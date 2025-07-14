<?php 

$precio="3";

$cambiare="";

if(!empty($_GET["id"])){
    $idd=$_GET["id"];
    $mind=$_REQUEST['id'];
    $cambiar="UPDATE Venta SET Fac=$precio  WHERE Id_ven = $mind";
    // UPDATE `producto` SET `Medida` = '$medida', `Existencia` = '$unidad', `Descripcion` = '$descripcion' WHERE `producto`.`lote_prod` = '$lote';
    //  echo $cambiar;
    $resultado= mysqli_query ($conex,$cambiar); 
    if($resultado){
        
                echo "listo";
              
    
        }
        else{
            echo 2;
         
            
            
        }
    


}




?>