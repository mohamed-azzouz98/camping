-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 27 fév. 2020 à 18:16
-- Version du serveur :  5.7.26
-- Version de PHP :  7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `camping`
--
CREATE DATABASE IF NOT EXISTS `camping` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `camping`;

-- --------------------------------------------------------

--
-- Structure de la table `reservationplace`
--

DROP TABLE IF EXISTS `reservationplace`;
CREATE TABLE IF NOT EXISTS `reservationplace` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `datedebut` date DEFAULT NULL,
  `datefin` date DEFAULT NULL,
  `emplacement` varchar(25) NOT NULL,
  `habitat` varchar(25) NOT NULL,
  `dureesejour` int(11) NOT NULL,
  `borne` varchar(25) NOT NULL,
  `disco` varchar(25) NOT NULL,
  `yfs` varchar(25) NOT NULL,
  `prixtotal` int(25) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=446 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `reservationplace`
--

INSERT INTO `reservationplace` (`id`, `datedebut`, `datefin`, `emplacement`, `habitat`, `dureesejour`, `borne`, `disco`, `yfs`, `prixtotal`, `id_utilisateur`) VALUES
(441, '2020-03-18', '2020-03-24', 'plage', 'cpgcar', 6, 'oui', 'non', 'non', 72, 14),
(442, '2020-03-18', '2020-03-24', 'plage', 'cpgcar', 6, 'oui', 'non', 'non', 72, 14),
(443, '2020-03-10', '2020-03-15', 'plage', 'cpgcar', 5, 'non', 'non', 'non', 50, 14),
(444, '2020-03-10', '2020-03-15', 'plage', 'cpgcar', 5, 'non', 'non', 'non', 50, 14),
(445, '2020-03-09', '2020-03-13', 'pins', 'cpgcar', 4, 'oui', 'non', 'non', 48, 13);

-- --------------------------------------------------------

--
-- Structure de la table `tarif`
--

DROP TABLE IF EXISTS `tarif`;
CREATE TABLE IF NOT EXISTS `tarif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `jour` int(10) NOT NULL,
  `borne` int(2) NOT NULL,
  `disco` int(17) NOT NULL,
  `yfs` int(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `tarif`
--

INSERT INTO `tarif` (`id`, `jour`, `borne`, `disco`, `yfs`) VALUES
(1, 10, 2, 17, 30);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`Id`, `login`, `password`) VALUES
(14, 'aa', '$2y$10$XSUPI0GbD5g.j8IcoFYQteuh9rSJd7NwV6U1XYbBbQmQ6al/tvTxu'),
(9, 'amine', '$2y$10$/cHRVqXMO9AoIW/nTtJYQ.I7CRa7MuqRhRPGCo03HNGOSe.e1TPVC'),
(8, 'rrr', '$2y$10$yXg8dDRZylJT9IRqmirYgeDFLlKKgfzswAJ71PiTk7/yNc3Uat17S'),
(13, 'admin', '$2y$10$xGaaPIM6JtYvgdw60kaBuO435HxcECbdGf52pyFEbO9RqQhn.q0Ta'),
(16, 'ee', '$2y$10$ozodm8UZo8KnEzKkunalOeGQ8ryk8mbS6LZrFHJ.fT6c2jVV7ktri');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
