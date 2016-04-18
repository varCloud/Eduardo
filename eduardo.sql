-- phpMyAdmin SQL Dump
-- version 3.5.7
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-04-2016 a las 05:52:41
-- Versión del servidor: 5.5.29
-- Versión de PHP: 5.4.10

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `eduardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CatSliders`
--

CREATE TABLE `CatSliders` (
  `idCatSliders` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `circAzul` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cirBlanco` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idCatSliders`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `CatSliders`
--

INSERT INTO `CatSliders` (`idCatSliders`, `titulo`, `subtitulo`, `circAzul`, `cirBlanco`, `descripcion`, `img`) VALUES
(1, 'Mega', 'Oferta', '3 pesos', 'Aprovecha', 'es la oferta que estabas esperando', 'images/sliders/FB_IMG_1419603860636 (5).jpg'),
(2, 'Mega', 'Oferta', '3 pesos', 'Aprovecha', 'es la oferta que estabas esperando', 'images/sliders/2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `CatSubProductos`
--

CREATE TABLE `CatSubProductos` (
  `idCatSubProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idSubProducto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo` decimal(18,2) NOT NULL,
  PRIMARY KEY (`idCatSubProducto`,`idSubProducto`,`idProducto`),
  KEY `fk_CatSubProductos_SubProductos1_idx` (`idSubProducto`,`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `CatSubProductos`
--

INSERT INTO `CatSubProductos` (`idCatSubProducto`, `idSubProducto`, `idProducto`, `descripcion`, `imagen`, `costo`) VALUES
(1, 21, 1, 'INTEL I9', '/images/Productos/FB_IMG_1419603860636 (6).jpg', 2343.00),
(2, 30, 2, '4', '/images/Productos/FB_IMG_1419603860636 (1).jpg', 5.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Direccion`
--

CREATE TABLE `Direccion` (
  `idDireccion` int(11) NOT NULL AUTO_INCREMENT,
  `colonia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `noInterior` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `noExterior` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigoPostal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pais` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono1` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono2` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `informacionExtra` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idDireccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Direccion`
--

INSERT INTO `Direccion` (`idDireccion`, `colonia`, `calle`, `noInterior`, `noExterior`, `codigoPostal`, `estado`, `Pais`, `Telefono1`, `telefono2`, `informacionExtra`) VALUES
(1, 'por cu', 'por cu', '2', '3', '58230', 'Morelia Mich', 'Mexico', '44 33 33 33 33', '44 33 74 04 72', 'las mejores ofertas y mejores servicios solo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Informacion`
--

CREATE TABLE `Informacion` (
  `idInformacion` int(11) NOT NULL AUTO_INCREMENT,
  `mision` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vision` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idInformacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `Informacion`
--

INSERT INTO `Informacion` (`idInformacion`, `mision`, `vision`) VALUES
(1, 'la mision de la empresa de eduardo', 'la vision de la empresa de eduardo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Productos`
--

CREATE TABLE `Productos` (
  `idProducto` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `Productos`
--

INSERT INTO `Productos` (`idProducto`, `descripcion`) VALUES
(1, 'Ensamble'),
(2, 'Computadoras'),
(3, 'Almacenamiento Externo'),
(4, 'Accesorios'),
(5, 'Sonido'),
(6, 'Video'),
(7, 'Impresion'),
(8, 'Energia'),
(9, 'Software');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `SubProductos`
--

CREATE TABLE `SubProductos` (
  `idSubProducto` int(11) NOT NULL AUTO_INCREMENT,
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`idSubProducto`,`idProducto`),
  KEY `fk_SubProductos_Productos_idx` (`idProducto`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=36 ;

--
-- Volcado de datos para la tabla `SubProductos`
--

INSERT INTO `SubProductos` (`idSubProducto`, `idProducto`, `descripcion`) VALUES
(21, 1, 'Procesadores'),
(22, 1, 'Gabinetes'),
(23, 1, 'Tarjetas Madre'),
(24, 1, 'Memorias'),
(25, 1, 'Discos Duros'),
(26, 1, 'Procesadores'),
(27, 1, 'Procesadores'),
(28, 1, 'SSD'),
(29, 2, 'Servidores'),
(30, 2, 'Lap Tops'),
(31, 2, 'Ultra Book'),
(32, 2, 'Escritorio'),
(33, 3, 'Memoria USB'),
(34, 3, 'Micro SD'),
(35, 3, 'Discos Externos');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `CatSubProductos`
--
ALTER TABLE `CatSubProductos`
  ADD CONSTRAINT `fk_CatSubProductos_SubProductos1` FOREIGN KEY (`idSubProducto`, `idProducto`) REFERENCES `SubProductos` (`idSubProducto`, `idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `SubProductos`
--
ALTER TABLE `SubProductos`
  ADD CONSTRAINT `fk_SubProductos_Productos` FOREIGN KEY (`idProducto`) REFERENCES `Productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
