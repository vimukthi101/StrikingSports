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
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;

/*Data for the table `address` */

insert  into `address`(`address_id`,`address_no`,`address_lane`,`address_city`) values (253,'3/15A','Gangarama Road','Piliyandala');

/*Table structure for table `blog_post` */

DROP TABLE IF EXISTS `blog_post`;

CREATE TABLE `blog_post` (
  `created_date_time` datetime NOT NULL,
  `title` varchar(256) NOT NULL,
  `description` varchar(400) NOT NULL,
  `post` blob NOT NULL,
  `post_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '0',
  `staff_email` varchar(100) NOT NULL,
  `tag` text,
  `category_id` int(11) NOT NULL,
  `views` int(11) DEFAULT '0',
  PRIMARY KEY (`post_id`),
  KEY `fk_blog_post_staff1_idx` (`staff_email`),
  CONSTRAINT `fk_blog_post_staff1` FOREIGN KEY (`staff_email`) REFERENCES `staff` (`email`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `blog_post` */

insert  into `blog_post`(`created_date_time`,`title`,`description`,`post`,`post_id`,`status`,`staff_email`,`tag`,`category_id`,`views`) values ('2017-08-14 22:43:35','xas','axsx','<p>asdsfdvcsd</p>',1,1,'v.saranga@yahoo.com','asd',2,0),('2017-08-14 22:45:31','xasdas','cassa','<p>csac</p>',2,1,'v.saranga@yahoo.com','csac',3,0),('2017-08-14 22:46:14','csdc','cs','<p>cd</p>',3,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:46:52','csdc','cs','<p>cd</p>',4,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:46:56','csdc','cs','<p>cd</p>',5,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:47:05','csdc','cs','<p>cd</p>',6,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:47:20','csdc','cs','<p>cd</p>',7,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:48:38','csdc','cs','<p>cd</p>',8,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:48:40','csdc','cs','<p>cd</p>',9,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:48:51','csdc','cs','<p>cd</p>',10,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:49:16','csdc','cs','<p>cd</p>',11,1,'v.saranga@yahoo.com','csd',2,0),('2017-08-14 22:49:35','sfsd','cdsc','<p>cd</p>',12,1,'v.saranga@yahoo.com','csdc',1,0),('2017-08-14 22:50:18','sac','csdc','<p>cds</p>',13,1,'v.saranga@yahoo.com','csd',1,0),('2017-08-14 22:50:40','Apache Cassandra - Part 07 (Java API)','Throughout the last 6 posts we talked about different aspects of Apache Cassandra. But all those posts were related to working on the cqlsh. So from this post you can get an idea about the Java API for Apache Cassandra. After going through this post, you can get a clear idea about how to create a program in Java using the Apache Cassandra.','Throughout the last 6 posts we talked about different aspects of Apache Cassandra. But all those posts were related to working on the cqlsh. So from this post you can get an idea about the Java API for Apache Cassandra. After going through this post, you can get a clear idea about how to create a program in Java using the Apache Cassandra.\r\n\r\nHere I’m using Intelij IDEA as my IDE, Cassandra 3.9 and JDK 8.\r\n\r\nFirst of all let’s see about the dependencies need for the project. We can add those to the pom and make the environment ready for our program.\r\n\r\nslf4j-api\r\nslf4j-simple\r\ncassandra-driver-core\r\nguava\r\nmetrics-core\r\nnetty\r\nHere is the pom.xml after adding those dependencies,\r\n\r\n<?xml version=\"1.0\" encoding=\"UTF-8\"?>\r\n<project xmlns=\"http://maven.apache.org/POM/4.0.0\"\r\n         xmlns:xsi=\"http://www.w3.org/2001/XMLSchema-instance\"\r\n         xsi:schemaLocation=\"http://maven.apache.org/POM/4.0.0 http://maven.apache.org/xsd/maven-4.0.0.xsd\">\r\n    <modelVersion>4.0.0</modelVersion>\r\n\r\n    <groupId>Cassandra</groupId>\r\n    <artifactId>Example</artifactId>\r\n    <version>1.0-SNAPSHOT</version>\r\n\r\n    <dependencies>\r\n        <dependency>\r\n            <groupId>org.slf4j</groupId>\r\n            <artifactId>slf4j-api</artifactId>\r\n            <version>1.7.5</version>\r\n        </dependency>\r\n\r\n        <dependency>\r\n            <groupId>org.slf4j</groupId>\r\n            <artifactId>slf4j-simple</artifactId>\r\n            <version>1.6.4</version>\r\n        </dependency>\r\n\r\n        <dependency>\r\n            <groupId>com.datastax.cassandra</groupId>\r\n            <artifactId>cassandra-driver-core</artifactId>\r\n            <version>3.1.0</version>\r\n        </dependency>\r\n\r\n        <dependency>\r\n            <groupId>com.google.guava</groupId>\r\n            <artifactId>guava</artifactId>\r\n            <version>16.0.1</version>\r\n        </dependency>\r\n\r\n        <dependency>\r\n            <groupId>com.codahale.metrics</groupId>\r\n            <artifactId>metrics-core</artifactId>\r\n            <version>3.0.2</version>\r\n        </dependency>\r\n\r\n        <dependency>\r\n            <groupId>io.netty</groupId>\r\n            <artifactId>netty</artifactId>\r\n            <version>3.9.0.Final</version>\r\n        </dependency>\r\n    </dependencies>\r\n\r\n</project>\r\nNow we are ready to work with the Cassandra Java API.\r\n\r\nFirst of all we need to create a Cluster instance. We can do that by simply calling the Cluster class.\r\n\r\ncom.datastax.driver.core.Cluster\r\nLets’ see how to do that,\r\n\r\nCluster myCluster = Cluster.builder()\r\n.addContactPoint(\"127.0.0.1\")\r\n.withPort(9042)\r\n.withCredentials(\"ajuba\",\"ajuba\")\r\n.build();\r\nUsing the .addContactPoint() we can connect to the relevant Cassandra server. Here I’m using the server on my local host, that’s why I put ‘127.0.0.1’. You can replace it with the relevant IP of the machine where the Cassandra Server is running. Next .withPort() will specify the port to connect. You can ignore that of the Cassandra is running on the default port, 9042. Third .withCredentials() specify the user name and the password for the Cassandra user. If we haven’t enable the authenticator on the cassandra.yaml, then this is no needed. Check previous posts for enabling authenticator and authorizor. Finally we are creating the cluster by calling the .build().\r\n\r\nNow we have the Cluster instance. Next we need to create a session,\r\n\r\ncom.datastax.driver.core.Session\r\nLet’s see how to do that,\r\n\r\nSession mySession = myCluster.connect();\r\nHere we are using the previously created Cluster instance and calling the connect() to create a session. Now we are all done and we simply can execute cql queries using the .execute().\r\n\r\nmySession.execute(query);\r\nThen the last thing to do is to close the connection we have created,\r\n\r\nmySession.close();\r\nmyCluster.close();\r\nUsing the Java API for Apache Cassandra is very simple. Here is the full example classes,\r\n\r\nimport com.datastax.driver.core.Cluster;\r\nimport com.datastax.driver.core.Session;\r\n\r\n/**\r\n * Created by vimukthi on 1/9/17.\r\n */\r\npublic class DBConnection {\r\n\r\n    protected static Cluster myCluster;\r\n    protected static Session mySession;\r\n\r\n    public static void dbConnection(){\r\n        try {\r\n            //new instance of Cluster\r\n            myCluster = Cluster.builder().addContactPoint(\"127.0.0.1\").withPort(9042).withCredentials(\"ajuba\",\"ajuba\").build();\r\n            //new instance of Session\r\n            mySession = myCluster.connect();\r\n        } catch(Exception ex){\r\n            ex.printStackTrace();\r\n        }\r\n    }\r\n}\r\nimport com.datastax.driver.core.ResultSet;\r\n\r\n/**\r\n * Created by vimukthi on 12/27/16.\r\n */\r\npublic class Test extends DBConnection {\r\n\r\n    private static String db = \"ajuba\";\r\n    private static String table = \"employee\";\r\n    private static String query;\r\n\r\n    public static void main(String[] args) {\r\n        //create the data base connection\r\n        dbConnection();\r\n        //data definition language\r\n        ddl();\r\n        //data manipulation language\r\n        dml();\r\n        //close the db connection\r\n        mySession.close();\r\n        myCluster.close();\r\n    }\r\n\r\n    public static void ddl(){\r\n        //create key space\r\n        createKeySpace();\r\n        //use key space\r\n        useKeySpace();\r\n        //alter keyspace\r\n        alterKeySpace();\r\n        //create table\r\n        createTable();\r\n        //select data\r\n        select();\r\n        //alter table\r\n        alterTable();\r\n        //select data\r\n        select();\r\n        //drop table\r\n        dropTable();\r\n        //drop keyspace\r\n        dropKeySpace();\r\n    }\r\n\r\n    public static void dml(){\r\n        //insert to table\r\n        insert();\r\n        //select data\r\n        select();\r\n        //update data\r\n        update();\r\n        //select data\r\n        select();\r\n        //delete data\r\n        delete();\r\n        //select data\r\n        select();\r\n        //truncate table\r\n        truncateTable();\r\n        //select data\r\n        select();\r\n    }\r\n\r\n    public static void executeQuery(String query, String message){\r\n        try {\r\n            //execute the query\r\n            mySession.execute(query);\r\n            System.out.println(message);\r\n        } catch(Exception ex){\r\n            ex.printStackTrace();\r\n        }\r\n    }\r\n\r\n    public static void executeQuery(String query){\r\n        try {\r\n            //execute the query and get the result set\r\n            ResultSet result = mySession.execute(query);\r\n            System.out.println(result.getColumnDefinitions());\r\n            System.out.println(result.all());\r\n        } catch(Exception ex){\r\n            ex.printStackTrace();\r\n        }\r\n    }\r\n\r\n    public static void createKeySpace(){\r\n        //create key space\r\n        query = \"CREATE KEYSPACE IF NOT EXISTS \" + db + \" WITH replication = {\'class\': \'SimpleStrategy\', \'replication_factor\': 3}\";\r\n        executeQuery(query, \"Created Key Space \" + db);\r\n    }\r\n\r\n    public static void useKeySpace(){\r\n        //use key space\r\n        query = \"USE \" + db;\r\n        executeQuery(query, \"Selected Key Space \" + db);\r\n    }\r\n\r\n    public static void alterKeySpace(){\r\n        //alter key space\r\n        query = \"ALTER KEYSPACE \" + db + \" WITH replication = {\'class\': \'SimpleStrategy\', \'replication_factor\': 1} AND durable_writes = \'true\'\";\r\n        executeQuery(query, \"Altered Key Space \" + db);\r\n    }\r\n\r\n    public static void createTable(){\r\n        //create table\r\n        query = \"CREATE TABLE \" + table + \"(emp_id int PRIMARY KEY, emp_name varchar, address varchar)\";\r\n        executeQuery(query, \"Created Table \" + table);\r\n    }\r\n\r\n    public static void alterTable(){\r\n        //alter table\r\n        query = \"ALTER TABLE \" + table + \" ADD emp_email text\";\r\n        executeQuery(query, \"Altered Table \" + table);\r\n    }\r\n\r\n    public static void insert(){\r\n        //insert to table\r\n        query = \"INSERT INTO \" + table + \"(emp_id, emp_name, address, emp_email) values (1,\'vimukthi\',\'piliyandala\',\'vimukthis@hsenidmobile.com\')\";\r\n        executeQuery(query, \"Inserted Record 01 To Table \" + table);\r\n        query = \"INSERT INTO \" + table + \"(emp_id, emp_name, address, emp_email) values (2,\'saranga\',\'moratuwa\',\'saranga@hsenidmobile.com\')\";\r\n        executeQuery(query, \"Inserted Record 02 To Table \" + table);\r\n        query = \"INSERT INTO \" + table + \"(emp_id, emp_name, address, emp_email) values (3,\'hSenid\',\'colombo\',\'info@hsenidmobile.com\')\";\r\n        executeQuery(query, \"Inserted Record 03 To Table \" + table);\r\n    }\r\n\r\n    public static void select(){\r\n        //select data\r\n        query = \"SELECT * FROM \" + table;\r\n        executeQuery(query);\r\n    }\r\n\r\n    public static void update(){\r\n        //update data\r\n        query = \"UPDATE \" + table + \" SET address = \'maharagama\' WHERE emp_id =2\";\r\n        executeQuery(query, \"Update Record 02 On Table \" + table);\r\n    }\r\n\r\n    public static void delete(){\r\n        //delete data\r\n        query = \"DELETE FROM \" + table + \" WHERE emp_id =3\";\r\n        executeQuery(query, \"Deleted Record 03 From Table \" + table);\r\n    }\r\n\r\n    public static void truncateTable(){\r\n        //truncate table\r\n        query = \"TRUNCATE TABLE \" + table;\r\n        executeQuery(query, \"Truncated Table \" + table);\r\n    }\r\n\r\n    public static void dropTable(){\r\n        //drop table\r\n        query = \"DROP TABLE \" + table;\r\n        executeQuery(query, \"Dropped Table \" + table);\r\n    }\r\n\r\n    public static void dropKeySpace(){\r\n        //drop key space\r\n        query = \"DROP KEYSPACE \" + db;\r\n        executeQuery(query, \"Dropped Key Space \" + db);\r\n    }\r\n}\r\nHope now you have a clear idea about how to use the Cassandra Java API. Hopefully now we have covered almost all the areas of Apache Cassandra. Hope to see you soon with another interesting topic. Thank You!',14,0,'v.saranga@yahoo.com','apache, api, cassandra, class, cql, cqlsh, ddl, dml, java, maven, pom, Programming',2,10);

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) NOT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`category_id`,`category`) values (1,'Cricket'),(2,'BasketBall'),(3,'Baseball'),(4,'Football'),(5,'Rugby');

/*Table structure for table `comment_like` */

DROP TABLE IF EXISTS `comment_like`;

CREATE TABLE `comment_like` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(1) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `users_email` varchar(200) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `comments` */

insert  into `comments`(`comment_id`,`comments`,`comment_date_time`,`blog_post_post_id`,`users_email`) values (1,'ASDBSKNCDSN','2017-08-09 10:20:30',14,'v.saranga@yahoo.com'),(2,'cascascsa','2017-08-06 20:05:15',14,'hello@gmail.com'),(3,'cdscds','2017-10-20 00:00:00',14,'dasd@gmail.com'),(4,'a','2018-08-09 10:20:30',14,'v.saranga@yahoo.com'),(5,'(Y) &lt;3','2017-08-19 10:44:21',14,'v.saranga@yahoo.com');

/*Table structure for table `likes` */

DROP TABLE IF EXISTS `likes`;

CREATE TABLE `likes` (
  `like_id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT NULL,
  `blog_post_id` int(11) NOT NULL,
  `users_email` varchar(50) NOT NULL,
  PRIMARY KEY (`like_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

/*Data for the table `likes` */

insert  into `likes`(`like_id`,`status`,`blog_post_id`,`users_email`) values (21,0,14,'v.saranga@yahoo.com');

/*Table structure for table `name` */

DROP TABLE IF EXISTS `name`;

CREATE TABLE `name` (
  `name_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `second_name` varchar(20) DEFAULT NULL,
  `last_name` varchar(20) NOT NULL,
  PRIMARY KEY (`name_id`)
) ENGINE=InnoDB AUTO_INCREMENT=254 DEFAULT CHARSET=utf8;

/*Data for the table `name` */

insert  into `name`(`name_id`,`first_name`,`second_name`,`last_name`) values (253,'Vimukthi','','Saranga');

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

insert  into `staff`(`email`,`password`,`previous_password`,`registered_date_time`,`status`,`login_attempt`,`contact_no`,`address_address_id`,`name_name_id`,`position`) values ('v.saranga@yahoo.com','098f6bcd4621d373cade4e832627b4f6','098f6bcd4621d373cade4e832627b4f6','2017-08-09 10:50:00',1,0,'0711790372',253,253,1),('vimukthisaranga1@gmail.com','098f6bcd4621d373cade4e832627b4f6','098f6bcd4621d373cade4e832627b4f6','2017-08-10 23:15:56',1,0,'011260818',253,253,0);

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

insert  into `users`(`email`,`contact_no`,`registered_date_time`,`status`,`address_address_id`,`name_name_id`,`password`,`previous_password`,`login_attempt`) values ('v.saranga@yahoo.com','0711790372','2017-08-08 22:07:49',1,253,253,'098f6bcd4621d373cade4e832627b4f6','a102dcd9306cc398a0a8c749254525ce',0),('vimukthi@gmail.com','0112608198','2017-08-10 20:05:06',1,253,253,'098f6bcd4621d373cade4e832627b4f6','098f6bcd4621d373cade4e832627b4f6',0);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
