-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: sql306.infinityfree.com
-- Tiempo de generación: 28-02-2026 a las 17:30:26
-- Versión del servidor: 11.4.10-MariaDB
-- Versión de PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `if0_41161012_kinder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alu` int(11) NOT NULL,
  `id_gpo` int(11) NOT NULL,
  `nombre_alu` varchar(60) NOT NULL,
  `apellidos_alu` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alu`, `id_gpo`, `nombre_alu`, `apellidos_alu`) VALUES
(1, 1, 'Fatima', 'Olmos'),
(2, 1, 'Grecia Elisa', 'Pérez Ximénez'),
(3, 2, 'Marisol', 'Aguirre Casas'),
(4, 3, 'Luis Antonio', 'Hernandez Lopez'),
(5, 3, 'Hugo ', 'Aguirre Casas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE `grupo` (
  `id_gpo` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `grupo_gpo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`id_gpo`, `id_usu`, `grupo_gpo`) VALUES
(1, 2, 'Rosas del '),
(2, 3, 'Ovejas'),
(3, 4, 'Llamas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `id_per` int(11) NOT NULL,
  `id_usu` int(11) NOT NULL,
  `maestra_per` varchar(60) NOT NULL,
  `correo_per` varchar(60) NOT NULL,
  `cel_per` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`id_per`, `id_usu`, `maestra_per`, `correo_per`, `cel_per`) VALUES
(1, 2, 'Maria Soledad Garcia Suarez', 'Mas_sol12@hotmail.com', '6564562190'),
(2, 3, 'Elizabeth Peña', 'asl2@gmail.com', '6561230987'),
(3, 4, 'Sofia Guerrero Zambrano', 'ZamSof12@outlook.com', '6562342143');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usu` int(11) NOT NULL,
  `usuario_usu` varchar(32) NOT NULL,
  `password_usu` varchar(255) DEFAULT NULL,
  `rol` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usu`, `usuario_usu`, `password_usu`, `rol`) VALUES
(1, 'admin', '$2y$10$NFmABeaEE6F0RQ/iT8Oxb.z8WR.HPQ/fr9Xk5sKk7XQuYBVtp3Y82', 'admin'),
(2, 'usuario1', '$2y$10$h7tdLwtKV6OQPD1gOJVCre/Fh2uQOIb9dhjAST0JRx0lqBylqmlRm', 'docente'),
(3, 'usuario2', '$2y$10$J.pSRb3KKRWEFW9uvXCwh.sO.guy5yOx1Ple3qMRn/pLKEn9dbhXK', 'docente'),
(4, 'usuario3', '$2y$10$jDMktFLih6tr4zDxNGYTXu7PFVulhzkNkC9SMnF31y28fQhf3hl6O', 'docente');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alu`),
  ADD KEY `fk_alumnos_grupo_idx` (`id_gpo`);

--
-- Indices de la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD PRIMARY KEY (`id_gpo`),
  ADD KEY `fk_grupo_usuarios_idx` (`id_usu`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`id_per`),
  ADD KEY `fk_personal_usuarios_idx` (`id_usu`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usu`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `grupo`
--
ALTER TABLE `grupo`
  MODIFY `id_gpo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `id_per` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `fk_alumnos_grupo` FOREIGN KEY (`id_gpo`) REFERENCES `grupo` (`id_gpo`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `grupo`
--
ALTER TABLE `grupo`
  ADD CONSTRAINT `fk_grupo_usuarios` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `fk_personal_usuarios` FOREIGN KEY (`id_usu`) REFERENCES `usuarios` (`id_usu`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
