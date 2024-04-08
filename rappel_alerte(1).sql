-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : lun. 08 avr. 2024 à 13:50
-- Version du serveur : 5.7.36
-- Version de PHP : 8.2.12

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
-- Structure de la table `rappel_alerte`
--

DROP TABLE IF EXISTS `rappel_alerte`;
CREATE TABLE IF NOT EXISTS `rappel_alerte` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `type` int(11) NOT NULL,
  `id_expediteur` int(11) NOT NULL,
  `id_destinataire` int(11) NOT NULL,
  `sujet` text NOT NULL,
  `contenu` text NOT NULL,
  `statut` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `rappel_alerte`
--

INSERT INTO `rappel_alerte` (`id`, `date_debut`, `date_fin`, `type`, `id_expediteur`, `id_destinataire`, `sujet`, `contenu`, `statut`) VALUES
(1, '2024-03-04', '2024-03-23', 2, 11, 14, 'Rappel MR Latour', 'Bonjour n oublie pas de rappeler mr Latour qui a un probleme avec son imprimante', 1),
(2, '2023-07-05', '2024-10-10', 1, 505, 505, 'Rappeler Mr Jacob', 'Rappeler Mr Jacob pour son probleme d ordinateur portable a 10h30', 2),
(3, '2024-02-07', '2024-03-07', 1, 14, 14, 'Rappel Changement ordinateur ', 'Le service informatique va venir changer ton ordinateur le 07 Mars a 14h30', 1),
(5, '2024-03-25', '2024-03-29', 1, 3, 3, 'Rappeler Mr Patate', 'Rappeler Mr Patate pour son pbm d\'ordinateur Le 30/01/2023', 1),
(6, '2024-03-25', '2024-03-29', 1, 3, 3, 'test', 'j\'aime les frties', 1),
(7, '2024-04-10', '2024-04-12', 1, 14, 14, 'Rappel Réunion', 'Réunion importante le 12 avril à 9h. Soyez présent.', 1),
(8, '2024-04-15', '2024-04-20', 2, 505, 14, 'Rappel Maintenance', 'Maintenance prévue le 20 avril à partir de 10h.', 1),
(9, '2024-05-01', '2024-05-05', 1, 11, 11, 'Rappel Congés', 'N oubliez pas de soumettre vos demandes de congés pour le mois prochain.', 2),
(10, '2024-06-05', '2024-06-10', 2, 14, 505, 'Rappel Maintenance Serveurs', 'La maintenance des serveurs est planifiée pour le 10 juin.', 1),
(11, '2024-07-01', '2024-07-05', 2, 505, 14, 'Rappel Mise à Jour Logicielle', 'Une mise à jour logicielle est prévue pour le 5 juillet.', 1),
(12, '2024-07-15', '2024-07-20', 2, 3, 11, 'Rappel Livraison', 'La livraison des nouveaux équipements est prévue pour le 20 juillet.', 1),
(13, '2024-04-25', '2024-04-28', 2, 3, 505, 'Rappel Approvisionnement', 'N oubliez pas de passer une commande pour les fournitures de bureau.', 1),
(14, '2024-05-10', '2024-05-15', 2, 505, 11, 'Rappel Maintenance Réseau', 'La maintenance du réseau est prévue pour le 15 mai à partir de 22h.', 1),
(15, '2024-05-20', '2024-05-25', 2, 11, 3, 'Rappel Formation', 'La formation sur le nouveau logiciel est prévue pour le 25 mai à 10h.', 1),
(16, '2024-04-03', '2024-04-25', 1, 1, 1, 'Rappel test', 'Coucou mon gars', 1),
(17, '2024-04-03', '2024-04-21', 1, 8, 8, 'Rappel lasagne test', 'bonjour rappel le test stp', 1),
(18, '2024-04-05', '2024-04-19', 1, 1, 1, 'test noah envoie rappel', 'hello le test', 1),
(19, '2024-04-05', '2024-04-26', 1, 1, 4, 'Alerte datte test', 'coucou c\'est un test', 1),
(20, '2024-04-05', '2024-04-27', 1, 1, 1, 'Rappel testetsstestsstssstsst', 'testestssstssstssssstsstsss984537846537946579865', 1),
(21, '2024-04-05', '2024-05-03', 1, 1, 5, 'appel patataeepzejdodjjezpoj', 'aszdazixwpazjxpoazuezeaz978645-7798645-97865', 1),
(22, '2024-04-05', '2024-04-26', 1, 1, 1, 'coucoumongars', 'rappel pour test ', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
