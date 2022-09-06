-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 06 sep. 2022 à 11:13
-- Version du serveur : 5.7.36
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `gestion_commande`
--

-- --------------------------------------------------------

--
-- Structure de la table `clients`
--

DROP TABLE IF EXISTS `clients`;
CREATE TABLE IF NOT EXISTS `clients` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `prenom` varchar(50) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `adresse` varchar(50) COLLATE utf8_bin DEFAULT '0',
  `email` varchar(50) COLLATE utf8_bin DEFAULT '0',
  `telephone` varchar(50) COLLATE utf8_bin DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `commandes`
--

DROP TABLE IF EXISTS `commandes`;
CREATE TABLE IF NOT EXISTS `commandes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bon` char(10) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `date_commande` date NOT NULL,
  `client_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK__client` (`client_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_commande`
--

DROP TABLE IF EXISTS `ligne_commande`;
CREATE TABLE IF NOT EXISTS `ligne_commande` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) NOT NULL,
  `commande_id` int(11) NOT NULL,
  `qte_commande` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__produits` (`produit_id`),
  KEY `FK__commandes` (`commande_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Structure de la table `produits`
--

DROP TABLE IF EXISTS `produits`;
CREATE TABLE IF NOT EXISTS `produits` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` char(10) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `libelle` varchar(100) COLLATE utf8_bin NOT NULL DEFAULT '0',
  `prix_unitaire` float NOT NULL DEFAULT '0',
  `stock` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
