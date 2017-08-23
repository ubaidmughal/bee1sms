-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 23, 2017 at 12:49 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bee1sms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblconfig`
--

CREATE TABLE `tblconfig` (
  `ConfigId` int(11) NOT NULL,
  `SupUId` varchar(50) NOT NULL,
  `SupUPwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblconfig`
--

INSERT INTO `tblconfig` (`ConfigId`, `SupUId`, `SupUPwd`) VALUES
(1, 'Irfan', 'css'),
(2, 'manager', 'manager');

-- --------------------------------------------------------

--
-- Table structure for table `tblmenugroup`
--

CREATE TABLE `tblmenugroup` (
  `id` int(11) NOT NULL,
  `GroupCode` int(11) NOT NULL,
  `GroupName` varchar(50) NOT NULL,
  `Position` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmenugroup`
--

INSERT INTO `tblmenugroup` (`id`, `GroupCode`, `GroupName`, `Position`) VALUES
(45, 3, 'wajahat', 4),
(51, 12, 'Twelve', 13),
(61, 34, 'thirtyfour', 34),
(62, 21, 'Tone', 21),
(63, 90, 'Ninety', 99),
(64, 80, 'eigth', 80),
(65, 79, 'seventynine', 79),
(66, 99, 'ninety', 99),
(67, 100, 'hundred', 100);

-- --------------------------------------------------------

--
-- Table structure for table `tblmenus`
--

CREATE TABLE `tblmenus` (
  `id` int(11) NOT NULL,
  `MenuCode` int(11) NOT NULL,
  `MenuName` varchar(50) NOT NULL,
  `MenuType` varchar(50) NOT NULL,
  `GroupCode` int(11) NOT NULL,
  `Position` int(11) NOT NULL,
  `Title` varchar(200) NOT NULL,
  `Detail` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblmenus`
--

INSERT INTO `tblmenus` (`id`, `MenuCode`, `MenuName`, `MenuType`, `GroupCode`, `Position`, `Title`, `Detail`) VALUES
(5, 1, 'Test', 'Test', 2, 1, 'Test', 'Test detial'),
(6, 2, 'two', 'test', 2, 3, 'test', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tblorg`
--

CREATE TABLE `tblorg` (
  `id` int(11) NOT NULL,
  `OrgCode` int(11) NOT NULL,
  `OrgType` varchar(50) NOT NULL,
  `OrgName` varchar(50) NOT NULL,
  `Description` varchar(500) NOT NULL,
  `Address` varchar(200) NOT NULL,
  `City` varchar(50) NOT NULL,
  `State` varchar(50) NOT NULL,
  `ZipCode` varchar(50) NOT NULL,
  `Phone` int(20) NOT NULL,
  `AdminId` varchar(50) NOT NULL,
  `AdminPwd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblorg`
--

INSERT INTO `tblorg` (`id`, `OrgCode`, `OrgType`, `OrgName`, `Description`, `Address`, `City`, `State`, `ZipCode`, `Phone`, `AdminId`, `AdminPwd`) VALUES
(1, 1, 'test', 'test', 'Test', 'house no 123', 'karachi', 'sindh', '74900', 90078601, 'Test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblconfig`
--
ALTER TABLE `tblconfig`
  ADD PRIMARY KEY (`ConfigId`);

--
-- Indexes for table `tblmenugroup`
--
ALTER TABLE `tblmenugroup`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblmenus`
--
ALTER TABLE `tblmenus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblorg`
--
ALTER TABLE `tblorg`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblconfig`
--
ALTER TABLE `tblconfig`
  MODIFY `ConfigId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tblmenugroup`
--
ALTER TABLE `tblmenugroup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `tblmenus`
--
ALTER TABLE `tblmenus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblorg`
--
ALTER TABLE `tblorg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
