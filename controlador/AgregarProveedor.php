<?php

    require_once("../modelo/GestionProveedor.php");
    $agregar= new Proveedor();
    $agregar->AgregarProveedor($_POST['rif'],$_POST['nombre'],$_POST['correo'],$_POST['direccion']);
    