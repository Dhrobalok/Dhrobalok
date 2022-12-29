-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2020 at 07:43 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `image`, `date`) VALUES
(1, 'Rashedul islam', 'rashedcse447@gmail.com', '12345', '1581762882.jpg', '2020-02-15 10:34:42'),
(2, 'Sourav Malllick', 'souravmallick738@gmail.com', '12345', '1581935383.jpg', '2020-02-17 10:29:43');

-- --------------------------------------------------------

--
-- Table structure for table `adminapprov`
--

CREATE TABLE `adminapprov` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL,
  `t_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `adminapprov`
--

INSERT INTO `adminapprov` (`id`, `name`, `email`, `password`, `image`, `t_id`) VALUES
(7, 'Rashedul islam', 'rashedcse447@gmail.com', '12345', '1580098622.jpg', 1),
(8, 'Sourav Mallick', 'souravmallick738@gmail.com', '12345', '1581937671.jpg', 3);

-- --------------------------------------------------------

--
-- Table structure for table `advisenotice`
--

CREATE TABLE `advisenotice` (
  `id` int(11) NOT NULL,
  `session` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `title` varchar(25) NOT NULL,
  `examdate` varchar(40) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `advisenotice`
--

INSERT INTO `advisenotice` (`id`, `session`, `semester`, `title`, `examdate`, `date`) VALUES
(7, '2014-2015', '1st', 'exam will be start on', '2020-02-23', '2020-01-30 05:25:54'),
(8, '201-2015', '2nd', 'advise student', '2020-01-08', '2020-01-29 09:51:03');

-- --------------------------------------------------------

--
-- Table structure for table `attendence mark`
--

CREATE TABLE `attendence mark` (
  `id` int(11) NOT NULL,
  `roll` int(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `mark` double NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(11) NOT NULL,
  `session` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `credit` double NOT NULL,
  `semester` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`id`, `session`, `course`, `credit`, `semester`, `date`) VALUES
(14, '2014-2015', 'CSE 4101', 3, '7th', '2020-02-15 01:24:40'),
(15, '2014-2015', 'CSE 4102', 1.5, '7th', '2020-02-15 01:24:52'),
(16, '2014-2015', 'CSE 4103', 3, '7th', '2020-02-15 01:25:04'),
(17, '2014-2015', 'CSE 4104', 1.5, '7th', '2020-02-15 01:25:16'),
(18, '2014-2015', 'CSE 4105', 3, '7th', '2020-02-15 01:25:28'),
(19, '2014-2015', 'CSE 4107', 3, '7th', '2020-02-15 01:25:39');

-- --------------------------------------------------------

--
-- Table structure for table `coursealocate2`
--

CREATE TABLE `coursealocate2` (
  `id` int(11) NOT NULL,
  `course` varchar(25) NOT NULL,
  `session` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursealocate2`
--

INSERT INTO `coursealocate2` (`id`, `course`, `session`, `semester`, `tid`) VALUES
(4, 'CSE 4101', '2014-2015', '7th', 1),
(5, 'CSE 4102', '2014-2015', '7th', 1),
(6, 'CSE 4103', '2014-2015', '7th', 1),
(7, 'CSE 4104', '2014-2015', '7th', 1),
(8, 'CSE 4105', '2014-2015', '7th', 2),
(9, 'CSE 4107', '2014-2015', '7th', 2),
(10, 'CSE 4103', '2014-2015', '7th', 3);

-- --------------------------------------------------------

--
-- Table structure for table `coursemark2`
--

