<?php

session_start();
$mensaje = "";
//evalua si se envio un formulario
if (isset($_POST['btnAccion'])) {
    switch ($_POST['btnAccion']) {
        case 'Agregar al carrito':
            //Verifica un envio correcto de los datos
            if (is_numeric($_POST['idproducto'])) {
                $mensaje = "Producto agregado al carrito " . $_POST['idproducto'];
            } else {
                $mensaje = "Error: El id del producto no es un numero " . $_POST['idproducto'];
                break;
            }
            //Evalua si no se encuentra nada en el carrito
            if (!isset($_SESSION['carrito'])) {
                $producto = array( //Agrega todos los datos en un array
                    'idproducto' => $_POST['idproducto'],
                    'nombre_producto' => $_POST['nombre_producto'],
                    'descripcion' => $_POST['descripcion'],
                    'precio' => $_POST['precio'],
                    'nombre_categoria' => $_POST['nombre_categoria'],
                    'cantidad' => $_POST['cantidad']

                );
                $_SESSION['carrito'][0] = $producto; //almacena los datos en el carrito

                $mensaje = "Producto agregado al carrito";
            } else {
               
                $id = array_column($_SESSION['carrito'], 'idproducto');//obtiene todos los id de sesion
                if (in_array($_POST['idproducto'], $id)) {//verifica que no se pueda agg dos mismos productos
                    echo "<script>alert('El producto ya ha sido seleccionado')</script>";
                    $mensaje="";
                } else {
                    //En caso tal de que ya exista un producto en el carrito
                    $numeroProductos = count($_SESSION['carrito']); //Cuenta los productos en el carrito
                    $producto = array( //Agrega todos los datos en un array
                        'idproducto' => $_POST['idproducto'],
                        'nombre_producto' => $_POST['nombre_producto'],
                        'descripcion' => $_POST['descripcion'],
                        'precio' => $_POST['precio'],
                        'nombre_categoria' => $_POST['nombre_categoria'],
                        'cantidad' => $_POST['cantidad']
                    );
                    $_SESSION['carrito'][$numeroProductos] = $producto; //almacena los datos en el carrito
                    // en la siguiente posicion

                    $mensaje = "Producto agregado al carrito";
                }
            }
            // $mensaje= print_r ($_SESSION['carrito'],true);

            break;
        case "Eliminar":
            if (is_numeric($_POST['id'])) {
                $id = $_POST['id'];
                foreach ($_SESSION['carrito'] as $indice => $productos) {
                    if ($productos['idproducto'] == $id) { //Verifica si el id del producto es igual al id del producto en session
                        unset($_SESSION['carrito'][$indice]); //para eliminarlo de la sesion
                       
                    }
                }
            } else {
                $mensaje = "Id incorrecto";
            }
            break;
    }
}
