<?php
    //Llama al modelo de las vista de la compra 
    require_once ('../modelo/VistaCompra.php');
    require_once ('../modelo/GestionProveedor.php');
    require_once ('../modelo/GestionInventario.php');
    $categoria= new VistaCompra;//Instancia de la clase VistaCompra
    $matriz = $categoria->Categorias();//Almacena las categorias de los productos de la compra
    //lamada a la vista de compra en el cual se registran los nuevos productos adquiridos 
    //Por proveedor
    $proveedor = new Proveedor();
    $datos = $proveedor->Proveedores();

    $productos = new Productos();
    $productos = $productos->InventarioStock();
    require_once ("../vista/administrador/VistaCompra.php");