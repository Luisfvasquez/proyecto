<?php 

    require_once('../modelo/NuevaCompraRegistro.php')  ;
    $compra= new NuevaCompraRegistro();
    $compra->Compra();
    $compra->DetalleCompra();
    $compra->InventarioRegistro();