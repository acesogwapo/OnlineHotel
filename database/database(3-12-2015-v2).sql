-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2015 at 04:59 PM
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
  `admin_pass` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_fname`, `admin_lname`, `admin_pass`, `username`) VALUES
(1, 'Nathaniel', 'Jamilla', 'fe703d258c7ef5f50b71e06565a65aa07194907f', 'admin');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
`customer_id` int(11) NOT NULL,
  `customer_fname` varchar(45) NOT NULL,
  `customer_lname` varchar(45) NOT NULL,
  `customer_address` varchar(45) NOT NULL,
  `customer_number` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=55 ;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_fname`, `customer_lname`, `customer_address`, `customer_number`) VALUES
(43, 'sdsadas', 'sadasd', 'asdadas', 2147483647),
(44, 'asdasdasda', 'Hello', 'asdasdadas', 2147483647),
(45, 'Jamilla', 'Ace', '285 Lamac Consolation, Cebu city', 937489435),
(46, 'Maderazo', 'John', '324-D, Alamo, Sydney, Australia', 1232131312),
(47, 'Jamilla', 'Nathaniel', '285 Lamac Consolacion, Cebu City', 2147483647),
(48, 'Maderazo', 'Ace', 'jfa;sldfhagsa;dfj', 935772349),
(49, 'Wayne', 'Ace', 'kasldfasjhgdalghj', 2147483647),
(50, 'Wayne', 'Ace', 'kasldfasjhgdalghj', 2147483647),
(51, 'afjha', 'Ace', 'asflhasf', 2147483647),
(52, 'afjha', 'Ace', 'asflhasf', 2147483647),
(53, 'jaskdfg', 'ace', 'askdjgaslkjgh', 2147483647),
(54, 'Echiverri', 'Louiz', 'sasdasdsadsa', 2147483647);

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
(1, 34, 'Bungalow', 3000),
(2, 8, 'Deluxe', 6000),
(3, 19, 'Executive', 10000),
(4, 9, 'Presidential Suite', 15000);

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
  `customer_customer_id` int(11) NOT NULL,
  `reservation_confirmation_code` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `reservation_date`, `reservation_checkin`, `reservation_checkout`, `reservation_totalpayment`, `payment_type`, `customer_customer_id`, `reservation_confirmation_code`) VALUES
(72, '2015-03-12', '2015-03-13', '2015-03-15', 12000, 'Cash', 54, 7539);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE IF NOT EXISTS `room` (
`room_id` int(11) NOT NULL,
  `room_type` enum('Bungalow','Deluxe','Executive','Presidential Suite') NOT NULL,
  `number_accomodate` int(11) NOT NULL,
  `room_reservation_id` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`room_id`, `room_type`, `number_accomodate`, `room_reservation_id`) VALUES
(35, 'Deluxe', 9, 72);

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
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
 ADD PRIMARY KEY (`reservation_id`), ADD UNIQUE KEY `customer_id` (`customer_customer_id`), ADD UNIQUE KEY `reservation_confirmation_code` (`reservation_confirmation_code`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
 ADD PRIMARY KEY (`room_id`), ADD UNIQUE KEY `reservation_room_id` (`room_reservation_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `creditcard`
--
ALTER TABLE `creditcard`
MODIFY `cc_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=55;
--
-- AUTO_INCREMENT for table `main_hotel_info`
--
ALTER TABLE `main_hotel_info`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `room`
--
ALTER TABLE `room`
MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=36;
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
