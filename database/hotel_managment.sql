-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2015 at 04:41 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `hotel_managment`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE IF NOT EXISTS `booking` (
  `booking_id` int(11) NOT NULL AUTO_INCREMENT,
  `booking_no` int(11) DEFAULT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `room_id` varchar(11) NOT NULL,
  `room_no` varchar(101) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_no` varchar(30) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `total_discount` int(11) DEFAULT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=127 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_no`, `emp_id`, `room_id`, `room_no`, `bed_no`, `start_date`, `end_date`, `customer_name`, `phone_no`, `email`, `comment`, `total_discount`, `time_stamp`, `total_price`) VALUES
(119, 1000, 1, '13', '2', 4, '2015-05-03', '2015-05-16', 'arbish', '2147483647', 'arbishpalla@gmail.com', 'nothing to say', 200, '2015-05-28 16:00:47', 400);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `emp_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`emp_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`emp_id`, `name`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE IF NOT EXISTS `rooms` (
  `room_id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` varchar(100) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `bed_no`, `room_type`) VALUES
(13, 'Room 101', 2, 'single'),
(14, 'Room 102', 2, 'double'),
(15, 'Room 103', 4, 'triple'),
(16, 'Room 104', 2, 'double');

-- --------------------------------------------------------

--
-- Table structure for table `room_specification`
--

CREATE TABLE IF NOT EXISTS `room_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(111) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `room_specification`
--

INSERT INTO `room_specification` (`id`, `room_id`, `m_id`) VALUES
(45, 14, 10),
(49, 15, 14),
(50, 15, 9),
(52, 16, 10),
(53, 16, 12),
(61, 14, 11),
(66, 13, 10),
(67, 13, 14);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE IF NOT EXISTS `specification` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`m_id`, `feature`, `file`) VALUES
(9, 'English Toilet', ''),
(10, 'TV', ''),
(11, 'Kettle', ''),
(12, 'Wifi', ''),
(13, 'Heater', ''),
(14, 'A/C', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
