-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-08-2016 a las 10:39:46
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `el_milagro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inventario`
--

CREATE TABLE IF NOT EXISTS `detalle_inventario` (
`perinv_id` int(11) NOT NULL,
  `inv_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `pro_cantidad_mayor` int(11) NOT NULL,
  `pro_cantidad_menor` int(11) NOT NULL,
  `fecha_guardado` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingreso`
--

CREATE TABLE IF NOT EXISTS `ingreso` (
`id_ingreso` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `numero_factura` varchar(20) NOT NULL,
  `fecha_emision` date NOT NULL,
  `fecha_actual` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `subtotal` decimal(18,2) NOT NULL,
  `igv` decimal(18,2) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
`inv_id` int(11) NOT NULL,
  `inv_descripcion` varchar(50) NOT NULL,
  `inv_ano` varchar(15) NOT NULL,
  `inv_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario`
--

INSERT INTO `inventario` (`inv_id`, `inv_descripcion`, `inv_ano`, `inv_estado`) VALUES
(1, 'Inventario PRUEBA', '2015', 1),
(2, 'nuevo asas', '2017', 1),
(3, 'Inventario El Milagro 2016', '0', 0),
(4, '1 2', '2333', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE IF NOT EXISTS `marca` (
`id_marca` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `abreviatura` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
`per_id` int(11) NOT NULL,
  `per_dni` varchar(15) NOT NULL,
  `per_nombre` varchar(100) NOT NULL,
  `per_estado` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`per_id`, `per_dni`, `per_nombre`, `per_estado`) VALUES
(1, '73031934', 'Colbert Calampa Tantachuco', 1),
(2, '73031935', 'Manuel Holguin Calampa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
`id_producto` int(11) NOT NULL,
  `codigo_producto` varchar(10) DEFAULT NULL,
  `codigo_barra` varchar(30) DEFAULT NULL,
  `id_marca` int(11) NOT NULL,
  `id_tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(50) DEFAULT NULL,
  `presentacion` varchar(30) DEFAULT NULL,
  `contenido` varchar(10) DEFAULT NULL,
  `unidad_medida` varchar(15) DEFAULT NULL,
  `fraccion` int(11) NOT NULL,
  `ult_precio_compra` decimal(18,3) DEFAULT '0.000',
  `ult_precio_venta` decimal(18,3) DEFAULT '0.000',
  `utilidad` decimal(18,2) DEFAULT '0.00',
  `estado` char(1) NOT NULL,
  `ult_modificacion` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_en_ingreso`
--

CREATE TABLE IF NOT EXISTS `producto_en_ingreso` (
`id_producto_ingreso` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_ingreso` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_costo` decimal(18,6) NOT NULL,
  `precio_venta` decimal(18,6) NOT NULL,
  `utilidad` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE IF NOT EXISTS `proveedor` (
`id_proveedor` int(11) NOT NULL,
  `razon_social` varchar(100) NOT NULL,
  `ruc` varchar(11) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `estado` char(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `razon_social`, `ruc`, `direccion`, `telefono`, `estado`) VALUES
(1, 'Perufarma', '12345678901', 'Lima 315', '123456789', '1'),
(2, 'Difarlibs', '12345678902', 'Lima 345', '1235465789', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_producto`
--

CREATE TABLE IF NOT EXISTS `tipo_producto` (
`id_tipo_producto` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `abreviado` varchar(20) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
`id_usuario` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
 ADD PRIMARY KEY (`perinv_id`), ADD KEY `inv_id` (`inv_id`), ADD KEY `per_id` (`per_id`), ADD KEY `pro_id` (`pro_id`);

--
-- Indices de la tabla `ingreso`
--
ALTER TABLE `ingreso`
 ADD PRIMARY KEY (`id_ingreso`), ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `inventario`
--
ALTER TABLE `inventario`
 ADD PRIMARY KEY (`inv_id`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
 ADD PRIMARY KEY (`id_marca`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
 ADD PRIMARY KEY (`per_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
 ADD PRIMARY KEY (`id_producto`), ADD UNIQUE KEY `codigo_producto` (`codigo_producto`,`codigo_barra`), ADD KEY `id_marca` (`id_marca`), ADD KEY `id_tipo_producto` (`id_tipo_producto`);

--
-- Indices de la tabla `producto_en_ingreso`
--
ALTER TABLE `producto_en_ingreso`
 ADD PRIMARY KEY (`id_producto_ingreso`), ADD KEY `id_producto` (`id_producto`), ADD KEY `id_ingreso` (`id_ingreso`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
 ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
 ADD PRIMARY KEY (`id_tipo_producto`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
MODIFY `perinv_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ingreso`
--
ALTER TABLE `ingreso`
MODIFY `id_ingreso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `inventario`
--
ALTER TABLE `inventario`
MODIFY `inv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
MODIFY `per_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto_en_ingreso`
--
ALTER TABLE `producto_en_ingreso`
MODIFY `id_producto_ingreso` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipo_producto`
--
ALTER TABLE `tipo_producto`
MODIFY `id_tipo_producto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_inventario`
--
ALTER TABLE `detalle_inventario`
ADD CONSTRAINT `detalle_inventario_ibfk_1` FOREIGN KEY (`inv_id`) REFERENCES `inventario` (`inv_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `detalle_inventario_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `personal` (`per_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
ADD CONSTRAINT `detalle_inventario_ibfk_3` FOREIGN KEY (`pro_id`) REFERENCES `producto` (`id_producto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ingreso`
--
ALTER TABLE `ingreso`
ADD CONSTRAINT `ingreso_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_tipo_producto`) REFERENCES `tipo_producto` (`id_tipo_producto`);

--
-- Filtros para la tabla `producto_en_ingreso`
--
ALTER TABLE `producto_en_ingreso`
ADD CONSTRAINT `producto_en_ingreso_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id_producto`),
ADD CONSTRAINT `producto_en_ingreso_ibfk_2` FOREIGN KEY (`id_ingreso`) REFERENCES `ingreso` (`id_ingreso`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
