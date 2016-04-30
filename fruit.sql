-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2016 at 07:26 PM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fruit`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `BillNo` int(5) NOT NULL,
  `BillDate` date NOT NULL,
  `MemNo` int(5) NOT NULL,
  `EmpNo` int(5) NOT NULL,
  `BranchNo` int(5) NOT NULL,
  `ProNo` int(5) NOT NULL,
  `BillTotal` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `billproduct`
--

CREATE TABLE `billproduct` (
  `BillNo` int(5) NOT NULL,
  `ProNo` int(5) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `BranchNo` int(5) NOT NULL,
  `BranchName` text NOT NULL,
  `Region` text NOT NULL,
  `Province` text NOT NULL,
  `PostNo` int(5) NOT NULL,
  `Zone` text NOT NULL,
  `District` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `EmpNo` int(5) NOT NULL,
  `EmpFirstName` text COLLATE ascii_bin NOT NULL,
  `EmpLastName` text COLLATE ascii_bin NOT NULL,
  `BranchNo` int(5) NOT NULL,
  `EmpSalary` int(7) NOT NULL,
  `EmpRank` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=ascii COLLATE=ascii_bin;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`EmpNo`, `EmpFirstName`, `EmpLastName`, `BranchNo`, `EmpSalary`, `EmpRank`) VALUES
(1, 'Adam', 'Lallana', 1, 12000, 1),
(2, 'Simon', 'Mignolet', 2, 15000, 2);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `MemNo` int(5) NOT NULL,
  `MemFirstName` text NOT NULL,
  `MemLastName` text NOT NULL,
  `MemDate` date NOT NULL,
  `MemBranch` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`MemNo`, `MemFirstName`, `MemLastName`, `MemDate`, `MemBranch`) VALUES
(1, 'Philippe', 'Coutinho', '2016-04-29', 1),
(2, 'Divock', 'Origi', '2016-04-29', 2);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `ProdNo` int(5) NOT NULL,
  `ProdName` text NOT NULL,
  `ProdPrice` decimal(10,0) NOT NULL,
  `ProdType` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProdNo`, `ProdName`, `ProdPrice`, `ProdType`) VALUES
(1, 'KiwiSoda', '75', 'ItalianSoda');

-- --------------------------------------------------------

--
-- Table structure for table `promotion`
--

CREATE TABLE `promotion` (
  `ProNo` int(5) NOT NULL,
  `ProFactor` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `refitem`
--

CREATE TABLE `refitem` (
  `RefNo` int(5) NOT NULL,
  `ReftName` text NOT NULL,
  `RefPrice` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stock`
--

CREATE TABLE `stock` (
  `StockNo` int(5) NOT NULL,
  `StockDate` date NOT NULL,
  `BranchNo` int(5) NOT NULL,
  `EmpNo` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `stockrefitem`
--

CREATE TABLE `stockrefitem` (
  `StockNo` int(5) NOT NULL,
  `RefNo` int(5) NOT NULL,
  `Quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`BillNo`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`BranchNo`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`EmpNo`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`MemNo`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ProdNo`);

--
-- Indexes for table `promotion`
--
ALTER TABLE `promotion`
  ADD PRIMARY KEY (`ProNo`);

--
-- Indexes for table `refitem`
--
ALTER TABLE `refitem`
  ADD PRIMARY KEY (`RefNo`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
