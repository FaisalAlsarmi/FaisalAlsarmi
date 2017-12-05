/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 10.1.21-MariaDB : Database - cosc_faisal
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`cosc_faisal` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `cosc_faisal`;

/*Table structure for table `city` */

DROP TABLE IF EXISTS `city`;

CREATE TABLE `city` (
  `CityID` int(11) NOT NULL AUTO_INCREMENT,
  `CityName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ProvinceID` int(11) DEFAULT NULL,
  PRIMARY KEY (`CityID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `city` */

insert  into `city`(`CityID`,`CityName`,`ProvinceID`) values (1,'Bancroft',1),(2,'Barrie',1),(3,'Belleville',1),(4,'Brampton',1),(5,'Brantford',1),(6,'Brockville',1),(7,'Burlington',1),(8,'Cambridge',1),(9,'Toronto',1),(10,'Asbestos',2),(11,'Baie-Comeau',2),(12,'Beloeil',2),(13,'Quebec',2),(14,'Baddeck',3),(15,'Digby',3),(16,'Glace Bay',3),(17,'Halifax',3),(18,'Liverpool',3);

/*Table structure for table `personaldetails` */

DROP TABLE IF EXISTS `personaldetails`;

CREATE TABLE `personaldetails` (
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `birthdate` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phonenumber` varchar(15) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `note` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `personaldetails` */

insert  into `personaldetails`(`username`,`birthdate`,`phonenumber`,`firstname`,`lastname`,`province`,`city`,`email`,`note`) values ('user1','11-10-1997','0123456789','Test','Cool','','a@gmail.com',NULL,'');

/*Table structure for table `province` */

DROP TABLE IF EXISTS `province`;

CREATE TABLE `province` (
  `ProvinceId` int(11) NOT NULL AUTO_INCREMENT,
  `ProvinceName` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`ProvinceId`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `province` */

insert  into `province`(`ProvinceId`,`ProvinceName`) values (1,'Ontario'),(2,'Quebec'),(3,'Nova Scotia'),(4,'New Brunswick'),(5,'Manitoba'),(6,'British Columbia'),(7,'Prince Edward Island'),(8,'Saskatchewan'),(9,'Alberta'),(10,'Newfoundland and Labrador');

/*Table structure for table `staff_manager` */

DROP TABLE IF EXISTS `staff_manager`;

CREATE TABLE `staff_manager` (
  `StaffId` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ManagerID` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `staff_manager` */

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `Username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `Password` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `UserType` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`Username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`Username`,`Password`,`Email`,`UserType`) values ('admin','$2y$10$oMmtNpHmYW5M0TqwF4kh7e6b0m3QAeT0edBsVk80TtQ','admin@gmail.com','admin'),('user1','$2y$10$4kBhoZTvDhUNmdMWHLCCheNrPplUr1T4shiAWirDZAIyUtPO.ibe.','user1@gmail.com','manager'),('user2','$2y$10$WgkN1EmWcVz0mDPElRBR9ugYILJOiAnS5uvvIKEsqO9','user2@gmail.com','staff');

/*Table structure for table `users_login` */

DROP TABLE IF EXISTS `users_login`;

CREATE TABLE `users_login` (
  `Id` bigint(20) NOT NULL AUTO_INCREMENT,
  `Username` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LoginTime` int(10) NOT NULL,
  `Status` tinyint(4) DEFAULT '0',
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `users_login` */

insert  into `users_login`(`Id`,`Username`,`LoginTime`,`Status`) values (18,'user1',1512383227,0),(19,'user1',1512383376,0),(20,'user1',1512384383,0),(21,'user1',1512384480,0),(22,'user1',1512384588,1),(23,'user1',1512414718,1);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
