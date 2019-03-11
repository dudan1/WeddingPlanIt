-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--

-- Host: localhost
-- Generation Time: Mar 11, 2019 at 09:27 PM
-- Server version: 5.5.45
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db1809591_cmm007`
--

-- --------------------------------------------------------

--
-- Table structure for table `contracts`
--

CREATE TABLE `contracts` (
  `Cust_ID` int(11) NOT NULL,
  `SP_ID` int(11) NOT NULL,
  `Contract_date` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contracts`
--

INSERT INTO `contracts` (`Cust_ID`, `SP_ID`, `Contract_date`) VALUES
(11, 11, '2019-03-11 12:17:20'),
(11, 13, '2019-03-11 12:10:27'),
(12, 8, '2019-03-11 18:25:26'),
(12, 10, '2019-03-11 18:04:28'),
(13, 13, '2019-03-11 13:19:50');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `C_ID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`C_ID`, `email`, `first_name`, `surname`) VALUES
(11, 'duncan@gmail.com', 'Duncan', 'Orr'),
(12, 'tiwobanda@gmail.com', 'Tiwonge', 'Banda'),
(13, 'do@gmail.com', 'do', 'do'),
(14, 'do@gmail.com', 'do', 'do');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `SP_ID` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `first_name` varchar(15) DEFAULT NULL,
  `surname` varchar(20) DEFAULT NULL,
  `address` varchar(60) DEFAULT NULL,
  `postcode` varchar(8) DEFAULT NULL,
  `category` varchar(15) DEFAULT NULL,
  `business_name` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`SP_ID`, `email`, `first_name`, `surname`, `address`, `postcode`, `category`, `business_name`) VALUES
(8, 'd@gmail.com', 'd', 'd', 'd', 'd', 'Music', 'Joab Entertainment'),
(9, 'g@gmail.com', 'f', 'f', 'f', 'f', 'Music', 'DJ Wako'),
(10, 'dun@gmail.com', 'dun', 'dun', 'dun', 'dun', 'Venue', 'Dun Gardens'),
(11, 'joe@gmail.com', 'joe', 'joe', 'joe', 'joe', 'Flowers', 'Joe Flowers'),
(12, 'tiwo@banda.me', 'Tiwonge', 'Banda', '167 Freedom Steet', 'LL2 4BD', 'Beautician', 'Tiwonge Media Inc'),
(13, 'duncano@gmail.com', 'Duncan', 'Orr', '34 Queen Street, Liverpool', 'LI12 H', 'flowers', 'Duncanos Flowers');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `email` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`email`, `password`, `user_type`) VALUES
('d@gmail.com', 'd', 'Service Provider'),
('do@gmail.com', 'do', 'Customer'),
('dun@gmail.com', 'dun', 'Service Provider'),
('duncan@gmail.com', 'duncan', 'Customer'),
('duncano@gmail.com', 'duncano', 'Service Provider'),
('g@gmail.com', 'g', 'Service Provider'),
('joe@gmail.com', 'joe', 'Service Provider'),
('tiwo@banda.me', 'tiwo', 'Service Provider'),
('tiwobanda@gmail.com', '2019', 'Customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contracts`
--
ALTER TABLE `contracts`
  ADD PRIMARY KEY (`Cust_ID`,`SP_ID`),
  ADD KEY `fk_Contracts_Service_Provider` (`SP_ID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`C_ID`),
  ADD KEY `fk_customer_users` (`email`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`SP_ID`),
  ADD KEY `fk_service_provider_users` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `C_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `SP_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `contracts`
--
ALTER TABLE `contracts`
  ADD CONSTRAINT `fk_Contracts_Customer` FOREIGN KEY (`Cust_ID`) REFERENCES `customer` (`C_ID`),
  ADD CONSTRAINT `fk_Contracts_Service_Provider` FOREIGN KEY (`SP_ID`) REFERENCES `service_provider` (`SP_ID`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_users` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD CONSTRAINT `fk_service_provider_users` FOREIGN KEY (`email`) REFERENCES `users` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
