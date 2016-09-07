-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 04, 2016 at 02:10 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `userName` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `userName`, `password`) VALUES
(1, 'test', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `Pid` int(11) NOT NULL,
  `description` text NOT NULL,
  `Pdate` date NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `Pid`, `description`, `Pdate`, `name`, `email`) VALUES
(3, 1, 'However when I type something into the textbox called "addLinks" I want the user to be able to press Enter and trigger the "linkadd" button which will then run a JavaScript function.', '2016-08-31', 'khan', 'd'),
(4, 1, 'asdfasdf', '2016-09-03', 'da', 'asda'),
(5, 1, 'ffff', '2016-09-03', 'nme', 'dfsdf'),
(6, 1, 'this is another test comment', '2016-09-03', 'Muhammad Zulqarnain', 'Foreply35@armyspy.com'),
(7, 1, 'ads', '2016-09-03', 'xasd', 'da'),
(8, 1, 'sad,ams.d./asd', '2016-09-03', 'sonu', 'shoaibmehdi786@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `Pid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `publishDate` date NOT NULL,
  `editor` varchar(25) NOT NULL,
  `category` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`Pid`, `title`, `content`, `image`, `publishDate`, `editor`, `category`) VALUES
(1, 'First', 'However when I type something into the textbox called "addLinks" I want the user to be able to press Enter and trigger the "linkadd" button which will then run a JavaScript function.However when I type something into the textbox called "addLinks" I want the user to be able to press Enter and trigger the "linkadd" button which ', 'assets\\images\\image-1.png', '2016-08-28', 'admin', 'Photography'),
(2, 'Blog Post Title', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, veritatis, tempora, necessitatibus inventore nisi quam quia repellat ut tempore laborum possimus eum dicta id animi corrupti debitis ipsum officiis rerum.However when I type something into the textbox called "addLinks" I want the user to be able to press Enter and trigger the "linkadd" button which ', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSn4BJ0-uwUDAeo1isVEX4PMPAV-BOYSqeIwsPi9WJDxmCKgSD8', '2016-08-30', 'Arif', 'Travel'),
(3, 'NAPALI CLIFFS, KAUAI, HAWAII', '"The Cliffs." Much of Na Pali Coast is inaccessible due to its characteristic sheer cliffs that drop straight down, thousands of feet into the ocean. Sailing, rafting and hiking are the best ways to experience Na Pali''s myriad of natural wonders. A must-do Kauai activity.\r\nTo do:\r\n\r\nMany hikers choose to break the trail up into two days, setting up camp at the beach of Hanakoa, and then heading to Kalalau the next morning. Camping permits are required from the Hawaii State Parks Division office in Lihue. Hiking during the winter months is discouraged.', 'https://4.bp.blogspot.com/-XWQLZsYk-FY/VRBPuKUmXaI/AAAAAAAADgI/oIZXEJO6iQM/s1600/23_1.jpg', '2016-09-03', 'zohair', 'Travel');

-- --------------------------------------------------------

--
-- Table structure for table `post_view`
--

CREATE TABLE `post_view` (
  `id` int(11) NOT NULL,
  `Pid` int(10) NOT NULL,
  `count` bigint(16) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post_view`
--

INSERT INTO `post_view` (`id`, `Pid`, `count`) VALUES
(1, 1, 112),
(2, 2, 3),
(3, 3, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Pid` (`Pid`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`Pid`);

--
-- Indexes for table `post_view`
--
ALTER TABLE `post_view`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `post_view`
--
ALTER TABLE `post_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`Pid`) REFERENCES `post` (`Pid`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
