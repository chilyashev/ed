SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `class`;
CREATE TABLE IF NOT EXISTS `class` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `dolu` varchar(255) NOT NULL,
  `gore` varchar(255) NOT NULL,
  `specialnost` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

INSERT INTO `class` (`id`, `name`, `dolu`, `gore`, `specialnost`) VALUES
(35, '10', '7', 'Ð³', 'Ð"ÐµÐ¾Ð´ÐµÐ·Ð¸Ñ');

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

INSERT INTO `files` (`id`, `file`, `type`, `date`, `userID`) VALUES
(10, '0.jpg', '1', '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:21:02', 64);

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `authorID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

INSERT INTO `news` (`id`, `title`, `body`, `authorID`, `date`) VALUES
(34, 'Ð•Ð»ÐµÐºÑ‚Ñ€Ð¾Ð½Ð½Ð¸ÑÑ‚ Ð´Ð½ÐµÐ²Ð½Ð¸Ðº Ðµ Ð¸Ð½ÑÑ‚Ð°Ð»Ð¸Ñ€Ð°Ð½  ÑƒÑÐ¿ÐµÑˆÐ½Ð¾!', '<p>Ð"Ð¾Ð±Ñ€Ðµ Ð´Ð¾ÑˆÐ»Ð¸ Ð² Ñ‡Ð¸ÑÑ‚Ð¾ Ð½Ð¾Ð²Ð¸Ñ ÑÐ¸ Ð´Ð½ÐµÐ²Ð½Ð¸Ðº. Ð'Ð»ÐµÐ·Ñ‚Ðµ Ð² Ð°Ð´Ð¼Ð¸Ð½Ð¸ÑÑ‚Ñ€Ð°Ñ‚Ð¾Ñ€ÑÐºÐ¸Ñ Ð¿Ð°Ð½ÐµÐ», Ð·Ð° Ð´Ð° Ñ€ÐµÐ´Ð°ÐºÑ‚Ð¸Ñ€Ð°Ñ‚Ðµ Ñ‚Ð°Ð·Ð¸ Ð½Ð¾Ð²Ð¸Ð½Ð°, Ð´Ð° Ð´Ð¾Ð±Ð°Ð²Ð¸Ñ‚Ðµ ÑƒÑ‡ÐµÐ½Ð¸Ñ†Ð¸ Ð¸ Ð´Ð° Ð·Ð°Ð¿Ð¾Ñ‡Ð½ÐµÑ‚Ðµ Ð´Ð° Ð¸Ð·Ð¿Ð¾Ð»Ð·Ð²Ð°Ñ‚Ðµ Ð´Ð½ÐµÐ²Ð½Ð¸ÐºÐ°.</p>', '64', '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:09:07');

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

INSERT INTO `notes` (`id`, `note`, `predmetID`, `date`, `uchenikID`, `userID`) VALUES
(11, 'Zabelejka', 53, '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:30:13', 46, 0);

DROP TABLE IF EXISTS `ocenka`;
CREATE TABLE IF NOT EXISTS `ocenka` (
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

INSERT INTO `ocenka` (`id`, `value`, `predmetID`, `opisanie`, `vid`, `date`, `uchenikID`) VALUES
(1274, '5.55', '53', 'test', 0, '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:29:27', 46);

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

INSERT INTO `option` (`id`, `key`, `value`) VALUES
(5, 'address', 'address'),
(4, 'direktor', 'direktor'),
(8, 'logo', 'logo.png'),
(3, 'phone', '+1234567896'),
(9, 'headcolor', '227bf0'),
(11, 'headfgcolor', '000000');


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

INSERT INTO `otsastvie` (`id`, `type`, `opisanie`, `date`, `predmetID`, `uchenikID`) VALUES
(32, '0', '1246-03-04', '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:29:48', -9, 46),
(33, '1', 'test', '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:30:03', -9, 46);

DROP TABLE IF EXISTS `page`;
CREATE TABLE IF NOT EXISTS `page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idx` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `authorID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;


DROP TABLE IF EXISTS `predmet`;
CREATE TABLE IF NOT EXISTS `predmet` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=54 ;

INSERT INTO `predmet` (`id`, `name`, `class`, `userID`) VALUES
(53, 'ÐœÐ°Ñ‚ÐµÐ¼Ð°Ñ‚Ð¸ÐºÐ°', '35', 64);

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

INSERT INTO `roditel` (`id`, `username`, `password`, `email`, `snimka`, `name`, `kidID`, `date`, `state`, `role`, `passkey`) VALUES
(26, 'roditel', 'acd8ce339946b11fa75f483c72ece57a', 'roditel@abv.bg', '', '', '46', '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:14:13', '1', 0, '');

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

INSERT INTO `uchenik` (`id`, `ime`, `egn`, `pass`, `address`, `email`, `nomerVklas`, `classID`, `snimka`, `dateReg`, `note`, `role`, `roditelID`) VALUES
(46, 'Ð£Ñ‡ÐµÐ½Ð¸Ðº Ð¢ÐµÑÑ‚', '1234567890', '', 'ÐÑÐ¼Ð°', 'a@a.aaaa', '1', 35, 'undefined', '24 Ð¼Ð°Ñ€Ñ‚ 2011 22:13:26', '', 1, 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

INSERT INTO `user` (`id`, `username`, `password`, `role`, `name`, `email`, `snimka`, `dateReg`, `predmetID`, `approved`, `classID`) VALUES
(64, 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'Administrator', 'admin@nowhere.com', '', '16 ???? 2011 01:41:04', -9, 1, -9);
