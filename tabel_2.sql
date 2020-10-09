-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Project_IoT_2`;
CREATE TABLE `Project_IoT_2` (
  `ID` int(6) NOT NULL AUTO_INCREMENT,
  `Name` varchar(255) NOT NULL,
  `last timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE current_timestamp(),
  `external IP` varchar(255) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-10-09 12:02:17