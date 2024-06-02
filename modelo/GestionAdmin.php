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
            $instruccion = ("SELECT * FROM usuario 
        INNER JOIN rol ON usuario.Rol_id =rol.Id" );
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $this->admin[] = $filas;
            }
    
            return $this->admin;
        }

    }

?>