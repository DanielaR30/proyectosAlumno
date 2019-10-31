-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-10-2019 a las 12:36:57
-- Versión del servidor: 10.1.9-MariaDB
-- Versión de PHP: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cursoalumnodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `idalumno` int(11) NOT NULL,
  `iddistrito` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL,
  `apellido` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idalumno`, `iddistrito`, `nombre`, `apellido`) VALUES
(1, 1, 'yeison', 'Calderón'),
(2, 3, 'Carmen', 'Días');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `iddepartamento` int(11) NOT NULL,
  `nom_departamento` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`iddepartamento`, `nom_departamento`) VALUES
(1, 'Boyacá'),
(2, 'Cauca');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `iddistrito` int(11) NOT NULL,
  `idprovincia` int(11) NOT NULL,
  `nom_distrito` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`iddistrito`, `idprovincia`, `nom_distrito`) VALUES
(1, 1, 'Guateque'),
(2, 2, 'Moniquirá'),
(3, 3, 'Popayán');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idprovincia` int(11) NOT NULL,
  `iddepartamento` int(11) NOT NULL,
  `nom_provincia` varchar(50) COLLATE ucs2_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ucs2 COLLATE=ucs2_spanish2_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idprovincia`, `iddepartamento`, `nom_provincia`) VALUES
(1, 1, 'Oriente'),
(2, 1, 'Ricaurte'),
(3, 2, 'Centro');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`idalumno`),
  ADD KEY `iddistrito` (`iddistrito`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`iddepartamento`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`iddistrito`),
  ADD KEY `idprovincia` (`idprovincia`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idprovincia`),
  ADD KEY `iddepartamento` (`iddepartamento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `iddepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `iddistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `idprovincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`iddistrito`) REFERENCES `distrito` (`iddistrito`);

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`idprovincia`) REFERENCES `provincia` (`idprovincia`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`iddepartamento`) REFERENCES `departamento` (`iddepartamento`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
