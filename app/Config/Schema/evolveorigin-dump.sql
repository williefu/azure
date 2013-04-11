# ************************************************************
# Sequel Pro SQL dump
# Version 4004
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: 127.0.0.1 (MySQL 5.5.25)
# Database: evolveorigin
# Generation Time: 2013-04-11 00:47:42 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table login_tokens
# ------------------------------------------------------------

DROP TABLE IF EXISTS `login_tokens`;

CREATE TABLE `login_tokens` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `token` char(32) NOT NULL,
  `duration` varchar(32) NOT NULL,
  `used` tinyint(1) NOT NULL DEFAULT '0',
  `created` datetime NOT NULL,
  `expires` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `login_tokens` WRITE;
/*!40000 ALTER TABLE `login_tokens` DISABLE KEYS */;

INSERT INTO `login_tokens` (`id`, `user_id`, `token`, `duration`, `used`, `created`, `expires`)
VALUES
	(4,2,'9326090b485b1de704b59508d7a5278c','2 weeks',0,'2013-03-15 20:19:48','2013-03-29 20:19:48'),
	(28,0,'dba5b9b110f393ba381f094d9b16ba92','2 weeks',0,'2013-03-24 22:28:46','2013-04-07 22:28:46'),
	(32,0,'545a063f3f28ebda0992e7e853612f9d','2 weeks',0,'2013-03-25 19:47:21','2013-04-08 19:47:21'),
	(76,1,'d702c0a8b7d640eb20245f1fe93b9f14','2 weeks',0,'2013-04-10 17:43:45','2013-04-24 17:43:45'),
	(75,1,'dea84a680837b20a8bbb8a494f8702d4','2 weeks',0,'2013-04-10 17:05:44','2013-04-24 17:05:44'),
	(74,1,'652b431840c31e43a35339e2ded54d8f','2 weeks',1,'2013-04-10 15:53:56','2013-04-24 15:53:56'),
	(73,1,'ad4af51eeafab5b4d82acee186d7a7a3','2 weeks',0,'2013-04-10 14:19:09','2013-04-24 14:19:09'),
	(72,1,'5fe9b2dc7cd1c32dc094bb7ff14ca04c','2 weeks',1,'2013-04-10 11:49:51','2013-04-24 11:49:51'),
	(71,1,'127633e795680ba8ddea035daa2f133f','2 weeks',1,'2013-04-10 10:28:41','2013-04-24 10:28:41'),
	(70,0,'21252aeee25aae5623f5209bff40b903','2 weeks',0,'2013-04-09 21:21:40','2013-04-23 21:21:40'),
	(69,0,'85414b0c42f0b53be38b8f3a3f251166','2 weeks',0,'2013-04-09 21:21:40','2013-04-23 21:21:40'),
	(68,1,'3598e6d82fbefefb1da44d87bdfdacdc','2 weeks',1,'2013-04-09 21:15:24','2013-04-23 21:15:24'),
	(67,0,'4c0f79e78d1e97e464d727fac1c56c6d','2 weeks',0,'2013-04-09 14:40:02','2013-04-23 14:40:02'),
	(66,1,'d787eb4ed8095b18781d6e49054b134c','2 weeks',1,'2013-04-09 14:20:15','2013-04-23 14:20:15'),
	(65,1,'fb94dee51f5c352a57d90b99e53531df','2 weeks',1,'2013-04-09 10:21:29','2013-04-23 10:21:29'),
	(46,0,'2312d724eb6560f2b9730973acc30beb','2 weeks',0,'2013-04-04 22:16:40','2013-04-18 22:16:40'),
	(47,0,'e74abac12789f2cd6b30a61891b79e66','2 weeks',0,'2013-04-04 22:16:40','2013-04-18 22:16:40'),
	(64,1,'605ebc1ee58c883ef7a6eb77f0bfa46a','2 weeks',1,'2013-04-09 10:20:08','2013-04-23 10:20:08'),
	(63,1,'1e2d3c522960cdaab80fc03d08aeddac','2 weeks',1,'2013-04-08 20:36:53','2013-04-22 20:36:53'),
	(62,1,'3bcd1f33ac6902869518c1cf6e719917','2 weeks',1,'2013-04-08 16:29:50','2013-04-22 16:29:50'),
	(61,1,'311a86998442c49b0a51a8d6e3513fef','2 weeks',1,'2013-04-08 14:21:19','2013-04-22 14:21:19'),
	(52,7,'093763684ce2cb5d8511e881f9d68370','2 weeks',0,'2013-04-07 01:00:42','2013-04-21 01:00:42'),
	(53,7,'683b655cfc7e11adc00b681afc136452','2 weeks',0,'2013-04-07 01:03:47','2013-04-21 01:03:47'),
	(60,1,'5b418363a2a39dfd7a1bc1a3addf3f89','2 weeks',1,'2013-04-08 11:49:33','2013-04-22 11:49:33'),
	(55,7,'f09c12e7e3956af76f4999a6714f76a5','2 weeks',0,'2013-04-07 16:52:50','2013-04-21 16:52:50'),
	(56,7,'ca58200481b642dc465ca0f8c018af3d','2 weeks',0,'2013-04-07 16:53:23','2013-04-21 16:53:23'),
	(57,7,'a374a1ebf82be900b946b6bb551553ef','2 weeks',0,'2013-04-07 17:14:07','2013-04-21 17:14:07'),
	(59,1,'353e606fa9b94eaada868357b610f63f','2 weeks',1,'2013-04-08 10:10:19','2013-04-22 10:10:19');

