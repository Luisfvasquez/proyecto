<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<a href="../index.php">Home</a>
<h1>Registro de usuarios</h1>
    <form action="../controlador/RegistroUsuarios.php" method="post" enctype="multipart/form-data">

        <label for="Cedula">Cedula</label>
        <input type="text" name="cedula" id="cedula" required>
        <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <label for="Nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre" required>
        <br>
        <label for="Telefono">Telefono</label>
        <input type="text" name="telefono" id="telefono" required>
        <br>
        <label for="Correo">Correo</label>
        <input type="text" name="correo" id="correo" required>
        <br>
        <label for="Foto">Foto</label>
       <input type="file" name="imagen" id="imagen">
        <br>
       
        <br>
        <input type="submit" value="Registrar">

    </form>


</body>
</html>