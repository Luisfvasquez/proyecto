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

   <a href="../controlador/GestionAdmin.php">Volver</a>

    <h1>Actualizar datos </h1>
    
   
    <form action='../controlador/ActualizarAdmin.php' method='post' enctype='multipart/form-data' >
         <label for="">Cedula</label>  
         <input type="text" name="Cedula_admin" id="" readonly value="<?php  echo $datos['Cedula_Admin'] ?>">
         <br>
         <label for="">Nombre</label>  
         <input type="text" name="Nombre_admin" id="" value="<?php echo $datos['Nombre_admin'] ?>">
         <br>
         <label for="">Correo</label>  
         <input type="text" name="Correo_admin" id="" value="<?php  echo $datos['Correo_admin']?>">
         <br>
         <label for="">Telefono</label>  
         <input type="text" name="Telefono_admin" id="" value="<?php echo $datos['Telefono_admin'] ?>">
         <br>
         <label for="">Rol</label>  
         <input type="text" name="" id="" readonly value="<?php echo $datos['Rol_id'] ?>">
         <br>
         <label for="">Foto</label>  
        <input type="file" name="imagen" id="" value="<?php $datos['Foto_admin'] ?>">
        <br>
        <input type="image" src="/intranet/uploads/<?php echo $datos["Foto_admin"]?>" alt="" width='200px'>
         <br>
        <input type="submit" value="Actualizar">

         </form>

  
</body>

</html>