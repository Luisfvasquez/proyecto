<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <?php 
   
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>
  
    
        <a href="../vista/administrador/VistaAdmin.php">Volver</a>
        <a href="../../controlador/MovimientosInventario.php">Reportes de Venta</a>
        <a href="../../controlador/MovimientosInventario.php">Reportes de Compra</a>

        <h1>Productos</h1>
        <h2>Compra</h2>
        <?php foreach($matriz as $producto): ?>
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
            <td>Imagen</td>
   
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
                <input type="image" src="/intranet/uploads/<?php echo $producto["Imagen"]?>" alt="" width='100px'> 
            </td>
        </tr>
    </table>
        <?php  endforeach; ?>

        <h2>Venta</h2>
</body>
</html>