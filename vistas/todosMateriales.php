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


    $this->Ln(20);
    // Move to the right
    // Framed title
    $this->Cell(75);
    $this->Cell(48,10,'Inventario',0,0,'C');
    // Line break
    $this->Ln(12);
    // salto de pagina
    
    $this->SetFont('Arial','B',12);
    $this->Cell(30,15,"Codigo",1,0,'C',0);
    $this->Cell(30,15,"Material",1,0,'C',0);
    $this->Cell(40,15,"Tipo",1,0,'C',0);
    $this->Cell(50,15,"Caracteristicas",1,0,'C',0);
    $this->Cell(20,15,"Precio",1,0,'C',0);
    $this->Cell(20,15,"cantidad",1,1,'C',0);

    
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

$consulta="SELECT * FROM Materiaprima";
$resultado=$conex->query($consulta);


$pdf = new PDF('P');
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);

while($row= $resultado->fetch_assoc()){
    
    $pdf->Cell(30,10,utf8_decode($row['Codigo']),1,0,'C',0);
    $pdf->Cell(30,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(40,10,$row['Tipo'],1,0,'C',0);
    $pdf->Cell(50,10,$row['Descripcion'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Precio_unit'],1,0,'C',0);
    $pdf->Cell(20,10,$row['Existencia'],1,1,'C',0);



}

$pdf->Output();