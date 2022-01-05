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
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

/*Data for the table `activity_logs` */

insert  into `activity_logs`(`id`,`title`,`user`,`ip_address`,`created_at`,`updated_at`) values (1,'Ubah Konsumen #Budiman Oleh : Administrator','1','127.0.0.1','2022-01-02 15:42:51','0000-00-00 00:00:00'),(2,'Ubah Konsumen #Hermawan Oleh : Administrator','1','127.0.0.1','2022-01-02 21:43:38','0000-00-00 00:00:00'),(3,'Ubah Konsumen #Budiman Oleh : Administrator','1','127.0.0.1','2022-01-02 21:50:34','0000-00-00 00:00:00'),(4,'Ubah Konsumen #Hermawan Oleh : Administrator','1','127.0.0.1','2022-01-02 21:52:36','0000-00-00 00:00:00'),(5,'Ubah Inventory #Mouse Wireless Oleh : Administrator','1','127.0.0.1','2022-01-03 21:57:17','0000-00-00 00:00:00'),(6,'Ubah Penjualan # Oleh : Administrator','1','127.0.0.1','2022-01-04 22:08:58','0000-00-00 00:00:00'),(7,'Tambah Konsumen #Rochmad Widianto Oleh : Administrator','1','127.0.0.1','2022-01-02 13:30:52','0000-00-00 00:00:00'),(8,'Ubah Konsumen #Rochmad Widianto Oleh : Administrator','1','127.0.0.1','2022-01-05 11:06:17','0000-00-00 00:00:00'),(9,'Ubah Konsumen #Budiman Oleh : Administrator','1','127.0.0.1','2022-01-05 11:06:44','0000-00-00 00:00:00'),(10,'Tambah Inventory #Kabel USB Oleh : Administrator','1','127.0.0.1','2022-01-05 11:08:01','0000-00-00 00:00:00'),(11,'Tambah Inventory #Kabel Type C Oleh : Administrator','1','127.0.0.1','2022-01-05 11:08:38','0000-00-00 00:00:00'),(12,'Tambah Inventory #Laptop Oleh : Administrator','1','127.0.0.1','2022-01-05 11:10:57','0000-00-00 00:00:00'),(13,'Tambah Konsumen #Niko Oleh : Administrator','1','127.0.0.1','2022-01-05 11:12:31','0000-00-00 00:00:00'),(14,'Tambah Konsumen #Gilang Oleh : Administrator','1','127.0.0.1','2022-01-05 11:13:18','0000-00-00 00:00:00'),(15,'Tambah Penjualan # Oleh : Administrator','1','127.0.0.1','2022-01-05 11:14:23','0000-00-00 00:00:00'),(16,'Ubah Penjualan # Oleh : Administrator','1','127.0.0.1','2022-01-05 12:29:31','0000-00-00 00:00:00'),(17,'Ubah Penjualan # Oleh : Administrator','1','127.0.0.1','2022-01-05 12:29:54','0000-00-00 00:00:00'),(18,'Ubah Role #2 Oleh : #1','1','127.0.0.1','2022-01-05 14:51:40','0000-00-00 00:00:00'),(19,'Tambah Role #3 Oleh : #1','1','127.0.0.1','2022-01-05 14:52:10','0000-00-00 00:00:00'),(20,'Ubah User #2 Oleh :Administrator','1','127.0.0.1','2022-01-05 14:53:06','0000-00-00 00:00:00'),(21,'Tambah User $3 Oleh :Administrator','1','127.0.0.1','2022-01-05 14:55:24','0000-00-00 00:00:00'),(22,'Ubah User #2 Oleh :Administrator','1','127.0.0.1','2022-01-05 14:55:56','0000-00-00 00:00:00'),(23,'Ubah User #1 Oleh :Administrator','1','127.0.0.1','2022-01-05 14:56:20','0000-00-00 00:00:00'),(24,'User: Administrator Logged Out','1','127.0.0.1','2022-01-05 14:59:11','0000-00-00 00:00:00'),(25,'Ubah Penjualan # Oleh : Kasir','2','127.0.0.1','2022-01-05 14:59:39','0000-00-00 00:00:00'),(26,'User: Kasir Logged Out','2','127.0.0.1','2022-01-05 14:59:51','0000-00-00 00:00:00'),(27,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:00:21','0000-00-00 00:00:00'),(28,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:00:37','0000-00-00 00:00:00'),(29,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:06:54','0000-00-00 00:00:00'),(30,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:12:50','0000-00-00 00:00:00'),(31,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:19:40','0000-00-00 00:00:00'),(32,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:24:14','0000-00-00 00:00:00'),(33,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:27:32','0000-00-00 00:00:00'),(34,'Ubah User #3 Oleh :Pegawai Gudang','3','127.0.0.1','2022-01-05 15:31:42','0000-00-00 00:00:00'),(35,'User: Pegawai Gudang Logged Out','3','127.0.0.1','2022-01-05 15:33:17','0000-00-00 00:00:00'),(36,'Ubah User #2 Oleh :Kasir','2','127.0.0.1','2022-01-05 15:33:39','0000-00-00 00:00:00'),(37,'User: Kasir Logged Out','2','127.0.0.1','2022-01-05 15:33:49','0000-00-00 00:00:00'),(38,'Ubah User #1 Oleh :Administrator','1','127.0.0.1','2022-01-05 15:34:11','0000-00-00 00:00:00');

/*Table structure for table `bulan_ref` */

DROP TABLE IF EXISTS `bulan_ref`;

CREATE TABLE `bulan_ref` (
  `bulan_id` int(11) NOT NULL AUTO_INCREMENT,
  `bulan_nama` varchar(50) NOT NULL,
  PRIMARY KEY (`bulan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `bulan_ref` */

insert  into `bulan_ref`(`bulan_id`,`bulan_nama`) values (1,'Januari'),(2,'Februari'),(3,'Maret'),(4,'April'),(5,'Mei'),(6,'Juni'),(7,'Juli'),(8,'Agustus'),(9,'September'),(10,'Oktober'),(11,'November'),(12,'Desember');

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
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;

/*Data for the table `permissions` */

insert  into `permissions`(`id`,`aksi`,`btn_class`,`btn_icon`,`title`,`order`,`is_show`,`code`) values (1,'MENU',NULL,NULL,'KONSUMEN',1,'Yes','konsumen_list'),(2,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Konsumen',2,'Yes','konsumen_add'),(3,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Konsumen',3,'Yes','konsumen_edit'),(4,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','Konsumen',4,'Yes','konsumen_delete'),(5,'MENU',NULL,NULL,'MANAJEMEN USER',13,'Yes','manajemen_user'),(6,'SUBMENU',NULL,NULL,'USER',14,'Yes','users_list'),(7,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','User',15,'Yes','users_add'),(8,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','User',16,'Yes','users_edit'),(9,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','User',17,'Yes','users_delete'),(10,'DETAIL','btn btn-sm btn-outline-info','bx bx-detail','User',18,'Yes','users_view'),(11,'SUBMENU',NULL,NULL,'ROLES',19,'Yes','roles_list'),(12,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Roles',20,'Yes','roles_add'),(13,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Roles',21,'Yes','roles_edit'),(15,'MENU',NULL,NULL,'INVENTORY',5,'Yes','inventory_list'),(16,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Inventory',6,'Yes','inventory_add'),(17,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Inventory',7,'Yes','inventory_edit'),(18,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','Inventory',8,'Yes','inventory_delete'),(19,'MENU',NULL,NULL,'PENJUALAN',9,'Yes','penjualan_list'),(20,'TAMBAH','btn btn-sm btn-outline-success','bx bx-plus','Penjualan',10,'Yes','penjualan_add'),(21,'UBAH','btn btn-sm btn-outline-warning','bx bx-pencil','Penjualan',11,'Yes','penjualan_edit'),(22,'HAPUS','btn btn-sm btn-outline-danger','bx bx-trash','Penjualan',12,'Yes','penjualan_delete'),(23,'MENU',NULL,NULL,'LAPORAN',22,'Yes','laporan_list'),(24,'SUBMENU',NULL,NULL,'Laporan Konsumen',23,'Yes','lap_konsumen_list'),(25,'SUBMENU',NULL,NULL,'Laporan Inventory',24,'Yes','lap_inventory_list'),(26,'SUBMENU',NULL,NULL,'Laporan Penjualan',25,'Yes','lap_penjualan_list');

/*Table structure for table `role_permissions` */

DROP TABLE IF EXISTS `role_permissions`;

CREATE TABLE `role_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` int(11) NOT NULL,
  `permission` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

/*Data for the table `role_permissions` */

insert  into `role_permissions`(`id`,`role`,`permission`) values (1,1,'users_list'),(2,1,'users_add'),(3,1,'users_edit'),(4,1,'users_delete'),(5,1,'users_view'),(6,1,'roles_list'),(7,1,'roles_add'),(8,1,'roles_edit'),(9,1,'manajemen_user'),(10,1,'konsumen_list'),(11,1,'konsumen_add'),(12,1,'konsumen_edit'),(13,1,'konsumen_delete'),(15,2,'konsumen_list'),(16,2,'konsumen_add'),(17,2,'konsumen_edit'),(18,2,'konsumen_delete'),(19,2,'users_edit'),(20,2,'users_view'),(21,1,'inventory_list'),(22,1,'inventory_add'),(23,1,'inventory_edit'),(24,1,'inventory_delete'),(25,1,'penjualan_list'),(26,1,'penjualan_add'),(27,1,'penjualan_edit'),(28,1,'penjualan_delete'),(29,1,'laporan_list'),(30,1,'lap_konsumen_list'),(31,1,'lap_inventory_list'),(32,1,'lap_penjualan_list'),(33,2,'penjualan_list'),(34,2,'penjualan_add'),(35,2,'penjualan_edit'),(36,2,'penjualan_delete'),(37,3,'inventory_list'),(38,3,'inventory_add'),(39,3,'inventory_edit'),(40,3,'inventory_delete'),(41,3,'users_edit'),(42,3,'users_view');

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `roles` */

insert  into `roles`(`id`,`title`) values (1,'Administrator'),(2,'Kasir'),(3,'Pegawai Gudang');

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

insert  into `settings`(`id`,`key`,`value`,`created_at`) values (1,'company_name','Skripsi - Rochmad Widianto - 185410014','2021-11-26 23:03:50'),(2,'company_email','widiantorochmad@gmail.com','2021-11-26 23:03:50'),(3,'timezone','Asia/Jakarta','2021-11-26 23:03:50'),(4,'login_theme','2','2021-11-26 23:03:50'),(5,'db_default','skripsi_msgraphql','2021-11-26 23:03:50'),(6,'db_konsumen','skripsi_msgraphql_konsumen','2021-11-26 23:03:50'),(7,'db_inventory','skripsi_msgraphql_inventory','2021-11-26 23:03:50'),(8,'db_penjualan','skripsi_msgraphql_penjualan','2021-11-26 23:03:50');

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
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `users` */

insert  into `users`(`id`,`nama`,`username`,`password`,`telp`,`email`,`alamat`,`role`,`created_at`) values (1,'Administrator','admin','21232f297a57a5a743894a0e4a801fc3','085725655554','widiantorochmad@gmail.com','Klaten',1,'2022-01-01 13:00:16'),(2,'Kasir','kasir','c7911af3adbd12a035b289556d96470a','081000000000','widiantorochmad@gmail.com','Yogyakarta',2,'0000-00-00 00:00:00'),(3,'Pegawai Gudang','gudang','202446dd1d6028084426867365b0c7a1','085123123000','widiantorochmad@gmail.com','Klaten',3,'0000-00-00 00:00:00');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
