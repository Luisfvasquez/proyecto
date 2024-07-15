<?php

class BorrarAmind{
    //Atributos
    private $db;
    private $cedula;

    public function __construct()
    {
        require_once("Conexion.php");//Llama al archivo conexion
        $this->db = Conexion::conexion();//Establece la variable de conexion con la BD
        //Almacena todos los datos recibidos en su respectiva variable
        $this->cedula = $_GET['cedula'];
    }


    public function Borrar(){//Metodo que se encarga de borrar los datos
        //Instruccion a ejecutar en la BD
        $instruccion = ("DELETE FROM usuario WHERE Cedula = :cedula");
        $resultado = $this->db->prepare($instruccion);//prepara la instruccion

        $resultado->execute(array(':cedula' => $this->cedula));//Ejecuta la instruccion

        //Redirecciona a la pagina de gestion de administradores
        header("Location: ../controlador/GestionAdmin.php");
    }


}