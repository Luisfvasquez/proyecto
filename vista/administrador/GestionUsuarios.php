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
    header("location:../InicioSesion.php");
  }
  ?>
  <a href="../vista/administrador/VistaAdmin.php">Volver</a>
  <h1>Gestionar Usuarios</h1>



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
        <td><?php echo $administradores["Cedula"]; ?> </td>
        <td><?php echo $administradores["Nombre_usuario"]; ?></td>
        <td><?php echo $administradores["Correo"]; ?></td>
        <td><?php echo $administradores["Telefono"]; ?></td>
        <td><?php echo $administradores["Rol"]; ?></td>
        <td><input type="image" src="/intranet/uploads/<?php echo $administradores["imagen"]?>" alt="" width='200px'> </td>
        <td><a href="../controlador/ConsultaActualizarUsuario.php?cedula=<?php echo $administradores['Cedula'] ?>"><input type="button" value="Actualizar"></a></td>
        <td><a href="../controlador/BorrarUsuarios.php?cedula=<?php echo $administradores['Cedula'] ?>"><input type="button" value="Borrar"></a></td>
      </tr>



    <?php endforeach; ?>
  </table>


</body>

</html>