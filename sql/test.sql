CREATE TABLE `utilisateurs` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`nom` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`prenom` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`email` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`password` LONGTEXT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`createdDate` DATE NOT NULL DEFAULT (curdate()),
	PRIMARY KEY (`id`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=MyISAM
AUTO_INCREMENT=9
;

INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (1, 'Baleydier', 'Paul', 'paul.baleydier@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '2022-01-01');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (2, 'Jane Doe', 'd', 'jane.doe@example.com', '', '2022-02-15');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (3, 'Doe', 'John', 'john.doe@example.com', 'hashed_password_1', '2023-01-01');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (4, 'Doe', 'John', 'john.doe@example.com', 'hashed_password_1', '2023-01-01');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (5, 'Smith', 'Jane', 'jane.smith@example.com', 'hashed_password_2', '2023-02-15');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (6, 'Johnson', 'Bob', 'bob.johnson@example.com', 'hashed_password_3', '2023-03-22');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (7, 'Brown', 'Alice', 'alice.brown@example.com', 'hashed_password_4', '2023-04-10');
INSERT INTO `utilisateurs` (`id`, `nom`, `prenom`, `email`, `password`, `createdDate`) VALUES (8, 'Wilson', 'Chris', 'chris.wilson@example.com', 'hashed_password_5', '2023-05-05');


CREATE TABLE `analysis_type` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_general_ci',
	`shortName` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`unitType` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`criticalValue` INT(10) NULL DEFAULT NULL,
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `id` (`id`) USING BTREE
)
COLLATE='utf8mb4_0900_ai_ci'
ENGINE=MyISAM
AUTO_INCREMENT=9
;

INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (1, 'Dioxyde d\'azote', 'NO2', 'ppm', 40);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (2, 'Monoxyde de carbone', 'CO', 'ppm', 10);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (3, 'Hydrogène', 'H2', 'ppm', 50);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (4, 'Éthanol', 'C2H5OH', 'ppm', 1000);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (5, 'Méthane', 'CH4', 'ppm', 10000);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (6, 'Ammoniaque', 'NH3', 'ppm', 50);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (7, 'PM_2_5', 'PM_2_5', 'µg/m³', 25);
INSERT INTO `analysis_type` (`id`, `name`, `shortName`, `unitType`, `criticalValue`) VALUES (8, 'PM_10_0', 'PM_10_0', 'µg/m³', 50);


CREATE TABLE `analysis` (
	`id` INT(10) NOT NULL AUTO_INCREMENT,
	`type` INT(10) NOT NULL,
	`value` DOUBLE NOT NULL DEFAULT '0',
	`ts` DATETIME NOT NULL DEFAULT (now()),
	PRIMARY KEY (`id`) USING BTREE,
	INDEX `type` (`type`) USING BTREE
)
COLLATE='utf8mb3_general_ci'
ENGINE=MyISAM
;
