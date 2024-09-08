<?php
    //Se encarga de registras los registros de la compra de un producto
    if(isset($_POST['metodo_id'])){
    require_once ("../modelo/VentaProducto.php"); //Lama el modelo

    $compra= new CompraProducto(); //Instancia la clase
    $compra->Factura(); //Registra primeramente la factura
    $compra->DetalleFactura();//Luego los detalles ya que se necesita el id de la factura
    $compra->MetodoPago();// Continua con el registro del metodo de pago afectuado
    $compra->RegistroInventario();// Por ultimo se actualiza el inventario
    

    echo '<script type="text/javascript">alert("Producto Comprado");
    window.location.href="../controlador/VistaFactura.php";</script>) ';
    }else{
        echo '<script type="text/javascript">alert("Seleccione un metodo de pago");
        window.location.href="../controlador/VistaCompraProducto.php";</script>) ';
    }