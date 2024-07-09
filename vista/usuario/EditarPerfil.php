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
    <a href="Perfil.php">Volver</a>
  
    <br>
    <form action="../../controlador/ActualizarUsuarios.php" method="post" enctype='multipart/form-data'>

        <label for="">Cedula</label>
    <input type="text" name="Cedula" id="Cedula" value="<?php echo $_SESSION['usuario'] ?>" readonly><br>
        <label for="">Nombre</label>
    <input type="text" name="Nombre" id="Nombre" value="<?php echo $_SESSION['nombre'] ?>"><br>
        <label for="">Telefono</label>
    <input type="text" name="Telefono" id="Telefono" value="<?php echo $_SESSION['telefono'] ?>"><br>
        <label for="">Correo</label>
    <input type="text" name="Correo" id="Correo" value="<?php echo $_SESSION['correo'] ?>"><br>
        <label for="">Imagen</label><br>
    <img src="/intranet/uploads/<?php echo $_SESSION['imagen']  ?>" alt="" width="100px">
    <br>
    <input type="file" name="imagen" id="imagen">
    <br>
    <br>
       <input type="submit" value="Actualizar">
    </form>
    <script>


    </script>

</body>

</html>