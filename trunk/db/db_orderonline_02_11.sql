-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2012 at 04:21 AM
-- Server version: 5.5.25a
-- PHP Version: 5.4.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `codeigniter`
--

-- --------------------------------------------------------

--
-- Table structure for table `hd_authitemchilds`
--

DROP TABLE IF EXISTS `hd_authitemchilds`;
CREATE TABLE IF NOT EXISTS `hd_authitemchilds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authitem_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=97 ;

--
-- Dumping data for table `hd_authitemchilds`
--

INSERT INTO `hd_authitemchilds` (`id`, `authitem_id`, `parent_id`) VALUES
(1, 75, 93),
(2, 70, 93),
(3, 74, 93),
(4, 73, 93),
(5, 72, 93),
(6, 71, 93),
(7, 65, 92),
(8, 67, 92),
(9, 69, 92),
(10, 66, 92),
(11, 68, 92),
(14, 57, 91),
(15, 64, 91),
(16, 59, 91),
(17, 58, 91),
(18, 62, 91),
(19, 61, 91),
(20, 60, 91),
(21, 63, 91),
(22, 55, 90),
(23, 54, 90),
(24, 56, 90),
(25, 53, 89),
(26, 51, 89),
(27, 52, 89),
(28, 46, 88),
(29, 48, 88),
(30, 50, 88),
(31, 47, 88),
(32, 49, 88),
(33, 38, 87),
(34, 45, 87),
(35, 42, 87),
(36, 41, 87),
(37, 40, 87),
(38, 44, 87),
(39, 43, 87),
(40, 39, 87),
(41, 30, 87),
(42, 30, 86),
(43, 37, 86),
(44, 34, 86),
(45, 33, 86),
(46, 32, 86),
(47, 36, 86),
(48, 35, 86),
(49, 31, 86),
(50, 27, 85),
(51, 29, 85),
(52, 28, 85),
(53, 24, 84),
(54, 23, 84),
(55, 20, 84),
(56, 21, 84),
(57, 26, 84),
(58, 25, 84),
(59, 22, 84),
(60, 18, 83),
(61, 16, 83),
(62, 14, 83),
(63, 17, 83),
(64, 19, 83),
(65, 15, 83),
(66, 10, 82),
(67, 11, 82),
(68, 12, 82),
(69, 13, 82),
(70, 9, 81),
(71, 8, 81),
(72, 5, 80),
(73, 6, 80),
(74, 7, 80),
(75, 2, 79),
(76, 3, 79),
(77, 4, 79),
(78, 77, 78),
(79, 1, 76),
(80, 93, 94),
(81, 92, 94),
(82, 91, 94),
(83, 90, 94),
(84, 89, 94),
(85, 88, 94),
(86, 87, 94),
(87, 86, 94),
(88, 85, 94),
(89, 84, 94),
(90, 83, 94),
(91, 82, 94),
(92, 81, 94),
(93, 80, 94),
(94, 79, 94),
(95, 78, 94),
(96, 76, 94);

-- --------------------------------------------------------

--
-- Table structure for table `hd_authitems`
--

DROP TABLE IF EXISTS `hd_authitems`;
CREATE TABLE IF NOT EXISTS `hd_authitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=95 ;

--
-- Dumping data for table `hd_authitems`
--

