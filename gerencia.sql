-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-01-2017 a las 18:40:10
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gerencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `idCargo` int(11) NOT NULL,
  `cargo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`, `descripcion`) VALUES
(1, 'Director', 'CSI'),
(2, 'aa', 'aaa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_permiso_perfil`
--

CREATE TABLE `dt_permiso_perfil` (
  `id` int(11) NOT NULL,
  `id_perfil` int(11) NOT NULL,
  `id_permiso` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dt_permiso_perfil`
--

INSERT INTO `dt_permiso_perfil` (`id`, `id_perfil`, `id_permiso`, `estado`) VALUES
(1, 2, 1, 1),
(2, 2, 2, 1),
(3, 2, 3, 1),
(5, 2, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficina`
--

CREATE TABLE `oficina` (
  `idOficina` int(11) NOT NULL,
  `oficina` int(11) NOT NULL,
  `descripcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `nombre`, `tag`) VALUES
(1, 'Nuevo Funcionario', 'nuevo_funcionario'),
(2, 'Crear Roles', 'crear_roles'),
(3, 'Copiar Tabla', 'copiar_tabla'),
(4, 'Reporte Pdf', 'reporte_pdf'),
(5, 'Reporte Excel', 'reporte_excel'),
(6, 'Imprimir Reporte', 'imprimir_reporte'),
(7, 'Nueva Visita', 'nueva_visita'),
(8, 'Ver Visita', 'verVisita'),
(9, 'Editar Visita', 'editarVisita'),
(10, 'Eliminar Visita', 'eliminarVisita');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profiles`
--

CREATE TABLE `profiles` (
  `idProfile` int(10) UNSIGNED NOT NULL,
  `nameProfi` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `profiles`
--

INSERT INTO `profiles` (`idProfile`, `nameProfi`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Default');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_organica`
--

CREATE TABLE `unidad_organica` (
  `idUnidad` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `alias` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `jerarquiaOrganica` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `encargado` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `oficina` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `tipoDocumento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `numeroDocumento` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `loginUsers` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `passUsers` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `emailUser` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `idprofile` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `cargo`, `oficina`, `tipoDocumento`, `numeroDocumento`, `loginUsers`, `passUsers`, `emailUser`, `idprofile`) VALUES
(1, '', '', '', '', '', '', '', '48164646', '48164646', 'vvillaloboshenry@gmail.com', 1),
(2, '', '', '', '', '', '', '', '27735493', '27735493', 'cmejia@lambayeque.gob.pe', 1),
(3, '', '', '', '', '', '', '', '45454545', '45454545', 'jenny@gmail.com', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idVisita` int(11) NOT NULL,
  `nombreVisitante` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidoVisitante` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `dniVisitante` int(11) DEFAULT NULL,
  `nombreFuncionario` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `apellidoFuncionario` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `oficinaFuncionario` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `cargoFuncionario` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaTermino` timestamp NULL DEFAULT NULL,
  `motivo` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `lugar` varchar(255) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `estadoVisita` varchar(15) COLLATE utf8_spanish2_ci DEFAULT 'Pendiente',
  `dropState` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `nombreVisitante`, `apellidoVisitante`, `dniVisitante`, `nombreFuncionario`, `apellidoFuncionario`, `oficinaFuncionario`, `cargoFuncionario`, `fecha`, `fechaTermino`, `motivo`, `lugar`, `estadoVisita`, `dropState`) VALUES
(1, 'Henry Joel', 'Vasquez Villalobos', 48164545, 'Carlos Alberto', 'Mejia', 'CSI', 'Director', '2016-11-09 15:00:00', '2016-11-09 15:00:00', 'Algun mandato real', 'Oficinas CSI', 'Finalizado', 0),
(9, 'visitante', 'erter', 111111, 'funcionario', 'dfg', 'oficina', 'cargo', NULL, NULL, 'Nuevo Motivo', 'lugar', 'Pendiente', 0),
(10, 'sfsd', 'sdfsd', 234, 'sdf', 'sdfs', NULL, NULL, NULL, NULL, 'Au', NULL, NULL, 0),
(11, 'fdg', 'dfdfg', 343434, 'dsdf', 'dfg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(12, 'sdf', 'dsf', 34343434, 'sdfsdf', 'sdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(13, 'sdf', 'sdfsdf', 214234, 'sdf', 'sdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(14, 'sffsdf', 'sdfsdf', 343434, 'sdfsdf', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(15, 'wdasd', 'sdasd', 232323, 'asdasd', 'asd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(16, 'asdas', 'asdas', 34434, 'dsfsd', 'qdsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(17, 'asd', 'sad', 3434, 'sdf', 'sd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(18, 'asd', 'asd', 3434, 'dsf', 'sdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(19, 'sdfs', 'dfsdf', 2323, 'sdfsdf', 'sdfsdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(20, 'aaa', 'sdf', 343434, 'dsfsdsdsd', 'fgdf', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(21, 'fdfgdfg', 'dfgdfg', 34234, 'dsfsdf', 'sdfsd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(22, 'aaa', 'aaa', 33, 'aa', 'aa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0),
(23, 'nombre', 'apellidos', 454545, 'NombreFun', 'ApellidoFun', 'Oficina', 'Cargo', '2016-12-05 17:53:02', NULL, 'nose', 'Lugar', 'Pendiente', 0),
(24, 'jo', 'jo', 2323, 'joo', 'jo', 'jo', 'jo', '2016-12-05 20:19:52', NULL, 'jo', 'jo', 'Pendiente', 0),
(25, 'Henry Joel', 'Vasquez Vilalobos', 343435, 'Jorge Luis', 'Adolfo ', 'CSI', 'Directora', '2016-12-06 16:05:06', NULL, 'Coordinacion de Superinte', 'Gerencia de Salud ', 'Pendiente', 1),
(26, 'hoho', 'hoho', 3423423, 'hoho', 'hoho', 'hhoho', 'hoho', '2016-12-09 11:27:42', NULL, 'ohoho', 'hhoo', 'Pendiente', 0),
(27, 'Actual', 'Vasquez', 45464545, 'Henry', 'Vasquez', 'CSI', 'Gerente', '2016-12-10 03:39:16', NULL, 'sdfsfsd', 'fsd', 'Pendiente', 0),
(28, 'veinte', 'veinte', 212312, 'veinte', 'veinte', 'veinte', 'veinte', '2016-12-10 03:41:17', NULL, 'veinte', 'veinte', 'Pendiente', 1),
(29, 'hhh', 'hh', 3434334, 'hhhh', 'hhh', 'hh', 'hhh', '2016-12-10 03:49:20', '2011-02-03 15:00:00', 'hh', 'hhh', 'Pendiente', 0),
(30, 'hhh', 'yyy', 2222, '3333', '333', '333', '333', '2016-12-10 03:50:08', NULL, '333', '333', 'Pendiente', 0),
(31, 'qweqwe', 'qweqw', 3423423, 'qwerw', 'qe', 'e', 'e', '2016-12-10 03:57:42', NULL, 'e', 'e', 'Pendiente', 0),
(32, 'Eduardo', 'Eduardo', 1111, 'Mirian', 'Rodrigez', 'Logistica', 'Directora', '2016-12-10 04:16:51', NULL, 'Para evaluar desempeÃ±o de Visitantes', 'Gerencia Regional de Salud', 'Pendiente', 1),
(33, 'aa', 'aa', 22323, 'aas', 'asas', 'asas', 'asas', '2016-12-13 14:44:34', NULL, 'as', 'asas', 'Pendiente', 0),
(34, 'asd', 'asdas', 342423, 'asdasd', 'sad', 'asd', 'asd', '2016-12-13 14:44:56', NULL, 'asd', 'sad', 'Pendiente', 0),
(35, 'asd', 'asd', 234234, 'asd', 'asd', 'asd', 'asd', '2016-12-14 01:47:35', NULL, 'asd', 'asd', 'Pendiente', 1),
(36, 'asd', 'asdas', 343434, 'aaaa', 'aaa', 'aaa', 'aa', '2016-12-14 01:55:59', NULL, 'aa', 'aa', 'Pendiente', 1),
(37, 'aaa', 'aaa', 48164646, 'aa', 'aaa', 'aaa', 'aa', '2016-12-14 01:56:51', NULL, 'aa', 'aa', 'Pendiente', 1),
(38, 'aaa', 'aa', 1111, 'asdasd', 'asdas', 'asdas', 'asd', '2016-12-14 02:24:12', NULL, 'asd', 'asd', 'Pendiente', 1),
(39, 'adas', 'asdas', 44444, 'sddsf', 'sdfsd', 'sdf', 'sdf', '2016-12-14 02:39:04', NULL, 'sdf', 'sdf', 'Pendiente', 1),
(40, 'a', 'a', 323, 'asd', 'asd', 'asd', 'sad', '2016-12-29 11:39:00', NULL, 'sad', 'asd', 'Pendiente', 1),
(41, 'ghj', 'ghj', 45, 'fg', 'fg', 'g', 'g', '2016-12-29 11:40:02', NULL, 'fg', 'fg', 'Pendiente', 1),
(42, 'asd', 'asd', 232, 'asd', 'asd', 'asd', 'asd', '2016-12-29 11:40:45', NULL, 'asd', 'asd', 'Pendiente', 1),
(43, 'gf', 'fh', 45, 'fgh', 'fgh', 'fgh', 'fgh', '2016-12-29 11:41:23', NULL, 'fg', 'fgh', 'Pendiente', 1),
(44, 'fsdf', 'sdf', 3434, 'sad', 'asd', 'asd', 'asd', '2016-12-29 11:42:00', NULL, 'asd', 'asd', 'Pendiente', 1),
(45, 'asd', 'asdasd', 3434, 'dsfs', 'sdf', 'sdf', 'sdf', '2016-12-29 11:42:23', NULL, 'sdf', 'sdf', 'Pendiente', 1),
(46, 'asd', 'asdasd33', 343, 'asd', 'asd', 'asd', 'asd', '2016-12-29 11:43:08', NULL, 'asd', 'das', 'Pendiente', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `dt_permiso_perfil`
--
ALTER TABLE `dt_permiso_perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oficina`
--
ALTER TABLE `oficina`
  ADD PRIMARY KEY (`idOficina`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`idProfile`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idVisita`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `oficina`
--
ALTER TABLE `oficina`
  MODIFY `idOficina` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `profiles`
--
ALTER TABLE `profiles`
  MODIFY `idProfile` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
