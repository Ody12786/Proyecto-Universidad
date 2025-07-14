<?php

include("connect_db.php");
$valoe="";
$valor="";
$medida="";
$salida="";
$query="SELECT * FROM  Producto where Existencia > 0 AND Estado > 0";

if(isset($_POST['consulta'])){

    $q=$conex->real_escape_string($_POST['consulta']);

    $query="SELECT lote_prod,Nombre,Tipo,Talla,Existencia,Estado,Medida,Precio_total FROM  Producto
    WHERE Existencia > 0 AND  Estado != 0 AND Nombre LIKE '%".$q."%'  OR lote_prod LIKE '%".$q."%'";

}


$resultado= $conex->query($query);

if($resultado->num_rows > 0){
    


    while($row=$resultado->fetch_assoc()){

        $valoe=$row['Estado'];

        // $valor="<label>cul".$row['Medida']."</label>";

        if($valoe <= 0){
            $palabra="<td> <label class='alerta'> Anulado</label> </td>";
            
        } if($valoe > 0){
            $palabra="<td> <label class='normal'> Habilitado</label> </td>";
            
        }

            $valor=$row['Existencia'];

            // $valor="<label>cul".$row['Medida']."</label>";
    
            if($valor <= 0){
                $medida="<td> <label>".$valor." Unidades</label> </td>";
                
            }
            if($valor >= 1){
                $medida="<td> <p>".$valor." Unidades</p> </td>";
                
            }
           
           

        $salida.="<tr>
        <td>".$row['lote_prod']."</td>
        <td>".$row['Nombre']."</td>
        <td>".$row['Tipo']."</td>
        <td>".$row['Talla']."</td>".$medida."
        <td>".$row['Precio_total'].$palabra." $</td>
        
        <td> <a class='detalles' href='productoha.php?id=".$row['lote_prod']."' > Ver.</a></td>

        
        </tr>";

}
}
else{

    $salida.='<tr><td colspan="7">Sin Resultados</td><tr>';

}

echo $salida;

?>