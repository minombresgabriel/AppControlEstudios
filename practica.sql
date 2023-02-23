-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-02-2023 a las 16:53:44
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apuntes`
--

CREATE TABLE `apuntes` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `apuntes` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `apuntes`
--

INSERT INTO `apuntes` (`id`, `id_usuario`, `apuntes`, `fecha`) VALUES
(83, 20, 'hola como estas ', '23-02-2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evaluaciones`
--

CREATE TABLE `evaluaciones` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `evaluacion` varchar(255) NOT NULL,
  `estimacion` int(255) NOT NULL,
  `año` int(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `evaluaciones`
--

INSERT INTO `evaluaciones` (`id`, `id_usuario`, `usuario`, `materia`, `evaluacion`, `estimacion`, `año`, `seccion`, `fecha`) VALUES
(7, 21, 'perro', 'Matematica', 'Evaluacion cientifica sobre como los dinosaurios cayeron en la tierraaEvaluacion cientifica sobre como los dinosaurios cayeron en la tierraaEvaluacion cientifica sobre como los dinosaurios cayeron en la tierraaEvaluacion cientifica sobre como los dinosaur', 4, 3, 'b', '14/02/2023'),
(8, 21, 'perro', 'Matematica', 'Examen de algoritmos', 15, 3, 'a', '21/02/2023'),
(9, 27, 'Alicia', 'Ciencias', 'Evaluacion cientifica sobre como los dinosaurios cayeron en la tierra', 20, 3, 'b', '25/02/2023');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `id_usuario` int(255) NOT NULL,
  `nombre_materia` varchar(255) NOT NULL,
  `evaluacion` varchar(255) NOT NULL,
  `fecha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `año` varchar(255) NOT NULL,
  `seccion` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `materia` varchar(255) NOT NULL,
  `tipo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usuario`, `apellido`, `año`, `seccion`, `correo`, `password`, `cedula`, `materia`, `tipo`) VALUES
(20, 'Gabriel', 'Ramirez', '3', 'b', 'gabrielrs874@gmail.com', '123', '28128176', '.', 'estudiante'),
(21, 'Antonio', 'perez', '-', '-', 'minombresgabriel@gmail.com', '123', '11550338', 'Matematica', 'maestro'),
(22, 'Oscar', 'Gutierrez', '-', '-', 'oscar@hernandez.com', '444', '15745569', 'Ciencias', 'maestro'),
(25, 'jose', 'martinez', '-', '-', 'oscar@hernandessasaz.com', '147', '4896584', 'Matematicas', 'maestro'),
(26, 'julian', 'Sanchez', '3', 'b', 'juli@gmail.com', '741', '15874596', '-', 'estudiante'),
(27, 'Alicia', 'Hernandez', '-', '-', 'ali@gmail.com', '456', '24598756', 'Ciencias', 'maestro'),
(28, 'jesus', 'salas', '4', 'b', 'pedro@gmail.com', '159', '544846152', '-', 'estudiante'),
(29, 'Pedro', 'Gutierrez', '1', 'a', 'pedrito@gmail.com', '1234', '32546342', '-', 'estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `apuntes`
--
ALTER TABLE `apuntes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `correo` (`correo`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `apuntes`
--
ALTER TABLE `apuntes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT de la tabla `evaluaciones`
--
ALTER TABLE `evaluaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
