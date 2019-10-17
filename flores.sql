-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-10-2019 a las 03:06:24
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `flores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE `fotos` (
  `id_fotos` int(11) NOT NULL,
  `id_seccion` int(11) NOT NULL,
  `grande` varchar(200) COLLATE utf8_bin NOT NULL,
  `pequena` varchar(200) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_fotos`, `id_seccion`, `grande`, `pequena`) VALUES
(1, 1, 'public/img/images/big-images/rosas.jpg', 'public/img/images/rosas.jpg'),
(2, 1, 'public/img/images/big-images/nature_big_1.jpg', 'public/img/images/nature_small_1.jpg'),
(3, 1, 'public/img/images/big-images/nature_big_2.jpg', 'public/img/images/nature_small_2.jpg'),
(4, 2, 'public/img/images/big-images/nature_big_3.jpg', 'public/img/images/nature_small_3.jpg'),
(5, 2, 'public/img/images/big-images/nature_big_4.jpg', 'public/img/images/nature_small_4.jpg'),
(6, 2, 'public/img/images/big-images/nature_big_5.jpg', 'public/img/images/nature_small_5.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id_permisos` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_role` int(11) NOT NULL,
  `permiso` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `per_codigo` int(11) NOT NULL COMMENT 'codigo persona pk auto incremental',
  `per_rut` varchar(12) COLLATE utf8_bin DEFAULT NULL COMMENT 'rut de persona',
  `per_nombre` varchar(100) COLLATE utf8_bin DEFAULT NULL COMMENT 'nombre persona',
  `per_telefono` int(20) DEFAULT NULL COMMENT 'telefono persona',
  `per_obs` varchar(200) COLLATE utf8_bin DEFAULT NULL COMMENT 'observacion o descripcion',
  `per_usu_codigo` int(11) NOT NULL COMMENT 'fk desde la tabla usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`per_codigo`, `per_rut`, `per_nombre`, `per_telefono`, `per_obs`, `per_usu_codigo`) VALUES
(2, '', '', 0, '', 25),
(4, '264070368', 'adel lemus,', 940991119, 'obs', 27),
(5, '', '', 0, '', 28),
(6, '', '', 0, '', 29),
(7, '', '', 0, '', 30),
(8, '', '', 0, '', 31);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role`
--

CREATE TABLE `role` (
  `id_role` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `peso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `role`
--

INSERT INTO `role` (`id_role`, `role`, `peso`) VALUES
(1, 'admin_sistem', 1),
(2, 'independiente', 5),
(4, 'anonimo', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id_seccion` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id_seccion`, `titulo`, `foto`) VALUES
(1, 'Matrimonios', 'rosas.jpg'),
(2, 'Arreglos', 'rosas.jpg'),
(3, 'Defuncion', 'funerales.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `foto` varchar(300) COLLATE utf8_spanish_ci NOT NULL,
  `id_role` int(11) NOT NULL DEFAULT '2',
  `email` varchar(80) CHARACTER SET utf8 COLLATE utf8_bin DEFAULT NULL,
  `login` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL DEFAULT '1',
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `foto`, `id_role`, `email`, `login`, `password`, `estado`, `nombre`) VALUES
(1, 'public/img/profile/legna18205@gmail.com.jpg', 1, 'legna18205@gmail.com', 'admin', 'c654d44444aed37287c1c95e83109e30ac5a4fd1', 1, 'angel charlot'),
(25, 'public/img/profile/desarrollopy205@gmail.com.jpg', 2, 'desarrollopy205@gmail.com', 'desarrollopy205', 'b68aecf5c3994c7bd0776d9ad1d48f096671560e', 1, 'angel charlot'),
(27, 'public/img/profile/adellemusb2@gmail.com.jpg', 2, 'adellemusb2@gmail.com', 'adellemusb2', 'd1b254c9620425f582e27f0044be34bee087d8b4', 1, 'adel lemus'),
(28, 'public/img/profile/usuario_out.jpg', 2, 'legna182055@gmail.com', '', '394892f8f65a45fae75a346eeedffcaad09bdf8e', 1, ''),
(29, 'public/img/profile/usuario_out.jpg', 2, 'legna1820555@gmail.com', '', '394892f8f65a45fae75a346eeedffcaad09bdf8e', 1, ''),
(30, 'public/img/profile/usuario_out.jpg', 2, 'legna182057@gmail.com', '', '394892f8f65a45fae75a346eeedffcaad09bdf8e', 1, ''),
(31, 'public/img/profile/usuario_out.jpg', 2, 'hola@hola.con', '', 'c654d44444aed37287c1c95e83109e30ac5a4fd1', 1, '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `fotos`
--
ALTER TABLE `fotos`
  ADD PRIMARY KEY (`id_fotos`),
  ADD KEY `id_publicacion` (`id_seccion`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id_permisos`),
  ADD KEY `id_menu` (`id_menu`,`id_role`),
  ADD KEY `id_role` (`id_role`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`per_codigo`),
  ADD KEY `per_usu_codigo` (`per_usu_codigo`);

--
-- Indices de la tabla `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_role_2` (`id_role`),
  ADD KEY `id_role_3` (`id_role`),
  ADD KEY `id_role_4` (`id_role`),
  ADD KEY `id_role_5` (`id_role`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `fotos`
--
ALTER TABLE `fotos`
  MODIFY `id_fotos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id_permisos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `per_codigo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'codigo persona pk auto incremental', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id_seccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
