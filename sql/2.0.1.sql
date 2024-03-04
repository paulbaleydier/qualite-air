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

-- Listage de la structure de la table airquality. analysis
CREATE TABLE IF NOT EXISTS `analysis` (
  `id` int NOT NULL AUTO_INCREMENT,
  `type` int NOT NULL,
  `value` double NOT NULL DEFAULT '0',
  `ts` datetime NOT NULL DEFAULT (now()),
  PRIMARY KEY (`id`) USING BTREE,
  KEY `type` (`type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=57 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table airquality.analysis : 56 rows
/*!40000 ALTER TABLE `analysis` DISABLE KEYS */;
INSERT INTO `analysis` (`id`, `type`, `value`, `ts`) VALUES
	(1, 1, 35.6, '2024-02-11 08:30:00'),
	(2, 2, 8.2, '2024-02-11 08:31:00'),
	(3, 3, 48.9, '2024-02-11 08:32:00'),
	(4, 4, 800.5, '2024-02-11 08:33:00'),
	(5, 5, 9500.2, '2024-02-11 08:34:00'),
	(6, 6, 40.3, '2024-02-11 08:35:00'),
	(7, 7, 22.1, '2024-02-11 08:36:00'),
	(8, 8, 48.7, '2024-02-11 08:37:00'),
	(9, 1, 38.2, '2024-02-11 08:38:00'),
	(10, 2, 9.1, '2024-02-11 08:39:00'),
	(11, 3, 47.5, '2024-02-11 08:40:00'),
	(12, 4, 810, '2024-02-11 08:41:00'),
	(13, 5, 9600.8, '2024-02-11 08:42:00'),
	(14, 6, 41.8, '2024-02-11 08:43:00'),
	(15, 7, 23.5, '2024-02-11 08:44:00'),
	(16, 8, 49.2, '2024-02-11 08:45:00'),
	(17, 1, 36.5, '2024-02-11 08:46:00'),
	(18, 2, 8.9, '2024-02-11 08:47:00'),
	(19, 3, 50.2, '2024-02-11 08:48:00'),
	(20, 4, 780.3, '2024-02-11 08:49:00'),
	(21, 5, 9200.7, '2024-02-11 08:50:00'),
	(22, 6, 38.7, '2024-02-11 08:51:00'),
	(23, 7, 21.4, '2024-02-11 08:52:00'),
	(24, 8, 47.3, '2024-02-11 08:53:00'),
	(25, 1, 39.8, '2024-02-11 08:54:00'),
	(26, 2, 9.5, '2024-02-11 08:55:00'),
	(27, 3, 45.6, '2024-02-11 08:56:00'),
	(28, 4, 820.6, '2024-02-11 08:57:00'),
	(29, 5, 9100.4, '2024-02-11 08:58:00'),
	(30, 6, 37.2, '2024-02-11 08:59:00'),
	(31, 7, 20.8, '2024-02-11 09:00:00'),
	(32, 8, 50, '2024-02-11 09:01:00'),
	(33, 1, 37.1, '2024-02-11 09:02:00'),
	(34, 2, 10.3, '2024-02-11 09:03:00'),
	(35, 3, 46.3, '2024-02-11 09:04:00'),
	(36, 4, 790.8, '2024-02-11 09:05:00'),
	(37, 5, 9300.1, '2024-02-11 09:06:00'),
	(38, 6, 39.4, '2024-02-11 09:07:00'),
	(39, 7, 24.6, '2024-02-11 09:08:00'),
	(40, 8, 48.1, '2024-02-11 09:09:00'),
	(41, 1, 38.9, '2024-02-11 09:10:00'),
	(42, 2, 9.7, '2024-02-11 09:11:00'),
	(43, 3, 49.7, '2024-02-11 09:12:00'),
	(44, 4, 830.2, '2024-02-11 09:13:00'),
	(45, 5, 9700.5, '2024-02-11 09:14:00'),
	(46, 6, 42, '2024-02-11 09:15:00'),
	(47, 7, 22.3, '2024-02-11 09:16:00'),
	(48, 8, 46.5, '2024-02-11 09:17:00'),
	(49, 1, 40.2, '2024-02-11 09:18:00'),
	(50, 2, 8, '2024-02-11 09:19:00'),
	(51, 3, 48.1, '2024-02-11 09:20:00'),
	(52, 4, 800, '2024-02-11 09:21:00'),
	(53, 5, 9500, '2024-02-11 09:22:00'),
	(54, 6, 39, '2024-02-11 09:23:00'),
	(55, 7, 24, '2024-02-11 09:24:00'),
	(56, 8, 50, '2024-02-11 09:25:00');
/*!40000 ALTER TABLE `analysis` ENABLE KEYS */;

-- Listage de la structure de la table airquality. analysis_type
CREATE TABLE IF NOT EXISTS `analysis_type` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shortName` varchar(255) DEFAULT NULL,
  `unitType` varchar(255) DEFAULT NULL,
  `criticalValue` int DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Listage des données de la table airquality.analysis_type : 8 rows
/*!40000 ALTER TABLE `analysis_type` DISABLE KEYS */;
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES
	(1, 'Dioxyde d\'azote', 'NO2', 'ppm', 40),
	(2, 'Monoxyde de carbone', 'CO', 'ppm', 10),
	(3, 'Hydrogène', 'H2', 'ppm', 50),
	(4, 'Éthanol', 'C2H5OH', 'ppm', 1000),
	(5, 'Méthane', 'CH4', 'ppm', 10000),
	(6, 'Ammoniaque', 'NH3', 'ppm', 50),
	(7, 'PM_2_5', 'PM_2_5', 'µg/m³', 25),
	(8, 'PM_10_0', 'PM_10_0', 'µg/m³', 50);
/*!40000 ALTER TABLE `analysis_type` ENABLE KEYS */;

-- Listage de la structure de la table airquality. utilisateurs
CREATE TABLE IF NOT EXISTS `utilisateurs` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nom` varchar(255) DEFAULT NULL,
  `prenom` varchar(255) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` longtext NOT NULL,
  `permission` int DEFAULT '0',
  `createdDate` date NOT NULL DEFAULT (curdate()),
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table airquality.utilisateurs : 19 rows
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `permission`, `createdDate`) VALUES
	(2, 'Jane Doe', 'd', 'jane.doe@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2022-02-15'),
	(3, 'Doe', 'John', 'paul.baleydier@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-01-01'),
	(4, 'Doe', 'John', 'john.doe@example.com', '098f6bcd4621d373cade4e832627b4f6', 2, '2023-01-01'),
	(5, 'Smith', 'Jane', 'jane.smith@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-02-15'),
	(6, 'Johnson', 'Bob', 'bob.johnson@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-03-22'),
	(7, 'Baleydier', 'Paul', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(9, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(10, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(11, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(12, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(13, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(14, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(15, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(16, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(17, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(18, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(19, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(20, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10'),
	(21, 'Brown', 'Alice', 'alice.brown@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-04-10');
/*!40000 ALTER TABLE `utilisateurs` ENABLE KEYS */;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
