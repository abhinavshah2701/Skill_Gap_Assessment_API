-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2018 at 07:24 AM
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
  `question_type` enum('Single Option','Multiple Option') DEFAULT NULL,
  `question_description` varchar(255) NOT NULL,
  `total_rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `question_option_master`
--

CREATE TABLE `question_option_master` (
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_description` varchar(50) NOT NULL,
  `correct_option` enum('true','false') DEFAULT NULL,
  `option_rating` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skill_master`
--

CREATE TABLE `skill_master` (
  `skill_id` int(11) NOT NULL,
  `sub_category_id` int(11) DEFAULT NULL,
  `skill_description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category_master`
--

CREATE TABLE `sub_category_master` (
  `sub_category_id` int(11) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `sub_category_description` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

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
(1, 'Abhinav', 'Kirankumar', 'Shah', 'Male', 'abhinavk.shah@gmail.com', '1bbd886460827015e5d605ed44252251', '9427021031', 'Employee');

-- --------------------------------------------------------

--
-- Table structure for table `user_response`
--

CREATE TABLE `user_response` (
  `user_id` int(11) NOT NULL,
  `employee_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `form_id` int(11) DEFAULT NULL,
  `question_total_rating` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_response_option`
--

CREATE TABLE `user_response_option` (
  `user_response_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `option_rating` varchar(100) NOT NULL
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
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `employee_master`
--
ALTER TABLE `employee_master`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `form_master`
--
ALTER TABLE `form_master`
  MODIFY `form_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `manager_master`
--
ALTER TABLE `manager_master`
  MODIFY `manager_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `question_master`
--
ALTER TABLE `question_master`
  MODIFY `question_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `skill_master`
--
ALTER TABLE `skill_master`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sub_category_master`
--
ALTER TABLE `sub_category_master`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_master`
--
ALTER TABLE `user_master`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
