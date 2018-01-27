-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jan 27, 2018 at 02:29 PM
-- Server version: 10.0.28-MariaDB-0ubuntu0.16.04.1
-- PHP Version: 5.6.29-1+deb.sury.org~xenial+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `matrite`
--

-- --------------------------------------------------------

--
-- Table structure for table `components`
--

CREATE TABLE `components` (
  `id` int(11) NOT NULL,
  `mold_id` int(11) NOT NULL,
  `name` varchar(155) NOT NULL,
  `tc` varchar(155) NOT NULL,
  `buc` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `components`
--

INSERT INTO `components` (`id`, `mold_id`, `name`, `tc`, `buc`) VALUES
(2, 12, 'Rez', '23x', 1),
(3, 12, 'Fa', '33s', 4);

-- --------------------------------------------------------

--
-- Table structure for table `materials`
--

CREATE TABLE `materials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `factor` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `materials`
--

INSERT INTO `materials` (`id`, `name`, `factor`) VALUES
(1, 'PP', '1.00'),
(3, 'PP GF', '1.25'),
(6, 'PES', '1.85'),
(7, 'PPS', '1.80'),
(8, 'PVDF', '2.00'),
(9, 'FEP', '2.40'),
(10, 'PFA', '2.40'),
(11, 'E-CTFE', '1.97'),
(12, 'E-TFE', '2.20'),
(13, 'NDPE', '1.10');

-- --------------------------------------------------------

--
-- Table structure for table `molds`
--

CREATE TABLE `molds` (
  `id` int(11) NOT NULL,
  `denumire_reper` varchar(128) NOT NULL,
  `material` int(11) NOT NULL,
  `file` varchar(500) NOT NULL,
  `file_type` varchar(100) NOT NULL,
  `cod_reper` varchar(255) DEFAULT NULL,
  `cantitate` int(11) DEFAULT NULL,
  `cod_matrita` varchar(128) DEFAULT NULL,
  `ciclu_inj` int(11) DEFAULT NULL,
  `nr_cuiburi` int(11) DEFAULT NULL,
  `greutate_culee` decimal(10,2) DEFAULT NULL,
  `greutate_fara_cule` decimal(10,2) DEFAULT NULL,
  `dimensiuni_reper` varchar(50) DEFAULT NULL,
  `dim_matrita_h` int(11) DEFAULT NULL,
  `numar_rezistente` int(11) DEFAULT NULL,
  `dim_matrita_lat` int(11) DEFAULT NULL,
  `diametru_inel_centrare` decimal(10,2) DEFAULT NULL,
  `dim_matrita_lung` int(11) DEFAULT NULL,
  `observatii` text,
  `pregatire_matrita` text,
  `demontare_matrita_masina` text,
  `cuib1` int(11) DEFAULT NULL,
  `legaturi_rezistente_a1` int(11) DEFAULT NULL,
  `legaturi_rezistente_b1` int(11) DEFAULT NULL,
  `legaturi_sonde_a1` int(11) DEFAULT NULL,
  `legaturi_sonde_b1` int(11) DEFAULT NULL,
  `cuib2` int(11) DEFAULT NULL,
  `legaturi_rezistente_a2` int(11) DEFAULT NULL,
  `legaturi_rezistente_b2` int(11) DEFAULT NULL,
  `legaturi_sonde_a2` int(11) DEFAULT NULL,
  `legaturi_sonde_b2` int(11) DEFAULT NULL,
  `cuib3` int(11) DEFAULT NULL,
  `legaturi_rezistente_a3` int(11) DEFAULT NULL,
  `legaturi_rezistente_b3` int(11) DEFAULT NULL,
  `legaturi_sonde_a3` int(11) DEFAULT NULL,
  `legaturi_sonde_b3` int(11) DEFAULT NULL,
  `cuib4` int(11) DEFAULT NULL,
  `legaturi_rezistente_a4` int(11) DEFAULT NULL,
  `legaturi_rezistente_b4` int(11) DEFAULT NULL,
  `legaturi_sonde_a4` int(11) DEFAULT NULL,
  `legaturi_sonde_b4` int(11) DEFAULT NULL,
  `cuib5` int(11) DEFAULT NULL,
  `legaturi_rezistente_a5` int(11) DEFAULT NULL,
  `legaturi_rezistente_b5` int(11) DEFAULT NULL,
  `legaturi_sonde_a5` int(11) DEFAULT NULL,
  `legaturi_sonde_b5` int(11) DEFAULT NULL,
  `cuib6` int(11) DEFAULT NULL,
  `legaturi_rezistente_a6` int(11) DEFAULT NULL,
  `legaturi_rezistente_b6` int(11) DEFAULT NULL,
  `legaturi_sonde_a6` int(11) DEFAULT NULL,
  `legaturi_sonde_b6` int(11) DEFAULT NULL,
  `cuib7` int(11) DEFAULT NULL,
  `legaturi_rezistente_a7` int(11) DEFAULT NULL,
  `legaturi_rezistente_b7` int(11) DEFAULT NULL,
  `legaturi_sonde_a7` int(11) DEFAULT NULL,
  `legaturi_sonde_b7` int(11) DEFAULT NULL,
  `cuib8` int(11) DEFAULT NULL,
  `legaturi_rezistente_a8` int(11) DEFAULT NULL,
  `legaturi_rezistente_b8` int(11) DEFAULT NULL,
  `legaturi_sonde_a8` int(11) DEFAULT NULL,
  `legaturi_sonde_b8` int(11) DEFAULT NULL,
  `cuib9` int(11) DEFAULT NULL,
  `legaturi_rezistente_a9` int(11) DEFAULT NULL,
  `legaturi_rezistente_b9` int(11) DEFAULT NULL,
  `legaturi_sonde_a9` int(11) DEFAULT NULL,
  `legaturi_sonde_b9` int(11) DEFAULT NULL,
  `cuib10` int(11) DEFAULT NULL,
  `legaturi_rezistente_a10` int(11) DEFAULT NULL,
  `legaturi_rezistente_b10` int(11) DEFAULT NULL,
  `legaturi_sonde_a10` int(11) DEFAULT NULL,
  `legaturi_sonde_b10` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `molds`
--

INSERT INTO `molds` (`id`, `denumire_reper`, `material`, `file`, `file_type`, `cod_reper`, `cantitate`, `cod_matrita`, `ciclu_inj`, `nr_cuiburi`, `greutate_culee`, `greutate_fara_cule`, `dimensiuni_reper`, `dim_matrita_h`, `numar_rezistente`, `dim_matrita_lat`, `diametru_inel_centrare`, `dim_matrita_lung`, `observatii`, `pregatire_matrita`, `demontare_matrita_masina`, `cuib1`, `legaturi_rezistente_a1`, `legaturi_rezistente_b1`, `legaturi_sonde_a1`, `legaturi_sonde_b1`, `cuib2`, `legaturi_rezistente_a2`, `legaturi_rezistente_b2`, `legaturi_sonde_a2`, `legaturi_sonde_b2`, `cuib3`, `legaturi_rezistente_a3`, `legaturi_rezistente_b3`, `legaturi_sonde_a3`, `legaturi_sonde_b3`, `cuib4`, `legaturi_rezistente_a4`, `legaturi_rezistente_b4`, `legaturi_sonde_a4`, `legaturi_sonde_b4`, `cuib5`, `legaturi_rezistente_a5`, `legaturi_rezistente_b5`, `legaturi_sonde_a5`, `legaturi_sonde_b5`, `cuib6`, `legaturi_rezistente_a6`, `legaturi_rezistente_b6`, `legaturi_sonde_a6`, `legaturi_sonde_b6`, `cuib7`, `legaturi_rezistente_a7`, `legaturi_rezistente_b7`, `legaturi_sonde_a7`, `legaturi_sonde_b7`, `cuib8`, `legaturi_rezistente_a8`, `legaturi_rezistente_b8`, `legaturi_sonde_a8`, `legaturi_sonde_b8`, `cuib9`, `legaturi_rezistente_a9`, `legaturi_rezistente_b9`, `legaturi_sonde_a9`, `legaturi_sonde_b9`, `cuib10`, `legaturi_rezistente_a10`, `legaturi_rezistente_b10`, `legaturi_sonde_a10`, `legaturi_sonde_b10`) VALUES
(1, 'PALL RING 15', 1, '', '', '', 240000, '', 9, 8, '0.00', '0.46', '15.00', 350, 5, 160, '110.00', 0, '', NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'PALL RING 25', 1, '', '', 'Demag 50', 54600, '', 10, 8, '0.00', '1.37', '15.00', 350, 0, 160, '75.00', 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'Denumier reper', 1, '', '', 'Demag 50', 540000, 'Cod matrita', 8, 4, '0.00', '0.00', '15x15', 350, 12, 160, '0.00', 333, 'ObservatiiObservatiiObservatii', 'ungere coloane|modif. poanson data|modif. poanson material|verificat duza calda|verificat functionare bacuri', 'verificat ultima injectie|verificat pozitie bacuri|suflat aer comprimat|conservat matrit', 1, 1, 1, 1, 1, 2, 2, 2, 2, 2, 3, 3, 3, 3, 3, 4, 4, 4, 4, 4, 5, 5, 5, 5, 5, 6, 6, 6, 6, 6, 7, 7, 7, 7, 7, 8, 8, 8, 8, 8, 9, 9, 9, 9, 9, 10, 10, 10, 10, 10),
(9, 'Test', 3, '', '', 'Demag 50', 67000, 'UAu378', 5, 3, '156.76', '234.30', '300x500', 300, 7, 200, '110.00', 60, 'asdsa dasd asdas dasd asd', 'ungere coloane|modif. poanson data|modif. poanson material|verificat duza calda|verificat functionar', 'verificat ultima injectie|verificat pozitie bacuri|suflat aer comprimat|conservat matrit', 1, 0, 0, 0, 0, 0, 2, 0, 0, 0, 0, 0, 3, 0, 0, 0, 0, 0, 4, 0, 0, 0, 0, 0, 5, 0, 0, 0, 6, 0, 0, 0, 7, 0, 0, 0, 8, 0, 0, 0, 9, 0, 0, 0, 0, 0, 10, 0, 0, 0),
(12, 'Asadasd', 1, '', '', 'Demag 50', 5356233, 'SSDF223', 0, 1, '23.00', '123.00', '123', 123, 123, 123, '123.00', 123, 'asdas asd asdsa ', 'ungere coloane|modif. poanson data|verificat pozitie bacuri', 'verificat ultima injectie|suflat aer comprimat', 2343, 2123, 123, 0, 0, 233, 1231, 123, 2231, 0, 0, 0, 123123, 0, 12313, 123, 123, 0, 0, 0, 3, 123, 123213, 2, 0, 123, 0, 12, 0, 55, 12, 13, 0, 0, 566723, 132, 0, 12312, 0, 0, 0, 123, 12, 0, 0, 0, 0, 0, 0, 132),
(13, 'AAA', 1, 'uploads/13.jpg', 'image', '', 0, '', 0, 0, '0.00', '0.00', '', 0, 0, 0, '0.00', 0, '', NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(14, 'sd', 1, '', '', '', 36000, '', 0, 0, '0.00', '0.00', '', 0, 0, 0, '0.00', 0, '', NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(15, 'sd', 1, 'uploads/15.pdf', 'document', '', 36000, '', 0, 0, '0.00', '0.00', '', 0, 0, 0, '0.00', 0, '', NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(16, 'asd', 1, '', '', '', 2323, '', 0, 0, '0.00', '0.00', '', 0, 0, 0, '0.00', 0, '', NULL, NULL, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(254) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `password`, `email`) VALUES
(1, '21232f297a57a5a743894a0e4a801fc3', 'szilagyi_an@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `components`
--
ALTER TABLE `components`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `materials`
--
ALTER TABLE `materials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `molds`
--
ALTER TABLE `molds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `components`
--
ALTER TABLE `components`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=222;
--
-- AUTO_INCREMENT for table `materials`
--
ALTER TABLE `materials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `molds`
--
ALTER TABLE `molds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
