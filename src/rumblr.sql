-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2015 at 07:34 AM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

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
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `Comment_ID` int(11) UNSIGNED NOT NULL,
  `Post_ID` int(11) UNSIGNED NOT NULL,
  `User_ID` int(11) UNSIGNED NOT NULL,
  `Comment` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`Comment_ID`, `Post_ID`, `User_ID`, `Comment`, `Timestamp`) VALUES
(1, 18, 14, 'asdf', '2015-12-01 07:26:34'),
(2, 18, 14, 'asdf', '2015-12-01 07:28:41'),
(3, 18, 15, 'blaaaa', '2015-12-01 07:47:07'),
(4, 18, 14, 'asdf', '2015-12-01 07:49:31'),
(5, 18, 14, 'asdf', '2015-12-01 07:57:13'),
(6, 18, 14, 'asdf', '2015-12-01 08:03:15'),
(7, 18, 14, 'adsf', '2015-12-01 08:04:50'),
(8, 18, 14, 'asdf', '2015-12-01 08:05:02'),
(9, 18, 14, 'asdf', '2015-12-01 08:05:13'),
(10, 18, 14, 'asdf', '2015-12-01 08:05:54'),
(11, 18, 14, 'asdf', '2015-12-01 08:06:05'),
(12, 18, 14, 'asdf', '2015-12-01 08:06:11'),
(13, 18, 14, 'asdf', '2015-12-01 08:06:17'),
(14, 18, 14, 'asdf', '2015-12-01 08:06:31'),
(15, 18, 14, 'asdgawegawef', '2015-12-01 08:24:21'),
(16, 18, 15, 'asdf', '2015-12-01 08:50:27'),
(17, 18, 15, 'asdgfasdfaf', '2015-12-01 08:52:20');

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Followed_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `Order_ID` int(11) NOT NULL,
  `User_ID_1` int(11) NOT NULL,
  `User_ID_2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE `inbox` (
  `Order_ID` int(11) NOT NULL,
  `From_User_ID` int(11) NOT NULL,
  `To_User_ID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Is_FR` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE `labels` (
  `User_ID` int(11) NOT NULL,
  `Tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `loginID` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `login`, `password`) VALUES
(13, 'dsmit', '$2a$10$S0u.Gd3vIS.YqO0zJZvi5.f5fERQIJ1wVonD5YI6A31tTAYKLvHBe'),
(14, 'asdg', '$2a$10$hIn6hXFwYMH/F9T73yjk4exAU.B564UZ9MRQywchfhSQ1MNoj00MK'),
(15, 'asdf', '$2a$10$3wfSFgv8JjM8nysdNCfwsu3NBo4OQFcYXerNClAdVvE6ybnnoGiMa'),
(16, 'asdh', '$2a$10$aObd6ZjVGkOJWN8EvHJ4OeN45rO7GuvyJYJwMD3KPmLQkIyzpPlQ.'),
(17, 'test', '$2a$10$rfdHBYV1zdpWGmZp1.f5ouV3F42KuJXHjdGjtVsLCxQ.xVTilHBta');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `postID` int(11) UNSIGNED NOT NULL,
  `User_ID` int(11) UNSIGNED NOT NULL,
  `type` varchar(50) NOT NULL,
  `info` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `User_ID`, `type`, `info`, `timestamp`) VALUES
(14, 0, 'photo', 'https://upload.wikimedia.org/wikipedia/commons/c/cc/Western_Sushi.jpg', '2015-11-18 05:08:00'),
(14, 0, 'text', 'asdfasdf', '2015-11-13 08:45:50'),
(14, 0, 'text', 'asdfasdfasdfasdfasdf', '2015-11-13 07:59:48'),
(14, 0, 'text', 'ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff', '2015-11-18 04:59:18'),
(15, 0, 'text', 'adsfasdf', '2015-11-13 08:59:58'),
(15, 0, 'text', 'asdf', '2015-11-13 09:00:09'),
(15, 0, 'text', 'asdf', '2015-11-18 05:23:47'),
(15, 0, 'text', 'asdfasdf', '2015-11-13 08:59:24'),
(15, 0, 'text', 'asdff', '2015-11-13 08:46:52'),
(16, 0, 'text', 'asdfasdf', '2015-11-13 09:05:59'),
(17, 14, 'text', 'asdfasdfasdfagawef', '2015-12-01 07:12:23'),
(18, 14, 'text', 'asdfasdfasdf', '2015-12-01 07:12:31'),
(19, 15, 'text', 'asdgasdfasdf', '2015-12-01 07:23:11'),
(20, 15, 'text', 'asdfasdfasdf', '2015-12-01 07:23:44'),
(21, 14, 'text', 'asdf', '2015-12-01 08:03:11'),
(22, 15, 'text', 'agasdfaefe', '2015-12-01 08:56:03'),
(23, 13, 'text', 'hello', '2015-12-01 18:12:15'),
(24, 17, 'text', 'hi', '2015-12-04 04:23:35');

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE `profile` (
  `profileID` int(11) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `nickname` varchar(255) DEFAULT NULL,
  `gender` varchar(11) NOT NULL,
  `birthday` date DEFAULT NULL,
  `profilecreation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `photo` blob,
  `interests` text,
  `blogdesc` text,
  `username` varchar(255) NOT NULL,
  `privacy` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileID`, `lname`, `fname`, `nickname`, `gender`, `birthday`, `profilecreation`, `photo`, `interests`, `blogdesc`, `username`, `privacy`) VALUES
(13, 'smith', 'dan', 'dcsmitty', 'Male', '2015-11-10', '2015-12-01 18:12:32', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, '', '', 'dcsmitty', 'Open'),
(14, 'asdg', 'asdg', 'Faker', 'Male', '2015-11-18', '2015-11-13 08:26:02', 0x68747470733a2f2f75706c6f61642e77696b696d656469612e6f72672f77696b6970656469612f636f6d6d6f6e732f382f38612f46616b65725f284c65655f53616e672d6879656f6b295f61745f4c6f4c5f576f726c645f4368616d70696f6e736869705f323031332e6a7067, 'League', 'League', 'asdgg', 'Open'),
(15, 'asdf', 'asdf', '', 'Male', '2015-11-18', '2015-12-01 07:26:02', 0x68747470733a2f2f7062732e7477696d672e636f6d2f70726f66696c655f696d616765732f3633333930363639333833313732303936302f5a624858367136502e6a7067, '', '', 'asdff', 'Private'),
(16, 'asdhd', 'asdh', NULL, 'Male', '2015-11-19', '2015-11-13 09:04:37', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, NULL, NULL, 'asdfasdfdsaf', 'Open'),
(17, 'test', 'test', NULL, 'Female', '2015-12-01', '2015-12-04 04:22:58', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, NULL, NULL, 'test', 'Open');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `friends`
--
ALTER TABLE `friends`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD PRIMARY KEY (`Order_ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`loginID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`postID`,`type`,`info`,`timestamp`);

--
-- Indexes for table `profile`
--
ALTER TABLE `profile`
  ADD PRIMARY KEY (`profileID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
