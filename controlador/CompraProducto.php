<?php
    require_once ("../modelo/CompraProducto.php");
    $compra= new CompraProducto();
    $compra->Factura();
    $compra->DetalleFactura();
    $compra->MetodoPago();
    $compra->RegistroInventario();