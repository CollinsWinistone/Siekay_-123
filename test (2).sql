-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 06, 2021 at 10:01 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `id` int(11) UNSIGNED NOT NULL,
  `q_id` int(11) UNSIGNED NOT NULL,
  `answer` varchar(400) NOT NULL,
  `answered_by` int(11) UNSIGNED NOT NULL DEFAULT 6
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='stores answers for particular questions';

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`id`, `q_id`, `answer`, `answered_by`) VALUES
(2, 43, 'it is a collection of data of similar types lol', 6),
(3, 0, 'study of internal body parts', 24),
(4, 41, 'its a communication service', 6),
(5, 40, 'study of living organisms', 22),
(6, 42, 'study of biological chemistry', 46),
(7, 0, 'Branch of medicine', 3),
(8, 43, 'Collection of information of similar types', 6),
(9, 43, 'a list of values', 7),
(10, 44, 'KCA university', 4);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
(1, 'Biochemistry', 'Biochemistry is the branch of science that explores the chemical processes within and\r\nrelated to living organisms.It focuses on processes happening at a molecular level,what\'s happening inside our cells, studying components like proteins, lipids and organelles.'),
(2, 'Anatomy', 'Anatomy is a field in the biological sciences\r\nconcerned with the identification and description\r\nof the body structures of living things. Gross\r\nanatomy involves the study of major body\r\nstructures by dissection and observation and in\r\nits narrowest sense is concerned only with the\r\nhuman body.“Gross anatomy” customarily refers\r\nto the study of those body structures large\r\nenough to be examined without the help of\r\nmagnifying devices, while microscopic anatomy\r\nis concerned with the study of structural units\r\nsmall enough to be seen only with a light\r\nmicroscope.Dissection is basic to all anatomical\r\nresearch. '),
(3, 'Physiology ', 'Physiology is the study of how the human body works. It\r\ndescribes the chemistry and physics behind basic body\r\nfunctions, from how molecules behave in cells to how\r\nsystems of organs work together. It helps us understand\r\nwhat happens in a healthy body in everyday life and what\r\ngoes wrong when someone gets sick.'),
(4, 'Physics', 'Physics is the branch of science that deals with the\r\nstructure of matter and how the fundamental\r\nconstituents of the universe interact. It studies objects\r\nranging from the very small using quantum mechanics to\r\nthe entire universe using general relativity.'),
(5, 'Microbiology ', 'Microbiology is the study of all living organisms\r\nthat are too small to be visible with the naked eye.\r\nThis includes bacteria, archaea, viruses, fungi,\r\nprions, protozoa and algae, collectively known as\r\n\'microbes\'.'),
(6, 'Genetics ', 'Genetics is the study of genes and tries to explain what\r\nthey are and how they work. Genes are how living\r\norganisms inherit features or traits from their ancestors;\r\nfor example, children usually look like their parents\r\nbecause they have inherited their parents\' genes.'),
(7, 'Web development', 'Web development is the building and\r\nmaintenance of websites; it\'s the work that\r\nhappens behind the scenes to make a website\r\nlook great, work fast and perform well with a\r\nseamless user experience. Web developers, or\r\n\'devs\', do this by using a variety of coding\r\nlanguages.'),
(8, 'Mathematics ', 'Mathematics is essential in many fields, including natural\r\nscience , engineering , medicine , finance , and the social\r\nsciences . Applied mathematics has led to entirely new\r\nmathematical disciplines, such as statistics and game\r\ntheory. Mathematicians engage in pure mathematics\r\n(mathematics for its own sake) without having any\r\napplication in mind, but practical applications for what\r\nbegan as pure mathematics are often discovered later.'),
(9, 'Engineering', 'Engineering is the application of science and math to\r\nsolve problems. Engineers figure out how things work and\r\nfind practical uses for scientific discoveries. Scientists\r\nand inventors often get the credit for innovations that\r\nadvance the human condition, but it is engineers who are\r\ninstrumental in making those innovations available to the\r\nworld.'),
(10, 'Economics', 'Economics is a social science concerned with the\r\nproduction, distribution, and consumption of\r\ngoods and services. It studies how individuals,\r\nbusinesses, governments, and nations make\r\nchoices about how to allocate resources.'),
(11, 'Programming', 'Programming is the process of creating a set of\r\ninstructions that tell a computer how to perform a\r\ntask. Programming can be done using a variety of\r\ncomputer programming languages, such as\r\nJavaScript, Python, and C++.'),
(12, 'Brain Games', 'Brain\r\ngames may help sharpen certain thinking skills\r\nthat tend to wane with age, such as processing\r\nspeed, planning skills, reaction time, decision\r\nmaking, and short-term memory.'),
(13, 'other', 'any other category');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `question_id` int(11) UNSIGNED NOT NULL,
  `question` mediumtext NOT NULL,
  `askedby` varchar(255) NOT NULL,
  `answeredby` varchar(255) DEFAULT NULL,
  `category` int(11) UNSIGNED NOT NULL DEFAULT 13
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`question_id`, `question`, `askedby`, `answeredby`, `category`) VALUES
(0, 'what is anatomy', 'makena', NULL, 1),
(40, 'what is biology', 'makena', NULL, 2),
(41, 'what is twitter', 'makena', NULL, 13),
(42, 'what is biochemistry', 'makena', NULL, 13),
(43, 'what is an array', 'makena', NULL, 11),
(44, 'which is the best school to study engineering', 'makena', NULL, 9),
(45, 'what is programming', 'makena', NULL, 12),
(46, 'who is larry page', 'elly', NULL, 11);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) DEFAULT NULL,
  `comment` varchar(200) NOT NULL,
  `comment_sender_name` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like_unlike`
--

CREATE TABLE `tbl_like_unlike` (
  `id` int(11) NOT NULL,
  `member_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `like_unlike` int(2) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_like_unlike`
--

INSERT INTO `tbl_like_unlike` (`id`, `member_id`, `comment_id`, `like_unlike`, `date`) VALUES
(43, 1, 8, 1, '2021-03-18 20:51:17'),
(44, 1, 9, 1, '2021-03-19 16:00:24'),
(45, 1, 10, 1, '2021-03-19 15:58:19'),
(46, 1, 11, 1, '2021-03-19 15:59:47'),
(47, 1, 12, 1, '2021-03-19 15:59:49'),
(48, 1, 13, 1, '2021-03-19 16:00:10'),
(49, 1, 14, 1, '2021-03-19 16:01:08'),
(50, 1, 15, 1, '2021-03-20 21:08:26'),
(51, 1, 16, 1, '2021-03-20 21:08:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `email`, `join_date`) VALUES
(3, 'developer', '$2y$10$j3GdkU2rhUXLxWv2mAFmJuLo3.a4A693l9boml5amliPWmz9g0JTm', 'developer', 'developer@yahoo.com', '2021-03-21 09:35:29'),
(4, 'tutor', '$2y$10$GyE01v4488266cY.7/arPupVJTkZa/bxpqZgkSGhDM32FLzaZFhxC', 'tutor', 'tutor@gmail.com', '2021-03-23 14:19:21'),
(6, 'cosiwa', '$2y$10$AU5QqFFeA2jU9nz1Ewp5xOUSACP1s0HTr287bXMewJcLaTcBCdMDS', 'collins wanjala', 'collins@gmail.com', '2021-03-25 16:59:41'),
(7, 'makena', 'password', 'nabiranda makena', 'nabiranda@gmail.com', '2021-03-29 18:32:11'),
(11, 'elly', 'funny', 'elly wafula', 'elly@gmail.com', '2021-03-29 18:33:56'),
(16, 'sam', 'melvin', 'sam wafula', 'sam@gmail.com', '2021-03-29 18:34:33'),
(21, 'winstone', 'Siekay', 'Collins Winistone', 'win@gmail.com', '2021-03-30 13:58:20'),
(22, 'joan', 'collins', 'joan wanjiru', 'joan@gmail.com', '2021-04-02 01:09:08'),
(24, 'salama', 'collins', 'joan wanjiru', '', '2021-04-02 01:23:51'),
(46, 'salama', 'collins', 'joan wanjiru', '3', '2021-04-02 01:40:51'),
(47, 'test', '$2y$10$73MweYrM4se7tHGiVevSa.Uht22rPXGyoQMdD.9sc8MTBKnfiDbWG', 'test test', 'test@gmail.com', '2021-04-02 05:15:01'),
(48, 'winstone', 'siekay', 'collins winstone', 'cosa@gmail.com', '2021-04-02 05:58:35'),
(49, 'nabiranda', '$2y$10$63hm3QJhBwXwcIunSQdineCUL0.2CdmTn53nQ1YDxaDmYXsU4fGM6', 'collins nabiranda', 'wanjala@gmail.com', '2021-04-05 12:31:52'),
(50, 'lilian', '$2y$10$r.ID3kCmeAWo4by0oQDCyORjhjIqaWnGyETrHUfB5ejb2dV0NNDdi', 'lilian okumu', 'lilianokumu42@gmail.com', '2021-04-06 07:15:04');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `q_ans` (`q_id`),
  ADD KEY `answered_by` (`answered_by`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;
ALTER TABLE `category` ADD FULLTEXT KEY `category_search` (`description`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`question_id`),
  ADD KEY `askedby` (`askedby`),
  ADD KEY `q_cat` (`category`);
ALTER TABLE `question` ADD FULLTEXT KEY `question_search` (`question`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `tbl_like_unlike`
--
ALTER TABLE `tbl_like_unlike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `question_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_like_unlike`
--
ALTER TABLE `tbl_like_unlike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answered_by` FOREIGN KEY (`answered_by`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `q_ans` FOREIGN KEY (`q_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `question`
--
ALTER TABLE `question`
  ADD CONSTRAINT `q_cat` FOREIGN KEY (`category`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
