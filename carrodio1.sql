-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 08, 2021 at 06:50 PM
-- Server version: 5.7.20-log
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carrodio1`
--

-- --------------------------------------------------------

--
-- Table structure for table `carbodytype`
--

DROP TABLE IF EXISTS `carbodytype`;
CREATE TABLE IF NOT EXISTS `carbodytype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bodType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carbodytype`
--

INSERT INTO `carbodytype` (`id`, `bodType`) VALUES
(1, 'Saloon'),
(2, 'Hatchback'),
(3, 'Station wagon'),
(4, 'Convertible'),
(5, 'Coupe'),
(6, 'SUV'),
(7, 'MPV'),
(8, 'Estate'),
(9, '4x4'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `carcolor`
--

DROP TABLE IF EXISTS `carcolor`;
CREATE TABLE IF NOT EXISTS `carcolor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `colName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carcolor`
--

INSERT INTO `carcolor` (`id`, `colName`) VALUES
(1, 'Beige'),
(2, 'Black'),
(3, 'Blue'),
(4, 'Brown'),
(5, 'Gold'),
(6, 'Green'),
(7, 'Gray'),
(8, 'Indigo'),
(9, 'Navy'),
(10, 'Orange'),
(11, 'Red'),
(12, 'Silver');

-- --------------------------------------------------------

--
-- Table structure for table `carcondition`
--

DROP TABLE IF EXISTS `carcondition`;
CREATE TABLE IF NOT EXISTS `carcondition` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `conName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carcondition`
--

INSERT INTO `carcondition` (`id`, `conName`) VALUES
(1, 'Brand New'),
(2, 'Reconditioned'),
(3, 'Used');

-- --------------------------------------------------------

--
-- Table structure for table `carenginecapacity`
--

DROP TABLE IF EXISTS `carenginecapacity`;
CREATE TABLE IF NOT EXISTS `carenginecapacity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `engCapacity` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carenginecapacity`
--

INSERT INTO `carenginecapacity` (`id`, `engCapacity`) VALUES
(1, '0.6L'),
(2, '0.7L'),
(3, '0.8L'),
(4, '0.9L'),
(5, '1.0L'),
(6, '1.2L'),
(7, '1.4L'),
(8, '1.5L'),
(9, '1.6L'),
(10, '1.7L'),
(11, '1.8L'),
(12, '1.9L'),
(13, '2.0L'),
(14, '2.2L'),
(15, '2.4L'),
(16, '3.0L'),
(17, '3.5L');

-- --------------------------------------------------------

--
-- Table structure for table `carfueltype`
--

DROP TABLE IF EXISTS `carfueltype`;
CREATE TABLE IF NOT EXISTS `carfueltype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fuelType` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carfueltype`
--

INSERT INTO `carfueltype` (`id`, `fuelType`) VALUES
(1, 'Petrol'),
(2, 'Diesel'),
(3, 'Hybrid'),
(4, 'Electronic'),
(5, 'Gas'),
(6, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `carimages`
--

DROP TABLE IF EXISTS `carimages`;
CREATE TABLE IF NOT EXISTS `carimages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fileName` varchar(45) DEFAULT NULL,
  `uploadedOn` varchar(45) DEFAULT NULL,
  `vehicleId` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carimages`
--

