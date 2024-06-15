<?php

    require_once ('../modelo/VistaCompra.php');
    $categoria= new VistaCompra;
    $matriz = $categoria->Categorias();

    require_once ("../vista/administrador/VistaCompra.php");