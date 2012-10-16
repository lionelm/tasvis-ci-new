-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 16, 2012 at 11:57 AM
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
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
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
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hd_comments`
--

INSERT INTO `hd_comments` (`comment_ID`, `comment_post_ID`, `comment_author`, `comment_author_email`, `comment_author_url`, `comment_author_IP`, `comment_date`, `comment_date_gmt`, `comment_content`, `comment_karma`, `comment_approved`, `comment_agent`, `comment_type`, `comment_parent`, `user_id`) VALUES
(1, 1, 'Mr WordPress', '', 'http://wordpress.org/', '', '2012-10-04 08:01:18', '2012-10-04 08:01:18', 'Hi, this is a comment.<br />To delete a comment, just log in and view the post&#039;s comments. There you will have the option to edit or delete them.', 0, '1', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `hd_langmapping`
--

DROP TABLE IF EXISTS `hd_langmapping`;
CREATE TABLE IF NOT EXISTS `hd_langmapping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `root` int(11) NOT NULL,
  `mapping` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `hd_languages`
--

INSERT INTO `hd_languages` (`id`, `name`, `code`) VALUES
(1, 'Tiếng Việt', 'vi'),
(3, 'English', 'en');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=104 ;

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
(45, 'template', 'twentyeleven', 'yes'),
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
(103, 'sidebars_widgets', 'a:7:{s:19:"wp_inactive_widgets";a:0:{}s:9:"sidebar-1";a:6:{i:0;s:8:"search-2";i:1;s:14:"recent-posts-2";i:2;s:17:"recent-comments-2";i:3;s:10:"archives-2";i:4;s:12:"categories-2";i:5;s:6:"meta-2";}s:9:"sidebar-2";a:0:{}s:9:"sidebar-3";a:0:{}s:9:"sidebar-4";a:0:{}s:9:"sidebar-5";a:0:{}s:13:"array_version";i:3;}', 'yes');

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `hd_postmeta`
--

