-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           8.2.0 - MySQL Community Server - GPL
-- SE du serveur:                Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour airquality
CREATE DATABASE IF NOT EXISTS `airquality` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `airquality`;

-- Listage de la structure de la table airquality. commands
CREATE TABLE IF NOT EXISTS `commands` (
  `commande_id` int NOT NULL,
  `utilisateur_id` int DEFAULT NULL,
  `produit_id` int DEFAULT NULL,
  `quantite` int DEFAULT NULL,
  `date_commande` date DEFAULT NULL,
  PRIMARY KEY (`commande_id`),
  KEY `utilisateur_id` (`utilisateur_id`),
  KEY `produit_id` (`produit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table airquality.commands : 2 rows
/*!40000 ALTER TABLE `commands` DISABLE KEYS */;
INSERT INTO `commands` (`commande_id`, `utilisateur_id`, `produit_id`, `quantite`, `date_commande`) VALUES
	(1001, 1, 101, 2, '2022-03-05'),
	(1002, 2, 102, 1, '2022-04-10');
/*!40000 ALTER TABLE `commands` ENABLE KEYS */;

-- Listage de la structure de la table airquality. produits
CREATE TABLE IF NOT EXISTS `produits` (
  `produit_id` int NOT NULL,
  `nom_produit` varchar(50) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `stock` int DEFAULT NULL,
  PRIMARY KEY (`produit_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table airquality.produits : 2 rows
/*!40000 ALTER TABLE `produits` DISABLE KEYS */;
INSERT INTO `produits` (`produit_id`, `nom_produit`, `prix`, `stock`) VALUES
	(101, 'Laptop', 1200.00, 50),
	(102, 'Smartphone', 800.00, 30);
/*!40000 ALTER TABLE `produits` ENABLE KEYS */;

-- Listage de la structure de la table airquality. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `prenom` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `createdDate` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table airquality.utilisateurs : 2 rows
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES
	(1, 'Baleydier', 'Paul', 'paul.baleydier@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2022-01-01'),
	(2, 'Jane Doe', NULL, 'jane.doe@example.com', '', '2022-02-15');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;





CREATE TABLE `analysisco` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`value` DOUBLE NOT NULL DEFAULT '0',
	`timestamp` DATE NOT NULL DEFAULT (now()),
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=MyISAM
;
