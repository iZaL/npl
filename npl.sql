-- MySQL dump 10.13  Distrib 5.5.38, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: npl
-- ------------------------------------------------------
-- Server version	5.5.38-0+wheezy1

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
-- Table structure for table `answers`
--

DROP TABLE IF EXISTS `answers`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `answers` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `body_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `answers_question_id_index` (`question_id`),
  KEY `answers_parent_id_index` (`parent_id`),
  KEY `answers_user_id_index` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `answers`
--

LOCK TABLES `answers` WRITE;
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` VALUES (103,31,0,2,'<p>It is a unit of energy</p>','2016-04-22 04:23:18','2016-04-22 04:23:18',NULL),(104,31,103,2,'<p>Did you study the photoelectric effect?</p>','2016-04-22 04:24:23','2016-04-22 04:24:23',NULL);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blogs`
--

DROP TABLE IF EXISTS `blogs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blogs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `title_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blogs`
--

LOCK TABLES `blogs` WRITE;
/*!40000 ALTER TABLE `blogs` DISABLE KEYS */;
INSERT INTO `blogs` VALUES (11,1,'','Welcome to \"No Problem Learning\" Web Site','welcome-to-no-problem-learning-web-site','','<p>&nbsp;</p>\r\n<p><strong>الى المدرسات والمدرسين</strong></p>\r\n<p><strong>To Tutors</strong></p>\r\n<p>&nbsp;</p>\r\n<p>Welcome to no-problem-learning.com</p>\r\n<p>سجل مجانا لمدة شهران واكتشف أهمية الخدمات التي يقدمها الموقع لجميع الطلبة.</p>\r\n<p><strong>يهدف هذا الموقع إلى مساعدة الط</strong><strong>لبة</strong><strong> في الحصول على أفضل وأدق المعلومات للأسئلة والدروس التي يتعلمها بواسطة أساتذة مختصين ذوي خبرة طويلة. يتم ذلك تحت إشراف أساتذة جامعيين ذوي خبرة عالمية في البحث العلمي والتعليم</strong></p>\r\n<p>&nbsp;</p>\r\n<p>&nbsp;</p>\r\n<p>Your inscription code is: NP 99xxx</p>\r\n<p>This is confidential and should not be communicated to others. The same for your E-mail and Password.</p>\r\n<p>no-problem-learning.com online educational site is under the supervision of highly qualified Scientists and Educators of long experience at the international level. It is intended to offer the best assistance and help to students in order to understand their subjects of study. A student can ask a question at any time and will get fast and free answer(s). Moreover, a student has access to an Educator, subject Supervisor and site marketing management for any enquiries and assistance:</p>\r\n<ol>\r\n<ol>\r\n<li>Fast answers to questions, home works, exams, tutorials</li>\r\n<li>The inscription is free for one month</li>\r\n</ol>\r\n</ol>\r\n<ul>\r\n<li><strong>After <strong>this</strong> trial period a fee of <strong> (15 USD)/ per level</strong> is required for <strong>one scholar year</strong> in the case of medium/high school students or <strong>one semester for first year University.</strong></strong></li>\r\n</ul>\r\n<ul>\r\n<li>In case of inscription in two levels or more, the fee will be 5USD/per additional level.</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<ol>\r\n<li>An agreement between the Student and an Educator could be established in order to get more support in terms of urgent questions, assistance in home work, preparation for exams, explaining subjects. This is done <u>directly</u> between the Tutor and the student without using the npl web site.</li>\r\n<li>The Direction of the site recommend a fee of 3 to 5 KD (10 to 15 USD)/hour to be arranged directly between the Educator and the Student. In case of support for one semester, or one scholar year, the fees will be less. The site is not involved in this operation. Trust and confidence concerning timing is very important. An agreement could be arranged for the whole year or semester course teaching.</li>\r\n<li>In the case of agreement between Educator and Student, communication between the two parties is conducted outside the site.</li>\r\n<li>All communications between students and Educators throughout the site are conducted in terms of the <strong>site code number</strong>. The names are anonymous and confidential.</li>\r\n</ol>','2016-04-09 22:22:53','2016-04-09 22:22:53',NULL);
/*!40000 ALTER TABLE `blogs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` text COLLATE utf8_unicode_ci NOT NULL,
  `description_en` text COLLATE utf8_unicode_ci,
  `cover` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `educators`
--

DROP TABLE IF EXISTS `educators`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `educators` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `experience` text COLLATE utf8_unicode_ci,
  `qualification` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `educators`
--

LOCK TABLES `educators` WRITE;
/*!40000 ALTER TABLE `educators` DISABLE KEYS */;
INSERT INTO `educators` VALUES (1,2,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,4,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,9,NULL,NULL,'0000-00-00 00:00:00','0000-00-00 00:00:00',NULL);
/*!40000 ALTER TABLE `educators` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `levels`
--

DROP TABLE IF EXISTS `levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `levels`
--

LOCK TABLES `levels` WRITE;
/*!40000 ALTER TABLE `levels` DISABLE KEYS */;
INSERT INTO `levels` VALUES (1,'university','university',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,'medium','medium',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,'elementary','elementary',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,'high school','high school',NULL,NULL,'university','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL);
/*!40000 ALTER TABLE `levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table',1),('2014_10_12_100000_create_password_resets_table',1),('2015_05_03_192528_create_categories_table',1),('2015_06_06_114013_create_blogs_table',1),('2015_06_07_090615_create_photos_table',1),('2015_08_01_010134_create_educators_table',1),('2015_08_01_010302_create_students_table',1),('2015_08_01_011155_create_subjects_table',1),('2015_08_01_011258_create_levels_table',1),('2015_08_01_011545_create_user_levels_table',1),('2015_08_01_011624_create_user_subjects_table',1),('2015_10_06_203049_create_answers_table',1),('2015_12_07_130107_create_questions_table',1),('2015_12_08_182133_create_participants_table',1),('2016_02_14_021620_create_notifications_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `notifications`
--

DROP TABLE IF EXISTS `notifications`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `notifications` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `notifiable_id` int(10) unsigned NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `last_read` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `read` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`),
  KEY `notifications_notifiable_id_notifiable_type_index` (`notifiable_id`,`notifiable_type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `notifications`
--

LOCK TABLES `notifications` WRITE;
/*!40000 ALTER TABLE `notifications` DISABLE KEYS */;
/*!40000 ALTER TABLE `notifications` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `participants`
--

DROP TABLE IF EXISTS `participants`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `participants` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `last_read` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `participants_question_id_index` (`question_id`),
  KEY `participants_user_id_index` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `participants`
--

LOCK TABLES `participants` WRITE;
/*!40000 ALTER TABLE `participants` DISABLE KEYS */;
/*!40000 ALTER TABLE `participants` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `photos`
--

DROP TABLE IF EXISTS `photos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `photos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `imageable_id` int(11) DEFAULT NULL,
  `imageable_type` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `thumbnail` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `photos`
--

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;
/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `questions` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `body_en` text COLLATE utf8_unicode_ci,
  `body_ar` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `questions`
--

LOCK TABLES `questions` WRITE;
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` VALUES (31,10,1,1,'<p>What is an electron volt?</p>',NULL,'2016-04-22 04:20:03','2016-04-22 04:20:03',NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `students`
--

DROP TABLE IF EXISTS `students`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `students` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `qualification_en` text COLLATE utf8_unicode_ci,
  `qualification_ar` text COLLATE utf8_unicode_ci,
  `experience_en` text COLLATE utf8_unicode_ci,
  `experience_ar` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `students`
--

LOCK TABLES `students` WRITE;
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` VALUES (1,3,NULL,NULL,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,5,NULL,NULL,NULL,NULL,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,10,NULL,NULL,NULL,NULL,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `subjects`
--

DROP TABLE IF EXISTS `subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `name_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `icon` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `subjects`
--

LOCK TABLES `subjects` WRITE;
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` VALUES (1,'physics','physics',NULL,'physics5706983b65d99','physics5706983b65d5c','flaticon-science65','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,'chemistry','chemistry',NULL,'physics5706983b666b7','physics5706983b6667d','flaticon-science62','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,'math','math',NULL,'physics5706983b66cf6','physics5706983b66cbc','flaticon-calculating12','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,'english','english',NULL,'physics5706983b672f7','physics5706983b672bd','flaticon-abecedary2','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,'french','french',NULL,'physics5706983b678ae','physics5706983b67874','flaticon-monument33','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,'arabic','arabic',NULL,'physics5706983b67e90','physics5706983b67e56','flaticon-islam55','2016-04-08 00:26:19','2016-04-08 00:26:19',NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_levels`
--

DROP TABLE IF EXISTS `user_levels`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_levels` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `level_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_levels`
--

LOCK TABLES `user_levels` WRITE;
/*!40000 ALTER TABLE `user_levels` DISABLE KEYS */;
INSERT INTO `user_levels` VALUES (1,2,2,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,2,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,2,3,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,4,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,3,2,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,5,2,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(16,9,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(17,9,2,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(18,9,4,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(19,10,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `user_levels` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_subjects`
--

DROP TABLE IF EXISTS `user_subjects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_subjects` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_subjects`
--

LOCK TABLES `user_subjects` WRITE;
/*!40000 ALTER TABLE `user_subjects` DISABLE KEYS */;
INSERT INTO `user_subjects` VALUES (1,2,1,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(2,4,2,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(3,3,5,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(4,3,6,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(5,5,1,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(6,5,2,1,'2016-04-08 00:26:19','2016-04-08 00:26:19',NULL),(10,9,1,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL),(11,10,1,1,'2016-04-09 20:32:44','2016-04-09 20:32:44',NULL);
/*!40000 ALTER TABLE `user_subjects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `np_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `firstname_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '0',
  `activation_code` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `admin` tinyint(1) DEFAULT '0',
  `city_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_en` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country_ar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address_en` text COLLATE utf8_unicode_ci,
  `address_ar` text COLLATE utf8_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'NP1234','zal','zal',NULL,NULL,'admin@test.com','$2y$10$SWNrAzsmek7t6gN4feYdnuIr.kp3KQRtVkC/XnF0Flga.UmVqRa.a',1,'2odUsC0MAmyES0V5iScES6xpTZ6upQ',1,NULL,NULL,NULL,NULL,NULL,NULL,'YzcbMfiYeLZqoujQgy5r2ZYq5wSTUY3N01PSM2auftM2FElNOzKqBIJGk8Z4','2016-04-08 00:26:18','2016-04-22 07:39:30',NULL),(2,'NP99001','zal','zal',NULL,NULL,'educator@test.com','$2y$10$7ffBeSkEnydNjhcCC33KhOM0cLBxwCG6AQ7cAO3QfOkV8FZlgHNoq',1,'1MpOK2izzdiSO1ipOoN13DWXIr5Fs9',0,NULL,NULL,NULL,NULL,NULL,NULL,'uAxzf0MiRAxSqRLu3sZtx1UPQfos4b4B0Nw3cNodTiU3nNkMLwKNtq49Kj0n','2016-04-08 00:26:19','2016-04-22 07:40:09',NULL),(3,'NP1001','zal','zal',NULL,NULL,'student@test.com','$2y$10$BJG/zS9v4z1BDyIqe3Uc.O/Ab3mWaa3jN9hsr5KuEpyIsB.pU.OSa',1,'9RVvB4hdeQ5C1evKY4cDG9O3u7Zntz',0,NULL,NULL,NULL,NULL,NULL,NULL,'LZbkhcf0LI7te1YoHJAZYceJ4ZTbEcrYGQxQpcIgOLqm1H0sbIEzoH7FZr4N','2016-04-08 00:26:19','2016-04-13 02:47:18',NULL),(4,'NP99002','zal','zal',NULL,NULL,'educator1@test.com','$2y$10$w8b24MRZ6zySTV75O7yZseEYIb5mksA13BSlklm8pt7zhKdM9v2s2',1,'QVk54Sy7bosXhny12IJC3JiyoxAayI',0,NULL,NULL,NULL,NULL,NULL,NULL,'7nFKpgffGBU3D5EXJb6TERnT8UCePYLm2BcLjoWciEgYKjpClsbOXk5qIg5m','2016-04-08 00:26:19','2016-04-22 07:43:02',NULL),(5,'NP1002','zal','zal','',NULL,'student1@test.com','$2y$10$pueInO/aZ6uyG9tn1NkYyOTLah9KDV/HvM6g44uIAMD6Zth0OM85y',1,'XfXwi5QlxqpYsB3qAOD8itMIL4dxO9',0,'',NULL,'Kuwait',NULL,'',NULL,'JA2xoaLzytFEQpZkeUt0szYJyaBGMKz3l7PGXGbSYKydAlh45IYOkkKw4zdY','2016-04-08 00:26:19','2016-04-21 07:56:08',NULL),(6,'NP993957','Ali',NULL,'KATRIB',NULL,'a.katrib@yahoo.com','$2y$10$DAyWfWpwC7kDEbZnYN1iEO2G2fhiOnRic8X18jjqhITCcj71jNojC',1,'',1,'67000 strasbourg',NULL,'France',NULL,'22 rue de Verdun-',NULL,'kqhlbUlawmgLlZ5sCLGBLohjsI6YdGp0bCw6N0d6Zxrj2QdCg7Zj9ss7L5Dj','2016-04-08 14:18:24','2016-04-08 23:32:48',NULL),(7,'NP992134','Ali',NULL,'KATRIB',NULL,'ali.katrib@ku.edu.kw','$2y$10$o7owBoMJmZWt24eXqzW6uunWGrnhsJAFzK4Mg8sXHny16e6gQgZDe',1,'',0,'67000 strasbourg',NULL,'',NULL,'22 rue de Verdun-',NULL,'4LZzIg7h6KPHW7AYJlKSJMVjREWMFUjLsfGj7KykIKZwIRqphRVAik33cZuy','2016-04-08 14:22:50','2016-04-09 21:00:56',NULL),(9,'NP99004','zal','zal',NULL,NULL,'educator3@test.com','$2y$10$QV1Sz.XfkTMjxbi6zGcmeu8LNmpcncSx/RCXgv9X6MDqic/vjH1pm',1,'p3XD0HWJLIdTlQ6r9diZawwgofbjVs',0,NULL,NULL,NULL,NULL,NULL,NULL,'05RvDBqcpc0xNNJp1JSoWlg97IlMGevVqaXppOZwBnEOfDhuTMuLlA72G8nq','2016-04-09 20:32:44','2016-04-22 07:42:48',NULL),(10,'NP1003','zal','zal',NULL,NULL,'student2@test.com','$2y$10$exL/slpx.FN7jGO.po8XF.I7MZGI7t6.pGlXaPTynuayahqgWR7iO',1,'CCWeSvSP01MvurPut1MW17q1IV9Ajv',0,NULL,NULL,NULL,NULL,NULL,NULL,'9kiXLVsNhFsKbb5SoCair1IuTgzkBuBTHHvAsO5WQ0wqF37wfWMXSoxVbDxS','2016-04-09 20:32:44','2016-04-22 04:30:25',NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2016-04-21 20:52:36
