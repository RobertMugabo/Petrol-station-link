-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 17, 2024 at 08:04 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `petrol station link`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `ID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `station_workers`
--

CREATE TABLE `station_workers` (
  `ID` int(11) NOT NULL,
  `first name` varchar(255) NOT NULL,
  `last name` varchar(255) NOT NULL,
  `phone number` varchar(13) NOT NULL,
  `National ID` varchar(16) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `company` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `station_workers`
--

INSERT INTO `station_workers` (`ID`, `first name`, `last name`, `phone number`, `National ID`, `Email`, `company`, `password`) VALUES
(1, 'Robert', 'MUGABO ', '0789999999', '1200180196517035', 'roro@gmail.com', 'Meru star', '$2y$10$/woamng3dlHic276uK2Z5uG7D.hCoLApP8a4tP9/JiKLdUfsEoIqS');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `first name` varchar(255) NOT NULL,
  `last name` varchar(255) NOT NULL,
  `phone number` varchar(20) NOT NULL,
  `company` varchar(255) NOT NULL,
  `Date created` datetime(6) NOT NULL DEFAULT current_timestamp(6),
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='This table size (elements) can be extended';

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `first name`, `last name`, `phone number`, `company`, `Date created`, `Password`) VALUES
(1, 'James', 'GASHUGI', '+250789438711', 'Jali transport', '2024-08-06 23:26:02.322748', '123'),
(2, 'Robert', 'MUGABO', '+250789492390', 'EXCEL Tours', '2024-08-06 23:27:22.610587', '123'),
(3, 'Marcel', 'IRADUKUNDA', '+250789438712', '', '2024-08-06 23:32:33.939228', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `station_workers`
--
ALTER TABLE `station_workers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `station_workers`
--
ALTER TABLE `station_workers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
