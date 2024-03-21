-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 21 mars 2024 à 07:41
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `crm`
--

-- --------------------------------------------------------

--
-- Structure de la table `annuaire`
--

DROP TABLE IF EXISTS `annuaire`;
CREATE TABLE IF NOT EXISTS `annuaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entreprise` int(11) NOT NULL,
  `telephone` int(11) NOT NULL,
  `telephone2` int(11) NOT NULL,
  `email` text NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annuaire`
--

INSERT INTO `annuaire` (`id`, `id_entreprise`, `telephone`, `telephone2`, `email`, `date`) VALUES
(1, 123456789, 303030303, 0, '', '2024-03-20'),
(5, 1, 303030303, 606060606, 'test@test.test', '2024-03-20'),
(6, 123, 30303, 60606, 'blablabla', '2024-03-20'),
(7, 12, 3030303, 6060606, 'exemple@test.fr', '2024-03-21'),
(8, 12, 606060606, 303030303, 'exemple@test.fr', '2024-03-21');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
