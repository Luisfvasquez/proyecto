<?php

    require_once("../modelo/GestionMetodo.php");
    $agregar= new Metodo();
    $agregar->Borrar($_GET['id']);