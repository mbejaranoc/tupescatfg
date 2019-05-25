-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2019 at 10:33 AM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tfg_prueba`
--

-- --------------------------------------------------------

--
-- Table structure for table `articulo`
--

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `descripcion_art` char(45) NOT NULL,
  `precio_articulo` int(11) NOT NULL,
  `iva_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articulo`
--

INSERT INTO `articulo` (`id_articulo`, `descripcion_art`, `precio_articulo`, `iva_articulo`) VALUES
(1, 'Articulo 1', 5, 10),
(2, 'Articulo 2', 10, 10),
(3, 'Articulo 3', 15, 4),
(4, 'ggg', 3456, 21);

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `id_cliente` int(11) NOT NULL,
  `cif_cliente` char(10) NOT NULL,
  `nombre_comercial` varchar(45) NOT NULL,
  `razon_social` varchar(45) NOT NULL,
  `direccion_descarga` varchar(45) NOT NULL,
  `direccion_fiscal` char(45) NOT NULL,
  `telefono_contacto` char(15) NOT NULL,
  `movil_contacto` char(15) DEFAULT NULL,
  `fax_cliente` char(15) DEFAULT NULL,
  `persona_contacto` char(20) DEFAULT NULL,
  `email_cliente` char(45) DEFAULT NULL,
  `forma_pago` char(45) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `COMERCIALES_id_comercial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cif_cliente`, `nombre_comercial`, `razon_social`, `direccion_descarga`, `direccion_fiscal`, `telefono_contacto`, `movil_contacto`, `fax_cliente`, `persona_contacto`, `email_cliente`, `forma_pago`, `fecha_creacion`, `COMERCIALES_id_comercial`) VALUES
(1, 'A11111111', 'Cliente 1', 'Cliente 1 S.L.', 'Direccion 1', 'Direccion 1b', '911111111', '611111111', '81111111', 'Contacto 1', 'cliente1@tupesca.com', 'Transferencia 60 días', '2018-07-09 22:36:01', 4),
(2, 'B22222222', 'Cliente 2', 'Cliente 2 S.L.', 'Calle Pepito 2', 'Calle Pepito 3', '622222222', '922222222', '92222223', 'Persona contacto 2', 'cliente2@gmail.com', '60 días', '2019-04-09 19:31:57', 1),
(3, 'kjhbkjhg', 'ljhkljhn', 'juhfjhg', 'kjhbkj', 'l,kjhnlkñj', '6546541', '654165', '6541625', 'lpñoijop', 'lkjhlkjhlkjhn@hotmail.com', 'lokijhoik', '2019-05-05 11:48:24', 9),
(4, 'fffffff', 'fffff', 'ffffff', 'ggggg', 'ggggg', 'gggg', 'gggg', 'ggg', 'ggg', 'gggg@gmail.com', 'gggggg', '2019-05-15 12:26:05', 9);

-- --------------------------------------------------------

--
-- Table structure for table `comerciales`
--

CREATE TABLE `comerciales` (
  `id_comercial` int(11) NOT NULL,
  `dni_comercial` varchar(15) NOT NULL,
  `nombre_comercial` varchar(20) NOT NULL,
  `apellidos_comercial` varchar(45) NOT NULL,
  `direccion_comercial` varchar(45) NOT NULL,
  `telefono_contacto` varchar(45) NOT NULL,
  `telefono_movil` varchar(15) NOT NULL,
  `email` varchar(45) NOT NULL,
  `User_Name` varchar(60) NOT NULL,
  `User_Password` varchar(60) NOT NULL,
  `User_Type` varchar(15) NOT NULL DEFAULT 'Invitado'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comerciales`
--

