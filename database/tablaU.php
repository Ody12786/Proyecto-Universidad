<?php

include("connect_db.php");


$salida="";
$query="SELECT * FROM usuario";

$resultado= $conex->query($query);




// if(isset($_POST['consulta'])){

//     $q=$conex->real_escape_string($_POST['consulta']);

//     $query="SELECT id_persona,usuario,pregunta1,pregunta2, tipo  FROM usuarios  
//     WHERE  usuario LIKE '%".$q."%' OR id_persona LIKE '%".$q."%'";

// }


// $resultado= $conex->query($query);

// echo $query;
// exit();

if($resultado->num_rows > 0){





    while($row=$resultado->fetch_assoc()){
        // esto es una prueba
        $tip=$row['tipo'];

        if($tip == 1){
            $palabra="Administrador";
        }if($tip == 2){
            $palabra="Estandar";
        }
        
            // 
        $salida.="<tr>
        <td>".$palabra."</td>
        <td>".$row['nombre']."</td>
        <td>".$row['carnet']."</td>

        </tr>";

    // 
    
    //fin del if que filtra al super usuario

}

}

else{

    $salida.='<tr><td colspan="2">Sin Resultados</td><tr>';

}

echo $salida;

?>