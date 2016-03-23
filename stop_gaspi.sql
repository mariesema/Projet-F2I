-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Mar 22 Mars 2016 à 21:23
-- Version du serveur: 5.5.47-0ubuntu0.14.04.1
-- Version de PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `stop_gaspi`
--
CREATE DATABASE IF NOT EXISTS `stop_gaspi` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `stop_gaspi`;

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE IF NOT EXISTS `article` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `auteur` varchar(255) DEFAULT NULL,
  `categorie` bigint(20) DEFAULT NULL,
  `commentaire` text,
  `description` text,
  `date_publication` timestamp NULL DEFAULT NULL,
  `date_derniere_modification` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_artcile_categorie` (`categorie`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conseiller`
--

CREATE TABLE IF NOT EXISTS `conseiller` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `disponibilites` bigint(20) DEFAULT NULL,
  `prefecture_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_conseiller_prefecture` (`prefecture_id`),
  KEY `fk_conseiller_disponibilite` (`disponibilites`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `consommation`
--

CREATE TABLE IF NOT EXISTS `consommation` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `quantite` decimal(10,0) DEFAULT NULL,
  `annee` timestamp NULL DEFAULT NULL,
  `duree` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `conso_user`
--

CREATE TABLE IF NOT EXISTS `conso_user` (
  `consommation_id` bigint(20) NOT NULL,
  `utilisateur_id` bigint(20) NOT NULL,
  PRIMARY KEY (`consommation_id`,`utilisateur_id`),
  KEY `fk_user_conso_pk` (`utilisateur_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `disponibilite`
--

CREATE TABLE IF NOT EXISTS `disponibilite` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `heure_deb` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `heure_fin` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exoneration`
--

CREATE TABLE IF NOT EXISTS `exoneration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `taux` decimal(10,0) DEFAULT NULL,
  `type` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_type_exoneration` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `exoneration_user`
--

CREATE TABLE IF NOT EXISTS `exoneration_user` (
  `utilisateur_id` bigint(20) NOT NULL,
  `exoneration_id` bigint(20) NOT NULL,
  PRIMARY KEY (`utilisateur_id`,`exoneration_id`),
  KEY `fk_exoneration_user` (`exoneration_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fiche_conseil`
--

CREATE TABLE IF NOT EXISTS `fiche_conseil` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contenu` text,
  `description` text,
  `domaine` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_domaine_fiche` (`domaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mod_type_domaine`
--

CREATE TABLE IF NOT EXISTS `mod_type_domaine` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `ordre` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=big5 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mod_type_exoneration`
--

CREATE TABLE IF NOT EXISTS `mod_type_exoneration` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `ordre` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `mod_type_user`
--

CREATE TABLE IF NOT EXISTS `mod_type_user` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `libelle` varchar(255) DEFAULT NULL,
  `label` varchar(255) DEFAULT NULL,
  `ordre` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `prefecture`
--

CREATE TABLE IF NOT EXISTS `prefecture` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` bigint(20) DEFAULT NULL,
  `nombre_conseillers` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ville_prefecture` (`ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `rendez_vous`
--

CREATE TABLE IF NOT EXISTS `rendez_vous` (
  `conseiller_id` bigint(20) NOT NULL,
  `utilisateur_id` bigint(20) NOT NULL,
  `date` timestamp NULL DEFAULT NULL,
  `heure` timestamp NULL DEFAULT NULL,
  `domaine` bigint(20) DEFAULT NULL,
  `ville` bigint(20) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`conseiller_id`,`utilisateur_id`),
  KEY `fk_ville_rdv` (`ville`),
  KEY `fk_utilisateur_rdv` (`utilisateur_id`),
  KEY `fk_domaine_rdv` (`domaine`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisateur`
--

CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `adresse` varchar(255) DEFAULT NULL,
  `ville` bigint(20) DEFAULT NULL,
  `mail` varchar(255) DEFAULT NULL,
  `telephone` varchar(255) DEFAULT NULL,
  `application_mobile` tinyint(1) DEFAULT NULL,
  `date_creation` timestamp NULL DEFAULT NULL,
  `type_user` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_type_user_utilisateur` (`type_user`),
  KEY `fk_ville_utilisateur` (`ville`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `ville`
--

CREATE TABLE IF NOT EXISTS `ville` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `code_postal` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contraintes pour les tables exportées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `fk_artcile_categorie` FOREIGN KEY (`categorie`) REFERENCES `mod_type_domaine` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `conseiller`
--
ALTER TABLE `conseiller`
  ADD CONSTRAINT `fk_conseiller_id_user` FOREIGN KEY (`id`) REFERENCES `utilisateur` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_conseiller_prefecture` FOREIGN KEY (`prefecture_id`) REFERENCES `prefecture` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conseiller_disponibilite` FOREIGN KEY (`disponibilites`) REFERENCES `disponibilite` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `conso_user`
--
ALTER TABLE `conso_user`
  ADD CONSTRAINT `fk_conso_user_pk` FOREIGN KEY (`consommation_id`) REFERENCES `consommation` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_user_conso_pk` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exoneration`
--
ALTER TABLE `exoneration`
  ADD CONSTRAINT `fk_type_exoneration` FOREIGN KEY (`type`) REFERENCES `mod_type_exoneration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `exoneration_user`
--
ALTER TABLE `exoneration_user`
  ADD CONSTRAINT `fk_user_exoneration` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_exoneration_user` FOREIGN KEY (`exoneration_id`) REFERENCES `exoneration` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `fiche_conseil`
--
ALTER TABLE `fiche_conseil`
  ADD CONSTRAINT `fk_domaine_fiche` FOREIGN KEY (`domaine`) REFERENCES `mod_type_domaine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `prefecture`
--
ALTER TABLE `prefecture`
  ADD CONSTRAINT `fk_ville_prefecture` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `rendez_vous`
--
ALTER TABLE `rendez_vous`
  ADD CONSTRAINT `fk_ville_rdv` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_conseiller_rdv` FOREIGN KEY (`conseiller_id`) REFERENCES `conseiller` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_utilisateur_rdv` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_domaine_rdv` FOREIGN KEY (`domaine`) REFERENCES `mod_type_domaine` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Contraintes pour la table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_type_user_utilisateur` FOREIGN KEY (`type_user`) REFERENCES `mod_type_user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ville_utilisateur` FOREIGN KEY (`ville`) REFERENCES `ville` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
