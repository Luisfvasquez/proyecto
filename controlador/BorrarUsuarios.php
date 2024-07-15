<?php
//borra los datos de los usuarios
require_once("../modelo/BorrarUsuarios.php");

$borrar = new BorrarUsuarios();

$borrar->Borrar();
