-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2016 a las 16:06:45
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `civa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asiento`
--

CREATE TABLE IF NOT EXISTS `asiento` (
  `asi_id` int(11) NOT NULL AUTO_INCREMENT,
  `asi_viaje` int(11) NOT NULL,
  `asi_num` int(11) NOT NULL,
  `asi_estado` int(11) NOT NULL,
  `pas_tipo_documento` int(8) NOT NULL,
  `pas_dni` varchar(20) NOT NULL,
  `pas_nombre` varchar(100) NOT NULL,
  `pas_apellidos` varchar(200) NOT NULL,
  `pas_edad` int(11) DEFAULT NULL,
  `pas_sexo` varchar(20) NOT NULL,
  `pas_email` varchar(100) DEFAULT NULL,
  `pas_telefono` varchar(30) NOT NULL,
  PRIMARY KEY (`asi_id`),
  KEY `asi_viaje` (`asi_viaje`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=23 ;

--
-- Volcado de datos para la tabla `asiento`
--

INSERT INTO `asiento` (`asi_id`, `asi_viaje`, `asi_num`, `asi_estado`, `pas_tipo_documento`, `pas_dni`, `pas_nombre`, `pas_apellidos`, `pas_edad`, `pas_sexo`, `pas_email`, `pas_telefono`) VALUES
(1, 3, 1, 2, 0, '', '', '', 0, '', '', ''),
(2, 3, 2, 2, 0, '', '', '', 0, '', '', ''),
(3, 3, 3, 2, 0, '', '', '', 0, '', '', ''),
(4, 3, 4, 2, 0, '', '', '', 0, '', '', ''),
(22, 3, 36, 1, 1, '48294437', 'willy', 'apellido', 22, '', 'email', '969842087');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE IF NOT EXISTS `cargo` (
  `car_id` int(11) NOT NULL AUTO_INCREMENT,
  `car_descripcion` varchar(50) NOT NULL,
  `car_estado` int(11) NOT NULL,
  PRIMARY KEY (`car_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`car_id`, `car_descripcion`, `car_estado`) VALUES
(1, 'chofer 2', 0),
(2, 'Terramozas', 1),
(3, 'prueba_editar', 1),
(4, 'prueba', 1),
(5, 'prueba', 1),
(6, 'prueba', 1),
(7, 'asss', 1),
(8, 'as', 1),
(9, 'as', 1),
(10, 's', 1),
(11, 'as', 1),
(12, 'as', 1),
(13, 'qw', 1),
(14, 'nuevo', 1),
(15, 'nuevo', 1),
(16, 'adasd', 1),
(17, '', 1),
(18, '', 1),
(19, 'asd', 1),
(20, 'hola', 1),
(21, 'as', 1),
(22, 'as', 1),
(23, 'as', 1),
(24, 'rrr', 1),
(25, 'asas', 0),
(26, 'd', 0),
(27, 'assada', 0),
(28, '´rueba', 0),
(29, 'colberts', 0),
(30, '', 1),
(31, '', 1),
(32, '', 1),
(33, 'hola', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE IF NOT EXISTS `ciudad` (
  `ciu_id` int(11) NOT NULL AUTO_INCREMENT,
  `ciu_codigo_postal` varchar(20) NOT NULL,
  `ciu_nombre` varchar(100) NOT NULL,
  `ciu_estado` int(11) NOT NULL,
  PRIMARY KEY (`ciu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`ciu_id`, `ciu_codigo_postal`, `ciu_nombre`, `ciu_estado`) VALUES
(1, '001', 'Tarapoto', 1),
(2, '002', 'Moyobamba', 1),
(3, '003', 'Juajui', 1),
(4, '004', 'Cuzco', 1),
(5, '005', 'Arequipa', 1),
(6, '006', 'Lima', 1),
(7, '007', 'Chiclayo', 0),
(8, '12', '12s', 1),
(9, '12', '12', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pasajero`
--

CREATE TABLE IF NOT EXISTS `pasajero` (
  `pas_id` int(11) NOT NULL AUTO_INCREMENT,
  `pas_tipo_documento` varchar(20) NOT NULL,
  `pas_num_documento` varchar(20) NOT NULL,
  `pas_nombres` varchar(100) NOT NULL,
  `pas_apellidos` varchar(100) NOT NULL,
  `pas_edad` int(11) NOT NULL,
  `pas_sexo` char(1) NOT NULL,
  `pas_email` varchar(100) NOT NULL,
  `pas_telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`pas_id`),
  UNIQUE KEY `pas_num_documento` (`pas_num_documento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `pasajero`
--

INSERT INTO `pasajero` (`pas_id`, `pas_tipo_documento`, `pas_num_documento`, `pas_nombres`, `pas_apellidos`, `pas_edad`, `pas_sexo`, `pas_email`, `pas_telefono`) VALUES
(1, 'dni', '73031934', 'colbert', 'calampa', 19, 'm', '', ''),
(2, 'dni', '48294437', 'willy', 'lopez', 20, 'm', '', ''),
(3, 'dni', '71576573', 'jose', 'villanueva', 19, 'm', '', ''),
(4, 'dni', '75849396', 'sergio', 'santos', 20, 'm', '', ''),
(5, 'dni', '70236129', 'Diego Armando', 'Contreras Ishuiza', 21, 'm', '@mail.com', '999001122'),
(6, 'pasaporte', '1011223344', 'Gamowik ', 'Vasloky', 32, 'm', '', ''),
(7, 'dni', '12131213', 'Fabiola', 'Santos de Gilomo', 28, 'f', 'fabi@mail.com', ''),
(8, 'dni', '08899000', 'Fabiana', 'Gomez', 33, 'f', '', '999999999'),
(9, 'dni', '01839212', 'Manuel', 'Asluicus', 19, 'm', '', ''),
(10, 'pasaporte', '0201138732', 'Junell', 'Olbos', 25, 'f', '', '005391991232112'),
(11, 'pasaporte', '0329303476', 'Hull', 'Weseyly', 32, 'm', '', ''),
(12, 'dni', '09878900', 'julian', 'blanco', 22, 'm', '', '042523452');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE IF NOT EXISTS `personal` (
  `per_id` int(11) NOT NULL AUTO_INCREMENT,
  `per_dni` varchar(8) NOT NULL,
  `per_nombres` varchar(100) NOT NULL,
  `per_apellidos` varchar(100) NOT NULL,
  `per_fecha_nac` date NOT NULL,
  `per_fecha_reg` date NOT NULL,
  `per_cargo` int(11) NOT NULL,
  `per_estado` int(11) NOT NULL,
  PRIMARY KEY (`per_id`),
  UNIQUE KEY `per_dni` (`per_dni`),
  KEY `per_cargo` (`per_cargo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta`
--

CREATE TABLE IF NOT EXISTS `ruta` (
  `rut_id` int(11) NOT NULL AUTO_INCREMENT,
  `rut_origen` int(11) NOT NULL,
  `rut_destino` int(11) NOT NULL,
  `rut_precio_base` decimal(18,4) NOT NULL,
  `rut_estado` int(11) NOT NULL,
  PRIMARY KEY (`rut_id`),
  KEY `rut_origen` (`rut_origen`,`rut_destino`),
  KEY `rut_destino` (`rut_destino`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `terminal`
--

CREATE TABLE IF NOT EXISTS `terminal` (
  `ter_id` int(11) NOT NULL AUTO_INCREMENT,
  `ter_descripcion` varchar(50) NOT NULL,
  `ter_direccion` varchar(100) NOT NULL,
  `ter_ciudad` int(11) NOT NULL,
  `ter_estado` int(11) NOT NULL,
  PRIMARY KEY (`ter_id`),
  KEY `ter_ciudad` (`ter_ciudad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `terminal`
--

INSERT INTO `terminal` (`ter_id`, `ter_descripcion`, `ter_direccion`, `ter_ciudad`, `ter_estado`) VALUES
(1, 'Termina Civa 01', 'Jr. Termina Civa 01', 1, 1),
(3, 'wewewewewe', 'dsdsdsdsd', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `usu_id` int(11) NOT NULL AUTO_INCREMENT,
  `usu_name` varchar(50) NOT NULL,
  `usu_password` varchar(100) NOT NULL,
  `usu_estado` int(11) NOT NULL,
  PRIMARY KEY (`usu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usu_id`, `usu_name`, `usu_password`, `usu_estado`) VALUES
(2, 'admin', '81dc9bdb52d04dc20036dbd8313ed055', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE IF NOT EXISTS `vehiculo` (
  `veh_id` int(11) NOT NULL AUTO_INCREMENT,
  `veh_tipo` varchar(20) NOT NULL,
  `veh_descripcion` varchar(50) NOT NULL,
  `veh_matricula` varchar(20) NOT NULL,
  `veh_fecha_compra` date NOT NULL,
  `veh_num_asientos` int(11) NOT NULL,
  `veh_estado` int(11) NOT NULL,
  PRIMARY KEY (`veh_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`veh_id`, `veh_tipo`, `veh_descripcion`, `veh_matricula`, `veh_fecha_compra`, `veh_num_asientos`, `veh_estado`) VALUES
(1, 'bus_simple', 'Optimus', 'OPT-001', '0000-00-00', 50, 1),
(2, 'bus_simple', 'Megatron', 'MEG-002', '0000-00-00', 50, 1),
(3, 'bus_simple', 'futbrok', 'FB003', '0000-00-00', 80, 1),
(4, 'bus_simple', 'People2b', 'p2b', '0000-00-00', 82, 1),
(5, 'bus_doble', 'Herbie', 'Her-123', '0000-00-00', 12, 1),
(6, 'bus_doble', 'superciva', 'XL-9869', '0000-00-00', 53, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_pasaje`
--

CREATE TABLE IF NOT EXISTS `venta_pasaje` (
  `venpas_id` int(11) NOT NULL AUTO_INCREMENT,
  `venpas_asiento` int(11) NOT NULL,
  `venpas_pasajero` int(11) NOT NULL,
  `venpas_precio` decimal(18,4) NOT NULL,
  `venpas_descuento` decimal(18,4) NOT NULL,
  PRIMARY KEY (`venpas_id`),
  KEY `venpas_asiento` (`venpas_asiento`,`venpas_pasajero`),
  KEY `venpas_pasajero` (`venpas_pasajero`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `venta_pasaje`
--

INSERT INTO `venta_pasaje` (`venpas_id`, `venpas_asiento`, `venpas_pasajero`, `venpas_precio`, `venpas_descuento`) VALUES
(1, 1, 1, '110.0000', '0.0000'),
(2, 2, 2, '110.0000', '0.0000'),
(3, 3, 3, '110.0000', '0.0000'),
(4, 4, 4, '110.0000', '0.0000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje`
--

CREATE TABLE IF NOT EXISTS `viaje` (
  `via_id` int(11) NOT NULL AUTO_INCREMENT,
  `via_origen` int(11) NOT NULL,
  `via_destino` int(11) NOT NULL,
  `via_vehiculo` int(11) NOT NULL,
  `via_precio` decimal(18,4) NOT NULL,
  `via_fecha_salida` date NOT NULL,
  `via_fecha_llegada` date NOT NULL,
  `via_hora_salida` varchar(10) NOT NULL,
  `via_hora_llegada` varchar(10) NOT NULL,
  `via_estado` int(11) NOT NULL,
  PRIMARY KEY (`via_id`),
  KEY `via_origen` (`via_origen`),
  KEY `via_destino` (`via_destino`),
  KEY `via_vehiculo` (`via_vehiculo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `viaje`
--

INSERT INTO `viaje` (`via_id`, `via_origen`, `via_destino`, `via_vehiculo`, `via_precio`, `via_fecha_salida`, `via_fecha_llegada`, `via_hora_salida`, `via_hora_llegada`, `via_estado`) VALUES
(3, 1, 6, 1, '110.0000', '2016-05-09', '2016-05-11', '8:00', '14:00', 1),
(4, 1, 4, 2, '110.0000', '2016-05-10', '2016-05-12', '7:00', '19:00', 1),
(5, 2, 6, 4, '160.0000', '2016-05-11', '2016-05-13', '23:00', '6:00', 1),
(6, 1, 3, 2, '30.0000', '2016-05-10', '2016-05-10', '8:00', '12:00', 1),
(7, 3, 1, 1, '30.0000', '2016-05-09', '2016-05-09', '13:00', '17:00', 1),
(8, 6, 3, 3, '155.0000', '2016-05-12', '2016-05-13', '8:00', '10:00', 1),
(9, 6, 2, 2, '120.0000', '2016-05-10', '2016-05-11', '18:00', '11:30', 1),
(10, 5, 6, 3, '120.0000', '2016-05-19', '2016-05-20', '20:00', '10:00', 0),
(11, 7, 2, 1, '80.0000', '2016-05-16', '2016-05-16', '8:00', '22:00', 1),
(12, 3, 7, 1, '90.0000', '2016-05-04', '2016-05-05', '18:00', '8:00', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viaje_personal`
--

CREATE TABLE IF NOT EXISTS `viaje_personal` (
  `via_id` int(11) NOT NULL,
  `per_id` int(11) NOT NULL,
  `observacion` varchar(100) NOT NULL,
  PRIMARY KEY (`via_id`,`per_id`),
  KEY `via_id` (`via_id`),
  KEY `per_id` (`per_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asiento`
--
ALTER TABLE `asiento`
  ADD CONSTRAINT `asiento_ibfk_1` FOREIGN KEY (`asi_viaje`) REFERENCES `viaje` (`via_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`per_cargo`) REFERENCES `cargo` (`car_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ruta`
--
ALTER TABLE `ruta`
  ADD CONSTRAINT `ruta_ibfk_1` FOREIGN KEY (`rut_origen`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ruta_ibfk_2` FOREIGN KEY (`rut_destino`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `terminal`
--
ALTER TABLE `terminal`
  ADD CONSTRAINT `terminal_ibfk_1` FOREIGN KEY (`ter_ciudad`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta_pasaje`
--
ALTER TABLE `venta_pasaje`
  ADD CONSTRAINT `venta_pasaje_ibfk_1` FOREIGN KEY (`venpas_asiento`) REFERENCES `asiento` (`asi_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `venta_pasaje_ibfk_2` FOREIGN KEY (`venpas_pasajero`) REFERENCES `pasajero` (`pas_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje`
--
ALTER TABLE `viaje`
  ADD CONSTRAINT `viaje_ibfk_2` FOREIGN KEY (`via_origen`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_3` FOREIGN KEY (`via_destino`) REFERENCES `ciudad` (`ciu_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_ibfk_4` FOREIGN KEY (`via_vehiculo`) REFERENCES `vehiculo` (`veh_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `viaje_personal`
--
ALTER TABLE `viaje_personal`
  ADD CONSTRAINT `viaje_personal_ibfk_1` FOREIGN KEY (`via_id`) REFERENCES `viaje` (`via_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `viaje_personal_ibfk_2` FOREIGN KEY (`per_id`) REFERENCES `personal` (`per_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
