<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../estilos/bootstrap.min.css">
    <link rel="stylesheet" href="../estilos/vistaadmin.css">
</head>
<?php
 require_once("../modelo/Conexion.php");
    $conexion=Conexion::conexion();
    if(!isset($_POST['PrecioDesde'])){$_POST['PrecioDesde']="";};
    if(!isset($_POST['PrecioHasta'])){$_POST['PrecioHasta']="";};
    if(!isset($_POST['FechaDesde'])){$_POST['FechaDesde']="";};
    if(!isset($_POST['FechaHasta'])){$_POST['FechaHasta']="";};
    if(!isset($_POST['order'])){$_POST['order']="";};
    if(!isset($_POST['BuscarCategoria'])){$_POST['BuscarCategoria']="";};


?>
<body>
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
        <div class="row">
            <div class="col">
                <a href="../vista/administrador/VistaAdmin.php" class="btn btn-primary">Volver</a>
            </div>
        </div>
     
        <h2>Generar reporte con filtro</h2>
        <div class="row">            
            <div class="col">
               <form action="<?php $_SERVER['PHP_SELF'] ?>" method="POST">
                <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Categoria
                                    <select name="BuscarCategoria" id="" class="form-conytol mt-2"> 
                                        <?php if($_POST['BuscarCategoria']!=""): ?>
                                            <option value="<?php echo $_POST['BuscarCategoria']?>"><?php echo $_POST["BuscarCategoria"] ?></option>
                                        <?php endif; ?>
                                            <option value="">Todos</option>                                   
                                        <option value="Perro">Perro</option>                                   
                                        <option value="Gato">Gato</option>                                   
                                    </select>
                                </th>
                                <th>Precio Desde
                                    <input type="text" name="PrecioDesde" id="">
                                </th>
                                <th>Precio Hasta
                                <input type="text" name="PrecioHasta" id="">
                                </th>
                                <th>Fecha Desde
                                <input type="date" name="FechaDesde" id="">
                                </th>
                                <th>Fecha Hasta
                                <input type="date" name="FechaHasta" id="">
                                </th>
                                <th>Orderar por
                                <select name="order" id="">
                                    <?php if($_POST['order']!=""){ ?>
                                        <option value="<?php echo $_POST["order"] ?>">
                                        <?php
                                            if($_POST["order"]=="1"){echo "Precio de Mayor a menor";}
                                            if($_POST["order"]=="2"){echo "Precio Menor a mayor";}
                                            if($_POST["order"]=="3"){echo "Fecha Mayor a menor";}
                                            if($_POST["order"]=="4"){echo "Fecha Menor a mayor";}
                                            if($_POST["order"]=="5"){echo "Factura Mayor a menor";}
                                            if($_POST["order"]=="6"){echo "factura Menor a mayor";}
                                            if($_POST["order"]=="7"){echo "Cantidad Mayor a menor";}
                                            if($_POST["order"]=="8"){echo "Cantidad Menor a mayor";}
                                        ?>
                                        </option>
                                    <?php }; ?>
                                        <option value="">Todos</option>
                                        <option value="1">Precio de Mayor a menor</option>
                                        <option value="2">Precio Menor a mayor</option>
                                        <option value="3">Fecha Mayor a menor</option>
                                        <option value="4">Fecha Menor a mayor</option>
                                        <option value="5">IDCompra Mayor a menor</option>
                                        <option value="6">IDCompra Menor a mayor</option>
                                        <option value="7">Cantidad Mayor a menor</option>
                                        <option value="8">Cantidad Menor a mayor</option>                                      
                                    </select>
                                </th>
                            </tr>
                        </thead>                      
                    </table>     
                    <input type="submit" class="btn btn-primary" value="Ver">             
                    <?php
                    if($_POST['BuscarCategoria']=="" && $_POST['PrecioDesde']=="" && $_POST['PrecioHasta']=="" && $_POST['FechaDesde']=="" && $_POST['FechaHasta']=="" && $_POST['order']==""){
                        $instruccion = ("SELECT * FROM Detalles_compra 
                                 INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
                                 INNER JOIN Proveedor ON Compra.Proveedor_rif= Proveedor.Rif
                                INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
                                 INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria");
                     }else{
                        $instruccion = ("SELECT * FROM Detalles_compra 
                        INNER JOIN Compra ON detalles_compra.Compra_id= Compra.IdCompra
                        INNER JOIN Proveedor ON Compra.Proveedor_rif= Proveedor.Rif
                        INNER JOIN Producto ON detalles_compra.Producto_id= producto.IdProducto
                        INNER JOIN Categoria ON Producto.Categoria_id= Categoria.idCategoria" );
                     
                     //Filtros de busqueda
                        if($_POST['BuscarCategoria']!=""){
                            $instruccion.= " WHERE categoria.Nombre_categoria = '".$_POST['BuscarCategoria']."'";
                        }
                        if($_POST['FechaDesde']!=""){
                            $instruccion.= " AND compra.fecha BETWEEN '".$_POST['FechaDesde']."' AND '".$_POST['FechaHasta']."'";
                        }
                        if($_POST['PrecioDesde']!=""){
                            $instruccion.= " AND detalles_compra.Precio_producto >= '".$_POST['PrecioDesde']."'";
                        }
                        if($_POST['PrecioHasta']!=""){
                            $instruccion.= " AND detalles_compra.Precio_producto <= '".$_POST['PrecioHasta']."'";
                        }
                        //Campos del order
                        if($_POST['order']=="1"){
                            $instruccion.= " ORDER BY detalles_compra.Precio_producto DESC";
                        }
                        if($_POST['order']=="2"){
                            $instruccion.= " ORDER BY detalles_compra.Precio_producto ASC";
                        }
                        if($_POST['order']=="3"){
                            $instruccion.= " ORDER BY compra.fecha DESC";
                        }
                        if($_POST['order']=="4"){
                            $instruccion.= " ORDER BY compra.fecha ASC";
                        }
                        if($_POST['order']=="5"){
                            $instruccion.= " ORDER BY compra.IdCompra DESC";
                        }
                        if($_POST['order']=="6"){
                            $instruccion.= " ORDER BY compra.IdCompra ASC";
                        }
                        if($_POST['order']=="7"){
                            $instruccion.= " ORDER BY detalles_compra.Cantidad_producto DESC";
                        }
                        if($_POST['order']=="8"){
                            $instruccion.= " ORDER BY detalles_compra.Cantidad_producto ASC";
                        }
                    }
                    $resultado=$conexion->prepare($instruccion);
                    $resultado->execute(array());
                    while($fila=$resultado->fetch(PDO::FETCH_ASSOC)){
                        $compra[]=$fila;
                    }
                    $reporte = $instruccion;
                    ?>
                     
               </form>                
            </div>
        </div>

        
        <div class="row mt-4">
            <div class="col">
                <h2>Historial de Compra </h2>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Compra Id</th>
                            <th>Proveedor</th>
                            <th>Producto Id</th>
                            <th>Categoría</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Status</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Fecha</th>
                        </tr>
                    </thead>
                    <?php if(isset($compra)){foreach ($compra as $producto_compra) : ?>
                        
                        <?php   $fecha=date("y-m-d",strtotime($producto_compra['Fecha'])); ?>
                        <tbody>
                            <tr>
                                <td><?php echo $producto_compra['Compra_id'] ?></td>
                                <td><?php echo $producto_compra['Proveedor_rif'] ?></td>
                                <td><?php echo $producto_compra['IdProducto'] ?></td>
                                <td><?php echo $producto_compra['Nombre_categoria'] ?></td>
                                <td><?php echo $producto_compra['Nombre_producto'] ?></td>
                                <td><?php echo $producto_compra['Descripcion'] ?></td>
                                <td><?php echo $producto_compra['Status'] ?></td>
                                <td><?php echo "$" . $producto_compra['Precio_producto'] ?></td>
                                <td><?php echo $producto_compra['Cantidad_compra'] ?></td>
                                <td><?php echo $fecha ?></td>
                            </tr>
                        </tbody>
                    <?php endforeach;}else{
                        echo "No hay registros";
                    } ?>
                </table>

            </div>
        </div>

        
        <a href="../vista/administrador/ReportesCompra.php?instruccion=<?php echo $instruccion?>" class="btn btn-secondary">Reportes de Venta</a>
    </div>

    <script src="../estilos/bootstrap.bundle.min.js"></script>
</body>

</html>