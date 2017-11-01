-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 01, 2017 at 03:51 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestbuy2`
--

-- --------------------------------------------------------

--
-- Table structure for table `Category`
--

CREATE TABLE `Category` (
  `Category_ID` int(11) NOT NULL,
  `Category_Description` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Category`
--

INSERT INTO `Category` (`Category_ID`, `Category_Description`) VALUES
(1, 'BOOKS'),
(2, 'CHOCOLATES'),
(3, 'MANGOES');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `Price` int(11) NOT NULL,
  `Product_ID` int(11) NOT NULL,
  `Product_Name` varchar(150) NOT NULL,
  `SubCategory_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`Price`, `Product_ID`, `Product_Name`, `SubCategory_ID`) VALUES
(32, 1, 'IN COLD BLOOD', 1),
(8, 3, 'BOURBOUN', 3),
(34, 4, '1776', 1),
(32, 5, 'BRAVE NEW WORLD', 6),
(4, 6, 'KITKAT', 7),
(32, 7, 'SILENT SPRING', 6),
(6, 8, 'DIARY MILK', 7),
(3, 9, 'SNAPPERS', 6),
(6, 10, 'MUNCH', 7),
(8, 11, 'WONDERLAND', 1),
(32, 12, 'ohenry', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Subcategory`
--

CREATE TABLE `Subcategory` (
  `Category_ID` int(11) NOT NULL,
  `Description` varchar(150) CHARACTER SET ascii NOT NULL,
  `SubCategory_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Subcategory`
--

INSERT INTO `Subcategory` (`Category_ID`, `Description`, `SubCategory_ID`) VALUES
(1, 'NON FICTION', 1),
(2, 'DARK BROWN', 3),
(1, 'FICTION', 6),
(2, 'SWEET CHOCOLATES', 7),
(1, 'Drama', 8),
(2, 'Milky', 9),
(3, 'DASH', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Category`
--
ALTER TABLE `Category`
  ADD PRIMARY KEY (`Category_ID`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`Product_ID`),
  ADD KEY `SubCategory_ID` (`SubCategory_ID`);

--
-- Indexes for table `Subcategory`
--
ALTER TABLE `Subcategory`
  ADD PRIMARY KEY (`SubCategory_ID`),
  ADD KEY `Category_ID` (`Category_ID`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Category`
--
ALTER TABLE `Category`
  MODIFY `Category_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `Product_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `Subcategory`
--
ALTER TABLE `Subcategory`
  MODIFY `SubCategory_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Product`
--
ALTER TABLE `Product`
  ADD CONSTRAINT `Product_ibfk_1` FOREIGN KEY (`SubCategory_ID`) REFERENCES `Subcategory` (`SubCategory_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `Subcategory`
--
ALTER TABLE `Subcategory`
  ADD CONSTRAINT `Subcategory_ibfk_1` FOREIGN KEY (`Category_ID`) REFERENCES `Category` (`Category_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
