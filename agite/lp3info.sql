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

-- Listage de la structure de la table agitel. lp3info
CREATE TABLE IF NOT EXISTS `lp3info` (
  `code` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(200) NOT NULL,
  `date_naissance` varchar(20) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Listage des données de la table agitel.lp3info : ~24 rows (environ)
/*!40000 ALTER TABLE `lp3info` DISABLE KEYS */;
INSERT INTO `lp3info` (`code`, `nom`, `prenom`, `date_naissance`) VALUES
	(1, 'ADE ', 'Kassi Aime Franck', '13/09/1996'),
	(2, 'AKE ', 'Affran Emmerson Morel', '22/01/1998'),
	(3, 'COULIBALY ', 'Yerhongon Abraham Ely', '23/10/1'),
	(4, 'GLEHI', ' Bi Raimond', '05/05/1999'),
	(5, 'GNANAGO ', 'Aime Brice Cesar', '17/11/1995'),
	(6, 'GNETO', ' Leandre Achille', '24/12/1998'),
	(7, 'KARIMOU ', 'Yannick Kader Wesley', '29/09/1998'),
	(8, 'KLANNIEGBEU', ' Zie Souleymane  Franck Herman', '00/00/0000'),
	(9, 'KOBENAN', 'Kouakou Moussa', '14/10/1992'),
	(10, 'KONNAN', 'N\'dassenan Loic Harold Mehdy', '00/00/0000'),
	(11, 'KONATE', 'Bemai Ibrahim', '18/12/1996'),
	(12, 'KONATE', 'N\'vakaba Souib Mounir', '28/08/1998'),
	(13, 'KOUASSI', 'Amoita Nicolas', '17/07/1997'),
	(14, 'KPARO', 'Yedo Maximilien', '27/06/1997'),
	(15, 'MELAGNE ', 'Nigue Samuel', '31/03/1995'),
	(16, 'N\'DRI', 'N\'guessan Anne-Marie', '22/09/1992'),
	(17, 'OMEGBA', 'Emmanuelle Prisca ', '20/03/1996'),
	(18, 'PENE', 'Cedric David Aymeric', '15/12/1998'),
	(19, 'SAVANE', 'Seidou', '17/03/1994'),
	(20, 'SORO', 'Donikan Louis-Martin', '15/07/1999'),
	(21, 'TRAORE', 'Mariam Nadia ', '13/05/1999'),
	(22, 'WOROU', 'Igninda Jean-Christian', '21/03/1999'),
	(23, 'YOBOUET', 'Kouakou Jean Narcisse', '30/01/0000'),
	(24, 'YROWAH', 'Kadelaure Maxence', '30/03/1996');
/*!40000 ALTER TABLE `lp3info` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
