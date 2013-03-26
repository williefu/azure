-- Create syntax for TABLE 'origin_ad_desktop_initial_contents'
CREATE TABLE `origin_ad_desktop_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_desktop_triggered_contents'
CREATE TABLE `origin_ad_desktop_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_mobile_initial_contents'
CREATE TABLE `origin_ad_mobile_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_mobile_triggered_contents'
CREATE TABLE `origin_ad_mobile_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_schedules'
CREATE TABLE `origin_ad_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_id` int(11) NOT NULL,
  `config` text,
  `type` varchar(100) NOT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_tablet_initial_contents'
CREATE TABLE `origin_ad_tablet_initial_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_tablet_triggered_contents'
CREATE TABLE `origin_ad_tablet_triggered_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `origin_ad_schedule_id` int(11) NOT NULL,
  `content` text,
  `config` text,
  `render` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Create syntax for TABLE 'origin_ad_templates'
CREATE TABLE `origin_ad_templates` (
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

-- Create syntax for TABLE 'origin_ads'
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