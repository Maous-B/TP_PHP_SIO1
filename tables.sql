-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.1.72-community - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour epreuves_ccf
DROP DATABASE IF EXISTS `epreuves_ccf`;
CREATE DATABASE IF NOT EXISTS `epreuves_ccf` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `epreuves_ccf`;

-- Listage de la structure de la table epreuves_ccf. candidat
DROP TABLE IF EXISTS `candidat`;
CREATE TABLE IF NOT EXISTS `candidat` (
  `CLEF_ELEVE` int(11) NOT NULL AUTO_INCREMENT,
  `NUMERO_ELEVE` varchar(50) DEFAULT NULL,
  `NOM_CANDIDAT` varchar(50) DEFAULT NULL,
  `PRENOM_CANDIDAT` varchar(50) DEFAULT NULL,
  `fk_id_bts` int(11) DEFAULT NULL,
  PRIMARY KEY (`CLEF_ELEVE`),
  KEY `fk_id_bts` (`fk_id_bts`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table epreuves_ccf.candidat : 6 rows
/*!40000 ALTER TABLE `candidat` DISABLE KEYS */;
INSERT INTO `candidat` (`CLEF_ELEVE`, `NUMERO_ELEVE`, `NOM_CANDIDAT`, `PRENOM_CANDIDAT`, `fk_id_bts`) VALUES
	(1, 'ADQ1', 'HARNAFI', 'Marwan', 1),
	(2, 'AKS2', 'ROBERT', 'Timothée', 2),
	(3, 'BDF6', 'BEAUDOUX', 'Camille', 2),
	(4, 'AZS66', 'DEBIEVE', 'Hugo', 3),
	(5, 'ASW31', 'JOUARY', 'Antoine', 2),
	(6, 'AGH13', 'BOUANANE', 'Fethi', 1);
/*!40000 ALTER TABLE `candidat` ENABLE KEYS */;

-- Listage de la structure de la table epreuves_ccf. ccf
DROP TABLE IF EXISTS `ccf`;
CREATE TABLE IF NOT EXISTS `ccf` (
  `CLEF_CCF` int(11) NOT NULL AUTO_INCREMENT,
  `CODE_CCF` char(10) DEFAULT NULL,
  `LIBELLE_CCF` varchar(60) DEFAULT NULL,
  `fk_id_bts` int(11) DEFAULT NULL,
  PRIMARY KEY (`CLEF_CCF`),
  KEY `fk_id_bts` (`fk_id_bts`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table epreuves_ccf.ccf : 5 rows
/*!40000 ALTER TABLE `ccf` DISABLE KEYS */;
INSERT INTO `ccf` (`CLEF_CCF`, `CODE_CCF`, `LIBELLE_CCF`, `fk_id_bts`) VALUES
	(1, 'E6', 'Cybersécurité des organisations', 1),
	(2, 'E4', 'Développement', 1),
	(3, 'E5', 'Comptabilité', 3),
	(4, 'E3', 'Gestion', 3),
	(5, 'E7', 'Relation Client', 2);
/*!40000 ALTER TABLE `ccf` ENABLE KEYS */;

-- Listage de la structure de la table epreuves_ccf. epreuve_ccf
DROP TABLE IF EXISTS `epreuve_ccf`;
CREATE TABLE IF NOT EXISTS `epreuve_ccf` (
  `ID_EPREUVE` int(11) NOT NULL AUTO_INCREMENT,
  `DATE_EPREUVE` date DEFAULT NULL,
  `HEURE_CONVOCATION` time DEFAULT NULL,
  `DUREE_EPREUVE` time DEFAULT NULL,
  `NOTE_OBTENU` int(10) DEFAULT NULL,
  `COEFFICIENT` tinyint(30) DEFAULT NULL,
  `COMMENTAIRE_EVALUATION` varchar(255) DEFAULT NULL,
  `fk_clef_eleve` int(11) DEFAULT NULL,
  `fk_id_prof` int(11) DEFAULT NULL,
  `fk_id_ccf` int(11) DEFAULT NULL,
  `fk_id_bts` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_EPREUVE`),
  KEY `fk_clef_eleve` (`fk_clef_eleve`),
  KEY `fk_id_prof` (`fk_id_prof`),
  KEY `fk_id_ccf` (`fk_id_ccf`),
  KEY `fk_id_bts` (`fk_id_bts`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table epreuves_ccf.epreuve_ccf : 7 rows
/*!40000 ALTER TABLE `epreuve_ccf` DISABLE KEYS */;
/*!40000 ALTER TABLE `epreuve_ccf` ENABLE KEYS */;

-- Listage de la structure de la table epreuves_ccf. filiere_bts
DROP TABLE IF EXISTS `filiere_bts`;
CREATE TABLE IF NOT EXISTS `filiere_bts` (
  `ID_BTS` int(11) NOT NULL AUTO_INCREMENT,
  `CODE_BTS` char(10) DEFAULT NULL,
  `LIBELLE_BTS` varchar(50) DEFAULT NULL,
  `ANNEE_CONCERNEE` tinytext,
  PRIMARY KEY (`ID_BTS`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table epreuves_ccf.filiere_bts : 3 rows
/*!40000 ALTER TABLE `filiere_bts` DISABLE KEYS */;
INSERT INTO `filiere_bts` (`ID_BTS`, `CODE_BTS`, `LIBELLE_BTS`, `ANNEE_CONCERNEE`) VALUES
	(1, 'SIO', 'Service Informatique aux Organisations', '2022/2024'),
	(2, 'NDRC', 'Négociation Digitalisation de la Relation Client', '2022/2024'),
	(3, 'CG', 'Comptabilité et Gestion', '2022/2024');
/*!40000 ALTER TABLE `filiere_bts` ENABLE KEYS */;

-- Listage de la structure de la table epreuves_ccf. professeurs
DROP TABLE IF EXISTS `professeurs`;
CREATE TABLE IF NOT EXISTS `professeurs` (
  `ID_PROF` int(11) NOT NULL AUTO_INCREMENT,
  `ID_NUMEN` varchar(15) CHARACTER SET utf8 NOT NULL,
  `NOM_PROF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PRENOM_PROF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ADRESSE_MAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `NUM_TELEPHONE` varchar(100) NOT NULL,
  `MOT_DE_PASSE` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fk_id_bts` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID_PROF`),
  UNIQUE KEY `ID_NUMEN` (`ID_NUMEN`),
  UNIQUE KEY `NOM_PROF` (`NOM_PROF`),
  UNIQUE KEY `PRENOM_PROF` (`PRENOM_PROF`),
  UNIQUE KEY `ADRESSE_MAIL` (`ADRESSE_MAIL`),
  UNIQUE KEY `NUM_TELEPHONE` (`NUM_TELEPHONE`),
  KEY `fk_id_bts` (`fk_id_bts`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table epreuves_ccf.professeurs : 2 rows
/*!40000 ALTER TABLE `professeurs` DISABLE KEYS */;
INSERT INTO `professeurs` (`ID_PROF`, `ID_NUMEN`, `NOM_PROF`, `PRENOM_PROF`, `ADRESSE_MAIL`, `NUM_TELEPHONE`, `MOT_DE_PASSE`, `fk_id_bts`) VALUES
	(1, 'AAA', 'TT', 'TT', 'TT@gmail.com', '121', '$argon2id$v=19$m=65536,t=4,p=1$cDRyNloxUXBaUXJzUGpvcw$3cnsy5BfnTaBwtnnb91NaW8NVA7qLqif19h38T9ztxA', 1),
	(2, 'AA', 'AA', 'AA', 'AA@gmail.com', '123456', '$argon2id$v=19$m=65536,t=4,p=1$Tk9jUWtmRy5UU2pYSkNFWg$hxYCZcuWjBZ8ZHvwrTqd8P4gEzA7XuWJySvi6SINlZs', 2);
/*!40000 ALTER TABLE `professeurs` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
