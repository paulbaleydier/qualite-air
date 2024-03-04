

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
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb3;

-- Listage des données de la table airquality.analysis : 1 rows
/*!40000 ALTER TABLE `analysis` DISABLE KEYS */;
INSERT INTO `analysis` (`id`, `type`, `value`, `ts`) VALUES
	(1, 1, 0.545, '2024-02-09 18:58:28');
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

-- Listage des données de la table airquality.utilisateurs : 6 rows
/*!40000 ALTER TABLE `utilisateurs` DISABLE KEYS */;
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `permission`, `createdDate`) VALUES
	(2, 'Jane Doe', 'd', 'jane.doe@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2022-02-15'),
	(3, 'Doe', 'John', 'paul.baleydier@gmail.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-01-01'),
	(4, 'Doe', 'John', 'john.doe@example.com', '098f6bcd4621d373cade4e832627b4f6', 0, '2023-01-01'),
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