INSERT INTO `hd_authitems` (`id`, `name`, `type`, `description`) VALUES
(1, 'administrator.index', 'operation', ''),
(2, 'category.index', 'operation', ''),
(3, 'category.delete', 'operation', ''),
(4, 'category.edit', 'operation', ''),
(5, 'comments.index', 'operation', ''),
(6, 'comments.edit', 'operation', ''),
(7, 'comments.delete', 'operation', ''),
(8, 'custom.index', 'operation', ''),
(9, 'custom.text', 'operation', ''),
(10, 'languages.index', 'operation', ''),
(11, 'languages.edit', 'operation', ''),
(12, 'languages.delete', 'operation', ''),
(13, 'languages.checkexits', 'operation', ''),
(14, 'login.index', 'operation', ''),
(15, 'login.checklogin', 'operation', ''),
(16, 'login.logout', 'operation', ''),
(17, 'login.forget', 'operation', ''),
(18, 'login.newpass', 'operation', ''),
(19, 'login.checknewpass', 'operation', ''),
(20, 'menus.index', 'operation', ''),
(21, 'menus.edit_main_menu', 'operation', ''),
(22, 'menus.add_main_menu', 'operation', ''),
(23, 'menus.menu', 'operation', ''),
(24, 'menus.save_detail', 'operation', ''),
(25, 'menus.delete', 'operation', ''),
(26, 'menus.delete_main_menu', 'operation', ''),
(27, 'operations.index', 'operation', ''),
(28, 'operations.delete', 'operation', ''),
(29, 'operations.edit', 'operation', ''),
(30, 'pages.index', 'operation', ''),
(31, 'pages.add', 'operation', ''),
(32, 'pages.delete', 'operation', ''),
(33, 'pages.edit', 'operation', ''),
(34, 'pages.excuteTerm', 'operation', ''),
(35, 'pages.checkSlug', 'operation', ''),
(36, 'pages.checkSlugAjax', 'operation', ''),
(37, 'pages.generateSlug', 'operation', ''),
(38, 'posts.index', 'operation', ''),
(39, 'posts.add', 'operation', ''),
(40, 'posts.delete', 'operation', ''),
(41, 'posts.edit', 'operation', ''),
(42, 'posts.excuteTerm', 'operation', ''),
(43, 'posts.checkSlug', 'operation', ''),
(44, 'posts.checkSlugAjax', 'operation', ''),
(45, 'posts.generateSlug', 'operation', ''),
(46, 'roles.index', 'operation', ''),
(47, 'roles.delete', 'operation', ''),
(48, 'roles.edit', 'operation', ''),
(49, 'roles.addChild', 'operation', ''),
(50, 'roles.deletechild', 'operation', ''),
(51, 'setting.index', 'operation', ''),
(52, 'setting.email', 'operation', ''),
(53, 'setting.seo', 'operation', ''),
(54, 'signup.index', 'operation', ''),
(55, 'signup.validation', 'operation', ''),
(56, 'signup.checkuser', 'operation', ''),
(57, 'tags.index', 'operation', ''),
(58, 'tags.delete', 'operation', ''),
(59, 'tags.edit', 'operation', ''),
(60, 'tags.checkSlug', 'operation', ''),
(61, 'tags.checkSlugAjax', 'operation', ''),
(62, 'tags.checkTagNameAjax', 'operation', ''),
(63, 'tags.addTagAjax', 'operation', ''),
(64, 'tags.generateSlug', 'operation', ''),
(65, 'tasks.index', 'operation', ''),
(66, 'tasks.delete', 'operation', ''),
(67, 'tasks.edit', 'operation', ''),
(68, 'tasks.addChild', 'operation', ''),
(69, 'tasks.deletechild', 'operation', ''),
(70, 'users.index', 'operation', ''),
(71, 'users.add', 'operation', ''),
(72, 'users.checkuser', 'operation', ''),
(73, 'users.delete', 'operation', ''),
(74, 'users.edit', 'operation', ''),
(75, 'users.profile', 'operation', ''),
(76, 'administrator.*', 'task', ''),
(77, 'authorizations.add', 'operation', ''),
(78, 'authorizations.*', 'task', ''),
(79, 'category.*', 'task', ''),
(80, 'comments.*', 'task', ''),
(81, 'customs.*', 'task', ''),
(82, 'languages.*', 'task', ''),
(83, 'login.*', 'task', ''),
(84, 'menus.*', 'task', ''),
(85, 'operations.*', 'task', ''),
(86, 'pages.*', 'task', ''),
(87, 'posts.*', 'task', ''),
(88, 'roles.*', 'task', ''),
(89, 'setting.*', 'task', ''),
(90, 'signup.*', 'task', ''),
(91, 'tags.*', 'task', ''),
(92, 'tasks.*', 'task', ''),
(93, 'users.*', 'task', ''),
(94, 'administrator', 'role', 'Super Administrator');

-- --------------------------------------------------------

--
-- Table structure for table `hd_campaigns`
--

DROP TABLE IF EXISTS `hd_campaigns`;
CREATE TABLE IF NOT EXISTS `hd_campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `summary` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `created_user` int(11) NOT NULL,
  `updated_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hd_campaigns`
--

INSERT INTO `hd_campaigns` (`id`, `name`, `summary`, `description`, `image`, `start_date`, `end_date`, `status`, `create_date`, `update_date`, `created_user`, `updated_user`) VALUES
(2, 'Cuộc thi mèo', 'Tóm tắt cuộc thi mèo', '<p>\r\n	Nội dung cuộc thi m&egrave;o</p>\r\n', '/codeigniter/elfinder/php/../files/1-4b231.jpg', '2012-10-29 17:00:44', '2012-10-31 17:00:44', 'disable', '2012-10-29 11:07:49', '2012-10-29 11:07:49', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `hd_campaigns_posts`
--

DROP TABLE IF EXISTS `hd_campaigns_posts`;
CREATE TABLE IF NOT EXISTS `hd_campaigns_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hd_campaignusers`
--

DROP TABLE IF EXISTS `hd_campaignusers`;
CREATE TABLE IF NOT EXISTS `hd_campaignusers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `campaign_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `created_date` datetime NOT NULL,
  `view` int(11) NOT NULL,
  `vote` int(11) NOT NULL,
  `share` int(11) NOT NULL,
  `comment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hd_commentmeta`
--

DROP TABLE IF EXISTS `hd_commentmeta`;
CREATE TABLE IF NOT EXISTS `hd_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hd_comments`
--

DROP TABLE IF EXISTS `hd_comments`;
CREATE TABLE IF NOT EXISTS `hd_comments` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext NOT NULL,
  `comment_author_email` varchar(100) NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) NOT NULL DEFAULT '',
  `comment_type` varchar(20) NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hd_comments`
--

