-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 08 jan. 2021 à 20:24
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(150) NOT NULL,
  `texte` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `publie` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=62 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `articles`
--

INSERT INTO `articles` (`id`, `titre`, `texte`, `date`, `publie`) VALUES
(49, 'Mon premier Article', 'Ceci est le premier article de ce blog afin de tester l\'affichage', '2020-10-14 22:00:00', 1),
(57, 'Mon second article', 'Ceci est le second article de mon blog afin de tester la modification', '2020-12-19 23:00:00', 1),
(58, 'Mon troisième article', 'Ceci est le troisième article de mon blog afin de tester les commentaires', '2020-12-19 23:00:00', 1),
(61, 'Bot', 'Beau oiseau', '2021-01-06 23:00:00', 1);

-- --------------------------------------------------------

--
-- Structure de la table `commentaire`
--

DROP TABLE IF EXISTS `commentaire`;
CREATE TABLE IF NOT EXISTS `commentaire` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_article` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `text` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `commentaire`
--

INSERT INTO `commentaire` (`id`, `id_article`, `pseudo`, `mail`, `text`, `date`) VALUES
(10, 58, 'test', 'test@mail.com', 'test', '2021-01-01 19:59:32'),
(11, 58, 'test', 'test@mail.com', 'test2', '2021-01-05 19:41:06'),
(12, 58, 'test', 'test@mail.com', 'test3', '2021-01-05 19:42:50'),
(13, 49, 'test', 'test@mail.com', 'test', '2021-01-05 19:44:05'),
(14, 57, 'test', 'test@mail.com', 'test', '2021-01-05 19:44:30'),
(15, 57, 'test', 'test@mail.com', 'test2', '2021-01-05 19:45:29'),
(16, 49, 'jean', 'yann@gmail.com', '', '2021-01-07 16:40:24'),
(17, 49, 'yannus', 'yann@gmail.com', '', '2021-01-07 16:45:11'),
(18, 49, 'yann', 'yann@gmail.com', '', '2021-01-08 19:37:04');

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

DROP TABLE IF EXISTS `utilisateurs`;
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `mail` varchar(150) NOT NULL,
  `mdp` text NOT NULL,
  `sid` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `mail`, `mdp`, `sid`) VALUES
(6, 'test', 'test', 'test@mail.com', '$2y$10$K..55JRMp9EDgN5JeoQTiedePiMuGYMrSwwxFHX2uooBzT.fbgKzO', '10dc72161f14537c3fceede5e1479de6'),
(7, 'yann', 'yann', 'yann@gmail.com', '$2y$10$wxLol6Zu6ptW7WqIekJANO5JkKJc1Njls7QXwHf6KXpI3UWISr8KS', '90ca99a72f871cf20bfc9f8dd094df0c');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
