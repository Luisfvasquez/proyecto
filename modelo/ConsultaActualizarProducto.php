<?php

    class ConsultaProducto{
        //Atributos
        private $id;   
        private $db;
        private $categoria;
        public function __construct()
        {
            require_once("Conexion.php");//Llama al archivo conexion
            $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
            //Almacena todos los datos recibidos en su respectiva variable
            $this->id=$_GET['id'];
            $categoria=array();//Arreglo que almacena las categorias
        }

        public function ConsultaProducto(){//Metodo que se encarga de consultar los datos del producto
            //Instruccion a ejecutar en la BD
            //Obtiene los datos del producto que se desea actualizar solamente
            $instruccion=("SELECT * FROM producto WHERE IdProducto=:id");
            //prepara la instruccion
            $resultado=$this->db->prepare($instruccion);
            //Ejecuta la instruccion
            $resultado->execute(array(":id"=>$this->id));
            //Retorna el resultado de la instruccion en forma de arreglo para su posterior actualizacion
            return $resultado->fetch(PDO::FETCH_ASSOC);
        }
        
        public function Categorias(){//Metodo que se encarga de consultar las categorias
            //Instruccion a ejecutar en la BD
            $instruccion = ("SELECT * FROM CATEGORIA");
            //prepara la instruccion
            $resultado = $this->db->prepare($instruccion);
            //Ejecuta la instruccion
            $resultado->execute(array());

            //Retorna el resultado de la instruccion en forma de arreglo para su posterior actualizacion
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){

                $this->categoria[]=$filas;

            }
            return $this->categoria;//Retorna el arreglo con las categorias
        }


    }