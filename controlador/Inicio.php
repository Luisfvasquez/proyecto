<?php

require_once ("modelo/GestionInventario.php");

$Productos = new Productos;
$matriz = $Productos->MostrarProductos();

require_once ("vista/Inicio.php");