/*
SQLyog Ultimate v11.21 (64 bit)
MySQL - 5.5.62 : Database - skripsi_msgraphql_inventory
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
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
  KEY `FK_inventory_user_id` (`inv_user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `inventory` */

insert  into `inventory`(`inv_id`,`inv_nama`,`inv_deskripsi`,`inv_stok`,`inv_harga`,`inv_user_id`,`created_at`) values (1,'Printer','3 in 1',12,'2300000.00',1,'2021-11-24 22:01:42'),(2,'Mouse Wireless','Warna Hitam',30,'150000.00',1,'2021-12-09 21:07:44');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
