<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    session_start();
    if(!isset($_SESSION['usuario'])){
        header("location:InicioSesion.php");
    }
    ?>
    
    <a href="../index.php">Home</a>
    <h1>iniciaste sesion</h1>

    <a href="../controlador/CierreSesion.php">Cerrar Sesion</a>
</body>
</html>