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

TRUNCATE TABLE `4m2w_answers`;
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

DROP TABLE IF EXISTS `4m2w_companies`;
CREATE TABLE `4m2w_companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(60) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `status` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_companies`;
INSERT INTO `4m2w_companies` (`id`, `name`, `status`) VALUES
(6, 'Mazasa', NULL),
(9, 'DunaHouse s.r.o.', NULL);

DROP TABLE IF EXISTS `4m2w_company_group`;
CREATE TABLE `4m2w_company_group` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `name_of_group` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_company_group`;
INSERT INTO `4m2w_company_group` (`id`, `company_id`, `name_of_group`) VALUES
(1, 6, 'blbeckove'),
(2, 6, 'mkb'),
(8, 6, 'idioti'),
(9, 9, 'blbeckove 23');

DROP TABLE IF EXISTS `4m2w_company_quizzes`;
CREATE TABLE `4m2w_company_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `group_id` bigint(20) UNSIGNED NOT NULL,
  `quiz_id` bigint(20) UNSIGNED NOT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_company_quizzes`;
INSERT INTO `4m2w_company_quizzes` (`id`, `company_id`, `group_id`, `quiz_id`, `valid_to`) VALUES
(1, 6, 1, 1, NULL),
(2, 6, 1, 2, NULL),
(3, 6, 2, 3, NULL),
(4, 6, 2, 1, NULL),
(5, 6, 8, 2, NULL);

DROP TABLE IF EXISTS `4m2w_indiv_quizzes`;
CREATE TABLE `4m2w_indiv_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `quizz_id` int(11) NOT NULL,
  `valid_to` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf32 COLLATE=utf32_bin;

TRUNCATE TABLE `4m2w_indiv_quizzes`;
INSERT INTO `4m2w_indiv_quizzes` (`id`, `student_id`, `company_id`, `quizz_id`, `valid_to`) VALUES
(1, 107, 6, 3, NULL);

