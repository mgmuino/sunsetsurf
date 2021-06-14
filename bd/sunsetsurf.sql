-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-06-2021 a las 17:14:59
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sunsetsurf`
--
CREATE DATABASE IF NOT EXISTS `sunsetsurf` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `sunsetsurf`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alquileres`
--

CREATE TABLE `alquileres` (
  `id_alquiler` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tiempo` int(1) NOT NULL,
  `id_cliente` int(11) NOT NULL,
  `id_material` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asist_clientes`
--

CREATE TABLE `asist_clientes` (
  `id_asistencia` int(11) NOT NULL,
  `fecha` int(11) NOT NULL,
  `id_clase` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bonos`
--

CREATE TABLE `bonos` (
  `id_bono` int(11) NOT NULL,
  `precio` int(3) NOT NULL,
  `num_clases` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bonos`
--

INSERT INTO `bonos` (`id_bono`, `precio`, `num_clases`) VALUES
(1, 30, 1),
(2, 55, 2),
(3, 70, 4),
(4, 120, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clases`
--

CREATE TABLE `clases` (
  `id_clase` int(11) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL,
  `id_monitor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `lugar` varchar(30) NOT NULL,
  `asistentes` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `num_clases` int(11) NOT NULL,
  `id_contacto_emerg` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `num_clases`, `id_contacto_emerg`) VALUES
(2, 0, 1),
(3, 0, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_bono` int(11) NOT NULL,
  `id_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_emergencia`
--

CREATE TABLE `contactos_emergencia` (
  `id_contacto` int(11) NOT NULL,
  `nombre1` varchar(30) NOT NULL,
  `descripcion1` varchar(30) NOT NULL,
  `telefono1` varchar(9) NOT NULL,
  `nombre2` varchar(30) DEFAULT NULL,
  `descripcion2` varchar(30) DEFAULT NULL,
  `telefono2` varchar(9) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contactos_emergencia`
--

INSERT INTO `contactos_emergencia` (`id_contacto`, `nombre1`, `descripcion1`, `telefono1`, `nombre2`, `descripcion2`, `telefono2`) VALUES
(1, 'contacto', 'madre', '111111111', NULL, NULL, NULL),
(2, 'contacto', 'tio', '111111111', 'contacto', 'hermano', '222222222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material`
--

CREATE TABLE `material` (
  `id_material` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `marca` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `id_tarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `material`
--

INSERT INTO `material` (`id_material`, `nombre`, `marca`, `descripcion`, `id_tarifa`) VALUES
(1, 'Tabla de surf blanda', 'Up', '8\'', 1),
(2, 'Tabla de surf blanda', 'Up', '6\'', 1),
(3, 'Tabla de surf blanda', 'Up', '7\'', 1),
(4, 'Neopreno', 'Rip Curl', 'L', 2),
(5, 'Neopreno', 'Rip Curl', 'M', 2),
(6, 'Neopreno', 'Rip Curl', 'S', 2),
(7, 'Neopreno', 'Rip Curl', 'XS', 2),
(8, 'Neopreno', 'Rip Curl', 'XL', 2),
(9, 'Tabla de surf blanda', 'Up', '7\'', 1),
(10, 'Tabla de surf blanda', 'Up', '7\'', 1),
(11, 'Tabla de surf blanda', 'Up', '7\'', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `id_monitor` int(11) NOT NULL,
  `num_titulo` varchar(30) NOT NULL,
  `cert_delitos` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`id_monitor`, `num_titulo`, `cert_delitos`) VALUES
(1, '1', 'si');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas_material`
--

CREATE TABLE `tarifas_material` (
  `id_tarifa` int(11) NOT NULL,
  `precio` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifas_material`
--

INSERT INTO `tarifas_material` (`id_tarifa`, `precio`) VALUES
(1, 10),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_clase`
--

CREATE TABLE `tipos_clase` (
  `nombre_tipo` varchar(30) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipos_clase`
--

INSERT INTO `tipos_clase` (`nombre_tipo`, `descripcion`) VALUES
('Bautismo', 'Primer contacto con el surf.'),
('Iniciación', 'Aprendizaje básico de surf.'),
('Perfeccionamiento', 'Perfeccionamiento de ese nivel básico aprendido.'),
('Tecnificación', 'Mejora de técnica avanzada.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `dni` varchar(30) NOT NULL,
  `fec_nac` date NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellidos`, `dni`, `fec_nac`, `telefono`, `email`, `password`) VALUES
(1, 'monitor', 'uno', '11111111Q', '2021-06-01', '111111111', 'monitor1@monitor1.com', '234d3309b86c261aba8db1f878ca00ef57cf0f6c'),
(2, 'cliente', 'uno', '22222222Q', '2021-06-02', '222222222', 'cliente1@cliente1.com', '06b8abdc1bed263dcce2f8b6cde6c5189e61e582'),
(3, 'cliente', 'dos', '33333333Q', '2021-06-01', '333333333', 'cliente2@cliente2.com', '4ca688df015ff0ed013fb42e35e07278335c8ebd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD PRIMARY KEY (`id_alquiler`),
  ADD KEY `FK_id_cliente` (`id_cliente`),
  ADD KEY `FK_id_material` (`id_material`) USING BTREE;

--
-- Indices de la tabla `asist_clientes`
--
ALTER TABLE `asist_clientes`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `FK_id_clase` (`id_clase`),
  ADD KEY `FK_id_cliente` (`id_cliente`);

--
-- Indices de la tabla `bonos`
--
ALTER TABLE `bonos`
  ADD PRIMARY KEY (`id_bono`);

--
-- Indices de la tabla `clases`
--
ALTER TABLE `clases`
  ADD PRIMARY KEY (`id_clase`),
  ADD UNIQUE KEY `UK_fecha` (`fecha`),
  ADD KEY `FK_nombre_tipo` (`nombre_tipo`),
  ADD KEY `FK_id_monitor` (`id_monitor`) USING BTREE;

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `FK_id_contacto_emerg` (`id_contacto_emerg`) USING BTREE,
  ADD KEY `FK_id_usuario` (`id_cliente`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `FK_id_bono` (`id_bono`),
  ADD KEY `FK_id_cliente` (`id_cliente`);

--
-- Indices de la tabla `contactos_emergencia`
--
ALTER TABLE `contactos_emergencia`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `material`
--
ALTER TABLE `material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `FK_id_tarifa` (`id_tarifa`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`id_monitor`),
  ADD KEY `FK_id_usuario` (`id_monitor`);

--
-- Indices de la tabla `tarifas_material`
--
ALTER TABLE `tarifas_material`
  ADD PRIMARY KEY (`id_tarifa`);

--
-- Indices de la tabla `tipos_clase`
--
ALTER TABLE `tipos_clase`
  ADD PRIMARY KEY (`nombre_tipo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `UK_dni` (`dni`) USING BTREE,
  ADD UNIQUE KEY `UK_email` (`email`) USING BTREE;

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alquileres`
--
ALTER TABLE `alquileres`
  MODIFY `id_alquiler` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `asist_clientes`
--
ALTER TABLE `asist_clientes`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `bonos`
--
ALTER TABLE `bonos`
  MODIFY `id_bono` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clases`
--
ALTER TABLE `clases`
  MODIFY `id_clase` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `contactos_emergencia`
--
ALTER TABLE `contactos_emergencia`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `material`
--
ALTER TABLE `material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `monitores`
--
ALTER TABLE `monitores`
  MODIFY `id_monitor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarifas_material`
--
ALTER TABLE `tarifas_material`
  MODIFY `id_tarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alquileres`
--
ALTER TABLE `alquileres`
  ADD CONSTRAINT `alquileres_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `alquileres_ibfk_3` FOREIGN KEY (`id_material`) REFERENCES `material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `asist_clientes`
--
ALTER TABLE `asist_clientes`
  ADD CONSTRAINT `asist_clientes_ibfk_1` FOREIGN KEY (`id_clase`) REFERENCES `clases` (`id_clase`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `asist_clientes_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clases`
--
ALTER TABLE `clases`
  ADD CONSTRAINT `clases_ibfk_1` FOREIGN KEY (`nombre_tipo`) REFERENCES `tipos_clase` (`nombre_tipo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clases_ibfk_2` FOREIGN KEY (`id_monitor`) REFERENCES `monitores` (`id_monitor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `clientes_ibfk_2` FOREIGN KEY (`id_contacto_emerg`) REFERENCES `contactos_emergencia` (`id_contacto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`id_bono`) REFERENCES `bonos` (`id_bono`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `material_ibfk_1` FOREIGN KEY (`id_tarifa`) REFERENCES `tarifas_material` (`id_tarifa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD CONSTRAINT `monitores_ibfk_1` FOREIGN KEY (`id_monitor`) REFERENCES `usuarios` (`id_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
