/*
SQLyog Ultimate v8.55 
MySQL - 5.5.5-10.1.8-MariaDB : Database - strikingsports
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`strikingsports` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `strikingsports`;

/*Table structure for table `address` */

DROP TABLE IF EXISTS `address`;

CREATE TABLE `address` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_no` varchar(10) NOT NULL,
  `address_lane` varchar(40) NOT NULL,
  `address_city` varchar(30) NOT NULL,
  PRIMARY KEY (`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

/*Data for the table `address` */

insert  into `address`(`address_id`,`address_no`,`address_lane`,`address_city`) values (249,'3/15A','Gangarama Road','Piliyandala');

/*Table structure for table `name` */

DROP TABLE IF EXISTS `name`;

CREATE TABLE `name` (
  `name_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  PRIMARY KEY (`name_id`)
) ENGINE=InnoDB AUTO_INCREMENT=250 DEFAULT CHARSET=utf8;

/*Data for the table `name` */

insert  into `name`(`name_id`,`first_name`,`second_name`,`last_name`) values (249,'Vimukthi','','Saranga');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `email` varchar(50) NOT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `registered_date_time` datetime NOT NULL,
  `status` int(1) NOT NULL,
  `address_address_id` int(11) NOT NULL,
  `name_name_id` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  `previous_password` varchar(32) DEFAULT NULL,
  `login_attempt` int(11) DEFAULT '0',
  PRIMARY KEY (`email`),
  KEY `fk_commuter_address1_idx` (`address_address_id`),
  KEY `fk_commuter_name1_idx` (`name_name_id`),
  CONSTRAINT `fk_commuter_address1` FOREIGN KEY (`address_address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_commuter_name1` FOREIGN KEY (`name_name_id`) REFERENCES `name` (`name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`email`,`contact_no`,`registered_date_time`,`status`,`address_address_id`,`name_name_id`,`password`,`previous_password`,`login_attempt`) values ('v.saranga@yahoo.com','0711790372','2017-08-07 10:43:02',1,249,249,'098f6bcd4621d373cade4e832627b4f6','098f6bcd4621d373cade4e832627b4f6',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
