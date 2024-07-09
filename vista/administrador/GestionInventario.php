<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion inventaio</title>
</head>
<body>
    
    <?php 
   
session_start();
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>
  
    
        <a href="../vista/administrador/VistaAdmin.php">Volver</a>

        <h1>Productos</h1>
        
        <?php foreach($matriz as $producto): ?>
    <table>
        <tr>
            <td>Producto Id</td>       
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Categoria</td>
            <td>Status</td>
            <td>Imagen</td>
        </tr>
        <tr>
            <td>
                <?php echo $producto['IdProducto'] ?>
            </td>
            <td>
                <?php echo $producto['Nombre_producto'] ?>
            </td>
           
            <td>
                <?php echo $producto['Descripcion'] ?>
            </td>
            
            <td>
                <?php echo $producto['Categoria_id'] ?>
            </td>
            
            <td>
                <?php echo $producto['Status'] ?>
            </td>

            <td >
               <img src="/intranet/uploads/<?php echo $producto['Imagen'] ?>" alt="" width="100px"> 
        </td>

            <td>
            <a href="../controlador/ConsultaActualizarProducto.php?id=<?php echo $producto['IdProducto'] ?>"><button>Editar</button></a>
            </td>
        </tr>
      
    </table>
        <?php  endforeach; ?>

        
</body>
</html>