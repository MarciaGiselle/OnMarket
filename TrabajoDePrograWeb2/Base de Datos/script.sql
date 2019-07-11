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
-- Estructura de tabla para la tabla `categoria`
--
CREATE TABLE categoria
(
    idCategoria     integer     NOT NULL AUTO_INCREMENT,
    nombreCategoria varchar(30) NOT NULL,
    constraint PK_Categoria primary key (idCategoria)
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
    `id`          integer      NOT NULL AUTO_INCREMENT,
    `descripcion` text         NOT NULL,
    `cantidad`    int(11)      NOT NULL,
    `precio`      int(11)      NOT NULL,
    `idCategoria` integer DEFAULT NULL,
    `nombre`      varchar(191) NOT NULL,
    constraint PK_Producto primary key (id),
    constraint FK_Producto_Categoria foreign key (idCategoria) references categoria (idCategoria)
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
    `fecha`          date         NOT NULL,
    `id_Usuario`     integer      NOT NULL,
    `id_Publicacion` integer      NOT NULL,
    constraint PK_Comentario primary key (id),
    constraint FK_Comentario_Usuario foreign key (id_usuario) references usuario (id),
    constraint FK_Comentario_Publicacion foreign key (id_Publicacion) references publicacion (id)
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
    constraint PK_Publicacion_Entrega primary key (idEntrega, idPublicacion),
    constraint FK_Publicacion_Entrega_En foreign key (idEntrega) references formaentrega (idEntrega),
    constraint FK_Publicacion_Entrega_Pu foreign key (idPublicacion) references publicacion (id)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `liquidacion`
--

CREATE TABLE `liquidacion`
(
    `id`                integer NOT NULL AUTO_INCREMENT,
    `fecha_liquidacion` date    NOT NULL,
    `total`             double  NOT NULL,
    `ganancia`          double DEFAULT NULL,
    constraint PK_Liquidacion primary key (id)
);


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cobranza`
--

CREATE TABLE `cobranza`
(
    `id`          integer NOT NULL AUTO_INCREMENT,
    `fecha`       date    NOT NULL,
    `idTarjeta`   integer NOT NULL,
    `total`       double  NOT NULL,
    `idProducto`  int(11) NOT NULL,
    `cantidad`    int(11) NOT NULL,
    `idComprador` integer NOT NULL,
    `idVendedor`  integer NOT NULL,
    `idCuenta`    integer NOT NULL,
    `idLiquidacion` integer DEFAULT NULL,
    constraint PK_Cobranza primary key (id),
    constraint FK_Cobranza_Cuenta foreign key (idCuenta) references cuenta (id),
    constraint FK_Cobranza_Tarjeta foreign key (idTarjeta) references tarjeta_de_credito (id),
    constraint FK_Cobranza_Comprador foreign key (idComprador) references usuario (id),
    constraint FK_Cobranza_Vendedor foreign key (idVendedor) references usuario (id),
    constraint FK_Cobranza_liquidacion foreign key (idLiquidacion) references liquidacion (id)
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
    `id`          integer NOT NULL AUTO_INCREMENT,
    `id_Producto` integer NOT NULL,
    `cantidad`    int(11) NOT NULL,
    `id_tipo`     integer NOT NULL,
    constraint PK_Estadisticas primary key (id),
    constraint FK_Estadisticas_Producto foreign key (id_Producto) references producto (id),
    constraint FK_Estadisticas_Tipo foreign key (id_tipo) references tipo_estadistica (id)
);

-- --------------------------------------------------------

--
-- Volcado de datos para la tabla `formaentrega`
--

INSERT INTO `formaentrega` (`idEntrega`, `descripcion`)
VALUES (1, 'acordarConElVendedor'),
       (2, 'Correo');

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `tipo`)
VALUES (1, 'Estandar'),
       (2, 'Administrador');

--
-- Volcado de datos para la tabla `tipo_valoracion`
--

INSERT INTO `tipo_valoracion` (`id`, `descripcion`)
VALUES (1, 'Top'),
       (2, 'Medio Pelo'),
       (3, 'Para atras');
--
-- Volcado de datos para la tabla `localizacion`
INSERT INTO `usuario` (`id`, `userName`, `password`, `name`, `lastname`, `email`, `rol`, `sexo`, `cuit`, `estado`,
                       `idTipo`)
VALUES (1, 'RoCentu', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Rocio', 'Centu', 'rocio_perez@hotmail.com', 1,
        'femenino', 2147483647, 1, 2),
       (2, 'Axel', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Axel', 'Sanchez', 'axel_rios@hotmail.com', 2,
        'masculino', 2147483647, 1, 1),
       (3, 'roger', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'Roger', 'Federer', 'rogerfedQ@gmail.com', 2, 'Hombre',
        2147483647, 0, 1),
       (4, 'mar18', '0f2c595baa1fac2457a5970eb17f735ffedd0c40', 'Marcia', 'Giselle', 'margisetoledo@gmail.com', 2,
        'Mujer', 2147483647, 1, 1),
       (5, 'nati', '9adcb29710e807607b683f62e555c22dc5659713', 'Natalia', 'Toledo', 'nati@gmail.com', 2, 'Mujer',
        12345689, 1, 1),
       (6, 'agustole', '3d2a34c7b4f68d10409cf0396858ef533db01ac7', 'Agustin', 'Toledo', 'agus782@gmail.com', 2,
        'Hombre', 123456789, 1, 1),
       (7, 'marce', 'fc1200c7a7aa52109d762a9f005b149abef01479', 'Marcelo', 'Toledo', 'marcelo@gmail.com', 2, 'Hombre',
        789456123, 1, 2);


INSERT INTO `localizacion` (`id`, `latitud`, `longitud`, `id_user`)
VALUES (1, -34.6686986, -58.5614947, 2),
       (27, 36, 36.3, 1),
       (29, -35.675147, -71.54296899999997, 3),
       (0, -34.7107108, -58.59419129999998, 4),
       (0, -34.7107108, -58.59419129999998, 5),
       (0, -34.7107108, -58.59419129999998, 6),
       (0, -34.7093701, -58.59797420000001, 7);


--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`idCategoria`, `nombreCategoria`)
VALUES (1, 'electronica'),
       (2, 'moda'),
       (3, 'mascotas'),
       (4, 'herramientas'),
       (5, 'muebles'),
       (6, 'deportes'),
       (7, 'musica'),
       (8, 'jardin');



INSERT INTO `permiso` (`nombre`)
VALUES ('bloquearUsuario'),
       ('consultarEstadisticas');

INSERT INTO `permiso_rol` (`idPermiso`, `idRol`)
VALUES (1, 2),
       (2, 2);



--
-- Volcado de datos para la tabla `usuario`
--

