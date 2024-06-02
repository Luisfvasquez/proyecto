<?php

class ConsultaUsuarioActualizar
{

    private $db;
    private $cedula;
    private $usuario;


    public function __construct()
    {
        require_once("../modelo/Conexion.php");
        $this->db = Conexion::conexion();
        $this->cedula = $_GET['cedula'];
    }

    public function actus()
    {

        $instrunccion = "SELECT * FROM Usuario WHERE Cedula=:cedula";

        $resultado = Conexion::conexion()->prepare($instrunccion);

        $resultado->execute(array(":cedula" => $this->cedula));

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
