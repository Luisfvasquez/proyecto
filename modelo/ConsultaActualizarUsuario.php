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
        $this->cedula = $_GET['cedula_usuario'];
    }

    public function actus()
    {

        $instrunccion = "SELECT * FROM Usuarios WHERE Cedula_usuario=:cedula";

        $resultado = Conexion::conexion()->prepare($instrunccion);

        $resultado->execute(array(":cedula" => $this->cedula));

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
