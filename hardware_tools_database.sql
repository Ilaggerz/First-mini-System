-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 22, 2022 at 03:58 PM
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
-- Database: `hardware tools database`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(10) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Username` varchar(20) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `Name`, `Username`, `Password`) VALUES
(1, 'admin', 'admin', 'admin'),
(2, 'Ivan', 'user', 'user'),
(3, 'Ivan ', 'Ivan', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `cleaning`
--

CREATE TABLE `cleaning` (
  `ID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Ship_date` date NOT NULL,
  `Price` float(10,2) NOT NULL,
  `ship_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cleaning`
--

INSERT INTO `cleaning` (`ID`, `Name`, `Ship_date`, `Price`, `ship_order`) VALUES
(7, 'Air Cannister', '2001-10-10', 200.99, 'EYAHS12'),
(12, 'Clean spray', '1999-12-10', 5871.99, 'EYAHS12');

-- --------------------------------------------------------

--
-- Table structure for table `esd`
--

CREATE TABLE `esd` (
  `ID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Ship_date` date NOT NULL,
  `Price` float(10,2) NOT NULL,
  `ship_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `esd`
--

INSERT INTO `esd` (`ID`, `Name`, `Ship_date`, `Price`, `ship_order`) VALUES
(16, 'Anti static Gloves', '2001-10-10', 1000.99, 'KZHS512');

-- --------------------------------------------------------

--
-- Table structure for table `hand`
--

CREATE TABLE `hand` (
  `ID` int(10) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Ship_date` date NOT NULL,
  `Price` float(10,2) NOT NULL,
  `ship_order` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hand`
--

INSERT INTO `hand` (`ID`, `Name`, `Ship_date`, `Price`, `ship_order`) VALUES
(2, 'Scredriver', '2001-10-12', 8857.99, 'HDWUASDY'),
(5, 'Hand Drill', '2022-07-21', 2000.99, 'GHASTDW');

-- --------------------------------------------------------

--
-- Table structure for table `total_inventory`
--

CREATE TABLE `total_inventory` (
  `Tool_id` varchar(10) NOT NULL,
  `Tool_name` varchar(20) NOT NULL,
  `Section` varchar(20) NOT NULL,
  `Acc_handle` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total_inventory`
--

INSERT INTO `total_inventory` (`Tool_id`, `Tool_name`, `Section`, `Acc_handle`) VALUES
('EYAHS12', 'HAND', 'LAND', 1),
('GHASTDW', 'HAND ', 'SECTION A', 3),
('HDWUASDY', 'ESD', 'ASDWU12', 2),
('KZHS512', 'HAND', 'FHQS1', 1),
('TEST', 'CLEAN', 'AHSD12', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cleaning`
--
ALTER TABLE `cleaning`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ship_order` (`ship_order`);

--
-- Indexes for table `esd`
--
ALTER TABLE `esd`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ship_order` (`ship_order`);

--
-- Indexes for table `hand`
--
ALTER TABLE `hand`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `ship_order` (`ship_order`);

--
-- Indexes for table `total_inventory`
--
ALTER TABLE `total_inventory`
  ADD PRIMARY KEY (`Tool_id`),
  ADD KEY `Acc_handle` (`Acc_handle`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cleaning`
--
ALTER TABLE `cleaning`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `esd`
--
ALTER TABLE `esd`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `hand`
--
ALTER TABLE `hand`
  MODIFY `ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cleaning`
--
ALTER TABLE `cleaning`
  ADD CONSTRAINT `cleaning_ibfk_1` FOREIGN KEY (`ship_order`) REFERENCES `total_inventory` (`Tool_id`);

--
-- Constraints for table `esd`
--
ALTER TABLE `esd`
  ADD CONSTRAINT `esd_ibfk_1` FOREIGN KEY (`ship_order`) REFERENCES `total_inventory` (`Tool_id`);

--
-- Constraints for table `hand`
--
ALTER TABLE `hand`
  ADD CONSTRAINT `hand_ibfk_1` FOREIGN KEY (`ship_order`) REFERENCES `total_inventory` (`Tool_id`);

--
-- Constraints for table `total_inventory`
--
ALTER TABLE `total_inventory`
  ADD CONSTRAINT `total_inventory_ibfk_1` FOREIGN KEY (`Acc_handle`) REFERENCES `accounts` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
