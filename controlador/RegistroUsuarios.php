<?php
//llama al modelo de registro de usuarios
require_once ("../modelo/RegistroUsuario.php");

$registrar = new RegistroUsuarios();//Instancia de la clase RegistroUsuarios
$registrar->RegistrarUsuarios();//Registra el nuevo usuario en BD