-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2015 at 02:44 PM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_fname` varchar(45) NOT NULL,
  `admin_lname` varchar(45) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `creditcard`
--

CREATE TABLE IF NOT EXISTS `creditcard` (
`cc_id` int(11) NOT NULL,
  `cc_number` double NOT NULL,
  `cc_pin` int(11) NOT NULL,
  `cc_expiration_date` date NOT NULL,
  `customer_customer_id` int(11) NOT NULL,
  `reservation_reservation_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `creditcard`
--

INSERT INTO `creditcard` (`cc_id`, `cc_number`, `cc_pin`, `cc_expiration_date`, `customer_customer_id`, `reservation_reservation_id`) VALUES
(1, 12312321, 12323213, '2015-03-11', 33, 30),
(2, 21321321, 2312321, '2015-03-04', 37, 35);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_address` varchar(45) NOT NULL,
  `customer_number` int(11) NOT NULL,
  `customer_booking_number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_number`, `customer_booking_number`) VALUES
(20, 'Echiverri', 'Louiz', 'asdasdsad', 2147483647, 0),
(21, 'Echiverri', 'Louiz', 'asdasdsad', 2147483647, 0),
(22, 'sdfsdfsd', 'sdfdsafs', 'sdfsdfsfsd', 2147483647, 0),
(23, 'sdasdsa', 'sadasdsadas', 'asdadadsa', 2147483647, 0),
(24, 'asdasdsa', 'dasdas', 'asdasdasd', 2147483647, 0),
(25, 'asdasdsa', 'dasdas', 'asdasdasd', 2147483647, 0),
(26, 'asdasdsa', 'dasdas', 'asdasdasd', 2147483647, 0),
(27, 'asdasdas', 'asdasdsa', 'asdasdas', 2147483647, 0),
(28, 'asdasdas', 'asdasdsa', 'asdasdas', 2147483647, 0),
(29, 'asdasdas', 'asdasdsa', 'asdasdas', 2147483647, 0),
(30, 'asdasdas', 'asdasdsa', 'asdasdas', 2147483647, 0),
(31, 'asdasdas', 'asdasdsa', 'asdasdas', 2147483647, 0),
(32, 'asdasdas', 'asdasdsa', 'asdasdas', 2147483647, 0),
(33, 'Echiverri', 'Louiz', 'sdadsadsa', 2147483647, 0),
(34, 'asdasdsa', 'asdasda', 'asdasdas', 2132132131, 0),
(35, 'asdasdsa', 'asdasda', 'asdasdas', 2132132131, 0),
(36, 'sdfdsfds', 'dsfdsfsd', 'sdfsdfds', 2147483647, 0),
(37, 'dasdas', 'asdasdas', 'dsadasdas', 2147483647, 0);

-- --------------------------------------------------------

--
-- Table structure for table `main_hotel_info`
--

CREATE TABLE IF NOT EXISTS `main_hotel_info` (
`id` int(11) NOT NULL,
  `rooms_left` int(11) NOT NULL,
  `rooms_info_type` enum('Bungalow','Deluxe','Executive','Presidential Suite') NOT NULL,
  `rooms_info_price` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `main_hotel_info`
--

INSERT INTO `main_hotel_info` (`id`, `rooms_left`, `rooms_info_type`, `rooms_info_price`) VALUES
(1, 35, 'Bungalow', 3000),
(2, 15, 'Deluxe', 6000),
(3, 19, 'Executive', 10000),
(4, 9, 'Presidential Suite', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `payment_type`
--

CREATE TABLE IF NOT EXISTS `payment_type` (
`payment_id` int(11) NOT NULL,
  `pament_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