DROP TABLE IF EXISTS `4m2w_lectures`;
CREATE TABLE `4m2w_lectures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL,
  `lecture` longtext
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_lectures`;
INSERT INTO `4m2w_lectures` (`id`, `name`, `lecture`) VALUES
(1, 'testprojekt', '<h1>Create news items</h1>\r\n<p>You now know how you can read data from a database using CodeIgniter, but you haven&rsquo;t written any information to the database yet. In this section you&rsquo;ll expand your news controller and model created earlier to include this functionality.</p>\r\n<div id=\"create-a-form\" class=\"section\">\r\n<h2>Create a form</h2>\r\n<p>To input data into the database you need to create a form where you can input the information to be stored. This means you&rsquo;ll be needing a form with two fields, one for the title and one for the text. You&rsquo;ll derive the slug from our title in the model. Create the new view at&nbsp;<em>application/views/news/create.php</em>.</p>\r\n<div class=\"highlight-ci\">\r\n<div class=\"highlight\">\r\n<pre><span class=\"o\">&lt;</span><span class=\"nx\">h2</span><span class=\"o\">&gt;&lt;?</span><span class=\"nx\">php</span> <span class=\"k\">echo</span> <span class=\"nv\">$title</span><span class=\"p\">;</span> <span class=\"cp\">?&gt;</span><span class=\"p\">&lt;/</span><span class=\"nt\">h2</span><span class=\"p\">&gt;</span>\r\n\r\n<span class=\"cp\">&lt;?php</span> <span class=\"k\">echo</span> <span class=\"nx\">validation_errors</span><span class=\"p\">();</span> <span class=\"cp\">?&gt;</span>\r\n\r\n<span class=\"cp\">&lt;?php</span> <span class=\"k\">echo</span> <span class=\"nx\">form_open</span><span class=\"p\">(</span><span class=\"s1\">\'news/create\'</span><span class=\"p\">);</span> <span class=\"cp\">?&gt;</span>\r\n\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">label</span> <span class=\"na\">for</span><span class=\"o\">=</span><span class=\"s\">\"title\"</span><span class=\"p\">&gt;</span>Title<span class=\"p\">&lt;/</span><span class=\"nt\">label</span><span class=\"p\">&gt;</span>\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">input</span> <span class=\"na\">type</span><span class=\"o\">=</span><span class=\"s\">\"input\"</span> <span class=\"na\">name</span><span class=\"o\">=</span><span class=\"s\">\"title\"</span> <span class=\"p\">/&gt;&lt;</span><span class=\"nt\">br</span> <span class=\"p\">/&gt;</span>\r\n\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">label</span> <span class=\"na\">for</span><span class=\"o\">=</span><span class=\"s\">\"text\"</span><span class=\"p\">&gt;</span>Text<span class=\"p\">&lt;/</span><span class=\"nt\">label</span><span class=\"p\">&gt;</span>\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">textarea</span> <span class=\"na\">name</span><span class=\"o\">=</span><span class=\"s\">\"text\"</span><span class=\"p\">&gt;&lt;/</span><span class=\"nt\">textarea</span><span class=\"p\">&gt;&lt;</span><span class=\"nt\">br</span> <span class=\"p\">/&gt;</span>\r\n\r\n    <span class=\"p\">&lt;</span><span class=\"nt\">input</span> <span class=\"na\">type</span><span class=\"o\">=</span><span class=\"s\">\"submit\"</span> <span class=\"na\">name</span><span class=\"o\">=</span><span class=\"s\">\"submit\"</span> <span class=\"na\">value</span><span class=\"o\">=</span><span class=\"s\">\"Create news item\"</span> <span class=\"p\">/&gt;</span>\r\n\r\n<span class=\"p\">&lt;/</span><span class=\"nt\">form</span><span class=\"p\">&gt;</span>\r\n</pre>\r\n</div>\r\n</div>\r\n<p>There are only two things here that probably look unfamiliar to you: the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">form_open()</span></code>&nbsp;function and the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">validation_errors()</span></code>&nbsp;function.</p>\r\n<p>The first function is provided by the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/helpers/form_helper.html\"><span class=\"doc\">form helper</span></a>&nbsp;and renders the form element and adds extra functionality, like adding a hidden&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/libraries/security.html\"><span class=\"doc\">CSRF prevention field</span></a>. The latter is used to report errors related to form validation.</p>\r\n<p>Go back to your news controller. You&rsquo;re going to do two things here, check whether the form was submitted and whether the submitted data passed the validation rules. You&rsquo;ll use the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/libraries/form_validation.html\"><span class=\"doc\">form validation</span></a>&nbsp;library to do this.</p>\r\n</div>'),
(2, 'testprojekt 2', '<h1>Installation Instructions</h1>\r\n<p>CodeIgniter is installed in four steps:</p>\r\n<ol class=\"arabic simple\">\r\n<li>Unzip the package.</li>\r\n<li>Upload the CodeIgniter folders and files to your server. Normally the&nbsp;<em>index.php</em>&nbsp;file will be at your root.</li>\r\n<li>Open the&nbsp;<em>application/config/config.php</em>&nbsp;file with a text editor and set your base URL. If you intend to use encryption or sessions, set your encryption key.</li>\r\n<li>If you intend to use a database, open the&nbsp;<em>application/config/database.php</em>&nbsp;file with a text editor and set your database settings.</li>\r\n</ol>\r\n<p>If you wish to increase security by hiding the location of your CodeIgniter files you can rename the system and application folders to something more private. If you do rename them, you must open your main&nbsp;<em>index.php</em>&nbsp;file and set the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$system_path</span></code>&nbsp;and&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$application_folder</span></code>&nbsp;variables at the top of the file with the new name you&rsquo;ve chosen.</p>\r\n<p>For the best security, both the system and any application folders should be placed above web root so that they are not directly accessible via a browser. By default,&nbsp;<em>.htaccess</em>&nbsp;files are included in each folder to help prevent direct access, but it is best to remove them from public access entirely in case the web server configuration changes or doesn&rsquo;t abide by the&nbsp;<em>.htaccess</em>.</p>\r\n<p>If you would like to keep your views public it is also possible to move the views folder out of your application folder.</p>\r\n<p>After moving them, open your main index.php file and set the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$system_path</span></code>,&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$application_folder</span></code>&nbsp;and&nbsp;<code class=\"docutils literal\"><span class=\"pre\">$view_folder</span></code>&nbsp;variables, preferably with a full path, e.g. &lsquo;<em>/www/MyUser/system</em>&rsquo;.</p>\r\n<p>One additional measure to take in production environments is to disable PHP error reporting and any other development-only functionality. In CodeIgniter, this can be done by setting the&nbsp;<code class=\"docutils literal\"><span class=\"pre\">ENVIRONMENT</span></code>&nbsp;constant, which is more fully described on the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/general/security.html\"><span class=\"doc\">security page</span></a>.</p>\r\n<p>That&rsquo;s it!</p>\r\n<p>If you&rsquo;re new to CodeIgniter, please read the&nbsp;<a class=\"reference internal\" href=\"https://www.codeigniter.com/user_guide/overview/getting_started.html\"><span class=\"doc\">Getting Started</span></a>&nbsp;section of the User Guide to begin learning how to build dynamic PHP applications. Enjoy!</p>');

