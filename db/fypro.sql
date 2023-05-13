-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 14, 2023 at 04:24 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fypro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `password`, `name`) VALUES
(1, 'Jayden', '5ebce7d6811d66582777a8f2e109815f', 'Jayden');

-- --------------------------------------------------------

--
-- Table structure for table `bag`
--

CREATE TABLE `bag` (
  `bag_id` int(3) NOT NULL,
  `bag_name` varchar(255) NOT NULL,
  `bag_price` decimal(7,2) NOT NULL,
  `bag_stock` int(3) NOT NULL,
  `bag_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bag`
--

INSERT INTO `bag` (`bag_id`, `bag_name`, `bag_price`, `bag_stock`, `bag_detail`) VALUES
(2, 'bag02', '25.00', 5, 'bag02');

-- --------------------------------------------------------

--
-- Table structure for table `clothes`
--

CREATE TABLE `clothes` (
  `clothes_id` int(3) NOT NULL,
  `clothes_name` varchar(255) NOT NULL,
  `clothes_price` decimal(7,2) NOT NULL,
  `clothes_stock` int(3) NOT NULL,
  `clothes_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clothes`
--

INSERT INTO `clothes` (`clothes_id`, `clothes_name`, `clothes_price`, `clothes_stock`, `clothes_detail`) VALUES
(1, 'Clothes01', '50.00', 100, 'Clothes01'),
(2, 'Clothes02', '39.99', 78, 'clothes02');

-- --------------------------------------------------------

--
-- Table structure for table `racquet`
--

CREATE TABLE `racquet` (
  `racquet_id` int(11) NOT NULL,
  `racquet_name` varchar(255) NOT NULL,
  `racquet_price` decimal(7,2) NOT NULL,
  `racquet_stock` int(3) NOT NULL,
  `racquet_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `racquet`
--

INSERT INTO `racquet` (`racquet_id`, `racquet_name`, `racquet_price`, `racquet_stock`, `racquet_detail`) VALUES
(2, 'racquet02', '192.00', 20, 'racquet02'),
(3, 'racquet03', '158.00', 26, 'racquet03'),
(4, 'racquet04', '300.00', 30, 'racquet04');

-- --------------------------------------------------------

--
-- Table structure for table `shoe`
--

CREATE TABLE `shoe` (
  `shoe_id` int(3) NOT NULL,
  `shoe_name` varchar(255) NOT NULL,
  `shoe_price` decimal(7,2) NOT NULL,
  `shoe_stock` int(3) NOT NULL,
  `shoe_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shoe`
--

INSERT INTO `shoe` (`shoe_id`, `shoe_name`, `shoe_price`, `shoe_stock`, `shoe_detail`) VALUES
(1, 'Shoe01', '288.00', 100, 'shoe01');

-- --------------------------------------------------------

--
-- Table structure for table `shuttlecock`
--

CREATE TABLE `shuttlecock` (
  `shuttlecock_id` int(3) NOT NULL,
  `shuttlecock_name` varchar(255) NOT NULL,
  `shuttlecock_price` decimal(7,2) NOT NULL,
  `shuttlecock_stock` int(3) NOT NULL,
  `shuttlecock_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `shuttlecock`
--

INSERT INTO `shuttlecock` (`shuttlecock_id`, `shuttlecock_name`, `shuttlecock_price`, `shuttlecock_stock`, `shuttlecock_detail`) VALUES
(1, 'Shuttlecock01', '50.00', 15, 'shuttlecock01');

-- --------------------------------------------------------

--
-- Table structure for table `string`
--

CREATE TABLE `string` (
  `string_id` int(3) NOT NULL,
  `string_name` varchar(255) NOT NULL,
  `string_price` decimal(7,2) NOT NULL,
  `string_stock` int(3) NOT NULL,
  `string_detail` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `string`
--

INSERT INTO `string` (`string_id`, `string_name`, `string_price`, `string_stock`, `string_detail`) VALUES
(1, 'String01', '30.00', 20, 'string01');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`bag_id`);

--
-- Indexes for table `clothes`
--
ALTER TABLE `clothes`
  ADD PRIMARY KEY (`clothes_id`);

--
-- Indexes for table `racquet`
--
ALTER TABLE `racquet`
  ADD PRIMARY KEY (`racquet_id`);

--
-- Indexes for table `shoe`
--
ALTER TABLE `shoe`
  ADD PRIMARY KEY (`shoe_id`);

--
-- Indexes for table `shuttlecock`
--
ALTER TABLE `shuttlecock`
  ADD PRIMARY KEY (`shuttlecock_id`);

--
-- Indexes for table `string`
--
ALTER TABLE `string`
  ADD PRIMARY KEY (`string_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bag`
--
ALTER TABLE `bag`
  MODIFY `bag_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `clothes`
--
ALTER TABLE `clothes`
  MODIFY `clothes_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `racquet`
--
ALTER TABLE `racquet`
  MODIFY `racquet_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `shoe`
--
ALTER TABLE `shoe`
  MODIFY `shoe_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `shuttlecock`
--
ALTER TABLE `shuttlecock`
  MODIFY `shuttlecock_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `string`
--
ALTER TABLE `string`
  MODIFY `string_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
