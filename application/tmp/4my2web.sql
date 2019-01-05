-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 05, 2019 at 11:27 AM
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

CREATE TABLE `4m2w_answers` (
  `id` int(11) NOT NULL,
  `answer` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_answers`
--

TRUNCATE TABLE `4m2w_answers`;
--
-- Dumping data for table `4m2w_answers`
--

INSERT INTO `4m2w_answers` (`id`, `answer`) VALUES
(5, 'ja'),
(6, 'on'),
(7, 'oni'),
(8, 'vsichni');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_companies`
--

CREATE TABLE `4m2w_companies` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `division` varchar(128) NOT NULL,
  `department` varchar(128) NOT NULL,
  `notes` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_companies`
--

TRUNCATE TABLE `4m2w_companies`;
--
-- Dumping data for table `4m2w_companies`
--

INSERT INTO `4m2w_companies` (`id`, `name`, `division`, `department`, `notes`) VALUES
(4, 'firma XY', '', 'BB1', 'poznamka je to dost dlha poznaka na poznamku ale aj tak je to poznamka'),
(5, 'firma X', 'B', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_course`
--

CREATE TABLE `4m2w_course` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `tema` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_course`
--

TRUNCATE TABLE `4m2w_course`;
--
-- Dumping data for table `4m2w_course`
--

INSERT INTO `4m2w_course` (`id`, `name`, `tema`) VALUES
(1, 'kurz1', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_lectures`
--

CREATE TABLE `4m2w_lectures` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `tema` varchar(128) DEFAULT NULL,
  `lecture` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_lectures`
--

TRUNCATE TABLE `4m2w_lectures`;
--
-- Dumping data for table `4m2w_lectures`
--

INSERT INTO `4m2w_lectures` (`id`, `name`, `tema`, `lecture`) VALUES
(4, 'brithish', 'test', '<dl class=\"function\">\r\n<dd>\r\n<div class=\"admonition note\">\r\n<p class=\"last\">Calling this function is the same as doing this: | |'),
(5, 'testprojekt', 'test', '<h1>Directory Helper</h1>\r\n<p>The Directory Helper file contains functions that assist in working with directories.</p>\r\n<div id'),
(6, 'firma1', 'test', '<h1>Directory Helper</h1>\r\n<p>The Directory Helper file contains functions that assist in working with directories.</p>\r\n<div id=\"contents\" class=\"contents local topic\">\r\n<ul class=\"simple\">\r\n<li><a id=\"id1\" class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/helpers/directory_helper.html#loading-this-helper\">Loading this Helper</a></li>\r\n<li><a id=\"id2\" class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/helpers/directory_helper.html#available-functions\">Available Functions</a></li>\r\n</ul>\r\n</div>\r\n<div class=\"custom-index container\">&nbsp;</div>\r\n<div id=\"loading-this-helper\" class=\"section\">\r\n<h2><a class=\"toc-backref\" href=\"https://www.codeigniter.com/user_guide/helpers/directory_helper.html#id1\">Loading this Helper</a></h2>\r\n<p>This helper is loaded using the following code:</p>\r\n<div class=\"highlight-ci\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"nv\">$this</span><span class=\"o\">-&gt;</span><span class=\"na\">load</span><span class=\"o\">-&gt;</span><span class=\"na\">helper</span><span class=\"p\">(</span><span class=\"s1\">\'directory\'</span><span class=\"p\">);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n</div>\r\n<div id=\"available-functions\" class=\"section\">\r\n<h2><a class=\"toc-backref\" href=\"https://www.codeigniter.com/user_guide/helpers/directory_helper.html#id2\">Available Functions</a></h2>\r\n<p>The following functions are available:</p>\r\n<dl class=\"function\">\r\n<dt id=\"directory_map\"><code class=\"descname\">directory_map</code><span class=\"sig-paren\">(</span><em>$source_dir</em><span class=\"optional\">[</span>,&nbsp;<em>$directory_depth = 0</em><span class=\"optional\">[</span>,&nbsp;<em>$hidden = FALSE</em><span class=\"optional\">]</span><span class=\"optional\">]</span><span class=\"sig-paren\">)</span></dt>\r\n<dd>\r\n<table class=\"docutils field-list\" frame=\"void\" rules=\"none\"><colgroup><col class=\"field-name\" /><col class=\"field-body\" /></colgroup>\r\n<tbody valign=\"top\">\r\n<tr class=\"field-odd field\">\r\n<th class=\"field-name\">Parameters:</th>\r\n<td class=\"field-body\">\r\n<ul class=\"first simple\">\r\n<li><strong>$source_dir</strong>&nbsp;(<em>string</em>) &ndash; Path to the source directory</li>\r\n<li><strong>$directory_depth</strong>&nbsp;(<em>int</em>) &ndash; Depth of directories to traverse (0 = fully recursive, 1 = current dir, etc)</li>\r\n<li><strong>$hidden</strong>&nbsp;(<em>bool</em>) &ndash; Whether to include hidden directories</li>\r\n</ul>\r\n</td>\r\n</tr>\r\n<tr class=\"field-even field\">\r\n<th class=\"field-name\">Returns:</th>\r\n<td class=\"field-body\">\r\n<p class=\"first\">An array of files</p>\r\n</td>\r\n</tr>\r\n<tr class=\"field-odd field\">\r\n<th class=\"field-name\">Return type:</th>\r\n<td class=\"field-body\">\r\n<p class=\"first last\">array</p>\r\n</td>\r\n</tr>\r\n</tbody>\r\n</table>\r\n<p>Examples:</p>\r\n<div class=\"highlight-ci\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"nv\">$map</span> <span class=\"o\">=</span> <span class=\"nx\">directory_map</span><span class=\"p\">(</span><span class=\"s1\">\'./mydirectory/\'</span><span class=\"p\">);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<div class=\"admonition note\">\r\n<p class=\"first admonition-title\">Note</p>\r\n<p class=\"last\">Paths are almost always relative to your main index.php file.</p>\r\n</div>\r\n<p>Sub-folders contained within the directory will be mapped as well. If you wish to control the recursion depth, you can do so using the second parameter (integer). A depth of 1 will only map the top level directory:</p>\r\n<div class=\"highlight-ci\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"nv\">$map</span> <span class=\"o\">=</span> <span class=\"nx\">directory_map</span><span class=\"p\">(</span><span class=\"s1\">\'./mydirectory/\'</span><span class=\"p\">,</span> <span class=\"mi\">1</span><span class=\"p\">);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>By default, hidden files will not be included in the returned array. To override this behavior, you may set a third parameter to true (boolean):</p>\r\n<div class=\"highlight-ci\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"nv\">$map</span> <span class=\"o\">=</span> <span class=\"nx\">directory_map</span><span class=\"p\">(</span><span class=\"s1\">\'./mydirectory/\'</span><span class=\"p\">,</span> <span class=\"k\">FALSE</span><span class=\"p\">,</span> <span class=\"k\">TRUE</span><span class=\"p\">);</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>Each folder name will be an array index, while its contained files will be numerically indexed. Here is an example of a typical array:</p>\r\n</dd>\r\n</dl>\r\n</div>');

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_news`
--

CREATE TABLE `4m2w_news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_news`
--

TRUNCATE TABLE `4m2w_news`;
--
-- Dumping data for table `4m2w_news`
--

INSERT INTO `4m2w_news` (`id`, `title`, `text`, `date_publish`, `active`, `highlight`) VALUES
(1, 'I\'m Alive1345', '555444333Instead of writing database operations right in the controller, queries should be placed in a model, so they can easily be reused later. Models are the place where you retrieve, insert, and update information in your database or other data stores. They represent your data.\r\n\r\nOpen up the application/models/ directory and create a new file called News_model.php and add the following code. Make sure you’ve configured your database properly as described here.', '2018-12-31', 1, 1),
(2, 'Back In Black21 3', 'gdhdghd     22222 Looking at the code, you may see some similarity with the files we created earlier. First, the __construct() method: it calls the constructor of its parent class (CI_Controller) and loads the model, so it can be used in all other methods in this controller. It also loads a collection of URL Helper functions, because we’ll use one of them in a view later.\r\n\r\nNext, there are two methods to view all news items and one for a specific news item. You can see that the $slug variable is passed to the model’s method in the second method. The model is using this slug to identify the news item to be returned.\r\n\r\nNow the data is retrieved by the controller through our model, but nothing is displayed yet. The next thing to do is passing this data to the views.', '2019-01-03', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_questions`
--

CREATE TABLE `4m2w_questions` (
  `id` int(11) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `question` varchar(128) NOT NULL,
  `true_id_answer` int(11) NOT NULL,
  `false1_id_answer` int(11) NOT NULL,
  `false2_id_answer` int(11) NOT NULL,
  `false3_id_answer` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_questions`
--

TRUNCATE TABLE `4m2w_questions`;
--
-- Dumping data for table `4m2w_questions`
--

INSERT INTO `4m2w_questions` (`id`, `tema`, `question`, `true_id_answer`, `false1_id_answer`, `false2_id_answer`, `false3_id_answer`) VALUES
(4, 'test', 'Kdo je nejvetsi blbecek?', 5, 6, 7, 8);

-- --------------------------------------------------------

--
-- Table structure for table `4m2w_rel_course`
--

CREATE TABLE `4m2w_rel_course` (
  `id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `questions_id` int(11) DEFAULT NULL,
  `lectures_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Truncate table before insert `4m2w_rel_course`
--

TRUNCATE TABLE `4m2w_rel_course`;
-- --------------------------------------------------------

--
-- Table structure for table `4m2w_zaci`
--

CREATE TABLE `4m2w_zaci` (
  `id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `user_zak__id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Truncate table before insert `4m2w_zaci`
--

TRUNCATE TABLE `4m2w_zaci`;
--
-- Indexes for dumped tables
--

--
-- Indexes for table `4m2w_answers`
--
ALTER TABLE `4m2w_answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `4m2w_companies`
--
ALTER TABLE `4m2w_companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_course`
--
ALTER TABLE `4m2w_course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `4m2w_lectures`
--
ALTER TABLE `4m2w_lectures`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `4m2w_rel_course`
--
ALTER TABLE `4m2w_rel_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_course` (`course_id`);

--
-- Indexes for table `4m2w_zaci`
--
ALTER TABLE `4m2w_zaci`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`),
  ADD KEY `user_zak__id` (`user_zak__id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `4m2w_answers`
--
ALTER TABLE `4m2w_answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `4m2w_companies`
--
ALTER TABLE `4m2w_companies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `4m2w_course`
--
ALTER TABLE `4m2w_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `4m2w_lectures`
--
ALTER TABLE `4m2w_lectures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `4m2w_news`
--
ALTER TABLE `4m2w_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `4m2w_questions`
--
ALTER TABLE `4m2w_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `4m2w_rel_course`
--
ALTER TABLE `4m2w_rel_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `4m2w_zaci`
--
ALTER TABLE `4m2w_zaci`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `4m2w_rel_course`
--
ALTER TABLE `4m2w_rel_course`
  ADD CONSTRAINT `4m2w_rel_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `4m2w_course` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
