-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-04-2022 a las 04:22:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ejeapi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(2, '2022-03-21-234157', 'App\\Database\\Migrations\\Tblclientes', 'default', 'App', 1647906969, 1),
(3, '2022-03-25-234221', 'App\\Database\\Migrations\\Tblcuenta', 'default', 'App', 1648252621, 2),
(4, '2022-03-28-233120', 'App\\Database\\Migrations\\Tbltipot', 'default', 'App', 1648510577, 3),
(7, '2022-03-28-233634', 'App\\Database\\Migrations\\Tbltransaccion', 'default', 'App', 1648683757, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcliente`
--

CREATE TABLE `tblcliente` (
  `idcliente` int(11) UNSIGNED NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `telefono` int(8) NOT NULL,
  `email` varchar(75) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_eliminado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblcliente`
--

INSERT INTO `tblcliente` (`idcliente`, `nombre`, `apellido`, `telefono`, `email`, `fecha_creacion`, `fecha_modificado`, `fecha_eliminado`) VALUES
(1, 'willian', 'montes', 12345678, 'darth@theempire.com', '2022-03-21 17:56:27', '2022-03-21 17:56:27', NULL),
(2, 'maria', 'lopez', 45786547, 'maria@lopez.com', '2022-03-21 17:59:10', '2022-03-28 17:07:03', NULL),
(3, 'karla', 'jimenez', 12345678, 'karla@jimenez.com', '2022-03-21 18:01:36', '2022-03-28 17:07:31', NULL),
(4, 'luis', 'garcia', 12345678, 'luis@garcia.com', '2022-03-23 09:16:41', '2022-03-28 17:08:39', NULL),
(5, 'ale', 'martin', 22223333, 'alex@correo.com', '2022-03-23 17:21:14', '2022-03-23 17:51:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tblcuenta`
--

CREATE TABLE `tblcuenta` (
  `idcuenta` int(11) UNSIGNED NOT NULL,
  `fondos` decimal(65,0) NOT NULL,
  `idcliente` int(11) UNSIGNED NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_eliminado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tblcuenta`
--

INSERT INTO `tblcuenta` (`idcuenta`, `fondos`, `idcliente`, `fecha_creacion`, `fecha_modificado`, `fecha_eliminado`) VALUES
(1, '300', 1, '2022-03-28 17:11:12', '2022-03-28 17:11:12', NULL),
(3, '30000', 2, '2022-03-28 17:12:18', '2022-04-01 17:23:36', NULL),
(4, '8000', 3, '2022-03-28 17:13:35', '2022-03-28 17:13:35', NULL),
(5, '500', 4, '2022-03-28 17:14:02', '2022-03-28 17:14:02', NULL),
(6, '700', 5, '2022-03-28 17:14:31', '2022-04-01 17:20:54', NULL),
(7, '3100', 1, '2022-03-28 17:16:49', '2022-03-28 17:18:22', '2022-03-28 18:18:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltipot`
--

CREATE TABLE `tbltipot` (
  `idtipot` int(11) UNSIGNED NOT NULL,
  `descrtipo` varchar(50) NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_eliminado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbltipot`
--

INSERT INTO `tbltipot` (`idtipot`, `descrtipo`, `fecha_creacion`, `fecha_modificado`, `fecha_eliminado`) VALUES
(1, 'Abono', '2022-03-28 17:50:59', '2022-03-28 17:50:59', NULL),
(2, 'Retiro', '2022-03-28 17:51:50', '2022-03-28 17:51:50', NULL),
(3, 'Transaccion de prueba actualizado', '2022-03-28 17:52:12', '2022-03-28 17:53:03', '2022-03-28 18:53:03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbltransaccion`
--

CREATE TABLE `tbltransaccion` (
  `idtransaccion` int(11) UNSIGNED NOT NULL,
  `idcuenta` int(11) UNSIGNED NOT NULL,
  `monto` decimal(65,0) NOT NULL,
  `idtipot` int(11) UNSIGNED NOT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `fecha_modificado` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `fecha_eliminado` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tbltransaccion`
--

INSERT INTO `tbltransaccion` (`idtransaccion`, `idcuenta`, `monto`, `idtipot`, `fecha_creacion`, `fecha_modificado`, `fecha_eliminado`) VALUES
(4, 1, '300', 1, '2022-03-30 17:46:33', '2022-03-30 17:46:33', NULL),
(5, 1, '600', 2, '2022-03-30 17:59:07', '2022-03-30 17:59:07', NULL),
(7, 3, '600', 2, '2022-03-30 18:02:29', '2022-03-30 18:02:29', NULL),
(8, 3, '3000', 2, '2022-04-01 13:05:42', '2022-04-01 13:05:42', NULL),
(9, 3, '3000', 2, '2022-04-01 13:16:36', '2022-04-01 13:16:36', NULL),
(10, 3, '3000', 2, '2022-04-01 13:32:24', '2022-04-01 13:32:24', NULL),
(11, 3, '3000', 2, '2022-04-01 13:33:42', '2022-04-01 13:33:42', NULL),
(12, 3, '30000', 1, '2022-04-01 13:34:25', '2022-04-01 13:34:25', NULL),
(13, 6, '600', 1, '2022-04-01 17:20:54', '2022-04-01 17:20:54', NULL),
(14, 3, '2000', 2, '2022-04-01 17:23:36', '2022-04-01 17:23:36', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  ADD PRIMARY KEY (`idcliente`);

--
-- Indices de la tabla `tblcuenta`
--
ALTER TABLE `tblcuenta`
  ADD PRIMARY KEY (`idcuenta`),
  ADD KEY `tblcuenta_idcliente_foreign` (`idcliente`);

--
-- Indices de la tabla `tbltipot`
--
ALTER TABLE `tbltipot`
  ADD PRIMARY KEY (`idtipot`);

--
-- Indices de la tabla `tbltransaccion`
--
ALTER TABLE `tbltransaccion`
  ADD PRIMARY KEY (`idtransaccion`),
  ADD KEY `tbltransaccion_idcuenta_foreign` (`idcuenta`),
  ADD KEY `tbltransaccion_idtipot_foreign` (`idtipot`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tblcliente`
--
ALTER TABLE `tblcliente`
  MODIFY `idcliente` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tblcuenta`
--
ALTER TABLE `tblcuenta`
  MODIFY `idcuenta` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbltipot`
--
ALTER TABLE `tbltipot`
  MODIFY `idtipot` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tbltransaccion`
--
ALTER TABLE `tbltransaccion`
  MODIFY `idtransaccion` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tblcuenta`
--
ALTER TABLE `tblcuenta`
  ADD CONSTRAINT `tblcuenta_idcliente_foreign` FOREIGN KEY (`idcliente`) REFERENCES `tblcliente` (`idcliente`);

--
-- Filtros para la tabla `tbltransaccion`
--
ALTER TABLE `tbltransaccion`
  ADD CONSTRAINT `tbltransaccion_idcuenta_foreign` FOREIGN KEY (`idcuenta`) REFERENCES `tblcuenta` (`idcuenta`),
  ADD CONSTRAINT `tbltransaccion_idtipot_foreign` FOREIGN KEY (`idtipot`) REFERENCES `tbltipot` (`idtipot`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
