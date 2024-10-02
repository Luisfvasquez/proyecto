-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 10-09-2024 a las 02:45:34
-- Versión del servidor: 8.0.30
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `huauu`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int NOT NULL,
  `Nombre_categoria` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `Nombre_categoria`) VALUES
(1, 'Perro'),
(2, 'Gato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int NOT NULL,
  `Proveedor_rif` int NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`IdCompra`, `Proveedor_rif`, `Fecha`) VALUES
(1, 29839550, '2024-09-09 20:49:14'),
(2, 29839550, '2024-09-09 20:49:35'),
(3, 29839550, '2024-09-09 20:50:16'),
(4, 29839550, '2024-09-09 20:54:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_compra`
--

CREATE TABLE `detalles_compra` (
  `Compra_id` int NOT NULL,
  `Producto_id` int NOT NULL,
  `Cantidad_compra` int NOT NULL,
  `Precio_producto` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_compra`
--

INSERT INTO `detalles_compra` (`Compra_id`, `Producto_id`, `Cantidad_compra`, `Precio_producto`) VALUES
(1, 1, 10, 10.00),
(2, 2, 10, 10.00),
(3, 3, 10, 15.00),
(4, 4, 8, 15.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_factura`
--

CREATE TABLE `detalles_factura` (
  `Factura_Id` int NOT NULL,
  `Producto_Id` int NOT NULL,
  `Cantidad_producto` int NOT NULL,
  `Precio_unitario` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_factura`
--

INSERT INTO `detalles_factura` (`Factura_Id`, `Producto_Id`, `Cantidad_producto`, `Precio_unitario`) VALUES
(1, 1, 1, 13.00),
(1, 3, 2, 19.50),
(2, 2, 2, 13.00),
(2, 4, 1, 19.50),
(3, 1, 1, 13.00),
(3, 3, 1, 19.50),
(4, 3, 4, 19.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `IdFactura` int NOT NULL,
  `Usuario_cedula` int NOT NULL,
  `Fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Referencia` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `factura`
--

INSERT INTO `factura` (`IdFactura`, `Usuario_cedula`, `Fecha`, `Referencia`) VALUES
(1, 28329308, '2024-09-07 21:01:39', 4810),
(2, 28329308, '2024-09-09 21:02:16', 8824),
(3, 30995987, '2024-09-05 21:10:21', 9156),
(4, 30995987, '2024-09-02 21:11:03', 3826);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE `inventario` (
  `Producto_id` int NOT NULL,
  `Cantidad_inventario` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`Producto_id`, `Cantidad_inventario`) VALUES
(1, 8),
(2, 8),
(3, 3),
(4, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodopago_factura`
--

CREATE TABLE `metodopago_factura` (
  `Factura_id` int NOT NULL,
  `MetodoPago_id` int NOT NULL,
  `Monto_total` double(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodopago_factura`
--

INSERT INTO `metodopago_factura` (`Factura_id`, `MetodoPago_id`, `Monto_total`) VALUES
(1, 1, 52.00),
(2, 2, 45.50),
(3, 2, 32.50),
(4, 1, 78.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `idMetodo` int NOT NULL,
  `Metodo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `metodo_de_pago`
--

INSERT INTO `metodo_de_pago` (`idMetodo`, `Metodo`) VALUES
(1, 'Tarjeta'),
(2, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int NOT NULL,
  `Categoria_id` int NOT NULL,
  `Nombre_producto` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Imagen` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `Categoria_id`, `Nombre_producto`, `Descripcion`, `Imagen`, `Status`) VALUES
(1, 2, 'Shampoo Gatos', 'Buenisimo para el pelo', 'ShampooGato.png', 1),
(2, 1, 'Shampoo Perros', 'Buenisimo para el pelo', 'ShampooPerro.png', 1),
(3, 1, 'Comida Perros', 'Muy rica ñomi ñomi', 'ComidaPerro.png', 1),
(4, 2, 'Comida Gatos', 'Muy rica ñomi ñomi', 'ComidaGato.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `Rif` int NOT NULL,
  `Nombre_proveedor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Correo` varchar(525) COLLATE utf8mb4_general_ci NOT NULL,
  `Direccion` varchar(100) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`Rif`, `Nombre_proveedor`, `Correo`, `Direccion`) VALUES
(29839550, 'Pepsi', 'correo@gmail.com', 'La costa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `Id` int NOT NULL,
  `Rol` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`Id`, `Rol`) VALUES
(2, 'Admin'),
(3, 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `Cedula` int NOT NULL,
  `Contrasenia` varchar(250) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Nombre_usuario` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Telefono` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Correo` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Rol_id` int NOT NULL,
  `imagen` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Cedula`, `Contrasenia`, `Nombre_usuario`, `Telefono`, `Correo`, `Rol_id`, `imagen`) VALUES
(28329308, '$2y$10$3FpHAoeRqZ5jWimKdWTlHuKbhBcbhgu1a9pHjZAyIILei6KDwXIaO', 'jose', '04145018145', 'fasd@gasd.com', 3, 'persona3.png'),
(29873955, '$2y$10$6852BNXk/p5wg/JCXP/0kuo5d1.Y4vq/NC8G/gA3jM9KV3Q9fmcIe', 'Luis', '04145018145', 'wueyluis@gmail.com', 2, 'persona3.png'),
(30995987, '$2y$10$4giOgjFcKUDDOv0jb7zi2O3HW43D.r7JmwhUPMqw8/an6Qjlw5BYW', 'Diego', '04128093019', 'DiegoRodrigues@gmail.com', 3, 'persona3.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `Proveedor_rif` (`Proveedor_rif`);

--
-- Indices de la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD KEY `Producto_id` (`Producto_id`),
  ADD KEY `Compra_id` (`Compra_id`);

--
-- Indices de la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD KEY `Factura_Id_2` (`Factura_Id`),
  ADD KEY `Producto_Id_2` (`Producto_Id`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`IdFactura`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD KEY `Producto_id` (`Producto_id`);

--
-- Indices de la tabla `metodopago_factura`
--
ALTER TABLE `metodopago_factura`
  ADD KEY `MetodoPago_id` (`MetodoPago_id`),
  ADD KEY `Factura_id` (`Factura_id`);

--
-- Indices de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`idMetodo`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `Categoria_id` (`Categoria_id`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`Rif`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Cedula`),
  ADD KEY `Rol_id` (`Rol_id`),
  ADD KEY `Rol_id_2` (`Rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `IdCompra` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `IdFactura` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `idMetodo` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `Id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`Proveedor_rif`) REFERENCES `proveedor` (`Rif`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_compra`
--
ALTER TABLE `detalles_compra`
  ADD CONSTRAINT `detalles_compra_ibfk_1` FOREIGN KEY (`Compra_id`) REFERENCES `compra` (`IdCompra`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_compra_ibfk_2` FOREIGN KEY (`Producto_id`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalles_factura`
--
ALTER TABLE `detalles_factura`
  ADD CONSTRAINT `detalles_factura_ibfk_2` FOREIGN KEY (`Producto_Id`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalles_factura_ibfk_3` FOREIGN KEY (`Factura_Id`) REFERENCES `factura` (`IdFactura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `inventario`
--
ALTER TABLE `inventario`
  ADD CONSTRAINT `inventario_ibfk_1` FOREIGN KEY (`Producto_id`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `metodopago_factura`
--
ALTER TABLE `metodopago_factura`
  ADD CONSTRAINT `metodopago_factura_ibfk_2` FOREIGN KEY (`MetodoPago_id`) REFERENCES `metodo_de_pago` (`idMetodo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `metodopago_factura_ibfk_3` FOREIGN KEY (`Factura_id`) REFERENCES `factura` (`IdFactura`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`Categoria_id`) REFERENCES `categoria` (`idCategoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`Rol_id`) REFERENCES `rol` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
