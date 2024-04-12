-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 12, 2024 at 07:15 AM
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
-- Table structure for table `annuaire`
--

CREATE TABLE `annuaire` (
  `id` int NOT NULL,
  `id_entreprise` int NOT NULL,
  `valeur_contact` text NOT NULL,
  `type` int NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `annuaire`
--

INSERT INTO `annuaire` (`id`, `id_entreprise`, `valeur_contact`, `type`, `date`) VALUES
(1, 2, '0999999999', 2, '2022-10-23'),
(2, 2, '0999999999', 2, '2022-10-23'),
(3, 2, '0999999999', 2, '2022-10-23'),
(4, 2, '0999999999', 2, '2022-10-23'),
(5, 2, '0999999999', 2, '2022-10-23'),
(6, 2, '0999999999', 2, '2022-10-23'),
(7, 2, '0999999999', 2, '2022-10-23'),
(8, 2, '0999999999', 2, '2022-10-23'),
(9, 2, '0999999999', 2, '2022-10-23'),
(10, 2, '0999999999', 2, '2022-10-23'),
(11, 2, '0999999999', 2, '2022-10-23'),
(12, 2, '0999999999', 2, '2022-10-23'),
(13, 2, '0999999999', 2, '2022-10-23'),
(14, 2, '0999999999', 2, '2022-10-23'),
(15, 2, '0999999999', 2, '2022-10-23'),
(16, 2, '0999999999', 2, '2022-10-23'),
(17, 2, '0999999999', 2, '2022-10-23'),
(18, 2, '0999999999', 2, '2022-10-23'),
(19, 2, '0999999999', 2, '2022-10-23');

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
(2, 123, 123, '2024-03-19', 'rzefgzerfefqz', 'fqzefqzefqzf', 1, '2024-04-08'),
(3, 123, 123, '2024-03-19', 'rzefgzerfefqz', 'fqzefqzefqzf', 2, '2024-03-21'),
(4, 1, 1, '2024-03-01', 'ezmofjhb', 'meijfbh', 2, '2024-03-19'),
(5, 1, 1, '2024-03-01', 'ezmofjhb', 'meijfbh', 2, '2024-04-08'),
(6, 5, 1, '2024-04-04', 'qcvsefvrevsefv', 'crqzevqrev', 1, NULL),
(7, 5, 1, '2024-04-04', 'qcvsefvrevsefv', 'crqzevqrev', 1, NULL),
(8, 5, 1, '2024-04-04', 'qcvsefvrevsefv', 'crqzevqrev', 1, NULL),
(9, 5, 1, '2024-04-04', 'ezdcqzec', 'rcqzerc', 1, NULL),
(10, 5, 1, '2024-04-04', 'qcvsefvrevsefv', 'crqzevqrev', 1, NULL),
(11, 5, 1, '2024-04-04', 'ezqcqzec', 'ezcqezrc', 1, NULL),
(12, 5, 1, '2024-04-04', 'patate', 'patate', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int NOT NULL,
  `id_utilisateur` int NOT NULL,
  `id_entreprise` int NOT NULL,
  `moyen_contact` int NOT NULL,
  `demande` text NOT NULL,
  `reponse` text NOT NULL,
  `date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `id_utilisateur`, `id_entreprise`, `moyen_contact`, `demande`, `reponse`, `date`) VALUES
(1, 1, 15, 2, 'probleme d\'imprimante', 'bonjour nous traiteront votre problème d\'ici quelques minutes ', '2024-03-01'),
(2, 1, 2, 1, 'Besoin d\'acceder aux factures', 'TG', '2018-03-16'),
(3, 7, 24, 3, 'Demande ajout avoirs', 'Un avoir à été ajouté sur le compte de l\'entreprise ayant l\'id associé aux contacts', '2016-10-13'),
(26, 1, 2, 3, 'ezcazeqca', 'zecezqcqez', '2024-04-09');

-- --------------------------------------------------------

--
-- Table structure for table `entreprise`
--

CREATE TABLE `entreprise` (
  `id` int NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `societe` text NOT NULL,
  `poste` text NOT NULL,
  `id_commercial` int NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `entreprise`
--

INSERT INTO `entreprise` (`id`, `nom`, `prenom`, `societe`, `poste`, `id_commercial`, `date`) VALUES
(2, 'Doe', 'John', 'ABC Inc.', 'Manager', 5, '2024-03-22'),
(3, 'Smith', 'Alice', 'XYZ Corp.', 'CEO', 8, '2024-03-22'),
(4, 'Johnson', 'Emily', '123 Industries', 'Developer', 6, '2024-03-22'),
(5, 'Brown', 'Michael', 'Tech Solutions', 'CTO', 6, '2024-03-22'),
(6, 'Wilson', 'Emma', 'café ', 'Marketing Specialist', 7, '2024-03-22'),
(7, 'Martinez', 'Olivia', 'Pomme de Terre Groupe', 'Data Scientist', 10, '2024-03-22'),
(8, 'Martinez', 'Olivia', 'Data Analytics Group', 'Data Scientist', 10, '2024-03-22'),
(9, 'Martinez', 'Olivia', 'Pomme de Terre Groupe', 'Data Scientist', 10, '2024-03-22'),
(10, 'Gonzalez', 'James', 'Future Tech', 'Researcher', 12, '2024-03-22'),
(11, 'Hernandez', 'Isabella', 'Innovative Solutions', 'Consultant', 13, '2024-03-22'),
(12, 'Doe', 'John', 'ABC Inc.', 'Manager', 3, '2024-03-22'),
(13, 'Smith', 'Alice', 'XYZ Corp.', 'CEO', 3, '2024-03-22'),
(14, 'Johnson', 'Emily', '123 Industries', 'Developer', 4, '2024-03-22'),
(15, 'Brown', 'Michael', 'Tech Solutions', 'CTO', 5, '2024-03-22'),
(16, 'Wilson', 'Emma', 'Global Innovations', 'Marketing Specialist', 6, '2024-03-22'),
(17, 'Garcia', 'Daniel', 'Software Co.', 'Project Manager', 7, '2024-03-22'),
(18, 'Martinez', 'Olivia', 'Data Analytics Group', 'Data Scientist', 8, '2024-03-22'),
(19, 'Lee', 'Sophia', 'Tech Innovators', 'Software Engineer', 9, '2024-03-22'),
(20, 'Gonzalez', 'James', 'Future Tech', 'Researcher', 10, '2024-03-22'),
(21, 'Hernandez', 'Isabella', 'Innovative Solutions', 'Consultant', 11, '2024-03-22'),
(22, 'Adams', 'William', 'Tech Enterprises', 'Analyst', 12, '2024-03-22'),
(23, 'Taylor', 'Ava', 'Digital Solutions', 'UI/UX Designer', 13, '2024-03-22'),
(24, 'Anderson', 'Ethan', 'Innovate Inc.', 'Product Manager', 14, '2024-03-22'),
(25, 'Thomas', 'Mia', 'Tech Innovations', 'Software Developer', 15, '2024-03-22'),
(26, 'Jackson', 'Harper', 'Data Experts', 'Data Analyst', 16, '2024-03-22'),
(27, 'White', 'Evelyn', 'Global Solutions', 'Business Analyst', 17, '2024-03-22'),
(28, 'Harris', 'Liam', 'Future Innovations', 'Research Scientist', 18, '2024-03-22'),
(29, 'King', 'Charlotte', 'Tech Innovate', 'QA Engineer', 19, '2024-03-22'),
(30, 'Green', 'Lucas', 'Innovation Hub', 'Tech Lead', 20, '2024-03-22'),
(31, 'Evans', 'Avery', 'NextGen Tech', 'System Architect', 21, '2024-03-22'),
(32, 'dehibv', 'hlkvb', 'hklbvhk', 'hjkvjhv', 12, '2024-03-25'),
(33, 'dehibv', 'hlkvb', 'hklbvhk', 'hjkvjhv', 12, '2024-03-25'),
(36, 'test', 'je veux tester ', '124', 'test', 12, '2024-03-13');

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

-- --------------------------------------------------------

--
-- Table structure for table `rappel_alerte`
--

CREATE TABLE `rappel_alerte` (
  `id` int NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `type` int NOT NULL,
  `id_expediteur` int NOT NULL,
  `id_destinataire` int NOT NULL,
  `sujet` text NOT NULL,
  `contenu` text NOT NULL,
  `statut` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `rappel_alerte`
--

INSERT INTO `rappel_alerte` (`id`, `date_debut`, `date_fin`, `type`, `id_expediteur`, `id_destinataire`, `sujet`, `contenu`, `statut`) VALUES
(15, '2024-04-07', '2024-04-16', 2, 4, 3, 'Rappel de réunion', 'Réunion annulée. Nouvelle date à venir.', 0),
(14, '2024-04-06', '2024-04-15', 1, 3, 4, 'Rappel de deadline', 'N\'oubliez pas que la date limite est dans une semaine.', 0),
(13, '2024-04-05', '2024-04-12', 2, 2, 1, 'Rappel d\'événement', 'Pensez à préparer les documents pour l\'événement à venir.', 0),
(12, '2024-04-04', '2024-04-10', 1, 1, 2, 'Rappel de réunion', 'N\'oubliez pas notre réunion prévue la semaine prochaine.', 0),
(16, '2024-04-08', '2024-04-20', 1, 1, 3, 'Rappel de projet', 'Veuillez préparer le rapport pour la réunion de revue.', 0),
(17, '2024-04-09', '2024-04-25', 2, 3, 2, 'Rappel de paiement', 'Votre facture est due dans deux semaines.', 0),
(18, '2024-04-10', '2024-04-28', 1, 2, 4, 'Rappel de rendez-vous', 'N\'oubliez pas votre rendez-vous chez le médecin la semaine prochaine.', 0),
(19, '2024-04-11', '2024-04-30', 2, 4, 1, 'Rappel de livraison', 'Votre colis sera livré demain.', 0),
(20, '2024-04-12', '2024-05-02', 1, 1, 3, 'Rappel de tâche', 'Veuillez terminer la tâche assignée avant la date limite.', 0),
(21, '2024-04-13', '2024-05-05', 2, 2, 4, 'Rappel de vacances', 'Profitez de vos vacances prévues la semaine prochaine.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id` int NOT NULL,
  `nom` text NOT NULL,
  `prenom` text NOT NULL,
  `identifiant` text NOT NULL,
  `mdp` text NOT NULL,
  `droit` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `nom`, `prenom`, `identifiant`, `mdp`, `droit`) VALUES
(1, 'Dupond', 'Bob', 'DB', '1', 1),
(2, 'Doe', 'John', 'johndoe', 'password', 2),
(3, 'Smith', 'Alice', 'asmith', 'password', 3),
(4, 'Johnson', 'Michael', 'mjohnson', 'password', 4),
(5, 'Brown', 'Emily', 'ebrown', 'password', 5),
(6, 'Williams', 'Daniel', 'dwilliams', 'password', 6),
(7, 'Jones', 'Jessica', 'jjones', 'password6', 1),
(8, 'Garcia', 'Christopher', 'cgarcia', 'password7', 1),
(9, 'Martinez', 'Sarah', 'smartinez', 'password8', 1),
(10, 'Lee', 'Matthew', 'mlee', 'password9', 1),
(11, 'Rodriguez', 'Ashley', 'arodriguez', 'password10', 1),
(12, 'Davis', 'David', 'ddavis', 'password11', 1),
(13, 'Miller', 'Jennifer', 'jmiller', 'password12', 1),
(14, 'Wilson', 'James', 'jwilson', 'password13', 1),
(15, 'Taylor', 'Mary', 'mtaylor', 'password14', 1),
(16, 'Anderson', 'Robert', 'randerson', 'password15', 1),
(17, 'Thomas', 'Linda', 'lthomas', 'password16', 1),
(18, 'Jackson', 'William', 'wjackson', 'password17', 1),
(19, 'White', 'Karen', 'kwhite', 'password18', 1),
(20, 'Harris', 'Michelle', 'mharris', 'password19', 1),
(21, 'Martin', 'Richard', 'rmartin', 'password20', 1),
(22, 'Lombard', 'Romain', 'romain1021', 'mdp', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `annuaire`
--
ALTER TABLE `annuaire`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assistance`
--
ALTER TABLE `assistance`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `entreprise`
--
ALTER TABLE `entreprise`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fichier`
--
ALTER TABLE `fichier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rappel_alerte`
--
ALTER TABLE `rappel_alerte`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `annuaire`
--
ALTER TABLE `annuaire`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `assistance`
--
ALTER TABLE `assistance`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `entreprise`
--
ALTER TABLE `entreprise`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `fichier`
--
ALTER TABLE `fichier`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `rappel_alerte`
--
ALTER TABLE `rappel_alerte`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
