-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-04-2016 a las 00:29:55
-- Versión del servidor: 5.6.27
-- Versión de PHP: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eduardo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `idMenu` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `idMenu`, `descripcion`) VALUES
(1, 1, 'Mision'),
(2, 1, 'Vision'),
(3, 2, 'Ensamble'),
(4, 2, 'Computadoras'),
(5, 2, 'Almacenamiento Externo'),
(6, 2, 'Accesorios'),
(7, 2, 'Sonido'),
(8, 2, 'Videon'),
(9, 2, 'Impresion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catsliders`
--

CREATE TABLE `catsliders` (
  `idCatSliders` int(11) NOT NULL,
  `titulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `subtitulo` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `circAzul` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cirBlanco` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(500) COLLATE utf8_spanish_ci DEFAULT NULL,
  `img` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `catsliders`
--

INSERT INTO `catsliders` (`idCatSliders`, `titulo`, `subtitulo`, `circAzul`, `cirBlanco`, `descripcion`, `img`) VALUES
(1, 'Mega', 'Oferta', '3 pesos', 'Aprovecha', 'es la oferta que estabas esperando', 'images/sliders/FB_IMG_1419603860636 (5).jpg'),
(2, 'Mega', 'Oferta', '3 pesos', 'Aprovecha', 'es la oferta que estabas esperando', 'images/sliders/2.jpg'),
(3, 'victor', 'eduardo', '12', '12', '124123', 'images/sliders/8.jpg'),
(4, 'dsf', 'sdf', 'sdf', 'sdf', 'sdf', 'images/sliders/Koala.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catsubproductos`
--

CREATE TABLE `catsubproductos` (
  `idCatSubProducto` int(11) NOT NULL,
  `idSubProducto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `imagen` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `costo` decimal(18,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `catsubproductos`
--

INSERT INTO `catsubproductos` (`idCatSubProducto`, `idSubProducto`, `idProducto`, `descripcion`, `imagen`, `costo`) VALUES
(1, 21, 1, 'INTEL I9', '/images/Productos/FB_IMG_1419603860636 (6).jpg', '2343.00'),
(2, 30, 2, '4', '/images/Productos/FB_IMG_1419603860636 (1).jpg', '5.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `idDireccion` int(11) NOT NULL,
  `colonia` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `calle` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `noInterior` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `noExterior` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigoPostal` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Pais` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Telefono1` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono2` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL,
  `informacionExtra` varchar(45) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`idDireccion`, `colonia`, `calle`, `noInterior`, `noExterior`, `codigoPostal`, `estado`, `Pais`, `Telefono1`, `telefono2`, `informacionExtra`) VALUES
(1, 'por cu', 'por cu', '2', 'rgdgrtyryrty', '58230', 'Morelia Mich', 'Mexico', '44 33 33 33 33', '44 33 74 04 72', 'las mejores ofertas y mejores servicios solo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informacion`
--

CREATE TABLE `informacion` (
  `idInformacion` int(11) NOT NULL,
  `mision` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL,
  `vision` varchar(1000) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `informacion`
--

INSERT INTO `informacion` (`idInformacion`, `mision`, `vision`) VALUES
(1, 'la mision de la empresa de eduardo', 'la vision de la empresa de eduardo ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(11) NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipoMenu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`idMenu`, `descripcion`, `tipoMenu`) VALUES
(1, 'Inicio', 1),
(2, 'Productos', 2),
(3, 'Video IP', 2),
(4, 'Redes', 2),
(5, 'Acceso', 2),
(6, 'Intrusión ', 1),
(7, 'CCTV', 2),
(8, 'Automatización', 2),
(9, 'Complementos', 2),
(10, 'Infraestructura', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProducto`, `descripcion`) VALUES
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
-- Estructura de tabla para la tabla `relsubcategorias`
--

CREATE TABLE `relsubcategorias` (
  `idrelSubCategoria` int(11) NOT NULL,
  `idMenu` int(11) DEFAULT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `IdSubCategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `costo` varchar(250) DEFAULT NULL,
  `urlImagen` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `idSubCategoria` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`idSubCategoria`, `idCategoria`, `descripcion`) VALUES
(1, 3, 'Gabinetes'),
(2, 3, 'Tarjetas Madre'),
(5, 3, 'Discos Duros'),
(6, 3, 'Memorias'),
(7, 4, 'Servidores'),
(8, 4, 'LapTops'),
(9, 6, 'Teclado'),
(10, 6, 'Mouse');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subproductos`
--

CREATE TABLE `subproductos` (
  `idSubProducto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `subproductos`
--

INSERT INTO `subproductos` (`idSubProducto`, `idProducto`, `descripcion`) VALUES
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
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `catsliders`
--
ALTER TABLE `catsliders`
  ADD PRIMARY KEY (`idCatSliders`);

--
-- Indices de la tabla `catsubproductos`
--
ALTER TABLE `catsubproductos`
  ADD PRIMARY KEY (`idCatSubProducto`,`idSubProducto`,`idProducto`),
  ADD KEY `fk_CatSubProductos_SubProductos1_idx` (`idSubProducto`,`idProducto`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`idDireccion`);

--
-- Indices de la tabla `informacion`
--
ALTER TABLE `informacion`
  ADD PRIMARY KEY (`idInformacion`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `relsubcategorias`
--
ALTER TABLE `relsubcategorias`
  ADD PRIMARY KEY (`idrelSubCategoria`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`idSubCategoria`);

--
-- Indices de la tabla `subproductos`
--
ALTER TABLE `subproductos`
  ADD PRIMARY KEY (`idSubProducto`,`idProducto`),
  ADD KEY `fk_SubProductos_Productos_idx` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `catsliders`
--
ALTER TABLE `catsliders`
  MODIFY `idCatSliders` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `catsubproductos`
--
ALTER TABLE `catsubproductos`
  MODIFY `idCatSubProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
  MODIFY `idDireccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `informacion`
--
ALTER TABLE `informacion`
  MODIFY `idInformacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `relsubcategorias`
--
ALTER TABLE `relsubcategorias`
  MODIFY `idrelSubCategoria` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `idSubCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `subproductos`
--
ALTER TABLE `subproductos`
  MODIFY `idSubProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `catsubproductos`
--
ALTER TABLE `catsubproductos`
  ADD CONSTRAINT `fk_CatSubProductos_SubProductos1` FOREIGN KEY (`idSubProducto`,`idProducto`) REFERENCES `subproductos` (`idSubProducto`, `idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subproductos`
--
ALTER TABLE `subproductos`
  ADD CONSTRAINT `fk_SubProductos_Productos` FOREIGN KEY (`idProducto`) REFERENCES `productos` (`idProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
