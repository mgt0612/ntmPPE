-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Mars 2017 à 11:24
-- Version du serveur :  5.7.14
-- Version de PHP :  5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `ntmppe`
--

-- --------------------------------------------------------

--
-- Structure de la table `adherent`
--

CREATE TABLE `adherent` (
  `id` int(11) NOT NULL,
  `dateI` date NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `adherent`
--

INSERT INTO `adherent` (`id`, `dateI`, `idProd`) VALUES
(19, '2016-12-07', 24),
(20, '2017-03-15', 3),
(21, '2017-03-15', 4),
(22, '2017-03-22', 5),
(23, '2017-03-22', 6),
(24, '2017-03-26', 7),
(25, '2017-03-27', 8),
(26, '2017-03-27', 9),
(27, '2017-03-27', 10),
(28, '2017-03-27', 11);

-- --------------------------------------------------------

--
-- Structure de la table `certification`
--

CREATE TABLE `certification` (
  `id` int(11) NOT NULL,
  `codeC` varchar(20) NOT NULL,
  `libC` text NOT NULL,
  `idAdh` int(11) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `certification`
--

INSERT INTO `certification` (`id`, `codeC`, `libC`, `idAdh`, `idProd`) VALUES
(1, 'LabAgriBio', 'Label Agriculture Biologique', 19, 24),
(2, 'LabAgriBio', 'Label Agriculture Biologique', 20, 3),
(3, 'LabAgriBio', 'Label Agriculture Biologique', 21, 4),
(4, 'LabAgriBio', 'Label Agriculture Biologique', 22, 5),
(5, 'LabAgriBio', 'Label Agriculture Biologique', 24, 7),
(6, 'LabAgriBio', 'Label Agriculture Biologique', 25, 8),
(7, 'LabAgriBio', 'Label Agriculture Biologique', 26, 9),
(8, 'LabAgriBio', 'Label Agriculture Biologique', 27, 10);

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id` int(11) NOT NULL,
  `date` date NOT NULL,
  `idCli` int(11) NOT NULL,
  `idLP` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `commande`
--

INSERT INTO `commande` (`id`, `date`, `idCli`, `idLP`) VALUES
(6, '2017-03-27', 7, 15),
(7, '2017-03-27', 7, 16),
(8, '2017-03-27', 7, 19);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `idLivraison` int(11) NOT NULL,
  `date` date NOT NULL,
  `type` varchar(50) NOT NULL,
  `qte` int(11) NOT NULL,
  `idVerger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `livraison`
--

INSERT INTO `livraison` (`idLivraison`, `date`, `type`, `qte`, `idVerger`) VALUES
(1, '2017-03-27', 'Franquette', 100, 9),
(2, '2017-03-27', 'Franquette', 1000, 13),
(3, '2017-03-27', 'Mayette', 500, 11),
(4, '2017-03-27', 'Parisienne', 10000, 12),
(5, '2017-03-27', 'Franquette', 500, 9),
(6, '2017-03-27', 'fraiche', 100, 9),
(7, '2017-03-27', 'fraiche', 1000, 11),
(8, '2017-03-27', 'fraiche', 478, 11),
(9, '2017-03-27', 'fraiche', 900, 11),
(10, '2017-03-27', 'seche', 500, 11);

-- --------------------------------------------------------

--
-- Structure de la table `lotprod`
--

CREATE TABLE `lotprod` (
  `id` int(11) NOT NULL,
  `annee` int(11) NOT NULL,
  `qte` int(11) NOT NULL,
  `calibre` varchar(20) NOT NULL,
  `idVerger` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `lotprod`
--

INSERT INTO `lotprod` (`id`, `annee`, `qte`, `calibre`, `idVerger`) VALUES
(19, 2017, 250, 'petit', 1),
(23, 2017, 300, 'petit', 11),
(24, 2017, 300, 'moyen', 11),
(25, 2017, 300, 'grand', 11),
(26, 2017, 125, 'petit', 11),
(27, 2017, 187, 'moyen', 11),
(28, 2017, 188, 'grand', 11);

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `tel` varchar(10) NOT NULL,
  `mdp` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `nomrespprod` varchar(50) NOT NULL,
  `prenomrespprod` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `nom`, `prenom`, `adresse`, `tel`, `mdp`, `role`, `nomrespprod`, `prenomrespprod`) VALUES
(6, 'd', 'd', 'd', '658989878', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'client', 'd', 'd'),
(3, 'Domingo', 'Tom', 'a', '0659897046', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'client', 'Zer', 'test'),
(5, 'Chraibi', 'b', 'b', '605050505', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'producteur', 'b', 'b'),
(7, 'f', 'f', 'f', '5', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'client', 'f', 'f'),
(8, 'z', 'z', 'z', 'z', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'producteur', 'z', 'z'),
(9, 'z', 'z', 'z', 'z', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'producteur', 'z', 'z'),
(10, 'e', 'e', 'e', 'e', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'producteur', 'e', 'e'),
(11, 'h', 'h', 'h', 'h', '73de13cf365ff2b5ddfbc96078305cef8fdc2990', 'client', 'h', 'h');

-- --------------------------------------------------------

--
-- Structure de la table `verger`
--

CREATE TABLE `verger` (
  `id` int(11) NOT NULL,
  `variete` varchar(20) NOT NULL,
  `superficie` int(11) NOT NULL,
  `densite` int(11) NOT NULL,
  `localisation` varchar(50) NOT NULL,
  `idProd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Contenu de la table `verger`
--

INSERT INTO `verger` (`id`, `variete`, `superficie`, `densite`, `localisation`, `idProd`) VALUES
(11, 'Mayette', 640, 14, 'Bangkok', 8),
(13, 'Franquette', 500, 14, 'ArmentiÃ¨re', 10);

--
-- Index pour les tables exportées
--

--
-- Index pour la table `adherent`
--
ALTER TABLE `adherent`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `certification`
--
ALTER TABLE `certification`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`idLivraison`);

--
-- Index pour la table `lotprod`
--
ALTER TABLE `lotprod`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Index pour la table `verger`
--
ALTER TABLE `verger`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `adherent`
--
ALTER TABLE `adherent`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `certification`
--
ALTER TABLE `certification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT pour la table `livraison`
--
ALTER TABLE `livraison`
  MODIFY `idLivraison` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT pour la table `lotprod`
--
ALTER TABLE `lotprod`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `verger`
--
ALTER TABLE `verger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
