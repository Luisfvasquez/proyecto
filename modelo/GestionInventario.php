<?php
    class Productos{

        private $db;
        private $productos;


        public function __construct()
        {
            require_once ("Conexion.php");
            $this->db=Conexion::conexion();
            $this->productos=array();
        }

        public function MostrarProductos(){
            $instruccion = ("SELECT * FROM Detalles_compra 
            INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
              INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria
            WHERE Status=1" );

            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->productos[]=$filas;
            }

            return $this->productos;
        }
        public function MostrarProductosadmin(){
            $instruccion = ("SELECT * FROM Detalles_compra 
            INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
              INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria" );

            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->productos[]=$filas;
            }

            return $this->productos;
        }
        

    }