-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 23:55:04
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `escuela`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `alumnos_id` int(11) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `apellidos` varchar(255) DEFAULT NULL,
  `cursos` varchar(255) NOT NULL,
  `curso_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`alumnos_id`, `dni`, `nombres`, `apellidos`, `cursos`, `curso_id`) VALUES
(3, '6348Y6GE2', 'Javier', 'Salamanca', 'SMX1', NULL),
(4, '6348Y6GE2', 'PER', 'Salamanca', 'SMX2', NULL),
(5, '6348Y6ygy', 'Fer', 'Salamanca', 'SMX7', NULL),
(6, '6348Y6ygy', 'Fer', 'Salamanca', 'SMX7', NULL),
(7, '6348Y6ygy', 'Fer', 'Salamanca', 'SMX7', NULL),
(8, '6348Y6ygy', 'Fer', 'Salamanca', 'SMX7', NULL),
(9, 'AAAAA', 'Piero', 'Rosario', 'DAW1', NULL),
(10, 'AAAAA', 'Piero', 'Rosario', 'DAW1', NULL),
(11, 'AAAAA', 'Piero', 'Rosario', 'DAW5', NULL),
(12, 'AAAAA', 'Piero', 'Rosario', 'DAW5', NULL),
(13, '6348Y6GE2', 'Minu', 'Massengo', 'DAW1', NULL),
(14, 'AAAAA', 'Piero', 'Rosario', 'SMX1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `cursos_id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `año` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`cursos_id`, `nombre`, `año`) VALUES
(1, 'Carlos', 2001),
(2, 'Lupita', 2001),
(3, 'Minu', 0),
(4, 'Minu', 2023),
(5, 'DAW1', 2003),
(6, 'DAW2', 2001);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`alumnos_id`),
  ADD KEY `curso_id` (`curso_id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`cursos_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `alumnos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `cursos_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`curso_id`) REFERENCES `cursos` (`cursos_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