INSERT INTO `hd_postmeta` (`id`, `post_id`, `meta_key`, `meta_value`) VALUES
(2, 2, 'featured_image', ''),
(3, 3, 'featured_image', '/codeigniter/elfinder/php/../files/Penguins.jpg'),
(4, 4, 'featured_image', '/codeigniter/elfinder/php/../files/Koala.jpg'),
(5, 5, 'featured_image', '/codeigniter/elfinder/php/../files/Penguins.jpg'),
(6, 6, 'featured_image', '/codeigniter/elfinder/php/../files/Penguins.jpg'),
(7, 7, 'featured_image', '/codeigniter/elfinder/php/../files/Koala.jpg'),
(8, 8, 'featured_image', '/codeigniter/elfinder/php/../files/Penguins.jpg'),
(9, 9, 'featured_image', '/codeigniter/elfinder/php/../files/Penguins.jpg'),
(10, 9, 'seo_title', 'Người thân'),
(11, 9, 'seo_description', 'Khi bị lực lượng CSGT phát hiện, xử lý hành vi vi phạm luật giao thông, hầu hết những người vi phạm đều thực hiện động tác đầu tiên là… rút điện thoại gọi người thân.'),
(12, 9, 'seo_keyword', 'người thân, giao thông'),
(13, 10, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(14, 10, 'seo_title', 'Thế giới đẹp lãng mạn với những... mái nhà tranh'),
(15, 10, 'seo_description', 'Thế giới đẹp lãng mạn với những... mái nhà tranh'),
(16, 10, 'seo_keyword', 'nhà tranh, văn hóa, lãng mạn'),
(17, 11, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(18, 11, 'seo_title', 'Không nên “ôm” vàng '),
(19, 11, 'seo_description', 'Không nên “ôm” vàng '),
(20, 11, 'seo_keyword', 'vàng'),
(22, 8, 'seo_title', 'bài viết'),
(23, 8, 'seo_description', 'bài viết mới'),
(24, 8, 'seo_keyword', 'bài viết'),
(25, 6, 'seo_title', 'bài viết đầu tay'),
(26, 6, 'seo_description', 'Bài viết đầu tay'),
(27, 6, 'seo_keyword', 'bài viết'),
(32, 13, 'featured_image', '/codeigniter/elfinder/php/../files/1-4b231.jpg'),
(33, 13, 'seo_title', 'bạn biết chưa'),
(34, 13, 'seo_description', 'Bạn biết chưa?'),
(35, 13, 'seo_keyword', 'bạn, biết chưa');

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
  PRIMARY KEY (`id`),
  KEY `post_name` (`post_name`),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`id`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `hd_posts`
--

INSERT INTO `hd_posts` (`id`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`, `language_id`) VALUES
(2, 0, '2012-10-09 11:01:34', '0000-00-00 00:00:00', '<p>\r\n	B&agrave;i viết đầu ti&ecirc;n</p>\r\n', 'Bài viết mới', 'Bài viết đầu tiên', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0, 0),
(3, 0, '2012-10-09 14:00:10', '0000-00-00 00:00:00', '<p>\r\n	B&agrave;i viết đầu tay</p>\r\n', 'Bài viết đầu tay', 'Bài viết đầu tay', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0, 0),
(4, 0, '2012-10-09 17:17:02', '0000-00-00 00:00:00', '<p>\r\n	B&agrave;i viết đầu tay.</p>\r\n', 'Bài viết đầu tay.', 'Bài viết đầu tay.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0, 0),
(5, 0, '2012-10-09 17:19:07', '0000-00-00 00:00:00', '<p>\r\n	B&agrave;i viết đầu tay....</p>\r\n', 'Bài viết đầu tay...', 'Bài viết đầu tay....', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0, 0),
(6, 0, '0000-00-00 00:00:00', '2012-10-14 19:42:18', '<p>\r\n	B&agrave;i viết đầu tay.................</p>\r\n', 'Bài viết đầu tay mới', 'Bài viết đầu tay', 'publish', 'open', 'open', '', '', '', '', '2012-10-14 19:42:46', '0000-00-00 00:00:00', '', 0, '', 0, 'post', '', 0, 0),
(7, 0, '2012-10-11 15:49:14', '0000-00-00 00:00:00', '<p>\r\n	T&ocirc;i &ldquo;&ocirc;m&rdquo; c&ocirc; ấy bằng mắt! Ngồi b&ecirc;n nhau t&acirc;m t&igrave;nh mặc cho đ&ecirc;m đ&atilde; về khuya, sao trời c&agrave;ng s&aacute;ng hơn, kh&ocirc;ng gian y&ecirc;n tĩnh lạ thường. L&uacute;c sau nữa, c&ocirc; ấy ngồi v&agrave;o l&ograve;ng t&ocirc;i, t&ocirc;i qu&agrave;ng ch&acirc;n &ocirc;m chặt lấy n&agrave;ng xiết v&agrave;o l&ograve;ng&hellip;<br />\r\n	&nbsp;</p>\r\n<div>\r\n	<p>\r\n		<em>Thưa thầy, tấm gương vượt kh&oacute; vươn l&ecirc;n số phận của thầy đ&atilde; được nhiều người biết tới. C&ograve;n chuyện t&igrave;nh y&ecirc;u của thầy, vẫn c&ograve;n nhiều b&iacute; mật chưa kể ra, thầy c&oacute; thể &ldquo;bật m&iacute;&rdquo; ch&uacute;t g&igrave; được chứ ạ&hellip;</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		(Cười vang) T&ocirc;i lu&ocirc;n được hạnh ph&uacute;c, may mắn trong t&igrave;nh bạn, t&igrave;nh y&ecirc;u d&ugrave; bị liệt cả hai tay!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Hồi học lớp 6, t&ocirc;i được mời đi n&oacute;i chuyện ở một trường bạn. N&oacute;i chuyện xong c&oacute; bạn học sinh nữ chạy l&ecirc;n cởi khăn qu&agrave;ng của bạn ấy qu&agrave;ng v&agrave;o vai t&ocirc;i.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		T&ocirc;i sung sướng v&ocirc; ngần. Chưa hết đ&acirc;u. Sang lớp 7, c&ocirc; ấy chuyển trường về học chung lớp với t&ocirc;i nữa chứ!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&ocirc; ấy c&oacute; chiếc compa của Trung Quốc rất tốt, thời ấy hiếm lắm v&agrave; qu&yacute; lắm, vậy m&agrave; c&ocirc; ấy bỏ v&agrave;o chiếc cặp của t&ocirc;i k&egrave;m theo mảnh giấy ghi mấy chữ &ldquo;Th&acirc;n tặng NNK&rdquo;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Hết lớp 7, Liễu, t&ecirc;n c&ocirc; bạn đi học kế to&aacute;n. Sau n&agrave;y ai cũng c&oacute; gia đ&igrave;nh nhưng ch&uacute;ng t&ocirc;i vẫn giữ quan hệ bạn b&egrave; cho tới nay, nửa thế kỷ rồi!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<div align="center">\r\n		<img alt="Thầy Ký dùng chân cắm hoa" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/thayky-b9991.jpg" /><br />\r\n		Thầy K&yacute; d&ugrave;ng ch&acirc;n cắm hoa</div>\r\n	<p align="center">\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Đ&oacute; l&agrave; t&igrave;nh bạn, c&ograve;n chuyện t&igrave;nh y&ecirc;u? Nghe đồn cũng thi vị chẳng k&eacute;m&hellip;</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Bắt đầu từ l&uacute;c t&ocirc;i tốt nghiệp đại học về qu&ecirc; dạy c&ugrave;ng thầy Ch&acirc;u, l&agrave; thầy dạy thời học phổ th&ocirc;ng của t&ocirc;i.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&oacute; anh bạn dẫn em g&aacute;i tới chơi. Như t&igrave;nh y&ecirc;u s&eacute;t đ&aacute;nh, t&ocirc;i sững sờ. C&ocirc; ấy cũng c&oacute; &ldquo;t&iacute;n hiệu&rdquo;, t&ocirc;i ngỏ lời với c&ocirc; ấy. C&aacute;i buổi ban đầu m&agrave; như thế l&agrave; nhanh lắm rồi.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Khoảng 20 ng&agrave;y sau c&ocirc; ấy đạp xe như bay xuống thăm người anh l&uacute;c người anh&hellip;đi vắng! Thế l&agrave; gặp t&ocirc;i. Ch&uacute;ng t&ocirc;i tr&ograve; chuyện, t&acirc;m t&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&ocirc; ấy rủ t&ocirc;i đi chơi. Lần đầu ti&ecirc;n t&ocirc;i ngồi sau xe đạp cho một c&ocirc; g&aacute;i chở đi tr&ecirc;n đường. Bồi hồi, x&uacute;c động lắm.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<div align="center">\r\n		<img alt="Hạnh phúc bên người vợ thứ 2 cũng là em vợ mình" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/thayky1-b9991.jpg" /></div>\r\n	<div align="center">\r\n		Hạnh ph&uacute;c b&ecirc;n người vợ thứ 2 cũng l&agrave; em vợ m&igrave;nh</div>\r\n	<p align="center">\r\n		&nbsp;</p>\r\n	<p>\r\n		Ch&uacute;ng t&ocirc;i đi chơi, tr&ograve; chuyện, qu&ecirc;n hết thảy những g&igrave; xung quanh. Đến l&uacute;c chợt nhớ ra th&igrave; trời đ&atilde; tối. C&ocirc; ấy định về nhưng t&ocirc;i nhất quyết giữ c&ocirc; ấy lại. Đ&ecirc;m h&ocirc;m ấy trời kh&ocirc;ng c&oacute; trăng, chỉ đầy sao lấp l&aacute;nh v&agrave; ch&uacute;ng t&ocirc;i b&ecirc;n nhau&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Rồi sao nữa thầy? B&igrave;nh thường theo đ&uacute;ng &ldquo;quy luật&rdquo; th&igrave; tới đ&oacute; phải c&oacute; nắm tay rồi &ldquo;hơn thế nữa&rdquo;, c&ograve;n thầy c&oacute; đ&ocirc;i tay m&agrave; cũng như kh&ocirc;ng&hellip;</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		(Cười) T&ocirc;i &ldquo;&ocirc;m&rdquo; c&ocirc; ấy bằng mắt! Ngồi b&ecirc;n nhau t&acirc;m t&igrave;nh mặc cho đ&ecirc;m đ&atilde; về khuya, sao trời c&agrave;ng s&aacute;ng hơn, kh&ocirc;ng gian y&ecirc;n tĩnh lạ thường&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		L&uacute;c sau nữa, c&ocirc; ấy ngồi v&agrave;o l&ograve;ng t&ocirc;i, t&ocirc;i qu&agrave;ng ch&acirc;n &ocirc;m chặt lấy n&agrave;ng xiết v&agrave;o l&ograve;ng&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>&Ocirc;i, độc đ&aacute;o qu&aacute;...!</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		(Thầy K&yacute; kể đến đ&acirc;y th&igrave; ngừng lại. C&oacute; lẽ thầy đang bồi hồi nhớ lại &ldquo;c&aacute;i thưở ban đầu&hellip;&rdquo; của m&igrave;nh. Rồi thầy d&ugrave;ng ch&acirc;n lục tr&ecirc;n gi&aacute; s&aacute;ch lấy ra quyển sổ ghi ch&eacute;p của những kh&aacute;ch đến thăm, ng&oacute;n ch&acirc;n thầy thoăn thoắt giở lật từng trang, t&igrave;m ra b&agrave;i thơ &ldquo;Thơ vui tặng Nguyễn Ngọc K&yacute;&rdquo; của nh&agrave; thơ Trương Nam Hương cho t&ocirc;i xem).</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>C&oacute; một người đi học</em></p>\r\n	<p>\r\n		<em>S&aacute;ch vở mang trong đầu</em></p>\r\n	<p>\r\n		<em>Đ&ocirc;i tay mềm dắt gi&oacute;</em></p>\r\n	<p>\r\n		<em>Lấy ch&acirc;n m&igrave;nh ch&eacute;p c&acirc;u</em></p>\r\n	<p>\r\n		<em>Y&ecirc;u đương trong trẻo lắm</em></p>\r\n	<p>\r\n		<em>Kh&ocirc;ng d&ugrave;ng tay&hellip;du xu&acirc;n</em></p>\r\n	<p>\r\n		<em>Đ&ecirc;m đ&ecirc;m nằm với vợ</em></p>\r\n	<p>\r\n		<em>Quấn qu&yacute;t bằng&hellip;ba ch&acirc;n</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Chờ t&ocirc;i đọc xong b&agrave;i thơ, thầy K&yacute; n&oacute;i tiếp:</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		&ldquo;N&agrave;ng&rdquo; ch&iacute;nh l&agrave; vợ đầu của t&ocirc;i, t&ecirc;n Vũ Thị Nhiễu, cũng l&agrave; c&ocirc; gi&aacute;o, đ&atilde; gắn b&oacute; c&ugrave;ng t&ocirc;i mấy chục năm trời, g&aacute;nh v&aacute;c chia sẻ với t&ocirc;i mọi buồn vui trong cuộc đời. C&ocirc; ấy đ&atilde; mất chục năm nay rồi!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>So ra, thầy kh&aacute; &ldquo;may mắn&rdquo; v&agrave; hạnh ph&uacute;c trong t&igrave;nh y&ecirc;u phải kh&ocirc;ng thầy?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Cũng kh&ocirc;ng ho&agrave;n to&agrave;n vậy đ&acirc;u! T&ocirc;i v&agrave; c&ocirc; ấy đến với nhau bằng t&igrave;nh y&ecirc;u m&atilde;nh liệt song vấp phải sự phản đối của gia đ&igrave;nh c&ocirc; ấy cũng v&ocirc; c&ugrave;ng quyết liệt! V&igrave; y&ecirc;u t&ocirc;i, c&ocirc; ấy đ&atilde; bị ngăn cản, bị đ&aacute;nh đập nhiều lắm đấy!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Ai m&agrave; tin con g&aacute;i xinh đẹp nhất v&ugrave;ng, học h&agrave;nh tới nơi tới chốn m&agrave; lại chọn người y&ecirc;u, người chồng tật nguyền, liệt 2 c&aacute;nh tay như t&ocirc;i?</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		May nhờ nh&agrave; thơ Đo&agrave;n Văn Cừ ở gần đấy, &ocirc;ng rất qu&yacute; t&ocirc;i v&agrave; c&oacute; uy t&iacute;n lớn với bố c&ocirc; ấy. Bố c&ocirc; ấy vốn m&ecirc; thơ của nh&agrave; thơ Đo&agrave;n Văn Cừ. &Ocirc;ng gặp bố vợ tương lai của t&ocirc;i n&oacute;i đại &yacute; l&agrave; t&ocirc;i c&oacute; t&agrave;i, năng lực tốt, c&aacute;i t&ecirc;n Ngọc K&yacute; cũng rất tốt. N&oacute;i t&oacute;m lại l&agrave; &ldquo;rể qu&yacute;&rdquo; đấy.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		V&agrave; t&igrave;nh y&ecirc;u, vợ chồng l&agrave; duy&ecirc;n phận với nhau v.v&hellip;Cuối c&ugrave;ng, bố vợ t&ocirc;i đồng &yacute;! Thế l&agrave; đ&aacute;m cưới diễn ra, ch&uacute;ng t&ocirc;i n&ecirc;n vợ chồng!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Cuộc sống vợ chồng của thầy với đ&ocirc;i tay bị liệt chắc cũng phải &ldquo;đặc biệt&rdquo; lắm mới vượt qua mọi trở ngại v&agrave; c&oacute; được hạnh ph&uacute;c?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Vợ chồng t&ocirc;i đều l&agrave; gi&aacute;o vi&ecirc;n, cũng như mọi người, phải cố gắng rất nhiều để x&acirc;y dựng hạnh ph&uacute;c gia đ&igrave;nh, nu&ocirc;i dạy con c&aacute;i n&ecirc;n người! Ri&ecirc;ng t&ocirc;i th&igrave; lu&ocirc;n phải cố gắng gấp bội so với người b&igrave;nh thường để b&ugrave; đắp khiếm khuyết, bất hạnh của m&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Ngo&agrave;i đi dạy, về nh&agrave; thầy c&oacute; l&agrave;m việc trong nh&agrave; gi&uacute;p vợ, chăm con được kh&ocirc;ng? Thầy l&agrave;m thế n&agrave;o?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Chẳng việc g&igrave; m&agrave; t&ocirc;i kh&ocirc;ng l&agrave;m cả. Kh&oacute; xử nhất l&agrave; giai đoạn vợ chồng t&ocirc;i c&ograve;n ở chung nh&agrave; với mẹ t&ocirc;i. Vợ t&ocirc;i sinh con đầu l&ograve;ng, nằm cữ, t&ocirc;i phải c&aacute;ng đ&aacute;ng việc nh&agrave; nhiều hơn.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Đi dạy về lụi cụi l&agrave;m việc trong nh&agrave;. S&aacute;ng dậy sớm ra ao giặt đồ cho vợ con. Mẹ t&ocirc;i thấy vậy, cụ x&oacute;t ruột, mắng: &ldquo;Chồng đ&atilde; liệt 2 tay, đi dạy cả ng&agrave;y về c&ograve;n phải dậy sớm giặt đồ, vợ đ&agrave;nh l&ograve;ng để vậy &agrave;?&rdquo;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Vợ mới sinh nở, sợ vợ buồn, t&ocirc;i phải động vi&ecirc;n, an ủi. Từ đ&oacute; về sau t&ocirc;i phải dậy sớm từ l&uacute;c c&ograve;n tờ mờ để mẹ t&ocirc;i kh&ocirc;ng biết, giặt xong thau đồ rồi l&ecirc;n nằm chờ s&aacute;ng để đi dạy. Nhờ vậy m&agrave; ổn cả đ&ocirc;i đ&agrave;ng!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<div align="center">\r\n		<img alt="Đến cuối đời, tình yêu của họ vẫn còn nồng thắm" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/thayky2-b9991.jpg" /></div>\r\n	<div align="center">\r\n		Đến cuối đời, t&igrave;nh y&ecirc;u của họ vẫn c&ograve;n nồng thắm</div>\r\n	<p align="center">\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Thầy l&agrave; tấm gương phi thường nhưng vợ thầy cũng l&agrave; người phụ nữ phi thường d&aacute;m y&ecirc;u bằng tr&aacute;i tim v&agrave; vượt qua mọi thị phi, trở ngại đến với thầy. Trong đời sống vợ chồng, thầy c&oacute; b&iacute; quyết g&igrave; để nu&ocirc;i dưỡng t&igrave;nh y&ecirc;u tuyệt vời đ&oacute; cũng như hạnh ph&uacute;c gia đ&igrave;nh của m&igrave;nh?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Hồi đ&oacute;, nhiều người bảo t&ocirc;i rằng, chỉ c&oacute; những đứa con g&aacute;i ăn kh&ocirc;ng biết trở đầu đũa mới lấy t&ocirc;i. N&ecirc;n khi lấy được người vợ l&agrave; c&ocirc; g&aacute;i xinh đẹp nhất trong v&ugrave;ng, t&ocirc;i phải cố gắng x&acirc;y dựng v&agrave; g&igrave;n giữ hạnh ph&uacute;c của m&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		B&iacute; quyết g&igrave; ư? Sống v&agrave; cố gắng bằng tất cả tr&aacute;i tim m&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		T&ocirc;i đ&atilde; từng t&acirc;m sự với bạn b&egrave; rằng, t&ocirc;i bị liệt đ&ocirc;i tay, b&ugrave; lại, trời thương ban cho t&ocirc;i hạnh ph&uacute;c tuyệt vời. Vợ t&ocirc;i đ&uacute;ng l&agrave; &quot;qu&agrave; tặng của thượng đế&quot; cho t&ocirc;i. L&uacute;c biết m&igrave;nh sắp mất, vợ t&ocirc;i rất lo lắng cho t&ocirc;i, kh&ocirc;ng biết t&ocirc;i sẽ sống ra sao nếu kh&ocirc;ng c&oacute; c&ocirc; ấy b&ecirc;n cạnh. Con c&aacute;i th&igrave; đ&atilde; lớn, sẽ c&oacute; vợ c&oacute; chồng.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Nằm tr&ecirc;n giường bệnh m&agrave; vợ t&ocirc;i cứ thổn thức, suy nghĩ.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Em vợ t&ocirc;i (tức vợ hiện nay của t&ocirc;i), l&uacute;c ấy ở ngo&agrave;i Bắc, chồng mất đ&atilde; hơn 10 năm, một m&igrave;nh ở vậy nu&ocirc;i 2 đứa con, bay v&agrave;o thăm b&agrave; chị sắp mất.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Nằm tr&ecirc;n giường, gặp em g&aacute;i v&agrave;o thăm, vợ t&ocirc;i mừng rơi nước mắt, cầm tay em g&aacute;i n&oacute;i: &ldquo;Chị xin em một điều, chị mất đi rồi, em h&atilde;y thay chị l&agrave;m vợ anh K&yacute;, sống v&agrave; chăm s&oacute;c anh ấy những ng&agrave;y c&ograve;n lại&hellip;&rdquo;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		T&ocirc;i kh&ocirc;ng k&igrave;m được nước mắt, quay mặt đi, chẳng biết n&oacute;i g&igrave;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Thực ra, trước khi em vợ v&agrave;o, vợ t&ocirc;i cũng đ&atilde; trao đổi với t&ocirc;i mấy lần về việc n&agrave;y, nhưng t&ocirc;i gạt đi. Ngờ đ&acirc;u, c&ocirc; em v&agrave;o tới nơi, vợ t&ocirc;i n&oacute;i ra được ước nguyện cuối c&ugrave;ng rồi ra đi m&atilde;i m&atilde;i&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Người vợ thứ hai hiện nay ch&iacute;nh l&agrave; em vợ của t&ocirc;i, t&ecirc;n Vũ Thị Đậu&hellip;.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Bài viết mới', 'Bài viết mới', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'bai-viet-moi', 0, 'post', '', 0, 0),
(8, 0, '2012-10-11 15:51:31', '2012-10-14 19:34:47', '<p>\r\n	<strong>T&ocirc;i &ldquo;&ocirc;m&rdquo; c&ocirc; ấy bằng mắt! Ngồi b&ecirc;n nhau t&acirc;m t&igrave;nh mặc cho đ&ecirc;m đ&atilde; về khuya, sao trời c&agrave;ng s&aacute;ng hơn, kh&ocirc;ng gian y&ecirc;n tĩnh lạ thường. L&uacute;c sau nữa, c&ocirc; ấy ngồi v&agrave;o l&ograve;ng t&ocirc;i, t&ocirc;i qu&agrave;ng ch&acirc;n &ocirc;m chặt lấy n&agrave;ng xiết v&agrave;o l&ograve;ng&hellip;</strong><br />\r\n	&nbsp;</p>\r\n<div>\r\n	<p>\r\n		<em>Thưa thầy, tấm gương vượt kh&oacute; vươn l&ecirc;n số phận của thầy đ&atilde; được nhiều người biết tới. C&ograve;n chuyện t&igrave;nh y&ecirc;u của thầy, vẫn c&ograve;n nhiều b&iacute; mật chưa kể ra, thầy c&oacute; thể &ldquo;bật m&iacute;&rdquo; ch&uacute;t g&igrave; được chứ ạ&hellip;</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		(Cười vang) T&ocirc;i lu&ocirc;n được hạnh ph&uacute;c, may mắn trong t&igrave;nh bạn, t&igrave;nh y&ecirc;u d&ugrave; bị liệt cả hai tay!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Hồi học lớp 6, t&ocirc;i được mời đi n&oacute;i chuyện ở một trường bạn. N&oacute;i chuyện xong c&oacute; bạn học sinh nữ chạy l&ecirc;n cởi khăn qu&agrave;ng của bạn ấy qu&agrave;ng v&agrave;o vai t&ocirc;i.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		T&ocirc;i sung sướng v&ocirc; ngần. Chưa hết đ&acirc;u. Sang lớp 7, c&ocirc; ấy chuyển trường về học chung lớp với t&ocirc;i nữa chứ!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&ocirc; ấy c&oacute; chiếc compa của Trung Quốc rất tốt, thời ấy hiếm lắm v&agrave; qu&yacute; lắm, vậy m&agrave; c&ocirc; ấy bỏ v&agrave;o chiếc cặp của t&ocirc;i k&egrave;m theo mảnh giấy ghi mấy chữ &ldquo;Th&acirc;n tặng NNK&rdquo;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Hết lớp 7, Liễu, t&ecirc;n c&ocirc; bạn đi học kế to&aacute;n. Sau n&agrave;y ai cũng c&oacute; gia đ&igrave;nh nhưng ch&uacute;ng t&ocirc;i vẫn giữ quan hệ bạn b&egrave; cho tới nay, nửa thế kỷ rồi!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<div align="center">\r\n		<img alt="Thầy Ký dùng chân cắm hoa" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/thayky-b9991.jpg" /><br />\r\n		Thầy K&yacute; d&ugrave;ng ch&acirc;n cắm hoa</div>\r\n	<p align="center">\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Đ&oacute; l&agrave; t&igrave;nh bạn, c&ograve;n chuyện t&igrave;nh y&ecirc;u? Nghe đồn cũng thi vị chẳng k&eacute;m&hellip;</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Bắt đầu từ l&uacute;c t&ocirc;i tốt nghiệp đại học về qu&ecirc; dạy c&ugrave;ng thầy Ch&acirc;u, l&agrave; thầy dạy thời học phổ th&ocirc;ng của t&ocirc;i.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&oacute; anh bạn dẫn em g&aacute;i tới chơi. Như t&igrave;nh y&ecirc;u s&eacute;t đ&aacute;nh, t&ocirc;i sững sờ. C&ocirc; ấy cũng c&oacute; &ldquo;t&iacute;n hiệu&rdquo;, t&ocirc;i ngỏ lời với c&ocirc; ấy. C&aacute;i buổi ban đầu m&agrave; như thế l&agrave; nhanh lắm rồi.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Khoảng 20 ng&agrave;y sau c&ocirc; ấy đạp xe như bay xuống thăm người anh l&uacute;c người anh&hellip;đi vắng! Thế l&agrave; gặp t&ocirc;i. Ch&uacute;ng t&ocirc;i tr&ograve; chuyện, t&acirc;m t&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		C&ocirc; ấy rủ t&ocirc;i đi chơi. Lần đầu ti&ecirc;n t&ocirc;i ngồi sau xe đạp cho một c&ocirc; g&aacute;i chở đi tr&ecirc;n đường. Bồi hồi, x&uacute;c động lắm.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<div align="center">\r\n		<img alt="Hạnh phúc bên người vợ thứ 2 cũng là em vợ mình" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/thayky1-b9991.jpg" /></div>\r\n	<div align="center">\r\n		Hạnh ph&uacute;c b&ecirc;n người vợ thứ 2 cũng l&agrave; em vợ m&igrave;nh</div>\r\n	<p align="center">\r\n		&nbsp;</p>\r\n	<p>\r\n		Ch&uacute;ng t&ocirc;i đi chơi, tr&ograve; chuyện, qu&ecirc;n hết thảy những g&igrave; xung quanh. Đến l&uacute;c chợt nhớ ra th&igrave; trời đ&atilde; tối. C&ocirc; ấy định về nhưng t&ocirc;i nhất quyết giữ c&ocirc; ấy lại. Đ&ecirc;m h&ocirc;m ấy trời kh&ocirc;ng c&oacute; trăng, chỉ đầy sao lấp l&aacute;nh v&agrave; ch&uacute;ng t&ocirc;i b&ecirc;n nhau&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Rồi sao nữa thầy? B&igrave;nh thường theo đ&uacute;ng &ldquo;quy luật&rdquo; th&igrave; tới đ&oacute; phải c&oacute; nắm tay rồi &ldquo;hơn thế nữa&rdquo;, c&ograve;n thầy c&oacute; đ&ocirc;i tay m&agrave; cũng như kh&ocirc;ng&hellip;</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		(Cười) T&ocirc;i &ldquo;&ocirc;m&rdquo; c&ocirc; ấy bằng mắt! Ngồi b&ecirc;n nhau t&acirc;m t&igrave;nh mặc cho đ&ecirc;m đ&atilde; về khuya, sao trời c&agrave;ng s&aacute;ng hơn, kh&ocirc;ng gian y&ecirc;n tĩnh lạ thường&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		L&uacute;c sau nữa, c&ocirc; ấy ngồi v&agrave;o l&ograve;ng t&ocirc;i, t&ocirc;i qu&agrave;ng ch&acirc;n &ocirc;m chặt lấy n&agrave;ng xiết v&agrave;o l&ograve;ng&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>&Ocirc;i, độc đ&aacute;o qu&aacute;...!</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		(Thầy K&yacute; kể đến đ&acirc;y th&igrave; ngừng lại. C&oacute; lẽ thầy đang bồi hồi nhớ lại &ldquo;c&aacute;i thưở ban đầu&hellip;&rdquo; của m&igrave;nh. Rồi thầy d&ugrave;ng ch&acirc;n lục tr&ecirc;n gi&aacute; s&aacute;ch lấy ra quyển sổ ghi ch&eacute;p của những kh&aacute;ch đến thăm, ng&oacute;n ch&acirc;n thầy thoăn thoắt giở lật từng trang, t&igrave;m ra b&agrave;i thơ &ldquo;Thơ vui tặng Nguyễn Ngọc K&yacute;&rdquo; của nh&agrave; thơ Trương Nam Hương cho t&ocirc;i xem).</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>C&oacute; một người đi học</em></p>\r\n	<p>\r\n		<em>S&aacute;ch vở mang trong đầu</em></p>\r\n	<p>\r\n		<em>Đ&ocirc;i tay mềm dắt gi&oacute;</em></p>\r\n	<p>\r\n		<em>Lấy ch&acirc;n m&igrave;nh ch&eacute;p c&acirc;u</em></p>\r\n	<p>\r\n		<em>Y&ecirc;u đương trong trẻo lắm</em></p>\r\n	<p>\r\n		<em>Kh&ocirc;ng d&ugrave;ng tay&hellip;du xu&acirc;n</em></p>\r\n	<p>\r\n		<em>Đ&ecirc;m đ&ecirc;m nằm với vợ</em></p>\r\n	<p>\r\n		<em>Quấn qu&yacute;t bằng&hellip;ba ch&acirc;n</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Chờ t&ocirc;i đọc xong b&agrave;i thơ, thầy K&yacute; n&oacute;i tiếp:</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		&ldquo;N&agrave;ng&rdquo; ch&iacute;nh l&agrave; vợ đầu của t&ocirc;i, t&ecirc;n Vũ Thị Nhiễu, cũng l&agrave; c&ocirc; gi&aacute;o, đ&atilde; gắn b&oacute; c&ugrave;ng t&ocirc;i mấy chục năm trời, g&aacute;nh v&aacute;c chia sẻ với t&ocirc;i mọi buồn vui trong cuộc đời. C&ocirc; ấy đ&atilde; mất chục năm nay rồi!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>So ra, thầy kh&aacute; &ldquo;may mắn&rdquo; v&agrave; hạnh ph&uacute;c trong t&igrave;nh y&ecirc;u phải kh&ocirc;ng thầy?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Cũng kh&ocirc;ng ho&agrave;n to&agrave;n vậy đ&acirc;u! T&ocirc;i v&agrave; c&ocirc; ấy đến với nhau bằng t&igrave;nh y&ecirc;u m&atilde;nh liệt song vấp phải sự phản đối của gia đ&igrave;nh c&ocirc; ấy cũng v&ocirc; c&ugrave;ng quyết liệt! V&igrave; y&ecirc;u t&ocirc;i, c&ocirc; ấy đ&atilde; bị ngăn cản, bị đ&aacute;nh đập nhiều lắm đấy!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Ai m&agrave; tin con g&aacute;i xinh đẹp nhất v&ugrave;ng, học h&agrave;nh tới nơi tới chốn m&agrave; lại chọn người y&ecirc;u, người chồng tật nguyền, liệt 2 c&aacute;nh tay như t&ocirc;i?</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		May nhờ nh&agrave; thơ Đo&agrave;n Văn Cừ ở gần đấy, &ocirc;ng rất qu&yacute; t&ocirc;i v&agrave; c&oacute; uy t&iacute;n lớn với bố c&ocirc; ấy. Bố c&ocirc; ấy vốn m&ecirc; thơ của nh&agrave; thơ Đo&agrave;n Văn Cừ. &Ocirc;ng gặp bố vợ tương lai của t&ocirc;i n&oacute;i đại &yacute; l&agrave; t&ocirc;i c&oacute; t&agrave;i, năng lực tốt, c&aacute;i t&ecirc;n Ngọc K&yacute; cũng rất tốt. N&oacute;i t&oacute;m lại l&agrave; &ldquo;rể qu&yacute;&rdquo; đấy.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		V&agrave; t&igrave;nh y&ecirc;u, vợ chồng l&agrave; duy&ecirc;n phận với nhau v.v&hellip;Cuối c&ugrave;ng, bố vợ t&ocirc;i đồng &yacute;! Thế l&agrave; đ&aacute;m cưới diễn ra, ch&uacute;ng t&ocirc;i n&ecirc;n vợ chồng!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Cuộc sống vợ chồng của thầy với đ&ocirc;i tay bị liệt chắc cũng phải &ldquo;đặc biệt&rdquo; lắm mới vượt qua mọi trở ngại v&agrave; c&oacute; được hạnh ph&uacute;c?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Vợ chồng t&ocirc;i đều l&agrave; gi&aacute;o vi&ecirc;n, cũng như mọi người, phải cố gắng rất nhiều để x&acirc;y dựng hạnh ph&uacute;c gia đ&igrave;nh, nu&ocirc;i dạy con c&aacute;i n&ecirc;n người! Ri&ecirc;ng t&ocirc;i th&igrave; lu&ocirc;n phải cố gắng gấp bội so với người b&igrave;nh thường để b&ugrave; đắp khiếm khuyết, bất hạnh của m&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Ngo&agrave;i đi dạy, về nh&agrave; thầy c&oacute; l&agrave;m việc trong nh&agrave; gi&uacute;p vợ, chăm con được kh&ocirc;ng? Thầy l&agrave;m thế n&agrave;o?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Chẳng việc g&igrave; m&agrave; t&ocirc;i kh&ocirc;ng l&agrave;m cả. Kh&oacute; xử nhất l&agrave; giai đoạn vợ chồng t&ocirc;i c&ograve;n ở chung nh&agrave; với mẹ t&ocirc;i. Vợ t&ocirc;i sinh con đầu l&ograve;ng, nằm cữ, t&ocirc;i phải c&aacute;ng đ&aacute;ng việc nh&agrave; nhiều hơn.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Đi dạy về lụi cụi l&agrave;m việc trong nh&agrave;. S&aacute;ng dậy sớm ra ao giặt đồ cho vợ con. Mẹ t&ocirc;i thấy vậy, cụ x&oacute;t ruột, mắng: &ldquo;Chồng đ&atilde; liệt 2 tay, đi dạy cả ng&agrave;y về c&ograve;n phải dậy sớm giặt đồ, vợ đ&agrave;nh l&ograve;ng để vậy &agrave;?&rdquo;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Vợ mới sinh nở, sợ vợ buồn, t&ocirc;i phải động vi&ecirc;n, an ủi. Từ đ&oacute; về sau t&ocirc;i phải dậy sớm từ l&uacute;c c&ograve;n tờ mờ để mẹ t&ocirc;i kh&ocirc;ng biết, giặt xong thau đồ rồi l&ecirc;n nằm chờ s&aacute;ng để đi dạy. Nhờ vậy m&agrave; ổn cả đ&ocirc;i đ&agrave;ng!</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<div align="center">\r\n		<img alt="Đến cuối đời, tình yêu của họ vẫn còn nồng thắm" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/thayky2-b9991.jpg" /></div>\r\n	<div align="center">\r\n		Đến cuối đời, t&igrave;nh y&ecirc;u của họ vẫn c&ograve;n nồng thắm</div>\r\n	<p align="center">\r\n		&nbsp;</p>\r\n	<p>\r\n		<em>Thầy l&agrave; tấm gương phi thường nhưng vợ thầy cũng l&agrave; người phụ nữ phi thường d&aacute;m y&ecirc;u bằng tr&aacute;i tim v&agrave; vượt qua mọi thị phi, trở ngại đến với thầy. Trong đời sống vợ chồng, thầy c&oacute; b&iacute; quyết g&igrave; để nu&ocirc;i dưỡng t&igrave;nh y&ecirc;u tuyệt vời đ&oacute; cũng như hạnh ph&uacute;c gia đ&igrave;nh của m&igrave;nh?</em></p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Hồi đ&oacute;, nhiều người bảo t&ocirc;i rằng, chỉ c&oacute; những đứa con g&aacute;i ăn kh&ocirc;ng biết trở đầu đũa mới lấy t&ocirc;i. N&ecirc;n khi lấy được người vợ l&agrave; c&ocirc; g&aacute;i xinh đẹp nhất trong v&ugrave;ng, t&ocirc;i phải cố gắng x&acirc;y dựng v&agrave; g&igrave;n giữ hạnh ph&uacute;c của m&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		B&iacute; quyết g&igrave; ư? Sống v&agrave; cố gắng bằng tất cả tr&aacute;i tim m&igrave;nh.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		T&ocirc;i đ&atilde; từng t&acirc;m sự với bạn b&egrave; rằng, t&ocirc;i bị liệt đ&ocirc;i tay, b&ugrave; lại, trời thương ban cho t&ocirc;i hạnh ph&uacute;c tuyệt vời. Vợ t&ocirc;i đ&uacute;ng l&agrave; &quot;qu&agrave; tặng của thượng đế&quot; cho t&ocirc;i. L&uacute;c biết m&igrave;nh sắp mất, vợ t&ocirc;i rất lo lắng cho t&ocirc;i, kh&ocirc;ng biết t&ocirc;i sẽ sống ra sao nếu kh&ocirc;ng c&oacute; c&ocirc; ấy b&ecirc;n cạnh. Con c&aacute;i th&igrave; đ&atilde; lớn, sẽ c&oacute; vợ c&oacute; chồng.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Nằm tr&ecirc;n giường bệnh m&agrave; vợ t&ocirc;i cứ thổn thức, suy nghĩ.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Em vợ t&ocirc;i (tức vợ hiện nay của t&ocirc;i), l&uacute;c ấy ở ngo&agrave;i Bắc, chồng mất đ&atilde; hơn 10 năm, một m&igrave;nh ở vậy nu&ocirc;i 2 đứa con, bay v&agrave;o thăm b&agrave; chị sắp mất.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Nằm tr&ecirc;n giường, gặp em g&aacute;i v&agrave;o thăm, vợ t&ocirc;i mừng rơi nước mắt, cầm tay em g&aacute;i n&oacute;i: &ldquo;Chị xin em một điều, chị mất đi rồi, em h&atilde;y thay chị l&agrave;m vợ anh K&yacute;, sống v&agrave; chăm s&oacute;c anh ấy những ng&agrave;y c&ograve;n lại&hellip;&rdquo;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		T&ocirc;i kh&ocirc;ng k&igrave;m được nước mắt, quay mặt đi, chẳng biết n&oacute;i g&igrave;.</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Thực ra, trước khi em vợ v&agrave;o, vợ t&ocirc;i cũng đ&atilde; trao đổi với t&ocirc;i mấy lần về việc n&agrave;y, nhưng t&ocirc;i gạt đi. Ngờ đ&acirc;u, c&ocirc; em v&agrave;o tới nơi, vợ t&ocirc;i n&oacute;i ra được ước nguyện cuối c&ugrave;ng rồi ra đi m&atilde;i m&atilde;i&hellip;</p>\r\n	<p>\r\n		&nbsp;</p>\r\n	<p>\r\n		Người vợ thứ hai hiện nay ch&iacute;nh l&agrave; em vợ của t&ocirc;i, t&ecirc;n Vũ Thị Đậu&hellip;.</p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Bài viết mới', 'Bài viết mới 2', 'draft', 'open', 'open', '', '', '', '', '2012-10-14 19:35:26', '0000-00-00 00:00:00', '', 0, 'bai-viet-moi-1', 0, 'post', '', 0, 0),
(9, 0, '2012-10-12 17:52:11', '0000-00-00 00:00:00', '<div>\r\n	&quot;Nếp&quot; xấu n&agrave;y đang c&oacute; xu hướng trở th&agrave;nh một thủ tục, th&oacute;i quen của những người vi phạm luật giao th&ocirc;ng.</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div align="center" itemtype="http://schema.org/ImageObject">\r\n	<img alt="Bị tuýt còi, gọi “người thân”!" src="http://dantri4.vcmedia.vn/I3KdHJtU0B3ELPKGaTLe/Image/2012/10/goidien-98e78.jpg" /><br />\r\n	Th&oacute;i quen r&uacute;t điện thoại gọi cho người quen, người th&acirc;n đ&atilde; trở th&agrave;nh &quot;nếp&quot; của người vi phạm luật giao th&ocirc;ng (Ảnh minh họa)</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Vừa qua, tr&ecirc;n c&aacute;c trang chia sẻ video trực tuyến lan truyền một đoạn clip, được camera của VOV giao th&ocirc;ng ghi lại. Trong h&igrave;nh l&agrave; cảnh một thanh ni&ecirc;n khoảng 30 tuổi, ăn mặc s&agrave;nh điệu, c&oacute; những h&agrave;nh vi, lời n&oacute;i thiếu văn h&oacute;a khi bị cảnh s&aacute;t dừng chiếc xe Poscher trị gi&aacute; tr&ecirc;n 3 tỷ đồng để kiểm tra tr&ecirc;n đường phố H&agrave; Nội. Trước y&ecirc;u cầu kiểm tra h&agrave;nh ch&iacute;nh của lực lượng chức năng, thay v&igrave; chấp h&agrave;nh, anh ta gọi điện cho người th&acirc;n, ngh&ecirc;nh ngang kh&ocirc;ng hợp t&aacute;c với người l&agrave;m nhiệm vụ. Thậm ch&iacute;, trước mặt c&ocirc;ng an, c&ograve;n thẳng tay n&eacute;m bật lửa v&agrave; bao thuốc h&uacute;t dở v&agrave;o mặt của một nữ ph&oacute;ng vi&ecirc;n đang t&aacute;c nghiệp. Khi bị cưỡng chế, thanh ni&ecirc;n n&agrave;y vẫn li&ecirc;n tục gọi điện cho người th&acirc;n v&agrave; bu&ocirc;ng lời lẽ tục tĩu đối với những người thực thi ph&aacute;p luật. Ngay sau đ&oacute;, đối tượng được x&aacute;c định l&agrave; Chu Đăng K, sinh năm 1982, tại th&agrave;nh phố Vinh &ndash; Nghệ An.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Lo ngại l&agrave; h&agrave;nh vi đ&aacute;ng l&ecirc;n &aacute;n đ&oacute; kh&ocirc;ng phải trường hợp c&aacute; biệt. Gần đ&acirc;y, Cảnh s&aacute;t giao th&ocirc;ng H&agrave; Nội li&ecirc;n tục chứng kiến những trường hợp vi phạm giao th&ocirc;ng tự xưng l&agrave; &quot;ch&aacute;u ch&uacute; Nhanh&quot; (nguy&ecirc;n Gi&aacute;m đốc C&ocirc;ng an TP H&agrave; Nội) để kh&ocirc;ng bị xử phạt. Trung t&aacute; Nguyễn Thanh Ca, Đội ph&oacute; đội 4 Ph&ograve;ng Cảnh s&aacute;t giao th&ocirc;ng, C&ocirc;ng an Th&agrave;nh phố H&agrave; Nội cho biết: Khi thực thi nhiệm vụ, ch&uacute;ng t&ocirc;i gặp kh&ocirc;ng &iacute;t trường hợp vi phạm Luật Giao th&ocirc;ng bị &quot;tu&yacute;t c&ograve;i&quot; th&igrave; thay v&igrave; chấp h&agrave;nh hiệu lệnh, người điều khiển phương tiện r&uacute;t điện thoại gọi người n&agrave;y, người kia để nhờ can thiệp, xin xỏ. C&oacute; người gọi xong th&igrave; ra n&oacute;i chuyện với cảnh s&aacute;t, c&oacute; người cầm điện thoại đưa cho cảnh s&aacute;t để&hellip; n&oacute;i chuyện với &quot;người th&acirc;n&quot;. &quot;L&atilde;nh đạo c&aacute;c cấp kh&ocirc;ng n&ecirc;n can thiệp v&agrave;o việc xử l&yacute; vi phạm giao th&ocirc;ng để thực thi ph&aacute;p luật được nghi&ecirc;m minh. Chứ cứ c&oacute; vụ việc xảy ra l&agrave; điện thoại gọi đến li&ecirc;n tục, anh em thi h&agrave;nh nhiệm vụ kh&ocirc;ng nghe điện thoại kh&ocirc;ng được!&rdquo;- &Ocirc;ng Ca bức x&uacute;c n&oacute;i.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Chia sẻ về &quot;nạn&quot; bị tu&yacute;t c&ograve;i l&agrave; gọi điện thoại cho &quot;người th&acirc;n&quot;, một chiến sĩ Ph&ograve;ng Cảnh s&aacute;t giao th&ocirc;ng, C&ocirc;ng an TP H&agrave; Nội than thở: Kh&ocirc;ng &iacute;t người tự xưng l&agrave; ch&aacute;u &ocirc;ng nọ, con b&agrave; kia để h&ugrave; dọa anh em cảnh s&aacute;t. Cũng kh&ocirc;ng &iacute;t trường hợp ch&uacute;ng t&ocirc;i ki&ecirc;n quyết lập bi&ecirc;n bản xử l&yacute; vi phạm th&igrave; bị cấp tr&ecirc;n mắng: &ldquo;Vuốt mặt cũng phải nể mũi chứ&rdquo;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo t&igrave;m hiểu của ph&oacute;ng vi&ecirc;n, sở dĩ &quot;nếp xấu&quot; gọi điện thoại cho người th&acirc;n c&oacute; đất để &quot;ho&agrave;nh h&agrave;nh&quot; ở H&agrave; Nội ch&iacute;nh l&agrave; xuất ph&aacute;t từ sự cả nể của người được giao nhiệm vụ bảo vệ luật ph&aacute;p, hoặc đang thực thi c&ocirc;ng vụ. D&ugrave; muốn d&ugrave; kh&ocirc;ng, hầu hết họ đều phải chấp nhận việc n&agrave;y. Ở đ&acirc;y, yếu tố vật chất l&agrave; kh&ocirc;ng c&oacute;. Nhưng đại bộ phận người tham gia giao th&ocirc;ng khi được hỏi về hiện tượng n&agrave;y th&igrave; đều b&agrave;y tỏ sự bất b&igrave;nh. Hầu hết đều cho rằng: Đ&oacute; l&agrave; vi phạm ph&aacute;p luật. Tất cả mọi người đều b&igrave;nh đẳng trước ph&aacute;p luật. T&igrave;nh trạng n&agrave;y cứ tiếp tục sẽ dẫn đến sự nhu nhược, cả nể, bu&ocirc;ng lỏng quản l&yacute; v&agrave; g&acirc;y ra sự lộn xộn. V&agrave; xa hơn, l&agrave; tiếp tay cho sự khinh nhờn ph&aacute;p luật, chống người thi h&agrave;nh c&ocirc;ng vụ. Mới đ&acirc;y việc ng&agrave;y 7/6/2012, C&ocirc;ng an quận Ho&agrave;ng Mai đ&atilde; tạm giữ h&igrave;nh sự đối với &ocirc;ng Vũ Xu&acirc;n Hiền (54 tuổi, ở tổ 20, phường Trần Ph&uacute;, quận Ho&agrave;ng Mai, H&agrave; Nội) c&ugrave;ng con trai l&agrave; Vũ Xu&acirc;n H&ugrave;ng (19 tuổi) để điều tra về h&agrave;nh vi &ldquo;chống người thi h&agrave;nh c&ocirc;ng vụ cho thấy điều đ&oacute;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Cụ thể, v&agrave;o khoảng 9h c&ugrave;ng ng&agrave;y, tổ c&ocirc;ng t&aacute;c thuộc đội Cảnh s&aacute;t giao th&ocirc;ng số 4 &ndash; Ph&ograve;ng Cảnh s&aacute;t giao th&ocirc;ng H&agrave; Nội ph&aacute;t hiện Vũ Xu&acirc;n H&ugrave;ng điều khiển xe m&aacute;y c&oacute; h&agrave;nh vi vượt đ&egrave;n đỏ đ&atilde; ra hiệu lệnh dừng xe để kiểm tra h&agrave;nh ch&iacute;nh. Nhưng thay vi chấp h&agrave;nh, đối tượng n&agrave;y lại r&uacute; ga, lạng l&aacute;ch bỏ chạy, sau đ&oacute; dừng xe lại v&agrave; lớn tiếng th&aacute;ch thức tổ c&ocirc;ng t&aacute;c. Thấy vậy, Thượng sĩ Lương Đ&igrave;nh Hải y&ecirc;u cầu H&ugrave;ng xuất tr&igrave;nh giấy tờ t&ugrave;y th&acirc;n. Tuy nhi&ecirc;n, H&ugrave;ng kh&ocirc;ng xuất tr&igrave;nh được bằng l&aacute;i c&ograve;n tiếp tục chửi bới v&agrave; th&aacute;ch thức n&ecirc;n đ&atilde; bị tổ c&ocirc;ng t&aacute;c lập bi&ecirc;n bản xử phạt h&agrave;nh ch&iacute;nh. Thấy vậy, H&ugrave;ng r&uacute;t điện thoại gọi cho bố l&agrave; &ocirc;ng Vũ Xu&acirc;n Hiền v&agrave; n&oacute;i rằng m&igrave;nh bị Cảnh s&aacute;t giao th&ocirc;ng đ&aacute;nh. Khoảng 15 ph&uacute;t sau, &ocirc;ng Hiền xuất hiện rồi cả hai bố con lao v&agrave;o đấm đ&aacute; Thượng sĩ Hải. Thấy đồng nghiệp bị h&agrave;nh hung, một Cảnh s&aacute;t giao th&ocirc;ng kh&aacute;c can ngăn cũng bị &ocirc;ng Hiền &ldquo;tung chưởng&rdquo;. Hậu quả của những c&uacute; đ&aacute;nh n&agrave;y l&agrave; Thượng sĩ Hải bị thương ph&ugrave; nề ở v&ugrave;ng mặt phải điều trị tại Bệnh viện Bưu điện.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&Ocirc;ng L&ecirc; Văn Chỉnh, 64 tuổi ở Nguyễn An Ninh, Ho&agrave;ng Mai, H&agrave; Nội than phiền: &quot;Chưa nơi n&agrave;o kỷ cương trật tự an to&agrave;n giao th&ocirc;ng bị vi phạm nghi&ecirc;m trọng như ở H&agrave; Nội. Tr&ecirc;n đường phố, thanh thiếu ni&ecirc;n chở ba, chở bốn, kh&ocirc;ng đội mũ bảo hiểm ngh&ecirc;nh ngang ph&oacute;ng xe m&aacute;y trước mặt Cảnh s&aacute;t giao th&ocirc;ng. C&ograve;n những người thực thi nhiệm vụ, c&oacute; cho uống&hellip; mật gấu cũng kh&ocirc;ng d&aacute;m ph&oacute;ng xe đuổi bọn ch&uacute;ng. Buồn l&ograve;ng hơn, Thủ đ&ocirc; lại l&agrave; nơi c&oacute; tỷ lệ chống người thi h&agrave;nh c&ocirc;ng vụ cao&hellip; nhất nước. Đ&acirc;y cũng l&agrave; nơi &ldquo;khởi xướng&rdquo; ra &ldquo;phong tr&agrave;o&rdquo; l&aacute;i xe&hellip; hất cảnh s&aacute;t l&ecirc;n nắp ca-p&ocirc;&quot;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Mới đ&acirc;y, Ph&oacute; B&iacute; thư Thường trực Th&agrave;nh Uỷ H&agrave; Nội Nguyễn C&ocirc;ng So&aacute;i đ&atilde; thẳng thắn thừa nhận c&ograve;n nhiều tồn tại trong c&ocirc;ng t&aacute;c đảm bảo trật tự an to&agrave;n giao th&ocirc;ng tr&ecirc;n địa b&agrave;n Thủ đ&ocirc;: C&ocirc;ng t&aacute;c tuy&ecirc;n truyền, phổ biến, gi&aacute;o dục ph&aacute;p luật c&ograve;n thiếu chiều s&acirc;u, chưa bền bỉ, li&ecirc;n tục, chưa ph&ugrave; hợp với đặc điểm từng đối tượng n&ecirc;n chất lượng, hiệu quả c&ograve;n hạn chế. C&ocirc;ng t&aacute;c tuần tra, kiểm so&aacute;t, xử l&yacute; vi phạm về trật tự an to&agrave;n giao th&ocirc;ng thiếu ki&ecirc;n quyết, triệt để. &Yacute; thức chấp h&agrave;nh ph&aacute;p luật của một bộ phận người tham gia giao th&ocirc;ng chưa cao, t&igrave;nh trạng vượt đ&egrave;n đỏ, đi v&agrave;o đường cấm c&ograve;n phổ biến...</p>\r\n', 'Bị tuýt còi, gọi “người thân”!', 'Khi bị lực lượng CSGT phát hiện, xử lý hành vi vi phạm luật giao thông, hầu hết những người vi phạm đều thực hiện động tác đầu tiên là… rút điện thoại gọi người thân.', 'pending', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'bi-tuyt-coi-goi-nguoi-than', 0, 'post', '', 0, 0);
INSERT INTO `hd_posts` (`id`, `post_author`, `post_date`, `post_date_gmt`, `post_content`, `post_title`, `post_excerpt`, `post_status`, `comment_status`, `ping_status`, `post_password`, `post_name`, `to_ping`, `pinged`, `post_modified`, `post_modified_gmt`, `post_content_filtered`, `post_parent`, `guid`, `menu_order`, `post_type`, `post_mime_type`, `comment_count`, `language_id`) VALUES
(10, 0, '2012-10-13 08:58:56', '0000-00-00 00:00:00', '<p>\r\n	&nbsp;</p>\r\n<h2 class="fon33 mt1" style="margin: 5px 0px 0px; padding: 0px; font-size: 16px; line-height: 18px; font-family: ''Times New Roman''; color: rgb(95, 95, 95); ">\r\n	Nh&agrave; lợp m&aacute;i rơm m&aacute;i rạ l&agrave; một &ldquo;đặc sản&rdquo; kiến tr&uacute;c của v&ugrave;ng qu&ecirc;, kh&ocirc;ng chỉ một thời phổ biến ở Việt Nam m&agrave; hiện nay, tại nhiều v&ugrave;ng n&ocirc;ng th&ocirc;n tr&ecirc;n khắp thế giới, m&aacute;i gianh vẫn được sử dụng như một lối kiến tr&uacute;c cổ điển đầy l&atilde;ng mạn.</h2>\r\n<div class="fon34 mt3 mr2 fon43" itemtype="http://schema.org/ImageObject" style="margin: 15px 10px 14.100000381469727px 0px; padding: 0px; font-size: 12pt; line-height: 20px !important; font-family: ''Times New Roman''; color: rgb(0, 0, 0); ">\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<img alt="Vẻ đẹp nên thơ của những mái nhà tranh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/1-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		&nbsp;</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; ">\r\n		Sau một vụ m&ugrave;a thu hoạch, rơm rạ đầy ngập cả đường l&agrave;ng, những người n&ocirc;ng d&acirc;n cần c&ugrave;, hay lam hay l&agrave;m đ&atilde; nghĩ ra đủ h&igrave;nh thức tận dụng, biến những thứ tưởng như l&agrave; phế thải trở th&agrave;nh những m&oacute;n đồ thủ c&ocirc;ng đẹp mắt. Trong đ&oacute;, đ&aacute;ng kể nhất l&agrave; kiến tr&uacute;c nh&agrave; m&aacute;i lợp rơm rạ, cho tới nay vẫn c&ograve;n thịnh h&agrave;nh ở nhiều miền qu&ecirc; phương T&acirc;y v&agrave; tạo n&ecirc;n n&eacute;t duy&ecirc;n d&aacute;ng đặc trưng cho kiến tr&uacute;c ở v&ugrave;ng n&ocirc;ng th&ocirc;n.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<img alt="Vẻ đẹp nên thơ của những mái nhà tranh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/2-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		&nbsp;</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; ">\r\n		Người ta vẫn x&acirc;y nh&agrave; m&aacute;i ng&oacute;i, m&aacute;i bằng b&igrave;nh thường, nhưng tr&ecirc;n tầng m&aacute;i thứ nhất hay c&ograve;n gọi l&agrave; m&aacute;i trong đ&oacute; l&agrave; một khung m&aacute;i thứ hai bao tr&ugrave;m ra ngo&agrave;i được lợp bằng rơm rạ. Khi mưa xuống, nước sẽ tr&ocirc;i đi rất nhanh. M&ugrave;a h&egrave;, n&oacute; c&ograve;n c&oacute; t&aacute;c dụng chống nắng, chống n&oacute;ng. Trọng lượng nhẹ của lớp m&aacute;i ngo&agrave;i n&agrave;y c&ugrave;ng t&iacute;nh năng bảo vệ của n&oacute; gi&uacute;p n&acirc;ng cao tuổi thọ c&ocirc;ng tr&igrave;nh v&agrave; biến những ng&ocirc;i nh&agrave; giản dị trở th&agrave;nh một t&aacute;c phẩm kiến tr&uacute;c mềm mại, duy&ecirc;n d&aacute;ng, đầy t&iacute;nh thẩm mỹ. Chẳng thế m&agrave; c&ocirc;ng việc của những người thợ chuy&ecirc;n lợp m&aacute;i rơm m&aacute;i rạ được xếp v&agrave;o nh&oacute;m &ldquo;craft&rdquo; &ndash; nghề thủ c&ocirc;ng tại nhiều nước phương T&acirc;y bởi t&iacute;nh chất c&ocirc;ng việc y&ecirc;u cầu độ kh&eacute;o l&eacute;o từ b&agrave;n tay người thợ.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<img alt="Vẻ đẹp nên thơ của những mái nhà tranh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/3-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		&nbsp;</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; ">\r\n		Ng&agrave;y nay, bạn vẫn c&oacute; thể t&igrave;m thấy những ng&ocirc;i nh&agrave; m&aacute;i gianh ở v&ugrave;ng n&ocirc;ng th&ocirc;n c&aacute;c nước Ch&acirc;u &Acirc;u, Ch&acirc;u &Aacute;, trong đ&oacute; nước Anh được biết tới l&agrave; xứ sở của những m&aacute;i nh&agrave; gianh đẹp mắt nhất. Những ưu thế của m&aacute;i rơm m&aacute;i rạ đ&atilde; được khẳng định qua thời gian, n&oacute; vừa hữu dụng, vừa gi&agrave;u thẩm mỹ v&agrave; gi&aacute; th&agrave;nh lại rất rẻ, độ bền rất cao.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<img alt="Vẻ đẹp nên thơ của những mái nhà tranh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/4-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		&nbsp;</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; ">\r\n		Ở những nước ph&aacute;t triển, khi xu hướng kiến tr&uacute;c hiện đại đ&atilde; trở n&ecirc;n qu&aacute; phổ biến, những trang vi&ecirc;n ở v&ugrave;ng n&ocirc;ng th&ocirc;n bắt đầu quay lại với lối kiến tr&uacute;c ho&agrave;i cổ v&agrave; tạo n&ecirc;n một vẻ đẹp h&agrave;i h&ograve;a với tổng thể kh&ocirc;ng gian xung quanh. Đồng thời, kỹ thuật tạo h&igrave;nh cho m&aacute;i gianh đ&atilde; đạt tới mức c&oacute; thể biến mỗi m&aacute;i nh&agrave; th&agrave;nh một t&aacute;c phẩm nghệ thuật đẹp mắt v&agrave; kh&ocirc;ng phải m&aacute;i nh&agrave; n&agrave;o cũng giống nhau, điều đ&oacute; l&agrave;m n&ecirc;n sự đa dạng sinh động cho mỗi c&ocirc;ng tr&igrave;nh.</p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/5-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/6-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/7-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/8-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/9-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/10-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Kiến trúc mái gianh của Anh" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/11-4b231.jpg" style="margin: 0px; padding: 0px; " /></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">Kiến tr&uacute;c m&aacute;i gianh của Anh</span></span><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Mái rơm mái rạ của Hà Lan" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/holland-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<span style="margin: 0px; padding: 0px; font-size: 10pt; "><span style="margin: 0px; padding: 0px; font-family: Tahoma; ">M&aacute;i rơm m&aacute;i rạ của H&agrave; Lan</span></span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<img alt="Một nếp nhà xinh của Ireland" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/ireland-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		<span style="margin: 0px; padding: 0px; font-family: Tahoma; font-size: 10pt; ">Một nếp nh&agrave; xinh của Ireland</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; font-family: Tahoma; font-size: 10pt; "><img alt="Mái gianh của Nhật luôn vút cao" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/japanese-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		M&aacute;i gianh của Nhật lu&ocirc;n v&uacute;t cao</span></p>\r\n	<p style="margin: 13.800000190734863px 0px; padding: 0px; font-size: 12pt; text-align: center; ">\r\n		<span style="margin: 0px; padding: 0px; font-family: Tahoma; font-size: 10pt; "><img alt="Mái gianh ở một vùng quê Hàn Quốc" src="http://dantri4.vcmedia.vn/a3HWDOlTcvMNT73KRccc/Image/2012/10/korean-4b231.jpg" style="margin: 0px; padding: 0px; " /><br style="margin: 0px; padding: 0px; " />\r\n		<br style="margin: 0px; padding: 0px; " />\r\n		M&aacute;i gianh ở một v&ugrave;ng qu&ecirc; H&agrave;n Quốc</span></p>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', 'Thế giới đẹp lãng mạn với những... mái nhà tranh', 'Nhà lợp mái rơm mái rạ là một “đặc sản” kiến trúc của vùng quê, không chỉ một thời phổ biến ở Việt Nam mà hiện nay, tại nhiều vùng nông thôn trên khắp thế giới, mái gianh vẫn được sử dụng như một lối kiến trúc cổ điển đầy lãng mạn.', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 0, 'the-gioi-dp-lang-man-voi-nhang-mai-nha-tranh', 0, 'post', '', 0, 0),
(11, 0, '2012-10-13 09:07:59', '2012-10-14 17:47:53', '<p>\r\n	&nbsp;</p>\r\n<div>\r\n	Trong bối cảnh gi&aacute; v&agrave;ng li&ecirc;n tục biến động, l&atilde;i suất tiền gửi cao nhất 13%/năm, gửi tiết kiệm VNĐ liệu c&oacute; mức sinh lời cao hơn so với việc nắm giữ v&agrave;ng?</div>\r\n<div>\r\n	&nbsp;</div>\r\n<div align="center">\r\n	<div itemtype="http://schema.org/ImageObject">\r\n		<img _fl="" align="middle" alt="Dài hạn, VNĐ lợi hơn" src="http://dantri4.vcmedia.vn/L6citQa4PR6kuP9vPSuL/Image/2012/10/giavang1210-23085.jpg" width="450" /></div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>D&agrave;i hạn, VNĐ lợi hơn</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	&Ocirc;ng T.C.T (quận Ph&uacute; Nhuận - TPHCM) cho biết: &ldquo;Th&aacute;ng 9/2011, t&ocirc;i mua 4 lượng v&agrave;ng với gi&aacute; 44,8 triệu đồng/lượng. Đến đầu th&aacute;ng 10/2012, v&agrave;ng l&ecirc;n 47,8 triệu đồng/lượng, t&ocirc;i b&aacute;n ra, l&atilde;i 3 triệu đồng/lượng. Thế nhưng, với 44,8 triệu đồng, nếu gửi tiết kiệm (cuối th&aacute;ng 9/2011, l&atilde;i suất tiền gửi l&agrave; 14%/năm) th&igrave; t&ocirc;i đ&atilde; c&oacute; hơn 6 triệu đồng tiền lời, cao gấp đ&ocirc;i so với đầu tư v&agrave;ng&rdquo;.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Trong khi đ&oacute;, th&aacute;ng 7/2012, anh Trần Văn Thịnh (quận G&ograve; Vấp - TPHCM) mua 2 lượng v&agrave;ng với gi&aacute; 41,3 triệu đồng/lượng rồi b&aacute;n khi v&agrave;ng l&ecirc;n 45,5 triệu đồng/lượng. &ldquo;T&iacute;nh ra,&nbsp;&nbsp;t&ocirc;i lời được 4,2&nbsp;&nbsp;triệu đồng/lượng, cao hơn rất nhiều so với việc gửi tiền v&agrave;o ng&acirc;n h&agrave;ng (NH)&rdquo; - anh Thịnh cho biết.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Như vậy, đối với người đ&atilde; &ldquo;&ocirc;m&rdquo; v&agrave;ng c&aacute;ch đ&acirc;y một năm (d&agrave;i hạn), mức sinh lời kh&ocirc;ng bằng gửi tiết kiệm VNĐ. D&ugrave; gi&aacute; v&agrave;ng từ đầu năm 2012 đến nay đ&atilde; tăng 13%, người nắm giữ v&agrave;ng trong v&agrave;i th&aacute;ng gần đ&acirc;y (ngắn hạn) rồi b&aacute;n th&igrave; thắng lớn.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo giới kinh doanh v&agrave;ng, người c&oacute; vốn nh&agrave;n rỗi phải theo d&otilde;i diễn biến thị trường v&agrave;ng trong v&agrave; ngo&agrave;i nước, t&igrave;m hiểu c&aacute;c yếu tố kh&aacute;c t&aacute;c động đến gi&aacute; v&agrave;ng, chọn lựa thời điểm th&iacute;ch hợp nhảy v&agrave;o rồi tho&aacute;t ra thị trường may ra mới th&agrave;nh c&ocirc;ng. Bởi, chỉ trong một thời gian ngắn, gi&aacute; v&agrave;ng biến động v&agrave;i triệu đồng/lượng l&agrave; chuyện b&igrave;nh thường. Đơn cử, hơn 1 th&aacute;ng qua, gi&aacute; v&agrave;ng đ&atilde; tăng 3 triệu đồng/lượng, từ 45,1 triệu đồng/lượng l&ecirc;n 48,1 triệu đồng/lượng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	<strong>Ng&acirc;n h&agrave;ng Nh&agrave; nước khuyến kh&iacute;ch b&aacute;n v&agrave;ng</strong></p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Hiện nay, với số tiền gần 50 triệu đồng, người d&acirc;n gửi tiết kiệm kỳ hạn 12 th&aacute;ng, rồi chọn kỳ l&atilde;nh l&atilde;i 3 th&aacute;ng/lần sẽ c&oacute; được mức sinh lời 3%, tức khoảng 1,5 triệu đồng. Cũng với số tiền đ&oacute;, nếu mua tr&ecirc;n 1 lượng v&agrave;ng th&igrave;&nbsp;từ nay đến cuối năm 2012, gi&aacute; v&agrave;ng phải tăng hơn 1,5 triệu đồng/lượng (tr&ecirc;n 3%) mới c&oacute; mức sinh lời cao hơn gửi tiết kiệm, ngược lại sẽ thua lỗ.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo đại diện C&ocirc;ng ty V&agrave;ng Vi Na, do nhu cầu v&agrave;ng cho lễ hội, Tết Nguy&ecirc;n đ&aacute;n tại c&aacute;c quốc gia ch&acirc;u &Aacute; rất cao n&ecirc;n gi&aacute; v&agrave;ng v&agrave;o thời điểm cuối năm thường đi l&ecirc;n.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Thế nhưng, &ocirc;ng Nguyễn C&ocirc;ng Tường, Ph&oacute; Ph&ograve;ng Kinh doanh C&ocirc;ng ty V&agrave;ng bạc Đ&aacute; qu&yacute; S&agrave;i G&ograve;n, cho rằng ngo&agrave;i yếu tố gi&aacute; v&agrave;ng thế giới v&agrave; sức mua b&aacute;n thị trường nội địa, rủi ro lớn nhất của người nắm giữ v&agrave;ng l&uacute;c n&agrave;y l&agrave; gi&aacute; trong nước cao hơn thế giới 3 triệu đồng/lượng. Từ nay đến cuối năm 2012, chỉ cần NH Nh&agrave; nước c&oacute; ch&iacute;nh s&aacute;ch can thiệp thị trường th&igrave; gi&aacute; v&agrave;ng trong nước sẽ giảm mạnh.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Theo giới ph&acirc;n t&iacute;ch, từ cuối th&aacute;ng 8/2012 đến nay, thị trường v&agrave;ng n&oacute;ng sốt chủ yếu do t&aacute;c động từ gi&aacute; v&agrave;ng thế giới v&agrave; sức mua từ c&aacute;c NH thương mại. Hơn 1 th&aacute;ng qua, gi&aacute; v&agrave;ng thế giới đ&atilde; tăng tr&ecirc;n 5% v&agrave; dự b&aacute;o kh&oacute; vượt qua mức cản 1.800 USD/ounce (hiện dao động quanh mức 1.760 USD/ounce), giới đầu tư quốc tế sẽ ồ ạt b&aacute;n ra. Tại Việt&nbsp;Nam, ng&agrave;y 25/11 tới đ&acirc;y, c&aacute;c NH sẽ chấm dứt việc huy động v&agrave;ng.</p>\r\n<p>\r\n	&nbsp;</p>\r\n<p>\r\n	Một l&atilde;nh đạo của NH Nh&agrave; nước cho biết: Định hướng của NH Nh&agrave; nước l&agrave; sẽ &aacute;p dụng nhiều biện ph&aacute;p kinh tế để khuyến kh&iacute;ch người d&acirc;n b&aacute;n v&agrave;ng, c&ograve;n c&aacute;c NH thương mại tiến tới giữ hộ v&agrave;ng c&oacute; thu ph&iacute;.Từ đ&oacute;, t&igrave;nh trạng nắm giữ v&agrave;ng sẽ giảm dần, tạo điều kiện tăng th&ecirc;m nguồn cung k&eacute;o giảm gi&aacute; v&agrave;ng trong nước l&ugrave;i về s&aacute;t gi&aacute; thế giới.</p>\r\n', 'Không nên “ôm” vàng', 'Chỉ cần Ngân hàng Nhà nước can thiệp thị trường, giá vàng trong nước sẽ giảm mạnh, người giữ vàng sẽ gặp rủi ro', 'publish', 'open', 'open', '', '', '', '', '2012-10-14 19:25:44', '0000-00-00 00:00:00', '', 0, 'khong-nen-om-vang-', 0, 'post', '', 0, 0),
(13, 0, '2012-10-15 17:09:56', '2012-10-15 17:09:38', '<p>\r\n	Theo b&aacute;o c&aacute;o NetCitizens Việt Nam 2011 do h&atilde;ng Cimigo vừa c&ocirc;ng bố, Việt Nam c&oacute; khoảng 26,8 triệu người đang sử dụng Internet, với tỷ lệ 31% d&acirc;n số. V&agrave;&nbsp;tỷ lệ người sử dụng Internet tại nước ta đang c&oacute; tốc độ tăng trưởng nhanh nhất trong khu vực. <em>Theo viettinnhanh.net</em></p>\r\n', 'Bạn đã biết chưa ?', 'Bạn đã biết chưa ?', 'publish', 'open', 'open', '', '', '', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 12, 'ban-da-biet-chua-', 0, 'page', '', 0, 0);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

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
(18, 'Bảng giá hosting', 'bng-gia-hosting', 0),
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
(35, 'Tag mới', 'tag-moi-1', 0),
(36, 'Tag mới', 'tag-moi-2', 0),
(37, 'abc', 'abc', 0);

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
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=119 ;

--
-- Dumping data for table `hd_term_taxonomies_posts`
--

INSERT INTO `hd_term_taxonomies_posts` (`id`, `post_id`, `term_taxonomy_id`, `term_order`) VALUES
(4, 2, 12, 0),
(3, 2, 8, 0),
(5, 3, 9, 0),
(6, 3, 12, 0),
(7, 4, 8, 0),
(8, 4, 9, 0),
(9, 4, 12, 0),
(10, 5, 8, 0),
(11, 5, 9, 0),
(21, 7, 9, 0),
(20, 7, 7, 0),
(71, 6, 10, 0),
(70, 6, 9, 0),
(63, 8, 7, 0),
(23, 9, 7, 0),
(24, 9, 9, 0),
(25, 9, 13, 0),
(26, 9, 15, 0),
(27, 9, 27, 0),
(28, 10, 9, 0),
(29, 10, 20, 0),
(30, 10, 28, 0),
(62, 11, 30, 0),
(61, 11, 27, 0),
(60, 11, 23, 0),
(59, 11, 16, 0),
(58, 11, 12, 0),
(57, 11, 8, 0),
(64, 8, 9, 0),
(65, 8, 16, 0),
(66, 8, 17, 0),
(67, 8, 18, 0),
(68, 8, 21, 0),
(69, 8, 29, 0),
(72, 6, 18, 0),
(73, 6, 23, 0),
(74, 6, 30, 0);

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
