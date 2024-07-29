<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <title>Nueva Compra</title>
</head>

<body class="bg-light">
    <?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location:InicioSesion.php");
    }
    ?> <a href="../controlador/VistaCompra.php">Volver</a>
    <div class="container mt-5">
        
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h1 class="card-title">Nueva compra </h1>
                    </div>
                    <div class="card-body text-left">
                      <!--   <a href="../../controlador/VistaUsuario.php" class="btn btn-danger">Volver</a>
                        <a href="EditarPerfil.php" class="btn btn-primary">Editar Perfil</a>
                        <a href="../../controlador/HistorialCompraUsuario.php" class="btn btn-warning">Historial Compra</a>
                        --> <div class="mt-4">
                            <?php foreach($matriz as $productos): ?>
                            <img src="/intranet/uploads/<?php echo $productos['Imagen']; ?>" alt="imagen" width="200px" class="img-thumbnail mb-3">
                            <p><strong>Id:</strong> <?php echo $productos['IdProducto']; ?></p>
                            <p><strong>Categoria_id:</strong> <?php echo $productos['Categoria_id']; ?></p>
                            <p><strong>Nombre:</strong> <?php echo $productos['Nombre_producto']; ?></p>
                            <p><strong>Descripcion:</strong> <?php echo $productos['Descripcion']; ?></p>
                            <p><strong>Status:</strong> <?php echo $productos['Status']; ?></p>
                            <p><strong>Cant. Inventario:</strong> <?php echo $productos['Cantidad_inventario']; ?></p>

                            <form action="" method="post">
                                <p><strong>Cantidad de compra:</strong><input type="text" name="cantidad" id="cantidad"></p>
                              <input type="hidden" name="id" value="<?php echo $productos['IdProducto'] ?>">
                                <input type="submit" value="Comprar" class="btn btn-primary">
                            </form>
                      
                            <?php endforeach; ?>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
