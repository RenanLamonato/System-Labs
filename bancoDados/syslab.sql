--
-- Current Database: `syslab`
--

/*!40000 DROP DATABASE IF EXISTS `%s` */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/ `syslab` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `syslab`;

-- MySQL dump 10.13  Distrib 5.7.12, for Win32 (AMD64)
--
-- Host: localhost    Database: syslab
-- ------------------------------------------------------
-- Server version	5.5.5-10.1.21-MariaDB

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
-- Table structure for table `laboratorios`
--

DROP TABLE IF EXISTS `laboratorios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `laboratorios` (
  `lab_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `lab_identificacao` varchar(5) NOT NULL,
  `lab_nome` varchar(30) DEFAULT NULL,
  `lab_descricao` varchar(100) NOT NULL,
  `lab_numMaqOpe` int(10) unsigned NOT NULL,
  `lab_numMaqNor` int(10) unsigned NOT NULL,
  PRIMARY KEY (`lab_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `laboratorios`
--

LOCK TABLES `laboratorios` WRITE;
/*!40000 ALTER TABLE `laboratorios` DISABLE KEYS */;
INSERT INTO `laboratorios` VALUES (1,'Q201',NULL,'kkkkkk',40,44),(2,'Q207',NULL,'lklkkkl',27,30),(3,'Q209',NULL,'fdfdsffsd',25,30);
/*!40000 ALTER TABLE `laboratorios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reservas`
--

DROP TABLE IF EXISTS `reservas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reservas` (
  `res_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `res_data` date NOT NULL,
  `res_horai` time NOT NULL,
  `res_horaf` time NOT NULL,
  `res_descricao` varchar(100) NOT NULL,
  `res_situacao` varchar(10) NOT NULL COMMENT 'valores: análise, deferida, indeferida.',
  `lab_id` bigint(20) unsigned NOT NULL,
  `res_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `sol_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`res_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reservas`
--

LOCK TABLES `reservas` WRITE;
/*!40000 ALTER TABLE `reservas` DISABLE KEYS */;
INSERT INTO `reservas` VALUES (1,'2019-04-26','08:20:00','09:00:00','Teste de gravação de uma solicitação de agendamento de laboratório.','análise',1,'2019-04-25 20:58:03',1),(2,'2019-04-26','20:00:00','23:00:00','Segundo teste de cadastro. Primeiro teste usando o mesmo solicitante da sessão.','análise',1,'2019-04-25 21:02:15',1),(3,'2019-05-07','15:50:00','17:30:00','Atividade adicional de revisão antes da prova.','análise',1,'2019-05-07 18:21:44',2),(4,'2019-05-15','08:10:00','09:50:00','Teste de visualização de eventos usando filtro por laboratório.','análise',3,'2019-05-07 20:46:57',2);
/*!40000 ALTER TABLE `reservas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `solicitantes`
--

DROP TABLE IF EXISTS `solicitantes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `solicitantes` (
  `sol_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `sol_nome` varchar(50) NOT NULL,
  `sol_identificacao` varchar(10) NOT NULL,
  `sol_email` varchar(50) DEFAULT NULL,
  `sol_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`sol_id`),
  KEY `nome` (`sol_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `solicitantes`
--

LOCK TABLES `solicitantes` WRITE;
/*!40000 ALTER TABLE `solicitantes` DISABLE KEYS */;
INSERT INTO `solicitantes` VALUES (1,'Teste 1','1234567','teste1@utfpr.edu.br','2019-04-25 20:49:30'),(2,'Dênis Lucas Silva','816256','dlsilva@utfpr.edu.br','2019-05-07 18:21:43');
/*!40000 ALTER TABLE `solicitantes` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-07 19:25:01
