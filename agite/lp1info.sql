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

-- Listage de la structure de la table agitel. lp1info
CREATE TABLE IF NOT EXISTS `lp1info` (
  `code` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `date_naissance` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table agitel.lp1info : ~13 rows (environ)
/*!40000 ALTER TABLE `lp1info` DISABLE KEYS */;
INSERT INTO `lp1info` (`code`, `nom`, `prenom`, `date_naissance`) VALUES
	(1, 'YROWAH', 'Kassi Aime Franck', '13/09/1996'),
	(2, 'YOBOUET', 'Affran Emmerson Morel', '22/01/1998'),
	(3, 'COULIBALY ', 'Kouakou Jean Narcisse', '23/10/1'),
	(4, 'GLEHI', 'Kadelaure Maxence', '05/05/1999'),
	(5, 'GNANAGO ', 'Igninda Jean-Christian', '17/11/1995'),
	(6, 'GNETO', 'Mariam Nadia ', '24/12/1998'),
	(7, 'KARIMOU ', 'Donikan Louis-Martin', '29/09/1998'),
	(8, 'SORO', ' Zie Souleymane  Franck Herman', '00/00/0000'),
	(9, 'WOROU', 'Kouakou Moussa', '14/10/1992'),
	(10, 'TRAORE', 'N\'dassenan Loic Harold Mehdy', '00/00/0000'),
	(11, 'OMEGBA', 'Bemai Ibrahim', '18/12/1996'),
	(12, 'PENE', 'Cedric David Aymeric', '28/08/1998'),
	(13, 'SAVANE', 'Seidou', '17/07/1997');
/*!40000 ALTER TABLE `lp1info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
