<?php

function subir_imagen(){
    if (isset($_FILES["imagen_pdf"])) {
        $extension = explode('.', $_FILES["imagen_pdf"]['name']);
        $nuevo_nombre = rand() . '.' . $extension[1];
        $ubicacion = './img/' . $nuevo_nombre;
        move_uploaded_file($_FILES["imagen_pdf"]['tmp_name'], $ubicacion);
        return $nuevo_nombre;
    }
}

function obtener_todos_registros(){
    include('connect_db.php');
    $stmt = $conex->prepare("SELECT * FROM proveedor");
    $stmt->execute();
    $resultado = $stmt->fetchALL();
        return $stmt->rowCount();
}