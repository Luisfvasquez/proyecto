<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
</head>

<body>

    <form action="../controlador/RegistroUsuarios.php" method="POST">
        <table>
            <tr>
                <td>
                    <input type="text" name="cedula">
                </td>
                <td>
                    <input type="text" name="nombre">
                </td>
                <td>
                    <input type="text" name="correo">
                </td>
                <td>
                    <input type="text" name="contrasena">
                </td>
                <td>
                    <input type="submit" value="Registrar">
                </td>
            </tr>
        </table>

    </form>
    <br>
    <br>


    <table border="1">
        <tr>
            <td>Cedula</td>
            <td>Nombre</td>
            <td>Correo</td>
            <td>Contraseña</td>
            <td>Editar</td>
            <td>Borrar</td>
            <td>Actualizar</td>
        </tr>


        <?php foreach ($matriz as $registro) :
        ?>
            <form action="../controlador/ActualizarUsuarios.php" method="post" id="formulario">

                <tr>
                    <td><input type="text" name="cedula" id="cedula" disabled value="<?php echo $registro["CEDULA_USUARIO"] ?>"></td>
                    <td><input type="text" name="nombre" id="nombre" disabled value="<?php echo $registro["NOMBRE_USUARIO"] ?>"></td>
                    <td><input type="text" name="correo" id="correo" disabled value="<?php echo $registro["CORREO"] ?>"></td>
                    <td><input type="text" name="contrasena" id="contrasena" disabled value="<?php echo $registro["CONTRASENA"] ?>"></td>
                    <td><input type="button" value="editar" id="editar" name="editar"></td>
                    <td><a href="../controlador/BorrarUsuarios.php?cedula=<?php echo $registro['CEDULA_USUARIO'] ?>">Borrar</a></td>
                    <td><input type="submit" value="Actualizar"> </td>
                   
                </tr>
            </form>
        <?php endforeach; ?>
        </tr>

    </table>
    
    <script src="../vista/validacion.js"></script>
</body>

</html>