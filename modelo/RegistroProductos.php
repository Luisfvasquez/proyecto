<?php

    class RegistroProductos{
        private $db;
        private $nombre_producto;
        private $descripcion;
        private $categoria_id;
        private $imagen;
        private $statuss;
        private $precio;
        private $cantidad;
        private $proveedor;

    private $idProducto;    
    private $idCompra;

        private $nombreig;
        private $tipo;
        private $carpeta;
        private $tamanio;

        public function __construct(){
            require_once("Conexion.php");
            $this->db = Conexion::conexion();
            $this->proveedor = $_POST["proveedor"];
            $this->nombre_producto = $_POST["nombre_producto"];
            $this->descripcion = $_POST["descripcion"];
            $this->categoria_id = $_POST["categoria_id"];
            $this->imagen = $_FILES["imagen"]["name"]; 

            $estado = isset($_POST['status']) ? $_POST['status'] : 0;
            if($estado=="1"){
                $this->statuss = 1;
            }else{
                $this->statuss = 0;
            }
            $this->precio = $_POST["precio"];
            $this->cantidad = $_POST["cantidad"];
               
            //Recibir datos de imagen
                $this->nombreig = $_FILES["imagen"]["name"];
                $this->tipo = $_FILES["imagen"]["type"];
                $this->tamanio = $_FILES["imagen"]["size"];
            }


        public function RegistrarProductos(){
             
                //Registra el producto
            $instruccionProducto = ("INSERT INTO PRODUCTO (Categoria_id,Nombre_producto,Descripcion,Imagen,Status) VALUES (:categoria_id,:nombre_producto,:descripcion,:imagen,:status)");
            $resultadoProducto = $this->db->prepare($instruccionProducto);
            if(($this->tipo=="image/jpeg")||($this->tipo=="image/png")||($this->tipo=="image/jpg")||($this->tipo=="image/gif")){
                //ruta de la carpeta destino en servidor
                $this->carpeta=$_SERVER["DOCUMENT_ROOT"]. "/proyecto-v1/imgs/";

                if (!is_dir($this->carpeta)) {
                    // Creamos la carpeta si no existe
                    mkdir($this->carpeta, 0777, true); // Permisos 777 para creación de carpetas anidadas
                  }
            
                //movemos la imagen del direccotio temporal al directorio escogido
                move_uploaded_file($_FILES["imagen"]["tmp_name"],$this->carpeta.$this->nombreig);
            
                }else{
                    echo "El tipo de archivo no es el correcto". $this->tipo ;  
                }
            $resultadoProducto->execute(array(":categoria_id"=>$this->categoria_id,":nombre_producto"=>$this->nombre_producto,":descripcion"=>$this->descripcion,":imagen"=>$this->imagen,":status"=>$this->statuss));
            $this->idProducto = $this->db->lastInsertId();
        }   

        public function Compra(){
            
            //registra la compra
            $instruccionCompra = ("INSERT INTO COMPRA (Proveedor_rif,fecha) VALUES (:proveedor,now())");
            $resultadoCompra = $this->db->prepare($instruccionCompra);
            
            $resultadoCompra->execute(array(":proveedor"=>$this->proveedor));
            $this->idCompra = $this->db->lastInsertId();
        }

        public function DetalleCompra(){
            
       //Consulta el id de la tabla productos para luego ser almacenado en los detalles de la compra
      
  
       $instruccionDetalle = ("INSERT INTO DETALLES_COMPRA (Compra_id,Producto_id,Cantidad_compra,Precio_producto) VALUES (:compra_id,:producto_id,:cantidad_compra,:precio_producto)");
       $resultado2 = $this->db->prepare($instruccionDetalle);

       $resultado2->execute(array(":compra_id"=>$this->idCompra,":producto_id"=>$this->idProducto,":cantidad_compra"=>$this->cantidad,":precio_producto"=>$this->precio));
           

     
       
        }

        public function InventarioRegistro(){


            $instruccionInventario = ("INSERT INTO INVENTARIO (Producto_id,Cantidad_inventario) VALUES (:producto_id,:cantidad)");
            $resultadoInventario = $this->db->prepare($instruccionInventario);
            $resultadoInventario->execute(array(":producto_id"=>$this->idProducto,":cantidad"=>$this->cantidad));
            header("location:../controlador/VistaCompra.php");

        }
            
    }