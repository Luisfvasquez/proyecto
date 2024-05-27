<?php

class BorrarUsuarios{

    private $db;
    private $cedula;

    public function __construct()
    {
        require_once("Conexion.php");
        $this->db = Conexion::conexion();
        $this->cedula = $_GET['cedula_usuario'];
    }


    public function Borrar(){
        $instruccion = ("DELETE FROM USUARIOS WHERE CEDULA_USUARIO = :cedula");
        $resultado = $this->db->prepare($instruccion);

        $resultado->execute(array(':cedula' => $this->cedula));

        header("Location: ../controlador/MostrarUsuarios.php");
    }


}