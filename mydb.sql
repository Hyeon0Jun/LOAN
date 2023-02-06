CREATE DATABASE  IF NOT EXISTS `mydb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `mydb`;
-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: localhost    Database: mydb
-- ------------------------------------------------------
-- Server version	8.0.29

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `interestrate`
--

DROP TABLE IF EXISTS `interestrate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `interestrate` (
  `loanname` varchar(45) NOT NULL,
  `grade1` float DEFAULT '-1',
  `grade2` float DEFAULT '-1',
  `grade3` float DEFAULT '-1',
  `grade4` float DEFAULT '-1',
  `grade5` float DEFAULT '-1',
  `grade6` float DEFAULT '-1',
  `grade7` float DEFAULT '-1',
  `grade8` float DEFAULT '-1',
  `loanproduct_loan_num` int NOT NULL,
  PRIMARY KEY (`loanname`),
  KEY `fk_loanproduct_loan_num_idx` (`loanproduct_loan_num`),
  CONSTRAINT `fk_loanproduct_loan_num` FOREIGN KEY (`loanproduct_loan_num`) REFERENCES `loanproduct` (`loan_num`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `interestrate`
--

LOCK TABLES `interestrate` WRITE;
/*!40000 ALTER TABLE `interestrate` DISABLE KEYS */;
INSERT INTO `interestrate` VALUES ('IBK일반신용대출',4.37,4.87,6.11,7.05,-1,-1,-1,-1,8),('K신용대출',4.17,5.44,7.27,8.69,11.49,14.99,-1,-1,7),('NH일반신용대출',4.89,6.27,7.62,7.24,8.78,-1,-1,-1,4),('OK일반신용대출',14.01,15.05,16.54,17.73,18.88,19.42,-1,-1,9),('국민은행마이너스한도대출',4.97,5.32,5.6,5.5,-1,-1,-1,-1,29),('신한신용대출',4.19,4.43,5.23,7.47,10.24,14,-1,-1,5),('우리일반신용대출',4.18,4.57,5.07,6.02,6.7,9.16,12,12,1),('카카오일반신용대출',6.35,6.35,7.13,8.89,11.54,-1,-1,-1,28),('토스마이너스통장대출',4.37,5.08,5.95,7.27,7.4,-1,-1,-1,6),('토스신용대출',4.2,5.63,7.87,10.03,11,10.07,-1,-1,2),('하나일반신용대출',4.12,5.43,6.98,7.97,9.3,12.16,12.13,12.51,3);
/*!40000 ALTER TABLE `interestrate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loanapplication`
--

DROP TABLE IF EXISTS `loanapplication`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loanapplication` (
  `loanapp_num` int NOT NULL AUTO_INCREMENT,
  `loan_date` date DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `loanproduct_loan_num` int NOT NULL,
  `member_id` varchar(45) NOT NULL,
  PRIMARY KEY (`loanapp_num`),
  KEY `fk_loanapplication_loanproduct1_idx` (`loanproduct_loan_num`) /*!80000 INVISIBLE */,
  KEY `fk_member_id` (`member_id`),
  CONSTRAINT `fk_loanapplication_loanproduct1` FOREIGN KEY (`loanproduct_loan_num`) REFERENCES `loanproduct` (`loan_num`),
  CONSTRAINT `fk_member_id` FOREIGN KEY (`member_id`) REFERENCES `member` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loanapplication`
--

LOCK TABLES `loanapplication` WRITE;
/*!40000 ALTER TABLE `loanapplication` DISABLE KEYS */;
INSERT INTO `loanapplication` VALUES (1,'2022-06-10','2023-06-10',1,'hyun6232'),(2,'2022-06-10','2027-06-10',15,'hyun6232');
/*!40000 ALTER TABLE `loanapplication` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `loanproduct`
--

DROP TABLE IF EXISTS `loanproduct`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `loanproduct` (
  `loan_num` int NOT NULL AUTO_INCREMENT,
  `loanclassification` varchar(45) DEFAULT NULL,
  `loan_name` varchar(45) DEFAULT NULL,
  `l_car` double DEFAULT '0',
  `l_realestate` double DEFAULT '0',
  `avginterestrate` double DEFAULT NULL,
  `limitation` varchar(45) DEFAULT NULL,
  `bank` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`loan_num`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loanproduct`
--

LOCK TABLES `loanproduct` WRITE;
/*!40000 ALTER TABLE `loanproduct` DISABLE KEYS */;
INSERT INTO `loanproduct` VALUES (1,'신용대출','우리개인신용대출',0,0,3.95,'2500','우리은행'),(2,'신용대출','토스신용대출',0,0,3.99,'1200','토스뱅크'),(3,'신용대출','하나개인신용대출',0,0,4,'5000','하나은행'),(4,'신용대출','NH개인신용대출',0,0,4.05,'2000','NH농협은행'),(5,'신용대출','신한신용대출',0,0,4.37,'3000','신한은행'),(6,'신용대출','토스마이너스통장대출',0,0,4.18,'5000','토스뱅크'),(7,'신용대출','K신용대출',0,0,4.19,'1800','케이뱅크'),(8,'신용대출','IBK일반신용대출',0,0,4.37,'1500','IBK기업은행'),(9,'신용대출','OK개인신용대출',0,0,5.9,'10000','OK저축은행'),(10,'부동산담보대출','카카오뱅크주택담보대출',0,0.7,3.04,'부동산가격','카카오뱅크'),(11,'부동산담보대출','KB주택담보대출',0,0.7,3.64,'부동산가격','KB국민은행'),(12,'부동산담보대출','우리아파트론',0,0.3,4.1,'부동산가격','IBK기업은행'),(13,'부동산담보대출','K아파트담보대출',0,0.5,3.25,'부동산가격','케이뱅크'),(14,'부동산담보대출','신한모기지론',0,0.4,5.2,'부동산가격','신한은행'),(15,'자동차담보대출','하나안심오토론',0.9,0,3.31,'차가격','하나은행'),(16,'자동차담보대출','우리드림카대출',0.95,0,2.26,'차가격','우리은행'),(17,'자동차담보대출','신한MYCAR대출',0.8,0,4.26,'차가격','신한은행'),(18,'자동차담보대출','KB매직카대출',0.85,0,2.3,'차가격','KB국민은행'),(19,'자동차담보대출','오토플러스OK론',1,0,7.9,'차가격','OK저축은행'),(20,'서민금융대출','IBK대학생청년햇살론',0,0,5.4,'1200','IBK기업은행'),(21,'서민금융대출','NH햇살론',0,0,7.86,'1500','NH저축은행'),(22,'서민금융대출','하나햇살론',0,0,8.69,'2000','하나저축은행'),(23,'서민금융대출','키움햇살론',0,0,8.89,'1500','키움저축은행'),(24,'서민금융대출','신한대학생청년햇살론',0,0,5.4,'1200','신한은행'),(25,'신용대출','IBK퍼스트원대출',0,0,2.9,'1000','IBK기업은행'),(26,'서민금융대출','우리청년맞춤형월세대출',0,0,2.74,'1200','우리은행'),(27,'서민금융대출','IBK청년전세대출',0,0,2.78,'7000','IBK기업은행'),(28,'신용대출','카카오일반신용대출',0,0,7.41,'1000','카카오뱅크'),(29,'신용대출','국민은행마이너스한도대출',0,0,5.04,'1500','KB국민은행'),(30,'부동산담보대출','IBK주택담보대출',0,0.7,3.82,'부동산가격','IBK기업은행'),(31,'부동산담보대출','OK모기지론',0,0.5,5.99,'부동산가격','OK저축은행');
/*!40000 ALTER TABLE `loanproduct` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `member`
--

DROP TABLE IF EXISTS `member`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `member` (
  `id` varchar(45) NOT NULL,
  `pw` varchar(45) DEFAULT NULL,
  `mem_name` varchar(45) DEFAULT NULL,
  `phone` varchar(45) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `realestate` int DEFAULT NULL,
  `car` int DEFAULT NULL,
  `creditscore` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `member`
--

LOCK TABLES `member` WRITE;
/*!40000 ALTER TABLE `member` DISABLE KEYS */;
INSERT INTO `member` VALUES ('aa','1234','admin','01026344231','1998-06-19',0,0,0),('hyun6232','6232','현영준','01026344231','1998-06-19',100000,5000,751);
/*!40000 ALTER TABLE `member` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-06-10 11:16:28
