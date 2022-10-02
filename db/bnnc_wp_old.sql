/*
SQLyog Ultimate v12.09 (64 bit)
MySQL - 5.6.25 : Database - bnnc_wp
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`bnnc_wp` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `bnnc_wp`;

/*Table structure for table `activities` */

DROP TABLE IF EXISTS `activities`;

CREATE TABLE `activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `activity_name` varchar(1000) DEFAULT NULL,
  `thematic_area` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `thematic_area` (`thematic_area`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `activities` */

insert  into `activities`(`id`,`activity_name`,`thematic_area`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Execute the M&E framework of NPAN2',2,1,57,'2021-10-17 12:48:45',NULL,NULL),(2,'Review progress of NPAN2  to produce reports ',2,1,57,'2021-10-17 12:49:08',NULL,NULL);

/*Table structure for table `fiscal_year` */

DROP TABLE IF EXISTS `fiscal_year`;

CREATE TABLE `fiscal_year` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fiscal_year` varchar(10) DEFAULT NULL,
  `row_color` varchar(20) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `fiscal_year` */

insert  into `fiscal_year`(`id`,`fiscal_year`,`row_color`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'2019-2020','#fcb2ae',1,1,'2021-04-23 22:00:50',1,'2021-06-22 15:51:15'),(2,'2020-2021','#c7dcfc',1,1,'2021-04-23 22:16:25',1,'2021-06-22 16:13:10');

/*Table structure for table `indicators` */

DROP TABLE IF EXISTS `indicators`;

