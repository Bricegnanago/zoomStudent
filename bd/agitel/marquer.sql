-- --------------------------------------------------------
-- Hôte :                        localhost
-- Version du serveur:           5.7.24 - MySQL Community Server (GPL)
-- SE du serveur:                Win32
-- HeidiSQL Version:             9.5.0.5337
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Listage de la structure de la table agitel. marquer
CREATE TABLE IF NOT EXISTS `marquer` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `months` varchar(50) DEFAULT NULL,
  `hour` varchar(50) DEFAULT NULL,
  `week` varchar(50) DEFAULT NULL,
  `student_id` int(10) unsigned NOT NULL,
  `save_At` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `FK_marquer_etudiant` FOREIGN KEY (`student_id`) REFERENCES `etudiant` (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=228 DEFAULT CHARSET=latin1;

-- Listage des données de la table agitel.marquer : ~52 rows (environ)
DELETE FROM `marquer`;
/*!40000 ALTER TABLE `marquer` DISABLE KEYS */;
INSERT INTO `marquer` (`id`, `months`, `hour`, `week`, `student_id`, `save_At`) VALUES
	(169, 'Janvier', '20', 'Semaine 1', 1, '2019-04-24 16:25:36'),
	(171, 'Mai', '17', 'Semaine 1', 2, '2019-04-24 16:27:08'),
	(172, 'Janvier', '28', 'Semaine 1', 8, '2019-04-24 16:27:08'),
	(173, 'Janvier', '20', 'Semaine 1', 10, '2019-04-24 16:27:08'),
	(174, 'Mai', '17', 'Semaine 2', 4, '2019-05-08 12:44:16'),
	(175, 'Mai', '10', 'Semaine 3', 6, '2019-05-08 12:44:45'),
	(176, 'Aout', '12', 'Semaine 1', 1, '2019-05-13 11:47:22'),
	(177, 'Aout', '13', 'Semaine 1', 2, '2019-05-13 11:47:23'),
	(178, 'Aout', '39', 'Semaine 1', 3, '2019-05-13 11:47:23'),
	(179, 'Mars', '12', 'Semaine 1', 1, '2019-05-13 12:24:35'),
	(180, 'Mars', '34', 'Semaine 1', 2, '2019-05-13 12:24:35'),
	(181, 'Mars', '34', 'Semaine 1', 3, '2019-05-13 12:24:35'),
	(182, 'Mars', '45', 'Semaine 1', 4, '2019-05-13 12:24:35'),
	(183, 'Mars', '56', 'Semaine 1', 5, '2019-05-13 12:24:35'),
	(184, 'Mars', '12', 'Semaine 1', 6, '2019-05-13 12:24:35'),
	(185, 'Mars', '56', 'Semaine 1', 7, '2019-05-13 12:24:35'),
	(186, 'Mars', '23', 'Semaine 1', 8, '2019-05-13 12:24:35'),
	(187, 'Juillet', '10', 'Semaine 1', 2, '2019-05-13 12:55:46'),
	(188, 'Juillet', '13', 'Semaine 1', 3, '2019-05-13 12:55:46'),
	(189, 'Juillet', '14', 'Semaine 1', 4, '2019-05-13 12:55:46'),
	(190, 'Mai', '19', 'Semaine 4', 7, '2019-05-13 13:01:05'),
	(191, 'Mai', '10', 'Semaine 4', 8, '2019-05-13 13:01:05'),
	(192, 'Mai', '20', 'Semaine 4', 9, '2019-05-13 13:01:05'),
	(193, 'Juin', '10', 'Semaine 2', 1, '2019-05-13 13:04:46'),
	(194, 'Juin', '20', 'Semaine 2', 2, '2019-05-13 13:04:46'),
	(195, 'Juin', '39', 'Semaine 2', 3, '2019-05-13 13:04:46'),
	(196, 'Juin', '12', 'Semaine 2', 4, '2019-05-13 13:04:46'),
	(197, 'Fevrier', '10', 'Semaine 1', 1, '2019-05-13 13:06:13'),
	(198, 'Fevrier', '18', 'Semaine 1', 2, '2019-05-13 13:06:13'),
	(199, 'Fevrier', '18', 'Semaine 1', 3, '2019-05-13 13:06:13'),
	(200, 'Janvier', '20', 'Semaine 2', 1, '2019-05-13 13:09:14'),
	(201, 'Mars', '10', 'Semaine 3', 1, '2019-05-13 13:24:54'),
	(202, 'Mars', '30', 'Semaine 3', 2, '2019-05-13 13:24:54'),
	(203, 'Mars', '20', 'Semaine 3', 3, '2019-05-13 13:24:55'),
	(204, 'Mars', '10', 'Semaine 3', 4, '2019-05-13 13:24:55'),
	(205, 'Mars', '23', 'Semaine 3', 5, '2019-05-13 13:24:55'),
	(206, 'Mars', '20', 'Semaine 3', 9, '2019-05-13 13:24:55'),
	(207, 'Mars', '20', 'Semaine 3', 10, '2019-05-13 13:24:55'),
	(208, 'Mars', '29', 'Semaine 3', 11, '2019-05-13 13:24:55'),
	(209, 'Mars', '20', 'Semaine 3', 12, '2019-05-13 13:24:55'),
	(210, 'Avril', '20', 'Semaine 1', 1, '2019-05-13 13:45:11'),
	(211, 'Avril', '10', 'Semaine 1', 2, '2019-05-13 13:45:11'),
	(212, 'Avril', '19', 'Semaine 1', 3, '2019-05-13 13:45:11'),
	(213, 'Juillet', '19', 'Semaine 2', 1, '2019-05-13 15:19:13'),
	(214, 'Juillet', '20', 'Semaine 2', 2, '2019-05-13 15:19:13'),
	(215, 'Juillet', '20', 'Semaine 2', 6, '2019-05-13 15:19:14'),
	(216, 'Juillet', '30', 'Semaine 2', 7, '2019-05-13 15:19:14'),
	(217, 'Septembre', '10', 'Semaine 1', 1, '2019-05-13 21:28:17'),
	(218, 'Septembre', '10', 'Semaine 1', 4, '2019-05-13 21:28:18'),
	(219, 'Septembre', '19', 'Semaine 1', 9, '2019-05-13 21:28:18'),
	(220, 'Septembre', '100', 'Semaine 1', 11, '2019-05-13 21:28:18'),
	(221, 'Septembre', '10', 'Semaine 1', 13, '2019-05-13 21:28:18'),
	(222, 'Janvier', '12', 'Semaine 4', 8, '2019-05-14 11:11:42'),
	(223, 'Janvier', '20', 'Semaine 4', 10, '2019-05-14 11:11:43'),
	(224, 'Janvier', '18', 'Semaine 4', 12, '2019-05-14 11:11:43'),
	(225, 'Janvier', '2', 'Semaine 4', 13, '2019-05-14 11:11:43'),
	(226, 'Janvier', '5', 'Semaine 4', 14, '2019-05-14 11:11:43'),
	(227, 'Janvier', 'ergv', 'Semaine 3', 1, '2019-05-14 12:14:42');
/*!40000 ALTER TABLE `marquer` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
