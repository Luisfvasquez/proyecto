<?php
require_once("../modelo/GestionInventario.php");

$productos = new Productos;

$matriz = $productos->MostrarProductosCompra();

require_once("../vista/administrador/GestionInventario.php");
