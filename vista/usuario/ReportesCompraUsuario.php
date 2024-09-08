<?php
require("../../fpdf/fpdf.php");
require_once("../../modelo/HistorialCompraUsuario.php");
$productos = new Historial();


$instruccion=$_GET['instruccion'];

$resultado=Conexion::conexion()->prepare($instruccion);

$resultado->execute(array());
while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
    $datos[]=$fila;
}

class pdf extends FPDF
{
    public function Header()
    {
        $this->SetFont("Arial", "B", 12);

        $this->Image("descargar.png", 190, 5, 20, 25, "png");
        $this->Write(5, $this->PageNo());
        $this->Ln();
    }


    public function Footer()
    { 
        $this->SetFont("courier", "B", 12);
        $this->SetY(-15);
        $this->Write(5, "Fe y alegria");
    }
}

$fpdf = new pdf();

$fpdf->AddPage("portrait", "letter");
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont("Arial", "B", 12); //Controla la letra el tipo y el tamaño de fuente}
$fpdf->Cell(0, 5, "IUJO", 0, 0, "C");
$fpdf->Ln();

$fpdf->SetFontSize(20);
$fpdf->Cell(0, 20, "Reportes Compra", 0, 0, "C");
$fpdf->Ln(30); //salto de linea

$fpdf->SetX(9);
$fpdf->SetTextColor(24,178,159);
$fpdf->SetDrawColor(25,155,132);

$fpdf->SetFontSize(14);
$fpdf->Cell(12, 10, "Id F", 1, 0, "C");
$fpdf->Cell(35, 10, "Categoria", 1, 0, "C");
$fpdf->Cell(50, 10, "Nombre", 1, 0, "C");
$fpdf->Cell(25, 10, "Cantidad", 1, 0, "C");
$fpdf->Cell(30, 10, "Precio", 1, 0, "C");
$fpdf->Cell(52, 10, "Descripcion", 1, 0, "C");


$fpdf->Line(20, 60, 200, 60);

$fpdf->Ln(20);

$fpdf->SetFillColor(240,240,240);
$fpdf->SetTextColor(40,40,40);
$fpdf->SetDrawColor(255,255,255);

foreach ($datos as $personas) {
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->SetX(9);
    $fpdf->Cell(12, 10, " " . $personas['IdFactura']  ." ", 1, 0, "L",1);   
    $fpdf->Cell(35, 10, " " . $personas['Nombre_categoria']  ." ", 1, 0, "L",1); 
    $fpdf->Cell(50, 10, " " . $personas['Nombre_producto']  ." ", 1, 0, "L",1);
    $fpdf->Cell(25, 10, " " . $personas['Cantidad_producto'].''  ." ", 1, 0, "C",1);
    $fpdf->Cell(30, 10, " " . $personas['Precio_unitario'].'$'  ." ", 1, 0, "C",1); 
    $fpdf->Cell(52, 10, " " .utf8_decode($personas['Descripcion'])  ." ", 1, 0, "L",1); 
    $fpdf->Ln(); 
}



$fpdf->Output();
