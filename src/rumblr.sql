-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2015 at 02:47 AM
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
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `Comment_ID` int(11) unsigned NOT NULL,
  `Post_ID` int(11) unsigned NOT NULL,
  `User_ID` int(11) unsigned NOT NULL,
  `Comment` text NOT NULL,
  `Timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginID` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `login`, `password`) VALUES
(1, 'dsmit', 'dirtbag'),
(2, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) unsigned NOT NULL,
  `User_ID` int(11) unsigned NOT NULL,
  `type` varchar(50) NOT NULL,
  `info` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Likes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `User_ID`, `type`, `info`, `timestamp`, `Likes`) VALUES
(1, 0, 'quote', 'test', '2015-11-11 00:56:18', 0),
(2, 0, 'text', 'bloop', '2015-11-11 00:56:25', 0),
(3, 0, 'text', 'test', '2015-11-11 00:56:13', 0),
(4, 0, 'chat', 'bloop', '2015-11-11 01:43:01', 0),
(5, 0, 'link', 'www.youtube.com', '2015-11-11 01:43:13', 0);

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

CREATE TABLE IF NOT EXISTS `profile` (
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
  `Following` varchar(50) NOT NULL,
  `Privacy` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileID`, `lname`, `fname`, `nickname`, `gender`, `birthday`, `profilecreation`, `photo`, `interests`, `blogdesc`, `username`, `Following`, `Privacy`) VALUES
(1, 'smit', 'dan', NULL, 'Male', '2015-11-17', '2015-11-10 03:57:25', 0x687474703a2f2f6672656574686f75676874626c6f67732e636f6d2f6c6f75737963616e75636b2f66696c65732f323031342f30352f687164656661756c742e6a7067, NULL, NULL, 'dcsmitty', '', 0),
(2, 'test', 'test', NULL, 'Male', '2015-11-10', '2015-11-11 00:55:37', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, NULL, NULL, 'test', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`);

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
  MODIFY `Comment_ID` int(11) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
