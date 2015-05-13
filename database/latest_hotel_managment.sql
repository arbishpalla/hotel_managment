-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2015 at 03:28 PM
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
  `room_no` int(11) DEFAULT NULL,
  `bed_no` int(11) DEFAULT NULL,
  `start_date` varchar(100) DEFAULT NULL,
  `end_date` varchar(100) DEFAULT NULL,
  `customer_name` varchar(100) DEFAULT NULL,
  `phone_no` int(11) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `total_discount` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`booking_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `emp_id`, `room_no`, `bed_no`, `start_date`, `end_date`, `customer_name`, `phone_no`, `email`, `comment`, `total_discount`, `total_price`) VALUES
(23, 1, 2, 3, '05/04/2015', '05/19/2015', 'arbish', 2147483647, 'arbishpalla@gmail.com', 'your coment will go here', 2500, 3000);

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
  `specification` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_no`, `bed_no`, `room_type`, `specification`) VALUES
(6, 'Room 101', 4, 'quad', 'Ac , Tv');

-- --------------------------------------------------------

--
-- Table structure for table `room_specification`
--

CREATE TABLE IF NOT EXISTS `room_specification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_no` varchar(111) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `room_specification`
--

INSERT INTO `room_specification` (`id`, `room_no`, `m_id`) VALUES
(1, 'Room101', 8),
(2, 'Room101', 9),
(3, 'Room103', 10),
(4, 'Room103', 11);

-- --------------------------------------------------------

--
-- Table structure for table `specification`
--

CREATE TABLE IF NOT EXISTS `specification` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `feature` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `specification`
--

INSERT INTO `specification` (`m_id`, `feature`) VALUES
(8, 'A/C'),
(9, 'English Toilet'),
(10, 'TV'),
(11, 'Kettle'),
(12, 'Wifi'),
(13, 'Heater');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
