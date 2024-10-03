<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title>Gestión de Usuarios</title>
  
  <link rel="stylesheet" href="../estilos/bootstrap.min.css">
  <link rel="stylesheet" href="../estilos/vistaadmin.css">
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
    header("location:../InicioSesion.php");
  }
  ?>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card shadow-sm">
          <div class="card-header">
            <h1 class="card-title">Gestionar Usuarios</h1>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Cédula</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Teléfono</th>
                  <th>Rol</th>
                  <th>Foto</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($matriz as $administrador) : ?>
                  <tr>
                    <td><?php echo $administrador["Cedula"]; ?></td>
                    <td><?php echo $administrador["Nombre_usuario"]; ?></td>
                    <td><?php echo $administrador["Correo"]; ?></td>
                    <td><?php echo $administrador["Telefono"]; ?></td>
                    <td><?php echo $administrador["Rol"]; ?></td>
                    <td><img src="/proyecto-v1/imgs/<?php echo $administrador["imagen"]; ?>" alt="Foto de perfil" style="max-width: 200px;"></td>
                    <td>
                      <a href="../controlador/ConsultaActualizarUsuario.php?cedula=<?php echo $administrador['Cedula']; ?>" class="btn btn-primary btn-sm">Actualizar</a>
                      <a href="../controlador/BorrarUsuarios.php?cedula=<?php echo $administrador['Cedula']; ?>" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="text-center">
              <a href="../vista/administrador/ReportesUsuario.php" class="btn btn-secondary">Imprimir Reportes</a>
              <a href="../vista/administrador/VistaAdmin.php" class="btn btn-primary">Volver</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
