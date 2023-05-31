-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-05-2023 a las 20:49:13
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
  `leido` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `consultas`
--

INSERT INTO `consultas` (`id`, `nombre_apellido`, `email`, `razon`, `area`, `mensaje`, `leido`) VALUES
(3, 'Juan Porto', 'j@gmail.com', 'denuncia', 'facturacion', 'hola quiero denunciar uno de tus empleados', 'NO'),
(4, '123 123', 'matii_seba_11@hotmail.com', 'problema', 'facturacion', 'hola quiero reportar un problema con un juego', 'NO');

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
(14, '       barrio quintana', 3400);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` double(16,2) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `categoria_id` int(2) NOT NULL,
  `cantidad` int(100) NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `activo` varchar(2) NOT NULL DEFAULT 'SI',
  `es_tendencia` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `description`, `categoria_id`, `cantidad`, `imagen`, `activo`, `es_tendencia`) VALUES
(8, 'Asseto Corsa', 3000.00, 'carrera', 4, 52, '1685053151_4c6bc46a3e2976c7a22d.jpg', 'SI', 'NO'),
(9, 'The last of us', 100.00, 'zombies', 2, 64, '1685060454_bb4442de5a191a152208.jpg', 'SI', 'NO'),
(10, 'Dredge', 5000.00, 'asd', 2, 66, '1685075794_34c4f1891b5ec54cd6a8.jpg', 'SI', 'NO'),
(11, 'Resident Evil 4 RE', 12000.00, 'el clasico ha vuelto ', 2, 26, '1685109489_781e62756643636c2412.jpg', 'SI', 'NO'),
(12, 'Sifu', 5000.00, 'sobrevive y cumple tu venganza', 2, 19, '1685109550_ae4d3642844c510aa4c3.jpg', 'SI', 'NO'),
(13, 'Resident Evil 2 RE', 6000.00, 'el clásico reimaginado', 1, 60, '1685109624_ce9fdcea0d1c391f7305.jpg', 'SI', 'NO'),
(14, 'Doom Eternal', 6000.00, 'mata demonios', 1, 50, '1685109697_98ad4fa457e05a39e57c.jpg', 'SI', 'NO'),
(15, 'Doom ', 2000.00, 'un clasico modernizado', 1, 30, '1685109733_84b074711623d59a8448.jpg', 'SI', 'NO'),
(16, 'Resident Evil Village', 6000.00, 'adentrate en la villa', 2, 20, '1685109799_241b39b646c2572d5aff.jpg', 'SI', 'NO'),
(17, 'Spiderman Miles Morales', 5900.00, 'spiderman', 2, 9, '1685109847_7a9cd7c61e24d34a7526.jpg', 'SI', 'NO'),
(18, 'Mortal Kombat X', 2000.00, 'Fatality', 3, 10, '1685128394_31fb045678c9943ae5e7.jpg', 'SI', 'NO'),
(19, 'Far Cry 6', 12000.00, 'asd', 1, 60, '1685455640_a3b6d121f18c37228319.jpg', 'SI', 'SI');

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
(37, 'Jorge', 'Lopez', '21@gmail.com', '123', '2yG9q7O7s42BI', 2, 14, NULL, 'NO');

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
(23, '2023-05-29', 37, 5100),
(24, '2023-05-29', 37, 100),
(25, '2023-05-29', 37, 100),
(26, '2023-05-29', 37, 100),
(27, '2023-05-29', 37, 100),
(28, '2023-05-29', 37, 17000),
(29, '2023-05-29', 37, 5000),
(30, '2023-05-29', 37, 100),
(31, '2023-05-29', 37, 3100),
(32, '2023-05-29', 37, 100),
(33, '2023-05-29', 37, 5900),
(34, '2023-05-29', 37, 5000);

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
(32, 23, 9, 1, 100, 100),
(33, 23, 10, 1, 5000, 5000),
(34, 24, 9, 1, 100, 100),
(35, 25, 9, 1, 100, 100),
(36, 26, 9, 1, 100, 100),
(37, 27, 9, 1, 100, 100),
(38, 28, 10, 1, 5000, 5000),
(39, 28, 11, 1, 12000, 12000),
(40, 29, 10, 1, 5000, 5000),
(41, 30, 9, 1, 100, 100),
(42, 31, 9, 1, 100, 100),
(43, 31, 8, 1, 3000, 3000),
(44, 32, 9, 1, 100, 100),
(45, 33, 17, 1, 5900, 5900),
(46, 34, 10, 1, 5000, 5000);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `domicilios`
--
ALTER TABLE `domicilios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ventas_cabecera`
--
ALTER TABLE `ventas_cabecera`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `ventas_detalle`
--
ALTER TABLE `ventas_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

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
