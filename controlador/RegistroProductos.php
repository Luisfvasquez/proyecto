<?php
    require_once ("../modelo/RegistroProductos.php");

    $registro = new RegistroProductos();
    $registro->RegistrarProductos();
    $registro->Compra();
     $registro->DetalleCompra(); 
     $registro->InventarioRegistro();