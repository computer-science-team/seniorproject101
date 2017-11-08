-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2017 at 11:49 PM
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
-- Table structure for table `tools`
--

CREATE TABLE `tools` (
  `toolnm` int(11) NOT NULL,
  `idnums` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `toolname` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  `private` varchar(3) NOT NULL DEFAULT 'no'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tools`
--

INSERT INTO `tools` (`toolnm`, `idnums`, `category`, `toolname`, `url`, `private`) VALUES
(32, 1, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(33, 20, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(34, 1, 'OOP', 'Java', 'https://java.com/en/download/', 'No'),
(35, 20, 'OOP', 'Java', 'https://java.com/en/download/', 'No'),
(36, 1, 'IDE', 'Eclipse', 'http://www.eclipse.org/downloads/eclipse-packages/', 'No'),
(37, 1007, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(38, 1007, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(39, 1004, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/', 'No'),
(40, 1004, 'IDE', 'Visual Studio', 'https://www.visualstudio.com/downloads/', 'No'),
(41, 1004, 'IDE', 'Code Lite', 'https://codelite.org/', 'No'),
(42, 1004, 'IDE', 'Bluefish Editor', 'http://bluefish.openoffice.nl/index.html', 'No'),
(43, 1007, 'IDE', 'Brackets Code Editor', 'http://brackets.io/', 'No'),
(44, 1007, 'IDE', 'Atom Code Editor', 'https://atom.io/', 'No'),
(45, 1007, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/', 'No'),
(46, 20, 'IDE', 'Eclipse', 'http://www.eclipse.org/downloads/eclipse-packages/', 'No'),
(47, 2, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3', 'No'),
(48, 2, 'IDE', 'IntelliJ IDEA ', 'https://www.jetbrains.com/idea/download/#section=windows', 'No'),
(49, 6, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'No'),
(50, 6, 'IDE', 'Komodo Edit', 'https://komodo-edit.en.softonic.com/', 'No'),
(51, 6, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(52, 1008, 'IDE', 'Spyder', 'https://www.anaconda.com/download/', 'No'),
(53, 1008, 'Decompiler', 'Dot Peek', 'https://www.jetbrains.com/decompiler/download/', 'No'),
(54, 1008, 'IDE', 'Code bLOCKS', 'http://www.codeblocks.org/downloads', 'No'),
(55, 1008, 'IDE', 'Netbeans', 'https://netbeans.org/downloads/', 'No'),
(56, 1008, 'IDE', 'Padre', 'http://padre.perlide.org/download.html', 'No'),
(57, 1008, 'IDE', 'Padre', 'http://padre.perlide.rg/download.html', 'No'),
(58, 1008, 'kjkj', 'mm,', 'http://', 'No'),
(59, 1008, 'kjkj', 'm', 'http://kmk', 'No'),
(60, 1006, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3', 'No'),
(61, 1010, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(62, 1007, 'IDE', 'BlueJ', 'https://www.bluej.org/versions.html', 'No'),
(63, 1009, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(64, 1011, 'IDE', 'IntelliJ IDEA ', 'https://www.jetbrains.com/idea/download/#section=windows', 'No'),
(65, 1011, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(66, 1012, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3', 'No'),
(67, 1012, 'IDE', 'Komodo Edit', 'https://komodo-edit.en.softonic.com/', 'No'),
(68, 1012, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'No'),
(69, 20, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'No'),
(70, 1013, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(71, 1013, 'OOP', 'Java', 'https://java.com/en/download/', 'No'),
(72, 1014, 'OOP', 'Java', 'https://java.com/en/download/', 'No'),
(73, 1014, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'No'),
(74, 1014, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(75, 1014, 'IDE', 'BlueJ', 'https://www.bluej.org/', 'No'),
(78, 20, 'IDE', 'KDevelop', 'https://www.kdevelop.org/download', 'yes'),
(79, 7, 'IDE', 'KDevelop', 'https://www.kdevelop.org/download', 'yes'),
(80, 7, 'IDE', 'Oracle Developer Studio', 'http://www.oracle.com/technetwork/server-storage/developerstudio/downloads/index.html', 'no'),
(81, 7, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/downloads', 'no'),
(82, 7, 'IDE', 'Padre', 'http://padre.perlide.org/download.html', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tools`
--
ALTER TABLE `tools`
  ADD PRIMARY KEY (`toolnm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `toolnm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
