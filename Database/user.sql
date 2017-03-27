-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Client :  127.0.0.1
-- Généré le :  Lun 27 Mars 2017 à 11:21
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

--
-- Index pour les tables exportées
--

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
