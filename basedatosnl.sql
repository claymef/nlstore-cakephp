-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-07-2019 a las 19:18:33
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `basedatosnl`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `almacen_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `almacen_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`almacen_id`, `user_id`, `almacen_nombre`) VALUES
(6, 19, 'Arequipa'),
(7, 19, 'Tacna'),
(8, 19, 'Lima');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalleventa`
--

CREATE TABLE `detalleventa` (
  `detalle_id` int(11) NOT NULL,
  `factura_id` int(11) NOT NULL,
  `prenda_id` int(11) NOT NULL,
  `detalle_cantidad` int(3) NOT NULL,
  `detalle_precio` decimal(5,2) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalleventa`
--

INSERT INTO `detalleventa` (`detalle_id`, `factura_id`, `prenda_id`, `detalle_cantidad`, `detalle_precio`, `created`) VALUES
(8, 5, 6, 3, '30.00', '2019-07-02 17:40:15'),
(9, 5, 7, 2, '40.00', '2019-07-02 17:40:44'),
(10, 6, 6, 1, '10.00', '2019-07-02 18:05:10'),
(11, 9, 10, 3, '150.00', '2019-07-03 12:16:02'),
(13, 9, 7, 2, '40.00', '2019-07-09 11:35:19'),
(16, 9, 8, 2, '20.00', '2019-07-09 12:11:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `factura_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`factura_id`, `user_id`, `created`) VALUES
(5, 20, '2019-07-02 17:37:37'),
(6, 20, '2019-07-02 17:57:48'),
(9, 36, '2019-07-03 12:02:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modelos`
--

CREATE TABLE `modelos` (
  `modelo_id` int(11) NOT NULL,
  `almacen_id` int(11) NOT NULL,
  `modelo_nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `modelos`
--

INSERT INTO `modelos` (`modelo_id`, `almacen_id`, `modelo_nombre`) VALUES
(10, 6, 'TopsAqp'),
(11, 6, 'VestidoAqp'),
(12, 8, 'TopsLima'),
(13, 7, 'PantalonesTac');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prendas`
--

CREATE TABLE `prendas` (
  `prenda_id` int(11) NOT NULL,
  `modelo_id` int(11) NOT NULL,
  `prenda_nombre` varchar(100) NOT NULL,
  `prenda_stock` int(3) NOT NULL,
  `prenda_precio` decimal(5,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `prendas`
--

INSERT INTO `prendas` (`prenda_id`, `modelo_id`, `prenda_nombre`, `prenda_stock`, `prenda_precio`) VALUES
(6, 10, 'top luciana', 30, '10.00'),
(7, 11, 'vestido oriana', 30, '20.00'),
(8, 10, 'top ursula', 50, '10.00'),
(9, 12, 'top basic', 30, '10.00'),
(10, 13, 'pantalon jean', 50, '50.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `user_apellido` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `user_dni` int(8) NOT NULL,
  `user_correo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `user_contraseña` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `user_role` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `user_status` tinyint(1) DEFAULT '0',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `user_nombre`, `user_apellido`, `user_dni`, `user_correo`, `user_contraseña`, `user_role`, `user_status`, `created`, `modified`) VALUES
(19, 'christian', 'layme', 71769047, 'claymef@unsa.edu.pe', '$2y$10$sgxZFsOmvidEVqvcgT1ISubI00fTSRUt4dsAsbRuRf4J5aUlHqjgq', 'admin', 1, '2019-07-01 22:02:43', '2019-07-01 22:27:11'),
(20, 'victor', 'quispe', 34251526, 'vquispeq@unsa.edu.pe', '$2y$10$YE7NzQJDmS8wqre4/oylyuISAGaWhmu1DW397i3ssYdcfpy6q2Bvu', 'cliente', 1, '2019-07-01 22:05:53', '2019-07-01 22:27:21'),
(22, 'franco', 'escamilla', 46372819, 'fescamilla@unsa.edu.pe', '$2y$10$1MQQH/uAAU7v3TmuTwmuXOIYMB/U29EAG9ZdH4C.lGhhfDG.O5AeO', 'cliente', 1, '2019-07-02 20:50:57', '2019-07-02 20:50:57'),
(36, 'gonzalo', 'fernandez', 72737471, 'xalo2708@gmail.com', '$2y$10$1huWzPW3XSFwfUFakGZ7.u9T.X2JhQySJzoLN0le963w/oMrWXLy6', 'cliente', 1, '2019-07-03 11:51:33', '2019-07-03 11:51:33');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`almacen_id`),
  ADD UNIQUE KEY `almacen_nombre` (`almacen_nombre`),
  ADD KEY `user_key` (`user_id`);

--
-- Indices de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD PRIMARY KEY (`detalle_id`),
  ADD KEY `prenda_key` (`prenda_id`),
  ADD KEY `factura_key` (`factura_id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`factura_id`),
  ADD KEY `user_key` (`user_id`);

--
-- Indices de la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD PRIMARY KEY (`modelo_id`),
  ADD UNIQUE KEY `modelo_nombre` (`modelo_nombre`),
  ADD KEY `almacen_key` (`almacen_id`);

--
-- Indices de la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD PRIMARY KEY (`prenda_id`),
  ADD UNIQUE KEY `prenda_nombre` (`prenda_nombre`),
  ADD KEY `modelo_key` (`modelo_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `almacen_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  MODIFY `detalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `factura_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `modelos`
--
ALTER TABLE `modelos`
  MODIFY `modelo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `prendas`
--
ALTER TABLE `prendas`
  MODIFY `prenda_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD CONSTRAINT `user_key` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `detalleventa`
--
ALTER TABLE `detalleventa`
  ADD CONSTRAINT `factura_key` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`factura_id`),
  ADD CONSTRAINT `prenda_key` FOREIGN KEY (`prenda_id`) REFERENCES `prendas` (`prenda_id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Filtros para la tabla `modelos`
--
ALTER TABLE `modelos`
  ADD CONSTRAINT `modelos_ibfk_1` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`almacen_id`);

--
-- Filtros para la tabla `prendas`
--
ALTER TABLE `prendas`
  ADD CONSTRAINT `prendas_ibfk_1` FOREIGN KEY (`modelo_id`) REFERENCES `modelos` (`modelo_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
