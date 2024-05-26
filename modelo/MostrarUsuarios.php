<?php

class Usuarios{

        private $db;
        private $usuarios;

        public function __construct()
        {
            require_once("Conexion.php");

            $this->db = Conexion::conexion(); //recibe los datos de la conexion
            $this->usuarios = array(); //Establece la variable como array
        }


        public function MostrarUsuarios(){
            $instruccion = ("SELECT * FROM USUARIOS");

            $resultado = $this->db->prepare($instruccion);

            $resultado->execute(array());

            while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $this->usuarios[] = $filas;
            }
    
            return $this->usuarios;
        }


}