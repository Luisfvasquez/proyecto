<?php
require_once("../modelo/GestionInventario.php");

$productos = new Productos;

session_start();
if (isset($_SESSION["admin"])) {

    $matriz = $productos->MostrarProductosadmin();
} else {
    $matriz = $productos->MostrarProductos();
}

require_once("../vista/administrador/GestionInventario.php");