DROP TABLE IF EXISTS `4m2w_mkb`;
CREATE TABLE `4m2w_mkb` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `activation` int(10) NOT NULL,
  `activation_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_mkb`;
INSERT INTO `4m2w_mkb` (`user_id`, `company_id`, `activation`, `activation_date`) VALUES
(110, 6, 1, '2019-01-18'),
(124, 9, 1, '2019-01-21');

DROP TABLE IF EXISTS `4m2w_news`;
CREATE TABLE `4m2w_news` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_news`;
INSERT INTO `4m2w_news` (`id`, `title`, `text`, `date_publish`, `active`, `highlight`) VALUES
(1, 'Thunderstruck', 'This new method takes care of inserting the news item into the database. The third line contains a new function, url_title(). This function - provided by the URL helper - strips down the string you pass it, replacing all spaces by dashes (-) and makes sure everything is in lowercase characters. This leaves you with a nice slug, perfect for creating URIs.\r\n\r\nLet’s continue with preparing the record that is going to be inserted later, inside the $data array. Each element corresponds with a column in the database table created earlier. You might notice a new method here, namely the post() method from the input library. This method makes sure the data is sanitized, protecting you from nasty attacks from others. The input library is loaded by default. At last, you insert our $data array into our database.', '2019-01-12', 0, 0),
(2, 'I\'m Alive', ' is going to be inserted later, inside the $data array. Each element corresponds with a column in the database table created earlier. You might notice a new method here, namely the post() method from the input library. This method makes sure the data is sanitized, protecting you from nasty attacks from others. The input library is loaded by default. At last, you insert our $data array into our database.', '2019-01-12', 0, 0);

DROP TABLE IF EXISTS `4m2w_questions`;
CREATE TABLE `4m2w_questions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` varchar(128) NOT NULL,
  `true_id_answer` bigint(20) NOT NULL,
  `false1_id_answer` bigint(20) NOT NULL,
  `false2_id_answer` bigint(20) NOT NULL,
  `false3_id_answer` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_questions`;
INSERT INTO `4m2w_questions` (`id`, `question`, `true_id_answer`, `false1_id_answer`, `false2_id_answer`, `false3_id_answer`) VALUES
(1, 'Kdo je nejvetsi blbecek?', 5, 6, 7, 8),
(2, 'Jaka je bila barva?', 9, 10, 11, 12),
(3, 'Jaka je cervena barva?', 13, 14, 15, 16);

DROP TABLE IF EXISTS `4m2w_quizzes`;
CREATE TABLE `4m2w_quizzes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_quizzes`;
INSERT INTO `4m2w_quizzes` (`id`, `name`) VALUES
(1, 'kviz bezpecnost prace'),
(2, 'este vetsia bezpecnost prace'),
(3, 'kviz 1 gdpr');

