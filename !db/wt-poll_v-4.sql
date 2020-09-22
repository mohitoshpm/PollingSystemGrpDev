-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2020 at 12:30 AM
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
-- Database: `wt-poll`
--

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `Id` int(11) NOT NULL,
  `File_Path` text NOT NULL,
  `File_Name` text NOT NULL,
  `File_Extension` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`Id`, `File_Path`, `File_Name`, `File_Extension`) VALUES
(67, 'uploads/', 'lucas-benjamin-wQLAGv4_OYs-unsplash.jpg', 'jpg'),
(68, 'uploads/', 'pawel-czerwinski-tMbQpdguDVQ-unsplash.jpg', 'jpg'),
(69, 'uploads/', 'rene-bohmer-YeUVDKZWSZ4-unsplash.jpg', 'jpg'),
(70, 'uploads/', 'jared-arango-1-mh6U3qeGQ-unsplash.jpg', 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `poll`
--

CREATE TABLE `poll` (
  `Id` int(11) NOT NULL,
  `Name` longtext NOT NULL,
  `StatusEnumId` int(11) NOT NULL,
  `TypeEnumId` int(11) NOT NULL,
  `IsPublic` tinyint(1) NOT NULL,
  `ImageId` int(11) DEFAULT NULL,
  `CreateBy` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll`
--

INSERT INTO `poll` (`Id`, `Name`, `StatusEnumId`, `TypeEnumId`, `IsPublic`, `ImageId`, `CreateBy`) VALUES
(8, 'What Programming language you like?', 1, 1, 0, NULL, 25),
(9, 'What is your next plan?', 1, 1, 0, NULL, 27),
(10, 'What type of food you like?', 1, 1, 0, NULL, 26);

-- --------------------------------------------------------

--
-- Table structure for table `poll_option`
--

CREATE TABLE `poll_option` (
  `Id` int(11) NOT NULL,
  `PollId` int(11) NOT NULL,
  `Name` text NOT NULL,
  `OrderNo` int(11) NOT NULL,
  `ImageId` int(11) DEFAULT NULL,
  `PollCount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poll_option`
--

INSERT INTO `poll_option` (`Id`, `PollId`, `Name`, `OrderNo`, `ImageId`, `PollCount`) VALUES
(53, 8, 'C', 1, NULL, 0),
(54, 8, 'C++', 2, NULL, 0),
(55, 8, 'Java', 3, NULL, 0),
(56, 8, 'C#', 4, NULL, 1),
(57, 8, 'PHP', 5, NULL, 1),
(58, 9, 'Higher Study', 1, NULL, 0),
(59, 9, 'Job', 2, NULL, 0),
(60, 9, 'Business', 3, NULL, 0),
(61, 10, 'Sweet', 1, NULL, 0),
(62, 10, 'Vegetables', 2, NULL, 0),
(63, 10, 'Meat, Fish, Poultry, Eggs', 3, NULL, 0);

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
(25, 'Mohitosh Pramanik', 'mohitoshpm@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 1),
(26, 'Mohitosh Pramanik', 'mohitoshpm15@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 1),
(27, 'Mohitosh Pramanik', 'mohitoshpm16@gmail.com', '+8801760645364', '202cb962ac59075b964b07152d234b70', 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `Id` int(11) NOT NULL,
  `PollId` int(11) NOT NULL,
  `ProfileId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`Id`, `PollId`, `ProfileId`) VALUES
(8, 8, 25),
(9, 8, 26);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `poll`
--
ALTER TABLE `poll`
  ADD UNIQUE KEY `Id` (`Id`),
  ADD KEY `ImageId` (`ImageId`),
  ADD KEY `CreateBy` (`CreateBy`);

--
-- Indexes for table `poll_option`
--
ALTER TABLE `poll_option`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `ImageId` (`ImageId`),
  ADD KEY `PollId` (`PollId`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD PRIMARY KEY (`Id`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `poll`
--
ALTER TABLE `poll`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `poll_option`
--
ALTER TABLE `poll_option`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;
--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `vote`
--
ALTER TABLE `vote`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `poll`
--
ALTER TABLE `poll`
  ADD CONSTRAINT `poll_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`Id`),
  ADD CONSTRAINT `poll_ibfk_2` FOREIGN KEY (`CreateBy`) REFERENCES `user_profile` (`Id`);

--
-- Constraints for table `poll_option`
--
ALTER TABLE `poll_option`
  ADD CONSTRAINT `poll_option_ibfk_1` FOREIGN KEY (`ImageId`) REFERENCES `image` (`Id`),
  ADD CONSTRAINT `poll_option_ibfk_2` FOREIGN KEY (`PollId`) REFERENCES `poll` (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
