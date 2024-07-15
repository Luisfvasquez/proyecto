<?php

class ConsultaAdminActualizar
{
    //Atributos
    private $db;
    private $cedula;
    private $usuario;


    public function __construct()
    {
        require_once("../modelo/Conexion.php");//Llama al archivo conexion
        $this->db = Conexion::conexion();//Establece la variable de conexion con la BD
        //Almacena todos los datos recibidos en su respectiva variable
        $this->cedula = $_GET['cedula'];
    }

    public function actus()//Metodo que se encarga de actualizar los datos
    {
        //Instruccion a ejecutar en la BD
        //obtiene los datos del usuario que se desea actualizar solamente
        $instrunccion = "SELECT * FROM usuario WHERE Cedula=:cedula";
        //prepara la instruccion
        $resultado = $this->db->prepare($instrunccion);
        //Ejecuta la instruccion
        $resultado->execute(array(":cedula" => $this->cedula));
        //Retorna el resultado de la instruccion en forma de arreglo para su posterior actualizacion
        return $resultado->fetch(PDO::FETCH_ASSOC);
    }
}
