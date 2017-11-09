-- MySQL dump 10.16  Distrib 10.1.26-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: expense_sirjun
-- ------------------------------------------------------
-- Server version	10.1.26-MariaDB

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
-- Table structure for table `classification`
--

DROP TABLE IF EXISTS `classification`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `classification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `classification` varchar(100) NOT NULL,
  `allowance_per_user` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `budget` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classification`
--

LOCK TABLES `classification` WRITE;
/*!40000 ALTER TABLE `classification` DISABLE KEYS */;
INSERT INTO `classification` VALUES (1,'Transporation',1000.00,'2017-09-15 14:25:01',5000.00),(2,'Communication',550.00,'2017-09-15 14:27:52',2000.00),(3,'Technology',2500.00,'2017-09-15 15:27:22',3000.00),(4,'Clothing',200.00,'2017-09-18 03:41:40',2000.00),(6,'Dental',500.00,'2017-09-18 06:04:08',1000.00);
/*!40000 ALTER TABLE `classification` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `positions`
--

DROP TABLE IF EXISTS `positions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `positions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pos_name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `positions`
--

LOCK TABLES `positions` WRITE;
/*!40000 ALTER TABLE `positions` DISABLE KEYS */;
INSERT INTO `positions` VALUES (1,'Admin'),(2,'Employee'),(3,'Human Resource');
/*!40000 ALTER TABLE `positions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reimbursement`
--

DROP TABLE IF EXISTS `reimbursement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reimbursement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `status` tinyint(5) DEFAULT NULL,
  `classification_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `receipt` tinyint(2) DEFAULT NULL,
  `amount` float(8,2) NOT NULL,
  `receipt_img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reimbursement`
--

LOCK TABLES `reimbursement` WRITE;
/*!40000 ALTER TABLE `reimbursement` DISABLE KEYS */;
INSERT INTO `reimbursement` VALUES (1,1,0,2,'2017-09-16 01:38:09','2017-09-17 00:35:25',0,500.00,'noimage.png'),(2,1,1,3,'2017-09-16 01:45:57','2017-09-16 14:13:29',1,500.00,'d73fea79538f29d3f3b4038e43729a18.jpg'),(3,2,0,3,'2017-09-16 02:00:32','2017-09-17 00:35:17',0,500.00,'noimage.png'),(4,1,1,1,'2017-09-17 00:10:35','2017-09-17 00:10:43',0,1000.00,'noimage.png'),(5,1,1,1,'2017-09-17 00:27:58','2017-09-17 00:28:11',0,200.00,'noimage.png'),(6,1,1,1,'2017-09-17 00:30:23','2017-09-17 00:30:28',0,500.00,'noimage.png'),(7,1,1,1,'2017-09-17 00:36:00','2017-09-17 00:36:05',0,500.00,'noimage.png'),(8,1,1,3,'2017-09-17 09:53:05','2017-09-17 09:53:17',0,1000.00,'noimage.png'),(9,12,1,6,'2017-09-25 03:01:59','2017-09-25 03:02:29',0,123.00,'noimage.png');
/*!40000 ALTER TABLE `reimbursement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) DEFAULT NULL,
  `profile_picture` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `pos_id` int(11) DEFAULT NULL,
  `status` tinyint(5) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
  `transporation` float(8,2) DEFAULT NULL,
  `communication` float(8,2) DEFAULT NULL,
  `technology` float(8,2) DEFAULT NULL,
  `allowance_update` date DEFAULT NULL,
  `clothing` float(8,2) DEFAULT NULL,
  `dental` float(8,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Erin','Rugas','','no_image.jpg','ejr012495@gmail.com','$2y$11$oLgjrpJrYrBGDpaayjCvseokuBQJVtNOTTLgELutjqaeCM2sx0qUG',1,1,'2017-09-14 07:24:04','2017-09-18 06:04:08',0.00,550.00,1500.00,'2017-09-16',200.00,500.00),(2,'Sample','Sample','','no_image.jpg','sample@gmail.com','$2y$11$32w2kHROwA3drnzz67ID..Kk69SElqGOqnk5T4OzaQfbnKiVhDzYy',1,1,'2017-09-15 14:26:03','2017-09-18 06:04:08',1000.00,550.00,2500.00,'2017-09-16',200.00,500.00),(11,'Emplyoee','Employee','','no_image.jpg','employee@mail.com','$2y$11$G0QbSiQaXlBymhL4RnjCDOtz/zkITsd4lyrvsEkJwqi0FVOgdn9m6',2,1,'2017-09-17 00:51:27','2017-09-18 06:04:08',1000.00,550.00,2500.00,NULL,200.00,500.00),(12,'Human','Resource','','2b3a209e28789c89ab338caf1bf787aa.jpg','hr@gmail.com','$2y$11$d9xN0gBIU0EKwpEa6LbFa.MpsasLvLm.0WSIBNUCgEvHAERzflDfG',3,1,'2017-09-17 00:51:49','2017-09-25 03:02:30',1000.00,550.00,2500.00,NULL,200.00,377.00),(13,'Test','Test','','no_image.jpg','test@mail.com','$2y$11$78BUM24zg0jM1j/oaq5mS./Esr3lZWfhy2MX100aUdv.Nl0uB75yG',2,0,'2017-09-17 09:49:07','2017-09-18 06:04:08',1000.00,550.00,2500.00,NULL,200.00,500.00);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-19  8:26:30
