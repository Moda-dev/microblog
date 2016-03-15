-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mar 15 Mars 2016 à 23:13
-- Version du serveur :  10.1.10-MariaDB
-- Version de PHP :  5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `microblog`
--

-- --------------------------------------------------------

--
-- Structure de la table `utilisateurs`
--

CREATE TABLE `utilisateurs` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'Identifiant unique dans la base',
  `login` varchar(32) COLLATE utf8_bin NOT NULL COMMENT 'identifiant de connexion',
  `nom` varchar(64) COLLATE utf8_bin DEFAULT NULL COMMENT 'nom de l’utilisateur',
  `prenom` varchar(64) COLLATE utf8_bin DEFAULT NULL COMMENT 'prénom de l’utilisateur',
  `motdepasse` tinytext COLLATE utf8_bin NOT NULL COMMENT 'mot de passe de connexion (devrait être chiffré)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Les utilisateurs';

--
-- Contenu de la table `utilisateurs`
--

INSERT INTO `utilisateurs` (`id`, `login`, `nom`, `prenom`, `motdepasse`) VALUES
(1, 'admin', 'Monget', 'David', 'd033e22ae348aeb5660fc2140aec35850c4da997'),
(2, 'bricobob', 'lebricoleur', 'bob', 'e38c3644f5de1357ab78152f8fa4c70619e9f2ce'),
(3, 'explodora', 'lexploratrice', 'dora', '25b63874f12887d5052578d6e2253480e4d24ece');

--
-- Index pour les tables exportées
--

--
-- Index pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `utilisateurs`
--
ALTER TABLE `utilisateurs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Identifiant unique dans la base', AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
