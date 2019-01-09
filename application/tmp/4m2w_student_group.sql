-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 09, 2019 at 11:41 PM
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
-- Table structure for table `4m2w_student_group`
--

CREATE TABLE `4m2w_student_group` (
  `student_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- RELATIONSHIPS FOR TABLE `4m2w_student_group`:
--

--
-- Truncate table before insert `4m2w_student_group`
--

TRUNCATE TABLE `4m2w_student_group`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `4m2w_student_group`
--
ALTER TABLE `4m2w_student_group`
  ADD PRIMARY KEY (`student_id`,`group_id`),
  ADD KEY `student_id` (`student_id`,`group_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
