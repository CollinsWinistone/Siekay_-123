-- Adminer 4.3.1 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`,`name`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1,	'Biochemistry ',	'Medical biochemistry '),
(2,	'Human anatomy ',	'Structure of human body'),
(3,	'Human genetics',	'Study of human genetic constitution ');




DROP TABLE IF EXISTS `quacat`;
CREATE TABLE `quacat` (
  `id` int(11) unsigned NOT NULL,
  `category` varchar(255) NOT NULL,
  PRIMARY KEY (`category`,`id`),
  KEY `id` (`id`),
  CONSTRAINT `quacat_ibfk_3` FOREIGN KEY (`category`) REFERENCES `category` (`name`),
  CONSTRAINT `quacat_ibfk_6` FOREIGN KEY (`id`) REFERENCES `quans` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `quans`;
CREATE TABLE `quans` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `question` mediumtext NOT NULL,
  `answer` longtext,
  `askedby` varchar(255) NOT NULL,
  `answeredby` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `askedby` (`askedby`),
  CONSTRAINT `quans_ibfk_4` FOREIGN KEY (`askedby`) REFERENCES `users` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

