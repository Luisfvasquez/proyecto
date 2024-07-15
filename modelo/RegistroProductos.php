<?php

    class RegistroProductos{
        //Atributos
        private $db;
        private $nombre_producto;
        private $descripcion;
        private $categoria_id;
        private $imagen;
        private $statuss;
        private $precio;
        private $cantidad;
        private $proveedor;

        private $nombreig;
        private $tipo;
        private $carpeta;
        private $tamanio;

        public function __construct(){
            require_once("Conexion.php");//Llama al archivo conexion
            $this->db = Conexion::conexion();//Establece la variable de conexion con la BD
            //Almacena todos los datos recibidos en su respectiva variable
            $this->proveedor = $_POST["proveedor"];
            $this->nombre_producto = $_POST["nombre_producto"];
            $this->descripcion = $_POST["descripcion"];
            $this->categoria_id = $_POST["categoria_id"];
            $this->imagen = $_FILES["imagen"]["name"]; 
            $this->precio = $_POST["precio"];
            $this->cantidad = $_POST["cantidad"];
               
            //Verifica el valor del estatus para almacenarlo
            $estado = isset($_POST['status']) ? $_POST['status'] : 0;
            if($estado=="1"){
                $this->statuss = 1;
            }else{
                $this->statuss = 0;
            }
          
            //Recibir datos de imagen
                $this->nombreig = $_FILES["imagen"]["name"];
                $this->tipo = $_FILES["imagen"]["type"];
                $this->tamanio = $_FILES["imagen"]["size"];
            }


        public function RegistrarProductos(){//Metodo que se encarga de registrar los datosd el producto
             
                //Registra el producto
            $instruccionProducto = ("INSERT INTO PRODUCTO (Categoria_id,Nombre_producto,Descripcion,Imagen,Status) VALUES (:categoria_id,:nombre_producto,:descripcion,:imagen,:status)");
            $resultadoProducto = $this->db->prepare($instruccionProducto);
            if(($this->tipo=="image/jpeg")||($this->tipo=="image/png")||($this->tipo=="image/jpg")||($this->tipo=="image/gif")){
                //ruta de la carpeta destino en servidor
                $this->carpeta=$_SERVER["DOCUMENT_ROOT"]. "/intranet/uploads/";

                if (!is_dir($this->carpeta)) {
                    // Creamos la carpeta si no existe
                    mkdir($this->carpeta, 0777, true); // Permisos 777 para creación de carpetas anidadas
                  }
            
                //movemos la imagen del direccotio temporal al directorio escogido
                move_uploaded_file($_FILES["imagen"]["tmp_name"],$this->carpeta.$this->nombreig);
            
                }else{
                    echo "El tipo de archivo no es el correcto". $this->tipo ;  
                }

                //Ejecuta la instruccion
            $resultadoProducto->execute(array(":categoria_id"=>$this->categoria_id,":nombre_producto"=>$this->nombre_producto,":descripcion"=>$this->descripcion,":imagen"=>$this->imagen,":status"=>$this->statuss));

        }   

        public function Compra(){//Registra la compra
            
            //registra la compra
            $instruccionCompra = ("INSERT INTO COMPRA (Proveedor_rif,fecha) VALUES (:proveedor,now())");
            $resultadoCompra = $this->db->prepare($instruccionCompra);
            
            $resultadoCompra->execute(array(":proveedor"=>$this->proveedor));

        }

        public function DetalleCompra(){//Registra los detalles de la compra
            
       //Consulta el id de la tabla productos para luego ser almacenado en los detalles de la compra
       $consulta = ("SELECT * FROM PRODUCTO WHERE Nombre_producto = :nombre_producto");
       $resultado = $this->db->prepare($consulta);
       $resultado->execute(array(":nombre_producto"=>$this->nombre_producto));
       $idProducto=$resultado->fetchColumn();
  
       $instruccionDetalle = ("INSERT INTO DETALLES_COMPRA (Compra_id,Producto_id,Cantidad_compra,Precio_producto) VALUES (:compra_id,:producto_id,:cantidad_compra,:precio_producto)");
       $resultado2 = $this->db->prepare($instruccionDetalle);

       $resultado2->execute(array(":compra_id"=>$idProducto,":producto_id"=>$idProducto,":cantidad_compra"=>$this->cantidad,":precio_producto"=>$this->precio));
           

     
       
        }

        public function InventarioRegistro(){//Registra el inventario

            //Consulta el id de la tabla productos para luego ser almacenado en el inventario
            $consulta = ("SELECT * FROM PRODUCTO WHERE Nombre_producto = :nombre_producto");
            $resultado = $this->db->prepare($consulta);
            $resultado->execute(array(":nombre_producto"=>$this->nombre_producto));
            $idProducto=$resultado->fetchColumn();

            $instruccionInventario = ("INSERT INTO INVENTARIO (Producto_id,Cantidad_inventario) VALUES (:producto_id,:cantidad)");
            $resultadoInventario = $this->db->prepare($instruccionInventario);
            $resultadoInventario->execute(array(":producto_id"=>$idProducto,":cantidad"=>$this->cantidad));
            
            //Redirecciona a la vista de compra
            header("location:../controlador/VistaCompra.php");

        }
            
    }