<?php
    class inventario{
        //Atributos
        private $db;
        private $inventario;

        public function __construct(){
            require_once("Conexion.php");//Llama al archivo conexion
            $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
            $this->inventario=array();//Inicializa la variable como array
        }

        public function MostrarInventario()
        {
            //Instruccion a ejecutar en la BD
            $instruccion = ("SELECT * FROM Inventario 
            INNER JOIN Producto on Producto_id = Producto.idProducto");
            $resultado =$this->db->prepare($instruccion);//prepara la instruccion
            $resultado->execute(array());//Ejecuta la instruccion


            //Almacena los datos en un arreglo
            while($productos = $resultado->fetch(PDO::FETCH_ASSOC)){
                $this->inventario[]=$productos;
            }
            return $this->inventario;//Retorna el arreglo con los datos
        }

    }

