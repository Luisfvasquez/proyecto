<?php 
require_once ("../modelo/MovimientosInventario.php");

$inventario = new inventario();
$productos = $inventario->MostrarInventario();

require_once ("../vista/administrador/MovimientosInventario.php");