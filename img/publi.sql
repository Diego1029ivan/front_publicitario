-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2023 a las 17:31:01
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `publi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `IdCategoria` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`IdCategoria`, `nombres`, `estado`) VALUES
(1, 'Categoría A', 'Activo'),
(2, 'Categoría B', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `IdCompra` int(11) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `IdDistrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compra`
--

INSERT INTO `compra` (`IdCompra`, `descripcion`, `total`, `fecha`, `IdUsuario`, `estado`, `IdDistrito`) VALUES
(1, 'Compra 1', 150.00, '2023-06-22', 1, 'Cancelado', 1),
(2, 'Compra 2', 200.00, '2023-06-22', 2, 'Pendiente', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamento`
--

CREATE TABLE `departamento` (
  `IdDepartamento` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `departamento`
--

INSERT INTO `departamento` (`IdDepartamento`, `nombre`, `estado`) VALUES
(1, 'Lima', 'Activo'),
(2, 'Arequipa', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_compra`
--

CREATE TABLE `detalle_compra` (
  `Id` int(11) NOT NULL,
  `IdCompra` int(11) DEFAULT NULL,
  `IdProveedor` int(11) DEFAULT NULL,
  `IdProducto` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precioUnitario` decimal(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_compra`
--

INSERT INTO `detalle_compra` (`Id`, `IdCompra`, `IdProveedor`, `IdProducto`, `cantidad`, `precioUnitario`, `estado`) VALUES
(1, 1, 1, 1, 5, 20.00, 'Activo'),
(2, 2, 2, 2, 10, 15.00, 'Activo'),
(3, NULL, NULL, NULL, 0, NULL, 'Activo'),
(4, NULL, NULL, NULL, 0, NULL, 'Activo'),
(5, NULL, NULL, 1, 0, NULL, 'Activo'),
(6, 1, 1, 1, 0, NULL, 'Activo'),
(7, 1, 1, 1, 0, 14.00, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_venta`
--

CREATE TABLE `detalle_venta` (
  `Id` int(11) NOT NULL,
  `IdVenta` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `IdProducto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_venta`
--

INSERT INTO `detalle_venta` (`Id`, `IdVenta`, `cantidad`, `precio`, `estado`, `IdProducto`) VALUES
(1, 1, 2, 10.00, 'Activo', 1),
(2, 2, 3, 20.00, 'Activo', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `distrito`
--

CREATE TABLE `distrito` (
  `IdDistrito` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `IdProvincia` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `distrito`
--

INSERT INTO `distrito` (`IdDistrito`, `nombre`, `IdProvincia`, `estado`) VALUES
(1, 'Miraflores', 1, 'Activo'),
(2, 'San Sebastián', 2, 'Activo'),
(3, 'San Sebastián1', 1, 'Activo'),
(4, 'aaa1', 1, 'Inactivo'),
(6, 'sss', 3, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE `empresa` (
  `IdEmpresa` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `ruc` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `logo` varchar(250) NOT NULL DEFAULT 'logo.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`IdEmpresa`, `nombre`, `direccion`, `telefono`, `correo`, `ruc`, `estado`, `logo`) VALUES
(1, 'Empresa A', 'Av. Ejemplo 123', '987654321', 'empresa@example.com', '12345678901', 'Activo', 'ef96c3f3-e18a-4dd7-8648-39084cfb2227_fondNexflit.jpg'),
(2, 'Empresa B1', 'Calle Prueba 4561', '9876543221', 'empresa1@example.com', '12345678901', 'Inactivo', 'logo.png'),
(4, 'nomms', 'ssss', '55555', 'esalk@gmail.com', '216555', 'Activo', 'logo.png'),
(5, 'sss', 'sss', '925875640', '7777@gmail.com', '7777', 'Inactivo', 'logo.png'),
(6, '111', '1111', '1111', '1111@gmail.com', '1111', 'Inactivo', 'logo.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marca`
--

CREATE TABLE `marca` (
  `IdMarca` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `marca`
--

INSERT INTO `marca` (`IdMarca`, `nombres`, `estado`) VALUES
(1, 'Marca A', 'Activo'),
(2, 'Marca B', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfil`
--

CREATE TABLE `perfil` (
  `IdPerfil` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `perfil`
--

INSERT INTO `perfil` (`IdPerfil`, `nombres`, `estado`) VALUES
(1, 'ROLE_USER', 'Activo'),
(2, 'ROLE_ADMIN', 'Activo'),
(3, 'ROLE_SUPADMIN', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso`
--

CREATE TABLE `permiso` (
  `IdPermiso` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `permiso`
--

INSERT INTO `permiso` (`IdPermiso`, `nombre`, `estado`) VALUES
(1, 'Permiso A', 'Activo'),
(2, 'Permiso B', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `IdProducto` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `IdMarca` int(11) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `fechacaducidad` date DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `cantidad` int(11) NOT NULL,
  `productoImg` varchar(250) NOT NULL DEFAULT 'img.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`IdProducto`, `nombres`, `IdMarca`, `IdCategoria`, `fechacaducidad`, `estado`, `cantidad`, `productoImg`) VALUES
(1, 'Producto A', 1, 1, '2023-12-31', 'Activo', 5, '6eec8003-3724-4cea-a452-65187ddcc924_fondNexflit.jpg'),
(2, 'Producto B', 2, 2, '2023-10-31', 'Activo', 6, 'img.png'),
(3, 'nomb1', 1, 2, '2023-05-30', 'Activo', 20, 'img.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `IdProveedor` int(11) NOT NULL,
  `nomCompania` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `NTarjeta` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `RUC` varchar(20) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`IdProveedor`, `nomCompania`, `direccion`, `telefono`, `correo`, `NTarjeta`, `nombre`, `RUC`, `estado`) VALUES
(1, 'Proveedor A', 'Av. Ejemplo 456', '912345678', 'proveedor@example.com', '1234567890123456', 'Juan Pérez', '12345678903', 'Activo'),
(2, 'Proveedor B', 'Calle Prueba 789', '912345679', 'proveedor2@example.com', '1234567890123457', 'María López', '12345678904', 'Activo'),
(3, 'comoa', 'di', '655', 'es@gmail.com', '15545', 'repre', 'ddddddddd44ddd', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `IdProvincia` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `IdDepartamento` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`IdProvincia`, `nombre`, `IdDepartamento`, `estado`) VALUES
(1, 'Lima', 1, 'Activo'),
(2, 'Cusco2', 1, 'Inactivo'),
(3, 'san martin', 2, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sucursal`
--

CREATE TABLE `sucursal` (
  `IdSucursal` int(11) NOT NULL,
  `nombres` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `IdEmpresa` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `sucursal`
--

INSERT INTO `sucursal` (`IdSucursal`, `nombres`, `direccion`, `telefono`, `IdEmpresa`, `estado`) VALUES
(1, 'Sucursal Lima', 'Av. Ejemplo 789', '987654323', 1, 'Activo'),
(2, 'Sucursal Arequipa', 'Calle Prueba 456', '987654324', 2, 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `IdUsuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `apellido` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `contrasena` varchar(255) DEFAULT NULL,
  `DNI` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `IdPerfil` int(11) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `IdSucursal` int(11) DEFAULT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`IdUsuario`, `nombre`, `apellido`, `correo`, `contrasena`, `DNI`, `celular`, `direccion`, `IdPerfil`, `estado`, `IdSucursal`, `username`) VALUES
(1, 'Luis', 'Gómez', 'luis@example.com', '123456', '12345678', '987654321', 'Av. Ejemplo 789', 1, 'Activo', 1, 'luis'),
(2, 'Ana', 'Torres', 'ana@example.com', NULL, '87654321', '987654322', 'Calle Prueba 123', 2, 'Activo', 1, 'ana'),
(13, 'juan', 'apellido', 'juan@gmail.com', '$2a$10$7uPtOodncOfFuOAcbHrbs.OTbW28m0CTP7Or/vkU2yM6g63d44lTS', NULL, '1234456789', 'dirreccion', 1, 'Activo', NULL, 'juan'),
(17, 'Sara', 'Gómez', 'sara@example.com', '$2a$10$1DlOauGgtA8kPzMNrj8vsOSuxVO2N3vvhk0CB6H2M.H4iRfziTyKe', '12345678', '987654321', 'Av. Ejemplo 789', 2, 'Activo', 2, 'Sara'),
(19, 'Juan1', 'Juan1', 'juan1@example.com', '$2a$10$trQFUCkwo5708cK0Jl49D.hPqJe6AWtpkdLJXutJhTucL/i1uPQmi', '12345678', '987654321', 'Av. Ejemplo 789', 3, 'Activo', NULL, 'Juan1'),
(20, 'nombre8', 'apellido2', 'corre@gmail.com', '$2a$10$hSi82U.hl9Y.InaKDl9sWuSj1WeT87l5FpdDnSSz3u5ccmZtZMrOG', '123456789', '12345678', 'jr 16 de mayo', 1, 'Activo', NULL, 'nombre8'),
(21, 'esau', 'veintemilla', 'esauveintemilla@gmail.com', '$2a$10$kq.39NmerpEA0QuBhrfyfOWWwjo2V7BoM03Q4AaOoWPhK4v3UlzOm', '123456789', '925875640', 'jr morales n45', 1, 'Activo', NULL, 'esau');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta`
--

CREATE TABLE `venta` (
  `IdVenta` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `tipoVenta` varchar(255) DEFAULT NULL,
  `tipoComprobante` varchar(255) DEFAULT NULL,
  `fechaHora` datetime DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL,
  `IdDistrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `venta`
--

INSERT INTO `venta` (`IdVenta`, `IdUsuario`, `tipoVenta`, `tipoComprobante`, `fechaHora`, `total`, `estado`, `IdDistrito`) VALUES
(1, 1, 'Venta 1', 'Boleta', '2023-06-19 00:00:00', 50.00, 'Pagado', 1),
(2, 2, 'Venta 2', 'Factura', '2023-06-18 00:00:00', 100.00, 'Cancelado', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD PRIMARY KEY (`IdCompra`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdDistrito` (`IdDistrito`);

--
-- Indices de la tabla `departamento`
--
ALTER TABLE `departamento`
  ADD PRIMARY KEY (`IdDepartamento`);

--
-- Indices de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdCompra` (`IdCompra`),
  ADD KEY `IdProveedor` (`IdProveedor`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `IdVenta` (`IdVenta`),
  ADD KEY `IdProducto` (`IdProducto`);

--
-- Indices de la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD PRIMARY KEY (`IdDistrito`),
  ADD KEY `IdProvincia` (`IdProvincia`);

--
-- Indices de la tabla `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`IdEmpresa`);

--
-- Indices de la tabla `marca`
--
ALTER TABLE `marca`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`IdPerfil`);

--
-- Indices de la tabla `permiso`
--
ALTER TABLE `permiso`
  ADD PRIMARY KEY (`IdPermiso`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`IdProducto`),
  ADD KEY `IdMarca` (`IdMarca`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`IdProveedor`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`IdProvincia`),
  ADD KEY `IdDepartamento` (`IdDepartamento`);

--
-- Indices de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD PRIMARY KEY (`IdSucursal`),
  ADD KEY `IdEmpresa` (`IdEmpresa`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`IdUsuario`),
  ADD KEY `IdPerfil` (`IdPerfil`),
  ADD KEY `IdSucursal` (`IdSucursal`);

--
-- Indices de la tabla `venta`
--
ALTER TABLE `venta`
  ADD PRIMARY KEY (`IdVenta`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdDistrito` (`IdDistrito`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `compra`
--
ALTER TABLE `compra`
  MODIFY `IdCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `departamento`
--
ALTER TABLE `departamento`
  MODIFY `IdDepartamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `distrito`
--
ALTER TABLE `distrito`
  MODIFY `IdDistrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `empresa`
--
ALTER TABLE `empresa`
  MODIFY `IdEmpresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `marca`
--
ALTER TABLE `marca`
  MODIFY `IdMarca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `perfil`
--
ALTER TABLE `perfil`
  MODIFY `IdPerfil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `permiso`
--
ALTER TABLE `permiso`
  MODIFY `IdPermiso` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `IdProvincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `sucursal`
--
ALTER TABLE `sucursal`
  MODIFY `IdSucursal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `venta`
--
ALTER TABLE `venta`
  MODIFY `IdVenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `compra_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `compra_ibfk_2` FOREIGN KEY (`IdDistrito`) REFERENCES `distrito` (`IdDistrito`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_compra`
--
ALTER TABLE `detalle_compra`
  ADD CONSTRAINT `detalle_compra_ibfk_1` FOREIGN KEY (`IdCompra`) REFERENCES `compra` (`IdCompra`),
  ADD CONSTRAINT `detalle_compra_ibfk_2` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedor` (`IdProveedor`),
  ADD CONSTRAINT `detalle_compra_ibfk_3` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`);

--
-- Filtros para la tabla `detalle_venta`
--
ALTER TABLE `detalle_venta`
  ADD CONSTRAINT `detalle_venta_ibfk_1` FOREIGN KEY (`IdVenta`) REFERENCES `venta` (`IdVenta`),
  ADD CONSTRAINT `detalle_venta_ibfk_2` FOREIGN KEY (`IdProducto`) REFERENCES `producto` (`IdProducto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `distrito`
--
ALTER TABLE `distrito`
  ADD CONSTRAINT `distrito_ibfk_1` FOREIGN KEY (`IdProvincia`) REFERENCES `provincia` (`IdProvincia`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`IdMarca`) REFERENCES `marca` (`IdMarca`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`IdCategoria`) REFERENCES `categoria` (`IdCategoria`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`IdDepartamento`) REFERENCES `departamento` (`IdDepartamento`);

--
-- Filtros para la tabla `sucursal`
--
ALTER TABLE `sucursal`
  ADD CONSTRAINT `sucursal_ibfk_1` FOREIGN KEY (`IdEmpresa`) REFERENCES `empresa` (`IdEmpresa`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`IdPerfil`) REFERENCES `perfil` (`IdPerfil`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`IdSucursal`) REFERENCES `sucursal` (`IdSucursal`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `venta`
--
ALTER TABLE `venta`
  ADD CONSTRAINT `venta_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuario` (`IdUsuario`),
  ADD CONSTRAINT `venta_ibfk_2` FOREIGN KEY (`IdDistrito`) REFERENCES `distrito` (`IdDistrito`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
