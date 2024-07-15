<?php 
//Muestra el modelo de movimientos del inventario
require_once ("../modelo/MovimientosInventario.php");

$inventario = new inventario();//instancia la clase
$productos = $inventario->MostrarInventario();//almacena los datos de los productos

//Muestra la vista de los movimientos del inventario
require_once ("../vista/administrador/MovimientosInventario.php");