-- MySQL dump 10.13  Distrib 5.7.21, for Linux (x86_64)
--
-- Host: localhost    Database: ojtmonitoring
-- ------------------------------------------------------
-- Server version	5.7.21-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `company_course_to_accept`
--

DROP TABLE IF EXISTS `company_course_to_accept`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_course_to_accept` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `name` text,
  `company_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_course_to_accept`
--

LOCK TABLES `company_course_to_accept` WRITE;
/*!40000 ALTER TABLE `company_course_to_accept` DISABLE KEYS */;
INSERT INTO `company_course_to_accept` VALUES (9,4,NULL,30),(10,2,NULL,30),(11,4,NULL,34),(12,2,NULL,34),(13,0,NULL,3);
/*!40000 ALTER TABLE `company_course_to_accept` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_ojt`
--

DROP TABLE IF EXISTS `company_ojt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_ojt` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `approved_by_teacher_id` int(11) DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `accepted` tinyint(1) DEFAULT '0',
  `accepted_by_company_id` int(11) DEFAULT NULL,
  `accepted_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_ojt`
--

LOCK TABLES `company_ojt` WRITE;
/*!40000 ALTER TABLE `company_ojt` DISABLE KEYS */;
INSERT INTO `company_ojt` VALUES (1,1,3,2,'2018-05-27 10:12:44',1,3,'2018-07-13'),(2,2,3,2,'2018-06-23 00:49:33',0,3,'2018-07-14'),(3,3,3,2,'2018-06-24 06:54:11',1,3,'2018-07-14'),(4,4,34,2,'2018-07-10 15:02:34',1,34,'2018-07-10');
/*!40000 ALTER TABLE `company_ojt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `company_profile`
--

DROP TABLE IF EXISTS `company_profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `company_profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `description` text,
  `moa_certified` tinyint(1) DEFAULT '0',
  `does_provide_allowance` tinyint(1) DEFAULT '0',
  `allowance` double DEFAULT NULL,
  `ojt_number` int(11) DEFAULT NULL,
  `college` text,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `company_profile`
--

LOCK TABLES `company_profile` WRITE;
/*!40000 ALTER TABLE `company_profile` DISABLE KEYS */;
INSERT INTO `company_profile` VALUES (1,3,'This company is a test company which requires OJT with special skills in IT, EDUCATION and chena.',1,1,100,2,'Computer Studies','2018-05-12 08:33:38'),(2,25,NULL,0,0,NULL,NULL,NULL,'2018-06-25 13:15:33'),(3,26,'a aka a AAA',0,1,222,2,'Computer Studies','2018-07-01 13:39:02'),(4,29,NULL,0,0,NULL,NULL,NULL,'2018-07-08 08:57:41'),(5,30,NULL,0,0,0,0,'--Select Below--','2018-07-08 09:00:26'),(6,34,NULL,0,0,NULL,NULL,NULL,'2018-07-10 14:43:47');
/*!40000 ALTER TABLE `company_profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `course_look_up`
--

DROP TABLE IF EXISTS `course_look_up`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course_look_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course_look_up`
--

LOCK TABLES `course_look_up` WRITE;
/*!40000 ALTER TABLE `course_look_up` DISABLE KEYS */;
INSERT INTO `course_look_up` VALUES (1,'Education'),(2,'ECE'),(3,'Com Eng'),(4,'Computer Science'),(5,'Business Ad'),(6,'Public Ad');
/*!40000 ALTER TABLE `course_look_up` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educational_background`
--

DROP TABLE IF EXISTS `educational_background`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educational_background` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_details_id` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `name` text,
  `address` text,
  `from_date` date DEFAULT NULL,
  `to_date` date DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educational_background`
--

LOCK TABLES `educational_background` WRITE;
/*!40000 ALTER TABLE `educational_background` DISABLE KEYS */;
INSERT INTO `educational_background` VALUES (1,1,0,'A','A',NULL,NULL,'2018-05-20 09:14:45'),(2,1,1,'','Awrwr',NULL,NULL,'2018-05-20 09:14:45'),(3,1,2,'Awer','A',NULL,NULL,'2018-05-20 09:14:45'),(4,2,0,'','',NULL,NULL,'2018-06-23 00:48:30'),(5,2,1,'','',NULL,NULL,'2018-06-23 00:48:30'),(6,2,2,'','',NULL,NULL,'2018-06-23 00:48:30'),(7,3,0,'a','a',NULL,NULL,'2018-06-24 04:47:41'),(8,3,1,'a','a',NULL,NULL,'2018-06-24 04:47:41'),(9,3,2,'a','a',NULL,NULL,'2018-06-24 04:47:41'),(10,4,0,'','',NULL,NULL,'2018-07-10 15:01:29'),(11,4,1,'','',NULL,NULL,'2018-07-10 15:01:29'),(12,4,2,'','',NULL,NULL,'2018-07-10 15:01:29');
/*!40000 ALTER TABLE `educational_background` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resume_details`
--

DROP TABLE IF EXISTS `resume_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resume_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `accomplishments` text,
  `interests` text,
  `approved` tinyint(1) DEFAULT '0',
  `ojt_hours_needed` double DEFAULT NULL,
  `updated_by_teacher_id` int(11) DEFAULT NULL,
  `teacher_notes` text,
  `company_accepted` tinyint(1) DEFAULT '0',
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resume_details`
--

LOCK TABLES `resume_details` WRITE;
/*!40000 ALTER TABLE `resume_details` DISABLE KEYS */;
INSERT INTO `resume_details` VALUES (1,1,'Test','Test Interest',1,NULL,2,NULL,0,'2018-05-20 09:14:45'),(2,14,'','',1,NULL,2,NULL,0,'2018-06-23 00:48:30'),(3,19,'Test Acc','Test interest',1,NULL,2,NULL,0,'2018-06-24 04:47:41'),(4,33,'','',1,NULL,2,NULL,0,'2018-07-10 15:01:29');
/*!40000 ALTER TABLE `resume_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resume_references`
--

DROP TABLE IF EXISTS `resume_references`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resume_references` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_details_id` int(11) DEFAULT NULL,
  `name` text,
  `address` text,
  `phone_number` text,
  `occupation` text,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resume_references`
--

LOCK TABLES `resume_references` WRITE;
/*!40000 ALTER TABLE `resume_references` DISABLE KEYS */;
INSERT INTO `resume_references` VALUES (1,1,'','','','','2018-05-20 09:14:45'),(2,1,'','','','','2018-05-20 09:14:45'),(3,1,'','','','','2018-05-20 09:14:45'),(4,2,'','','','','2018-06-23 00:48:30'),(5,2,'','','','','2018-06-23 00:48:30'),(6,2,'','','','','2018-06-23 00:48:30'),(7,3,'Test','aa','22','aaa','2018-06-24 04:47:41'),(8,3,'Test','bb','22','bb','2018-06-24 04:47:41'),(9,3,'cccc','cc','22','cc','2018-06-24 04:47:41'),(10,4,'','','','','2018-07-10 15:01:29'),(11,4,'','','','','2018-07-10 15:01:29'),(12,4,'','','','','2018-07-10 15:01:29');
/*!40000 ALTER TABLE `resume_references` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `section`
--

DROP TABLE IF EXISTS `section`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `section` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `no_of_students` int(11) DEFAULT NULL,
  `section_name` text,
  `created_by_teacher_id` int(11) DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `section`
--

LOCK TABLES `section` WRITE;
/*!40000 ALTER TABLE `section` DISABLE KEYS */;
INSERT INTO `section` VALUES (22,3,1,'1',2,'2018-05-15 13:42:29'),(23,3,1,'12',2,'2018-05-15 13:42:44'),(24,3,1,'123',2,'2018-05-15 13:42:55'),(25,3,1,'15',2,'2018-05-15 13:54:01'),(26,3,1,'11',2,'2018-05-15 13:54:11'),(27,3,1,'111',2,'2018-05-15 13:54:24'),(28,NULL,NULL,'Teacher section test',2,'2018-05-26 04:51:46'),(29,NULL,NULL,'123456',2,'2018-06-23 00:47:20');
/*!40000 ALTER TABLE `section` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_company_rating`
--

DROP TABLE IF EXISTS `student_company_rating`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_company_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `rating` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_company_rating`
--

LOCK TABLES `student_company_rating` WRITE;
/*!40000 ALTER TABLE `student_company_rating` DISABLE KEYS */;
INSERT INTO `student_company_rating` VALUES (8,3,1,'2018-07-07 02:34:36',3),(9,3,14,'2018-07-07 02:53:37',1);
/*!40000 ALTER TABLE `student_company_rating` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_company_selected`
--

DROP TABLE IF EXISTS `student_company_selected`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_company_selected` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_company_selected`
--

LOCK TABLES `student_company_selected` WRITE;
/*!40000 ALTER TABLE `student_company_selected` DISABLE KEYS */;
INSERT INTO `student_company_selected` VALUES (1,1,1,'2018-05-20 09:20:38'),(2,14,1,'2018-06-23 00:48:54'),(3,19,1,'2018-06-24 05:38:31'),(4,33,6,'2018-07-10 15:01:58');
/*!40000 ALTER TABLE `student_company_selected` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_notif`
--

DROP TABLE IF EXISTS `student_notif`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_notif` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `message` text,
  `deleted` tinyint(1) DEFAULT '0',
  `deleted_date` date DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_notif`
--

LOCK TABLES `student_notif` WRITE;
/*!40000 ALTER TABLE `student_notif` DISABLE KEYS */;
INSERT INTO `student_notif` VALUES (1,1,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-05-27 10:13:19'),(2,1,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-06-24 11:21:26'),(3,19,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-06-24 11:21:26'),(4,1,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-06-24 11:49:32'),(5,3,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-06-24 11:49:32'),(6,4,'Congratulations! You were accepted as an OJT for Company : hhh ',0,NULL,'2018-07-10 15:14:43'),(7,1,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 14:48:43'),(21,1,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:50:09'),(22,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:50:09'),(23,3,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:50:09'),(24,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:50:21'),(25,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:50:23'),(26,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:53:48'),(27,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:54:00'),(28,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 15:54:03'),(29,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 16:12:28'),(30,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 16:12:34'),(31,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 16:12:41'),(32,3,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 16:15:06'),(33,2,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 16:16:43'),(34,3,'Congratulations! You were accepted as an OJT for Company : company1 ',0,NULL,'2018-07-13 16:16:52');
/*!40000 ALTER TABLE `student_notif` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `student_ojt_attendance_log`
--

DROP TABLE IF EXISTS `student_ojt_attendance_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `student_ojt_attendance_log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `company_id` int(11) DEFAULT NULL,
  `login_date` text,
  `logout_date` text,
  `scan_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `login` tinyint(1) DEFAULT '0',
  `agent_id` int(11) DEFAULT NULL,
  `finger_print_scanner` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `student_ojt_attendance_log`
--

LOCK TABLES `student_ojt_attendance_log` WRITE;
/*!40000 ALTER TABLE `student_ojt_attendance_log` DISABLE KEYS */;
INSERT INTO `student_ojt_attendance_log` VALUES (10,1,3,'2018/06/17 17:30:12','2018/06/17 17:31:41','2018-06-17 09:30:13',0,3,0),(11,1,3,'2018/06/17 17:32:30','2018/06/17 17:33:05','2018-06-17 09:32:31',0,13,0),(12,1,3,'2018/06/17 17:33:29',NULL,'2018-06-17 09:33:30',1,13,0),(13,1,3,'2018/07/07 13:06:37','2018/07/07 13:09:19','2018-07-07 05:06:38',0,3,0),(14,1,3,'2018/07/08 08:35:29','2018/07/08 08:36:51','2018-07-08 00:35:30',0,3,0),(15,1,3,'2018/07/08 11:31:16','2018/07/08 11:33:38','2018-07-08 03:31:17',0,3,0),(16,1,3,'2018/07/12 20:50:26','2018/07/12 20:53:50','2018-07-12 12:50:27',0,3,0),(17,1,3,'2018/07/12 21:02:55','2018/07/12 21:11:00','2018-07-12 13:02:55',0,3,0),(18,1,3,'2018/07/12 21:11:29',NULL,'2018-07-12 13:11:29',1,3,0);
/*!40000 ALTER TABLE `student_ojt_attendance_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` text,
  `address` text,
  `phonenumber` text,
  `studentnumber` text,
  `teachernumber` text,
  `email` text,
  `department` text,
  `college` text,
  `username` text,
  `password` text,
  `accounttype` int(11) DEFAULT NULL,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `approved` tinyint(1) DEFAULT '0',
  `approved_by_teacher_id` int(11) DEFAULT NULL,
  `approved_date` date DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `section` text,
  `company_name` text,
  `company_id` int(11) DEFAULT NULL,
  `rating` int(11) DEFAULT '1',
  `gender` text,
  `ojt_hours` int(11) DEFAULT NULL,
  `course` text,
  `ojt_done` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'justine karl','test address','111111','1234',NULL,'a@a.com',NULL,'Computer Studies','student','12345',1,'2018-05-12 08:00:15',1,2,'2018-05-12',28,'Teacher section test',NULL,NULL,2,'null',50,NULL,0),(2,'computer teacher',NULL,'123456',NULL,'123456',NULL,'Computer Department','Computer Studies','compteacher','12345',2,'2018-05-12 08:06:34',1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(3,'company1','test address1','123456',NULL,NULL,NULL,'test type',NULL,'company','12345',3,'2018-05-12 08:33:38',1,NULL,NULL,NULL,NULL,NULL,NULL,2,NULL,NULL,NULL,0),(13,'rr','rr','77',NULL,NULL,NULL,NULL,NULL,'rr','12345',4,'2018-06-17 03:14:52',1,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(14,'y','y','9','y',NULL,'y',NULL,'Computer Studies','y','12345',1,'2018-06-23 00:45:32',1,2,'2018-06-23',29,'123456',NULL,NULL,1,NULL,NULL,NULL,0),(15,'kang','test address','535930458209',NULL,NULL,NULL,NULL,NULL,'kang','12345',4,'2018-06-24 01:47:50',1,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(16,'1','1','3',NULL,NULL,NULL,NULL,NULL,'1','12345',4,'2018-06-24 02:45:31',1,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(17,'2','2222','222',NULL,NULL,NULL,NULL,NULL,'22','22222',4,'2018-06-24 02:46:12',1,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(18,'u','u','8',NULL,NULL,NULL,NULL,NULL,'u','12345',4,'2018-06-24 03:48:55',0,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(19,'nee','new','639','new',NULL,'new@ahoo.com',NULL,'Computer Studies','new','12345',1,'2018-06-24 04:26:30',1,2,'2018-06-24',28,'Teacher section test',NULL,NULL,1,NULL,NULL,NULL,0),(20,'test','test','8378','test',NULL,'test',NULL,'Computer Studies','test','12345',1,'2018-06-24 09:06:38',1,2,'2018-06-24',NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(21,'rrr','rrr','777','rrr',NULL,'rrr',NULL,'Computer Studies','rrr','rrrrr',1,'2018-06-24 11:55:34',0,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(22,'techer',NULL,'832437',NULL,'832437',NULL,'AAA','HRM','techer','techer',2,'2018-06-24 11:58:54',1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(23,'tt','t','88888',NULL,NULL,NULL,NULL,NULL,'ttt','ttttt',4,'2018-06-24 16:05:45',1,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(24,'qq','qq','77',NULL,NULL,NULL,NULL,NULL,'qq','qqqqq',4,'2018-06-24 16:06:56',1,NULL,NULL,NULL,NULL,'company1',3,2,NULL,NULL,NULL,0),(25,'qqq','qqq','777',NULL,NULL,NULL,'qqqqq',NULL,'qqqq','qqqqq',3,'2018-06-25 13:15:33',1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(26,'Another Company To','Test address','1413424242424',NULL,NULL,NULL,'Test',NULL,'companyy','12345',3,'2018-07-01 13:39:02',1,NULL,NULL,NULL,NULL,NULL,NULL,5,NULL,NULL,NULL,0),(27,'hh','hhh','44','hh',NULL,'hhh',NULL,'Education','hhh','hhhhh',1,'2018-07-07 10:23:58',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'Male',NULL,NULL,0),(28,'aaaaaaaa','1111111111111111','11111111111','aaaaaaaaaaaaa',NULL,'111111111',NULL,'Education','12','11111',1,'2018-07-08 00:15:32',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'Male',15,NULL,0),(29,'vvv','vv','8',NULL,NULL,NULL,'vv',NULL,'v','vvvvv',3,'2018-07-08 08:57:41',1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(30,'ggg','g','44',NULL,NULL,NULL,'gg',NULL,'g','ggggg',3,'2018-07-08 09:00:26',1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0),(31,'333','3333333333333333333','333333333333333','333',NULL,'333333',NULL,'Computer Studies','3','33333',1,'2018-07-10 14:20:31',0,NULL,NULL,NULL,NULL,NULL,NULL,1,'Male',33,'',0),(32,'r44','44444','444444','444',NULL,'444',NULL,'Computer Studies','4','44444',1,'2018-07-10 14:23:00',1,2,'2018-07-13',NULL,NULL,NULL,NULL,1,'Male',444,'',0),(33,'BC','b','22','bb',NULL,'mmm',NULL,'Computer Studies','m','mmmmm',1,'2018-07-10 14:29:00',1,2,'2018-07-10',NULL,NULL,NULL,NULL,1,'Female',66666,'ECE',0),(34,'hhh','hhhhhhhhhhhhhhhhhhhhhh','44444444444444444',NULL,NULL,NULL,'hhhhhhhhh',NULL,'h','hhhhh',3,'2018-07-10 14:43:47',1,NULL,NULL,NULL,NULL,NULL,NULL,1,NULL,NULL,NULL,0);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `work_experience`
--

DROP TABLE IF EXISTS `work_experience`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `work_experience` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resume_details_id` int(11) DEFAULT NULL,
  `company_name` text,
  `address` text,
  `job_description` text,
  `duties_responsibilities` text,
  `log_date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `work_experience`
--

LOCK TABLES `work_experience` WRITE;
/*!40000 ALTER TABLE `work_experience` DISABLE KEYS */;
INSERT INTO `work_experience` VALUES (1,1,'rrrrr','rrrr','','','2018-05-20 09:14:45'),(2,1,'','','','','2018-05-20 09:14:45'),(3,2,'','','','','2018-06-23 00:48:30'),(4,2,'','','','','2018-06-23 00:48:30'),(5,3,'a','a','a','a','2018-06-24 04:47:41'),(6,3,'b','b','b','b','2018-06-24 04:47:41'),(7,4,'','','','','2018-07-10 15:01:29'),(8,4,'','','','','2018-07-10 15:01:29');
/*!40000 ALTER TABLE `work_experience` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-14 10:39:50