CREATE TABLE `coursemark2` (
  `id` int(11) NOT NULL,
  `roll` int(25) NOT NULL,
  `session` varchar(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `credit` double NOT NULL,
  `mark` double NOT NULL,
  `ct1` double NOT NULL,
  `ct2` double NOT NULL,
  `ct3` double NOT NULL,
  `ca` int(25) NOT NULL,
  `besttwo` double NOT NULL,
  `semester` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coursemark2`
--

INSERT INTO `coursemark2` (`id`, `roll`, `session`, `course`, `credit`, `mark`, `ct1`, `ct2`, `ct3`, `ca`, `besttwo`, `semester`, `date`) VALUES
(121, 150151, '2014-2015', 'CSE 4101', 3, 44, 9, 5, 9, 10, 18, '1st', '2020-02-08 05:15:23'),
(125, 150151, '2014-2015', 'CSE 4102', 1.5, 30, 4, 6, 8, 10, 14, '1st', '2020-02-08 05:16:22'),
(129, 150151, '2014-2015', 'CSE 4103', 3, 30, 4, 4, 5, 10, 9, '1st', '2020-02-08 05:17:45'),
(133, 150151, '2014-2015', 'CSE 4104', 1.5, 50, 2, 6, 1, 10, 8, '1st', '2020-02-08 05:18:36'),
(137, 150151, '2014-2015', 'CSE 4105', 3, 44, 9, 4, 5, 10, 14, '1st', '2020-02-08 05:21:37'),
(141, 150151, '2014-2015', 'CSE 4107', 3, 44, 6, 7, 2, 0, 13, '1st', '2020-02-08 05:22:21');

--
-- Triggers `coursemark2`
--
DELIMITER $$
CREATE TRIGGER `insert` AFTER INSERT ON `coursemark2` FOR EACH ROW INSERT INTO result VALUES(null,New.roll,New.session,New.course,New.credit,New.mark,New.ct1,New.ct2,New.ct3,New.ca,New.besttwo,New.semester,NOW())
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `coursesignature`
--

CREATE TABLE `coursesignature` (
  `id` int(11) NOT NULL,
  `course` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `examguard`
--

CREATE TABLE `examguard` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `guarddate` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examguard`
--

INSERT INTO `examguard` (`id`, `name`, `guarddate`) VALUES
(4, 'rashedcse447@gmail.com', '2020-02-25');

-- --------------------------------------------------------

--
-- Table structure for table `examregistration`
--

CREATE TABLE `examregistration` (
  `id` int(11) NOT NULL,
  `examname` varchar(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `dob` varchar(25) NOT NULL,
  `fn` varchar(25) NOT NULL,
  `mn` varchar(25) NOT NULL,
  `halname` varchar(25) NOT NULL,
  `roll` int(25) NOT NULL,
  `regno` int(25) NOT NULL,
  `session` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `code` varchar(25) NOT NULL,
  `vname` varchar(25) NOT NULL,
  `post` varchar(25) NOT NULL,
  `mobile` int(25) NOT NULL,
  `upozila` varchar(25) NOT NULL,
  `district` varchar(50) NOT NULL,
  `image` varchar(25) NOT NULL,
  `acknowledge` varchar(70) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examregistration`
--

INSERT INTO `examregistration` (`id`, `examname`, `name`, `dob`, `fn`, `mn`, `halname`, `roll`, `regno`, `session`, `semester`, `code`, `vname`, `post`, `mobile`, `upozila`, `district`, `image`, `acknowledge`, `date`) VALUES
(29, 'regular', 'Rashedul islam', '1992-04-02', 'Shakender ali', 'Shobname', 'BSMH', 150151, 101676, '2014-2015', '7th', 'CSE 4104', 'Kusumba', 'kusumba', 1765389556, 'manda', 'Naogaon District', '1581733313.jpg', 'confirm all data right', '2020-02-15 02:21:53'),
(30, 'regular', 'Rashedul islam', '1992-04-02', 'Shakender ali', 'Shobname', 'BSMH', 150151, 101676, '2014-2015', '7th', 'CSE 4105', 'Kusumba', 'kusumba', 1765389556, 'manda', 'Naogaon District', '1581733313.jpg', 'confirm all data right', '2020-02-15 02:21:53'),
(31, 'regular', 'Rashedul islam', '1992-04-02', 'Shakender ali', 'Shobname', 'BSMH', 150151, 101676, '2014-2015', '7th', 'CSE 4107', 'Kusumba', 'kusumba', 1765389556, 'manda', 'Naogaon District', '1581733313.jpg', 'confirm all data right', '2020-02-15 02:21:54'),
(32, 'regular', 'Rashedul islam', '1992-04-02', 'Shakender ali', 'Shobname', 'BSMH', 150151, 101676, '2014-2015', '7th', 'CSE 4102', 'Kusumba', 'kusumba', 1765389556, 'manda', 'Naogaon District', '1581733313.jpg', 'confirm all data right', '2020-02-15 02:21:54'),
(33, 'regular', 'Rashedul islam', '1992-04-02', 'Shakender ali', 'Shobname', 'BSMH', 150151, 101676, '2014-2015', '7th', 'CSE 4103', 'Kusumba', 'kusumba', 1765389556, 'manda', 'Naogaon District', '1581733313.jpg', 'confirm all data right', '2020-02-15 02:21:54'),
(34, 'regular', 'Rashedul islam', '1992-04-02', 'Shakender ali', 'Shobname', 'BSMH', 150151, 101676, '2014-2015', '7th', 'CSE 4101', 'Kusumba', 'kusumba', 1765389556, 'manda', 'Naogaon District', '1581733313.jpg', 'confirm all data right', '2020-02-15 02:21:54');

-- --------------------------------------------------------

--
-- Table structure for table `failsubject`
--

CREATE TABLE `failsubject` (
  `id` int(11) NOT NULL,
  `course` varchar(25) NOT NULL,
  `session` varchar(25) NOT NULL,
  `roll` int(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `examname` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `failsubject`
--

INSERT INTO `failsubject` (`id`, `course`, `session`, `roll`, `semester`, `examname`, `date`) VALUES
(75, 'CSE 4102', '2014-2015', 150151, '7th', 'improve', '2020-02-15 02:38:14'),
(76, 'CSE 4102', '2014-2015', 150151, '7th', 'improve', '2020-02-15 02:38:14'),
(77, 'CSE 4102', '2014-2015', 150151, '7th', 'improve', '2020-02-15 02:38:14'),
(78, 'CSE 4102', '2014-2015', 150151, '7th', 'improve', '2020-02-15 02:38:14');

-- --------------------------------------------------------

--
-- Table structure for table `file`
--

CREATE TABLE `file` (
  `id` int(10) NOT NULL,
  `title` varchar(25) NOT NULL,
  `file` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file`
--

INSERT INTO `file` (`id`, `title`, `file`, `date`) VALUES
(2, 'class routine', '1578148990.jpg', '2020-01-04 14:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `improveaprove`
--

CREATE TABLE `improveaprove` (
  `id` int(11) NOT NULL,
  `session` varchar(25) NOT NULL,
  `roll` int(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `examname` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `improveaprove`
--

INSERT INTO `improveaprove` (`id`, `session`, `roll`, `semester`, `course`, `examname`, `image`, `date`) VALUES
(103, '2014-2015', 150151, '7th', 'CSE 4102', 'improve', '1581241535.jpg', '2020-02-15 02:39:21'),
(104, '2014-2015', 150151, '7th', 'CSE 4103', 'improve', '1581241535.jpg', '2020-02-15 02:39:21'),
(105, '2014-2015', 150151, '7th', 'CSE 4107', 'improve', '1581241535.jpg', '2020-02-15 02:39:21');

-- --------------------------------------------------------

--
-- Table structure for table `improveteacher`
--

CREATE TABLE `improveteacher` (
  `id` int(11) NOT NULL,
  `session` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `t_id` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `improveteacher`
--

INSERT INTO `improveteacher` (`id`, `session`, `semester`, `course`, `t_id`) VALUES
(49, '2014-2015', '7th', 'CSE 4107', 1),
(50, '2014-2015', '7th', 'CSE 4102', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`id`, `email`, `token`, `created_at`, `updated_at`) VALUES
(6, 'rashedcse447@gmail.com', '$2y$10$ihr6pGGiyrKQU75m11hOPebgbHjejL/DzvT9EUtI7v25mCnvIPy56', '2020-01-07 08:13:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `id` int(11) NOT NULL,
  `roll` int(25) NOT NULL,
  `session` varchar(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `credit` double NOT NULL,
  `mark` double NOT NULL,
  `ct1` double NOT NULL,
  `ct2` double NOT NULL,
  `ct3` double NOT NULL,
  `ca` int(25) NOT NULL,
  `besttwo` double NOT NULL,
  `semester` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`id`, `roll`, `session`, `course`, `credit`, `mark`, `ct1`, `ct2`, `ct3`, `ca`, `besttwo`, `semester`, `date`) VALUES
(98, 150151, '2014-2015', 'CSE 4100', 1.5, 44, 9, 6, 9, 0, 18, '7th', '2020-02-15 02:36:23'),
(115, 150151, '2014-2015', 'CSE 4101', 3, 44, 9, 5, 9, 10, 18, '7th', '2020-02-15 02:36:23'),
(119, 150151, '2014-2015', 'CSE 4102', 1.5, 10, 4, 6, 8, 10, 14, '7th', '2020-02-15 02:36:23'),
(123, 150151, '2014-2015', 'CSE 4103', 3, 30, 4, 4, 5, 10, 9, '7th', '2020-02-15 02:36:23'),
(127, 150151, '2014-2015', 'CSE 4104', 1.5, 50, 2, 6, 1, 10, 8, '7th', '2020-02-15 02:36:23'),
(131, 150151, '2014-2015', 'CSE 4105', 3, 44, 9, 4, 5, 10, 14, '7th', '2020-02-15 02:36:23'),
(135, 150151, '2014-2015', 'CSE 4107', 3, 44, 6, 7, 2, 0, 13, '7th', '2020-02-15 02:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `semailverify`
--

CREATE TABLE `semailverify` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semailverify`
--

INSERT INTO `semailverify` (`id`, `email`, `date`) VALUES
(1, 'rashedcse447@gmail.com', '2020-01-20 10:59:31'),
(3, 'rashedcse447@gmail.com', '2020-02-02 08:11:34'),
(4, 'rashedcse447@gmail.com', '2020-02-02 08:14:40'),
(5, 'souravmallick738@gmail.com', '2020-02-17 11:42:49'),
(6, 'souravmallick738@gmail.com', '2020-02-17 11:43:04');

-- --------------------------------------------------------

--
-- Table structure for table `signature`
--

CREATE TABLE `signature` (
  `id` int(11) NOT NULL,
  `session` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signature`
--

INSERT INTO `signature` (`id`, `session`, `semester`, `image`, `date`) VALUES
(2, '2014-2015', '7th', '1581644864.PNG', '2020-02-15 09:18:05');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(355) NOT NULL,
  `session` varchar(25) NOT NULL,
  `roll` int(25) NOT NULL,
  `blood` varchar(25) NOT NULL,
  `mobile` int(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `name`, `email`, `password`, `session`, `roll`, `blood`, `mobile`, `image`, `date`) VALUES
(16, 'Rashedul islam', 'rashedcse447@gmail.com', '12345', '2014-2015', 150151, 'A+', 1765389556, '1581765083.jpg', '2020-02-15 11:11:50'),
(17, 'Sourav Mallick', 'souravmallick738@gmail.com', '12345', '2014-2015', 150141, 'B+', 1964142837, '1581934793.jpg', '2020-02-17 10:21:37');

-- --------------------------------------------------------

--
-- Table structure for table `studentattend`
--

CREATE TABLE `studentattend` (
  `id` int(11) NOT NULL,
  `student_roll` int(25) NOT NULL,
  `attendence` varchar(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `t_id` int(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentattend`
--

INSERT INTO `studentattend` (`id`, `student_roll`, `attendence`, `course`, `semester`, `t_id`, `date`) VALUES
(32, 150152, 'present', 'CSE 4101', '7th', 1, '2020-02-15 02:19:29'),
(33, 150151, 'present', 'CSE 4101', '7th', 1, '2020-02-15 02:19:29'),
(34, 150153, 'present', 'CSE 4101', '7th', 1, '2020-02-15 02:19:29'),
(35, 150154, 'present', 'CSE 4101', '7th', 1, '2020-02-15 02:19:29'),
(36, 150152, 'Absence', 'CSE 4102', '7th', 1, '2020-02-15 02:19:29'),
(37, 150151, 'present', 'CSE 4102', '7th', 1, '2020-02-15 02:19:29'),
(38, 150153, 'Absence', 'CSE 4102', '7th', 1, '2020-02-15 02:19:29'),
(39, 150154, 'present', 'CSE 4102', '7th', 1, '2020-02-15 02:19:29'),
(40, 150152, 'present', 'CSE 4103', '7th', 1, '2020-02-15 02:19:29'),
(41, 150151, 'present', 'CSE 4103', '7th', 1, '2020-02-15 02:19:29'),
(42, 150153, 'present', 'CSE 4103', '7th', 1, '2020-02-15 02:19:29'),
(43, 150154, 'Absence', 'CSE 4103', '7th', 1, '2020-02-15 02:19:29'),
(44, 150152, 'present', 'CSE 4104', '7th', 1, '2020-02-15 02:19:29'),
(45, 150151, 'present', 'CSE 4104', '7th', 1, '2020-02-15 02:19:29'),
(46, 150153, 'present', 'CSE 4104', '7th', 1, '2020-02-15 02:19:29'),
(47, 150154, 'Absence', 'CSE 4104', '7th', 1, '2020-02-15 02:19:29'),
(48, 150152, 'present', 'CSE 4105', '7th', 2, '2020-02-15 02:19:29'),
(49, 150151, 'present', 'CSE 4105', '7th', 2, '2020-02-15 02:19:29'),
(50, 150153, 'present', 'CSE 4105', '7th', 2, '2020-02-15 02:19:29'),
(51, 150154, 'present', 'CSE 4105', '7th', 2, '2020-02-15 02:19:29'),
(52, 150152, 'present', 'CSE 4107', '7th', 2, '2020-02-15 02:19:29'),
(53, 150151, 'present', 'CSE 4107', '7th', 2, '2020-02-15 02:19:29'),
(54, 150153, 'present', 'CSE 4107', '7th', 2, '2020-02-15 02:19:29'),
(55, 150154, 'Absence', 'CSE 4107', '7th', 2, '2020-02-15 02:19:29'),
(58, 150153, 'present', 'CSE 4108', '7th', 2, '2020-02-15 02:19:29'),
(59, 150154, 'Absence', 'CSE 4108', '7th', 2, '2020-02-15 02:19:29'),
(60, 150151, 'present', 'CSE 4103', '7th', 3, '2017-02-20 08:00:00'),
(61, 150141, 'Absence', 'CSE 4103', '7th', 3, '2017-02-20 08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `studentimprove`
--

CREATE TABLE `studentimprove` (
  `id` int(11) NOT NULL,
  `session` varchar(25) NOT NULL,
  `roll` int(25) NOT NULL,
  `semester` varchar(25) NOT NULL,
  `course` varchar(25) NOT NULL,
  `examname` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentimprove`
--

INSERT INTO `studentimprove` (`id`, `session`, `roll`, `semester`, `course`, `examname`, `date`) VALUES
(60, '2014-2015', 150151, '7th', 'CSE 4103', 'improve', '2020-02-15 11:35:01'),
(61, '2014-2015', 150151, '7th', 'CSE 4107', 'improve', '2020-02-15 11:35:01');

-- --------------------------------------------------------

--
-- Table structure for table `studentnotice`
--

CREATE TABLE `studentnotice` (
  `id` int(11) NOT NULL,
  `title` varchar(25) NOT NULL,
  `image` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentnotice`
--

INSERT INTO `studentnotice` (`id`, `title`, `image`, `date`) VALUES
(16, 'result publish', '1579679188.jpg', '2020-01-22 07:46:28'),
(17, 'advise student', '1579680236.pptx', '2020-01-22 08:03:56'),
(18, 'fdfgfdgdf', '1579680480.pdf', '2020-01-22 08:08:00'),
(19, 'dgfgg', '1579683497.pdf', '2020-01-22 08:58:17');

-- --------------------------------------------------------

--
-- Table structure for table `suparadmin2`
--

CREATE TABLE `suparadmin2` (
  `id` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suparadmin2`
--

INSERT INTO `suparadmin2` (`id`, `email`, `password`, `date`) VALUES
(1, 'rashedcse447@gmail.com', '123456', '2020-01-19 05:08:16');

-- --------------------------------------------------------

--
-- Table structure for table `suparadminapprove`
--

CREATE TABLE `suparadminapprove` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `suparadminapprove`
--

INSERT INTO `suparadminapprove` (`id`, `email`) VALUES
(2, 'rashedcse447@gmail.com'),
(3, 'rashedcse447@gmail.com'),
(4, 'souravmallick738@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `teacher`
--

CREATE TABLE `teacher` (
  `id` int(25) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(25) NOT NULL,
  `t_id` int(25) NOT NULL,
  `image` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher`
--

INSERT INTO `teacher` (`id`, `name`, `email`, `password`, `t_id`, `image`) VALUES
(30, 'Rashedul islam', 'rashedcse447@gmail.com', '12345', 1, '1580098622.jpg'),
(31, 'Rashedul ', 'rsakender7164@gmail.com', '1234', 2, '1580712775.jpg'),
(32, 'Sourav Mallick', 'souravmallick738@gmail.com', '12345', 3, '1581937671.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `teacherverification`
--

CREATE TABLE `teacherverification` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacherverification`
--

INSERT INTO `teacherverification` (`id`, `email`) VALUES
(3, 'rashedcse447@gmail.com'),
(4, 'rsakender7164@gmail.com'),
(5, 'rsakender7164@gmail.com'),
(6, 'rsakender7164@gmail.com'),
(7, 'rsakender7164@gmail.com'),
(8, 'rsakender7164@gmail.com'),
(9, 'rsakender7164@gmail.com'),
(10, 'rsakender7164@gmail.com'),
(11, 'souravmallick738@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `blood` varchar(25) NOT NULL,
  `mobile` int(25) NOT NULL,
  `session` varchar(25) NOT NULL,
  `image` varchar(25) NOT NULL,
  `roll` int(25) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `blood`, `mobile`, `session`, `image`, `roll`, `date`) VALUES
(8, 'Rashedul islam', 'rashedcse447@gmail.com', '12345', 'A+', 1765389556, '2014-2015', '1581765083.jpg', 150151, '2020-02-15 11:11:23'),
(9, 'Sourav Mallick', 'souravmallick738@gmail.com', '12345', 'B+', 1964142837, '2014-2015', '1581934793.jpg', 150141, '2020-02-17 10:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `userverification`
--

CREATE TABLE `userverification` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userverification`
--

INSERT INTO `userverification` (`id`, `email`) VALUES
(2, 'rashedcse447@gmail.com'),
(3, 'souravmallick738@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `adminapprov`
--
ALTER TABLE `adminapprov`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `advisenotice`
--
ALTER TABLE `advisenotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attendence mark`
--
ALTER TABLE `attendence mark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursealocate2`
--
ALTER TABLE `coursealocate2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursemark2`
--
ALTER TABLE `coursemark2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coursesignature`
--
ALTER TABLE `coursesignature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examguard`
--
ALTER TABLE `examguard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examregistration`
--
ALTER TABLE `examregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failsubject`
--
ALTER TABLE `failsubject`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `improveaprove`
--
ALTER TABLE `improveaprove`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `improveteacher`
--
ALTER TABLE `improveteacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `semailverify`
--
ALTER TABLE `semailverify`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signature`
--
ALTER TABLE `signature`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentattend`
--
ALTER TABLE `studentattend`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentimprove`
--
ALTER TABLE `studentimprove`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `studentnotice`
--
ALTER TABLE `studentnotice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suparadmin2`
--
ALTER TABLE `suparadmin2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suparadminapprove`
--
ALTER TABLE `suparadminapprove`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher`
--
ALTER TABLE `teacher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacherverification`
--
ALTER TABLE `teacherverification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userverification`
--
ALTER TABLE `userverification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `adminapprov`
--
ALTER TABLE `adminapprov`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `advisenotice`
--
ALTER TABLE `advisenotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `attendence mark`
--
ALTER TABLE `attendence mark`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `coursealocate2`
--
ALTER TABLE `coursealocate2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `coursemark2`
--
ALTER TABLE `coursemark2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT for table `coursesignature`
--
ALTER TABLE `coursesignature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `examguard`
--
ALTER TABLE `examguard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `examregistration`
--
ALTER TABLE `examregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `failsubject`
--
ALTER TABLE `failsubject`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `file`
--
ALTER TABLE `file`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `improveaprove`
--
ALTER TABLE `improveaprove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `improveteacher`
--
ALTER TABLE `improveteacher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `password_resets`
--
ALTER TABLE `password_resets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

--
-- AUTO_INCREMENT for table `semailverify`
--
ALTER TABLE `semailverify`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `signature`
--
ALTER TABLE `signature`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `studentattend`
--
ALTER TABLE `studentattend`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `studentimprove`
--
ALTER TABLE `studentimprove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `studentnotice`
--
ALTER TABLE `studentnotice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `suparadmin2`
--
ALTER TABLE `suparadmin2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `suparadminapprove`
--
ALTER TABLE `suparadminapprove`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `teacher`
--
ALTER TABLE `teacher`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `teacherverification`
--
ALTER TABLE `teacherverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userverification`
--
ALTER TABLE `userverification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
