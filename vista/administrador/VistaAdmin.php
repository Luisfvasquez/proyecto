<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <?php 
    session_start();
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>
    
    <h1>Bienvenido <?php echo $_SESSION['nombre'] ?></h1>
    <h2><a href="../../controlador/VistaCompra.php">Registro Productos</a></h2>
    <h2><a href="../../controlador/GestionAdmin.php">Gestion admin</a></h2>
    <h2><a href="../../controlador/GestionUsuarios.php">Gestion usuario</a></h2>
     <h2><a href="../../controlador/RegistroCompraVenta.php">Registros de compras y ventas</a></h2>
    <h2><a href="../../controlador/GestionInventario.php">Gestion del inventario</a></h2>
    


    <a href="../../controlador/CierreSesion.php">Cerrar Sesion</a>


</body>
</html>