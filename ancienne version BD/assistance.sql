-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 21, 2024 at 07:29 AM
-- Server version: 8.3.0
-- PHP Version: 8.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crm`
--

-- --------------------------------------------------------

--
-- Table structure for table `assistance`
--

CREATE TABLE `assistance` (
  `id` int NOT NULL,
  `id_responsable` int NOT NULL,
  `id_probleme` int NOT NULL,
  `date` date NOT NULL,
  `sujet` text NOT NULL,
  `contenu` text NOT NULL,
  `statut` int NOT NULL,
  `date_resolution` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `assistance`
--

INSERT INTO `assistance` (`id`, `id_responsable`, `id_probleme`, `date`, `sujet`, `contenu`, `statut`, `date_resolution`) VALUES
(2, 123, 123, '2024-03-19', 'rzefgzerfefqz', 'fqzefqzefqzf', 1, '2024-03-20'),
(3, 123, 123, '2024-03-19', 'rzefgzerfefqz', 'fqzefqzefqzf', 1, '2024-03-21'),
(4, 1, 1, '2024-03-01', 'ezmofjhb', 'meijfbh', 1, '2024-03-19'),
(5, 1, 1, '2024-03-01', 'ezmofjhb', 'meijfbh', 1, '2024-03-19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assistance`
--
ALTER TABLE `assistance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
