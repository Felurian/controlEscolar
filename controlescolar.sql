-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2017 at 11:31 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `controlescolar`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumnos`
--

CREATE TABLE `alumnos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `numero_control` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `carrera_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `alumnos`
--

INSERT INTO `alumnos` (`id`, `nombre`, `numero_control`, `edad`, `sexo`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 'Osmar Garcia', 13170260, 22, 1, 1, '2017-06-25 01:00:32', '2017-06-25 01:00:42'),
(4, 'oeuo', 123, 22, 0, 1, '2017-06-25 15:13:13', '2017-06-25 15:13:13'),
(5, ',.pu,.', 123, 222, 0, 1, '2017-06-25 15:13:19', '2017-06-25 15:13:19'),
(6, 'd.pd.pd.pd', 23123, 55, 0, 1, '2017-06-25 15:13:27', '2017-06-25 15:13:27');

-- --------------------------------------------------------

--
-- Table structure for table `carreras`
--

CREATE TABLE `carreras` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carreras`
--

INSERT INTO `carreras` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Ing. Sistemas', '2017-06-24 18:59:21', '2017-06-24 18:59:21');

-- --------------------------------------------------------

--
-- Table structure for table `grupos`
--

CREATE TABLE `grupos` (
  `id` int(11) NOT NULL,
  `materia_id` int(11) NOT NULL,
  `maestro_id` int(11) NOT NULL,
  `hora` tinyint(4) NOT NULL,
  `salon` varchar(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupos`
--

INSERT INTO `grupos` (`id`, `materia_id`, `maestro_id`, `hora`, `salon`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 21, 'oaeuaou', '2017-06-25 10:00:06', '2017-06-25 10:00:06'),
(3, 2, 1, 12, '12', '2017-06-25 15:13:47', '2017-06-25 15:13:47'),
(4, 3, 1, 22, '2', '2017-06-25 15:14:04', '2017-06-25 15:14:04');

-- --------------------------------------------------------

--
-- Table structure for table `grupos_detalle`
--

CREATE TABLE `grupos_detalle` (
  `grupo_id` int(11) NOT NULL,
  `alumno_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grupos_detalle`
--

INSERT INTO `grupos_detalle` (`grupo_id`, `alumno_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2017-06-25 10:16:33', '2017-06-25 10:16:33'),
(1, 6, '2017-06-25 15:30:24', '2017-06-25 15:30:24'),
(4, 1, '2017-06-25 15:29:11', '2017-06-25 15:29:11'),
(4, 4, '2017-06-25 15:29:19', '2017-06-25 15:29:19'),
(4, 5, '2017-06-25 15:29:14', '2017-06-25 15:29:14'),
(4, 6, '2017-06-25 15:29:16', '2017-06-25 15:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `maestros`
--

CREATE TABLE `maestros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `rfc` varchar(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `maestros`
--

INSERT INTO `maestros` (`id`, `nombre`, `rfc`, `edad`, `sexo`, `created_at`, `updated_at`) VALUES
(1, 'aoeuao', 'euaoeu', 3, 0, '2017-06-25 09:59:41', '2017-06-25 09:59:41');

-- --------------------------------------------------------

--
-- Table structure for table `materias`
--

CREATE TABLE `materias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `materias`
--

INSERT INTO `materias` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'oeuaoeu', '2017-06-25 07:32:39', '2017-06-25 07:32:39'),
(2, 'euaoeu', '2017-06-25 09:59:54', '2017-06-25 09:59:54'),
(3, 'aaaaaaaaaaaaaaaaaaa', '2017-06-25 15:13:56', '2017-06-25 15:13:56');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carrera_id` (`carrera_id`);

--
-- Indexes for table `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `materia` (`materia_id`),
  ADD KEY `maestro` (`maestro_id`);

--
-- Indexes for table `grupos_detalle`
--
ALTER TABLE `grupos_detalle`
  ADD PRIMARY KEY (`grupo_id`,`alumno_id`),
  ADD KEY `grupo_id` (`grupo_id`),
  ADD KEY `grupos_detalle_ibfk_2` (`alumno_id`);

--
-- Indexes for table `maestros`
--
ALTER TABLE `maestros`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `maestros`
--
ALTER TABLE `maestros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `materias`
--
ALTER TABLE `materias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_ibfk_1` FOREIGN KEY (`maestro_id`) REFERENCES `maestros` (`id`),
  ADD CONSTRAINT `grupos_ibfk_2` FOREIGN KEY (`materia_id`) REFERENCES `materias` (`id`);

--
-- Constraints for table `grupos_detalle`
--
ALTER TABLE `grupos_detalle`
  ADD CONSTRAINT `grupos_detalle_ibfk_1` FOREIGN KEY (`grupo_id`) REFERENCES `grupos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `grupos_detalle_ibfk_2` FOREIGN KEY (`alumno_id`) REFERENCES `alumnos` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
