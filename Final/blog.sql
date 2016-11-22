-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2016 at 06:33 PM
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
(21, 'JASPER NATIONAL PARK, CANADA', 'Jasper National Park in the Canadian Rockies comprises a vast wilderness area of Alberta province defined by glaciers, lakes and peaks like 11,033-ft.-high Mt. Edith Cavell. The Icefields Parkway, a road from the town of Jasper, passes subalpine forest and the immense Columbia Icefield. Outdoor activities like hiking, camping and skiing are popular. Native wildlife includes elk, moose, bighorn sheep and bears.', 'twr.jpg', '2016-09-12', 'zobair', 'travel'),
(37, 'SEYCHELLES, INDIAN SEA , AFRICA', 'Every fairy tale, every legend, as everybody knows, narrates in an original way great truth. The truth of our legend is in the unique colour of the Dolomites Mountains, on the sunrise and on the sunset.', 'tr1.jpg', '2016-09-12', 'Asad', 'travel'),
(47, 'THE GREAT BEAR RAINFOREST, CANADA', 'Every fairy tale, every legend, as everybody knows, narrates in an original way great truth. The truth of our legend is in the unique colour of the Dolomites Mountains, on the sunrise and on the sunset.', 'GrtB.png', '2016-10-01', 'zohair', 'travel'),
(52, 'test1', '', 'asd.jpg', '2016-10-01', 'Asad', 'travel'),
(53, 'klajsdl', 'yhis sposrer', 'ashd.jpg.jpg', '2016-10-13', 'kamal', 'photo');

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
(18, 37, 7),
(19, 46, 4),
(20, 47, 16),
(21, 21, 4),
(22, 52, 11),
(23, 53, 7);

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
  ADD PRIMARY KEY (`Pid`),
  ADD KEY `Pid` (`Pid`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `Pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;
--
-- AUTO_INCREMENT for table `post_view`
--
ALTER TABLE `post_view`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
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
