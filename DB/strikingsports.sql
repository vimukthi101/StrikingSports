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
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;

/*Data for the table `address` */

insert  into `address`(`address_id`,`address_no`,`address_lane`,`address_city`) values (260,'3/15A','Gangarama Road','Piliyandala');

/*Table structure for table `blog_post` */

DROP TABLE IF EXISTS `blog_post`;

CREATE TABLE `blog_post` (
  `created_date_time` datetime NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(400) NOT NULL,
  `post` longblob NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '0',
  `staff_email` varchar(100) NOT NULL,
  `tag` text,
  `category_id` int(11) NOT NULL,
  `views` int(11) DEFAULT '0',
  `image` longblob,
  `approved_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`post_id`),
  KEY `fk_blog_post_staff1_idx` (`staff_email`),
  CONSTRAINT `fk_blog_post_staff1` FOREIGN KEY (`staff_email`) REFERENCES `staff` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

/*Data for the table `blog_post` */

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category`) values (1,'Cricket'),(2,'BasketBall'),(3,'Baseball'),(5,'Rugby'),(6,'Football');

/*Table structure for table `comment_like` */

DROP TABLE IF EXISTS `comment_like`;

CREATE TABLE `comment_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `users_email` varchar(200) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `comment_like` */

/*Table structure for table `comments` */

DROP TABLE IF EXISTS `comments`;

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comments` longtext NOT NULL,
  `comment_date_time` datetime NOT NULL,
  `blog_post_post_id` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  PRIMARY KEY (`comment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

/*Table structure for table `events` */

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL AUTO_INCREMENT,
  `event_name` varchar(100) NOT NULL,
  `place` varchar(100) DEFAULT NULL,
  `information` longblob NOT NULL,
  `event_image` longblob NOT NULL,
  `event_date` datetime DEFAULT NULL,
  `event_category` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `approved_by` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`event_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

/*Data for the table `events` */

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `blog_post_id` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

/*Data for the table `likes` */

/*Table structure for table `name` */

DROP TABLE IF EXISTS `name`;

CREATE TABLE `name` (
  `name_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  PRIMARY KEY (`name_id`)
) ENGINE=InnoDB AUTO_INCREMENT=261 DEFAULT CHARSET=utf8;

/*Data for the table `name` */

insert  into `name`(`name_id`,`first_name`,`second_name`,`last_name`) values (260,'Vimukthi',NULL,'Saranga');

/*Table structure for table `reply_comment_likes` */

DROP TABLE IF EXISTS `reply_comment_likes`;

CREATE TABLE `reply_comment_likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  `reply_comment_id` int(11) NOT NULL,
  `users_email` varchar(200) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reply_comment_likes` */

/*Table structure for table `reply_comments` */

DROP TABLE IF EXISTS `reply_comments`;

CREATE TABLE `reply_comments` (
  `reply_comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `comment_id` int(11) NOT NULL,
  `reply_commet` longtext NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `reply_date_time` datetime NOT NULL,
  PRIMARY KEY (`reply_comment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `reply_comments` */

/*Table structure for table `staff` */

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `email` varchar(100) NOT NULL,
  `password` varchar(32) DEFAULT NULL,
  `previous_password` varchar(32) DEFAULT NULL,
  `registered_date_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `login_attempt` int(11) DEFAULT NULL,
  `contact_no` varchar(10) DEFAULT NULL,
  `address_address_id` int(11) NOT NULL,
  `name_name_id` int(11) NOT NULL,
  `position` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`email`),
  UNIQUE KEY `email_UNIQUE` (`email`),
  KEY `fk_staff_address_idx` (`address_address_id`),
  KEY `fk_staff_name1_idx` (`name_name_id`),
  CONSTRAINT `fk_staff_address` FOREIGN KEY (`address_address_id`) REFERENCES `address` (`address_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_staff_name1` FOREIGN KEY (`name_name_id`) REFERENCES `name` (`name_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staff` */

insert  into `staff`(`email`,`password`,`previous_password`,`registered_date_time`,`status`,`login_attempt`,`contact_no`,`address_address_id`,`name_name_id`,`position`) values ('vimukthisaranga1@gmail.com','64cf2e97c4d5bda2ca66ce44cc06136a','098f6bcd4621d373cade4e832627b4f6','2017-10-23 21:41:00',1,0,'0711790372',260,260,0);

/*Table structure for table `staff_lockout` */

DROP TABLE IF EXISTS `staff_lockout`;

CREATE TABLE `staff_lockout` (
  `email` varchar(100) NOT NULL,
  `lockout_remove_time` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `staff_lockout` */

/*Table structure for table `user_lockout` */

DROP TABLE IF EXISTS `user_lockout`;

CREATE TABLE `user_lockout` (
  `email` varchar(100) NOT NULL,
  `lockout_remove_time` datetime NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_lockout` */

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
