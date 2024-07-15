<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../../estilos/vistaadmin.css">
    <title>Admin</title>
</head>
<body>

    <header>
        <img src="../../imgs/Huauu2.png" alt="Logo ">
        
       <p class="color"><a href="../../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
        
    </header>
    
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
    


    

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>