INSERT INTO `comerciales` (`id_comercial`, `dni_comercial`, `nombre_comercial`, `apellidos_comercial`, `direccion_comercial`, `telefono_contacto`, `telefono_movil`, `email`, `User_Name`, `User_Password`, `User_Type`) VALUES
(1, '11111111B', 'Comercial 1', 'Comercial 1', 'Direccion 1', '911111111', '611111111', 'comercial1@tupesca.com', 'comercial1', '$2y$10$FWtdByESq6ODExrmemWlCeZmqF5UXctznZw9tvRCkP8H4oF0rAs3C', 'comercial'),
(2, '22222222A', 'Comercial 2', 'Comercial 2', 'Direccion 2', '922222222', '622222222', 'comercial2@tupesca.com', 'comercial2', '$2y$10$xS2Ne52uyGUseHfAybHpquEIKqogMQxfCjxEb8K.SvK72pw6BbHi2', 'comercial'),
(3, '555555555525b', 'Administrador 1', 'Administrador 1', 'Direccion 1', '933333334', '633333333', 'administrador1@tupesca.com', 'administrador1', '$2y$10$J9dXTjrQuT.oeoc1OEnziOUYOJCAkYmCjd.35EKPu5wCDVyu.Ldna', 'administrador'),
(4, '44444444Z', 'Comercial 3', 'Comercial 3', 'Direccion 4', '944444444', '644444444', 'comercial3@tupesca.com', 'comercial4', '$2y$10$zkRRwV8rGITeQ5oYkBwOXuPMjIuiEDfJeYMmmP1jH7AeZGsavaM0.', 'comercial'),
(5, '11111111A', 'Invitado 1', 'Invitado 1', 'Direccion 1', '911111111', '611111111', 'invitado1@tupesca.com', 'invitado1', '$2y$10$1Pt0YMm9Vl.JFugl4INw1OUH26QFMg1IrVVdkDv7gcqTTw17DzuES', 'invitado'),
(6, 'lkh', 'sdfdli', 'lk', 'lkl', 'lklk', 'lkjl', 'lkj@sdcfs', 'lkj', '$2y$10$3jvg8cVMZZIJQxYvSC66u.qrk3ir0F92sc.Nl/RrZ8VI5NHkr2eLa', 'comercial'),
(7, 'ssdf', 'saedf', 'sedf', 'sdf', 'sdf', 'sdf', 'sdfs@asd.com', 'sdf', '$2y$10$WVR7VpzIwvewktC1EFVLl.u7OpDKQ5eV2OfBrPRufgIP4UWnIeHiS', 'invitado'),
(8, '12345678', 'Roberto', 'García García', 'Pruebas', '555555555', '555555555', 'roberto.garcia@povuv.es', 'povuv', '$2y$10$iFYbZKrS/o5YHBscAzqOCexAwcjbnlh.ko8WBdSvH5SzR5vj9yt.a', 'administrador'),
(9, '55555555', 'Roberto', 'Garcia García', '55555555', '555555555', '555555555', 'rceronin@gmail.com', 'ronin', '$2y$10$BEBDcFmCuc7vR/YD12Z1fOBCFzNsMF9B09k.JgKgc7asav4xozg5.', 'comercial'),
(10, 'vvv', 'vvv', 'vvv', 'vvv', 'vvv', 'vvv', 'vvv@fff.com', 'vvv', '$2y$10$quEauEbMRnRzTZDKSb5D9e6jtQMFYioiG5GMMu6Q5wZRBlVDIbxi6', 'invitado');

-- --------------------------------------------------------

--
-- Table structure for table `detalle_pedidos`
--

