<?php
    class Productos{

        private $db;
        private $compra;
        private $venta;
        private $metodo;


        public function __construct()
        {
            require_once ("Conexion.php");
            $this->db=Conexion::conexion();
            $this->compra=array();
            $this->venta=array();
            $this->metodo=array();
        }

        public function MostrarProductoscliente(){
            $instruccion = ("SELECT *,(Precio_producto+Precio_producto*0.3) AS precio FROM Detalles_compra 
            INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
              INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria
             WHERE Status=1 ");

            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->compra[]=$filas;
            }

            return $this->compra;
        }

        public function MostrarProductosCompra(){
            $instruccion = ("SELECT * FROM Detalles_compra 
            INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
            INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria" );

            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->compra[]=$filas;
            }

            return $this->compra;
        }

        
        public function MostrarProductosVenta(){
            $instruccion = ("SELECT * FROM Detalles_factura 
            INNER JOIN Factura ON detalles_factura.Factura_id= factura.IdFactura
            INNER JOIN Producto ON detalles_factura.Producto_id= producto.IdProducto" );

            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->venta[]=$filas;
            }

            return $this->venta;
        }

        public function Metodo(){
            $instruccion = ("SELECT * FROM metodopago_factura
            INNER JOIN metodo_de_pago ON metodopago_factura.MetodoPago_id= metodo_de_pago.idMetodo" );

            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());

            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->metodo[]=$filas;
            }

            return $this->metodo;
        }
        

    }