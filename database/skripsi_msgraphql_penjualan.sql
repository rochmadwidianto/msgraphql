/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.5.62 : Database - skripsi_msgraphql_penjualan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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
  KEY `FK_penj_user` (`penj_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `penjualan` */

insert  into `penjualan`(`penj_id`,`penj_kons_id`,`penj_inv_id`,`penj_tanggal`,`penj_jumlah`,`penj_nominal`,`penj_user_id`,`created_at`) values (2,1,2,'2021-11-15',3,'3400000.00',1,'2021-11-24 22:46:21'),(5,1,2,'2021-11-16',1,'230000.00',1,'2021-11-25 10:31:43');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
