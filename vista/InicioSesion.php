<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/iniciosesion.css">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <title>Inicio Sesion</title>
</head>
<body>
 

    <h1>Inicio Sesion</h1>    

  <div class="login-page">
    <div class="form">
      <form class="login-form"  action="../controlador/InicioSesion.php"  method="post">
        <input type="text" name="usuario" placeholder="usuario" required>
        <input type="password" name="contrasena" placeholder="contrasena" required>
        <input type="submit" value="Ingresar" id="boton">
        <p class="message">No te has registrado? <a href="Registro.php" class="btn btn-primary">Crea una cuenta</a></p>
      </form>
      <a href="../index.php " class="btn btn-success">Home</a>
    </div>
    
  </div>
</body>
</html>