<?php
//llama al modelo de registro de usuarios
require_once ("../modelo/GestionInventario.php");

$Productos = new Productos;//instancia la clase
$matriz = $Productos->MostrarProductoscliente();//almacena los datos de los productos

//muestra la vista principal de los usuarios
require_once ("../vista/usuario/VistaUsuario.php");