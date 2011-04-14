-- phpMyAdmin SQL Dump
-- version 3.3.9.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 13, 2011 at 10:58 PM
-- Server version: 5.1.52
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `kbp`
--

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(1) NOT NULL,
  `address` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `citystzip` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `fax` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `shoprate` decimal(6,2) NOT NULL,
  `margin` int(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `address`, `citystzip`, `phone`, `fax`, `shoprate`, `margin`) VALUES
(1, '1234 Fake Street', 'Mukwonago, WI 53149', '123-456-7890', '123-456-7891', 75.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=6 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `customer_id`, `name`, `email`) VALUES
(1, 1, 'My Email', 'myemail@email.com'),
(3, 2, 'John Doe', 'jdoe@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  `shopNumber` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `billingContact` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `billingEmail` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `address2` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `zip` varchar(12) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=10 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `active`, `shopNumber`, `name`, `billingContact`, `billingEmail`, `address1`, `address2`, `city`, `state`, `zip`) VALUES
(1, 1, 'FK', 'Fabrikam, Inc.', 'John Doe', 'john@fabrikam.com', '123 Fabrikam Drive', 'Suite 3', 'New York', 'NY', '02134'),
(2, 1, 'LO', 'Lola Industries', 'Jane Smith', 'janes@some_emailaddress.com', '800 Courtney Road', '', 'Mukwonago', 'WI', '53149');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE IF NOT EXISTS `employees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `group_id` (`group_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `employees`
--


-- --------------------------------------------------------

--
-- Table structure for table `instructions`
--

CREATE TABLE IF NOT EXISTS `instructions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `instruction` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hours` decimal(4,2) NOT NULL DEFAULT '0.00',
  `material` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `instructions`
--

INSERT INTO `instructions` (`id`, `instruction`, `hours`, `material`) VALUES
(1, 'MAKE COPE AND DRAG STEEL FRAMES WITH PINS AND BUSHINGS AND ADD TRONUIONS', 78.00, 13200.00),
(2, 'MOUNT AND GATE ON 100"X100" FLASK (BOARD SIZE 106"X114") BUILT TO SPECS.', 60.00, 10800.00),
(3, 'MOUNT ON 26"X26" GREED SAND OWN BOARDS', 17.00, 250.00),
(4, 'GATE ON 60" SQ OWN BOARD', 14.00, 700.00),
(5, 'COPE AND DRAG PATTERN', 0.00, 0.00),
(6, 'COPE AND DRAG PATTERN WITH STEEL PLATES FOR PATTERN PINS', 0.00, 0.00),
(7, 'CORE BOX', 0.00, 0.00),
(8, 'CUT DOWN MOLD SIZE BY ADDING 45 DEGREE CORNERS IN MOLD BOXES', 0.00, 0.00),
(9, 'CUT WHITE FOAM PATTERN FROM 3D MODEL', 0.00, 0.00),
(10, 'CUT WHITE FOAM PATTERN FROM BLUE PRINT', 0.00, 0.00);

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE IF NOT EXISTS `jobs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `shopNumber` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `dateReceived` date NOT NULL,
  `dateDue` date DEFAULT NULL,
  `timeMaterial` tinyint(1) DEFAULT '0',
  `status` varchar(16) COLLATE utf8_unicode_ci NOT NULL,
  `PONumber` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `patternShrink` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  `finishStock` varchar(32) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5003 ;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `quote_id`, `shopNumber`, `dateReceived`, `dateDue`, `timeMaterial`, `status`, `PONumber`, `patternShrink`, `finishStock`) VALUES
(5001, 5001, 'FK', '2011-04-03', NULL, 0, 'OPEN', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `quoteDetails`
--

CREATE TABLE IF NOT EXISTS `quoteDetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quote_id` int(11) NOT NULL,
  `instruction` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hours` int(4) NOT NULL DEFAULT '0',
  `material` decimal(12,2) NOT NULL DEFAULT '0.00',
  `comments` text COLLATE utf8_unicode_ci,
  `lineItemOrder` int(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `quote_id` (`quote_id`,`instruction`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=86 ;

--
-- Dumping data for table `quoteDetails`
--

INSERT INTO `quoteDetails` (`id`, `quote_id`, `instruction`, `hours`, `material`, `comments`, `lineItemOrder`) VALUES
(43, 5002, 'COPE AND DRAG PATTERN WITH STEEL PLATES FOR PATTERN PINS', 0, 0.00, NULL, 0),
(44, 5002, 'CUT DOWN MOLD SIZE BY ADDING 45 DEGREE CORNERS IN MOLD BOXES', 0, 0.00, NULL, 1),
(45, 5002, 'HALF DUMP CORE BOX', 0, 0.00, NULL, 2),
(46, 5002, 'HALF DUMP CORE BOX WOOD BACKED URETHANE LINED STEEL STRIPED RIGGED FOR', 0, 0.00, NULL, 3),
(47, 5002, 'MOUNT AND GATE ON 100', 60, 3800.00, NULL, 4),
(48, 5001, 'MOUNT AND GATE ON 100"X100" FLASK (BOARD SIZE 106"X114") BUILT TO SIVYER STEEL SPECS.', 60, 3800.00, NULL, 0),
(49, 5001, 'MOUNT ON 26"X26" GREED SAND OWN BOARDS', 17, 250.00, NULL, 1),
(53, 5001, 'MAKE NEW ALUMINUM FLANGE WITH POSITIVE LOCK CORE PRINT AND MINOR REPAIR', 10, 150.00, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `contact_id` int(11) NOT NULL,
  `job_id` int(11) DEFAULT '0',
  `dateIssued` date NOT NULL,
  `patternNumber` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `patternOwner` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `shopRate` decimal(6,2) NOT NULL,
  `margin` int(4) NOT NULL,
  `totalMaterial` decimal(10,2) NOT NULL,
  `totalHours` decimal(10,2) NOT NULL,
  `totalPrice` decimal(16,2) NOT NULL,
  `estimatedDelivery` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `contact_id` (`contact_id`),
  KEY `job_id` (`job_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5020 ;

--
-- Dumping data for table `quotes`
--

INSERT INTO `quotes` (`id`, `customer_id`, `contact_id`, `job_id`, `dateIssued`, `patternNumber`, `patternOwner`, `shopRate`, `margin`, `totalMaterial`, `totalHours`, `totalPrice`, `estimatedDelivery`) VALUES
(5001, 1, 1, 5001, '2011-04-01', '100-233-133034', 'GE', 59.00, 30, 0.00, 0.00, 0.00, '3 WEEKS'),
(5002, 2, 3, 0, '2011-04-01', '100-233-133034', 'GE', 59.00, 30, 0.00, 0.00, 0.00, '3 WEEKS');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `quotes`
--
ALTER TABLE `quotes`
  ADD CONSTRAINT `quotes_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `quotes_ibfk_2` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE;
