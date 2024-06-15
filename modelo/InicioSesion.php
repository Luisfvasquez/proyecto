<?php
class Usuarios {
    private $db;
    private $nombre;
    private $contrasena;

    public function __construct() {
        require_once("Conexion.php");
        $this->db = Conexion::conexion();
        $this->nombre = $_POST['usuario'];
        $this->contrasena = $_POST['contrasena'];
    }

    public function Verificar() {
  
        // Consulta a la base de datos de los Usuarios
        $instruccion = "SELECT * FROM usuario WHERE Cedula=:nombre";
      
        $resultado= $this->db->prepare($instruccion);

      
        $resultado->bindValue(":nombre", $this->nombre);

        $resultado->execute();

       // Verifica si el usuario existe
        if ($resultado->rowCount() > 0) {
            $usuario = $resultado->fetch(PDO::FETCH_ASSOC);
            
            // Verifica la contraseña
            if (password_verify($this->contrasena, $usuario['Contrasenia'])) {
                // Inicia la sesión
                session_start();
                
                // Verifica el rol del usuario
                if ($usuario['Rol_id'] == 2) {

                    $_SESSION['admin'] = $this->nombre;
                    $_SESSION['nombre'] = $usuario['Nombre_usuario'];
                    return header("location:../vista/administrador/VistaAdmin.php");

                } elseif ($usuario['Rol_id'] == 3) {

                    $_SESSION['usuario'] = $this->nombre;
                    $_SESSION['nombre'] = $usuario['Nombre_usuario'];
                    return header("location:../Controlador/VistaUsuario.php");

                }
            }
        }

        // Si no es ninguno de los dos, entonces no existe
        return header("location:../vista/InicioSesion.php");
    }
}
?>
