<?php
    class Admin{


        private $db;
        private $admin;


        public function __construct(){
            require_once ("conexion.php");
            $this->db = Conexion::conexion();
            $this->admin = array();
        }


        public function MostrarAdmin(){
            $instruccion = ("SELECT * FROM administrador 
        INNER JOIN rol ON administrador.Rol_id =rol.Id" );
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $this->admin[] = $filas;
            }
    
            return $this->admin;
        }

    }

?>