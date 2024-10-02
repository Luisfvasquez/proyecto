<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/registrousuario.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <title>Registro de usuario</title>
</head>
<body>
<h1>Registro de usuarios</h1>
    <div class="contenedor">
    <div class="registro">
        <form action="../controlador/RegistroUsuarios.php" method="post" enctype="multipart/form-data">
            <input type="text" name="cedula" id="cedula" placeholder="Cedula" required>
            <br>
            <input type="password" name="contrasena" placeholder="Contrasena" id="contrasena" required>
            <br>
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
            <br>
            <input type="text" name="telefono" id="telefono" placeholder="Telefono" required>
            <br>
            <input type="email" name="correo" id="correo" placeholder="Correo" required>
            <br>
            <input type="file" name="imagen" placeholder="Foto" id="imagen">
            <br>
            <br>
            <input type="submit" value="Registrar" class="boton">
        </form>
        
    <a href="../index.php" class="btn btn-success">Home</a>
    </div>
    </div>
</body>
</html>