-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2015 at 04:22 PM
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
  `emp_id` int(11) DEFAULT NULL,
  `room_id` varchar(11) NOT NULL,
  `room_no` varchar(101) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `total_discount` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `emp_id`, `room_id`, `room_no`, `bed_no`, `start_date`, `end_date`, `customer_name`, `phone_no`, `email`, `comment`, `total_discount`, `total_price`) VALUES
(1, 1, '2', '2', 9, '2015-05-10', '2015-05-15', 'Zohair Hemani', 2147483647, 'zohairhemani1@gmail.com', 'Room in Garden East.', 8500, 9000),
(2, 1, '3', '2', 9, '2015-05-10', '2015-05-15', 'Zohair Hemani', 2147483647, 'zohairhemani1@gmail.com', 'Room in Garden East.', 8500, 9000),
(4, 1, '2', '3', 12, '2015-05-16', '2015-05-19', 'asd', 0, 'asdsad', 'asd', 1420, 1452),
(5, 1, '3', '3', 12, '2015-05-16', '2015-05-19', 'asd', 0, 'asdsad', 'asd', 1420, 1452);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `bed_no`, `room_type`) VALUES
(1, 'ROOM 101', 3, 'quad'),
(2, 'ROOM 102', 4, 'double'),
(3, 'ROOM 103', 5, 'single'),
(4, 'ROOM 104', 6, 'single');

-- --------------------------------------------------------

--
-- Table structure for table `room_specification`
--

CREATE TABLE IF NOT EXISTS `room_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(111) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `room_specification`
--

INSERT INTO `room_specification` (`id`, `room_id`, `m_id`) VALUES
(4, 1, 9),
(5, 2, 12),
(7, 3, 11),
(8, 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE IF NOT EXISTS `specification` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature` varchar(200) DEFAULT NULL,
  `file` varchar(200) NOT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`m_id`, `feature`, `file`) VALUES
(9, 'English Toilet', ''),
(10, 'TV', ''),
(11, 'Kettle', ''),
(12, 'Wifi', ''),
(13, 'Heater', '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
