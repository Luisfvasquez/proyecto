<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <title>Perfil</title>
</head>

<body class="bg-light">
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:InicioSesion.php");
    }
    ?>

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h1 class="card-title">Perfil</h1>
                    </div>
                    <div class="card-body text-center">
                        <a href="../../controlador/VistaUsuario.php" class="btn btn-danger">Volver</a>
                        <a href="EditarPerfil.php" class="btn btn-primary">Editar Perfil</a>
                        <a href="../../controlador/HistorialCompraUsuario.php" class="btn btn-warning">Historial Compra</a>
                        <div class="mt-4">
                            <img src="/intranet/uploads/<?php echo $_SESSION['imagen']; ?>" alt="" width="100px" class="img-thumbnail mb-3">
                            <p><strong>Nombre:</strong> <?php echo $_SESSION['nombre']; ?></p>
                            <p><strong>Teléfono:</strong> <?php echo $_SESSION['telefono']; ?></p>
                            <p><strong>Correo:</strong> <?php echo $_SESSION['correo']; ?></p>
                            <p><strong>Rol:</strong> <?php echo $_SESSION['rol']; ?></p>
                            <p><strong>Cédula:</strong> <?php echo $_SESSION['usuario']; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