/*!40000 ALTER TABLE `login_tokens` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_desktop_initial_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_desktop_initial_contents`;

CREATE TABLE `origin_ad_desktop_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ad_desktop_initial_contents` WRITE;
/*!40000 ALTER TABLE `origin_ad_desktop_initial_contents` DISABLE KEYS */;

INSERT INTO `origin_ad_desktop_initial_contents` (`id`, `origin_ad_schedule_id`, `content`, `config`, `render`, `order`)
VALUES
	(15,1,'{\"type\":\"toggle\",\"title\":\"Toggle\",\"event\":true}','{\"height\":\"32px\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"32px\"}','<a class=\"cta toggle\" data-trigger=\"click\" <%=style%>></a>',2),
	(16,1,'{\"type\":\"embed\",\"title\":\"Embed\"}','{\"height\":\"32px\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"32px\"}',NULL,0),
	(17,1,'{\"type\":\"link\",\"title\":\"Link\",\"event\":true,\"link\":\"http:\\/\\/www.google.com\"}','{\"height\":\"32px\",\"left\":\"0px\",\"top\":\"0px\",\"width\":\"32px\"}','<a href=\"http://www.google.com\" class=\"cta toggle\" data-trigger=\"click\" <%=style%>></a>',1);

/*!40000 ALTER TABLE `origin_ad_desktop_initial_contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_desktop_triggered_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_desktop_triggered_contents`;

CREATE TABLE `origin_ad_desktop_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ad_desktop_triggered_contents` WRITE;
/*!40000 ALTER TABLE `origin_ad_desktop_triggered_contents` DISABLE KEYS */;

INSERT INTO `origin_ad_desktop_triggered_contents` (`id`, `origin_ad_schedule_id`, `content`, `config`, `render`, `order`)
VALUES
	(2,1,'{\"test\":\"test content-triggered\"}','{\"testConfig\":\"Test Config-b\"}',NULL,NULL);

/*!40000 ALTER TABLE `origin_ad_desktop_triggered_contents` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_mobile_initial_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_mobile_initial_contents`;

CREATE TABLE `origin_ad_mobile_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ad_mobile_triggered_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_mobile_triggered_contents`;

CREATE TABLE `origin_ad_mobile_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ad_schedules
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_schedules`;

CREATE TABLE `origin_ad_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_id` int(11) NOT NULL,
  `config` text,
  `type` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ad_schedules` WRITE;
/*!40000 ALTER TABLE `origin_ad_schedules` DISABLE KEYS */;

INSERT INTO `origin_ad_schedules` (`id`, `origin_ad_id`, `config`, `type`, `start_date`, `end_date`)
VALUES
	(1,1,NULL,'',NULL,NULL),
	(3,1,'','','2013-01-01','2014-01-01'),
	(4,11,NULL,'',NULL,NULL);