CREATE TABLE `indicators` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indicator_name` varchar(1000) DEFAULT NULL,
  `sub_activity_id` int(11) DEFAULT NULL,
  `unit_of_indicator` varchar(255) DEFAULT NULL,
  `unit_of_measure` text,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sub_activity_id` (`sub_activity_id`),
  KEY `is_active` (`is_active`),
  KEY `unit_of_indicator` (`unit_of_indicator`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `indicators` */

insert  into `indicators`(`id`,`indicator_name`,`sub_activity_id`,`unit_of_indicator`,`unit_of_measure`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Review of NPAN2 (64 nutrition indicators monitored)',1,NULL,NULL,1,57,'2021-10-17 12:54:56',NULL,NULL),(2,'Bi-annual  publication(s) produced and shared',2,NULL,NULL,1,57,'2021-10-17 12:55:28',NULL,NULL);

/*Table structure for table `login_history` */

DROP TABLE IF EXISTS `login_history`;

CREATE TABLE `login_history` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `mode` tinytext COLLATE utf8_unicode_ci,
  `date_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=529 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

/*Data for the table `login_history` */

insert  into `login_history`(`id`,`user_id`,`mode`,`date_time`) values (1,1,'Login','2020-01-19 00:23:21'),(2,1,'Login','2020-01-19 00:32:32'),(3,NULL,'Login','2020-01-19 00:37:30'),(4,NULL,'Login','2020-01-19 00:37:37'),(5,NULL,'Login','2020-01-19 00:38:22'),(6,NULL,'Login','2020-01-19 00:39:45'),(7,NULL,'Login','2020-01-19 00:40:47'),(8,NULL,'Login','2020-01-19 00:42:26'),(9,1,'Login','2020-01-19 00:44:12'),(10,1,'Login','2020-01-19 00:51:10'),(11,1,'Login','2020-01-19 00:52:04'),(12,2,'Login','2020-01-19 00:58:29'),(13,2,'Login','2020-01-19 01:07:38'),(14,1,'Login','2020-01-19 01:09:37'),(15,1,'Login','2020-01-19 01:12:38'),(16,2,'Login','2020-01-19 01:13:59'),(17,1,'Login','2020-01-19 01:17:08'),(18,1,'Login','2020-01-19 01:18:20'),(19,2,'Login','2020-01-19 01:22:14'),(20,2,'Login','2020-01-19 01:22:43'),(21,1,'Login','2020-01-19 10:43:12'),(22,1,'Login','2020-01-19 13:44:56'),(23,1,'Login','2020-01-19 22:42:49'),(24,1,'Login','2020-01-19 23:47:48'),(25,2,'Login','2020-01-19 23:48:51'),(26,1,'Login','2020-01-23 15:31:12'),(27,2,'Login','2020-01-23 16:32:34'),(28,2,'Login','2020-01-23 16:38:56'),(29,1,'Login','2020-01-23 16:53:25'),(30,2,'Login','2020-01-23 23:27:13'),(31,2,'Login','2020-01-24 09:07:13'),(32,2,'Login','2020-01-24 16:58:16'),(33,2,'Login','2020-01-25 08:23:56'),(34,1,'Login','2020-01-25 08:35:41'),(35,2,'Login','2020-01-25 08:37:28'),(36,2,'Login','2020-01-25 08:37:35'),(37,2,'Login','2020-01-25 08:38:01'),(38,2,'Login','2020-01-25 08:39:02'),(39,2,'Login','2020-01-25 08:40:07'),(40,1,'Login','2020-01-25 08:40:40'),(41,2,'Login','2020-01-25 08:41:10'),(42,2,'Login','2020-01-25 11:18:12'),(43,2,'Login','2020-01-27 21:30:08'),(44,2,'Login','2020-01-27 21:47:17'),(45,3,'Login','2020-01-27 21:49:30'),(46,2,'Login','2020-01-27 22:02:35'),(47,2,'Login','2020-01-28 21:01:00'),(48,2,'Login','2020-01-29 14:33:53'),(49,2,'Login','2020-01-30 14:05:58'),(50,2,'Login','2020-01-31 16:18:14'),(51,1085,'Login','2020-02-02 23:41:25'),(52,1044,'Login','2020-02-02 23:44:17'),(53,1027,'Login','2020-02-02 23:46:54'),(54,1027,'Login','2020-02-03 10:56:31'),(55,1027,'Login','2020-02-03 10:59:14'),(56,1048,'Login','2020-02-03 11:01:52'),(57,1065,'Login','2020-02-03 11:03:48'),(58,1243,'Login','2020-02-03 11:46:23'),(59,1032,'Login','2020-02-03 11:47:39'),(60,1066,'Login','2020-02-03 11:48:53'),(61,1079,'Login','2020-02-03 11:49:55'),(62,1084,'Login','2020-02-03 11:51:42'),(63,1085,'Login','2020-02-03 11:53:56'),(64,1036,'Login','2020-02-03 11:55:20'),(65,1089,'Login','2020-02-03 11:56:26'),(66,1118,'Login','2020-02-03 11:58:39'),(67,1228,'Login','2020-02-03 12:00:04'),(68,1253,'Login','2020-02-03 12:01:29'),(69,1266,'Login','2020-02-03 12:03:19'),(70,1379,'Login','2020-02-03 12:04:18'),(71,1432,'Login','2020-02-03 12:05:39'),(72,1538,'Login','2020-02-03 12:06:34'),(73,1579,'Login','2020-02-03 12:16:06'),(74,1243,'Login','2020-02-07 16:18:37'),(75,1243,'Login','2020-02-07 23:13:34'),(76,1243,'Login','2020-02-08 17:42:21'),(77,1243,'Login','2020-02-08 22:33:23'),(78,1243,'Login','2020-02-09 23:00:42'),(79,1243,'Login','2020-02-10 22:20:16'),(80,1243,'Login','2020-02-11 22:58:22'),(81,1243,'Login','2020-02-12 13:14:58'),(82,1243,'Login','2020-02-17 23:16:20'),(83,1243,'Login','2020-02-18 08:04:29'),(84,1243,'Login','2020-02-21 12:35:45'),(85,1243,'Login','2020-02-21 23:03:42'),(86,1243,'Login','2020-02-22 10:17:28'),(87,1243,'Login','2020-02-22 21:54:13'),(88,1243,'Login','2020-02-23 10:36:25'),(89,1243,'Login','2020-02-26 00:10:57'),(90,1091,'Login','2020-02-26 00:16:58'),(91,1243,'Login','2020-02-26 11:03:38'),(92,1091,'Login','2020-02-26 11:04:00'),(93,1243,'Login','2020-02-26 22:18:17'),(94,1091,'Login','2020-02-26 23:40:39'),(95,1243,'Login','2020-02-27 10:21:07'),(96,1243,'Login','2020-02-28 14:44:35'),(97,1243,'Login','2020-02-28 22:58:46'),(98,1091,'Login','2020-02-28 23:17:00'),(99,1091,'Login','2020-02-29 09:20:44'),(100,1243,'Login','2020-02-29 23:29:02'),(101,1,'Login','2020-02-29 23:42:17'),(102,1,'Login','2020-02-29 23:45:04'),(103,1243,'Login','2020-02-29 23:46:07'),(104,1243,'Login','2020-03-07 18:16:54'),(105,1243,'Login','2020-03-08 11:15:15'),(106,1243,'Login','2020-03-08 11:16:35'),(107,1243,'Login','2020-03-09 23:21:30'),(108,1,'Login','2020-03-10 00:05:08'),(109,1,'Login','2020-03-10 00:06:37'),(110,1,'Login','2020-03-10 00:07:15'),(111,1243,'Login','2020-03-10 00:26:43'),(112,1,'Login','2020-03-10 00:27:10'),(113,1,'Login','2020-03-13 13:43:42'),(114,1243,'Login','2020-03-13 14:12:57'),(115,1,'Login','2020-03-13 14:23:54'),(116,1243,'Login','2020-03-13 15:11:50'),(117,1,'Login','2020-03-17 19:44:31'),(118,2,'Login','2020-04-09 20:38:44'),(119,2,'Login','2020-04-09 20:57:12'),(120,1,'Login','2020-04-09 20:57:41'),(121,1,'Login','2020-04-09 21:17:19'),(122,1,'Login','2020-04-11 22:16:44'),(123,2,'Login','2020-04-13 23:05:07'),(124,1,'Login','2020-04-13 23:37:57'),(125,2,'Login','2020-04-13 23:45:48'),(126,1,'Login','2020-04-15 13:42:01'),(127,2,'Login','2020-04-15 16:37:23'),(128,1,'Login','2020-04-15 16:47:07'),(129,1,'Login','2020-04-19 21:43:26'),(130,1,'Login','2020-04-20 22:18:41'),(131,1,'Login','2020-04-23 11:30:58'),(132,1,'Login','2020-04-24 14:27:33'),(133,1,'Login','2020-04-24 17:06:53'),(134,1,'Login','2020-04-24 21:32:46'),(135,1,'Login','2020-04-25 11:28:13'),(136,1,'Login','2020-04-25 22:18:24'),(137,1,'Login','2020-04-26 17:41:03'),(138,1,'Login','2020-04-26 21:06:24'),(139,1,'Login','2020-04-27 10:26:50'),(140,1,'Login','2020-04-27 13:46:04'),(141,1,'Login','2020-04-28 22:18:07'),(142,1,'Login','2020-04-30 14:23:13'),(143,1,'Login','2020-05-01 10:35:43'),(144,1,'Login','2020-05-01 16:05:51'),(145,1,'Login','2020-05-01 22:41:15'),(146,1,'Login','2020-05-02 11:07:23'),(147,1,'Login','2020-05-02 21:20:11'),(148,1,'Login','2020-05-03 09:41:14'),(149,1,'Login','2020-05-03 15:16:57'),(150,1,'Login','2020-05-03 21:14:59'),(151,1,'Login','2020-05-04 00:56:31'),(152,1,'Login','2020-05-04 11:16:02'),(153,1,'Login','2020-05-07 10:22:35'),(154,1,'Login','2020-05-09 11:41:26'),(155,1,'Login','2020-05-09 22:10:22'),(156,1,'Login','2020-05-19 23:26:34'),(157,1,'Login','2020-05-20 22:10:49'),(158,2,'Login','2020-05-20 22:33:46'),(159,1,'Login','2020-05-20 22:40:50'),(160,1,'Login','2020-05-21 10:53:42'),(161,1,'Login','2020-05-21 21:46:15'),(162,1,'Login','2020-05-22 23:00:48'),(163,1,'Login','2020-05-23 10:16:59'),(164,1,'Login','2020-05-23 22:16:52'),(165,1,'Login','2020-05-24 13:07:31'),(166,1,'Login','2020-05-26 10:55:59'),(167,1,'Login','2020-05-26 11:36:24'),(168,1,'Login','2020-05-26 16:51:53'),(169,1,'Login','2020-05-27 12:56:07'),(170,1,'Login','2020-05-29 14:57:43'),(171,1,'Login','2020-05-30 14:50:42'),(172,1,'Login','2020-05-30 21:30:45'),(173,1,'Login','2020-05-31 12:02:35'),(174,1,'Login','2020-05-31 14:38:23'),(175,1,'Login','2020-05-31 20:07:05'),(176,1,'Login','2020-06-02 10:57:02'),(177,1,'Login','2020-06-03 21:59:52'),(178,1,'Login','2020-06-10 09:35:31'),(179,1,'Login','2020-06-10 09:38:51'),(180,1,'Login','2020-06-12 22:18:57'),(181,1,'Login','2020-06-13 09:26:58'),(182,1,'Login','2020-06-13 20:43:25'),(183,1,'Login','2020-06-18 12:16:39'),(184,1,'Login','2020-06-19 22:03:53'),(185,1,'Login','2020-06-20 15:58:14'),(186,1,'Login','2020-06-20 19:06:30'),(187,1,'Login','2020-06-20 21:38:07'),(188,1,'Login','2020-06-20 21:45:01'),(189,1,'Login','2020-06-20 21:45:13'),(190,1,'Login','2020-06-21 17:36:19'),(191,1,'Login','2020-06-21 22:28:37'),(192,1,'Login','2020-06-22 11:32:21'),(193,1,'Login','2020-06-22 20:43:26'),(194,1,'Login','2020-06-23 17:02:31'),(195,1,'Login','2020-06-29 10:06:39'),(196,1,'Login','2020-06-29 10:46:19'),(197,1,'Login','2020-06-30 21:20:43'),(198,1,'Login','2020-07-01 20:39:42'),(199,1,'Login','2020-07-02 14:19:03'),(200,1,'Login','2020-07-02 19:26:13'),(201,1,'Login','2020-07-03 11:07:57'),(202,1,'Login','2020-07-03 21:52:00'),(203,1,'Login','2020-07-04 16:20:48'),(204,1,'Login','2020-07-05 21:18:50'),(205,1,'Login','2020-07-07 23:06:42'),(206,1,'Login','2020-07-08 21:49:09'),(207,1,'Login','2020-07-09 21:48:23'),(208,1,'Login','2020-07-10 11:42:03'),(209,1,'Login','2020-07-10 17:48:05'),(210,1,'Login','2020-07-10 22:14:41'),(211,1,'Login','2020-07-11 11:09:54'),(212,1,'Login','2020-07-11 16:44:51'),(213,1,'Login','2020-07-11 20:02:40'),(214,1,'Login','2020-07-11 22:32:19'),(215,1,'Login','2020-07-12 12:39:58'),(216,1,'Login','2020-07-13 00:01:08'),(217,1,'Login','2020-07-13 11:22:28'),(218,1,'Login','2020-07-13 11:31:36'),(219,1,'Login','2020-07-13 21:38:03'),(220,1,'Login','2020-07-13 21:42:16'),(221,1,'Login','2020-07-14 20:42:22'),(222,1,'Login','2020-07-14 20:50:12'),(223,1,'Login','2020-07-16 21:58:58'),(224,1,'Login','2020-07-17 23:14:33'),(225,1,'Login','2020-07-26 23:05:05'),(226,1,'Login','2020-07-27 22:52:32'),(227,1,'Login','2020-07-28 15:48:09'),(228,1,'Login','2020-07-30 08:43:16'),(229,1,'Login','2020-07-30 13:43:21'),(230,1,'Login','2020-07-30 16:22:49'),(231,1,'Login','2020-08-03 10:25:40'),(232,1,'Login','2020-08-03 10:34:56'),(233,1,'Login','2020-08-03 10:41:06'),(234,1,'Login','2020-08-03 11:12:07'),(235,1,'Login','2020-08-05 20:20:05'),(236,1,'Login','2020-08-05 22:07:30'),(237,1,'Login','2020-08-06 07:10:24'),(238,1,'Login','2020-08-06 07:38:32'),(239,1,'Login','2020-08-06 12:43:40'),(240,1,'Login','2020-08-07 21:59:18'),(241,1,'Login','2020-08-08 09:11:55'),(242,1,'Login','2020-08-08 17:59:31'),(243,1,'Login','2020-08-15 14:21:07'),(244,1,'Login','2020-08-17 21:38:23'),(245,1,'Login','2020-08-21 11:55:02'),(246,1,'Login','2020-08-21 22:37:29'),(247,1,'Login','2020-08-22 11:12:16'),(248,1,'Login','2020-08-22 18:10:33'),(249,1,'Login','2020-08-22 21:18:12'),(250,1,'Login','2020-08-25 22:32:14'),(251,1,'Login','2020-08-26 22:43:35'),(252,1,'Login','2020-08-29 07:44:30'),(253,1,'Login','2020-08-29 16:20:11'),(254,1,'Login','2020-08-30 09:26:57'),(255,1,'Login','2020-08-30 13:37:05'),(256,1,'Login','2020-08-30 18:40:01'),(257,1,'Login','2020-08-30 23:48:34'),(258,1,'Login','2020-09-05 11:28:50'),(259,1,'Login','2020-09-05 16:23:21'),(260,1,'Login','2020-09-10 22:22:25'),(261,1,'Login','2020-09-11 14:09:39'),(262,1,'Login','2020-09-11 17:36:49'),(263,1,'Login','2020-09-12 10:38:38'),(264,1,'Login','2020-09-13 22:25:55'),(265,1,'Login','2020-09-14 20:36:26'),(266,1,'Login','2020-09-14 22:37:56'),(267,1,'Login','2020-09-15 07:41:28'),(268,1,'Login','2020-09-15 23:56:20'),(269,1,'Login','2020-09-16 10:17:19'),(270,1,'Login','2020-09-17 21:20:34'),(271,1,'Login','2020-09-21 10:19:04'),(272,1,'Login','2020-09-23 11:13:43'),(273,1,'Login','2020-09-26 23:50:15'),(274,1,'Login','2020-09-27 09:56:58'),(275,1,'Login','2020-09-28 10:23:54'),(276,1,'Login','2020-09-30 12:19:34'),(277,1,'Login','2020-10-02 13:42:47'),(278,1,'Login','2020-10-03 11:11:34'),(279,1,'Login','2020-10-03 22:30:56'),(280,1,'Login','2020-10-04 23:52:08'),(281,1,'Login','2020-10-05 20:03:39'),(282,1,'Login','2020-10-06 20:47:41'),(283,1,'Login','2020-10-07 21:23:08'),(284,1,'Login','2020-10-08 07:35:34'),(285,1,'Login','2020-10-11 21:11:55'),(286,1,'Login','2020-10-12 17:27:55'),(287,1,'Login','2020-10-12 20:54:48'),(288,1,'Login','2020-10-17 10:49:29'),(289,1,'Login','2020-11-18 20:39:11'),(290,1,'Login','2020-11-18 20:39:11'),(291,1,'Login','2020-11-29 11:38:38'),(292,1,'Login','2020-11-29 21:39:19'),(293,1,'Login','2020-12-04 11:02:39'),(294,1,'Login','2020-12-11 15:36:01'),(295,1,'Login','2020-12-11 22:14:58'),(296,1,'Login','2020-12-12 11:10:27'),(297,1,'Login','2020-12-12 12:09:18'),(298,1,'Login','2020-12-12 12:09:18'),(299,1,'Login','2020-12-12 19:15:15'),(300,1,'Login','2020-12-13 07:29:57'),(301,1,'Login','2020-12-26 23:11:08'),(302,1,'Login','2020-12-27 07:44:24'),(303,1,'Login','2020-12-28 16:00:51'),(304,1,'Login','2021-02-18 10:09:47'),(305,1,'Login','2021-02-18 10:14:23'),(306,1,'Login','2021-02-18 10:22:11'),(307,1,'Login','2021-02-21 19:50:28'),(308,1,'Login','2021-02-22 13:25:51'),(309,1,'Login','2021-02-23 10:16:00'),(310,1,'Login','2021-02-23 10:17:06'),(311,1,'Login','2021-02-23 12:36:34'),(312,1,'Login','2021-02-24 14:45:29'),(313,1,'Login','2021-02-27 18:23:17'),(314,1,'Login','2021-02-28 10:50:04'),(315,1,'Login','2021-02-28 13:29:42'),(316,1,'Login','2021-03-01 09:37:55'),(317,1,'Login','2021-03-01 10:56:01'),(318,1,'Login','2021-03-01 14:34:24'),(319,1,'Login','2021-03-02 11:00:04'),(320,1,'Login','2021-03-02 14:12:46'),(321,1,'Login','2021-03-02 18:40:19'),(322,1,'Login','2021-03-03 10:24:12'),(323,1,'Login','2021-03-03 15:11:47'),(324,1,'Login','2021-03-03 19:04:33'),(325,1,'Login','2021-03-04 09:51:29'),(326,1,'Login','2021-03-04 12:51:14'),(327,1,'Login','2021-03-06 18:42:48'),(328,1,'Login','2021-03-07 00:12:34'),(329,1,'Login','2021-03-07 09:37:58'),(330,1,'Login','2021-03-07 09:51:19'),(331,1,'Login','2021-03-07 18:40:58'),(332,1,'Login','2021-03-07 18:49:13'),(333,1,'Login','2021-03-08 10:27:45'),(334,1,'Login','2021-03-08 10:40:42'),(335,1,'Login','2021-03-08 11:48:40'),(336,1,'Login','2021-03-09 10:43:56'),(337,1,'Login','2021-03-09 14:13:20'),(338,1,'Login','2021-03-09 14:46:21'),(339,1,'Login','2021-03-10 10:14:34'),(340,1,'Login','2021-03-10 10:31:37'),(341,1,'Login','2021-03-10 13:03:35'),(342,1,'Login','2021-03-11 10:32:51'),(343,1,'Login','2021-03-11 11:12:09'),(344,1,'Login','2021-03-11 12:12:47'),(345,1,'Login','2021-03-11 20:08:28'),(346,1,'Login','2021-03-11 20:39:04'),(347,1,'Login','2021-03-14 10:31:31'),(348,1,'Login','2021-03-14 11:09:28'),(349,1,'Login','2021-03-15 10:17:07'),(350,1,'Login','2021-03-15 10:54:52'),(351,1,'Login','2021-03-15 12:17:01'),(352,1,'Login','2021-03-15 13:39:10'),(353,1,'Login','2021-03-16 08:12:34'),(354,1,'Login','2021-03-16 10:28:06'),(355,1,'Login','2021-03-16 17:52:50'),(356,1,'Login','2021-03-17 13:25:02'),(357,1,'Login','2021-03-17 19:38:08'),(358,1,'Login','2021-03-18 10:04:16'),(359,1,'Login','2021-03-18 12:16:59'),(360,1,'Login','2021-03-18 18:32:50'),(361,1,'Login','2021-03-18 19:37:37'),(362,1,'Login','2021-03-19 07:55:33'),(363,1,'Login','2021-03-19 08:09:12'),(364,1,'Login','2021-03-20 09:48:26'),(365,1,'Login','2021-03-20 09:49:43'),(366,1,'Login','2021-03-20 12:00:44'),(367,1,'Login','2021-03-20 12:42:59'),(368,1,'Login','2021-03-20 13:49:16'),(369,1,'Login','2021-03-20 18:04:45'),(370,1,'Login','2021-03-21 11:28:04'),(371,1,'Login','2021-03-21 11:30:23'),(372,1,'Login','2021-03-21 13:45:24'),(373,1,'Login','2021-03-23 10:08:02'),(374,1,'Login','2021-03-23 10:11:50'),(375,1,'Login','2021-03-23 10:13:32'),(376,1,'Login','2021-03-23 13:33:25'),(377,1,'Login','2021-03-23 23:23:27'),(378,1,'Login','2021-03-24 10:20:53'),(379,1,'Login','2021-03-24 10:24:40'),(380,1,'Login','2021-03-24 10:28:49'),(381,1,'Login','2021-03-24 20:24:22'),(382,1,'Login','2021-03-25 10:28:35'),(383,1,'Login','2021-03-25 12:37:27'),(384,1,'Login','2021-03-25 18:42:21'),(385,1,'Login','2021-03-26 10:46:15'),(386,1,'Login','2021-03-26 11:17:46'),(387,1,'Login','2021-03-26 18:57:28'),(388,1,'Login','2021-03-27 08:34:13'),(389,1,'Login','2021-03-27 11:01:43'),(390,1,'Login','2021-03-27 11:18:12'),(391,1,'Login','2021-03-27 11:39:05'),(392,1,'Login','2021-03-27 14:50:08'),(393,1,'Login','2021-03-28 10:22:09'),(394,1,'Login','2021-03-28 11:33:47'),(395,1,'Login','2021-03-28 11:35:29'),(396,1,'Login','2021-03-28 15:02:30'),(397,1,'Login','2021-03-28 16:02:10'),(398,1,'Login','2021-03-28 20:53:22'),(399,1,'Login','2021-03-29 08:40:40'),(400,1,'Login','2021-03-31 09:49:56'),(401,1,'Login','2021-03-31 10:00:47'),(402,1,'Login','2021-03-31 10:17:50'),(403,1,'Login','2021-04-04 11:26:06'),(404,1,'Login','2021-04-04 20:31:07'),(405,1,'Login','2021-04-04 22:28:33'),(406,1,'Login','2021-04-04 22:51:31'),(407,1,'Login','2021-04-05 10:00:01'),(408,1,'Login','2021-04-05 19:21:37'),(409,1,'Login','2021-04-05 21:07:25'),(410,1,'Login','2021-04-06 09:08:50'),(411,1,'Login','2021-04-06 09:20:10'),(412,1,'Login','2021-04-06 14:09:30'),(413,1,'Login','2021-04-06 18:38:20'),(414,1,'Login','2021-04-07 10:18:33'),(415,1,'Login','2021-04-07 18:36:44'),(416,1,'Login','2021-04-07 18:40:54'),(417,1,'Login','2021-04-08 10:58:31'),(418,1,'Login','2021-04-08 11:21:20'),(419,1,'Login','2021-04-08 14:44:11'),(420,1,'Login','2021-04-10 10:19:38'),(421,1,'Login','2021-04-10 10:52:53'),(422,1,'Login','2021-04-11 10:11:08'),(423,1,'Login','2021-04-11 10:42:17'),(424,1,'Login','2021-04-11 17:46:56'),(425,1,'Login','2021-04-11 19:21:56'),(426,1,'Login','2021-04-12 11:24:53'),(427,1,'Login','2021-04-12 11:36:26'),(428,1,'Login','2021-04-12 11:49:47'),(429,1,'Login','2021-04-13 11:27:04'),(430,1,'Login','2021-04-13 12:11:36'),(431,1,'Login','2021-04-14 11:35:46'),(432,1,'Login','2021-04-14 21:31:23'),(433,1,'Login','2021-04-14 21:47:50'),(434,1,'Login','2021-04-15 10:59:11'),(435,1,'Login','2021-04-17 09:45:06'),(436,1,'Login','2021-04-18 11:59:52'),(437,1,'Login','2021-04-18 18:07:52'),(438,1,'Login','2021-04-18 19:25:24'),(439,1,'Login','2021-04-19 11:45:48'),(440,1,'Login','2021-04-20 11:51:29'),(441,1,'Login','2021-04-20 14:10:06'),(442,1,'Login','2021-04-20 15:00:15'),(443,1,'Login','2021-04-20 21:03:48'),(444,1,'Login','2021-04-22 13:12:56'),(445,1,'Login','2021-04-22 18:13:41'),(446,1,'Login','2021-04-23 09:20:46'),(447,1,'Login','2021-04-24 09:26:34'),(448,1,'Login','2021-04-27 10:50:01'),(449,1,'Login','2021-04-29 12:04:39'),(450,1,'Login','2021-05-02 11:03:24'),(451,1,'Login','2021-05-02 13:02:19'),(452,1,'Login','2021-05-03 12:12:02'),(453,1,'Login','2021-05-03 12:16:11'),(454,1,'Login','2021-05-04 11:07:23'),(455,1,'Login','2021-05-06 10:41:54'),(456,1,'Login','2021-05-06 18:46:47'),(457,1,'Login','2021-05-07 11:16:50'),(458,1,'Login','2021-05-08 11:28:44'),(459,1,'Login','2021-05-13 10:57:33'),(460,1,'Login','2021-05-15 20:04:13'),(461,1,'Login','2021-05-16 19:31:25'),(462,1,'Login','2021-05-18 12:35:04'),(463,1,'Login','2021-05-18 14:10:04'),(464,1,'Login','2021-05-20 11:47:06'),(465,1,'Login','2021-05-23 10:11:44'),(466,1,'Login','2021-05-27 11:49:40'),(467,1,'Login','2021-05-31 12:48:18'),(468,1,'Login','2021-06-06 21:27:00'),(469,1,'Login','2021-06-09 13:51:40'),(470,1,'Login','2021-06-10 21:45:12'),(471,1,'Login','2021-06-13 20:51:21'),(472,2,'Login','2021-06-13 20:54:58'),(473,1,'Login','2021-06-13 21:14:23'),(474,1,'Login','2021-06-15 15:31:30'),(475,1,'Login','2021-06-15 17:31:41'),(476,1,'Login','2021-06-15 23:25:57'),(477,1,'Login','2021-06-15 23:53:33'),(478,1,'Login','2021-06-15 23:54:52'),(479,1,'Login','2021-06-16 09:55:18'),(480,1,'Login','2021-06-16 15:19:42'),(481,1,'Login','2021-06-16 17:17:00'),(482,1,'Login','2021-06-17 10:48:26'),(483,1,'Login','2021-06-19 23:59:02'),(484,1,'Login','2021-06-20 13:07:08'),(485,1,'Login','2021-06-20 13:33:16'),(486,1,'Login','2021-06-20 14:03:49'),(487,1,'Login','2021-06-20 16:46:12'),(488,1,'Login','2021-06-21 10:02:33'),(489,1,'Login','2021-06-21 14:03:22'),(490,1,'Login','2021-06-21 14:04:51'),(491,1,'Login','2021-06-21 14:06:11'),(492,1,'Login','2021-06-22 12:49:07'),(493,1,'Login','2021-06-22 19:57:54'),(494,1,'Login','2021-06-23 12:12:50'),(495,1,'Login','2021-06-23 12:53:14'),(496,1,'Login','2021-06-23 13:04:40'),(497,1,'Login','2021-06-23 14:10:03'),(498,1,'Login','2021-06-23 14:13:34'),(499,1,'Login','2021-06-23 14:59:40'),(500,39,'Login','2021-06-23 15:00:29'),(501,1,'Login','2021-06-29 20:58:26'),(502,1,'Login','2021-07-04 23:54:46'),(503,1,'Login','2021-07-05 09:10:51'),(504,1,'Login','2021-07-05 23:30:16'),(505,1,'Login','2021-07-05 23:31:15'),(506,1,'Login','2021-07-08 21:09:28'),(507,1,'Login','2021-07-13 09:59:53'),(508,1,'Login','2021-07-13 12:05:38'),(509,1,'Login','2021-09-13 14:37:52'),(510,1,'Login','2021-10-11 13:29:54'),(511,12,'Login','2021-10-11 13:32:12'),(512,1,'Login','2021-10-12 12:55:29'),(513,1,'Login','2021-10-13 11:56:40'),(514,1,'Login','2021-10-17 11:28:21'),(515,57,'Login','2021-10-17 11:39:16'),(516,1,'Login','2021-10-17 14:56:52'),(517,1,'Login','2021-10-18 11:32:15'),(518,1,'Login','2021-10-21 10:54:42'),(519,1,'Login','2021-10-21 15:05:30'),(520,1,'Login','2021-10-23 23:09:06'),(521,1,'Login','2021-10-24 10:56:24'),(522,1,'Login','2021-10-24 11:00:38'),(523,1,'Login','2021-10-25 10:57:26'),(524,1,'Login','2021-10-26 00:30:09'),(525,1,'Login','2021-10-26 10:43:32'),(526,1,'Login','2021-10-26 23:10:21'),(527,1,'Login','2021-10-27 02:36:34'),(528,1,'Login','2021-10-27 10:37:30');

/*Table structure for table `partners` */

DROP TABLE IF EXISTS `partners`;

CREATE TABLE `partners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `partner` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `partners` */

insert  into `partners`(`id`,`partner`) values (1,'WHO'),(2,'WFP'),(3,'UNICEF'),(4,'NIPN-HKI'),(5,'FHI360');

/*Table structure for table `responsibilities` */

DROP TABLE IF EXISTS `responsibilities`;

CREATE TABLE `responsibilities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `responsibility` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `responsibilities` */

insert  into `responsibilities`(`id`,`responsibility`) values (1,'BNNC'),(2,'MoH&FW'),(3,'MoLGRD'),(4,'DNCC'),(5,'IPHN');

/*Table structure for table `sub_activities` */

DROP TABLE IF EXISTS `sub_activities`;

CREATE TABLE `sub_activities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sub_activity` varchar(1000) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `assign_for` int(11) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `activity_id` (`activity_id`),
  KEY `assign_for` (`assign_for`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `sub_activities` */

insert  into `sub_activities`(`id`,`sub_activity`,`activity_id`,`assign_for`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Monitor all target nutrition indicators of NAPN2 (64)',1,NULL,1,57,'2021-10-17 12:49:59',NULL,NULL),(2,'222222222222----Produce bi-annual publication (report, bulletin, newsletter etc.) ',2,NULL,1,57,'2021-10-17 12:51:03',1,'2021-10-25 12:58:53');

/*Table structure for table `ten_years_wp` */

DROP TABLE IF EXISTS `ten_years_wp`;

CREATE TABLE `ten_years_wp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ministry_id` int(11) DEFAULT NULL,
  `period` varchar(20) DEFAULT NULL,
  `work_plan` varchar(255) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `ten_years_wp` */

insert  into `ten_years_wp`(`id`,`ministry_id`,`period`,`work_plan`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,10,'2016-2025','2020_06_23_1592913940.pdf',1,'2020-06-22 22:52:24',NULL,NULL),(3,24,'2016-2025','2020_08_05_1596638991.pdf',1,'2020-08-05 20:49:52',NULL,NULL),(4,21,'2016-2025','2020_08_05_1596639296.pdf',1,'2020-08-05 20:54:56',NULL,NULL),(5,13,'2016-2025','2020_08_05_1596639343.pdf',1,'2020-08-05 20:55:43',NULL,NULL),(6,14,'2016-2025','2020_12_28_1609149890.pdf',1,'2020-12-28 16:04:51',NULL,NULL);

/*Table structure for table `thematic_area` */

DROP TABLE IF EXISTS `thematic_area`;

CREATE TABLE `thematic_area` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `f_name` varchar(255) DEFAULT NULL,
  `f_designation` varchar(255) DEFAULT NULL,
  `f_mobile` varchar(50) DEFAULT NULL,
  `f_phone` varchar(50) DEFAULT NULL,
  `f_email` varchar(100) DEFAULT NULL,
  `af_name` varchar(255) DEFAULT NULL,
  `is_active` int(11) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `thematic_area` */

insert  into `thematic_area`(`id`,`name`,`f_name`,`f_designation`,`f_mobile`,`f_phone`,`f_email`,`af_name`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'Capacity Building','Dr. Nusrat Jahan','Deputy Director','','','',NULL,1,57,'2021-10-17 12:01:51',NULL,NULL),(2,'Monitoring, Evaluation and Research','Akhter Imam','Deputy Director','','','',NULL,1,57,'2021-10-17 12:02:47',NULL,NULL),(3,'Policy, Planning and Coordination','Dr. Khainoor Jahan','Deputy Director','','','',NULL,1,57,'2021-10-17 12:03:22',NULL,NULL),(4,'Social and Behavior Change Communication','Dr. Hasnin Jahan','Assistant Director','','','',NULL,1,57,'2021-10-17 12:04:17',57,'2021-10-17 12:22:23');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(250) DEFAULT NULL,
  `login_id` varchar(100) DEFAULT NULL,
  `login_password` varchar(100) DEFAULT NULL,
  `user_type` tinytext,
  `thematic_area_id` int(11) DEFAULT NULL COMMENT 'Using as department or ministry id',
  `is_active` tinyint(4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `login_id` (`login_id`),
  KEY `ministry_id` (`thematic_area_id`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `users` */

insert  into `users`(`id`,`user_name`,`login_id`,`login_password`,`user_type`,`thematic_area_id`,`is_active`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,'BNNC Admin','admin','54b87ac1b02db1f1d9310addd2ef6225','Super Admin',0,1,NULL,NULL,1,'2021-06-15 14:43:01');

/*Table structure for table `wp_details` */

DROP TABLE IF EXISTS `wp_details`;

CREATE TABLE `wp_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wp_master_id` int(11) DEFAULT NULL,
  `activity_id` int(11) DEFAULT NULL,
  `sub_activity_id` int(11) DEFAULT NULL,
  `indicator_id` int(11) DEFAULT NULL,
  `baseline` int(11) DEFAULT NULL,
  `target_value` int(11) DEFAULT NULL,
  `quarter1` varchar(10) DEFAULT NULL,
  `quarter1_value` varchar(150) DEFAULT NULL,
  `quarter2` varchar(10) DEFAULT NULL,
  `quarter2_value` varchar(150) DEFAULT NULL,
  `quarter3` varchar(10) DEFAULT NULL,
  `quarter3_value` varchar(150) DEFAULT NULL,
  `quarter4` varchar(10) DEFAULT NULL,
  `quarter4_value` varchar(150) DEFAULT NULL,
  `budget` bigint(20) DEFAULT NULL,
  `responsibilities` varchar(1000) DEFAULT NULL,
  `partners` varchar(1000) DEFAULT NULL,
  `remarks` varchar(1000) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wp_master_id` (`wp_master_id`),
  KEY `activity_id` (`activity_id`),
  KEY `sub_activity_id` (`sub_activity_id`),
  KEY `indicator_id` (`indicator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `wp_details` */

insert  into `wp_details`(`id`,`wp_master_id`,`activity_id`,`sub_activity_id`,`indicator_id`,`baseline`,`target_value`,`quarter1`,`quarter1_value`,`quarter2`,`quarter2_value`,`quarter3`,`quarter3_value`,`quarter4`,`quarter4_value`,`budget`,`responsibilities`,`partners`,`remarks`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,2,2,2,10,12,'N','','N','','N','','N','',0,'BNNC,DNCC','FHI360,NIPN-HKI','',1,'2021-10-27 00:02:55',1,'2021-10-27 00:04:45'),(2,1,1,1,1,20,22,'N','','N','','N','','N','',0,'IPHN,MoH&FW','UNICEF,WFP','',1,'2021-10-27 00:02:55',1,'2021-10-27 00:04:45'),(3,1,2,2,2,30,32,'N','','N','','N','','N','',0,'MoH&FW,MoLGRD','WFP,WHO','',1,'2021-10-27 00:02:55',1,'2021-10-27 00:04:45'),(4,1,2,2,2,40,42,'N','','N','','N','','N','',0,'IPHN,MoH&FW','FHI360,NIPN-HKI,UNICEF','',1,'2021-10-27 00:02:55',1,'2021-10-27 00:04:45'),(5,1,2,2,2,50,52,'N','','N','','N','','N','',0,'DNCC,IPHN,MoH&FW,MoLGRD','FHI360,NIPN-HKI,UNICEF,WFP','',1,'2021-10-27 00:02:55',1,'2021-10-27 00:04:45'),(6,1,2,2,2,60,62,'N','','N','','N','','N','',0,'DNCC,IPHN,MoH&FW,MoLGRD','NIPN-HKI,UNICEF,WFP,WHO','',1,'2021-10-27 00:04:45',NULL,NULL),(7,1,2,2,2,70,72,'N','','N','','N','','N','',0,'MoLGRD','WHO','',1,'2021-10-27 00:04:45',NULL,NULL),(8,2,2,2,2,10,20,'N','','N','','N','','N','',0,'BNNC, BNNC, BNNC, BNNC, BNNC, DNCC','FHI360, NIPN-HKI, WFP, WFP, WFP, WFP, WFP, WFP, WFP, WFP','',1,'2021-10-27 01:41:25',NULL,NULL),(9,2,1,1,1,30,32,'N','','N','','N','','N','',0,'BNNC, BNNC, BNNC, BNNC, BNNC, BNNC, BNNC, BNNC, BNNC, BNNC, IPHN, IPHN, IPHN','FHI360, NIPN-HKI, WFP, WHO','',1,'2021-10-27 01:41:25',NULL,NULL),(10,3,2,2,2,0,0,'N','','N','','N','','N','',10,'','','',1,'2021-10-27 01:44:57',NULL,NULL);

/*Table structure for table `wp_master` */

DROP TABLE IF EXISTS `wp_master`;

CREATE TABLE `wp_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `thematic_area_id` int(11) DEFAULT NULL,
  `finance_year` varchar(15) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT NULL,
  `deleted_by` int(11) DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ministry_id` (`thematic_area_id`),
  KEY `finance_year` (`finance_year`),
  KEY `is_active` (`is_active`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `wp_master` */

insert  into `wp_master`(`id`,`thematic_area_id`,`finance_year`,`is_active`,`deleted_by`,`deleted_at`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,2,'2019-2020',NULL,NULL,NULL,1,'2021-10-27 00:02:55',1,'2021-10-27 00:04:45'),(2,2,'2020-2021',NULL,NULL,NULL,1,'2021-10-27 01:41:25',NULL,NULL),(3,2,'2019-2020',NULL,NULL,NULL,1,'2021-10-27 01:44:57',NULL,NULL);

/*Table structure for table `wpro_details` */

DROP TABLE IF EXISTS `wpro_details`;

CREATE TABLE `wpro_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wp_master_id` int(11) DEFAULT NULL,
  `wp_details_id` int(11) DEFAULT NULL,
  `wpro_master_id` int(11) DEFAULT NULL,
  `progress_status` varchar(20) DEFAULT NULL,
  `progress_value` int(11) DEFAULT NULL,
  `progress_comment` varchar(1000) DEFAULT NULL,
  `expenditure` bigint(20) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wp_master_id` (`wp_master_id`),
  KEY `wp_details_id` (`wp_details_id`),
  KEY `wpro_master_id` (`wpro_master_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `wpro_details` */

insert  into `wpro_details`(`id`,`wp_master_id`,`wp_details_id`,`wpro_master_id`,`progress_status`,`progress_value`,`progress_comment`,`expenditure`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,1,1,'Completed',7,'1',7,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(2,1,2,1,'Completed',6,'2',6,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(3,1,3,1,'Completed',5,'3',5,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(4,1,4,1,'Ongoing',4,'4',4,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(5,1,5,1,'Ongoing',3,'5',3,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(6,1,6,1,'Ongoing',2,'6',2,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(7,1,7,1,'Not Started',1,'7',1,1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(8,2,8,2,'Not Started',10,'dfgdfg',10,1,'2021-10-27 01:42:06',NULL,NULL),(9,2,9,2,'Ongoing',20,'dfgfdg',10,1,'2021-10-27 01:42:06',NULL,NULL);

/*Table structure for table `wpro_master` */

DROP TABLE IF EXISTS `wpro_master`;

CREATE TABLE `wpro_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wp_master_id` int(11) DEFAULT NULL,
  `thematic_area_id` int(11) DEFAULT NULL,
  `finance_year` varchar(15) DEFAULT NULL,
  `period` varchar(15) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `wp_master_id` (`wp_master_id`),
  KEY `ministry_id` (`thematic_area_id`),
  KEY `finance_year` (`finance_year`),
  KEY `period` (`period`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `wpro_master` */

insert  into `wpro_master`(`id`,`wp_master_id`,`thematic_area_id`,`finance_year`,`period`,`created_by`,`created_at`,`updated_by`,`updated_at`) values (1,1,1,'2019-2020','July-June',1,'2021-10-27 01:03:37',1,'2021-10-27 02:49:20'),(2,2,2,'2020-2021','July-June',1,'2021-10-27 01:42:06',NULL,NULL);

/*Table structure for table `view_activities` */

DROP TABLE IF EXISTS `view_activities`;

/*!50001 DROP VIEW IF EXISTS `view_activities` */;
/*!50001 DROP TABLE IF EXISTS `view_activities` */;

/*!50001 CREATE TABLE  `view_activities`(
 `id` int(11) ,
 `activity_name` varchar(1000) ,
 `created_by` int(11) ,
 `created_at` datetime ,
 `updated_by` int(11) ,
 `updated_at` datetime ,
 `thematic_area_id` int(11) ,
 `thematic_area_name` varchar(255) 
)*/;

/*Table structure for table `view_indicator_list` */

DROP TABLE IF EXISTS `view_indicator_list`;

/*!50001 DROP VIEW IF EXISTS `view_indicator_list` */;
/*!50001 DROP TABLE IF EXISTS `view_indicator_list` */;

/*!50001 CREATE TABLE  `view_indicator_list`(
 `indicator_id` int(11) ,
 `indicator_name` varchar(1000) ,
 `sub_activity_id` int(11) ,
 `sub_activity_name` varchar(1000) ,
 `activity_id` int(11) ,
 `activity_name` varchar(1000) ,
 `thematic_area_id` int(11) ,
 `thematic_area_name` varchar(255) 
)*/;

/*Table structure for table `view_sub_activities` */

DROP TABLE IF EXISTS `view_sub_activities`;

/*!50001 DROP VIEW IF EXISTS `view_sub_activities` */;
/*!50001 DROP TABLE IF EXISTS `view_sub_activities` */;

/*!50001 CREATE TABLE  `view_sub_activities`(
 `id` int(11) ,
 `sub_activity_name` varchar(1000) ,
 `activity_id` int(11) ,
 `activity_name` varchar(1000) ,
 `thematic_area_id` int(11) ,
 `thematic_area_name` varchar(255) 
)*/;

/*Table structure for table `view_wp_details` */

DROP TABLE IF EXISTS `view_wp_details`;

/*!50001 DROP VIEW IF EXISTS `view_wp_details` */;
/*!50001 DROP TABLE IF EXISTS `view_wp_details` */;

/*!50001 CREATE TABLE  `view_wp_details`(
 `thematic_area_id` int(11) ,
 `thematic_area_name` varchar(255) ,
 `finance_year` varchar(15) ,
 `activity_name` varchar(1000) ,
 `sub_activity_name` varchar(1000) ,
 `indicator_name` varchar(1000) ,
 `id` int(11) ,
 `wp_master_id` int(11) ,
 `activity_id` int(11) ,
 `sub_activity_id` int(11) ,
 `indicator_id` int(11) ,
 `baseline` int(11) ,
 `target_value` int(11) ,
 `quarter1` varchar(10) ,
 `quarter1_value` varchar(150) ,
 `quarter2` varchar(10) ,
 `quarter2_value` varchar(150) ,
 `quarter3` varchar(10) ,
 `quarter3_value` varchar(150) ,
 `quarter4` varchar(10) ,
 `quarter4_value` varchar(150) ,
 `budget` bigint(20) ,
 `responsibilities` varchar(1000) ,
 `partners` varchar(1000) ,
 `remarks` varchar(1000) ,
 `created_by` int(11) ,
 `created_at` datetime ,
 `updated_by` int(11) ,
 `updated_at` datetime 
)*/;

/*Table structure for table `view_wp_master` */

DROP TABLE IF EXISTS `view_wp_master`;

/*!50001 DROP VIEW IF EXISTS `view_wp_master` */;
/*!50001 DROP TABLE IF EXISTS `view_wp_master` */;

/*!50001 CREATE TABLE  `view_wp_master`(
 `id` int(11) ,
 `thematic_area_id` int(11) ,
 `finance_year` varchar(15) ,
 `is_active` tinyint(4) ,
 `deleted_by` int(11) ,
 `deleted_at` datetime ,
 `created_by` int(11) ,
 `created_by_name` varchar(250) ,
 `created_at` datetime ,
 `updated_by` int(11) ,
 `updated_at` datetime ,
 `thematic_area_name` varchar(255) 
)*/;

/*Table structure for table `view_wpro_details` */

DROP TABLE IF EXISTS `view_wpro_details`;

/*!50001 DROP VIEW IF EXISTS `view_wpro_details` */;
/*!50001 DROP TABLE IF EXISTS `view_wpro_details` */;

/*!50001 CREATE TABLE  `view_wpro_details`(
 `thematic_area_id` int(11) ,
 `thematic_area_name` varchar(255) ,
 `finance_year` varchar(15) ,
 `period` varchar(15) ,
 `activity_name` varchar(1000) ,
 `sub_activity_name` varchar(1000) ,
 `indicator_name` varchar(1000) ,
 `activity_id` int(11) ,
 `sub_activity_id` int(11) ,
 `indicator_id` int(11) ,
 `baseline` int(11) ,
 `target_value` int(11) ,
 `quarter1` varchar(10) ,
 `quarter1_value` varchar(150) ,
 `quarter2` varchar(10) ,
 `quarter2_value` varchar(150) ,
 `quarter3` varchar(10) ,
 `quarter3_value` varchar(150) ,
 `quarter4` varchar(10) ,
 `quarter4_value` varchar(150) ,
 `budget` bigint(20) ,
 `responsibilities` varchar(1000) ,
 `partners` varchar(1000) ,
 `remarks` varchar(1000) ,
 `id` int(11) ,
 `wp_master_id` int(11) ,
 `wp_details_id` int(11) ,
 `wpro_master_id` int(11) ,
 `progress_status` varchar(20) ,
 `progress_value` int(11) ,
 `progress_comment` varchar(1000) ,
 `expenditure` bigint(20) ,
 `created_by` int(11) ,
 `created_at` datetime ,
 `updated_by` int(11) ,
 `updated_at` datetime 
)*/;

/*Table structure for table `view_wpro_master` */

DROP TABLE IF EXISTS `view_wpro_master`;

/*!50001 DROP VIEW IF EXISTS `view_wpro_master` */;
/*!50001 DROP TABLE IF EXISTS `view_wpro_master` */;

/*!50001 CREATE TABLE  `view_wpro_master`(
 `id` int(11) ,
 `wp_master_id` int(11) ,
 `thematic_area_id` int(11) ,
 `finance_year` varchar(15) ,
 `period` varchar(15) ,
 `created_by` int(11) ,
 `created_by_name` varchar(250) ,
 `created_at` datetime ,
 `updated_by` int(11) ,
 `updated_at` datetime ,
 `thematic_area_name` varchar(255) 
)*/;

/*View structure for view view_activities */

/*!50001 DROP TABLE IF EXISTS `view_activities` */;
/*!50001 DROP VIEW IF EXISTS `view_activities` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_activities` AS (select `activities`.`id` AS `id`,`activities`.`activity_name` AS `activity_name`,`activities`.`created_by` AS `created_by`,`activities`.`created_at` AS `created_at`,`activities`.`updated_by` AS `updated_by`,`activities`.`updated_at` AS `updated_at`,`activities`.`thematic_area` AS `thematic_area_id`,`thematic_area`.`name` AS `thematic_area_name` from (`activities` left join `thematic_area` on((`activities`.`thematic_area` = `thematic_area`.`id`)))) */;

/*View structure for view view_indicator_list */

/*!50001 DROP TABLE IF EXISTS `view_indicator_list` */;
/*!50001 DROP VIEW IF EXISTS `view_indicator_list` */;

/*!50001 CREATE ALGORITHM=TEMPTABLE DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_indicator_list` AS (select `indicators`.`id` AS `indicator_id`,`indicators`.`indicator_name` AS `indicator_name`,`indicators`.`sub_activity_id` AS `sub_activity_id`,`view_sub_activities`.`sub_activity_name` AS `sub_activity_name`,`view_sub_activities`.`activity_id` AS `activity_id`,`view_sub_activities`.`activity_name` AS `activity_name`,`view_sub_activities`.`thematic_area_id` AS `thematic_area_id`,`view_sub_activities`.`thematic_area_name` AS `thematic_area_name` from (`indicators` left join `view_sub_activities` on((`indicators`.`sub_activity_id` = `view_sub_activities`.`id`)))) */;

/*View structure for view view_sub_activities */

/*!50001 DROP TABLE IF EXISTS `view_sub_activities` */;
/*!50001 DROP VIEW IF EXISTS `view_sub_activities` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_sub_activities` AS (select `sub_activities`.`id` AS `id`,`sub_activities`.`sub_activity` AS `sub_activity_name`,`sub_activities`.`activity_id` AS `activity_id`,`view_activities`.`activity_name` AS `activity_name`,`view_activities`.`thematic_area_id` AS `thematic_area_id`,`view_activities`.`thematic_area_name` AS `thematic_area_name` from (`sub_activities` left join `view_activities` on((`sub_activities`.`activity_id` = `view_activities`.`id`)))) */;

/*View structure for view view_wp_details */

/*!50001 DROP TABLE IF EXISTS `view_wp_details` */;
/*!50001 DROP VIEW IF EXISTS `view_wp_details` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=``@`` SQL SECURITY DEFINER VIEW `view_wp_details` AS (select `vil`.`thematic_area_id` AS `thematic_area_id`,`vil`.`thematic_area_name` AS `thematic_area_name`,(select `wp_master`.`finance_year` from `wp_master` where (`wp_master`.`id` = `wd`.`wp_master_id`)) AS `finance_year`,`vil`.`activity_name` AS `activity_name`,`vil`.`sub_activity_name` AS `sub_activity_name`,`vil`.`indicator_name` AS `indicator_name`,`wd`.`id` AS `id`,`wd`.`wp_master_id` AS `wp_master_id`,`wd`.`activity_id` AS `activity_id`,`wd`.`sub_activity_id` AS `sub_activity_id`,`wd`.`indicator_id` AS `indicator_id`,`wd`.`baseline` AS `baseline`,`wd`.`target_value` AS `target_value`,`wd`.`quarter1` AS `quarter1`,`wd`.`quarter1_value` AS `quarter1_value`,`wd`.`quarter2` AS `quarter2`,`wd`.`quarter2_value` AS `quarter2_value`,`wd`.`quarter3` AS `quarter3`,`wd`.`quarter3_value` AS `quarter3_value`,`wd`.`quarter4` AS `quarter4`,`wd`.`quarter4_value` AS `quarter4_value`,`wd`.`budget` AS `budget`,`wd`.`responsibilities` AS `responsibilities`,`wd`.`partners` AS `partners`,`wd`.`remarks` AS `remarks`,`wd`.`created_by` AS `created_by`,`wd`.`created_at` AS `created_at`,`wd`.`updated_by` AS `updated_by`,`wd`.`updated_at` AS `updated_at` from (`wp_details` `wd` left join `view_indicator_list` `vil` on((`wd`.`indicator_id` = `vil`.`indicator_id`)))) */;

/*View structure for view view_wp_master */

/*!50001 DROP TABLE IF EXISTS `view_wp_master` */;
/*!50001 DROP VIEW IF EXISTS `view_wp_master` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=``@`` SQL SECURITY DEFINER VIEW `view_wp_master` AS (select `wm`.`id` AS `id`,`wm`.`thematic_area_id` AS `thematic_area_id`,`wm`.`finance_year` AS `finance_year`,`wm`.`is_active` AS `is_active`,`wm`.`deleted_by` AS `deleted_by`,`wm`.`deleted_at` AS `deleted_at`,`wm`.`created_by` AS `created_by`,(select `users`.`user_name` from `users` where (`users`.`id` = `wm`.`created_by`)) AS `created_by_name`,`wm`.`created_at` AS `created_at`,`wm`.`updated_by` AS `updated_by`,`wm`.`updated_at` AS `updated_at`,`t`.`name` AS `thematic_area_name` from (`wp_master` `wm` left join `thematic_area` `t` on((`wm`.`thematic_area_id` = `t`.`id`)))) */;

/*View structure for view view_wpro_details */

/*!50001 DROP TABLE IF EXISTS `view_wpro_details` */;
/*!50001 DROP VIEW IF EXISTS `view_wpro_details` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=``@`` SQL SECURITY DEFINER VIEW `view_wpro_details` AS (select `vwprom`.`thematic_area_id` AS `thematic_area_id`,`vwprom`.`thematic_area_name` AS `thematic_area_name`,`vwprom`.`finance_year` AS `finance_year`,`vwprom`.`period` AS `period`,`vwd`.`activity_name` AS `activity_name`,`vwd`.`sub_activity_name` AS `sub_activity_name`,`vwd`.`indicator_name` AS `indicator_name`,`vwd`.`activity_id` AS `activity_id`,`vwd`.`sub_activity_id` AS `sub_activity_id`,`vwd`.`indicator_id` AS `indicator_id`,`vwd`.`baseline` AS `baseline`,`vwd`.`target_value` AS `target_value`,`vwd`.`quarter1` AS `quarter1`,`vwd`.`quarter1_value` AS `quarter1_value`,`vwd`.`quarter2` AS `quarter2`,`vwd`.`quarter2_value` AS `quarter2_value`,`vwd`.`quarter3` AS `quarter3`,`vwd`.`quarter3_value` AS `quarter3_value`,`vwd`.`quarter4` AS `quarter4`,`vwd`.`quarter4_value` AS `quarter4_value`,`vwd`.`budget` AS `budget`,`vwd`.`responsibilities` AS `responsibilities`,`vwd`.`partners` AS `partners`,`vwd`.`remarks` AS `remarks`,`wprod`.`id` AS `id`,`wprod`.`wp_master_id` AS `wp_master_id`,`wprod`.`wp_details_id` AS `wp_details_id`,`wprod`.`wpro_master_id` AS `wpro_master_id`,`wprod`.`progress_status` AS `progress_status`,`wprod`.`progress_value` AS `progress_value`,`wprod`.`progress_comment` AS `progress_comment`,`wprod`.`expenditure` AS `expenditure`,`wprod`.`created_by` AS `created_by`,`wprod`.`created_at` AS `created_at`,`wprod`.`updated_by` AS `updated_by`,`wprod`.`updated_at` AS `updated_at` from ((`wpro_details` `wprod` left join `view_wpro_master` `vwprom` on((`wprod`.`wpro_master_id` = `vwprom`.`id`))) left join `view_wp_details` `vwd` on((`wprod`.`wp_details_id` = `vwd`.`id`)))) */;

/*View structure for view view_wpro_master */

/*!50001 DROP TABLE IF EXISTS `view_wpro_master` */;
/*!50001 DROP VIEW IF EXISTS `view_wpro_master` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=``@`` SQL SECURITY DEFINER VIEW `view_wpro_master` AS (select `wm`.`id` AS `id`,`wm`.`wp_master_id` AS `wp_master_id`,`wm`.`thematic_area_id` AS `thematic_area_id`,`wm`.`finance_year` AS `finance_year`,`wm`.`period` AS `period`,`wm`.`created_by` AS `created_by`,(select `users`.`user_name` from `users` where (`users`.`id` = `wm`.`created_by`)) AS `created_by_name`,`wm`.`created_at` AS `created_at`,`wm`.`updated_by` AS `updated_by`,`wm`.`updated_at` AS `updated_at`,`t`.`name` AS `thematic_area_name` from (`wpro_master` `wm` left join `thematic_area` `t` on((`wm`.`thematic_area_id` = `t`.`id`)))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
