-- MySQL dump 10.13  Distrib 8.0.19, for Win64 (x86_64)
--
-- Host: localhost    Database: app_magang_dev
-- ------------------------------------------------------
-- Server version	5.7.33

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL COMMENT 'avatar img path',
  `account_id` int(10) unsigned DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `admin_FK` (`account_id`),
  CONSTRAINT `admin_FK` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin lengkap','1690468538_7442ff777837e6d9b4b7.jpg',5,'09876535210','2023-06-21 10:45:56','2023-07-27 21:35:38'),(2,'Verifikator','1690943575_3a87663f02d074614e43.jpg',6,'0789654321','2023-06-22 08:48:08','2023-08-02 09:32:55'),(3,'admin satu',NULL,8,'9023198291892','2023-06-29 19:01:34','2023-06-29 19:01:34'),(4,'verif satu satuEdit','1690863200_641bb481a672bec93a86.jpg',9,'23746273642230','2023-06-29 19:02:40','2023-08-01 11:13:20'),(5,'verifikator1',NULL,19,'09834237382','2023-08-02 09:38:36','2023-08-02 09:38:36');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_groups_users`
--

DROP TABLE IF EXISTS `auth_groups_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_groups_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_groups_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_groups_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (2,1,'superadmin','2023-04-01 06:07:41'),(3,2,'mahasiswa','2023-04-05 02:51:22'),(6,5,'admin','2023-06-21 03:29:05'),(7,6,'verifikator','2023-06-22 01:36:31'),(8,7,'mahasiswa','2023-06-29 11:52:17'),(9,8,'admin','2023-06-29 19:01:34'),(10,9,'verifikator','2023-06-29 19:02:40'),(11,10,'perusahaan','2023-06-29 19:05:19'),(12,11,'perusahaan','2023-06-29 19:06:55'),(13,12,'perusahaan','2023-06-29 19:10:25'),(14,13,'perusahaan','2023-07-03 13:36:09'),(15,14,'perusahaan','2023-07-04 07:58:06'),(16,15,'perusahaan','2023-07-25 10:07:16'),(17,16,'perusahaan','2023-07-25 10:19:41'),(18,19,'verifikator','2023-08-02 09:38:36');
/*!40000 ALTER TABLE `auth_groups_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_identities`
--

DROP TABLE IF EXISTS `auth_identities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_identities` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `type` varchar(255) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `secret` varchar(255) NOT NULL,
  `secret2` varchar(255) DEFAULT NULL,
  `expires` datetime DEFAULT NULL,
  `extra` text,
  `force_reset` tinyint(1) NOT NULL DEFAULT '0',
  `last_used_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type_secret` (`type`,`secret`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `auth_identities_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_identities`
--

LOCK TABLES `auth_identities` WRITE;
/*!40000 ALTER TABLE `auth_identities` DISABLE KEYS */;
INSERT INTO `auth_identities` VALUES (1,1,'email_password',NULL,'muhammad.adif19101@student.unsika.ac.id','$2y$10$DiyG0j7g4z7dTL6s3X7QIeWcQHWeRFh2.PJuQNihwSTP/xM.Z2CP.',NULL,NULL,0,'2023-04-05 04:46:35','2023-03-31 04:14:05','2023-04-05 04:46:35'),(2,2,'email_password',NULL,'adiffikri7@gmail.com','$2y$10$UzwkAgs7Nfo8dn3NRcembedp3LhGeKpYIOdpdGqbcSDy7LdGotnma',NULL,NULL,0,'2023-07-31 09:13:35','2023-04-05 02:51:22','2023-07-31 09:13:35'),(5,5,'email_password',NULL,'admin@mail.com','$2y$10$oLPTBt94hFjwf..xkXMy7.rp6ZCrCEStgC4ryQNaXfiqVoe0K9OBi',NULL,NULL,0,'2023-08-03 14:12:37','2023-06-21 02:34:02','2023-08-03 14:12:37'),(6,6,'email_password',NULL,'verifikator@mail.com','$2y$10$TISGT9T.T/8L1vneeReMAO/7P/EgPoFO/JmM5Pl.axhUnRIWiZ.qm',NULL,NULL,0,'2023-08-02 09:04:56','2023-06-22 01:31:48','2023-08-02 09:04:56'),(7,7,'email_password',NULL,'mhs1@mail.com','$2y$10$PU1kwNK5w/zjCZCpsOxTmuiMkxR0YfX.1hVvP9C18iz7YT1IdpmHC',NULL,NULL,0,'2023-08-03 12:11:00','2023-06-29 11:52:17','2023-08-03 12:11:00'),(8,8,'email_password',NULL,'admin1@mail.com','$2y$10$TTCppZ9dArLPPuF0CxSx7..I0.nN61mbX05Sifg138O.6SYlH/pDa',NULL,NULL,0,'2023-08-03 13:53:55','2023-06-29 19:01:33','2023-08-03 13:53:55'),(9,9,'email_password',NULL,'verif1@mail.com','$2y$10$eJP4IPY2O/AShu7wejilyO83XpubdwNwExLo8POdImWcgoKf9sq4G',NULL,NULL,0,'2023-07-27 21:41:36','2023-06-29 19:02:40','2023-07-27 21:41:36'),(10,10,'email_password',NULL,'ptsatu@mail.com','$2y$10$pFVYrOPmrVc8ixKgRA2v3uLz.KekGNeVk4xpk7P8QC/xsqZYC8m4C',NULL,NULL,0,NULL,'2023-06-29 19:05:19','2023-06-29 19:05:19'),(11,11,'email_password',NULL,'ptdua@mail.com','$2y$10$5i.XLFAuGSP/pLjNuJFXke7u91J2QJEObf12BpIpK3UQAdfkhDPsK',NULL,NULL,0,NULL,'2023-06-29 19:06:54','2023-06-29 19:06:55'),(12,12,'email_password',NULL,'pttiga@mail.com','$2y$10$nmpjDIusNk5bC8YDwY.juOw52lts.pe1kMPJ3xFOjUZlq4aL8EByi',NULL,NULL,0,'2023-07-28 10:26:23','2023-06-29 19:10:25','2023-07-28 10:26:23'),(13,13,'email_password',NULL,'lacorp@corpmail.com','$2y$10$Q0xIdk1UCNDCoupj.0osQeEqRIiPa3jocawUR4mrlL9Ih3Jn1M2wC',NULL,NULL,0,NULL,'2023-07-03 13:36:08','2023-07-03 13:36:09'),(14,14,'email_password',NULL,'perusahaan@mail.com','$2y$10$tYN2rElmEsN9KF318Hf7feWF9w3Wl/cmcPF4t2oSKlbiWzanYyL9a',NULL,NULL,0,'2023-07-29 21:16:29','2023-07-04 07:58:06','2023-07-29 21:16:29'),(15,15,'email_password',NULL,'registperusahaan@mail.com','$2y$10$UAh.pJdL3CPiY7JF5tFQlOezVCWUyDZGcBPGIvgZqpr9Rd1c7Apd6',NULL,NULL,0,NULL,'2023-07-25 10:07:16','2023-07-25 10:07:16'),(16,16,'email_password',NULL,'regist@mail.com','$2y$10$XQtnzXztCDGbdyv0GbWbf.e594zRi63GT6BwHjY03GeDX7cbbfwVu',NULL,NULL,0,NULL,'2023-07-25 10:19:41','2023-07-25 10:19:41'),(17,19,'email_password',NULL,'verifikator1@mail.com','$2y$10$DtQjVqisRHIa7ZsC/gdezehiY3.vAgEDPJDp.N4QM6Egv0qzoblMq',NULL,NULL,0,NULL,'2023-08-02 09:38:36','2023-08-02 09:38:36');
/*!40000 ALTER TABLE `auth_identities` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_logins`
--

