-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 28, 2020 at 08:55 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `MIS`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_location`
--

CREATE TABLE `tbl_location` (
  `id` int(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `distance` varchar(50) NOT NULL,
  `is_available` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_location`
--

INSERT INTO `tbl_location` (`id`, `name`, `distance`, `is_available`) VALUES
(1, 'Charbagh', '0', 0),
(2, 'Indira Nagar', '10', 1),
(3, 'BBD', '30', 1),
(4, 'Barabanki', '60', 1),
(5, 'Faizabad', '100', 1),
(6, 'Basti', '150', 1),
(7, 'Gorakhpur', '210', 1),
(11, 'Delhi', '600', 1),
(12, 'cedcoss', '20', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ride`
--

CREATE TABLE `tbl_ride` (
  `ride_id` int(20) NOT NULL,
  `ride_date` date NOT NULL,
  `fromLocation` varchar(50) NOT NULL,
  `toLocation` varchar(50) NOT NULL,
  `cabtype` varchar(50) NOT NULL,
  `total_distance` varchar(50) NOT NULL,
  `luggage` varchar(50) NOT NULL,
  `total_fare` varchar(50) NOT NULL,
  `status` int(20) NOT NULL,
  `customer_user_id` varchar(50) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_ride`
--

INSERT INTO `tbl_ride` (`ride_id`, `ride_date`, `fromLocation`, `toLocation`, `cabtype`, `total_distance`, `luggage`, `total_fare`, `status`, `customer_user_id`, `is_deleted`) VALUES
(1, '2020-11-25', 'Charbagh', 'Indira Nagar', 'CedMicro', '10', '0', '185', 0, '5', 1),
(4, '2020-11-25', 'Charbagh', 'Basti', 'CedRoyal', '150', '10', '2153', 2, '5', 0),
(5, '2020-11-25', 'BBD', 'Barabanki', 'CedMini', '30', '0', '555', 2, '5', 1),
(6, '2020-11-25', 'Charbagh', 'Barabanki', 'CedMini', '60', '10', '945', 0, '5', 0),
(7, '2020-11-25', 'Indira Nagar', 'Barabanki', 'CedMini', '50', '0', '815', 2, '6', 1),
(8, '2020-11-25', 'Charbagh', 'Indira Nagar', 'CedRoyal', '10', '0', '355', 1, '5', 0),
(9, '2020-11-25', 'Charbagh', 'Barabanki', 'CedMini', '60', '15', '945', 2, '5', 1),
(10, '2020-11-25', 'Indira Nagar', 'Barabanki', 'CedMicro', '50', '0', '665', 0, '5', 1),
(11, '2020-11-26', 'Barabanki', 'Basti', 'CedMicro', '90', '0', '1091', 2, '5', 1),
(13, '2020-11-26', 'Indira Nagar', 'Delhi', 'CedMicro', '590', '0', '5460', 1, '5', 0),
(14, '2020-11-26', 'Charbagh', 'Delhi', 'CedMini', '600', '0', '6245', 0, '5', 0),
(15, '2020-11-26', 'Charbagh', 'Indira Nagar', 'CedMicro', '10', '0', '185', 1, '5', 0),
(16, '2020-11-26', 'Indira Nagar', 'Barabanki', 'CedMicro', '50', '0', '665', 1, '5', 0),
(17, '2020-11-27', 'Delhi', 'Charbagh', 'CedMicro', '600', '0', '5545', 2, '5', 1),
(18, '2020-11-28', 'Charbagh', 'Basti', 'CedMicro', '150', '0', '1703', 1, '5', 0),
(19, '2020-11-28', 'Indira Nagar', 'Barabanki', 'CedMicro', '50', '0', '665', 0, '5', 0),
(20, '2020-11-28', 'Indira Nagar', 'BBD', 'CedMini', '20', '50', '425', 1, '1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `dateofsignup` datetime NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `isblock` tinyint(1) NOT NULL,
  `password` varchar(50) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `username`, `name`, `email`, `dateofsignup`, `mobile`, `isblock`, `password`, `is_admin`) VALUES
(1, 'shivam123', 'Rajiv', 'rajivranjanshrivastav@cedcoss.com', '2020-11-24 09:28:52', '9931392583', 0, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(3, 'shivam@1234', 'Rajiv', 'rajivranjanshrivastav@cedcoss.com', '2020-11-24 10:43:15', '9931392583', 1, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(4, 'shivam@12345', 'Rajiv', 'rajivranjanshrivastav@cedcoss.com', '2020-11-24 11:39:37', '9931392583', 1, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(5, 'rajiv@123', 'Rajiv Ranjan Shrivastav', 'rajivranjanshrivastav@cedcoss.com', '2020-11-24 11:50:31', '9931392583', 0, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(6, 'user@123', 'Rajiv', 'rajivranjanshrivastav@cedcoss.com', '2020-11-25 12:06:34', '9931392583', 1, '827ccb0eea8a706c4c34a16891f84e7b', 0),
(7, 'admin', 'admin', 'admin@gmail.com', '2020-11-25 14:16:36', '9931392583', 0, '827ccb0eea8a706c4c34a16891f84e7b', 1),
(8, 'John_Pencil', 'John Wick', 'johnwickwithdog@gmail.com', '2020-11-28 09:27:46', '9931392583', 1, '5c4741bf004eddc1f9aed1f000798846', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_location`
--
ALTER TABLE `tbl_location`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ride`
--
ALTER TABLE `tbl_ride`
  ADD PRIMARY KEY (`ride_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_location`
--
ALTER TABLE `tbl_location`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_ride`
--
ALTER TABLE `tbl_ride`
  MODIFY `ride_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
