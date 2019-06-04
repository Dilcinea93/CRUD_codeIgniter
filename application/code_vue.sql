-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2019 at 05:04 PM
-- Server version: 5.7.24
-- PHP Version: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `code_vue`
--

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(1) NOT NULL,
  `fecha` date NOT NULL,
  `id_med` int(1) NOT NULL,
  `mg_med` float NOT NULL,
  `cantidad_pastillas` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id_compra`, `fecha`, `id_med`, `mg_med`, `cantidad_pastillas`) VALUES
(1, '2019-06-04', 1, 160, 10),
(2, '2019-06-04', 2, 80, 5),
(3, '2019-06-03', 3, 6.25, 8),
(4, '2019-06-03', 4, 10, 30);

-- --------------------------------------------------------

--
-- Table structure for table `control`
--

CREATE TABLE `control` (
  `fecha` date NOT NULL,
  `alta` int(5) NOT NULL,
  `baja` int(5) NOT NULL,
  `pulso` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `estados`
--

CREATE TABLE `estados` (
  `id_estado` tinyint(1) UNSIGNED NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `estados`
--

INSERT INTO `estados` (`id_estado`, `nombre`) VALUES
(1, 'Pendiente'),
(2, 'En proceso'),
(3, 'Finalizada'),
(4, 'Cancelada');

-- --------------------------------------------------------

--
-- Table structure for table `medicinas`
--

CREATE TABLE `medicinas` (
  `id_med` int(1) NOT NULL,
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medicinas`
--

INSERT INTO `medicinas` (`id_med`, `nombre`) VALUES
(1, 'valsartan'),
(2, 'aspirina'),
(3, 'carvedilol'),
(4, 'nifedipina'),
(5, 'omeprazol');

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `id_tarea` tinyint(1) UNSIGNED NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `id_estado` tinyint(1) UNSIGNED NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `fecha_modificacion` datetime NOT NULL,
  `fecha_baja` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`id_tarea`, `titulo`, `descripcion`, `id_estado`, `fecha_alta`, `fecha_modificacion`, `fecha_baja`) VALUES
(2, 'Lo unico que falta es modificar', ' funciodna', 1, '2019-05-31 09:20:41', '2019-05-31 09:20:41', '2019-05-31 09:00:50'),
(3, 'Lo unico que falta es modificar', ' funciodna', 1, '2019-05-31 09:20:41', '2019-05-31 09:20:41', '2019-05-27 10:31:21'),
(4, 'Lo unico que falta es modificar', ' funciodna', 1, '2019-05-31 09:20:41', '2019-05-31 09:20:41', '2019-05-27 10:31:23'),
(5, 'Lo unico que falta es modificar', ' funciodna', 1, '2019-05-31 09:20:41', '2019-05-31 09:20:41', '2019-05-31 08:50:23'),
(6, 'Tarea 1', ' ciodna', 1, '2019-05-31 09:23:04', '2019-05-31 09:23:04', NULL),
(7, 'Lo unico que falta es modificar', ' funciod', 3, '2019-05-31 09:23:11', '2019-05-31 09:23:11', '2019-05-31 09:23:21');

-- --------------------------------------------------------

--
-- Table structure for table `tratamiento`
--

CREATE TABLE `tratamiento` (
  `id_tratamiento` int(1) NOT NULL,
  `id_med` int(1) NOT NULL,
  `tratamiento_mg` float NOT NULL,
  `hora` time NOT NULL,
  `id_recetado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tratamiento`
--

INSERT INTO `tratamiento` (`id_tratamiento`, `id_med`, `tratamiento_mg`, `hora`, `id_recetado`) VALUES
(1, 1, 80, '08:00:00', 1),
(2, 2, 100, '01:00:00', 1),
(3, 3, 6.25, '09:00:00', 1),
(4, 4, 30, '04:00:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`);

--
-- Indexes for table `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indexes for table `medicinas`
--
ALTER TABLE `medicinas`
  ADD PRIMARY KEY (`id_med`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`id_tarea`),
  ADD KEY `id_estado` (`id_estado`);

--
-- Indexes for table `tratamiento`
--
ALTER TABLE `tratamiento`
  ADD PRIMARY KEY (`id_tratamiento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `medicinas`
--
ALTER TABLE `medicinas`
  MODIFY `id_med` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `id_tarea` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tratamiento`
--
ALTER TABLE `tratamiento`
  MODIFY `id_tratamiento` int(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tareas`
--
ALTER TABLE `tareas`
  ADD CONSTRAINT `tareas_ibfk_1` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id_estado`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
