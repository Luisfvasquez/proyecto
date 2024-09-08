<?php
//Llama al modelo del inventario
require_once ("modelo/GestionInventario.php");

$Productos = new Productos;//instancia la clase
list($matri,$precio) = $Productos->MostrarProductoscliente();//almacena los datos de los productos
$matriz=$matri;
$precios=$precio;
//Muestra la vista del inicio donde estaran los productos para eso se almacenan los productos

require_once ("vista/Inicio.php");