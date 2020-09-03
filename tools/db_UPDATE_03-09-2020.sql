-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  jeu. 03 sep. 2020 à 09:25
-- Version du serveur :  10.4.10-MariaDB
-- Version de PHP :  7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `purchase_management_dashboard`
--
CREATE DATABASE IF NOT EXISTS `purchase_management_dashboard` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `purchase_management_dashboard`;

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  `reference` int(50) NOT NULL,
  `category` enum('Electroménager','TV-HIFI','Bricolage','Voiture','Alimentation','Jardinage','Musique','Scolaire','Animaux') NOT NULL,
  `price` float NOT NULL,
  `purchase_date` datetime NOT NULL,
  `warranty_date` datetime NOT NULL,
  `purchase_place` enum('Direct','Online') NOT NULL,
  `place_adress` text NOT NULL,
  `product_maintenance` longtext NOT NULL,
  `purchase_receipt` varchar(150) NOT NULL,
  `user_manual` longtext DEFAULT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_users_idx` (`users_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`id`, `name`, `reference`, `category`, `price`, `purchase_date`, `warranty_date`, `purchase_place`, `place_adress`, `product_maintenance`, `purchase_receipt`, `user_manual`, `users_id`) VALUES
(1, 'Ordinateur', 1, 'TV-HIFI', 1099, '2020-08-11 00:00:00', '2022-08-10 00:00:00', 'Online', 'https://www.amazon.fr', 'ASUS TUF A15-TUF566IU-AL117T PC Portable 15,6\'\' FHD 144Hz (AMD Ryzen 7 4800H, RAM 16Go DDR4 (8Go x 2), 512Go SSD, Optimus NVIDIA GeForce GTX 1660Ti GDDR6 6GB, Windows 10) Clavier AZERTY Français\r\n\r\nPolitique de retour\r\nPolitique de retour Amazon.fr:Si vous n’êtes pas satisfait d\'un produit que vous avez commandé auprès d\'Amazon.fr ou si celui-ci est défectueux ou endommagé, vous pouvez nous le retourner sous 30 jours suivant la date de livraison, et nous vous rembourserons ou remplacerons l\'intégralité de l\'article. Pour plus d’informations, veuillez consulter notre page en savoir plus sur les Retours et remboursements. Si un défaut apparaissait sur votre produit passé la période de 30 jours, et durant toute la période de garantie, vous devez contacter directement le Service Après-Vente du fabricant (accédez aux coordonnées SAV des fabricants). Veuillez noter que si vous avez acheté votre article auprès d\'un vendeur tiers sur notre plateforme Marketplace, celui-ci est soumis à la politique individuelle de retour de ce vendeur (en savoir plus sur les retours Marketplace).', 'img/receipt/ordinateur.jpg', 'À propos de cet article\r\n\r\nNVIDIA GeForce GTX1660Ti avec Technologie ROG Boost - Toujours plus de puissance\r\nProcesseur AMD Ryzen 7 de dernière génération\r\nSystème de refroidissement complet pour maintenir votre performance au top\r\nRobustesse TUF - Capable de venir à bout de toutes les situations extrêmes\r\nUn mois d’abonnement Xbox Game Pass inclus à l’achat de votre appareil. N’oubliez pas de l’activer.', 3);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `login`, `pwd`, `email`) VALUES
(1, 'Sergio', 'sergio', 's.nunezmeneses@codeur.online'),
(2, 'Yacine', 'yacine', 'y.sbai@codeur.online'),
(3, 'Philippe', 'philippe', 'p.perechodov@codeur.online');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
