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
         <input type="text" name="Cedula" id="" readonly value="<?php  echo $datos['Cedula'] ?>">
         <br>
         <label for="">Nombre</label>  
         <input type="text" name="Nombre" id="" value="<?php echo $datos['Nombre'] ?>">
         <br>
         <label for="">Correo</label>  
         <input type="text" name="Correo" id="" value="<?php  echo $datos['Correo']?>">
         <br>
         <label for="">Telefono</label>  
         <input type="text" name="Telefono" id="" value="<?php echo $datos['Telefono'] ?>">
         <br>
         <label for="">Rol</label>  
         <input type="text" name="" id="" readonly value="<?php echo $datos['Rol_id'] ?>">
         <br>
         <label for="">Foto</label>  
        <input type="file" name="imagen" id="" value="<?php $datos['imgen'] ?>">
        <br>
        <input type="image" src="/intranet/uploads/<?php echo $datos["imagen"]?>" alt="" width='200px'>
         <br>
        <input type="submit" value="Actualizar">

         </form>

  
</body>

</html>