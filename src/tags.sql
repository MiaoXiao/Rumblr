-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2015 at 08:33 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rumblr`
--

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `Tag_ID` int(11) unsigned NOT NULL COMMENT 'Tag ID Is Post ID',
  `Post_ID` int(10) unsigned NOT NULL,
  `Tag_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`Tag_ID`, `Post_ID`, `Tag_label`) VALUES
(1, 23, ''),
(2, 23, ''),
(3, 23, ''),
(4, 34, ''),
(5, 36, ''),
(6, 38, ''),
(7, 40, ''),
(8, 42, ''),
(9, 44, ''),
(10, 48, ''),
(11, 50, ''),
(12, 54, ''),
(13, 56, 'PLEASE'),
(14, 56, 'WORK'),
(15, 58, 'PLEASE'),
(16, 58, 'WORK'),
(17, 60, 'PLEASE'),
(18, 60, ''),
(19, 60, 'WORK'),
(20, 62, 'PLEASE'),
(21, 62, ''),
(22, 62, 'WORK'),
(23, 64, 'PLEASE'),
(24, 64, 'WORK'),
(25, 66, 'PLEASE'),
(26, 66, 'WORK'),
(27, 68, 'baby'),
(28, 68, 'gee');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`Tag_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `Tag_ID` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Tag ID Is Post ID',AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
