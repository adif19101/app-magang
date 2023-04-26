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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_groups_users`
--

LOCK TABLES `auth_groups_users` WRITE;
/*!40000 ALTER TABLE `auth_groups_users` DISABLE KEYS */;
INSERT INTO `auth_groups_users` VALUES (2,1,'superadmin','2023-04-01 06:07:41'),(3,2,'user','2023-04-05 02:51:22');
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_identities`
--

LOCK TABLES `auth_identities` WRITE;
/*!40000 ALTER TABLE `auth_identities` DISABLE KEYS */;
INSERT INTO `auth_identities` VALUES (1,1,'email_password',NULL,'muhammad.adif19101@student.unsika.ac.id','$2y$10$DiyG0j7g4z7dTL6s3X7QIeWcQHWeRFh2.PJuQNihwSTP/xM.Z2CP.',NULL,NULL,0,'2023-04-05 04:46:35','2023-03-31 04:14:05','2023-04-05 04:46:35'),(2,2,'email_password',NULL,'adiffikri7@gmail.com','$2y$10$izNU1MUVEEHrTPEzdjXMROSpnKhYjGJoBgtZbbixdaDFyAx/TyusG',NULL,NULL,0,'2023-04-13 04:23:04','2023-04-05 02:51:22','2023-04-13 04:23:04');
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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_logins`
--

LOCK TABLES `auth_logins` WRITE;
/*!40000 ALTER TABLE `auth_logins` DISABLE KEYS */;
INSERT INTO `auth_logins` VALUES (1,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',NULL,'2023-03-31 03:30:14',0),(2,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','magic-link','1123d6b5aa6e562fe2ad',1,'2023-03-31 04:22:54',1),(3,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-03-31 04:41:32',1),(4,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-03-31 04:52:55',1),(5,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-04-01 06:04:20',1),(6,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 02:53:47',1),(7,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 03:53:50',1),(8,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 04:20:53',1),(9,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-05 04:33:13',1),(10,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/111.0.0.0 Safari/537.36','email_password','muhammad.adif19101@student.unsika.ac.id',1,'2023-04-05 04:46:35',1),(11,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-07 02:59:18',1),(12,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-09 05:34:26',1),(13,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-12 12:21:47',1),(14,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-13 04:22:48',1),(15,'::1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/112.0.0.0 Safari/537.36','email_password','adiffikri7@gmail.com',2,'2023-04-13 04:23:04',1);
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auth_remember_tokens`
--

