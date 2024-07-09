<?php
require_once("../modelo/GestionInventario.php");

$productos = new Productos;

$compra = $productos->MostrarProductosCompra();
$venta = $productos->MostrarProductosVenta();
$metodo = $productos->Metodo();

require_once("../vista/administrador/RegistrosCompraVenta.php");
