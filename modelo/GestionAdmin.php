<?php
    class Admin{

        //Atributos
        private $db;
        private $admin;


        public function __construct(){
            require_once ("conexion.php");//Llama al archivo conexion
            $this->db = Conexion::conexion();// Establece la variable de conexion con la BD
            //establece la variable de admin como arreglo para almacenar los datos
            $this->admin = array();
        }


        public function MostrarAdmin(){//Metodo que se encarga de mostrar los datos
            //Instruccion a ejecutar en la BD
            //Llama los usuarios y por inner join obtiene el rol de cada uno
            $instruccion = ("SELECT * FROM usuario 
        INNER JOIN rol ON usuario.Rol_id =rol.Id WHERE Rol_id=2" );

            //prepara la instruccion
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $this->admin[] = $filas;
            }
    
            return $this->admin;//Retorna el arreglo con los datos
        }

    }

?>