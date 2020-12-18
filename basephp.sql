-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-12-2020 a las 06:36:59
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basephp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripciones`
--

CREATE TABLE `inscripciones` (
  `idalumno` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `inscripciones`
--

INSERT INTO `inscripciones` (`idalumno`, `idMateria`) VALUES
(7, 1),
(8, 1),
(15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

CREATE TABLE `materia` (
  `idMateria` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `curso` varchar(3) NOT NULL,
  `carrera` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`idMateria`, `nombre`, `curso`, `carrera`) VALUES
(1, 'Fisica', '2°A', 'Bio ingenieria'),
(4, 'Calculo 1', '3°D', 'Ingenieria'),
(5, 'Quimica', '6°A', 'Ing Quimica'),
(6, 'Biologia', '1°C', 'Ingenieria'),
(8, 'Algebra', '3°C', 'Ingeniería Sistemas'),
(9, 'Base de Datos', '2°E', 'Ingeniería Sistemas'),
(10, 'Filosofía', '1°C', 'Psicología'),
(11, 'Historia', '1°F', 'Abogacía'),
(12, 'Derechos Humanos', '4°A', 'Abogacía'),
(13, 'Deporte', '1*A', 'Prof Educ Fisica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla1`
--

CREATE TABLE `tabla1` (
  `idalumno` int(11) NOT NULL,
  `apellido` varchar(20) DEFAULT NULL,
  `nombre` varchar(40) DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tabla1`
--

INSERT INTO `tabla1` (`idalumno`, `apellido`, `nombre`, `edad`, `email`) VALUES
(7, 'Arias', 'Joaquin', 50, 'joqA@gmail.com'),
(8, 'lopez', 'lucas', 25, 'lucas@gmail.com'),
(15, 'Gordon', 'Freman', 40, 'Freeman@hotmail.com'),
(18, 'Gonzales', 'Favian', 80, 'mmm@gmail.com'),
(19, 'Marolio', 'Amargo', 200, 'AmargoMarolio@gmail.com'),
(29, 'Falcon', 'tadeo', 24, 'ft@gmail.com'),
(36, 'Rosario', 'Facundo', 85, 'cccp@gmail.com'),
(37, 'TELL', 'Facion', 77, 'TelFac@gmail.com'),
(38, 'Rodriguez', 'Miguel', 40, 'RodMig@gmail.com'),
(40, 'Bogari', 'Elias', 24, 'Eli@hotmail.com');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD KEY `idalumno` (`idalumno`),
  ADD KEY `idMateria` (`idMateria`);

--
-- Indices de la tabla `materia`
--
ALTER TABLE `materia`
  ADD PRIMARY KEY (`idMateria`);

--
-- Indices de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  ADD PRIMARY KEY (`idalumno`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `materia`
--
ALTER TABLE `materia`
  MODIFY `idMateria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tabla1`
--
ALTER TABLE `tabla1`
  MODIFY `idalumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `inscripciones`
--
ALTER TABLE `inscripciones`
  ADD CONSTRAINT `inscripciones_ibfk_1` FOREIGN KEY (`idalumno`) REFERENCES `tabla1` (`idalumno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inscripciones_ibfk_2` FOREIGN KEY (`idMateria`) REFERENCES `materia` (`idMateria`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
