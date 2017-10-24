-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  mer. 04 oct. 2017 à 13:20
-- Version du serveur :  10.1.22-MariaDB
-- Version de PHP :  7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `exercice_3`
--

-- --------------------------------------------------------

--
-- Structure de la table `movies`
--

CREATE TABLE `movies` (
  `id_movies` int(255) NOT NULL,
  `title` varchar(500) NOT NULL,
  `actors` varchar(500) NOT NULL,
  `director` varchar(500) NOT NULL,
  `producer` varchar(500) NOT NULL,
  `year_of_prod` year(4) NOT NULL,
  `language` varchar(500) NOT NULL,
  `category` enum('Comedie','Horreur','Drame','Documentaire') NOT NULL,
  `storyline` text NOT NULL,
  `video` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='table contenant les films du cinema';

--
-- Déchargement des données de la table `movies`
--

INSERT INTO `movies` (`id_movies`, `title`, `actors`, `director`, `producer`, `year_of_prod`, `language`, `category`, `storyline`, `video`) VALUES
(1, 'Titanic', 'Kate Winslet', 'James Cameron', 'Arthur Watch', 1987, 'Anglais', 'Drame', 'C\'est un bateau qui coule, trop triste.', 'http://video.titanic.com'),
(2, 'Prisonners', 'Hugh Jackman', 'Denis Villeneuve', 'Alcon', 2013, 'Anglais', 'Drame', 'Deux fillettes sont enlevÃ©es ', 'http://video.prisoners.com'),
(3, 'Shrek', 'Eddie Murphy', 'Andrew Adamson', 'Dreamwork', 2001, 'Anglais', 'Comedie', 'Un ogre vit tout seul dans son marais', 'http://video.shrek.com'),
(4, 'Super Size Me', 'Morgan Spurlock', 'Morgan Spurlock', 'Morgan Spurlock', 2004, 'Anglais', 'Documentaire', 'Un homme mange matin, midi et soir au macdo pendant un mois et devient malade', 'http://video.macdo.com');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id_movies`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `movies`
--
ALTER TABLE `movies`
  MODIFY `id_movies` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
