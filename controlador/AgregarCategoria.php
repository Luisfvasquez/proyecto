<?php

    require_once("../modelo/GestionCategorias.php");
    $agregar= new Categorias();
    $agregar->AgregarCategoria($_POST['nombre']);
    