/*!40000 ALTER TABLE `origin_ad_schedules` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_ad_tablet_initial_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_tablet_initial_contents`;

CREATE TABLE `origin_ad_tablet_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ad_tablet_triggered_contents
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ad_tablet_triggered_contents`;

CREATE TABLE `origin_ad_tablet_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  `order` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table origin_ads
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_ads`;

CREATE TABLE `origin_ads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `config` varchar(255) DEFAULT '',
  `content` text,
  `create_by` int(11) NOT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `origin_ads` WRITE;
/*!40000 ALTER TABLE `origin_ads` DISABLE KEYS */;

INSERT INTO `origin_ads` (`id`, `name`, `config`, `content`, `create_by`, `modify_by`, `create_date`, `modify_date`, `status`)
VALUES
	(1,'Test Unit','{\"name\":\"Horizon\",\"type_alias\":\"horizon\",\"type_id\":\"1\",\"ga\":\"UA-12310597-3\",\"bgHex\":\"#ffffff\",\"initial_desktop\":\"initial.jpg\",\"triggered_desktop\":\"triggered.jpg\"}',NULL,1,1,'2013-03-06 22:24:15','0000-00-00 00:00:00',1),
	(11,'sadasdasdsad','{\"name\":\"sadasdasdsad\",\"type_alias\":\"eclipse\",\"type_id\":\"22\"}',NULL,1,1,'2013-03-28 23:57:02','2013-03-29 02:57:02',1);

/*!40000 ALTER TABLE `origin_ads` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_components
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_components`;

CREATE TABLE `origin_components` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias` varchar(100) DEFAULT NULL,
  `group` varchar(100) DEFAULT NULL,
  `content` text,
  `config` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `origin_components` WRITE;
/*!40000 ALTER TABLE `origin_components` DISABLE KEYS */;

INSERT INTO `origin_components` (`id`, `name`, `alias`, `group`, `content`, `config`, `create_date`, `modify_date`, `create_by`, `modify_by`, `status`)
VALUES
	(1,'Embed','embed','embed','{\"alias\":\"embed\",\"description\":\"Embed code\"}','{\"img_icon\":\"\\/assets\\/components\\/embed.png\",\"group\":\"embed\"}','2013-03-28 23:10:31','2013-04-09 16:23:40',1,1,1),
	(3,'Link','link','link','{\"alias\":\"link\",\"description\":\"Click-out link\"}','{\"img_icon\":\"\\/assets\\/components\\/link.png\",\"group\":\"link\"}','2013-04-07 21:45:18','2013-04-10 17:40:11',1,1,1),
	(4,'Toggle','toggle','cta','{\"description\":\"Switch between initial and triggered state.\"}','{\"img_icon\":\"\\/assets\\/components\\/toggle.png\",\"group\":\"cta\"}','2013-04-07 21:45:51','2013-04-10 17:40:05',1,1,1),
	(5,'Image','image','media','{\"description\":\"Image\"}','{\"img_icon\":\"\\/assets\\/components\\/image.png\",\"group\":\"media\"}','2013-04-08 15:45:06','2013-04-08 15:45:06',1,1,1),
	(7,'DoubleClick Link','dfp-link','link','{\"description\":\"DoubleClick pass-thru link.\"}','{\"group\":\"link\",\"img_icon\":\"\\/assets\\/components\\/dc.png\"}','2013-04-10 11:25:22','2013-04-10 11:25:22',1,1,1);

/*!40000 ALTER TABLE `origin_components` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table origin_templates
# ------------------------------------------------------------

DROP TABLE IF EXISTS `origin_templates`;

CREATE TABLE `origin_templates` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `content` text,
  `config` text,
  `create_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_date` timestamp NULL DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `modify_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `origin_templates` WRITE;
/*!40000 ALTER TABLE `origin_templates` DISABLE KEYS */;

