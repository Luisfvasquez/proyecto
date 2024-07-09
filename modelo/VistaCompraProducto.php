<?php

    class VistaCompra{
        private $db;    
        private $metodos;


        public function __construct()
        {
            require_once ("Conexion.php");
            $this->db=Conexion::conexion();
            $this->metodos=array();

        }

        public function MetodoPago(){
            $instruccionMetodoPago= ("SELECT * FROM metodo_de_pago");
            $resultado=$this->db->prepare($instruccionMetodoPago);
            $resultado->execute(array());
            
            while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->metodos[]=$datos;
            }
            return $this->metodos;

        }



    }