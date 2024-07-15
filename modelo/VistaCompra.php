<?php

    class VistaCompra{
        //Atributos
        private $db;
        private $categoria;

        public function __construct()
        {
            require_once("Conexion.php");//Llama al archivo conexion
            $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
            $this->categoria=array();//Inicializa la variable como array
        }

        public function Categorias(){//Metodo que se encarga de consultar las categorias
            //Instruccion a ejecutar en la BD
            $instruccion = ("SELECT * FROM CATEGORIA");
            $resultado = $this->db->prepare($instruccion);//prepara la instruccion
            $resultado->execute(array());//Ejecuta la instruccion

            //Retorna el resultado de la instruccion en forma de arreglo 
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){

                $this->categoria[]=$filas;

            }
            return $this->categoria;//Retorna el arreglo con las categorias
        }

    }