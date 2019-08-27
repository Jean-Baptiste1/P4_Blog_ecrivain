-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mar. 27 août 2019 à 14:46
-- Version du serveur :  10.0.38-MariaDB-0+deb8u1
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projetsOC`
--

-- --------------------------------------------------------

--
-- Structure de la table `chapitre`
--

CREATE TABLE `chapitre` (
  `id` int(10) NOT NULL,
  `titre` char(64) NOT NULL,
  `contenu` text NOT NULL,
  `image` char(64) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `chapitre`
--

INSERT INTO `chapitre` (`id`, `titre`, `contenu`, `image`, `dateAjout`) VALUES
(1, 'Chapitre 1', 'On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et empêche de se concentrer sur la mise en page elle-même. L\'avantage du Lorem Ipsum sur un texte générique comme \'Du texte. Du texte. Du texte.\' est qu\'il possède une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du français standard. De nombreuses suites logicielles de mise en page ou éditeurs de sites Web ont fait du Lorem Ipsum leur faux texte par défaut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'à leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).', 'chapitre1', '2019-08-22 14:12:30'),
(3, 'Chapitre 2', '&lt;p&gt;On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&amp;ecirc;che de se concentrer sur la mise en page elle-m&amp;ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&amp;eacute;n&amp;eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&amp;egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&amp;ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &amp;eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&amp;eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&amp;agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).&lt;/p&gt;', 'chapitre2', '2019-08-22 11:49:09'),
(4, 'Chapitre 3', '&lt;p&gt;Contrairement &amp;agrave; une opinion r&amp;eacute;pandue, le Lorem Ipsum n\'est pas simplement du texte al&amp;eacute;atoire. Il trouve ses racines dans une oeuvre de la litt&amp;eacute;rature latine classique datant de 45 av. J.-C., le rendant vieux de 2000 ans. Un professeur du Hampden-Sydney College, en Virginie, s\'est int&amp;eacute;ress&amp;eacute; &amp;agrave; un des mots latins les plus obscurs, consectetur, extrait d\'un passage du Lorem Ipsum, et en &amp;eacute;tudiant tous les usages de ce mot dans la litt&amp;eacute;rature classique, d&amp;eacute;couvrit la source incontestable du Lorem Ipsum. Il provient en fait des sections 1.10.32 et 1.10.33 du &quot;De Finibus Bonorum et Malorum&quot; (Des Supr&amp;ecirc;mes Biens et des Supr&amp;ecirc;mes Maux) de Cic&amp;eacute;ron. Cet ouvrage, tr&amp;egrave;s populaire pendant la Renaissance, est un trait&amp;eacute; sur la th&amp;eacute;orie de l\'&amp;eacute;thique. Les premi&amp;egrave;res lignes du Lorem Ipsum, &quot;Lorem ipsum dolor sit amet...&quot;, proviennent de la section 1.10.32.&lt;/p&gt;', 'chapitre3', '2019-08-22 11:49:31'),
(23, 'Chapitre 7', '&lt;p&gt;On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&amp;ecirc;che de se concentrer sur la mise en page elle-m&amp;ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&amp;eacute;n&amp;eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&amp;egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&amp;ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &amp;eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&amp;eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&amp;agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).&lt;/p&gt;', 'chapitre7', '2019-08-22 11:50:31'),
(24, 'Chapitre 8', '&lt;p&gt;On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&amp;ecirc;che de se concentrer sur la mise en page elle-m&amp;ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&amp;eacute;n&amp;eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&amp;egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&amp;ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &amp;eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&amp;eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&amp;agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).&lt;/p&gt;', 'chapitre8', '2019-08-22 11:50:44'),
(19, 'Chapitre 5', '&lt;p&gt;On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&amp;ecirc;che de se concentrer sur la mise en page elle-m&amp;ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&amp;eacute;n&amp;eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&amp;egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&amp;ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &amp;eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&amp;eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&amp;agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).&lt;/p&gt;', 'chapitre5', '2019-08-22 11:50:08'),
(21, 'Chapitre 6', '&lt;p&gt;On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&amp;ecirc;che de se concentrer sur la mise en page elle-m&amp;ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&amp;eacute;n&amp;eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&amp;egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&amp;ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &amp;eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&amp;eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&amp;agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).&lt;/p&gt;', 'chapitre6', '2019-08-22 11:50:20'),
(16, 'Chapitre 4', '&lt;p&gt;On sait depuis longtemps que travailler avec du texte lisible et contenant du sens est source de distractions, et emp&amp;ecirc;che de se concentrer sur la mise en page elle-m&amp;ecirc;me. L\'avantage du Lorem Ipsum sur un texte g&amp;eacute;n&amp;eacute;rique comme \'Du texte. Du texte. Du texte.\' est qu\'il poss&amp;egrave;de une distribution de lettres plus ou moins normale, et en tout cas comparable avec celle du fran&amp;ccedil;ais standard. De nombreuses suites logicielles de mise en page ou &amp;eacute;diteurs de sites Web ont fait du Lorem Ipsum leur faux texte par d&amp;eacute;faut, et une recherche pour \'Lorem Ipsum\' vous conduira vers de nombreux sites qui n\'en sont encore qu\'&amp;agrave; leur phase de construction. Plusieurs versions sont apparues avec le temps, parfois par accident, souvent intentionnellement (histoire d\'y rajouter de petits clins d\'oeil, voire des phrases embarassantes).&lt;/p&gt;', 'chapitre4', '2019-08-22 11:50:03');

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

CREATE TABLE `commentaire` (
  `id` int(10) NOT NULL,
  `pseudo` char(16) NOT NULL,
  `contenu` varchar(255) NOT NULL,
  `dateAjout` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `signalement` tinyint(1) NOT NULL DEFAULT '0',
  `id_chapitre` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `pseudo`, `contenu`, `dateAjout`, `signalement`, `id_chapitre`) VALUES
(87, 'Jacques', 'Super !', '2019-08-27 14:28:51', 0, 24),
(59, 'jean-baptiste', 'super chapitre !', '2019-08-27 14:27:57', 1, 1),
(60, 'jean-baptiste', 'super', '2019-08-27 14:18:47', 0, 1);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `chapitre`
--
ALTER TABLE `chapitre`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commentaire`
--
ALTER TABLE `commentaire`
  ADD PRIMARY KEY (`id`,`id_chapitre`) USING BTREE;

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `chapitre`
--
ALTER TABLE `chapitre`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT pour la table `commentaire`
--
ALTER TABLE `commentaire`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
