<?php 
    class Historial{
        private $db;
        private $usuario;
        private $compras;


        public function __construct()
        {
            require_once('Conexion.php');
            $this->db=Conexion::conexion();
            $this->compras=array();
            
            session_start();
            $this->usuario=$_SESSION['usuario'];
        }

        public function HistorialCompra(){//Metodo que se encarga de mostrar productos vendidos
            //Instruccion a ejecutar en la BD
            //Llama los detales de venta y por inner join obtiene todos los datos
            $instruccion = ("SELECT * FROM Detalles_factura 
            INNER JOIN Factura ON detalles_factura.Factura_id= factura.IdFactura
            INNER JOIN Producto ON detalles_factura.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON producto.Categoria_id= categoria.IdCategoria 
            WHERE Factura.Usuario_cedula=$this->usuario" );

            $resultado = $this->db->prepare($instruccion);//prepara la instruccion
            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->compras[]=$filas;
            }

            return $this->compras;//Retorna el arreglo con los datos
        }
    }