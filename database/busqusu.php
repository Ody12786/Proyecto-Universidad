

<?php

include("connect_db.php");


$salida="";
$query="SELECT *FROM  Usuario";

if(isset($_POST['consulta'])){

    $q=$conex->real_escape_string($_POST['consulta']);

    $query="SELECT nombre,tipo,carnet FROM  Usuario
    WHERE  nombre LIKE '%".$q."%'  OR carnet LIKE '%".$q."%'";

}


$resultado= $conex->query($query);

if($resultado->num_rows > 0){


    while($row=$resultado->fetch_assoc()){

        $tip=$row['tipo'];

        if($tip == 1){
            $palabra="Administrador";
        }if($tip == 2){
            $palabra="Estandar";
        }
        
        $salida.="<tr>
        <td>".$palabra."</td>
        <td>".$row['nombre']."</td>
        <td>".$row['carnet']."</td>
        
        </tr>";

}
}
else{

    $salida.='<tr><td colspan="3">Sin Resultados</td><tr>';

}

echo $salida;

?>