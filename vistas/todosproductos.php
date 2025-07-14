<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()// cabecera de la pagina
{
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Framed title

    $this->Image('../img/viñeta.jpg',-2,0,300,28);
    $this->Ln(20);
    // Move to the right
    // Framed title
    $this->Cell(75);
    $this->Cell(115,10,'Inventario de productos',0,0,'C');
    // Line break
    $this->Ln(12);
    // salto de pagina
    
    $this->SetFont('Arial','B',12);
    $this->Cell(25,15,"lote",1,0,'C',0);
    $this->Cell(35,15,"Producto",1,0,'C',0);
    $this->Cell(30,15,"Tipo de tela",1,0,'C',0);
    $this->Cell(50,15,"Caracteristicas",1,0,'C',0);
    $this->Cell(25,15,"Talla",1,0,'C',0);
    $this->Cell(50,15,"Cantidad Del Producto",1,0,'C',0);
    $this->Cell(40,15,"Existencia Actual",1,0,'C',0);
    $this->Cell(25,15,"Precio",1,1,'C',0);
    // $this->Cell(20,15,"cantidad",1,1,'C',0);

    
}
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Pagina '.$this->PageNo(),0,0,'C');
}
}


// traer datos de la BASE DE DATOS::::::::
include('../database/connect_db.php');

$consulta="SELECT * FROM Producto WHERE Existencia > 0  And Estado > 0";
$resultado=$conex->query($consulta);


$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row= $resultado->fetch_assoc()){
    
    $pdf->Cell(25,10,utf8_decode($row['lote_prod']),1,0,'C',0);
    $pdf->Cell(35,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(30,10,$row['Tipo'],1,0,'C',0);
    $pdf->Cell(50,10,$row['Descripcion'],1,0,'C',0);
    $pdf->Cell(25,10,$row['Talla'],1,0,'C',0);
    $contac=  $row['Cantidad'];
    $fin=$row['Medida'];
    if($fin == 1){
        $leer="Unidades";

    }
    if($fin == 2){
        $leer="Pares";

    }
    if($fin == 12){
        $leer="Docenas";

    }
    $contacto=$contac."-".$leer;
    $pdf->Cell(50,10, $contacto,1,0,'C',0);
    $cony=  $row['Existencia'];
    $fin=$row['Medida'];
    
    $contack=$cony."- Unidades";
    $pdf->Cell(40,10,$contack,1,0,'C',0);
    $pdf->Cell(25,10,$row['Precio_total'],1,1,'C',0);



}

$pdf->Output();