INSERT INTO `carimages` (`id`, `fileName`, `uploadedOn`, `vehicleId`) VALUES
(1, 'benz g 1.jpeg', '2021-04-16 14:27:00', '46'),
(2, 'benz g 2.jpeg', '2021-04-16 14:27:00', '46'),
(3, 'benz g 3.jpeg', '2021-04-16 14:27:00', '46'),
(4, 'benz g 4.jpeg', '2021-04-16 14:27:00', '46'),
(5, 'benz g 5.jpeg', '2021-04-16 14:27:00', '46'),
(6, 'bmw 7 1.jpeg', '2021-04-16 23:25:18', '48'),
(7, 'bmw 7 2.jpeg', '2021-04-16 23:25:18', '48'),
(8, 'bmw 7 3.jpeg', '2021-04-16 23:25:18', '48'),
(9, 'bmw 7 4.jpeg', '2021-04-16 23:25:18', '48'),
(10, 'bmw 7 5.jpeg', '2021-04-16 23:25:18', '48'),
(11, 'daihatsu_terios 1.jpeg', '2021-04-16 23:42:19', '50'),
(12, 'daihatsu_terios 2.jpeg', '2021-04-16 23:42:19', '50'),
(13, 'daihatsu_terios 3.jpeg', '2021-04-16 23:42:19', '50'),
(14, 'daihatsu_terios 4.jpeg', '2021-04-16 23:42:19', '50'),
(15, 'daihatsu_terios 5.jpeg', '2021-04-16 23:42:19', '50'),
(16, 'audi a5 1.jpeg', '2021-04-16 23:48:56', '45'),
(17, 'audi a5 2.jpeg', '2021-04-16 23:48:56', '45'),
(18, 'audi a5 3.jpeg', '2021-04-16 23:48:56', '45'),
(19, 'audi a5 4.jpeg', '2021-04-16 23:48:56', '45'),
(20, 'audi a5 5.jpeg', '2021-04-16 23:48:56', '45'),
(21, 'honda crv 1.jpeg', '2021-04-16 23:55:11', '47'),
(22, 'honda crv 2.jpeg', '2021-04-16 23:55:11', '47'),
(23, 'honda crv 3.jpeg', '2021-04-16 23:55:11', '47'),
(24, 'honda crv 4.jpeg', '2021-04-16 23:55:11', '47'),
(25, 'honda crv 5.jpeg', '2021-04-16 23:55:11', '47'),
(26, 'AETV23204465_1.jpg', '2021-04-17 00:02:37', '49'),
(27, 'AETV23204465_3.jpg', '2021-04-17 00:02:37', '49'),
(28, 'AETV23204465_4.jpg', '2021-04-17 00:02:37', '49'),
(29, 'AETV23204465_6.jpg', '2021-04-17 00:02:37', '49'),
(30, 'AETV23204465_8.jpg', '2021-04-17 00:02:37', '49');

-- --------------------------------------------------------

--
-- Table structure for table `carmanufacturer`
--

DROP TABLE IF EXISTS `carmanufacturer`;
CREATE TABLE IF NOT EXISTS `carmanufacturer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manuName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carmanufacturer`
--

INSERT INTO `carmanufacturer` (`id`, `manuName`) VALUES
(1, 'Audi'),
(2, 'BMW'),
(3, 'Mercedes-Benz'),
(4, 'Suzuki'),
(5, 'Toyota'),
(6, 'Honda'),
(7, 'Mazda'),
(8, 'Mitsubishi'),
(9, 'Nissan'),
(10, 'Daihatsu');

-- --------------------------------------------------------

--
-- Table structure for table `carmodel`
--

DROP TABLE IF EXISTS `carmodel`;
CREATE TABLE IF NOT EXISTS `carmodel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `modName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carmodel`
--

INSERT INTO `carmodel` (`id`, `modName`) VALUES
(1, '100'),
(2, '200'),
(3, '1 Series'),
(4, '6 Series'),
(5, '7 Series'),
(6, 'G Class'),
(7, 'S Class'),
(8, 'Alto'),
(9, 'Wagon R'),
(10, 'Camry'),
(11, 'Corolla'),
(12, 'Civic'),
(13, 'HR-V'),
(14, '5'),
(15, '6'),
(16, 'Terios');

-- --------------------------------------------------------

--
-- Table structure for table `carregyear`
--

DROP TABLE IF EXISTS `carregyear`;
CREATE TABLE IF NOT EXISTS `carregyear` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `regYr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `carregyear`
--