DROP TABLE IF EXISTS `auth_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',NULL,'2023-03-31 03:30:14',0),(2,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','magic-link','1123d6b5aa6e562fe2ad',1,'2023-03-31 04:22:54',1),(3,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-03-31 04:41:32',1),(4,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-03-31 04:52:55',1),(5,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-04-01 06:04:20',1),(6,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 02:53:47',1),(7,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 03:53:50',1),(8,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 04:20:53',1),(9,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 04:33:13',1),(10,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-04-05 04:46:35',1),(11,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-07 02:59:18',1),(12,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-09 05:34:26',1),(13,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-12 12:21:47',1),(14,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-13 04:22:48',1),(15,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-13 04:23:04',1),(16,'192.168.1.112','Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',NULL,'2023-05-10 11:25:07',0),(17,'192.168.1.112','Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36','email_password','adiffikri7@gmail.com',NULL,'2023-05-10 11:26:04',0),(18,'192.168.1.112','Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-05-10 11:27:06',1),(19,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-05-22 08:53:48',1),(20,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-05-23 03:14:53',1),(21,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:16:14',1),(22,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',NULL,'2023-06-10 14:17:58',0),(23,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:18:06',1),(24,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:18:39',1),(25,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:23:05',1),(26,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-12 13:02:44',1),(27,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','1adiffikri7@gmail.com',2,'2023-06-12 13:31:30',1),(28,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-12 13:31:51',1),(29,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-13 14:11:04',1),(30,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-13 14:11:16',1),(31,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-06-21 03:39:07',1),(32,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-06-21 06:25:22',1),(33,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-06-22 01:46:11',1),(34,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-22 11:20:06',1),(35,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-06-23 11:22:22',1),(36,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-23 13:06:45',1),(37,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','mhs1@mail.com',7,'2023-06-29 11:56:31',1),(38,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','mhs1@mail.com',7,'2023-06-29 18:59:42',1),(39,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin1@mail.com',8,'2023-06-29 19:01:57',1),(40,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verif1@mail.com',9,'2023-06-29 19:02:53',1),(41,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-04 07:58:22',1),(42,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-04 19:46:12',1),(43,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-11 19:13:51',1),(44,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-13 15:11:16',1),(45,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',NULL,'2023-07-13 15:38:12',0),(46,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',NULL,'2023-07-13 15:38:59',0),(47,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-07-13 15:39:11',1),(48,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-13 15:39:49',1),(49,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-07-13 15:40:37',1),(50,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-13 15:52:55',1),(51,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',NULL,'2023-07-13 16:10:00',0),(52,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-07-13 16:10:05',1),(53,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-13 16:14:13',1),(54,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-14 07:33:44',1),(55,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-14 08:11:20',1),(56,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verif@mail.com',NULL,'2023-07-14 08:49:15',0),(57,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verif@mail.com',NULL,'2023-07-14 08:49:24',0),(58,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-07-14 08:49:42',1),(59,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-17 09:22:32',1),(60,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-17 20:43:15',1),(61,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-17 21:40:51',1),(62,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiifikri7@gmail.com',NULL,'2023-07-26 08:23:00',0),(63,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-26 08:23:18',1),(64,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',NULL,'2023-07-26 09:41:25',0),(65,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',NULL,'2023-07-26 09:41:29',0),(66,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-26 09:41:53',1),(67,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-27 12:08:03',1),(68,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-27 12:09:11',1),(69,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-27 13:32:21',1),(70,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-27 13:42:08',1),(71,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',NULL,'2023-07-27 14:20:18',0),(72,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-27 14:20:24',1),(73,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-27 14:30:29',1),(74,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-27 14:33:35',1),(75,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',NULL,'2023-07-27 21:11:10',0),(76,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-27 21:11:15',1),(77,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-27 21:13:35',1),(78,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-27 21:36:08',1),(79,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-27 21:36:36',1),(80,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','verif1@mail.com',9,'2023-07-27 21:41:36',1),(81,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-27 21:43:53',1),(82,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','pttiga@mail.com',12,'2023-07-28 10:26:23',1),(83,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-29 09:37:18',1),(84,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','perusahaan@mail.com',14,'2023-07-29 21:16:29',1),(85,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-31 08:58:35',1),(86,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-31 08:59:25',1),(87,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-31 09:09:14',1),(88,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-07-31 09:09:24',1),(89,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-31 09:10:50',1),(90,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-07-31 09:13:35',1),(91,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',NULL,'2023-08-01 19:53:13',0),(92,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-08-01 19:53:19',1),(93,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','verif@mail.com',NULL,'2023-08-01 20:51:56',0),(94,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','verifikator@mail.com',NULL,'2023-08-01 20:52:13',0),(95,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-08-01 20:52:20',1),(96,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','verifikator@mail.com',NULL,'2023-08-02 09:04:50',0),(97,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','verifikator@mail.com',6,'2023-08-02 09:04:56',1),(98,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-08-03 11:04:48',1),(99,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-08-03 11:40:17',1),(100,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','mhs1@mail.com',7,'2023-08-03 12:11:00',1),(101,'192.168.1.111','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Mobile Safari/537.36','email_password','admin@mail.com',5,'2023-08-03 13:29:30',1),(102,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Safari/537.36','email_password','admin1@mail.com',8,'2023-08-03 13:53:55',1),(103,'::1','Mozilla/5.0 (Linux; Android 10; K) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/115.0.0.0 Mobile Safari/537.36','email_password','admin@mail.com',5,'2023-08-03 14:12:37',1);
/*!40000 ALTER TABLE `auth_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_permissions_users`
--

DROP TABLE IF EXISTS `auth_permissions_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_permissions_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `permission` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `auth_permissions_users_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_permissions_users_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_permissions_users`
--