`reservation_id` int(11) NOT NULL,
  `reservation_date` date NOT NULL,
  `reservation_checkin` date NOT NULL,
  `reservation_checkout` date NOT NULL,
  `reservation_totalpayment` float NOT NULL,
  `payment_type` varchar(45) NOT NULL,
  `customer_customer_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `reservation_checkin`, `reservation_checkout`, `reservation_totalpayment`, `payment_type`, `customer_customer_id`) VALUES
(9, '2015-03-09', '2015-03-10', '2015-03-11', 6000, 'Credit', 21),
(10, '2015-03-09', '2015-03-10', '2015-03-19', 90000, 'Credit', 22),
(11, '2015-03-09', '2015-03-10', '2015-03-11', 6000, 'Cash', 23),
(13, '2015-03-09', '2015-03-12', '2015-03-14', 12000, 'Cash', 24),
(14, '2015-03-09', '2015-03-18', '2015-03-19', 6000, 'Cash', 25),
(16, '2015-03-09', '2015-03-10', '2015-03-12', 12000, 'Cash', 26),
(17, '2015-03-09', '2015-03-10', '2015-03-13', 18000, 'Cash', 27),
(18, '2015-03-09', '2015-03-24', '2015-03-27', 45000, 'Cash', 28),
(19, '2015-03-09', '2015-03-19', '2015-03-21', 20000, 'Cash', 29),
(20, '2015-03-09', '2015-03-11', '2015-03-19', 80000, 'Cash', 30),
(21, '2015-03-09', '2015-03-11', '2015-03-13', 12000, 'Cash', 31),
(28, '2015-03-09', '2015-03-12', '2015-03-13', 6000, 'Cash', 32),
(30, '2015-03-09', '2015-03-10', '2015-03-13', 18000, 'Credit', 33),
(31, '2015-03-09', '2015-03-11', '2015-03-12', 6000, 'Credit', 34),
(33, '2015-03-09', '2015-03-11', '2015-03-18', 105000, 'Credit', 35),
(34, '2015-03-09', '2015-03-11', '2015-03-13', 12000, 'Cash', 36),
(35, '2015-03-09', '2015-03-12', '2015-03-13', 10000, 'Credit', 37);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`room_id` int(11) NOT NULL,
  `room_type` enum('Bungalow','Deluxe','Executive','Presidential Suite') NOT NULL,
  `number_accomodate` int(11) NOT NULL,
  `room_reservation_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `number_accomodate`, `room_reservation_id`) VALUES
(1, 'Deluxe', 20, 14),
(2, 'Deluxe', 20, 16),
(3, 'Deluxe', 20, 17),
(4, 'Presidential Suite', 10, 18),
(5, 'Executive', 19, 19),
(6, 'Executive', 19, 20),
(7, 'Deluxe', 19, 21),
(12, 'Deluxe', 20, 28),
(14, 'Deluxe', 18, 30),
(15, 'Deluxe', 17, 31),
(16, 'Presidential Suite', 10, 33),
(17, 'Deluxe', 16, 34),
(18, 'Executive', 20, 35);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
 ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `creditcard`
--
ALTER TABLE `creditcard`
 ADD PRIMARY KEY (`cc_id`), ADD UNIQUE KEY `customer_id` (`customer_customer_id`), ADD UNIQUE KEY `reservation_id` (`reservation_reservation_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
 ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `main_hotel_info`
--
ALTER TABLE `main_hotel_info`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_type`
--
ALTER TABLE `payment_type`
 ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`reservation_id`), ADD UNIQUE KEY `customer_id` (`customer_customer_id`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`), ADD UNIQUE KEY `reservation_room_id` (`room_reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=38;
--
-- AUTO_INCREMENT for table `main_hotel_info`
--
ALTER TABLE `main_hotel_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `payment_type`
--
ALTER TABLE `payment_type`
MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `creditcard`
--
ALTER TABLE `creditcard`
ADD CONSTRAINT `creditcard_ibfk_1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`),
ADD CONSTRAINT `creditcard_ibfk_2` FOREIGN KEY (`reservation_reservation_id`) REFERENCES `reservation` (`reservation_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`customer_customer_id`) REFERENCES `customer` (`customer_id`);

--
-- Constraints for table `room`
--
ALTER TABLE `room`
ADD CONSTRAINT `room_ibfk_1` FOREIGN KEY (`room_reservation_id`) REFERENCES `reservation` (`reservation_id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
