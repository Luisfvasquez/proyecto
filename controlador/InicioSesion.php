<?php 

//Modelo de inicio de sesio
require_once ("../modelo/InicioSesion.php");

$usuario = new Usuarios();
$usuario->Verificar();//Accede a la funcion de verificacion para ver si el usuario existe o no

?>