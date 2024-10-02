<?php


class RegistroUsuarios{
    //Atributos
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
    private $cifrado;

    public function __construct()
    {
        require_once("Conexion.php");//Llama al archivo conexion
        $this->db=Conexion::conexion();//Establece la variable de conexion con la BD
        //Almacena todos los datos recibidos en su respectiva variable
        $this->cedula=$_POST['cedula'];
        $this->nombre=$_POST['nombre'];
        $this->correo=$_POST['correo'];
        $this->telefono=$_POST['telefono'];
        $this->contrasena=($_POST['contrasena']);
        $this->cifrado=password_hash($this->contrasena, PASSWORD_DEFAULT);//Cifra la contraseña
        $this->imagen = $_FILES["imagen"]["name"]; 
        $this->rol=3; //Establecee el rol de usuario por defecto
       
        //Recibir datos de imagen
                $this->nombreig = $_FILES["imagen"]["name"];
                $this->tipo = $_FILES["imagen"]["type"];
                $this->tamanio = $_FILES["imagen"]["size"];
    }


    public function RegistrarUsuarios(){//Metodo que se encarga de registrar los datos
        
        //Instruccion a ejecutar en la BD
        $instruccion = "INSERT INTO usuario (Cedula,Contrasenia,Nombre_usuario,Telefono,Correo,Rol_id,imagen) VALUES (:cedula,:contrasenia,:nombre,:telefono,:correo,:rol,:foto)";

        $resultado =$this->db->prepare($instruccion);//prepara la instruccion

       
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
                     
            //Ejecuta la instruccion
            $resultado->execute(array(":cedula" => $this->cedula, ":contrasenia" => $this->cifrado, ":nombre" => $this->nombre, ":telefono" => $this->telefono,":correo" => $this->correo,":rol"=> $this->rol,":foto"=>$this->imagen));

       
            //Redirecciona a la pagina principal
        header("location:../index.php");
       
        
    }

    public function RegistrarAdmin(){//Metodo que se encarga de registrar los datos
      
        //Instruccion a ejecutar en la BD
        $instruccion = "INSERT INTO usuario (Cedula,Contrasenia,Nombre_usuario,Telefono,Correo,Rol_id,imagen) VALUES (:cedula,:contrasenia,:nombre,:telefono,:correo,:rol,:foto)";

        $resultado =$this->db->prepare($instruccion);//prepara la instruccion

       
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
                     
            //Ejecuta la instruccion
            
                $resultado->execute(array(":cedula" => $this->cedula, ":contrasenia" => $this->cifrado, ":nombre" => $this->nombre, ":telefono" => $this->telefono,":correo" => $this->correo,":rol"=>2,":foto"=>$this->imagen));
        
                            
            echo '<script type="text/javascript">alert("Usuario Existente");
            window.location.href="../vista/RegistrUsuario.php";</script>) ';
            
           
       
            //Redirecciona a la pagina principal
   
            header("location:../controlador/GestionAdmin.php");
       
        
    }

}