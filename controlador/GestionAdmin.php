<?php
    //Muestra los datos de los administradores
    require_once ("../modelo/GestionAdmin.php");

    $admin = new Admin();//Instancia de la clase Admin
    $matriz= $admin->MostrarAdmin();//Se almacenan los datos en la variable matriz

    //Llama a la vista de gestion de administradores
    require_once ("../vista/administrador/GestionAdmin.php");