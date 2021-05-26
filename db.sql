-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 24, 2019 at 11:43 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `teacher`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--
-- Creation: Mar 18, 2019 at 11:05 AM
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `slot` varchar(10) NOT NULL,
  `book_date` varchar(50) NOT NULL,
  `status` enum('00','01','11') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `bookings`:
--

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `parent_id`, `teacher_id`, `subject_id`, `slot`, `book_date`, `status`) VALUES
(18, 8, 7, 1, 'slot1', '21/03/2019 11:36', '11'),
(21, 8, 9, 3, 'slot5', '24/03/2019 09:00', '00'),
(24, 8, 9, 3, 'slot2', '24/03/2019 13:37', '11');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--
-- Creation: Mar 18, 2019 at 10:22 AM
--

CREATE TABLE `items` (
  `id` int(11) NOT NULL,
  `unit_title` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `items`:
--

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `unit_title`) VALUES
(1, 'Mathematics'),
(2, 'English'),
(3, 'Biology'),
(4, 'Kiswahili'),
(5, 'Chemistry'),
(6, 'Physics'),
(9, 'History'),
(10, 'Geography');

-- --------------------------------------------------------

--
-- Table structure for table `notify`
--
-- Creation: Mar 05, 2019 at 02:40 PM
--

CREATE TABLE `notify` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `msg_time` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `notify`:
--

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--
-- Creation: Mar 21, 2019 at 07:13 AM
--

CREATE TABLE `slots` (
  `id` int(11) NOT NULL,
  `t_id` int(11) NOT NULL,
  `slot1` enum('0','1') NOT NULL,
  `slot2` enum('0','1') NOT NULL,
  `slot3` enum('0','1') NOT NULL,
  `slot4` enum('0','1') NOT NULL,
  `slot5` enum('0','1') NOT NULL,
  `slot6` enum('0','1') NOT NULL,
  `slot7` enum('0','1') NOT NULL,
  `slot8` enum('0','1') NOT NULL,
  `slot9` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `slots`:
--

--
-- Dumping data for table `slots`
--

INSERT INTO `slots` (`id`, `t_id`, `slot1`, `slot2`, `slot3`, `slot4`, `slot5`, `slot6`, `slot7`, `slot8`, `slot9`) VALUES
(4, 7, '1', '0', '0', '0', '0', '1', '0', '0', '0'),
(5, 9, '0', '1', '0', '0', '1', '0', '0', '0', '0');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--
-- Creation: Mar 21, 2019 at 06:51 AM
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `t_id` int(25) NOT NULL,
  `sub1` int(11) NOT NULL,
  `sub2` int(11) NOT NULL,
  `sub3` int(11) NOT NULL,
  `sub4` int(11) NOT NULL,
  `sub5` int(11) NOT NULL,
  `sub6` int(11) NOT NULL,
  `sub7` int(11) NOT NULL,
  `sub8` int(11) NOT NULL,
  `sub9` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `subjects`:
--

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `t_id`, `sub1`, `sub2`, `sub3`, `sub4`, `sub5`, `sub6`, `sub7`, `sub8`, `sub9`) VALUES
(16, 7, 1, 2, 3, 0, 5, 6, 0, 0, 0),
(17, 9, 1, 2, 3, 5, 0, 0, 9, 0, 10);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_profile`
--
-- Creation: Mar 24, 2019 at 10:00 AM
--

CREATE TABLE `teacher_profile` (
  `id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `pri_sch` varchar(25) NOT NULL,
  `sec_sch` varchar(25) NOT NULL,
  `post_sch` varchar(25) NOT NULL,
  `current_work` varchar(50) NOT NULL,
  `work_exp` int(11) NOT NULL,
  `county` varchar(25) NOT NULL,
  `sub_county` varchar(25) NOT NULL,
  `street` varchar(25) NOT NULL,
  `house_no` varchar(15) NOT NULL,
  `email` varchar(25) NOT NULL,
  `phones` varchar(30) NOT NULL,
  `other_desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `teacher_profile`:
--

--
-- Dumping data for table `teacher_profile`
--

INSERT INTO `teacher_profile` (`id`, `u_id`, `title`, `pri_sch`, `sec_sch`, `post_sch`, `current_work`, `work_exp`, `county`, `sub_county`, `street`, `house_no`, `email`, `phones`, `other_desc`) VALUES
(9, 9, 'Prof', 'Kilimani', 'Maranda High', 'University Of Nairobi', 'Head Teacher', 8, 'Nairobi', 'Kibera', 'Ngong Rd', 'HSE25', 'odhiambo@gmail.com', '074689958/075849625', 'I have been in teaching for over ten years and i have been awarded best teacher of the year award.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Mar 19, 2019 at 05:44 AM
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `fname` varchar(25) NOT NULL,
  `lname` varchar(25) NOT NULL,
  `contacts` varchar(25) NOT NULL,
  `idno` varchar(10) NOT NULL,
  `location` varchar(25) NOT NULL,
  `ip_address` varchar(25) NOT NULL,
  `tsc_no` varchar(25) NOT NULL,
  `sex` varchar(2) NOT NULL,
  `user_level` varchar(25) NOT NULL,
  `password` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `users`:
--

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `fname`, `lname`, `contacts`, `idno`, `location`, `ip_address`, `tsc_no`, `sex`, `user_level`, `password`) VALUES
(7, 'Alphonce', 'Odhiambo', '0707424669', '32965720', 'Nairobi', '127.0.0.1', '002', 'M', 'teacher', 'b63accd09beffd7393fbd6b1c7d02dfd166cf4100e0588a2dcfcffe0814d0d6c'),
(8, 'Anne', 'Liz', '070742488', '32965721', 'Nairobi', '127.0.0.1', 'nill', 'F', 'parent', '8fba28a6331f19cc18a39cd6c3844ed2048f9933ad3eac06fa2f31e9224c8d6e'),
(9, 'Oywech', 'Odhiambo', '0707424669', '32965722', 'Mombasa', '127.0.0.1', '32965722', 'M', 'teacher', '551fb0ee9eae53b279617726b20ab80cf3db3362f8013cb4f2d065f865984f99'),
(10, '', '', '', '', '', '127.0.0.1', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notify`
--
ALTER TABLE `notify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slots`
--
ALTER TABLE `slots`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_id` (`t_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `t_id` (`t_id`);

--
-- Indexes for table `teacher_profile`
--
ALTER TABLE `teacher_profile`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `u_id` (`u_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `idno` (`idno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `notify`
--
ALTER TABLE `notify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slots`
--
ALTER TABLE `slots`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `teacher_profile`
--
ALTER TABLE `teacher_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
