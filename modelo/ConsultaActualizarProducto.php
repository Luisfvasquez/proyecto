<?php

    class ConsultaProducto{

        private $id;   
        private $db;
        private $categoria;
        public function __construct()
        {
            require_once("Conexion.php");
            $this->db=Conexion::conexion();
            $this->id=$_GET['id'];
            $categoria=array();
        }

        public function ConsultaProducto(){

            $instruccion=("SELECT * FROM producto WHERE IdProducto=:id");
            $resultado=$this->db->prepare($instruccion);
            $resultado->execute(array(":id"=>$this->id));
            return $resultado->fetch(PDO::FETCH_ASSOC);
        }
        
        public function Categorias(){
            $instruccion = ("SELECT * FROM CATEGORIA");
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){

                $this->categoria[]=$filas;

            }
            return $this->categoria;
        }


    }