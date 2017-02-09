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
  `descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `dropState` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`idCargo`, `cargo`, `descripcion`, `dropState`) VALUES
(1, 'Director', 'CSI', 1),
(2, 'aa', 'aaa', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_permiso_rol`
--

CREATE TABLE `dt_permiso_rol` (
  `idPermisoRol` int(11) NOT NULL,
  `idPermiso` int(11) NOT NULL,
  `idRol` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dt_permiso_rol`
--

INSERT INTO `dt_permiso_rol` (`idPermisoRol`, `idPermiso`, `idRol`, `estado`) VALUES
(1, 4, 2, 1),
(2, 5, 2, 1),
(3, 6, 2, 1),
(4, 7, 2, 1),
(5, 8, 2, 1),
(6, 9, 2, 1),
(7, 1, 1, 1),
(8, 2, 1, 1),
(9, 3, 1, 1),
(10, 4, 1, 1),
(11, 5, 1, 1),
(12, 6, 1, 1),
(13, 7, 1, 1),
(14, 8, 1, 1),
(15, 9, 1, 1),
(16, 10, 1, 1),
(35, 1, 3, 1),
(79, 3, 31, 1),
(80, 4, 31, 1),
(81, 5, 31, 1),
(82, 6, 31, 1),
(83, 7, 31, 1),
(84, 8, 31, 1),
(89, 3, 33, 1),
(90, 4, 33, 1),
(91, 5, 33, 1),
(92, 6, 33, 1),
(93, 7, 33, 1),
(94, 8, 33, 1),
(95, 9, 33, 1),
(96, 10, 33, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dt_visitas_visitante_funcionario`
--

CREATE TABLE `dt_visitas_visitante_funcionario` (
  `idVisitaVisitanteFuncionario` int(11) NOT NULL,
  `idVisita` int(11) NOT NULL,
  `idVisitante` int(11) NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `estado` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dt_visitas_visitante_funcionario`
--

INSERT INTO `dt_visitas_visitante_funcionario` (`idVisitaVisitanteFuncionario`, `idVisita`, `idVisitante`, `idFuncionario`, `estado`) VALUES
(10, 11, 6, 4, 1),
(12, 13, 1, 4, 1),
(13, 14, 1, 3, 1),
(14, 15, 7, 3, 1),
(15, 16, 8, 2, 1),
(16, 17, 1, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcionario`
--

CREATE TABLE `funcionario` (
  `idFuncionario` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `dniFuncionario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dropState` int(11) DEFAULT '1',
  `idUnidadOrganica` int(11) NOT NULL,
  `idRol` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `funcionario`
--

INSERT INTO `funcionario` (`idFuncionario`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `dniFuncionario`, `email`, `cargo`, `usuario`, `clave`, `dropState`, `idUnidadOrganica`, `idRol`) VALUES
(2, 'Carlos Alberto', 'Mejia', 'Zelada', '27735493', 'cmejiaz@lambayeque.gob.pe', 'Director', '27735493', '253c733914a9a5ca91eddef00ca14c3a', 1, 2, 1),
(3, 'Jenny', 'Jenny', 'Ramireza', '45454545', 'jenny@gmail.com', 'Directora', '45454545', '3f74ed1b90de7d06a51891228750fcb1', 1, 1, 1),
(4, 'Henry', 'Henry', 'Villalobos', '42424242', 'vvillaloboshenry@gmail.com', 'Practicante', '42424242', '59297c3fb1a4580b23ce6c1b5d667d67', 1, 2, 31),
(15, 'pruebita', 'pruebita', 'pruebita', '343434', 'pruebita@gmail.com', 'pruebita', '343434', 'e1064a500b2640ff0a74439f1758c6aa', 0, 0, 0),
(27, 'Willy', 'Burga', 'Alvarado', '47454745', 'wburga@geresalambayeque.gob.pe', 'Ing. Sistemas', '47454745', 'a5ba8e54e8e7a946a534f5b98d63dd18', 1, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `idPermiso` int(11) NOT NULL,
  `permiso` varchar(50) NOT NULL,
  `tag` varchar(50) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`idPermiso`, `permiso`, `tag`, `icon`) VALUES
(1, 'Nuevo Funcionario', 'nuevo_funcionario', 'fa fa-users'),
(2, 'Permisos & Roles', 'crear_roles', 'fa fa-user-secret'),
(3, 'Copiar Datos', 'copiar_tabla', 'fa fa-files-o'),
(4, 'Reporte Pdf', 'reporte_pdf', 'fa fa-file-text-o'),
(5, 'Reporte Excel', 'reporte_excel', 'fa fa-file-excel-o'),
(6, 'Imprimir Reporte', 'imprimir_reporte', 'fa fa-print'),
(7, 'Nueva Visita', 'nueva_visita', 'fa fa-plus'),
(8, 'Ver Visita', 'verVisita', 'fa fa-eye'),
(9, 'Editar Visita', 'editarVisita', 'fa fa-pencil-square-o'),
(10, 'Eliminar Visita', 'eliminarVisita', 'fa fa-trash-o');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `idRol` int(10) UNSIGNED NOT NULL,
  `rol` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `dropState` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`idRol`, `rol`, `descripcion`, `dropState`) VALUES
(1, 'Administrador', 'Gestion y control total del Sistema', 1),
(2, 'Secretaria', 'Valida y pasa las visitas pertinentes', 1),
(3, 'Default', 'Usuario por defecto', 1),
(33, 'Prueba', 'Rol de prueba en el sistema', 1),
(31, 'Practicante', 'Rol temporal que grabara entradas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad_organica`
--

CREATE TABLE `unidad_organica` (
  `idUnidad` int(11) NOT NULL,
  `codigo` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `nombre` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `alias` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `jerarquiaOrganica` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `idFuncionario` int(11) NOT NULL,
  `dropState` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `unidad_organica`
--

INSERT INTO `unidad_organica` (`idUnidad`, `codigo`, `nombre`, `alias`, `jerarquiaOrganica`, `idFuncionario`, `dropState`) VALUES
(1, '1122', 'Oficina Ejecutiva de Asesoría Juridica', 'OEAJ', 'Oficina Ejecutiva', 3, 1),
(2, '1124', 'Centro de Sistemas de Informacion', 'CSI', 'Centro de Sistemas', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visita`
--

CREATE TABLE `visita` (
  `idVisita` int(11) NOT NULL,
  `fecha` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `fechaTermino` timestamp NULL DEFAULT NULL,
  `motivo` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `lugar` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `estadoVisita` varchar(15) COLLATE utf8_spanish2_ci DEFAULT 'Pendiente',
  `dropState` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `visita`
--

INSERT INTO `visita` (`idVisita`, `fecha`, `fechaTermino`, `motivo`, `lugar`, `estadoVisita`, `dropState`) VALUES
(11, '2017-01-20 19:01:36', '2017-02-01 04:32:18', 'PruebaSQL', 'PruebaSQL', 'Pendiente', 0),
(13, '2017-02-03 07:48:06', '2017-02-03 07:48:51', 'Monitoreo y control de equipos de computo', 'Oficinas CSI', 'Finalizado', 1),
(14, '2017-02-09 19:44:22', NULL, 'Ver campañas legales de la Gerencia Regional de Salud', 'oficinas de aseroria juridica', 'Pendiente', 1),
(15, '2017-02-09 19:47:51', NULL, 'temas legales de campañas de salud', 'oficinas de aseroria juridica', 'Pendiente', 1),
(16, '2017-02-09 19:50:36', NULL, 'Cotizacion de equipos de computo', 'oficinas csi', 'Pendiente', 1),
(17, '2017-02-09 19:51:26', NULL, 'Tema legal de adquisicion de equipos', 'Gerencia Regional de Salud', 'Pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `visitante`
--

CREATE TABLE `visitante` (
  `idVisitante` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoPaterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellidoMaterno` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `dniVisitante` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `dropState` int(11) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `visitante`
--

INSERT INTO `visitante` (`idVisitante`, `nombre`, `apellidoPaterno`, `apellidoMaterno`, `dniVisitante`, `dropState`) VALUES
(1, 'Henry', 'Vasquez', 'Villalobos', '48164646', 1),
(2, 'Joel', 'Vasquez', 'Villalobos', '45454545', 1),
(3, 'hoho', 'hohoa', 'hoho', '48164545', 1),
(4, 'Jolo', 'jolo', 'jolo', '45164640', 1),
(6, 'PruebaSQL', 'PruebaSQL', 'PruebaSQL', '42424242', 1),
(7, 'Estefany', 'Altamirano', 'Mendoza', '45454142', 1),
(8, 'Ernestor', 'Rodriges', 'Ballena', '41414141', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`idCargo`);

--
-- Indices de la tabla `dt_permiso_rol`
--
ALTER TABLE `dt_permiso_rol`
  ADD PRIMARY KEY (`idPermisoRol`);

--
-- Indices de la tabla `dt_visitas_visitante_funcionario`
--
ALTER TABLE `dt_visitas_visitante_funcionario`
  ADD PRIMARY KEY (`idVisitaVisitanteFuncionario`);

--
-- Indices de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`idFuncionario`),
  ADD UNIQUE KEY `dni` (`dniFuncionario`),
  ADD UNIQUE KEY `loginUsers` (`usuario`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`idPermiso`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `unidad_organica`
--
ALTER TABLE `unidad_organica`
  ADD PRIMARY KEY (`idUnidad`),
  ADD UNIQUE KEY `codigo` (`codigo`) USING BTREE,
  ADD UNIQUE KEY `alias` (`alias`) USING BTREE;

--
-- Indices de la tabla `visita`
--
ALTER TABLE `visita`
  ADD PRIMARY KEY (`idVisita`);

--
-- Indices de la tabla `visitante`
--
ALTER TABLE `visitante`
  ADD PRIMARY KEY (`idVisitante`),
  ADD UNIQUE KEY `dniVisitante` (`dniVisitante`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `idCargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `dt_permiso_rol`
--
ALTER TABLE `dt_permiso_rol`
  MODIFY `idPermisoRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=395;
--
-- AUTO_INCREMENT de la tabla `dt_visitas_visitante_funcionario`
--
ALTER TABLE `dt_visitas_visitante_funcionario`
  MODIFY `idVisitaVisitanteFuncionario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT de la tabla `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `idFuncionario` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `idPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `idRol` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=184;
--
-- AUTO_INCREMENT de la tabla `unidad_organica`
--
ALTER TABLE `unidad_organica`
  MODIFY `idUnidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT de la tabla `visita`
--
ALTER TABLE `visita`
  MODIFY `idVisita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `visitante`
--
ALTER TABLE `visitante`
  MODIFY `idVisitante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