INSERT INTO `carregyear` (`id`, `regYr`) VALUES
(1, '2001'),
(2, '2002'),
(3, '2003'),
(4, '2004'),
(5, '2005'),
(6, '2006'),
(7, '2007'),
(8, '2008'),
(9, '2009'),
(10, '2010'),
(11, '2012'),
(12, '2013'),
(13, '2014'),
(14, '2015'),
(15, '2016'),
(16, '2017'),
(17, '2018'),
(18, '2019'),
(19, '2020'),
(20, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `cartransmission`
--

DROP TABLE IF EXISTS `cartransmission`;
CREATE TABLE IF NOT EXISTS `cartransmission` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transName` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cartransmission`
--

INSERT INTO `cartransmission` (`id`, `transName`) VALUES
(1, 'Automatic'),
(2, 'Manual'),
(3, 'Tiptronic'),
(4, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `comment` mediumtext NOT NULL,
  `rating` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `email`, `comment`, `rating`) VALUES
(5, 'Dinithi', 'niharaperera3@gmail.com', 'xxxxxxxxxxxxxxx', 0),
(6, 'Nihara', 'niharaperera3@gmail.com', 'Recommend the seller', 0),
(18, 'remon', 'remonkavi@gmail.com', 'love this car', 0),
(19, 'MPerera', 'niharaperera3@gmail.com', 'Recommend the seller', 0),
(20, 'N Fernando', 'niharaperera3@gmail.com', 'Recommend the seller', 0),
(31, 'Nihara Perera', 'niharaperera3@gmail.com', 'Nice car', 2),
(32, 'Nihara Perera', 'niharaperera3@gmail.com', 'Nice car', 2),
(33, 'Nihara Perera', 'niharaperera3@gmail.com', 'Nice car', 2),
(34, 'Nihara Perera', 'niharaperera3@gmail.com', 'Nice car', 2),
(35, 'GFernando', 'niharaperera3@gmail.com', 'Recommend seller', 0),
(36, 'D N Perera', 'niharaperera3@gmail.com', 'Nice', 4),
(37, 'S Perera', 'niharaperera3@gmail.com', 'Nice car', 3);

-- --------------------------------------------------------

--
-- Table structure for table `contacthistory`
--

DROP TABLE IF EXISTS `contacthistory`;
CREATE TABLE IF NOT EXISTS `contacthistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bname` varchar(45) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `bloc` varchar(45) DEFAULT NULL,
  `bemail` varchar(45) DEFAULT NULL,
  `bmob` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacthistory`
--

INSERT INTO `contacthistory` (`id`, `bname`, `date`, `bloc`, `bemail`, `bmob`) VALUES
(1, 'D Perera', NULL, 'Ja-Ela', 'niharaperera3@gmail.com', '0771458726'),
(2, 'M Fernando', NULL, 'Gampaha', 'niharaperera3@gmail.com', '0771459826'),
(3, 'N Jayakody', NULL, 'Colombo', 'niharaperera3@gmail.com', '0761452874'),
(4, 'M F Kurera', NULL, 'Ja-Ela', 'niharaperera3@gmail.com', '0714528745'),
(5, 'H S Perera', NULL, 'Kadawatha', 'niharaperera3@gmail.com', '0771428796'),
(6, 'D N Perera', NULL, 'Ja-Ela', 'niharaperera3@gmail.com', '0715246145'),
(7, 'ABC Fernando', NULL, 'C', 'niharaperera3@gmail.com', '0774521844'),
(8, 'A M Fernando', NULL, 'Gampaha', 'niharaperera3@gmail.com', '0712345678');

-- --------------------------------------------------------

--
-- Table structure for table `modelyear`
--

DROP TABLE IF EXISTS `modelyear`;
CREATE TABLE IF NOT EXISTS `modelyear` (
  `id` int(11) NOT NULL,
  `modYr` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modelyear`
--

INSERT INTO `modelyear` (`id`, `modYr`) VALUES
(1, '2001'),
(2, '2002'),
(3, '2003'),
(4, '2004'),
(5, '2005'),
(6, '2006'),
(7, '2007'),
(8, '2008'),
(9, '2009'),
(10, '2010'),
(11, '2012'),
(12, '2013'),
(13, '2014'),
(14, '2015'),
(15, '2016'),
(16, '2017'),
(17, '2018'),
(18, '2019'),
(19, '2020'),
(20, '2021');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `email` varchar(45) NOT NULL,
  `uname` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `cno` varchar(45) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `logins` int(11) NOT NULL DEFAULT '0',
  `pviews` int(11) NOT NULL DEFAULT '0',
  `comments` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `uname`, `address`, `cno`, `password`, `logins`, `pviews`, `comments`) VALUES
('cb008425@students.apiit.lk', 'Dinithi Perera', '700, Colombo Road, Negombo', '0771234567', 'dinithi', 4, 0, 0),
('niharaperera3@gmail.com', 'Nihara', '700,Colombo Road, Negombo', '0771245786', 'nihara', 3, 58, 18),
('remonkavi@gmail.com', 'remon', '115 henmulla kochchikade', '0702110398', 'remon', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `uname` varchar(50) NOT NULL,
  `address` varchar(50) NOT NULL,
  `cno` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `uname`, `address`, `cno`) VALUES
