<?php

require('fpdf/fpdf.php');
include('../database/connect_db.php');


// Extiende la clase FPDF para personalizar encabezados y pies
class PDF extends FPDF {
    function Header() {
        // Logo (ajusta la ruta y tamaño si quieres)
        $this->Image('../img/viñeta.jpg', 0,0,210);
        $this->Ln(35);
        $this->SetFont('Arial','B',15);
        $this->Cell(80);
        $this->Cell(30,10,'Registro de Proveedores',0,0,'C');
        $this->Cell(0,10,'Fecha: '.date('d-m-Y'),0,1,'C');
        $this->Ln(20);

        // Encabezado de la tabla
        $this->SetFont('Arial','B',12);
        $this->Cell(40,10,'RIF',1,0,'C');
        $this->Cell(60,10,'Nombres',1,0,'C');
        $this->Cell(60,10,'Empresa',1,0,'C');
        $this->Cell(40,10,'Contacto',1,0,'C');
        $this->Ln();
    }

    function Footer() {
        // Posición a 1.5 cm del final
        $this->SetY(-15);
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

// Crear instancia del PDF
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

// Consulta proveedores
$sql = "SELECT rif, nombres, empresa, contacto FROM Proveedor ORDER BY empresa ASC";
$result = $conex->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(40,10,utf8_decode($row['rif']),1);
        $pdf->Cell(60,10,utf8_decode($row['nombres']),1);
        $pdf->Cell(60,10,utf8_decode($row['empresa']),1);
        $pdf->Cell(40,10,utf8_decode($row['contacto']),1);
        $pdf->Ln();
    }
} else {
    $pdf->Cell(0,10,'No se encontraron proveedores.',1,1,'C');
}

// Salida del PDF: 'I' para mostrar en navegador, 'D' para descargar
$pdf->Output('I', 'reporte_proveedores.pdf');
exit;
?>
