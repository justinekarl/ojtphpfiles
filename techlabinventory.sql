-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2016 at 01:21 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `techlabinventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_to_cart`
--

DROP TABLE IF EXISTS add_to_cart;
DROP TABLE IF EXISTS category;
DROP TABLE IF EXISTS item;
DROP TABLE IF EXISTS logs;
DROP TABLE IF EXISTS subjects;
DROP TABLE IF EXISTS tool_subject;
DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS user_subject;
DROP TABLE IF EXISTS tools;


CREATE TABLE IF NOT EXISTS `add_to_cart` (
  `user_id` int(255) NOT NULL,
  `tool_id` int(255) NOT NULL,
  `quantity_needed` int(255) NOT NULL,
  `date_needed` date NOT NULL,
  `subject_id` int(11) NOT NULL,
  `confirmed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `add_to_cart`
--

INSERT INTO `add_to_cart` (`user_id`, `tool_id`, `quantity_needed`, `date_needed`, `subject_id`, `confirmed`) VALUES
(53, 24, 2, '0000-00-00', 0, 0),
(54, 23, 1, '0000-00-00', 0, 0),
(54, 29, 1, '0000-00-00', 0, 0),
(58, 23, 1, '2016-12-29', 5, 1),
(58, 24, 1, '2016-12-29', 5, 1),
(58, 26, 2, '2016-12-29', 5, 1),
(58, 28, 1, '2016-12-29', 5, 1),
(58, 25, 1, '2016-12-29', 5, 1),
(58, 29, 2, '2016-12-29', 5, 1),
(59, 23, 1, '0000-00-00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
`category_id` int(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `deleted`) VALUES
(11, 'Electrical Tools', 0),
(12, 'Electrical Equipment', 0),
(13, 'Hardware Tools', 0),
(14, 'Consumables', 0);

-- --------------------------------------------------------

--
-- Table structure for table `expiration`
--

CREATE TABLE IF NOT EXISTS `expiration` (
  `account_expiration` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
`item_id` int(255) NOT NULL,
  `tool_id` int(255) NOT NULL,
  `condition` text NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date NOT NULL,
  `category_id` int(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `borrowed` tinyint(1) NOT NULL DEFAULT '0',
  `borrower` int(255) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `brand` text NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `item_description` text NOT NULL,
  `department` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `person_in_charge` varchar(255) NOT NULL,
  `damage` tinyint(1) NOT NULL DEFAULT '0',
  `missing` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `tool_id`, `condition`, `serial_number`, `date_borrowed`, `date_returned`, `category_id`, `deleted`, `borrowed`, `borrower`, `approved`, `brand`, `price`, `item_description`, `department`, `location`, `person_in_charge`, `damage`, `missing`) VALUES
(44, 23, 'New', 'CRT001', '2016-12-19', '0000-00-00', 12, 0, 0, 0, 0, 'AOC', 0, 'White', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(45, 28, 'New', 'HAM001', '2016-12-19', '0000-00-00', 12, 0, 0, 0, 0, 'Generic', 0, 'Wooden Handle', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(46, 25, 'New', 'HAS001', '0000-00-00', '0000-00-00', 13, 0, 0, 0, 0, 'Gordak', 0, '850A Black', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(47, 24, 'New', 'LCT001', '2016-12-19', '0000-00-00', 11, 0, 0, 0, 0, 'Generic', 0, 'White Green', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(48, 24, 'New', 'LCT002', '2016-12-19', '0000-00-00', 12, 0, 0, 0, 0, 'Generic', 0, 'White Green', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(49, 29, 'New', 'LNP001', '2016-12-19', '0000-00-00', 12, 0, 0, 0, 0, 'Stanley', 0, 'Yellow Handle', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(50, 29, 'New', 'LNP002', '0000-00-00', '0000-00-00', 13, 0, 0, 0, 0, 'Stanley', 0, 'Yellow Handle', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(51, 26, 'New', 'MDR001', '2016-12-19', '0000-00-00', 13, 0, 0, 0, 0, 'Generic', 0, 'Red', 'COE', 'Engineering Lab', 'Admin', 0, 0),
(52, 26, 'New', 'MDR002', '2016-12-19', '0000-00-00', 11, 0, 0, 0, 0, 'Generic', 0, 'Red', 'COE', 'Engineering Lab', 'Admin', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE IF NOT EXISTS `logs` (
`log_id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `category_name` varchar(255) NOT NULL,
  `tool_name` varchar(255) NOT NULL,
  `serial_number` varchar(255) NOT NULL,
  `date_borrowed` date NOT NULL,
  `date_returned` date NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_description` text NOT NULL,
  `item_condition` varchar(255) NOT NULL,
  `item_id` int(11) NOT NULL,
  `tool_id` int(255) NOT NULL,
  `category_id` int(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `person_in_charge` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`log_id`, `user_name`, `category_name`, `tool_name`, `serial_number`, `date_borrowed`, `date_returned`, `user_id`, `item_description`, `item_condition`, `item_id`, `tool_id`, `category_id`, `location`, `person_in_charge`, `department`, `first_name`, `last_name`, `remarks`) VALUES
(88, 'admin', 'Electrical Equipment', 'Hammer', 'HAM001', '2016-12-19', '2016-12-19', 20, 'Wooden Handle', 'New', 45, 28, 12, 'Engineering Lab', 'Admin', 'COE', 'Nariza', 'Frianela', 'Damaged'),
(89, 'admin', 'Electrical Tools', 'Lan Cable Tester', 'LCT001', '2016-12-19', '2016-12-19', 20, 'White Green', 'New', 47, 24, 11, 'Engineering Lab', 'Admin', 'COE', 'Nariza', 'Frianela', 'Damaged'),
(90, 'admin', 'Electrical Equipment', 'Lan Cable Tester', 'LCT002', '2016-12-19', '2016-12-19', 20, 'White Green', 'New', 48, 24, 12, 'Engineering Lab', 'Admin', 'COE', 'Nariza', 'Frianela', 'Damaged'),
(91, 'ric', 'Hardware Tools', 'Hot Air Solder', 'HAS001', '2016-12-19', '2016-12-19', 59, '850A Black', 'New', 46, 25, 13, 'Engineering Lab', 'Admin', 'COE', 'Ricardo', 'Banal Jr.', 'Returned OK'),
(92, 'ric', 'Electrical Equipment', 'Long Nose Pliers', 'LNP001', '2016-12-19', '2016-12-19', 59, 'Yellow Handle', 'New', 49, 29, 12, 'Engineering Lab', 'Admin', 'COE', 'Ricardo', 'Banal Jr.', 'Missing'),
(93, 'pat', 'Hardware Tools', 'Hot Air Solder', 'HAS001', '2016-12-19', '2016-12-19', 60, '850A Black', 'New', 46, 25, 13, 'Engineering Lab', 'Admin', 'COE', 'patrick', 'punzalan', 'Returned OK');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE IF NOT EXISTS `subjects` (
`subject_id` int(11) NOT NULL,
  `subject_name` varchar(255) NOT NULL,
  `subject_instructor` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_name`, `subject_instructor`) VALUES
