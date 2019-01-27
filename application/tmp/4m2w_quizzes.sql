-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 27, 2019 at 10:53 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Table structure for table `4m2w_quizzes`
--

CREATE TABLE `4m2w_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `estimated_time` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- RELATIONSHIPS FOR TABLE `4m2w_quizzes`:
--

--
-- Truncate table before insert `4m2w_quizzes`
--

TRUNCATE TABLE `4m2w_quizzes`;
--
-- Dumping data for table `4m2w_quizzes`
--

INSERT INTO `4m2w_quizzes` (`id`, `name`, `estimated_time`) VALUES
(1, 'kviz bezpecnost prace prvy', '25'),
(2, 'este vetsia bezpecnost prace', '20'),
(3, 'kviz 1 gdpr', '15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `4m2w_quizzes`
--
ALTER TABLE `4m2w_quizzes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `4m2w_quizzes`
--
ALTER TABLE `4m2w_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
