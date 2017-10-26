-- MySQL dump 10.13  Distrib 5.7.17, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: narokyco_db
-- ------------------------------------------------------
-- Server version	5.6.16

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
-- Table structure for table `siamphan_customer`
--

DROP TABLE IF EXISTS `siamphan_customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siamphan_customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `branchcode` varchar(20) DEFAULT NULL,
  `customertype` int(11) DEFAULT NULL,
  `thainame` varchar(100) DEFAULT NULL,
  `thaifullname` varchar(300) DEFAULT NULL,
  `engname` varchar(100) DEFAULT NULL,
  `engfullname` varchar(300) DEFAULT NULL,
  `address` varchar(2000) DEFAULT NULL,
  `province` varchar(45) DEFAULT NULL,
  `zipcode` varchar(10) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `mobile` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `peopleid` int(11) DEFAULT NULL,
  `birthdate` datetime DEFAULT NULL,
  `sex` int(11) DEFAULT NULL,
  `membercardnum_1` varchar(45) DEFAULT NULL,
  `membercarddateissue_1` datetime DEFAULT NULL,
  `membercarddateexpire_1` datetime DEFAULT NULL,
  `lastupdate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siamphan_customer`
--

LOCK TABLES `siamphan_customer` WRITE;
/*!40000 ALTER TABLE `siamphan_customer` DISABLE KEYS */;
INSERT INTO `siamphan_customer` VALUES (1,'11111',1,'naroky',NULL,NULL,NULL,'non','non','11111','0840332555',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `siamphan_customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siamphan_customer2`
--

DROP TABLE IF EXISTS `siamphan_customer2`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siamphan_customer2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `province` int(11) DEFAULT NULL,
  `postcode` varchar(10) DEFAULT NULL,
  `phonenumber` varchar(20) DEFAULT NULL,
  `mobilenumber1` varchar(20) DEFAULT NULL,
  `mobilenumber2` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `transportor1_name` varchar(50) DEFAULT NULL,
  `transportor1_address` varchar(500) DEFAULT NULL,
  `transportor1_phonenumber` varchar(20) DEFAULT NULL,
  `transportor1_payment` varchar(50) DEFAULT NULL,
  `transportor1_source` varchar(500) DEFAULT NULL,
  `transportor1_destination` varchar(500) DEFAULT NULL,
  `transportor2_name` varchar(50) DEFAULT NULL,
  `transportor2_address` varchar(500) DEFAULT NULL,
  `transportor2_phonenumber` varchar(20) DEFAULT NULL,
  `transportor2_payment` varchar(20) DEFAULT NULL,
  `transportor2_source` varchar(500) DEFAULT NULL,
  `transportor2_destination` varchar(500) DEFAULT NULL,
  `shopname` varchar(45) DEFAULT NULL,
  `shopcode` varchar(45) DEFAULT NULL,
  `shoplevel` varchar(45) DEFAULT NULL,
  `shopgroup` varchar(45) DEFAULT NULL,
  `condition` varchar(45) DEFAULT NULL,
  `discount` varchar(45) DEFAULT NULL,
  `special_price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siamphan_customer2`
--

LOCK TABLES `siamphan_customer2` WRITE;
/*!40000 ALTER TABLE `siamphan_customer2` DISABLE KEYS */;
/*!40000 ALTER TABLE `siamphan_customer2` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siamphan_user`
--

DROP TABLE IF EXISTS `siamphan_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siamphan_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  `lastlogin` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siamphan_user`
--

LOCK TABLES `siamphan_user` WRITE;
/*!40000 ALTER TABLE `siamphan_user` DISABLE KEYS */;
INSERT INTO `siamphan_user` VALUES (1,'admin','81dc9bdb52d04dc20036dbd8313ed055','admin@admin.com',1,0,'2017-10-08 00:00:00');
/*!40000 ALTER TABLE `siamphan_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-10-26 12:20:17
