-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1:3306
-- 生成日期： 2018-11-09 14:18:36
-- 服务器版本： 5.7.23
-- PHP 版本： 5.6.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `eshop`
--

-- --------------------------------------------------------

--
-- 表的结构 `addresses`
--

DROP TABLE IF EXISTS `addresses`;
CREATE TABLE IF NOT EXISTS `addresses` (
  `address_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `address1` varchar(100) NOT NULL,
  `address2` varchar(100) DEFAULT NULL,
  `code` int(11) NOT NULL,
  `city` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `country` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`address_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `addresses`
--

INSERT INTO `addresses` (`address_id`, `name`, `address1`, `address2`, `code`, `city`, `country`, `user_id`, `updated`) VALUES
(1, 'aaa', 'aaa', 'aaa', 1111, 'aaa', 'aaa', 1, '2018-11-04 20:47:24'),
(2, 'bbb', 'bbbb', 'bbbb', 11111, 'bbb', 'bbb', 1, '2018-11-05 13:50:09'),
(3, 'ccc', 'ccc', 'ccc', 1111, 'ccc', 'ccc', 1, '2018-11-05 14:03:02'),
(4, 'fff', 'ffff', 'ffff', 111, 'fff', 'fff', 1, '2018-11-05 14:09:18');

-- --------------------------------------------------------

--
-- 表的结构 `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produit_id` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- 表的结构 `links`
--

DROP TABLE IF EXISTS `links`;
CREATE TABLE IF NOT EXISTS `links` (
  `link_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `produit_id` int(10) UNSIGNED DEFAULT NULL,
  `number` int(10) UNSIGNED NOT NULL,
  `address_id` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`link_id`),
  KEY `address_id` (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `links`
--

INSERT INTO `links` (`link_id`, `order_id`, `produit_id`, `number`, `address_id`, `updated`) VALUES
(9, 2, 1, 3, NULL, '2018-11-04 21:04:58'),
(10, 3, 1, 3, NULL, '2018-11-05 13:49:38'),
(11, 4, 1, 3, NULL, '2018-11-05 13:50:57'),
(13, 5, 1, 4, NULL, '2018-11-09 14:06:06'),
(14, 6, 2, 2, NULL, '2018-11-09 15:03:37'),
(15, 6, 7, 1, NULL, '2018-11-09 15:04:21');

-- --------------------------------------------------------

--
-- 表的结构 `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `amount` double DEFAULT NULL,
  `address_id` int(11) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `address_id` (`address_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `type`, `status`, `amount`, `address_id`, `updated`) VALUES
(7, 1, 'cart', 'cart', NULL, NULL, '2018-11-09 15:04:25'),
(2, 1, 'order', 'payed', 29.97, 1, '2018-11-04 20:47:32'),
(6, 1, 'order', 'payed', 19.09, 1, '2018-11-09 14:06:47');

-- --------------------------------------------------------

--
-- 表的结构 `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `produit_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `range_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `number` int(11) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `img_url` varchar(100) DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`produit_id`),
  KEY `range_id` (`range_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `produit`
--

INSERT INTO `produit` (`produit_id`, `range_id`, `name`, `number`, `price`, `description`, `img_url`, `updated`) VALUES
(1, 1, 'moi', 977, 9.99, '11111111', '../image/IMG_5997.jpg', '2018-10-29 17:09:01'),
(2, 1, 'legocity', 97, 7.88, 'legocity', '../image/LEGO City .jpg', '2018-11-09 13:51:22'),
(3, 1, 'LEGO Technic', 99, 19.99, 'LEGO Technic', '../image/LEGO Technic.jpg', '2018-11-09 13:51:53'),
(4, 2, 'Soft Squishy toys', 99, 6.66, 'Soft Squishy toys', '../image/Soft Squishy toys.jpg', '2018-11-09 13:52:14'),
(5, 1, 'LEGO Technic BMW', 99, 9.99, 'LEGO Technic BMW', '../image/LEGO Technic BMW.jpg', '2018-11-09 13:52:34'),
(6, 1, 'LEGO Creator', 99, 8.88, 'LEGO Creator', '../image/LEGO Creator.jpg', '2018-11-09 13:52:55'),
(7, 2, 'Doll Girl', 98, 3.33, 'Cute doll', '../image/doll.jpg', '2018-11-09 13:54:44'),
(8, 1, 'card', 999, 9.99, 'ddd', '../image/Dujardin.jpg', '2018-11-09 14:08:10');

-- --------------------------------------------------------

--
-- 表的结构 `ranges`
--

DROP TABLE IF EXISTS `ranges`;
CREATE TABLE IF NOT EXISTS `ranges` (
  `range_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`range_id`),
  KEY `parent_id` (`parent_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- 转存表中的数据 `ranges`
--

INSERT INTO `ranges` (`range_id`, `name`, `parent_id`, `updated`) VALUES
(1, 'Toy', NULL, '2018-10-27 13:13:21'),
(2, 'Doll', NULL, '2018-10-27 13:13:35');

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `sex` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `birthday` date NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `money` double DEFAULT NULL,
  `updated` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`user_id`, `username`, `age`, `sex`, `email`, `birthday`, `pwd`, `money`, `updated`) VALUES
(1, 'aaa', 11, 0, 'aaa@aaa.com', '2018-10-29', '47bce5c74f589f4867dbd57e9ca9f808', 1449.01, '2018-11-04 20:30:17');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
