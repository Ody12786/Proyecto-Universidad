<?php

include("connect_db.php");


$salida="";
$query="SELECT p.Ci, p.Nombre_p, p.Apellido, c.N_afiliacion
FROM Persona p INNER JOIN Cliente c ON c.Cic = p.Ci";


$resultado= $conex->query($query);

if(isset($_POST['consulta'])){

    $q=$conex->real_escape_string($_POST['consulta']);

    $query="SELECT p.Ci, p.Nombre_p, p.Apellido, c.N_afiliacion
    FROM Persona p INNER JOIN Cliente c ON c.Cic = p.Ci
    WHERE  p.Ci LIKE '%".$q."%' OR p.Apellido LIKE '%".$q."%'OR p.Ci LIKE '%".$q."%'
    OR c.N_afiliacion LIKE '%".$q."%'OR p.Nombre_p LIKE '%".$q."%' ";

}


$resultado= $conex->query($query);

if($resultado->num_rows > 0){


    while($row=$resultado->fetch_assoc()){
        
        $salida.="<tr>
               
        <td>".$row['Nombre_p']."</td>
        <td>".$row['Apellido']."</td>
        <td>".$row['Ci']."</td>
        <td>".$row['N_afiliacion']."</td>


        
        </tr>";

}
}
else{

    $salida.='<tr><td colspan="4">Sin Resultados</td><tr>';

}

echo $salida;

?>