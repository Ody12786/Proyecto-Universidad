<?php

require('fpdf/fpdf.php');
include('../database/connect_db.php');

class PDF extends FPDF {
    function Header() {
        // Logo (ajusta la ruta y tamaño si quieres)
        $this->Image('../img/viñeta.jpg', 0,0,210);
        $this->Ln(35);
        $this->SetFont('Arial','B',15);
        $this->Cell(0,10,'Registro de Materia Prima',0,1,'C');
        $this->SetFont('Arial','',10);
        $this->Cell(0,10,'Fecha: '.date('d-m-Y'),0,1,'C');
        $this->Ln(20);

        // Encabezado de la tabla
        $this->SetFont('Arial','B',12);
        $this->Cell(20,10,'ID',1,0,'C');
        $this->Cell(50,10,'Tipo',1,0,'C');
        $this->Cell(60,10,'Nombre',1,0,'C');
        $this->Cell(30,10,'Cantidad',1,0,'C');
        $this->Cell(30,10,'Unidad',1,1,'C');
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
$pdf->SetFont('Arial','',11);

// Consulta materia prima
$sql = "SELECT id, tipo, nombre, cantidad, unidad FROM materia_prima ORDER BY id ASC";
$result = $conex->query($sql);

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $pdf->Cell(20,10,$row['id'],1);
        $pdf->Cell(50,10,utf8_decode($row['tipo']),1);
        $pdf->Cell(60,10,utf8_decode($row['nombre']),1);
        $pdf->Cell(30,10,$row['cantidad'],1,0,'C');
        $pdf->Cell(30,10,utf8_decode($row['unidad']),1,1,'C');
    }
} else {
    $pdf->Cell(0,10,'No se encontraron registros de materia prima.',1,1,'C');
}

// Salida del PDF: 'I' para mostrar en navegador, 'D' para descargar
$pdf->Output('I', 'reporte_materia_prima.pdf');
exit;
?>
