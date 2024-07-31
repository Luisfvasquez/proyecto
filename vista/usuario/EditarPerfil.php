<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <title>Editar Perfil</title>
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
                        <h1 class="card-title">Editar Perfil</h1>
                    </div>
                    <div class="card-body">
                        <a href="Perfil.php" class="btn btn-danger">Volver</a>
                        <form action="../../controlador/ActualizarUsuarios.php" method="post" enctype='multipart/form-data' class="mt-4">
                            <div class="form-group">
                                <label for="Cedula">Cédula</label>
                                <input type="text" class="form-control" name="Cedula" id="Cedula" value="<?php echo $_SESSION['usuario']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="Nombre">Nombre</label>
                                <input type="text" class="form-control" name="Nombre" id="Nombre" value="<?php echo $_SESSION['nombre']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Telefono">Teléfono</label>
                                <input type="text" class="form-control" name="Telefono" id="Telefono" value="<?php echo $_SESSION['telefono']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="Correo">Correo</label>
                                <input type="email" class="form-control" name="Correo" id="Correo" value="<?php echo $_SESSION['correo']; ?>">
                            </div>
                            <div class="form-group">
                                <label for="imagen">Imagen</label><br>
                                <img src="/proyecto-v1/imgs/<?php echo $_SESSION['imagen']; ?>" alt="" width="100px" class="img-thumbnail mb-3">
                                <input type="file" class="form-control-file" name="imagen" id="imagen">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Actualizar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
