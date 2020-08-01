-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.5.0.5332
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for gestdb
CREATE DATABASE IF NOT EXISTS `gestdb` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `gestdb`;

-- Dumping structure for table gestdb.contrat
CREATE TABLE IF NOT EXISTS `contrat` (
  `NUM_CON` char(255) NOT NULL,
  `LIB_CON` char(255) DEFAULT NULL,
  `DATE_EMB` date DEFAULT NULL,
  `DATE_EXP` date DEFAULT NULL,
  PRIMARY KEY (`NUM_CON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table gestdb.employer
CREATE TABLE IF NOT EXISTS `employer` (
  `MATRICULE` char(255) NOT NULL,
  `NOM` char(255) DEFAULT NULL,
  `PRENOM` char(255) DEFAULT NULL,
  `SEXE` char(255) DEFAULT NULL,
  `CNI` decimal(10,0) DEFAULT NULL,
  `STATUS` char(255) DEFAULT NULL,
  `SALAIRE_B` decimal(10,0) DEFAULT NULL,
  `PRIME` decimal(10,0) DEFAULT NULL,
  `SALAIRE_TLE` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`MATRICULE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table gestdb.exercer
CREATE TABLE IF NOT EXISTS `exercer` (
  `MATRICULE` char(255) NOT NULL,
  `POSTE` char(255) NOT NULL,
  PRIMARY KEY (`MATRICULE`,`POSTE`),
  KEY `FK_EXERCER_EXERCER_FONCTION` (`POSTE`),
  CONSTRAINT `FK_EXERCER_EXERCER2_EMPLOYER` FOREIGN KEY (`MATRICULE`) REFERENCES `employer` (`MATRICULE`),
  CONSTRAINT `FK_EXERCER_EXERCER_FONCTION` FOREIGN KEY (`POSTE`) REFERENCES `fonction` (`POSTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table gestdb.fonction
CREATE TABLE IF NOT EXISTS `fonction` (
  `POSTE` char(255) NOT NULL,
  `ECHELON` char(255) DEFAULT NULL,
  PRIMARY KEY (`POSTE`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table gestdb.posseder
CREATE TABLE IF NOT EXISTS `posseder` (
  `MATRICULE` char(255) NOT NULL,
  `NUM_CON` char(255) NOT NULL,
  PRIMARY KEY (`MATRICULE`,`NUM_CON`),
  KEY `FK_POSSEDER_POSSEDER_CONTRAT` (`NUM_CON`),
  CONSTRAINT `FK_POSSEDER_POSSEDER2_EMPLOYER` FOREIGN KEY (`MATRICULE`) REFERENCES `employer` (`MATRICULE`),
  CONSTRAINT `FK_POSSEDER_POSSEDER_CONTRAT` FOREIGN KEY (`NUM_CON`) REFERENCES `contrat` (`NUM_CON`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
-- Dumping structure for table gestdb.resourceh
CREATE TABLE IF NOT EXISTS `resourceh` (
  `id_rh` int(255) NOT NULL AUTO_INCREMENT,
  `matricule` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT '0',
  `mdp` varchar(50) DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_rh`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
