<?php

    class ActualizarProducto{
        private $db;
        private $nombre_producto;
        private $descripcion;
        private $categoria_id;
        private $statuss;
        private $imagen;
       private $id;

        private $nombreig;
        private $tipo;
        private $carpeta;
        private $tamanio;

        public function __construct(){
            require_once("Conexion.php");
            $this->db = Conexion::conexion();
            $this->id=$_POST['id'];
            $this->nombre_producto = $_POST["nombre_producto"];
            $this->descripcion = $_POST["descripcion"];
            $this->categoria_id = $_POST["categoria_id"];
         

            $estado =$_POST['status'];
            if($estado=="1"){
                $this->statuss = 1;
            }else{
                $this->statuss = 0;
            }

            $this->imagen = $_FILES["imagen"]["name"]; 
          
               
            //Recibir datos de imagen
                $this->nombreig = $_FILES["imagen"]["name"];
                $this->tipo = $_FILES["imagen"]["type"];
                $this->tamanio = $_FILES["imagen"]["size"];
            }

            public function ActualizarProducto(){
              
             
                    //Registra el producto
                $instruccionProducto = ("UPDATE PRODUCTO SET Categoria_id=:categoria_id,Nombre_producto=:nombre_producto,Descripcion=:descripcion,Imagen=:imagen,Status=:statuss WHERE IdProducto=$this->id");
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
                $resultadoProducto->execute(array(":categoria_id"=>$this->categoria_id,":nombre_producto"=>$this->nombre_producto,":descripcion"=>$this->descripcion,":imagen"=>$this->imagen,":statuss"=>$this->statuss));
    
                header("location:../controlador/GestionInventario.php");
            }




    }