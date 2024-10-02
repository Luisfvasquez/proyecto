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
       <p class="color"><a href="../controlador/CierreSesion.php">Cerrar Sesion</a></p> 
        
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
                  <th>Rif</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Direccion</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($proveedores as $proveedor) : ?>
                  <tr>
                    <td><?php echo $proveedor["Rif"]; ?></td>
                    <td><?php echo $proveedor["Nombre_proveedor"]; ?></td>
                    <td><?php echo $proveedor["Correo"]; ?></td>
                    <td><?php echo $proveedor["Direccion"]; ?></td>
                    <td>
                      <a href="../controlador/BorrarProveedor.php?id=<?php echo $proveedor['Rif']; ?>" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>

            <h3>Agregar Proveedor</h3>
            <form action="../controlador/AgregarProveedor.php" method="post">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>Rif</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Direccion</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><input required type="text" name="rif" id="rif"></td>
                    <td><input required type="text" name="nombre" id="nombre"></td>
                    <td><input required type="email" name="correo" id="correo"></td>
                    <td><input required type="text" name="direccion" id="direccion"></td>
                    <td>
                      <input type="submit" value="Agregar" class="btn btn-secondary btn-sm">
                    </td>
                  </tr>
                </tbody>
              </table>
            </form>

            <div class="text-center">

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