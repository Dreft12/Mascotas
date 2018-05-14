-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-05-2018 a las 21:39:35
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mascotas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientemascotas`
--

CREATE TABLE `clientemascotas` (
  `idRelacion` int(11) NOT NULL,
  `IdCliente` int(11) NOT NULL,
  `IdMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientemascotas`
--

INSERT INTO `clientemascotas` (`idRelacion`, `IdCliente`, `IdMascota`) VALUES
(1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Telefono` varchar(50) NOT NULL,
  `Direccion` varchar(100) DEFAULT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `Nombre`, `Telefono`, `Direccion`, `Email`) VALUES
(1, 'Jorge :V', '1234567', 'Calle falsa 123', 'jorge@gmail.com'),
(2, 'Laura', '2342', 'asd', 'adsd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `id` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `IdTipoMascota` int(11) NOT NULL,
  `EdadMascota` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`id`, `Nombre`, `IdTipoMascota`, `EdadMascota`) VALUES
(4, 'Juancho', 1, 9),
(6, 'Toby', 1, 4),
(7, 'Pablo', 2, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `Telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipomascota`
--

CREATE TABLE `tipomascota` (
  `id` int(11) NOT NULL,
  `Tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipomascota`
--

INSERT INTO `tipomascota` (`id`, `Tipo`) VALUES
(1, 'Perros'),
(2, 'Roedores'),
(3, 'Aves'),
(4, 'Felinos');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  ADD PRIMARY KEY (`idRelacion`),
  ADD KEY `clientemascotas_IdCliente_index` (`IdCliente`),
  ADD KEY `clientemascotas_IdMascota_index` (`IdMascota`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `mascotas_id_uindex` (`id`),
  ADD KEY `mascotas_IdTipoMascota_index` (`IdTipoMascota`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipomascota`
--
ALTER TABLE `tipomascota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tipomascota_id_index` (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  MODIFY `idRelacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipomascota`
--
ALTER TABLE `tipomascota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientemascotas`
--
ALTER TABLE `clientemascotas`
  ADD CONSTRAINT `clientemascotas_clientes_IdCliente_fk` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`),
  ADD CONSTRAINT `clientemascotas_mascotas_id_fk` FOREIGN KEY (`IdMascota`) REFERENCES `mascotas` (`id`);

--
-- Filtros para la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD CONSTRAINT `mascotas_tipomascota_id_fk` FOREIGN KEY (`IdTipoMascota`) REFERENCES `tipomascota` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
