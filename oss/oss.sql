-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2016 at 04:57 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oss`
--

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `tid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `B_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`tid`, `vid`, `pid`, `B_date`) VALUES
(1, 2, 13, '2016-09-03 00:00:00'),
(2, 2, 5, '2016-09-03 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `vid`, `status`) VALUES
(1, 1, 1),
(2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `pid` bigint(20) NOT NULL,
  `p_name` varchar(55) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `description` text NOT NULL,
  `vid` int(11) NOT NULL,
  `sell_out` tinyint(1) NOT NULL,
  `on_bet` tinyint(1) NOT NULL,
  `image` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`pid`, `p_name`, `price`, `type`, `date`, `approved`, `description`, `vid`, `sell_out`, `on_bet`, `image`) VALUES
(0, 'Samsung G1', 12000, 'Mobile', '0000-00-00 00:00:00', 0, 'Samsung Galaxy J1 smartphone was launched in January 2015. The phone comes with a 4.30-inch touchscreen display with a resolution of 480 pixels by 800 ...', 1, 0, 0, '["samsung_galaxy_s_wifi_4.0_5.0_front_angle_1.jpg","samsung-galaxy-j1(1).jpg",""]'),
(5, 'testing poduct', 12000, 'Mobile', '2016-09-14 06:11:12', 0, 'name of product', 1, 1, 0, '["Capture.PNG","",""]'),
(13, 'terr', 0, 'vehicle', '0000-00-00 00:00:00', 0, '', 1, 1, 0, '["8_4.jpg","18c04cf3759521afc86941f08fbffa58.jpg",""]'),
(15, 'skldafj', 231, 'Mobile', '0000-00-00 00:00:00', 0, 'sad', 2, 0, 0, '["23_4.jpg","",""]');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `uid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`uid`, `vid`, `user_name`, `password`) VALUES
(1, 1, 'ali72', '1234'),
(2, 2, 'ahmad14', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `vid` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `ph_number` bigint(20) NOT NULL,
  `nic` varchar(25) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vid`, `name`, `ph_number`, `nic`, `address`, `city`) VALUES
(1, 'ali', 12312312, '131231', 'na', 'khi'),
(2, 'ahmad', 213, '3123123', 'n/a', 'lhr');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `deals`
--
ALTER TABLE `deals`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`nid`);

--
-- Indexes for table `productdetails`
--
ALTER TABLE `productdetails`
  ADD PRIMARY KEY (`pid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `vid` (`vid`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
