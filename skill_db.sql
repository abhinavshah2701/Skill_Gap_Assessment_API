-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2018 at 06:36 PM
-- Server version: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skill_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `category_id` int(11) NOT NULL,
  `category_description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`category_id`, `category_description`) VALUES
(48, 'Technical'),
(49, 'Communications'),
(50, 'Soft'),
(51, 'Behavioural');

-- --------------------------------------------------------

--
-- Table structure for table `employee_master`
--

CREATE TABLE `employee_master` (
  `employee_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `form_master`
--

CREATE TABLE `form_master` (
  `form_id` int(11) NOT NULL,
  `skill_id` int(11) DEFAULT NULL,
  `form_name` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `form_master`
--

INSERT INTO `form_master` (`form_id`, `skill_id`, `form_name`) VALUES
(1, 1, 'Html Form'),
(2, 2, 'Communication Form');

-- --------------------------------------------------------

--
-- Table structure for table `manager_master`
--

CREATE TABLE `manager_master` (
  `manager_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_master`
--

CREATE TABLE `question_master` (
  `question_id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `question_type` enum('Single Choice','Multiple Choice') NOT NULL,
  `question_description` varchar(255) NOT NULL,
  `total_rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_master`
--

INSERT INTO `question_master` (`question_id`, `form_id`, `question_type`, `question_description`, `total_rating`) VALUES
(1, 1, 'Single Choice', 'Quis omnis sed non est non architecto odit sed enim architecto sint dolor nostrud', 10),
(2, 1, 'Multiple Choice', 'Eum tempore in sit velit accusamus cumque et non distinctio Proident maxime voluptate sit molestias consectetur quia saepe a', 20),
(3, 2, 'Multiple Choice', 'Quia maiores impedit nobis reprehenderit quae consequatur Consequuntur minim perferendis', 30);

-- --------------------------------------------------------

--
-- Table structure for table `question_option_master`
--

CREATE TABLE `question_option_master` (
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_description` varchar(50) NOT NULL,
  `correct_option` enum('Yes','No') NOT NULL,
  `option_rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `question_option_master`
--

INSERT INTO `question_option_master` (`question_id`, `option_id`, `option_description`, `correct_option`, `option_rating`) VALUES
(1, 1, 'ipsum', 'No', 0),
(1, 2, 'sed', 'Yes', 10),
(1, 3, 'voluptatem', 'No', 0),
(2, 1, 'sequi', 'Yes', 10),
(2, 2, 'magnam', 'No', 0),
(2, 3, 'excepturi', 'Yes', 10),
(2, 4, 'sit', 'No', 0),
(3, 1, 'Molestiae', 'No', 0),
(3, 2, 'tenetur', 'Yes', 10),
(3, 3, 'omnis', 'Yes', 10),
(3, 4, 'animi', 'Yes', 10);

-- --------------------------------------------------------

--
-- Table structure for table `skill_master`
--

CREATE TABLE `skill_master` (
  `skill_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `skill_description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `skill_master`
--

INSERT INTO `skill_master` (`skill_id`, `sub_category_id`, `skill_description`) VALUES
(1, 68, 'Html'),
(2, 69, 'Solo'),
(3, 71, 'Test Skill');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_master`
--

CREATE TABLE `sub_category_master` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category_master`
--

INSERT INTO `sub_category_master` (`sub_category_id`, `category_id`, `sub_category_description`) VALUES
(72, 48, 'Java'),
(71, 51, 'Test'),
(73, 48, 'client server'),
(68, 48, 'Web'),
(69, 49, 'Learn');

-- --------------------------------------------------------

--
-- Table structure for table `user_master`
--

CREATE TABLE `user_master` (
  `user_id` int(11) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) DEFAULT NULL,
  `last_name` varchar(30) NOT NULL,
  `gender` enum('Male','Female') DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `passwd` varchar(255) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `user_type` enum('Admin','Employee','Manager','Client') DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_master`
--

INSERT INTO `user_master` (`user_id`, `first_name`, `middle_name`, `last_name`, `gender`, `email`, `passwd`, `contact`, `user_type`) VALUES
(1, 'Abhinav', 'Kirankumar', 'Shah', 'Male', 'abhinavk.shah@gmail.com', '1bbd886460827015e5d605ed44252251', '9427021031', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `user_response`
--

CREATE TABLE `user_response` (
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `question_total_rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_response_option`
--

CREATE TABLE `user_response_option` (
  `user_response_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`category_id`),
  ADD UNIQUE KEY `category_description` (`category_description`);

--
-- Indexes for table `employee_master`
--
ALTER TABLE `employee_master`
  ADD PRIMARY KEY (`employee_id`);

--
-- Indexes for table `form_master`
--
ALTER TABLE `form_master`
  ADD PRIMARY KEY (`form_id`),
  ADD UNIQUE KEY `form_name` (`form_name`);

--
-- Indexes for table `manager_master`
--
ALTER TABLE `manager_master`
  ADD PRIMARY KEY (`manager_id`);

--
-- Indexes for table `question_master`
--
ALTER TABLE `question_master`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `question_option_master`
--
ALTER TABLE `question_option_master`
  ADD PRIMARY KEY (`question_id`,`option_id`);

--
-- Indexes for table `skill_master`
--
ALTER TABLE `skill_master`
  ADD PRIMARY KEY (`skill_id`),
  ADD UNIQUE KEY `skill_description` (`skill_description`);

--
-- Indexes for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  ADD PRIMARY KEY (`sub_category_id`),
  ADD UNIQUE KEY `sub_category_description` (`sub_category_description`);

--
-- Indexes for table `user_master`
--
ALTER TABLE `user_master`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contact` (`contact`);

--
-- Indexes for table `user_response`
--
ALTER TABLE `user_response`
  ADD PRIMARY KEY (`user_id`,`employee_id`,`question_id`);

--
-- Indexes for table `user_response_option`
--
ALTER TABLE `user_response_option`
  ADD PRIMARY KEY (`user_response_id`,`option_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_master`
--
ALTER TABLE `form_master`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `manager_master`
--
ALTER TABLE `manager_master`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_master`
--
ALTER TABLE `question_master`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `skill_master`
--
ALTER TABLE `skill_master`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
