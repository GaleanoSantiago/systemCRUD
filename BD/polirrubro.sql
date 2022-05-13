-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2022 a las 10:33:20
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
-- Base de datos: `polirrubro`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ventas`
--

CREATE TABLE `detalle_ventas` (
  `det_venta_id` int(255) NOT NULL,
  `rela_venta_id` int(100) NOT NULL,
  `rela_producto_id` int(100) NOT NULL,
  `nprecio` int(10) NOT NULL,
  `ncant_x_prod` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_ventas`
--

INSERT INTO `detalle_ventas` (`det_venta_id`, `rela_venta_id`, `rela_producto_id`, `nprecio`, `ncant_x_prod`) VALUES
(18, 10, 2, 250, 2),
(19, 10, 9, 1200, 3),
(20, 11, 1, 253, 2),
(21, 12, 9, 1200, 1),
(22, 12, 2, 250, 2),
(23, 12, 1, 253, 3),
(26, 14, 9, 1200, 5),
(27, 14, 2, 250, 2),
(28, 14, 9, 1200, 3),
(35, 19, 10, 150, 2),
(36, 19, 2, 250, 1),
(37, 19, 1, 253, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medios_pago`
--

CREATE TABLE `medios_pago` (
  `med_pago_id` int(2) NOT NULL,
  `cdescripcion_med_pago` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `medios_pago`
--

INSERT INTO `medios_pago` (`med_pago_id`, `cdescripcion_med_pago`) VALUES
(1, 'Tarjeta de Credito'),
(2, 'Tarjeta de Debito'),
(3, 'Mercado Pago'),
(4, 'Uala'),
(5, 'Efectivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(100) NOT NULL,
  `ncodigo_barra` varchar(13) NOT NULL,
  `cnombre_producto` varchar(255) NOT NULL,
  `cmarca_producto` varchar(255) NOT NULL,
  `rela_rubro_id` int(100) NOT NULL,
  `nstock_actual` int(11) NOT NULL,
  `nstock_min` int(4) NOT NULL,
  `nprecio_producto` int(10) NOT NULL,
  `dfecha_alta_producto` date NOT NULL,
  `rela_proveedor_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `ncodigo_barra`, `cnombre_producto`, `cmarca_producto`, `rela_rubro_id`, `nstock_actual`, `nstock_min`, `nprecio_producto`, `dfecha_alta_producto`, `rela_proveedor_id`) VALUES
(1, '1234567890123', 'Mate', 'Ellay', 1, 73, 5, 253, '2021-10-11', 1),
(2, '2392812837123', 'Carpetas Escolares', 'Yonii', 2, 73, 10, 250, '2021-10-11', 2),
(10, '3234567890125', 'Naipes EspaÃ±oles', 'Hachazo', 5, 96, 10, 150, '2022-02-19', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `proveedor_id` int(100) NOT NULL,
  `cnombre_prov` varchar(255) NOT NULL,
  `cdireccion_prov` varchar(255) NOT NULL,
  `ntelefono_prov` varchar(14) NOT NULL,
  `ccorreo_prov` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`proveedor_id`, `cnombre_prov`, `cdireccion_prov`, `ntelefono_prov`, `ccorreo_prov`) VALUES
(1, 'Siliconion  ', 'Av Constitucion', '3704000012', 'asistencia@siliconion.com'),
(2, 'Yoni Incorporation ', 'Av Formosa', '3704231291', 'asistencia@yoniincorporation.com'),
(3, 'Samsung incorporation', 'Av Formosa 250', '3704544552', 'asistencia@samsunginc.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `rol_id` int(3) NOT NULL,
  `cdescripcion_rol` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`rol_id`, `cdescripcion_rol`) VALUES
(1, 'Administrador'),
(2, 'Cajero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `rubro_id` int(100) NOT NULL,
  `cnombre_rubro` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`rubro_id`, `cnombre_rubro`) VALUES
(1, 'Higiene'),
(2, 'Comestibles'),
(4, 'Hogar'),
(5, 'Libreria'),
(6, 'Limpieza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(3) NOT NULL,
  `cnombre_usuario` varchar(250) NOT NULL,
  `cemail_usuario` varchar(250) NOT NULL,
  `cpassword_usuario` varchar(250) NOT NULL,
  `cimg_usuario` varchar(100) NOT NULL,
  `rela_rol_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario_id`, `cnombre_usuario`, `cemail_usuario`, `cpassword_usuario`, `cimg_usuario`, `rela_rol_id`) VALUES
(1, 'Alias', 'alias@gmail.com', '12345', 'default.png', 1),
(2, 'Blues', 'blues.heimond@gmail.com', '12345', 'nothing.png', 2),
(3, 'Xpress', 'xpressmusic@gmail.com', '12345', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `venta_id` int(100) NOT NULL,
  `ncant_prod` int(7) NOT NULL,
  `dfecha_venta` date NOT NULL,
  `nprecio_total` int(100) NOT NULL,
  `rela_med_pago_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`venta_id`, `ncant_prod`, `dfecha_venta`, `nprecio_total`, `rela_med_pago_id`) VALUES
(10, 5, '2021-12-01', 4100, 3),
(11, 2, '2021-12-01', 506, 5),
(12, 6, '2021-12-01', 2459, 1),
(14, 10, '2021-12-03', 10100, 4),
(19, 5, '2022-02-19', 1056, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_intermedio`
--

CREATE TABLE `venta_intermedio` (
  `venta_inter_id` int(100) NOT NULL,
  `ncodigo_barra` varchar(13) NOT NULL,
  `cnombre` varchar(255) NOT NULL,
  `cmarca` varchar(255) NOT NULL,
  `nprecio` int(10) NOT NULL,
  `ncantidad` int(6) NOT NULL,
  `nprecio_total` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  ADD PRIMARY KEY (`det_venta_id`);

--
-- Indices de la tabla `medios_pago`
--
ALTER TABLE `medios_pago`
  ADD PRIMARY KEY (`med_pago_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`proveedor_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`rubro_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`),
  ADD KEY `rela_rol_id` (`rela_rol_id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`venta_id`);

--
-- Indices de la tabla `venta_intermedio`
--
ALTER TABLE `venta_intermedio`
  ADD PRIMARY KEY (`venta_inter_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_ventas`
--
ALTER TABLE `detalle_ventas`
  MODIFY `det_venta_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `medios_pago`
--
ALTER TABLE `medios_pago`
  MODIFY `med_pago_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `proveedor_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `rol_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `rubro_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `venta_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `venta_intermedio`
--
ALTER TABLE `venta_intermedio`
  MODIFY `venta_inter_id` int(100) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`rela_rol_id`) REFERENCES `roles` (`rol_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
