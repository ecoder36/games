-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- المزود: 127.0.0.1
-- أنشئ في: 05 يناير 2018 الساعة 08:30
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
  `url` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  PRIMARY KEY (`gameid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- إرجاع أو استيراد بيانات الجدول `games`
--

INSERT INTO `games` (`gameid`, `link`, `name`, `url`, `img`) VALUES
(1, 'https://foes.io/', 'Foes', 'Foes', 'maxresdefault.jpg'),
(2, 'http://STARBLAST.IO', 'STARBLAST', 'STARBLAST', 'maxresdefault1.jpg'),
(3, 'https://spaceone.io/', 'spaceone', 'spaceone', 'maxresdefault2.jpg'),
(4, 'https://gota.io/', 'gota', 'gota', 'maxresdefault3.jpg'),
(5, 'https://wormate.io/', 'wormate', 'wormate', 'og-share-img-new.jpg'),
(6, 'https://secrethitler.io/', 'secrethitler', 'secrethitler', 'DOOnZg7VwAAOj9k.jpg'),
(7, 'https://skribbl.io/', 'skribbl', 'skribbl', 'maxresdefault4.jpg'),
(8, 'https://sketch.io/sketchpad/?lang=en', 'sketch', 'sketch', 'maxresdefault5.jpg');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=18 ;

--
-- إرجاع أو استيراد بيانات الجدول `keywords`
--

INSERT INTO `keywords` (`keyid`, `g_id`, `keyword`, `level`, `url_title`) VALUES
(1, 0, 'io games', 3, 'io-games'),
(2, 1, 'Foes', 1, 'Foes'),
(3, 1, 'io games', 3, 'io-games'),
(4, 2, 'STARBLAST', 1, 'STARBLAST'),
(5, 2, 'io games', 3, 'io-games'),
(6, 3, 'spaceone', 1, 'spaceone'),
(7, 3, 'io games', 3, 'io-games'),
(8, 4, 'gota', 1, 'gota'),
(9, 4, 'io games', 3, 'io-games'),
(10, 5, 'wormate', 1, 'wormate'),
(11, 5, 'io games', 3, 'io-games'),
(12, 6, 'secrethitler', 1, 'secrethitler'),
(13, 6, 'io games', 3, 'io-games'),
(14, 7, 'skribbl', 1, 'skribbl'),
(15, 7, 'io games', 3, 'io-games'),
(16, 8, 'sketch', 1, 'sketch'),
(17, 8, 'io games', 3, 'io-games');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
