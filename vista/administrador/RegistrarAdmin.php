<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Usuario</title>
    <link rel="stylesheet" href="../../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/vistaadmin.css">
</head>

<body>
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
        header("location:../InicioSesion.php");
    }


    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col">
                
                <a href="../../controlador/GestionAdmin.php" class="btn btn-primary">Volver</a>
            </div>
        </div>

        <div class="row mt-4">
            <div class="col">
                <h1>Registro Usuario</h1>
                <form action="../../controlador/RegistrarAdmin.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="Cedula">Cedula</label>
                        <input type="text" class="form-control" id="cedula" name="cedula"  value="">
                    </div>
                    <div class="form-group">
                        <label for="Nombre">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="">
                    </div>
                    <div class="form-group">
                        <label for="Contrasena">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena" name="contrasena" value="">
                    </div>
                    <div class="form-group">
                        <label for="Email">Correo</label>
                        <input type="email" class="form-control" id="correo" name="correo" value="">
                    </div>
                    <div class="form-group">
                        <label for="Telefono">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono"  value="">
                    </div>
                    <div class="form-group">
                        <label for="imagen">Foto</label>
                        <input type="file" class="form-control-file" id="imagen" name="imagen">
                        <br>
                         </div>
                    <button type="submit" class="btn btn-primary">Registrar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
