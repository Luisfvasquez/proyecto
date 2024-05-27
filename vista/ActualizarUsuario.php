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
        if (!isset($_SESSION['admin'])) {
            header("location:InicioSesion.php");
        }
        ?>

   <a href="../controlador/GestionUsuarios.php">Volver</a>

    <h1>Actualizar datos </h1>
    
   
    <form action='../controlador/ActualizarUsuarios.php' method='post' enctype='multipart/form-data' >
         <label for="">Cedula</label>  
         <input type="text" name="Cedula_usuario" id="" readonly value="<?php  echo $datos['Cedula_usuario'] ?>">
         <br>
         <label for="">Nombre</label>  
         <input type="text" name="Nombre_usuario" id="" value="<?php echo $datos['Nombre_usuario'] ?>">
         <br>
         <label for="">Correo</label>  
         <input type="text" name="Correo_usuario" id="" value="<?php  echo $datos['Correo_usuario']?>">
         <br>
         <label for="">Telefono</label>  
         <input type="text" name="Telefono_usuario" id="" value="<?php echo $datos['Telefono_usuario'] ?>">
         <br>
         <label for="">Rol</label>  
         <input type="text" name="" id="" readonly value="<?php echo $datos['Rol_id'] ?>">
         <br>
         <label for="">Foto</label>  
        <input type="file" name="imagen" id="" value="<?php $datos['Foto_usuario'] ?>">
        <br>
        <input type="image" src="/intranet/uploads/<?php echo $datos["Foto_usuario"]?>" alt="" width='200px'>
         <br>
        <input type="submit" value="Actualizar">

         </form>

  
</body>

</html>