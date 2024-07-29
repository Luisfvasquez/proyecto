<?php

    require_once("../modelo/GestionProveedor.php");
    $agregar= new Proveedor();
    $agregar->Borrar($_GET['id']);