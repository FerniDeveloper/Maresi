-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 04-06-2022 a las 20:52:28
-- Versión del servidor: 5.7.38-cll-lve
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `changcus_maresionline`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `categoria` varchar(200) NOT NULL,
  `elim` tinyint(1) NOT NULL,
  `icon` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `elim`, `icon`) VALUES
(62, 'Ventas', 0, 'dw-analytics-3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbconn`
--

CREATE TABLE `dbconn` (
  `id` int(11) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `server` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `tipo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dbtipo`
--

CREATE TABLE `dbtipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `file` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `dbtipo`
--

INSERT INTO `dbtipo` (`id`, `nombre`, `file`) VALUES
(1, 'MySQL', 'dbmysql.php'),
(2, 'SQL Server', 'dbsqlserv.php');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `net`
--

CREATE TABLE `net` (
  `username` varchar(255) NOT NULL,
  `nombre` varchar(200) CHARACTER SET utf8 NOT NULL,
  `tipo` int(11) DEFAULT NULL,
  `hsh` varchar(255) NOT NULL,
  `elim` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `net`
--

INSERT INTO `net` (`username`, `nombre`, `tipo`, `hsh`, `elim`) VALUES
('Admin', 'Admin', 3, '$2y$10$MBFP40PUj2NfQZ5i.LYQzuExjZ5Cosu8bAtzMcTmpuusccu71eNFW', 0),
('Editor', 'Editor', 2, '$2y$10$PGHmpZSE7GxnODFHoHle0.kiho6rfZNJFGWoEKDnPH4it/Ks65Z9q', 0),
('Fernando', 'Fernando Trujillo', 3, '$2y$10$Ei72YvZ7VlkDDcYTkYgdq.GjNoUWWiXypW../BX2HXFKo5Nxs1lSm', 0),
('Invitado', 'Invitado', 1, '$2y$10$s1o15B./XZr2Lx.TwQGMjuR2AYAhz18LGkqhcfdI3y6QnDJLOCSk6', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `net_tipo`
--

CREATE TABLE `net_tipo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `net_tipo`
--

INSERT INTO `net_tipo` (`id`, `nombre`) VALUES
(1, 'Invitado'),
(2, 'Editor'),
(3, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reportes`
--

CREATE TABLE `reportes` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `consulta` text NOT NULL,
  `conexion` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dbconn`
--
ALTER TABLE `dbconn`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipo_db` (`tipo`);

--
-- Indices de la tabla `dbtipo`
--
ALTER TABLE `dbtipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `net`
--
ALTER TABLE `net`
  ADD PRIMARY KEY (`username`),
  ADD KEY `tipo` (`tipo`);

--
-- Indices de la tabla `net_tipo`
--
ALTER TABLE `net_tipo`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conexion` (`conexion`),
  ADD KEY `categoria` (`categoria`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT de la tabla `dbconn`
--
ALTER TABLE `dbconn`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `dbtipo`
--
ALTER TABLE `dbtipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `net_tipo`
--
ALTER TABLE `net_tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `reportes`
--
ALTER TABLE `reportes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `dbconn`
--
ALTER TABLE `dbconn`
  ADD CONSTRAINT `tipo_db` FOREIGN KEY (`tipo`) REFERENCES `dbtipo` (`id`);

--
-- Filtros para la tabla `net`
--
ALTER TABLE `net`
  ADD CONSTRAINT `tipo` FOREIGN KEY (`tipo`) REFERENCES `net_tipo` (`id`);

--
-- Filtros para la tabla `reportes`
--
ALTER TABLE `reportes`
  ADD CONSTRAINT `categoria` FOREIGN KEY (`categoria`) REFERENCES `categorias` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `conexion` FOREIGN KEY (`conexion`) REFERENCES `dbconn` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
