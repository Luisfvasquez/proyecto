<?php

class Conexion
{ //Ejecuta la canexion a la BBDD

    public static function conexion()
    {
        try {

            $conexion = new PDO("mysql:host=localhost; dbname=huauu", "root", ""); //Datos de la BBDD
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //Controla las exepciones
            $conexion->exec("SET CHARACTER SET utf8");
        } catch (Exception $e) { //Muestra los errores en la conexion hacia la BBDD
            die("Error en BBDD " . $e->getMessage());
            echo "Erroe en linea " . $e->getLine();
        }

        return $conexion;
    }
}
