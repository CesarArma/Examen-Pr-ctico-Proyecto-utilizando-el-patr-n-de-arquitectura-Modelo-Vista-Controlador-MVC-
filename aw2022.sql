-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-03-2023 a las 03:54:48
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `aw2022`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `Nombre`, `Fecha`) VALUES
(82, 'Ferreteria', '2022-06-25'),
(83, 'Abarrotes', '2022-06-25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_p` varchar(50) NOT NULL,
  `Apellido_m` varchar(50) NOT NULL,
  `Genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `Nombres`, `Apellido_p`, `Apellido_m`, `Genero`) VALUES
(1, 'Cesar', 'Pereda', 'Rdz', 'Masculino'),
(2, 'Miguel', 'Tienda', 'Jurado', 'Masculino'),
(3, 'dsdgsgd', 'sdfgsdg', 'sdfgsdf', 'Femenino'),
(4, 'Santa', 'No tan Santa', 'Mendez', 'Femenino'),
(5, 'hghjfgj', 'fgjfgj', 'fghjfgj', 'Masculino'),
(6, 'oooooo', 'ooooo', 'oooo', 'Otro1'),
(7, 'aaaaaaa', 'aaaaa', 'aaaaa', 'Masculino'),
(9, 'dfgdfdfg', 'dfgdfgdf', 'gdfgdfg', 'dfgdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `Nombre` varchar(50) NOT NULL,
  `Cantidad` decimal(10,0) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `Nombre`, `Cantidad`, `id_proveedor`, `id_categoria`) VALUES
(182, 'fritos', '66', 7, 83),
(191, 'fdsgsdg', '12', 5, 82),
(196, 'asdasdas', '333', 11, 82),
(208, 'lkkhhio', '58', 5, 82),
(209, 'calamardo', '25', 6, 83);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_p` varchar(50) NOT NULL,
  `Apellido_m` varchar(50) NOT NULL,
  `Genero` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `Nombres`, `Apellido_p`, `Apellido_m`, `Genero`) VALUES
(3, 'Cesar', 'Pereda', 'Rdz', 'Masculino'),
(5, 'Juan', 'Perez', 'Rdz', 'gdgdfg'),
(6, 'Pedro', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(7, 'Alexia', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(8, 'Gustavo', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(9, 'Juanito', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(10, 'Rodrigo', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(11, 'Alexis', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(12, 'Brandon', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(13, 'Jose', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(14, 'Christopher', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg'),
(15, 'Fernando', 'dfgdgdfg', 'dgdfgdf', 'gdgdfg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `Nombres` varchar(50) NOT NULL,
  `Apellido_p` varchar(50) NOT NULL,
  `Apellido_m` varchar(50) NOT NULL,
  `Usuario` varchar(50) NOT NULL,
  `Contrasena` varchar(20) NOT NULL,
  `Privilegio` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `Nombres`, `Apellido_p`, `Apellido_m`, `Usuario`, `Contrasena`, `Privilegio`) VALUES
(1, 'cesar', 'Pereda', 'Rdz', 'cesarprda@gmail.com', '123', 'Admin'),
(2, 'pedro', 'martinez', 'suarez', 'pedro@gmail.com', '1234', 'Usuario'),
(3, 'Cesar', 'Castillo', 'Rosas', 'cesar@gmail.com', '123', 'Usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=210;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
