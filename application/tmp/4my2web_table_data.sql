-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 28, 2019 at 09:31 PM
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

--
-- Truncate table before insert `4m2w_answers`
--

TRUNCATE TABLE `4m2w_answers`;
--
-- Dumping data for table `4m2w_answers`
--

INSERT INTO `4m2w_answers` (`id`, `answer`) VALUES
(1, 'ja'),
(2, 'on'),
(3, 'oni'),
(4, 'vsichni'),
(5, 'ja'),
(6, 'on'),
(7, 'oni'),
(8, 'vsichni'),
(9, 'bila'),
(10, 'cerna'),
(11, 'modra'),
(12, 'zelena'),
(13, 'cervena'),
(14, 'bila'),
(15, 'modra'),
(16, 'zelena');

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

--
-- Truncate table before insert `4m2w_companies`
--

TRUNCATE TABLE `4m2w_companies`;
--
-- Dumping data for table `4m2w_companies`
--

INSERT INTO `4m2w_companies` (`id`, `name`, `status`) VALUES
(10, 'IGISIS a.s.', NULL),
(11, 'FAMOS s.r.o.', NULL),
(12, 'Tysarrus s.r.o.', NULL),
(13, 'Blabol', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_company_assigned_quizzes`
--

DROP TABLE IF EXISTS `4m2w_company_assigned_quizzes`;
CREATE TABLE `4m2w_company_assigned_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_company_assigned_quizzes`
--

TRUNCATE TABLE `4m2w_company_assigned_quizzes`;
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

--
-- Truncate table before insert `4m2w_company_group`
--

TRUNCATE TABLE `4m2w_company_group`;
--
-- Dumping data for table `4m2w_company_group`
--

INSERT INTO `4m2w_company_group` (`id`, `company_id`, `name_of_group`) VALUES
(10, 10, 'Zakaznicky support'),
(11, 10, 'Pravni oddeleni'),
(12, 10, 'MKB '),
(13, 11, 'MCP - sprava phledavek'),
(14, 11, 'prodejci');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_company_quizzes`
--

DROP TABLE IF EXISTS `4m2w_company_quizzes`;
CREATE TABLE `4m2w_company_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Truncate table before insert `4m2w_company_quizzes`
--

TRUNCATE TABLE `4m2w_company_quizzes`;
--
-- Dumping data for table `4m2w_company_quizzes`
--

INSERT INTO `4m2w_company_quizzes` (`id`, `company_id`, `group_id`, `quiz_id`, `valid_to`) VALUES
(6, 10, 10, 1, NULL),
(7, 10, 10, 2, NULL),
(8, 10, 10, 3, NULL),
(9, 10, 11, 1, NULL),
(10, 10, 11, 3, NULL),
(11, 10, 12, 3, NULL),
(12, 11, 13, 3, NULL),
(13, 11, 14, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_indiv_quizzes`
--

DROP TABLE IF EXISTS `4m2w_indiv_quizzes`;
CREATE TABLE `4m2w_indiv_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Truncate table before insert `4m2w_indiv_quizzes`
--

TRUNCATE TABLE `4m2w_indiv_quizzes`;
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

--
-- Truncate table before insert `4m2w_lectures`
--

TRUNCATE TABLE `4m2w_lectures`;
--
-- Dumping data for table `4m2w_lectures`
--

INSERT INTO `4m2w_lectures` (`id`, `name`, `lecture`) VALUES
(1, 'testprojekt', '<h1>Create news items</h1>\r\n<p>You now know how you can read data from a database using CodeIgniter, but you haven&rsquo;t written any information to the database yet. In this section you&rsquo;ll expand your news controller and model created earlier to include this functionality.</p>\r\n<div id=\"create-a-form\" class=\"section\">\r\n<h2>Create a form</h2>\r\n<p>To input data into the database you need to create a form where you can input the information to be stored. This means you&rsquo;ll be needing a form with two fields, one for the title and one for the text. You&rsquo;ll derive the slug from our title in the model. Create the new view at&nbsp;<em>application/views/news/create.php</em>.</p>\r\n<div class=\"highlight-ci\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"o\">&lt;</span><span class=\"nx\">h2</span><span class=\"o\">&gt;&lt;?</span><span class=\"nx\">php</span> <span class=\"k\">echo</span> <span class=\"nv\">$title</span><span class=\"p\">;</span> <span class=\"cp\">?&gt;</span><span class=\"p\">&lt;/</span><span class=\"nt\">h2</span><span class=\"p\">&gt;</span>\r\n\r\n<span class=\"cp\">&lt;?php</span> <span class=\"k\">echo</span> <span class=\"nx\">validation_errors</span><span class=\"p\">();</span> <span class=\"cp\">?&gt;</span>\r\n\r\n<span class=\"cp\">&lt;?php</span> <span class=\"k\">echo</span> <span class=\"nx\">form_open</span><span class=\"p\">(</span><span class=\"s1\">\'news/create\'</span><span class=\"p\">);</span> <span class=\"cp\">?&gt;</span>\r\n\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">label</span> <span class=\"na\">for</span><span class=\"o\">=</span><span class=\"s\">\"title\"</span><span class=\"p\">&gt;</span>Title<span class=\"p\">&lt;/</span><span class=\"nt\">label</span><span class=\"p\">&gt;</span>\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">input</span> <span class=\"na\">type</span><span class=\"o\">=</span><span class=\"s\">\"input\"</span> <span class=\"na\">name</span><span class=\"o\">=</span><span class=\"s\">\"title\"</span> <span class=\"p\">/&gt;&lt;</span><span class=\"nt\">br</span> <span class=\"p\">/&gt;</span>\r\n\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">label</span> <span class=\"na\">for</span><span class=\"o\">=</span><span class=\"s\">\"text\"</span><span class=\"p\">&gt;</span>Text<span class=\"p\">&lt;/</span><span class=\"nt\">label</span><span class=\"p\">&gt;</span>\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">textarea</span> <span class=\"na\">name</span><span class=\"o\">=</span><span class=\"s\">\"text\"</span><span class=\"p\">&gt;&lt;/</span><span class=\"nt\">textarea</span><span class=\"p\">&gt;&lt;</span><span class=\"nt\">br</span> <span class=\"p\">/&gt;</span>\r\n\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">input</span> <span class=\"na\">type</span><span class=\"o\">=</span><span class=\"s\">\"submit\"</span> <span class=\"na\">name</span><span class=\"o\">=</span><span class=\"s\">\"submit\"</span> <span class=\"na\">value</span><span class=\"o\">=</span><span class=\"s\">\"Create news item\"</span> <span class=\"p\">/&gt;</span>\r\n\r\n<span class=\"p\">&lt;/</span><span class=\"nt\">form</span><span class=\"p\">&gt;</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>There are only two things here that probably look unfamiliar to you: the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">form_open()</span></code>&nbsp;function and the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">validation_errors()</span></code>&nbsp;function.</p>\r\n<p>The first function is provided by the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/helpers/form_helper.html\"><span class=\"doc\">form helper</span></a>&nbsp;and renders the form element and adds extra functionality, like adding a hidden&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/libraries/security.html\"><span class=\"doc\">CSRF prevention field</span></a>. The latter is used to report errors related to form validation.</p>\r\n<p>Go back to your news controller. You&rsquo;re going to do two things here, check whether the form was submitted and whether the submitted data passed the validation rules. You&rsquo;ll use the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/libraries/form_validation.html\"><span class=\"doc\">form validation</span></a>&nbsp;library to do this.</p>\r\n</div>'),
(2, 'testprojekt 2', '<h1>Installation Instructions</h1>\r\n<p>CodeIgniter is installed in four steps:</p>\r\n<ol class=\"arabic simple\">\r\n<li>Unzip the package.</li>\r\n<li>Upload the CodeIgniter folders and files to your server. Normally the&nbsp;<em>index.php</em>&nbsp;file will be at your root.</li>\r\n<li>Open the&nbsp;<em>application/config/config.php</em>&nbsp;file with a text editor and set your base URL. If you intend to use encryption or sessions, set your encryption key.</li>\r\n<li>If you intend to use a database, open the&nbsp;<em>application/config/database.php</em>&nbsp;file with a text editor and set your database settings.</li>\r\n</ol>\r\n<p>If you wish to increase security by hiding the location of your CodeIgniter files you can rename the system and application folders to something more private. If you do rename them, you must open your main&nbsp;<em>index.php</em>&nbsp;file and set the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$system_path</span></code>&nbsp;and&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$application_folder</span></code>&nbsp;variables at the top of the file with the new name you&rsquo;ve chosen.</p>\r\n<p>For the best security, both the system and any application folders should be placed above web root so that they are not directly accessible via a browser. By default,&nbsp;<em>.htaccess</em>&nbsp;files are included in each folder to help prevent direct access, but it is best to remove them from public access entirely in case the web server configuration changes or doesn&rsquo;t abide by the&nbsp;<em>.htaccess</em>.</p>\r\n<p>If you would like to keep your views public it is also possible to move the views folder out of your application folder.</p>\r\n<p>After moving them, open your main index.php file and set the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$system_path</span></code>,&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$application_folder</span></code>&nbsp;and&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$view_folder</span></code>&nbsp;variables, preferably with a full path, e.g. &lsquo;<em>/www/MyUser/system</em>&rsquo;.</p>\r\n<p>One additional measure to take in production environments is to disable PHP error reporting and any other development-only functionality. In CodeIgniter, this can be done by setting the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">ENVIRONMENT</span></code>&nbsp;constant, which is more fully described on the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/general/security.html\"><span class=\"doc\">security page</span></a>.</p>\r\n<p>That&rsquo;s it!</p>\r\n<p>If you&rsquo;re new to CodeIgniter, please read the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/overview/getting_started.html\"><span class=\"doc\">Getting Started</span></a>&nbsp;section of the User Guide to begin learning how to build dynamic PHP applications. Enjoy!</p>');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_mkb`
--

DROP TABLE IF EXISTS `4m2w_mkb`;
CREATE TABLE `4m2w_mkb` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `activation` int(10) NOT NULL,
  `activation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Truncate table before insert `4m2w_mkb`
--

TRUNCATE TABLE `4m2w_mkb`;
--
-- Dumping data for table `4m2w_mkb`
--

INSERT INTO `4m2w_mkb` (`user_id`, `company_id`, `activation`, `activation_date`) VALUES
(126, 10, 2, '2019-01-24'),
(136, 11, 1, '2019-01-24'),
(143, 12, 1, '2019-01-24'),
(144, 13, 1, '2019-01-24');

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

--
-- Truncate table before insert `4m2w_news`
--

TRUNCATE TABLE `4m2w_news`;
--
-- Dumping data for table `4m2w_news`
--

INSERT INTO `4m2w_news` (`id`, `title`, `text`, `date_publish`, `active`, `highlight`) VALUES
(1, 'Thunderstruck', 'This new method takes care of inserting the news item into the database. The third line contains a new function, url_title(). This function - provided by the URL helper - strips down the string you pass it, replacing all spaces by dashes (-) and makes sure everything is in lowercase characters. This leaves you with a nice slug, perfect for creating URIs.\r\n\r\nLet’s continue with preparing the record that is going to be inserted later, inside the $data array. Each element corresponds with a column in the database table created earlier. You might notice a new method here, namely the post() method from the input library. This method makes sure the data is sanitized, protecting you from nasty attacks from others. The input library is loaded by default. At last, you insert our $data array into our database.', '2019-01-24', 1, 0),
(2, 'I\'m Alive', ' is going to be inserted later, inside the $data array. Each element corresponds with a column in the database table created earlier. You might notice a new method here, namely the post() method from the input library. This method makes sure the data is sanitized, protecting you from nasty attacks from others. The input library is loaded by default. At last, you insert our $data array into our database.', '2019-01-24', 0, 1);

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

--
-- Truncate table before insert `4m2w_questions`
--

TRUNCATE TABLE `4m2w_questions`;
--
-- Dumping data for table `4m2w_questions`
--

INSERT INTO `4m2w_questions` (`id`, `question`, `true_id_answer`, `false1_id_answer`, `false2_id_answer`, `false3_id_answer`) VALUES
(1, 'Kdo je nejvetsi blbecek?', 5, 6, 7, 8),
(2, 'Jaka je bila barva?', 9, 10, 11, 12),
(3, 'Jaka je cervena barva?', 13, 14, 15, 16);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_quizzes`
--

DROP TABLE IF EXISTS `4m2w_quizzes`;
CREATE TABLE `4m2w_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `estimated_time` text,
  `difficulty` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Truncate table before insert `4m2w_quizzes`
--

TRUNCATE TABLE `4m2w_quizzes`;
--
-- Dumping data for table `4m2w_quizzes`
--

INSERT INTO `4m2w_quizzes` (`id`, `name`, `estimated_time`, `difficulty`) VALUES
(1, 'kviz bezpecnost prace prvy', '25', '3'),
(2, 'este vetsia bezpecnost prace', '20', '2'),
(3, 'kviz 1 gdpr', '15', '1');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_rel_quizz_lec`
--

DROP TABLE IF EXISTS `4m2w_rel_quizz_lec`;
CREATE TABLE `4m2w_rel_quizz_lec` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `lecture_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_rel_quizz_lec`
--

TRUNCATE TABLE `4m2w_rel_quizz_lec`;
--
-- Dumping data for table `4m2w_rel_quizz_lec`
--

INSERT INTO `4m2w_rel_quizz_lec` (`id`, `quizz_id`, `lecture_id`) VALUES
(1, 1, 1),
(3, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_rel_quizz_que`
--

DROP TABLE IF EXISTS `4m2w_rel_quizz_que`;
CREATE TABLE `4m2w_rel_quizz_que` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_rel_quizz_que`
--

TRUNCATE TABLE `4m2w_rel_quizz_que`;
--
-- Dumping data for table `4m2w_rel_quizz_que`
--

INSERT INTO `4m2w_rel_quizz_que` (`id`, `quizz_id`, `question_id`) VALUES
(13, 1, 1),
(14, 1, 2),
(15, 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_rel_quizz_sequence`
--

DROP TABLE IF EXISTS `4m2w_rel_quizz_sequence`;
CREATE TABLE `4m2w_rel_quizz_sequence` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sequence` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

--
-- Truncate table before insert `4m2w_rel_quizz_sequence`
--

TRUNCATE TABLE `4m2w_rel_quizz_sequence`;
-- --------------------------------------------------------

--
-- Table structure for table `4m2w_students`
--

DROP TABLE IF EXISTS `4m2w_students`;
CREATE TABLE `4m2w_students` (
  `student_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `attribut` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Truncate table before insert `4m2w_students`
--

TRUNCATE TABLE `4m2w_students`;
--
-- Dumping data for table `4m2w_students`
--

INSERT INTO `4m2w_students` (`student_id`, `company_id`, `group_id`, `attribut`) VALUES
(126, 10, 12, 'mkb'),
(127, 10, 10, NULL),
(128, 10, 10, NULL),
(129, 10, 11, NULL),
(130, 10, 11, NULL),
(131, 10, 0, NULL),
(132, 10, 0, NULL),
(133, 10, 0, NULL),
(134, 10, 0, NULL),
(135, 10, 0, NULL),
(136, 11, 0, 'mkb'),
(137, 11, 0, NULL),
(138, 11, 0, NULL),
(139, 11, 0, NULL),
(140, 11, 0, NULL),
(141, 11, 0, NULL),
(142, 11, 0, NULL),
(143, 12, 0, 'mkb'),
(144, 13, 0, 'mkb');

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

--
-- Truncate table before insert `a3m_account`
--

TRUNCATE TABLE `a3m_account`;
--
-- Dumping data for table `a3m_account`
--

INSERT INTO `a3m_account` (`id`, `username`, `email`, `password`, `createdon`, `verifiedon`, `lastsignedinon`, `resetsenton`, `deletedon`, `suspendedon`) VALUES
(1, 'admin', 'v.rusch@gmail.com', '$2a$08$xtvj34B9ItliGjdwejzRne1ahJZB2eHuERhg1WbaR3u8rWAhQ9jHy', '2018-12-06 14:19:59', NULL, '2019-01-27 11:01:46', NULL, NULL, NULL),
(136, 'mkb2', 'vhg.rusch@gmail.com', '$2a$08$xtvj34B9ItliGjdwejzRne1ahJZB2eHuERhg1WbaR3u8rWAhQ9jHy', '2019-01-24 14:09:28', NULL, '2019-01-26 19:24:56', NULL, NULL, NULL),
(127, 'otrohlik14', 'vm.rusch@gmail.com', '$2a$08$xtvj34B9ItliGjdwejzRne1ahJZB2eHuERhg1WbaR3u8rWAhQ9jHy', '2019-01-24 11:17:33', '2019-01-26 09:26:57', '2019-01-27 17:44:55', NULL, NULL, NULL),
(128, 'kukuniks98', 'vov.rusch@gmail.com', NULL, '2019-01-24 11:17:33', NULL, NULL, NULL, NULL, NULL),
(129, 'dudunkoh90', 'vev.rusch@gmail.com', NULL, '2019-01-24 11:17:33', NULL, NULL, NULL, NULL, NULL),
(130, 'dukuniks27', 'vii.rusch@gmail.com', NULL, '2019-01-24 11:17:34', NULL, NULL, NULL, NULL, NULL),
(131, 'otkonoks76', 'vk.rusch@gmail.com', NULL, '2019-01-24 11:20:12', NULL, NULL, NULL, NULL, NULL),
(132, 'blidiots70', 'vd.rusch@gmail.com', NULL, '2019-01-24 11:20:13', NULL, NULL, NULL, NULL, NULL),
(133, 'iddebiln26', 'vn.rusch@gmail.com', NULL, '2019-01-24 11:20:13', NULL, NULL, NULL, NULL, NULL),
(134, 'onpokoni79', 'vq.rusch@gmail.com', NULL, '2019-01-24 11:20:13', NULL, NULL, NULL, NULL, NULL),
(135, 'jahrasko18', 'vz.rusch@gmail.com', NULL, '2019-01-24 11:20:13', NULL, NULL, NULL, NULL, NULL),
(137, 'skdopole76', 'qa.rusch@gmail.com', NULL, '2019-01-24 14:10:58', NULL, NULL, NULL, NULL, NULL),
(138, 'wiblbece42', 'az.rusch@gmail.com', NULL, '2019-01-24 14:10:59', NULL, NULL, NULL, NULL, NULL),
(139, 'toajerry75', 'sx.rusch@gmail.com', NULL, '2019-01-24 14:10:59', NULL, NULL, NULL, NULL, NULL),
(140, 'jomaria14', 'zx.rusch@gmail.com', NULL, '2019-01-24 14:10:59', NULL, NULL, NULL, NULL, NULL),
(141, 'toneveri83', 'ed.rusch@gmail.com', NULL, '2019-01-24 14:10:59', NULL, NULL, NULL, NULL, NULL),
(142, 'blnejblb38', 'id.rusch@gmail.com', NULL, '2019-01-24 14:10:59', NULL, NULL, NULL, NULL, NULL),
(143, 'mkb3', 'lkjo.rusch@gmail.com', NULL, '2019-01-24 14:51:57', NULL, NULL, NULL, NULL, NULL),
(144, 'jeb123', 'jeb123@gmail.com', NULL, '2019-01-24 14:54:39', NULL, NULL, NULL, NULL, NULL),
(126, 'mkb1', 'zxc.rusch@gmail.com', '$2a$08$xtvj34B9ItliGjdwejzRne1ahJZB2eHuERhg1WbaR3u8rWAhQ9jHy', '2019-01-24 11:15:50', '2019-01-24 00:00:00', '2019-01-26 21:41:44', NULL, NULL, NULL);

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

--
-- Truncate table before insert `a3m_account_details`
--

TRUNCATE TABLE `a3m_account_details`;
--
-- Dumping data for table `a3m_account_details`
--

INSERT INTO `a3m_account_details` (`account_id`, `fullname`, `firstname`, `lastname`, `dateofbirth`, `gender`, `postalcode`, `country`, `language`, `timezone`, `citimezone`, `picture`) VALUES
(131, NULL, 'Otik', 'Konoksicht', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, NULL, NULL, NULL, '1970-06-02', 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(132, NULL, 'Blbecek', 'Idiotsky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(133, NULL, 'Idiot', 'Debilni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(134, NULL, 'Onik', 'Pokoni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(135, NULL, 'Janko', 'Hrasko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(136, NULL, 'Nabul', 'Kobul', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(137, NULL, 'Skoc', 'Dopole', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(138, NULL, 'Winedtuha', 'Blbecek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(139, NULL, 'Tom', 'Ajerry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(140, NULL, 'Jozef', 'Maria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(141, NULL, 'Tomas', 'Neverici', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(142, NULL, 'Blbec', 'Nejblbejsi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(143, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(127, NULL, 'Otik', 'Rohlikozrut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(128, NULL, 'Kun', 'Kuniksich', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(129, NULL, 'Dusan', 'Dunkoh', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(130, NULL, 'Dudko', 'Kuniksicht', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(126, NULL, '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(144, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `a3m_acl_permission`
--

DROP TABLE IF EXISTS `a3m_acl_permission`;
CREATE TABLE `a3m_acl_permission` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Truncate table before insert `a3m_acl_permission`
--

TRUNCATE TABLE `a3m_acl_permission`;
--
-- Dumping data for table `a3m_acl_permission`
--

INSERT INTO `a3m_acl_permission` (`id`, `key`, `description`, `suspendedon`, `is_system`) VALUES
(2, 'create_roles', 'Create new roles', NULL, 1),
(3, 'retrieve_roles', 'View existing roles', NULL, 1),
(4, 'update_roles', 'Update existing roles', NULL, 1),
(5, 'delete_roles', 'Delete existing roles', NULL, 1),
(6, 'create_permissions', 'Create new permissions', NULL, 1),
(7, 'retrieve_permissions', 'View existing permissions', NULL, 1),
(8, 'update_permissions', 'Update existing permissions', NULL, 1),
(9, 'delete_permissions', 'Delete existing permissions', NULL, 1),
(10, 'create_users', 'Create new users', NULL, 1),
(11, 'retrieve_users', 'View existing users', NULL, 1),
(12, 'update_users', 'Update existing users', NULL, 1),
(13, 'delete_users', 'Delete existing users', NULL, 1),
(14, 'ban_users', 'Ban and Unban existing users', NULL, 1),
(15, 'manager MKB', 'Manager kyberbezpecnosti', NULL, 0),
(16, 'Student', 'student', NULL, 0);

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

--
-- Truncate table before insert `a3m_acl_role`
--

TRUNCATE TABLE `a3m_acl_role`;
--
-- Dumping data for table `a3m_acl_role`
--

INSERT INTO `a3m_acl_role` (`id`, `name`, `description`, `suspendedon`, `is_system`) VALUES
(1, 'Admin', 'Website Administrator', NULL, 1),
(2, 'User', 'Website user', NULL, 0),
(3, 'Student', 'Student pro e-learning', NULL, 0),
(4, 'MKB', 'Manager kyberbespecnosti', NULL, 0);

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
-- Truncate table before insert `a3m_rel_account_role`
--

TRUNCATE TABLE `a3m_rel_account_role`;
--
-- Dumping data for table `a3m_rel_account_role`
--

INSERT INTO `a3m_rel_account_role` (`account_id`, `role_id`) VALUES
(1, 1),
(126, 4),
(127, 3),
(128, 3),
(129, 3),
(130, 3),
(131, 3),
(132, 3),
(133, 3),
(134, 3),
(135, 3),
(136, 4),
(137, 3),
(138, 3),
(139, 3),
(140, 3),
(141, 3),
(142, 3),
(143, 4),
(144, 4);

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
-- Indexes for table `4m2w_company_assigned_quizzes`
--
ALTER TABLE `4m2w_company_assigned_quizzes`
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
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_indiv_quizzes`
--
ALTER TABLE `4m2w_indiv_quizzes`
  ADD PRIMARY KEY (`id`);

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizz_id` (`quizz_id`,`lecture_id`);

--
-- Indexes for table `4m2w_rel_quizz_que`
--
ALTER TABLE `4m2w_rel_quizz_que`
  ADD PRIMARY KEY (`id`),
  ADD KEY `quizz_id` (`quizz_id`,`question_id`);

--
-- Indexes for table `4m2w_rel_quizz_sequence`
--
ALTER TABLE `4m2w_rel_quizz_sequence`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_students`
--
ALTER TABLE `4m2w_students`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `company_id` (`company_id`);

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
-- Indexes for table `a3m_acl_permission`
--
ALTER TABLE `a3m_acl_permission`
  ADD PRIMARY KEY (`id`),
  ADD KEY `key` (`key`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `4m2w_companies`
--
ALTER TABLE `4m2w_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `4m2w_company_assigned_quizzes`
--
ALTER TABLE `4m2w_company_assigned_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_company_group`
--
ALTER TABLE `4m2w_company_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `4m2w_company_quizzes`
--
ALTER TABLE `4m2w_company_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `4m2w_indiv_quizzes`
--
ALTER TABLE `4m2w_indiv_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_lectures`
--
ALTER TABLE `4m2w_lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `4m2w_news`
--
ALTER TABLE `4m2w_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `4m2w_questions`
--
ALTER TABLE `4m2w_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4m2w_quizzes`
--
ALTER TABLE `4m2w_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4m2w_rel_quizz_lec`
--
ALTER TABLE `4m2w_rel_quizz_lec`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4m2w_rel_quizz_que`
--
ALTER TABLE `4m2w_rel_quizz_que`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `4m2w_rel_quizz_sequence`
--
ALTER TABLE `4m2w_rel_quizz_sequence`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `a3m_account`
--
ALTER TABLE `a3m_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `a3m_acl_permission`
--
ALTER TABLE `a3m_acl_permission`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `a3m_acl_role`
--
ALTER TABLE `a3m_acl_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
