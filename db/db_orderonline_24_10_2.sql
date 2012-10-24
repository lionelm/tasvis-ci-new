-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 24, 2012 at 10:35 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `goimon`
--

-- --------------------------------------------------------

--
-- Table structure for table `hd_menu`
--

DROP TABLE IF EXISTS `hd_menu`;
CREATE TABLE IF NOT EXISTS `hd_menu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` bigint(20) NOT NULL,
  `date` datetime NOT NULL,
  `label` longtext NOT NULL,
  `description` text,
  `status` varchar(20) NOT NULL DEFAULT 'public',
  `type` varchar(20) NOT NULL,
  `title_attribute` text,
  `class` varchar(50) DEFAULT NULL,
  `target` tinyint(1) NOT NULL DEFAULT '0',
  `order` int(11) NOT NULL DEFAULT '0',
  `parent` bigint(20) NOT NULL,
  `object_id` bigint(20) DEFAULT NULL,
  `post_id` bigint(20) NOT NULL DEFAULT '0',
  `url` text,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hd_menu`
--

INSERT INTO `hd_menu` (`id`, `author`, `date`, `label`, `description`, `status`, `type`, `title_attribute`, `class`, `target`, `order`, `parent`, `object_id`, `post_id`, `url`) VALUES
(2, 0, '0000-00-00 00:00:00', ' Chính trị', '0', 'public', 'category', '', '0', 0, 0, 7, 38, 5, '0'),
(3, 0, '0000-00-00 00:00:00', 'Tasvis', '0', 'public', 'custom', '     ', '', 0, 0, 2, 38, 0, 'http://tasvis.com.vn'),
(4, 0, '0000-00-00 00:00:00', ' Tasvis company', '0', 'public', 'category', '', '', 0, 0, 0, 39, 8, '0'),
(5, 0, '0000-00-00 00:00:00', ' Chính trị', '0', 'public', 'category', '', '0', 0, 0, 4, 39, 5, '0'),
(6, 0, '0000-00-00 00:00:00', ' Tasvis company', '0', 'public', 'category', '', '0', 0, 0, 3, 38, 8, '0'),
(7, 0, '0000-00-00 00:00:00', ' Xã hội', '0', 'public', 'category', '', '', 0, 0, 0, 38, 7, '0'),
(8, 0, '0000-00-00 00:00:00', ' Thể thao', '0', 'public', 'category', '', '', 0, 0, 0, 38, 15, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
