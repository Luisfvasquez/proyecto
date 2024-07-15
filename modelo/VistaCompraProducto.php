<?php

    class VistaCompra{
        //Atributos
        private $db;    
        private $metodos;


        public function __construct()
        {
            require_once ("Conexion.php");//Llama al archivo conexion
            $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
            $this->metodos=array();//Inicializa la variable como array

        }

        public function MetodoPago(){//Metodo que se encarga de consultar los metodos de pago
            //Instruccion a ejecutar en la BD
            $instruccionMetodoPago= ("SELECT * FROM metodo_de_pago");
            $resultado=$this->db->prepare($instruccionMetodoPago);//prepara la instruccion
            $resultado->execute(array());// Ejecuta la instruccion
            
            //Retorna el resultado de la instruccion en forma de arreglo 
            while($datos=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->metodos[]=$datos;
            }
            return $this->metodos;//Retorna el arreglo con los metodos de pago

        }



    }