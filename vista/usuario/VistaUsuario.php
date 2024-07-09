<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio usuario</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:InicioSesion.php");
    }
    ?>

    <h1>Bienvenido <?php echo $_SESSION['nombre']; ?></h1>
    <a href="../vista/usuario/Perfil.php">
        <h2>Perfil</h2>
    </a>
    <?php foreach ($matriz as $producto) : ?>
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

                <td>
                <img src="/intranet/uploads/<?php echo $producto['Imagen']  ?>" alt="" width="100px">
                </td>

                <td>
                    <?php

                    echo $producto['precio'];
                    ?>
                </td>
                
                <td>
                <a href="../controlador/VistaCompraProducto.php?idproducto=<?php echo $producto['IdProducto'] ?>&precio=<?php echo $producto['precio']; ?>"><input type="button" value="Comprar"></a>
                
            </td>
            </tr>
        </table>
    <?php endforeach; ?>
    <br>
    <a href="../controlador/CierreSesion.php">Cerrar Sesion</a>
</body>

</html>