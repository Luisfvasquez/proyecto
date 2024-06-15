<?php

require_once("../modelo/ConsultaActualizarAdmin.php");

$actu = new ConsultaAdminActualizar();
$datos = $actu->actus();

require_once("../vista/administrador/ActualizarAdmin.php");