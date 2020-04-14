-- MySQL dump 10.13  Distrib 8.0.18, for Win64 (x86_64)
--
-- Host: localhost    Database: psi_baza
-- ------------------------------------------------------
-- Server version	8.0.18

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
-- Table structure for table `korisnik`
--

DROP TABLE IF EXISTS `korisnik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `korisnik` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `imeiprezime` varchar(20) DEFAULT NULL,
  `email` varchar(40) NOT NULL,
  `adresa` varchar(40) DEFAULT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `admin` tinyint(1) NOT NULL,
  PRIMARY KEY (`username`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  UNIQUE KEY `email_UNIQUE` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `korisnik`
--

LOCK TABLES `korisnik` WRITE;
/*!40000 ALTER TABLE `korisnik` DISABLE KEYS */;
/*!40000 ALTER TABLE `korisnik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lf`
--

DROP TABLE IF EXISTS `lf`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lf` (
  `izgpro` tinyint(1) DEFAULT NULL,
  `oglasId` int(11) NOT NULL,
  PRIMARY KEY (`oglasId`),
  UNIQUE KEY `oglasId_UNIQUE` (`oglasId`),
  CONSTRAINT `R_1` FOREIGN KEY (`oglasId`) REFERENCES `oglas` (`oglasId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lf`
--

LOCK TABLES `lf` WRITE;
/*!40000 ALTER TABLE `lf` DISABLE KEYS */;
/*!40000 ALTER TABLE `lf` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `oglas`
--

DROP TABLE IF EXISTS `oglas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `oglas` (
  `oglasId` int(11) NOT NULL,
  `vrsta` varchar(10) NOT NULL,
  `pol` varchar(10) DEFAULT NULL,
  `rasa` varchar(20) DEFAULT NULL,
  `slika` varchar(40) DEFAULT NULL,
  `opis` varchar(200) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`oglasId`),
  UNIQUE KEY `oglasId_UNIQUE` (`oglasId`),
  KEY `R_4` (`username`),
  CONSTRAINT `R_4` FOREIGN KEY (`username`) REFERENCES `korisnik` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `oglas`
--

LOCK TABLES `oglas` WRITE;
/*!40000 ALTER TABLE `oglas` DISABLE KEYS */;
/*!40000 ALTER TABLE `oglas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `srecnaprica`
--

DROP TABLE IF EXISTS `srecnaprica`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `srecnaprica` (
  `srecnapricaId` int(11) NOT NULL,
  `slika` varchar(30) DEFAULT NULL,
  `opis` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`srecnapricaId`),
  UNIQUE KEY `srecnapricaId_UNIQUE` (`srecnapricaId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `srecnaprica`
--

LOCK TABLES `srecnaprica` WRITE;
/*!40000 ALTER TABLE `srecnaprica` DISABLE KEYS */;
/*!40000 ALTER TABLE `srecnaprica` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `udomi`
--

DROP TABLE IF EXISTS `udomi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `udomi` (
  `starost` varchar(20) DEFAULT NULL,
  `mesto` varchar(20) DEFAULT NULL,
  `oglasId` int(11) NOT NULL,
  PRIMARY KEY (`oglasId`),
  UNIQUE KEY `oglasId_UNIQUE` (`oglasId`),
  CONSTRAINT `R_2` FOREIGN KEY (`oglasId`) REFERENCES `oglas` (`oglasId`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `udomi`
--

LOCK TABLES `udomi` WRITE;
/*!40000 ALTER TABLE `udomi` DISABLE KEYS */;
/*!40000 ALTER TABLE `udomi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vest`
--

DROP TABLE IF EXISTS `vest`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `vest` (
  `vestId` int(11) NOT NULL,
  `naslov` varchar(40) DEFAULT NULL,
  `slika` varchar(30) DEFAULT NULL,
  `opis` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`vestId`),
  UNIQUE KEY `vestId_UNIQUE` (`vestId`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vest`
--

LOCK TABLES `vest` WRITE;
/*!40000 ALTER TABLE `vest` DISABLE KEYS */;
/*!40000 ALTER TABLE `vest` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `zalba`
--

DROP TABLE IF EXISTS `zalba`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `zalba` (
  `zalbaId` int(11) NOT NULL,
  `opis` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  PRIMARY KEY (`zalbaId`),
  UNIQUE KEY `zalbaId_UNIQUE` (`zalbaId`),
  UNIQUE KEY `username_UNIQUE` (`username`),
  CONSTRAINT `R_3` FOREIGN KEY (`username`) REFERENCES `korisnik` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `zalba`
--

LOCK TABLES `zalba` WRITE;
/*!40000 ALTER TABLE `zalba` DISABLE KEYS */;
/*!40000 ALTER TABLE `zalba` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-04-14 17:18:12
