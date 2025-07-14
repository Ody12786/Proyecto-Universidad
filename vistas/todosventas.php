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
    $this->Cell(115,10,'Ventas Realizadas',0,0,'C');
    // Line break
    $this->Ln(12);
    // salto de pagina
    
    $this->SetFont('Arial','B',12);
    $this->Cell(25,15,"Cedula",1,0,'C',0);
    $this->Cell(40,15,"Nombre Cliente",1,0,'C',0);
    $this->Cell(25,15,"Codigo lote",1,0,'C',0);
    $this->Cell(45,15,"Nombre de producto",1,0,'C',0);
    $this->Cell(30,15,"Tipo de tela",1,0,'C',0);
    $this->Cell(15,15,"Talla",1,0,'C',0);
    $this->Cell(30,15,"Solicitud",1,0,'C',0);
    $this->Cell(30,15,"Total a pagar",1,0,'C',0);
    $this->Cell(40,15,"Fecha de venta",1,1,'C',0);


    
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

// $consulta="SELECT e.MontoTotal,p.Nombre, v.F_venta, e.Id_prod,p.Tipo,e.Cant_ped,
// FROM Venta_incluye_producto e INNER JOIN Venta v ON e.Id_ven = v.Id_ven
//  INNER JOIN Producto p ON e.Id_prod= p.lote_prod";

$consulta="SELECT e.Id_ven,c.Cic,p.Nombre_p,p.Apellido, v.F_venta, e.Id_prod,e.Cant_ped,k.Nombre,k.Tipo, k.Talla,e.MontoTotal
FROM Venta v INNER JOIN Venta_incluye_producto e  ON v.Id_ven = e.Id_ven
 INNER JOIN Cliente c ON v.Cic=c.Cic INNER JOIN Persona p ON c.Cic=p.Ci
 INNER JOIN Producto k  ON k.lote_prod=e.Id_prod";

$resultado=$conex->query($consulta);


$pdf = new PDF('L');
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

while($row= $resultado->fetch_assoc()){
    
    
    $pdf->Cell(25,10,utf8_decode($row['Cic']),1,0,'C',0);
    $contac=  $row['Nombre_p'];
    $fin=$row['Apellido'];
    $contacto=$contac."  ".$fin;
    $pdf->Cell(40,10,$contacto,1,0,'C',0);
    $pdf->Cell(25,10,$row['Id_prod'],1,0,'C',0);
    $pdf->Cell(45,10,$row['Nombre'],1,0,'C',0);
    $pdf->Cell(30,10,$row['Tipo'],1,0,'C',0);
    $pdf->Cell(15,10,$row['Talla'],1,0,'C',0);
    $pdf->Cell(30,10,$row['Cant_ped'],1,0,'C',0);
    $pdf->Cell(30,10,$row['MontoTotal'],1,0,'C',0);
    $pdf->Cell(40,10,$row['F_venta'],1,1,'C',0);

}



$pdf->Output();