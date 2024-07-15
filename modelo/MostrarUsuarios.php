<?php

class Usuarios{
        //Atributos
        private $db;
        private $usuarios;

        public function __construct()
        {
            require_once("Conexion.php");

            $this->db = Conexion::conexion(); //recibe los datos de la conexion
            $this->usuarios = array(); //Establece la variable como array
        }


        public function MostrarUsuarios(){//Metodo que se encarga de mostrar los datos
            //Instruccion a ejecutar en la BD
            $instruccion = ("SELECT * FROM USUARIO 
            INNER JOIN rol on usuario.Rol_id=rol.id WHERE Rol_id=3");

            $resultado = $this->db->prepare($instruccion);//prepara la instruccion

            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $this->usuarios[] = $filas;
            }
    
            return $this->usuarios;//Retorna el arreglo con los datos
        }


}