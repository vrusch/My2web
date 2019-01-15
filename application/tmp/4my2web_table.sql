-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2019 at 03:18 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `4my2web`
--

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_answers`
--

DROP TABLE IF EXISTS `4m2w_answers`;
CREATE TABLE `4m2w_answers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `answer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_companies`
--

DROP TABLE IF EXISTS `4m2w_companies`;
CREATE TABLE `4m2w_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_company_group`
--

DROP TABLE IF EXISTS `4m2w_company_group`;
CREATE TABLE `4m2w_company_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_group` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_company_quizzes`
--

DROP TABLE IF EXISTS `4m2w_company_quizzes`;
CREATE TABLE `4m2w_company_quizzes` (
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) NOT NULL,
  `quiz_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_lectures`
--

DROP TABLE IF EXISTS `4m2w_lectures`;
CREATE TABLE `4m2w_lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `lecture` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_mkb`
--

DROP TABLE IF EXISTS `4m2w_mkb`;
CREATE TABLE `4m2w_mkb` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `activation` int(10) NOT NULL,
  `activation_date` date NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_news`
--

DROP TABLE IF EXISTS `4m2w_news`;
CREATE TABLE `4m2w_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_questions`
--

DROP TABLE IF EXISTS `4m2w_questions`;
CREATE TABLE `4m2w_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(128) NOT NULL,
  `true_id_answer` bigint(20) NOT NULL,
  `false1_id_answer` bigint(20) NOT NULL,
  `false2_id_answer` bigint(20) NOT NULL,
  `false3_id_answer` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_quizzes`
--

DROP TABLE IF EXISTS `4m2w_quizzes`;
CREATE TABLE `4m2w_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `theme_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_rel_quizz_lec`
--

DROP TABLE IF EXISTS `4m2w_rel_quizz_lec`;
CREATE TABLE `4m2w_rel_quizz_lec` (
  `quizz_id` bigint(20) NOT NULL,
  `lecture_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_rel_quizz_que`
--

DROP TABLE IF EXISTS `4m2w_rel_quizz_que`;
CREATE TABLE `4m2w_rel_quizz_que` (
  `quizz_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_students`
--

DROP TABLE IF EXISTS `4m2w_students`;
CREATE TABLE `4m2w_students` (
  `student_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `group_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_theme`
--

DROP TABLE IF EXISTS `4m2w_theme`;
CREATE TABLE `4m2w_theme` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `theme` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `a3m_account`
--

DROP TABLE IF EXISTS `a3m_account`;
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

-- --------------------------------------------------------

--
-- Table structure for table `a3m_account_details`
--

DROP TABLE IF EXISTS `a3m_account_details`;
CREATE TABLE `a3m_account_details` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `fullname` varchar(160) DEFAULT NULL,
  `firstname` varchar(80) DEFAULT NULL,
  `lastname` varchar(80) DEFAULT NULL,
  `dateofbirth` date DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `postalcode` varchar(40) DEFAULT NULL,
  `country` char(2) DEFAULT NULL,
  `language` char(2) DEFAULT NULL,
  `timezone` varchar(40) DEFAULT NULL,
  `citimezone` varchar(6) DEFAULT NULL,
  `picture` varchar(240) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- Table structure for table `a3m_acl_role`
--

DROP TABLE IF EXISTS `a3m_acl_role`;
CREATE TABLE `a3m_acl_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `a3m_rel_account_role`
--

DROP TABLE IF EXISTS `a3m_rel_account_role`;
CREATE TABLE `a3m_rel_account_role` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `4m2w_answers`
--
ALTER TABLE `4m2w_answers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_companies`
--
ALTER TABLE `4m2w_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_company_group`
--
ALTER TABLE `4m2w_company_group`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `4m2w_company_quizzes`
--
ALTER TABLE `4m2w_company_quizzes`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `company_id` (`company_id`,`group_id`,`quiz_id`);

--
-- Indexes for table `4m2w_lectures`
--
ALTER TABLE `4m2w_lectures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_mkb`
--
ALTER TABLE `4m2w_mkb`
  ADD PRIMARY KEY (`company_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `4m2w_news`
--
ALTER TABLE `4m2w_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_questions`
--
ALTER TABLE `4m2w_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_quizzes`
--
ALTER TABLE `4m2w_quizzes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_rel_quizz_lec`
--
ALTER TABLE `4m2w_rel_quizz_lec`
  ADD PRIMARY KEY (`quizz_id`),
  ADD KEY `quizz_id` (`quizz_id`,`lecture_id`);

--
-- Indexes for table `4m2w_rel_quizz_que`
--
ALTER TABLE `4m2w_rel_quizz_que`
  ADD PRIMARY KEY (`quizz_id`),
  ADD KEY `quizz_id` (`quizz_id`,`question_id`);

--
-- Indexes for table `4m2w_students`
--
ALTER TABLE `4m2w_students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indexes for table `4m2w_theme`
--
ALTER TABLE `4m2w_theme`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `a3m_account`
--
ALTER TABLE `a3m_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `a3m_account_details`
--
ALTER TABLE `a3m_account_details`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `a3m_acl_role`
--
ALTER TABLE `a3m_acl_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`name`);

--
-- Indexes for table `a3m_rel_account_role`
--
ALTER TABLE `a3m_rel_account_role`
  ADD PRIMARY KEY (`account_id`,`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `4m2w_answers`
--
ALTER TABLE `4m2w_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_companies`
--
ALTER TABLE `4m2w_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_company_group`
--
ALTER TABLE `4m2w_company_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_lectures`
--
ALTER TABLE `4m2w_lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_news`
--
ALTER TABLE `4m2w_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_questions`
--
ALTER TABLE `4m2w_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_quizzes`
--
ALTER TABLE `4m2w_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_theme`
--
ALTER TABLE `4m2w_theme`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a3m_account`
--
ALTER TABLE `a3m_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a3m_acl_role`
--
ALTER TABLE `a3m_acl_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
