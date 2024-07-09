<?php 
    class CompraProducto{
        private $db;
        private $usuario;
        
        private $producto_id;
        private $cantidad_producto;
        private $precio_unitario;
        private $metodo_pago;
        
        private $monto_total;

        public function __construct()
        {
            require_once ("Conexion.php");
            $this->db=Conexion::conexion();
            $this->usuario=$_POST["cedula"];
            $this->producto_id=$_POST["producto_id"];
            $this->cantidad_producto=$_POST["cantidad"];
            $this->precio_unitario=$_POST["precio_unitario"];
            $this->metodo_pago=$_POST["metodo_id"];
            $this->monto_total=$_POST["cantidad"]*$_POST["precio_unitario"];

        }

        public function Factura(){
            $instruccionFactura= ("INSERT INTO factura (Usuario_cedula,Fecha) VALUES (:usuario,NOW())");
            $resultadoFactura= $this->db->prepare($instruccionFactura);
            $resultadoFactura->execute(array(":usuario"=>$this->usuario));
        }

        public function DetalleFactura(){
            $consultaIdFactura=("SELECT * from factura WHERE Usuario_cedula=:usuario");
            $resultadoConsulta=$this->db->prepare($consultaIdFactura);
            $resultadoConsulta->execute(array(":usuario"=>$this->usuario));
            $idFactura=$resultadoConsulta->fetchColumn();

            $instruccionDetallesFactura= ("INSERT INTO detalles_factura (Factura_id,Producto_id,Cantidad_producto,Precio_unitario) VALUES (:factura,:producto,:cantidad,:precio)");
            $resultadoDetallesFactura=$this->db->prepare($instruccionDetallesFactura);
            $resultadoDetallesFactura->execute(array(":factura"=>$idFactura,":producto"=>$this->producto_id,":cantidad"=>$this->cantidad_producto,":precio"=>$this->precio_unitario));
        }

        public function MetodoPago(){
            $consultaIdFactura=("SELECT * from factura WHERE Usuario_cedula=:usuario");;
            $resultadoConsulta=$this->db->prepare($consultaIdFactura);
            $resultadoConsulta->execute(array(":usuario"=>$this->usuario));
            $idFactura=$resultadoConsulta->fetchColumn();

            $instruccionMetodoPago=("INSERT INTO metodopago_factura (Factura_id,MetodoPago_id,Monto_total) VALUES (:factura,:metodo,:monto)");
            $resultadoMetodoPago=$this->db->prepare($instruccionMetodoPago);
            $resultadoMetodoPago->execute(array(":factura"=>$idFactura,":metodo"=>$this->metodo_pago,":monto"=>$this->monto_total));
        
        }

        public function RegistroInventario(){
                $instriccionInventario=("UPDATE inventario SET Cantidad_inventario=(Cantidad_inventario-$this->cantidad_producto) WHERE Producto_id=$this->producto_id");
                $resultadoInventario=$this->db->prepare($instriccionInventario);
                $resultadoInventario->execute(array());

                header("Location: ../controlador/VistaUsuario.php");
        }

    }

