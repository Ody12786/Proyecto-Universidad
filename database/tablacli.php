<?php


// SELECT s.codigo_solicitud, m.nombre, s.codigo_lote, s.estatus,s.fecha_solicitud 
// FROM solicitud s INNER JOIN material m ON s.codigo_lote=m.codigo_lote
//  WHERE S.codigo_solicitud ='12238949'order by fecha_solicitud desc
 

include("connect_db.php");


$salida="";
$query="SELECT p.Ci, p.Nombre_p, p.Apellido, c.N_afiliacion
FROM Persona p INNER JOIN Cliente c ON c.Cic = p.Ci";


$resultado= $conex->query($query);



if($resultado->num_rows > 0){


    while($row=$resultado->fetch_assoc()){
        $salida.="<tr>
        <td><strong>".$row['Nombre_p']."</strong></td>
        <td><strong>".$row['Apellido']."</strong></td>
        <td><strong>".$row['Ci']."</strong></td>
        <td><strong>".$row['N_afiliacion']."</strong></td>
   
        </tr>";

    }
}
else{

    $salida.='<tr><td colspan="4"><strong>Sin Resultados</strong></td><tr>';

}

echo $salida;

?>