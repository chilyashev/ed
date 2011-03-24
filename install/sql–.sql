-- phpMyAdmin SQL Dump
-- version 3.3.7deb3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 16, 2011 at 10:00 AM
-- Server version: 5.1.49
-- PHP Version: 5.3.3-7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `testdn`
--

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dolu` varchar(255) NOT NULL,
  `gore` varchar(255) NOT NULL,
  `specialnost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`id`, `name`, `dolu`, `gore`, `specialnost`) VALUES
(0, '12', '7', 'Ð³', 'Ð“ÐµÐ¾Ð´ÐµÐ·Ð¸Ñ'),
(35, '12', '7', 'Ð³', 'Ð“ÐµÐ¾Ð´ÐµÐ·Ð¸Ñ');

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `files`
--


-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `authorID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `authorID`, `date`) VALUES
(0, 'Ð•Ð»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð¸ÑÑ‚ Ð´Ð½ÐµÐ²Ð½Ð¸Ðº Ðµ Ð¸Ð½ÑÑ‚Ð°Ð»Ð¸Ñ€Ð°Ð½  ÑƒÑÐ¿ÐµÑˆÐ½Ð¾!', '<p>Ð—Ð´Ñ€Ð°Ð²ÐµÐ¹Ñ‚Ðµ, Ð²Ð¸Ðµ ÑƒÑÐ¿ÐµÑˆÐ½Ð¾ Ð¸Ð½ÑÑ‚Ð°Ð»Ð¸Ñ€Ð°Ñ…Ñ‚Ðµ ÐµÐ»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð¸Ñ Ð´Ð½ÐµÐ²Ð½Ð¸Ðº.</p>\r\n<p>Ð’Ð»ÐµÐ·Ñ‚Ðµ Ð² Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€ÑÐºÐ¸Ñ Ð¿Ð°Ð½ÐµÐ», Ð·Ð° Ð´Ð° Ñ€ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð°Ñ‚Ðµ Ñ‚Ð°Ð·Ð¸ Ð½Ð¾Ð²Ð¸Ð½Ð°, Ð´Ð° Ð¿Ñ€Ð¾Ð¼ÐµÐ½Ð¸Ñ‚Ðµ Ð½Ð°ÑÑ‚Ñ€Ð¾Ð¹ÐºÐ¸Ñ‚Ðµ, Ð´Ð° Ð´Ð¾Ð±Ð°Ð²Ð¸Ñ‚Ðµ ÑƒÑ‡ÐµÐ½Ð¸Ñ†Ð¸, ÐºÐ»Ð°ÑÐ¾Ð²Ðµ, Ð¸ Ñ‚.Ð½.</p>', '64', '16 Ð¼Ð°Ñ€Ñ‚ 2011 07:45:56')
-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `predmetID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `uchenikID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id`, `note`, `predmetID`, `date`, `uchenikID`, `userID`) VALUES
(0, 'Ð£Ñ‡ÐµÐ½Ð¸Ð¸ÐºÑŠÑ‚ Ð½Ðµ Ð²Ð½Ð¸Ð¼Ð°Ð²Ð° Ð² Ñ‡Ð°Ñ', 53, '16 Ð¼Ð°Ñ€Ñ‚ 2011 07:58:06', 46, 0),
(11, 'Ð£Ñ‡ÐµÐ½Ð¸Ð¸ÐºÑŠÑ‚ Ð½Ðµ Ð²Ð½Ð¸Ð¼Ð°Ð²Ð° Ð² Ñ‡Ð°Ñ', 53, '16 Ð¼Ð°Ñ€Ñ‚ 2011 07:58:06', 46, 0);

-- --------------------------------------------------------

--
-- Table structure for table `ocenka`
--