CREATE TABLE `detalle_pedidos` (
  `id_detalle` int(11) NOT NULL,
  `kg_netos` decimal(2,0) NOT NULL,
  `observaciones` varchar(45) DEFAULT NULL,
  `PEDIDOS_id_pedido` int(11) NOT NULL,
  `ARTICULO_id_articulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `detalle_pedidos`
--

INSERT INTO `detalle_pedidos` (`id_detalle`, `kg_netos`, `observaciones`, `PEDIDOS_id_pedido`, `ARTICULO_id_articulo`) VALUES
(23, '1', 'Prueba 1', 1, 1),
(24, '2', 'Prueba 2', 2, 1),
(25, '30', 'Prueba 3', 3, 3),
(26, '10', 'Prueba 4', 4, 1),
(27, '30', 'Prueba 5', 5, 3),
(28, '10', 'Prueba 7', 6, 2),
(29, '10', 'Prueba 7.1', 6, 1),
(30, '80', 'Prueba 8', 7, 2),
(31, '10', 'Prueba 8.1', 7, 1),
(32, '30', 'Prueba 8.2', 7, 3),
(33, '20', 'Prueba 9.1', 8, 2),
(34, '10', 'Prueba 10', 9, 3),
(35, '5', 'En rodajas', 10, 2),
(36, '10', 'En lomos', 10, 3),
(37, '10', 'sdfcs', 11, 2),
(38, '10', '6516', 12, 2),
(39, '1', '', 12, 3),
(40, '20', '', 13, 1),
(41, '10', 'wdjfhek', 14, 2),
(42, '1', '', 15, 2),
(43, '10', 'kjhk', 16, 2),
(44, '10', 'muy fresco', 17, 2),
(45, '20', 'limpio y sin espinas', 17, 1),
(46, '50', 'FRESQUISIMO', 18, 2),
(47, '50', 'SDF', 19, 1),
(48, '10', 'SDF', 19, 2),
(49, '20', 'SDF', 19, 2),
(50, '10', '', 20, 2),
(51, '10', '', 20, 2),
(52, '20', '', 20, 2),
(53, '10', 'PRUEBA', 21, 1),
(54, '20', 'PRUEBA', 21, 2),
(55, '30', 'PRUEBA', 21, 3),
(57, '2', 'obse3rvcaciones del artículo de prueba', 22, 2),
(58, '1', 'más observaciones de prueba', 22, 1),
(59, '3', 'dfasdfasd', 23, 1),
(60, '3', 'ssssss', 24, 2),
(61, '3', 'ssssss', 25, 2),
(62, '3', 'ssssss', 26, 2),
(63, '2', 'sss', 27, 2),
(64, '6', 'ccc', 28, 2),
(65, '6', 'ccc', 29, 2),
(66, '6', 'ccc', 30, 2),
(67, '7', 'ccc', 31, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `fecha_pedido` datetime NOT NULL,
  `fecha_entrega` datetime NOT NULL,
  `cobrado` tinyint(1) NOT NULL DEFAULT '0',
  `CLIENTES_id_cliente` int(11) NOT NULL,
  `observaciones` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pedidos`
--

INSERT INTO `pedidos` (`id_pedido`, `fecha_pedido`, `fecha_entrega`, `cobrado`, `CLIENTES_id_cliente`, `observaciones`) VALUES
(1, '2019-03-10 18:55:43', '2019-03-11 00:00:00', 0, 1, 'Prueba 1'),
(2, '2019-03-10 18:56:36', '2019-03-11 00:00:00', 0, 1, 'Prueba 2'),
(3, '2019-03-14 17:53:38', '2019-03-15 00:00:00', 0, 1, 'Prueba 3'),
(4, '2019-03-14 17:55:16', '2019-04-13 00:00:00', 0, 1, 'Prueba 4'),
(5, '2019-03-14 17:56:10', '2019-03-23 00:00:00', 0, 1, 'Prueba 5'),
(6, '2019-03-14 17:56:44', '2019-03-22 00:00:00', 0, 1, 'Prueba 7'),
(7, '2019-03-14 17:57:47', '2019-03-24 00:00:00', 0, 1, 'Prueba 8'),
(8, '2019-03-14 17:58:30', '2019-03-31 00:00:00', 0, 1, 'Prueba 9'),
(9, '2019-03-14 17:59:05', '2019-03-27 00:00:00', 0, 1, 'Prueba 10'),
(10, '2019-04-07 17:52:28', '2019-04-08 00:00:00', 0, 1, 'Prueba nueva'),
(11, '2019-04-09 18:57:17', '2019-04-10 00:00:00', 0, 1, 'sdfgvasd'),
(12, '2019-04-09 19:33:15', '2019-04-18 00:00:00', 0, 2, 'Entregar pronto'),
(13, '2019-04-09 20:10:59', '2019-04-27 00:00:00', 0, 1, ''),
(14, '2019-04-25 19:26:43', '2019-04-27 00:00:00', 0, 1, 'kljhlkjh'),
(15, '2019-04-27 12:21:43', '2019-04-28 00:00:00', 0, 2, 'sfdfw'),
(16, '2019-04-27 12:21:59', '2019-04-30 00:00:00', 0, 1, ''),
(17, '2019-05-05 11:51:18', '2019-05-05 00:00:00', 0, 1, 'kmnjblkjb'),
(18, '2019-05-05 11:57:59', '2019-05-25 00:00:00', 0, 1, 'se ha grabado??'),
(19, '2019-05-05 11:58:39', '2019-05-24 00:00:00', 0, 3, 'Y ESTE???'),
(20, '2019-05-05 11:59:20', '2019-05-26 00:00:00', 0, 2, ''),
(21, '2019-05-05 12:02:00', '2019-05-31 00:00:00', 0, 1, 'PRUEBA'),
(22, '2019-05-09 11:11:58', '2019-05-09 00:00:00', 0, 1, 'Observaciones de prueba'),
(23, '2019-05-15 11:33:00', '2019-05-16 00:00:00', 0, 1, 'ddddf'),
(24, '2019-05-15 11:34:36', '2019-05-16 00:00:00', 0, 1, 'aaaa'),
(25, '2019-05-15 11:35:26', '2019-05-16 00:00:00', 0, 1, 'aaaa'),
(26, '2019-05-15 11:37:46', '2019-05-16 00:00:00', 0, 1, 'aaaa'),
(27, '2019-05-15 11:38:44', '2019-05-17 00:00:00', 0, 1, 'aaa'),
(28, '2019-05-15 11:41:43', '2019-05-19 00:00:00', 0, 3, 'xxx'),
(29, '2019-05-15 11:43:12', '2019-05-19 00:00:00', 0, 3, 'xxx'),
(30, '2019-05-15 11:43:50', '2019-05-19 00:00:00', 0, 3, 'xxx'),
(31, '2019-05-15 11:44:32', '2019-05-19 00:00:00', 0, 1, 'vvv');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_documentos`
--

CREATE TABLE `tbl_documentos` (
  `id_documento` int(11) NOT NULL,
  `titulo` text,
  `descripcion` text,
  `tamanio` int(11) DEFAULT NULL,
  `tipo` text,
  `nombre_archivo` text
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD UNIQUE KEY `idARTICULO_UNIQUE` (`id_articulo`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_cliente`),
  ADD UNIQUE KEY `id_cliente_UNIQUE` (`id_cliente`),
  ADD UNIQUE KEY `cif_cliente_UNIQUE` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_2` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_3` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_4` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_6` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_7` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_8` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_9` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_10` (`cif_cliente`),
  ADD UNIQUE KEY `cif_cliente_11` (`cif_cliente`),
  ADD KEY `fk_CLIENTES_COMERCIALES1_idx` (`COMERCIALES_id_comercial`),
  ADD KEY `cif_cliente_5` (`cif_cliente`);

