-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : sam. 28 mai 2022 à 19:05
-- Version du serveur : 10.4.24-MariaDB
-- Version de PHP : 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `system_db`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `idArticle` int(11) NOT NULL,
  `idStock` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prixTTCCourant` decimal(10,3) DEFAULT NULL,
  `tauxTVA` decimal(4,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `contact`
--

CREATE TABLE `contact` (
  `ID` int(11) NOT NULL,
  `nom` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `sujet` text NOT NULL,
  `message` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `employes`
--

CREATE TABLE `employes` (
  `Nom` varchar(20) NOT NULL,
  `Prenom` varchar(20) NOT NULL,
  `CIN` varchar(20) NOT NULL,
  `position` enum('Comptable','Asistante','Directeur','Technicien','Livreur') NOT NULL,
  `Age` int(3) NOT NULL,
  `Date de debut` date NOT NULL,
  `Salaire` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_sortie`
--

CREATE TABLE `ligne_sortie` (
  `idligneSortie` int(11) NOT NULL,
  `idSortie` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `prixTTCSortie` decimal(10,3) DEFAULT NULL,
  `Avance` int(11) NOT NULL,
  `quantite` decimal(9,2) DEFAULT NULL,
  `beneficiaire` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `ligne_stock`
--

CREATE TABLE `ligne_stock` (
  `idligneStock` int(11) NOT NULL,
  `idStock` int(11) NOT NULL,
  `idArticle` int(11) NOT NULL,
  `quantiteReelle` decimal(9,2) DEFAULT NULL,
  `quantiteVirtuelle` decimal(9,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `sortie`
--

CREATE TABLE `sortie` (
  `idSortie` int(11) NOT NULL,
  `idStock` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `date` date DEFAULT NULL,
  `commentaire` varchar(500) DEFAULT NULL,
  `ressources` varchar(500) DEFAULT NULL,
  `coutTTCTotal` decimal(10,2) NOT NULL,
  `Avance` int(11) NOT NULL,
  `nbreArticles` int(11) NOT NULL,
  `etat` enum('VIRTUELLE','REELLE') NOT NULL,
  `corbeille` enum('O','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `stock`
--

CREATE TABLE `stock` (
  `idStock` int(11) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `utiliseBeneficiaire` enum('O','N') NOT NULL DEFAULT 'N' COMMENT '''O'' si la colonne "bénéficiaire" doit être utilisée sur les sorties. ''N'' sinon.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock`
--

INSERT INTO `stock` (`idStock`, `nom`, `utiliseBeneficiaire`) VALUES
(1, 'Infinix', 'O');

-- --------------------------------------------------------

--
-- Structure de la table `stock_autorise`
--

CREATE TABLE `stock_autorise` (
  `idStock` int(11) NOT NULL,
  `ID` int(11) NOT NULL,
  `defaut` enum('O','N') CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `stock_autorise`
--

INSERT INTO `stock_autorise` (`idStock`, `ID`, `defaut`) VALUES
(1, 0, 'N');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `user_name` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `position` enum('Admin','Employé de stock') NOT NULL DEFAULT 'Employé de stock'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`ID`, `user_name`, `password`, `nom`, `prenom`, `position`) VALUES
(0, 'admin', '$2y$10$weTBfcYvEAT8Fruxa2amo.GYSOHUYnhtEVetoBuQOg7rnHB77LkKe', NULL, NULL, 'Admin'),
(0, 'baz', '$2y$10$ky9F5VRII8Odb70ZCnszOOMTpeA3aB7rHqHcHkPHk/VhaPw1Mm36C', 'BAZTAMI', 'Abderrahmane', 'Admin');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`idArticle`),
  ADD KEY `article_ibfk_1` (`idStock`);

--
-- Index pour la table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ID`);

--
-- Index pour la table `employes`
--
ALTER TABLE `employes`
  ADD PRIMARY KEY (`CIN`);

--
-- Index pour la table `ligne_sortie`
--
ALTER TABLE `ligne_sortie`
  ADD PRIMARY KEY (`idligneSortie`);

--
-- Index pour la table `ligne_stock`
--
ALTER TABLE `ligne_stock`
  ADD PRIMARY KEY (`idligneStock`),
  ADD KEY `ligne_stock_ibfk_1` (`idStock`),
  ADD KEY `ligne_stock_ibfk_2` (`idArticle`);

--
-- Index pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD PRIMARY KEY (`idSortie`),
  ADD KEY `sortie_ibfk_1` (`idStock`);

--
-- Index pour la table `stock`
--
ALTER TABLE `stock`
  ADD PRIMARY KEY (`idStock`);

--
-- Index pour la table `stock_autorise`
--
ALTER TABLE `stock_autorise`
  ADD PRIMARY KEY (`idStock`,`ID`),
  ADD KEY `ID` (`ID`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `contact`
--
ALTER TABLE `contact`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`idStock`) REFERENCES `stock` (`idStock`);

--
-- Contraintes pour la table `ligne_stock`
--
ALTER TABLE `ligne_stock`
  ADD CONSTRAINT `ligne_stock_ibfk_1` FOREIGN KEY (`idStock`) REFERENCES `stock` (`idStock`),
  ADD CONSTRAINT `ligne_stock_ibfk_2` FOREIGN KEY (`idArticle`) REFERENCES `article` (`idArticle`);

--
-- Contraintes pour la table `sortie`
--
ALTER TABLE `sortie`
  ADD CONSTRAINT `sortie_ibfk_1` FOREIGN KEY (`idStock`) REFERENCES `stock` (`idStock`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
