<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
</head>
<body>
    
    <?php 
   
session_start();
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>
  
    
        <a href="../vista/administrador/VistaAdmin.php">Volver</a>
        <a href="../vista/administrador/ReportesVenta.php">Reportes de Venta</a>
        <a href="../vista/administrador/ReportesCompra.php">Reportes de Compra</a>

        <h1>Productos</h1>
        <h2>Compra</h2>
        <?php foreach($compra as $producto): ?>
    <table>
        <tr>
            <td>Producto Id</td>
            <td>Proveedor</td>
            <td>Compra Id</td>           
            <td>Categoria</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Status</td>
            <td>Precio</td>
            <td>Cantidad</td>
          
   
        </tr>
        <tr>
            <td>
                <?php echo $producto['IdProducto'] ?>
            </td>
            <td>
                <?php echo $producto['Proveedor_rif'] ?>
            </td>
           
            <td>
                <?php echo $producto['Compra_id'] ?>
            </td>
            
            <td>
                <?php echo $producto['Nombre_categoria'] ?>
            </td>
            
            <td>
                <?php echo $producto['Nombre_producto'] ?>
            </td>

            <td >
                <?php echo $producto['Descripcion'] ?>
            </td>

            <td>
                <?php echo $producto['Status'] ?>
            </td>

            <td>
                <?php echo $producto['Precio_producto'] ?>
            </td>
            
            <td>
                <?php echo $producto['Cantidad_compra'] ?>
            </td>
        </tr>
      
    </table>
        <?php  endforeach; ?>

        <h2>Venta</h2>

        <?php foreach($venta as $producto): ?>
           
    <table>
        <tr>
            <td>Producto Id</td>
            <td>Cliente</td>
            <td>Factura Id</td>           
            <td>Nombre</td>
            <td>Cantidad vendida</td>
            <td>Precio unitario</td>
            <td>Fecha</td>
            <td>Monto Total</td>
            <td>Metodo</td>
          
   
        </tr>
        <tr>
            <td>
                <?php echo $producto['IdProducto'] ?>
            </td>
            <td>
                <?php echo $producto['Usuario_cedula'] ?>
            </td>
           
            <td>
                <?php echo $producto['IdFactura'] ?>
            </td>
            
            
            <td>
                <?php echo $producto['Nombre_producto'] ?>
            </td>

            <td >
                <?php echo $producto['Cantidad_producto'] ?>
            </td>

            <td>
                <?php echo $producto['Precio_unitario'] ?>
            </td>

            <td>
                <?php echo $producto['Fecha'] ?>
            </td>
            <?php foreach($metodo as $producto): ?>
            <td>
                <?php echo $producto['Monto_total'] ?>
            </td>
            
            <td>
                <?php echo $producto['Metodo'] ?>
            </td>

            <?php  endforeach; ?>
        </tr>
      
    </table>
        <?php  endforeach; ?>

</body>
</html>