INSERT INTO `hd_comments` (`id`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(2, 1, 'HungPV', 'hungpv@tasvis.com.vn', '', '', '2012-10-19 00:00:00', '0000-00-00 00:00:00', 'Comment', 0, 'approved', 'Comment', '', 0, 0),
(3, 1, 'HungPV', 'hungpv@tasvis.com.vn', '', '', '2012-10-19 00:00:00', '0000-00-00 00:00:00', 'Comment mới', 0, 'pending', 'Comment mới', '', 0, 0),
(4, 0, 'Phạm Văn Hưng', 'hungpv@tasvis.com.vn', '', '', '2012-10-19 00:00:00', '0000-00-00 00:00:00', 'Trash', 0, 'pending', 'Bình luận mới thêm', '', 0, 0),
(5, 0, 'HungPV', 'hungpv@tasvis.com.vn', '', '', '2012-10-26 00:00:00', '0000-00-00 00:00:00', 'Bình luận', 0, 'approved', 'Bình luận', '', 0, 0),
(6, 0, 'HungPV', 'hungpv@tasvis.com.vn', '', '', '2012-10-19 00:00:00', '0000-00-00 00:00:00', 'Bình luận mới', 0, 'approved', 'Bình luận mới', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hd_customdetails`
--

DROP TABLE IF EXISTS `hd_customdetails`;
CREATE TABLE IF NOT EXISTS `hd_customdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_id` int(11) NOT NULL,
  `display` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hd_customdetails`
--

INSERT INTO `hd_customdetails` (`id`, `custom_id`, `display`, `value`, `default`) VALUES
(1, 1, '', 'Author Default', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hd_customfors`
--

DROP TABLE IF EXISTS `hd_customfors`;
CREATE TABLE IF NOT EXISTS `hd_customfors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `custom_id` int(11) NOT NULL,
  `apply` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hd_customfors`
--

INSERT INTO `hd_customfors` (`id`, `custom_id`, `apply`) VALUES
(1, 1, 'post'),
(2, 1, 'page');

-- --------------------------------------------------------

--
-- Table structure for table `hd_customs`
--

DROP TABLE IF EXISTS `hd_customs`;
CREATE TABLE IF NOT EXISTS `hd_customs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `class` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT '0',
  `multi` tinyint(1) NOT NULL DEFAULT '0',
  `rule` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hd_customs`
--

INSERT INTO `hd_customs` (`id`, `label`, `name`, `description`, `type`, `extra`, `class`, `required`, `multi`, `rule`) VALUES
(1, 'Tác giả', 'author', 'Custom field for author of posts, pages', 'text', '', '', 1, 1, 'url');

-- --------------------------------------------------------

--
-- Table structure for table `hd_images`
--

DROP TABLE IF EXISTS `hd_images`;
CREATE TABLE IF NOT EXISTS `hd_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaignuser_id` int(11) NOT NULL,
  `url` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `hd_languages`
--

DROP TABLE IF EXISTS `hd_languages`;
CREATE TABLE IF NOT EXISTS `hd_languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Dumping data for table `hd_languages`
--

INSERT INTO `hd_languages` (`id`, `name`, `code`, `status`) VALUES
(1, 'Tiếng Việt', 'vi', 'enable'),
(2, 'English', 'en', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `hd_links`
--

DROP TABLE IF EXISTS `hd_links`;
CREATE TABLE IF NOT EXISTS `hd_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) NOT NULL DEFAULT '',
  `link_name` varchar(255) NOT NULL DEFAULT '',
  `link_image` varchar(255) NOT NULL DEFAULT '',
  `link_target` varchar(25) NOT NULL DEFAULT '',
  `link_description` varchar(255) NOT NULL DEFAULT '',
  `link_visible` varchar(20) NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) NOT NULL DEFAULT '',
  `link_notes` mediumtext NOT NULL,
  `link_rss` varchar(255) NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `hd_links`
--

INSERT INTO `hd_links` (`link_id`, `link_url`, `link_name`, `link_image`, `link_target`, `link_description`, `link_visible`, `link_owner`, `link_rating`, `link_updated`, `link_rel`, `link_notes`, `link_rss`) VALUES
(1, 'http://codex.wordpress.org/', 'Documentation', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(2, 'http://wordpress.org/news/', 'WordPress Blog', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', 'http://wordpress.org/news/feed/'),
(3, 'http://wordpress.org/support/', 'Support Forums', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(4, 'http://wordpress.org/extend/plugins/', 'Plugins', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(5, 'http://wordpress.org/extend/themes/', 'Themes', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(6, 'http://wordpress.org/support/forum/requests-and-feedback', 'Feedback', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', ''),
(7, 'http://planet.wordpress.org/', 'WordPress Planet', '', '', '', 'Y', 1, 0, '0000-00-00 00:00:00', '', '', '');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `hd_menu`
--

INSERT INTO `hd_menu` (`id`, `author`, `date`, `label`, `description`, `status`, `type`, `title_attribute`, `class`, `target`, `order`, `parent`, `object_id`, `post_id`, `url`) VALUES
(21, 0, '0000-00-00 00:00:00', ' Kinh tế', '0', 'public', 'category', '', '', 0, 0, 0, 39, 8, '0'),
(20, 0, '0000-00-00 00:00:00', ' Văn hóa', '0', 'public', 'category', '', '0', 0, 0, 18, 39, 9, '0'),
(17, 0, '0000-00-00 00:00:00', ' Văn hóa', '0', 'public', 'category', '', '', 0, 0, 0, 38, 9, '0'),
(18, 0, '0000-00-00 00:00:00', ' Tasvis company', '0', 'public', 'category', '', '0', 0, 0, 21, 39, 8, '0'),
(19, 0, '0000-00-00 00:00:00', ' Thể thao', '0', 'public', 'category', '', '', 0, 0, 0, 39, 15, '0'),
(16, 0, '0000-00-00 00:00:00', ' abc', '0', 'public', 'category', '', '0', 0, 0, 17, 38, 37, '0'),
(15, 0, '0000-00-00 00:00:00', ' Tasvis company', '0', 'public', 'category', '', '', 0, 0, 0, 38, 8, '0');

-- --------------------------------------------------------

--
-- Table structure for table `hd_options`
--

DROP TABLE IF EXISTS `hd_options`;
CREATE TABLE IF NOT EXISTS `hd_options` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(64) NOT NULL DEFAULT '',
  `option_value` longtext NOT NULL,
  `autoload` varchar(20) NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=109 ;

--
-- Dumping data for table `hd_options`
--

INSERT INTO `hd_options` (`id`, `option_name`, `option_value`, `autoload`) VALUES
(1, 'siteurl', 'http://localhost/wordpress', 'yes'),
(2, 'blogname', 'Gọi đồ ăn trực tuyến', 'yes'),
(3, 'blogdescription', 'Just another WordPress site', 'yes'),
(4, 'users_can_register', '0', 'yes'),
(5, 'admin_email', 'vinhnt@tasvis.com.vn', 'yes'),
(6, 'start_of_week', '1', 'yes'),
(7, 'use_balanceTags', '0', 'yes'),
(8, 'use_smilies', '1', 'yes'),
(9, 'require_name_email', '1', 'yes'),
(10, 'comments_notify', '1', 'yes'),
(11, 'posts_per_rss', '10', 'yes'),
(12, 'rss_use_excerpt', '0', 'yes'),
(13, 'mailserver_url', 'mail.example.com', 'yes'),
(14, 'mailserver_login', 'login@example.com', 'yes'),
(15, 'mailserver_pass', 'password', 'yes'),
(16, 'mailserver_port', '110', 'yes'),
(17, 'default_category', '1', 'yes'),
(18, 'default_comment_status', 'open', 'yes'),
(19, 'default_ping_status', 'open', 'yes'),
(20, 'default_pingback_flag', '1', 'yes'),
(21, 'default_post_edit_rows', '20', 'yes'),
(22, 'posts_per_page', '10', 'yes'),
(23, 'date_format', 'F j, Y', 'yes'),
(24, 'time_format', 'g:i a', 'yes'),
(25, 'links_updated_date_format', 'F j, Y g:i a', 'yes'),
(26, 'links_recently_updated_prepend', '<em>', 'yes'),
(27, 'links_recently_updated_append', '</em>', 'yes'),
(28, 'links_recently_updated_time', '120', 'yes'),
(29, 'comment_moderation', '0', 'yes'),
(30, 'moderation_notify', '1', 'yes'),
(31, 'permalink_structure', '', 'yes'),
(32, 'gzipcompression', '0', 'yes'),
(33, 'hack_file', '0', 'yes'),
(34, 'blog_charset', 'UTF-8', 'yes'),
(35, 'moderation_keys', '', 'no'),
(36, 'active_plugins', 'a:0:{}', 'yes'),
(37, 'home', 'http://localhost/wordpress', 'yes'),
(38, 'category_base', '', 'yes'),
(39, 'ping_sites', 'http://rpc.pingomatic.com/', 'yes'),
(40, 'advanced_edit', '0', 'yes'),
(41, 'comment_max_links', '2', 'yes'),
(42, 'gmt_offset', '0', 'yes'),
(43, 'default_email_category', '1', 'yes'),
(44, 'recently_edited', '', 'no'),
(45, 'template', 'ajbsas', 'yes'),
(46, 'stylesheet', 'twentyeleven', 'yes'),
(47, 'comment_whitelist', '1', 'yes'),
(48, 'blacklist_keys', '', 'no'),
(49, 'comment_registration', '0', 'yes'),
(50, 'html_type', 'text/html', 'yes'),
(51, 'use_trackback', '0', 'yes'),
(52, 'default_role', 'subscriber', 'yes'),
(53, 'db_version', '21115', 'yes'),
(54, 'uploads_use_yearmonth_folders', '1', 'yes'),
(55, 'upload_path', '', 'yes'),
(56, 'blog_public', '1', 'yes'),
(57, 'default_link_category', '2', 'yes'),
(58, 'show_on_front', 'posts', 'yes'),
(59, 'tag_base', '', 'yes'),
(60, 'show_avatars', '1', 'yes'),
(61, 'avatar_rating', 'G', 'yes'),
(62, 'upload_url_path', '', 'yes'),
(63, 'thumbnail_size_w', '150', 'yes'),
(64, 'thumbnail_size_h', '150', 'yes'),
(65, 'thumbnail_crop', '1', 'yes'),
(66, 'medium_size_w', '300', 'yes'),
(67, 'medium_size_h', '300', 'yes'),
(68, 'avatar_default', 'mystery', 'yes'),
(69, 'enable_app', '0', 'yes'),
(70, 'enable_xmlrpc', '0', 'yes'),
(71, 'large_size_w', '1024', 'yes'),
(72, 'large_size_h', '1024', 'yes'),
(73, 'image_default_link_type', 'file', 'yes'),
(74, 'image_default_size', '', 'yes'),
(75, 'image_default_align', '', 'yes'),
(76, 'close_comments_for_old_posts', '0', 'yes'),
(77, 'close_comments_days_old', '14', 'yes'),
(78, 'thread_comments', '1', 'yes'),
(79, 'thread_comments_depth', '5', 'yes'),
(80, 'page_comments', '0', 'yes'),
(81, 'comments_per_page', '50', 'yes'),
(82, 'default_comments_page', 'newest', 'yes'),
(83, 'comment_order', 'asc', 'yes'),
(84, 'sticky_posts', 'a:0:{}', 'yes'),
(85, 'widget_categories', 'a:2:{i:2;a:4:{s:5:"title";s:0:"";s:5:"count";i:0;s:12:"hierarchical";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(86, 'widget_text', 'a:0:{}', 'yes'),
(87, 'widget_rss', 'a:0:{}', 'yes'),
(88, 'uninstall_plugins', 'a:0:{}', 'no'),
(89, 'timezone_string', '', 'yes'),
(90, 'embed_autourls', '1', 'yes'),
(91, 'embed_size_w', '', 'yes'),
(92, 'embed_size_h', '600', 'yes'),
(93, 'page_for_posts', '0', 'yes'),
(94, 'page_on_front', '0', 'yes'),
(95, 'default_post_format', '0', 'yes'),
(96, 'initial_db_version', '21115', 'yes'),
(97, 'hd_user_roles', 'a:5:{s:13:"administrator";a:2:{s:4:"name";s:13:"Administrator";s:12:"capabilities";a:62:{s:13:"switch_themes";b:1;s:11:"edit_themes";b:1;s:16:"activate_plugins";b:1;s:12:"edit_plugins";b:1;s:10:"edit_users";b:1;s:10:"edit_files";b:1;s:14:"manage_options";b:1;s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:6:"import";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:8:"level_10";b:1;s:7:"level_9";b:1;s:7:"level_8";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;s:12:"delete_users";b:1;s:12:"create_users";b:1;s:17:"unfiltered_upload";b:1;s:14:"edit_dashboard";b:1;s:14:"update_plugins";b:1;s:14:"delete_plugins";b:1;s:15:"install_plugins";b:1;s:13:"update_themes";b:1;s:14:"install_themes";b:1;s:11:"update_core";b:1;s:10:"list_users";b:1;s:12:"remove_users";b:1;s:9:"add_users";b:1;s:13:"promote_users";b:1;s:18:"edit_theme_options";b:1;s:13:"delete_themes";b:1;s:6:"export";b:1;}}s:6:"editor";a:2:{s:4:"name";s:6:"Editor";s:12:"capabilities";a:34:{s:17:"moderate_comments";b:1;s:17:"manage_categories";b:1;s:12:"manage_links";b:1;s:12:"upload_files";b:1;s:15:"unfiltered_html";b:1;s:10:"edit_posts";b:1;s:17:"edit_others_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:10:"edit_pages";b:1;s:4:"read";b:1;s:7:"level_7";b:1;s:7:"level_6";b:1;s:7:"level_5";b:1;s:7:"level_4";b:1;s:7:"level_3";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:17:"edit_others_pages";b:1;s:20:"edit_published_pages";b:1;s:13:"publish_pages";b:1;s:12:"delete_pages";b:1;s:19:"delete_others_pages";b:1;s:22:"delete_published_pages";b:1;s:12:"delete_posts";b:1;s:19:"delete_others_posts";b:1;s:22:"delete_published_posts";b:1;s:20:"delete_private_posts";b:1;s:18:"edit_private_posts";b:1;s:18:"read_private_posts";b:1;s:20:"delete_private_pages";b:1;s:18:"edit_private_pages";b:1;s:18:"read_private_pages";b:1;}}s:6:"author";a:2:{s:4:"name";s:6:"Author";s:12:"capabilities";a:10:{s:12:"upload_files";b:1;s:10:"edit_posts";b:1;s:20:"edit_published_posts";b:1;s:13:"publish_posts";b:1;s:4:"read";b:1;s:7:"level_2";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;s:22:"delete_published_posts";b:1;}}s:11:"contributor";a:2:{s:4:"name";s:11:"Contributor";s:12:"capabilities";a:5:{s:10:"edit_posts";b:1;s:4:"read";b:1;s:7:"level_1";b:1;s:7:"level_0";b:1;s:12:"delete_posts";b:1;}}s:10:"subscriber";a:2:{s:4:"name";s:10:"Subscriber";s:12:"capabilities";a:2:{s:4:"read";b:1;s:7:"level_0";b:1;}}}', 'yes'),
(98, 'widget_search', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(99, 'widget_recent-posts', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(100, 'widget_recent-comments', 'a:2:{i:2;a:2:{s:5:"title";s:0:"";s:6:"number";i:5;}s:12:"_multiwidget";i:1;}', 'yes'),
(101, 'widget_archives', 'a:2:{i:2;a:3:{s:5:"title";s:0:"";s:5:"count";i:0;s:8:"dropdown";i:0;}s:12:"_multiwidget";i:1;}', 'yes'),
(102, 'widget_meta', 'a:2:{i:2;a:1:{s:5:"title";s:0:"";}s:12:"_multiwidget";i:1;}', 'yes'),
(103, 'sidebars_widgets', 'a:7:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}s:9:"sidebar-4";a:0:{}s:9:"sidebar-5";a:0:{}s:13:"array_version";i:3;}', 'yes'),
(104, 'site_title', 'asd', 'yes'),
(105, 'site_name', 'sdsds', 'yes'),
(106, 'site_url', 'sd', 'yes'),
(107, 'email_admin', 'dsd', 'yes'),
(108, 'site_description', '', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `hd_postmeta`
--

DROP TABLE IF EXISTS `hd_postmeta`;
CREATE TABLE IF NOT EXISTS `hd_postmeta` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `hd_postmeta`
--

INSERT INTO `hd_postmeta` (`id`, `post_id`, `meta_key`, `meta_value`) VALUES
(13, 4, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(14, 4, 'seo_title', 'Japanese ministers visit Yasukuni shrine'),
(15, 4, 'seo_description', 'Japanese ministers visit Yasukuni shrine'),
(16, 4, 'seo_keyword', 'Japanese'),
(17, 5, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(18, 5, 'seo_title', 'nhật'),
(19, 5, 'seo_description', 'nhật'),
(20, 5, 'seo_keyword', 'nhật'),
(25, 7, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(26, 7, 'seo_title', 'Công ty cổ phần Tasvis'),
(27, 7, 'seo_description', 'Công ty cổ phần Tasvis'),
(28, 7, 'seo_keyword', 'tasvis, công ty'),
(29, 8, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(30, 8, 'seo_title', 'Tasvis company'),
(31, 8, 'seo_description', 'Tasvis company'),
(32, 8, 'seo_keyword', 'Tasvis');

-- --------------------------------------------------------

--
-- Table structure for table `hd_posts`
--

DROP TABLE IF EXISTS `hd_posts`;
CREATE TABLE IF NOT EXISTS `hd_posts` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext NOT NULL,
  `post_title` text NOT NULL,
  `post_excerpt` text NOT NULL,
  `post_status` varchar(20) NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) NOT NULL DEFAULT 'open',
  `post_password` varchar(20) NOT NULL DEFAULT '',
  `post_name` varchar(200) NOT NULL DEFAULT '',
  `to_ping` text NOT NULL,
  `pinged` text NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  `language_id` int(11) NOT NULL,
  `root_lang` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hd_posts`
--

INSERT INTO `hd_posts` (`id`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`, `language_id`, `root_lang`) VALUES
(4, 0, '2012-10-18 14:40:48', '2012-10-18 14:40:37', '<p class="introduction" id="story_continues_1" style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-weight: bold; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Two Japanese ministers have visited Tokyo&#39;s Yasukuni Shrine, in a move likely to further sour relations with regional neighbours.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The move by the transport and postal reform ministers followed opposition leader Shinzo Abe&#39;s visit on Wednesday.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	China and South Korea have reacted angrily to the visit of Mr Abe, who could become the next prime minister.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The Yasukuni shrine commemorates Japan&#39;s war dead - including 14 convicted Class A war criminals.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	It is viewed by many of the country&#39;s neighbours as a reminder of Japan&#39;s military past.</p>\r\n<p>\r\n	<span class="cross-head" style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; display: block; font-weight: bold; margin: 0px 0px 16px; font-size: 1.231em; text-rendering: optimizelegibility; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">&#39;Insult to injury&#39;</span></p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Transport Minister Yuichiro Hata and Postal Reform Minister Mikio Shimoji - both members of the cabinet - were among a group of lawmakers who went to the shrine on Thursday morning to mark its autumn festival.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Mr Hata is from the ruling Democratic Party (DPJ) and Mr Shimoji from a junior coalition partner. Mr Hata had also visited the shrine in August, on what he said was a private visit to mark the end of WWII.</p>\r\n<div class="story-feature wide " style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; position: relative; margin: 0px -160px 16px 16px; width: 304px; float: right; display: inline; overflow: hidden; clear: right; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	<a class="hidden" href="http://www.bbc.co.uk/news/world-asia-19986895#story_continues_2" style="color: rgb(74, 113, 148); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; text-decoration: none; font-weight: bold; position: absolute; top: -5000px; left: -5000px; ">Continue reading the main story</a>\r\n	<h2 style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 11px 0px 12px; font-size: 1.231em; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(216, 216, 216); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(216, 216, 216); font-weight: bold; text-rendering: optimizelegibility; ">\r\n		Yasukuni Shrine</h2>\r\n	<ul style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 16px; padding: 0px; list-style: none; clear: both; ">\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Built in 1869 under the Emperor Meiji</li>\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Venerates the souls of Japan&#39;s war dead</li>\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Those enshrined include 14 Class A war criminals</li>\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Japan&#39;s neighbours say it represents the country&#39;s past miltarism</li>\r\n	</ul>\r\n	<ul class="links-list" style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 16px; padding: 7px 0px 0px; list-style: none; clear: both; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(232, 232, 232); ">\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px; font-size: 1em; text-rendering: auto; background-image: none; position: relative; background-position: initial initial; background-repeat: initial initial; ">\r\n			<a href="http://www.bbc.co.uk/news/world-asia-19987251" style="color: rgb(23, 79, 130); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; text-decoration: none; font-weight: bold; font-size: 13px; ">Japan&#39;s Yasukuni Shrine</a></li>\r\n	</ul>\r\n</div>\r\n<p id="story_continues_2" style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Prime Minister Yoshihiko Noda has previously urged members of his cabinet not to visit the shrine.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	When asked, Japanese Chief Cabinet Secretary Osamu Fujimura downplayed the visit as &#39;&#39;one by private individuals&#39;&#39;.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	&#39;&#39;As these are personal actions by cabinet members, the government cannot comment further on the matter,&quot; he told reporters.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Meanwhile a South Korean foreign ministry spokesman expressed &#39;&#39;deep regret and concern&#39;&#39; over Mr Abe&#39;s visit to the shrine - &quot;a symbol of the Japanese war of aggression and militarism&quot;.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Mr Abe, the newly-elected Liberal Democratic Party (LDP) leader, said he was paying his respects.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	China berated Mr Abe for the visit, saying it would &quot;further poison bilateral ties&quot; in a strongly-worded report carried by state-run Xinhua news agency.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	&quot;At such a delicate moment, Abe&#39;s visit... has added insult to injury and dealt another blow to the already fragile Sino-Japanese relations,&quot; the report said.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Mr Abe was prime minister in 2006 - the youngest elected since World War II - but he stepped down a year later citing ill health as support for his administration plummeted. He did not visit the shrine while he was prime minister.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Elections are expected in Japan in coming months - potentially positioning Mr Abe for a second spell as prime minister.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Ties between Tokyo and Beijing remain severely strained by a row over a group of East China Sea islands that both claim.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The territorial row - over islands known as Senkaku in Japan and Diaoyu in China - has led to anti-Japanese protests in some Chinese cities and affected a number of Japanese companies operating in China.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The dispute between Tokyo and Seoul is over another group of islands, known as Dokdo in South Korea and Takeshima in Japan.</p>\r\n', 'Japanese ministers visit Yasukuni shrine', 'Japanese ministers visit Yasukuni shrine                                                ', 'publish', 'open', 'open', '', '', '', '', '2012-10-22 11:19:12', '0000-00-00 00:00:00', '', 0, 'japanese-ministers-visit-yasukuni-shrine', 0, 'post', '', 0, 2, 3),
(5, 0, '0000-00-00 00:00:00', '2012-10-18 14:40:37', '<p>\r\n	B&agrave;i về người nhật</p>\r\n', 'Người nhật bản', 'Người nhật', 'publish', 'open', 'open', '', '', '', '', '2012-10-22 11:19:12', '0000-00-00 00:00:00', '', 0, 'nguoi-nhat-ban', 0, 'post', '', 0, 1, 3),
(7, 0, '2012-10-19 13:48:05', '2012-10-19 13:46:25', '<p>\r\n	C&ocirc;ng ty Cổ phần Tasvis</p>\r\n', 'Công ty cổ phần Tasvis.', 'Công ty Cổ phần Tasvis', 'publish', 'open', 'open', '', '', '', '', '2012-10-19 15:05:31', '0000-00-00 00:00:00', '', 0, 'cong-ty-co-phan-tasvis-1', 0, 'page', '', 0, 1, 4),
(8, 0, '0000-00-00 00:00:00', '2012-10-19 13:46:25', '<p>\r\n	Tasvis company</p>\r\n', 'Tasvis company', 'Tasvis company', 'publish', 'open', 'open', '', '', '', '', '2012-10-19 15:05:31', '0000-00-00 00:00:00', '', 0, 'tasvis-company', 0, 'page', '', 0, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hd_terms`
--

DROP TABLE IF EXISTS `hd_terms`;
CREATE TABLE IF NOT EXISTS `hd_terms` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL DEFAULT '',
  `slug` varchar(200) NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `name` (`name`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `hd_terms`
--

INSERT INTO `hd_terms` (`id`, `name`, `slug`, `term_group`) VALUES
(5, 'Chính trị', 'chinh-tri', 0),
(7, 'Xã hội', 'xa-hoi', 0),
(8, 'Kinh tế', 'kinh-te', 0),
(9, 'Văn hóa', 'van-hoa', 0),
(10, 'Giáo dục', 'giao-duc', 0),
(15, 'Thể thao', 'the-thao', 0),
(16, 'Bảng giá email hosting', 'bang-gia-email-hosting', 0),
(18, 'Bảng giá hosting', 'bang-gia-hosting', 0),
(19, 'Chăm sóc website', 'cham-soc-website', 0),
(20, 'Tag mới 1', 'tag-moi', 0),
(21, 'Tag mới 2', 'tag-moi(1)', 0),
(23, 'Tag mới 3', 'tag-moi(2)', 0),
(24, 'Tag mới 4', 'tag-moi(3)', 0),
(25, 'Tag mới', 'tag-moi(4)', 0),
(27, 'Chăm sóc sắc đẹp', 'cham-soc-sac-dep', 0),
(28, 'Thêm tag', 'them-tag', 0),
(29, 'Thêm tag mới', 'them-tag-moi', 0),
(30, 'Tags new', 'tags-new', 0),
(34, 'giao thông', 'giao-thong', 0),
(35, 'Tag mới 6', 'tag-moi-1', 0),
(36, 'Tag mới 7', 'tag-moi-2', 0),
(37, 'abc', 'abc', 0),
(38, 'Menu top', 'Menu top', 1),
(39, 'Menu left', 'Menu left', 1);

-- --------------------------------------------------------

--
-- Table structure for table `hd_term_taxonomies`
--

DROP TABLE IF EXISTS `hd_term_taxonomies`;
CREATE TABLE IF NOT EXISTS `hd_term_taxonomies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) NOT NULL DEFAULT '',
  `description` longtext NOT NULL,
  `parent_term` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Dumping data for table `hd_term_taxonomies`
--

INSERT INTO `hd_term_taxonomies` (`id`, `term_id`, `taxonomy`, `description`, `parent_term`, `count`) VALUES
(5, 5, 'category', 'Chính trị', 0, 0),
(7, 7, 'category', 'Xã hội', 0, 0),
(8, 8, 'category', 'Kinh tế', 0, 0),
(9, 9, 'category', 'Văn hóa', 0, 0),
(10, 10, 'category', 'Giáo dục', 0, 0),
(12, 15, 'category', 'Thể thao', 7, 0),
(13, 16, 'tag', 'Mô tả bảng giá email hosting', 0, 0),
(15, 18, 'tag', 'Mô tả bảng giá hosting.', 0, 0),
(16, 19, 'tag', 'Chăm sóc website', 0, 0),
(17, 20, 'tag', 'Tag mới 1', 0, 0),
(18, 21, 'tag', 'Tag mới 2', 0, 0),
(19, 23, 'tag', 'Tag mới 3', 0, 0),
(20, 24, 'tag', 'Tag mới 4', 0, 0),
(21, 25, 'tag', 'Tag mới 5', 0, 0),
(23, 27, 'tag', 'Mô tả chăm sóc sắc đẹp', 0, 0),
(24, 28, 'tag', 'Thêm tag', 0, 0),
(25, 29, 'tag', 'Thêm tag mới', 0, 0),
(26, 30, 'tag', 'Tags new', 0, 0),
(27, 34, 'tag', 'giao thông', 0, 0),
(28, 35, 'tag', 'Tag mới', 0, 0),
(29, 36, 'tag', 'Tag mới', 0, 0),
(30, 37, 'category', 'abc', 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hd_term_taxonomies_posts`
--

DROP TABLE IF EXISTS `hd_term_taxonomies_posts`;
CREATE TABLE IF NOT EXISTS `hd_term_taxonomies_posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`),
  KEY `term_taxonomy_id_2` (`term_taxonomy_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=271 ;

--
-- Dumping data for table `hd_term_taxonomies_posts`
--

INSERT INTO `hd_term_taxonomies_posts` (`id`, `post_id`, `term_taxonomy_id`, `term_order`) VALUES
(270, 4, 25, 0),
(269, 4, 9, 0),
(268, 5, 25, 0),
(267, 5, 9, 0),
(262, 8, 30, 0),
(261, 8, 29, 0),
(260, 8, 28, 0),
(259, 8, 27, 0),
(258, 8, 26, 0),
(257, 8, 25, 0),
(256, 8, 24, 0),
(255, 8, 23, 0),
(254, 8, 21, 0),
(253, 8, 20, 0),
(252, 8, 19, 0),
(240, 7, 30, 0),
(239, 7, 29, 0),
(238, 7, 28, 0),
(237, 7, 27, 0),
(236, 7, 26, 0),
(235, 7, 25, 0),
(234, 7, 24, 0),
(233, 7, 23, 0),
(232, 7, 21, 0),
(231, 7, 20, 0),
(230, 7, 19, 0),
(251, 8, 18, 0),
(250, 8, 17, 0),
(249, 8, 16, 0),
(248, 8, 15, 0),
(229, 7, 18, 0),
(228, 7, 17, 0),
(227, 7, 16, 0),
(226, 7, 15, 0),
(225, 7, 13, 0),
(224, 7, 12, 0),
(223, 7, 10, 0),
(222, 7, 9, 0),
(221, 7, 8, 0),
(220, 7, 7, 0),
(219, 7, 5, 0),
(247, 8, 13, 0),
(246, 8, 12, 0),
(245, 8, 10, 0),
(244, 8, 9, 0),
(243, 8, 8, 0),
(242, 8, 7, 0),
(241, 8, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hd_usermeta`
--

DROP TABLE IF EXISTS `hd_usermeta`;
CREATE TABLE IF NOT EXISTS `hd_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `hd_usermeta`
--

INSERT INTO `hd_usermeta` (`umeta_id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 1, 'first_name', ''),
(2, 1, 'last_name', ''),
(3, 1, 'nickname', 'administrator'),
(4, 1, 'description', ''),
(5, 1, 'rich_editing', 'true'),
(6, 1, 'comment_shortcuts', 'false'),
(7, 1, 'admin_color', 'fresh'),
(8, 1, 'use_ssl', '0'),
(9, 1, 'show_admin_bar_front', 'true'),
(10, 1, 'hd_capabilities', 'a:1:{s:13:"administrator";s:1:"1";}'),
(11, 1, 'hd_user_level', '10'),
(12, 1, 'dismissed_wp_pointers', 'wp330_toolbar,wp330_media_uploader,wp330_saving_widgets,wp340_choose_image_from_library,wp340_customize_current_theme_link'),
(13, 1, 'show_welcome_panel', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hd_users`
--

DROP TABLE IF EXISTS `hd_users`;
CREATE TABLE IF NOT EXISTS `hd_users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `hd_users`
--

INSERT INTO `hd_users` (`id`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'admin', 'e6e061838856bf47e1de730719fb2609', 'administrator', 'vinhnt@tasvis.com.vn', '', '2012-10-04 08:01:18', 'Admin', 1, 'administrator'),
(2, 'vanhung90_hd', 'fa0980726c3154a576e749daafce1dbf', 'Phạm Văn Hưng', 'phamvanhung0818@gmai.com', '', '2012-11-02 03:38:16', '', 0, 'Phạm Văn Hưng'),
(6, 'hungpv', 'fa0980726c3154a576e749daafce1dbf', 'Phạm Văn Hưng', 'phamvanhung0818@gmai.com', '', '2012-11-02 04:02:22', '', 0, 'Phạm Văn Hưng'),
(7, 'hung', 'e10adc3949ba59abbe56e057f20f883e', 'hung', 'phamvanhung0818@gmail.com', '', '2012-11-02 04:08:13', '', 0, 'hung'),
(8, 'vanhung', 'fa0980726c3154a576e749daafce1dbf', 'vanhung', 'phamvanhung0818@gmai.com', '', '2012-11-02 04:09:07', '', 0, 'vanhung');

-- --------------------------------------------------------

--
-- Table structure for table `hd_users_authitems`
--

DROP TABLE IF EXISTS `hd_users_authitems`;
CREATE TABLE IF NOT EXISTS `hd_users_authitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `authitem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hd_users_authitems`
--

INSERT INTO `hd_users_authitems` (`id`, `user_id`, `authitem_id`) VALUES
(1, 1, 94);

-- --------------------------------------------------------

--
-- Table structure for table `hd_validates`
--

DROP TABLE IF EXISTS `hd_validates`;
CREATE TABLE IF NOT EXISTS `hd_validates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `confim_code` varchar(255) NOT NULL,
  `login` varchar(64) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `hd_validates`
--

INSERT INTO `hd_validates` (`id`, `confim_code`, `login`, `email`) VALUES
(1, 'ff9a32ed48a196375d38464c29aa6a4a', 'hungpv', 'phamvanhung0818@gmai.com'),
(2, 'aed15e484a996c336b633b585c2cffaa', 'hungpv', 'phamvanhung0818@gmai.com'),
(3, '56c7aeaa098529a08c23042deffef84a', 'hungpv', 'phamvanhung0818@gmai.com'),
(4, 'd6a93e1705f969910708e306251a09d0', 'hungpv', 'phamvanhung0818@gmai.com'),
(5, '83bfdc050a82d2d41032e03e42e49493', 'hung', 'phamvanhung0818@gmail.com'),
(6, '9e29483022674083a25beb62017e68c8', 'vanhung', 'phamvanhung0818@gmai.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
