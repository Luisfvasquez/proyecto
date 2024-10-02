<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/inicio.css">
    <link rel="stylesheet" href="../estilos/vistacompraproducto.css">
    <script src="https://kit.fontawesome.com/e29979f2de.js" crossorigin="anonymous"></script>   
    <title>Factura</title>
</head>
<body>
    <?php 
    if(empty($_SESSION['carrito'])){//Si el carrito esta vacio
        header("location:../controlador/VistaUsuario.php");
    }
    $monto_total=0;
    ?>
   <div>
    <h1>Factura</h1>
   </div>
    
    <div class="cartas">
        <div class="cartas">
    <?php foreach($_SESSION['carrito'] as $indice => $producto) :?>
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                  <p class="card-text"> Producto:<?php echo $producto['nombre_producto'] ?></p>                 
                  <p class="card-text"> Cantidad:<?php echo $producto['cantidad'] ?></p>
                  <p class="card-text"> Precio:<?php echo $producto['precio'] ?></p>         
                  <p class="card-text">Total: <?php echo $producto['cantidad']*$producto['precio'];?></p>        
                    
                </div>
                <div class="card-footer">
                <?php $monto_total+=$producto['precio']*$producto['cantidad']; ?>

                    <p> Total De la compra:<?php echo $monto_total; ?></p>
                    <p> Referencia:<?php echo $_SESSION['referencia'] ?></p>
                    <p> Metodo De pago: <?php 
                        if($_SESSION['metodo']==1){
                            echo "Tarjeta";}else{
                                echo "Efectivo";
                            }
                    ?></p>                                  
       
    
                    <a href="../controlador/HistorialCompraUsuario.php" class="btn btn-success">Ver facturas</a>
                     <a href="../controlador/VistaUsuario.php"  class="btn btn-success">Volver</a>
                </div>        
                        
            </div>
       
            </div>    
            <?php endforeach; ?>    
    </div>

     <?php unset($_SESSION['carrito'])?>
</body>
</html>