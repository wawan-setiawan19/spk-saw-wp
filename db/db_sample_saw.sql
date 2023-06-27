-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2023 at 04:26 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sample_saw`
--

-- --------------------------------------------------------

--
-- Table structure for table `saw_alternatives`
--

CREATE TABLE `saw_alternatives` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_alternatives`
--

INSERT INTO `saw_alternatives` (`id_alternative`, `name`) VALUES
(13, 'Novi'),
(9, 'Rezky'),
(10, 'Diana'),
(11, 'Febrianto'),
(12, 'Ardian');

-- --------------------------------------------------------

--
-- Table structure for table `saw_criterias`
--

CREATE TABLE `saw_criterias` (
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `criteria` varchar(100) NOT NULL,
  `weight` float NOT NULL,
  `attribute` set('benefit','cost') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_criterias`
--

INSERT INTO `saw_criterias` (`id_criteria`, `criteria`, `weight`, `attribute`) VALUES
(1, 'Psikotes', 50, 'benefit'),
(2, 'Wawancara', 30, 'benefit'),
(3, 'Kesehatan', 20, 'cost');

-- --------------------------------------------------------

--
-- Table structure for table `saw_evaluations`
--

CREATE TABLE `saw_evaluations` (
  `id_alternative` smallint(5) UNSIGNED NOT NULL,
  `id_criteria` tinyint(3) UNSIGNED NOT NULL,
  `value` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_evaluations`
--

INSERT INTO `saw_evaluations` (`id_alternative`, `id_criteria`, `value`) VALUES
(1, 1, 8),
(1, 2, 2),
(1, 3, 7.5),
(1, 4, 36),
(1, 5, 5),
(2, 1, 7.5),
(2, 2, 1.5),
(2, 3, 7.5),
(2, 4, 43),
(2, 5, 8),
(3, 1, 7),
(3, 2, 3.5),
(3, 3, 6.5),
(3, 4, 43),
(3, 5, 10),
(4, 1, 7.5),
(4, 2, 0.5),
(4, 3, 8.5),
(4, 4, 30),
(4, 5, 10),
(5, 1, 8),
(5, 2, 6.5),
(5, 3, 8.5),
(5, 4, 37),
(5, 5, 8),
(6, 2, 2),
(6, 1, 6),
(6, 3, 9.5),
(6, 4, 18),
(6, 5, 1),
(7, 1, 8),
(7, 2, 6),
(7, 3, 9),
(7, 4, 35),
(7, 5, 9),
(9, 1, 3),
(9, 2, 1),
(9, 3, 4),
(10, 1, 2),
(10, 2, 3),
(10, 3, 1),
(11, 1, 4),
(11, 2, 1),
(11, 3, 3),
(12, 1, 1),
(12, 2, 4),
(12, 3, 2),
(13, 1, 2),
(13, 2, 3),
(13, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `saw_sub_criterias`
--

CREATE TABLE `saw_sub_criterias` (
  `id` int(11) NOT NULL,
  `sub_criteria` varchar(40) NOT NULL,
  `range_sub` varchar(10) NOT NULL,
  `value` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `saw_sub_criterias`
--

INSERT INTO `saw_sub_criterias` (`id`, `sub_criteria`, `range_sub`, `value`) VALUES
(1, 'Baik Sekali', '90-100', 5),
(3, 'Baik', '75-89', 4),
(4, 'Cukup', '50-74', 3),
(5, 'Rendah', '21-49', 2),
(6, 'Rendah Sekali', '0-20', 1);

-- --------------------------------------------------------

--
-- Table structure for table `saw_users`
--

CREATE TABLE `saw_users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `saw_users`
--

INSERT INTO `saw_users` (`id_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `saw_alternatives`
--
ALTER TABLE `saw_alternatives`
  ADD PRIMARY KEY (`id_alternative`);

--
-- Indexes for table `saw_criterias`
--
ALTER TABLE `saw_criterias`
  ADD PRIMARY KEY (`id_criteria`);

--
-- Indexes for table `saw_evaluations`
--
ALTER TABLE `saw_evaluations`
  ADD PRIMARY KEY (`id_alternative`,`id_criteria`);

--
-- Indexes for table `saw_sub_criterias`
--
ALTER TABLE `saw_sub_criterias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `saw_users`
--
ALTER TABLE `saw_users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `saw_alternatives`
--
ALTER TABLE `saw_alternatives`
  MODIFY `id_alternative` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `saw_sub_criterias`
--
ALTER TABLE `saw_sub_criterias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `saw_users`
--
ALTER TABLE `saw_users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
