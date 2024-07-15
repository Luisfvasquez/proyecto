<?php
    //Llama al modelo de los usuarios
    require_once ("../modelo/MostrarUsuarios.php");

    $usuarios = new Usuarios();//Instancia de la clase Usuarios
    $matriz = $usuarios->MostrarUsuarios();//Almacena los datos de los usuarios

    //Llama a la vista de gestion de usuarios
    require_once ("../vista/administrador/GestionUsuarios.php");
