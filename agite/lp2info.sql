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

-- Listage de la structure de la table agitel. lp2info
CREATE TABLE IF NOT EXISTS `lp2info` (
  `code` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `date_naissance` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table agitel.lp2info : ~8 rows (environ)
/*!40000 ALTER TABLE `lp2info` DISABLE KEYS */;
INSERT INTO `lp2info` (`code`, `nom`, `prenom`, `date_naissance`) VALUES
	(1, 'OUATTARA', 'Aime Franck', '13/09/1996'),
	(2, 'KONAN', 'Serge', '22/01/1998'),
	(3, 'COULIBALY ', 'Ely  BRAHIMA', '23/10/1'),
	(4, 'TRAORE', 'Fatoumata', '05/05/1999'),
	(5, 'DAKO', 'Franck', '17/11/1995'),
	(6, 'DJELLOT', 'Oriest', '24/12/1998'),
	(7, 'KONE', 'Faissale', '14/09/1998'),
	(8, 'OULLEGUM', 'Laya', '10/08/1999'),
	(9, 'ROMARIC', 'Saulet', '02/02/2001'),
	(10, 'KOUDOU', 'GBAGBO', '10/11/2000');
/*!40000 ALTER TABLE `lp2info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
