-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-11-2023 a las 04:50:28
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agroshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `car_producto` varchar(255) NOT NULL,
  `car_cantidad` varchar(255) NOT NULL,
  `car_estado` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `cat_nombre` varchar(255) NOT NULL,
  `cat_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `id_compra` int(11) NOT NULL,
  `com_fechacompra` date NOT NULL,
  `com_fechapago` date NOT NULL,
  `com_subtotal` varchar(255) NOT NULL,
  `com_iva` varchar(255) NOT NULL,
  `com_descuento` varchar(255) NOT NULL,
  `com_total` varchar(255) NOT NULL,
  `com_vendedor` varchar(255) NOT NULL,
  `com_estado` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallecompra`
--

CREATE TABLE `detallecompra` (
  `id_detallecompra` int(11) NOT NULL,
  `det_cantidad` varchar(255) NOT NULL,
  `det_precio` varchar(255) NOT NULL,
  `det_iva` varchar(255) NOT NULL,
  `det_descuento` varchar(255) NOT NULL,
  `det_total` varchar(255) NOT NULL,
  `det_producto` varchar(255) NOT NULL,
  `det_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detallepedido`
--

CREATE TABLE `detallepedido` (
  `id_detallepedido` int(11) NOT NULL,
  `detp_direcciondestino` varchar(255) NOT NULL,
  `detp_cantidad` varchar(255) NOT NULL,
  `detp_total` varchar(255) NOT NULL,
  `detp_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL,
  `id_observacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilio`
--

CREATE TABLE `domicilio` (
  `id_domicilio` int(11) NOT NULL,
  `dom_calle` varchar(255) NOT NULL,
  `dom_comuna` varchar(255) NOT NULL,
  `dom_region` varchar(255) NOT NULL,
  `dom_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadopedido`
--

CREATE TABLE `estadopedido` (
  `id_estadopedido` int(11) NOT NULL,
  `etp_estado` varchar(255) NOT NULL,
  `id_productoventa` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historialcompra`
--

CREATE TABLE `historialcompra` (
  `id_historialcompra` int(11) NOT NULL,
  `hc_producto` varchar(255) NOT NULL,
  `hc_total` varchar(255) NOT NULL,
  `hc_detalle` varchar(255) NOT NULL,
  `hc_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observacion`
--

CREATE TABLE `observacion` (
  `id_observacion` int(11) NOT NULL,
  `obs_descripcion` varchar(255) NOT NULL,
  `obs_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `ped_total` varchar(255) NOT NULL,
  `ped_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL,
  `id_domicilio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `pro_imagen` varchar(255) NOT NULL,
  `pro_nombre` varchar(255) NOT NULL,
  `pro_descripcion` varchar(255) NOT NULL,
  `pro_precio` varchar(255) NOT NULL,
  `pro_stock` varchar(255) NOT NULL,
  `pro_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL,
  `id_unit` int(11) NOT NULL,
  `id_tipoproducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `pro_imagen`, `pro_nombre`, `pro_descripcion`, `pro_precio`, `pro_stock`, `pro_estado`, `id_usuario`, `id_unit`, `id_tipoproducto`) VALUES
(17, 'imagenes/174685-750-750.jpg', 'manzanas ', 'estas manzanas son exportadas de la zonas mas recondita de chile', '1000', '100', 1, 1, 5, 1),
(18, 'imagenes/platano_81df8898_230509161114_1000x692.jpg', 'platano ', 'esta es una exportacion de un pais de sudamerica ', '1000', '121', 1, 17, 2, 1),
(19, 'imagenes/Kiwi_Actinidia_deliciosa.jpg', 'kiwi', 'esta es una exportacion de un pais de europa', '2000', '231', 1, 15, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoinventario`
--

CREATE TABLE `productoinventario` (
  `id_productoinventario` int(11) NOT NULL,
  `pri_cantidad` int(11) NOT NULL,
  `pri_estado` int(10) UNSIGNED NOT NULL DEFAULT 1,
  `id_usuario` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `pri_entrada` varchar(255) NOT NULL,
  `pri_salida` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoventa`
--

CREATE TABLE `productoventa` (
  `id_productoventa` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `prv_cantidad` int(11) NOT NULL,
  `prv_total` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproducto`
--

CREATE TABLE `tipoproducto` (
  `id_tipoproducto` int(11) NOT NULL,
  `nombre_tpro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipoproducto`
--

INSERT INTO `tipoproducto` (`id_tipoproducto`, `nombre_tpro`) VALUES
(1, 'Fruta'),
(2, 'Verdura');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipousuario`
--

CREATE TABLE `tipousuario` (
  `id_tipousuario` int(11) NOT NULL,
  `tus_nombre` varchar(255) NOT NULL,
  `tus_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipousuario`
--

INSERT INTO `tipousuario` (`id_tipousuario`, `tus_nombre`, `tus_estado`) VALUES
(1, 'administrador', 1),
(2, 'productor', 1),
(3, 'comerciante', 1),
(4, 'cliente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_medida`
--

CREATE TABLE `unidad_medida` (
  `id_unit` int(11) NOT NULL,
  `unit_tipo` varchar(255) NOT NULL,
  `id_tipousuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `unidad_medida`
--

INSERT INTO `unidad_medida` (`id_unit`, `unit_tipo`, `id_tipousuario`) VALUES
(1, 'Unidad', 3),
(2, 'Kg', 3),
(3, 'Pallet', 2),
(4, 'Saco', 2),
(5, 'Caja', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `usu_nombre` varchar(255) NOT NULL,
  `usu_apellido` varchar(255) NOT NULL,
  `usu_email` varchar(255) NOT NULL,
  `usu_pass` varchar(255) NOT NULL,
  `usu_usuario` varchar(255) NOT NULL,
  `usu_telefono` varchar(255) NOT NULL,
  `usu_direccion` varchar(255) NOT NULL,
  `id_tipousuario` int(11) NOT NULL,
  `usu_estado` int(10) UNSIGNED NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `usu_nombre`, `usu_apellido`, `usu_email`, `usu_pass`, `usu_usuario`, `usu_telefono`, `usu_direccion`, `id_tipousuario`, `usu_estado`) VALUES
(1, 'admin', 'admin', 'a@a.com', '1234', 'admin', '123456789', 'a', 1, 1),
(2, 'antonio', 'varasa', 'a@el.com', '4321', 'juan', '987654321', '', 2, 1),
(15, 'kevin', 'lopez', 'a@a.cl', '54321', 'kevin', '34723894732', 'aaa', 2, 1),
(16, 'cris', 'apa', 'a@el.com', '12345', 'cris', '8943728', 'aaa', 4, 1),
(17, 'nicolas ', 'aa', 'a@el.com', '1234', 'nico', '42353465', 'aaa', 3, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`) USING BTREE,
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indices de la tabla `detallecompra`
--
ALTER TABLE `detallecompra`
  ADD PRIMARY KEY (`id_detallecompra`);

--
-- Indices de la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD PRIMARY KEY (`id_detallepedido`),
  ADD KEY `id_observacion` (`id_observacion`);

--
-- Indices de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD PRIMARY KEY (`id_domicilio`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD PRIMARY KEY (`id_estadopedido`),
  ADD KEY `id_productoventa` (`id_productoventa`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD PRIMARY KEY (`id_historialcompra`),
  ADD KEY `historialcompra_ibfk_1` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indices de la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id_observacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `producto_ibfk_2` (`id_unit`),
  ADD KEY `id_tipoproducto` (`id_tipoproducto`);

--
-- Indices de la tabla `productoinventario`
--
ALTER TABLE `productoinventario`
  ADD PRIMARY KEY (`id_productoinventario`),
  ADD KEY `productoinventario_ibfk_1` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `productoventa`
--
ALTER TABLE `productoventa`
  ADD PRIMARY KEY (`id_productoventa`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  ADD PRIMARY KEY (`id_tipoproducto`);

--
-- Indices de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  ADD PRIMARY KEY (`id_tipousuario`) USING BTREE;

--
-- Indices de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `unidad_medida_ibfk_1` (`id_tipousuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `domicilio`
--
ALTER TABLE `domicilio`
  MODIFY `id_domicilio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  MODIFY `id_estadopedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  MODIFY `id_historialcompra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id_observacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `productoventa`
--
ALTER TABLE `productoventa`
  MODIFY `id_productoventa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipoproducto`
--
ALTER TABLE `tipoproducto`
  MODIFY `id_tipoproducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tipousuario`
--
ALTER TABLE `tipousuario`
  MODIFY `id_tipousuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detallepedido`
--
ALTER TABLE `detallepedido`
  ADD CONSTRAINT `detallepedido_ibfk_1` FOREIGN KEY (`id_observacion`) REFERENCES `observacion` (`id_observacion`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `domicilio`
--
ALTER TABLE `domicilio`
  ADD CONSTRAINT `domicilio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estadopedido`
--
ALTER TABLE `estadopedido`
  ADD CONSTRAINT `estadopedido_ibfk_1` FOREIGN KEY (`id_productoventa`) REFERENCES `productoventa` (`id_productoventa`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estadopedido_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD CONSTRAINT `historialcompra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historialcompra_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `observacion`
--
ALTER TABLE `observacion`
  ADD CONSTRAINT `observacion_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unidad_medida` (`id_unit`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `producto_ibfk_3` FOREIGN KEY (`id_tipoproducto`) REFERENCES `tipoproducto` (`id_tipoproducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productoinventario`
--
ALTER TABLE `productoinventario`
  ADD CONSTRAINT `productoinventario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productoinventario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `productoventa`
--
ALTER TABLE `productoventa`
  ADD CONSTRAINT `productoventa_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `productoventa_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `unidad_medida`
--
ALTER TABLE `unidad_medida`
  ADD CONSTRAINT `unidad_medida_ibfk_1` FOREIGN KEY (`id_tipousuario`) REFERENCES `tipousuario` (`id_tipousuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
