SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS epreuves_ccf

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
  `ID_PROF` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `ID_NUMEN` varchar(15) CHARACTER SET utf8 NOT NULL,
  `NOM_PROF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `PRENOM_PROF` varchar(100) CHARACTER SET utf8 NOT NULL,
  `ADRESSE_MAIL` varchar(100) CHARACTER SET utf8 NOT NULL,
  `NUM_TELEPHONE` varchar(100) NOT NULL,
  `MOT_DE_PASSE` VARCHAR(255) CHARACTER SET utf8 NOT NULL,
  UNIQUE KEY `ID_NUMEN` (`ID_NUMEN`),
  UNIQUE KEY `NOM_PROF` (`NOM_PROF`),
  UNIQUE KEY `PRENOM_PROF` (`PRENOM_PROF`),
  UNIQUE KEY `ADRESSE_MAIL` (`ADRESSE_MAIL`),
  UNIQUE KEY `NUM_TELEPHONE` (`NUM_TELEPHONE`)
) ;




CREATE TABLE IF NOT EXISTS CCF(
	CLEF_CCF INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CODE_CCF CHAR(10),
	LIBELLE_CCF VARCHAR(60)
	) ;





CREATE TABLE IF NOT EXISTS CANDIDAT(
	CLEF_ELEVE INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	ID_CANDIDAT INT,
	NOM_CANDIDAT VARCHAR(50),
	PRENOM_CANDIDAT VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS FILIERE_BTS(
	ID_BTS INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	CODE_BTS CHAR(10),
	LIBELLE_BTS VARCHAR(50),
	ANNEE_CONCERNEE TINYTEXT
);


CREATE TABLE IF NOT EXISTS EPREUVE_CCF(
	ID_EPREUVE INT NOT NULL PRIMARY KEY AUTO_INCREMENT,	
	DATE_EPREUVE DATE,
	HEURE_CONVOCATION TIME,
	DUREE_EPREUVE TIME,
	NOTE_OBTENU FLOAT,
	COEFFICIENT TINYINT(30),
	COMMENTAIRE_EVALUATION VARCHAR(255),
	CLEF_ELEVE INT,
	ID_CCF INT ,
	ID_PROF INT ,
	ID_BTS INT,
	FOREIGN KEY (CLEF_ELEVE) REFERENCES CANDIDAT(CLEF_ELEVE),
	FOREIGN KEY (ID_PROF) REFERENCES PROFESSEURS(ID_PROF),
	FOREIGN KEY (ID_CCF) REFERENCES CCF(CLEF_CCF), 
	FOREIGN KEY (ID_BTS) REFERENCES FILIERE_BTS(ID_BTS)
);