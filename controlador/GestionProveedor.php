<?php

require_once ("../modelo/GestionProveedor.php");
$datos= new Proveedor();

$proveedores=$datos->Proveedores();

require_once("../vista/administrador/GestionProveedor.php");