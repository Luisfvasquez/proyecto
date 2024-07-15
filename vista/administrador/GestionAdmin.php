<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../estilos/bootstrap.min.css">
  <style>
    .avatar {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      object-fit: cover;
    }
  </style>
  <title>Gestion admin</title>
</head>

<body class="bg-light">
  <?php 
    session_start();
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>
  
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-md-10">
        <div class="card shadow-sm">
          <div class="card-header text-center">
            <h1 class="card-title">Gestionar administradores</h1>
          </div>
          <div class="card-body">
            <div class="mb-3 text-right">
              <a href="../vista/administrador/VistaAdmin.php" class="btn btn-secondary">Volver</a>
            </div>
            <table class="table table-bordered table-hover">
              <thead class="thead-dark">
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
                <?php foreach ($matriz as $administradores) : ?>
                  <tr>
                    <td><?php echo $administradores["Cedula"]; ?></td>
                    <td><?php echo $administradores["Nombre_usuario"]; ?></td>
                    <td><?php echo $administradores["Correo"]; ?></td>
                    <td><?php echo $administradores["Telefono"]; ?></td>
                    <td><?php echo $administradores["Rol"]; ?></td>
                    <td><img src="/intranet/uploads/<?php echo $administradores["imagen"] ?>" alt="" class="avatar"></td>
                    <td>
                      <a href="../controlador/ConsultaActualizarAdmin.php?cedula=<?php echo $administradores['Cedula'] ?>" class="btn btn-warning btn-sm">Actualizar</a>
                      <a href="../controlador/BorrarAdmin.php?cedula=<?php echo $administradores['Cedula'] ?>" class="btn btn-danger btn-sm">Borrar</a>
                      <a href="../vista/administrador/RegistrarAdmin.php" class="btn btn-primary btn-sm">Registrar</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <div class="text-center mt-3">
              <a href="../vista/administrador/ReportesAdmin.php" class="btn btn-primary">Imprimir reportes</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="../../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>
