-- MySQL dump 10.16  Distrib 10.1.22-MariaDB, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: pet_malu_hotel_reservation
-- ------------------------------------------------------
-- Server version	10.1.22-MariaDB-

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `Deluxe`
--

DROP TABLE IF EXISTS `Deluxe`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Deluxe` (
  `room_id` varchar(30) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `rm_avail` varchar(30) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `delu_id` (`u_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `Deluxe_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `reservation` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Deluxe`
--

LOCK TABLES `Deluxe` WRITE;
/*!40000 ALTER TABLE `Deluxe` DISABLE KEYS */;
INSERT INTO `Deluxe` VALUES ('4_1',NULL,'Available',NULL),('4_2',NULL,'Available',NULL),('4_3',NULL,'Available',NULL),('4_4',NULL,'Available',NULL),('4_5',NULL,'Available',NULL);
/*!40000 ALTER TABLE `Deluxe` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Double`
--

DROP TABLE IF EXISTS `Double`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Double` (
  `room_id` varchar(30) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `rm_avail` varchar(30) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `dou_id` (`u_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `Double_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `reservation` (`r_id`),
  CONSTRAINT `dou_id` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Double`
--

LOCK TABLES `Double` WRITE;
/*!40000 ALTER TABLE `Double` DISABLE KEYS */;
INSERT INTO `Double` VALUES ('2_1',NULL,'Available',NULL),('2_2',NULL,'Available',NULL),('2_3',2,'NOT AVAILABLE',1),('2_4',6,'NOT AVAILABLE',2),('2_5',NULL,'Available',NULL);
/*!40000 ALTER TABLE `Double` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Premier`
--

DROP TABLE IF EXISTS `Premier`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Premier` (
  `room_id` varchar(30) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `rm_avail` varchar(30) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `preu_id` (`u_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `Premier_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `reservation` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Premier`
--

LOCK TABLES `Premier` WRITE;
/*!40000 ALTER TABLE `Premier` DISABLE KEYS */;
INSERT INTO `Premier` VALUES ('3_1',NULL,'Available',NULL),('3_2',NULL,'Available',NULL),('3_3',NULL,'Available',NULL),('3_4',NULL,'Available',NULL),('3_5',NULL,'Available',NULL);
/*!40000 ALTER TABLE `Premier` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `Single`
--

DROP TABLE IF EXISTS `Single`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Single` (
  `room_id` varchar(30) NOT NULL,
  `u_id` int(11) DEFAULT NULL,
  `rm_avail` varchar(30) DEFAULT NULL,
  `r_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`room_id`),
  KEY `su_id` (`u_id`),
  KEY `r_id` (`r_id`),
  CONSTRAINT `Single_ibfk_1` FOREIGN KEY (`r_id`) REFERENCES `reservation` (`r_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Single`
--

LOCK TABLES `Single` WRITE;
/*!40000 ALTER TABLE `Single` DISABLE KEYS */;
INSERT INTO `Single` VALUES ('1_1',NULL,'Available',NULL),('1_2',NULL,'Available',NULL),('1_3',NULL,'Available',NULL),('1_4',NULL,'Available',NULL),('1_5',NULL,'Available',NULL);
/*!40000 ALTER TABLE `Single` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservation`
--

DROP TABLE IF EXISTS `reservation`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservation` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) DEFAULT NULL,
  `r_rtype` varchar(30) DEFAULT NULL,
  `r_rnum` varchar(30) DEFAULT NULL,
  `r_nopersons` int(11) DEFAULT NULL,
  `r_arrivdate` date DEFAULT NULL,
  `r_deptdate` date DEFAULT NULL,
  `r_pmethod` varchar(80) DEFAULT NULL,
  `r_payment` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_id`),
  KEY `u_id` (`u_id`),
  KEY `r_rtype` (`r_rtype`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`u_id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`r_rtype`) REFERENCES `rooms` (`r_rtype`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservation`
--

LOCK TABLES `reservation` WRITE;
/*!40000 ALTER TABLE `reservation` DISABLE KEYS */;
INSERT INTO `reservation` VALUES (1,2,'Double','2_3',3,'2017-12-21','2017-12-25','walkin',6000),(2,6,'Double','2_4',3,'2017-12-25','2017-12-30','walkin',7500);
/*!40000 ALTER TABLE `reservation` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rooms` (
  `r_rtype` varchar(30) NOT NULL,
  `r_rate` int(11) DEFAULT NULL,
  PRIMARY KEY (`r_rtype`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rooms`
--

LOCK TABLES `rooms` WRITE;
/*!40000 ALTER TABLE `rooms` DISABLE KEYS */;
INSERT INTO `rooms` VALUES ('Deluxe',2500),('Double',1500),('Premier',2000),('Single',1200);
/*!40000 ALTER TABLE `rooms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL AUTO_INCREMENT,
  `u_fullname` varchar(60) DEFAULT NULL,
  `u_name` varchar(80) DEFAULT NULL,
  `u_pass` varchar(80) DEFAULT NULL,
  `u_addr` varchar(80) DEFAULT NULL,
  `u_email` varchar(80) DEFAULT NULL,
  `u_tel` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Elnathan timothy dela Cruz','admin','admin123','Maa Davao City','test@gmail.com','99470777646'),(2,'Aubrey Therese Nalangan','heyimaubreytherese','testing12345','Maa,Davao City','imaburey@gmail.com','9425920898'),(3,'Noemi Canlog','yannie_andrexia','123','Davao City','test@gmail.com','911'),(4,'Jaime Pinili','jaime','123456','Davao City Philippines','jaimepinili@gmail.com','9425920898'),(5,'Arman Rios','rios','123456789','Usep','wqeqweqwe@gmail.com','911'),(6,'kyapengengbarya','kyabarya','12345','Gmall Davao City','kyabarya@gmail.com','911');
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

-- Dump completed on 2017-11-24  9:15:13
