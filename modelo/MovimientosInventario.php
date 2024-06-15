<?php
    class inventario{

        private $db;
        private $inventario;

        public function __construct(){
            require_once("Conexion.php");
            $this->db=Conexion::conexion();
            $this->inventario=array();
        }

        public function MostrarInventario()
        {
            $instruccion = ("SELECT * FROM Inventario 
            INNER JOIN Producto on Producto_id = Producto.idProducto");
            $resultado =$this->db->prepare($instruccion);
            $resultado->execute(array());

            while($productos = $resultado->fetch(PDO::FETCH_ASSOC)){
                $this->inventario[]=$productos;
            }
            return $this->inventario;
        }

    }