DROP TABLE IF EXISTS `4m2w_rel_quizz_lec`;
CREATE TABLE `4m2w_rel_quizz_lec` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `lecture_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE TABLE `4m2w_rel_quizz_lec`;
INSERT INTO `4m2w_rel_quizz_lec` (`id`, `quizz_id`, `lecture_id`) VALUES
(1, 1, 1),
(2, 1, 2);

DROP TABLE IF EXISTS `4m2w_rel_quizz_que`;
CREATE TABLE `4m2w_rel_quizz_que` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `quizz_id` bigint(20) NOT NULL,
  `question_id` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

TRUNCATE TABLE `4m2w_rel_quizz_que`;
INSERT INTO `4m2w_rel_quizz_que` (`id`, `quizz_id`, `question_id`) VALUES
(13, 1, 1),
(14, 1, 2),
(15, 1, 3);

DROP TABLE IF EXISTS `4m2w_students`;
CREATE TABLE `4m2w_students` (
  `student_id` bigint(20) NOT NULL,
  `company_id` bigint(20) NOT NULL,
  `group_id` bigint(20) DEFAULT NULL,
  `attribut` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

TRUNCATE TABLE `4m2w_students`;
INSERT INTO `4m2w_students` (`student_id`, `company_id`, `group_id`, `attribut`) VALUES
(98, 6, 1, NULL),
(99, 6, 1, NULL),
(100, 6, 1, NULL),
(101, 6, 1, NULL),
(102, 6, 1, NULL),
(103, 6, 8, NULL),
(104, 6, 8, NULL),
(105, 6, 8, NULL),
(106, 6, 8, NULL),
(107, 6, 0, NULL),
(108, 6, 0, NULL),
(109, 6, 8, NULL),
(110, 6, 2, 'mkb'),
(120, 9, 9, NULL),
(121, 9, 9, NULL),
(122, 9, 9, NULL),
(123, 9, 9, NULL),
(124, 9, 9, NULL),
(125, 9, 9, NULL);

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

TRUNCATE TABLE `a3m_account`;
INSERT INTO `a3m_account` (`id`, `username`, `email`, `password`, `createdon`, `verifiedon`, `lastsignedinon`, `resetsenton`, `deletedon`, `suspendedon`) VALUES
(1, 'admin', 'v.rusch@gmail.com', '$2a$08$xtvj34B9ItliGjdwejzRne1ahJZB2eHuERhg1WbaR3u8rWAhQ9jHy', '2018-12-06 14:19:59', NULL, '2019-01-22 18:52:24', NULL, NULL, NULL),
(125, 'blnejblb70', 'id.rusch@gmail.com', NULL, '2019-01-21 18:29:19', NULL, NULL, NULL, NULL, NULL),
(124, 'toneveri88', 'ed.rusch@gmail.com', NULL, '2019-01-21 18:29:19', NULL, NULL, NULL, NULL, NULL),
(123, 'jomaria98', 'zx.rusch@gmail.com', NULL, '2019-01-21 18:29:19', NULL, NULL, NULL, NULL, NULL),
(121, 'wiblbece67', 'az.rusch@gmail.com', NULL, '2019-01-21 18:29:19', NULL, NULL, NULL, NULL, NULL),
(122, 'toajerry56', 'sx.rusch@gmail.com', NULL, '2019-01-21 18:29:19', NULL, NULL, NULL, NULL, NULL),
(110, 'mkb1', 'v2.rusch@gmail.com', NULL, '2019-01-18 22:54:46', NULL, NULL, NULL, NULL, NULL),
(109, 'kukuniks24', 'vv.rusch@gmail.com', NULL, '2019-01-18 22:54:30', NULL, NULL, NULL, NULL, NULL),
(108, 'otrohlik80', 'vm.rusch@gmail.com', NULL, '2019-01-18 22:54:30', NULL, NULL, NULL, NULL, NULL),
(107, 'jahrasko20', 'vz.rusch@gmail.com', NULL, '2019-01-18 22:54:21', NULL, NULL, NULL, NULL, NULL),
(106, 'onpokoni25', 'vq.rusch@gmail.com', NULL, '2019-01-18 22:54:21', NULL, NULL, NULL, NULL, NULL),
(105, 'iddebiln45', 'vn.rusch@gmail.com', NULL, '2019-01-18 22:54:21', NULL, NULL, NULL, NULL, NULL),
(104, 'blidiots37', 'vd.rusch@gmail.com', NULL, '2019-01-18 22:54:21', NULL, NULL, NULL, NULL, NULL),
(103, 'otkonoks16', 'vk.rusch@gmail.com', NULL, '2019-01-18 22:54:21', NULL, NULL, NULL, NULL, NULL),
(102, 'neuzzadn43', 'vpp.rusch@gmail.com', NULL, '2019-01-18 22:54:12', NULL, NULL, NULL, NULL, NULL),
(98, 'onskakal66', 'va.rusch@gmail.com', NULL, '2019-01-18 22:54:12', NULL, NULL, NULL, NULL, NULL),
(99, 'sablbec69', 've.rusch@gmail.com', NULL, '2019-01-18 22:54:12', NULL, NULL, NULL, NULL, NULL),
(100, 'jekristu28', 'vu.rusch@gmail.com', NULL, '2019-01-18 22:54:12', NULL, NULL, NULL, NULL, NULL),
(101, 'pamaria85', 'vo.rusch@gmail.com', NULL, '2019-01-18 22:54:12', NULL, NULL, NULL, NULL, NULL),
(120, 'skdopole38', 'qa.rusch@gmail.com', NULL, '2019-01-21 18:29:19', NULL, NULL, NULL, NULL, NULL);

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

TRUNCATE TABLE `a3m_account_details`;
INSERT INTO `a3m_account_details` (`account_id`, `fullname`, `firstname`, `lastname`, `dateofbirth`, `gender`, `postalcode`, `country`, `language`, `timezone`, `citimezone`, `picture`) VALUES
(109, NULL, 'kun', 'kuniksich', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, NULL, NULL, NULL, '1970-06-02', 'm', NULL, NULL, NULL, NULL, NULL, NULL),
(108, NULL, 'otik', 'rohlikozrut', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(107, NULL, 'Janko', 'Hrasko', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(106, NULL, 'Onik', 'Pokoni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(105, NULL, 'Idiot', 'Debilni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(104, NULL, 'Blbecek', 'Idiotsky', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(98, NULL, 'Ondon', 'Skakal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(99, NULL, 'Sandokan', 'Blbec', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(100, NULL, 'Jezis', 'Kristus3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(101, NULL, 'Panenka', 'Maria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(102, NULL, 'Nevim', 'Uzzadneprijmeni', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(103, NULL, 'Otik', 'Konoksicht', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(110, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(124, NULL, 'Tomas', 'Neverici', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(123, NULL, 'Jozef', 'Maria', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(122, NULL, 'Tom', 'Ajerry', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(121, NULL, 'Winedtuha', 'Blbecek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(120, NULL, 'Skoc', 'Dopole', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(125, NULL, 'Blbec', 'Nejblbejsi', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

DROP TABLE IF EXISTS `a3m_acl_role`;
CREATE TABLE `a3m_acl_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `description` varchar(160) COLLATE utf8_unicode_ci DEFAULT NULL,
  `suspendedon` datetime DEFAULT NULL,
  `is_system` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

