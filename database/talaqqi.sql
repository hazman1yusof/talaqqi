/*
SQLyog Community v12.5.0 (32 bit)
MySQL - 5.7.19 : Database - talaqqi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`talaqqi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `talaqqi`;

/*Table structure for table `messages` */

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `ticket_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `text` mediumtext COLLATE utf8mb4_unicode_ci,
  `message_type` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updflg` varchar(5) COLLATE utf8mb4_unicode_ci DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(222) DEFAULT NULL,
  `token` varchar(333) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Table structure for table `talaqqi` */

DROP TABLE IF EXISTS `talaqqi`;

CREATE TABLE `talaqqi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(22) DEFAULT NULL,
  `overall` decimal(11,2) DEFAULT NULL,
  `tajwid` decimal(11,2) DEFAULT NULL,
  `tarannum` decimal(11,2) DEFAULT NULL,
  `kefasihan` decimal(11,2) DEFAULT NULL,
  `kelancaran` decimal(11,2) DEFAULT NULL,
  `komen` text,
  `adddate` datetime DEFAULT NULL,
  `adduser` varchar(22) DEFAULT NULL,
  `upddate` datetime DEFAULT NULL,
  `upduser` varchar(22) DEFAULT NULL,
  `ayat` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(33) DEFAULT NULL,
  `firstname` varchar(33) DEFAULT NULL,
  `lastname` varchar(33) DEFAULT NULL,
  `email` varchar(333) DEFAULT NULL,
  `remember_me` varchar(333) DEFAULT NULL,
  `remember_token` varchar(333) DEFAULT NULL,
  `password` varchar(333) DEFAULT NULL,
  `image_path` varchar(333) DEFAULT NULL,
  `role` varchar(11) DEFAULT 'Student',
  `gender` varchar(11) DEFAULT NULL,
  `marital` varchar(11) DEFAULT NULL,
  `bio` varchar(333) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `address` varchar(222) DEFAULT NULL,
  `postcode` varchar(22) DEFAULT NULL,
  `state` varchar(22) DEFAULT NULL,
  `adddate` decimal(10,0) DEFAULT NULL,
  `adduser` varchar(33) DEFAULT NULL,
  `upddate` datetime DEFAULT NULL,
  `upduser` varchar(33) DEFAULT NULL,
  `level` int(3) DEFAULT '1',
  `li_1` int(3) DEFAULT '0',
  `li_2` int(3) DEFAULT '0',
  `li_3` int(3) DEFAULT '0',
  `li_4` int(3) DEFAULT '0',
  `li_5` int(3) DEFAULT '0',
  `li2_1` int(3) DEFAULT '0',
  `li2_2` int(3) DEFAULT '0',
  `li2_3` int(3) DEFAULT '0',
  `li2_4` int(3) DEFAULT '0',
  `li2_5` int(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
