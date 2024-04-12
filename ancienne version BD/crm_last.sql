-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mer. 03 avr. 2024 à 07:47
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
-- Structure de la table `annuaire`
--

DROP TABLE IF EXISTS `annuaire`;
CREATE TABLE IF NOT EXISTS `annuaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_entreprise` int(11) NOT NULL,
  `valeur_contact` text NOT NULL,
  `type` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `annuaire`
--

INSERT INTO `annuaire` (`id`, `id_entreprise`, `valeur_contact`, `type`, `date`) VALUES
(1, 1, 'jerome@gmail.com', 3, '2024-03-15'),
(2, 42, '0611111106', 2, '2015-03-12'),
(3, 3, '0342455612', 1, '2021-03-03'),
(4, 3, 'entreprise@mail.com', 3, '2034-01-26');

-- --------------------------------------------------------

--
-- Structure de la table `assistance`
--

DROP TABLE IF EXISTS `assistance`;
CREATE TABLE IF NOT EXISTS `assistance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_responsable` int(11) NOT NULL,
  `id_probleme` int(11) NOT NULL,
  `date` date NOT NULL,
  `sujet` text NOT NULL,
  `contenu` text NOT NULL,
  `statut` int(11) NOT NULL,
  `date_resolution` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `assistance`
--

INSERT INTO `assistance` (`id`, `id_responsable`, `id_probleme`, `date`, `sujet`, `contenu`, `statut`, `date_resolution`) VALUES
(2, 123, 123, '2024-03-19', 'rzefgzerfefqz', 'fqzefqzefqzf', 1, '2024-03-20'),
(3, 123, 123, '2024-03-19', 'rzefgzerfefqz', 'fqzefqzefqzf', 1, '2024-03-21'),
(4, 1, 1, '2024-03-01', 'ezmofjhb', 'meijfbh', 1, '2024-03-19'),
(5, 1, 1, '2024-03-01', 'ezmofjhb', 'meijfbh', 3, '2024-03-28'),
(11, 5, 7, '2024-03-28', 'coucocucoucouo', 'coucocucoucoucocu 111111', 1, NULL),
(6, 2, 1, '2024-03-22', 'coucou', 'test date', 1, NULL),
(7, 2, 1, '2024-03-22', 'noah probleme mdp', 'coucou je n\'arrive plus a me connecter a mon compte ', 1, NULL),
(12, 5, 2, '2024-03-28', 'pbm', 'pbm', 1, NULL),
(13, 5, 2, '2024-03-28', 'pbm', 'pbm', 2, NULL),
(14, 5, 2, '2024-03-28', 'pbm', 'pbm', 2, NULL),
(15, 5, 5, '2024-03-28', 'de mdp oui', 'oui de mot de passe oui', 1, NULL);

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `id_entreprise` int(11) NOT NULL,
  `moyen_contact` int(11) NOT NULL,
  `demande` text NOT NULL,
  `reponse` text NOT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `contact`
--

INSERT INTO `contact` (`id`, `id_utilisateur`, `id_entreprise`, `moyen_contact`, `demande`, `reponse`, `date`) VALUES
(1, 1, 15, 2, 'probleme d\'imprimante', 'bonjour nous traiteront votre problème d\'ici quelques minutes ', '2024-03-01'),
(2, 15, 2, 1, 'Besoin d\'acceder aux factures', 'Nous vous les envoyons par courriels', '2018-03-15'),
(14, 3, 1515, 1, 'probleme de test', 'Nous vous recontactons dÃ¨s que possible', '2024-03-26'),
(15, 2, 1623, 3, 'patate', 'test de patate', '2024-03-26'),
(4, 27, 2, 1, 'Probleme de chargeur d\'ordinateur portable', 'Chargeur envoyer par la poste', '2017-11-14'),
(5, 505, 2, 3, 'Ajout de contrat en plus', 'L\'ajout a ete effectuer', '2021-06-10'),
(6, 402, 15, 2, 'Serveur hors service probleme rack ventilateur eteint', 'Intervention realiser par l\'equipe de technicien informatique, le probleme est regler', '2024-03-21'),
(18, 1, 2, 1, 'pbm de panne', 'rappeler au 0613.4562426524', '2024-03-28'),
(17, 2, 5, 1, 'pbm impression', 'test test test impression', '2024-03-27'),
(16, 2, 5, 1, 'pbm', 'coucocuocucocucouco', '2024-03-26');

