<?php
//llama al modelo del inventario
require_once("../modelo/GestionInventario.php");

$productos = new Productos;//instancia la clase

$matriz = $productos->InventarioStock();///almacena todos los datos de los productos en inventario

//Muestra la vista donde se gestiona el inventario
require_once("../vista/administrador/GestionInventario.php");
