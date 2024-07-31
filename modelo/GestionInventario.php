<?php
    class Productos{
        //  Atributos
        private $db;
        private $compra;
        private $venta;
        private $metodo;
        private $inventario;

        public function __construct()
        {
            require_once ("Conexion.php");//Llama al archivo conexion
            $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
            //establece los atributos como arratglo para almacenar los datos
            $this->compra=array();
            $this->venta=array();
            $this->metodo=array();
        }

        public function MostrarProductoscliente(){//Metodo que se encarga de mostrar los productos disponibles para la venta
            //Instruccion a ejecutar en la BD
            //Llama los detales de compra y por inner join obtiene todos los datos
            //Y calcula el precio de venta directamente
            //Se obtiene solamante los productos que estan en stock a partir del status

            $instruccion = ("SELECT *,(Precio_producto+Precio_producto*0.3) AS precio FROM Detalles_compra 
            INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
              INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria
             WHERE Status=1 ");

            //prepara la instruccion
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->compra[]=$filas;
            }

            return $this->compra;//Retorna el arreglo con los datos
        }

        public function MostrarProductosCompra(){//Metodo que se encarga de mostrar productos comprados
          //Instruccion a ejecutar en la BD
            //Llama los detales de compra y por inner join obtiene todos los datos
          $instruccion = ("SELECT * FROM Detalles_compra 
            INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
            INNER JOIN Proveedor ON Compra.Proveedor_rif= Proveedor.Rif
            INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
            INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria" );

            //prepara la instruccion
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->compra[]=$filas;
            }

            return $this->compra;//Retorna el arreglo con los datos
        }

        
        public function MostrarProductosVenta(){//Metodo que se encarga de mostrar productos vendidos
            //Instruccion a ejecutar en la BD
            //Llama los detales de venta y por inner join obtiene todos los datos
            $instruccion = ("SELECT * FROM Detalles_factura 
            INNER JOIN Factura ON detalles_factura.Factura_id= factura.IdFactura
            INNER JOIN Producto ON detalles_factura.Producto_id= producto.IdProducto" );

            $resultado = $this->db->prepare($instruccion);//prepara la instruccion
            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->venta[]=$filas;
            }

            return $this->venta;//Retorna el arreglo con los datos
        }

        public function Metodo(){//Metodo que se encarga de mostrar los metodos de pago
            //Instruccion a ejecutar en la BD
            //Llama los metodos de pago y por inner join obtiene todos los datos
            $instruccion = ("SELECT * FROM metodopago_factura
            INNER JOIN metodo_de_pago ON metodopago_factura.MetodoPago_id= metodo_de_pago.idMetodo" );
            //  prepara la instruccion
            $resultado = $this->db->prepare($instruccion);
            $resultado->execute(array());//Ejecuta la instruccion

            //Almacena los datos en un arreglo
            while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                $this->metodo[]=$filas;
            }

            return $this->metodo;//Retorna el arreglo con los datos
        }
        
        public function InventarioStock(){
            $instruccion = ("SELECT * FROM inventario
            INNER JOIN Producto ON inventario.Producto_id= producto.IdProducto
              INNER JOIN categoria ON producto.Categoria_id=categoria.idCategoria");

            $resultado=$this->db->prepare($instruccion);
            $resultado->execute(array());
            
                //Almacena los datos en un arreglo
                while($filas=$resultado->fetch(PDO::FETCH_ASSOC)){
                    $this->inventario[]=$filas;
                }
    
                return $this->inventario;//Retorna el arreglo con los datos
            

        }

    }