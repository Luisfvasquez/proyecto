<?php
    //Borra los datos de los administradores
    require_once("../modelo/BorrarAdmin.php");
    $borrar = new BorrarAmind();
    $borrar->Borrar();

?>