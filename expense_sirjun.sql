-- MySQL dump 10.16  Distrib 10.1.25-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: expense_sirjun
-- ------------------------------------------------------
-- Server version	10.1.25-MariaDB

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
  `allowance` float(8,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `remaining_allowance` float(8,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `classification`
--

LOCK TABLES `classification` WRITE;
/*!40000 ALTER TABLE `classification` DISABLE KEYS */;
INSERT INTO `classification` VALUES (1,'Transportation',983.00,'2017-08-25 09:55:00',20.00),(2,'Communication',4990.00,'2017-08-25 09:55:28',35.00),(3,'Representation',14984.00,'2017-08-25 09:56:25',15000.00);
/*!40000 ALTER TABLE `classification` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reimbursement`
--

LOCK TABLES `reimbursement` WRITE;
/*!40000 ALTER TABLE `reimbursement` DISABLE KEYS */;
INSERT INTO `reimbursement` VALUES (1,1,0,3,'2017-08-25 16:47:34','2017-08-28 04:57:33',0,123.00,''),(2,1,1,2,'2017-08-28 04:58:43','2017-08-28 13:48:45',1,1.00,''),(3,1,2,2,'2017-08-28 04:58:45','0000-00-00 00:00:00',1,1.00,''),(4,1,1,2,'2017-08-28 04:58:46','2017-08-28 06:05:59',1,1.00,''),(5,2,2,3,'2017-08-28 05:04:09','2017-08-28 12:48:28',1,12.00,''),(6,2,2,1,'2017-08-28 05:05:31','2017-08-28 12:48:28',1,1.00,''),(7,2,2,2,'2017-08-28 05:10:24','2017-08-28 12:48:28',1,2.00,'d391437fe20f603ff9dbbb8ac6368369.png'),(8,2,1,3,'2017-08-28 05:10:59','2017-08-28 14:12:09',1,2.00,'5f7b28e928264a37c70f0e6be6fe7a12.png'),(9,2,0,3,'2017-08-28 05:11:33','2017-08-28 14:12:14',1,22.00,'2a13a664f1224dd2a3ab09ec1e81a193.png'),(12,2,1,1,'2017-08-28 05:35:14','2017-08-28 14:11:17',1,1.00,'c0cc1c060ba4b7ff4f007f903f88d7e7.png'),(32,1,2,3,'2017-09-04 06:33:16','0000-00-00 00:00:00',0,1.00,'noimage.png'),(33,1,2,2,'2017-09-04 06:39:34','0000-00-00 00:00:00',1,2.00,'6dc9a1e1da7cd40ff4c319520832709f.jpg'),(34,1,0,1,'2017-09-04 06:40:59','2017-09-04 06:54:45',1,2.00,'programmerwallpaper.png'),(35,1,1,2,'2017-09-04 06:41:29','2017-09-04 06:54:12',1,2.00,'6ac6258465b7c2a7d88aea66fac6b638.jpg'),(36,1,2,1,'2017-09-07 07:03:56','0000-00-00 00:00:00',0,2.00,'noimage.png'),(37,1,2,1,'2017-09-07 07:05:16','0000-00-00 00:00:00',0,3.00,'noimage.png'),(38,1,2,2,'2017-09-07 07:16:51','0000-00-00 00:00:00',0,4.00,'noimage.png');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Erin','Rugas','',NULL,'ejr012495@gmail.com','$2y$11$oLgjrpJrYrBGDpaayjCvseokuBQJVtNOTTLgELutjqaeCM2sx0qUG',NULL,1,'2017-09-14 07:24:04','2017-09-14 07:24:35');
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

-- Dump completed on 2017-09-14 15:46:52
