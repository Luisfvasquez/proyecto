<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestión de Inventario</title>
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/vistaadmin.css">
    <style>

        .table td,
        .table th {
            vertical-align: middle;
        }
    </style>
</head>

<body>
<header>
        
        <a href="../vista/administrador/VistaAdmin.php"><img src="../imgs/Huauu2.png" alt="loho"></a>
<<<<<<< HEAD
       <p class="color"><a href="../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
=======
       <p class="color"><a href="../../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
>>>>>>> dea4f175b568779a4f67f704f272a17672a0acf0
        
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
                <a href="../vista/administrador/VistaAdmin.php" class="btn btn-primary">Volver</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h1>Productos en Inventario</h1>
                <table class="table table-bordered border-secundary">
                    <thead>
                        <tr>
                            <th>Producto ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Status</th>
                            <th>Cantidad disponible</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php if($matriz!=null){foreach ($matriz as $producto) : ?>
                            <tr>
                                <td><?php echo $producto['IdProducto'] ?></td>
                                <td><?php echo $producto['Nombre_producto'] ?></td>
                                <td><?php echo $producto['Descripcion'] ?></td>
                                <td><?php echo $producto['Nombre_categoria'] ?></td>
                                <td><?php echo $producto['Status'] ?></td>
                                <td><?php echo $producto['Cantidad_inventario'] ?></td>
                                <td><img src="/proyecto-v1/imgs/<?php echo $producto['Imagen'] ?>" alt="Imagen del producto" width="100px"></td>
                                <td><a href="../controlador/ConsultaActualizarProducto.php?id=<?php echo $producto['IdProducto'] ?>" class="btn btn-sm btn-info">Editar</a></td>
                            </tr>
                            <?php endforeach;}; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
