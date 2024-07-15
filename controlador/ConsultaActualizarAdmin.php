<?php
//Llama al modelo para obtener los datos a actualizar
require_once("../modelo/ConsultaActualizarAdmin.php");

$actu = new ConsultaAdminActualizar();
$datos = $actu->actus();//Almacena los datos del usuario a actualizar

//Luego de tener los datos llama la vista
require_once("../vista/administrador/ActualizarAdmin.php");