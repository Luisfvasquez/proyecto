<?php

require_once ("../modelo/GestionCategorias.php");
$datos= new Categorias();

$categorias=$datos->Categorias();

require_once("../vista/administrador/GestionCategorias.php");