DROP TABLE IF EXISTS `ocenka`;
CREATE TABLE `ocenka` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `value` varchar(255) NOT NULL,
  `predmetID` varchar(255) NOT NULL,
  `opisanie` varchar(255) NOT NULL,
  `vid` int(11) NOT NULL DEFAULT '0' COMMENT '0=normalna,1=srochna,2=gosidhna',
  `date` varchar(255) NOT NULL,
  `uchenikID` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uchenikID` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1275 ;

--
-- Dumping data for table `ocenka`
--

INSERT INTO `ocenka` (`id`, `value`, `predmetID`, `opisanie`, `vid`, `date`, `uchenikID`) VALUES
(NULL, '6,00', '53', 'ÐžÑ‚ Ñ‚ÐµÑÑ‚Ð°', 0, '16 Ð¼Ð°Ñ€Ñ‚ 2011 07:57:23', 46),
(1274, '6,00', '53', 'ÐžÑ‚ Ñ‚ÐµÑÑ‚Ð°', 0, '16 Ð¼Ð°Ñ€Ñ‚ 2011 07:57:23', 46);

-- --------------------------------------------------------

--
-- Table structure for table `option`
--

DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `option`
--

INSERT INTO `option` (`id`, `key`, `value`) VALUES
(0, 'headfgcolor', '000000')


-- --------------------------------------------------------

--
-- Table structure for table `otsastvie`
--

DROP TABLE IF EXISTS `otsastvie`;
CREATE TABLE IF NOT EXISTS `otsastvie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `opisanie` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `predmetID` int(11) NOT NULL,
  `uchenikID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `otsastvie`
--

INSERT INTO `otsastvie` (`id`, `type`, `opisanie`, `date`, `predmetID`, `uchenikID`) VALUES
(33, '1', 'ÐžÐ¿Ð¸ÑÐ°Ð½Ð¸Ðµ', '16 Ð¼Ð°Ñ€Ñ‚ 2011 08:29:06', -9, 46);

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idx` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `authorID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`id`, `idx`, `title`, `body`, `date`, `authorID`) VALUES
(NULL, '', 'Ð—Ð° ÑƒÑ‡Ð¸Ð»Ð¸Ñ‰ÐµÑ‚Ð¾', '<p>Ð¢ÑƒÐº Ð¼Ð¾Ð¶ÐµÑ‚Ðµ Ð´Ð° Ð½Ð°Ð¿Ð¸ÑˆÐµÑ‚Ðµ Ð½ÐµÑ‰Ð¾ Ð·Ð° ÑƒÑ‡Ð¸Ð»Ð¸Ñ‰ÐµÑ‚Ð¾.</p>', '16 Ð¼Ð°Ñ€Ñ‚ 2011 08:32:51', 65),

-- --------------------------------------------------------

--
-- Table structure for table `predmet`
--

DROP TABLE IF EXISTS `predmet`;
CREATE TABLE IF NOT EXISTS `predmet` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `predmet`
--

INSERT INTO `predmet` (`id`, `name`, `class`, `userID`) VALUES
(NULL, 'ÐœÐ°Ñ‚ÐµÐ¼Ð°Ñ‚Ð¸ÐºÐ°', '35', 64),


-- --------------------------------------------------------

--
-- Table structure for table `roditel`
--

DROP TABLE IF EXISTS `roditel`;
CREATE TABLE IF NOT EXISTS `roditel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `snimka` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `kidID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `passkey` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Dumping data for table `roditel`
--

INSERT INTO `roditel` (`id`, `username`, `password`, `email`, `snimka`, `name`, `kidID`, `date`, `state`, `role`, `passkey`) VALUES
(NULL, 'roditel', 'acd8ce339946b11fa75f483c72ece57a', 'sasli@localhost', '', 'Ð Ð¾Ð´Ð¸Ñ‚ÐµÐ» Ð¢ÐµÑÑ‚Ð¾Ð²', '46', '16 Ð¼Ð°Ñ€Ñ‚ 2011 08:29:58', '1', 0, ''),

-- --------------------------------------------------------

--
-- Table structure for table `uchenik`
--

DROP TABLE IF EXISTS `uchenik`;
CREATE TABLE IF NOT EXISTS `uchenik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ime` varchar(255) NOT NULL,
  `egn` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `nomerVklas` varchar(255) NOT NULL,
  `classID` int(11) NOT NULL,
  `snimka` varchar(255) NOT NULL,
  `dateReg` varchar(255) NOT NULL,
  `note` text NOT NULL,
  `role` int(11) NOT NULL DEFAULT '1',
  `roditelID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=47 ;

--
-- Dumping data for table `uchenik`
--

INSERT INTO `uchenik` (`id`, `ime`, `egn`, `pass`, `address`, `email`, `nomerVklas`, `classID`, `snimka`, `dateReg`, `note`, `role`, `roditelID`) VALUES
(NULL, 'Ð£Ñ‡ÐµÐ½Ð¸Ðº Ð¢ÐµÑÑ‚Ð¾Ð² Ð¢ÐµÑÑ‚Ð¾Ð²', '1234567890', '', 'Ð½ÑÐ¼Ð°', 'sasli@localhost', '99', 35, '', '16 Ð¼Ð°Ñ€Ñ‚ 2011 07:53:39', '', 1, 0),

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `snimka` varchar(255) NOT NULL,
  `dateReg` varchar(255) NOT NULL,
  `predmetID` int(11) NOT NULL,
  `approved` int(11) NOT NULL,
  `classID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=66 ;

--
-- Dumping data for table `user`
--


