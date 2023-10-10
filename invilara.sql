-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 09-10-2023 a las 04:41:36
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `invilara`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `ID_actividad` int(11) NOT NULL,
  `descripcion_actividades` varchar(200) NOT NULL,
  `cedula_conductor` varchar(11) NOT NULL,
  `serial` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductores`
--

CREATE TABLE `conductores` (
  `cedula_conductor` varchar(11) NOT NULL,
  `nombre_conductor` text NOT NULL,
  `apellido_conductor` text NOT NULL,
  `direccion_conductor` varchar(100) NOT NULL,
  `celular_conductor` varchar(13) NOT NULL,
  `numero_licencia` varchar(11) NOT NULL,
  `vencimiento_licencia` date NOT NULL,
  `grado_licencia` int(11) NOT NULL,
  `cedula_usuario` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `conductores`
--

INSERT INTO `conductores` (`cedula_conductor`, `nombre_conductor`, `apellido_conductor`, `direccion_conductor`, `celular_conductor`, `numero_licencia`, `vencimiento_licencia`, `grado_licencia`, `cedula_usuario`) VALUES
('1324', 'carlos', 'himenez', 'ADA', '121131', '5', '2023-10-18', 2, '4444');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricante`
--

CREATE TABLE `fabricante` (
  `ID_fabricante` int(11) NOT NULL,
  `nombre_fabricante` varchar(30) NOT NULL,
  `modelo_fabricante` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `fabricante`
--

INSERT INTO `fabricante` (`ID_fabricante`, `nombre_fabricante`, `modelo_fabricante`) VALUES
(1, 'Jac', 'Jac-2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenimiento`
--

CREATE TABLE `mantenimiento` (
  `ID_mantenimiento` int(11) NOT NULL,
  `gravedad` varchar(20) NOT NULL,
  `reparacion` varchar(30) NOT NULL,
  `fecha_mantenimiento` date NOT NULL,
  `descripcion_mantenimiento` varchar(200) NOT NULL,
  `serial` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `ID_rol` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `Nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`ID_rol`, `descripcion`, `Nombre`) VALUES
(1, 'Es admin', 'Admin'),
(2, 'Es Usuario', 'Usuario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `ID_servicio` int(11) NOT NULL,
  `fecha_servicio` date NOT NULL,
  `lugar_servicio` varchar(50) NOT NULL,
  `servicio` varchar(30) NOT NULL,
  `serial` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipovehiculo`
--

CREATE TABLE `tipovehiculo` (
  `ID_tipo` int(11) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL,
  `Descripcion_tipo` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipovehiculo`
--

INSERT INTO `tipovehiculo` (`ID_tipo`, `nombre_tipo`, `Descripcion_tipo`) VALUES
(1, 'Camioneta', 'Buena camioneta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cedula_usuario` varchar(11) NOT NULL,
  `nombre_usuario` varchar(30) NOT NULL,
  `contrasena_usuario` varchar(60) NOT NULL,
  `ID_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cedula_usuario`, `nombre_usuario`, `contrasena_usuario`, `ID_rol`) VALUES
('1', 'Test', '$2y$10$JH4.cYhV3xAftaubj4ps.uCzVyjezqdcP5.VSUqGFIErHv8DWkYK2', 2),
('1111', 'TEST', '$2y$10$jjfQvK0vVARSzTm0gJJ3XuQxFpJkmLqotuGjuC6boB2KY2Le8lmEu', 2),
('123', 'Test', '$2y$10$mvw1lOYQxG9sMfSC94FdFekbO4YWpUU1mBQvsiNKjaW/k1Wredoy.', 2),
('30396029', 'Juan', '123', 1),
('4444', 'Test', '$2y$10$XyYewgMfhqEhl7noLDheEOd9CrUhwRY63Pi8dAUPTW3yKmniF9gv6', 2),
('5555', 'Carlos', '$2y$10$jtvFtle1rLb8avvCPpPZfOIqUXUQVcqVoikncWkF3g6aW5Ur6IQHe', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `serial` varchar(11) NOT NULL,
  `numero_vehiculo` varchar(11) NOT NULL,
  `color` varchar(30) NOT NULL,
  `ID_tipo` int(11) NOT NULL,
  `ID_fabricante` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`serial`, `numero_vehiculo`, `color`, `ID_tipo`, `ID_fabricante`) VALUES
('223346', '5', 'red', 1, 1),
('2352', '5', 'red', 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`ID_actividad`),
  ADD KEY `cedula_conductor` (`cedula_conductor`),
  ADD KEY `serial` (`serial`);

--
-- Indices de la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD PRIMARY KEY (`cedula_conductor`),
  ADD KEY `cedula_usuario` (`cedula_usuario`);

--
-- Indices de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  ADD PRIMARY KEY (`ID_fabricante`);

--
-- Indices de la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD PRIMARY KEY (`ID_mantenimiento`),
  ADD KEY `serial` (`serial`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`ID_rol`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`ID_servicio`),
  ADD KEY `serial` (`serial`);

--
-- Indices de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`ID_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cedula_usuario`),
  ADD KEY `ID_rol` (`ID_rol`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`serial`),
  ADD KEY `ID_tipo` (`ID_tipo`),
  ADD KEY `ID_fabricante` (`ID_fabricante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fabricante`
--
ALTER TABLE `fabricante`
  MODIFY `ID_fabricante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipovehiculo`
--
ALTER TABLE `tipovehiculo`
  MODIFY `ID_tipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_ibfk_1` FOREIGN KEY (`cedula_conductor`) REFERENCES `conductores` (`cedula_conductor`),
  ADD CONSTRAINT `actividades_ibfk_2` FOREIGN KEY (`serial`) REFERENCES `vehiculo` (`serial`);

--
-- Filtros para la tabla `conductores`
--
ALTER TABLE `conductores`
  ADD CONSTRAINT `conductores_ibfk_1` FOREIGN KEY (`cedula_usuario`) REFERENCES `usuario` (`cedula_usuario`);

--
-- Filtros para la tabla `mantenimiento`
--
ALTER TABLE `mantenimiento`
  ADD CONSTRAINT `mantenimiento_ibfk_1` FOREIGN KEY (`serial`) REFERENCES `vehiculo` (`serial`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_ibfk_1` FOREIGN KEY (`serial`) REFERENCES `vehiculo` (`serial`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ID_rol`) REFERENCES `roles` (`ID_rol`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`ID_tipo`) REFERENCES `tipovehiculo` (`ID_tipo`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`ID_fabricante`) REFERENCES `fabricante` (`ID_fabricante`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
