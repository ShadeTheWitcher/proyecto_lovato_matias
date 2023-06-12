-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2023 a las 17:42:50
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_lovato_matias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `consultas`
--

CREATE TABLE `consultas` (
  `id` int(11) NOT NULL,
  `nombre_apellido` varchar(60) NOT NULL,
  `email` varchar(30) NOT NULL,
  `razon` varchar(30) NOT NULL,
  `area` varchar(30) NOT NULL,
  `mensaje` varchar(120) NOT NULL,
  `leido` varchar(2) NOT NULL DEFAULT 'NO',
  `tipo_usuario` int(2) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre_apellido`, `email`, `razon`, `area`, `mensaje`, `leido`, `tipo_usuario`) VALUES
(3, 'Juan Porto', 'j@gmail.com', 'denuncia', 'facturacion', 'hola quiero denunciar uno de tus empleados', 'SI', 1),
(4, '123 123', 'matii_seba_11@hotmail.com', 'problema', 'facturacion', 'hola quiero reportar un problema con un juego', 'SI', 2),
(5, 'Juancho el mas capo', 'juankapo1@gmail.com', 'problema', 'soporte tecnico', 'no me abre el juego, me sale una pantalla azul en el windows cuando intento abrir el Cyberbug 2077', 'NO', 1),
(6, 'Juancho el mas capo', 'juankapo1@gmail.com', 'problema', 'soporte tecnico', 'como hago para registrarme en tu pagina porque vivo en el campo y no se como hacerle ', 'NO', 1),
(20, 'Jorge Lopez', '21@gmail.com', 'denuncia', 'facturacion', 'asdasd', 'SI', 2),
(21, 'Jorge Lopez', '21@gmail.com', 'Problema', 'facturacion', 'No me diste mi factura, no se si que compre ', 'NO', 2),
(22, 'Jorge Lopez', '21@gmail.com', 'Consulta', 'soporte tecnico', 'Tenes el gta 7?', 'NO', 2),
(23, 'juan carlo', '123@gmail.com', 'consulta', 'facturacion', 'asd', 'NO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `domicilios`
--

CREATE TABLE `domicilios` (
  `id` int(11) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `cod_postal` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `domicilios`
--

INSERT INTO `domicilios` (`id`, `direccion`, `cod_postal`) VALUES
(6, 'B pirayui 200vv mz 21 casa 56', 3400),
(7, 'B pirayui 200vv mz 21 casa 56', 3400),
(8, 'barrio quintana', 3400),
(9, ' barrio quintana asd', 3400),
(10, ' barrio quintana asd', 3400),
(11, '  barrio quintana asd', 3400),
(12, '   barrio quintana asdasd', 3400),
(13, '    barrio quintana asdasd', 3400),
(14, 'barrio quintana123', 3400),
(15, 'B pirayui', 3400),
(16, 'barrio chiquita', 3400),
(17, '245vv asda', 3400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nombre_producto` varchar(255) DEFAULT NULL,
  `precio_producto` double(16,2) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `categoria_id` int(2) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `activo` varchar(2) NOT NULL DEFAULT 'SI',
  `es_tendencia` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre_producto`, `precio_producto`, `descripcion`, `categoria_id`, `cantidad`, `imagen`, `activo`, `es_tendencia`) VALUES
(8, 'Asseto Corsa', 3000.00, 'carrera', 4, 47, '1685053151_4c6bc46a3e2976c7a22d.jpg', 'SI', 'SI'),
(9, 'The last of us', 100.00, 'zombies', 2, 53, '1685060454_bb4442de5a191a152208.jpg', 'SI', 'SI'),
(10, 'Dredge', 5000.00, 'asd', 2, 57, '1685075794_34c4f1891b5ec54cd6a8.jpg', 'SI', 'NO'),
(11, 'Resident Evil 4 RE', 12000.00, 'el clasico ha vuelto ', 2, 23, '1685109489_781e62756643636c2412.jpg', 'SI', 'NO'),
(12, 'Sifu', 5000.00, 'sobrevive y cumple tu venganza', 2, 17, '1685109550_ae4d3642844c510aa4c3.jpg', 'SI', 'NO'),
(13, 'Resident Evil 2 RE', 6000.00, 'el clásico reimaginado', 1, 59, '1685109624_ce9fdcea0d1c391f7305.jpg', 'SI', 'NO'),
(14, 'Doom Eternal', 6800.00, 'mata demonios', 1, 47, '1685109697_98ad4fa457e05a39e57c.jpg', 'SI', 'NO'),
(15, 'Doom ', 2000.00, 'un clasico modernizado', 1, 28, '1685109733_84b074711623d59a8448.jpg', 'SI', 'NO'),
(16, 'Resident Evil Village', 6000.00, 'adentrate en la villa', 2, 18, '1685109799_241b39b646c2572d5aff.jpg', 'SI', 'SI'),
(17, 'Spiderman Miles Morales', 5900.00, 'spiderman', 2, 8, '1685109847_7a9cd7c61e24d34a7526.jpg', 'SI', 'SI'),
(18, 'Mortal Kombat X', 2000.00, 'Fatality', 3, 10, '1685128394_31fb045678c9943ae5e7.jpg', 'SI', 'NO'),
(19, 'Far Cry 6', 12000.00, 'Far Cry ahora en cuba ', 2, 58, '1685455640_a3b6d121f18c37228319.jpg', 'SI', 'SI'),
(20, 'Grand Theft Auto 6', 20000.00, 'Volvemos a Vice City!', 1, 199, '1685850382_073120cf04d890174d73.jpg', 'SI', 'SI'),
(25, 'Jedi Survivor', 1230.00, 'asd', 2, 123, '1686427753_30c5a1b93b72c4cd16eb.jpg', 'SI', 'SI'),
(26, 'Street Fighter V', 12000.00, 'vuelve la saga favorita de luchas a la edad moderna ', 3, 100, '1686428562_386e4b2b4b3fb56249cf.jpg', 'SI', 'SI'),
(27, 'GTA Triology', 6000.00, 'los clasicos GTA han vuelto', 1, 300, '1686434490_689e0ef21f3740727daa.jpg', 'SI', 'NO'),
(28, 'GTA 4 Complete Edition', 3000.00, 'Liberty City una ciudad oscura y llena de oportunidades', 1, 200, '1686434567_368cbb5ba4480d94e48f.jpg', 'SI', 'NO'),
(29, 'Call of Duty Black Ops 3', 1000.00, 'un fps donde la tecnologia es vital', 1, 250, '1686434646_2e2e81d18b33ba17ed2a.jpg', 'SI', 'NO'),
(30, 'Battlefiel 1 Revolution', 1500.00, 'un shooter lleno de destruccion', 1, 200, '1686434735_85b3d712b27564631b6d.jpg', 'SI', 'NO'),
(31, 'Dark Souls Remastered', 6000.00, 'Adentrate a esta aventura llena de dificultades', 2, 600, '1686434836_d5756d441c33111b1312.jpg', 'SI', 'NO'),
(32, 'GTA 5', 1200.00, 'construye tu imperio del crimen', 1, 300, '1686434948_57dd0a3b26996988fd3a.jpg', 'SI', 'NO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_usuario`
--

CREATE TABLE `tipos_usuario` (
  `id` int(11) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipos_usuario`
--

INSERT INTO `tipos_usuario` (`id`, `tipo`) VALUES
(1, 'ADMIN'),
(2, 'CLIENTE');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `domicilio_id` int(11) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `baja` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `email`, `usuario`, `pass`, `perfil_id`, `domicilio_id`, `tel`, `baja`) VALUES
(35, 'Shade', 'Witcher', 'admin@gmail.com', 'admin', '2yn.4fvaTgedM', 1, NULL, NULL, 'NO'),
(37, 'Jorge', 'Lopez', '21@gmail.com', '123', '2yG9q7O7s42BI', 2, 14, 379451221, 'NO'),
(38, 'Jose', 'Ralls', 'js@gmail.com', 'js123', '2yG9q7O7s42BI', 2, 15, NULL, 'NO'),
(39, 'Julio Reynaldo', 'Lovato', '1234@hotmail.com', 'julio', '2yG9q7O7s42BI', 2, NULL, NULL, 'NO'),
(40, 'Enzo', 'Lopez', '124as@gmail.com', 'le1', '2yG9q7O7s42BI', 2, 16, 0, 'NO'),
(41, 'asd', 'asd', 'asd@gmail.com', '12355', '2yG9q7O7s42BI', 2, 17, 345, 'SI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_cabecera`
--

CREATE TABLE `ventas_cabecera` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total_venta` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_cabecera`
--

INSERT INTO `ventas_cabecera` (`id`, `fecha`, `usuario_id`, `total_venta`) VALUES
(40, '2023-06-10', 37, 16200),
(41, '2023-06-10', 37, 3100),
(42, '2023-06-10', 37, 12000),
(43, '2023-06-10', 37, 100),
(44, '2023-06-10', 37, 122500),
(45, '2023-06-10', 41, 5000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_detalle`
--

CREATE TABLE `ventas_detalle` (
  `id` int(11) NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad_venta` int(11) NOT NULL,
  `precio` double NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas_detalle`
--

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad_venta`, `precio`, `sub_total`) VALUES
(56, 40, 8, 2, 3000, 6000),
(57, 40, 9, 2, 100, 200),
(58, 40, 10, 2, 5000, 10000),
(59, 41, 8, 1, 3000, 3000),
(60, 41, 9, 1, 100, 100),
(61, 42, 11, 1, 12000, 12000),
(62, 43, 9, 1, 100, 100),
(63, 44, 9, 2, 100, 200),
(64, 44, 16, 2, 6000, 12000),
(65, 44, 14, 3, 6800, 20400),
(66, 44, 15, 2, 2000, 4000),
(67, 44, 19, 2, 12000, 24000),
(68, 44, 20, 1, 20000, 20000),
(69, 44, 12, 2, 5000, 10000),
(70, 44, 17, 1, 5900, 5900),
(71, 44, 13, 1, 6000, 6000),
(72, 44, 8, 1, 3000, 3000),
(73, 44, 10, 1, 5000, 5000),
(74, 44, 11, 1, 12000, 12000),
(75, 45, 10, 1, 5000, 5000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos_usuario`
--
ALTER TABLE `tipos_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`,`usuario`),
  ADD KEY `perfil_id` (`perfil_id`),
  ADD KEY `domicilio_id` (`domicilio_id`);

--
-- Indices de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `venta_id` (`venta_id`,`producto_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`perfil_id`) REFERENCES `tipos_usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `usuarios_ibfk_2` FOREIGN KEY (`domicilio_id`) REFERENCES `domicilios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  ADD CONSTRAINT `ventas_cabecera_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  ADD CONSTRAINT `ventas_detalle_ibfk_1` FOREIGN KEY (`producto_id`) REFERENCES `products` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ventas_detalle_ibfk_2` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
