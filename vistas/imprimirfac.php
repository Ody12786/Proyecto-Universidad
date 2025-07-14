<?php
require('fpdf/fpdf.php');


class PDF extends FPDF
{
function Header()
{
    $duia = date("d/m/y");
    // Select Arial bold 15
    $this->SetFont('Arial','B',15);
    $this->Image('../img/viñeta.jpg',-2,1,214,28);
    // Move to the right
 
    $this->Ln(20);
    $this->Cell(90);
    // Framed title
    $this->Cell(5,10,'Factura:',0,0,'C');
    // Line break
  

    
    $this->SetFont('Arial','B',12);
    $this->Cell(160,10,"Fecha:".$duia,0,0,'C',0);

    $this->Ln(10);
     
}
function Footer()
{
    // Go to 1.5 cm from bottom
    $this->SetY(-15);
    // Select Arial italic 8
    $this->SetFont('Arial','I',8);
    // Print centered page number
    $this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
}
}


// traer datos de la BASE DE DATOS::::::::
include('../database/connect_db.php');
 // if($conex){
   //     echo "todo bien!!";
    //}

    
$id=$_REQUEST['id'];
$nom=$_REQUEST['nom'];
$ape=$_REQUEST['ape'];
$ced=$_REQUEST['ced'];

$query="SELECT f.N_factura,f.Fecha,f.Cedula,f.Id_producto,f.Cant_sol,f.Medida_p,f.Total_pro,f.Iva,
k.Nombre,k.Tipo, k.Talla,k.Descripcion,p.Nombre_p,p.Apellido
FROM Factura_total f  INNER JOIN Persona p ON f.Cedula=p.Ci
INNER JOIN Producto k ON f.Id_producto=k.lote_prod where N_factura= $id";


$resultad = mysqli_query($conex,$query);


    // echo $resultad;
    $pdf = new PDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',14);


// Datos del Producto
$pdf->SetFont('Courier','B',14);
// Datos del cliente
$pdf->Cell(64);
$pdf->Cell(120,12,"Informacion Cliente ",0,1,'P',0,'C');
$pdf->Ln(4); 
$pdf->SetFont('Courier','B',12);
$pdf->Cell(10); 
$pdf->Cell(22,10,"Cliente:____________________",0,0,'P',0);
$pdf->Cell(0,10,utf8_decode($nom."  ".$ape),0,1,'P',0);
$pdf->Cell(10); 
$pdf->Cell(20,10,"Cedula:________________ ",0,0,'P',0);
$pdf->Cell(54,10, $ced,0,0,'P',0);
// $pdf->Cell(10); 
// $pdf->Cell(20,10,"E-mail:__________________________________________________________",0,0,'P',0);
// $pdf->Cell(60,10,utf8_decode($contactoC).$finalcontC,0,1,'P',0);

$pdf->Cell(10);

    $pdf->Cell(-20);
    $pdf->SetFont('Courier','B',14);
    $pdf->Cell(120,30,"Datos Producto ",0,1,'P',0,'C');
    $pdf->Ln(4); 


$oro="";
$rt="";


    while($row=mysqli_fetch_array($resultad)){ 

     

        $medida=$row['Medida_p'];
        if($medida == 1){
            $leer="Unidades";
    
        }
        if($medida == 2){
            $leer="Pares";
    
        }
        if($medida == 12){
            $leer="Docenas";
    
        }
        $contacto=$leer;
       
    


  
    $pdf->SetFont('Courier','B',12);  
    $pdf->Cell(10);
    $pdf->Cell(35,10,"Codigo Lote :_____________",0,0,'P',0);
    $pdf->Cell(25,10,$row['Id_producto'],0,0,'P',0);

    $pdf->Cell(10);
    $pdf->Cell(55,10,"Nombre del Producto:___________________",0,0,'P',0);
    $pdf->Cell(0,10,$row['Nombre'],0,1,'P',0);

    $pdf->Cell(10);
    $pdf->Cell(25,10,"Tipo:_____________________",0,0,'P',0);
    $pdf->Cell(0,10,$row['Tipo'],0,0,'P',0);
    
    $pdf->Cell(-110);
    $pdf->Cell(35,10,"Descripcion:___________________________",0,0,'P',0);
    $pdf->Cell(0,10,$row['Descripcion'],0,1,'P',0);

    $pdf->Cell(10);
    $pdf->Cell(25,10,"Talla:____________________",0,0,'P',0);
    $pdf->Cell(0,10, $row['Talla'],0,0,'P',0);

    $pdf->Cell(-110);
    $pdf->Cell(35,10,"Cantidad:______________________________",0,0,'P',0);
    $pdf->Cell(0,10,$row['Cant_sol']."-".$contacto,0,1,'P',0);

    $pdf->Cell(10);
    $pdf->Cell(25,10,"Precio:____________________",0,0,'P',0);
    $pdf->Cell(0,10,$row['Total_pro'],0,0,'P',0);


}
    

    $pdf->Ln(10); 


    $pdf->Ln(10);



    $pdf->Output();
 


 


?>