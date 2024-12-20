-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : jeu. 19 déc. 2024 à 19:27
-- Version du serveur : 8.0.27
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_train`
--

-- --------------------------------------------------------

--
-- Structure de la table `administrateur`
--

DROP TABLE IF EXISTS `administrateur`;
CREATE TABLE IF NOT EXISTS `administrateur` (
  `admin_id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `Telephone` int NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `administrateur`
--

INSERT INTO `administrateur` (`admin_id`, `nom`, `prenom`, `Telephone`, `email`, `mdp`) VALUES
(10, 'wouma', 'houss', 77654533, 'dioro@gmail.com', 'lolo');

-- --------------------------------------------------------

--
-- Structure de la table `gares`
--

DROP TABLE IF EXISTS `gares`;
CREATE TABLE IF NOT EXISTS `gares` (
  `gare_id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `ville` varchar(100) NOT NULL,
  PRIMARY KEY (`gare_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `gares`
--

INSERT INTO `gares` (`gare_id`, `nom`, `ville`) VALUES
(2, 'holhol', 'DJIB'),
(1, 'nagad', 'djibouti'),
(3, 'diri_dawa free trade zone', 'diri_dawa'),
(4, 'Toronto', 'Canada');

-- --------------------------------------------------------

--
-- Structure de la table `horaires`
--

DROP TABLE IF EXISTS `horaires`;
CREATE TABLE IF NOT EXISTS `horaires` (
  `horaire_id` int NOT NULL,
  `train_id` int DEFAULT NULL,
  `gare_id` int DEFAULT NULL,
  `H_arrivee` datetime NOT NULL,
  `H_depart` datetime NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`horaire_id`),
  KEY `train_id` (`train_id`),
  KEY `gare_id` (`gare_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `horaires`
--

INSERT INTO `horaires` (`horaire_id`, `train_id`, `gare_id`, `H_arrivee`, `H_depart`, `date`) VALUES
(1, 1, 2, '2024-12-04 05:12:54', '2024-12-10 11:12:54', '2024-12-20'),
(2, 2, 4, '2024-12-02 13:12:54', '2024-12-18 16:24:54', '2024-12-03'),
(3, 3, 3, '2024-12-07 16:06:47', '2024-12-18 08:06:17', '2024-12-23'),
(5, 4, 1, '2024-12-27 17:18:00', '2024-12-21 17:18:00', '2024-12-08');

-- --------------------------------------------------------

--
-- Structure de la table `paiements`
--

DROP TABLE IF EXISTS `paiements`;
CREATE TABLE IF NOT EXISTS `paiements` (
  `paiement_id` int NOT NULL,
  `reservation_id` int DEFAULT NULL,
  `montant` varchar(20) NOT NULL,
  `date_paiement` datetime NOT NULL,
  `méthode_paiement` varchar(50) DEFAULT NULL,
  `statut` varchar(20) NOT NULL,
  PRIMARY KEY (`paiement_id`),
  KEY `reservation_id` (`reservation_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `passagers`
--

DROP TABLE IF EXISTS `passagers`;
CREATE TABLE IF NOT EXISTS `passagers` (
  `passager_id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prénom` varchar(100) NOT NULL,
  `téléphone` varchar(20) DEFAULT NULL,
  `Email` varchar(20) NOT NULL,
  `mdp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`passager_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `passagers`
--

INSERT INTO `passagers` (`passager_id`, `nom`, `prénom`, `téléphone`, `Email`, `mdp`) VALUES
(0, 'medka', 'ibrahim', '77658436', 'TASLA@gmail.com', '1111'),
(12, 'zeeeno', 'theoooo', '7756654', 'zeno12@gmail.com', 'koko'),
(102, 'medkaLL', 'ibrahimJ', '77658430', 'TASLO@gmail.com', '2222'),
(299, 'TAS', 'HOU', '77509236', 'TAS@gmail.com', '2000'),
(11, 'nagad', 'meraneh', '77519456', 'mohamedibrahimkader8', '1111'),
(400, 'balthazard', 'qabyo', '77519456', 'balthazard@gmail.com', '4444'),
(89, 'souba', 'hous', '7756654', 'souba@gmail.com', 'siso'),
(80, 'abou', 'ar', '77514902', 'abou@gmail.com', 'lala'),
(60, 'tas', 'hous', '77478932', 'TAS@gmail.com', 'fafa'),
(190, 'soubah', 'houss', '77173068', 'souba@gmail.com', 'rara'),
(76, 'irro', 'med', '77398097', 'irro@gmail.com', 'irro'),
(10, 'aska', 'papa', '77154422', 'aska@gmmail.com', 'hooyo'),
(180, 'MOUSSA', 'bouh', '77754147', 'mouss@gmail.com', '1234'),
(100, 'med', 'ibro', '77519456', 'mohamedibr05@gmail.c', 'medka'),
(170, 'Yahya', 'Galib', '77888888', 'mohamedibr05@gmail.c', 'yahya'),
(230, 'Yahya', 'Galib', '77888888', 'mohamedibr05@gmail.c', '5555'),
(40, 'chadia', 'said', '77112233', 'chadia@gmail.com', 'said');

-- --------------------------------------------------------

--
-- Structure de la table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `reservation_id` int NOT NULL AUTO_INCREMENT,
  `passager_id` int NOT NULL,
  `train_id` int NOT NULL,
  `num_place` varchar(20) NOT NULL,
  `date_de_reservation` date NOT NULL,
  PRIMARY KEY (`reservation_id`),
  KEY `passager_id` (`passager_id`),
  KEY `train_id` (`train_id`)
) ENGINE=MyISAM AUTO_INCREMENT=86 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `reservations`
--

INSERT INTO `reservations` (`reservation_id`, `passager_id`, `train_id`, `num_place`, `date_de_reservation`) VALUES
(1, 19, 1, '', '2024-12-06'),
(59, 19, 4, '69', '2024-12-14'),
(58, 11, 4, '8', '2024-12-13'),
(24, 14, 1, '', '2024-12-07'),
(25, 33, 2, '3', '2024-12-07'),
(50, 170, 3, '50', '2024-12-08'),
(49, 100, 2, '4', '2024-12-08'),
(75, 12, 4, '34', '2024-12-18'),
(74, 12, 4, '34', '2024-12-18'),
(73, 12, 4, '34', '2024-12-18'),
(72, 12, 4, '34', '2024-12-18'),
(71, 12, 4, '34', '2024-12-18'),
(70, 12, 4, '34', '2024-12-18'),
(69, 12, 4, '34', '2024-12-18'),
(68, 12, 4, '16', '2024-12-18'),
(67, 12, 4, '15', '2024-12-18'),
(66, 12, 4, '15', '2024-12-18'),
(65, 12, 4, '24', '2024-12-14'),
(64, 0, 0, '', '0000-00-00'),
(80, 12, 4, '33', '2024-12-19'),
(63, 19, 4, '10', '2024-12-14'),
(76, 12, 4, '34', '2024-12-18'),
(77, 12, 4, '34', '2024-12-18'),
(78, 12, 4, '34', '2024-12-18'),
(79, 12, 4, '23', '2024-12-19'),
(81, 12, 4, '33', '2024-12-19'),
(82, 12, 4, '33', '2024-12-19'),
(83, 12, 4, '33', '2024-12-19'),
(84, 12, 4, '33', '2024-12-19'),
(85, 12, 4, '33', '2024-12-19');

-- --------------------------------------------------------

--
-- Structure de la table `trains`
--

DROP TABLE IF EXISTS `trains`;
CREATE TABLE IF NOT EXISTS `trains` (
  `train_id` int NOT NULL,
  `nom` varchar(100) NOT NULL,
  `type` varchar(50) DEFAULT NULL,
  `capacité` int NOT NULL,
  `ville_D` varchar(100) DEFAULT NULL,
  `ville_A` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `siege` int DEFAULT NULL,
  `date_T` date NOT NULL,
  PRIMARY KEY (`train_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `trains`
--

INSERT INTO `trains` (`train_id`, `nom`, `type`, `capacité`, `ville_D`, `ville_A`, `siege`, `date_T`) VALUES
(4, 'MGF', 'metro', 345, 'djibouti', 'diri', 80, '2024-12-10');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
