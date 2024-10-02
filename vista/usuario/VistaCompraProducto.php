<?php include('Carrito.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/vistacompraproducto.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <title>Document</title>
</head>

<body>
    <?php
    //verifica que este un usuario en sesion
    if (!isset($_SESSION['usuario'])) {
        header("location:InicioSesion.php");
    }
    echo $mensaje;
    ?>
    <a href="../controlador/VistaUsuario.php" class="btn btn-success">Volver</a>

    <h1>Compra del producto</h1>


    <h2>Carrito</h2>
    <div>
        <div>
            <?php if (isset($_SESSION['carrito'])) { ?><!-- verifica si hay productos en el carrito -->
                <table>
                    <tr>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Total</th>
                        <th>--</th>
                    </tr>

                    <?php $totalall = 0; ?>
                    <?php foreach ($_SESSION['carrito'] as $indice => $producto) : ?>

                        <tr>
                            <td><?php echo ($producto['nombre_producto']); ?></td>
                            <td><?php echo ($producto['cantidad']); ?></td>
                            <td><?php echo ($producto['precio']); ?></td>
                            <td><?php echo '$' . ($producto['precio'] * $producto['cantidad']); ?></td><!--Calcula el total de compra de un producto-->

                            <td><!-- elimina el producto del carrito -->
                                <form action="" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $producto['idproducto'] ?> ">
                                    <input type="submit" value="Eliminar" name="btnAccion">
                                </form>
                            </td>

                        </tr>
                        <!--   calcula el total de la compra que se realizara -->
                        <?php $totalall += $producto['precio'] * $producto['cantidad']; ?>
                    <?php endforeach; ?>

                    <tr>
                        <td colspan="3" align="right">
                            <h2>Total</h2>
                        </td>
                        <td align="right"><?php echo '$' . $totalall ?></td>
                        <td></td>
                    </tr>
                </table>
            <?php } else { ?>
                <div>
                    No hay productos en el carrito
                </div>
            <?php } ?>
        </div>
    </div>

    <h3>Finalizar compra</h3>
    <div class="contenedor">
        <div class="registro">

            <form action="../controlador/VentaProducto.php" method="post">

                <label for="">Metodo de pago</label>

                <select name="metodo_id" id="metodo_id">
                    <option selected disabled="">--Selecciona Metodo--</option>
                    <?php foreach ($metodo as $metodos): ?>
                        <option <?php if (empty($_SESSION['carrito'])) {
                                    echo "disabled";
                                } ?> value="<?php echo $metodos['idMetodo']; ?>"><?php echo $metodos['Metodo']; ?></option>
                        <?php $opcion = $metodos['idmetodo'] ?>
                    <?php endforeach ?>
                </select>

                <p id="Ptarjeta">Digite el numero de tarjeta</p>
                <input type="text" name="tarjeta" id="Itarjeta" value="" minlength="13" maxlength="18"  pattern="\d*" title="Solo se permiten números" placeholder="Numeros de tarjeta">
                <p id="Ppassword">Digite contraseña</p>
                <input type="password" name="tarjeta" id="Ipassword" value="" minlength="4" maxlength="6"  pattern="\d*" title="Solo se permiten números" placeholder="Contraseña">

                <input type="submit" value="Finalizar compra" id="boton">
            </form>
        </div>
    </div>
    <script>
        var Ptarjeta = document.getElementById('Ptarjeta');
        var Ppassword = document.getElementById('Ppassword');
        var Ipassword = document.getElementById('Ipassword');
        var Itarjeta = document.getElementById('Itarjeta');
        var metodo = document.getElementById('metodo_id');
        Ptarjeta.style.display = 'none';
                Ppassword.style.display = 'none';
                Ipassword.style.display = 'none';
                Itarjeta.style.display = 'none';
        metodo.addEventListener('change', function() {
            if (metodo.value == 1) {
                Ptarjeta.style.display = 'block';
                Ppassword.style.display = 'block';
                Ipassword.style.display = 'block';
                Itarjeta.style.display = 'block';
            } else {
                Ptarjeta.style.display = 'none';
                Ppassword.style.display = 'none';
                Ipassword.style.display = 'none';
                Itarjeta.style.display = 'none';
            }
        });
    </script>





</body>

</html>