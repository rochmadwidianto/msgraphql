/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.5.62 : Database - skripsi_msgraphql_konsumen
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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
  KEY `FK_konsumen_user_id` (`kons_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

/*Data for the table `konsumen` */

insert  into `konsumen`(`kons_id`,`kons_nama`,`kons_telp`,`kons_alamat`,`kons_user_id`,`created_at`) values (1,'xxx','121231312','dasdasd',1,'2021-11-21 11:48:35');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