INSERT INTO `origin_templates` (`id`, `name`, `content`, `config`, `create_date`, `modify_date`, `create_by`, `modify_by`, `status`)
VALUES
	(1,'Horizon','{\"alias\":\"horizon\",\"description\":\"Horizon description....\",\"file_storyboard\":\"\\/assets\\/templates\\/horizon.png\",\"file_specs\":\"\",\"file_logo\":\"\"}','{\"dimensions\":{\"Initial\":{\"Desktop\":{\"width\":\"1500\",\"height\":\"66\"},\"Tablet\":[],\"Mobile\":[]},\"Triggered\":{\"Desktop\":{\"width\":\"1500\",\"height\":\"415\"},\"Tablet\":[],\"Mobile\":[]}},\"animation\":[],\"animations\":{\"start\":\"0\",\"end\":\"415\",\"duration\":\"200\"}}','2013-03-20 12:16:57','2013-04-04 22:34:26',1,1,1),
	(10,'Overlay','{\"alias\":\"nova\",\"description\":\"Nova description\",\"file_storyboard\":\"\\/assets\\/templates\\/nova.png\",\"file_specs\":\"\",\"file_logo\":\"\"}','{\"dimensions\":{\"Initial\":{\"Desktop\":{\"height\":\"300\",\"width\":\"250\"}},\"Triggered\":{\"Desktop\":{\"height\":\"950\",\"width\":\"550\"}}},\"animations\":{\"start\":\"0\",\"end\":\"0\",\"duration\":\"0\"}}','2013-03-20 17:09:06','2013-04-04 22:32:00',1,1,1),
	(22,'Eclipse','{\"alias\":\"eclipse\",\"description\":\"Eclipse description\",\"file_storyboard\":\"/assets/templates/nova.png\",\"file_specs\":\"\",\"file_logo\":\"\"}',NULL,'2013-03-20 17:09:06','2013-03-22 02:03:46',1,1,1);

/*!40000 ALTER TABLE `origin_templates` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_group_permissions
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_group_permissions`;

CREATE TABLE `user_group_permissions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_group_id` int(10) unsigned NOT NULL,
  `controller` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `action` varchar(100) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `allowed` tinyint(1) unsigned NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_group_permissions` WRITE;
/*!40000 ALTER TABLE `user_group_permissions` DISABLE KEYS */;

INSERT INTO `user_group_permissions` (`id`, `user_group_id`, `controller`, `action`, `allowed`)
VALUES
	(1,1,'Pages','display',1),
	(2,2,'Pages','display',1),
	(3,3,'Pages','display',1),
	(4,1,'UserGroupPermissions','index',1),
	(5,2,'UserGroupPermissions','index',0),
	(6,3,'UserGroupPermissions','index',0),
	(7,1,'UserGroupPermissions','update',1),
	(8,2,'UserGroupPermissions','update',0),
	(9,3,'UserGroupPermissions','update',0),
	(10,1,'UserGroups','index',1),
	(11,2,'UserGroups','index',0),
	(12,3,'UserGroups','index',0),
	(13,1,'UserGroups','addGroup',1),
	(14,2,'UserGroups','addGroup',0),
	(15,3,'UserGroups','addGroup',0),
	(16,1,'UserGroups','editGroup',1),
	(17,2,'UserGroups','editGroup',0),
	(18,3,'UserGroups','editGroup',0),
	(19,1,'UserGroups','deleteGroup',1),
	(20,2,'UserGroups','deleteGroup',0),
	(21,3,'UserGroups','deleteGroup',0),
	(22,1,'Users','index',1),
	(23,2,'Users','index',1),
	(24,3,'Users','index',0),
	(25,1,'Users','viewUser',1),
	(26,2,'Users','viewUser',0),
	(27,3,'Users','viewUser',0),
	(28,1,'Users','myprofile',1),
	(29,2,'Users','myprofile',1),
	(30,3,'Users','myprofile',0),
	(31,1,'Users','login',1),
	(32,2,'Users','login',1),
	(33,3,'Users','login',1),
	(34,1,'Users','logout',1),
	(35,2,'Users','logout',1),
	(36,3,'Users','logout',1),
	(37,1,'Users','register',1),
	(38,2,'Users','register',1),
	(39,3,'Users','register',1),
	(40,1,'Users','changePassword',1),
	(41,2,'Users','changePassword',1),
	(42,3,'Users','changePassword',0),
	(43,1,'Users','changeUserPassword',1),
	(44,2,'Users','changeUserPassword',0),
	(45,3,'Users','changeUserPassword',0),
	(46,1,'Users','addUser',1),
	(47,2,'Users','addUser',0),
	(48,3,'Users','addUser',0),
	(49,1,'Users','editUser',1),
	(50,2,'Users','editUser',0),
	(51,3,'Users','editUser',0),
	(52,1,'Users','dashboard',1),
	(53,2,'Users','dashboard',1),
	(54,3,'Users','dashboard',0),
	(55,1,'Users','deleteUser',1),
	(56,2,'Users','deleteUser',0),
	(57,3,'Users','deleteUser',0),
	(58,1,'Users','makeActive',1),
	(59,2,'Users','makeActive',0),
	(60,3,'Users','makeActive',0),
	(61,1,'Users','accessDenied',1),
	(62,2,'Users','accessDenied',1),
	(63,3,'Users','accessDenied',1),
	(64,1,'Users','userVerification',1),
	(65,2,'Users','userVerification',1),
	(66,3,'Users','userVerification',1),
	(67,1,'Users','forgotPassword',1),
	(68,2,'Users','forgotPassword',1),
	(69,3,'Users','forgotPassword',1),
	(70,1,'Users','makeActiveInactive',1),
	(71,2,'Users','makeActiveInactive',0),
	(72,3,'Users','makeActiveInactive',0),
	(73,1,'Users','verifyEmail',1),
	(74,2,'Users','verifyEmail',0),
	(75,3,'Users','verifyEmail',0),
	(76,1,'Users','activatePassword',1),
	(77,2,'Users','activatePassword',1),
	(78,3,'Users','activatePassword',1),
	(79,1,'Creator','index',1),
	(80,2,'Creator','index',1),
	(81,3,'Creator','index',0),
	(82,1,'Origin','index',1),
	(83,2,'Origin','index',1),
	(84,3,'Origin','index',0),
	(85,1,'Creator','jsonList',1),
	(86,2,'Creator','jsonList',1),
	(87,3,'Creator','jsonList',1),
	(88,1,'Creator','edit',1),
	(89,2,'Creator','edit',1),
	(90,3,'Creator','edit',0),
	(91,1,'Creator','adList',1),
	(92,2,'Creator','adList',0),
	(93,3,'Creator','adList',0),
	(94,1,'Origin','templateList',0),
	(95,2,'Origin','templateList',0),
	(96,3,'Origin','templateList',0),
	(97,4,'Origin','templateList',0),
	(98,4,'Users','index',0);

