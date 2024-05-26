<?php


class RegistroUsuarios{
    private $db;
    private $cedula;
    private $nombre;
    private $correo;
    private $contrasena;
    private $telefono;
    private $imagen;
    private $rol;
    private $tamanio;
    private $tipo;
    private $nombreig;
    private $carpeta;


    public function __construct()
    {
        require_once("Conexion.php");
        $this->db=Conexion::conexion();
        $this->cedula=$_POST['cedula'];
        $this->nombre=$_POST['nombre'];
        $this->correo=$_POST['correo'];
        $this->telefono=$_POST['telefono'];
        $this->contrasena=$_POST['contrasena'];
        $this->imagen = $_FILES["imagen"]["name"]; 
        $this->rol=3; 
       
        //Recibir datos de imagen
                $this->nombreig = $_FILES["imagen"]["name"];
                $this->tipo = $_FILES["imagen"]["type"];
                $this->tamanio = $_FILES["imagen"]["size"];
    }


    public function RegistrarUsuarios(){
        

        $instruccion = "INSERT INTO usuarios (Cedula_usuario,Contrasenia_Usuario,Nombre_Usuario,Telefono_Usuario,Correo_Usuario,Rol_id,Foto_Usuario) VALUES (:cedula,:contrasenia,:nombre,:telefono,:correo,:rol,:foto)";

        $resultado =$this->db->prepare($instruccion);

       
        if(($this->tipo=="image/jpeg")||($this->tipo=="image/png")||($this->tipo=="image/jpg")||($this->tipo=="image/gif")){
            //ruta de la carpeta destino en servidor
            $this->carpeta=$_SERVER["DOCUMENT_ROOT"]. "/intranet/uploads/";
        
            //movemos la imagen del direccotio temporal al directorio escogido
            move_uploaded_file($_FILES["imagen"]["tmp_name"],$this->carpeta.$this->nombreig);
        
            }else{
                echo "El tipo de archivo no es el correcto". $this->tipo ;  
            }
                     
        
            $resultado->execute(array(":cedula" => $this->cedula, ":contrasenia" => $this->contrasena, ":nombre" => $this->nombre, ":telefono" => $this->telefono,":correo" => $this->correo,":rol"=> $this->rol,":foto"=>$this->imagen));

       

        header("location:../index.php");
       
        
    }


}