<?php 

class Usuarios{
    private $db;
    private $nombre;
    private $contrasena;

    public function __construct(){
        require_once ("Conexion.php");
        $this->db=Conexion::conexion();
        $this->nombre=$_POST['usuario'];
        $this->contrasena=$_POST['contrasena']; ;
    }


    public function Verificar(){
        //Consulta a la base de datos de los administradores
        $instruccion = "SELECT * FROM administrador WHERE Cedula_Admin=:nombre AND contrasenia_admin=:contrasena";
       //Consulta a la base de datos de los Usuarios
        $instruccion2 = "SELECT * FROM usuarios WHERE Cedula_usuario=:nombre AND contrasenia_usuario=:contrasena";
        $resultado = $this->db->prepare($instruccion);
        $resultado2 = $this->db->prepare($instruccion2);

        $resultado->bindValue(":nombre", $this->nombre);
        $resultado2->bindValue(":nombre", $this->nombre);

        $resultado->bindValue(":contrasena", $this->contrasena);
        $resultado2->bindValue(":contrasena", $this->contrasena);

        $resultado->execute();
        $resultado2->execute();
            //verifica si primeramente es un administrador
            if($resultado->rowCount()>0){
                //Inicia la sesion
                session_start();
                //Almacena en la variable de sesion el nombre del administrador
                $_SESSION['admin']=$this->nombre;
                return header("location:../vista/VistaAdmin.php");
            
        }else{//caso contrario si es un usuario
           
            if($resultado2->rowCount()>0){
                //Inicia la sesion
                session_start();
                //alamacena en la variable de sesion el nombre del usuario
                $_SESSION['usuario']=$this->nombre;
                return header("location:../vista/Home.php");
            }else{//Y pues si no es ninguno de los dos entonces no existe
                return header("location:../vista/InicioSesion.php");
            }
        }

    } 
    
}

?>