(7, 'remonkavi@gmail.com', 'ramen', '115 henmulla', '09090'),
(8, 'dinithi3@gmail.com', 'dinithi', 'Kurana', '071038392'),
(9, 'swetha.kaushaki@gmail.com', 'swetha', 'no 289 wattala', '071928394');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

DROP TABLE IF EXISTS `vehicle`;
CREATE TABLE IF NOT EXISTS `vehicle` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manufacturer` varchar(45) DEFAULT NULL,
  `model` varchar(45) DEFAULT NULL,
  `modelYr` varchar(45) DEFAULT NULL,
  `vCondition` varchar(45) DEFAULT NULL,
  `color` varchar(45) DEFAULT NULL,
  `bodyType` varchar(45) DEFAULT NULL,
  `fuelType` varchar(45) DEFAULT NULL,
  `regYr` varchar(45) DEFAULT NULL,
  `engCapacity` varchar(45) DEFAULT NULL,
  `transmission` varchar(45) DEFAULT NULL,
  `mileage` varchar(45) DEFAULT NULL,
  `sname` varchar(45) DEFAULT NULL,
  `scno` varchar(45) DEFAULT NULL,
  `semail` varchar(45) DEFAULT NULL,
  `sloc` varchar(45) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  `addDetails` varchar(45) DEFAULT NULL,
  `views` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`id`, `manufacturer`, `model`, `modelYr`, `vCondition`, `color`, `bodyType`, `fuelType`, `regYr`, `engCapacity`, `transmission`, `mileage`, `sname`, `scno`, `semail`, `sloc`, `price`, `addDetails`, `views`) VALUES
(45, 'Audi', '5', '2005', 'Brand New', 'Orange', 'Coupe', 'Electronic', '2018', '2.2L', 'Tiptronic', '27000', 'Minroeyol', '0714523672', 'niharaperera3@gmail.com', 'Kandy', '14500000', '                                             ', 3),
(46, 'Mercedes-Benz', 'G Class', '2015', 'Used', 'Black', 'SUV', 'Petrol', '2016', '2.4L', 'Automatic', '35000', 'Dinithi', '0772626216', 'niharaperera3@gmail.com', 'Negombo', '48000000', 'Leather Seats, Sunroof/Moonroof, Navigation S', 5),
(47, 'Honda', 'HR-V', '2014', 'Used', 'Gray', 'SUV', 'Petrol', '2015', '2.2L', 'Manual', '48000', 'Mevan', '0761524875', 'niharaperera3@gmail.com', 'Gampola', '11600000', 'ABS Brakes,Air Conditioning,Automatic Headlig', 0),
(48, 'BMW', '7 Series', '2018', 'Used', 'Black', 'Coupe', 'Petrol', '2019', '2.4L', 'Automatic', '45000', 'Naveen', '0761234567', 'niharaperera3@gmail.com', 'Colombo', '29000000', '\r\nLeather Seats, Driver Assistance Package, S', 7),
(49, 'Mazda', '5', '2008', 'Used', 'Silver', 'Hatchback', 'Petrol', '2010', '2.2L', 'Automatic', '48000', 'Kevin', '0771452986', 'niharaperera3@gmail.com', 'Galle', '27900000', 'Air filtration, Front air conditioning      ', 50),
(50, 'Daihatsu', 'Terios', '2007', 'Used', 'Red', 'SUV', 'Diesel', '2008', '2.4L', 'Manual', '47000', 'Davin', '0714523671', 'niharaperera3@gmail.com', 'Ja-Ela', '4500000', 'Air-Conditioning                             ', 0);

-- --------------------------------------------------------

--
-- Table structure for table `vehiclestatus`
--

DROP TABLE IF EXISTS `vehiclestatus`;
CREATE TABLE IF NOT EXISTS `vehiclestatus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL,
  `vstatus` varchar(45) DEFAULT 'unverified',
  PRIMARY KEY (`id`),
  KEY `vehicleid` (`vid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `vid`) VALUES
(38, 48),
(39, 45),
(40, 46);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `vehiclestatus`
--
ALTER TABLE `vehiclestatus`
  ADD CONSTRAINT `vehicleid` FOREIGN KEY (`vid`) REFERENCES `vehicle` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
