-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           11.3.2-MariaDB-log - mariadb.org binary distribution
-- SE du serveur:                Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Listage de la structure de la base pour basegestionlocations
CREATE DATABASE IF NOT EXISTS `basegestionlocations` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `basegestionlocations`;

-- Listage de la structure de la table basegestionlocations. admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(50) DEFAULT NULL,
  `mdp` varchar(50) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `login` (`login`),
  UNIQUE KEY `mdp` (`mdp`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.admin : ~0 rows (environ)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `login`, `mdp`, `mail`) VALUES
	(1, 'admin', 'monadmin', 'daniellastinka@gmail.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

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
  `details` text DEFAULT NULL,
  PRIMARY KEY (`num_apart`),
  KEY `num_prop` (`num_prop`),
  CONSTRAINT `appartement_ibfk_1` FOREIGN KEY (`num_prop`) REFERENCES `proprietaire` (`num_prop`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=155 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.appartement : ~13 rows (environ)
/*!40000 ALTER TABLE `appartement` DISABLE KEYS */;
INSERT INTO `appartement` (`num_apart`, `type_apart`, `prix_loc`, `prix_charges`, `rue`, `arrondissement`, `etage`, `elevator`, `preavis`, `date_libre`, `num_prop`, `details`) VALUES
	(140, 'Pantahouse', 1000, 230, 'Rue de la Paix', 8, 16, 'non', 'oui', '2024-07-24', 47, 'Penthouse avec vue panoramique sur les toits de Paris'),
	(141, 'T1', 3400, 34040, 'Rue du Faubourg Saint-HonorÃ©', 14, 14, 'non', 'oui', '2024-06-20', 47, 'Duplex moderne avec terrasse privÃ©e dans le quartier chic de Saint-Germain-des-PrÃ©s'),
	(142, 'Maison', 4000, 340, 'Avenue Montaigne', 1, 0, 'non', 'non', '2024-05-25', 43, 'Penthouse avec vue panoramique sur les toits de Paris'),
	(143, 'T3', 3400, 100, 'Boulevard Haussmann', 14, 8, 'non', 'non', '2024-05-15', 43, ''),
	(145, 'Studio', 400, 1, 'Rue de la Paix', 1, 0, 'non', 'non', '2024-03-28', 47, ''),
	(147, 'Studio', 1200, 48, 'insulte', 1, 0, 'non', 'non', '2024-03-29', 47, ''),
	(148, 'Studio', 4444, 10200200, 'insulte', 1, 0, 'non', 'non', '2024-03-28', 47, ''),
	(149, 'Studio', 12, 48, 'insulte', 1, 0, 'non', 'non', '2024-03-28', 47, ''),
	(150, 'Studio', 12, 48, 'insulte', 1, 0, 'non', 'non', '2024-03-28', 47, 'fegreg'),
	(151, 'Studio', 12, 48, 'insulte', 1, 0, 'non', 'non', '2024-03-29', 47, 'xhxnnggn'),
	(152, 'Studio', 12, 700, 'wfbsrbgf', 1, 0, 'non', 'non', '2024-03-29', 47, 'zthb"\'tsz'),
	(153, 'Studio', 12, 700, 'rgedthbte insulte wthwgdt', 1, 0, 'non', 'non', '2024-03-30', 47, ''),
	(154, 'T2', 12, 700, 'wfbsrbgfgs', 1, 0, 'non', 'non', '2024-05-03', 38, '');
/*!40000 ALTER TABLE `appartement` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. demandes
CREATE TABLE IF NOT EXISTS `demandes` (
  `ID_demande` int(11) NOT NULL AUTO_INCREMENT,
  `num_dem` int(11) DEFAULT NULL,
  `num_apart` int(11) DEFAULT NULL,
  `Statut_demande` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`ID_demande`),
  KEY `num_dem` (`num_dem`),
  KEY `num_apart` (`num_apart`),
  CONSTRAINT `demandes_ibfk_1` FOREIGN KEY (`num_dem`) REFERENCES `demandeur` (`num_dem`) ON DELETE CASCADE,
  CONSTRAINT `demandes_ibfk_2` FOREIGN KEY (`num_apart`) REFERENCES `appartement` (`num_apart`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.demandes : ~3 rows (environ)
/*!40000 ALTER TABLE `demandes` DISABLE KEYS */;
INSERT INTO `demandes` (`ID_demande`, `num_dem`, `num_apart`, `Statut_demande`) VALUES
	(17, 27, 145, 'AcceptÃ©e'),
	(18, 27, 140, 'AcceptÃ©e'),
	(19, 23, 140, 'AcceptÃ©e');
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.demandeur : ~12 rows (environ)
/*!40000 ALTER TABLE `demandeur` DISABLE KEYS */;
INSERT INTO `demandeur` (`num_dem`, `nom_dem`, `prenom_dem`, `adresse_dem`, `cp_dem`, `telephone_dem`, `login_dem`, `mdp_dem`) VALUES
	(4, 'Lefevre', 'Marie', '789 Avenue des Fleurs', '69002', '987654321', 'marie.lefevre', 'secret789'),
	(5, 'Gadddddddvvvvvvvvvvvvvvvvv', 'Michelf', 'paris l', '9313034', '0781725585', 'eeeeeeeeeeeee', 'sfcefdezfgnh,fhuk,fh'),
	(6, 'Dubois', 'dvdsze', 'eze', 'EFRGVTEQB', '', '', ''),
	(20, 'Stinca', 'Daniela', '132 Rue Anatole France', '93130', '0781725585', 'daniela000', 'ALina33300???'),
	(21, 'BBBBBBBBBBBBBBBBBB', 'BBBBBBBBBBBBBBBBBB', '132 Rue Anatole France', '93130', '0781725585', 'gsfswh', 'fffhdwwdhTH556'),
	(22, 'Dupont', 'Jean', '123 Rue de la République', '75001', '0123456789', 'jdupont', 'Password1'),
	(23, 'Martin', 'Marie', '456 Avenue des Lilas', '75002', '0987654321', 'mmartin', 'Password2'),
	(24, 'Durand', 'Pierre', '789 Boulevard Voltaire', '75003', '0123456789', 'pdurand', 'Password3'),
	(25, 'Leroy', 'Sophie', '1010 Rue du Faubourg Saint-Antoine', '75004', '0987654321', 'sleroy', 'Password4'),
	(26, 'Moreau', 'Julie', '111 Rue du Temple', '75005', '0123456789', 'jmoreau', 'Password5'),
	(27, 'Garcia', 'Thomas', '1313 Boulevard Saint-Germain', '75006', '0987654321', 'tgarcia', 'Password6');
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
  KEY `num_dem` (`num_dem`),
  CONSTRAINT `locataire_ibfk_1` FOREIGN KEY (`num_apart`) REFERENCES `appartement` (`num_apart`) ON DELETE CASCADE,
  CONSTRAINT `locataire_ibfk_2` FOREIGN KEY (`num_dem`) REFERENCES `demandeur` (`num_dem`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.locataire : ~2 rows (environ)
/*!40000 ALTER TABLE `locataire` DISABLE KEYS */;
INSERT INTO `locataire` (`num_loc`, `nom_loc`, `prenom_loc`, `date_naissance`, `telephone_loc`, `numCompt_loc`, `banque`, `adresse_banque_loc`, `cp_banque_loc`, `login_loc`, `mdp_loc`, `num_apart`, `num_dem`) VALUES
	(4, 'Dupontvuvyububu', 'Jean', '2024-03-27', '0123456789', '543<sgrrge', ' 12 Rue DE la vieqedfklhiqriogb', '123 Rue de la RÃ©publique', '75001', 'danielaSTinca', 'DSFGRGer4534??', 145, 27),
	(5, 'Dupont', 'Jean', '2024-03-23', '0123456789', '543', ' 12 Rue DE la vie', '123 Rue de la RÃ©publique', '75001', 'danielaSTinca', 'DSFdsffds4345???', 140, 23);
/*!40000 ALTER TABLE `locataire` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. motsinterdits
CREATE TABLE IF NOT EXISTS `motsinterdits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mot` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.motsinterdits : ~4 rows (environ)
/*!40000 ALTER TABLE `motsinterdits` DISABLE KEYS */;
INSERT INTO `motsinterdits` (`id`, `mot`) VALUES
	(1, 'injurieux'),
	(2, 'raciste'),
	(3, 'inacceptable'),
	(4, 'insulte');
/*!40000 ALTER TABLE `motsinterdits` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.proprietaire : ~7 rows (environ)
/*!40000 ALTER TABLE `proprietaire` DISABLE KEYS */;
INSERT INTO `proprietaire` (`num_prop`, `nom_prop`, `prenom_prop`, `adresse_prop`, `cp_prop`, `telephone_prop`, `login_prop`, `mdp_prop`) VALUES
	(38, 'Dupont', 'Jean', '123 Rue de la RÃ©publique', '75001', '0123456789', 'jdupont', 'Password1'),
	(39, 'Martin', 'Marie', ' 456 Avenue des Champs-Ã‰lysÃ©es', '75008', '0987654321', 'mmartin', 'Passw'),
	(40, 'Duboisssssssssssss', 'Pierre', '789 Boulevard Haussmann', '75009', '0123456789', 'pdubois', 'Password3'),
	(41, 'Bernard', 'Sophie', '10 Rue de la Paix', '75002', '0987654321', 'sbernard', 'Password4'),
	(42, 'Lefebvre', 'Lucas', '11 Rue du Faubourg Saint-Honoré', '75008', '0123456789', 'llefebvre', 'Password5'),
	(43, 'Leroy', 'Lauraaaa', '12 ', '75001222', '0987654321', 'lleroy', 'Password6'),
	(47, 'Legrand', 'Lï¿½dfzrfrf', '16 Roses', '75008', '0987654321', 'llegrand', 'Password10');
/*!40000 ALTER TABLE `proprietaire` ENABLE KEYS */;

-- Listage de la structure de la table basegestionlocations. visiter
CREATE TABLE IF NOT EXISTS `visiter` (
  `num_apart` int(11) NOT NULL,
  `num_dem` int(11) NOT NULL,
  `date_visite` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'En attente',
  PRIMARY KEY (`num_apart`,`num_dem`),
  KEY `num_dem` (`num_dem`),
  CONSTRAINT `visiter_ibfk_1` FOREIGN KEY (`num_apart`) REFERENCES `appartement` (`num_apart`) ON DELETE CASCADE,
  CONSTRAINT `visiter_ibfk_2` FOREIGN KEY (`num_dem`) REFERENCES `demandeur` (`num_dem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- Listage des données de la table basegestionlocations.visiter : ~6 rows (environ)
/*!40000 ALTER TABLE `visiter` DISABLE KEYS */;
INSERT INTO `visiter` (`num_apart`, `num_dem`, `date_visite`, `status`) VALUES
	(141, 27, '2024-02-22', 'En attente'),
	(142, 27, '2024-03-16', 'En attente'),
	(143, 27, '2024-03-08', 'En attente'),
	(149, 27, '2023-12-07', 'En attente'),
	(150, 27, '2024-06-19', 'En attente'),
	(151, 27, '2028-06-14', 'En attente'),
	(152, 27, '2024-03-19', 'En attente');
/*!40000 ALTER TABLE `visiter` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
