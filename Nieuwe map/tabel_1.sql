-- Adminer 4.7.6 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `Project_IoT_1`;
CREATE TABLE `Project_IoT_1` (
  `Timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `Value` varchar(255) NOT NULL,
  `Sensor_ID` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- 2020-10-09 11:49:03