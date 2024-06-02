<?php

class BorrarAmind{

    private $db;
    private $cedula;

    public function __construct()
    {
        require_once("Conexion.php");
        $this->db = Conexion::conexion();
        $this->cedula = $_GET['cedula'];
    }


    public function Borrar(){
        $instruccion = ("DELETE FROM usuario WHERE Cedula = :cedula");
        $resultado = $this->db->prepare($instruccion);

        $resultado->execute(array(':cedula' => $this->cedula));

        header("Location: ../controlador/GestionAdmin.php");
    }


}