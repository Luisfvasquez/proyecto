<?php

    require_once("../modelo/GestionCategorias.php");
    $agregar= new Categorias();
    $agregar->Borrar($_GET['id']);