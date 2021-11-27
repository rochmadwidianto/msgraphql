/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.5.62 : Database - skripsi_msgraphql
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `activity_logs` */

DROP TABLE IF EXISTS `activity_logs`;

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `user` text NOT NULL,
  `ip_address` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=208 DEFAULT CHARSET=latin1;

/*Data for the table `activity_logs` */

insert  into `activity_logs`(`id`,`title`,`user`,`ip_address`,`created_at`,`updated_at`) values (1,'Tambah Loker # Oleh : Administrator','1','127.0.0.1','2021-10-31 23:07:59','0000-00-00 00:00:00'),(2,'Ubah Loker # Oleh : Administrator','1','127.0.0.1','2021-10-31 23:13:13','0000-00-00 00:00:00'),(3,'Tambah Loker # Oleh : Administrator','1','127.0.0.1','2021-10-31 23:21:19','0000-00-00 00:00:00'),(4,'User: Administrator Logged Out','1','::1','2021-10-31 23:21:43','0000-00-00 00:00:00'),(5,'Aplikan Logged in','2','::1','2021-10-31 23:21:51','0000-00-00 00:00:00'),(6,'Ubah User #2 Oleh :Aplikan','2','::1','2021-10-31 23:25:39','0000-00-00 00:00:00'),(7,'Aplikan Pilih Formasi #4 Oleh : Aplikan','2','::1','2021-10-31 23:27:39','0000-00-00 00:00:00'),(8,'Aplikan Tambah Pendidikan #4-Telekomunikasi dan Broadcasting-Universitas Atma Jaya Yogyakarta-A-AKD/BAN-PT/xxx/2021 Oleh : Aplikan','2','::1','2021-10-31 23:28:38','0000-00-00 00:00:00'),(9,'Aplikan Tambah Pekerjaan #2020-Ketua UKM-Universitas Atma Jaya Yogyakarta Oleh : Aplikan','2','::1','2021-10-31 23:29:36','0000-00-00 00:00:00'),(10,'Aplikan Tambah Pekerjaan #2021-Web Developer (Freelance)-PT XYZ Oleh : Aplikan','2','::1','2021-10-31 23:30:52','0000-00-00 00:00:00'),(11,'Aplikan Unggah Dokumen #166_CV.pdf Oleh : Aplikan','2','::1','2021-10-31 23:32:09','0000-00-00 00:00:00'),(12,'Aplikan Hapus Dokumen #166_CV.pdf Oleh : Aplikan','2','::1','2021-10-31 23:32:29','0000-00-00 00:00:00'),(13,'Aplikan Unggah Dokumen #166_CV.pdf Oleh : Aplikan','2','::1','2021-10-31 23:34:04','0000-00-00 00:00:00'),(14,'Aplikan Unggah Dokumen #166_KTP.pdf Oleh : Aplikan','2','::1','2021-10-31 23:34:26','0000-00-00 00:00:00'),(15,'Aplikan Unggah Dokumen #166_FTO.pdf Oleh : Aplikan','2','::1','2021-10-31 23:34:45','0000-00-00 00:00:00'),(16,'Aplikan Unggah Dokumen #166_SRL.pdf Oleh : Aplikan','2','::1','2021-10-31 23:35:00','0000-00-00 00:00:00'),(17,'Aplikan Kunci Data # Oleh : Aplikan','2','::1','2021-10-31 23:35:48','0000-00-00 00:00:00'),(18,'Verifikasi Data Aplikan ID #6 - Ya Oleh : Administrator','1','127.0.0.1','2021-10-31 23:47:02','0000-00-00 00:00:00'),(19,'Administrator Logged in','1','127.0.0.1','2021-11-02 20:53:18','0000-00-00 00:00:00'),(20,'Seleksi Administrasi Aplikan ID #eVlJZUtkeWJzc3JtNjVZZzVGenJ0UT09 - Ya Oleh : Administrator','1','127.0.0.1','2021-11-02 22:22:33','0000-00-00 00:00:00'),(21,'Aplikan Logged in','2','::1','2021-11-02 22:24:28','0000-00-00 00:00:00'),(22,'Administrator Logged in','1','127.0.0.1','2021-11-03 21:03:59','0000-00-00 00:00:00'),(23,'Seleksi Administrasi Aplikan ID #eVlJZUtkeWJzc3JtNjVZZzVGenJ0UT09 - Ya Oleh : Administrator','1','127.0.0.1','2021-11-03 23:05:53','0000-00-00 00:00:00'),(24,'Penilaian Tes Psikologi Aplikan ID #eVlJZUtkeWJzc3JtNjVZZzVGenJ0UT09 - Ya Oleh : Administrator','1','127.0.0.1','2021-11-03 23:06:11','0000-00-00 00:00:00'),(25,'Administrator Logged in','1','::1','2021-11-03 23:12:09','0000-00-00 00:00:00'),(26,'User: Administrator Logged Out','1','::1','2021-11-03 23:12:19','0000-00-00 00:00:00'),(27,'Aplikan Logged in','2','::1','2021-11-03 23:12:27','0000-00-00 00:00:00'),(28,'Administrator Logged in','1','127.0.0.1','2021-11-05 20:47:12','0000-00-00 00:00:00'),(29,'Administrator Logged in','1','127.0.0.1','2021-11-06 08:35:24','0000-00-00 00:00:00'),(30,'Administrator Logged in','1','127.0.0.1','2021-11-06 12:51:50','0000-00-00 00:00:00'),(31,'Administrator Logged in','1','127.0.0.1','2021-11-07 21:38:54','0000-00-00 00:00:00'),(32,'Administrator Logged in','1','127.0.0.1','2021-11-07 23:50:01','0000-00-00 00:00:00'),(33,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-08 00:49:24','0000-00-00 00:00:00'),(34,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-08 01:13:16','0000-00-00 00:00:00'),(35,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-08 01:14:37','0000-00-00 00:00:00'),(36,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-08 01:15:52','0000-00-00 00:00:00'),(37,'Administrator Logged in','1','127.0.0.1','2021-11-08 20:48:59','0000-00-00 00:00:00'),(38,'Administrator Logged in','1','127.0.0.1','2021-11-08 23:16:39','0000-00-00 00:00:00'),(39,'Seleksi Administrasi Aplikan ID #eVlJZUtkeWJzc3JtNjVZZzVGenJ0UT09 - Ya Oleh : Administrator','1','127.0.0.1','2021-11-08 23:18:02','0000-00-00 00:00:00'),(40,'Penilaian Tes Psikologi Aplikan ID #eVlJZUtkeWJzc3JtNjVZZzVGenJ0UT09 - Timbang Oleh : Administrator','1','127.0.0.1','2021-11-08 23:18:20','0000-00-00 00:00:00'),(41,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-08 23:51:45','0000-00-00 00:00:00'),(42,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-08 23:54:13','0000-00-00 00:00:00'),(43,'Administrator Logged in','1','127.0.0.1','2021-11-09 13:27:43','0000-00-00 00:00:00'),(44,'Administrator Logged in','1','127.0.0.1','2021-11-09 19:42:02','0000-00-00 00:00:00'),(45,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 19:52:37','0000-00-00 00:00:00'),(46,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 20:04:34','0000-00-00 00:00:00'),(47,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 21:03:45','0000-00-00 00:00:00'),(48,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 21:14:58','0000-00-00 00:00:00'),(49,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 21:19:16','0000-00-00 00:00:00'),(50,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 21:22:39','0000-00-00 00:00:00'),(51,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 21:23:26','0000-00-00 00:00:00'),(52,'Aplikan Logged in','2','::1','2021-11-09 21:27:43','0000-00-00 00:00:00'),(53,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-09 21:41:12','0000-00-00 00:00:00'),(54,'Set Pengumuman #aplikan2 - Diterima - Rochmad Widianto Oleh : Administrator','1','127.0.0.1','2021-11-09 22:49:13','0000-00-00 00:00:00'),(55,'Penilaian Aplikan ID #6 #Total Nilai 372.86 Oleh : Administrator','1','127.0.0.1','2021-11-09 23:27:19','0000-00-00 00:00:00'),(56,'Penilaian #aplikan : 6 #loker : 16 Oleh : Administrator','1','127.0.0.1','2021-11-09 23:27:19','0000-00-00 00:00:00'),(57,'Pengumuman Aplikan ID #6 - Diterima Oleh : Administrator','1','127.0.0.1','2021-11-09 23:31:47','0000-00-00 00:00:00'),(58,'Set Pengumuman #aplikan2 - Diterima - Administrator Oleh : Administrator','1','127.0.0.1','2021-11-09 23:31:47','0000-00-00 00:00:00'),(59,'Administrator Logged in','1','36.65.196.187','2021-11-10 23:27:14','0000-00-00 00:00:00'),(60,'Administrator Logged in','1','36.65.196.187','2021-11-11 23:41:10','0000-00-00 00:00:00'),(61,'User: Administrator Logged Out','1','36.65.196.187','2021-11-11 23:42:20','0000-00-00 00:00:00'),(62,'Aplikan Logged in','2','36.65.196.187','2021-11-11 23:42:25','0000-00-00 00:00:00'),(63,'User: Aplikan Logged Out','2','36.65.196.187','2021-11-11 23:42:52','0000-00-00 00:00:00'),(64,'Administrator Logged in','1','36.65.196.187','2021-11-11 23:43:00','0000-00-00 00:00:00'),(65,'Administrator Logged in','1','125.163.157.115','2021-11-12 06:01:58','0000-00-00 00:00:00'),(66,'User: Administrator Logged Out','1','125.163.157.115','2021-11-12 06:02:36','0000-00-00 00:00:00'),(67,'Pendaftaran Akun #waskito Oleh : Aplikan','3','125.163.157.115','2021-11-12 06:03:37','0000-00-00 00:00:00'),(68,'waskito Logged in','3','125.163.157.115','2021-11-12 06:03:46','0000-00-00 00:00:00'),(69,'Ubah User #3 Oleh :waskito','3','125.163.157.115','2021-11-12 06:04:24','0000-00-00 00:00:00'),(70,'Aplikan Pilih Formasi #8 Oleh : waskito','3','125.163.157.115','2021-11-12 06:05:45','0000-00-00 00:00:00'),(71,'Aplikan Tambah Pendidikan #4-sistem informasi-UAJY-BA-12444 Oleh : waskito','3','125.163.157.115','2021-11-12 06:06:12','0000-00-00 00:00:00'),(72,'Aplikan Tambah Pekerjaan #2020-Asisten Dosen-UAJY Oleh : waskito','3','125.163.157.115','2021-11-12 06:06:34','0000-00-00 00:00:00'),(73,'Aplikan Tambah Jurnal #2020-Bigdata Analisis pada pemkot jogja-https://ojs.uajy.ac.id/-P Oleh : waskito','3','125.163.157.115','2021-11-12 06:07:25','0000-00-00 00:00:00'),(74,'Aplikan Unggah Dokumen #157_CV.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:07:56','0000-00-00 00:00:00'),(75,'Aplikan Unggah Dokumen #157_IJZ.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:08:48','0000-00-00 00:00:00'),(76,'Aplikan Unggah Dokumen #157_KTP.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:09:20','0000-00-00 00:00:00'),(77,'Aplikan Unggah Dokumen #157_FTO.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:09:30','0000-00-00 00:00:00'),(78,'Aplikan Unggah Dokumen #157_SKCK.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:09:41','0000-00-00 00:00:00'),(79,'Aplikan Unggah Dokumen #157_SKK.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:09:54','0000-00-00 00:00:00'),(80,'Aplikan Unggah Dokumen #157_TRN.pdf Oleh : waskito','3','125.163.157.115','2021-11-12 06:10:05','0000-00-00 00:00:00'),(81,'waskito Logged in','3','36.65.196.187','2021-11-12 08:28:35','0000-00-00 00:00:00'),(82,'Administrator Logged in','1','202.14.92.150','2021-11-12 15:29:49','0000-00-00 00:00:00'),(83,'Tambah Loker # Oleh : Administrator','1','202.14.92.150','2021-11-12 15:37:00','0000-00-00 00:00:00'),(84,'Tambah Loker # Oleh : Administrator','1','202.14.92.150','2021-11-12 15:37:02','0000-00-00 00:00:00'),(85,'User: Administrator Logged Out','1','202.14.92.150','2021-11-12 15:38:21','0000-00-00 00:00:00'),(86,'Pendaftaran Akun #zamani Oleh : Aplikan','4','202.14.92.150','2021-11-12 15:40:12','0000-00-00 00:00:00'),(87,'zamani Logged in','4','202.14.92.150','2021-11-12 15:40:31','0000-00-00 00:00:00'),(88,'Ubah User #4 Oleh :zamani','4','202.14.92.150','2021-11-12 15:41:20','0000-00-00 00:00:00'),(89,'Aplikan Pilih Formasi #8 Oleh : zamani','4','202.14.92.150','2021-11-12 15:45:02','0000-00-00 00:00:00'),(90,'Aplikan Tambah Pendidikan #4-Teknik Informatika-UAJY-U-12455 Oleh : zamani','4','202.14.92.150','2021-11-12 15:47:01','0000-00-00 00:00:00'),(91,'Aplikan Tambah Pekerjaan #2020-Dosen-UAD Oleh : zamani','4','202.14.92.150','2021-11-12 15:48:57','0000-00-00 00:00:00'),(92,'Aplikan Tambah Pekerjaan #2020-sekretaris-Ikatan Dosen Indonesia Oleh : zamani','4','202.14.92.150','2021-11-12 15:49:27','0000-00-00 00:00:00'),(93,'Administrator Logged in','1','36.65.196.187','2021-11-12 15:55:50','0000-00-00 00:00:00'),(94,'Aplikan Tambah Jurnal #2020-karya ilmiah-ojs.uajy.ac.id-P Oleh : zamani','4','202.14.92.150','2021-11-12 15:56:46','0000-00-00 00:00:00'),(95,'Aplikan Unggah Dokumen #158_CV.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 15:58:46','0000-00-00 00:00:00'),(96,'Aplikan Unggah Dokumen #158_IJZ.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 15:59:45','0000-00-00 00:00:00'),(97,'Aplikan Unggah Dokumen #158_KTP.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 16:01:58','0000-00-00 00:00:00'),(98,'Aplikan Unggah Dokumen #158_FTO.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 16:02:09','0000-00-00 00:00:00'),(99,'Aplikan Unggah Dokumen #158_SKCK.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 16:02:43','0000-00-00 00:00:00'),(100,'Aplikan Unggah Dokumen #158_SKK.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 16:03:17','0000-00-00 00:00:00'),(101,'Aplikan Unggah Dokumen #158_TRN.pdf Oleh : zamani','4','202.14.92.150','2021-11-12 16:03:27','0000-00-00 00:00:00'),(102,'Aplikan Kunci Data # Oleh : zamani','4','202.14.92.150','2021-11-12 16:07:58','0000-00-00 00:00:00'),(103,'User: zamani Logged Out','4','202.14.92.150','2021-11-12 16:12:53','0000-00-00 00:00:00'),(104,'Administrator Logged in','1','202.14.92.150','2021-11-12 16:12:59','0000-00-00 00:00:00'),(105,'Verifikasi Data Aplikan ID #8 - Ya Oleh : Administrator','1','202.14.92.150','2021-11-12 16:15:54','0000-00-00 00:00:00'),(106,'Seleksi Administrasi Aplikan ID #ZjJYWVNuaE9wUXk0NVFBMUEzOUM5dz09 - Ya Oleh : Administrator','1','202.14.92.150','2021-11-12 16:19:28','0000-00-00 00:00:00'),(107,'User: Administrator Logged Out','1','202.14.92.150','2021-11-12 16:19:33','0000-00-00 00:00:00'),(108,'zamani Logged in','4','202.14.92.150','2021-11-12 16:19:40','0000-00-00 00:00:00'),(109,'User: zamani Logged Out','4','202.14.92.150','2021-11-12 16:22:26','0000-00-00 00:00:00'),(110,'Administrator Logged in','1','202.14.92.150','2021-11-12 16:22:38','0000-00-00 00:00:00'),(111,'Penilaian Tes Psikologi Aplikan ID #ZjJYWVNuaE9wUXk0NVFBMUEzOUM5dz09 - Ya Oleh : Administrator','1','202.14.92.150','2021-11-12 16:25:38','0000-00-00 00:00:00'),(112,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','202.14.92.150','2021-11-12 16:35:27','0000-00-00 00:00:00'),(113,'Penilaian Aplikan ID #8 #Total Nilai 347 Oleh : Administrator','1','202.14.92.150','2021-11-12 16:38:01','0000-00-00 00:00:00'),(114,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','202.14.92.150','2021-11-12 16:38:01','0000-00-00 00:00:00'),(115,'User: Administrator Logged Out','1','202.14.92.150','2021-11-12 16:38:40','0000-00-00 00:00:00'),(116,'zamani Logged in','4','202.14.92.150','2021-11-12 16:39:03','0000-00-00 00:00:00'),(117,'User: zamani Logged Out','4','202.14.92.150','2021-11-12 16:39:30','0000-00-00 00:00:00'),(118,'waskito Logged in','3','36.65.196.187','2021-11-12 16:50:19','0000-00-00 00:00:00'),(119,'User: waskito Logged Out','3','36.65.196.187','2021-11-12 16:50:44','0000-00-00 00:00:00'),(120,'zamani Logged in','4','36.65.196.187','2021-11-12 16:50:54','0000-00-00 00:00:00'),(121,'Administrator Logged in','1','202.14.92.150','2021-11-12 16:54:26','0000-00-00 00:00:00'),(122,'Tambah Jenis Test #006 Oleh : Administrator','1','202.14.92.150','2021-11-12 16:56:41','0000-00-00 00:00:00'),(123,'zamani Logged in','4','36.73.49.62','2021-11-12 21:35:12','0000-00-00 00:00:00'),(124,'Aplikan Hapus Dokumen #158_SKK.pdf Oleh : zamani','4','36.73.49.62','2021-11-12 21:44:18','0000-00-00 00:00:00'),(125,'User: zamani Logged Out','4','36.73.49.62','2021-11-12 21:56:07','0000-00-00 00:00:00'),(126,'Administrator Logged in','1','36.73.49.62','2021-11-12 21:56:23','0000-00-00 00:00:00'),(127,'User: Administrator Logged Out','1','36.73.49.62','2021-11-12 22:27:49','0000-00-00 00:00:00'),(128,'zamani Logged in','4','36.73.49.62','2021-11-12 22:27:57','0000-00-00 00:00:00'),(129,'User: zamani Logged Out','4','36.73.49.62','2021-11-12 22:33:09','0000-00-00 00:00:00'),(130,'Administrator Logged in','1','36.73.49.62','2021-11-12 22:33:14','0000-00-00 00:00:00'),(131,'Tambah Role #4 Oleh : #1','1','36.73.49.62','2021-11-12 22:39:39','0000-00-00 00:00:00'),(132,'Administrator Logged in','1','114.10.17.227','2021-11-13 14:02:58','0000-00-00 00:00:00'),(133,'Administrator Logged in','1','36.65.196.187','2021-11-13 20:40:35','0000-00-00 00:00:00'),(134,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-14 12:52:42','0000-00-00 00:00:00'),(135,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-14 13:00:24','0000-00-00 00:00:00'),(136,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-14 13:03:37','0000-00-00 00:00:00'),(137,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-14 13:04:08','0000-00-00 00:00:00'),(138,'Aplikan Pilih Formasi #2 Oleh : Administrator','1','127.0.0.1','2021-11-14 13:22:04','0000-00-00 00:00:00'),(139,'Aplikan Tambah Pendidikan #3-Ilmu Komputer-Universitas Atma Jaya Yogyakarta-A-AKD/001/BAN-PT/2021 Oleh : Administrator','1','127.0.0.1','2021-11-14 14:17:08','0000-00-00 00:00:00'),(140,'Aplikan Kunci Data # Oleh : Administrator','1','127.0.0.1','2021-11-14 16:04:38','0000-00-00 00:00:00'),(141,'Aplikan Kunci Data # Oleh : Administrator','1','127.0.0.1','2021-11-14 16:05:40','0000-00-00 00:00:00'),(142,'Aplikan Unggah Dokumen #159_CV.pdf Oleh : Administrator','1','127.0.0.1','2021-11-14 16:24:38','0000-00-00 00:00:00'),(143,'Administrator Logged in','1','127.0.0.1','2021-11-14 19:30:34','0000-00-00 00:00:00'),(144,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:14:53','0000-00-00 00:00:00'),(145,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:20:26','0000-00-00 00:00:00'),(146,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:26:40','0000-00-00 00:00:00'),(147,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:32:53','0000-00-00 00:00:00'),(148,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:33:54','0000-00-00 00:00:00'),(149,'Penilaian Aplikan ID #8 #Total Nilai 267 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:34:11','0000-00-00 00:00:00'),(150,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:34:11','0000-00-00 00:00:00'),(151,'Penilaian Aplikan ID #8 #Total Nilai 267 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:35:10','0000-00-00 00:00:00'),(152,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:35:10','0000-00-00 00:00:00'),(153,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:36:46','0000-00-00 00:00:00'),(154,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:42:52','0000-00-00 00:00:00'),(155,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:43:42','0000-00-00 00:00:00'),(156,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:44:14','0000-00-00 00:00:00'),(157,'Penilaian Aplikan ID #8 #Total Nilai 267 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:44:34','0000-00-00 00:00:00'),(158,'Penilaian #aplikan : 8 #loker : 15 Oleh : Administrator','1','127.0.0.1','2021-11-14 20:44:34','0000-00-00 00:00:00'),(159,'Administrator Logged in','1','127.0.0.1','2021-11-15 10:36:18','0000-00-00 00:00:00'),(160,'Administrator Logged in','1','127.0.0.1','2021-11-15 14:40:24','0000-00-00 00:00:00'),(161,'Ubah Jenis Test #003 Oleh : Administrator','1','127.0.0.1','2021-11-15 14:48:54','0000-00-00 00:00:00'),(162,'Ubah Jenis Test #004 Oleh : Administrator','1','127.0.0.1','2021-11-15 14:49:09','0000-00-00 00:00:00'),(163,'Ubah Jenis Test #004 Oleh : Administrator','1','127.0.0.1','2021-11-15 14:49:22','0000-00-00 00:00:00'),(164,'User: Administrator Logged Out','1','127.0.0.1','2021-11-15 14:59:24','0000-00-00 00:00:00'),(165,'Administrator Logged in','1','127.0.0.1','2021-11-15 15:09:37','0000-00-00 00:00:00'),(166,'Administrator Logged in','1','127.0.0.1','2021-11-15 15:39:59','0000-00-00 00:00:00'),(167,'Administrator Logged in','1','127.0.0.1','2021-11-17 20:55:12','0000-00-00 00:00:00'),(168,'Administrator Logged in','1','127.0.0.1','2021-11-19 08:50:58','0000-00-00 00:00:00'),(169,'Administrator Logged in','1','127.0.0.1','2021-11-20 20:07:31','0000-00-00 00:00:00'),(170,'Administrator Logged in','1','127.0.0.1','2021-11-21 08:13:27','0000-00-00 00:00:00'),(171,'Ubah User #1 Oleh :','1','127.0.0.1','2021-11-21 11:03:11','0000-00-00 00:00:00'),(172,'Ubah User #1 Oleh :','1','127.0.0.1','2021-11-21 11:06:18','0000-00-00 00:00:00'),(173,'Ubah User #1 Oleh :','1','127.0.0.1','2021-11-21 11:08:13','0000-00-00 00:00:00'),(174,'Ubah User #1 Oleh :','1','127.0.0.1','2021-11-21 11:24:47','0000-00-00 00:00:00'),(175,'Tambah Konsumen # Oleh : ','1','127.0.0.1','2021-11-21 11:48:35','0000-00-00 00:00:00'),(176,'Ubah Konsumen #Rochmad Widianto Oleh : Administrator','1','127.0.0.1','2021-11-21 11:54:26','0000-00-00 00:00:00'),(177,'Ubah Konsumen #Rochmad Widianto Oleh : Administrator','1','127.0.0.1','2021-11-21 11:56:31','0000-00-00 00:00:00'),(178,'Ubah Konsumen #Rochmad Widianto Oleh : Administrator','1','127.0.0.1','2021-11-21 11:59:31','0000-00-00 00:00:00'),(179,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-21 12:09:47','0000-00-00 00:00:00'),(180,'Tambah Role #2 Oleh : #1','1','127.0.0.1','2021-11-21 12:11:28','0000-00-00 00:00:00'),(181,'Tambah User $2 Oleh :Administrator','1','127.0.0.1','2021-11-21 12:12:15','0000-00-00 00:00:00'),(182,'User: Administrator Logged Out','1','127.0.0.1','2021-11-21 12:12:24','0000-00-00 00:00:00'),(183,'Operator Logged in','2','127.0.0.1','2021-11-21 12:12:34','0000-00-00 00:00:00'),(184,'Ubah User #2 Oleh :Operator','2','127.0.0.1','2021-11-21 12:13:25','0000-00-00 00:00:00'),(185,'User: Operator Logged Out','2','127.0.0.1','2021-11-21 12:13:55','0000-00-00 00:00:00'),(186,'Administrator Logged in','1','127.0.0.1','2021-11-21 12:14:02','0000-00-00 00:00:00'),(187,'Administrator Logged in','1','127.0.0.1','2021-11-24 21:32:43','0000-00-00 00:00:00'),(188,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-24 21:46:23','0000-00-00 00:00:00'),(189,'Tambah Inventory #Laptop Oleh : Administrator','1','127.0.0.1','2021-11-24 21:56:17','0000-00-00 00:00:00'),(190,'Tambah Inventory #Mouse Oleh : Administrator','1','127.0.0.1','2021-11-24 22:01:42','0000-00-00 00:00:00'),(191,'Ubah Inventory #Laptop Edit Oleh : Administrator','1','127.0.0.1','2021-11-24 22:02:22','0000-00-00 00:00:00'),(192,'Ubah Role #1 Oleh : #1','1','127.0.0.1','2021-11-24 22:13:38','0000-00-00 00:00:00'),(193,'Tambah Penjualan # Oleh : Administrator','1','127.0.0.1','2021-11-24 22:33:32','0000-00-00 00:00:00'),(194,'Tambah Penjualan # Oleh : Administrator','1','127.0.0.1','2021-11-24 22:46:21','0000-00-00 00:00:00'),(195,'Ubah Penjualan # Oleh : Administrator','1','127.0.0.1','2021-11-24 22:48:46','0000-00-00 00:00:00'),(196,'Administrator Logged in','1','127.0.0.1','2021-11-25 08:44:31','0000-00-00 00:00:00'),(197,'Tambah Penjualan # Oleh : Administrator','1','127.0.0.1','2021-11-25 10:31:43','0000-00-00 00:00:00'),(198,'Administrator Logged in','1','127.0.0.1','2021-11-26 22:13:41','0000-00-00 00:00:00'),(199,'Ubah Konsumen #micro test Oleh : Administrator','1','127.0.0.1','2021-11-26 22:58:57','0000-00-00 00:00:00'),(200,'Ubah Konsumen #xxx Oleh : Administrator','1','127.0.0.1','2021-11-26 23:05:16','0000-00-00 00:00:00'),(201,'Ubah Konsumen #xxx Oleh : Administrator','1','127.0.0.1','2021-11-26 23:11:34','0000-00-00 00:00:00'),(202,'Ubah Inventory #Mouse Edit Oleh : Administrator','1','127.0.0.1','2021-11-26 23:13:07','0000-00-00 00:00:00'),(203,'Administrator Logged in','1','127.0.0.1','2021-11-27 22:46:00','0000-00-00 00:00:00'),(204,'Ubah Konsumen #xxx Oleh : Administrator','1','127.0.0.1','2021-11-27 22:46:56','0000-00-00 00:00:00'),(205,'Ubah Inventory #Mouse Edit Oleh : Administrator','1','127.0.0.1','2021-11-27 22:47:23','0000-00-00 00:00:00'),(206,'Administrator Logged in','1','::1','2021-11-27 22:53:33','0000-00-00 00:00:00'),(207,'Ubah Penjualan # Oleh : Administrator','1','127.0.0.1','2021-11-27 22:55:40','0000-00-00 00:00:00');

/*Table structure for table `agama` */

DROP TABLE IF EXISTS `agama`;

CREATE TABLE `agama` (
  `agama_id` int(11) NOT NULL AUTO_INCREMENT,
  `agama_kode` varchar(100) NOT NULL,
  `agama_nama` varchar(200) DEFAULT NULL,
  `agama_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`agama_id`),
  KEY `FK_agama_user` (`agama_user_id`),
  CONSTRAINT `FK_agama_user_id` FOREIGN KEY (`agama_user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `agama` */

insert  into `agama`(`agama_id`,`agama_kode`,`agama_nama`,`agama_user_id`,`created_at`,`updated_at`) values (1,'001','Islam',1,'2021-10-11 14:28:18','0000-00-00 00:00:00'),(3,'002','Kristen',1,'2021-10-11 14:29:09','0000-00-00 00:00:00'),(4,'003','Katholik',1,'2021-10-11 14:29:23','0000-00-00 00:00:00'),(5,'004','Hindu',1,'2021-10-11 14:29:37','2021-10-13 00:00:00'),(6,'005','Budha',1,'2021-10-31 21:58:34','0000-00-00 00:00:00');

/*Table structure for table `bulan_ref` */

DROP TABLE IF EXISTS `bulan_ref`;

CREATE TABLE `bulan_ref` (
  `bulan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`bulan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `bulan_ref` */

insert  into `bulan_ref`(`bulan_id`,`bulan_nama`) values (1,'Januari'),(2,'Februari'),(3,'Maret'),(4,'April'),(5,'Mei'),(6,'Juni'),(7,'Juli'),(8,'Agustus'),(9,'September'),(10,'Oktober'),(11,'November'),(12,'Desember');

/*Table structure for table `inventory` */

DROP TABLE IF EXISTS `inventory`;

CREATE TABLE `inventory` (
  `inv_id` int(11) NOT NULL AUTO_INCREMENT,
  `inv_nama` varchar(200) NOT NULL,
  `inv_deskripsi` text,
  `inv_stok` int(11) NOT NULL,
  `inv_harga` decimal(20,2) DEFAULT NULL,
  `inv_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`inv_id`),
  KEY `FK_inv_user` (`inv_user_id`),
  CONSTRAINT `FK_inv_user` FOREIGN KEY (`inv_user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `inventory` */

insert  into `inventory`(`inv_id`,`inv_nama`,`inv_deskripsi`,`inv_stok`,`inv_harga`,`inv_user_id`,`created_at`) values (2,'Mouse','Mouse Wireless Merk Logitech',3,'230000.00',1,'2021-11-24 22:01:42');

/*Table structure for table `konsumen` */

DROP TABLE IF EXISTS `konsumen`;

CREATE TABLE `konsumen` (
  `kons_id` int(11) NOT NULL AUTO_INCREMENT,
  `kons_nama` varchar(200) NOT NULL,
  `kons_telp` varchar(20) DEFAULT NULL,
  `kons_alamat` text,
  `kons_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`kons_id`),
  KEY `FK_kons_user` (`kons_user_id`),
  CONSTRAINT `FK_kons_user` FOREIGN KEY (`kons_user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `konsumen` */

insert  into `konsumen`(`kons_id`,`kons_nama`,`kons_telp`,`kons_alamat`,`kons_user_id`,`created_at`) values (1,'mono','085725655554','Klaten',1,'2021-11-21 11:48:35');

/*Table structure for table `penjualan` */

DROP TABLE IF EXISTS `penjualan`;

CREATE TABLE `penjualan` (
  `penj_id` int(11) NOT NULL AUTO_INCREMENT,
  `penj_kons_id` int(11) NOT NULL,
  `penj_inv_id` int(11) NOT NULL,
  `penj_tanggal` date DEFAULT '0000-00-00',
  `penj_jumlah` int(11) NOT NULL,
  `penj_nominal` decimal(20,2) DEFAULT '0.00',
  `penj_user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`penj_id`),
  KEY `FK_penj_konsumen` (`penj_kons_id`),
  KEY `FK_penj_inventory` (`penj_inv_id`),
  KEY `FK_penj_user` (`penj_user_id`),
  CONSTRAINT `FK_penj_konsumen` FOREIGN KEY (`penj_kons_id`) REFERENCES `konsumen` (`kons_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penj_inventory` FOREIGN KEY (`penj_inv_id`) REFERENCES `inventory` (`inv_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_penj_user` FOREIGN KEY (`penj_user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`penj_id`,`penj_kons_id`,`penj_inv_id`,`penj_tanggal`,`penj_jumlah`,`penj_nominal`,`penj_user_id`,`created_at`) values (1,1,2,'2021-11-23',2,NULL,1,'2021-11-24 22:33:32'),(2,1,2,'2021-11-15',3,'3400000.00',1,'2021-11-24 22:46:21'),(5,1,2,'2021-11-16',1,'230000.00',1,'2021-11-25 10:31:43');

/*Table structure for table `permissions` */

DROP TABLE IF EXISTS `permissions`;

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aksi` varchar(100) DEFAULT NULL,
  `btn_class` varchar(100) DEFAULT NULL,
  `btn_icon` varchar(100) DEFAULT NULL,
  `title` text NOT NULL,
  `order` int(11) DEFAULT NULL,
  `is_show` enum('Yes','No') DEFAULT 'Yes',
  `code` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`aksi`,`btn_class`,`btn_icon`,`title`,`order`,`is_show`,`code`) values (1,'MENU',NULL,NULL,'KONSUMEN',1,'Yes','konsumen_list'),(2,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Konsumen',2,'Yes','konsumen_add'),(3,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Konsumen',3,'Yes','konsumen_edit'),(4,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','Konsumen',4,'Yes','konsumen_delete'),(5,'MENU',NULL,NULL,'MANAJEMEN USER',13,'Yes','manajemen_user'),(6,'SUBMENU',NULL,NULL,'USER',14,'Yes','users_list'),(7,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','User',15,'Yes','users_add'),(8,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','User',16,'Yes','users_edit'),(9,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','User',17,'Yes','users_delete'),(10,'DETAIL','btn btn-sm btn-outline-info','bx bx-detail','User',18,'Yes','users_view'),(11,'SUBMENU',NULL,NULL,'ROLES',19,'Yes','roles_list'),(12,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Roles',20,'Yes','roles_add'),(13,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Roles',21,'Yes','roles_edit'),(15,'MENU',NULL,NULL,'INVENTORY',5,'Yes','inventory_list'),(16,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Inventory',6,'Yes','inventory_add'),(17,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Inventory',7,'Yes','inventory_edit'),(18,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','Inventory',8,'Yes','inventory_delete'),(19,'MENU',NULL,NULL,'PENJUALAN',9,'Yes','penjualan_list'),(20,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Penjualan',10,'Yes','penjualan_add'),(21,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Penjualan',11,'Yes','penjualan_edit'),(22,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','Penjualan',12,'Yes','penjualan_delete');

/*Table structure for table `role_permissions` */

DROP TABLE IF EXISTS `role_permissions`;

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

/*Data for the table `role_permissions` */

insert  into `role_permissions`(`id`,`role`,`permission`) values (1,1,'users_list'),(2,1,'users_add'),(3,1,'users_edit'),(4,1,'users_delete'),(5,1,'users_view'),(6,1,'roles_list'),(7,1,'roles_add'),(8,1,'roles_edit'),(9,1,'manajemen_user'),(10,1,'konsumen_list'),(11,1,'konsumen_add'),(12,1,'konsumen_edit'),(13,1,'konsumen_delete'),(15,2,'konsumen_list'),(16,2,'konsumen_add'),(17,2,'konsumen_edit'),(18,2,'konsumen_delete'),(19,2,'users_edit'),(20,2,'users_view'),(21,1,'inventory_list'),(22,1,'inventory_add'),(23,1,'inventory_edit'),(24,1,'inventory_delete'),(25,1,'penjualan_list'),(26,1,'penjualan_add'),(27,1,'penjualan_edit'),(28,1,'penjualan_delete');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`) values (1,'Administrator'),(2,'Operator');

/*Table structure for table `settings` */

DROP TABLE IF EXISTS `settings`;

CREATE TABLE `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `settings` */

insert  into `settings`(`id`,`key`,`value`,`created_at`) values (1,'company_name','Skripsi - Rochmad Widianto - 185410014','2018-06-21 12:07:59'),(2,'company_email','widiantorochmad@gmail.com','2018-07-11 05:39:58'),(3,'timezone','Asia/Jakarta','2018-07-15 14:24:17'),(4,'login_theme','2','2019-06-06 08:34:28'),(5,'db_default','skripsi_msgraphql','2021-11-26 23:03:35'),(6,'db_konsumen','skripsi_msgraphql_konsumen','2021-11-26 23:03:50'),(7,'db_inventory','skripsi_msgraphql_inventory','2021-11-26 23:08:51'),(8,'db_penjualan','skripsi_msgraphql_penjualan','2021-11-26 23:09:17');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(200) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `email` varchar(200) NOT NULL,
  `alamat` text,
  `role` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`username`,`password`,`telp`,`email`,`alamat`,`role`,`created_at`) values (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3','085725655554','widiantorochmad@gmail.com','Klaten',1,'2021-11-21 13:00:16'),(2,'Operator','operator','4b583376b2767b923c3e1da60d10de59','081000000000','operator@mail.com','Yogyakarta',2,'0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
