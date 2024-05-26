<?php

class Actualizar{

    private $db;
    private $cedula;
    private $nombre;
    private $correo;
    private $contrasena;


    public function __construct()
    {
        require_once("Conexion.php");
        $this->db=Conexion::conexion();
        $this->cedula=$_POST['cedula'];
        $this->nombre=$_POST['nombre'];
        $this->correo=$_POST['correo'];
        $this->contrasena=$_POST['contrasena'];
    }


    public function Actualizar(){
        
        $instruccion= ("UPDATE USUARIOS SET CEDULA_USUARIO=:cedula, NOMBRE_USUARIO=:nombre, CORREO=:correo, CONTRASENA=:contrasena WHERE CEDULA_USUARIO=:cedula");
        $resultado=$this->db->prepare($instruccion);
        $resultado->execute(array(":cedula"=>$this->cedula, ":nombre"=>$this->nombre, ":correo"=>$this->correo, ":contrasena"=>$this->contrasena));
        header("location:../controlador/MostrarUsuarios.php");
        
    }

}