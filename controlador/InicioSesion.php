<?php 
require_once ("../modelo/InicioSesion.php");

$usuario = new Usuarios();
$usuario->Verificar();

?>