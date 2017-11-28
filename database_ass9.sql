/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.21-MariaDB : Database - cosc
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cosc` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;

USE `cosc`;

/*Table structure for table `personaldetails` */

DROP TABLE IF EXISTS `personaldetails`;

CREATE TABLE `personaldetails` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `personaldetails` */

insert  into `personaldetails`(`username`,`birthdate`,`phonenumber`,`firstname`,`lastname`,`email`) values ('user1','12-10-1998','0123456789','Vincent','Nguyen','vincent@gmail.com');

/*Table structure for table `reminder` */

DROP TABLE IF EXISTS `reminder`;

CREATE TABLE `reminder` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `subject` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` int(10) NOT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  `username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `reminder` */

insert  into `reminder`(`id`,`subject`,`description`,`created_date`,`deleted`,`username`) values (2,'aaaaa','Test aaa',0,0,'user1');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`Username`,`Password`,`Email`,`UserType`) values ('user1','7ff10bc14a91fbc515c6d9f9807f0ede','ductruc@gmail.com','admin'),('user2','7ff10bc14a91fbc515c6d9f9807f0ede','ductruc@gmail.com',NULL),('vantruc','7ff10bc14a91fbc515c6d9f9807f0ede','ductruc@gmail.com','admin');

/*Table structure for table `users_login` */

DROP TABLE IF EXISTS `users_login`;

CREATE TABLE `users_login` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoginTime` int(10) NOT NULL,
  `Status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_login` */

insert  into `users_login`(`Id`,`Username`,`LoginTime`,`Status`) values (3,'test',1510272920,0),(4,'test',1510272942,0),(5,'user1',1510274187,1),(6,'user1',1511226407,1),(7,NULL,1511819898,0),(8,'user1',1511819902,1),(9,'user1',1511819917,1),(10,NULL,1511819946,0),(11,'user1',1511819956,1),(12,'user1',1511820006,1),(13,'user1',1511820306,1),(14,'user1',1511820483,1),(15,'user1',1511821790,1),(16,'user1',1511821811,1),(17,'user2',1511822819,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