LOCK TABLES `auth_permissions_users` WRITE;
/*!40000 ALTER TABLE `auth_permissions_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_permissions_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_remember_tokens`
--

DROP TABLE IF EXISTS `auth_remember_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_remember_tokens` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `selector` varchar(255) NOT NULL,
  `hashedValidator` varchar(255) NOT NULL,
  `user_id` int(11) unsigned NOT NULL,
  `expires` datetime NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `selector` (`selector`),
  KEY `auth_remember_tokens_user_id_foreign` (`user_id`),
  CONSTRAINT `auth_remember_tokens_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_remember_tokens`
--

LOCK TABLES `auth_remember_tokens` WRITE;
/*!40000 ALTER TABLE `auth_remember_tokens` DISABLE KEYS */;
INSERT INTO `auth_remember_tokens` VALUES (25,'ca57d08d3700c482357556dc','8aaa12dd6360ec8d26e23afabd6acc1c935377c0b8fdac974146528f7ea178e7',9,'2023-08-26 14:41:36','2023-07-27 21:41:36','2023-07-27 21:41:36'),(32,'c095e5eea0a2f27ebc4e1b09','9c0b750943e9e15447dc29013fa15c625d2dfc0180f64cd5fd2a203f0e81076a',5,'2023-09-02 01:48:58','2023-07-31 09:09:24','2023-08-03 08:48:58'),(34,'e2c3b3b4a83fbecd6497fbed','82dc51a1f40bd69e658871f62f34561a4e08114b55e824ab0dbfde6bdbf5221c',2,'2023-09-01 02:04:33','2023-07-31 09:13:35','2023-08-02 09:04:33'),(35,'231fa2ecd18a23021f99ec2b','cc0bd5b5f3f23aeaeab40b7882f6eb81ccdad17d51313e0aff69d054f3c143f8',5,'2023-08-31 12:53:19','2023-08-01 19:53:19','2023-08-01 19:53:19'),(36,'625ce34c56d6865e22b681cc','2a30bda6354125d3349404beddcb04ed1f8c6b987083a3dad6dd0c6fbadf0def',6,'2023-08-31 13:52:20','2023-08-01 20:52:20','2023-08-01 20:52:20'),(37,'4937be891a308a8add4a9cbf','029afc063e1cb28baeaeed072f6721496dc2a28a66629016d257c860a9bad26c',6,'2023-09-01 02:04:56','2023-08-02 09:04:56','2023-08-02 09:04:56'),(38,'e859868ff0b080fcf54a880e','e6e792aadccdadf4d8f7cc1802a6f47c01f0743cf7f626cae21ebc3953742d2d',5,'2023-09-02 04:04:48','2023-08-03 11:04:48','2023-08-03 11:04:48'),(39,'4b2b2032b37eff90a47a0068','5f6cb0ec317d3d8e86935a123fe585410daeec2ded4394e1504ecf13311a6386',5,'2023-09-02 04:40:17','2023-08-03 11:40:17','2023-08-03 11:40:17'),(40,'9bc1fb5f479a40839185d88f','ad12bbab85e87874084ab999f438787b68a258afdf48571c6bd491a225c61c4e',7,'2023-09-02 05:11:00','2023-08-03 12:11:00','2023-08-03 12:11:00'),(41,'37c14e7a12f2927b628cc228','002b56144bfaa6bdc5ccf07a3758e5068a44a3719911cc5c5df783c3f9c08d6c',5,'2023-09-02 06:29:30','2023-08-03 13:29:30','2023-08-03 13:29:30'),(42,'427fbc789a17d3b960b684d7','dc73eddcb875fb228eded2282be9c53fdb14ecf324a27d9fe46956ce61f5df33',8,'2023-09-02 06:53:55','2023-08-03 13:53:55','2023-08-03 13:53:55'),(43,'3dc69ac79863203cea38d4ef','d1695e9ee90d17f97e9f60fe6c9e411e791809ecfa0bfa75e6e5725b6ac9025d',5,'2023-09-02 07:12:37','2023-08-03 14:12:37','2023-08-03 14:12:37');
/*!40000 ALTER TABLE `auth_remember_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auth_token_logins`
--

DROP TABLE IF EXISTS `auth_token_logins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `auth_token_logins` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(255) NOT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `id_type` varchar(255) NOT NULL,
  `identifier` varchar(255) NOT NULL,
  `user_id` int(11) unsigned DEFAULT NULL,
  `date` datetime NOT NULL,
  `success` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_type_identifier` (`id_type`,`identifier`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_token_logins`
--

LOCK TABLES `auth_token_logins` WRITE;
/*!40000 ALTER TABLE `auth_token_logins` DISABLE KEYS */;
/*!40000 ALTER TABLE `auth_token_logins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan`
--

DROP TABLE IF EXISTS `lowongan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lowongan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `id_perusahaan` int(10) unsigned DEFAULT NULL,
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `tipe_pekerjaan` varchar(255) DEFAULT NULL,
  `lama_kontrak` varchar(255) DEFAULT NULL,
  `jenis_kontrak` varchar(255) DEFAULT NULL,
  `deadline_daftar` date DEFAULT NULL,
  `kriteria` text,
  `cara_daftar` text,
  `info_tambahan` text,
  `daftar_langsung` enum('1','0') DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lowongan_FK` (`user_id`),
  KEY `lowongan_FK_1` (`id_perusahaan`),
  CONSTRAINT `lowongan_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `lowongan_FK_1` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan`
--

LOCK TABLES `lowongan` WRITE;
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
INSERT INTO `lowongan` VALUES (7,2,1,'Web Developer','<p>web developer sistem X dengan tanggung jawab :</p><ol><li>ASD</li><li>FGH</li><li>JKL</li></ol>','WFO','6 bulan','Paid','2023-04-28','<p>Mahir dalam:</p><ul><li>PHP</li><li>Codeigniter</li><li>MySQL</li><li>JS</li></ul><p>Nilai tambah :</p><ul><li>Bisa edit video</li><li>Bisa benerin AC</li></ul>','<p>Langsung Datang ke kantor dengan membawa:</p><ol><li>CV</li><li>Fotocopy KTP</li><li>Surat Rekomendasi</li></ol>','','0','2023-04-14 21:59:59','2023-05-21 21:05:18'),(22,2,1,'Marketing Intern','<p>Dibutuhkan seorang Marketing Intern untuk membantu mempromosikan produk dan layanan kami dengan spesifikasi sebagai berikut:</p><ol><li>Membuat konten pemasaran</li><li>Menyusun dan melaksanakan rencana pemasaran</li><li>Melakukan riset pasar</li></ol>','WFO','3 bulan','Unpaid','2023-05-31','<p>Persyaratan:</p><ul><li>Kreatif dan inovatif dalam membuat konten pemasaran</li><li>Mampu berkomunikasi dengan baik</li><li>Paham tentang teknik pemasaran digital</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptabcd.com</li><li>Tuliskan subjek email dengan format: [Nama] - Marketing Intern</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pemasaran produk dan layanan teknologi</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:05:18'),(23,2,2,'UI/UX Designer','<p>Butuh seorang UI/UX Designer untuk membantu mendesain tampilan website kami dengan spesifikasi sebagai berikut:</p><ol><li>Mendesain tampilan website</li><li>Mengembangkan prototype website</li><li>Mengoptimalkan user experience</li></ol>','WFO','3 bulan','Unpaid','2023-07-01','<p>Persyaratan:</p><ul><li>Menguasai software desain seperti Figma, Sketch, atau Adobe XD</li><li>Mampu bekerja dalam tim</li><li>Paham tentang user experience design</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan portfolio dan surat lamaran ke email recruitment@pthijk.com</li><li>Tuliskan subjek email dengan format: [Nama] - UI/UX Designer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang desain website dan user experience</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(24,2,3,'Front-end Developer','<p>Front-end Developer dibutuhkan untuk membantu mengembangkan website kami dengan spesifikasi sebagai berikut:</p><ol><li>Mengembangkan website</li><li>Mengoptimalkan performa website</li><li>Menggunakan framework ReactJS</li></ol>','Remote','6 bulan','Paid','2023-08-01','<p>Persyaratan:</p><ul><li>Menguasai HTML, CSS, dan JavaScript</li><li>Mampu menggunakan framework ReactJS</li><li>Paham tentang konsep responsive design</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptlmno.com</li><li>Tuliskan subjek email dengan format: [Nama] - Front-end Developer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pengembangan website</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(25,2,4,'Android Developer','<p>Dibutuhkan seorang Android Developer untuk membantu mengembangkan aplikasi kami dengan spesifikasi sebagai berikut:</p><ol><li>Mengembangkan aplikasi Android</li><li>Mengoptimalkan performa aplikasi</li><li>Menggunakan bahasa pemrograman Kotlin</li></ol>','WFO','3 bulan','Paid','2023-05-31','<p>Persyaratan:</p><ul><li>Menguasai bahasa pemrograman Kotlin</li><li>Mampu mengembangkan aplikasi Android</li><li>Paham tentang konsep arsitektur aplikasi Android</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan portfolio ke email recruitment@ptpqrs.com</li><li>Tuliskan subjek email dengan format: [Nama] - Android Developer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pengembangan aplikasi Android</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(26,2,5,'Data Analyst','<p>PT STUV membutuhkan seorang Data Analyst untuk membantu melakukan analisis data dengan spesifikasi sebagai berikut:</p><ol><li>Menganalisis data pelanggan</li><li>Mengidentifikasi tren dan pola dalam data</li><li>Membuat laporan hasil analisis</li></ol>','Remote','6 bulan','Unpaid','2023-06-30','<p>Persyaratan:</p><ul><li>Menguasai Microsoft Excel</li><li>Mampu menggunakan bahasa pemrograman Python</li><li>Paham tentang konsep analisis data</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptstuv.com</li><li>Tuliskan subjek email dengan format: [Nama] - Data Analyst</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang analisis data</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(27,2,6,'Graphic Designer','<p>PT UVWX sedang mencari seorang Graphic Designer untuk membantu membuat desain grafis dengan spesifikasi sebagai berikut:</p><ol><li>Mendesain brosur, poster, dan banner</li><li>Mengembangkan konsep visual untuk media sosial</li><li>Menggunakan software desain seperti Adobe Photoshop dan Illustrator</li></ol>','WFO','3 bulan','Paid','2023-07-31','<p>Persyaratan:</p><ul><li>Menguasai software desain seperti Adobe Photoshop dan Illustrator</li><li>Mampu membuat desain grafis yang menarik dan kreatif</li><li>Paham tentang konsep desain visual</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan portfolio ke email recruitment@ptuvwx.com</li><li>Tuliskan subjek email dengan format: [Nama] - Graphic Designer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang desain grafis</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(28,2,7,'Content Writer','<p>PT WXYZ membutuhkan seorang Content Writer untuk membantu menulis artikel dan konten digital dengan spesifikasi sebagai berikut:</p><ol><li>Menulis artikel SEO-friendly</li><li>Membuat konten digital yang menarik</li><li>Menggunakan bahasa Indonesia yang baik dan benar</li></ol>','Remote','6 bulan','Unpaid','2023-08-31','<p>Persyaratan:</p><ul><li>Menguasai bahasa Indonesia yang baik dan benar</li><li>Mampu menulis artikel SEO-friendly</li><li>Paham tentang konsep content marketing</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan contoh tulisan ke email recruitment@ptwxyz.com</li><li>Tuliskan subjek email dengan format: [Nama] - Content Writer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang content writing</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(29,2,8,'Marketing Intern','<p>Membantu divisi marketing dalam mempromosikan produk baru</p>','WFO','3 bulan','Unpaid','2023-05-12','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Marketing atau bidang terkait</li><li>Berpengalaman dalam marketing digital</li></ul>','<p>Kirimkan CV dan portofolio ke email marketing@ptabc.com</p>','','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(30,2,9,'Social Media Specialist','<p>Menangani akun media sosial perusahaan</p>','WFH','4 bulan','Paid','2023-05-20','<p>Kualifikasi:</p><ul><li>Berpengalaman dalam manajemen media sosial</li><li>Memiliki kreativitas dalam menghasilkan konten</li></ul>','<p>Kirimkan CV dan portfolio ke email hrd@ptdef.com</p>','','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(31,2,2,'Event Organizer Intern','<p>Menyiapkan acara untuk peluncuran produk baru</p>','WFO','2 bulan','Unpaid','2023-05-25','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Event Organizer atau bidang terkait</li><li>Berpengalaman dalam mengatur acara</li></ul>','<p>Kirimkan CV dan portofolio ke email eventorganizer@ptghi.com</p>','','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(32,2,4,'Content Writer Intern','<p>Membuat artikel dan konten yang berkualitas untuk website perusahaan</p>','WFH','6 bulan','Paid','2023-06-02','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Sastra atau bidang terkait</li><li>Berpengalaman dalam menulis artikel</li></ul>','<p>Kirimkan CV dan contoh tulisan ke email contentwriter@ptjkl.com</p>','','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(33,2,5,'UI/UX Designer Intern','<p>Merancang tampilan dan pengalaman pengguna aplikasi perusahaan</p>','WFH','3 bulan','Paid','2023-06-10','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Desain Grafis atau bidang terkait</li><li>Berpengalaman dalam merancang tampilan aplikasi</li></ul>','<p>Kirimkan CV dan portfolio ke email uidesigner@ptmno.com</p>','','0','2023-04-14 23:29:41','2023-05-21 21:36:13'),(36,2,6,'Web Developer','<p>jadi dev</p>','WFO','6 bulan','Paid','2023-04-20','<p>syarat</p>','<p>langsung</p>','','0','2023-04-15 23:56:59','2023-05-21 21:36:13'),(37,2,1,'ini judul testing','<p>ini desk testing</p>','WFH','6 bulan','Unpaid','2023-05-28','<p>noo</p>','<p>yess</p>','','0','2023-05-21 21:29:01','2023-05-21 21:29:01'),(38,2,10,'loqongan judul','<p>low desk</p>','WFH','5 bulan','Paid','2023-05-24','<p>baik</p>','<p>gass</p>','','0','2023-05-21 22:02:02','2023-05-21 22:02:02'),(39,2,11,'tes jenis usaha','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','WFH','6 bulan','Paid','2023-06-23','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','0','2023-06-14 18:01:21','2023-06-14 18:01:21'),(40,14,14,'Lowongan PT Perusahaan','<p>loqngan biasa</p>','WFO','6 bulan','Paid','2023-07-30','<p>kriteria nya bla bla</p>','<p>cara daftar nya bla bla</p>','','0','2023-07-04 20:16:01','2023-07-04 20:16:01'),(41,14,15,'editWeb Developer','<p>editdesk daftar langsung</p>','WFH','6 bulan','Unpaid','2023-07-18','<p>editgujgyjug</p>','<p>editsrfsg</p>','','1','2023-07-04 20:27:48','2023-07-29 22:53:26'),(42,2,16,'Lorem ipsum dolor','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique commodo accumsan. Quisque eleifend interdum lorem eu feugiat. Suspendisse a varius odio. Cras imperdiet fermentum pulvinar. Integer mollis lacus id convallis mollis. Mauris sem diam, congue fermentum ultrices nec, eleifend vitae eros. Ut molestie nisl a justo fermentum sodales. Donec vel sem ligula. Duis pharetra, eros vitae efficitur gravida, sapien dolor aliquet velit, a faucibus nulla nibh mollis arcu. Praesent id enim metus. Aenean vitae accumsan urna. Pellentesque a est vel orci lacinia sollicitudin. Aliquam sit amet erat purus. Cras a mi id est elementum aliquet vitae id urna.</span><br></p>','WFO','6 bulan','Paid','2023-07-30','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique commodo accumsan. Quisque eleifend interdum lorem eu feugiat. Suspendisse a varius odio. Cras imperdiet fermentum pulvinar. Integer mollis lacus id convallis mollis. Mauris sem diam, congue fermentum ultrices nec, eleifend vitae eros. Ut molestie nisl a justo fermentum sodales. Donec vel sem ligula. Duis pharetra, eros vitae efficitur gravida, sapien dolor aliquet velit, a faucibus nulla nibh mollis arcu. Praesent id enim metus. Aenean vitae accumsan urna. Pellentesque a est vel orci lacinia sollicitudin. Aliquam sit amet erat purus. Cras a mi id est elementum aliquet vitae id urna.</span><br></p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique commodo accumsan. Quisque eleifend interdum lorem eu feugiat. Suspendisse a varius odio. Cras imperdiet fermentum pulvinar. Integer mollis lacus id convallis mollis. Mauris sem diam, congue fermentum ultrices nec, eleifend vitae eros. Ut molestie nisl a justo fermentum sodales. Donec vel sem ligula. Duis pharetra, eros vitae efficitur gravida, sapien dolor aliquet velit, a faucibus nulla nibh mollis arcu. Praesent id enim metus. Aenean vitae accumsan urna. Pellentesque a est vel orci lacinia sollicitudin. Aliquam sit amet erat purus. Cras a mi id est elementum aliquet vitae id urna.</span><br></p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique commodo accumsan. Quisque eleifend interdum lorem eu feugiat. Suspendisse a varius odio. Cras imperdiet fermentum pulvinar. Integer mollis lacus id convallis mollis. Mauris sem diam, congue fermentum ultrices nec, eleifend vitae eros. Ut molestie nisl a justo fermentum sodales. Donec vel sem ligula. Duis pharetra, eros vitae efficitur gravida, sapien dolor aliquet velit, a faucibus nulla nibh mollis arcu. Praesent id enim metus. Aenean vitae accumsan urna. Pellentesque a est vel orci lacinia sollicitudin. Aliquam sit amet erat purus. Cras a mi id est elementum aliquet vitae id urna.</span><br></p>','0','2023-07-14 07:54:27','2023-07-14 07:54:27'),(48,2,15,'EDITEDedit','<p><span style=\"background-color: var(--tblr-card-bg); font-size: var(--tblr-body-font-size); font-weight: var(--tblr-body-font-weight); letter-spacing: 0px; text-align: var(--tblr-body-text-align);\">EDITED</span>fasfawd ada wda</p><p><img src=\"data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAcwAAADRCAYAAABB5IJ3AAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAABxFSURBVHhe7d0LtFRVHcfxzRsUkKcP3s/kmSgQhKCiECCwRCQhFWiBuRBLjVBKTTLJDAVSQJYJCWiJgpGaIKiRQjwzFQgCeT/iISDykmfT/E9/jK7nzvxn7pw5Z+D7WetfZ1/uOXMucuc3e5+z9ykUi3MAACChwvr/AAAgAQITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAAwITAAADAhMAAAMCEwAAg0KxON1GDjp27Jhbt26d++STT9zu3bvdgQMHvDpy5Ii74IILvCpXrpyrVauWVzVq1NA9c9OePXvcxo0b3aZNm7zasWOHO3To0Jd16tQpV6ZMGa9Kly7tKlWq5KpWrfplNWrUSI8EAKkhMHPM6tWr3YIFC76sDRs26J/YlCxZ0nXo0MF17NjRXXfdda5x48b6J9G0bds2N2/ePDd//nzv55WfvyDkw8M3v/lNr+TvoHXr1vonwfrVr37lZs6c6dauXes+++wz/ep/XXTRRa5p06bue9/7nrv55pv1q9H26KOPujlz5rh//vOfbu/evfpV5woXLuwqVqzounfv7iZNmqRftVm6dKkbO3ase//9993+/fvd4cOHXbFixdx5553nateu7dq3b++eeOIJ/e7M2b59u3v22We9D57ygctPoUKFdCux4sWLe+d7/vnnf1ny3/fMkg9uyFESmIi2eG8x9pvf/CZ21VVXyYebjFadOnVid9xxR2zu3Ln6auGL95Bj8TfbWOfOnX3POZNVv3792LBhw2IrV67UVw9G+fLlfV8/b8UDVfeIrt/+9re+55634h9wdA+bCy+80Pc4Z9ZDDz2k350ZH3zwQSweyr6vFVTJzyn/th944IHYjBkzYvEPBno2iDoCM8LiPZHYT3/601j8U6rvL16mK97rik2ZMkVfPRzxHkSsTJkyvucXdN19992xnTt36plklgSz32vmrUwHQhA6derke+55a/PmzbpHcgcPHvQ9Rt667bbbdI/MaNOmje/rZLPivddYt27dYs8884z394DoIjAjavjw4VkLyrxVq1at2OOPP65nkh0vv/xyrHHjxr7nk80qUaJE7JFHHomdPHlSzywzBg4c6Pt6eathw4a6RzTt2rXL97zz1uWXX6572IQVmKVLl/Z9nbBKRiIee+yx2IkTJ/QMESUEZsQsXLgw1rp1a99fpmyX9CTWrVunZxYM+XmzMfSaalWtWjU2fvx4PcuCe+ONN3xfx68WL16se0XPs88+63vOeevnP/+57mETRmDu3bvX9zWiUBdffHFs1KhReqaICgIzQkaPHu37yxNmXXTRRbF58+bpGWaW9KL9XjNKJeeYKfJ36fcaeev+++/XPaKnS5cuvuect1atWqV72BCY/lWzZs3YuHHj9IwRNgIzIu655x7fX5golPS2Nm3apGeaGT/60Y98XyuKJeeaCXfddZfv8fNW3bp1dY9o2b17t+/55i25LpgqAjNx9erVi5uDIoCFCyKgT58+7qmnntJWwcn8w2rVqnm3t2eC3HY/fvx4bRXcnXfe6UaNGqWt9Mjt+w0bNnTdunVz8TdRFw8j9+CDD7qBAwe666+/3jVr1sy7hT8T5FwHDRqkrfR9+9vf1q3E1q9f702jiZo//vGPupWY9eeE3YwZM7ypUB999JF+BWFgHmbI+vfv76ZOnaqt1HXt2tX17NnTW5SgSpUqXpUtW1b/1LmjR4+6ffv2uV27drnFixd7tWTJErdmzRr9DpvOnTu72bNnayt9ffv2dS+++KK2UnPVVVd5P6+EpHUBAplXt2rVKvfqq6+6P/zhD27FihX6J6m79dZb0z730+rXr+/N90vm3nvvdWPGjNFWNMjf/axZs7SVv61bt3of2FIhi07IYhPJyIejF154QVsFI78XMmc0mQYNGngfxPKSOadFixb1qkiRIl7JQiLHjx/3/l/m227ZssUr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\" style=\"width: 460px;\" data-filename=\"covid.png\"><br></p>','Hybrid','1 bulan','Unpaid','2023-08-01','<p><span style=\"background-color: var(--tblr-card-bg); font-size: var(--tblr-body-font-size); font-weight: var(--tblr-body-font-weight); letter-spacing: 0px; text-align: var(--tblr-body-text-align);\">EDITED</span>sfdadakwdhawjd</p>','<p><span style=\"background-color: var(--tblr-card-bg); font-size: var(--tblr-body-font-size); font-weight: var(--tblr-body-font-weight); letter-spacing: 0px; text-align: var(--tblr-body-text-align);\">EDITED</span>adhawidha</p>','<p>EDITED<br></p>','0','2023-07-29 09:23:42','2023-07-31 10:18:22'),(53,5,15,'Admin EDIT','<p>jadi Admin EDIT</p>','Hybrid','6 Bulan','Unpaid','2023-08-14','<p><span style=\"background-color: var(--tblr-card-bg); font-size: var(--tblr-body-font-size); font-weight: var(--tblr-body-font-weight); letter-spacing: 0px; text-align: var(--tblr-body-text-align);\">EDIT</span>jadi Admin awjkdhaw aowidhaw aiwd awiudh aoiwdh</p><p>dauiwhda aowdjaw eaopfjef soefjise soidfej</p><p>&nbsp;fosejfse dgofirjg drifrj fsfseoij fsefosefjs</p><p>asoijdoaswejd</p>','<p><span style=\"background-color: var(--tblr-card-bg); font-size: var(--tblr-body-font-size); font-weight: var(--tblr-body-font-weight); letter-spacing: 0px; text-align: var(--tblr-body-text-align);\">EDIT</span>jadi Admin awjkdhaw aowidhaw aiwd awiudh aoiwdh</p><p>dauiwhda aowdjaw eaopfjef soefjise soidfej</p><p>&nbsp;fosejfse dgofirjg drifrj fsfseoij fsefosefjs</p><p>asoijdoaswejd</p>','<p>jadi Admin awjkdhaw aowidhaw aiwd awiudh aoiwdh</p><p>dauiwhda aowdjaw eaopfjef soefjise soidfej</p><p> fosejfse dgofirjg drifrj fsfseoij fsefosefjs</p><p>asoijdoaswejd</p>','0','2023-07-31 10:05:47','2023-07-31 10:25:44');
/*!40000 ALTER TABLE `lowongan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lowongan_skill`
--

DROP TABLE IF EXISTS `lowongan_skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `lowongan_skill` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lowongan_id` int(11) unsigned NOT NULL,
  `skill_id` int(11) unsigned NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lowongan_skill_FK` (`lowongan_id`),
  KEY `lowongan_skill_FK_1` (`skill_id`),
  CONSTRAINT `lowongan_skill_FK` FOREIGN KEY (`lowongan_id`) REFERENCES `lowongan` (`id`),
  CONSTRAINT `lowongan_skill_FK_1` FOREIGN KEY (`skill_id`) REFERENCES `skill` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=107 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_skill`
--

LOCK TABLES `lowongan_skill` WRITE;
/*!40000 ALTER TABLE `lowongan_skill` DISABLE KEYS */;
INSERT INTO `lowongan_skill` VALUES (56,36,11,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(57,36,40,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(58,36,39,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(59,36,3,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(60,36,9,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(61,37,11,'2023-05-21 21:29:01','2023-05-21 21:29:01'),(62,37,3,'2023-05-21 21:29:01','2023-05-21 21:29:01'),(63,38,11,'2023-05-21 22:02:02','2023-05-21 22:02:02'),(64,39,11,'2023-06-14 18:01:21','2023-06-14 18:01:21'),(65,40,11,'2023-07-04 20:16:01','2023-07-04 20:16:01'),(66,40,9,'2023-07-04 20:16:01','2023-07-04 20:16:01'),(67,41,11,'2023-07-04 20:27:48','2023-07-04 20:27:48'),(68,42,11,'2023-07-14 07:54:27','2023-07-14 07:54:27'),(69,42,9,'2023-07-14 07:54:27','2023-07-14 07:54:27'),(80,48,11,'2023-07-29 09:23:42','2023-07-29 09:23:42'),(81,48,9,'2023-07-29 09:23:42','2023-07-29 09:23:42'),(102,53,11,'2023-07-31 10:05:47','2023-07-31 10:05:47'),(103,53,9,'2023-07-31 10:05:47','2023-07-31 10:05:47'),(104,53,41,'2023-07-31 10:05:47','2023-07-31 10:05:47'),(105,53,3,'2023-07-31 10:05:47','2023-07-31 10:05:47'),(106,53,45,'2023-07-31 10:05:47','2023-07-31 10:05:47');
/*!40000 ALTER TABLE `lowongan_skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mahasiswa`
--

DROP TABLE IF EXISTS `mahasiswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mahasiswa` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `tmpt_tgl_lahir` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `avatar` varchar(255) DEFAULT NULL COMMENT 'avatar img path',
  `account_id` int(10) unsigned DEFAULT NULL,
  `alamat` text,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `mahasiswa_FK` (`account_id`),
  CONSTRAINT `mahasiswa_FK` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (3,'M Adif Fikri','Jakarta, 1 Januari 2020','1910631170101','1686576604_e110077b81debc651d35.png',2,'Jl. Raya Candi No. 6, Sidoarjo','081234567890','2023-05-23 10:23:01','2023-07-27 21:24:16'),(4,'M Adif Fikriaa','','1910631170101','1686541359_15279a7bb9e6f8faac51.png',NULL,'Jl. Raya Candi No. 6, Sidoarjocc',NULL,'2023-06-12 10:42:39','2023-06-12 10:42:39'),(5,'M Adif Fikriaa','','1910631170101','1686541417_c4461441d39687f9e0ed.png',NULL,'Jl. Raya Candi No. 6, Sidoarjobb',NULL,'2023-06-12 10:43:37','2023-06-12 10:43:37'),(7,'mahasiswa satuED','karawang, 2 januari 2000','1123456780980',NULL,7,'jalan jalan bla bla no 11ED','27632784293420','2023-06-29 18:52:17','2023-08-01 11:00:52');
/*!40000 ALTER TABLE `mahasiswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'2020-12-28-223112','CodeIgniter\\Shield\\Database\\Migrations\\CreateAuthTables','default','CodeIgniter\\Shield',1680233089,1),(2,'2021-07-04-041948','CodeIgniter\\Settings\\Database\\Migrations\\CreateSettingsTable','default','CodeIgniter\\Settings',1680233089,1),(3,'2021-11-14-143905','CodeIgniter\\Settings\\Database\\Migrations\\AddContextColumn','default','CodeIgniter\\Settings',1680233089,1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pelamar`
--

DROP TABLE IF EXISTS `pelamar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `pelamar` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL COMMENT 'pelamar',
  `id_lowongan` int(11) unsigned NOT NULL,
  `cv` varchar(255) DEFAULT NULL,
  `dokumen_pendukung` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pelamar_FK` (`user_id`),
  KEY `pelamar_FK_1` (`id_lowongan`),
  CONSTRAINT `pelamar_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `pelamar_FK_1` FOREIGN KEY (`id_lowongan`) REFERENCES `lowongan` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pelamar`
--

LOCK TABLES `pelamar` WRITE;
/*!40000 ALTER TABLE `pelamar` DISABLE KEYS */;
INSERT INTO `pelamar` VALUES (2,2,41,'1689604781_49b80a4bf103da18d75d.pdf',NULL,'2023-07-17 21:39:41','2023-07-17 21:39:41'),(3,2,41,'1690508565_3dc860a1a7e8e99caf41.pdf','1690508565_a84f06abdc6e9ecca495.pdf','2023-07-28 08:42:45','2023-07-28 08:42:45');
/*!40000 ALTER TABLE `pelamar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perusahaan`
--

DROP TABLE IF EXISTS `perusahaan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perusahaan` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `deskripsi` text,
  `email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL COMMENT 'id user akun perusahaan',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `perusahaan_FK` (`account_id`),
  CONSTRAINT `perusahaan_FK` FOREIGN KEY (`account_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan`
--

LOCK TABLES `perusahaan` WRITE;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
INSERT INTO `perusahaan` VALUES (1,'PT. ABCD','Jalan satu dua tiga blok 27 RT.1 RW.2 Cakung, Jakarta Timur',NULL,'abcd@mail.com','09812345678',NULL,NULL,'2023-04-26 23:34:35','2023-04-26 23:34:35'),(2,'PT Mega Jaya','Jalan Utama No. 123, Kota Baru','Perusahaan terkemuka dalam penyediaan solusi inovatif.','kontak@ptmegajaya.com','+62 123-456-7890',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(3,'CV Sentosa Abadi','Jalan Raya No. 456, Kota Indah','Spesialis dalam manufaktur dan distribusi global.','info@sentosaabadi.com','+62 987-654-3210',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(4,'PT Teknologi Terkini','Jalan Oak No. 789, Kota Tekno','Memberikan solusi teknologi terkini.','halo@teknologiterkini.com','+62 456-789-0123',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(5,'PT Maju Bersama','Jalan Raya No. 789, Kota Maju','Perusahaan yang bergerak dalam bidang konstruksi dan pengembangan infrastruktur.','info@majubersama.com','+62 987-654-3210',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(6,'CV Berkah Sejahtera','Jalan Merdeka No. 456, Kota Bahagia','Penyedia layanan konsultasi keuangan dan perencanaan investasi.','contact@berkahsejahtera.com','+62 123-456-7890',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(7,'PT Abadi Makmur','Jalan Jaya No. 789, Kota Makmur','Produsen terkemuka dalam industri makanan dan minuman.','info@abadimakmur.com','+62 456-789-0123',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(8,'CV Harmoni Jaya','Jalan Indah No. 123, Kota Harmoni','Perusahaan distribusi produk kecantikan dan perawatan personal.','hello@harmonijaya.com','+62 123-456-7890',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(9,'PT Teknik Nusantara','Jalan Nusantara No. 456, Kota Teknologi','Perusahaan teknik yang menyediakan solusi inovatif untuk sektor energi.','info@tekniknusantara.com','+62 987-654-3210',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(10,'Lala Corp','jalan lalala lili lulu lele','ini xsdz','lacorp@corpmail.com','0839237472348',NULL,13,'2023-05-21 22:02:02','2023-07-03 13:36:09'),(11,'usaha corpp','jalan usaja corp no 11 jakara','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.','usahacorp@mail.com','0819283291312',NULL,NULL,'2023-06-14 18:01:21','2023-06-14 18:01:21'),(12,'pt satu','jalan pot satu no 1 jakarta','','ptsatu@mail.com','8129731982738912',NULL,10,'2023-06-29 19:05:19','2023-06-29 19:05:19'),(13,'pt dua','jalan pt dya jkadwa aiowdja ajwh','auiwhdawdiuad awdhauwijdhaiwda diawuhdauiw daiwudhauw\r\naidhhgwaiud awdhaw aidhuauwd aiwduhaw uadwygd\r\n1. diauwhd aoiwduhaiw awiudhaw\r\n2. daiowud daiuywda ayudgwayd','ptdua@mail.com','1283791823','1688040414_df7546045954f6f7fb82.png',11,'2023-06-29 19:06:55','2023-06-29 19:06:55'),(14,'pt tiga','dkahwkd aiwudhaw aiwdha aiwduha','dioahwidahw','pttiga@mail.com','092839182323','1690514860_27a0f80e127b26ad36c4.jpg',12,'2023-06-29 19:10:25','2023-07-28 10:27:40'),(15,'Perusahaan Jaya','jalan perusahaan jaya no 1 jakarta','tes akun perusahaan jaya','perusahaan@mail.com','092382394300','1690469877_ec3ce20a9ef99e171758.jpg',14,'2023-07-04 07:58:06','2023-07-27 21:57:57'),(16,'PT Perusahaan Corp','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique commodo accumsan. Quisque eleifend interdum lorem eu feugiat.','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec tristique commodo accumsan. Quisque eleifend interdum lorem eu feugiat. Suspendisse a varius odio. Cras imperdiet fermentum pulvinar. Integer mollis lacus id convallis mollis. Mauris sem diam, congue fermentum ultrices nec, eleifend vitae eros. Ut molestie nisl a justo fermentum sodales. Donec vel sem ligula. Duis pharetra, eros vitae efficitur gravida, sapien dolor aliquet velit, a faucibus nulla nibh mollis arcu. Praesent id enim metus. Aenean vitae accumsan urna. Pellentesque a est vel orci lacinia sollicitudin. Aliquam sit amet erat purus. Cras a mi id est elementum aliquet vitae id urna.','perusahaaancorp@mail.com','01288732472342',NULL,NULL,'2023-07-14 07:54:27','2023-07-14 07:54:27'),(17,'regist perusahaan','jalan jalan bla bla bla bla',NULL,NULL,NULL,NULL,15,'2023-07-25 10:07:16','2023-07-25 10:07:16'),(18,'regist','jalan bla bla regist',NULL,NULL,NULL,NULL,16,'2023-07-25 10:19:41','2023-07-25 10:19:41'),(19,'Perusahaan BaruEDIT','Jalan peruusahaan baru no 1 rt 1 rw 1EDIT','EDITEDITEDITEDITEDITEDITEDIT','perusahaanbaru@mail.com','073284728340',NULL,NULL,'2023-08-01 09:19:36','2023-08-01 11:38:53');
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` int(9) NOT NULL AUTO_INCREMENT,
  `class` varchar(255) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` text,
  `type` varchar(31) NOT NULL DEFAULT 'string',
  `context` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `skill`
--

DROP TABLE IF EXISTS `skill`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `skill` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (1,'Java','2023-04-15 22:02:16','2023-04-15 22:02:16'),(2,'Python','2023-04-15 22:02:16','2023-04-15 22:02:16'),(3,'JavaScript','2023-04-15 22:02:16','2023-04-15 22:02:16'),(4,'C++','2023-04-15 22:02:16','2023-04-15 22:02:16'),(5,'Ruby','2023-04-15 22:02:16','2023-04-15 22:02:16'),(6,'SQL','2023-04-15 22:02:16','2023-04-15 22:02:16'),(7,'Git','2023-04-15 22:02:16','2023-04-15 22:02:16'),(8,'Linux','2023-04-15 22:02:16','2023-04-15 22:02:16'),(9,'HTML','2023-04-15 22:02:16','2023-04-15 22:02:16'),(10,'CSS','2023-04-15 22:02:16','2023-04-15 22:02:16'),(11,'PHP','2023-04-15 22:02:16','2023-04-15 22:02:16'),(12,'Node.js','2023-04-15 22:02:16','2023-04-15 22:02:16'),(13,'React','2023-04-15 22:02:16','2023-04-15 22:02:16'),(14,'Vue.js','2023-04-15 22:02:16','2023-04-15 22:02:16'),(15,'Bootstrap','2023-04-15 22:02:16','2023-04-15 22:02:16'),(16,'jQuery','2023-04-15 22:02:16','2023-04-15 22:02:16'),(17,'Data Structures','2023-04-15 22:02:16','2023-04-15 22:02:16'),(18,'Algorithms','2023-04-15 22:02:16','2023-04-15 22:02:16'),(19,'Database Design','2023-04-15 22:02:16','2023-04-15 22:02:16'),(20,'Networking','2023-04-15 22:02:16','2023-04-15 22:02:16'),(21,'Cybersecurity','2023-04-15 22:02:16','2023-04-15 22:02:16'),(22,'Artificial Intelligence','2023-04-15 22:02:16','2023-04-15 22:02:16'),(23,'Machine Learning','2023-04-15 22:02:16','2023-04-15 22:02:16'),(24,'Big Data','2023-04-15 22:02:16','2023-04-15 22:02:16'),(25,'Data Analytics','2023-04-15 22:02:16','2023-04-15 22:02:16'),(26,'Cloud Computing','2023-04-15 22:02:16','2023-04-15 22:02:16'),(27,'Adobe Illustrator','2023-04-15 22:02:28','2023-04-15 22:02:28'),(28,'Adobe Photoshop','2023-04-15 22:02:28','2023-04-15 22:02:28'),(29,'InDesign','2023-04-15 22:02:28','2023-04-15 22:02:28'),(30,'Graphic Design','2023-04-15 22:02:28','2023-04-15 22:02:28'),(31,'Web Design','2023-04-15 22:02:28','2023-04-15 22:02:28'),(32,'UX/UI Design','2023-04-15 22:02:28','2023-04-15 22:02:28'),(33,'Copywriting','2023-04-15 22:02:28','2023-04-15 22:02:28'),(34,'Content Marketing','2023-04-15 22:02:28','2023-04-15 22:02:28'),(35,'Social Media Marketing','2023-04-15 22:02:28','2023-04-15 22:02:28'),(36,'Email Marketing','2023-04-15 22:02:28','2023-04-15 22:02:28'),(39,'MySql','2023-04-15 23:21:34','2023-04-15 23:21:34'),(40,'codeigniter','2023-04-15 23:26:31','2023-04-15 23:26:31'),(41,'Laravel','2023-07-31 09:21:58','2023-07-31 09:21:58'),(45,'Komunikasi','2023-07-31 10:04:37','2023-07-31 10:04:37');
/*!40000 ALTER TABLE `skill` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat`
--

DROP TABLE IF EXISTS `surat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_perusahaan` int(10) unsigned DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `tmpt_tgl_lahir` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `agama` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `alamat` text,
  `penerima_surat` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `surat_final` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `surat_FK` (`id_perusahaan`),
  KEY `surat_FK_1` (`user_id`),
  CONSTRAINT `surat_FK` FOREIGN KEY (`id_perusahaan`) REFERENCES `perusahaan` (`id`) ON UPDATE CASCADE,
  CONSTRAINT `surat_FK_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat`
--

LOCK TABLES `surat` WRITE;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES (1,11,2,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','093888723472','<p>jalan bla bla bla cakung jakarta timur</p>','Penerima','CANCELED',NULL,'2023-06-14 20:52:36','2023-06-17 22:01:52'),(2,11,2,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">orem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales an</span><br></p>','HR CV Sentosa','CANCELED',NULL,'2023-06-14 20:56:41','2023-06-17 22:00:51'),(3,11,1,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">orem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales an</span><br></p>','HR CV Sentosa','DONE','1687351240_529debbfaa41c45cbb66.pdf','2023-06-14 20:56:41','2023-06-21 19:40:40'),(4,11,2,'UDIN','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','074392482347','<p>jalan bla bla bla cakung jakarta timur</p>','Penerima','REJECTED',NULL,'2023-06-14 20:52:36','2023-06-21 18:41:11'),(5,11,2,'Adif','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','034728328734','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">orem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales an</span><br></p>','HR CV Sentosa','CANCELED',NULL,'2023-06-14 20:56:41','2023-06-17 22:02:25'),(6,10,2,'Nama Lengkap','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p>Alamat Lengkap</p>','Pak Lala','DONE','1687352874_a63e55007b9f071707c4.pdf','2023-06-21 19:42:31','2023-06-21 20:07:54'),(7,10,2,'Ini Adif','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p>Ini Alamat lengkap</p>','Bu Lili','CANCELED',NULL,'2023-06-21 21:04:24','2023-06-23 19:21:12'),(8,10,2,'Tes mohon','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p>alamat</p>','caaa','DONE','1687522144_a73c87db53892bf0eb04.pdf','2023-06-23 18:44:30','2023-06-23 19:09:04'),(9,10,2,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p>adda awecaw vawd</p>','Pak Lala','PENDING',NULL,'2023-07-13 15:12:43','2023-07-13 15:12:43');
/*!40000 ALTER TABLE `surat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `surat_plot`
--

DROP TABLE IF EXISTS `surat_plot`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `surat_plot` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `npm` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `surat_covid` varchar(255) DEFAULT NULL,
  `surat_balasan` varchar(255) DEFAULT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `nama_penanggung_jawab` varchar(255) DEFAULT NULL,
  `hp_penanggung_jawab` varchar(255) DEFAULT NULL,
  `latitude` varchar(255) DEFAULT NULL,
  `longitude` varchar(255) DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_selesai` date DEFAULT NULL,
  `bidang_minat` varchar(255) DEFAULT NULL,
  `rencana_magang` text,
  `status` varchar(255) DEFAULT NULL,
  `surat_final` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `surat_plot_FK` (`user_id`),
  CONSTRAINT `surat_plot_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_plot`
--

LOCK TABLES `surat_plot` WRITE;
/*!40000 ALTER TABLE `surat_plot` DISABLE KEYS */;
INSERT INTO `surat_plot` VALUES (1,2,'M Adif Fikri','1910631170101','adiffikri7@gmail.com','1687170704_35fb99570dea2eb049ac.png','1687170705_28ec7f43eb7abd93efc6.png','nama perusahaan','alamat oerysagaab','Ujang','012982712737','-6.323471','107.306301','2023-06-26','2023-08-31','Software Engineering','rencana','APPROVED',NULL,'2023-06-19 17:31:45','2023-06-22 09:33:21'),(2,2,'Nama Lengkap','1910631170101','adiffikri7@gmail.com','1687406548_98e15088b8b7dd41a335.pdf','1687406548_d8a3ca31845e82e09d43.pdf','Lala Corp','Alamat Lala Corp','Pak Lala','012982712737','-6.323471','107.306301','2023-06-26','2023-08-28','Software Engineering','Rencana nya gini','DONE','1687521448_bc6e557966c61014731d.pdf','2023-06-22 11:02:28','2023-06-23 18:57:28'),(3,2,'Tes Decline','1910631170101','adiffikri7@gmail.com','1687519534_d8315d744d7118cb9adf.docx','1687519534_c1bb3fb752363afb4ce9.pdf','Lala Corp','alamat corp','Baba','012982712737','-6.323471','107.306301','2023-06-26','2023-07-24','Data Science','rencana','APPROVED',NULL,'2023-06-23 18:25:34','2023-06-23 19:18:59'),(4,2,'tes cancel','1910631170101','adiffikri7@gmail.com','1687523666_3996bf37b39ec63bf1da.pdf','1687523666_7cb36f1ff678f90d71ff.pdf','Lala Corp','alamat la corp','sasa','012982712737','-6.323471','107.306301','2023-07-03','2023-07-17','Computer Network','rencana bla bbla bbla','CANCELED',NULL,'2023-06-23 19:34:26','2023-06-23 19:39:08'),(5,2,'M Adif Fikri','1910631170101','adiffikri7@gmail.com','1689237625_3d0909b75484ac83f73b.pdf','1689237625_170810f6a7e36f6d1566.pdf','Lala Corp','aldmawdy','Ujang','012982712737','-6.323471','107.306301','2023-07-23','2023-08-06','Software Engineering','dalkwdjoaiwjd','APPROVED',NULL,'2023-07-13 15:40:25','2023-07-13 16:11:11');
/*!40000 ALTER TABLE `surat_plot` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `status_message` varchar(255) DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `last_active` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adif19101',NULL,NULL,1,'2023-04-05 04:46:35','2023-03-31 04:14:05','2023-03-31 04:14:05',NULL),(2,'adif7',NULL,NULL,1,'2023-08-02 09:41:45','2023-04-05 02:51:22','2023-07-31 09:13:16',NULL),(5,'admin',NULL,NULL,0,'2023-08-03 14:17:46','2023-06-21 02:34:02','2023-07-31 09:09:07',NULL),(6,'verifikator',NULL,NULL,0,'2023-08-02 09:34:27','2023-06-22 01:31:48','2023-06-22 01:31:48',NULL),(7,'mahasiswa1',NULL,NULL,0,'2023-08-03 13:52:37','2023-06-29 11:52:17','2023-06-29 11:52:17',NULL),(8,'admin1',NULL,NULL,0,'2023-08-03 13:54:04','2023-06-29 19:01:33','2023-06-29 19:01:33',NULL),(9,'verif1',NULL,NULL,0,'2023-07-27 21:42:50','2023-06-29 19:02:40','2023-06-29 19:02:40',NULL),(10,'ptsatu',NULL,NULL,0,NULL,'2023-06-29 19:05:19','2023-06-29 19:05:19',NULL),(11,'ptdua',NULL,NULL,0,NULL,'2023-06-29 19:06:54','2023-06-29 19:06:54',NULL),(12,'pttiga',NULL,NULL,0,'2023-07-28 10:38:56','2023-06-29 19:10:25','2023-06-29 19:10:25',NULL),(13,'lacorp',NULL,NULL,0,NULL,'2023-07-03 13:36:08','2023-07-03 13:36:08',NULL),(14,'perusahaan',NULL,NULL,0,'2023-08-01 20:51:42','2023-07-04 07:58:06','2023-07-04 07:58:06',NULL),(15,'registperusahaan',NULL,NULL,1,'2023-07-25 10:19:00','2023-07-25 10:07:16','2023-07-25 10:07:16',NULL),(16,'regist',NULL,NULL,1,'2023-07-25 10:20:13','2023-07-25 10:19:41','2023-07-25 10:19:41',NULL),(19,'verifikator1',NULL,NULL,0,NULL,'2023-08-02 09:38:36','2023-08-02 09:38:36',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'app_magang_dev'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-03 14:27:45