/*!40000 ALTER TABLE `user_group_permissions` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_groups
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_groups`;

CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `alias_name` varchar(100) DEFAULT NULL,
  `allowRegistration` int(1) NOT NULL DEFAULT '1',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_groups` WRITE;
/*!40000 ALTER TABLE `user_groups` DISABLE KEYS */;

INSERT INTO `user_groups` (`id`, `name`, `alias_name`, `allowRegistration`, `created`, `modified`)
VALUES
	(1,'System Administrator','superadmin',0,'2013-01-18 16:07:52','2013-03-20 19:37:28'),
	(2,'Developers','developers',0,'2013-01-18 16:07:52','2013-03-15 20:13:16'),
	(3,'Guest','Guest',0,'2013-01-18 16:07:52','2013-01-18 16:07:52'),
	(4,'Analytics','Analytics',1,'2013-03-15 20:13:49','2013-03-15 20:13:49'),
	(5,'Designers','designers',1,'2013-04-07 15:56:03','2013-04-07 15:56:03');

/*!40000 ALTER TABLE `user_groups` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_group_id` int(11) unsigned DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `salt` text,
  `email` varchar(100) DEFAULT NULL,
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email_verified` int(1) DEFAULT '0',
  `active` int(1) NOT NULL DEFAULT '0',
  `ip_address` varchar(50) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user` (`username`),
  KEY `mail` (`email`),
  KEY `users_FKIndex1` (`user_group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;

INSERT INTO `users` (`id`, `user_group_id`, `username`, `password`, `salt`, `email`, `first_name`, `last_name`, `email_verified`, `active`, `ip_address`, `created`, `modified`)
VALUES
	(1,1,'admin','b2fb79d2c626c626fe20a6f0935f8610','1ec19cc78624d8d4e7ec2e53c889666c','admin@admin.com','Admin','',1,1,'','2013-01-18 16:07:52','2013-04-07 20:07:24'),
	(7,1,'willie.fu','f5fc91aa032aee8bbd9c86bcb6faaded','4b06a421ea9a66548f35a3edb17d1f82','willie.fu@gmail.com','Willie','Fu',1,1,NULL,'2013-04-05 18:05:01','2013-04-07 18:45:15');

/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
