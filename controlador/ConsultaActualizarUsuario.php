<?php
//llama al modelo para obtener los datos a actualizar
require_once("../modelo/ConsultaActualizarUsuario.php");

$actu = new ConsultaUsuarioActualizar();//instancia la clase
$datos = $actu->actus();//almacena los datos del usuario a actualizar

//Llama a la vista de actualizacion
require_once("../vista/administrador/ActualizarUsuario.php");