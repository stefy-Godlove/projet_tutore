-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : mer. 05 juin 2024 à 22:48
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

CREATE DATABASE IF NOT EXISTS projet_tutore;
use projet_tutore;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `projet_tutore`
--

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

CREATE TABLE `categories` (
  `idCath` int(11) NOT NULL,
  `nomCategories` varchar(50) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`idCath`, `nomCategories`, `description`) VALUES
(1, 'Appareil Electro-Menager', 'Appareil electronique pour usage domestique'),
(2, 'Vetement', 'Marque des vetements.'),
(3, 'Sac', 'sac a main');

-- --------------------------------------------------------

--
-- Structure de la table `imageproduit`
--

CREATE TABLE `imageproduit` (
  `idImages` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `imageUrl` text NOT NULL,
  `color` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `imageproduit`
--

INSERT INTO `imageproduit` (`idImages`, `idProd`, `imageUrl`, `color`) VALUES
(1, 1, 'assets/mixeur.png', 'gray'),
(2, 3, 'assets/vetement/ensemble1.jpg', 'gray'),
(3, 3, 'assets/vetement/ensemble2.jpg', 'yellow'),
(4, 3, 'assets/vetement/ensemble3.jpg', 'black'),
(5, 3, 'assets/vetement/ensemble4.jpg', 'pink'),
(6, 5, 'assets/sac/sac_gucci_noir.jpg', 'black'),
(7, 5, 'assets/sac/sac_gucci_blanc.jpg', 'white'),
(8, 5, 'assets/sac/sac_gucci_rouge.jpg', 'red'),
(9, 5, 'assets/sac/sac_gucci_orange.jpg', 'orange'),
(10, 5, 'assets/sac/sac_gucci_rose.jpg', 'pink'),
(11, 5, 'assets/sac/sac_gucci_violet.jpg', 'purple'),
(12, 5, 'assets/sac/sac_gucci_gris.jpg', 'gray'),
(13, 6, 'assets/sac/sac_viton_blanc.jpg', 'white'),
(14, 6, 'assets/sac/sac_viton_gris.jpg', 'gray'),
(15, 6, 'assets/sac/sac_viton_marron.jpg', 'brown'),
(16, 6, 'assets/sac/sac_viton_noir.jpg', 'black'),
(17, 6, 'assets/sac/sac_viton_rose.jpg', 'pink'),
(18, 7, 'assets/sac/sac_crocodille_gris.jpg', 'gray'),
(19, 7, 'assets/sac/sac_crocodille_blanc.jpg', 'white'),
(20, 7, 'assets/sac/sac_crocodille_marron.jpg', 'brown'),
(21, 7, 'assets/sac/sac_crocodille_noir.jpg', 'black'),
(22, 7, 'assets/sac/sac_crocodille_rouge.jpg', 'red');

-- --------------------------------------------------------

--
-- Structure de la table `note`
--

CREATE TABLE `note` (
  `idNote` int(11) NOT NULL,
  `idProd` int(11) NOT NULL,
  `valNote` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `idProduit` int(11) NOT NULL,
  `libelle` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `prix` int(11) NOT NULL,
  `categorieId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`idProduit`, `libelle`, `description`, `prix`, `categorieId`) VALUES
(1, 'moulinex', 'machine a ecraser', 250000, 1),
(3, 'Ensenble', 'marque GUCCI', 3500, 2),
(5, 'Sac Gucci', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sunt adipisci excepturi deserunt, pariatur maxime reprehenderit, veritatis eos est obcaecati minus mollitia! Excepturi unde sunt saepe praesentium animi nobis omnis.', 50000, 3),
(6, 'Sac Louis Viton', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sunt adipisci excepturi deserunt, pariatur maxime reprehenderit, veritatis eos est obcaecati minus mollitia! Excepturi unde sunt saepe praesentium animi nobis omnis.', 25000, 3),
(7, 'Sac a Peau de Crocodile', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora sunt adipisci excepturi deserunt, pariatur maxime reprehenderit, veritatis eos est obcaecati minus mollitia! Excepturi unde sunt saepe praesentium animi nobis omnis.', 15000, 3);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCath`);

--
-- Index pour la table `imageproduit`
--
ALTER TABLE `imageproduit`
  ADD PRIMARY KEY (`idImages`);

--
-- Index pour la table `note`
--
ALTER TABLE `note`
  ADD PRIMARY KEY (`idNote`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`idProduit`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCath` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `imageproduit`
--
ALTER TABLE `imageproduit`
  MODIFY `idImages` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `note`
--
ALTER TABLE `note`
  MODIFY `idNote` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `idProduit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
