-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: accounts
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.26-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `simple`
--

DROP TABLE IF EXISTS `simple`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `simple` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `email` varchar(75) NOT NULL,
  `username` varchar(75) NOT NULL,
  `password` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  UNIQUE KEY `username_UNIQUE` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `simple`
--

LOCK TABLES `simple` WRITE;
/*!40000 ALTER TABLE `simple` DISABLE KEYS */;
/*!40000 ALTER TABLE `simple` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tools`
--

DROP TABLE IF EXISTS `tools`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tools` (
  `toolnm` int(11) NOT NULL AUTO_INCREMENT,
  `idnums` int(11) NOT NULL,
  `category` varchar(100) NOT NULL,
  `toolname` varchar(100) NOT NULL,
  `url` varchar(200) NOT NULL,
  PRIMARY KEY (`toolnm`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tools`
--

LOCK TABLES `tools` WRITE;
/*!40000 ALTER TABLE `tools` DISABLE KEYS */;
INSERT INTO `tools` VALUES (32,1,'IDE','Code Blocks','http://www.codeblocks.org/'),(33,20,'IDE','Code Blocks','http://www.codeblocks.org/'),(34,1,'OOP','Java','https://java.com/en/download/'),(35,20,'OOP','Java','https://java.com/en/download/'),(36,1,'IDE','Eclipse','http://www.eclipse.org/downloads/eclipse-packages/'),(37,1007,'IDE','Code Blocks','http://www.codeblocks.org/'),(38,1007,'IDE','Android Studio','https://developer.android.com/studio/index.html'),(39,1004,'IDE','CLion','https://www.jetbrains.com/clion/download/'),(40,1004,'IDE','Visual Studio','https://www.visualstudio.com/downloads/'),(41,1004,'IDE','Code Lite','https://codelite.org/'),(42,1004,'IDE','Bluefish Editor','http://bluefish.openoffice.nl/index.html'),(43,1007,'IDE','Brackets Code Editor','http://brackets.io/'),(44,1007,'IDE','Atom Code Editor','https://atom.io/'),(45,1007,'IDE','CLion','https://www.jetbrains.com/clion/download/'),(46,20,'IDE','Eclipse','http://www.eclipse.org/downloads/eclipse-packages/'),(47,2,'IDE','Sublime Text','https://www.sublimetext.com/3'),(48,2,'IDE','IntelliJ IDEA ','https://www.jetbrains.com/idea/download/#section=windows'),(49,6,'IDE','Php Storm','https://www.jetbrains.com/phpstorm/download/#section=windows'),(50,6,'IDE','Komodo Edit','https://komodo-edit.en.softonic.com/'),(51,6,'IDE','Android Studio','https://developer.android.com/studio/index.html'),(52,1008,'IDE','Spyder','https://www.anaconda.com/download/'),(53,1008,'Decompiler','Dot Peek','https://www.jetbrains.com/decompiler/download/'),(54,1008,'IDE','Code bLOCKS','http://www.codeblocks.org/downloads'),(55,1008,'IDE','Netbeans','https://netbeans.org/downloads/'),(56,1008,'IDE','Padre','http://padre.perlide.org/download.html'),(57,1008,'IDE','Padre','http://padre.perlide.rg/download.html'),(58,1008,'kjkj','mm,','http://'),(59,1008,'kjkj','m','http://kmk'),(60,1006,'IDE','Sublime Text','https://www.sublimetext.com/3'),(61,1010,'IDE','Code Blocks','http://www.codeblocks.org/');
/*!40000 ALTER TABLE `tools` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `universities`
--

DROP TABLE IF EXISTS `universities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `universities` (
  `univid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  PRIMARY KEY (`univid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `universities`
--

LOCK TABLES `universities` WRITE;
/*!40000 ALTER TABLE `universities` DISABLE KEYS */;
INSERT INTO `universities` VALUES (1,'Rowan University'),(2,'Stockton University'),(6,'Wilmington University');
/*!40000 ALTER TABLE `universities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(100) NOT NULL,
  `username` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `faculty` varchar(10) NOT NULL,
  `univid` int(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1011 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (20,'roger morris','1989-03-03','Male','roger','roger@yahoo.com','934b535800b1cba8f96a5d72f72f1611','no',1),(1002,'kevin hicks','1988-10-07','Male','hgg','kev@w','b59c67bf196a4758191e42f76670ceba','yes',2),(1003,'Edward Williams','1999-09-19','Male','ew','ew@email','b59c67bf196a4758191e42f76670ceba','no',1),(1004,'Paul Thomas','1988-08-01','Male','pt','pt@email','b59c67bf196a4758191e42f76670ceba','yes',1),(1005,'Sam lister','1987-06-06','Male','sam','sam@email','b59c67bf196a4758191e42f76670ceba','no',2),(1006,'Mr. Morris','1997-11-11','Male','Morris','morris@stu.edu','b59c67bf196a4758191e42f76670ceba','yes',2),(1007,'Mr. Peabody','1977-05-05','Male','peabody','peabody@rowan.edu','b59c67bf196a4758191e42f76670ceba','yes',1),(1008,'Penelope Cruze','1981-07-17','Male','PCruz','pcruz@stud.edu','b59c67bf196a4758191e42f76670ceba','no',2),(1009,'Marlon Brando','1950-03-03','Male','MBrando','mbrando@edu','b59c67bf196a4758191e42f76670ceba','yes',6),(1010,'John DAvis','1999-03-02','Male','jd','js@yedu','b59c67bf196a4758191e42f76670ceba','no',1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users2`
--

DROP TABLE IF EXISTS `users2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users2` (
  `idusers2` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(75) NOT NULL,
  `gender` varchar(45) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `email` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `role` varchar(10) NOT NULL,
  PRIMARY KEY (`idusers2`),
  UNIQUE KEY `idusers2_UNIQUE` (`idusers2`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=1002 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users2`
--

LOCK TABLES `users2` WRITE;
/*!40000 ALTER TABLE `users2` DISABLE KEYS */;
INSERT INTO `users2` VALUES (1001,'mike blakes','Male','1980-04-04','mj@edu','mike','81dc9bdb52d04dc20036dbd8313ed055','student');
/*!40000 ALTER TABLE `users2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'accounts'
--

--
-- Dumping routines for database 'accounts'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-27 20:15:12
