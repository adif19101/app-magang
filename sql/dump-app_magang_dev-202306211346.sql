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
  `account_id` int(11) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin',NULL,5,'09876535214','2023-06-21 10:45:56','2023-06-21 10:46:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (2,1,'superadmin','2023-04-01 06:07:41'),(3,2,'user','2023-04-05 02:51:22'),(6,5,'admin','2023-06-21 03:29:05');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_identities`
--

LOCK TABLES `auth_identities` WRITE;
/*!40000 ALTER TABLE `auth_identities` DISABLE KEYS */;
INSERT INTO `auth_identities` VALUES (1,1,'email_password',NULL,'muhammad.adif19101@student.unsika.ac.id','$2y$10$DiyG0j7g4z7dTL6s3X7QIeWcQHWeRFh2.PJuQNihwSTP/xM.Z2CP.',NULL,NULL,0,'2023-04-05 04:46:35','2023-03-31 04:14:05','2023-04-05 04:46:35'),(2,2,'email_password',NULL,'adiffikri7@gmail.com','$2y$10$UzwkAgs7Nfo8dn3NRcembedp3LhGeKpYIOdpdGqbcSDy7LdGotnma',NULL,NULL,0,'2023-06-13 14:11:16','2023-04-05 02:51:22','2023-06-13 14:11:16'),(5,5,'email_password',NULL,'admin@mail.com','$2y$10$WUoxBHPx1EM32Pdi6HzzmeNLc9acK8FS5bbgo/QXhd5uiyrr7fiQm',NULL,NULL,0,'2023-06-21 06:25:22','2023-06-21 02:34:02','2023-06-21 06:25:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',NULL,'2023-03-31 03:30:14',0),(2,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','magic-link','1123d6b5aa6e562fe2ad',1,'2023-03-31 04:22:54',1),(3,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-03-31 04:41:32',1),(4,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-03-31 04:52:55',1),(5,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-04-01 06:04:20',1),(6,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 02:53:47',1),(7,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 03:53:50',1),(8,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 04:20:53',1),(9,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 04:33:13',1),(10,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-04-05 04:46:35',1),(11,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-07 02:59:18',1),(12,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-09 05:34:26',1),(13,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-12 12:21:47',1),(14,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-13 04:22:48',1),(15,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-13 04:23:04',1),(16,'192.168.1.112','Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',NULL,'2023-05-10 11:25:07',0),(17,'192.168.1.112','Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36','email_password','adiffikri7@gmail.com',NULL,'2023-05-10 11:26:04',0),(18,'192.168.1.112','Mozilla/5.0 (Linux; Android 11; RMX1971) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Mobile Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-05-10 11:27:06',1),(19,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-05-22 08:53:48',1),(20,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/113.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-05-23 03:14:53',1),(21,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:16:14',1),(22,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',NULL,'2023-06-10 14:17:58',0),(23,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:18:06',1),(24,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:18:39',1),(25,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-10 14:23:05',1),(26,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-12 13:02:44',1),(27,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','1adiffikri7@gmail.com',2,'2023-06-12 13:31:30',1),(28,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-12 13:31:51',1),(29,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-13 14:11:04',1),(30,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-06-13 14:11:16',1),(31,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-06-21 03:39:07',1),(32,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/114.0.0.0 Safari/537.36','email_password','admin@mail.com',5,'2023-06-21 06:25:22',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_remember_tokens`
--

