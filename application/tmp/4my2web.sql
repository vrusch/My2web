SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE `4m2w_answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `4m2w_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `4m2w_company_group` (
  `name_of_group` varchar(120) COLLATE utf8_bin NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

CREATE TABLE `4m2w_course` (
  `id` int(11) NOT NULL,
  `name` varchar(128) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `theme` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `4m2w_lectures` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `theme` int(11) DEFAULT NULL,
  `lecture` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `4m2w_mkb` (
  `mkb_username` varchar(24) NOT NULL,
  `mkb_email` varchar(160) NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `activation` int(10) NOT NULL,
  `activation_send` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

CREATE TABLE `4m2w_news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `4m2w_questions` (
  `id` int(11) NOT NULL,
  `question` varchar(128) NOT NULL,
  `true_id_answer` int(11) NOT NULL,
  `false1_id_answer` int(11) NOT NULL,
  `false2_id_answer` int(11) NOT NULL,
  `false3_id_answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `4m2w_rel_course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `questions_id` int(11) DEFAULT NULL,
  `lectures_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `4m2w_students` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_zak__id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

CREATE TABLE `4m2w_theme` (
  `id` int(11) NOT NULL,
  `theme` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `a3m_account` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(24) NOT NULL,
  `email` varchar(160) NOT NULL,
  `password` varchar(60) DEFAULT NULL,
  `createdon` datetime NOT NULL,
  `verifiedon` datetime DEFAULT NULL,
  `lastsignedinon` datetime DEFAULT NULL,
  `resetsenton` datetime DEFAULT NULL,
  `deletedon` datetime DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


ALTER TABLE `4m2w_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

ALTER TABLE `4m2w_companies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_course`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_lectures`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_mkb`
  ADD UNIQUE KEY `mkb_username` (`mkb_username`),
  ADD UNIQUE KEY `mkb_email` (`mkb_email`),
  ADD UNIQUE KEY `user_id` (`user_id`);

ALTER TABLE `4m2w_news`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_rel_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`course_id`);

ALTER TABLE `4m2w_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_zak__id` (`user_zak__id`);

ALTER TABLE `a3m_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);


ALTER TABLE `4m2w_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_rel_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `a3m_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;


ALTER TABLE `4m2w_rel_course`
  ADD CONSTRAINT `4m2w_rel_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `4m2w_course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
