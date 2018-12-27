CREATE TABLE `4m2w_news` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `slug` varchar(128) NOT NULL,
  `text` text NOT NULL,
  `date_publish` date NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `highlight` tinyint(1) NOT NULL DEFAULT '0',
    PRIMARY KEY (`id`),
    KEY slug (`slug`)
);

CREATE TABLE 4m2w_companies (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        division varchar(128) NOT NULL,
        department varchar(128) NOT NULL,
        notes varchar(128) NULL,
        PRIMARY KEY (id),
        KEY slug (slug)
);

CREATE TABLE 4m2w_course (
        id int(11) NOT NULL AUTO_INCREMENT,
        name varchar(128) NOT NULL,
        slug varchar(128) NOT NULL,
        tema varchar(128) NULL,
        PRIMARY KEY (id),
        KEY slug (slug)
);

CREATE TABLE `4m2w_questions` (
  `id` int(11) NOT NULL,
  `tema` varchar(128) NOT NULL,
  `question` varchar(128) NOT NULL,
  `true_id_answer` int(11) NOT NULL,
  `false1_id_answer` int(11) NOT NULL,
  `false2_id_answer` int(11) NOT NULL,
  `false3_id_answer` int(11) NULL,
    PRIMARY KEY (`id`)
);

CREATE TABLE 4m2w_answers (
        id int(11) NOT NULL AUTO_INCREMENT,
        answers varchar(128) NOT NULL,
        PRIMARY KEY (id),
        KEY id (id)
);

CREATE TABLE 4m2w_lectures (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `name` varchar(128) NOT NULL,      
        `tema` varchar(128) NULL,
        `lecture` varchar(128) NULL,
        PRIMARY KEY (`id`)
);

CREATE TABLE 4m2w_T_course (
        id int(11) NOT NULL AUTO_INCREMENT,
        course_id int(11) NOT NULL,
        questions_id int(11) NULL,
        lectures_id int(11) NULL,
        PRIMARY KEY (id),
        KEY id_course (course_id)
);