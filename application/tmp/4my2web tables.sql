DROP TABLE IF EXISTS `4m2w_answers`;
CREATE TABLE `4m2w_answers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `answer` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_companies`;
CREATE TABLE `4m2w_companies` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `status` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_company_group`;
CREATE TABLE `4m2w_company_group` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name_of_group` varchar(60) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_course`;
CREATE TABLE `4m2w_course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `theme` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_lectures`;
CREATE TABLE `4m2w_lectures` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(128) NOT NULL,
  `theme` int(11) DEFAULT NULL,
  `lecture` longtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_mkb`;
CREATE TABLE `4m2w_mkb` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `mkb_username` varchar(24) NOT NULL,
  `mkb_email` varchar(160) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `activation` int(10) NOT NULL,
  `activation_send` date NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_news`;
CREATE TABLE `4m2w_news` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_questions`;
CREATE TABLE `4m2w_questions` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(128) NOT NULL,
  `true_id_answer` bigint(20) NOT NULL,
  `false1_id_answer` bigint(20) NOT NULL,
  `false2_id_answer` bigint(20) NOT NULL,
  `false3_id_answer` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_rel_course`;
CREATE TABLE `4m2w_rel_course` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `course_id` bigint(20) NOT NULL,
  `questions_id` bigint(20) DEFAULT NULL,
  `lectures_id` bigint(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

DROP TABLE IF EXISTS `4m2w_students`;
CREATE TABLE `4m2w_students` (
  `company_id` bigint(20) NOT NULL,
  `user_zak__id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_theme`;
CREATE TABLE `4m2w_theme` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `theme` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC AUTO_INCREMENT=1;

