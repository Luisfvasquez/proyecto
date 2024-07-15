<?php
//Llama al modelo para la compra del producto
    require_once("../modelo/VistaCompraProducto.php");

    $vistacompra= new VistaCompra;//Instancia de la clase VistaCompra

    $metodo=$vistacompra->MetodoPago();//Almacena los metodos de pago

    //Muestra la vista de compra de productos
    require_once("../vista/usuario/VistaCompraProducto.php");
