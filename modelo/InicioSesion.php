<?php
class Usuarios {
    //Atributos
    private $db;
    private $nombre;
    private $contrasena;

    public function __construct() {
        require_once("Conexion.php");//Llama al archivo conexion
        $this->db = Conexion::conexion();//Establece la variable de conexion con la BD
        //Almacena todos los datos recibidos en su respectiva variable
        $this->nombre = $_POST['usuario'];
        $this->contrasena = $_POST['contrasena'];
    }

    public function Verificar() {
  
        // Consulta a la base de datos de los Usuarios
        $instruccion = "SELECT * FROM usuario WHERE Cedula=:nombre";
      
        $resultado= $this->db->prepare($instruccion);//prepara la instruccion

      
        $resultado->bindValue(":nombre", $this->nombre);//Vincula un valor a un parametro

        $resultado->execute();//Ejecuta la instruccion

       // Verifica si el usuario existe
        if ($resultado->rowCount() > 0) {
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
            
            // Verifica la contraseña
            if (password_verify($this->contrasena, $usuario['Contrasenia'])) {
                // Inicia la sesión
                session_start();
                
                // Verifica el rol del usuario
                if ($usuario['Rol_id'] == 2) {
                    //Almacena los datos del administrador en la variable sesion
                    $_SESSION['admin'] = $this->nombre;
                    $_SESSION['nombre'] = $usuario['Nombre_usuario'];
                    return header("location:../vista/administrador/VistaAdmin.php");

                } elseif ($usuario['Rol_id'] == 3) {
                    //Almacena los datos del usuario en la variable sesion
                    $_SESSION['usuario'] = $this->nombre;
                    $_SESSION['nombre'] = $usuario['Nombre_usuario'];
                    $_SESSION['telefono'] = $usuario['Telefono'];
                    $_SESSION['correo'] = $usuario['Correo'];
                    $_SESSION['rol'] = $usuario['Rol_id'];
                    $_SESSION['imagen'] = $usuario['imagen'];
                    return header("location:../Controlador/VistaUsuario.php");

                }
            }
        }

        // Si no es ninguno de los dos, entonces no existe
        return header("location:../vista/InicioSesion.php");//Redirecciona a la pagina de inicio de sesion
    }
}
?>
