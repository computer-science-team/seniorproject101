-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2017 at 02:12 AM
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
-- Table structure for table `simple`
--

CREATE TABLE `simple` (
  `id` int(11) NOT NULL,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `toolnm` int(11) NOT NULL,
  `idnums` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `toolname` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`toolnm`, `idnums`, `category`, `toolname`, `url`) VALUES
(32, 1, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/'),
(33, 20, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/'),
(34, 1, 'OOP', 'Java', 'https://java.com/en/download/'),
(35, 20, 'OOP', 'Java', 'https://java.com/en/download/'),
(36, 1, 'IDE', 'Eclipse', 'http://www.eclipse.org/downloads/eclipse-packages/'),
(37, 1007, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/'),
(38, 1007, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html'),
(39, 1004, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/'),
(40, 1004, 'IDE', 'Visual Studio', 'https://www.visualstudio.com/downloads/'),
(41, 1004, 'IDE', 'Code Lite', 'https://codelite.org/'),
(42, 1004, 'IDE', 'Bluefish Editor', 'http://bluefish.openoffice.nl/index.html'),
(43, 1007, 'IDE', 'Brackets Code Editor', 'http://brackets.io/'),
(44, 1007, 'IDE', 'Atom Code Editor', 'https://atom.io/'),
(45, 1007, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/'),
(46, 20, 'IDE', 'Eclipse', 'http://www.eclipse.org/downloads/eclipse-packages/'),
(47, 2, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3'),
(48, 2, 'IDE', 'IntelliJ IDEA ', 'https://www.jetbrains.com/idea/download/#section=windows'),
(49, 6, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows'),
(50, 6, 'IDE', 'Komodo Edit', 'https://komodo-edit.en.softonic.com/'),
(51, 6, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html'),
(52, 1008, 'IDE', 'Spyder', 'https://www.anaconda.com/download/'),
(53, 1008, 'Decompiler', 'Dot Peek', 'https://www.jetbrains.com/decompiler/download/'),
(54, 1008, 'IDE', 'Code bLOCKS', 'http://www.codeblocks.org/downloads'),
(55, 1008, 'IDE', 'Netbeans', 'https://netbeans.org/downloads/'),
(56, 1008, 'IDE', 'Padre', 'http://padre.perlide.org/download.html'),
(57, 1008, 'IDE', 'Padre', 'http://padre.perlide.rg/download.html'),
(58, 1008, 'kjkj', 'mm,', 'http://'),
(59, 1008, 'kjkj', 'm', 'http://kmk'),
(60, 1006, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3'),
(61, 1010, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `univid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`univid`, `name`) VALUES
(1, 'Rowan University'),
(2, 'Stockton University'),
(6, 'Wilmington University');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `univid` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `dob`, `gender`, `username`, `email`, `password`, `faculty`, `univid`) VALUES
(20, 'roger morris', '1989-03-03', 'Male', 'roger', 'roger@yahoo.com', '934b535800b1cba8f96a5d72f72f1611', 'no', 1),
(1002, 'kevin hicks', '1988-10-07', 'Male', 'hgg', 'kev@w', 'b59c67bf196a4758191e42f76670ceba', 'yes', 2),
(1003, 'Edward Williams', '1999-09-19', 'Male', 'ew', 'ew@email', 'b59c67bf196a4758191e42f76670ceba', 'no', 1),
(1004, 'Paul Thomas', '1988-08-01', 'Male', 'pt', 'pt@email', 'b59c67bf196a4758191e42f76670ceba', 'yes', 1),
(1005, 'Sam lister', '1987-06-06', 'Male', 'sam', 'sam@email', 'b59c67bf196a4758191e42f76670ceba', 'no', 2),
(1006, 'Mr. Morris', '1997-11-11', 'Male', 'Morris', 'morris@stu.edu', 'b59c67bf196a4758191e42f76670ceba', 'yes', 2),
(1007, 'Mr. Peabody', '1977-05-05', 'Male', 'peabody', 'peabody@rowan.edu', 'b59c67bf196a4758191e42f76670ceba', 'yes', 1),
(1008, 'Penelope Cruze', '1981-07-17', 'Male', 'PCruz', 'pcruz@stud.edu', 'b59c67bf196a4758191e42f76670ceba', 'no', 2),
(1009, 'Marlon Brando', '1950-03-03', 'Male', 'MBrando', 'mbrando@edu', 'b59c67bf196a4758191e42f76670ceba', 'yes', 6),
(1010, 'John DAvis', '1999-03-02', 'Male', 'jd', 'js@yedu', 'b59c67bf196a4758191e42f76670ceba', 'no', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users2`
--

CREATE TABLE `users2` (
  `idusers2` int(15) NOT NULL,
  `name` varchar(75) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users2`
--

INSERT INTO `users2` (`idusers2`, `name`, `gender`, `dob`, `email`, `username`, `password`, `role`) VALUES
(1001, 'mike blakes', 'Male', '1980-04-04', 'mj@edu', 'mike', '81dc9bdb52d04dc20036dbd8313ed055', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `simple`
--
ALTER TABLE `simple`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`);

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`toolnm`);

--
-- Indexes for table `universities`
--
ALTER TABLE `universities`
  ADD PRIMARY KEY (`univid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users2`
--
ALTER TABLE `users2`
  ADD PRIMARY KEY (`idusers2`),
  ADD UNIQUE KEY `idusers2_UNIQUE` (`idusers2`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `email_UNIQUE` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `simple`
--
ALTER TABLE `simple`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `toolnm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `univid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT for table `users2`
--
ALTER TABLE `users2`
  MODIFY `idusers2` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1002;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
