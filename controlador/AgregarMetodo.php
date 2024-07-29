<?php

    require_once("../modelo/GestionMetodo.php");
    $agregar= new Metodo();
    $agregar->AgregarMetodo($_POST['nombre']);
    