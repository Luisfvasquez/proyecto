<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/vistacompraproducto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
    <?php
    session_start();
    if (!isset($_SESSION['usuario'])) {
        header("location:InicioSesion.php");
    }
    ?>
    <a href="../controlador/VistaUsuario.php">Volver</a>

    <h1>Compra del producto</h1>


    <h2>carrito</h2>

    <h3>Finalizar compra</h3>
    <div class="contenedor">
        <div class="registro">
            <form action="../controlador/CompraProducto.php" method="post">
                <label for="">Usuario</label>
                <input type="text" name="cedula" readonly id="cedula" value="<?php echo $_SESSION['usuario'] ?>">
                <br>
                <label for="">Producto</label>
                <input type="text" name="producto_id" id="producto_id" value="<?php echo $_GET["idproducto"] ?>"
                    readonly>
                <br>
                <label for="">Cantidad</label>
                <input type="number" name="cantidad" id="cantidad" value="1">
                <br>
                <label for="">Precio</label>
                <input type="text" name="precio_unitario" id="precio_unitario" value="<?php echo $_GET["precio"] ?>"
                    readonly>
                <br>
                <label for="">Metodo de pago</label>
                <select name="metodo_id" id="metodo_id">
                    <option selected disabled="">--Selecciona Metodo--</option>
                    <?php foreach ($metodo as $metodos): ?>
                        <br>
                        <option value="<?php echo $metodos["idMetodo"] ?>"><?php echo $metodos['Metodo'] ?></option>
                    <?php endforeach ?>
                </select>
                <br>
                <input type="submit" value="Comprar" id="boton">
            </form>
        </div>
    </div>






</body>

</html>