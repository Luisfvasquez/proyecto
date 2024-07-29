<?php

class NuevaCompra
{
    //  Atributos
    private $db;
    private $id;
    private $producto;
    public function __construct()
    {
        require_once("Conexion.php"); //Llama al archivo conexion
        $this->db = Conexion::conexion(); //Establece la variable de conexion con la BD
        //establece los atributos como arratglo para almacenar los datos
        $this->id= $_GET['id'];
        $this->producto = array();
    }

    public function InventarioStock()
    {
        $instruccion = ("SELECT * FROM inventario
    INNER JOIN Producto ON inventario.Producto_id= producto.IdProducto
      INNER JOIN categoria ON producto.Categoria_id=categoria.idCategoria
      where Producto_id=:id");

        $resultado = $this->db->prepare($instruccion);
        $resultado->execute(array('id'=>$this->id));//Ejecuta la instruccion

        //Almacena los datos en un arreglo
        while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $this->producto[] = $filas;
        }

        return $this->producto; //Retorna el arreglo con los datos


    }
}
