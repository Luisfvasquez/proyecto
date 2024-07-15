<?php
//Lllama al modelo de RegistroProductos
    require_once ("../modelo/RegistroProductos.php");

    $registro = new RegistroProductos();//Instancia de la clase RegistroProductos
    $registro->RegistrarProductos();//Primeramente registra los datos del producto 
    $registro->Compra();//Luego registra los datos de la compra
     $registro->DetalleCompra(); //a partir de ahi guarda los detalles de la compra
     $registro->InventarioRegistro();//por ultimo actualiza el inventario con el nuevo producto