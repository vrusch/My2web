-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 31, 2019 at 05:30 PM
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
-- Table structure for table `4m2w_rel_quizz_sequence`
--

DROP TABLE IF EXISTS `4m2w_rel_quizz_sequence`;
CREATE TABLE `4m2w_rel_quizz_sequence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `account_id` bigint(20) NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `sequence` longblob NOT NULL,
  `status` varchar(5) COLLATE utf32_bin NOT NULL,
  `date` date NOT NULL,
  `result` longblob,
  `bad_answers` longblob
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `4m2w_rel_quizz_sequence`
--
ALTER TABLE `4m2w_rel_quizz_sequence`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `4m2w_rel_quizz_sequence`
--
ALTER TABLE `4m2w_rel_quizz_sequence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
