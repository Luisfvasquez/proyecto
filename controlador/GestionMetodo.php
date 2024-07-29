<?php

require_once ("../modelo/GestionMetodo.php");
$datos= new Metodo();

$metodos=$datos->Metodos();

require_once("../vista/administrador/GestionMetodos.php");