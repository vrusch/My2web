SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


DROP TABLE IF EXISTS `4m2w_answers`;
CREATE TABLE `4m2w_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_companies`;
CREATE TABLE `4m2w_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_company_group`;
CREATE TABLE `4m2w_company_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_group` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_company_quizzes`;
CREATE TABLE `4m2w_company_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_indiv_quizzes`;
CREATE TABLE `4m2w_indiv_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

DROP TABLE IF EXISTS `4m2w_lectures`;
CREATE TABLE `4m2w_lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `lecture` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_mkb`;
CREATE TABLE `4m2w_mkb` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `activation` int(10) NOT NULL,
  `activation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_news`;
CREATE TABLE `4m2w_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_questions`;
CREATE TABLE `4m2w_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(128) NOT NULL,
  `true_id_answer` bigint(20) NOT NULL,
  `false1_id_answer` bigint(20) NOT NULL,
  `false2_id_answer` bigint(20) NOT NULL,
  `false3_id_answer` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_quizzes`;
CREATE TABLE `4m2w_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

DROP TABLE IF EXISTS `4m2w_rel_quizz_lec`;
CREATE TABLE `4m2w_rel_quizz_lec` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `lecture_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `4m2w_rel_quizz_que`;
CREATE TABLE `4m2w_rel_quizz_que` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `4m2w_students`;
CREATE TABLE `4m2w_students` (
  `student_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `attribut` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;


ALTER TABLE `4m2w_answers`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_companies`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_company_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

ALTER TABLE `4m2w_company_quizzes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_indiv_quizzes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_lectures`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_mkb`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

ALTER TABLE `4m2w_news`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_questions`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_quizzes`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `4m2w_rel_quizz_lec`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizz_id` (`quizz_id`,`lecture_id`);

ALTER TABLE `4m2w_rel_quizz_que`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizz_id` (`quizz_id`,`question_id`);

ALTER TABLE `4m2w_students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `company_id` (`company_id`);


ALTER TABLE `4m2w_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_company_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_company_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_indiv_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_rel_quizz_lec`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE `4m2w_rel_quizz_que`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
