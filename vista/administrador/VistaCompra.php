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
    if(!isset($_SESSION['admin']) ){
        header("location:../InicioSesion.php");
    }
    ?>

      <a href="../vista/administrador/VistaAdmin.php">Volve</a>      
        <h1>Registro de compra de los productos</h1>

      <form action="../controlador/RegistroProductos.php" method="post" enctype="multipart/form-data">
        
        <label for="">Proveedor</label>
        <input type="text" readonly name="proveedor" id="proveedor" placeholder="Ingrese Proveedor" value="29839550">
        <br>
        <label for="">Nombre del producto</label>
        <input type="text" name="nombre_producto" id="nombre_producto" placeholder="Nombre del producto">
        <br>
        <label for="">Descripcion</label>
        <input type="text" name="descripcion" id="descripcion" placeholder="Descripcion">
        <br>
        <label for="">Categoria</label>
       

        <select name="categoria_id" id="categoria_id" >
          <option selected disabled >Seleccionar categoria</option>
          <?php foreach($matriz as $categorias): ?>
            <br>
            <option value="<?php echo $categorias["idCategoria"] ?>"><?php echo $categorias["Nombre_categoria"] ?></option>
            <?php endforeach; ?>
        </select>
        

          

        <br>
        <label for="">Imagen</label>
        <input type="file" name="imagen" id="imagen" value="imagen">
        <br>
        <label for="">Mostrar en Stock</label>
        <input type="checkbox" name="status" id="status" value="1">
        <br>
        <label for="">Precio</label>
        <input type="text" name="precio" id="precio" placeholder="Precio">
        <br>
        <label for="">Cantidad</label>
        <input type="text" name="cantidad" id="cantidad" placeholder="Cantidad">
        <br>

            <input type="submit" value="Registrar Compra">

      </form>


</body>
</html>