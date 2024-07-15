<?php

    require_once("../modelo/HistorialCompraUsuario.php");
    
    $productos= new Historial();
    
    $datos= $productos->HistorialCompra();

    require_once("../vista/usuario/HistorialCompra.php");