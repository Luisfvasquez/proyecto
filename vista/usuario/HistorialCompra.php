<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
</head>

<body>

    <?php
    if (!isset($_SESSION['usuario'])) {
        header("location:../InicioSesion.php");
    }
    ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="../vista/usuario/perfil.php" class="btn btn-primary">Volver</a>
                <a href="../vista/usuario/ReportesCompraUsuario.php" class="btn btn-secondary">Reportes de Compra</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h2>Compra Historial</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto Id</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio de compra</th>
                            <th>Id categoria</th>
                            <th>Descripción</th>
                            <th>Id de la factura</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <?php foreach ($datos as $producto_compra) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $producto_compra['IdProducto'] ?></td>
                                <td><?php echo $producto_compra['Nombre_producto'] ?></td>
                                <td><?php echo $producto_compra['Cantidad_producto'] ?></td>
                                <td><?php echo $producto_compra['Precio_unitario'] ?></td>
                                <td><?php echo $producto_compra['Categoria_id'] ?></td>
                                <td><?php echo $producto_compra['Descripcion'] ?></td>
                                <td><?php echo $producto_compra['IdFactura'] ?></td>
                                <td><?php echo $producto_compra['Fecha'] ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>