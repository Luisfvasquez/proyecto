<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Producto</title>
</head>

<body>

    <?php

    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location:../InicioSesion.php");
    }
    ?>


    <a href="../controlador/GestionInventario.php">Volver</a>


    <h1>Actualizar</h1>


    <form action="../controlador/ActualizarProducto.php" method='post' enctype='multipart/form-data'>

        <label for="">Producto Id</label>
        <input type="text" name="id" id="" readonly value="<?php echo $producto['IdProducto'] ?>"><br>

        <label for="">Nombre</label>
        <input type="text" name="nombre_producto" id="" value="<?php echo $producto['Nombre_producto'] ?>"><br>

        <label for="">Descripcion</label>
        <input type="text" name="descripcion" id="" value="<?php echo $producto['Descripcion'] ?>"><br>

        <label for="">Categoria</label>

        <select name="categoria_id" id="categoria_id" >
            <option  value="<?php echo $producto['Categoria_id'] ?>">Seleccion Categoria</option>
            <?php foreach ($matriz as $categorias) : ?>
                <br>
                <option value="<?php echo $categorias["idCategoria"] ?>"><?php echo $categorias["Nombre_categoria"] ?></option>
            <?php endforeach; ?>
        </select>
        <br>

        <label for="">Status</label>
        <input type="checkbox" name="status" id="status"  value="1" <?php if($producto["Status"]==1) echo "checked"; ?>><br>

        <label for="">Imagen</label><br>
        <input type="file" name="imagen" id="" value="<?php $producto['Imagen'] ?>"><br>


        <input type="image" src="/intranet/uploads/<?php echo $producto["Imagen"] ?>" alt="" width='200px'><br>

        <br><input type="submit" value="actualizar">



    </form>
</body>

</html>