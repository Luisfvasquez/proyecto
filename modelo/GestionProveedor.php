<?php

    class Proveedor{
        private $db;
        private $Proveedor;

        public function __construct(){
            require_once("Conexion.php");
            $this->db=Conexion::conexion();
            $this->Proveedor=array();
        }


        public function Proveedores(){

            $instruccion=("SELECT * FROM proveedor");
            $resultatado=$this->db->prepare($instruccion);
            $resultatado->execute(array());
            while($row=$resultatado->fetch(PDO::FETCH_ASSOC)){
                $this->Proveedor[]=$row;
            }

            return $this->Proveedor;
        }

        public function Borrar($id){//Metodo que se encarga de borrar los datos
            //Instruccion a ejecutar en la BD
            $instruccion = ("DELETE FROM proveedor WHERE Rif = :id");
            $resultado = $this->db->prepare($instruccion);//prepara la instruccion
    
            $resultado->execute(array(':id' =>$id ));//Ejecuta la instruccion
    
            //Redirecciona a la pagina de gestion de administradores
            header("Location: ../controlador/GestionProveedor.php");
        }


        public function AgregarProveedor($rif,$nombre, $correo, $direccion){
            $instruccion=("INSERT INTO proveedor (Rif,Nombre_proveedor,Correo,Direccion) VALUES (:rif,:nombre_proveedor,:correo,:direccion)");
            $resultado=$this->db->prepare($instruccion);
            $resultado->execute(array(':rif'=>$rif,':nombre_proveedor'=>$nombre,':correo'=>$correo,':direccion'=>$direccion));
            
            header("Location: ../controlador/GestionProveedor.php");
        }

    }