(3, 'CONSYS', 'Mr.Tulan'),
(4, 'CKTS2', 'Mr.Banal'),
(5, 'ENCON', 'Mr.Banal'),
(6, 'SYSARC', 'Mr.Dungca'),
(7, 'LOGSWITCH', 'Mr.Dungca'),
(8, 'ELECS2', 'Mr.Tulan');

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE IF NOT EXISTS `tools` (
`tools_id` int(255) NOT NULL,
  `tool_name` varchar(255) NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `brief_description` text NOT NULL,
  `total_count` int(255) NOT NULL,
  `borrowed` int(255) NOT NULL,
  `photo_path` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=30 ;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`tools_id`, `tool_name`, `category_id`, `brief_description`, `total_count`, `borrowed`, `photo_path`, `deleted`) VALUES
(23, 'CRT Monitor', '12', 'AOC - White', 1, 0, 'crt_monitor6.jpg', 0),
(24, 'Lan Cable Tester', '12', 'Generic - White Green', 2, 0, 'lan_cable_tester2.jpg', 0),
(25, 'Hot Air Solder', '11', 'Gordak - 850A Black', 1, 0, 'Hot_Air_Soldering2.jpg', 0),
(26, 'Mini Drill', '11', 'Generic - Red', 2, 0, 'mini_drill2.jpg', 0),
(27, 'Soldering Iron', '11', 'Generic - Red Handle', 0, 0, 'soldering_iron2.jpg', 0),
(28, 'Hammer', '13', 'Generic - Wooden Handle', 1, 0, 'hammer2.jpg', 0),
(29, 'Long Nose Pliers', '13', 'Stanley - Yellow Handle', 2, 0, 'longnose_pliers2.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tool_subject`
--

CREATE TABLE IF NOT EXISTS `tool_subject` (
  `tool_id` bigint(20) DEFAULT NULL,
  `subject_id` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tool_subject`
--

INSERT INTO `tool_subject` (`tool_id`, `subject_id`) VALUES
(1, 1),
(1, 2),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(6, 1),
(7, 1),
(7, 2),
(8, 1),
(8, 2),
(9, 1),
(9, 2),
(10, 1),
(10, 2),
(11, 1),
(11, 2),
(12, 1),
(12, 2),
(13, 1),
(13, 2),
(14, 1),
(14, 2),
(15, 1),
(15, 2),
(16, 1),
(17, 2),
(18, 1),
(18, 2),
(19, 1),
(19, 4),
(19, 3),
(19, 8),
(19, 5),
(19, 7),
(19, 2),
(19, 6),
(20, 1),
(20, 4),
(20, 3),
(20, 8),
(20, 5),
(20, 7),
(20, 2),
(20, 6),
(21, 1),
(21, 4),
(21, 3),
(21, 8),
(21, 5),
(21, 7),
(21, 2),
(21, 6),
(22, 1),
(22, 4),
(22, 3),
(22, 8),
(22, 5),
(22, 7),
(22, 2),
(22, 6),
(23, 3),
(23, 7),
(24, 4),
(25, 4),
(25, 8),
(26, 3),
(26, 7),
(27, 4),
(27, 8),
(28, 4),
(28, 8),
(29, 4),
(29, 8),
(29, 7);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `permission` varchar(255) NOT NULL,
  `activated` tinyint(1) NOT NULL DEFAULT '0',
  `expiration` date NOT NULL,
  `student_number` varchar(255) NOT NULL,
  `user_photo` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `course` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  `newly_created` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `password`, `permission`, `activated`, `expiration`, `student_number`, `user_photo`, `first_name`, `last_name`, `email`, `course`, `contact_number`, `deleted`, `newly_created`) VALUES
(20, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', 1, '9999-01-01', '0111315988', 'Nariza1.jpg', 'Nariza', 'Frianela', 'Nariza@admin.com', 'CPE', '09061234567', 0, 1),
(53, 'jay', '61a3dd5599a14ade5de91c212073acc2', '0', 1, '2016-12-19', '0112537384', 'default_picture.jpg', 'Jay', 'Miranda', 'jay@yahoo.com', 'CPE', '09738374626', 0, 0),
(58, 'Inavoig', 'eed25936c7ceda832639fabd3c529b25', '0', 1, '2016-12-19', '0113300548', 'sakuragi113.jpg', 'Giovani', 'Lagman', 'lag@gmail.com', 'CPE', '09061234567', 0, 0),
(59, 'ric', 'f2c1c7f1d38175a22173c93c0e6bfe09', '2', 1, '2016-12-19', '111', 'default_picture.jpg', 'Ricardo', 'Banal Jr.', 'Aaa', 'ECE', '000', 0, 0),
(60, 'pat', '15472cd29f632e34f039403f2e635f66', '0', 1, '2016-12-19', '12345', 'default_picture.jpg', 'patrick', 'punzalan', 'me@yahoo.com', 'ECE', '09199992831', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_subject`
--

CREATE TABLE IF NOT EXISTS `user_subject` (
  `subject_id` int(255) NOT NULL,
  `user_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_subject`
--

INSERT INTO `user_subject` (`subject_id`, `user_id`) VALUES
(3, 55),
(4, 56),
(3, 56),
(8, 56),
(6, 56),
(4, 57),
(3, 57),
(8, 57),
(5, 57),
(7, 57),
(6, 57),
(4, 58),
(3, 58),
(8, 58),
(7, 58),
(6, 58),
(4, 59),
(4, 60),
(3, 60),
(8, 60),
(5, 60),
(7, 60),
(6, 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
 ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
 ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
 ADD PRIMARY KEY (`log_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
 ADD PRIMARY KEY (`subject_id`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
 ADD PRIMARY KEY (`tools_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
MODIFY `category_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
MODIFY `item_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
MODIFY `log_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
MODIFY `subject_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
MODIFY `tools_id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
