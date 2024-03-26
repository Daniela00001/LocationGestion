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


-- Listage de la structure de la base pour basegestionlocations
CREATE DATABASE IF NOT EXISTS `basegestionlocations` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `basegestionlocations`;

-- Listage de la structure de la table basegestionlocations. appartement
CREATE TABLE IF NOT EXISTS `appartement` (
  `num_apart` int(11) NOT NULL AUTO_INCREMENT,
  `type_apart` varchar(50) DEFAULT NULL,
  `prix_loc` float DEFAULT NULL,
  `prix_charges` float DEFAULT NULL,
  `rue` varchar(50) DEFAULT NULL,
  `arrondissement` int(11) DEFAULT NULL,
  `etage` int(11) DEFAULT NULL,
  `elevator` enum('oui','non') NOT NULL DEFAULT 'non',
  `preavis` enum('oui','non') NOT NULL DEFAULT 'non',
  `date_libre` date DEFAULT NULL,
  `num_prop` int(11) DEFAULT NULL,
  `details` text,
  PRIMARY KEY (`num_apart`),
  KEY `num_prop` (`num_prop`),
  CONSTRAINT `appartement_ibfk_1` FOREIGN KEY (`num_prop`) REFERENCES `proprietaire` (`num_prop`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=130 DEFAULT CHARSET=latin1;

-- Listage des données de la table basegestionlocations.appartement : ~5 rows (environ)
/*!40000 ALTER TABLE `appartement` DISABLE KEYS */;
INSERT INTO `appartement` (`num_apart`, `type_apart`, `prix_loc`, `prix_charges`, `rue`, `arrondissement`, `etage`, `elevator`, `preavis`, `date_libre`, `num_prop`, `details`) VALUES
	(99, 'Studio', 1200, 1.02002e+007, 'Rue de ta vie', 75009, 44, 'non', 'non', '2024-02-16', 11, 'vbnd,sklodi deuefb zef zfohzrogjl zekgfHZRGPI'),
	(122, 'F50', 4444, 242353, 'Rue de ta vie', 75009, 444, 'non', 'non', '2024-03-27', 15, 'fygygyyyyyyyyyyyyyyy'),
	(123, 'je sais pas ', 6500, 69, 'de jack', 99, -5, '', 'non', '0000-00-00', 24, 'KACHOU'),
	(124, 'maison', 5e+017, 1, 'de jack', 99, 5, 'non', 'non', '2024-03-23', 23, 'CHAIN'),
	(129, 'Studio', 1000, 100000, 'de jack', 99, 5, 'non', 'non', '2024-03-15', 21, 'CHAIN');
/*!40000 ALTER TABLE `appartement` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. demandes
CREATE TABLE IF NOT EXISTS `demandes` (
  `ID_demande` int(11) NOT NULL AUTO_INCREMENT,
  `num_dem` int(11) DEFAULT NULL,
  `num_apart` int(11) DEFAULT NULL,
  `Statut_demande` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_demande`),
  KEY `num_dem` (`num_dem`),
  KEY `num_apart` (`num_apart`)
) ENGINE=MyISAM AUTO_INCREMENT=58 DEFAULT CHARSET=latin1;

-- Listage des données de la table basegestionlocations.demandes : 50 rows
/*!40000 ALTER TABLE `demandes` DISABLE KEYS */;
INSERT INTO `demandes` (`ID_demande`, `num_dem`, `num_apart`, `Statut_demande`) VALUES
	(1, 12, 2, 'en attente'),
	(2, 12, 99, 'RefusÃ©e'),
	(3, 12, 3, 'AcceptÃ©e'),
	(12, 9, 3, 'RefusÃ©e'),
	(11, 12, 5, 'En attente'),
	(10, 12, 9, 'En attente'),
	(9, 12, 7, 'AcceptÃ©e'),
	(8, 12, 6, 'AcceptÃ©e'),
	(13, 6, 9, 'En attente'),
	(15, 10, 6, 'AcceptÃ©e'),
	(16, 16, 2, 'En attente'),
	(17, 10, 9, 'En attente'),
	(18, 17, 110, 'AcceptÃ©e'),
	(19, 17, 114, 'AcceptÃ©e'),
	(20, 8, 113, 'AcceptÃ©e'),
	(24, 8, 112, 'AcceptÃ©e'),
	(22, 8, 111, 'En attente'),
	(25, 8, 106, 'En attente'),
	(26, 8, 9, 'AcceptÃ©e'),
	(27, 8, 108, 'En attente'),
	(28, 8, 107, 'En attente'),
	(29, 9, 115, 'AcceptÃ©e'),
	(30, 11, 118, 'RefusÃ©e'),
	(31, 11, 119, 'AcceptÃ©e'),
	(32, 11, 120, 'AcceptÃ©e'),
	(33, 18, 119, 'AcceptÃ©e'),
	(34, 18, 118, 'AcceptÃ©e'),
	(35, 7, 119, 'AcceptÃ©e'),
	(36, 19, 121, 'AcceptÃ©e'),
	(37, 19, 122, 'AcceptÃ©e'),
	(38, 18, 123, 'AcceptÃ©e'),
	(39, 18, 124, 'AcceptÃ©e'),
	(40, 19, 125, 'AcceptÃ©e'),
	(41, 19, 99, 'En attente'),
	(42, 1, 124, 'AcceptÃ©e'),
	(43, 1, 122, 'En attente'),
	(44, 18, 127, 'AcceptÃ©e'),
	(45, 18, 128, 'AcceptÃ©e'),
	(46, 18, 126, 'RefusÃ©e'),
	(47, 18, 122, 'En attente'),
	(48, 18, 99, 'En attente'),
	(49, 13, 122, 'En attente'),
	(50, 13, 128, 'AcceptÃ©e'),
	(51, 13, 126, 'AcceptÃ©e'),
	(52, 7, 128, 'AcceptÃ©e'),
	(53, 6, 128, 'AcceptÃ©e'),
	(54, 5, 126, 'AcceptÃ©e'),
	(55, 5, 127, 'AcceptÃ©e'),
	(56, 5, 125, 'AcceptÃ©e'),
	(57, 7, 129, 'AcceptÃ©e');
/*!40000 ALTER TABLE `demandes` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. demandeur
CREATE TABLE IF NOT EXISTS `demandeur` (
  `num_dem` int(11) NOT NULL AUTO_INCREMENT,
  `nom_dem` varchar(50) DEFAULT NULL,
  `prenom_dem` varchar(50) DEFAULT NULL,
  `adresse_dem` varchar(50) DEFAULT NULL,
  `cp_dem` varchar(50) DEFAULT NULL,
  `telephone_dem` varchar(50) DEFAULT NULL,
  `login_dem` varchar(50) DEFAULT NULL,
  `mdp_dem` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`num_dem`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

-- Listage des données de la table basegestionlocations.demandeur : 12 rows
/*!40000 ALTER TABLE `demandeur` DISABLE KEYS */;
INSERT INTO `demandeur` (`num_dem`, `nom_dem`, `prenom_dem`, `adresse_dem`, `cp_dem`, `telephone_dem`, `login_dem`, `mdp_dem`) VALUES
	(2, 'Martin', 'Sophie', NULL, NULL, '9876543210', 'sophie.martin', 'mdp123'),
	(3, 'Tremblay', 'Pierre', NULL, NULL, '5551234567', 'pierre.tremblay', 'password456'),
	(4, 'Lefevre', 'Marie', '789 Avenue des Fleurs', '69002', '987654321', 'marie.lefevre', 'secret789'),
	(5, 'Gaddddddd', 'Michelffffffff', 'jjjjeferARF', '9313034', '0781725585', 'michel.gagnon', 'pass123'),
	(6, 'Dubois', 'Isabelle', '456 Boulevard du Soleil', '33000', '8765432109', 'isabelle.dubois', 'secure456'),
	(7, 'Lavoie', 'Julien', '321 Rue de la Lune', '44000', '7654321098', 'julien.lavoie', 'mdp456'),
	(11, 'Argrtdfd', 'Danielazzzzzz', '132 Rue Anatole France', '93130', '0781725585', 'aaeze', 'root'),
	(13, 'Stinca', 'Daniela', '132 Rue Anatole France', '931302', '0781725585', '', ''),
	(14, 'Stinca', 'Daniela', '132 Rue Anatole France', '93130', '0781725585', 'eee', 'root'),
	(15, 'Stinca', 'Daniela', '132 Rue Anatole France', '93130', '0781725585', 'eee', 'root'),
	(16, 'Stinca', 'Olesea', '2 allÃ©', '93130', '0781725585', '', ''),
	(18, 'mmmmmmmmmmm', 'mmmmmmmmmmm', 'mmmmmmmmmmm', '3013', '0781725585', '', '');
/*!40000 ALTER TABLE `demandeur` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. locataire
CREATE TABLE IF NOT EXISTS `locataire` (
  `num_loc` int(11) NOT NULL AUTO_INCREMENT,
  `nom_loc` varchar(50) DEFAULT NULL,
  `prenom_loc` varchar(50) DEFAULT NULL,
  `date_naissance` date DEFAULT NULL,
  `telephone_loc` varchar(50) DEFAULT NULL,
  `numCompt_loc` varchar(50) DEFAULT NULL,
  `banque` varchar(50) DEFAULT NULL,
  `adresse_banque_loc` varchar(50) DEFAULT NULL,
  `cp_banque_loc` varchar(50) DEFAULT NULL,
  `login_loc` varchar(50) DEFAULT NULL,
  `mdp_loc` varchar(64) DEFAULT NULL,
  `num_apart` int(11) DEFAULT NULL,
  `num_dem` int(11) DEFAULT NULL,
  PRIMARY KEY (`num_loc`),
  KEY `num_apart` (`num_apart`),
  KEY `fk_num_dem` (`num_dem`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table basegestionlocations.locataire : 1 rows
/*!40000 ALTER TABLE `locataire` DISABLE KEYS */;
INSERT INTO `locataire` (`num_loc`, `nom_loc`, `prenom_loc`, `date_naissance`, `telephone_loc`, `numCompt_loc`, `banque`, `adresse_banque_loc`, `cp_banque_loc`, `login_loc`, `mdp_loc`, `num_apart`, `num_dem`) VALUES
	(1, 'BBBBBBBBBBBBBBBBBB', 'BBBBBBBBBBBBBBBBBB', '2024-03-22', '0781725585', '543454345434', 'BBBBBBBBBBBBBBBBBB', '132 Rue Anatole France', '93130', 'danielaSTinca', 'fffffff', 125, 5);
/*!40000 ALTER TABLE `locataire` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. proprietaire
CREATE TABLE IF NOT EXISTS `proprietaire` (
  `num_prop` int(11) NOT NULL AUTO_INCREMENT,
  `nom_prop` varchar(50) DEFAULT NULL,
  `prenom_prop` varchar(50) DEFAULT NULL,
  `adresse_prop` varchar(50) DEFAULT NULL,
  `cp_prop` varchar(50) DEFAULT NULL,
  `telephone_prop` varchar(50) DEFAULT NULL,
  `login_prop` varchar(50) DEFAULT NULL,
  `mdp_prop` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`num_prop`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

-- Listage des données de la table basegestionlocations.proprietaire : ~14 rows (environ)
/*!40000 ALTER TABLE `proprietaire` DISABLE KEYS */;
INSERT INTO `proprietaire` (`num_prop`, `nom_prop`, `prenom_prop`, `adresse_prop`, `cp_prop`, `telephone_prop`, `login_prop`, `mdp_prop`) VALUES
	(8, 'Leclerc', 'Sophie', '567 Avenue des Jardins', '59000', '6543210987', 'sophie.leclerc', 'topsecret789'),
	(10, 'Morinnnnnn', 'Alice', '234 Rue de la Riviï¿½re', '17000', '4321098765', 'alice.morin', 'pass789'),
	(11, 'Stinc', 'Daniela', '132 Rue Anatole Franceeeeeeeeeeee', '93139', '0781725585', 'eee', 'root'),
	(12, 'mmmmmmmmmmm', 'mmmmmmmmmmm', '30130', '0781725585', '2003', '1234', ''),
	(13, 'nom', 'PrÃ©nom', 'Adresse ', 'cp', 'TÃ©lÃ©phone :', 'login', 'mdp'),
	(14, 'Luopin', 'Milan', 'Adresse de Milan', '13230', '0767684665', 'Milan', 'dadqa'),
	(15, 'Luopin', 'Milan', 'Adresse de Milan', '13230', '0767684665', 'Milan', 'fghj'),
	(18, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(19, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(20, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
	(21, 'BBBBBBBBBBBBBBBBBB', 'BBBBBBBBBBBBBBBBBB', '132 Rue Anatole France', '93130', '0781725585', 'fthexth', 'Rfhte3446'),
	(22, 'BBBBBBBBBBBBBBBBBB', 'BBBBBBBBBBBBBBBBBB', '132 Rue Anatole France', '93130', '0781725585', 'fthexth', 'Rfhte3446'),
	(23, 'mmmmmmmmmmm', 'mmmmmmmmmmm', 'mmmmmmmmmmm', '30130', '0781725585', 'eeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', 'ERGERgker45345'),
	(24, 'Bugneac', 'Vasile ', '69 avenue Jofre ', '94210', '0659942425', '', '');
/*!40000 ALTER TABLE `proprietaire` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. visiter
CREATE TABLE IF NOT EXISTS `visiter` (
  `num_apart` int(11) NOT NULL DEFAULT '0',
  `num_dem` int(11) NOT NULL DEFAULT '0',
  `date_visite` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'En attente',
  PRIMARY KEY (`num_apart`,`num_dem`),
  KEY `num_dem` (`num_dem`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- Listage des données de la table basegestionlocations.visiter : 10 rows
/*!40000 ALTER TABLE `visiter` DISABLE KEYS */;
INSERT INTO `visiter` (`num_apart`, `num_dem`, `date_visite`, `status`) VALUES
	(99, 12, '2024-02-22', 'En attente'),
	(3, 12, '2024-02-06', 'En attente'),
	(9, 12, '2024-02-21', 'En attente'),
	(9, 6, '2024-02-27', 'En attente'),
	(127, 18, '2024-03-21', 'En attente'),
	(99, 18, '2024-03-14', 'En attente'),
	(123, 18, '2024-03-14', 'En attente'),
	(126, 18, '2024-03-14', 'En attente'),
	(99, 7, '2024-03-22', 'En attente'),
	(2, 5, '2024-01-18', 'En attente');
/*!40000 ALTER TABLE `visiter` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
