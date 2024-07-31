<?php 
    require_once ('../modelo/NuevaCompra.php');
    require_once ('../modelo/GestionProveedor.php');    
    $producto= new NuevaCompra();
    $matriz=$producto->InventarioStock();
    
    $proveedor= new Proveedor();
    $prove=$proveedor->Proveedores();

    require_once ('../vista/administrador/NuevaCompra.php');

?>