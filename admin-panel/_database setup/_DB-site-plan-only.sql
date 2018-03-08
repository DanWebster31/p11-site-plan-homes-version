-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: internal-db.s165820.gridserver.com
-- Generation Time: Jul 17, 2013 at 11:03 AM
-- Server version: 5.1.67-rel14.3
-- PHP Version: 5.3.26

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `idNum` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userLevel` varchar(10) NOT NULL,
  PRIMARY KEY (`idNum`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idNum`, `name`, `email`, `username`, `password`, `userLevel`) VALUES
(1, 'p11creative', 'p11creative@gmail.com', 'p11creative', 'f00tbagDancE!', '1');

-- --------------------------------------------------------

--
-- Table structure for table `siteplan`
--

CREATE TABLE IF NOT EXISTS `siteplan` (
  `idNum` int(10) NOT NULL auto_increment,
  `Residence` varchar(100) NOT NULL,
  `Elevation` varchar(100) NOT NULL,
  `FloorPlanType` varchar(100) NOT NULL,
  `FloorPlanTitle` varchar(250) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  `Price` varchar(100) NOT NULL,
  `MoveInDate` varchar(100) NOT NULL,
  `Description1` varchar(200) NOT NULL,
	`Description2` varchar(200) NOT NULL,
  `Caption1` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `Caption2` text character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`idNum`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
