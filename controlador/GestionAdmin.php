<?php

    require_once ("../modelo/GestionAdmin.php");

    $admin = new Admin();
    $matriz= $admin->MostrarAdmin();

    require_once ("../vista/Administradores.php");