<?php

    class Categorias{
        private $db;
        private $categorias;

        public function __construct(){
            require_once("Conexion.php");
            $this->db=Conexion::conexion();
            $this->categorias=array();
        }


        public function Categorias(){

            $instruccion=("SELECT * FROM categoria");
            $resultatado=$this->db->prepare($instruccion);
            $resultatado->execute(array());
            while($row=$resultatado->fetch(PDO::FETCH_ASSOC)){
                $this->categorias[]=$row;
            }

            return $this->categorias;
        }

        public function Borrar($id){//Metodo que se encarga de borrar los datos
            //Instruccion a ejecutar en la BD
            $instruccion = ("DELETE FROM categoria WHERE idCategoria = :id");
            $resultado = $this->db->prepare($instruccion);//prepara la instruccion
    
            $resultado->execute(array(':id' =>$id ));//Ejecuta la instruccion
    
            //Redirecciona a la pagina de gestion de administradores
            header("Location: ../controlador/GestionCategorias.php");
        }


        public function AgregarCategoria($nombre){
            $instruccion=("INSERT INTO categoria (Nombre_categoria) VALUES (:nombre)");
            $resultado=$this->db->prepare($instruccion);
            $resultado->execute(array(':nombre'=>$nombre));
            
            header("Location: ../controlador/GestionCategorias.php");
        }

    }