<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/vistaadmin.css">
    <title>Nueva Compra</title>
</head>

<body >
<header>
        
        <a href="../vista/administrador/VistaAdmin.php"><img src="../imgs/Huauu2.png" alt="loho"></a>
<<<<<<< HEAD
       <p class="color"><a href="../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
=======
       <p class="color"><a href="../../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
>>>>>>> dea4f175b568779a4f67f704f272a17672a0acf0
        
    </header>
    <?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location:InicioSesion.php");
    }
    ?> 
    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header text-center">
                        <h1 class="card-title">Nueva compra </h1>
                    </div>
                    <div class="card-body text-left">
                        <!--   <a href="../../controlador/VistaUsuario.php" class="btn btn-danger">Volver</a>
                        <a href="EditarPerfil.php" class="btn btn-primary">Editar Perfil</a>
                        <a href="../../controlador/HistorialCompraUsuario.php" class="btn btn-warning">Historial Compra</a>
                        -->
                        <div class="mt-4">
                            <?php foreach ($matriz as $productos) : ?>
                                <img src="/proyecto-v1/imgs/<?php echo $productos['Imagen']; ?>" alt="imagen" width="200px" class="img-thumbnail mb-3">
                                <p><strong>Id:</strong> <?php echo $productos['IdProducto']; ?></p>
                                <p><strong>Categoria_id:</strong> <?php echo $productos['Categoria_id']; ?></p>
                                <p><strong>Nombre:</strong> <?php echo $productos['Nombre_producto']; ?></p>
                                <p><strong>Descripcion:</strong> <?php echo $productos['Descripcion']; ?></p>
                                <p><strong>Status:</strong> <?php echo $productos['Status']; ?></p>
                                <p><strong>Proveedor</strong> <?php echo $productos['Nombre_proveedor']; ?></p>


                                <form action="../controlador/NuevaCompraRegistro.php" method="post">
                                    <input type="hidden" name="id" value="<?php echo $productos['IdProducto'] ?>">
                                    <input type="hidden" name="" value="<?php echo $productos['Rif'] ?>">

                                    <p><strong>Proveedor de compra:</strong>
                                        <select name="proveedor" id="proveedor" > 
                                            <option disabled="disabled" value="<?php echo $productos['Rif'] ?>" selected>Selecciona proveedor</option>                         
                                            <option value="<?php echo $productos['Rif'] ?>"><?php echo $productos['Nombre_proveedor'] ?></option>                                           
                                        </select>
                                    </p>
                                    <p><strong>Cantidad de compra: </strong><input type="text" name="cantidad" id="cantidad"></p>
                                    <p><strong>Precio de compra: </strong><input type="text" name="precio" id="precio"></p>
                                    <input type="submit" value="Comprar" class="btn btn-primary">
                                </form>
                               
                            <?php  break; endforeach; ?>
<br>
                            <a href="../controlador/VistaCompra.php" class="btn btn-secondary">Volver</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>