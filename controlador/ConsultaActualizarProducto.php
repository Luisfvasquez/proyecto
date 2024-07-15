<?php
//Llama al modelo el cual consulta 
    require_once("../modelo/ConsultaActualizarProducto.php");

    $datos= new ConsultaProducto();//Instancia de la clase ConsultaProducto

    $producto= $datos->ConsultaProducto();//Almacena los datos del producto a actualizar
    $matriz = $datos->Categorias();//Almacena las categorias de los productos
    //llama a la vista de actualizacion
    require_once("../vista/administrador/ActualizarProducto.php");
