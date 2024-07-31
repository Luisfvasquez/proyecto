<?php

    class NuevaCompraRegistro{//Clase para registrar una nueva compra
        //Atributos
        private $db;
   
        private $precio;
        private $cantidad;
        private $proveedor;

        private $idCompra;
        private $idProducto;

        

        public function __construct(){
            require_once("Conexion.php");//Llama al archivo conexion
            $this->db = Conexion::conexion();//Establece la variable de conexion con la BD
            //Almacena todos los datos recibidos en su respectiva variable
            $this->proveedor = $_POST["proveedor"];
            $this->idProducto= $_POST["id"];
           
            $this->precio = $_POST["precio"];
            $this->cantidad = $_POST["cantidad"];
               
            }



        public function Compra(){//Registra la compra
            
            //registra la compra
            $instruccionCompra = ("INSERT INTO COMPRA (Proveedor_rif,fecha) VALUES (:proveedor,now())");
            $resultadoCompra = $this->db->prepare($instruccionCompra);
            
            $resultadoCompra->execute(array(":proveedor"=>$this->proveedor));
            $this->idCompra = $this->db->lastInsertId();
        }

        public function DetalleCompra(){//Registra los detalles de la compra
            
      
       $instruccionDetalle = ("INSERT INTO DETALLES_COMPRA (Compra_id,Producto_id,Cantidad_compra,Precio_producto) VALUES (:compra_id,:producto_id,:cantidad_compra,:precio_producto)");
       $resultado2 = $this->db->prepare($instruccionDetalle);

       $resultado2->execute(array(":compra_id"=>$this->idCompra,":producto_id"=>$this->idProducto,":cantidad_compra"=>$this->cantidad,":precio_producto"=>$this->precio));       
       
        }

        public function InventarioRegistro(){//Registra el inventario

            //Consulta la cantidad en el inventario para luego sumarlo con el anterior
            $consulta = ("SELECT Cantidad_inventario FROM inventario WHERE Producto_id = :id");
            $resultado = $this->db->prepare($consulta);
            $resultado->execute(array(":id"=>$this->idProducto));
            $NuevaCantidad=$resultado->fetchColumn()+$this->cantidad;

            $instruccionInventario = ("UPDATE inventario SET Cantidad_inventario = :cantidad WHERE Producto_id = :producto_id");
            $resultadoInventario = $this->db->prepare($instruccionInventario);
            $resultadoInventario->execute(array(":producto_id"=>$this->idProducto,":cantidad"=>$NuevaCantidad));
            
            //Redirecciona a la vista de compra
            header("location:../controlador/VistaCompra.php");

        }
            
    }