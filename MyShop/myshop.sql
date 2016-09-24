-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2014 at 11:06 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `myshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE IF NOT EXISTS `admins` (
  `admin_id` int(10) NOT NULL AUTO_INCREMENT,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'awpareshan@gmail.com', 'wali'),
(2, 'ayesha@yahoo.com', 'khan');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE IF NOT EXISTS `brands` (
  `brand_id` int(10) NOT NULL AUTO_INCREMENT,
  `brand_title` text NOT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(1, 'HP'),
(2, 'DELL'),
(3, 'Nokia '),
(4, 'Samsung'),
(5, 'Sony'),
(6, 'Motorola'),
(8, 'LG');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `p_id` int(10) NOT NULL,
  `ip_add` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'Laptops'),
(2, 'iPods'),
(3, 'Mobiles'),
(4, 'Cameras'),
(5, 'Touch Phones'),
(10, 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `customer_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_name` varchar(100) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_country` text NOT NULL,
  `customer_city` text NOT NULL,
  `customer_contact` int(100) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_image` text NOT NULL,
  `customer_ip` int(100) NOT NULL,
  PRIMARY KEY (`customer_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_name`, `customer_email`, `customer_pass`, `customer_country`, `customer_city`, `customer_contact`, `customer_address`, `customer_image`, `customer_ip`) VALUES
(7, 'Ayesha Khan', 'ayesha@yahoo.com', 'khan', 'India', 'Mumbai', 234234, 'House 33, st 4, gulshan iqbal, Pakistan', 'Kinza Fatima.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customer_orders`
--

CREATE TABLE IF NOT EXISTS `customer_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `due_amount` int(100) NOT NULL,
  `invoice_no` int(100) NOT NULL,
  `total_products` int(100) NOT NULL,
  `order_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `customer_orders`
--

INSERT INTO `customer_orders` (`order_id`, `customer_id`, `due_amount`, `invoice_no`, `total_products`, `order_date`, `order_status`) VALUES
(33, 7, 900, 2014691707, 1, '2014-06-28 23:04:20', 'Complete'),
(34, 7, 1400, 1112245032, 1, '2014-06-28 23:09:39', 'Complete'),
(36, 7, 400, 2008519193, 1, '2014-06-28 23:00:03', 'Complete'),
(37, 7, 400, 584737940, 1, '2014-07-05 19:36:04', 'Pending'),
(38, 7, 1200, 754753243, 1, '2014-07-05 19:38:16', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE IF NOT EXISTS `payments` (
  `payment_id` int(10) NOT NULL AUTO_INCREMENT,
  `invoice_no` int(10) NOT NULL,
  `amount` int(10) NOT NULL,
  `payment_mode` text NOT NULL,
  `ref_no` int(10) NOT NULL,
  `code` int(10) NOT NULL,
  `payment_date` text NOT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`payment_id`, `invoice_no`, `amount`, `payment_mode`, `ref_no`, `code`, `payment_date`) VALUES
(1, 1355767292, 700, 'Bank Transfer', 3453454, 43534, '25-06-2014'),
(2, 512047505, 2000, 'Easypaisa/UBL Omni', 4354351, 12345, '27-06-2014'),
(3, 343866839, 1200, 'Bank Transfer', 353423, 32432, '27-06-2014'),
(4, 2008519193, 400, 'Bank Transfer', 3453454, 43534, '27-06-2014'),
(5, 2014691707, 900, 'Western Union', 3453454, 43534, '25-06-2014'),
(6, 1112245032, 1400, 'Easypaisa/UBL Omni', 3453454, 43534, '27-06-2014');

-- --------------------------------------------------------

--
-- Table structure for table `pending_orders`
--

CREATE TABLE IF NOT EXISTS `pending_orders` (
  `order_id` int(10) NOT NULL AUTO_INCREMENT,
  `customer_id` int(10) NOT NULL,
  `invoice_no` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `qty` int(10) NOT NULL,
  `order_status` text NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `pending_orders`
--

INSERT INTO `pending_orders` (`order_id`, `customer_id`, `invoice_no`, `product_id`, `qty`, `order_status`) VALUES
(36, 7, 2008519193, 9, 1, 'Complete'),
(37, 7, 2014691707, 10, 1, 'Complete'),
(38, 7, 584737940, 13, 1, 'Pending'),
(39, 7, 754753243, 11, 1, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(10) NOT NULL AUTO_INCREMENT,
  `cat_id` int(10) NOT NULL,
  `brand_id` int(10) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `product_title` text NOT NULL,
  `product_img1` text NOT NULL,
  `product_img2` text NOT NULL,
  `product_img3` text NOT NULL,
  `product_price` int(10) NOT NULL,
  `product_desc` text NOT NULL,
  `product_keywords` text NOT NULL,
  `status` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `cat_id`, `brand_id`, `date`, `product_title`, `product_img1`, `product_img2`, `product_img3`, `product_price`, `product_desc`, `product_keywords`, `status`) VALUES
(8, 1, 2, '2014-06-11 19:57:47', 'Dell corei7', 'Dell-Inspiron-R-Special-Edition.jpg', 'dell-laptop-battery-problem.jpg', 'Laptops-hp-Pro-Book-300x275.jpg', 300, 'this is a nice dell laptop for sale.', 'DELL, corei7, new, laptops', 'on'),
(9, 4, 4, '2014-06-28 20:48:41', 'Samsung Camera', 'Sony_camera.jpg', 'Canon-EOS-Rebel-T3i.jpg', 'DSLR-camera.jpg', 400, '<p>this is a very nice samsung camera which you can easily buy from this shop with lifetime guarantee and we will give you discount also if you buy it today.&nbsp;</p>', '', 'on'),
(10, 4, 5, '2014-06-28 20:49:40', 'Sony Camera New', 'DSLR-camera.jpg', 'Sony_camera.jpg', 'Canon-EOS-Rebel-T3i.jpg', 900, '<p>Sony camera I like too much and you can buy it easily from this our shop...</p>', '', 'on'),
(11, 3, 3, '2014-06-28 20:50:44', 'Nokia mobile new', 'nokia-windows-200-dollar-tablet2-640x353.jpg', 'Samsung-Galaxy-Tab-tablet.jpg', 'htc-one-sv.jpg', 1200, '<p>Nokia is a great mobile and brand for everyone!</p>', '', 'on'),
(12, 3, 4, '2014-06-28 20:51:51', 'Samsung Galaxy ', 'Samsung-Galaxy-Tab-tablet.jpg', 'HTC-Google-Nexus-One-2.jpg', 'iPad_mini_inHand_Wht_iOS6_PRINT.jpg', 1400, '<p>Samsung galaxy is a great phone to use by everybody in the world for several other things.&nbsp;</p>', '', 'on'),
(13, 1, 1, '2014-06-29 18:19:39', 'HP new Laptop', 'original.jpg', 'dell-laptop-battery-problem.jpg', 'Laptops-hp-Pro-Book-300x275.jpg', 400, '<p>lljlkj khkh kjkh khkh khjhk khj</p>', '', 'on');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
