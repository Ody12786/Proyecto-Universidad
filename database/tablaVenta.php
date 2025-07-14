<?php


// SELECT s.codigo_solicitud, m.nombre, s.codigo_lote, s.estatus,s.fecha_solicitud 
// FROM solicitud s INNER JOIN material m ON s.codigo_lote=m.codigo_lote
//  WHERE S.codigo_solicitud ='12238949'order by fecha_solicitud desc
 

include("connect_db.php");


$salida="";



$query="SELECT f.N_factura,f.Fecha,f.Cedula,f.Id_producto,f.Cant_sol,f.Medida_p,f.Total_pro,f.Iva,
k.Nombre,k.Tipo, k.Talla,k.Descripcion,p.Nombre_p,p.Apellido
FROM Factura_total f  INNER JOIN Persona p ON f.Cedula=p.Ci
INNER JOIN Producto k ON f.Id_producto=k.lote_prod";



$resultado= $conex->query($query);



if($resultado->num_rows > 0){


    while($row=$resultado->fetch_assoc()){
        $salida.="<tr>
        <td><strong>".$row['Cedula']."</strong></td>
        <td><strong>".$row['Nombre_p']."  ".$row['Apellido']."</strong></td>
        <td><strong>".$row['Id_producto']."</strong></td>
        <td><strong>".$row['Nombre']."</strong></td>
        <td><strong>".$row['Tipo']."</strong></td>
        <td><strong>".$row['Talla']."</strong></td>
        <td><strong>".$row['Fecha']."</strong></td>
        <td> <a class='detalles' target='_blank' href='../vistas/imprimirfac.php?id=".$row['N_factura']."&nom=".$row['Nombre_p']."&ape=".$row['Apellido']."&ced=".$row['Cedula']."'> Ver.</a></td>

        </tr>";

    }
}
else{

    $salida.='<tr><td colspan="7"><strong>Sin Resultados</strong></td><tr>';

}

echo $salida;

?>