<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gestión de Usuarios</title>
  <link rel="stylesheet" href="../estilos/bootstrap.min.css">
</head>

<body class="bg-light">
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
            <h1 class="card-title">Gestionar Categoria</h1>
          </div>
          <div class="card-body">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nombre</th>
                  
                </tr>
              </thead>
              <tbody>
                <?php foreach ($categorias as $categoria) : ?>
                  <tr>
                    <td><?php echo $categoria["idCategoria"]; ?></td>
                    <td><?php echo $categoria["Nombre_categoria"]; ?></td>
                    <td>
                      <a href="../controlador/BorrarCategorias.php?id=<?php echo $categoria['idCategoria']; ?>" class="btn btn-danger btn-sm">Borrar</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
            <h3>Agregar Categorias</h3>
                <form action="../controlador/AgregarCategoria.php" method="post">
                <table class="table table-striped">
              <thead>
                <tr>
                  <th>Nombre</th>
                  
                </tr>
              </thead>
              <tbody>
            
                  <tr>
                    <td><input required type="text" name="nombre" id="nombre"></td>
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
