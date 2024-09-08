<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    if(empty($_SESSION['carrito'])){//Si el carrito esta vacio
        header("location:../controlador/VistaUsuario.php");
    }
    $monto_total=0;
    ?>
   
    <h1>Factura</h1>    
    
    <?php foreach($_SESSION['carrito'] as $indice => $producto) :?>
          <p> Producto:<?php echo $producto['nombre_producto'] ?></p>
          <p> Cantidad:<?php echo $producto['cantidad'] ?></p>
          <p> Precio:<?php echo $producto['precio'] ?></p>
         
          <p>Total: <?php echo $producto['cantidad']*$producto['precio'];?></p>
         
            <?php $monto_total+=$producto['precio']*$producto['cantidad']; ?>

    <?php endforeach; ?>

    <p> Total De la compra:<?php echo $monto_total; ?></p>
    <p> Referencia:<?php echo $_SESSION['referencia'] ?></p>
    <p> Metodo De pago: <?php 
        if($_SESSION['metodo']==1){
            echo "Tarjeta";}else{
                echo "Efectivo";
            }
     ?></p>
    
        <a href="../controlador/HistorialCompraUsuario.php">Ver facturas</a>
     <a href="../controlador/VistaUsuario.php">Volver</a>
     
</body>
</html>