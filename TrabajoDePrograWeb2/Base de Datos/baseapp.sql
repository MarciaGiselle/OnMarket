-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-06-2019 a las 02:37:11
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `baseapp`
--
CREATE DATABASE IF NOT EXISTS `baseapp` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `baseapp`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`) VALUES
(1, 'electronica'),
(2, 'moda'),
(3, 'mascotas'),
(4, 'herramientas'),
(5, 'muebles'),
(6, 'deportes'),
(7, 'musica'),
(8, 'jardin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formaentrega`
--

CREATE TABLE `formaentrega` (
  `idEntrega` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formaentrega`
--

INSERT INTO `formaentrega` (`idEntrega`, `descripcion`) VALUES
(1, 'acordarConElVendedor'),
(2, 'Correo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `id` int(11) NOT NULL,
  `latitud` int(30) NOT NULL,
  `longitud` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `nombre` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `duracion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_Producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicaciónentrega`
--

CREATE TABLE `publicaciónentrega` (
  `idEntrega` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `tipo`) VALUES
(1, 'Estandar'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `name` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `rol` int(11) NOT NULL,
  `sexo` varchar(191) NOT NULL,
  `cuit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `userName`, `password`, `name`, `lastname`, `email`, `rol`, `sexo`, `cuit`) VALUES
(1, 'RoCentu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rocio', 'Centu', 'rocio_perez@hotmail.com', 1, 'femenino', 2147483647),
(2, 'MariaR', '51eac6b471a284d3341d8c0c63d0f1a286262a18', 'Maria', 'Robles', 'maria.72@hotmail.com', 2, 'femenino', 2147483647),
(3, 'Margi', '58f0744907ea8bd8e0f51e568f1536289ceb40a5', 'Marcia', 'Toledo', 'martoledo@hotmail.com', 2, 'femenino', 2147483647),
(4, 'Axel', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Axel', 'Sanchez', 'axel_rios@hotmail.com', 2, 'masculino', 2147483647),
(9, 'LuMar', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Lucia', 'Martinez', 'lu@gmail.com', 2, 'Mujer', 4567895),
(12, 'mar', '35139ef894b28b73bea022755166a23933c7d9cb', 'Marcia', 'Toledo', 'mar@gmail.com', 2, 'Mujer', 2147483647),
(13, 'roger', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Roger', 'Federer', 'rogerfedQ@gmail.com', 2, 'Hombre', 2147483647);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`);

--
-- Indices de la tabla `formaentrega`
--
ALTER TABLE `formaentrega`
  ADD PRIMARY KEY (`idEntrega`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`,`idProducto`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idCategoria` (`idCategoria`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_Producto` (`id_Producto`);

--
-- Indices de la tabla `publicaciónentrega`
--
ALTER TABLE `publicacion_entrega`
  ADD PRIMARY KEY (`idEntrega`,`idPublicacion`),
  ADD KEY `publicacionentrega_ibfk_1` (`idPublicacion`),
  ADD KEY `idEntrega` (`idEntrega`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rol` (`rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `formaentrega`
--
ALTER TABLE `formaentrega`
  MODIFY `idEntrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `imagen_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `publicacion_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `publicaciónentrega`
--
ALTER TABLE `publicaciónentrega`
  ADD CONSTRAINT `publicacionentrega_ibfk_1` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`id`),
  ADD CONSTRAINT `publicacionentrega_ibfk_2` FOREIGN KEY (`idEntrega`) REFERENCES `formaentrega` (`idEntrega`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
