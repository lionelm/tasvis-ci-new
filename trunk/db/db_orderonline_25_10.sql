-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 25, 2012 at 11:49 AM
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
-- Table structure for table `hd_authitemchilds`
--

CREATE TABLE IF NOT EXISTS `hd_authitemchilds` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `authitem_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `hd_authitemchilds`
--

INSERT INTO `hd_authitemchilds` (`id`, `authitem_id`, `parent_id`) VALUES
(29, 11, 16),
(31, 12, 16),
(32, 1, 15),
(33, 2, 15),
(34, 3, 15),
(39, 19, 20),
(44, 18, 16),
(46, 16, 20),
(47, 15, 20),
(48, 10, 20),
(49, 1, 16),
(50, 3, 16),
(53, 16, 19),
(54, 4, 10),
(55, 6, 10),
(56, 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hd_authitems`
--

CREATE TABLE IF NOT EXISTS `hd_authitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=21 ;

--
-- Dumping data for table `hd_authitems`
--

INSERT INTO `hd_authitems` (`id`, `name`, `type`, `description`) VALUES
(1, 'Posts.add', 'operation', 'Thêm bài viết'),
(2, 'Posts.edit', 'operation', 'Sửa bài viết'),
(3, 'Posts.delete', 'operation', 'Xóa bài viết'),
(4, 'Tags.add', 'operation', 'Thêm Tag'),
(5, 'Tags.edit', 'operation', 'Sửa tag'),
(6, 'Tags.delete', 'operation', 'Xóa tag'),
(10, 'Tags.*', 'task', 'Quản lý tag'),
(11, 'Users.add', 'operation', 'Thêm người dùng'),
(12, 'Users.edit', 'operation', 'Sửa người dùng'),
(15, 'Posts.*', 'task', 'Quản lý bài viết'),
(16, 'Users.*', 'task', 'Quản lý người dùng'),
(18, 'Users.delete', 'operation', 'Xóa người dùng'),
(19, 'Admin', 'role', 'Quản lý chung'),
(20, 'QuanLyDienDan', 'role', 'Quản lý diễn đàn');

-- --------------------------------------------------------

--
-- Table structure for table `hd_commentmeta`
--

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
-- Table structure for table `hd_languages`
--

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

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
(8, 0, '0000-00-00 00:00:00', ' Thể thao', '0', 'public', 'category', '', '', 0, 0, 0, 38, 15, '0'),
(9, 0, '0000-00-00 00:00:00', '<!--:vi-->Trang chủ<!--:--><!--:en-->Home<!--:-->', '0', 'public', 'custom', '', '', 0, 0, 0, 39, 0, 'http://localhost/goimon');

-- --------------------------------------------------------

--
-- Table structure for table `hd_options`
--

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
(1, 1, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(2, 1, 'seo_title', 'Những chuyện ly kỳ quanh gốc thị ngàn năm tuổi'),
(3, 1, 'seo_description', 'Những chuyện ly kỳ quanh gốc thị ngàn năm tuổi'),
(4, 1, 'seo_keyword', 'gốc cây, ngàn năm'),
(5, 2, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(6, 2, 'seo_title', 'tree 1000 years'),
(7, 2, 'seo_description', 'tree 1000 years'),
(8, 2, 'seo_keyword', 'tree 1000 years'),
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
(1, 0, '2012-10-18 13:43:02', '2012-10-18 13:38:37', '<div class="fon34 mt3 mr2 fon43" style="margin: 15px 10px 14.100000381469727px 0px; padding: 0px; font-weight: 500; font-style: normal; font-variant: normal; font-size: 12pt; line-height: 20px !important; font-family: ''Times New Roman''; color: rgb(0, 0, 0); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	<p style="margin: 13.8px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px ! important;">\r\n		Đ&oacute; l&agrave; c&acirc;y thị cổ gắn với lịch sử chống giặc Minh x&acirc;m lược của L&ecirc; Lợi v&agrave; Nguyễn Tuấn Thiện. Đến nay &ldquo;gốc thị lịch sử&rdquo; x&oacute;m Kim Sơn 2, x&atilde; Sơn Ph&uacute;c (Hương Sơn, H&agrave; Tĩnh) đ&atilde; gần ng&agrave;n năm tuổi. V&agrave; những chuyện ly kỳ quanh gốc thị như một giai thoại.</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Theo các tài liệu ghi chép lại thì tính đến nay gốc thị cổ đã gần nghìn năm tuổi." src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-1-3caa2.JPG" style="margin: 5px; padding: 0px; " width="400" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">Theo c&aacute;c t&agrave;i liệu ghi ch&eacute;p lại th&igrave; t&iacute;nh đến nay gốc thị cổ đ&atilde; gần ngh&igrave;n năm tuổi.</span></span></span></div>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Ng</span><span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n khắp nơi v&agrave; trong x</span>&atilde; xem &ldquo;gốc thị lịch sử&rdquo; nh<span lang="VI" style="margin: 0px; padding: 0px; ">ư l&agrave; một c&acirc;y t&acirc;m linh. Người kh&ocirc;ng c&oacute; con trai cầu th</span>&igrave; được con trai (?). C&ograve;n những b&aacute;c n&ocirc;ng d&acirc;n tr&acirc;u b&ograve; đi lạc đến gốc thị cầu th&igrave; tr&acirc;u b&ograve; sẽ tự t&igrave;m về chuồng&hellip;V&agrave; ng<span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n cứ truyền tai nhau về những c&acirc;u chuyện ly kỳ b&ecirc;n gốc thị cổ.</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<b style="margin: 0px; padding: 0px; "><span lang="EN" style="margin: 0px; padding: 0px; ">Sự t&iacute;ch &ldquo;c&acirc;y thị ăn thề&rdquo; - con c&aacute;o trắng cứu vua</span></b></p>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">&ldquo;C&acirc;y thị ăn thề&rdquo; gắn liền với lịch sử chống giặc Minh x&acirc;m lược của L&ecirc; Lợi v&agrave; Nguyễn Tuấn Thiện v&agrave;o thế kỷ XV tọa lạc trong khu v</span><span lang="VI" style="margin: 0px; padding: 0px; ">ườn gia đ</span>&igrave;nh chị Nguyễn Thị H<span lang="VI" style="margin: 0px; padding: 0px; ">ương (38 tuổi) ở x&oacute;m Kim Sơn 2, x</span>&atilde; S<span lang="VI" style="margin: 0px; padding: 0px; ">ơn Ph&uacute;c (Hương Sơn,</span><span lang="VI" style="margin: 0px; padding: 0px; ">H&agrave; Tĩnh)</span><span lang="VI" style="margin: 0px; padding: 0px; "><span class="Apple-converted-space">&nbsp;</span></span><span lang="VI" style="margin: 0px; padding: 0px; ">gần ng&agrave;n năm nay. C&acirc;y cao khoảng 40m, t&aacute;n rộng khoảng 30m, đường k&iacute;nh c&acirc;y<span class="Apple-converted-space">&nbsp;</span></span>khoảng<span lang="VI" style="margin: 0px; padding: 0px; "><span class="Apple-converted-space">&nbsp;</span>5<span class="Apple-converted-space">&nbsp;</span></span>-<span lang="VI" style="margin: 0px; padding: 0px; "><span class="Apple-converted-space">&nbsp;</span>6 người &ocirc;m, ph&iacute;a trong c&acirc;y rỗng c&oacute; thể ngồi được v&agrave;i người.</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Tiếp ch&uacute;ng t&ocirc;i l&agrave; &ocirc;ng Nguyễn Ho&agrave;ng D</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơi năm nay đ</span>&atilde; 78 tuổi, đồng thời l&agrave; tr<span lang="VI" style="margin: 0px; padding: 0px; ">ưởng họ đời thứ 20 của d</span>&ograve;ng họ Nguyễn Tuấn. &Ocirc;ng D<span lang="VI" style="margin: 0px; padding: 0px; ">ơi chậm r</span>&atilde;i kể về sử t&iacute;ch lịch sử c&acirc;y thị của d&ograve;ng họ&hellip;</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Tr" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-2-3caa2.JPG" style="margin: 5px; padding: 0px; " width="400" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; "><span lang="EN" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">Tr</span><span lang="VI" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">ước gốc thị ng&agrave;n năm con ch&aacute;u trong d</span>&ograve;ng họ lập một b&agrave;n thờ để tưởng nhớ đến sự t&iacute;ch, v&agrave; cũng nh<span lang="VI" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">ư minh chứng cho sự linh thi&ecirc;ng của c&acirc;y thị</span></span></span></span></div>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">V&agrave;o những năm 1425, khi L&ecirc; Lợi khởi nghĩa Lam S</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơn tại Thanh H&oacute;a gặp kh&oacute; khăn n&ecirc;n k&eacute;o qu&acirc;n v&agrave;o v&ugrave;ng đất Đỗ Gia tức Hương Sơn (H&agrave; Tĩnh) ng&agrave;y nay để lập căn cứ chống giặc Minh. Tại đ&acirc;y L&ecirc; Lợi đ</span>&atilde; gặp nghĩa qu&acirc;n Cốc S<span lang="VI" style="margin: 0px; padding: 0px; ">ơn của Nguyễn Tuấn Thiện. Cả 2 người lần đầu ti&ecirc;n gặp nhau đ</span>&atilde; c&oacute; chung ch&iacute; h<span lang="VI" style="margin: 0px; padding: 0px; ">ướng, đồng sức đồng l</span>&ograve;ng ti&ecirc;u diệt giặc Minh x&acirc;m l<span lang="VI" style="margin: 0px; padding: 0px; ">ược n&ecirc;n L&ecirc; Lợi v&agrave; Nguyễn Tuấn Thiện đ</span>&atilde; c&ugrave;ng giết ngựa trắng uống m&aacute;u, cắt t&oacute;c ăn thề ngay dưới gốc c&acirc;y thị cổ.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">V&agrave;o thời điểm đ&oacute; L&ecirc; Lợi bị giặc Minh truy đuổi r&aacute;o riết đ&atilde; chui v&agrave;o ẩn nấp trong gốc c&acirc;y thị. Khi giặc Minh đuổi đến th&igrave; trời đ&atilde; tối n&ecirc;n liền cho ch&oacute; săn x&uacute;m quanh c&acirc;y thị để lục so&aacute;t. Trong l&uacute;c t&iacute;nh mạng của nh&agrave; vua đang nguy nan, th&igrave; c&oacute; một con c&aacute;o trắng từ tr&ecirc;n c&acirc;y thị nhảy xuống bỏ chạy. Đ&agrave;n ch&oacute; săn v&agrave; binh l&iacute;nh lập tức đuổi theo nhờ thế m&agrave; L&ecirc; Lợi mới tho&aacute;t chết.</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: center; ">\r\n		&nbsp;</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Con đường nhỏ dẫn lên gốc thị ăn thề" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-3-3caa2.jpg" style="margin: 5px; padding: 0px; " width="400" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">Con đường nhỏ dẫn l&ecirc;n &quot;gốc thị ăn thề&quot;</span></span></span></div>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Từ đ&oacute; Nguyễn Tuấn Thiện được L&ecirc; Lợi tin t</span><span lang="VI" style="margin: 0px; padding: 0px; ">ưởng giao cho một c&aacute;nh qu&acirc;n thiện chiến, trong những trận đ&aacute;nh lớn đội qu&acirc;n của Nguyễn Tuấn Thiện lu&ocirc;n đ&oacute;ng vai tr</span>&ograve; xung k&iacute;ch. Thừa thắng x&ocirc;ng l&ecirc;n L&ecirc; Lợi v&agrave; mạnh t<span lang="VI" style="margin: 0px; padding: 0px; ">ướng của m</span>&igrave;nh k&eacute;o qu&acirc;n b&igrave;nh định một v&ugrave;ng từ Thanh H&oacute;a v&agrave;o Thừa Thi&ecirc;n Huế mở rộng căn cứ x&acirc;y dựng lực lượng.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Để tưởng nhớ sự t&iacute;ch lịch sử tr&ecirc;n, ng&agrave;y 15/7 năm T&acirc;n Tỵ 2001, con ch&aacute;u d&ograve;ng họ Nguyễn Tuấn v&agrave; nh&acirc;n d&acirc;n đ&atilde; đ&oacute;ng g&oacute;p x&acirc;y dựng một miếu thờ nhỏ ngay dưới gốc c&acirc;y thị cổ n&agrave;y. Rồi khắc l&ecirc;n tấm bia &ldquo;Gốc thị sử t&iacute;ch, m&ugrave;a thu Ất Tỵ 1425 L&ecirc; Lợi - Nguyễn Tuấn Thiện tuy&ecirc;n thề. Thệ Ph&aacute;t S</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơ Th&ugrave; Minh Hạ. Quyết T&acirc;m Bất Dịch Trợ H</span>&ograve;a Đ&agrave;o&rdquo;.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<b style="margin: 0px; padding: 0px; "><span lang="EN" style="margin: 0px; padding: 0px; ">Những c&acirc;u chuyện ly kỳ d</span></b><b style="margin: 0px; padding: 0px; "><span lang="VI" style="margin: 0px; padding: 0px; ">ưới gốc &ldquo;c&acirc;y thị ăn thề&rdquo;</span></b></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">V&agrave; cũng từ &ldquo;gốc thị lịch sử&rdquo; ng</span><span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n nơi đ&acirc;y đ</span>&atilde; truyền tai nhau những c&acirc;u chuyện ly kỳ, huyền b&iacute;. Những chuyện lạ l&ugrave;ng hư hư thực thực khiến c&acirc;y c&agrave;ng mang nặng t&iacute;nh&nbsp;t&acirc;m linh. Người d&acirc;n một l&ograve;ng s&ugrave;ng b&aacute;i, muốn l&agrave;m việc lớn n&agrave;o cũng thắp hương xin ph&eacute;p c&acirc;y.</p>\r\n	<div style="margin: 0px; padding: 0px; ">\r\n		<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n			<img _fl="" align="middle" alt="Tán cây thị có đường kính rộng bao trùm khu vườn khoảng 30-40m" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-6-3caa2.jpg" style="margin: 5px; padding: 0px; " width="450" /></div>\r\n	</div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">T&aacute;n c&acirc;y thị c&oacute; đường k&iacute;nh rộng bao tr&ugrave;m khu vườn khoảng 30-40m</span></span></span></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Ông Nguyễn Hoàng D" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-4-3caa2.JPG" style="margin: 5px; padding: 0px; " width="450" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; "><span lang="EN" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">&Ocirc;ng Nguyễn Ho&agrave;ng D</span><span lang="VI" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">ơi kể về sự t&iacute;ch &#39;&#39;c&acirc;y thị ăn thề&#39;&#39;.</span></span></span></span></div>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Trong số những chuyện lạ l&ugrave;ng về c&acirc;y<span class="Apple-converted-space">&nbsp;</span></span><span lang="VI" style="margin: 0px; padding: 0px; ">thị cổ,</span><span class="Apple-converted-space">&nbsp;</span>c&oacute; chuyện như c&agrave;nh thị đốt kh&ocirc;ng bao giờ ch&aacute;y, trừ khi thắp hương xin c&acirc;y th&igrave; c&agrave;nh mới ch&aacute;y. Hay chuyện c&oacute; người<span class="Apple-converted-space">&nbsp;</span><span lang="VI" style="margin: 0px; padding: 0px; ">đ&agrave;n &ocirc;ng đến gốc c&acirc;y thị thắp hương xin được một đứa con trai, v&agrave; ch&iacute;n th&aacute;ng sau vợ anh ta sinh con trai thật (?).</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">&Ocirc;ng Nguyễn Ho&agrave;ng D</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơi</span><span class="Apple-converted-space">&nbsp;</span>c&ograve;n kể c&acirc;u chuyện: C&aacute;ch đ&acirc;y v&agrave;i năm d&ograve;ng họ v&agrave; ng<span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n trong x&oacute;m đ&oacute;ng g&oacute;p kinh ph&iacute; để x&acirc;y dựng một con đường nhỏ đi l&ecirc;n gốc c&acirc;y thị. Nhưng khi tiến h&agrave;nh thi c&ocirc;ng<span class="Apple-converted-space">&nbsp;</span></span>bỗng dưng từ đ&acirc;u những đ&agrave;n kiến v&agrave;ng k&eacute;o về đ&ocirc;ng nghịt, tấn c&ocirc;ng đội thợ, kh&ocirc;ng cho thợ x&acirc;y. L&uacute;c đ&oacute; &ocirc;ng Dơi ra<span class="Apple-converted-space">&nbsp;</span><span lang="VI" style="margin: 0px; padding: 0px; ">thắp hương xin c&acirc;y th&igrave; đ&agrave;n kiến cũng tự động tản đi hết (!?).</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: center; ">\r\n		&nbsp;</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Đường kính gốc thị ngàn năm khoảng 5 - 6 người ôm không xuể" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-5-3caa2.jpg" style="margin: 5px; padding: 0px; " width="450" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">Đường k&iacute;nh gốc thị ng&agrave;n năm khoảng 5 - 6 người &ocirc;m kh&ocirc;ng xuể</span></span></div>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Ng</span><span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n nơi đ&acirc;y xem &ldquo;c&acirc;y thị ăn thề&rdquo; như l&agrave; vị th&aacute;nh của l&agrave;ng. Những c&acirc;u chuyện về thị đa phần mang t&iacute;nh hoang đường, nặng&nbsp;về yếu tố t&acirc;m linh. Song c&oacute; một điều dễ thấy l&agrave; nhờ c&acirc;y thị cổ ngh&igrave;n tuổi n&agrave;y, người d&acirc;n nơi đ&acirc;y đ&atilde; giữ m&igrave;nh, sống nh&acirc;n c&aacute;ch, đạo đức hơn.<span class="Apple-converted-space">&nbsp;</span></span>Người d&acirc;n<span class="Apple-converted-space">&nbsp;</span><span lang="VI" style="margin: 0px; padding: 0px; ">mong ước c&acirc;y thị bảo bối của họ sẽ được Nh&agrave; nước c&ocirc;ng nhận đ&acirc;y l&agrave; C&acirc;y Di sản, được xếp hạng Di t&iacute;ch quốc gia; được bảo tồn, g</span>&igrave;n giữ cho c&aacute;c thế hệ mai sau.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Những chuyện ly kỳ quanh gốc thị ngàn năm tuổi', 'Đó là cây thị cổ gắn với lịch sử chống giặc Minh xâm lược của Lê Lợi và Nguyễn Tuấn Thiện. Đến nay “gốc thị lịch sử” xóm Kim Sơn 2, xã Sơn Phúc (Hương Sơn, Hà Tĩnh) đã gần ngàn năm tuổi. Và những chuyện ly kỳ quanh gốc thị như một giai thoại.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'nhang-chuyen-ly-k-quanh-goc-thi-ngan-nam-tuoi', 0, 'post', '', 0, 1, 1),
(2, 0, '2012-10-18 13:43:02', '2012-10-18 13:38:37', '<div class="fon34 mt3 mr2 fon43" style="margin: 15px 10px 14.100000381469727px 0px; padding: 0px; font-weight: 500; font-style: normal; font-variant: normal; font-size: 12pt; line-height: 20px !important; font-family: ''Times New Roman''; color: rgb(0, 0, 0); letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	<p style="margin: 13.8px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px ! important;">\r\n		Đ&oacute; l&agrave; c&acirc;y thị cổ gắn với lịch sử chống giặc Minh x&acirc;m lược của L&ecirc; Lợi v&agrave; Nguyễn Tuấn Thiện. Đến nay &ldquo;gốc thị lịch sử&rdquo; x&oacute;m Kim Sơn 2, x&atilde; Sơn Ph&uacute;c (Hương Sơn, H&agrave; Tĩnh) đ&atilde; gần ng&agrave;n năm tuổi. V&agrave; những chuyện ly kỳ quanh gốc thị như một giai thoại.</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Theo các tài liệu ghi chép lại thì tính đến nay gốc thị cổ đã gần nghìn năm tuổi." src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-1-3caa2.JPG" style="margin: 5px; padding: 0px; " width="400" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">Theo c&aacute;c t&agrave;i liệu ghi ch&eacute;p lại th&igrave; t&iacute;nh đến nay gốc thị cổ đ&atilde; gần ngh&igrave;n năm tuổi.</span></span></span></div>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Ng</span><span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n khắp nơi v&agrave; trong x</span>&atilde; xem &ldquo;gốc thị lịch sử&rdquo; nh<span lang="VI" style="margin: 0px; padding: 0px; ">ư l&agrave; một c&acirc;y t&acirc;m linh. Người kh&ocirc;ng c&oacute; con trai cầu th</span>&igrave; được con trai (?). C&ograve;n những b&aacute;c n&ocirc;ng d&acirc;n tr&acirc;u b&ograve; đi lạc đến gốc thị cầu th&igrave; tr&acirc;u b&ograve; sẽ tự t&igrave;m về chuồng&hellip;V&agrave; ng<span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n cứ truyền tai nhau về những c&acirc;u chuyện ly kỳ b&ecirc;n gốc thị cổ.</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<b style="margin: 0px; padding: 0px; "><span lang="EN" style="margin: 0px; padding: 0px; ">Sự t&iacute;ch &ldquo;c&acirc;y thị ăn thề&rdquo; - con c&aacute;o trắng cứu vua</span></b></p>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">&ldquo;C&acirc;y thị ăn thề&rdquo; gắn liền với lịch sử chống giặc Minh x&acirc;m lược của L&ecirc; Lợi v&agrave; Nguyễn Tuấn Thiện v&agrave;o thế kỷ XV tọa lạc trong khu v</span><span lang="VI" style="margin: 0px; padding: 0px; ">ườn gia đ</span>&igrave;nh chị Nguyễn Thị H<span lang="VI" style="margin: 0px; padding: 0px; ">ương (38 tuổi) ở x&oacute;m Kim Sơn 2, x</span>&atilde; S<span lang="VI" style="margin: 0px; padding: 0px; ">ơn Ph&uacute;c (Hương Sơn,</span><span lang="VI" style="margin: 0px; padding: 0px; ">H&agrave; Tĩnh)</span><span lang="VI" style="margin: 0px; padding: 0px; "><span class="Apple-converted-space">&nbsp;</span></span><span lang="VI" style="margin: 0px; padding: 0px; ">gần ng&agrave;n năm nay. C&acirc;y cao khoảng 40m, t&aacute;n rộng khoảng 30m, đường k&iacute;nh c&acirc;y<span class="Apple-converted-space">&nbsp;</span></span>khoảng<span lang="VI" style="margin: 0px; padding: 0px; "><span class="Apple-converted-space">&nbsp;</span>5<span class="Apple-converted-space">&nbsp;</span></span>-<span lang="VI" style="margin: 0px; padding: 0px; "><span class="Apple-converted-space">&nbsp;</span>6 người &ocirc;m, ph&iacute;a trong c&acirc;y rỗng c&oacute; thể ngồi được v&agrave;i người.</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Tiếp ch&uacute;ng t&ocirc;i l&agrave; &ocirc;ng Nguyễn Ho&agrave;ng D</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơi năm nay đ</span>&atilde; 78 tuổi, đồng thời l&agrave; tr<span lang="VI" style="margin: 0px; padding: 0px; ">ưởng họ đời thứ 20 của d</span>&ograve;ng họ Nguyễn Tuấn. &Ocirc;ng D<span lang="VI" style="margin: 0px; padding: 0px; ">ơi chậm r</span>&atilde;i kể về sử t&iacute;ch lịch sử c&acirc;y thị của d&ograve;ng họ&hellip;</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Tr" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-2-3caa2.JPG" style="margin: 5px; padding: 0px; " width="400" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; "><span lang="EN" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">Tr</span><span lang="VI" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">ước gốc thị ng&agrave;n năm con ch&aacute;u trong d</span>&ograve;ng họ lập một b&agrave;n thờ để tưởng nhớ đến sự t&iacute;ch, v&agrave; cũng nh<span lang="VI" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">ư minh chứng cho sự linh thi&ecirc;ng của c&acirc;y thị</span></span></span></span></div>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">V&agrave;o những năm 1425, khi L&ecirc; Lợi khởi nghĩa Lam S</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơn tại Thanh H&oacute;a gặp kh&oacute; khăn n&ecirc;n k&eacute;o qu&acirc;n v&agrave;o v&ugrave;ng đất Đỗ Gia tức Hương Sơn (H&agrave; Tĩnh) ng&agrave;y nay để lập căn cứ chống giặc Minh. Tại đ&acirc;y L&ecirc; Lợi đ</span>&atilde; gặp nghĩa qu&acirc;n Cốc S<span lang="VI" style="margin: 0px; padding: 0px; ">ơn của Nguyễn Tuấn Thiện. Cả 2 người lần đầu ti&ecirc;n gặp nhau đ</span>&atilde; c&oacute; chung ch&iacute; h<span lang="VI" style="margin: 0px; padding: 0px; ">ướng, đồng sức đồng l</span>&ograve;ng ti&ecirc;u diệt giặc Minh x&acirc;m l<span lang="VI" style="margin: 0px; padding: 0px; ">ược n&ecirc;n L&ecirc; Lợi v&agrave; Nguyễn Tuấn Thiện đ</span>&atilde; c&ugrave;ng giết ngựa trắng uống m&aacute;u, cắt t&oacute;c ăn thề ngay dưới gốc c&acirc;y thị cổ.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">V&agrave;o thời điểm đ&oacute; L&ecirc; Lợi bị giặc Minh truy đuổi r&aacute;o riết đ&atilde; chui v&agrave;o ẩn nấp trong gốc c&acirc;y thị. Khi giặc Minh đuổi đến th&igrave; trời đ&atilde; tối n&ecirc;n liền cho ch&oacute; săn x&uacute;m quanh c&acirc;y thị để lục so&aacute;t. Trong l&uacute;c t&iacute;nh mạng của nh&agrave; vua đang nguy nan, th&igrave; c&oacute; một con c&aacute;o trắng từ tr&ecirc;n c&acirc;y thị nhảy xuống bỏ chạy. Đ&agrave;n ch&oacute; săn v&agrave; binh l&iacute;nh lập tức đuổi theo nhờ thế m&agrave; L&ecirc; Lợi mới tho&aacute;t chết.</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: center; ">\r\n		&nbsp;</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Con đường nhỏ dẫn lên gốc thị ăn thề" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-3-3caa2.jpg" style="margin: 5px; padding: 0px; " width="400" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">Con đường nhỏ dẫn l&ecirc;n &quot;gốc thị ăn thề&quot;</span></span></span></div>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Từ đ&oacute; Nguyễn Tuấn Thiện được L&ecirc; Lợi tin t</span><span lang="VI" style="margin: 0px; padding: 0px; ">ưởng giao cho một c&aacute;nh qu&acirc;n thiện chiến, trong những trận đ&aacute;nh lớn đội qu&acirc;n của Nguyễn Tuấn Thiện lu&ocirc;n đ&oacute;ng vai tr</span>&ograve; xung k&iacute;ch. Thừa thắng x&ocirc;ng l&ecirc;n L&ecirc; Lợi v&agrave; mạnh t<span lang="VI" style="margin: 0px; padding: 0px; ">ướng của m</span>&igrave;nh k&eacute;o qu&acirc;n b&igrave;nh định một v&ugrave;ng từ Thanh H&oacute;a v&agrave;o Thừa Thi&ecirc;n Huế mở rộng căn cứ x&acirc;y dựng lực lượng.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Để tưởng nhớ sự t&iacute;ch lịch sử tr&ecirc;n, ng&agrave;y 15/7 năm T&acirc;n Tỵ 2001, con ch&aacute;u d&ograve;ng họ Nguyễn Tuấn v&agrave; nh&acirc;n d&acirc;n đ&atilde; đ&oacute;ng g&oacute;p x&acirc;y dựng một miếu thờ nhỏ ngay dưới gốc c&acirc;y thị cổ n&agrave;y. Rồi khắc l&ecirc;n tấm bia &ldquo;Gốc thị sử t&iacute;ch, m&ugrave;a thu Ất Tỵ 1425 L&ecirc; Lợi - Nguyễn Tuấn Thiện tuy&ecirc;n thề. Thệ Ph&aacute;t S</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơ Th&ugrave; Minh Hạ. Quyết T&acirc;m Bất Dịch Trợ H</span>&ograve;a Đ&agrave;o&rdquo;.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<b style="margin: 0px; padding: 0px; "><span lang="EN" style="margin: 0px; padding: 0px; ">Những c&acirc;u chuyện ly kỳ d</span></b><b style="margin: 0px; padding: 0px; "><span lang="VI" style="margin: 0px; padding: 0px; ">ưới gốc &ldquo;c&acirc;y thị ăn thề&rdquo;</span></b></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">V&agrave; cũng từ &ldquo;gốc thị lịch sử&rdquo; ng</span><span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n nơi đ&acirc;y đ</span>&atilde; truyền tai nhau những c&acirc;u chuyện ly kỳ, huyền b&iacute;. Những chuyện lạ l&ugrave;ng hư hư thực thực khiến c&acirc;y c&agrave;ng mang nặng t&iacute;nh&nbsp;t&acirc;m linh. Người d&acirc;n một l&ograve;ng s&ugrave;ng b&aacute;i, muốn l&agrave;m việc lớn n&agrave;o cũng thắp hương xin ph&eacute;p c&acirc;y.</p>\r\n	<div style="margin: 0px; padding: 0px; ">\r\n		<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n			<img _fl="" align="middle" alt="Tán cây thị có đường kính rộng bao trùm khu vườn khoảng 30-40m" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-6-3caa2.jpg" style="margin: 5px; padding: 0px; " width="450" /></div>\r\n	</div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">T&aacute;n c&acirc;y thị c&oacute; đường k&iacute;nh rộng bao tr&ugrave;m khu vườn khoảng 30-40m</span></span></span></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Ông Nguyễn Hoàng D" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-4-3caa2.JPG" style="margin: 5px; padding: 0px; " width="450" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; "><span lang="EN" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">&Ocirc;ng Nguyễn Ho&agrave;ng D</span><span lang="VI" style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">ơi kể về sự t&iacute;ch &#39;&#39;c&acirc;y thị ăn thề&#39;&#39;.</span></span></span></span></div>\r\n	<p align="left" style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Trong số những chuyện lạ l&ugrave;ng về c&acirc;y<span class="Apple-converted-space">&nbsp;</span></span><span lang="VI" style="margin: 0px; padding: 0px; ">thị cổ,</span><span class="Apple-converted-space">&nbsp;</span>c&oacute; chuyện như c&agrave;nh thị đốt kh&ocirc;ng bao giờ ch&aacute;y, trừ khi thắp hương xin c&acirc;y th&igrave; c&agrave;nh mới ch&aacute;y. Hay chuyện c&oacute; người<span class="Apple-converted-space">&nbsp;</span><span lang="VI" style="margin: 0px; padding: 0px; ">đ&agrave;n &ocirc;ng đến gốc c&acirc;y thị thắp hương xin được một đứa con trai, v&agrave; ch&iacute;n th&aacute;ng sau vợ anh ta sinh con trai thật (?).</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">&Ocirc;ng Nguyễn Ho&agrave;ng D</span><span lang="VI" style="margin: 0px; padding: 0px; ">ơi</span><span class="Apple-converted-space">&nbsp;</span>c&ograve;n kể c&acirc;u chuyện: C&aacute;ch đ&acirc;y v&agrave;i năm d&ograve;ng họ v&agrave; ng<span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n trong x&oacute;m đ&oacute;ng g&oacute;p kinh ph&iacute; để x&acirc;y dựng một con đường nhỏ đi l&ecirc;n gốc c&acirc;y thị. Nhưng khi tiến h&agrave;nh thi c&ocirc;ng<span class="Apple-converted-space">&nbsp;</span></span>bỗng dưng từ đ&acirc;u những đ&agrave;n kiến v&agrave;ng k&eacute;o về đ&ocirc;ng nghịt, tấn c&ocirc;ng đội thợ, kh&ocirc;ng cho thợ x&acirc;y. L&uacute;c đ&oacute; &ocirc;ng Dơi ra<span class="Apple-converted-space">&nbsp;</span><span lang="VI" style="margin: 0px; padding: 0px; ">thắp hương xin c&acirc;y th&igrave; đ&agrave;n kiến cũng tự động tản đi hết (!?).</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: center; ">\r\n		&nbsp;</p>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<img _fl="" align="middle" alt="Đường kính gốc thị ngàn năm khoảng 5 - 6 người ôm không xuể" src="http://dantri4.vcmedia.vn/7dBrKnsutwiOg2hPbvFQ/Image/NAM-2012/THANG-10/Tuan-3/thi-5-3caa2.jpg" style="margin: 5px; padding: 0px; " width="450" /></div>\r\n	<div style="margin: 0px; padding: 0px; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; text-align: justify; "><span style="margin: 0px; padding: 0px; font-size: 10pt; font-family: Tahoma; ">Đường k&iacute;nh gốc thị ng&agrave;n năm khoảng 5 - 6 người &ocirc;m kh&ocirc;ng xuể</span></span></div>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-family: ''Times New Roman''; font-size: 12pt; line-height: 20px !important; text-align: justify; ">\r\n		<span lang="EN" style="margin: 0px; padding: 0px; ">Ng</span><span lang="VI" style="margin: 0px; padding: 0px; ">ười d&acirc;n nơi đ&acirc;y xem &ldquo;c&acirc;y thị ăn thề&rdquo; như l&agrave; vị th&aacute;nh của l&agrave;ng. Những c&acirc;u chuyện về thị đa phần mang t&iacute;nh hoang đường, nặng&nbsp;về yếu tố t&acirc;m linh. Song c&oacute; một điều dễ thấy l&agrave; nhờ c&acirc;y thị cổ ngh&igrave;n tuổi n&agrave;y, người d&acirc;n nơi đ&acirc;y đ&atilde; giữ m&igrave;nh, sống nh&acirc;n c&aacute;ch, đạo đức hơn.<span class="Apple-converted-space">&nbsp;</span></span>Người d&acirc;n<span class="Apple-converted-space">&nbsp;</span><span lang="VI" style="margin: 0px; padding: 0px; ">mong ước c&acirc;y thị bảo bối của họ sẽ được Nh&agrave; nước c&ocirc;ng nhận đ&acirc;y l&agrave; C&acirc;y Di sản, được xếp hạng Di t&iacute;ch quốc gia; được bảo tồn, g</span>&igrave;n giữ cho c&aacute;c thế hệ mai sau.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Tree 1000 years', 'Tree 1000 years', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'tree-1000-years', 0, 'post', '', 0, 2, 1);
INSERT INTO `hd_posts` (`id`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`, `language_id`, `root_lang`) VALUES
(4, 0, '2012-10-18 14:40:48', '2012-10-18 14:40:37', '<p class="introduction" id="story_continues_1" style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-weight: bold; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Two Japanese ministers have visited Tokyo&#39;s Yasukuni Shrine, in a move likely to further sour relations with regional neighbours.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The move by the transport and postal reform ministers followed opposition leader Shinzo Abe&#39;s visit on Wednesday.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	China and South Korea have reacted angrily to the visit of Mr Abe, who could become the next prime minister.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The Yasukuni shrine commemorates Japan&#39;s war dead - including 14 convicted Class A war criminals.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	It is viewed by many of the country&#39;s neighbours as a reminder of Japan&#39;s military past.</p>\r\n<p>\r\n	<span class="cross-head" style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; display: block; font-weight: bold; margin: 0px 0px 16px; font-size: 1.231em; text-rendering: optimizelegibility; font-style: normal; font-variant: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">&#39;Insult to injury&#39;</span></p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Transport Minister Yuichiro Hata and Postal Reform Minister Mikio Shimoji - both members of the cabinet - were among a group of lawmakers who went to the shrine on Thursday morning to mark its autumn festival.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Mr Hata is from the ruling Democratic Party (DPJ) and Mr Shimoji from a junior coalition partner. Mr Hata had also visited the shrine in August, on what he said was a private visit to mark the end of WWII.</p>\r\n<div class="story-feature wide " style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; position: relative; margin: 0px -160px 16px 16px; width: 304px; float: right; display: inline; overflow: hidden; clear: right; font-size: 13px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	<a class="hidden" href="http://www.bbc.co.uk/news/world-asia-19986895#story_continues_2" style="color: rgb(74, 113, 148); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; text-decoration: none; font-weight: bold; position: absolute; top: -5000px; left: -5000px; ">Continue reading the main story</a>\r\n	<h2 style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 11px 0px 12px; font-size: 1.231em; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(216, 216, 216); border-bottom-width: 1px; border-bottom-style: solid; border-bottom-color: rgb(216, 216, 216); font-weight: bold; text-rendering: optimizelegibility; ">\r\n		Yasukuni Shrine</h2>\r\n	<ul style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 16px; padding: 0px; list-style: none; clear: both; ">\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Built in 1869 under the Emperor Meiji</li>\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Venerates the souls of Japan&#39;s war dead</li>\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Those enshrined include 14 Class A war criminals</li>\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px 0px 0px 16px; font-size: 1em; text-rendering: auto; background-image: url(http://news.bbcimg.co.uk/view/3_0_4/cream/hi/shared/img/story_sprite.gif); background-position: -1200px 5px; background-repeat: no-repeat no-repeat; ">\r\n			Japan&#39;s neighbours say it represents the country&#39;s past miltarism</li>\r\n	</ul>\r\n	<ul class="links-list" style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 16px; padding: 7px 0px 0px; list-style: none; clear: both; border-top-width: 1px; border-top-style: solid; border-top-color: rgb(232, 232, 232); ">\r\n		<li style="color: rgb(80, 80, 80); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; margin: 0px 0px 8px; padding: 0px; font-size: 1em; text-rendering: auto; background-image: none; position: relative; background-position: initial initial; background-repeat: initial initial; ">\r\n			<a href="http://www.bbc.co.uk/news/world-asia-19987251" style="color: rgb(23, 79, 130); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 16px; text-decoration: none; font-weight: bold; font-size: 13px; ">Japan&#39;s Yasukuni Shrine</a></li>\r\n	</ul>\r\n</div>\r\n<p id="story_continues_2" style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Prime Minister Yoshihiko Noda has previously urged members of his cabinet not to visit the shrine.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	When asked, Japanese Chief Cabinet Secretary Osamu Fujimura downplayed the visit as &#39;&#39;one by private individuals&#39;&#39;.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	&#39;&#39;As these are personal actions by cabinet members, the government cannot comment further on the matter,&quot; he told reporters.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Meanwhile a South Korean foreign ministry spokesman expressed &#39;&#39;deep regret and concern&#39;&#39; over Mr Abe&#39;s visit to the shrine - &quot;a symbol of the Japanese war of aggression and militarism&quot;.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Mr Abe, the newly-elected Liberal Democratic Party (LDP) leader, said he was paying his respects.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	China berated Mr Abe for the visit, saying it would &quot;further poison bilateral ties&quot; in a strongly-worded report carried by state-run Xinhua news agency.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	&quot;At such a delicate moment, Abe&#39;s visit... has added insult to injury and dealt another blow to the already fragile Sino-Japanese relations,&quot; the report said.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Mr Abe was prime minister in 2006 - the youngest elected since World War II - but he stepped down a year later citing ill health as support for his administration plummeted. He did not visit the shrine while he was prime minister.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Elections are expected in Japan in coming months - potentially positioning Mr Abe for a second spell as prime minister.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	Ties between Tokyo and Beijing remain severely strained by a row over a group of East China Sea islands that both claim.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The territorial row - over islands known as Senkaku in Japan and Diaoyu in China - has led to anti-Japanese protests in some Chinese cities and affected a number of Japanese companies operating in China.</p>\r\n<p style="color: rgb(51, 51, 51); font-family: Arial, Helmet, Freesans, sans-serif; line-height: 18px; margin: 0px 0px 18px; padding: 0px; font-size: 1.077em; text-rendering: auto; clear: left; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; orphans: 2; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 2; word-spacing: 0px; -webkit-text-size-adjust: auto; -webkit-text-stroke-width: 0px; background-color: rgb(255, 255, 255); ">\r\n	The dispute between Tokyo and Seoul is over another group of islands, known as Dokdo in South Korea and Takeshima in Japan.</p>\r\n', 'Japanese ministers visit Yasukuni shrine', 'Japanese ministers visit Yasukuni shrine                                                ', 'publish', 'open', 'open', '', '', '', '', '2012-10-22 11:19:12', '0000-00-00 00:00:00', '', 0, 'japanese-ministers-visit-yasukuni-shrine', 0, 'post', '', 0, 2, 3),
(5, 0, '0000-00-00 00:00:00', '2012-10-18 14:40:37', '<p>\r\n	B&agrave;i về người nhật</p>\r\n', 'Người nhật bản', 'Người nhật', 'publish', 'open', 'open', '', '', '', '', '2012-10-22 11:19:12', '0000-00-00 00:00:00', '', 0, 'nguoi-nhat-ban', 0, 'post', '', 0, 1, 3),
(7, 0, '2012-10-19 13:48:05', '2012-10-19 13:46:25', '<p>\r\n	C&ocirc;ng ty Cổ phần Tasvis</p>\r\n', 'Công ty cổ phần Tasvis.', 'Công ty Cổ phần Tasvis', 'publish', 'open', 'open', '', '', '', '', '2012-10-19 15:05:31', '0000-00-00 00:00:00', '', 0, 'cong-ty-co-phan-tasvis-1', 0, 'page', '', 0, 1, 4),
(8, 0, '0000-00-00 00:00:00', '2012-10-19 13:46:25', '<p>\r\n	Tasvis company</p>\r\n', 'Tasvis company', 'Tasvis company', 'publish', 'open', 'open', '', '', '', '', '2012-10-19 15:05:31', '0000-00-00 00:00:00', '', 0, 'tasvis-company', 0, 'page', '', 0, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `hd_terms`
--

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
(1, 1, 7, 0),
(2, 1, 9, 0),
(3, 1, 29, 0),
(4, 2, 7, 0),
(5, 2, 9, 0),
(6, 2, 29, 0),
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

CREATE TABLE IF NOT EXISTS `hd_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) NOT NULL DEFAULT '',
  `user_pass` varchar(64) NOT NULL DEFAULT '',
  `user_nicename` varchar(50) NOT NULL DEFAULT '',
  `user_email` varchar(100) NOT NULL DEFAULT '',
  `user_url` varchar(100) NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(60) NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hd_users`
--

INSERT INTO `hd_users` (`ID`, `user_login`, `user_pass`, `user_nicename`, `user_email`, `user_url`, `user_registered`, `user_activation_key`, `user_status`, `display_name`) VALUES
(1, 'administrator', '$P$BJOzaVkGcUNnFjfPPya9uLh7FthhMK1', 'administrator', 'vinhnt@tasvis.com.vn', '', '2012-10-04 08:01:18', '', 0, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `hd_users_authitems`
--

CREATE TABLE IF NOT EXISTS `hd_users_authitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `authitem_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
