-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2024 a las 01:31:45
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cicsa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `Registro` int(11) NOT NULL,
  `IdHerramienta` int(11) NOT NULL,
  `NombreHerramienta` varchar(255) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `NombreEmpleado` varchar(255) NOT NULL,
  `Hora` time NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`Registro`, `IdHerramienta`, `NombreHerramienta`, `IdEmpleado`, `NombreEmpleado`, `Hora`, `Fecha`, `Cantidad`) VALUES
(16, 2135, 'Madera', 2143, 'Dylan', '16:56:00', '1970-01-01', 23),
(17, 2135, 'Madera', 2143, 'Dylan', '17:00:00', '1970-01-01', 65),
(18, 2135, 'Madera', 2143, 'Dylan', '17:01:00', '1970-01-01', 12),
(19, 2135, 'Madera', 2804, 'Dylan', '17:30:00', '1970-01-01', 46);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `herramientas`
--

CREATE TABLE `herramientas` (
  `Registro` int(11) NOT NULL,
  `IdHerramienta` int(11) NOT NULL,
  `NombreHerramienta` varchar(100) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `herramientas`
--

INSERT INTO `herramientas` (`Registro`, `IdHerramienta`, `NombreHerramienta`, `Cantidad`) VALUES
(19, 2135, 'Madera', 68);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `salidas`
--

CREATE TABLE `salidas` (
  `Registro` int(11) NOT NULL,
  `IdHerramienta` int(11) NOT NULL,
  `NombreHerramienta` varchar(255) NOT NULL,
  `IdEmpleado` int(11) NOT NULL,
  `NombreEmpleado` varchar(255) NOT NULL,
  `Hora` time NOT NULL,
  `Fecha` date NOT NULL,
  `Cantidad` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `salidas`
--

INSERT INTO `salidas` (`Registro`, `IdHerramienta`, `NombreHerramienta`, `IdEmpleado`, `NombreEmpleado`, `Hora`, `Fecha`, `Cantidad`) VALUES
(26, 2135, 'Madera', 2143, 'Dylan', '16:56:00', '1970-01-01', 23),
(27, 2135, 'Madera', 2143, 'Dylan', '17:01:00', '1970-01-01', 46),
(28, 2135, 'Madera', 2804, 'Dylan', '17:30:00', '1970-01-01', 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajadores`
--

CREATE TABLE `trabajadores` (
  `registro` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `puesto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `trabajadores`
--

INSERT INTO `trabajadores` (`registro`, `id_empleado`, `nombre`, `apellido`, `puesto`) VALUES
(10, 2804, 'Dylan', 'Reyes', 'Chalan');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  ADD PRIMARY KEY (`Registro`),
  ADD UNIQUE KEY `nombre_unique` (`NombreHerramienta`);

--
-- Indices de la tabla `salidas`
--
ALTER TABLE `salidas`
  ADD PRIMARY KEY (`Registro`);

--
-- Indices de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`registro`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `Registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `herramientas`
--
ALTER TABLE `herramientas`
  MODIFY `Registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `salidas`
--
ALTER TABLE `salidas`
  MODIFY `Registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `registro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
