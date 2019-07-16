DROP DATABASE IF EXISTS onmarket;

CREATE DATABASE onmarket;

USE onmarket;

ALTER DATABASE onmarket CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol`
(
    `id`   integer     NOT NULL AUTO_INCREMENT,
    `tipo` varchar(20) NOT NULL,
    constraint PK_Rol primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso`
(
    `id`     integer     NOT NULL AUTO_INCREMENT,
    `nombre` varchar(20) NOT NULL,
    constraint PK_Permiso primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_rol`
--

CREATE TABLE `permiso_rol`
(
    `idPermiso` integer NOT NULL,
    `idRol`     integer NOT NULL,
    constraint PK_Permiso_Rol primary key (idPermiso, idRol),
    constraint FK_Permiso_Rol_Per foreign key (idPermiso) references permiso (id),
    constraint FK_Permiso_Rol_Rol foreign key (idRol) references rol (id)

);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_valoracion`
--

CREATE TABLE `tipo_valoracion`
(
    `id`          integer     NOT NULL AUTO_INCREMENT,
    `descripcion` varchar(50) NOT NULL,
    constraint PK_Tipo_Valoracion primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario`
(
    `id`       integer            NOT NULL AUTO_INCREMENT,
    `userName` varchar(20) UNIQUE NOT NULL,
    `password` varchar(1000)      NOT NULL,
    `name`     varchar(20)        NOT NULL,
    `lastname` varchar(20)        NOT NULL,
    `email`    varchar(30) UNIQUE NOT NULL,
    `rol`      integer            NOT NULL,
    `sexo`     varchar(191)       NOT NULL,
    `direccion` varchar(200) NOT NULL,
    `cuit`     int(11)            NOT NULL,
    `estado`   int(1)             NOT NULL,
    `idTipo`   integer            NOT NULL,
    constraint PK_Usuario primary key (id),
    constraint FK_Usuario_Rol foreign key (Rol) references Rol (id),
    constraint FK_Usuario_Tipo FOREIGN KEY (idTipo) REFERENCES tipo_valoracion (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta`
(
    `id`                integer NOT NULL AUTO_INCREMENT,
    `fecha_deposito`    date    NOT NULL,
    `monto`             double  NOT NULL,
    `comisionAlSistema` double DEFAULT NULL,
    `idUsuario`         integer NOT NULL,
    constraint PK_Cuenta primary key (id),
    constraint FK_Cuenta_Usuario foreign key (idUsuario) references usuario (id)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_estadistica`
--

CREATE TABLE `tipo_estadistica`
(
    `id`     integer      NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    constraint PK_Tipo_Estadistica primary key (id)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas`
--

CREATE TABLE `estadisticas`
(
    `id`       integer NOT NULL AUTO_INCREMENT,
    `cantidad` int(11) NOT NULL,
    `id_tipo`  integer NOT NULL,
    constraint PK_Estadisticas primary key (id),
    constraint FK_Estadisticas_Tipo foreign key (id_tipo) references tipo_estadistica (id)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--
CREATE TABLE categoria
(
    id    integer     NOT NULL AUTO_INCREMENT,
    nombreCategoria varchar(30) NOT NULL,
    id_estadistica  integer DEFAULT NULL,
    constraint PK_Categoria primary key (id),
    constraint FK_Categoria_Esta FOREIGN KEY (`id_estadistica`) REFERENCES `estadisticas` (`id`)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_valoracion`
--

CREATE TABLE `estado`
(
    `id`     integer      NOT NULL AUTO_INCREMENT,
    `nombre` varchar(100) NOT NULL,
    constraint PK_Estado primary key (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto`
(
    `id`             integer      NOT NULL AUTO_INCREMENT,
    `descripcion`    text         NOT NULL,
    `cantidad`       int(11)      NOT NULL,
    `precio`         int(11)      NOT NULL,
    `idCategoria`    integer DEFAULT NULL,
    `nombre`         varchar(191) NOT NULL,
    `id_estadistica` integer DEFAULT NULL,
    constraint PK_Producto primary key (id),
    constraint FK_Producto_Categoria foreign key (idCategoria) references categoria (id),
    constraint FK_Producto_Estadist FOREIGN KEY (id_estadistica) REFERENCES `estadisticas` (id)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion`
--

CREATE TABLE `publicacion`
(
    `id`          integer      NOT NULL AUTO_INCREMENT,
    `titulo`      varchar(100) NOT NULL,
    `fecha`       date         NOT NULL,
    `id_user`     integer      NOT NULL,
    `id_Producto` integer      NOT NULL,
    `id_Estado`   integer      NOT NULL,
    constraint PK_Publicacion primary key (id),
    constraint FK_Publicacion_Usuario foreign key (id_user) references usuario (id),
    constraint FK_Publicacion_Producto foreign key (id_Producto) references producto (id),
    constraint FK_Publicacion_Estado foreign key (id_Estado) references estado (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario`
(
    `id`             integer      NOT NULL AUTO_INCREMENT,
    `mensaje`        varchar(500) NOT NULL,
    `fecha`          datetime         NOT NULL,
    `id_Usuario`     integer      NOT NULL,
    `id_Publicacion` integer      NOT NULL,
    `id_comentario2` integer  DEFAULT NULL ,
    constraint PK_Comentario primary key (id),
    constraint FK_Comentario_Usuario foreign key (id_usuario) references usuario (id),
    constraint FK_Comentario_Publicacion foreign key (id_Publicacion) references publicacion (id),
    constraint FK_Comentario_Comentario foreign key (id_comentario2) references comentario(id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarjeta_de_credito`
--

CREATE TABLE `tarjeta_de_credito`
(
    `id`                integer     NOT NULL AUTO_INCREMENT,
    `idUser`            integer     NOT NULL,
    `numero`            int(11)     NOT NULL,
    `cod_seguridad`     varchar(10) NOT NULL,
    `fecha_vencimiento` date        NOT NULL,
    constraint PK_Tarjeta primary key (id),
    constraint FK_Tarjeta_Usuario foreign key (idUser) references usuario (id)
);



-- --------------------------------------------------------


--
-- Estructura de tabla para la tabla `formaentrega`
--

CREATE TABLE `formaentrega`
(
    `idEntrega`   integer      NOT NULL AUTO_INCREMENT,
    `descripcion` varchar(100) NOT NULL,
    constraint PK_Forma_Entrega primary key (idEntrega)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

CREATE TABLE `imagen`
(
    `id`         integer      NOT NULL AUTO_INCREMENT,
    `nombre`     varchar(100) NOT NULL,
    `idProducto` integer      NOT NULL,
    constraint PK_Imagen primary key (id),
    constraint FK_Imagen_Producto foreign key (idProducto) references producto (id)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localizacion`
--

CREATE TABLE `localizacion`
(
    `id`       integer NOT NULL AUTO_INCREMENT,
    `latitud`  double DEFAULT NULL,
    `longitud` double DEFAULT NULL,
    `id_user`  integer NOT NULL,
    constraint PK_Localizacion primary key (id),
    constraint FK_Localizacion_Usuario foreign key (id_user) references usuario (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valoracion`
--

CREATE TABLE `valoracion`
(
    `id`         integer NOT NULL AUTO_INCREMENT,
    `numero`     int(11) NOT NULL,
    `comentario` varchar(100) DEFAULT NULL,
    `idVendedor` integer NOT NULL,
    `idLogueado` integer NOT NULL,
    `idProducto` integer NOT NULL,
    constraint PK_Valoracion primary key (id),
    constraint FK_Valoracion_Vendedor foreign key (idVendedor) references usuario (id),
    constraint FK_Valoracion_Logueado foreign key (idLogueado) references usuario (id),
    constraint FK_Valoracion_Producto foreign key (idProducto) references producto (id)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `publicacion_entrega`
--

CREATE TABLE `publicacion_entrega`
(
    `idEntrega`     integer NOT NULL,
    `idPublicacion` integer NOT NULL,
    `id` integer NOT NULL AUTO_INCREMENT,

     constraint PK_Publicacion_Id primary key (id),
    constraint FK_Publicacion_Entrega_En foreign key (idEntrega) references formaentrega (idEntrega),
    constraint FK_Publicacion_Entrega_Pu foreign key (idPublicacion) references publicacion (id)
);


-- --------------------------------------------------------


CREATE TABLE mes
(
    `id`     integer     NOT NULL AUTO_INCREMENT,
    `nombre` varchar(20) NOT NULL,
    constraint PK_Mes primary key (id)
);

CREATE TABLE year
(
    `id`   integer NOT NULL AUTO_INCREMENT,
    `year` year    NOT NULL,
    constraint PK_year primary key (id)
);



--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion`
(
    `id`                integer NOT NULL AUTO_INCREMENT,
    `fecha_liquidacion` datetime    NOT NULL,
    `total`             double  NOT NULL,
    `ganancia`          double  NOT NULL,
    `idYear`            integer NOT NULL,
    `idMes`             integer NOT NULL,
    `idAdmin`           integer NOT NULL,
    constraint PK_Liquidacion primary key (id),
    constraint FK_Liquidacion_Y foreign key (idMes) references mes (id),
    constraint FK_Liquidacion_Admin foreign key (idAdmin) references usuario (id),
    constraint FK_Liquidacion_M foreign key (idYear) references year (id)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza`
(
    `id`            integer NOT NULL AUTO_INCREMENT,
    `fecha`         date    NOT NULL,
    `idTarjeta`     integer NOT NULL,
    `total`         double  NOT NULL,
    `idProducto`    integer NOT NULL,
    `cantidad`      int(11) NOT NULL,
    `idComprador`   integer NOT NULL,
    `idVendedor`    integer NOT NULL,
    `idCuenta`      integer NOT NULL,
    `idLiquidacion` integer DEFAULT NULL,
    constraint PK_Cobranza primary key (id),
    constraint FK_Cobranza_Cuenta foreign key (idCuenta) references cuenta (id),
    constraint FK_Cobranza_Tarjeta foreign key (idTarjeta) references tarjeta_de_credito (id),
    constraint FK_Cobranza_Comprador foreign key (idComprador) references usuario (id),
    constraint FK_Cobranza_Vendedor foreign key (idVendedor) references usuario (id),
    constraint FK_Cobranza_liquidacion foreign key (idLiquidacion) references liquidacion (id),
    constraint FK_Cobranza_Producto foreign key (idProducto) references producto (id)

);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `cuenta_liquidacion`
(
    `idCuenta`      integer NOT NULL,
    `idLiquidacion` integer NOT NULL,
    constraint PK_Liquidacion primary key (idCuenta, idLiquidacion),
    constraint FK_Cuenta_Liquidacion_Cu foreign key (idCuenta) references cuenta (id),
    constraint FK_Cuenta_Liquidacion_Li foreign key (idLiquidacion) references liquidacion (id)
);

CREATE TABLE rango_montos
(
    id             integer not null AUTO_INCREMENT,
    desde          int not null,
    hasta          int not null,
    id_estadistica integer,
    primary key (id),
    FOREIGN Key (id_estadistica) references estadisticas (id)
);



-- --------------------------------------------------------


--
-- Base de datos: `onmarket`
--


INSERT INTO `categoria` (`id`, `nombreCategoria`, `id_estadistica`)
VALUES (1, 'electronica', NULL),
       (2, 'moda', NULL),
       (3, 'mascotas', NULL),
       (4, 'herramientas', NULL),
       (5, 'muebles', NULL),
       (6, 'deportes', NULL),
       (7, 'musica', NULL),
       (8, 'jardin', NULL);


INSERT INTO `estado` (`id`, `nombre`)
VALUES (1, 'activo'),
       (2, 'inactivo');


INSERT INTO `formaentrega` (`idEntrega`, `descripcion`)
VALUES (1, 'acordarConElVendedor'),
       (2, 'Correo');


INSERT INTO `permiso` (`id`, `nombre`)
VALUES (1, 'bloquearUsuario'),
       (2, 'consultarEstadistica');


INSERT INTO `tipo_estadistica` (`id`, `nombre`)
VALUES (1, 'producto'),
       (2, 'categoria'),
       (3, 'monto');


INSERT INTO `rol` (`id`, `tipo`)
VALUES (1, 'Estandar'),
       (2, 'Administrador');



INSERT INTO `permiso_rol` (`idPermiso`, `idRol`)
VALUES (1, 2),
       (2, 2);



INSERT INTO `tipo_valoracion` (`id`, `descripcion`)
VALUES (1, 'Top'),
       (2, 'Medio Pelo'),
       (3, 'Para atras');

INSERT INTO `usuario` (`id`, `userName`, `password`, `name`, `lastname`, `email`, `rol`, `sexo`, `cuit`, `estado`,
                       `idTipo`,`direccion` )
VALUES (1, 'RoCentu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rocio', 'Centu', 'rocio_perez@hotmail.com', 1,
        'femenino', 2147483647, 1, 2, 'Buenos Aires'),
       (2, 'Axel', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Axel', 'Sanchez', 'axel_rios@hotmail.com', 2,
        'masculino', 2147483647, 1, 1, 'Buenos Aires Isidro Casanova'),
       (3, 'roger', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Roger', 'Federer', 'rogerfedQ@gmail.com', 2, 'Hombre',
        2147483647, 0, 1,'Cordoba Villa Carlos Paz'),
       (4, 'mar18', '0f2c595baa1fac2457a5970eb17f735ffedd0c40', 'Marcia', 'Giselle', 'margisetoledo@gmail.com', 2,
        'Mujer', 2147483647, 1, 1, 'Buenos Aires Bahia Blanca'),
       (5, 'nati', '9adcb29710e807607b683f62e555c22dc5659713', 'Natalia', 'Toledo', 'nati@gmail.com', 2, 'Mujer',
        12345689, 1, 1,'Buenos Aires Azul'),
       (6, 'agustole', '3d2a34c7b4f68d10409cf0396858ef533db01ac7', 'Agustin', 'Toledo', 'agus782@gmail.com', 2,
        'Hombre', 123456789, 1, 1,'Rio Negro Viedma'),
       (7, 'marce', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Marcelo', 'Toledo', 'marcelo@gmail.com', 2, 'Hombre',
        789456123, 1, 2,'Cordoba Santa Rosa de Calmachita');

INSERT INTO `tarjeta_de_credito` (`id`, `idUser`, `numero`, `cod_seguridad`, `fecha_vencimiento`)
VALUES (1, 4, 2147483647, '123', '2019-07-31'),
       (2, 4, 2147483647, '123', '2019-07-31'),
       (3, 4, 2147483647, '123', '2019-07-31'),
       (4, 4, 2147483647, '123', '2019-07-31'),
       (5, 7, 2147483647, '123', '2019-07-31'),
       (6, 7, 2147483647, '123', '2019-07-31'),
       (7, 7, 2147483647, '123', '2019-07-31'),
       (8, 7, 2147483647, '123', '2019-07-31');


INSERT INTO `localizacion` (`id`, `latitud`, `longitud`, `id_user`)
VALUES (1, -34.6686986, -58.5614947, 2),
       (27, 36, 36.3, 1),
       (29, -35.675147, -71.54296899999997, 3),
       (30, -34.7107108, -58.59419129999998, 4),
       (31, -34.7107108, -58.59419129999998, 5),
       (32, -34.7107108, -58.59419129999998, 6),
       (33, -34.7093701, -58.59797420000001, 7);

INSERT INTO `cuenta` (`id`, `fecha_deposito`, `monto`, `comisionAlSistema`, `idUsuario`)
VALUES (1, '2019-07-12', 0, 0, 1),
       (2, '2019-07-12', 0, 0, 2),
       (3, '2019-07-12', 0, 0, 3),
       (4, '2019-07-12', 0, 0, 4),
       (5, '2019-07-12', 0, 0, 5),
       (6, '2019-07-12', 0, 0, 6),
       (7, '2019-07-12', 0, 0, 7)
;

INSERT INTO `rango_montos`(`desde`, `hasta`)
VALUES (0, 500),
       (500, 1000),
       (1000, 1500),
       (1500, 3000),
       (3000, 10000);

INSERT INTO mes (id, nombre)
VALUES (1, 'enero'),
       (2, 'febrero'),
       (3, 'marzo'),
       (4, 'abril'),
       (5, 'mayo'),
       (6, 'junio'),
       (7, 'julio'),
       (8, 'agosto'),
       (9, 'septiembre'),
       (10, 'octubre'),
       (11, 'noviembre'),
       (12, 'diciembre');

INSERT INTO year (year)
values (2018),
       (2019);


INSERT INTO `producto` (`id`, `descripcion`, `cantidad`, `precio`, `idCategoria`, `nombre`) VALUES
(5, 'Variedad en modelos y formas.', 100, 200, 8, 'Kit impreso para desayuno dia de la madre'),
(7, 'Diferentes diseÃ±os, originales. Paquete de 10 unidades.', 100, 200, 7, 'Invitaciones de cumpleaÃ±os personalizadas'),
(8, 'Diferentes tamaÃ±os, ideales para decorar tu negocio.', 20, 150, 8, 'Vinilos dÃ­a de la madre'),
(32, 'Ideal para decorar tu negocio.', 20, 250, 8, 'Vinilos primaverales decorativos'),
(33, '*Si querÃ©s algÃºn diseÃ±o personalizado, consÃºltanos, podemos hacerlo!\r\n*El tiempo de elaboraciÃ³n siempre depende del feedback con el cliente. ', 100, 250, 8, 'Invitaciones de ComuniÃ³n y cumpleaÃ±os'),
(34, 'Troquelados y distintos tamaÃ±os.', 50, 120, 7, 'Stickers Kpop 20 unidades'),
(35, 'SÃºper divertidos y coloridos', 100, 400, 8, 'Vinilos decorativos DÃ­a del niÃ±o');

INSERT INTO `publicacion` (`id`, `titulo`, `fecha`, `id_user`, `id_Producto`, `id_Estado`) VALUES
(1, 'Kit desayuno ', '2019-07-16', 2, 5, 1),
(2, 'Invitaciones Personalizadas', '2019-07-16', 2, 7, 1),
(3, 'Vinilos decorativos', '2019-07-16', 2, 8, 1),
(4, 'Vinilos primaverales', '2019-07-16', 2, 32, 1),
(5, 'Invitaciones de comuniÃ³n', '2019-07-16', 2, 33, 1),
(6, 'Kit Stickers Bts Kpop', '2019-07-16', 2, 34, 1),
(7, 'Vinilos Dia del NiÃ±o', '2019-07-16', 2, 35, 1);


INSERT INTO `publicacion_entrega` (`idEntrega`, `idPublicacion`, `id`) VALUES
(1, 1, 0),
(1, 2, 0),
(1, 3, 0),
(1, 5, 0),
(1, 6, 0),
(1, 7, 0),
(2, 4, 0),
(2, 5, 0);

INSERT INTO `imagen` (`id`, `nombre`, `idProducto`) VALUES
(1, 'kit3.png', 5),
(2, 'kit2.png', 5),
(3, 'kit1.png', 5),
(4, 'INVITACIONES4.png', 7),
(5, 'INVITACIONES5.png', 7),
(6, 'INVITACIONES6.png', 7),
(7, 'INVITACIONES3.png', 7),
(8, 'INVITACIONES2.png', 7),
(9, '8d.png', 8),
(10, '7d.png', 8),
(11, '6d.png', 8),
(12, '5d.png', 8),
(13, '4d.png', 8),
(14, 'fotos3.png', 32),
(15, 'fotos2.png', 32),
(16, 'mercadolibrepricolores.png', 32),
(17, 'comu.jpg', 33),
(18, 'comunion.jpg', 33),
(19, 'comunion2.jpg', 33),
(20, 'kpop.png', 34),
(21, 'bts.png', 34),
(22, 'vinilonemo.jpg', 35),
(23, 'vinilos.jpg', 35),
(24, 'vinilos2.jpg', 35);
