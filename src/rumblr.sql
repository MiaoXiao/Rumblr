-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2015 at 03:33 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

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
-- Table structure for table `favorites`
--

CREATE TABLE IF NOT EXISTS `favorites` (
  `favorites_ID` int(11) NOT NULL,
  `Post_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE IF NOT EXISTS `following` (
  `Order_ID` int(11) NOT NULL,
  `User_ID` int(11) NOT NULL,
  `Followed_ID` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`Order_ID`, `User_ID`, `Followed_ID`) VALUES
(4, 19, 18);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `Order_ID` int(11) NOT NULL,
  `User_ID_1` int(11) NOT NULL,
  `User_ID_2` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`Order_ID`, `User_ID_1`, `User_ID_2`) VALUES
(11, 19, 18),
(12, 18, 19);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

CREATE TABLE IF NOT EXISTS `inbox` (
  `Order_ID` int(11) NOT NULL,
  `From_User_ID` int(11) NOT NULL,
  `To_User_ID` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `Time_Stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Is_FR` tinyint(1) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inbox`
--

INSERT INTO `inbox` (`Order_ID`, `From_User_ID`, `To_User_ID`, `message`, `Time_Stamp`, `Is_FR`) VALUES
(21, 19, 18, 'You have recieved a friend request from this user!', '2015-12-04 12:13:21', 1),
(22, 18, 19, 'You have recieved a friend request from this user!', '2015-12-04 14:03:58', 1),
(23, 19, 18, 'Your friend has made a post!', '2015-12-04 14:05:52', 0),
(24, 19, 18, 'Your friend has made a post!', '2015-12-04 14:17:05', 0),
(25, 19, 18, 'Your friend has made a post!', '2015-12-04 14:17:08', 0),
(26, 19, 18, 'Your friend has made a post!', '2015-12-04 14:17:17', 0),
(27, 19, 18, 'Your friend has made a post!', '2015-12-04 14:20:56', 0);

-- --------------------------------------------------------

--
-- Table structure for table `labels`
--

CREATE TABLE IF NOT EXISTS `labels` (
  `User_ID` int(11) NOT NULL,
  `Tag` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `loginID` int(11) NOT NULL,
  `login` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`loginID`, `login`, `password`) VALUES
(13, 'dsmit', '$2a$10$S0u.Gd3vIS.YqO0zJZvi5.f5fERQIJ1wVonD5YI6A31tTAYKLvHBe'),
(14, 'asdg', '$2a$10$hIn6hXFwYMH/F9T73yjk4exAU.B564UZ9MRQywchfhSQ1MNoj00MK'),
(15, 'asdf', '$2a$10$3wfSFgv8JjM8nysdNCfwsu3NBo4OQFcYXerNClAdVvE6ybnnoGiMa'),
(16, 'asdh', '$2a$10$aObd6ZjVGkOJWN8EvHJ4OeN45rO7GuvyJYJwMD3KPmLQkIyzpPlQ.'),
(17, 'test', '$2a$10$rfdHBYV1zdpWGmZp1.f5ouV3F42KuJXHjdGjtVsLCxQ.xVTilHBta'),
(18, 'q', '$2a$10$gkoC4c5nNqE3IxbDe38oUOYHUNg3CpKMpnMt9fOSONMUqNC751rWK'),
(19, 'p', '$2a$10$xYWvpY4hL/mmd6wHUetCDew5TGfBFAwjH0U/fGETisiEFTueTh77q'),
(20, 'w', '$2a$10$9E6E72qnMuDxoMZj977yYeBkjSSpFUFARurd./lDtlMqZcfdVL3eO');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postID` int(11) unsigned NOT NULL,
  `User_ID` int(11) unsigned NOT NULL,
  `IsRepost` tinyint(1) NOT NULL,
  `type` varchar(50) NOT NULL,
  `info` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Likes` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postID`, `User_ID`, `IsRepost`, `type`, `info`, `timestamp`, `Likes`) VALUES
(39, 19, 0, 'text', 'this is a test', '2015-12-04 14:01:47', 0),
(40, 19, 0, 'link', 'https://www.facebook.com/', '2015-12-04 14:02:18', 0),
(41, 19, 0, 'text', 'You cant see this unless we are friends.', '2015-12-04 14:05:52', 0),
(42, 19, 0, 'text', 'sdfgsdfgdsfg', '2015-12-04 14:17:05', 0),
(43, 19, 0, 'text', 'fdberbdfd', '2015-12-04 14:17:08', 0),
(44, 19, 0, 'text', 'made while in open', '2015-12-04 14:17:17', 0),
(45, 19, 0, 'text', 'dgfdf', '2015-12-04 14:20:56', 0);

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
  `privacy` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`profileID`, `lname`, `fname`, `nickname`, `gender`, `birthday`, `profilecreation`, `photo`, `interests`, `blogdesc`, `username`, `privacy`) VALUES
(13, 'smith', 'dan', 'dcsmitty', 'Male', '2015-11-10', '2015-12-01 18:12:32', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, '', '', 'dcsmitty', 'Open'),
(14, 'asdg', 'asdg', 'Faker', 'Male', '2015-11-18', '2015-11-13 08:26:02', 0x68747470733a2f2f75706c6f61642e77696b696d656469612e6f72672f77696b6970656469612f636f6d6d6f6e732f382f38612f46616b65725f284c65655f53616e672d6879656f6b295f61745f4c6f4c5f576f726c645f4368616d70696f6e736869705f323031332e6a7067, 'League', 'League', 'asdgg', 'Open'),
(15, 'asdf', 'asdf', '', 'Male', '2015-11-18', '2015-12-01 07:26:02', 0x68747470733a2f2f7062732e7477696d672e636f6d2f70726f66696c655f696d616765732f3633333930363639333833313732303936302f5a624858367136502e6a7067, '', '', 'asdff', 'Private'),
(16, 'asdhd', 'asdh', NULL, 'Male', '2015-11-19', '2015-11-13 09:04:37', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, NULL, NULL, 'asdfasdfdsaf', 'Open'),
(17, 'test', 'test', NULL, 'Female', '2015-12-01', '2015-12-04 04:22:58', 0x687474703a2f2f733764342e7363656e65372e636f6d2f69732f696d6167652f5472656b42696379636c6550726f64756374732f64656661756c742d6e6f2d696d6167653f7769643d31343930266865693d31303830266669743d6669742c3126666d743d706e6726716c743d38302c31266f705f75736d3d302c302c302c3026696363456d6265643d30266267633d3234302c3234302c323430, NULL, NULL, 'test', 'Open'),
(18, 'vcx', 'sdf', NULL, 'Male', '2015-11-30', '2015-12-04 11:45:21', 0x687474703a2f2f7777772e636f76696e67746f6e63726561746976652e636f6d2f77702d636f6e74656e742f75706c6f6164732f323031332f31322f64656661756c745f696d6167655f30312e706e67, NULL, NULL, 'sdfsdf', 'Open'),
(19, 'bhsdfsdf', 'sidujf', '', 'Female', '2015-12-07', '2015-12-04 14:18:42', 0x687474703a2f2f7777772e636f76696e67746f6e63726561746976652e636f6d2f77702d636f6e74656e742f75706c6f6164732f323031332f31322f64656661756c745f696d6167655f30312e706e67, '', '', 'popd', 'Friends Only'),
(20, 'w', 'w', NULL, 'Female', '2015-12-21', '2015-12-04 14:28:50', 0x687474703a2f2f7777772e636f76696e67746f6e63726561746976652e636f6d2f77702d636f6e74656e742f75706c6f6164732f323031332f31322f64656661756c745f696d6167655f30312e706e67, NULL, NULL, 'wop', 'Open');

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE IF NOT EXISTS `tags` (
  `Tag_ID` int(11) unsigned NOT NULL COMMENT 'Tag ID Is Post ID',
  `Post_ID` int(10) unsigned NOT NULL,
  `Tag_label` varchar(50) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tags`
--

INSERT INTO `tags` (`Tag_ID`, `Post_ID`, `Tag_label`) VALUES
(72, 39, 'text'),
(73, 40, 'link'),
(74, 40, 'facebook'),
(75, 41, 'text'),
(76, 42, 'text'),
(77, 43, 'text'),
(78, 44, 'text'),
(79, 45, 'text');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`Comment_ID`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`favorites_ID`);

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
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`Tag_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `Comment_ID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `favorites_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `friends`
--
ALTER TABLE `friends`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `inbox`
--
ALTER TABLE `inbox`
  MODIFY `Order_ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `loginID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `postID` int(11) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `profile`
--
ALTER TABLE `profile`
  MODIFY `profileID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `Tag_ID` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Tag ID Is Post ID',AUTO_INCREMENT=80;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
