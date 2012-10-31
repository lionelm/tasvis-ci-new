-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 31, 2012 at 07:06 AM
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_orderonline_25_10`
--

-- --------------------------------------------------------

--
-- Table structure for table `hd_users`
--

CREATE TABLE IF NOT EXISTS `hd_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `authitem_id` bigint(20) NOT NULL,
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `hd_users`
--

INSERT INTO `hd_users` (`id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `authitem_id`, `user_status`, `display_name`) VALUES
(1, 'administrator', 'ef775988943825d2871e1cfa75473ec0', 'administrator', 'vinhnt@tasvis.com.vn', '', '2012-10-04 08:01:18', 19, 1, 'administrator'),
(3, 'chung123', 'ef775988943825d2871e1cfa75473ec0', 'Nguyen Van Chung', 'chunghn@gmail.com', '', '2012-10-25 10:21:10', 22, 1, 'Nguyen Van Chung'),
(39, 'dinhhv', '1bbd886460827015e5d605ed44252251', 'hoangdinh', 'hoangdinh812@gmail.com', '', '2012-10-30 17:14:24', 0, 1, 'hoangdinh'),
(18, 'ngochoang', 'ef775988943825d2871e1cfa75473ec0', 'ngochoang', 'ngoc@gmail.com', '', '2012-10-26 08:19:18', 22, 1, 'ngochoang'),
(16, 'trongtan', 'ef775988943825d2871e1cfa75473ec0', 'le trong tan', 'trongtan@gmail.com', '', '2012-10-26 06:31:17', 19, 1, 'le trong tan'),
(19, 'thualam', 'ef775988943825d2871e1cfa75473ec0', 'thua lam', 'hoangdinh_it@yahoo.com.vn', '', '2012-10-27 01:27:46', 20, 1, 'thua lam');
