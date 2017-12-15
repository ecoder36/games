-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- المزود: 127.0.0.1
-- أنشئ في: 14 ديسمبر 2017 الساعة 20:50
-- إصدارة المزود: 5.5.54-0ubuntu0.14.04.1
-- PHP إصدارة: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- قاعدة البيانات: `iogames`
--

-- --------------------------------------------------------

--
-- بنية الجدول `games`
--

CREATE TABLE IF NOT EXISTS `games` (
  `gameid` int(11) NOT NULL AUTO_INCREMENT,
  `link` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`gameid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

-- --------------------------------------------------------

--
-- بنية الجدول `keywords`
--

CREATE TABLE IF NOT EXISTS `keywords` (
  `keyid` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) NOT NULL,
  `keyword` varchar(255) NOT NULL,
  `level` int(11) NOT NULL,
  `url_title` varchar(256) NOT NULL,
  PRIMARY KEY (`keyid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=80 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
