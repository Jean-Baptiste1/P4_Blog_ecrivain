-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mer. 21 août 2019 à 16:58
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `p4_livre`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

DROP TABLE IF EXISTS `chapitre`;
CREATE TABLE IF NOT EXISTS `chapitre` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `titre` char(64) NOT NULL,
  `contenu` text NOT NULL,
  `image` char(64) NOT NULL,
  `dateAjout` timestamp NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `titre`, `contenu`, `image`, `dateAjout`) VALUES
(1, 'Chapitre 1', 'Le Lorem Ipsum est simplement du faux texte employé dall\'hjkhkj l\'jkhjlk l\'hjkghkjg', 'chapitre1', '2019-08-21 13:46:31'),
(3, 'Chapitre 3', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', 'chapitre3', '2019-08-21 13:47:25'),
(4, 'Chapitre 4', 'Contrairement à une opinion répandue, le Lorem Ipsum n\'est pas simplement du texte aléatoire. Il trouve ses racines dans une oeuvre de la littérature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est intéressé à un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en étudiant tous les usages de ce mot dans la littérature classique, découvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du &quot;De Finibus Bonorum et Malorum&quot; (Des Suprêmes Biens et des Suprêmes Maux) de Cicéron. Cet ouvrage, très populaire pendant la Renaissance, est un traité sur la théorie de l\'éthique. Les premières lignes du Lorem Ipsum, &quot;Lorem ipsum dolor sit amet...&quot;, proviennent de la section 1.10.32.', 'chapitre4', '2019-08-21 13:47:49'),
(23, 'Chapitre 99', '&lt;p&gt;hy\'.\'\'\'\'\'\' k\'k\'k\'k\'k\'k\'k\'k&lt;/p&gt;', 'chapitre9', '2019-08-21 16:50:44'),
(24, 'Chapitre 99', '&lt;p&gt;ttttttttttttttttttttttttttttt&lt;/p&gt;', 'chapitre99', '2019-08-21 16:52:12'),
(19, 'Chapitre 12', '&lt;p&gt;test&lt;/p&gt;', 'chapitre99', '2019-08-21 16:51:00'),
(21, 'Chapitre 125', 'test999', 'chapitre99', '2019-08-21 13:32:01'),
(16, 'Chapitre 9', 'test', 'chapitre9', '2019-08-19 12:41:50');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `pseudo` char(16) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `dateAjout` timestamp NOT NULL,
  `signalement` tinyint(1) NOT NULL DEFAULT '0',
  `id_chapitre` int(10) NOT NULL,
  PRIMARY KEY (`id`,`id_chapitre`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `contenu`, `dateAjout`, `signalement`, `id_chapitre`) VALUES
(10, 'jean-baptiste', 'tout ça', '2019-08-19 12:43:08', 1, 7),
(9, 'jean-baptiste', 'tout ça', '2019-08-19 12:43:04', 1, 7),
(20, '', '', '2019-08-20 07:59:43', 0, 1),
(15, 'jean-baptiste', 'tout ça', '2019-08-19 16:55:36', 0, 1),
(12, 'jean-baptiste', 'tout ça', '2019-08-19 12:43:16', 0, 4),
(13, 'jean-baptiste', 'tout ça', '2019-08-19 12:43:19', 0, 4),
(28, 'admin', 'aa', '2019-08-21 16:44:50', 0, 1),
(18, 'jean-baptiste', 'tout ça', '2019-08-19 17:15:01', 1, 6),
(22, '', '&lt;html&gt;', '2019-08-20 08:00:01', 1, 1),
(23, 'select', 'aa', '2019-08-20 08:01:46', 1, 1),
(24, '0', 'tout ça', '2019-08-19 22:00:00', 1, 20),
(25, 'jean-baptiste', 'alert(\'C\\\'est une faille XSS qu\\\'on a là\')', '2019-08-19 22:00:00', 0, 20);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
