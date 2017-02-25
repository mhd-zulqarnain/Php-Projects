-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 27, 2016 at 06:10 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oss1`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `uid` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`uid`, `user_name`, `password`) VALUES
(1, 'ali72', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `cid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `message` varchar(100) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`cid`, `vid`, `pid`, `message`, `time`) VALUES
(114, 1, 14, 'Anyone here to deal?', '2016-11-27 06:56:32'),
(115, 1, 15, 'let deal', '2016-11-28 06:30:29'),
(116, 17, 23, 'I want to deal the product', '2016-12-26 08:14:54'),
(117, 1, 23, 'ok lets talk', '2016-12-26 08:15:11'),
(118, 17, 23, 'asdfasd', '2016-12-26 08:21:24');

-- --------------------------------------------------------

--
-- Table structure for table `deals`
--

CREATE TABLE `deals` (
  `tid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `B_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deals`
--

INSERT INTO `deals` (`tid`, `vid`, `pid`, `B_date`) VALUES
(2, 1, 16, '2016-11-28'),
(3, 2, 18, '2016-11-28'),
(4, 3, 19, '2016-11-29'),
(6, 3, 17, '2016-11-29'),
(7, 9, 15, '2016-12-17'),
(8, 12, 24, '2016-12-24'),
(9, 1, 25, '2016-12-26'),
(10, 3, 26, '2016-12-26'),
(11, 2, 26, '2016-12-26'),
(12, 3, 27, '2016-12-26'),
(13, 3, 14, '2016-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `nid` int(11) NOT NULL,
  `vid` int(11) NOT NULL,
  `pid` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `message` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`nid`, `vid`, `pid`, `status`, `message`) VALUES
(2, 2, 24, 1, 'item has been approved');

-- --------------------------------------------------------

--
-- Table structure for table `productdetails`
--

CREATE TABLE `productdetails` (
  `pid` int(11) NOT NULL,
  `p_name` varchar(55) NOT NULL,
  `price` decimal(9,2) NOT NULL,
  `type` varchar(60) NOT NULL,
  `date` datetime NOT NULL,
  `approved` tinyint(1) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `vid` int(11) NOT NULL,
  `sell_out` tinyint(1) NOT NULL,
  `on_bet` tinyint(1) NOT NULL,
  `brand` varchar(25) NOT NULL,
  `image` varchar(300) NOT NULL,
  `location` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `productdetails`
--

INSERT INTO `productdetails` (`pid`, `p_name`, `price`, `type`, `date`, `approved`, `description`, `vid`, `sell_out`, `on_bet`, `brand`, `image`, `location`) VALUES
(14, 'Huawei Watch v1.2', '111300.00', 'Electrics_Gidget', '2016-11-27 08:12:31', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 3, 0, 'Huawei', '["4_a.jpg","23.jpg","","",""]', 'Karachi'),
(15, 'QMobile QMobile Noir J7 - 3GB RAM - 32GB ROM - 4G LTE -', '17000.00', 'Mobile', '2016-11-27 08:15:11', 1, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum', 1, 9, 0, 'qMobile', '["14.jpg","3.jpg","","",""]', 'Karachi'),
(17, 'samssung', '10000.00', 'Mobile', '2016-11-28 08:02:02', 1, 'good quality', 9, 3, 0, 'galaxy', '["3.jpg","4_.jpg","","",""]', 'Karachi'),
(22, 'Janod Dinosaure Magnetic Book', '2300.00', 'Books_Maginzes', '2016-12-19 05:18:31', 1, 'At the time, though, it wasnâ€™t published in the U.S. Now, however, itâ€™s available here, and now, after a second reading, I can assure any reader on the hunt for a powerful and complex crime novel with a social conscience that this is a book that shouldnâ€™t be missed. After being brutally assaulted in a Melbourne stake-out that went horribly wrong, homicide detective Joe........', 2, 0, 0, 'n/a', '["Janod Dinosaure Magnetic Book.png","Janod Dinosaure Magnetic Book1.jpg","aa1.jpg","",""]', 'Lahore'),
(23, 'Test Product', '12000.00', 'Electrics_Gidget', '2016-12-23 09:13:02', 1, 'This is the test description', 1, 0, 0, 'Lg', '["141.jpg","4_1.jpg","","",""]', 'Karachi'),
(24, 'CRT-4 GreyCode', '10000.00', 'Books_Maginzes', '2016-12-24 06:34:38', 1, 'Price is fixed for this poduct', 2, 12, 0, 'n/a', '["4_.jpg","4_1.jpg","4_re.jpg","4_a.jpg","23.jpg"]', 'Islamabad'),
(27, 'xyz', '12000.00', 'Books_Maginzes', '2016-12-26 08:02:29', 1, '', 16, 3, 0, 'xyz', '["Janod Dinosaure Magnetic Book.png","Janod Dinosaure Magnetic Book1.jpg","","",""]', 'Karachi');

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `vid` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `ph_number` bigint(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nic` varchar(25) NOT NULL,
  `address` varchar(300) NOT NULL,
  `city` varchar(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `password` varchar(55) NOT NULL,
  `online` tinyint(1) NOT NULL,
  `login_activity` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`vid`, `name`, `ph_number`, `email`, `nic`, `address`, `city`, `user_name`, `password`, `online`, `login_activity`) VALUES
(1, 'Arif', 12312312, 'xyz@gmail.com', '4333131231', 'n/a', 'kHI', 'ali72', '1234', 1, '1482739576'),
(2, 'ahmad', 92143322212, 'test@gmail.com', '543123123', 'n/a', 'LHR', 'ahmad14', '1234', 0, '1482559963'),
(11, 'hassan', 9344432344, 'hassu78@gmail.com', '711034331', 'n/a', 'ISB', 'hassu78', '12345', 0, '1479920322'),
(12, 'salman', 9344432343, 'sount1974@fleckens.hu', '4333131231', 'n/a', 'GLT', 'sount1974', '1234', 1, '1479920771'),
(13, 'test', 9248556247, 'drksketcher@gmail.com', '4333131231', 'n/a', 'SKD', 'tes41', 'ssssss', 0, '1480228595'),
(16, 'sanam', 3445566728, 'sanam@gmail.com', '', '', '', 'sanam', '1234', 1, '1482735866'),
(17, 'fatima', 3346789766, 'fatima@gmail.com', '', '', '', 'fatima', '123', 0, '1482737254');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `user_name` (`user_name`);

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`cid`);

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
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;
--
-- AUTO_INCREMENT for table `deals`
--
ALTER TABLE `deals`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `nid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `productdetails`
--
ALTER TABLE `productdetails`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
