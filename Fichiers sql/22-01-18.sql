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


-- Listage de la structure de la base pour article
CREATE DATABASE IF NOT EXISTS `journal` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `journal`;

-- Listage de la structure de la table article. livres
CREATE TABLE IF NOT EXISTS `livres` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` longtext COLLATE utf8mb4_unicode_ci,
  `lien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Listage des données de la table article.livres : ~2 rows (environ)
/*!40000 ALTER TABLE `livres` DISABLE KEYS */;
INSERT INTO `livres` (`id`, `nom`, `image`, `resume`, `lien`) VALUES
	(1, 'Les Témoins du Temps', 'Les témoins du temps.jpg', 'Leslie est une jeune femme comme les autres, du moins c’est ce qu’elle croit...<br>\r\nSans le savoir, elle possède certaines capacités hors normes dont elle se sert pour aider les gens, parfois même en leur sauvant la vie. <br>\r\nC’est ce qui lui vaut d’être repérée par le colonel Campbell. Après l’avoir observée à chaque moment crucial de sa vie, il décide de lui proposer de se joindre à son équipe d’élite. Leur objectif : étudier mais surtout protéger le temps.<br>\r\nSceptique au début, Leslie se laissera pourtant convaincre de le suivre et se retrouvera plongée dans un conflit temporel sans précédent.<br>\r\nCar un redoutable ennemi disparu depuis près d’un millénaire refait surface, bien décidé à modifier le passé à son avantage. Un groupuscule qui ne recule devant rien.<br>\r\nLa Confrérie des Assassins', 'https://www.amazon.fr/T%C3%A9moins-du-Temps-Damien-Bournac/dp/1445263106'),
	(2, 'La Quête', 'La Quête.jpg', '2040.<br>\r\nLa planète est à l’agonie, l’humanité se sait condamnée.\r\nC’est alors qu’Alan Mestre, célèbre milliardaire et président de la société EnCom spécialisée dans la conquête spatiale, fait une déclaration très surprenante.<br> \r\nIl affirme que depuis une décennie, et dans le plus grand secret, les dirigeants les plus puissants du monde se sont unis pour lui demander de réaliser un projet aussi impensable que désespéré : préparer une autre planète, Mars, à accueillir une colonie, et offrir un nouveau départ à l’humanité.\r\n<br>\r\nAinsi, dans le but de trouver celui ou celle qui méritera l\'honneur de prendre le contrôle de cette expédition, Alan Mestre annonce en direct l’organisation d’un tournoi planétaire auquel n’importe qui pourra participer. \r\nUn concours démesuré qui poussera les concurrents à parcourir le monde.<br>\r\nUne compétition exceptionnelle remplie d’énigmes et de monuments historiques.<br>\r\nLa plus incroyable course jamais créée.<br>\r\nLa Quête.', 'https://www.amazon.fr/Qu%C3%AAte-Damien-Bournac/dp/1326873989');
/*!40000 ALTER TABLE `livres` ENABLE KEYS */;

-- Listage de la structure de la table journal. migration_versions
CREATE TABLE IF NOT EXISTS `migration_versions` (
  `version` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Listage des données de la table journal.migration_versions : ~1 rows (environ)
/*!40000 ALTER TABLE `migration_versions` DISABLE KEYS */;
INSERT INTO `migration_versions` (`version`) VALUES
	('20190122135126');
/*!40000 ALTER TABLE `migration_versions` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
