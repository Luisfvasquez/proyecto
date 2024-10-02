<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/vistaadmin.css">
    <title>Actualizar Producto</title>
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
</head>

<body>
<header>
        
        <a href="../vista/administrador/VistaAdmin.php"><img src="../imgs/Huauu2.png" alt="loho"></a>
       <p class="color"><a href="../../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
        
    </header>
    <?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location:../InicioSesion.php");
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="../controlador/GestionInventario.php" class="btn btn-primary">Volver</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h1>Actualizar Producto</h1>
                <form action="../controlador/ActualizarProducto.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="id">Producto Id</label>
                        <input type="text" class="form-control" id="id" name="id" readonly value="<?php echo $producto['IdProducto'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="nombre_producto">Nombre</label>
                        <input type="text" class="form-control" id="nombre_producto" name="nombre_producto" value="<?php echo $producto['Nombre_producto'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="descripcion">Descripción</label>
                        <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo $producto['Descripcion'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="categoria_id">Categoría</label>
                        <select class="form-control" id="categoria_id" name="categoria_id">
                            <option value="<?php echo $producto['Categoria_id'] ?>">Seleccionar categoría</option>
                            <?php foreach ($matriz as $categoria) : ?>
                                <option value="<?php echo $categoria['idCategoria'] ?>"><?php echo $categoria['Nombre_categoria'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <input type="checkbox" id="status" name="status" value="1" <?php if ($producto['Status'] == 1) echo "checked"; ?>>
                    </div>
                    <div class="form-group">
                        <label for="imagen">Imagen</label><br>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                        <input type="hidden" name="imagenAnterior" value="<?php echo $producto['Imagen'] ?>">
                        <br>
                        <img src="/proyecto-v1/imgs/<?php echo $producto['Imagen'] ?>" alt="Imagen del producto" width="200px">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
