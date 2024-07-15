<?php
//Muestra los registros de compra
require_once("../modelo/GestionInventario.php");

$productos = new Productos;//instancia la clase

$compra = $productos->MostrarProductosCompra();//almacena los datos de los productos comprados
$venta = $productos->MostrarProductosVenta();//almacena los datos de los productos vendidos
$metodo = $productos->Metodo();//almacena los datos de los metodos de pago

//Muestra la vista donde se gestionan los registros de compra
require_once("../vista/administrador/RegistrosCompraVenta.php");
