-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 27, 2024 at 09:30 AM
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
-- Table structure for table `fichier`
--

CREATE TABLE `fichier` (
  `id` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `nom` text NOT NULL,
  `date` date NOT NULL,
  `lien` text NOT NULL,
  `type` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `fichier`
--

INSERT INTO `fichier` (`id`, `id_utilisateur`, `nom`, `date`, `lien`, `type`) VALUES
(1, 4, 'Document11', '2024-03-29', 'http://exemple.com/document11.pdf', 1),
(2, 5, 'Document12', '2024-03-30', 'http://exemple.com/document12.pdf', 2),
(3, 6, 'Document13', '2024-03-31', 'http://exemple.com/document13.pdf', 1),
(4, 7, 'Document14', '2024-04-01', 'http://exemple.com/document14.pdf', 3),
(5, 8, 'Document15', '2024-04-02', 'http://exemple.com/document15.pdf', 1),
(6, 9, 'Document16', '2024-04-03', 'http://exemple.com/document16.pdf', 2),
(7, 10, 'Document17', '2024-04-04', 'http://exemple.com/document17.pdf', 3),
(8, 11, 'Document18', '2024-04-05', 'http://exemple.com/document18.pdf', 1),
(9, 12, 'Document19', '2024-04-06', 'http://exemple.com/document19.pdf', 2),
(10, 13, 'Document20', '2024-04-07', 'http://exemple.com/document20.pdf', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
