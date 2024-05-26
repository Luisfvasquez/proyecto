<?php

    require_once ("../modelo/MostrarUsuarios.php");

    $usuarios = new Usuarios();
    $matriz = $usuarios->MostrarUsuarios();


    require_once ("../vista/MostrarUsuarios.php");
