<?php
//Muestra los registros de compra
require_once("../modelo/GestionInventario.php");

$productos = new Productos;//instancia la clase

$metodo = $productos->Metodo();//almacena los datos de los metodos de pago

//Muestra la vista donde se gestionan los registros de compra
require_once("../vista/administrador/RegistrosCompra.php");
