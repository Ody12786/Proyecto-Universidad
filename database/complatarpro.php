<?php

include("connect_db.php");


$salida="";
$query="SELECT lote_prod,Nombre FROM Producto";


$resultado= $conex->query($query);

if(isset($_POST['consulta'])){

    $q=$conex->real_escape_string($_POST['consulta']);

    $query="SELECT  lote_prod,Nombre,Tipo,Talla,Existencia,Medida FROM Producto 
    WHERE Existencia > 0 AND  lote_prod LIKE '%".$q."%' OR Nombre LIKE '%".$q."%' " ;

}

$resultado= $conex->query($query);

// echo $query;
// exit();

if($resultado->num_rows > 0){


    while($row=$resultado->fetch_assoc()){
        $salida.="<li class='selec'  onclick=\"mostrare('". $row['lote_prod']."')\">". $row['lote_prod']." - ". $row['Nombre']." -tipo: ". $row['Tipo']." - talla:". $row['Talla']." - Existencia:  ". $row['Existencia']. "</li>";
    }
}
else{

    $salida.="<li class='no-selec' >sin resultados</li>";

}

echo $salida;

?>