-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : sam. 26 nov. 2022 à 19:05
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
-- Base de données : `epreuves_ccf`
--

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

DROP TABLE IF EXISTS `professeurs`;
CREATE TABLE IF NOT EXISTS `professeurs` (
  `ID_PROF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NUMEN` varchar(15) CHARACTER SET utf8 NOT NULL,
  `NOM_PROF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PRENOM_PROF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ADRESSE_MAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `NUM_TELEPHONE` varchar(100) NOT NULL,
  `MOT_DE_PASSE` varchar(64) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`ID_PROF`),
  UNIQUE KEY `ID_NUMEN` (`ID_NUMEN`),
  UNIQUE KEY `NOM_PROF` (`NOM_PROF`),
  UNIQUE KEY `PRENOM_PROF` (`PRENOM_PROF`),
  UNIQUE KEY `ADRESSE_MAIL` (`ADRESSE_MAIL`),
  UNIQUE KEY `NUM_TELEPHONE` (`NUM_TELEPHONE`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `professeurs`
--

INSERT INTO `professeurs` (`ID_PROF`, `ID_NUMEN`, `NOM_PROF`, `PRENOM_PROF`, `ADRESSE_MAIL`, `NUM_TELEPHONE`, `MOT_DE_PASSE`) VALUES
(11, 'ttt', 'ttt', 'ttt', 'ttt@gmail.om', '', '$2y$12$zgZWChh9Do2J5N4gxS7EdO81oxd2QqzE7fP9ftt5dnfVfGXrASIwm'),
(12, 'eee', 'eee', 'eee', 'eee@gmail.com', '0123456789', '$2y$12$4X64XmRm4p.kNiVH5hchae64aTyA9WBt6YQVwcIgPCsOgALZ1CZuS'),
(13, 'maaaa', 'marwan', 'haarnafi', 'gamer@gmail.com', '123456789', '$2y$12$vIfNb3Zf/sP8kZYOWG4NVuBWKrQx4b5SNujIF3UzpRxh467fQ.XPS');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
