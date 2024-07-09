<?php

require_once ("modelo/GestionInventario.php");

$Productos = new Productos;
$matriz = $Productos->MostrarProductoscliente();

require_once ("vista/Inicio.php");