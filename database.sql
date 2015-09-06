-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 06, 2015 at 06:03 AM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ecopatrol`
--

-- --------------------------------------------------------

--
-- Table structure for table `badges`
--

CREATE TABLE IF NOT EXISTS `badges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(100) NOT NULL,
  `category_id` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `filename` varchar(50) NOT NULL,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `badges`
--

INSERT INTO `badges` (`id`, `description`, `category_id`, `score`, `filename`, `points`) VALUES
(1, 'Citizen', 5, 0, 'badges/Citizen.png', 0),
(2, 'EcoScout', 5, 200, 'badges/ecoscout.png', 100),
(3, 'Ecovist', 5, 500, 'badges/Ecovist.png', 200),
(4, 'EcoZen', 5, 800, 'badges/Ecozen.png', 300);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `description`) VALUES
(1, 'Land Pollution'),
(2, 'Wildlife Protection'),
(3, 'Water Pollution'),
(4, 'Air Pollution'),
(5, 'General');

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(50) NOT NULL,
  `text` text NOT NULL,
  `points_needed` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `company`, `text`, `points_needed`) VALUES
(1, 'Azeus', 'Free 1 Laptops', 0),
(2, 'Azeus', 'Free 2 Laptops', 0),
(3, 'Azeus', 'Free 3 Laptops', 0),
(4, 'Azeus', 'Free 4 Laptops', 0),
(5, 'Azeus', 'Free 5 Laptops', 0),
(6, 'Azeus', 'Free 6 Laptops', 0),
(7, 'Azeus', 'Free 7 Laptops', 0),
(8, 'Azeus', 'Free 8 Laptops', 0),
(9, 'Azeus', 'Free 9 Laptops', 0);

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descriptions` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `descriptions`) VALUES
(1, 'Manila'),
(2, 'Caloocan');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `content` text NOT NULL,
  `date_sent` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `location_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `ups` int(11) NOT NULL DEFAULT '0',
  `downs` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `category_id`, `location_id`, `text`, `ups`, `downs`) VALUES
(1, 2, 2, 1, 'I saw a wounded eagle just outside my house minutes ago. I think it is still in the vicinity. Need help asap on finding the eagle', 4, 0),
(2, 1, 1, 1, 'Maraming sirang drainage dito sa lugar namin. kung sana ay mayroong mga taong nais tumulong na linisin yun.', 0, 0),
(3, 1, 3, 2, 'The river beside our house is full of platic garbages. we need to clean it. anyone wanna help?', 0, 0),
(4, 1, 4, 2, 'The factory 3 blocks away the church here in our village are contributing too much air pollution. I hope this problem will be addressed as soon as possible', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`) VALUES
(1, 'Manrick', 'Manrick', 'Manrick'),
(2, 'Edwin', 'Edwin', 'Edwin');

-- --------------------------------------------------------

--
-- Table structure for table `user_badge`
--

CREATE TABLE IF NOT EXISTS `user_badge` (
  `user_id` int(11) NOT NULL,
  `badge_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_badge`
--

INSERT INTO `user_badge` (`user_id`, `badge_id`) VALUES
(1, 1),
(1, 3),
(2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_coupon`
--

CREATE TABLE IF NOT EXISTS `user_coupon` (
  `user_id` int(11) NOT NULL,
  `coupon_id` int(11) NOT NULL,
  `coupon_code` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_coupon`
--

INSERT INTO `user_coupon` (`user_id`, `coupon_id`, `coupon_code`) VALUES
(1, 8, 'wPNCKFA3J9'),
(1, 4, 'E4fasbKl89');

-- --------------------------------------------------------

--
-- Table structure for table `user_points`
--

CREATE TABLE IF NOT EXISTS `user_points` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user_points`
--

INSERT INTO `user_points` (`user_id`, `points`) VALUES
(1, 150),
(2, 120);

-- --------------------------------------------------------

--
-- Table structure for table `user_score`
--

CREATE TABLE IF NOT EXISTS `user_score` (
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `score` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_score`
--

INSERT INTO `user_score` (`user_id`, `category_id`, `score`) VALUES
(1, 1, 13),
(1, 2, 1),
(1, 3, 0),
(1, 4, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
