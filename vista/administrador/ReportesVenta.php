<?php
require("../../fpdf/fpdf.php");
require_once("../../modelo/GestionInventario.php");
require_once("../../modelo/Conexion.php");

$instruccion=$_GET['instruccion'];

$resultado=Conexion::conexion()->prepare($instruccion);

$resultado->execute(array());
while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
    $datos[]=$fila;
}
$productos = new Productos();

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
$fpdf->Cell(0, 20, "Reportes Compra", 0, 0, "C");
$fpdf->Ln(30); //salto de linea

$fpdf->SetX(10);
$fpdf->SetTextColor(24,178,159);
$fpdf->SetDrawColor(25,155,132);

$fpdf->SetFontSize(14);




$metodo = $productos->Metodo();
foreach ($datos as $personas) {
   
    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(30, 10, "Id", 1, 0, "C");
    $fpdf->SetX(40);

    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->Cell(50, 10, " " . $personas['IdProducto']  ." ", 1, 0, "C",1);
    $fpdf->Ln();
   
    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(30, 10, "Usuario", 1, 0, "C");
    $fpdf->SetX(40);

    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(50, 10, " " . $personas['Usuario_cedula']  ." ", 1, 0, "C",1);
    $fpdf->Ln();

    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(30, 10, "Factura", 1, 0, "C");
    $fpdf->SetX(40);
    
    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(50, 10, " " . $personas['IdFactura']  ." ", 1, 0, "C",1);
    $fpdf->Ln();

    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(30, 10, "Producto", 1, 0, "C");
    $fpdf->SetX(40);

    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(50, 10, " " . $personas['Nombre_producto']  ." ", 1, 0, "C",1);
    $fpdf->Ln();

   $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(30, 10, "Cantidad", 1, 0, "C");
    $fpdf->SetX(40);

    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(50, 10, " " . $personas['Cantidad_producto']  ." ", 1, 0, "C",1);
    $fpdf->Ln();

    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->Cell(30, 10, "Precio", 1, 0, "C");
    $fpdf->SetX(40);

    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);

    $fpdf->Cell(50, 10, " " . $personas['Precio_unitario']  ." ", 1, 0, "C",1);
    $fpdf->Ln();

    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->Cell(30, 10, "Fecha", 1, 0, "C");
    $fpdf->SetX(40);
    
    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);
      $fecha=date("y-m-d",strtotime($personas['Fecha'])); 
    $fpdf->Cell(50, 10, " " . $fecha  ." ", 1, 0, "C",1);
    $fpdf->Ln();

   
    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->Cell(30, 10, "Monto total", 1, 0, "C");
    $fpdf->SetX(40);
    foreach($metodo as $producto){// Buscar el método de pago correspondiente
        
    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);
    
    //Compara si el id de la factura del metodo es igual al id de la factura de la venta
   if ($producto['Factura_id'] == $personas['IdFactura']) {
    $fpdf->Cell(50, 10, " " . $producto['Monto_total']  ." ", 1, 0, "C",1);
        break; // Salir del bucle una vez encontrado el método
    }
    }

    $fpdf->Ln();


    $fpdf->SetX(10);
    $fpdf->SetTextColor(24,178,159);
    $fpdf->SetDrawColor(25,155,132);
    $fpdf->Cell(30, 10, "Metodo", 1, 0, "C");
    $fpdf->SetX(40);
    foreach($metodo as $producto){
        
    $fpdf->SetFillColor(240,240,240);
    $fpdf->SetTextColor(40,40,40);
    $fpdf->SetDrawColor(255,255,255);
    $fpdf->SetDrawColor(25,155,132);

     //Compara si el id de la factura del metodo es igual al id de la factura de la venta
   if ($producto['Factura_id'] == $personas['IdFactura']) {
    $fpdf->Cell(50, 10, " " . $producto['Metodo']  ." ", 1, 0, "C",1);
        break; // Salir del bucle una vez encontrado el método
    }
    }
    $fpdf->Ln();
    $fpdf->Ln();
}



$fpdf->Output();
