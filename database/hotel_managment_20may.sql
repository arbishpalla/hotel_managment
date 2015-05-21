-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2015 at 07:26 AM
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
  `phone_no` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `total_discount` int(11) DEFAULT NULL,
  `time_stamp` date NOT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `booking_no`, `emp_id`, `room_id`, `room_no`, `bed_no`, `start_date`, `end_date`, `customer_name`, `phone_no`, `email`, `comment`, `total_discount`, `time_stamp`, `total_price`) VALUES
(7, 1000, 1, '9', '3', 11, '2015-05-13', '2015-05-19', 'arbish', 2147483647, 'arbishpalla@yahoo.com', 'nothing to say', 945, '2015-05-19', 1100),
(8, 1001, 1, '10', '3', 11, '2015-05-18', '2015-06-09', 'arbish', 2147483647, 'arbishpalla@yahoo.com', 'nothing to say', 945, '2015-05-19', 1100),
(10, 1001, 1, '9', '3', 11, '2015-06-24', '2015-07-02', 'zohair', 2147483647, 'zohairhemani1@gmail.com', 'testing for mupdate', 900, '2015-05-20', 1100),
(11, 1001, 1, '10', '3', 11, '2015-06-24', '2015-07-02', 'zohair', 2147483647, 'zohairhemani1@gmail.com', 'testing for mupdate', 900, '2015-05-20', 1100);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `bed_no`, `room_type`) VALUES
(9, 'Room 101', 4, 'sinle'),
(10, 'Room 102', 2, 'quad'),
(11, 'Room 103', 5, 'luxury');

-- --------------------------------------------------------

--
-- Table structure for table `room_specification`
--

CREATE TABLE IF NOT EXISTS `room_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_id` int(111) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `room_specification`
--

INSERT INTO `room_specification` (`id`, `room_id`, `m_id`) VALUES
(25, 10, 11),
(26, 11, 13),
(27, 11, 14),
(28, 10, 13),
(33, 10, 14),
(38, 9, 10);

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
