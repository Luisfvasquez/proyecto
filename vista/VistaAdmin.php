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
    if(!isset($_SESSION['admin']) ){
        header("location:InicioSesion.php");
    }
    ?>
    
    <h1>Bienvenido <?php echo $_SESSION['admin'] ?></h1>
    <h2>Registro Productos</h2>
    <h2><a href="../controlador/GestionAdmin.php">Gestion admin</a></h2>
    <h2><a href="../controlador/GestionUsuarios.php">Gestion usuario</a></h2>
    <h2>Gestion del inventario</h2>
    <a href="../index.php">Home</a>


    <a href="../controlador/CierreSesion.php">Cerrar Sesion</a>


</body>
</html>