TRUNCATE TABLE `a3m_acl_role`;
INSERT INTO `a3m_acl_role` (`id`, `name`, `description`, `suspendedon`, `is_system`) VALUES
(1, 'Admin', 'Website Administrator', NULL, 1),
(2, 'User', 'Website user', NULL, 0),
(3, 'Student', 'Student pro e-learning', NULL, 0),
(4, 'MKB', 'Manager kyberbespecnosti', NULL, 0);

DROP TABLE IF EXISTS `a3m_rel_account_role`;
CREATE TABLE `a3m_rel_account_role` (
  `account_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

TRUNCATE TABLE `a3m_rel_account_role`;
INSERT INTO `a3m_rel_account_role` (`account_id`, `role_id`) VALUES
(1, 1),
(98, 3),
(99, 3),
(100, 3),
(101, 3),
(102, 3),
(103, 3),
(104, 3),
(105, 3),
(106, 3),
(107, 3),
(108, 3),
(109, 3),
(110, 4),
(120, 3),
(121, 3),
(122, 3),
(123, 3),
(124, 3),
(124, 4),
(125, 3);


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

ALTER TABLE `a3m_account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

ALTER TABLE `a3m_account_details`
  ADD PRIMARY KEY (`account_id`);

ALTER TABLE `a3m_acl_role`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `role_name` (`name`);

ALTER TABLE `a3m_rel_account_role`
  ADD PRIMARY KEY (`account_id`,`role_id`);


ALTER TABLE `4m2w_answers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

ALTER TABLE `4m2w_companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `4m2w_company_group`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

ALTER TABLE `4m2w_company_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

ALTER TABLE `4m2w_indiv_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

ALTER TABLE `4m2w_lectures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `4m2w_news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `4m2w_questions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `4m2w_quizzes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `4m2w_rel_quizz_lec`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `4m2w_rel_quizz_que`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

ALTER TABLE `a3m_account`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

ALTER TABLE `a3m_acl_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
