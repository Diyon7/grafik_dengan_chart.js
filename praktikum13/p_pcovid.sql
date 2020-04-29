-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 29, 2020 at 04:29 AM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `p_pcovid`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `id` int(11) NOT NULL,
  `tcases` int(11) NOT NULL,
  `ncases` int(11) NOT NULL,
  `tdeaths` int(11) NOT NULL,
  `ndeaths` int(11) DEFAULT NULL,
  `trecovered` int(11) DEFAULT NULL,
  `acases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`id`, `tcases`, `ncases`, `tdeaths`, `ndeaths`, `trecovered`, `acases`) VALUES
(1, 1029878, 19522, 58640, 1843, 140138, 831100),
(2, 232128, 2706, 23822, 301, 123903, 84403),
(3, 201505, 2091, 27359, 382, 68941, 105205),
(4, 165911, 2638, 23660, 367, 46886, 95365),
(5, 161145, 3996, 21678, 586, 0, 139123),
(6, 159431, 673, 6215, 89, 117400, 35816),
(7, 114653, 2392, 2992, 92, 38809, 72852),
(8, 93558, 6411, 867, 73, 8456, 84235),
(9, 92584, 1112, 5877, 71, 72439, 14268),
(10, 82836, 6, 4633, 0, 77555, 648);

-- --------------------------------------------------------

--
-- Table structure for table `tb_negara`
--

CREATE TABLE `tb_negara` (
  `id` int(11) NOT NULL,
  `country` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_negara`
--

INSERT INTO `tb_negara` (`id`, `country`) VALUES
(1, 'USA'),
(2, 'Spain'),
(3, 'Italy'),
(4, 'France'),
(5, 'UK'),
(6, 'Germany'),
(7, 'Turkey'),
(8, 'Russia'),
(9, 'Iran'),
(10, 'China');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_negara`
--
ALTER TABLE `tb_negara`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cases`
--
ALTER TABLE `cases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_negara`
--
ALTER TABLE `tb_negara`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
