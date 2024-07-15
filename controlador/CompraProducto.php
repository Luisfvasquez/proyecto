<?php
    //Se encarga de registras los registros de la compra de un producto
    require_once ("../modelo/CompraProducto.php"); //Lama el modelo

    $compra= new CompraProducto(); //Instancia la clase
    $compra->Factura(); //Registra primeramente la factura
    $compra->DetalleFactura();//Luego los detalles ya que se necesita el id de la factura
    $compra->MetodoPago();// Continua con el registro del metodo de pago afectuado
    $compra->RegistroInventario();// Por ultimo se actualiza el inventario