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
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location:../InicioSesion.php");
    }
    ?>


    <div class="container mt-5">
        <div class="row">
            <div class="col">
                <a href="../vista/administrador/VistaAdmin.php" class="btn btn-primary">Volver</a>
                <a href="../vista/administrador/ReportesVenta.php" class="btn btn-secondary">Reportes de Venta</a>
                <a href="../vista/administrador/ReportesCompra.php" class="btn btn-secondary">Reportes de Compra</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h1>Productos</h1>
                <h2>Compra Historial</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto Id</th>
                            <th>Proveedor</th>
                            <th>Compra Id</th>
                            <th>Categoría</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Status</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                        </tr>
                    </thead>
                    <?php foreach ($compra as $producto_compra) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $producto_compra['IdProducto'] ?></td>
                                <td><?php echo $producto_compra['Proveedor_rif'] ?></td>
                                <td><?php echo $producto_compra['Compra_id'] ?></td>
                                <td><?php echo $producto_compra['Nombre_categoria'] ?></td>
                                <td><?php echo $producto_compra['Nombre_producto'] ?></td>
                                <td><?php echo $producto_compra['Descripcion'] ?></td>
                                <td><?php echo $producto_compra['Status'] ?></td>
                                <td><?php echo $producto_compra['Precio_producto'] ?></td>
                                <td><?php echo $producto_compra['Cantidad_compra'] ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h2>Venta Historial</h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Producto Id</th>
                            <th>Cliente</th>
                            <th>Factura Id</th>
                            <th>Nombre</th>
                            <th>Cantidad vendida</th>
                            <th>Precio unitario</th>
                            <th>Fecha</th>
                            <th>Monto Total</th>
                            <th>Método</th>
                        </tr>
                    </thead>
                    <?php foreach ($venta as $producto_venta) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $producto_venta['IdProducto'] ?></td>
                                <td><?php echo $producto_venta['Usuario_cedula'] ?></td>
                                <td><?php echo $producto_venta['IdFactura'] ?></td>
                                <td><?php echo $producto_venta['Nombre_producto'] ?></td>
                                <td><?php echo $producto_venta['Cantidad_producto'] ?></td>
                                <td><?php echo $producto_venta['Precio_unitario'] ?></td>
                                <td><?php echo $producto_venta['Fecha'] ?></td>

                                <td>

                                    <?php
                                    // Buscar el método de pago correspondiente
                                    foreach ($metodo as $m) {
                                        if ($m['Factura_id'] == $producto_venta['IdFactura']) {
                                            echo $m['Metodo'];
                                            break; // Salir del bucle una vez encontrado el método
                                        }
                                    }
                                    ?>

                                </td>
                                <td>
                                <?php
                                    // Buscar el método de pago correspondiente
                                    foreach ($metodo as $m) {
                                  //compara si el id de la factura del metodo es igual al id de la factura de la venta
                                        if ($m['Factura_id'] == $producto_venta['IdFactura']) {
                                            echo $m['Monto_total'];
                                            break; // Salir del bucle una vez encontrado el método
                                        }
                                    }
                                    ?>
                                </td>


                            </tr>
                        </tbody>
                    <?php endforeach; ?>
                </table>

            </div>
        </div>
    </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>