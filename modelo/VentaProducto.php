<?php 
    class CompraProducto{
        //Atributos
        private $db;
        private $usuario;
        
        private $producto_id;
        private $cantidad_producto;
        private $precio_unitario;
        private $metodo_pago;
        
        private $monto_total;

        private $idFactura;

        public function __construct()
        {
            session_start();//Inicia la sesion
            require_once ("Conexion.php");//Llama al archivo conexion
            $this->db=Conexion::conexion(); //Establece la variable de conexion con la BD
            //Almacena todos los datos recibidos en su respectiva variable
            $this->usuario=$_SESSION['usuario'];
            $this->metodo_pago=$_POST["metodo_id"];
        }

        public function Factura(){   //Registra la compra en la factura
        //Primeramente se registra la factura porque se usa el id de la factura para registrar los detalles de la factura
        //y el metodo de pago

            //Instruccion a ejecutar en la BD
            $instruccionFactura= ("INSERT INTO factura (Usuario_cedula,Fecha) VALUES (:usuario,NOW())");
            $resultadoFactura= $this->db->prepare($instruccionFactura);//prepara la instruccion
            $resultadoFactura->execute(array(":usuario"=>$this->usuario));//Ejecuta la instruccion
            $this->idFactura = $this->db->lastInsertId();//Obtiene el id de la factura que se acaba de registrar
                                             //el cual se usa para los detalles de la factura y el metodo de pago
        }

        public function DetalleFactura(){ //Registra los Detalles de la factura
           //Recorre el carrito para asi obtener los productos
            foreach($_SESSION['carrito'] as $indice => $producto) {
                $this->producto_id=$producto['idproducto'];
                $this->cantidad_producto=$producto['cantidad'];
                $this->precio_unitario=$producto['precio'];
            

         //Instruccion a ejecutar en la BD
            $instruccionDetallesFactura= ("INSERT INTO 
            detalles_factura (Factura_id,Producto_id,Cantidad_producto,Precio_unitario) 
            VALUES (:factura,:producto,:cantidad,:precio)");
           //Prepara la instruccion
            $resultadoDetallesFactura=$this->db->prepare($instruccionDetallesFactura);
            //Ejecuta la instruccion
            $resultadoDetallesFactura->execute(
                array(":factura"=>$this->idFactura,
                    ":producto"=>$this->producto_id,
                    ":cantidad"=>$this->cantidad_producto,
                    ":precio"=>$this->precio_unitario));
        }
       
       
        }

        public function MetodoPago(){//Registra el metodo de pago que se uso
            
            //Calcula el monto total de la compra
        foreach($_SESSION['carrito'] as $indice => $producto) {
            $this->monto_total+= $producto['precio']*$producto['cantidad'];
        }//Instruccion a ejecutar en la BD
            $instruccionMetodoPago=("INSERT INTO metodopago_factura (Factura_id,MetodoPago_id,Monto_total) VALUES (:factura,:metodo,:monto)");
           //Prepara la instruccion
            $resultadoMetodoPago=$this->db->prepare($instruccionMetodoPago);
            //Ejecuta la instruccion
            $resultadoMetodoPago->execute(
                array(":factura"=>$this->idFactura,
                ":metodo"=>$this->metodo_pago,
                ":monto"=>$this->monto_total));
            
        }

        public function RegistroInventario(){//Ejecuta la actulizacion de los productos en el  inventraio
            //Instruccion a ejecutar en la BD
           
        foreach($_SESSION['carrito'] as $indice => $producto) {//Recorre el carrito para asi obtener los productos
            $this->producto_id=$producto['idproducto'];
            $this->cantidad_producto=$producto['cantidad'];
            $instriccionInventario=("
            UPDATE inventario SET Cantidad_inventario=(Cantidad_inventario-$this->cantidad_producto)
             WHERE Producto_id=$this->producto_id");
            //Prepara la instruccion   
            $resultadoInventario=$this->db->prepare($instriccionInventario);
            //Ejecuta la instruccion   
            $resultadoInventario->execute(array());
                //Redirecciona a la pagina principal de usuario
        }
        }

    }

