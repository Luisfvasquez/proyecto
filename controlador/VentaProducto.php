<?php
    //Se encarga de registras los registros de la compra de un producto
    require_once ("../modelo/VentaProducto.php"); //Lama el modelo

    $compra= new CompraProducto(); //Instancia la clase
    $compra->Factura(); //Registra primeramente la factura
    $compra->DetalleFactura();//Luego los detalles ya que se necesita el id de la factura
    $compra->MetodoPago();// Continua con el registro del metodo de pago afectuado
    $compra->RegistroInventario();// Por ultimo se actualiza el inventario


    unset($_SESSION['carrito']);//Elimina el carrito
    header("Location: ../controlador/VistaUsuario.php");