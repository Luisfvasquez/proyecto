<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
</head>
<body>
    
<?php 
    session_start();
    if(isset($_SESSION['usuario']) or isset($_SESSION['admin'])){
        header("location:InicioSesion.php");
        if(isset($_SESSION['admin'])){
            header("location:vista/administrador/VistaAdmin.php");
        }else{
            header("location:vista/usuario/VistaUsuario.php");
        }
    }   
    
    ?>
        <h2><a href="vista/InicioSesion.php">iniciar sesion</a></h2>

        <h2><a href="vista/Registro.php">Registrar</a></h2>
    <h1>productos</h1>



        
        <?php foreach($matriz as $producto): ?>
    <table>
        <tr>
            <td>Producto</td>
            <td>Categoria</td>
            <td>Nombre</td>
            <td>Descripcion</td>
            <td>Imagen</td>
            <td>Precio</td>
        </tr>
        <tr>
            <td>
                <?php echo $producto['IdProducto'] ?>
            </td>
            
            <td>
                <?php echo $producto['Nombre_categoria'] ?>
            </td>
            
            <td>
                <?php echo $producto['Nombre_producto'] ?>
            </td>

            <td>
                <?php echo $producto['Descripcion'] ?>
            </td>

            <td>
            <img src="/intranet/uploads/<?php echo $producto['Imagen']  ?>" alt="" width="100px">
             </td>

            <td >
            <?php  $precio_total=$producto['Precio_producto']+($producto['Precio_producto']*0.3) ;
                echo $precio_total;
            ?>
            </td>
            <td>
                <a href="vista/InicioSesion.php"><input type="button" value="Comprar"></a>
            </td>
            <br>
        </tr>
    </table>
        <?php  endforeach; ?>
    
</body>
</html>