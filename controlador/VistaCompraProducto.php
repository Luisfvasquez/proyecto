<?php
    require_once("../modelo/VistaCompraProducto.php");

    $vistacompra= new VistaCompra;

    $metodo=$vistacompra->MetodoPago();

    require_once("../vista/usuario/VistaCompraProducto.php");
