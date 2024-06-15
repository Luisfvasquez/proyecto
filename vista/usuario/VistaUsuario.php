<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location:InicioSesion.php");
    }
    ?>
    

  
    <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
    <?php foreach($matriz as $producto): ?>
    <table>
        <tr>
            <td>Producto</td>
            <td>Categoria</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Imagen</td>
            <td>Precio</td>
        </tr>
        <tr>
            <td>
                <?php echo $producto['IdProducto'] ?>
            </td>
            
            <td>
                <?php echo $producto['Nombre_categoria'] ?>
            </td>
            
            <td>
                <?php echo $producto['Nombre_producto'] ?>
            </td>

            <td>
                <?php echo $producto['Descripcion'] ?>
            </td>

            <td >
                <?php echo $producto['Imagen'] ?>
            </td>

            <td >
            <?php  $precio_total=$producto['Precio_producto']+($producto['Precio_producto']*0.3) ;
                echo $precio_total;
            ?>
            </td>
            <br>
        </tr>
    </table>
        <?php  endforeach; ?>

    <a href="../controlador/CierreSesion.php">Cerrar Sesion</a>
</body>
</html>