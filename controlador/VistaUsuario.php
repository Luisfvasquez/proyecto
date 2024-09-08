<?php
//llama al modelo de registro de usuarios
require_once ("../modelo/GestionInventario.php");

$Productos = new Productos;//instancia la clase
list($matri,$precio) = $Productos->MostrarProductoscliente();//almacena los datos de los productos
$matriz=$matri;
$precios=$precio;
$cantidad=$Productos->Cantidad();
//muestra la vista principal de los usuarios
require_once ("../vista/usuario/VistaUsuario.php");