<?php
    include ('Carrito.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/inicio.css">
    <script src="https://kit.fontawesome.com/e29979f2de.js" crossorigin="anonymous"></script>
    <title>Inicio usuario</title>
</head>

<body>
    
    <?php

    if (!isset($_SESSION['usuario'])) {
        header("location:InicioSesion.php");
    }
    ?>


    <header>
        <div class="logo">
            <img src="../imgs/Huauu2.png" alt="Logo ">
        </div>
        <nav>
            <ul>

                <li><a href="../controlador/CierreSesion.php">Cerrar Sesion</a></li>
                <li><a href="../vista/usuario/Perfil.php">Perfil</a></li>

                <li>
                <a href="../controlador/VistaCompraProducto.php">Carrito(<?php
                echo(empty($_SESSION['carrito']))?0:count($_SESSION['carrito']);
                ?>)</a>
                </li>

            </ul>
        </nav>
        <div>

        </div>
    </header>

    <!--BANNER-->
    <section class="banner">
        <div class="slider">
            <img src="../imgs/banner1.jpg" alt="Descripción de la imagen 1">
            <img src="../imgs/banner2.jpg" alt="Descripción de la imagen 2">
        </div>
        <div class="texto-boton">
            <h2>lo mejor para tu mascota<br>porque sabemos cuanto los quieres</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nec laoreet justo. Nullam non augue et
                ligula varius consequat.</p>
            <button>comprar!</button>
        </div>
        <img src="https://img.icons8.com/?size=100&id=37224&format=png&color=000000" class="prev" style="height: 20px;"></img>
        <img src="https://img.icons8.com/?size=100&id=37225&format=png&color=000000" class="next" style="height: 20px;"></img>
    </section>

    <div>
        <?php  if($mensaje!=""):?>
        <?php echo $mensaje; ?>
        <a href="../controlador/VistaCompraProducto.php">Ver carrito</a>
        <?php endif; ?>
    </div>

    <div class="cartas">
        <?php foreach ($matriz as $producto) : ?>
            <div class="card" style="width: 18rem;">
                <img src="/proyecto-v1/imgs/<?php echo $producto['Imagen'] ?>" class="card-img-top" alt="img producto" width="100px">

                <div class="card-body">
                    <h5 class="card-title"><?php echo $producto['Nombre_producto'] ?></h5>
                    <p class="card-text"><?php echo $producto['Descripcion'] ?></p>
                    <p class="card-text">
                    <?php
                     foreach ($precio as $p) {
                        //compara si el id de la factura del metodo es igual al id de la factura de la venta
                              if ($p['Producto_id'] == $producto['IdProducto']) {
                                  echo $p['precio_maximo'];
                                  $precio_total= $p['precio_maximo'];
                                  break; // Salir del bucle una vez encontrado el método
                              }
                          }
                    
                    ?>$</p>

                    <form action="" method="post">
                        <input type="hidden" name="idproducto" id="" value="<?php echo $producto['IdProducto'] ?>">
                        <input type="hidden" name="nombre_producto" id="" value="<?php echo $producto['Nombre_producto'] ?>">
                        <input type="hidden" name="descripcion" id="" value="<?php echo $producto['Descripcion'] ?>">
                        <input type="hidden" name="precio" id="" value="<?php 
                                                                        echo $precio_total;
                                                                        ?>">
                        <input type="hidden" name="nombre_categoria" id="" value="<?php echo $producto['Nombre_categoria'] ?>">
                        <p class="card-text" >Cantidad de compra:</p>
                        <input  class="card-title" type="number" name="cantidad" id="cantidad" value="1" min="1" max="<?php 
                                                                                foreach ($cantidad as $d) {
                                                                                          if ($d['Producto_id'] == $producto['IdProducto']) {
                                                                                              echo $d['Cantidad_inventario'];
                                                                                              break; 
                                                                                          }
                                                                                      }
                                                                                ?>">
                        
                        <input type="submit" value="Agregar al carrito" class="btn btn-primary" name="btnAccion">
                    </form>
                    
                </div>
                <div class="card-footer">
                    <small class="text-body-secondary">Id del producto:<?php echo $producto['IdProducto'] ?></small><br>
                    <small class="text-body-secondary">categoria:<?php echo $producto['Nombre_categoria'] ?></small>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


    <footer>
        <footer class="footer">
            <div class="container">
                <div class="footer-top">
                    <div class="logo">
                        <img src="../imgs/Huauu2.png" alt="Logo de AC Tejiendo Redes">
                    </div>
                    <div class="informacion-contacto">
                        <p><strong>Huauu.C.A</strong></p>
                        <p>Carrera 21 entre calles 29 y 30</p>
                        <p>Barquisimeto, Lara. Venezuela</p>
                        <p>+58 0412-809-3019</p>
                        <p>diegor@gmail.com</p>
                    </div>
                    <div class="redes-sociales">
                        <a href="#" target="_blank"><i class="fab fa-facebook-f fa-2xl"></i></a>
                        <a href="#" target="_blank"><i class="fa-brands fa-whatsapp fa-2xl"></i></a>
                        <a href="#" target="_blank"><i class="fab fa-instagram fa-2xl"></i></a>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; 2024 HUAUU. </p>
                </div>
            </div>
        </footer>

    </footer>
   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="../estilos/inicio.js"></script>

       
             
</body>

</html>