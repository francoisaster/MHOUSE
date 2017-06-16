-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Sam 17 Juin 2017 à 01:10
-- Version du serveur :  10.1.21-MariaDB
-- Version de PHP :  5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `mhouse_bdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `capteurs`
--

CREATE TABLE `capteurs` (
  `id_capteur` int(11) NOT NULL,
  `nom_capteur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `type_capteur` varchar(255) CHARACTER SET utf8 NOT NULL,
  `date_d_ajout` date NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_piece` varchar(255) CHARACTER SET utf8 NOT NULL,
  `marque` varchar(20) NOT NULL,
  `numero_serie` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `capteurs`
--

INSERT INTO `capteurs` (`id_capteur`, `nom_capteur`, `type_capteur`, `date_d_ajout`, `id_utilisateur`, `id_piece`, `marque`, `numero_serie`) VALUES
(38, 'Capteur1', 'Lumiere', '2017-05-17', 2, '1', '', 0),
(2, 'Capteur2', 'Temperature', '2017-05-02', 2, '2', '', 0),
(16, 'dernieressaiaprescmort', 'temperature', '2017-05-20', 2, '2', '', 0),
(17, 'salledebain', 'lumiere', '2017-05-20', 2, '1', '', 0),
(1, 'Cap1', 'lumiere', '2017-06-08', 28, '7', 'casio', 123345);

-- --------------------------------------------------------

--
-- Structure de la table `maison`
--

CREATE TABLE `maison` (
  `id_maison` int(11) NOT NULL,
  `nom` varchar(20) NOT NULL,
  `id_utilisateur` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `maison`
--

INSERT INTO `maison` (`id_maison`, `nom`, `id_utilisateur`) VALUES
(1, 'maisonJean', 2),
(2, 'maisonJean2', 2),
(3, 'Maison1', 28),
(4, 'Maison2', 28),
(5, 'Maison3', 28);

-- --------------------------------------------------------

--
-- Structure de la table `piece`
--

CREATE TABLE `piece` (
  `id_piece` int(11) NOT NULL,
  `nom_piece` varchar(255) NOT NULL,
  `id_utilisateur` int(11) NOT NULL,
  `id_maison` int(11) NOT NULL,
  `superficie` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `piece`
--

INSERT INTO `piece` (`id_piece`, `nom_piece`, `id_utilisateur`, `id_maison`, `superficie`) VALUES
(1, 'Salle de Bain', 2, 1, 0),
(2, 'Salon', 2, 1, 0),
(3, 'sdfsdf', 2, 1, 0),
(6, 'salon', 2, 1, 0),
(5, 'Couloir', 2, 1, 0),
(7, 'Piece1', 28, 3, 123),
(8, 'Piece2', 28, 3, 10);

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `id_utilisateur` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `adresse` varchar(255) NOT NULL,
  `sexe` varchar(255) NOT NULL,
  `date_naissance` date NOT NULL,
  `email` varchar(255) NOT NULL,
  `statut` varchar(11) NOT NULL,
  `numero_tel` varchar(255) NOT NULL,
  `id_parent` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `utilisateur`
--

INSERT INTO `utilisateur` (`id_utilisateur`, `pseudo`, `pass`, `prenom`, `nom`, `adresse`, `sexe`, `date_naissance`, `email`, `statut`, `numero_tel`, `id_parent`) VALUES
(2, 'jean', 'pass', 'jean', 'jean', 'rue des marguerites', 'Homme', '2001-01-01', 'jean@jean.fr', 'client', '0154545454', 0),
(1, 'admin', 'admin', 'admin', 'admin', 'admin', 'homme', '2000-01-01', 'admin@admin.fr', 'admin', '0158585858', 0),
(3, 'junior', 'pass', 'Junior', 'Giraud', '21 Avenue Voltaire Juvisy sur orge', 'homme', '2017-06-13', 'jean.junior@test.fr', 'spectateur', '0164585858', 0),
(28, 'vincent', '03c247e9dacc8ea05da4db7de5ef337cda43da4bdac769aa5bcd5f5a3755c2eb', 'Vincent', 'Giraud', '21 avenue voltaire', 'homme', '1996-11-27', 'vincentert91@hotmail.fr', 'client', '0669045445', NULL),
(29, 'admin', 'a0b2629344f7a1fa1a089f7712697312faf929926e900dbbc19075c81d3ebe42', 'sqsfdsqd', 'sqdfsdf', 'qsfsqdf', 'homme', '1211-02-21', 'qdqsd@sqddsq', 'admin', '0669045446', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `valeurs_capteur`
--

CREATE TABLE `valeurs_capteur` (
  `id_valeur` int(11) NOT NULL,
  `valeur` int(11) NOT NULL,
  `date_mesure` datetime NOT NULL,
  `id_capteur` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Contenu de la table `valeurs_capteur`
--

INSERT INTO `valeurs_capteur` (`id_valeur`, `valeur`, `date_mesure`, `id_capteur`) VALUES
(23, 3983, '2017-06-15 10:45:09', 1),
(2, 4095, '2017-06-15 10:45:18', 1),
(3, 3727, '2017-06-15 10:45:24', 1),
(4, 1, '2017-06-15 10:46:21', 1),
(5, 3974, '2017-06-15 10:46:32', 1),
(6, 1, '2017-06-15 10:49:45', 1),
(7, 4000, '2017-06-15 10:50:40', 1),
(8, 4017, '2017-06-15 10:50:47', 1),
(9, 4021, '2017-06-15 10:51:00', 1),
(10, 3989, '2017-06-15 10:51:39', 1),
(24, 4095, '2017-06-15 10:45:18', 1),
(12, 3986, '2017-06-15 11:08:04', 1),
(13, 3929, '2017-06-15 11:09:06', 1),
(14, 4032, '2017-06-15 11:11:49', 1),
(15, 4032, '2017-06-15 11:13:18', 1),
(16, 4067, '2017-06-15 11:15:53', 1),
(17, 4064, '2017-06-15 11:19:32', 1),
(18, 4065, '2017-06-15 11:19:59', 1),
(21, 4025, '2017-06-15 11:21:31', 1),
(22, 4019, '2017-06-15 11:21:49', 1),
(25, 3727, '2017-06-15 10:45:24', 1),
(26, 1, '2017-06-15 10:46:21', 1),
(27, 3974, '2017-06-15 10:46:32', 1),
(28, 1, '2017-06-15 10:49:45', 1),
(29, 4000, '2017-06-15 10:50:40', 1),
(30, 4017, '2017-06-15 10:50:47', 1),
(31, 4021, '2017-06-15 10:51:00', 1),
(32, 3989, '2017-06-15 10:51:39', 1),
(33, 4043, '2017-06-15 11:00:07', 1),
(34, 3986, '2017-06-15 11:08:04', 1),
(35, 3929, '2017-06-15 11:09:06', 1),
(36, 4032, '2017-06-15 11:11:49', 1),
(37, 4032, '2017-06-15 11:13:18', 1),
(38, 4067, '2017-06-15 11:15:53', 1),
(39, 4064, '2017-06-15 11:19:32', 1),
(40, 4065, '2017-06-15 11:19:59', 1),
(41, 4025, '2017-06-15 11:21:31', 1),
(42, 4019, '2017-06-15 11:21:49', 1);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `capteurs`
--
ALTER TABLE `capteurs`
  ADD PRIMARY KEY (`id_capteur`),
  ADD KEY `id_utilisateur` (`id_utilisateur`),
  ADD KEY `id_piece` (`id_piece`);

--
-- Index pour la table `maison`
--
ALTER TABLE `maison`
  ADD PRIMARY KEY (`id_maison`);

--
-- Index pour la table `piece`
--
ALTER TABLE `piece`
  ADD PRIMARY KEY (`id_piece`),
  ADD KEY `id_utilisateur` (`id_utilisateur`);

--
-- Index pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`id_utilisateur`);

--
-- Index pour la table `valeurs_capteur`
--
ALTER TABLE `valeurs_capteur`
  ADD PRIMARY KEY (`id_valeur`),
  ADD KEY `valeur` (`valeur`),
  ADD KEY `id_capteur` (`id_capteur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `capteurs`
--
ALTER TABLE `capteurs`
  MODIFY `id_capteur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
--
-- AUTO_INCREMENT pour la table `maison`
--
ALTER TABLE `maison`
  MODIFY `id_maison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT pour la table `piece`
--
ALTER TABLE `piece`
  MODIFY `id_piece` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT pour la table `valeurs_capteur`
--
ALTER TABLE `valeurs_capteur`
  MODIFY `id_valeur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
