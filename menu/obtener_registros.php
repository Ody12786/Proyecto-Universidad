<?php

include("connect.php");
include("funciones-img.php");

$query = "";
$salida = array();
$query = "SELECT * FROM proveedor";

if(isset($_POST["search"]["value"])) {
    $query .= 'WHERE rif LIKE "&' . $_POST["search"]["value"] .
    '&"';
    $query .= 'OR nombres LIKE "&' . $_POST["search"]["value"] .
    '&"';
}

$query = (isset($_POST["order"])) ? 'ORDER BY' . $_POST['order']['0']['column'] .' '.
    $_POST["order"][0]['dir'] . ' ' : 'ORDER BY id DESC';
if($_POST["lenght"] != -1) {
    $query.='LIMIT' . $_POST["start"] . ',' . $_POST["lenght"];
}

$stmt = $conex->prepare($query);
$stmt->execute();
$resultado = $stmt->fetchALL();
$datos = array();
$filtered_rows = $stmt->rowCount();
foreach($resultado as $fila) {
    $imagen = '';
    if($fila["imagen"] != ''){
        $imagen = '<img src="img/' . $fila["imagen"] . '"class="img-thumbnail" width="50" height="50"';
    }else{
        $imagen ='';
    }
    $sub_array =array();
    $sub_array[] = $fila["id"];
    $sub_array[] = $fila["rif"];
    $sub_array[] = $fila["nombres"];
    $sub_array[] = $fila["empresa"];
    $sub_array[] = $imagen;
    $sub_array[] = $fila["fecha_creacion"];
    $sub_array[] = '<button type="button" name="editar" id"'.$fila["id"].'"class="btn btn-warning btn-xs editar">Editar</button>';
    $sub_array[] = '<button type="button" name="borrar" id"'.$fila["id"].'"class="btn btn-warning btn-xs borrar">Borrar</button>';
    $datos = $sub_array;
}
$salida = array(
    "draw"                 => intval($_POST["draw"]),
    "recordsTotal"         => $filtered_rows,
    "recordsFiltered"      => obtener_todos_registros(),
    "data"                 => $datos
);
echo json_encode($salida);