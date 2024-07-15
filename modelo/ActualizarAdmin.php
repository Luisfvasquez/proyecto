<?php


class ActualizarAdmin{
    //Atributos
    private $db;
    private $cedula;
    private $nombre;
    private $correo;
    
    private $telefono;
    private $imagen;
    private $rol;
    private $tamanio;
    private $tipo;
    private $nombreig;
    private $carpeta;


    public function __construct()
    {
        require_once("Conexion.php");//Llama al archivo conexion
        $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
        //Almacena todos los datos recibidos en su respectiva variable
        $this->cedula=$_POST['Cedula'];
        $this->nombre=$_POST['Nombre'];
        $this->correo=$_POST['Correo'];
        $this->telefono=$_POST['Telefono'];
        $this->imagen = $_FILES["imagen"]["name"]; 
       
        //Recibir datos de imagen
                $this->nombreig = $_FILES["imagen"]["name"];
                $this->tipo = $_FILES["imagen"]["type"];
                $this->tamanio = $_FILES["imagen"]["size"];
    }


    public function ActualizarAdmin(){//Metodo que se encarga de actualizar los datos
        
        //Instruccion a ejecutar en la BD
        $instruccion = "UPDATE usuario SET Nombre_usuario=:nombre,Telefono=:telefono,Correo=:correo,imagen=:imgen WHERE Cedula=$this->cedula";

        $resultado =$this->db->prepare($instruccion);//prepara la instruccion

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
              
            //Ejecuta el resultado de la instruccion
        $resultado->execute(array(":nombre" => $this->nombre, ":telefono" => $this->telefono,":correo" => $this->correo,":imgen"=>$this->imagen));

       
            //Redirecciona a la vista de gestion de administrador
        header("location:../controlador/GestionAdmin.php");
       
        
    }


}