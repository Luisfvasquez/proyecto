<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="../index.php">Home2</a>

    <h1>Inicio Sesion</h1>    

    <form action="../controlador/InicioSesion.php" method="post">

        <label for="usuario">Cedula</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="contrasena">Contraseña</label>
        <input type="password" name="contrasena" id="contrasena" required>
        <br>
        <input type="submit" value="Ingresar">

    </form>


</body>
</html>