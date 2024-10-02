<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/vistaadmin.css">
    <title>Actualizar Administrador</title>
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">

</head>

<body>
<header>
        
        <a href="../vista/administrador/VistaAdmin.php"><img src="../imgs/Huauu2.png" alt="loho"></a>
       <p class="color"><a href="../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
        
    </header>
    <?php
    session_start();
    if (!isset($_SESSION['admin'])) {
        header("location:../InicioSesion.php");
    }


    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                
                <a href="../controlador/GestionAdmin.php" class="btn btn-primary">Volver</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h1>Actualizar Datos del Administrador</h1>
                <form action="../controlador/ActualizarAdmin.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Cedula">Cedula</label>
                        <input type="text" class="form-control" id="Cedula" name="Cedula" readonly value="<?php echo $datos['Cedula'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="Nombre" name="Nombre" value="<?php echo $datos['Nombre_usuario'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="Correo">Correo</label>
                        <input type="text" class="form-control" id="Correo" name="Correo" value="<?php echo $datos['Correo'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="text" class="form-control" id="Telefono" name="Telefono" value="<?php echo $datos['Telefono'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="Rol">Rol</label>
                        <input type="text" class="form-control" id="Rol" name="Rol" readonly value="<?php echo $datos['Rol_id'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Foto</label>
                        <input type="hidden" name="imagenAnterior" value="<?php echo $datos['imagen'] ?>">
                      
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                        <br>
                        <img src="/proyecto-v1/imgs/<?php echo $datos['imagen'] ?>" alt="Imagen del administrador" width="200px">
                    </div>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
