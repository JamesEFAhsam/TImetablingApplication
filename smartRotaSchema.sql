-- phpMyAdmin SQL Dump
-- version 3.5.8.1
-- http://www.phpmyadmin.net
--
-- Host: ebarker.uk.mysql:3306
-- Generation Time: Apr 24, 2018 at 03:43 PM
-- Server version: 10.1.30-MariaDB-1~xenial
-- PHP Version: 5.4.45-0+deb7u13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebarker_uk`
--

-- --------------------------------------------------------

--
-- Table structure for table `assigned_shift_employee`
--

CREATE TABLE IF NOT EXISTS `assigned_shift_employee` (
  `assigned_shift_employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `shift_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `day_id` int(11) NOT NULL,
  `rota_id` int(11) NOT NULL,
  PRIMARY KEY (`assigned_shift_employee_id`),
  KEY `shift_id` (`shift_id`,`employee_id`),
  KEY `day_id` (`day_id`,`rota_id`),
  KEY `shift_id_2` (`shift_id`),
  KEY `employee_id` (`employee_id`),
  KEY `day_id_2` (`day_id`),
  KEY `rota_id` (`rota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `day`
--

CREATE TABLE IF NOT EXISTS `day` (
  `day_id` int(11) NOT NULL AUTO_INCREMENT,
  `day` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `date` date NOT NULL,
  `rota_id` int(11) NOT NULL,
  `number_of_shifts` tinyint(4) NOT NULL DEFAULT '2',
  PRIMARY KEY (`day_id`),
  KEY `rota_id` (`rota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE IF NOT EXISTS `employee` (
  `employee_id` int(11) NOT NULL AUTO_INCREMENT,
  `contracted_hours` int(10) NOT NULL,
  `rank` enum('senior','junior') NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `employee_preferences`
--

CREATE TABLE IF NOT EXISTS `employee_preferences` (
  `employee_preferences_id` int(11) NOT NULL AUTO_INCREMENT,
  `preferred_day_off` enum('Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday') NOT NULL,
  `employee_id` int(11) NOT NULL,
  PRIMARY KEY (`employee_preferences_id`),
  KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rota`
--

CREATE TABLE IF NOT EXISTS `rota` (
  `rota_id` int(11) NOT NULL,
  `week_beginning` date NOT NULL,
  PRIMARY KEY (`rota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `shift`
--

CREATE TABLE IF NOT EXISTS `shift` (
  `shift_id` int(11) NOT NULL AUTO_INCREMENT,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `rating` tinyint(4) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `day_id` int(11) NOT NULL,
  `rota_id` int(11) NOT NULL,
  `number_of_senior_staff` int(4) NOT NULL DEFAULT '0',
  `number_of_junior_staff` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`shift_id`),
  KEY `day_id` (`day_id`),
  KEY `rota_id` (`rota_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `shift_cover_request`
--

CREATE TABLE IF NOT EXISTS `shift_cover_request` (
  `request_id` int(11) NOT NULL,
  `holiday_or_cover` enum('holiday','cover') NOT NULL,
  `granted` tinyint(1) NOT NULL DEFAULT '0',
  `assigned_shift_employee_id` int(11) NOT NULL,
  PRIMARY KEY (`request_id`),
  KEY `assigned_shift_employee_id` (`assigned_shift_employee_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` char(40) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `is_manager` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `first_name`, `last_name`, `is_manager`) VALUES
(12, 'gzambelli', '91dd9eeb26bc669762ae4d697705fca3809c3713', 'Gino', 'Zambelli', 0),
(13, 'ebarker', '55b5a0f748d3a82dce10b205ecb0a0d8916c66a1', 'Edward', 'Barker', 0),
(14, 'fpicciuto', '1200703571cb2172cf2ad5fd60b22adc70b76517', 'Florence', 'Picciuto', 0),
(15, 'xzhu', '7182e74557574e361e9a8db126deaae00b1753cd', 'Xixuan', 'Zhu', 0),
(16, 'wlong', '34ffd14e0b2e3b06dcbecf832aee45fb58eadd2d', 'Whizzy', 'Long', 0),
(17, 'jahsam', '474ba67bdb289c6263b36dfd8a7bed6c85b04943', 'James', 'Ahsam', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assigned_shift_employee`
--
ALTER TABLE `assigned_shift_employee`
  ADD CONSTRAINT `assigned_shift_employee_ibfk_1` FOREIGN KEY (`shift_id`) REFERENCES `shift` (`shift_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_shift_employee_ibfk_2` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_shift_employee_ibfk_3` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `assigned_shift_employee_ibfk_4` FOREIGN KEY (`rota_id`) REFERENCES `rota` (`rota_id`) ON UPDATE CASCADE;

--
-- Constraints for table `day`
--
ALTER TABLE `day`
  ADD CONSTRAINT `day_ibfk_1` FOREIGN KEY (`rota_id`) REFERENCES `rota` (`rota_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee`
--
ALTER TABLE `employee`
  ADD CONSTRAINT `employee_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON UPDATE CASCADE;

--
-- Constraints for table `employee_preferences`
--
ALTER TABLE `employee_preferences`
  ADD CONSTRAINT `employee_preferences_ibfk_1` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`employee_id`);

--
-- Constraints for table `shift`
--
ALTER TABLE `shift`
  ADD CONSTRAINT `shift_ibfk_1` FOREIGN KEY (`day_id`) REFERENCES `day` (`day_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `shift_ibfk_2` FOREIGN KEY (`rota_id`) REFERENCES `rota` (`rota_id`) ON UPDATE CASCADE;

--
-- Constraints for table `shift_cover_request`
--
ALTER TABLE `shift_cover_request`
  ADD CONSTRAINT `shift_cover_request_ibfk_1` FOREIGN KEY (`assigned_shift_employee_id`) REFERENCES `assigned_shift_employee` (`assigned_shift_employee_id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
