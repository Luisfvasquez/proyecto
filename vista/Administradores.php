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
  <a href="../vista/VistaAdmin.php">Volver</a>
  <h1>Gestionar administradores</h1>



  <table>
    <tr>
      <th>Cedula</th>
      <th>Nombre</th>
      <th>Correo</th>
      <th>Telefono</th>
      <th>Rol</th>
      <th>Foto</th>
    </tr>

    <?php foreach ($matriz as $administradores) : ?>

      <tr>
        <td><?php echo $administradores["Cedula"]; ?></td>
        <td><?php echo $administradores["Nombre_admin"]; ?></td>
        <td><?php echo $administradores["Correo_admin"]; ?></td>
        <td><?php echo $administradores["Telefono_admin"]; ?></td>
        <td><?php echo $administradores["Rol"]; ?></td>
        <td>Foto</td>
        <td><a href="../controlador/ActualizarAdmin.php?cedula=<?php echo $administradores['Cedula'] ?>"><input type="button" value="Actualizar"></a></td>
        <td><a href="../controlador/ActualizarAdmin.php?cedula=<?php echo $administradores['Cedula'] ?>"><input type="button" value="Actualizar"></a></td>
         </tr>
      

     
    <?php endforeach; ?>
  </table>
  
  
</body>

</html>