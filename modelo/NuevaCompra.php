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
        $instruccion = ("SELECT * FROM Detalles_compra 
        INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
        INNER JOIN Proveedor ON Compra.Proveedor_rif= Proveedor.Rif
        INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
        INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria
        WHERE Producto_id=:id" );


        $resultado = $this->db->prepare($instruccion);
        $resultado->execute(array('id'=>$this->id));//Ejecuta la instruccion

        //Almacena los datos en un arreglo
        while ($filas = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $this->producto[] = $filas;
        }

        return $this->producto; //Retorna el arreglo con los datos


    }
   
}
