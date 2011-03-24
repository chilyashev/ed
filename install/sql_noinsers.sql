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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `file` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `authorID` varchar(255) NOT NULL,
  `date` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

DROP TABLE IF EXISTS `notes`;
CREATE TABLE IF NOT EXISTS `notes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `note` text NOT NULL,
  `predmetID` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `uchenikID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1274 ;

DROP TABLE IF EXISTS `option`;
CREATE TABLE IF NOT EXISTS `option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

INSERT INTO `option` (`id` ,`key` ,`value`)VALUES (NULL , 'headfgcolor', '000000');
INSERT INTO `option` (`id` ,`key` ,`value`)VALUES (NULL , 'headcolor', 'B618B6');


INSERT INTO `option` (`id`, `key`, `value`) VALUES
(1, 'title', 'Change me'),
(2, 'email', 'loooooooooooooooooooooongmail@domain.com'),
(5, 'address', 'address\r\n                                                '),
(4, 'direktor', 'direktor'),
(8, 'logo', 'logo.png'),
(3, 'phone', '+35912345678910'),
(9, 'headcolor', '227bf0'),
(11, 'headfgcolor', 'ff14ff');


DROP TABLE IF EXISTS `otsastvie`;
CREATE TABLE IF NOT EXISTS `otsastvie` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(255) NOT NULL,
  `opisanie` text NOT NULL,
  `date` varchar(255) NOT NULL,
  `predmetID` int(11) NOT NULL,
  `uchenikID` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

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
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;
INSERT INTO `user` ( `id` , `username` , `password` , `role` , `name` , `email` , `snimka` , `dateReg` , `predmetID` , `approved` , `classID` ) VALUES ( NULL , 'admin', '21232f297a57a5a743894a0e4a801fc3', '2', 'Administrator', 'admin@nowhere.com', '', '16 март 2011 01:41:04' , '47', '1', '1');
