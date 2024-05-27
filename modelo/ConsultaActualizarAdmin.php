<?php

class ConsultaAdminActualizar
{

    private $db;
    private $cedula;
    private $usuario;


    public function __construct()
    {
        require_once("../modelo/Conexion.php");
        $this->db = Conexion::conexion();
        $this->cedula = $_GET['cedula_admin'];
    }

    public function actus()
    {

        $instrunccion = "SELECT * FROM administrador WHERE Cedula_Admin=:cedula";

        $resultado = Conexion::conexion()->prepare($instrunccion);

        $resultado->execute(array(":cedula" => $this->cedula));

        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
