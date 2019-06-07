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