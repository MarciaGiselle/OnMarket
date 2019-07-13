-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-07-2019 a las 23:47:32
-- Versión del servidor: 10.3.15-MariaDB
-- Versión de PHP: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `onmarket`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `idCategoria` int(11) NOT NULL,
  `nombreCategoria` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_estadistica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`, `id_estadistica`) VALUES
(1, 'electronica', NULL),
(2, 'moda', NULL),
(3, 'mascotas', NULL),
(4, 'herramientas', NULL),
(5, 'muebles', NULL),
(6, 'deportes', NULL),
(7, 'musica', NULL),
(8, 'jardin', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idTarjeta` int(11) NOT NULL,
  `total` double NOT NULL,
  `idProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `idComprador` int(11) NOT NULL,
  `idVendedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `mensaje` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_Usuario` int(11) NOT NULL,
  `id_Publicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` int(11) NOT NULL,
  `fecha_deposito` date NOT NULL,
  `monto` double NOT NULL,
  `comisionAlSistema` double DEFAULT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta_liquidacion`
--

CREATE TABLE `cuenta_liquidacion` (
  `idCuenta` int(11) NOT NULL,
  `idLiquidacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas` (
  `id` int(11) NOT NULL,
  `id_Producto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id`, `nombre`) VALUES
(1, 'activo'),
(2, 'inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formaentrega`
--

CREATE TABLE `formaentrega` (
  `idEntrega` int(11) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id`, `nombre`, `idProducto`) VALUES
(1, '0dc8c8f92efd2ff453ec3e6dfed5ffda.jpg', 10),
(2, '87804582.jpg', 10),
(3, '_105170650_gettyimages-899668068.jpg', 11),
(4, '0001 - copia.jpg', 11),
(5, '0001.jpg', 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion` (
  `id` int(11) NOT NULL,
  `fecha_liquidacion` date NOT NULL,
  `total` double NOT NULL,
  `ganancia` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion` (
  `id` int(11) NOT NULL,
  `latitud` double DEFAULT NULL,
  `longitud` double DEFAULT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `localizacion`
--

INSERT INTO `localizacion` (`id`, `latitud`, `longitud`, `id_user`) VALUES
(1, -34.6686986, -58.5614947, 2),
(27, 36, 36.3, 1),
(29, -35.675147, -71.54296899999997, 3),
(30, -34.7107108, -58.59419129999998, 4),
(31, -34.7107108, -58.59419129999998, 5),
(32, -34.7107108, -58.59419129999998, 6),
(33, -34.7093701, -58.59797420000001, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `id` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`id`, `nombre`) VALUES
(1, 'bloquearUsuario'),
(2, 'consultarEstadistica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol` (
  `idPermiso` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permiso_rol`
--

INSERT INTO `permiso_rol` (`idPermiso`, `idRol`) VALUES
(1, 2),
(2, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` int(11) NOT NULL,
  `idCategoria` int(11) DEFAULT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_estadistica` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `descripcion`, `cantidad`, `precio`, `idCategoria`, `nombre`, `id_estadistica`) VALUES
(10, 'muy comoda', 45, 453, 2, 'cama', NULL),
(11, 'dgffgf', 25, 44444, 2, 'campera', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion` (
  `id` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_Producto` int(11) NOT NULL,
  `id_Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `publicacion`
--

INSERT INTO `publicacion` (`id`, `titulo`, `fecha`, `id_user`, `id_Producto`, `id_Estado`) VALUES
(8, 'cama', '2019-07-11', 2, 10, 1),
(9, 'Cartera', '2019-07-11', 2, 11, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_entrega`
--

CREATE TABLE `publicacion_entrega` (
  `idEntrega` int(11) NOT NULL,
  `idPublicacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `publicacion_entrega`
--

INSERT INTO `publicacion_entrega` (`idEntrega`, `idPublicacion`) VALUES
(1, 8),
(1, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(11) NOT NULL,
  `tipo` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `tipo`) VALUES
(1, 'Estandar'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_de_credito`
--

CREATE TABLE `tarjeta_de_credito` (
  `id` int(11) NOT NULL,
  `idUser` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `cod_seguridad` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha_vencimiento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estadistica`
--

CREATE TABLE `tipo_estadistica` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_estadistica`
--

INSERT INTO `tipo_estadistica` (`id`, `nombre`) VALUES
(1, 'producto'),
(2, 'categoria'),
(3, 'monto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_valoracion`
--

CREATE TABLE `tipo_valoracion` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_valoracion`
--

INSERT INTO `tipo_valoracion` (`id`, `descripcion`) VALUES
(1, 'Top'),
(2, 'Medio Pelo'),
(3, 'Para atras');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `userName` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(1000) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol` int(11) NOT NULL,
  `sexo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cuit` int(11) NOT NULL,
  `estado` int(1) NOT NULL,
  `idTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `userName`, `password`, `name`, `lastname`, `email`, `rol`, `sexo`, `cuit`, `estado`, `idTipo`) VALUES
(1, 'RoCentu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rocio', 'Centu', 'rocio_perez@hotmail.com', 1, 'femenino', 2147483647, 1, 2),
(2, 'Axel', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Axel', 'Sanchez', 'axel_rios@hotmail.com', 2, 'masculino', 2147483647, 1, 1),
(3, 'roger', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Roger', 'Federer', 'rogerfedQ@gmail.com', 2, 'Hombre', 2147483647, 0, 1),
(4, 'mar18', '0f2c595baa1fac2457a5970eb17f735ffedd0c40', 'Marcia', 'Giselle', 'margisetoledo@gmail.com', 2, 'Mujer', 2147483647, 1, 1),
(5, 'nati', '9adcb29710e807607b683f62e555c22dc5659713', 'Natalia', 'Toledo', 'nati@gmail.com', 2, 'Mujer', 12345689, 1, 1),
(6, 'agustole', '3d2a34c7b4f68d10409cf0396858ef533db01ac7', 'Agustin', 'Toledo', 'agus782@gmail.com', 2, 'Hombre', 123456789, 1, 1),
(7, 'marce', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Marcelo', 'Toledo', 'marcelo@gmail.com', 2, 'Hombre', 789456123, 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion` (
  `id` int(11) NOT NULL,
  `numero` int(11) NOT NULL,
  `comentario` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `idVendedor` int(11) NOT NULL,
  `idLogueado` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`idCategoria`),
  ADD KEY `id_estadistica` (`id_estadistica`);

--
-- Indices de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cobranza_Tarjeta` (`idTarjeta`),
  ADD KEY `FK_Cobranza_Comprador` (`idComprador`),
  ADD KEY `FK_Cobranza_Vendedor` (`idVendedor`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Comentario_Usuario` (`id_Usuario`),
  ADD KEY `FK_Comentario_Publicacion` (`id_Publicacion`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Cuenta_Usuario` (`idUsuario`);

--
-- Indices de la tabla `cuenta_liquidacion`
--
ALTER TABLE `cuenta_liquidacion`
  ADD PRIMARY KEY (`idCuenta`,`idLiquidacion`),
  ADD KEY `FK_Cuenta_Liquidacion_Li` (`idLiquidacion`);

--
-- Indices de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Estadisticas_Tipo` (`id_tipo`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `formaentrega`
--
ALTER TABLE `formaentrega`
  ADD PRIMARY KEY (`idEntrega`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Imagen_Producto` (`idProducto`);

--
-- Indices de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Localizacion_Usuario` (`id_user`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD PRIMARY KEY (`idPermiso`,`idRol`),
  ADD KEY `FK_Permiso_Rol_Rol` (`idRol`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Producto_Categoria` (`idCategoria`),
  ADD KEY `id_estadistica` (`id_estadistica`);

--
-- Indices de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Publicacion_Usuario` (`id_user`),
  ADD KEY `FK_Publicacion_Producto` (`id_Producto`),
  ADD KEY `FK_Publicacion_Estado` (`id_Estado`);

--
-- Indices de la tabla `publicacion_entrega`
--
ALTER TABLE `publicacion_entrega`
  ADD PRIMARY KEY (`idEntrega`,`idPublicacion`),
  ADD KEY `FK_Publicacion_Entrega_Pu` (`idPublicacion`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarjeta_de_credito`
--
ALTER TABLE `tarjeta_de_credito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Tarjeta_Usuario` (`idUser`);

--
-- Indices de la tabla `tipo_estadistica`
--
ALTER TABLE `tipo_estadistica`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_valoracion`
--
ALTER TABLE `tipo_valoracion`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `userName` (`userName`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_Usuario_Rol` (`rol`),
  ADD KEY `FK_Usuario_Tipo` (`idTipo`);

--
-- Indices de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_Valoracion_Vendedor` (`idVendedor`),
  ADD KEY `FK_Valoracion_Logueado` (`idLogueado`),
  ADD KEY `FK_Valoracion_Producto` (`idProducto`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `idCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cobranza`
--
ALTER TABLE `cobranza`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `formaentrega`
--
ALTER TABLE `formaentrega`
  MODIFY `idEntrega` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `liquidacion`
--
ALTER TABLE `liquidacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localizacion`
--
ALTER TABLE `localizacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `publicacion`
--
ALTER TABLE `publicacion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarjeta_de_credito`
--
ALTER TABLE `tarjeta_de_credito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_estadistica`
--
ALTER TABLE `tipo_estadistica`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_valoracion`
--
ALTER TABLE `tipo_valoracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `valoracion`
--
ALTER TABLE `valoracion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`id_estadistica`) REFERENCES `estadisticas` (`id`);

--
-- Filtros para la tabla `cobranza`
--
ALTER TABLE `cobranza`
  ADD CONSTRAINT `FK_Cobranza_Comprador` FOREIGN KEY (`idComprador`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_Cobranza_Tarjeta` FOREIGN KEY (`idTarjeta`) REFERENCES `tarjeta_de_credito` (`id`),
  ADD CONSTRAINT `FK_Cobranza_Vendedor` FOREIGN KEY (`idVendedor`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `FK_Comentario_Publicacion` FOREIGN KEY (`id_Publicacion`) REFERENCES `publicacion` (`id`),
  ADD CONSTRAINT `FK_Comentario_Usuario` FOREIGN KEY (`id_Usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `FK_Cuenta_Usuario` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `cuenta_liquidacion`
--
ALTER TABLE `cuenta_liquidacion`
  ADD CONSTRAINT `FK_Cuenta_Liquidacion_Cu` FOREIGN KEY (`idCuenta`) REFERENCES `cuenta` (`id`),
  ADD CONSTRAINT `FK_Cuenta_Liquidacion_Li` FOREIGN KEY (`idLiquidacion`) REFERENCES `liquidacion` (`id`);

--
-- Filtros para la tabla `estadisticas`
--
ALTER TABLE `estadisticas`
  ADD CONSTRAINT `FK_Estadisticas_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_Estadisticas_Tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_estadistica` (`id`);

--
-- Filtros para la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD CONSTRAINT `FK_Imagen_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`);

--
-- Filtros para la tabla `localizacion`
--
ALTER TABLE `localizacion`
  ADD CONSTRAINT `FK_Localizacion_Usuario` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `permiso_rol`
--
ALTER TABLE `permiso_rol`
  ADD CONSTRAINT `FK_Permiso_Rol_Per` FOREIGN KEY (`idPermiso`) REFERENCES `permiso` (`id`),
  ADD CONSTRAINT `FK_Permiso_Rol_Rol` FOREIGN KEY (`idRol`) REFERENCES `rol` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `FK_Producto_Categoria` FOREIGN KEY (`idCategoria`) REFERENCES `categoria` (`idCategoria`),
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_estadistica`) REFERENCES `estadisticas` (`id`);

--
-- Filtros para la tabla `publicacion`
--
ALTER TABLE `publicacion`
  ADD CONSTRAINT `FK_Publicacion_Estado` FOREIGN KEY (`id_Estado`) REFERENCES `estado` (`id`),
  ADD CONSTRAINT `FK_Publicacion_Producto` FOREIGN KEY (`id_Producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_Publicacion_Usuario` FOREIGN KEY (`id_user`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `publicacion_entrega`
--
ALTER TABLE `publicacion_entrega`
  ADD CONSTRAINT `FK_Publicacion_Entrega_En` FOREIGN KEY (`idEntrega`) REFERENCES `formaentrega` (`idEntrega`),
  ADD CONSTRAINT `FK_Publicacion_Entrega_Pu` FOREIGN KEY (`idPublicacion`) REFERENCES `publicacion` (`id`);

--
-- Filtros para la tabla `tarjeta_de_credito`
--
ALTER TABLE `tarjeta_de_credito`
  ADD CONSTRAINT `FK_Tarjeta_Usuario` FOREIGN KEY (`idUser`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_Usuario_Rol` FOREIGN KEY (`rol`) REFERENCES `rol` (`id`),
  ADD CONSTRAINT `FK_Usuario_Tipo` FOREIGN KEY (`idTipo`) REFERENCES `tipo_valoracion` (`id`);

--
-- Filtros para la tabla `valoracion`
--
ALTER TABLE `valoracion`
  ADD CONSTRAINT `FK_Valoracion_Logueado` FOREIGN KEY (`idLogueado`) REFERENCES `usuario` (`id`),
  ADD CONSTRAINT `FK_Valoracion_Producto` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `FK_Valoracion_Vendedor` FOREIGN KEY (`idVendedor`) REFERENCES `usuario` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
--tabla de montos