--
-- Indexes for table `comerciales`
--
ALTER TABLE `comerciales`
  ADD PRIMARY KEY (`id_comercial`),
  ADD UNIQUE KEY `id_comercial_UNIQUE` (`id_comercial`),
  ADD UNIQUE KEY `dni_comercial_UNIQUE` (`dni_comercial`),
  ADD UNIQUE KEY `User_Name` (`User_Name`);

--
-- Indexes for table `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD PRIMARY KEY (`id_detalle`),
  ADD UNIQUE KEY `id_linea_UNIQUE` (`id_detalle`),
  ADD KEY `fk_LINEAS_PEDIDOS1_idx` (`PEDIDOS_id_pedido`),
  ADD KEY `fk_LINEAS_ARTICULO1_idx` (`ARTICULO_id_articulo`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD UNIQUE KEY `id_pedido_UNIQUE` (`id_pedido`),
  ADD KEY `fk_PEDIDOS_CLIENTES1_idx` (`CLIENTES_id_cliente`);

--
-- Indexes for table `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  ADD PRIMARY KEY (`id_documento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articulo`
--
ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `comerciales`
--
ALTER TABLE `comerciales`
  MODIFY `id_comercial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;
--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `tbl_documentos`
--
ALTER TABLE `tbl_documentos`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `fk_CLIENTES_COMERCIALES1` FOREIGN KEY (`COMERCIALES_id_comercial`) REFERENCES `comerciales` (`id_comercial`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `detalle_pedidos`
--
ALTER TABLE `detalle_pedidos`
  ADD CONSTRAINT `fk_LINEAS_ARTICULO1` FOREIGN KEY (`ARTICULO_id_articulo`) REFERENCES `articulo` (`id_articulo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_LINEAS_PEDIDOS1` FOREIGN KEY (`PEDIDOS_id_pedido`) REFERENCES `pedidos` (`id_pedido`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_PEDIDOS_CLIENTES1` FOREIGN KEY (`CLIENTES_id_cliente`) REFERENCES `clientes` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
