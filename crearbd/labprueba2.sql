-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-12-2023 a las 23:21:11
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `labprueba2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bolsa`
--

CREATE TABLE `bolsa` (
  `idBolsa` varchar(15) NOT NULL,
  `idProceso` varchar(15) DEFAULT NULL,
  `idProducto` varchar(15) DEFAULT NULL,
  `cantidad` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `bolsa`
--

INSERT INTO `bolsa` (`idBolsa`, `idProceso`, `idProducto`, `cantidad`) VALUES
('BOLSA0001', 'PROC0003', 'PROD0001', '1.000'),
('BOLSA0002', 'PROC0003', 'PROD0002', '1.000'),
('BOLSA0003', 'PROC0003', 'PROD0003', '1.000'),
('BOLSA0004', 'PROC0004', 'PROD0002', '1.000'),
('BOLSA0005', 'PROC0004', 'PROD0003', '1.000'),
('BOLSA0006', 'PROC0004', 'PROD0003', '1.000'),
('BOLSA0007', 'PROC0005', 'PROD0000', '1.000'),
('BOLSA0008', 'PROC0008', 'PROD0000', '1.000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `codigobarras`
--

CREATE TABLE `codigobarras` (
  `idCodigoBarras` varchar(15) NOT NULL,
  `idBolsa` varchar(15) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `codigoBarras` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `codigobarras`
--

INSERT INTO `codigobarras` (`idCodigoBarras`, `idBolsa`, `nombre`, `codigoBarras`) VALUES
('1', 'BOLSA0001', 'Código de Barras 1', '1234567890123'),
('2', 'BOLSA0002', 'Lorenzo', '002'),
('3', 'BOLSA0003', 's', '003'),
('4', 'BOLSA0004', 'saaa', '004'),
('5', 'BOLSA0005', 'se', '005');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `deposito`
--

CREATE TABLE `deposito` (
  `idDeposito` varchar(15) NOT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `limiteOcupacion` decimal(10,2) DEFAULT NULL,
  `cantidadOcupada` decimal(10,2) DEFAULT NULL,
  `porcentajeOcupacion` decimal(5,2) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `deposito`
--

INSERT INTO `deposito` (`idDeposito`, `descripcion`, `limiteOcupacion`, `cantidadOcupada`, `porcentajeOcupacion`, `ubicacion`) VALUES
('DEP0000', 'Depósito AGH', '1000.00', '500.00', '50.00', 'Ubicación 1'),
('DEP0001', 'Depósito AGS', '1500.00', '800.00', '53.33', 'Ubicación 2'),
('DEP0002', 'Depósito H', '2000.00', '1200.00', '60.00', 'Ubicación 3'),
('DEP0003', 'Depósito ECB', '800.00', '300.00', '37.50', 'Ubicación 4'),
('DEP0005', 'Depósito AGH', '1000.00', '500.00', '50.00', 'Ubicación 1'),
('DEP0006', 'Depósito AGS', '1500.00', '800.00', '53.33', 'Ubicación 2'),
('DEP0007', 'Depósito H', '2000.00', '1200.00', '60.00', 'Ubicación 3'),
('DEP0008', 'Depósito aaaaaaaaaaa', '800.00', '300.00', '37.50', 'Ubicación 4'),
('DEP0009', 'ssss', '0.00', '123.00', '0.00', 'sw'),
('DEP0010', '', '100.00', '20.00', '20.00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineaproduccion`
--

CREATE TABLE `lineaproduccion` (
  `idLineaProduccion` varchar(15) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `ubicacion` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lineaproduccion`
--

INSERT INTO `lineaproduccion` (`idLineaProduccion`, `nombre`, `abreviatura`, `descripcion`, `ubicacion`) VALUES
('LINEA0001', 'Línea 1', 'L1', 'Linea con 2 reactores dedicada', 'Ubicación 1'),
('LINEA0002', 'Línea 2', 'L2', 'Linea con 8 reactores dedicada', 'Ubicación 2'),
('LINEA0003', 'Línea 3', 'L3', 'Linea con 2 reactores dedicada', 'Ubicación 1'),
('LINEA0004', 'Línea 4', 'L4', 'Linea con 8 reactores dedicada', 'Ubicación 2'),
('LINEA0005', 'Línea 5', 'L5', 'Linea con 2 reactores dedicada', 'Ubicación 5'),
('LINEA0008', 'L9', 'L9', 'L9', 'l8'),
('LINEA0009', 'l9', 'L9', 'ss', 'ss');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `idLocalidad` varchar(15) NOT NULL,
  `idProvincia` varchar(15) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `localidad`
--

INSERT INTO `localidad` (`idLocalidad`, `idProvincia`, `nombre`, `abreviatura`) VALUES
('01', '01', 'Vitoria-Gasteiz', 'V-G'),
('02', '02', 'Albacete', 'ALB'),
('10', '10', 'Cáceres', 'CC'),
('11', '06', 'Badajoz', 'BA'),
('12', '06', 'Mérida', 'Me');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE `pedido` (
  `idPedido` varchar(15) NOT NULL,
  `idProveedor` varchar(15) DEFAULT NULL,
  `idProducto` varchar(15) DEFAULT NULL,
  `idUsuario` varchar(15) DEFAULT NULL,
  `cantidad` decimal(10,3) DEFAULT NULL,
  `precioProducto` decimal(10,2) DEFAULT NULL,
  `fechaPedido` date DEFAULT NULL,
  `servido` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`idPedido`, `idProveedor`, `idProducto`, `idUsuario`, `cantidad`, `precioProducto`, `fechaPedido`, `servido`) VALUES
('PED0001', 'PROV0001', 'PROD0000', 'USU0001', '100.000', '50.00', '2023-01-01', 1),
('PED0002', 'PROV0002', 'PROD0000', 'USU0002', '150.000', '75.00', '2023-02-11', 0),
('PED0003', 'PROV0003', 'PROD0000', 'USU0001', '200.000', '100.00', '2023-01-21', 1),
('PED0004', 'PROV0001', 'PROD0000', 'USU0001', '100.000', '50.00', '2023-01-01', 1),
('PED0006', 'PROV0001', 'PROD0000', 'USU0002', '200.000', '12.00', '2023-11-23', 1),
('PED0007', 'PROV0001', 'PROD0000', 'USU0003', '120.000', '120.00', '2023-10-30', 1),
('PED0008', 'PROV0001', 'PROD0000', 'USU0001', '122.000', '123.00', '2023-11-29', 1),
('PED0009', 'PROV0002', 'PROD0000', 'USU0001', '0.000', '0.00', '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proceso`
--

CREATE TABLE `proceso` (
  `idProceso` varchar(15) NOT NULL,
  `idProducto` varchar(15) DEFAULT NULL,
  `idReactor` varchar(15) DEFAULT NULL,
  `idUsuario` varchar(15) DEFAULT NULL,
  `idLineaProduccion` varchar(15) DEFAULT NULL,
  `fechaProceso` date DEFAULT NULL,
  `horaInicio` time DEFAULT NULL,
  `horaFin` time DEFAULT NULL,
  `temperaturaMax` decimal(5,2) DEFAULT NULL,
  `temperaturaMin` decimal(5,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proceso`
--

INSERT INTO `proceso` (`idProceso`, `idProducto`, `idReactor`, `idUsuario`, `idLineaProduccion`, `fechaProceso`, `horaInicio`, `horaFin`, `temperaturaMax`, `temperaturaMin`) VALUES
('PROC0001', 'PROD0001', 'REACT0001', 'USU0002', 'LINEA0001', '2023-01-02', '08:00:00', '12:00:00', '80.00', '40.00'),
('PROC0002', 'PROD0002', 'REACT0002', 'USU0002', 'LINEA0001', '2023-01-03', '09:00:00', '13:00:00', '85.00', '45.00'),
('PROC0003', 'PROD0003', 'REACT0003', 'USU0002', 'LINEA0002', '2023-01-04', '10:00:00', '14:00:00', '90.00', '50.00'),
('PROC0004', 'PROD0002', 'REACT0004', 'USU0002', 'LINEA0002', '2023-01-05', '11:00:00', '15:00:00', '95.00', '55.00'),
('PROC0005', 'PROD0002', 'REACT0004', 'USU0002', 'LINEA0002', '2023-01-05', '11:00:00', '15:00:00', '95.00', '55.00'),
('PROC0006', 'PROD0003', 'REACT0003', 'USU0002', 'LINEA0002', '2023-01-04', '10:00:00', '14:00:00', '90.00', '50.00'),
('PROC0007', 'PROD0002', 'REACT0002', 'USU0002', 'LINEA0001', '2023-01-20', '09:00:00', '13:00:00', '85.00', '45.00'),
('PROC0008', 'PROD0000', 'REACT0001', 'USU0003', 'LINEA0001', '2023-11-06', '17:12:00', '18:13:00', '80.00', '14.00'),
('PROC0009', 'PROD0000', 'REACT0001', 'USU0003', 'LINEA0001', '2023-12-02', '13:53:00', '14:54:00', '120.00', '10.00'),
('PROC0010', 'PROD0000', 'REACT0001', 'USU0001', 'LINEA0001', '0000-00-00', '22:33:00', '23:34:00', '80.00', '12.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(15) NOT NULL,
  `idDeposito` varchar(15) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `idDeposito`, `nombre`, `descripcion`, `abreviatura`) VALUES
('PROD0000', 'DEP0000', 'Alaperujo Graso Humedo', 'materia prima', 'AGH'),
('PROD0001', 'DEP0001', 'Alperujo Graso Seco', 'Producto 1', 'AGS'),
('PROD0002', 'DEP0002', 'Hidrolato', 'Producto 2', 'H'),
('PROD0003', 'DEP0003', 'Extractos de Compuestos Bioact', 'Producto 3', 'ECB'),
('PROD0004', 'DEP0003', 'Extractos de Compuestos Bioact', 'Producto 3', 'ECB'),
('PROD0005', 'DEP0003', 'Extractos de Compuestos Bioact', 'Producto 3', 'ECB'),
('PROD0006', 'DEP0002', 'ssss', 'Producto 2', 'H'),
('PROD0008', 'DEP0000', 'ff', 'sss', 'D1'),
('PROD0009', 'DEP0000', 's', 's', 'S2'),
('PROD0010', 'DEP0000', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `idProveedor` varchar(15) NOT NULL,
  `idLocalidad` varchar(15) NOT NULL,
  `CIF` varchar(5) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `calle` varchar(30) DEFAULT NULL,
  `CP` varchar(15) DEFAULT NULL,
  `tlfContacto` varchar(15) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `cuentaBancaria` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`idProveedor`, `idLocalidad`, `CIF`, `nombre`, `calle`, `CP`, `tlfContacto`, `email`, `cuentaBancaria`) VALUES
('PROV0001', '02', 'CIF01', 'Almazara Nieto  Gonzal', 'Calle 1', '06000', '123456789', 'proveedor1@example.com', 'ES0123456789012345678901'),
('PROV0002', '02', 'CIF02', 'OLICAMP SL', 'Calle 2', '06001', '987654321', 'proveedor2@example.com', 'ES1234567890123456789012'),
('PROV0003', '02', 'CIF03', 'Agromolinos Garcia', 'Calle 3', '06002', '555555555', 'proveedor3@example.com', 'ES2345678901234567890123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `idProvincia` varchar(15) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`idProvincia`, `nombre`, `abreviatura`) VALUES
('01', 'Álava', 'AV'),
('02', 'Albacete', 'AB'),
('03', 'Alicante', 'AL'),
('04', 'Almería', 'AN'),
('05', 'Ávila', 'AVI'),
('06', 'Badajoz', 'BA'),
('07', 'Islas Baleares', 'IB'),
('08', 'Barcelona', 'B'),
('09', 'Burgos', 'BU'),
('10', 'Cáceres', 'CC'),
('11', 'Cádiz', 'CA'),
('12', 'Castellón', 'CS'),
('13', 'Ciudad Real', 'CR'),
('14', 'Córdoba', 'CO'),
('15', 'Cuenca', 'CU'),
('16', 'Gerona', 'GI'),
('17', 'Granada', 'GR'),
('18', 'Guadalajara', 'GU'),
('19', 'Guipúzcoa', 'SS'),
('20', 'Huelva', 'H'),
('21', 'Huesca', 'HU'),
('22', 'Jaén', 'J'),
('23', 'La Coruña', 'C'),
('25', 'León', 'LE'),
('26', 'Lérida', 'L'),
('27', 'Lugo', 'LU'),
('28', 'Madrid', 'M'),
('29', 'Málaga', 'MA'),
('30', 'Murcia', 'MU'),
('31', 'Navarra', 'NA'),
('32', 'Orense', 'OR'),
('33', 'Asturias', 'AS'),
('34', 'Palencia', 'P'),
('35', 'Las Palmas', 'GC'),
('36', 'Pontevedra', 'PO'),
('37', 'Salamanca', 'SA'),
('38', 'Santa Cruz de Tenerife', 'TF'),
('39', 'Cantabria', 'S'),
('40', 'Segovia', 'SG'),
('41', 'Sevilla', 'SE'),
('42', 'Soria', 'SO'),
('43', 'Tarragona', 'T'),
('44', 'Teruel', 'TE'),
('45', 'Toledo', 'TO'),
('46', 'Valencia', 'V'),
('47', 'Valladolid', 'VA'),
('48', 'Vizcaya', 'BI'),
('49', 'Zamora', 'ZA'),
('50', 'Zaragoza', 'Z'),
('51', 'Ceuta', 'CE'),
('52', 'Melilla', 'ML');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reactor`
--

CREATE TABLE `reactor` (
  `idReactor` varchar(15) NOT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `abreviatura` varchar(5) DEFAULT NULL,
  `descripcion` varchar(30) DEFAULT NULL,
  `fechaInstalacion` date DEFAULT NULL,
  `fechaMantenimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reactor`
--

INSERT INTO `reactor` (`idReactor`, `nombre`, `abreviatura`, `descripcion`, `fechaInstalacion`, `fechaMantenimiento`) VALUES
('REACT0001', 'Reactor 1', 'R1', 'Reactor 1 destinado a la línea', '2023-01-01', '2023-01-10'),
('REACT0002', 'Reactor 2', 'R2', 'Reactor 2 destinado a la línea', '2023-02-01', '2023-02-10'),
('REACT0003', 'Reactor 3', 'R3', 'Reactor 3 destinado a la línea', '2023-03-01', '2023-03-10'),
('REACT0004', 'Reactor 4', 'R4', 'Reactor 4 destinado a la línea', '2023-04-01', '2023-04-10'),
('REACT0005', 'Reactor 5', 'R5', 'Reactor 5 destinado a la línea', '2023-05-01', '2023-05-10'),
('REACT0006', 'Reactor 6', 'R6', 'Reactor 6 destinado a la línea', '2023-06-01', '2023-06-10'),
('REACT0007', 'Reactor 7', 'R7', 'Reactor 7 destinado a la línea', '2023-07-01', '2023-07-10'),
('REACT0008', 'Reactor 8', 'R8', 'Reactor 8 destinado a la línea', '2023-08-01', '2023-08-10'),
('REACT0009', 'Reactor 9999', 'R9', 'Reactor 9 destinado a la línea', '2023-09-01', '2023-09-10'),
('REACT0014', 'saaa', 'R14', 'ss', '2023-12-02', '2023-12-03');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` varchar(15) NOT NULL,
  `idLocalidad` varchar(15) DEFAULT NULL,
  `nombre` varchar(30) DEFAULT NULL,
  `apellidos` varchar(30) DEFAULT NULL,
  `DNI` varchar(10) DEFAULT NULL,
  `nombreUsuario` varchar(15) DEFAULT NULL,
  `contrasena` varchar(15) DEFAULT NULL,
  `tipo` varchar(15) DEFAULT NULL,
  `calle` varchar(30) DEFAULT NULL,
  `CP` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `idLocalidad`, `nombre`, `apellidos`, `DNI`, `nombreUsuario`, `contrasena`, `tipo`, `calle`, `CP`) VALUES
('USU0001', '01', 'Daniel', 'Garcia Tellez', '80102359Y', 'Daniel', 'DANIEL', 'admin', 'ssss', '06010'),
('USU0002', '02', 'juancarlo', 'juancarlo', '87654321B', 'luis', 'contrasenaLuis', 'operario', 'Calle Luis', '02001'),
('USU0003', '01', 'ALBERTO', 'PLA', '87654321A', 'Jose', 'JOSE', 'admin', 'Calle limon', '01001'),
('USU0004', '02', 'Juan', 'Garcia Sainz', '98765432B', 'Juan', 'JUAN', 'operario', 'Calle manzana', '02001'),
('USU0007', '02', 'aaaaa', 'aaaaa', '80102359Y', 'ssssaaaaa', 'ssss', 'operario', '1234', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bolsa`
--
ALTER TABLE `bolsa`
  ADD PRIMARY KEY (`idBolsa`),
  ADD KEY `idProceso` (`idProceso`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `codigobarras`
--
ALTER TABLE `codigobarras`
  ADD PRIMARY KEY (`idCodigoBarras`),
  ADD KEY `idBolsa` (`idBolsa`);

--
-- Indices de la tabla `deposito`
--
ALTER TABLE `deposito`
  ADD PRIMARY KEY (`idDeposito`);

--
-- Indices de la tabla `lineaproduccion`
--
ALTER TABLE `lineaproduccion`
  ADD PRIMARY KEY (`idLineaProduccion`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`idLocalidad`),
  ADD KEY `idProvincia` (`idProvincia`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`idPedido`),
  ADD KEY `idProveedor` (`idProveedor`),
  ADD KEY `idProducto` (`idProducto`);

--
-- Indices de la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD PRIMARY KEY (`idProceso`),
  ADD KEY `idProducto` (`idProducto`),
  ADD KEY `idReactor` (`idReactor`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idLineaProduccion` (`idLineaProduccion`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `idDeposito` (`idDeposito`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`idProveedor`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`idProvincia`);

--
-- Indices de la tabla `reactor`
--
ALTER TABLE `reactor`
  ADD PRIMARY KEY (`idReactor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idLocalidad` (`idLocalidad`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bolsa`
--
ALTER TABLE `bolsa`
  ADD CONSTRAINT `bolsa_ibfk_1` FOREIGN KEY (`idProceso`) REFERENCES `proceso` (`idProceso`),
  ADD CONSTRAINT `bolsa_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `codigobarras`
--
ALTER TABLE `codigobarras`
  ADD CONSTRAINT `codigobarras_ibfk_1` FOREIGN KEY (`idBolsa`) REFERENCES `bolsa` (`idBolsa`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`idProvincia`) REFERENCES `provincia` (`idProvincia`);

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`idProveedor`) REFERENCES `proveedor` (`idProveedor`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`);

--
-- Filtros para la tabla `proceso`
--
ALTER TABLE `proceso`
  ADD CONSTRAINT `proceso_ibfk_1` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `proceso_ibfk_2` FOREIGN KEY (`idReactor`) REFERENCES `reactor` (`idReactor`),
  ADD CONSTRAINT `proceso_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`idUsuario`),
  ADD CONSTRAINT `proceso_ibfk_4` FOREIGN KEY (`idLineaProduccion`) REFERENCES `lineaproduccion` (`idLineaProduccion`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`idDeposito`) REFERENCES `deposito` (`idDeposito`);

--
-- Filtros para la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD CONSTRAINT `proveedor_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`idLocalidad`) REFERENCES `localidad` (`idLocalidad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
