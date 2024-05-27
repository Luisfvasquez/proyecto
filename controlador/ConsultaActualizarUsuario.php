<?php

require_once("../modelo/ConsultaActualizarUsuario.php");

$actu = new ConsultaUsuarioActualizar();
$datos = $actu->actus();

require_once("../vista/ActualizarUsuario.php");