-- --------------------------------------------------------

--
-- Structure de la table `entreprise`
--

DROP TABLE IF EXISTS `entreprise`;
CREATE TABLE IF NOT EXISTS `entreprise` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `societe` text NOT NULL,
  `poste` text NOT NULL,
  `id_commercial` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `prenom`, `societe`, `poste`, `id_commercial`, `date`) VALUES
(1, 'Laplaze', 'Noah', 'La societe', 'Secretaire', 11, '2024-03-06'),
(2, 'John', 'Gaston', 'Informatique societe', 'dirigeant de la societe', 2, '2014-12-17'),
(3, 'Shigeno', 'Mathieu', 'ShigenoInformatique', 'Technicien informatique', 4, '2024-03-05'),
(4, 'Latour', 'Jerome', 'ShigenoInformatique', 'Technicien Informatique', 6, '2018-09-07'),
(5, 'Johnny', 'wi', 'WifiInformatique', 'dirigeant de la societe', 11, '2024-03-29'),
(6, 'Noah', 'LAPLAZE', 'souciete', 'generale', 11, '2024-03-29');

-- --------------------------------------------------------

--
-- Structure de la table `fichier`
--

DROP TABLE IF EXISTS `fichier`;
CREATE TABLE IF NOT EXISTS `fichier` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_utilisateur` int(11) NOT NULL,
  `nom` text NOT NULL,
  `date` date NOT NULL,
  `lien` text NOT NULL,
  `type` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `fichier`
--

INSERT INTO `fichier` (`id`, `id_utilisateur`, `nom`, `date`, `lien`, `type`) VALUES
(14, 1, 'AvoirTest', '2024-03-28', 'Document/Avoir.txt', 2),
(2, 5, 'Document12', '2024-03-30', 'http://exemple.com/document12.pdf', 2),
(3, 6, 'Document13', '2024-03-31', 'http://exemple.com/document13.pdf', 1),
(4, 7, 'Document14', '2024-04-01', 'http://exemple.com/document14.pdf', 3),
(5, 8, 'Document15', '2024-04-02', 'http://exemple.com/document15.pdf', 1),
(6, 9, 'Document16', '2024-04-03', 'http://exemple.com/document16.pdf', 2),
(7, 10, 'Document17', '2024-04-04', 'http://exemple.com/document17.pdf', 3),
(8, 11, 'Document18', '2024-04-05', 'http://exemple.com/document18.pdf', 1),
(13, 1, 'Avoir Patate', '2024-03-27', 'Document/patate.docx', 2),
(10, 13, 'Document20', '2024-04-07', 'http://exemple.com/document20.pdf', 3),
(11, 1, 'nonoFacture', '2024-03-27', 'Document/FactureNoah.pdf', 1),
(12, 1, 'Hello', '2024-03-27', '../Document/Hello.txt', 2);

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
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

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
(15, '2024-05-20', '2024-05-25', 2, 11, 3, 'Rappel Formation', 'La formation sur le nouveau logiciel est prévue pour le 25 mai à 10h.', 1);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

DROP TABLE IF EXISTS `utilisateur`;
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `identifiant` text NOT NULL,
  `mdp` text NOT NULL,
  `droit` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `identifiant`, `mdp`, `droit`) VALUES
(1, 'Laplaze', 'Noah', 'nono', 'LAPLAZE', 1),
(2, 'Laplaze', 'NOtest', 'nonoah', 'LAPLAPLAZE', 2),
(3, 'Latour', 'jerome', 'latourjerome', 'LAPLaze11///@', 3),
(4, 'Datte', 'Enzo', 'enzodatte', 'enzolerigolo', 4),
(5, 'Patate', 'Pomme', 'pommepatate', 'pommepatate111', 5),
(8, 'dabid', 'david', 'lasagne', 'lasagne132', 1),
(7, 'david', 'dupont', 'david', 'dupont111', 6),
(9, 'david', 'david', 'david', 'david132', 4);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
