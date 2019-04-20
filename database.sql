SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `arena`;
CREATE DATABASE `arena` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `arena`;

CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `heldDate` datetime NOT NULL,
  `description` text,
  `mainPhoto` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `event` (`id`, `name`, `heldDate`, `description`, `mainPhoto`, `createdAt`) VALUES
(1,	'Domingo no Arena de Páscoa',	'2019-04-21 08:00:00',	NULL,	'https://arenadunas.com.br/wp-content/uploads/2019/04/CAPAEVENTO-1.png',	'2019-04-20 00:22:22'),
(2,	'II ENOFAR',	'2019-04-26 08:00:00',	NULL,	'https://arenadunas.com.br/wp-content/uploads/2019/03/enofarbanner.png',	'2019-04-20 00:23:26');

CREATE TABLE `photo` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventId` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned DEFAULT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventId` (`eventId`),
  KEY `userId` (`userId`),
  CONSTRAINT `photo_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photo_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `photo` (`id`, `eventId`, `userId`, `url`) VALUES
(1,	1,	13,	'https://upload.wikimedia.org/wikipedia/commons/7/76/Natal%2C_Brazil_-_Arena_das_Dunas.jpg'),
(2,	2,	13,	'http://canindesoares.com/site/wp-content/uploads/2018/04/IMG_3029.jpg'),
(3,	2,	13,	'https://grupodistrifarma.com.br/wp-content/uploads/2018/12/icone-enofar-2018.jpg'),
(4,	1,	13,	'https://i.ytimg.com/vi/XVlYMwzFIFk/hqdefault.jpg'),
(5,	1,	13,	'http://www.destinomunique.com.br/wp-content/uploads/2017/04/Pascoa-Munique-Alemanha-Ovos-Pintados.jpg'),
(6,	1,	13,	'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcT6SlFwdAuuzYK6-JhYnCOc3HR5icp37aX4hGvf_OTmCjyGIT0h');

CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`id`, `name`, `createdAt`) VALUES
(1,	'admin',	'2019-04-18 19:16:10');

CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `lastName` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `birthdate`, `password`, `createdAt`) VALUES
(1,	'admin',	'admin',	'admin@admin.com',	'1993-07-24',	'$2y$10$HUiVsfWZtfoOnDcQ0V651.T3wVJZR8dDavjBPqUKMviJtdN4NUnHu',	'2019-04-19 15:12:54'),
(13,	'Joao',	'Silva',	'joao@gmail.com',	'1991-07-24',	'$2y$10$T/eVGnS6Bz36Xk4.XMRKreXzs1hX6U4nXbEAlOxxJX40lD.aRtujy',	'2019-04-20 00:11:47'),
(14,	'Maria',	'Vieira',	'maria@gmail.com',	'1990-01-12',	'$2y$10$ARIlpvHkiHWnJPulImGkAedmzDgd84B4pqlPLkp6CSCQTqMdXFm9m',	'2019-04-20 00:12:19'),
(15,	'Matheus',	'Oliveira',	'matheus@gmail.com',	'1995-02-12',	'$2y$10$3/yU/t3aT3GTgCsTtcV.suYnkLlle857isSbba9O51OT6exCmCYjC',	'2019-04-20 00:12:52');

CREATE TABLE `user_role` (
  `userId` int(10) unsigned NOT NULL,
  `roleId` int(10) unsigned NOT NULL,
  KEY `userId` (`userId`),
  KEY `roleId` (`roleId`),
  CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `user_role` (`userId`, `roleId`) VALUES
(1,	1);
