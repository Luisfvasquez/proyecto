<?php

class BorrarAmind{

    private $db;
    private $cedula;

    public function __construct()
    {
        require_once("Conexion.php");
        $this->db = Conexion::conexion();
        $this->cedula = $_GET['cedula_admin'];
    }


    public function Borrar(){
        $instruccion = ("DELETE FROM Administrador WHERE Cedula_Admin = :cedula");
        $resultado = $this->db->prepare($instruccion);

        $resultado->execute(array(':cedula' => $this->cedula));

        header("Location: ../controlador/GestionAdmin.php");
    }


}