-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 03, 2017 at 01:23 AM
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
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `univid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guide_fname` varchar(100) DEFAULT NULL,
  `guide_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`univid`, `name`, `guide_fname`, `guide_path`) VALUES
(1, 'Rowan University', 'Critical-Incident-Response-Plan-Example-PDF-FreeDownload.pdf', 'guideline_uploads/59fbb5b542e936.99428004.pdf'),
(2, 'Stockton University', 'Principle of Network Security Exercise 3 for class.pdf', 'guideline_uploads/59fbb6245c6fb2.92124464.pdf'),
(6, 'Wilmington University', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`univid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `univid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
