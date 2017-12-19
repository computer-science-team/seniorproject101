-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 19, 2017 at 02:33 AM
-- Server version: 5.7.19-log
-- PHP Version: 5.6.31

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
(60, 1006, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3', 'No'),
(61, 1010, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(62, 1007, 'IDE', 'BlueJ', 'https://www.bluej.org/versions.html', 'No'),
(63, 1009, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(64, 1011, 'IDE', 'IntelliJ IDEA ', 'https://www.jetbrains.com/idea/download/#section=windows', 'No'),
(65, 1011, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'No'),
(69, 20, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'No'),
(70, 1013, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'No'),
(71, 1013, 'OOP', 'Java', 'https://java.com/en/download/', 'No'),
(78, 20, 'IDE', 'KDevelop', 'https://www.kdevelop.org/download', 'yes'),
(79, 7, 'IDE', 'KDevelop', 'https://www.kdevelop.org/download', 'yes'),
(80, 7, 'IDE', 'Oracle Developer Studio', 'http://www.oracle.com/technetwork/server-storage/developerstudio/downloads/index.html', 'no'),
(81, 7, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/downloads', 'no'),
(82, 7, 'IDE', 'Padre', 'http://padre.perlide.org/download.html', 'yes'),
(84, 1016, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'no'),
(85, 1016, 'OOP', 'Java', 'https://java.com/en/download/', 'no'),
(86, 1016, 'IDE', 'Eclipse', 'http://www.eclipse.org/downloads/eclipse-packages/', 'no'),
(87, 1016, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'no'),
(89, 1016, 'project Managment', 'Wrike', 'http://try.wrike.com/project-management-capterra/?utm_medium=cpc&utm_campaign=project&utm_content=listing&utm_source=capterra', 'no'),
(90, 1, 'project Managment', 'Wrike', 'http://try.wrike.com/project-management-capterra/?utm_medium=cpc&utm_campaign=project&utm_content=listing&utm_source=capterra', 'no'),
(103, 1022, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'no'),
(104, 1022, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'no'),
(105, 1022, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/', 'no'),
(106, 1022, 'IDE', 'BlueJ', 'https://www.bluej.org/versions.html', 'no'),
(109, 1029, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'no'),
(111, 1, 'code management', 'github', 'https://github.com/', 'no'),
(117, 1032, 'IDE', 'Sublime Text', 'https://www.sublimetext.com/3', 'no'),
(118, 1032, 'IDE', 'Php Storm', 'https://www.jetbrains.com/phpstorm/download/#section=windows', 'no'),
(122, 1043, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/', 'no'),
(123, 1043, 'IDE', 'Visual Studio', 'https://www.visualstudio.com/downloads/', 'no'),
(126, 1043, 'project Managment', 'Asana', 'https://asana.com/go/project_alt-customers-first?utm_source=capterra&utm_campaign=project_management&utm_medium=capterra', 'yes'),
(131, 1, 'code management', 'Asana', 'https://asana.com/go/project_alt-customers-first?utm_source=capterra&utm_campaign=project_management&utm_medium=capterra', 'no'),
(138, 1, 'project Managment', 'dapule', 'https://dapulse.com/c/status-video/?utm_source=capterra&utm_campaign=capterraprojectmanagement&utm_vertical=capterra', 'no'),
(140, 1, 'code management', 'Asana', 'http://pythonfiddle.com/', 'no'),
(146, 1014, 'IDE', 'Pycharm', 'http://pythonfiddle.com/', 'yes'),
(153, 1014, 'project Managment', 'Asana', 'https://asana.com/go/project_alt-customers-first?utm_source=capterra&utm_campaign=project_management&utm_medium=capterra', 'yes'),
(154, 1014, 'project Managment', 'dapule', 'https://dapulse.com/c/status-video/?utm_source=capterra&utm_campaign=capterraprojectmanagement&utm_vertical=capterra', 'yes'),
(155, 1014, 'code management', 'github', 'https://github.com/', 'no'),
(156, 1014, 'OOP', 'Java', 'https://java.com/en/download/', 'no'),
(159, 1012, 'IDE', 'Visual Studio', 'https://www.visualstudio.com/downloads/', 'no'),
(160, 1012, 'OOP', 'Java', 'https://java.com/en/download/', 'no'),
(164, 1012, 'IDE', 'Komodo Edit', 'https://komodo-edit.en.softonic.com/', 'no'),
(167, 1045, 'OOP', 'Java', 'https://java.com/en/download/', 'no'),
(168, 1047, 'Code management', 'Asana', 'https://asana.com/go/project_alt-customers-first?utm_source=capterra&utm_campaign=project_management&utm_medium=capterra', 'yes'),
(169, 1047, 'Code management', 'github', 'https://github.com/', 'no'),
(170, 13, 'Code management', 'github', 'https://github.com/', 'no'),
(171, 1012, 'IDE', 'Code Blocks', 'http://www.codeblocks.org/', 'no'),
(172, 1014, 'search', 'Google', 'https://www.google.com/', 'yes'),
(173, 1014, 'IDE', 'CLion', 'https://www.jetbrains.com/clion/download/', 'no'),
(174, 1014, 'project Managment', 'Wrike', 'http://try.wrike.com/project-management-capterra/?utm_medium=cpc&utm_campaign=project&utm_content=listing&utm_source=capterra', 'no'),
(175, 1012, 'Code management', 'github', 'https://github.com/', 'no'),
(176, 1012, 'IDE', 'IntelliJ IDEA ', 'https://www.jetbrains.com/idea/download/#section=windows', 'no'),
(177, 1012, 'IDE', 'Android Studio', 'https://developer.android.com/studio/index.html', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `universities`
--

CREATE TABLE `universities` (
  `univid` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guide_fname` varchar(100) DEFAULT NULL,
  `guide_path` varchar(100) DEFAULT NULL,
  `club_fname` varchar(100) DEFAULT NULL,
  `club_path` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `universities`
--

INSERT INTO `universities` (`univid`, `name`, `guide_fname`, `guide_path`, `club_fname`, `club_path`) VALUES
(1, 'Rowan University', 'Critical-Incident-Response-Plan-Example-PDF-FreeDownload.pdf', 'guideline_uploads/5a0248546a4151.90307745.pdf', 'New Text Document.pdf', 'ListOfClub/5a2a261af1eed7.04459728.pdf'),
(2, 'Stockton University', NULL, NULL, NULL, NULL),
(6, 'Wilmington University', NULL, NULL, NULL, NULL),
(7, 'Rutgers University', NULL, NULL, NULL, NULL),
(8, 'princeton university', NULL, NULL, 'ACA1_.pdf', 'ListOfClub/5a17b42a351774.31629232.pdf'),
(10, 'Warton University', NULL, NULL, NULL, NULL),
(11, 'Hogwarts University', NULL, NULL, NULL, NULL),
(12, 'Oxford University', NULL, NULL, NULL, NULL),
(13, 'Harward University', NULL, NULL, NULL, NULL);

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
(1010, 'John DAvis', '1999-03-02', 'Male', 'jd', 'js@yedu', 'b59c67bf196a4758191e42f76670ceba', 'no', 1),
(1011, 'krunal', '2017-09-30', 'Male', 'kkk', 'ksdksl@rowan', 'cb42e130d1471239a27fca6228094f0e', 'no', 1),
(1012, 'ken', '2017-12-14', 'Male', 'ken', 'ken@ken', 'f632fa6f8c3d5f551c5df867588381ab', 'no', 1),
(1013, 'dharmik', '2017-11-02', 'Male', 'dom', 'dom@dom', 'dd988cfd769c9f7fbd795a0f5da8e751', 'no', 1),
(1014, 'roll', '2017-12-05', 'Female', 'Roll', 'roll@roll', '25b5eb3bbef15385b5f5ff3abe46f342', 'yes', 1),
(1015, 'kk', '2016-10-10', 'Male', 'kk', 'kk@kk', 'dc468c70fb574ebd07287b38d0d0676d', 'no', 1),
(1016, 'Robinson', '1973-07-10', 'Male', 'rob', 'rob@rob', '760061f6bfde75c29af12f252d4d3345', 'yes', 1),
(1018, 'kk', '2017-10-10', 'Male', 'k', 'k@k', '8ce4b16b22b58894aa86c421e8759df3', 'no', 6),
(1019, 'joro', '1992-11-12', 'Male', 'joro', 'joro@joro', '53041a15f4c59f24781260fabf1a7073', 'yes', 1),
(1020, 'rr', '1994-09-13', 'Female', 'rr', 'rr@rr', '514f1b439f404f86f77090fa9edc96ce', 'yes', 1),
(1021, 'herminey', '1995-11-17', 'Female', 'her', 'her@her', 'a43b4caa46fb39a1d48b89e25f0e79df', 'no', 6),
(1022, 'r', '2017-09-22', 'Male', 'r', 'r@r', '4b43b0aee35624cd95b910189b3dc231', 'no', 1),
(1023, 'kkkk', '2017-10-24', 'Male', 'kkkk', 'kkkk@kkkk', 'fa7f08233358e9b466effa1328168527', 'yes', 1),
(1025, 'ken', '2017-09-24', 'Male', 'kenp', 'ken@kenp', '75df1a3ce3fd7f89fd08e4aeab01bc4e', 'no', 1),
(1027, 'kenpp', '2017-04-21', 'Male', 'kenpp', 'ken@kenpp', '46402f6224772613a856aec631274548', 'no', 1),
(1028, 'kr', '2017-07-20', 'Male', 'kr', 'ke@kr', 'dcf0d7d2cd120bf42580d43f29785dd3', 'no', 1),
(1029, 'kn', '2017-10-24', 'Male', 'kn', 'kn@kn', '8c7e6965b4169689a88b313bbe7450f9', 'no', 8),
(1030, 'kkr', '2017-10-24', 'Male', 'kkr', 'kkr@kkr', '18b38bcbe603c320a88ecd4c31c19f21', 'no', 6),
(1031, 'kkn', '2017-10-25', 'Male', 'kkn', 'kkn@kkn', '176312bc2973f5034a87235409eba174', 'no', 10),
(1032, 'kkrn', '2017-10-25', 'Male', 'kkrn', 'kkrn@kkrn', 'b84902583ebd281f27fa5d4944774b91', 'no', 6),
(1038, 'rrr', '2017-08-27', 'Female', 'rrr', 'rrr@rrr', '44f437ced647ec3f40fa0841041871cd', 'yes', 11),
(1039, '', '2017-10-27', 'Male', 'rrn', 'rrn@rrn', '67ffdce18398d07ed1e9b7eea6981659', 'no', 8),
(1040, 'radhi', '2017-09-02', 'Female', 'radhi', 'radhi@radhi', '80754ecc5dd901df212de9e1d9a8b693', 'no', 11),
(1041, 'rn', '2017-10-02', 'Male', 'rn', 'rn@rn', '3e3cef7748db3f689474b6d40661f2bc', 'no', 8),
(1042, 'naina', '2017-09-03', 'Female', 'n', 'n@n', '7b8b965ad4bca0e41ab51de7b31363a1', 'no', 1),
(1043, 'Jk', '2017-09-03', 'Male', 'jk', 'jk@jk', '051a9911de7b5bbc610b76f4eda834a0', 'yes', 1),
(1044, 'naina', '1998-09-06', 'Female', 'naina', 'naina@naina', '5c3ffe56e57cc73a16b36989b80cc57b', 'no', 8),
(1045, 'kinnari', '1993-08-16', 'Female', 'kin', 'kin@kin', 'e328ceb1b2ec0a7c59fd51372e729f7c', 'no', 12),
(1046, 'kinnari', '2017-09-16', 'Male', 'kan', 'kan@kan', 'b7c673bc498b874cb6a0e43ef9b86919', 'no', 1),
(1047, 'Ganesh Baliga', '1982-12-17', 'Male', 'ganesh', 'gb@gb', 'fa1d87bc7f85769ea9dee2e4957321ae', 'yes', 13);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tools`
--
ALTER TABLE `tools`
  MODIFY `toolnm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=178;

--
-- AUTO_INCREMENT for table `universities`
--
ALTER TABLE `universities`
  MODIFY `univid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1048;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
