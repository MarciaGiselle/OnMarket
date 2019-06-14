INSERT INTO `rol` (`id`, `tipo`) VALUES
(1, 'Estandar'),
(2, 'Administrador');


INSERT INTO `usuario` (`id`, `name`, `lastname`,`email`, `cuit`, `userName`,  `password`,`sexo` , `rol`) VALUES
(1, 'Rocio', 'Centu', 'rocio_perez@hotmail.com', 12456789621,'RoCentu',SHA1('123'),'femenino', 1),
(2, 'Maria', 'Robles', 'maria.72@hotmail.com', 5789123457,'MariaR',SHA1('456'),'femenino', 2),
(3, 'Marcia', 'Toledo', 'martoledo@hotmail.com', 45678912345,'Margi',SHA1('182'),'femenino', 2),
(4, 'Axel', 'Sanchez', 'axel_rios@hotmail.com', 2345678945, 'Axel',SHA1('789'), 'masculino',2);



INSERT INTO `categoria` (`nombreCategoria`) VALUES
('electronica'),('moda'),('mascotas'),('herramientas'),('muebles'),('deportes'),('musica'),('jardin');


INSERT INTO `formaentrega` (`descripcion`) VALUES
('acordarConElVendedor'),('Correo');

INSERT INTO `producto` (`idProducto`, `descripcion`, `cantidad`, `precio`, `idCategoria`, `nombre`) VALUES
(7, 'Rojo marca Avon', 4, 200, 2, 'Lapiz labial'),
(8, 'Color negro 2 m de largo', 4, 150, 3, 'Collar'),
(19, 'Marca Querubin', 4, 200, 2, 'Jabon'),
(21, 'Madera', 1, 1500, 5, 'Escritorio'),
(36, '', 0, 0, 1, ''),
(52, 'Gloria', 4, 200, 1, 'Cuaderno'),
(53, 'Gloria', 4, 200, 2, 'Cuaderno'),
(54, 'Gloria', 4, 200, 2, 'Cuaderno'),
(55, 'Gloria', 4, 200, 2, 'Cuaderno'),
(56, 'Gloria', 4, 200, 2, 'Cuaderno'),
(57, 'Gloria', 4, 200, 2, 'Cuaderno'),
(58, 'Gloria', 4, 200, 2, 'Cuaderno'),
(59, 'aa', 1, 150, 1, 'Teclado'),
(60, 'aa', 1, 150, 1, 'Teclado'),
(61, 'aa', 1, 150, 1, 'Teclado'),
(62, 'aa', 1, 150, 1, 'Teclado'),
(63, 'aa', 1, 150, 1, 'Teclado'),
(64, 'rr', 4, 200, 1, 'aaaaaa'),
(65, 'george martin', 20, 500, 7, 'libro'),
(66, 'aaaa', 1, 150, 2, 'Hola'),
(67, 'aaaa', 1, 150, 2, 'Hola'),
(68, 'ana frank', 1, 150, 2, 'libro'),
(69, 'aaaa', 1, 150, 2, 'CHAU'),
(70, 'aaaa', 1, 150, 2, 'CHAU'),
(71, 'aaaa', 1, 150, 2, 'CHAU'),
(72, 'aaaa', 1, 150, 2, 'CHAU'),
(73, 'aaaa', 1, 150, 2, 'CHAU'),
(74, 'aaaa', 1, 150, 2, 'CHAU'),
(75, 'aaaa', 1, 150, 2, 'CHAU'),
(76, 'aaaa', 1, 150, 2, 'CHAU'),
(77, 'aaaa', 1, 150, 2, 'CHAU');


INSERT INTO `publicacion` (`id`, `titulo`, `duracion`, `fecha`, `id_user`, `id_Producto`) VALUES
(1, 'titulo', 0, '0000-00-00', 1, 59),
(2, 'titulo', 0, '0000-00-00', 1, 60),
(3, 'titulo', 0, '0000-00-00', 1, 61),
(4, 'titulo', 0, '0000-00-00', 1, 62),
(5, 'titulo', 0, '0000-00-00', 1, 63),
(6, 'titulo', 0, '2019-06-08', 1, 64),
(7, 'titulo', 0, '2019-06-08', 1, 65),
(8, 'Escritorio nuevo desarmable', 0, '2019-06-08', 1, 66),
(9, 'Escritorio nuevo desarmable', 0, '2019-06-08', 1, 67),
(10, 'Escritorio nuevo desarmable', 0, '2019-06-08', 1, 68),
(11, 'Escritorio nuevo desarmable', 0, '2019-06-08', 1, 69),
(12, 'Escritorio nuevo desarmable', 0, '2019-06-08', 1, 70),
(13, 'parlante', 0, '2019-06-08', 1, 72),
(14, 'parlante', 0, '2019-06-08', 1, 73),
(15, 'parlante', 0, '2019-06-08', 1, 74),
(16, 'parlante', 0, '2019-06-08', 1, 75),
(17, 'parlante', 0, '2019-06-08', 1, 76),
(18, 'parlante', 0, '2019-06-08', 1, 77);

-- --------------------------------------------------------


--
-- Volcado de datos para la tabla `publicacion_entrega`
--

INSERT INTO `publicacion_entrega` (`idEntrega`, `idPublicacion`) VALUES
(1, 6),
(1, 8),
(1, 10),
(1, 11),
(1, 13),
(1, 14),
(1, 16),
(1, 17),
(2, 7),
(2, 9),
(2, 12),
(2, 15),
(2, 16),
(2, 18);

-- --------------------------------------------------------
