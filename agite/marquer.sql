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
) ENGINE=InnoDB AUTO_INCREMENT=174 DEFAULT CHARSET=latin1;

-- Listage des données de la table agitel.marquer : ~5 rows (environ)
/*!40000 ALTER TABLE `marquer` DISABLE KEYS */;
INSERT INTO `marquer` (`id`, `months`, `hour`, `week`, `student_id`, `save_At`) VALUES
	(169, 'Janvier', '20', 'Semaine 1', 1, '2019-04-24 16:25:36'),
	(170, 'Janvier', '32', 'Semaine 1', 1, '2019-04-24 16:27:08'),
	(171, 'Janvier', '17', 'Semaine 1', 2, '2019-04-24 16:27:08'),
	(172, 'Janvier', '28', 'Semaine 1', 8, '2019-04-24 16:27:08'),
	(173, 'Janvier', '20', 'Semaine 1', 10, '2019-04-24 16:27:08');
/*!40000 ALTER TABLE `marquer` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
