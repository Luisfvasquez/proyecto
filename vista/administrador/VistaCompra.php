<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <title>Compra</title>
</head>

<body class="bg-light">
    <?php 
    session_start();
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h1 class="card-title">Registro de compra de los productos</h1>
                    </div>
                    <div class="card-body">
                        <form action="../controlador/RegistroProductos.php" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="proveedor">Proveedor</label>
                                <input type="text" class="form-control" readonly name="proveedor" id="proveedor" value="29839550">
                            </div>
                            <div class="form-group">
                                <label for="nombre_producto">Nombre del producto</label>
                                <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" placeholder="Nombre del producto">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <input type="text" class="form-control" name="descripcion" id="descripcion" placeholder="Descripción">
                            </div>
                            <div class="form-group">
                                <label for="categoria_id">Categoría</label>
                                <select class="form-control" name="categoria_id" id="categoria_id">
                                    <option selected disabled>Seleccionar categoría</option>
                                    <?php foreach($matriz as $categorias): ?>
                                        <option value="<?php echo $categorias["idCategoria"] ?>"><?php echo $categorias["Nombre_categoria"] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen</label>
                                <input type="file" class="form-control-file" name="imagen" id="imagen">
                            </div>
                            <div class="form-group form-check">
                                <input type="checkbox" class="form-check-input" name="status" id="status" value="1">
                                <label class="form-check-label" for="status">Mostrar en Stock</label>
                            </div>
                            <div class="form-group">
                                <label for="precio">Precio</label>
                                <input type="text" class="form-control" name="precio" id="precio" placeholder="Precio">
                            </div>
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input type="text" class="form-control" name="cantidad" id="cantidad" placeholder="Cantidad">
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Registrar Compra</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="../vista/administrador/VistaAdmin.php" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
