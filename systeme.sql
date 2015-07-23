-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Mer 15 Juillet 2015 à 20:51
-- Version du serveur :  5.6.20
-- Version de PHP :  5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `systeme`
--

-- --------------------------------------------------------

--
-- Structure de la table `cours`
--

CREATE TABLE IF NOT EXISTS `cours` (
`id_cours` int(11) NOT NULL,
  `libelle_cours` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Contenu de la table `cours`
--

INSERT INTO `cours` (`id_cours`, `libelle_cours`) VALUES
(1, 'MATHS 2'),
(2, 'PHYSIQUE'),
(3, 'CHIMIE'),
(4, 'BIOLOGIE'),
(5, 'E.ANALOGIQUE'),
(6, 'PHP');

-- --------------------------------------------------------

--
-- Structure de la table `cours_domaine_niveau`
--

CREATE TABLE IF NOT EXISTS `cours_domaine_niveau` (
  `id_cours` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Contenu de la table `cours_domaine_niveau`
--

INSERT INTO `cours_domaine_niveau` (`id_cours`, `id_domaine`, `id_niveau`) VALUES
(2, 9, 1);

-- --------------------------------------------------------

--
-- Structure de la table `domaine`
--

CREATE TABLE IF NOT EXISTS `domaine` (
`id_domaine` int(11) NOT NULL,
  `libelle_domaine` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Contenu de la table `domaine`
--

INSERT INTO `domaine` (`id_domaine`, `libelle_domaine`) VALUES
(9, 'SCES INFO'),
(10, 'GESTION'),
(11, 'ADMINISTRATION');

-- --------------------------------------------------------

--
-- Structure de la table `niveau`
--

CREATE TABLE IF NOT EXISTS `niveau` (
`id_niveau` int(11) NOT NULL,
  `libelle_niveau` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Contenu de la table `niveau`
--

INSERT INTO `niveau` (`id_niveau`, `libelle_niveau`) VALUES
(1, 'L1'),
(2, 'L2'),
(3, 'L3'),
(4, 'M1'),
(5, 'M2'),
(6, 'Bacc++2'),
(7, 'D2');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs`
--

CREATE TABLE IF NOT EXISTS `professeurs` (
`id_professeur` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `sexe` varchar(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `professeurs`
--

INSERT INTO `professeurs` (`id_professeur`, `nom`, `prenom`, `sexe`) VALUES
(6, 'Irvinton', 'Sylvaince', 'M'),
(7, 'Franck', 'Ricarto', 'M'),
(8, 'Djason', 'Sjneider', 'M'),
(9, 'Sylvaince', 'Jacqueline', 'F'),
(10, 'Juno', 'Felix', 'M');

-- --------------------------------------------------------

--
-- Structure de la table `professeurs_cours_domaine_niveau`
--

CREATE TABLE IF NOT EXISTS `professeurs_cours_domaine_niveau` (
  `id_professeur` int(11) NOT NULL,
  `id_cours` int(11) NOT NULL,
  `id_domaine` int(11) NOT NULL,
  `id_niveau` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `cours`
--
ALTER TABLE `cours`
 ADD PRIMARY KEY (`id_cours`);

--
-- Index pour la table `cours_domaine_niveau`
--
ALTER TABLE `cours_domaine_niveau`
 ADD PRIMARY KEY (`id_cours`,`id_domaine`,`id_niveau`), ADD KEY `id_domaine` (`id_domaine`), ADD KEY `id_niveau` (`id_niveau`);

--
-- Index pour la table `domaine`
--
ALTER TABLE `domaine`
 ADD PRIMARY KEY (`id_domaine`);

--
-- Index pour la table `niveau`
--
ALTER TABLE `niveau`
 ADD PRIMARY KEY (`id_niveau`);

--
-- Index pour la table `professeurs`
--
ALTER TABLE `professeurs`
 ADD PRIMARY KEY (`id_professeur`);

--
-- Index pour la table `professeurs_cours_domaine_niveau`
--
ALTER TABLE `professeurs_cours_domaine_niveau`
 ADD KEY `id_niveau` (`id_niveau`), ADD KEY `id_professeur` (`id_professeur`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `cours`
--
ALTER TABLE `cours`
MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT pour la table `domaine`
--
ALTER TABLE `domaine`
MODIFY `id_domaine` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT pour la table `niveau`
--
ALTER TABLE `niveau`
MODIFY `id_niveau` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT pour la table `professeurs`
--
ALTER TABLE `professeurs`
MODIFY `id_professeur` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `cours_domaine_niveau`
--
ALTER TABLE `cours_domaine_niveau`
ADD CONSTRAINT `cours_domaine_niveau_ibfk_1` FOREIGN KEY (`id_cours`) REFERENCES `cours` (`id_cours`),
ADD CONSTRAINT `cours_domaine_niveau_ibfk_2` FOREIGN KEY (`id_domaine`) REFERENCES `domaine` (`id_domaine`),
ADD CONSTRAINT `cours_domaine_niveau_ibfk_3` FOREIGN KEY (`id_niveau`) REFERENCES `niveau` (`id_niveau`);

--
-- Contraintes pour la table `professeurs_cours_domaine_niveau`
--
ALTER TABLE `professeurs_cours_domaine_niveau`
ADD CONSTRAINT `professeurs_cours_domaine_niveau_ibfk_1` FOREIGN KEY (`id_niveau`) REFERENCES `cours_domaine_niveau` (`id_niveau`),
ADD CONSTRAINT `professeurs_cours_domaine_niveau_ibfk_2` FOREIGN KEY (`id_professeur`) REFERENCES `professeurs` (`id_professeur`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
