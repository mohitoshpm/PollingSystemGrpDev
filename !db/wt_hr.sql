-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2020 at 06:46 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wt_hr`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `Id` int(11) NOT NULL,
  `FullName` varchar(256) NOT NULL,
  `Email` varchar(256) DEFAULT NULL,
  `Mobile` varchar(256) DEFAULT NULL,
  `Password` varchar(256) NOT NULL,
  `GenderEnumId` int(11) NOT NULL,
  `IsAdmin` tinyint(4) NOT NULL,
  `UserTypeEnumId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`Id`, `FullName`, `Email`, `Mobile`, `Password`, `GenderEnumId`, `IsAdmin`, `UserTypeEnumId`) VALUES
(2, 'Modho', 'modho@gmail.com', '+8801760645368', 'd41d8cd98f00b204e9800998ecf8427e', 1, 0, 2),
(3, 'Shomona', 'shomona@gmail.com', '+8801760645366', 'd41d8cd98f00b204e9800998ecf8427e', 2, 0, 1),
(4, 'Soniya', 'soniya@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 2, 0, 2),
(5, 'Rohim Mohi', 'rohim@gmail.com', '+8801760645366', 'd41d8cd98f00b204e9800998ecf8427e', 1, 0, 2),
(6, 'Korim', 'korim@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 2),
(19, 'Mohitosh ', 'employee@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 2),
(20, 'Mohi', 'mohi@gmail.com', '+8801760645366', '202cb962ac59075b964b07152d234b70', 1, 0, 1),
(24, 'Mohitosh Pramanik', 'mohitoshpm3@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 2),
(25, 'Mohitosh Pramanik', 'mohitoshpm@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_salaryhistory`
--

CREATE TABLE `user_salaryhistory` (
  `Id` int(11) NOT NULL,
  `ProfileId` int(11) NOT NULL,
  `Amount` float NOT NULL,
  `IsActive` tinyint(4) NOT NULL,
  `WorkingHour` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_salaryhistory`
--

INSERT INTO `user_salaryhistory` (`Id`, `ProfileId`, `Amount`, `IsActive`, `WorkingHour`) VALUES
(13, 20, 20000, 1, 160),
(16, 25, 50000, 1, 160);

-- --------------------------------------------------------

--
-- Table structure for table `work_history`
--

CREATE TABLE `work_history` (
  `Id` int(11) NOT NULL,
  `WorkedHour` int(11) NOT NULL,
  `ProfileId` int(11) NOT NULL,
  `Date` date NOT NULL,
  `CreateBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `work_history`
--

INSERT INTO `work_history` (`Id`, `WorkedHour`, `ProfileId`, `Date`, `CreateBy`) VALUES
(1, 8, 20, '2020-08-13', 25),
(2, 8, 20, '2020-08-12', 25),
(3, 8, 20, '2020-08-11', 25);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `user_salaryhistory`
--
ALTER TABLE `user_salaryhistory`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ProfileId` (`ProfileId`);

--
-- Indexes for table `work_history`
--
ALTER TABLE `work_history`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user_salaryhistory`
--
ALTER TABLE `user_salaryhistory`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `work_history`
--
ALTER TABLE `work_history`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_salaryhistory`
--
ALTER TABLE `user_salaryhistory`
  ADD CONSTRAINT `user_salaryhistory_ibfk_1` FOREIGN KEY (`ProfileId`) REFERENCES `user_profile` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