LOCK TABLES `auth_remember_tokens` WRITE;
/*!40000 ALTER TABLE `auth_remember_tokens` DISABLE KEYS */;
INSERT INTO `auth_remember_tokens` VALUES (8,'afc8a858bb7b9d3deb4050f4','c4a9f60f1f3810df66ba4585923ee5a30d92c3b0d681c008039b5e423d59175f',2,'2023-07-21 05:56:16','2023-06-13 14:11:16','2023-06-21 05:56:16'),(9,'a98e88846d4dc9d87c9ed09e','1ce69e334dc8cdc9119fa5c4c7ebff6df12b2ec649b6a7cd3128e8f2c35c9030',5,'2023-07-21 03:39:07','2023-06-21 03:39:07','2023-06-21 03:39:07'),(10,'d056e312197f5f30d221e50e','a2d9643512a9c573324de4ac7d09bef8a818a3fcd9cb16f5874234b1906024a7',5,'2023-07-21 06:25:22','2023-06-21 06:25:22','2023-06-21 06:25:22');
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lowongan_FK` (`user_id`),
  CONSTRAINT `lowongan_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan`
--

LOCK TABLES `lowongan` WRITE;
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
INSERT INTO `lowongan` VALUES (7,2,1,'Web Developer','<p>web developer sistem X dengan tanggung jawab :</p><ol><li>ASD</li><li>FGH</li><li>JKL</li></ol>','WFO','6 bulan','Paid','2023-04-28','<p>Mahir dalam:</p><ul><li>PHP</li><li>Codeigniter</li><li>MySQL</li><li>JS</li></ul><p>Nilai tambah :</p><ul><li>Bisa edit video</li><li>Bisa benerin AC</li></ul>','<p>Langsung Datang ke kantor dengan membawa:</p><ol><li>CV</li><li>Fotocopy KTP</li><li>Surat Rekomendasi</li></ol>','','2023-04-14 21:59:59','2023-05-21 21:05:18'),(22,2,1,'Marketing Intern','<p>Dibutuhkan seorang Marketing Intern untuk membantu mempromosikan produk dan layanan kami dengan spesifikasi sebagai berikut:</p><ol><li>Membuat konten pemasaran</li><li>Menyusun dan melaksanakan rencana pemasaran</li><li>Melakukan riset pasar</li></ol>','WFO','3 bulan','Unpaid','2023-05-31','<p>Persyaratan:</p><ul><li>Kreatif dan inovatif dalam membuat konten pemasaran</li><li>Mampu berkomunikasi dengan baik</li><li>Paham tentang teknik pemasaran digital</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptabcd.com</li><li>Tuliskan subjek email dengan format: [Nama] - Marketing Intern</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pemasaran produk dan layanan teknologi</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:05:18'),(23,2,2,'UI/UX Designer','<p>Butuh seorang UI/UX Designer untuk membantu mendesain tampilan website kami dengan spesifikasi sebagai berikut:</p><ol><li>Mendesain tampilan website</li><li>Mengembangkan prototype website</li><li>Mengoptimalkan user experience</li></ol>','WFO','3 bulan','Unpaid','2023-07-01','<p>Persyaratan:</p><ul><li>Menguasai software desain seperti Figma, Sketch, atau Adobe XD</li><li>Mampu bekerja dalam tim</li><li>Paham tentang user experience design</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan portfolio dan surat lamaran ke email recruitment@pthijk.com</li><li>Tuliskan subjek email dengan format: [Nama] - UI/UX Designer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang desain website dan user experience</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:36:13'),(24,2,3,'Front-end Developer','<p>Front-end Developer dibutuhkan untuk membantu mengembangkan website kami dengan spesifikasi sebagai berikut:</p><ol><li>Mengembangkan website</li><li>Mengoptimalkan performa website</li><li>Menggunakan framework ReactJS</li></ol>','Remote','6 bulan','Paid','2023-08-01','<p>Persyaratan:</p><ul><li>Menguasai HTML, CSS, dan JavaScript</li><li>Mampu menggunakan framework ReactJS</li><li>Paham tentang konsep responsive design</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptlmno.com</li><li>Tuliskan subjek email dengan format: [Nama] - Front-end Developer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pengembangan website</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:36:13'),(25,2,4,'Android Developer','<p>Dibutuhkan seorang Android Developer untuk membantu mengembangkan aplikasi kami dengan spesifikasi sebagai berikut:</p><ol><li>Mengembangkan aplikasi Android</li><li>Mengoptimalkan performa aplikasi</li><li>Menggunakan bahasa pemrograman Kotlin</li></ol>','WFO','3 bulan','Paid','2023-05-31','<p>Persyaratan:</p><ul><li>Menguasai bahasa pemrograman Kotlin</li><li>Mampu mengembangkan aplikasi Android</li><li>Paham tentang konsep arsitektur aplikasi Android</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan portfolio ke email recruitment@ptpqrs.com</li><li>Tuliskan subjek email dengan format: [Nama] - Android Developer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pengembangan aplikasi Android</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:36:13'),(26,2,5,'Data Analyst','<p>PT STUV membutuhkan seorang Data Analyst untuk membantu melakukan analisis data dengan spesifikasi sebagai berikut:</p><ol><li>Menganalisis data pelanggan</li><li>Mengidentifikasi tren dan pola dalam data</li><li>Membuat laporan hasil analisis</li></ol>','Remote','6 bulan','Unpaid','2023-06-30','<p>Persyaratan:</p><ul><li>Menguasai Microsoft Excel</li><li>Mampu menggunakan bahasa pemrograman Python</li><li>Paham tentang konsep analisis data</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptstuv.com</li><li>Tuliskan subjek email dengan format: [Nama] - Data Analyst</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang analisis data</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:36:13'),(27,2,6,'Graphic Designer','<p>PT UVWX sedang mencari seorang Graphic Designer untuk membantu membuat desain grafis dengan spesifikasi sebagai berikut:</p><ol><li>Mendesain brosur, poster, dan banner</li><li>Mengembangkan konsep visual untuk media sosial</li><li>Menggunakan software desain seperti Adobe Photoshop dan Illustrator</li></ol>','WFO','3 bulan','Paid','2023-07-31','<p>Persyaratan:</p><ul><li>Menguasai software desain seperti Adobe Photoshop dan Illustrator</li><li>Mampu membuat desain grafis yang menarik dan kreatif</li><li>Paham tentang konsep desain visual</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan portfolio ke email recruitment@ptuvwx.com</li><li>Tuliskan subjek email dengan format: [Nama] - Graphic Designer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang desain grafis</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:36:13'),(28,2,7,'Content Writer','<p>PT WXYZ membutuhkan seorang Content Writer untuk membantu menulis artikel dan konten digital dengan spesifikasi sebagai berikut:</p><ol><li>Menulis artikel SEO-friendly</li><li>Membuat konten digital yang menarik</li><li>Menggunakan bahasa Indonesia yang baik dan benar</li></ol>','Remote','6 bulan','Unpaid','2023-08-31','<p>Persyaratan:</p><ul><li>Menguasai bahasa Indonesia yang baik dan benar</li><li>Mampu menulis artikel SEO-friendly</li><li>Paham tentang konsep content marketing</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan contoh tulisan ke email recruitment@ptwxyz.com</li><li>Tuliskan subjek email dengan format: [Nama] - Content Writer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang content writing</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-05-21 21:36:13'),(29,2,8,'Marketing Intern','<p>Membantu divisi marketing dalam mempromosikan produk baru</p>','WFO','3 bulan','Unpaid','2023-05-12','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Marketing atau bidang terkait</li><li>Berpengalaman dalam marketing digital</li></ul>','<p>Kirimkan CV dan portofolio ke email marketing@ptabc.com</p>','','2023-04-14 23:29:41','2023-05-21 21:36:13'),(30,2,9,'Social Media Specialist','<p>Menangani akun media sosial perusahaan</p>','WFH','4 bulan','Paid','2023-05-20','<p>Kualifikasi:</p><ul><li>Berpengalaman dalam manajemen media sosial</li><li>Memiliki kreativitas dalam menghasilkan konten</li></ul>','<p>Kirimkan CV dan portfolio ke email hrd@ptdef.com</p>','','2023-04-14 23:29:41','2023-05-21 21:36:13'),(31,2,2,'Event Organizer Intern','<p>Menyiapkan acara untuk peluncuran produk baru</p>','WFO','2 bulan','Unpaid','2023-05-25','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Event Organizer atau bidang terkait</li><li>Berpengalaman dalam mengatur acara</li></ul>','<p>Kirimkan CV dan portofolio ke email eventorganizer@ptghi.com</p>','','2023-04-14 23:29:41','2023-05-21 21:36:13'),(32,2,4,'Content Writer Intern','<p>Membuat artikel dan konten yang berkualitas untuk website perusahaan</p>','WFH','6 bulan','Paid','2023-06-02','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Sastra atau bidang terkait</li><li>Berpengalaman dalam menulis artikel</li></ul>','<p>Kirimkan CV dan contoh tulisan ke email contentwriter@ptjkl.com</p>','','2023-04-14 23:29:41','2023-05-21 21:36:13'),(33,2,5,'UI/UX Designer Intern','<p>Merancang tampilan dan pengalaman pengguna aplikasi perusahaan</p>','WFH','3 bulan','Paid','2023-06-10','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Desain Grafis atau bidang terkait</li><li>Berpengalaman dalam merancang tampilan aplikasi</li></ul>','<p>Kirimkan CV dan portfolio ke email uidesigner@ptmno.com</p>','','2023-04-14 23:29:41','2023-05-21 21:36:13'),(36,2,6,'Web Developer','<p>jadi dev</p>','WFO','6 bulan','Paid','2023-04-20','<p>syarat</p>','<p>langsung</p>','','2023-04-15 23:56:59','2023-05-21 21:36:13'),(37,2,1,'ini judul testing','<p>ini desk testing</p>','WFH','6 bulan','Unpaid','2023-05-28','<p>noo</p>','<p>yess</p>','','2023-05-21 21:29:01','2023-05-21 21:29:01'),(38,2,10,'loqongan judul','<p>low desk</p>','WFH','5 bulan','Paid','2023-05-24','<p>baik</p>','<p>gass</p>','','2023-05-21 22:02:02','2023-05-21 22:02:02'),(39,2,11,'tes jenis usaha','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','WFH','6 bulan','Paid','2023-06-23','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.</span><br></p>','2023-06-14 18:01:21','2023-06-14 18:01:21');
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
) ENGINE=InnoDB AUTO_INCREMENT=65 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_skill`
--

