-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  mar. 07 avr. 2020 à 10:20
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
-- Base de données :  `association2`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `login_admin` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password_admin` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id_admin`, `login_admin`, `password_admin`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Structure de la table `appartenir`
--

DROP TABLE IF EXISTS `appartenir`;
CREATE TABLE IF NOT EXISTS `appartenir` (
  `idEleve` int(11) NOT NULL,
  `idNiveau` int(11) NOT NULL,
  KEY `FK_id_eleve` (`idEleve`),
  KEY `FK_id_niveau` (`idNiveau`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `civilite`
--

DROP TABLE IF EXISTS `civilite`;
CREATE TABLE IF NOT EXISTS `civilite` (
  `id_civilite` int(11) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_civilite`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

DROP TABLE IF EXISTS `cours`;
CREATE TABLE IF NOT EXISTS `cours` (
  `id_cours` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_cours` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `telechargement` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `horaire` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_professeur` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`),
  KEY `cours_professeur_FK` (`id_professeur`),
  KEY `cours_niveau0_FK` (`id_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `libelle_cours`, `date`, `telechargement`, `horaire`, `id_professeur`, `id_niveau`) VALUES
(14, 'les animaux', '2020-04-08', './images/', '18h', 2, 1),
(19, 'les chiffres', '2020-03-19', './images/', '18h', 1, 1),
(20, 'les nombres', '2020-04-16', './images/', '14h', 1, 4);

-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

DROP TABLE IF EXISTS `eleve`;
CREATE TABLE IF NOT EXISTS `eleve` (
  `id_eleve` int(11) NOT NULL AUTO_INCREMENT,
  `nom_eleve` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prenom_eleve` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pass` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `langue_maternelle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci,
  `inscrit` tinyint(1) NOT NULL,
  `id_civilite` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code_activation` text COLLATE utf8mb4_unicode_ci,
  `nb_cours` int(11) DEFAULT '15',
  PRIMARY KEY (`id_eleve`)
) ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `eleve`
--

INSERT INTO `eleve` (`id_eleve`, `nom_eleve`, `prenom_eleve`, `mail`, `pass`, `langue_maternelle`, `message`, `inscrit`, `id_civilite`, `code_activation`, `nb_cours`) VALUES
(1, 'Dupont', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '', 0),
(3, 'Jerome', 'Durant', '', NULL, 'franÃ§ais', '', 0, 'homme', NULL, 0),
(4, 'Dupont', 'Marion2', '', NULL, 'anglais', '', 0, 'femme', '', 0),
(5, 'testactivation', 'Lola', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585121511', 0),
(6, 'test2activation', 'Lolalou', '', NULL, 'allemand', '', 0, 'femme', '1585121576', 0),
(7, 'Jerome', 'Marion', '', NULL, 'anglais', '', 0, 'homme', '1585121764', 0),
(8, 'testactivation', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585121974', 0),
(9, 'testactivation', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585122083', 0),
(10, 'testactivation', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585122428', 0),
(11, 'Dupont', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585122436', 0),
(12, 'Dupont', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585122448', 0),
(13, 'Dupont', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585122483', 0),
(14, 'Dupont', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '1585122491', 0),
(15, '', '', '', NULL, '', '', 0, '', '1585122510', 0),
(16, '', '', '', NULL, '', '', 0, '', '1585122602', 0),
(17, '', '', '', NULL, '', '', 0, '', '1585122735', 0),
(18, '', '', '', NULL, '', '', 0, '', 'c2dbd666940775e1f033d5762fc70ec4', 0),
(19, 'Dupont', 'Marion', '', NULL, 'franÃ§ais', '', 0, 'femme', '9994e80ae0c65421d6f93541f08235bf', 0),
(20, '', '', '', NULL, '', 'Question', 0, 'femme', '7059bd97a529f605b8bb3ca380e5ff02', 0),
(21, 'testMail', 'Mailprenom', '', NULL, 'anglais', 'test', 0, 'femme', '8673669a7bf9c21a54a7486b133b82e5', 0),
(22, 'testMail', 'Mailprenom', '', NULL, 'anglais', 'test', 0, 'femme', '76f7160fd9c8bfe9765e9853911f462a', 0),
(23, 'fdgxgfdfg', 'xdffdgxfd', '', NULL, 'dfdf', 'dfxgxdgfgdf', 0, 'femme', 'c0026de5fe80da3d8b008144a6cd4f5f', 0),
(24, 'xcvcx', 'xxvxffddg', '', NULL, 'dg', 'dgdg', 0, 'femme', 'aa266e6ee2bbe3bca1a0ca7067da0747', 0),
(25, 'Laurence', 'Jambon', '', NULL, 'anglais', 'dfxdg', 0, 'femme', '0fcbb28e78b512114a36b33126a59ddf', 0),
(26, 'Laurence', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rsdgrgrgdgr', 0, 'femme', '673312b0c28972047d31b1b0edb58669', 0),
(27, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '008596f175cbe17ae7303e07edc227a4', 0),
(28, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'eaa59e2fcf89001d654010f72043c56f', 0),
(29, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'da6ed2404c9b46863d4333240c082b43', 0),
(30, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'f0eccc4f9c6f9b940ed7f94173472821', 0),
(31, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'a9f3bd345796fc141c76b1f5567a0bda', 0),
(32, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '99ba5e1133dddf3940da0e820a93cdd6', 0),
(33, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '4b50ca5add5a03ebd8b8813cf003b2d1', 0),
(34, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'c32743cbc0b1a622e9430d4e40774d9b', 0),
(35, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'a2c3d5a568feebfc53d321bbef15ddf3', 0),
(36, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'dfa3fb8b86f0c32d0d184bbe9466ccaa', 0),
(37, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '4178179f41ae21568c4e58986beabd05', 0),
(38, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '4b09aaaa75f70bc665f0f2114ffd82d4', 0),
(39, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '9d9e00b47100224ec37d8402f4a341a5', 0),
(40, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '4ce235c660899ef9d748f7167f2e0ac3', 0),
(41, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '8635e55fbe6b3421b8e9f21a6d3376d7', 0),
(42, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '55e5ad4be5c1f32040ddad9657add8c9', 0),
(43, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'ec4cfe0fb000530ac2328a83fe7d88a5', 0),
(44, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '833d82bff47131c884454ae4b22b917e', 0),
(45, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '2c6e9b00142d6fd1b08ddd1c21cfa880', 0),
(46, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'af5d986fee8d62e09e5e21dfef3a01d3', 0),
(47, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '48d15491d6f4dfd3688533a4dd4373ec', 0),
(48, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '079c453d6871c36ba7b7e01f4bb84814', 0),
(49, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '25a8be40cf034397b1ac4514b132d776', 0),
(50, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '6aa274aeca3fc93cfd3b2f00fd333c95', 0),
(51, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', 'fe5793c28dce4ff2358cc7a8ae4898ec', 0),
(52, '', 'Jambon', 'mail@gmail.com', NULL, 'anglais', 'rdgddg', 0, 'femme', '4fa1fb03d351067c31a2f7a7f00ac471', 0);

-- --------------------------------------------------------

--
-- Structure de la table `inscription`
--

DROP TABLE IF EXISTS `inscription`;
CREATE TABLE IF NOT EXISTS `inscription` (
  `id_cours` int(11) NOT NULL,
  `id_eleve` int(11) NOT NULL,
  PRIMARY KEY (`id_cours`,`id_eleve`),
  KEY `inscription_eleve0_FK` (`id_eleve`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

DROP TABLE IF EXISTS `niveau`;
CREATE TABLE IF NOT EXISTS `niveau` (
  `id_niveau` int(11) NOT NULL AUTO_INCREMENT,
  `libelle_niveau` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_niveau`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `libelle_niveau`) VALUES
(1, 'it_debutant'),
(2, 'it_intermediaire'),
(3, 'it_avance'),
(4, 'fr_debutant'),
(5, 'fr_intermediaire'),
(6, 'fr_avance');

-- --------------------------------------------------------

--
-- Structure de la table `professeur`
--

DROP TABLE IF EXISTS `professeur`;
CREATE TABLE IF NOT EXISTS `professeur` (
  `id_professeur` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matiere` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `login` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id_professeur`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `professeur`
--

INSERT INTO `professeur` (`id_professeur`, `nom`, `prenom`, `matiere`, `login`, `password`) VALUES
(1, 'Zacchedu', 'Alice', 'italien', 'Zacchedu', 'passe'),
(2, 'Garnier', 'Florent', 'français', 'Garnier', 'passe');

-- --------------------------------------------------------

--
-- Structure de la table `telechargement`
--

DROP TABLE IF EXISTS `telechargement`;
CREATE TABLE IF NOT EXISTS `telechargement` (
  `id_telecharment` int(11) NOT NULL AUTO_INCREMENT,
  `niveau` int(11) NOT NULL,
  `contenu` text COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id_telecharment`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `telechargement`
--

INSERT INTO `telechargement` (`id_telecharment`, `niveau`, `contenu`) VALUES
(11, 4, './images/ModÃ©lisation.pdf'),
(12, 4, './images/LivreMerisePDF-total-12sept14.pdf'),
(13, 4, './images/LivreMerisePDF-total-12sept14.pdf'),
(14, 4, './images/LivreMerisePDF-total-12sept14.pdf'),
(15, 4, './images/LivreMerisePDF-total-12sept14.pdf'),
(16, 4, './images/LivreMerisePDF-total-12sept14.pdf'),
(17, 4, './images/LivreMerisePDF-total-12sept14.pdf'),
(18, 4, './images/LivreMerisePDF-total-12sept14.pdf');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `appartenir`
--
ALTER TABLE `appartenir`
  ADD CONSTRAINT `FK_id_eleve` FOREIGN KEY (`idEleve`) REFERENCES `eleve` (`id_eleve`),
  ADD CONSTRAINT `FK_id_niveau` FOREIGN KEY (`idNiveau`) REFERENCES `niveau` (`id_niveau`);

--
-- Contraintes pour la table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_niveau0_FK` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`),
  ADD CONSTRAINT `cours_professeur_FK` FOREIGN KEY (`id_professeur`) REFERENCES `professeur` (`id_professeur`);

--
-- Contraintes pour la table `inscription`
--
ALTER TABLE `inscription`
  ADD CONSTRAINT `inscription_cours_FK` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
  ADD CONSTRAINT `inscription_eleve0_FK` FOREIGN KEY (`id_eleve`) REFERENCES `eleve` (`id_eleve`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
