<?php

    class Metodo{
        private $db;
        private $metodo;

        public function __construct(){
            require_once("Conexion.php");
            $this->db=Conexion::conexion();
            $this->metodo=array();
        }


        public function Metodos(){

            $instruccion=("SELECT * FROM metodo_de_pago");
            $resultatado=$this->db->prepare($instruccion);
            $resultatado->execute(array());
            while($row=$resultatado->fetch(PDO::FETCH_ASSOC)){
                $this->metodo[]=$row;
            }

            return $this->metodo;
        }

        public function Borrar($id){//Metodo que se encarga de borrar los datos
            //Instruccion a ejecutar en la BD
            $instruccion = ("DELETE FROM metodo_de_pago WHERE idMetodo = :id");
            $resultado = $this->db->prepare($instruccion);//prepara la instruccion
    
            $resultado->execute(array(':id' =>$id ));//Ejecuta la instruccion
    
            //Redirecciona a la pagina de gestion de administradores
            header("Location: ../controlador/GestionMetodo.php");
        }


        public function AgregarMetodo($nombre){
            $instruccion=("INSERT INTO metodo_de_pago (Metodo) VALUES (:nombre)");
            $resultado=$this->db->prepare($instruccion);
            $resultado->execute(array(':nombre'=>$nombre));
            
            header("Location: ../controlador/GestionMetodo.php");
        }

    }