LOCK TABLES `auth_remember_tokens` WRITE;
/*!40000 ALTER TABLE `auth_remember_tokens` DISABLE KEYS */;
INSERT INTO `auth_remember_tokens` VALUES (1,'aa59d43bdf6da371c6f3ad50','4b477b8deb56c2663729cca8f03f2a571aeb92277aae53f35e6338bb4942ff13',2,'2023-05-26 02:40:46','2023-04-13 04:23:04','2023-04-26 02:40:46');
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
  `judul` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `nama_perusahaan` varchar(255) DEFAULT NULL,
  `alamat_perusahaan` varchar(255) DEFAULT NULL,
  `tipe_pekerjaan` varchar(255) DEFAULT NULL,
  `lama_kontrak` varchar(255) DEFAULT NULL,
  `jenis_kontrak` varchar(255) DEFAULT NULL,
  `deadline_daftar` date DEFAULT NULL,
  `kontak_perusahaan` varchar(255) DEFAULT NULL,
  `kriteria` text,
  `cara_daftar` text,
  `info_tambahan` text,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `lowongan_FK` (`user_id`),
  CONSTRAINT `lowongan_FK` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan`
--

LOCK TABLES `lowongan` WRITE;
/*!40000 ALTER TABLE `lowongan` DISABLE KEYS */;
INSERT INTO `lowongan` VALUES (7,2,'Web Developer','<p>web developer sistem X dengan tanggung jawab :</p><ol><li>ASD</li><li>FGH</li><li>JKL</li></ol>','PT XYZ','jalan XYZ','WFO','6 bulan','Paid','2023-04-28','089348293','<p>Mahir dalam:</p><ul><li>PHP</li><li>Codeigniter</li><li>MySQL</li><li>JS</li></ul><p>Nilai tambah :</p><ul><li>Bisa edit video</li><li>Bisa benerin AC</li></ul>','<p>Langsung Datang ke kantor dengan membawa:</p><ol><li>CV</li><li>Fotocopy KTP</li><li>Surat Rekomendasi</li></ol>','','2023-04-14 21:59:59','2023-04-14 21:59:59'),(21,2,'Web Developer','<p>web developer sistem X dengan tanggung jawab :</p><ol><li>ASD</li><li>FGH</li><li>JKL</li></ol>','PT XYZ','jalan XYZ','WFO','6 bulan','Paid','2023-04-28','089348293','<p>Mahir dalam:</p><ul><li>PHP</li><li>Codeigniter</li><li>MySQL</li><li>JS</li></ul><p>Nilai tambah :</p><ul><li>Bisa edit video</li><li>Bisa benerin AC</li></ul>','<p>Langsung Datang ke kantor dengan membawa:</p><ol><li>CV</li><li>Fotocopy KTP</li><li>Surat Rekomendasi</li></ol>','','2023-04-14 23:29:41','2023-04-14 23:29:41'),(22,2,'Marketing Intern','<p>Dibutuhkan seorang Marketing Intern untuk membantu mempromosikan produk dan layanan kami dengan spesifikasi sebagai berikut:</p><ol><li>Membuat konten pemasaran</li><li>Menyusun dan melaksanakan rencana pemasaran</li><li>Melakukan riset pasar</li></ol>','PT ABCD','Jalan Gatot Subroto no. 456','WFO','3 bulan','Unpaid','2023-05-31','08123456789','<p>Persyaratan:</p><ul><li>Kreatif dan inovatif dalam membuat konten pemasaran</li><li>Mampu berkomunikasi dengan baik</li><li>Paham tentang teknik pemasaran digital</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptabcd.com</li><li>Tuliskan subjek email dengan format: [Nama] - Marketing Intern</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pemasaran produk dan layanan teknologi</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(23,2,'UI/UX Designer','<p>Butuh seorang UI/UX Designer untuk membantu mendesain tampilan website kami dengan spesifikasi sebagai berikut:</p><ol><li>Mendesain tampilan website</li><li>Mengembangkan prototype website</li><li>Mengoptimalkan user experience</li></ol>','PT HIJK','Jalan Merdeka no. 10','WFO','3 bulan','Unpaid','2023-07-01','08765432109','<p>Persyaratan:</p><ul><li>Menguasai software desain seperti Figma, Sketch, atau Adobe XD</li><li>Mampu bekerja dalam tim</li><li>Paham tentang user experience design</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan portfolio dan surat lamaran ke email recruitment@pthijk.com</li><li>Tuliskan subjek email dengan format: [Nama] - UI/UX Designer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang desain website dan user experience</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(24,2,'Front-end Developer','<p>Front-end Developer dibutuhkan untuk membantu mengembangkan website kami dengan spesifikasi sebagai berikut:</p><ol><li>Mengembangkan website</li><li>Mengoptimalkan performa website</li><li>Menggunakan framework ReactJS</li></ol>','PT LMNO','Jalan Sudirman no. 123','Remote','6 bulan','Paid','2023-08-01','08234567891','<p>Persyaratan:</p><ul><li>Menguasai HTML, CSS, dan JavaScript</li><li>Mampu menggunakan framework ReactJS</li><li>Paham tentang konsep responsive design</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptlmno.com</li><li>Tuliskan subjek email dengan format: [Nama] - Front-end Developer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pengembangan website</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(25,2,'Android Developer','<p>Dibutuhkan seorang Android Developer untuk membantu mengembangkan aplikasi kami dengan spesifikasi sebagai berikut:</p><ol><li>Mengembangkan aplikasi Android</li><li>Mengoptimalkan performa aplikasi</li><li>Menggunakan bahasa pemrograman Kotlin</li></ol>','PT PQRS','Jalan Thamrin no. 789','WFO','3 bulan','Paid','2023-05-31','08123456789','<p>Persyaratan:</p><ul><li>Menguasai bahasa pemrograman Kotlin</li><li>Mampu mengembangkan aplikasi Android</li><li>Paham tentang konsep arsitektur aplikasi Android</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan portfolio ke email recruitment@ptpqrs.com</li><li>Tuliskan subjek email dengan format: [Nama] - Android Developer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang pengembangan aplikasi Android</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(26,2,'Data Analyst','<p>PT STUV membutuhkan seorang Data Analyst untuk membantu melakukan analisis data dengan spesifikasi sebagai berikut:</p><ol><li>Menganalisis data pelanggan</li><li>Mengidentifikasi tren dan pola dalam data</li><li>Membuat laporan hasil analisis</li></ol>','PT STUV','Jalan Sudirman no. 456','Remote','6 bulan','Unpaid','2023-06-30','08567890123','<p>Persyaratan:</p><ul><li>Menguasai Microsoft Excel</li><li>Mampu menggunakan bahasa pemrograman Python</li><li>Paham tentang konsep analisis data</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan surat lamaran ke email recruitment@ptstuv.com</li><li>Tuliskan subjek email dengan format: [Nama] - Data Analyst</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang analisis data</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(27,2,'Graphic Designer','<p>PT UVWX sedang mencari seorang Graphic Designer untuk membantu membuat desain grafis dengan spesifikasi sebagai berikut:</p><ol><li>Mendesain brosur, poster, dan banner</li><li>Mengembangkan konsep visual untuk media sosial</li><li>Menggunakan software desain seperti Adobe Photoshop dan Illustrator</li></ol>','PT UVWX','Jalan Kemang Raya no. 123','WFO','3 bulan','Paid','2023-07-31','08234567890','<p>Persyaratan:</p><ul><li>Menguasai software desain seperti Adobe Photoshop dan Illustrator</li><li>Mampu membuat desain grafis yang menarik dan kreatif</li><li>Paham tentang konsep desain visual</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan portfolio ke email recruitment@ptuvwx.com</li><li>Tuliskan subjek email dengan format: [Nama] - Graphic Designer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang desain grafis</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(28,2,'Content Writer','<p>PT WXYZ membutuhkan seorang Content Writer untuk membantu menulis artikel dan konten digital dengan spesifikasi sebagai berikut:</p><ol><li>Menulis artikel SEO-friendly</li><li>Membuat konten digital yang menarik</li><li>Menggunakan bahasa Indonesia yang baik dan benar</li></ol>','PT WXYZ','Jalan Gatot Subroto no. 789','Remote','6 bulan','Unpaid','2023-08-31','08765432109','<p>Persyaratan:</p><ul><li>Menguasai bahasa Indonesia yang baik dan benar</li><li>Mampu menulis artikel SEO-friendly</li><li>Paham tentang konsep content marketing</li></ul>','<p>Cara Daftar:</p><ol><li>Kirimkan CV dan contoh tulisan ke email recruitment@ptwxyz.com</li><li>Tuliskan subjek email dengan format: [Nama] - Content Writer</li></ol>','<p>Info Tambahan:</p><ul><li>Anda akan mendapatkan pengalaman bekerja di bidang content writing</li><li>Kami akan memberikan pelatihan dan bimbingan selama masa magang</li></ul>','2023-04-14 23:29:41','2023-04-14 23:29:41'),(29,2,'Marketing Intern','<p>Membantu divisi marketing dalam mempromosikan produk baru</p>','PT ABC','Jl. Sudirman No. 123, Jakarta','WFO','3 bulan','Unpaid','2023-05-12','08123456789','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Marketing atau bidang terkait</li><li>Berpengalaman dalam marketing digital</li></ul>','<p>Kirimkan CV dan portofolio ke email marketing@ptabc.com</p>','','2023-04-14 23:29:41','2023-04-14 23:29:41'),(30,2,'Social Media Specialist','<p>Menangani akun media sosial perusahaan</p>','PT DEF','Jl. Gatot Subroto No. 456, Jakarta','WFH','4 bulan','Paid','2023-05-20','08765432100','<p>Kualifikasi:</p><ul><li>Berpengalaman dalam manajemen media sosial</li><li>Memiliki kreativitas dalam menghasilkan konten</li></ul>','<p>Kirimkan CV dan portfolio ke email hrd@ptdef.com</p>','','2023-04-14 23:29:41','2023-04-14 23:29:41'),(31,2,'Event Organizer Intern','<p>Menyiapkan acara untuk peluncuran produk baru</p>','PT GHI','Jl. Thamrin No. 789, Jakarta','WFO','2 bulan','Unpaid','2023-05-25','08987654321','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Event Organizer atau bidang terkait</li><li>Berpengalaman dalam mengatur acara</li></ul>','<p>Kirimkan CV dan portofolio ke email eventorganizer@ptghi.com</p>','','2023-04-14 23:29:41','2023-04-14 23:29:41'),(32,2,'Content Writer Intern','<p>Membuat artikel dan konten yang berkualitas untuk website perusahaan</p>','PT JKL','Jl. Merdeka No. 456, Jakarta','WFH','6 bulan','Paid','2023-06-02','08567890123','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Sastra atau bidang terkait</li><li>Berpengalaman dalam menulis artikel</li></ul>','<p>Kirimkan CV dan contoh tulisan ke email contentwriter@ptjkl.com</p>','','2023-04-14 23:29:41','2023-04-14 23:29:41'),(33,2,'UI/UX Designer Intern','<p>Merancang tampilan dan pengalaman pengguna aplikasi perusahaan</p>','PT MNO','Jl. Darmo No. 123, Surabaya','WFH','3 bulan','Paid','2023-06-10','08765432100','<p>Kualifikasi:</p><ul><li>Mahasiswa/i tingkat akhir jurusan Desain Grafis atau bidang terkait</li><li>Berpengalaman dalam merancang tampilan aplikasi</li></ul>','<p>Kirimkan CV dan portfolio ke email uidesigner@ptmno.com</p>','','2023-04-14 23:29:41','2023-04-14 23:29:41'),(36,2,'Web Developer','<p>jadi dev</p>','pt lala','jalan lala land jakarta','WFO','6 bulan','Paid','2023-04-20','0982311231423','<p>syarat</p>','<p>langsung</p>','','2023-04-15 23:56:59','2023-04-15 23:56:59');
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
) ENGINE=InnoDB AUTO_INCREMENT=61 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lowongan_skill`
--

LOCK TABLES `lowongan_skill` WRITE;
/*!40000 ALTER TABLE `lowongan_skill` DISABLE KEYS */;
INSERT INTO `lowongan_skill` VALUES (56,36,11,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(57,36,40,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(58,36,39,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(59,36,3,'2023-04-15 23:56:59','2023-04-15 23:56:59'),(60,36,9,'2023-04-15 23:56:59','2023-04-15 23:56:59');
/*!40000 ALTER TABLE `lowongan_skill` ENABLE KEYS */;
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
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perusahaan`
--

LOCK TABLES `perusahaan` WRITE;
/*!40000 ALTER TABLE `perusahaan` DISABLE KEYS */;
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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'adif19101',NULL,NULL,1,'2023-04-05 04:46:35','2023-03-31 04:14:05','2023-03-31 04:14:05',NULL),(2,'adif7',NULL,NULL,1,'2023-04-26 03:45:41','2023-04-05 02:51:22','2023-04-05 02:51:22',NULL);
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

-- Dump completed on 2023-04-26 10:57:04
