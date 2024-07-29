<?php 
    require_once ('../modelo/NuevaCompra.php');
    $producto= new NuevaCompra();
    $matriz=$producto->InventarioStock();
    require_once ('../vista/administrador/NuevaCompra.php');

?>