-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 15, 2023 at 05:34 AM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restaurant_java_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_t`
--

DROP TABLE IF EXISTS `admin_t`;
CREATE TABLE IF NOT EXISTS `admin_t` (
  `adm_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm_fname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm_lname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm_phone` varchar(13) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `adm_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`adm_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_t`
--

INSERT INTO `admin_t` (`adm_id`, `adm_fname`, `adm_lname`, `adm_email`, `adm_phone`, `adm_address`, `adm_password`) VALUES
('A001', 'Nexus', 'Ler', 'nexus_ler@gmail.com', '0123889962', '99, Jalan 27/A Taman Pahat, 50000 Batu Pahat, Johor, Malaysia.', 'nex@999'),
('A002', 'Jason', 'Kwan', 'kwan_0213@gmail.com', '0189933274', '34, Lorong Cooper Taman Sembilan, 58293 Kajang, Selangor, Malaysia.', 'jk0213'),
('A003', 'Ryan', 'Lee', 'ryanlee@gmail.com', '0127812305', '99, Jalan Tun Razak, 50000 Kuala Lumpur W.P., Malaysia.', 'ry-99-mks-3');

-- --------------------------------------------------------

--
-- Table structure for table `customer_t`
--

DROP TABLE IF EXISTS `customer_t`;
CREATE TABLE IF NOT EXISTS `customer_t` (
  `cus_id` int NOT NULL AUTO_INCREMENT,
  `cus_username` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cus_email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cus_password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `cus_points` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`cus_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_t`
--

INSERT INTO `customer_t` (`cus_id`, `cus_username`, `cus_email`, `cus_password`, `cus_points`) VALUES
(1, 'jason1323', 'jason@gmail.com', '123456', '89');

-- --------------------------------------------------------

--
-- Table structure for table `food_t`
--

DROP TABLE IF EXISTS `food_t`;
CREATE TABLE IF NOT EXISTS `food_t` (
  `food_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `food_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `food_price` double(5,2) NOT NULL,
  `food_category` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `food_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`food_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `food_t`
--

INSERT INTO `food_t` (`food_id`, `food_name`, `food_price`, `food_category`, `food_image`) VALUES
('F001', 'fries', 5.60, 'Sides', 'fries.webp'),
('F002', 'Cheeseburger', 12.90, 'Burgers', 'burger.jpg'),
('F003', 'Fish Burger', 10.90, 'Burgers', 'fish-burger.jpg'),
('F005', 'Ice cream', 1.50, 'Desserts', 'ice-cream.jpg'),
('F006', 'Coke', 1.50, 'Beverages', 'coke.jpg'),
('F007', 'Apple Pie', 3.80, 'Desserts', 'applepie.jpg'),
('F008', 'Frozen Sprite', 2.80, 'Beverages', 'sprite-frozen.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `order_t`
--

DROP TABLE IF EXISTS `order_t`;
CREATE TABLE IF NOT EXISTS `order_t` (
  `ord_id` int NOT NULL AUTO_INCREMENT,
  `ord_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ord_quantity` double(2,0) NOT NULL,
  `ord_total` double(6,2) NOT NULL,
  `ord_image` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `food_id` char(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_no` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `order_status` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`ord_id`),
  KEY `food_id` (`food_id`)
) ENGINE=InnoDB AUTO_INCREMENT=94 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_t`
--

INSERT INTO `order_t` (`ord_id`, `ord_name`, `ord_quantity`, `ord_total`, `ord_image`, `food_id`, `order_no`, `order_status`) VALUES
(89, 'Fish Burger', 1, 10.90, 'fish-burger.jpg', 'F003', '1', 'preparing'),
(90, 'Ice cream', 1, 1.50, 'ice-cream.jpg', 'F005', '1', 'preparing'),
(91, 'Cheeseburger', 4, 12.90, 'burger.jpg', 'F002', '2', 'preparing'),
(92, 'fries', 1, 5.60, 'fries.webp', 'F001', '3', 'waiting for payment'),
(93, 'Coke', 1, 1.50, 'coke.jpg', 'F006', '3', 'waiting for payment');

-- --------------------------------------------------------

--
-- Table structure for table `owner_t`
--

DROP TABLE IF EXISTS `owner_t`;
CREATE TABLE IF NOT EXISTS `owner_t` (
  `own_id` char(3) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `own_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`own_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `owner_t`
--

INSERT INTO `owner_t` (`own_id`, `own_name`) VALUES
('W01', 'Jian Dong'),
('W02', 'Nexus'),
('W03', 'ANQI'),
('W04', 'YX');

-- --------------------------------------------------------

--
-- Table structure for table `payment_t`
--

DROP TABLE IF EXISTS `payment_t`;
CREATE TABLE IF NOT EXISTS `payment_t` (
  `pay_id` int NOT NULL AUTO_INCREMENT,
  `pay_amount` double(6,2) NOT NULL,
  `pay_date` datetime NOT NULL,
  `pay_method` varchar(4) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fdOrder_no` varchar(5) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`pay_id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_t`
--

INSERT INTO `payment_t` (`pay_id`, `pay_amount`, `pay_date`, `pay_method`, `fdOrder_no`) VALUES
(50, 12.40, '2023-09-10 23:40:07', 'Cash', '1'),
(51, 64.00, '2023-09-10 23:47:14', 'Cash', '2');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_t`
--
ALTER TABLE `order_t`
  ADD CONSTRAINT `order_t_ibfk_2` FOREIGN KEY (`food_id`) REFERENCES `food_t` (`food_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