LOCK TABLES `lowongan_skill` WRITE;
/*!40000 ALTER TABLE `lowongan_skill` DISABLE KEYS */;
INSERT INTO `lowongan_skill` VALUES (56,36,11,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(57,36,40,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(58,36,39,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(59,36,3,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(60,36,9,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(61,37,11,'2023-05-21 21:29:01','2023-05-21 21:29:01'),(62,37,3,'2023-05-21 21:29:01','2023-05-21 21:29:01'),(63,38,11,'2023-05-21 22:02:02','2023-05-21 22:02:02'),(64,39,11,'2023-06-14 18:01:21','2023-06-14 18:01:21');
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
  `account_id` int(11) DEFAULT NULL,
  `alamat` text,
  `whatsapp` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mahasiswa`
--

LOCK TABLES `mahasiswa` WRITE;
/*!40000 ALTER TABLE `mahasiswa` DISABLE KEYS */;
INSERT INTO `mahasiswa` VALUES (3,'M Adif Fikri','','1910631170101','1686576604_e110077b81debc651d35.png',2,'Jl. Raya Candi No. 6, Sidoarjo','081234567890','2023-05-23 10:23:01','2023-06-12 20:32:11'),(4,'M Adif Fikriaa','','1910631170101','1686541359_15279a7bb9e6f8faac51.png',NULL,'Jl. Raya Candi No. 6, Sidoarjocc',NULL,'2023-06-12 10:42:39','2023-06-12 10:42:39'),(5,'M Adif Fikriaa','','1910631170101','1686541417_c4461441d39687f9e0ed.png',NULL,'Jl. Raya Candi No. 6, Sidoarjobb',NULL,'2023-06-12 10:43:37','2023-06-12 10:43:37');
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
  `logo` varchar(255) DEFAULT NULL,
  `account_id` int(10) unsigned DEFAULT NULL COMMENT 'id user akun perusahaan',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan`
--

LOCK TABLES `perusahaan` WRITE;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
INSERT INTO `perusahaan` VALUES (1,'PT. ABCD','Jalan satu dua tiga blok 27 RT.1 RW.2 Cakung, Jakarta Timur',NULL,'abcd@mail.com','09812345678',NULL,NULL,'2023-04-26 23:34:35','2023-04-26 23:34:35'),(2,'PT Mega Jaya','Jalan Utama No. 123, Kota Baru','Perusahaan terkemuka dalam penyediaan solusi inovatif.','kontak@ptmegajaya.com','+62 123-456-7890',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(3,'CV Sentosa Abadi','Jalan Raya No. 456, Kota Indah','Spesialis dalam manufaktur dan distribusi global.','info@sentosaabadi.com','+62 987-654-3210',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(4,'PT Teknologi Terkini','Jalan Oak No. 789, Kota Tekno','Memberikan solusi teknologi terkini.','halo@teknologiterkini.com','+62 456-789-0123',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(5,'PT Maju Bersama','Jalan Raya No. 789, Kota Maju','Perusahaan yang bergerak dalam bidang konstruksi dan pengembangan infrastruktur.','info@majubersama.com','+62 987-654-3210',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(6,'CV Berkah Sejahtera','Jalan Merdeka No. 456, Kota Bahagia','Penyedia layanan konsultasi keuangan dan perencanaan investasi.','contact@berkahsejahtera.com','+62 123-456-7890',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(7,'PT Abadi Makmur','Jalan Jaya No. 789, Kota Makmur','Produsen terkemuka dalam industri makanan dan minuman.','info@abadimakmur.com','+62 456-789-0123',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(8,'CV Harmoni Jaya','Jalan Indah No. 123, Kota Harmoni','Perusahaan distribusi produk kecantikan dan perawatan personal.','hello@harmonijaya.com','+62 123-456-7890',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(9,'PT Teknik Nusantara','Jalan Nusantara No. 456, Kota Teknologi','Perusahaan teknik yang menyediakan solusi inovatif untuk sektor energi.','info@tekniknusantara.com','+62 987-654-3210',NULL,NULL,'2023-05-21 21:35:26','2023-05-21 21:35:26'),(10,'Lala Corp','jalan lalala lili lulu lele','ini xsdz','lacorp@corpmail.com','0839237472348',NULL,NULL,'2023-05-21 22:02:02','2023-05-21 22:02:02'),(11,'usaha corpp','jalan usaja corp no 11 jakara','Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales ante. Sed lacinia, dui id volutpat venenatis, lectus dui feugiat quam, dictum tempor justo risus eget tortor. Suspendisse auctor, tellus et sagittis sagittis, mauris sem dignissim risus, tempor pulvinar diam mi nec turpis.','usahacorp@mail.com','0819283291312',NULL,NULL,'2023-06-14 18:01:21','2023-06-14 18:01:21');
/*!40000 ALTER TABLE `perusahaan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `perusahaan_review`
--

DROP TABLE IF EXISTS `perusahaan_review`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `perusahaan_review` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `perusahaan_id` int(11) unsigned NOT NULL,
  `penilaian` varchar(255) NOT NULL,
  `ulasan` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `perusahaan_review_FK` (`user_id`),
  KEY `perusahaan_review_FK_1` (`perusahaan_id`),
  CONSTRAINT `perusahaan_review_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  CONSTRAINT `perusahaan_review_FK_1` FOREIGN KEY (`perusahaan_id`) REFERENCES `perusahaan` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan_review`
--

LOCK TABLES `perusahaan_review` WRITE;
/*!40000 ALTER TABLE `perusahaan_review` DISABLE KEYS */;
/*!40000 ALTER TABLE `perusahaan_review` ENABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `skill`
--

LOCK TABLES `skill` WRITE;
/*!40000 ALTER TABLE `skill` DISABLE KEYS */;
INSERT INTO `skill` VALUES (1,'Java','2023-04-15 22:02:16','2023-04-15 22:02:16'),(2,'Python','2023-04-15 22:02:16','2023-04-15 22:02:16'),(3,'JavaScript','2023-04-15 22:02:16','2023-04-15 22:02:16'),(4,'C++','2023-04-15 22:02:16','2023-04-15 22:02:16'),(5,'Ruby','2023-04-15 22:02:16','2023-04-15 22:02:16'),(6,'SQL','2023-04-15 22:02:16','2023-04-15 22:02:16'),(7,'Git','2023-04-15 22:02:16','2023-04-15 22:02:16'),(8,'Linux','2023-04-15 22:02:16','2023-04-15 22:02:16'),(9,'HTML','2023-04-15 22:02:16','2023-04-15 22:02:16'),(10,'CSS','2023-04-15 22:02:16','2023-04-15 22:02:16'),(11,'PHP','2023-04-15 22:02:16','2023-04-15 22:02:16'),(12,'Node.js','2023-04-15 22:02:16','2023-04-15 22:02:16'),(13,'React','2023-04-15 22:02:16','2023-04-15 22:02:16'),(14,'Vue.js','2023-04-15 22:02:16','2023-04-15 22:02:16'),(15,'Bootstrap','2023-04-15 22:02:16','2023-04-15 22:02:16'),(16,'jQuery','2023-04-15 22:02:16','2023-04-15 22:02:16'),(17,'Data Structures','2023-04-15 22:02:16','2023-04-15 22:02:16'),(18,'Algorithms','2023-04-15 22:02:16','2023-04-15 22:02:16'),(19,'Database Design','2023-04-15 22:02:16','2023-04-15 22:02:16'),(20,'Networking','2023-04-15 22:02:16','2023-04-15 22:02:16'),(21,'Cybersecurity','2023-04-15 22:02:16','2023-04-15 22:02:16'),(22,'Artificial Intelligence','2023-04-15 22:02:16','2023-04-15 22:02:16'),(23,'Machine Learning','2023-04-15 22:02:16','2023-04-15 22:02:16'),(24,'Big Data','2023-04-15 22:02:16','2023-04-15 22:02:16'),(25,'Data Analytics','2023-04-15 22:02:16','2023-04-15 22:02:16'),(26,'Cloud Computing','2023-04-15 22:02:16','2023-04-15 22:02:16'),(27,'Adobe Illustrator','2023-04-15 22:02:28','2023-04-15 22:02:28'),(28,'Adobe Photoshop','2023-04-15 22:02:28','2023-04-15 22:02:28'),(29,'InDesign','2023-04-15 22:02:28','2023-04-15 22:02:28'),(30,'Graphic Design','2023-04-15 22:02:28','2023-04-15 22:02:28'),(31,'Web Design','2023-04-15 22:02:28','2023-04-15 22:02:28'),(32,'UX/UI Design','2023-04-15 22:02:28','2023-04-15 22:02:28'),(33,'Copywriting','2023-04-15 22:02:28','2023-04-15 22:02:28'),(34,'Content Marketing','2023-04-15 22:02:28','2023-04-15 22:02:28'),(35,'Social Media Marketing','2023-04-15 22:02:28','2023-04-15 22:02:28'),(36,'Email Marketing','2023-04-15 22:02:28','2023-04-15 22:02:28'),(39,'MySql','2023-04-15 23:21:34','2023-04-15 23:21:34'),(40,'codeigniter','2023-04-15 23:26:31','2023-04-15 23:26:31');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat`
--

LOCK TABLES `surat` WRITE;
/*!40000 ALTER TABLE `surat` DISABLE KEYS */;
INSERT INTO `surat` VALUES (1,11,2,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','093888723472','<p>jalan bla bla bla cakung jakarta timur</p>','Penerima','CANCELED',NULL,'2023-06-14 20:52:36','2023-06-17 22:01:52'),(2,11,2,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">orem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales an</span><br></p>','HR CV Sentosa','CANCELED',NULL,'2023-06-14 20:56:41','2023-06-17 22:00:51'),(3,11,1,'M Adif Fikri','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','083192381923','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">orem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales an</span><br></p>','HR CV Sentosa','PENDING',NULL,'2023-06-14 20:56:41','2023-06-17 22:13:27'),(4,11,2,'UDIN','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','074392482347','<p>jalan bla bla bla cakung jakarta timur</p>','Penerima','PENDING',NULL,'2023-06-14 20:52:36','2023-06-17 22:13:27'),(5,11,2,'Adif','Jakarta, 1 Oktober 2001','1910631170101','adiffikri7@gmail.com','Islam','034728328734','<p><span style=\"font-family: &quot;Open Sans&quot;, Arial, sans-serif; text-align: justify;\">orem ipsum dolor sit amet, consectetur adipiscing elit. Nam id sodales an</span><br></p>','HR CV Sentosa','CANCELED',NULL,'2023-06-14 20:56:41','2023-06-17 22:02:25');
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `surat_plot`
--

LOCK TABLES `surat_plot` WRITE;
/*!40000 ALTER TABLE `surat_plot` DISABLE KEYS */;
INSERT INTO `surat_plot` VALUES (1,2,'M Adif Fikri','1910631170101','adiffikri7@gmail.com','1687170704_35fb99570dea2eb049ac.png','1687170705_28ec7f43eb7abd93efc6.png','nama perusahaan','alamat oerysagaab','Ujang','012982712737','-6.323471','107.306301','2023-06-26','2023-08-31','Software Engineering','rencana','CANCELED',NULL,'2023-06-19 17:31:45','2023-06-19 17:50:39');
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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adif19101',NULL,NULL,1,'2023-04-05 04:46:35','2023-03-31 04:14:05','2023-03-31 04:14:05',NULL),(2,'adif7',NULL,NULL,1,'2023-06-21 06:03:51','2023-04-05 02:51:22','2023-06-12 13:31:18',NULL),(5,'admin',NULL,NULL,0,'2023-06-21 06:42:53','2023-06-21 02:34:02','2023-06-21 02:34:02',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_detail`
--

DROP TABLE IF EXISTS `users_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users_detail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_user` int(10) unsigned NOT NULL,
  `account_type` varchar(100) NOT NULL COMMENT 'tipe akun mhs/admin/comp',
  `id_type` int(10) unsigned DEFAULT NULL COMMENT 'id menurut tipe akun',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_detail`
--

LOCK TABLES `users_detail` WRITE;
/*!40000 ALTER TABLE `users_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `users_detail` ENABLE KEYS */;
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

-- Dump completed on 2023-06-21 13:46:37
