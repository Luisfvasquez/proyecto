<?php

    class VistaCompra{

        private $db;
        private $categoria;

        public function __construct()
        {
            require_once("Conexion.php");
            $this->db=Conexion::conexion();
            $categoria=array();
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