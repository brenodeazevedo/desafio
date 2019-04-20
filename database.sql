SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

DROP DATABASE IF EXISTS `arena`;
CREATE DATABASE `arena` 
USE `arena`;

CREATE TABLE `event` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `description` text,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `eventId` int(10) unsigned NOT NULL,
  `userId` int(10) unsigned DEFAULT NULL,
  `url` text NOT NULL,
  PRIMARY KEY (`id`),
  KEY `eventId` (`eventId`),
  KEY `userId` (`userId`),
  CONSTRAINT `photos_ibfk_1` FOREIGN KEY (`eventId`) REFERENCES `event` (`id`) ON DELETE CASCADE,
  CONSTRAINT `photos_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `role` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(30) NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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

DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `userId` int(10) unsigned NOT NULL,
  `roleId` int(10) unsigned NOT NULL,
  KEY `userId` (`userId`),
  KEY `roleId` (`roleId`),
  CONSTRAINT `user_roles_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  CONSTRAINT `user_roles_ibfk_2` FOREIGN KEY (`roleId`) REFERENCES `role` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `role` (`id`, `name`, `createdAt`) VALUES
(1,	'admin',	'2019-04-18 19:16:10');
INSERT INTO `user_roles` (`userId`, `roleId`) VALUES
(1,	1);
INSERT INTO `user` (`id`, `firstName`, `lastName`, `email`, `birthdate`, `password`, `createdAt`) VALUES
(1,	'admin',	'admin',	'admin@admin.com',	'1993-07-24',	'$2y$10$HUiVsfWZtfoOnDcQ0V651.T3wVJZR8dDavjBPqUKMviJtdN4NUnHu',	'2019-04-19 15:12:54'),
(13,	'Joao',	'Silva',	'joao@gmail.com',	'1991-07-24',	'$2y$10$dNLEN0YbgHmazETaSNm2HeM3fRYzbq9Jpd65dnnU0QQ39xw/GV6q.',	'2019-04-20 00:11:47'),
(14,	'Maria',	'Vieira',	'maria@gmail.com',	'1990-01-12',	'$2y$10$ARIlpvHkiHWnJPulImGkAedmzDgd84B4pqlPLkp6CSCQTqMdXFm9m',	'2019-04-20 00:12:19'),
(15,	'Matheus',	'Oliveira',	'matheus@gmail.com',	'1995-02-12',	'$2y$10$3/yU/t3aT3GTgCsTtcV.suYnkLlle857isSbba9O51OT6exCmCYjC',	'2019-04-20 00:12:52');
