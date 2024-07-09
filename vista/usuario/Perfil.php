<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:InicioSesion.php");
    }
    ?>
    <a href="../../controlador/VistaUsuario.php">Volver</a>
    <a href="EditarPerfil.php">Editar Perfil</a>

    <br>
    <br>

    <img src="/intranet/uploads/<?php echo $_SESSION['imagen']?>" alt="" width="100px"><br>
    <label for="">Nombre:</label>
    <label for=""><?php echo $_SESSION['nombre'] ?></label><br>
    <label for="">telefono:</label>
    <label for=""><?php echo $_SESSION['telefono'] ?></label><br>
    <label for="">Correo:</label>
    <label for=""><?php echo $_SESSION['correo'] ?></label><br>
    <label for="">Rol:</label>
    <label for=""><?php echo  $_SESSION['rol'] ?></label><br>
    <label for="">Cedula:</label>
    <label for=""><?php echo $_SESSION['usuario'] ?></label><br>
   


</body>

</html>