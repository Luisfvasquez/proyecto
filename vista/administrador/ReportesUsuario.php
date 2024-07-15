<?php
require("../../fpdf/fpdf.php");
require("../../modelo/MostrarUsuarios.php");
$usuarios = new Usuarios();

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
        $this->Write(5, "Huauu");
    }
}

$fpdf = new pdf();

$fpdf->AddPage("portrait", "letter");
$fpdf->SetMargins(10,30,20,20);
$fpdf->SetFont("Arial", "B", 12); //Controla la letra el tipo y el tamaño de fuente}
$fpdf->Cell(0, 5, "Huauu", 0, 0, "C");
$fpdf->Ln();

$fpdf->SetFontSize(20);
$fpdf->Cell(0, 20, "Reportes Usuarios", 0, 0, "C");
$fpdf->Ln(30); //salto de linea

$fpdf->SetX(10);
$fpdf->SetTextColor(24,178,159);
$fpdf->SetDrawColor(25,155,132);

$fpdf->SetFontSize(14);
$fpdf->Cell(40, 10, "Cedula", 1, 0, "C");
$fpdf->Cell(30, 10, "Nombre", 1, 0, "C");
$fpdf->Cell(60, 10, "Telefono", 1, 0, "C");
$fpdf->Cell(50, 10, "Correo", 1, 0, "C");
$fpdf->Cell(23, 10, "Rol", 1, 0, "C");


$fpdf->Line(20, 60, 200, 60);

$fpdf->Ln(20);

$fpdf->SetFillColor(240,240,240);
$fpdf->SetTextColor(40,40,40);
$fpdf->SetDrawColor(255,255,255);

$datos = $usuarios->MostrarUsuarios();
foreach ($datos as $personas) {
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->SetX(10);
    $fpdf->Cell(40, 10, " " . $personas['Cedula']  ." ", 1, 0, "C",1);
    $fpdf->Cell(30, 10, " " . $personas['Nombre_usuario']  ." ", 1, 0, "L",1);
    $fpdf->Cell(60, 10, " " . $personas['Telefono']  ." ", 1, 0, "C",1);
    $fpdf->Cell(50, 10, " " . $personas['Correo']  ." ", 1, 0, "L",1); 
    $fpdf->Cell(23, 10, " " . $personas['Rol']  ." ", 1, 0, "L",1); 
    $fpdf->Ln(); 
}



$fpdf->Output();
