<?php
    require_once("../modelo/ConsultaActualizarProducto.php");

    $datos= new ConsultaProducto();

    $producto= $datos->ConsultaProducto();
    $matriz = $datos->Categorias();
    require_once("../vista/administrador/ActualizarProducto.php");
