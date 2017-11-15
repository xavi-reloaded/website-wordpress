-- MySQL dump 10.13  Distrib 5.5.52, for debian-linux-gnu (x86_64)
--
-- Host: db    Database: wordpress
-- ------------------------------------------------------
-- Server version	5.7.20

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
-- Table structure for table `wp_commentmeta`
--

DROP TABLE IF EXISTS `wp_commentmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_commentmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `comment_id` (`comment_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_commentmeta`
--

LOCK TABLES `wp_commentmeta` WRITE;
/*!40000 ALTER TABLE `wp_commentmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_commentmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_comments`
--

DROP TABLE IF EXISTS `wp_comments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_comments` (
  `comment_ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `comment_post_ID` bigint(20) unsigned NOT NULL DEFAULT '0',
  `comment_author` tinytext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_author_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_url` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_author_IP` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `comment_content` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `comment_karma` int(11) NOT NULL DEFAULT '0',
  `comment_approved` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '1',
  `comment_agent` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`comment_ID`),
  KEY `comment_post_ID` (`comment_post_ID`),
  KEY `comment_approved_date_gmt` (`comment_approved`,`comment_date_gmt`),
  KEY `comment_date_gmt` (`comment_date_gmt`),
  KEY `comment_parent` (`comment_parent`),
  KEY `comment_author_email` (`comment_author_email`(10)),
  KEY `woo_idx_comment_type` (`comment_type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_comments`
--

LOCK TABLES `wp_comments` WRITE;
/*!40000 ALTER TABLE `wp_comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_comments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_links`
--

DROP TABLE IF EXISTS `wp_links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_links` (
  `link_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `link_url` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_name` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_image` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_target` varchar(25) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_description` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_visible` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'Y',
  `link_owner` bigint(20) unsigned NOT NULL DEFAULT '1',
  `link_rating` int(11) NOT NULL DEFAULT '0',
  `link_updated` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `link_rel` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `link_notes` mediumtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `link_rss` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`link_id`),
  KEY `link_visible` (`link_visible`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_links`
--

LOCK TABLES `wp_links` WRITE;
/*!40000 ALTER TABLE `wp_links` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_links` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_action_meta`
--

DROP TABLE IF EXISTS `wp_nf3_action_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_action_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `key` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_action_meta`
--

LOCK TABLES `wp_nf3_action_meta` WRITE;
/*!40000 ALTER TABLE `wp_nf3_action_meta` DISABLE KEYS */;
INSERT INTO `wp_nf3_action_meta` VALUES (1,1,'label','Store Submission'),(2,1,'objectType','Action'),(3,1,'objectDomain','actions'),(4,1,'editActive',''),(5,1,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(6,1,'payment_gateways',''),(7,1,'payment_total',''),(8,1,'tag',''),(9,1,'to',''),(10,1,'email_subject',''),(11,1,'email_message',''),(12,1,'from_name',''),(13,1,'from_address',''),(14,1,'reply_to',''),(15,1,'email_format','html'),(16,1,'cc',''),(17,1,'bcc',''),(18,1,'attach_csv',''),(19,1,'redirect_url',''),(20,1,'email_message_plain',''),(21,2,'label','Email Confirmation'),(22,2,'to','{field:email}'),(23,2,'subject','This is an email action.'),(24,2,'message','Hello, Ninja Forms!'),(25,2,'objectType','Action'),(26,2,'objectDomain','actions'),(27,2,'editActive',''),(28,2,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:0:{}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(29,2,'payment_gateways',''),(30,2,'payment_total',''),(31,2,'tag',''),(32,2,'email_subject','Submission Confirmation '),(33,2,'email_message','<p>{all_fields_table}<br></p>'),(34,2,'from_name',''),(35,2,'from_address',''),(36,2,'reply_to',''),(37,2,'email_format','html'),(38,2,'cc',''),(39,2,'bcc',''),(40,2,'attach_csv',''),(41,2,'email_message_plain',''),(42,3,'objectType','Action'),(43,3,'objectDomain','actions'),(44,3,'editActive',''),(45,3,'label','Email Notification'),(46,3,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(47,3,'payment_gateways',''),(48,3,'payment_total',''),(49,3,'tag',''),(50,3,'to','{system:admin_email}'),(51,3,'email_subject','New message from {field:name}'),(52,3,'email_message','<p>{field:message}</p><p>-{field:name} ( {field:email} )</p>'),(53,3,'from_name',''),(54,3,'from_address',''),(55,3,'reply_to','{field:email}'),(56,3,'email_format','html'),(57,3,'cc',''),(58,3,'bcc',''),(59,3,'attach_csv','0'),(60,3,'email_message_plain',''),(61,4,'label','Success Message'),(62,4,'message','Thank you {field:name} for filling out my form!'),(63,4,'objectType','Action'),(64,4,'objectDomain','actions'),(65,4,'editActive',''),(66,4,'conditions','a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}'),(67,4,'payment_gateways',''),(68,4,'payment_total',''),(69,4,'tag',''),(70,4,'to',''),(71,4,'email_subject',''),(72,4,'email_message',''),(73,4,'from_name',''),(74,4,'from_address',''),(75,4,'reply_to',''),(76,4,'email_format','html'),(77,4,'cc',''),(78,4,'bcc',''),(79,4,'attach_csv',''),(80,4,'redirect_url',''),(81,4,'success_msg','<p>Form submitted successfully.</p><p>A confirmation email was sent to {field:email}.</p>'),(82,4,'email_message_plain','');
/*!40000 ALTER TABLE `wp_nf3_action_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_actions`
--

DROP TABLE IF EXISTS `wp_nf3_actions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_actions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8mb4_unicode_520_ci,
  `key` longtext COLLATE utf8mb4_unicode_520_ci,
  `type` longtext COLLATE utf8mb4_unicode_520_ci,
  `active` tinyint(1) DEFAULT '1',
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_actions`
--

LOCK TABLES `wp_nf3_actions` WRITE;
/*!40000 ALTER TABLE `wp_nf3_actions` DISABLE KEYS */;
INSERT INTO `wp_nf3_actions` VALUES (1,'','','save',1,1,'2017-11-14 10:33:48','2017-11-14 10:33:48'),(2,'','','email',1,1,'2017-11-14 10:33:49','2017-11-14 10:33:49'),(3,'','','email',1,1,'2017-11-14 10:33:50','2017-11-14 10:33:50'),(4,'','','successmessage',1,1,'2017-11-14 10:33:52','2017-11-14 10:33:52');
/*!40000 ALTER TABLE `wp_nf3_actions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_field_meta`
--

DROP TABLE IF EXISTS `wp_nf3_field_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_field_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `key` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_field_meta`
--

LOCK TABLES `wp_nf3_field_meta` WRITE;
/*!40000 ALTER TABLE `wp_nf3_field_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_nf3_field_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_fields`
--

DROP TABLE IF EXISTS `wp_nf3_fields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` longtext COLLATE utf8mb4_unicode_520_ci,
  `key` longtext COLLATE utf8mb4_unicode_520_ci,
  `type` longtext COLLATE utf8mb4_unicode_520_ci,
  `parent_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_fields`
--

LOCK TABLES `wp_nf3_fields` WRITE;
/*!40000 ALTER TABLE `wp_nf3_fields` DISABLE KEYS */;
INSERT INTO `wp_nf3_fields` VALUES (1,NULL,NULL,NULL,1,'2017-11-14 10:33:46','2017-11-14 10:33:46'),(2,NULL,NULL,NULL,1,'2017-11-14 10:33:47','2017-11-14 10:33:47'),(3,NULL,NULL,NULL,1,'2017-11-14 10:33:47','2017-11-14 10:33:47'),(4,NULL,NULL,NULL,1,'2017-11-14 10:33:47','2017-11-14 10:33:47');
/*!40000 ALTER TABLE `wp_nf3_fields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_form_meta`
--

DROP TABLE IF EXISTS `wp_nf3_form_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_form_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `key` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=97 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_form_meta`
--

LOCK TABLES `wp_nf3_form_meta` WRITE;
/*!40000 ALTER TABLE `wp_nf3_form_meta` DISABLE KEYS */;
INSERT INTO `wp_nf3_form_meta` VALUES (1,1,'default_label_pos','above'),(2,1,'conditions','a:0:{}'),(3,1,'objectType','Form Setting'),(4,1,'editActive',''),(5,1,'show_title','1'),(6,1,'clear_complete','1'),(7,1,'hide_complete','1'),(8,1,'wrapper_class',''),(9,1,'element_class',''),(10,1,'add_submit','1'),(11,1,'logged_in',''),(12,1,'not_logged_in_msg',''),(13,1,'sub_limit_number',''),(14,1,'sub_limit_msg',''),(15,1,'calculations','a:0:{}'),(16,1,'formContentData','a:4:{i:0;a:2:{s:5:\"order\";s:1:\"0\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:4:\"name\";}s:5:\"width\";s:3:\"100\";}}}i:1;a:2:{s:5:\"order\";s:1:\"1\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:5:\"email\";}s:5:\"width\";s:3:\"100\";}}}i:2;a:2:{s:5:\"order\";s:1:\"2\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:7:\"message\";}s:5:\"width\";s:3:\"100\";}}}i:3;a:2:{s:5:\"order\";s:1:\"3\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:6:\"submit\";}s:5:\"width\";s:3:\"100\";}}}}'),(17,1,'container_styles_background-color',''),(18,1,'container_styles_border',''),(19,1,'container_styles_border-style',''),(20,1,'container_styles_border-color',''),(21,1,'container_styles_color',''),(22,1,'container_styles_height',''),(23,1,'container_styles_width',''),(24,1,'container_styles_font-size',''),(25,1,'container_styles_margin',''),(26,1,'container_styles_padding',''),(27,1,'container_styles_display',''),(28,1,'container_styles_float',''),(29,1,'container_styles_show_advanced_css','0'),(30,1,'container_styles_advanced',''),(31,1,'title_styles_background-color',''),(32,1,'title_styles_border',''),(33,1,'title_styles_border-style',''),(34,1,'title_styles_border-color',''),(35,1,'title_styles_color',''),(36,1,'title_styles_height',''),(37,1,'title_styles_width',''),(38,1,'title_styles_font-size',''),(39,1,'title_styles_margin',''),(40,1,'title_styles_padding',''),(41,1,'title_styles_display',''),(42,1,'title_styles_float',''),(43,1,'title_styles_show_advanced_css','0'),(44,1,'title_styles_advanced',''),(45,1,'row_styles_background-color',''),(46,1,'row_styles_border',''),(47,1,'row_styles_border-style',''),(48,1,'row_styles_border-color',''),(49,1,'row_styles_color',''),(50,1,'row_styles_height',''),(51,1,'row_styles_width',''),(52,1,'row_styles_font-size',''),(53,1,'row_styles_margin',''),(54,1,'row_styles_padding',''),(55,1,'row_styles_display',''),(56,1,'row_styles_show_advanced_css','0'),(57,1,'row_styles_advanced',''),(58,1,'row-odd_styles_background-color',''),(59,1,'row-odd_styles_border',''),(60,1,'row-odd_styles_border-style',''),(61,1,'row-odd_styles_border-color',''),(62,1,'row-odd_styles_color',''),(63,1,'row-odd_styles_height',''),(64,1,'row-odd_styles_width',''),(65,1,'row-odd_styles_font-size',''),(66,1,'row-odd_styles_margin',''),(67,1,'row-odd_styles_padding',''),(68,1,'row-odd_styles_display',''),(69,1,'row-odd_styles_show_advanced_css','0'),(70,1,'row-odd_styles_advanced',''),(71,1,'success-msg_styles_background-color',''),(72,1,'success-msg_styles_border',''),(73,1,'success-msg_styles_border-style',''),(74,1,'success-msg_styles_border-color',''),(75,1,'success-msg_styles_color',''),(76,1,'success-msg_styles_height',''),(77,1,'success-msg_styles_width',''),(78,1,'success-msg_styles_font-size',''),(79,1,'success-msg_styles_margin',''),(80,1,'success-msg_styles_padding',''),(81,1,'success-msg_styles_display',''),(82,1,'success-msg_styles_show_advanced_css','0'),(83,1,'success-msg_styles_advanced',''),(84,1,'error_msg_styles_background-color',''),(85,1,'error_msg_styles_border',''),(86,1,'error_msg_styles_border-style',''),(87,1,'error_msg_styles_border-color',''),(88,1,'error_msg_styles_color',''),(89,1,'error_msg_styles_height',''),(90,1,'error_msg_styles_width',''),(91,1,'error_msg_styles_font-size',''),(92,1,'error_msg_styles_margin',''),(93,1,'error_msg_styles_padding',''),(94,1,'error_msg_styles_display',''),(95,1,'error_msg_styles_show_advanced_css','0'),(96,1,'error_msg_styles_advanced','');
/*!40000 ALTER TABLE `wp_nf3_form_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_forms`
--

DROP TABLE IF EXISTS `wp_nf3_forms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_forms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` longtext COLLATE utf8mb4_unicode_520_ci,
  `key` longtext COLLATE utf8mb4_unicode_520_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  `views` int(11) DEFAULT NULL,
  `subs` int(11) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_forms`
--

LOCK TABLES `wp_nf3_forms` WRITE;
/*!40000 ALTER TABLE `wp_nf3_forms` DISABLE KEYS */;
INSERT INTO `wp_nf3_forms` VALUES (1,'Contact Me','','2017-11-14 10:33:42','2017-11-14 10:33:42',NULL,NULL);
/*!40000 ALTER TABLE `wp_nf3_forms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_object_meta`
--

DROP TABLE IF EXISTS `wp_nf3_object_meta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_object_meta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `key` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `value` longtext COLLATE utf8mb4_unicode_520_ci,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_object_meta`
--

LOCK TABLES `wp_nf3_object_meta` WRITE;
/*!40000 ALTER TABLE `wp_nf3_object_meta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_nf3_object_meta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_objects`
--

DROP TABLE IF EXISTS `wp_nf3_objects`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_objects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` longtext COLLATE utf8mb4_unicode_520_ci,
  `title` longtext COLLATE utf8mb4_unicode_520_ci,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_objects`
--

LOCK TABLES `wp_nf3_objects` WRITE;
/*!40000 ALTER TABLE `wp_nf3_objects` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_nf3_objects` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_nf3_relationships`
--

DROP TABLE IF EXISTS `wp_nf3_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_nf3_relationships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `child_id` int(11) NOT NULL,
  `child_type` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent_id` int(11) NOT NULL,
  `parent_type` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_nf3_relationships`
--

LOCK TABLES `wp_nf3_relationships` WRITE;
/*!40000 ALTER TABLE `wp_nf3_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_nf3_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_options`
--

DROP TABLE IF EXISTS `wp_options`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_options` (
  `option_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(191) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `option_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `autoload` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'yes',
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=315 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_options`
--

LOCK TABLES `wp_options` WRITE;
/*!40000 ALTER TABLE `wp_options` DISABLE KEYS */;
INSERT INTO `wp_options` VALUES (1,'siteurl','http://localhost','yes'),(2,'home','http://localhost','yes'),(3,'blogname','LleidaJobs','yes'),(4,'blogdescription','Just another WordPress site','yes'),(5,'users_can_register','0','yes'),(6,'admin_email','xavi.hidalgo.fernandez@gmail.com','yes'),(7,'start_of_week','1','yes'),(8,'use_balanceTags','0','yes'),(9,'use_smilies','1','yes'),(10,'require_name_email','1','yes'),(11,'comments_notify','1','yes'),(12,'posts_per_rss','10','yes'),(13,'rss_use_excerpt','0','yes'),(14,'mailserver_url','mail.example.com','yes'),(15,'mailserver_login','login@example.com','yes'),(16,'mailserver_pass','password','yes'),(17,'mailserver_port','110','yes'),(18,'default_category','1','yes'),(19,'default_comment_status','open','yes'),(20,'default_ping_status','open','yes'),(21,'default_pingback_flag','1','yes'),(22,'posts_per_page','10','yes'),(23,'date_format','F j, Y','yes'),(24,'time_format','g:i a','yes'),(25,'links_updated_date_format','F j, Y g:i a','yes'),(26,'comment_moderation','0','yes'),(27,'moderation_notify','1','yes'),(28,'permalink_structure','/%year%/%monthnum%/%day%/%postname%/','yes'),(29,'rewrite_rules','a:210:{s:55:\"company/(.+?)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:46:\"index.php?company=$matches[1]&feed=$matches[2]\";s:50:\"company/(.+?)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:46:\"index.php?company=$matches[1]&feed=$matches[2]\";s:22:\"company/(.+?)/embed/?$\";s:40:\"index.php?company=$matches[1]&embed=true\";s:34:\"company/(.+?)/page/?([0-9]{1,})/?$\";s:47:\"index.php?company=$matches[1]&paged=$matches[2]\";s:16:\"company/(.+?)/?$\";s:29:\"index.php?company=$matches[1]\";s:24:\"^wc-auth/v([1]{1})/(.*)?\";s:63:\"index.php?wc-auth-version=$matches[1]&wc-auth-route=$matches[2]\";s:22:\"^wc-api/v([1-3]{1})/?$\";s:51:\"index.php?wc-api-version=$matches[1]&wc-api-route=/\";s:24:\"^wc-api/v([1-3]{1})(.*)?\";s:61:\"index.php?wc-api-version=$matches[1]&wc-api-route=$matches[2]\";s:7:\"shop/?$\";s:27:\"index.php?post_type=product\";s:46:\"shop/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:44:\"index.php?post_type=product&feed=$matches[1]\";s:41:\"shop/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:44:\"index.php?post_type=product&feed=$matches[1]\";s:24:\"shop/page/([0-9]{1,})/?$\";s:45:\"index.php?post_type=product&paged=$matches[1]\";s:11:\"^wp-json/?$\";s:22:\"index.php?rest_route=/\";s:14:\"^wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:21:\"^index.php/wp-json/?$\";s:22:\"index.php?rest_route=/\";s:24:\"^index.php/wp-json/(.*)?\";s:33:\"index.php?rest_route=/$matches[1]\";s:17:\"jm-ajax/([^/]*)/?\";s:29:\"index.php?jm-ajax=$matches[1]\";s:27:\"index.php/jm-ajax/([^/]*)/?\";s:29:\"index.php?jm-ajax=$matches[1]\";s:15:\"testimonials/?$\";s:31:\"index.php?post_type=testimonial\";s:54:\"testimonials/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:48:\"index.php?post_type=testimonial&feed=$matches[1]\";s:49:\"testimonials/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:48:\"index.php?post_type=testimonial&feed=$matches[1]\";s:32:\"testimonials/page/([0-9]{1,})/?$\";s:49:\"index.php?post_type=testimonial&paged=$matches[1]\";s:56:\"category/(.+?)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:51:\"category/(.+?)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:52:\"index.php?category_name=$matches[1]&feed=$matches[2]\";s:23:\"category/(.+?)/embed/?$\";s:46:\"index.php?category_name=$matches[1]&embed=true\";s:35:\"category/(.+?)/page/?([0-9]{1,})/?$\";s:53:\"index.php?category_name=$matches[1]&paged=$matches[2]\";s:32:\"category/(.+?)/wc-api(/(.*))?/?$\";s:54:\"index.php?category_name=$matches[1]&wc-api=$matches[3]\";s:17:\"category/(.+?)/?$\";s:35:\"index.php?category_name=$matches[1]\";s:53:\"tag/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:48:\"tag/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:42:\"index.php?tag=$matches[1]&feed=$matches[2]\";s:20:\"tag/([^/]+)/embed/?$\";s:36:\"index.php?tag=$matches[1]&embed=true\";s:32:\"tag/([^/]+)/page/?([0-9]{1,})/?$\";s:43:\"index.php?tag=$matches[1]&paged=$matches[2]\";s:29:\"tag/([^/]+)/wc-api(/(.*))?/?$\";s:44:\"index.php?tag=$matches[1]&wc-api=$matches[3]\";s:14:\"tag/([^/]+)/?$\";s:25:\"index.php?tag=$matches[1]\";s:54:\"type/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:49:\"type/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?post_format=$matches[1]&feed=$matches[2]\";s:21:\"type/([^/]+)/embed/?$\";s:44:\"index.php?post_format=$matches[1]&embed=true\";s:33:\"type/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?post_format=$matches[1]&paged=$matches[2]\";s:15:\"type/([^/]+)/?$\";s:33:\"index.php?post_format=$matches[1]\";s:31:\"job/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:41:\"job/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:70:\"job/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:65:\"job/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:56:\"job/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:37:\"job/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:20:\"job/([^/]+)/embed/?$\";s:44:\"index.php?job_listing=$matches[1]&embed=true\";s:24:\"job/([^/]+)/trackback/?$\";s:38:\"index.php?job_listing=$matches[1]&tb=1\";s:32:\"job/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?job_listing=$matches[1]&paged=$matches[2]\";s:39:\"job/([^/]+)/comment-page-([0-9]{1,})/?$\";s:51:\"index.php?job_listing=$matches[1]&cpage=$matches[2]\";s:29:\"job/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?job_listing=$matches[1]&wc-api=$matches[3]\";s:35:\"job/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:46:\"job/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:28:\"job/([^/]+)(?:/([0-9]+))?/?$\";s:50:\"index.php?job_listing=$matches[1]&page=$matches[2]\";s:20:\"job/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:30:\"job/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:59:\"job/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:54:\"job/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:45:\"job/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:26:\"job/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:66:\"categoria-producto/(.+?)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:61:\"categoria-producto/(.+?)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?product_cat=$matches[1]&feed=$matches[2]\";s:33:\"categoria-producto/(.+?)/embed/?$\";s:44:\"index.php?product_cat=$matches[1]&embed=true\";s:45:\"categoria-producto/(.+?)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_cat=$matches[1]&paged=$matches[2]\";s:27:\"categoria-producto/(.+?)/?$\";s:33:\"index.php?product_cat=$matches[1]\";s:67:\"etiqueta-producto/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:62:\"etiqueta-producto/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?product_tag=$matches[1]&feed=$matches[2]\";s:34:\"etiqueta-producto/([^/]+)/embed/?$\";s:44:\"index.php?product_tag=$matches[1]&embed=true\";s:46:\"etiqueta-producto/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?product_tag=$matches[1]&paged=$matches[2]\";s:28:\"etiqueta-producto/([^/]+)/?$\";s:33:\"index.php?product_tag=$matches[1]\";s:36:\"producto/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:46:\"producto/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:75:\"producto/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:70:\"producto/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\"producto/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:42:\"producto/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:25:\"producto/([^/]+)/embed/?$\";s:40:\"index.php?product=$matches[1]&embed=true\";s:29:\"producto/([^/]+)/trackback/?$\";s:34:\"index.php?product=$matches[1]&tb=1\";s:58:\"producto/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:46:\"index.php?product=$matches[1]&feed=$matches[2]\";s:53:\"producto/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:46:\"index.php?product=$matches[1]&feed=$matches[2]\";s:37:\"producto/([^/]+)/page/?([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&paged=$matches[2]\";s:44:\"producto/([^/]+)/comment-page-([0-9]{1,})/?$\";s:47:\"index.php?product=$matches[1]&cpage=$matches[2]\";s:34:\"producto/([^/]+)/wc-api(/(.*))?/?$\";s:48:\"index.php?product=$matches[1]&wc-api=$matches[3]\";s:40:\"producto/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:51:\"producto/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:33:\"producto/([^/]+)(?:/([0-9]+))?/?$\";s:46:\"index.php?product=$matches[1]&page=$matches[2]\";s:25:\"producto/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:35:\"producto/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:64:\"producto/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:59:\"producto/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:50:\"producto/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:31:\"producto/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:39:\"testimonial/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:49:\"testimonial/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:78:\"testimonial/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:73:\"testimonial/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:64:\"testimonial/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:45:\"testimonial/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:28:\"testimonial/([^/]+)/embed/?$\";s:44:\"index.php?testimonial=$matches[1]&embed=true\";s:32:\"testimonial/([^/]+)/trackback/?$\";s:38:\"index.php?testimonial=$matches[1]&tb=1\";s:61:\"testimonial/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?testimonial=$matches[1]&feed=$matches[2]\";s:56:\"testimonial/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?testimonial=$matches[1]&feed=$matches[2]\";s:40:\"testimonial/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?testimonial=$matches[1]&paged=$matches[2]\";s:47:\"testimonial/([^/]+)/comment-page-([0-9]{1,})/?$\";s:51:\"index.php?testimonial=$matches[1]&cpage=$matches[2]\";s:37:\"testimonial/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?testimonial=$matches[1]&wc-api=$matches[3]\";s:43:\"testimonial/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:54:\"testimonial/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:36:\"testimonial/([^/]+)(?:/([0-9]+))?/?$\";s:50:\"index.php?testimonial=$matches[1]&page=$matches[2]\";s:28:\"testimonial/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:38:\"testimonial/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:67:\"testimonial/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:62:\"testimonial/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:53:\"testimonial/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:34:\"testimonial/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:12:\"robots\\.txt$\";s:18:\"index.php?robots=1\";s:48:\".*wp-(atom|rdf|rss|rss2|feed|commentsrss2)\\.php$\";s:18:\"index.php?feed=old\";s:20:\".*wp-app\\.php(/.*)?$\";s:19:\"index.php?error=403\";s:18:\".*wp-register.php$\";s:23:\"index.php?register=true\";s:41:\"feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:36:\"(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:27:\"index.php?&feed=$matches[1]\";s:8:\"embed/?$\";s:21:\"index.php?&embed=true\";s:20:\"page/?([0-9]{1,})/?$\";s:28:\"index.php?&paged=$matches[1]\";s:17:\"wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:50:\"comments/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:45:\"comments/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:42:\"index.php?&feed=$matches[1]&withcomments=1\";s:17:\"comments/embed/?$\";s:21:\"index.php?&embed=true\";s:26:\"comments/wc-api(/(.*))?/?$\";s:29:\"index.php?&wc-api=$matches[2]\";s:53:\"search/(.+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:48:\"search/(.+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:40:\"index.php?s=$matches[1]&feed=$matches[2]\";s:20:\"search/(.+)/embed/?$\";s:34:\"index.php?s=$matches[1]&embed=true\";s:32:\"search/(.+)/page/?([0-9]{1,})/?$\";s:41:\"index.php?s=$matches[1]&paged=$matches[2]\";s:29:\"search/(.+)/wc-api(/(.*))?/?$\";s:42:\"index.php?s=$matches[1]&wc-api=$matches[3]\";s:14:\"search/(.+)/?$\";s:23:\"index.php?s=$matches[1]\";s:56:\"author/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:51:\"author/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:50:\"index.php?author_name=$matches[1]&feed=$matches[2]\";s:23:\"author/([^/]+)/embed/?$\";s:44:\"index.php?author_name=$matches[1]&embed=true\";s:35:\"author/([^/]+)/page/?([0-9]{1,})/?$\";s:51:\"index.php?author_name=$matches[1]&paged=$matches[2]\";s:32:\"author/([^/]+)/wc-api(/(.*))?/?$\";s:52:\"index.php?author_name=$matches[1]&wc-api=$matches[3]\";s:17:\"author/([^/]+)/?$\";s:33:\"index.php?author_name=$matches[1]\";s:78:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:73:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:80:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&feed=$matches[4]\";s:45:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/embed/?$\";s:74:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&paged=$matches[4]\";s:54:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:82:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&wc-api=$matches[5]\";s:39:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/?$\";s:63:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]\";s:65:\"([0-9]{4})/([0-9]{1,2})/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:60:\"([0-9]{4})/([0-9]{1,2})/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:64:\"index.php?year=$matches[1]&monthnum=$matches[2]&feed=$matches[3]\";s:32:\"([0-9]{4})/([0-9]{1,2})/embed/?$\";s:58:\"index.php?year=$matches[1]&monthnum=$matches[2]&embed=true\";s:44:\"([0-9]{4})/([0-9]{1,2})/page/?([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&paged=$matches[3]\";s:41:\"([0-9]{4})/([0-9]{1,2})/wc-api(/(.*))?/?$\";s:66:\"index.php?year=$matches[1]&monthnum=$matches[2]&wc-api=$matches[4]\";s:26:\"([0-9]{4})/([0-9]{1,2})/?$\";s:47:\"index.php?year=$matches[1]&monthnum=$matches[2]\";s:52:\"([0-9]{4})/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:47:\"([0-9]{4})/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:43:\"index.php?year=$matches[1]&feed=$matches[2]\";s:19:\"([0-9]{4})/embed/?$\";s:37:\"index.php?year=$matches[1]&embed=true\";s:31:\"([0-9]{4})/page/?([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&paged=$matches[2]\";s:28:\"([0-9]{4})/wc-api(/(.*))?/?$\";s:45:\"index.php?year=$matches[1]&wc-api=$matches[3]\";s:13:\"([0-9]{4})/?$\";s:26:\"index.php?year=$matches[1]\";s:58:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:68:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:97:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:92:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:83:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:64:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:53:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/embed/?$\";s:91:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&embed=true\";s:57:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/trackback/?$\";s:85:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&tb=1\";s:86:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:81:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&feed=$matches[5]\";s:65:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/page/?([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&paged=$matches[5]\";s:72:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/comment-page-([0-9]{1,})/?$\";s:98:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&cpage=$matches[5]\";s:62:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)/wc-api(/(.*))?/?$\";s:99:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&wc-api=$matches[6]\";s:62:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:73:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:61:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/([^/]+)(?:/([0-9]+))?/?$\";s:97:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&name=$matches[4]&page=$matches[5]\";s:47:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:57:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:86:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:81:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:72:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:53:\"[0-9]{4}/[0-9]{1,2}/[0-9]{1,2}/[^/]+/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:64:\"([0-9]{4})/([0-9]{1,2})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:81:\"index.php?year=$matches[1]&monthnum=$matches[2]&day=$matches[3]&cpage=$matches[4]\";s:51:\"([0-9]{4})/([0-9]{1,2})/comment-page-([0-9]{1,})/?$\";s:65:\"index.php?year=$matches[1]&monthnum=$matches[2]&cpage=$matches[3]\";s:38:\"([0-9]{4})/comment-page-([0-9]{1,})/?$\";s:44:\"index.php?year=$matches[1]&cpage=$matches[2]\";s:27:\".?.+?/attachment/([^/]+)/?$\";s:32:\"index.php?attachment=$matches[1]\";s:37:\".?.+?/attachment/([^/]+)/trackback/?$\";s:37:\"index.php?attachment=$matches[1]&tb=1\";s:66:\".?.+?/attachment/([^/]+)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:61:\".?.+?/attachment/([^/]+)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:49:\"index.php?attachment=$matches[1]&feed=$matches[2]\";s:52:\".?.+?/attachment/([^/]+)/comment-page-([0-9]{1,})/?$\";s:50:\"index.php?attachment=$matches[1]&cpage=$matches[2]\";s:33:\".?.+?/attachment/([^/]+)/embed/?$\";s:43:\"index.php?attachment=$matches[1]&embed=true\";s:16:\"(.?.+?)/embed/?$\";s:41:\"index.php?pagename=$matches[1]&embed=true\";s:20:\"(.?.+?)/trackback/?$\";s:35:\"index.php?pagename=$matches[1]&tb=1\";s:49:\"(.?.+?)/feed/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:44:\"(.?.+?)/(feed|rdf|rss|rss2|atom|job_feed)/?$\";s:47:\"index.php?pagename=$matches[1]&feed=$matches[2]\";s:28:\"(.?.+?)/page/?([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&paged=$matches[2]\";s:35:\"(.?.+?)/comment-page-([0-9]{1,})/?$\";s:48:\"index.php?pagename=$matches[1]&cpage=$matches[2]\";s:25:\"(.?.+?)/wc-api(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&wc-api=$matches[3]\";s:28:\"(.?.+?)/order-pay(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&order-pay=$matches[3]\";s:33:\"(.?.+?)/order-received(/(.*))?/?$\";s:57:\"index.php?pagename=$matches[1]&order-received=$matches[3]\";s:25:\"(.?.+?)/orders(/(.*))?/?$\";s:49:\"index.php?pagename=$matches[1]&orders=$matches[3]\";s:29:\"(.?.+?)/view-order(/(.*))?/?$\";s:53:\"index.php?pagename=$matches[1]&view-order=$matches[3]\";s:28:\"(.?.+?)/downloads(/(.*))?/?$\";s:52:\"index.php?pagename=$matches[1]&downloads=$matches[3]\";s:31:\"(.?.+?)/edit-account(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-account=$matches[3]\";s:31:\"(.?.+?)/edit-address(/(.*))?/?$\";s:55:\"index.php?pagename=$matches[1]&edit-address=$matches[3]\";s:34:\"(.?.+?)/payment-methods(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&payment-methods=$matches[3]\";s:32:\"(.?.+?)/lost-password(/(.*))?/?$\";s:56:\"index.php?pagename=$matches[1]&lost-password=$matches[3]\";s:34:\"(.?.+?)/customer-logout(/(.*))?/?$\";s:58:\"index.php?pagename=$matches[1]&customer-logout=$matches[3]\";s:37:\"(.?.+?)/add-payment-method(/(.*))?/?$\";s:61:\"index.php?pagename=$matches[1]&add-payment-method=$matches[3]\";s:40:\"(.?.+?)/delete-payment-method(/(.*))?/?$\";s:64:\"index.php?pagename=$matches[1]&delete-payment-method=$matches[3]\";s:45:\"(.?.+?)/set-default-payment-method(/(.*))?/?$\";s:69:\"index.php?pagename=$matches[1]&set-default-payment-method=$matches[3]\";s:31:\".?.+?/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:42:\".?.+?/attachment/([^/]+)/wc-api(/(.*))?/?$\";s:51:\"index.php?attachment=$matches[1]&wc-api=$matches[3]\";s:24:\"(.?.+?)(?:/([0-9]+))?/?$\";s:47:\"index.php?pagename=$matches[1]&page=$matches[2]\";}','yes'),(30,'hack_file','0','yes'),(31,'blog_charset','UTF-8','yes'),(32,'moderation_keys','','no'),(33,'active_plugins','a:11:{i:0;s:51:\"all-in-one-wp-migration/all-in-one-wp-migration.php\";i:1;s:19:\"if-menu/if-menu.php\";i:2;s:27:\"ninja-forms/ninja-forms.php\";i:3;s:52:\"testimonials-by-woothemes/woothemes-testimonials.php\";i:4;s:67:\"woocommerce-simple-registration/woocommerce-simple-registration.php\";i:5;s:27:\"woocommerce/woocommerce.php\";i:6;s:47:\"wp-job-manager-colors/wp-job-manager-colors.php\";i:7;s:53:\"wp-job-manager-companies/wp-job-manager-companies.php\";i:8;s:65:\"wp-job-manager-contact-listing/wp-job-manager-contact-listing.php\";i:9;s:53:\"wp-job-manager-locations/wp-job-manager-locations.php\";i:10;s:33:\"wp-job-manager/wp-job-manager.php\";}','yes'),(34,'category_base','','yes'),(35,'ping_sites','http://rpc.pingomatic.com/','yes'),(36,'comment_max_links','2','yes'),(37,'gmt_offset','0','yes'),(38,'default_email_category','1','yes'),(39,'recently_edited','','no'),(40,'template','twentyseventeen','yes'),(41,'stylesheet','twentyseventeen','yes'),(42,'comment_whitelist','1','yes'),(43,'blacklist_keys','','no'),(44,'comment_registration','0','yes'),(45,'html_type','text/html','yes'),(46,'use_trackback','0','yes'),(47,'default_role','subscriber','yes'),(48,'db_version','38590','yes'),(49,'uploads_use_yearmonth_folders','1','yes'),(50,'upload_path','','yes'),(51,'blog_public','1','yes'),(52,'default_link_category','2','yes'),(53,'show_on_front','posts','yes'),(54,'tag_base','','yes'),(55,'show_avatars','1','yes'),(56,'avatar_rating','G','yes'),(57,'upload_url_path','','yes'),(58,'thumbnail_size_w','150','yes'),(59,'thumbnail_size_h','150','yes'),(60,'thumbnail_crop','1','yes'),(61,'medium_size_w','300','yes'),(62,'medium_size_h','300','yes'),(63,'avatar_default','mystery','yes'),(64,'large_size_w','1024','yes'),(65,'large_size_h','1024','yes'),(66,'image_default_link_type','none','yes'),(67,'image_default_size','','yes'),(68,'image_default_align','','yes'),(69,'close_comments_for_old_posts','0','yes'),(70,'close_comments_days_old','14','yes'),(71,'thread_comments','1','yes'),(72,'thread_comments_depth','5','yes'),(73,'page_comments','0','yes'),(74,'comments_per_page','50','yes'),(75,'default_comments_page','newest','yes'),(76,'comment_order','asc','yes'),(77,'sticky_posts','a:0:{}','yes'),(78,'widget_categories','a:2:{i:2;a:4:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:12:\"hierarchical\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}','yes'),(79,'widget_text','a:0:{}','yes'),(80,'widget_rss','a:0:{}','yes'),(81,'uninstall_plugins','a:1:{s:27:\"ninja-forms/ninja-forms.php\";s:21:\"ninja_forms_uninstall\";}','no'),(82,'timezone_string','','yes'),(83,'page_for_posts','0','yes'),(84,'page_on_front','0','yes'),(85,'default_post_format','0','yes'),(86,'link_manager_enabled','0','yes'),(87,'finished_splitting_shared_terms','1','yes'),(88,'site_icon','0','yes'),(89,'medium_large_size_w','768','yes'),(90,'medium_large_size_h','0','yes'),(91,'initial_db_version','38590','yes'),(92,'wp_user_roles','a:8:{s:13:\"administrator\";a:2:{s:4:\"name\";s:13:\"Administrator\";s:12:\"capabilities\";a:149:{s:13:\"switch_themes\";b:1;s:11:\"edit_themes\";b:1;s:16:\"activate_plugins\";b:1;s:12:\"edit_plugins\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_files\";b:1;s:14:\"manage_options\";b:1;s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:6:\"import\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:8:\"level_10\";b:1;s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;s:12:\"delete_users\";b:1;s:12:\"create_users\";b:1;s:17:\"unfiltered_upload\";b:1;s:14:\"edit_dashboard\";b:1;s:14:\"update_plugins\";b:1;s:14:\"delete_plugins\";b:1;s:15:\"install_plugins\";b:1;s:13:\"update_themes\";b:1;s:14:\"install_themes\";b:1;s:11:\"update_core\";b:1;s:10:\"list_users\";b:1;s:12:\"remove_users\";b:1;s:13:\"promote_users\";b:1;s:18:\"edit_theme_options\";b:1;s:13:\"delete_themes\";b:1;s:6:\"export\";b:1;s:19:\"manage_job_listings\";b:1;s:16:\"edit_job_listing\";b:1;s:16:\"read_job_listing\";b:1;s:18:\"delete_job_listing\";b:1;s:17:\"edit_job_listings\";b:1;s:24:\"edit_others_job_listings\";b:1;s:20:\"publish_job_listings\";b:1;s:25:\"read_private_job_listings\";b:1;s:19:\"delete_job_listings\";b:1;s:27:\"delete_private_job_listings\";b:1;s:29:\"delete_published_job_listings\";b:1;s:26:\"delete_others_job_listings\";b:1;s:25:\"edit_private_job_listings\";b:1;s:27:\"edit_published_job_listings\";b:1;s:24:\"manage_job_listing_terms\";b:1;s:22:\"edit_job_listing_terms\";b:1;s:24:\"delete_job_listing_terms\";b:1;s:24:\"assign_job_listing_terms\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;s:17:\"edit_shop_webhook\";b:1;s:17:\"read_shop_webhook\";b:1;s:19:\"delete_shop_webhook\";b:1;s:18:\"edit_shop_webhooks\";b:1;s:25:\"edit_others_shop_webhooks\";b:1;s:21:\"publish_shop_webhooks\";b:1;s:26:\"read_private_shop_webhooks\";b:1;s:20:\"delete_shop_webhooks\";b:1;s:28:\"delete_private_shop_webhooks\";b:1;s:30:\"delete_published_shop_webhooks\";b:1;s:27:\"delete_others_shop_webhooks\";b:1;s:26:\"edit_private_shop_webhooks\";b:1;s:28:\"edit_published_shop_webhooks\";b:1;s:25:\"manage_shop_webhook_terms\";b:1;s:23:\"edit_shop_webhook_terms\";b:1;s:25:\"delete_shop_webhook_terms\";b:1;s:25:\"assign_shop_webhook_terms\";b:1;}}s:6:\"editor\";a:2:{s:4:\"name\";s:6:\"Editor\";s:12:\"capabilities\";a:34:{s:17:\"moderate_comments\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:12:\"upload_files\";b:1;s:15:\"unfiltered_html\";b:1;s:10:\"edit_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:10:\"edit_pages\";b:1;s:4:\"read\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:17:\"edit_others_pages\";b:1;s:20:\"edit_published_pages\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_pages\";b:1;s:19:\"delete_others_pages\";b:1;s:22:\"delete_published_pages\";b:1;s:12:\"delete_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:22:\"delete_published_posts\";b:1;s:20:\"delete_private_posts\";b:1;s:18:\"edit_private_posts\";b:1;s:18:\"read_private_posts\";b:1;s:20:\"delete_private_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"read_private_pages\";b:1;}}s:6:\"author\";a:2:{s:4:\"name\";s:6:\"Author\";s:12:\"capabilities\";a:10:{s:12:\"upload_files\";b:1;s:10:\"edit_posts\";b:1;s:20:\"edit_published_posts\";b:1;s:13:\"publish_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;s:22:\"delete_published_posts\";b:1;}}s:11:\"contributor\";a:2:{s:4:\"name\";s:11:\"Contributor\";s:12:\"capabilities\";a:5:{s:10:\"edit_posts\";b:1;s:4:\"read\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:12:\"delete_posts\";b:1;}}s:10:\"subscriber\";a:2:{s:4:\"name\";s:10:\"Subscriber\";s:12:\"capabilities\";a:2:{s:4:\"read\";b:1;s:7:\"level_0\";b:1;}}s:8:\"employer\";a:2:{s:4:\"name\";s:8:\"Employer\";s:12:\"capabilities\";a:3:{s:4:\"read\";b:1;s:10:\"edit_posts\";b:0;s:12:\"delete_posts\";b:0;}}s:8:\"customer\";a:2:{s:4:\"name\";s:7:\"Cliente\";s:12:\"capabilities\";a:1:{s:4:\"read\";b:1;}}s:12:\"shop_manager\";a:2:{s:4:\"name\";s:19:\"Gestor de la tienda\";s:12:\"capabilities\";a:109:{s:7:\"level_9\";b:1;s:7:\"level_8\";b:1;s:7:\"level_7\";b:1;s:7:\"level_6\";b:1;s:7:\"level_5\";b:1;s:7:\"level_4\";b:1;s:7:\"level_3\";b:1;s:7:\"level_2\";b:1;s:7:\"level_1\";b:1;s:7:\"level_0\";b:1;s:4:\"read\";b:1;s:18:\"read_private_pages\";b:1;s:18:\"read_private_posts\";b:1;s:10:\"edit_users\";b:1;s:10:\"edit_posts\";b:1;s:10:\"edit_pages\";b:1;s:20:\"edit_published_posts\";b:1;s:20:\"edit_published_pages\";b:1;s:18:\"edit_private_pages\";b:1;s:18:\"edit_private_posts\";b:1;s:17:\"edit_others_posts\";b:1;s:17:\"edit_others_pages\";b:1;s:13:\"publish_posts\";b:1;s:13:\"publish_pages\";b:1;s:12:\"delete_posts\";b:1;s:12:\"delete_pages\";b:1;s:20:\"delete_private_pages\";b:1;s:20:\"delete_private_posts\";b:1;s:22:\"delete_published_pages\";b:1;s:22:\"delete_published_posts\";b:1;s:19:\"delete_others_posts\";b:1;s:19:\"delete_others_pages\";b:1;s:17:\"manage_categories\";b:1;s:12:\"manage_links\";b:1;s:17:\"moderate_comments\";b:1;s:12:\"upload_files\";b:1;s:6:\"export\";b:1;s:6:\"import\";b:1;s:10:\"list_users\";b:1;s:18:\"manage_woocommerce\";b:1;s:24:\"view_woocommerce_reports\";b:1;s:12:\"edit_product\";b:1;s:12:\"read_product\";b:1;s:14:\"delete_product\";b:1;s:13:\"edit_products\";b:1;s:20:\"edit_others_products\";b:1;s:16:\"publish_products\";b:1;s:21:\"read_private_products\";b:1;s:15:\"delete_products\";b:1;s:23:\"delete_private_products\";b:1;s:25:\"delete_published_products\";b:1;s:22:\"delete_others_products\";b:1;s:21:\"edit_private_products\";b:1;s:23:\"edit_published_products\";b:1;s:20:\"manage_product_terms\";b:1;s:18:\"edit_product_terms\";b:1;s:20:\"delete_product_terms\";b:1;s:20:\"assign_product_terms\";b:1;s:15:\"edit_shop_order\";b:1;s:15:\"read_shop_order\";b:1;s:17:\"delete_shop_order\";b:1;s:16:\"edit_shop_orders\";b:1;s:23:\"edit_others_shop_orders\";b:1;s:19:\"publish_shop_orders\";b:1;s:24:\"read_private_shop_orders\";b:1;s:18:\"delete_shop_orders\";b:1;s:26:\"delete_private_shop_orders\";b:1;s:28:\"delete_published_shop_orders\";b:1;s:25:\"delete_others_shop_orders\";b:1;s:24:\"edit_private_shop_orders\";b:1;s:26:\"edit_published_shop_orders\";b:1;s:23:\"manage_shop_order_terms\";b:1;s:21:\"edit_shop_order_terms\";b:1;s:23:\"delete_shop_order_terms\";b:1;s:23:\"assign_shop_order_terms\";b:1;s:16:\"edit_shop_coupon\";b:1;s:16:\"read_shop_coupon\";b:1;s:18:\"delete_shop_coupon\";b:1;s:17:\"edit_shop_coupons\";b:1;s:24:\"edit_others_shop_coupons\";b:1;s:20:\"publish_shop_coupons\";b:1;s:25:\"read_private_shop_coupons\";b:1;s:19:\"delete_shop_coupons\";b:1;s:27:\"delete_private_shop_coupons\";b:1;s:29:\"delete_published_shop_coupons\";b:1;s:26:\"delete_others_shop_coupons\";b:1;s:25:\"edit_private_shop_coupons\";b:1;s:27:\"edit_published_shop_coupons\";b:1;s:24:\"manage_shop_coupon_terms\";b:1;s:22:\"edit_shop_coupon_terms\";b:1;s:24:\"delete_shop_coupon_terms\";b:1;s:24:\"assign_shop_coupon_terms\";b:1;s:17:\"edit_shop_webhook\";b:1;s:17:\"read_shop_webhook\";b:1;s:19:\"delete_shop_webhook\";b:1;s:18:\"edit_shop_webhooks\";b:1;s:25:\"edit_others_shop_webhooks\";b:1;s:21:\"publish_shop_webhooks\";b:1;s:26:\"read_private_shop_webhooks\";b:1;s:20:\"delete_shop_webhooks\";b:1;s:28:\"delete_private_shop_webhooks\";b:1;s:30:\"delete_published_shop_webhooks\";b:1;s:27:\"delete_others_shop_webhooks\";b:1;s:26:\"edit_private_shop_webhooks\";b:1;s:28:\"edit_published_shop_webhooks\";b:1;s:25:\"manage_shop_webhook_terms\";b:1;s:23:\"edit_shop_webhook_terms\";b:1;s:25:\"delete_shop_webhook_terms\";b:1;s:25:\"assign_shop_webhook_terms\";b:1;}}}','yes'),(93,'widget_pages','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(94,'widget_calendar','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(95,'widget_archives','a:2:{i:2;a:3:{s:5:\"title\";s:0:\"\";s:5:\"count\";i:0;s:8:\"dropdown\";i:0;}s:12:\"_multiwidget\";i:1;}','yes'),(96,'widget_media_audio','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(97,'widget_media_image','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(98,'widget_media_video','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(99,'widget_meta','a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes'),(100,'widget_search','a:2:{i:2;a:1:{s:5:\"title\";s:0:\"\";}s:12:\"_multiwidget\";i:1;}','yes'),(101,'widget_tag_cloud','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(102,'widget_nav_menu','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(103,'widget_custom_html','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(104,'cron','a:12:{i:1510659188;a:1:{s:34:\"job_manager_check_for_expired_jobs\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:6:\"hourly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:3600;}}}i:1510659215;a:1:{s:32:\"woocommerce_cancel_unpaid_orders\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:2:{s:8:\"schedule\";b:0;s:4:\"args\";a:0:{}}}}i:1510698779;a:3:{s:16:\"wp_version_check\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:17:\"wp_update_plugins\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}s:16:\"wp_update_themes\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1510698789;a:1:{s:36:\"job_manager_clear_expired_transients\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1510698815;a:1:{s:28:\"woocommerce_cleanup_sessions\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"twicedaily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:43200;}}}i:1510704000;a:1:{s:27:\"woocommerce_scheduled_sales\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1510741988;a:1:{s:31:\"job_manager_delete_old_previews\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1510742015;a:1:{s:30:\"woocommerce_tracker_send_event\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1510742029;a:1:{s:19:\"wp_scheduled_delete\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:5:\"daily\";s:4:\"args\";a:0:{}s:8:\"interval\";i:86400;}}}i:1512432000;a:1:{s:25:\"woocommerce_geoip_updater\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:7:\"monthly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:2635200;}}}i:1513334217;a:1:{s:13:\"nf_optin_cron\";a:1:{s:32:\"40cd750bba9870f18aada2478b24840a\";a:3:{s:8:\"schedule\";s:10:\"nf-monthly\";s:4:\"args\";a:0:{}s:8:\"interval\";i:2678400;}}}s:7:\"version\";i:2;}','yes'),(106,'_site_transient_update_core','O:8:\"stdClass\":4:{s:7:\"updates\";a:1:{i:0;O:8:\"stdClass\":10:{s:8:\"response\";s:6:\"latest\";s:8:\"download\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.8.3.zip\";s:6:\"locale\";s:5:\"en_US\";s:8:\"packages\";O:8:\"stdClass\":5:{s:4:\"full\";s:59:\"https://downloads.wordpress.org/release/wordpress-4.8.3.zip\";s:10:\"no_content\";s:70:\"https://downloads.wordpress.org/release/wordpress-4.8.3-no-content.zip\";s:11:\"new_bundled\";s:71:\"https://downloads.wordpress.org/release/wordpress-4.8.3-new-bundled.zip\";s:7:\"partial\";b:0;s:8:\"rollback\";b:0;}s:7:\"current\";s:5:\"4.8.3\";s:7:\"version\";s:5:\"4.8.3\";s:11:\"php_version\";s:5:\"5.2.4\";s:13:\"mysql_version\";s:3:\"5.0\";s:11:\"new_bundled\";s:3:\"4.7\";s:15:\"partial_version\";s:0:\"\";}}s:12:\"last_checked\";i:1510655581;s:15:\"version_checked\";s:5:\"4.8.3\";s:12:\"translations\";a:0:{}}','no'),(108,'_site_transient_update_plugins','O:8:\"stdClass\":5:{s:12:\"last_checked\";i:1510655586;s:7:\"checked\";a:29:{s:41:\"admin-custom-login/admin-custom-login.php\";s:5:\"2.5.5\";s:19:\"akismet/akismet.php\";s:5:\"4.0.1\";s:51:\"all-in-one-wp-migration/all-in-one-wp-migration.php\";s:4:\"6.59\";s:37:\"breadcrumb-navxt/breadcrumb-navxt.php\";s:5:\"5.7.1\";s:36:\"contact-form-7/wp-contact-form-7.php\";s:5:\"4.9.1\";s:65:\"wp-job-manager-contact-listing/wp-job-manager-contact-listing.php\";s:5:\"1.4.0\";s:39:\"cpo-content-types/cpo-content-types.php\";s:5:\"1.1.0\";s:27:\"cpo-widgets/cpo-widgets.php\";s:5:\"1.1.0\";s:35:\"fancybox-for-wordpress/fancybox.php\";s:6:\"3.0.13\";s:41:\"google-maps-widget/google-maps-widget.php\";s:4:\"3.60\";s:9:\"hello.php\";s:3:\"1.6\";s:19:\"if-menu/if-menu.php\";s:5:\"0.7.1\";s:35:\"illdy-companion/illdy-companion.php\";s:5:\"2.0.3\";s:19:\"jetpack/jetpack.php\";s:3:\"5.5\";s:39:\"kiwi-social-share/kiwi-social-share.php\";s:5:\"2.0.5\";s:17:\"mikado/Mikado.php\";s:6:\"1.1.15\";s:27:\"ninja-forms/ninja-forms.php\";s:5:\"3.2.4\";s:53:\"wp-job-manager-locations/wp-job-manager-locations.php\";s:6:\"1.14.0\";s:59:\"responsive-coming-soon-page/responsive-coming-soon-page.php\";s:6:\"1.1.16\";s:53:\"simple-custom-post-order/simple-custom-post-order.php\";s:5:\"2.3.2\";s:67:\"woocommerce-simple-registration/woocommerce-simple-registration.php\";s:5:\"1.5.1\";s:52:\"testimonials-by-woothemes/woothemes-testimonials.php\";s:5:\"1.5.4\";s:53:\"themegrill-demo-importer/themegrill-demo-importer.php\";s:5:\"1.4.0\";s:53:\"widget-importer-exporter/widget-importer-exporter.php\";s:5:\"1.5.2\";s:27:\"woocommerce/woocommerce.php\";s:5:\"3.2.3\";s:41:\"wordpress-importer/wordpress-importer.php\";s:5:\"0.6.3\";s:33:\"wp-job-manager/wp-job-manager.php\";s:6:\"1.29.0\";s:53:\"wp-job-manager-companies/wp-job-manager-companies.php\";s:3:\"1.3\";s:47:\"wp-job-manager-colors/wp-job-manager-colors.php\";s:5:\"1.0.1\";}s:8:\"response\";a:0:{}s:12:\"translations\";a:0:{}s:9:\"no_update\";a:27:{s:41:\"admin-custom-login/admin-custom-login.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:32:\"w.org/plugins/admin-custom-login\";s:4:\"slug\";s:18:\"admin-custom-login\";s:6:\"plugin\";s:41:\"admin-custom-login/admin-custom-login.php\";s:11:\"new_version\";s:5:\"2.5.5\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/admin-custom-login/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/admin-custom-login.2.5.5.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:71:\"https://ps.w.org/admin-custom-login/assets/icon-128x128.png?rev=1121656\";s:2:\"2x\";s:71:\"https://ps.w.org/admin-custom-login/assets/icon-256x256.png?rev=1121656\";s:7:\"default\";s:71:\"https://ps.w.org/admin-custom-login/assets/icon-256x256.png?rev=1121656\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:73:\"https://ps.w.org/admin-custom-login/assets/banner-772x250.jpg?rev=1121656\";s:7:\"default\";s:73:\"https://ps.w.org/admin-custom-login/assets/banner-772x250.jpg?rev=1121656\";}s:11:\"banners_rtl\";a:0:{}}s:19:\"akismet/akismet.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/akismet\";s:4:\"slug\";s:7:\"akismet\";s:6:\"plugin\";s:19:\"akismet/akismet.php\";s:11:\"new_version\";s:5:\"4.0.1\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/akismet/\";s:7:\"package\";s:56:\"https://downloads.wordpress.org/plugin/akismet.4.0.1.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:59:\"https://ps.w.org/akismet/assets/icon-128x128.png?rev=969272\";s:2:\"2x\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";s:7:\"default\";s:59:\"https://ps.w.org/akismet/assets/icon-256x256.png?rev=969272\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";s:7:\"default\";s:61:\"https://ps.w.org/akismet/assets/banner-772x250.jpg?rev=479904\";}s:11:\"banners_rtl\";a:0:{}}s:51:\"all-in-one-wp-migration/all-in-one-wp-migration.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:37:\"w.org/plugins/all-in-one-wp-migration\";s:4:\"slug\";s:23:\"all-in-one-wp-migration\";s:6:\"plugin\";s:51:\"all-in-one-wp-migration/all-in-one-wp-migration.php\";s:11:\"new_version\";s:4:\"6.59\";s:3:\"url\";s:54:\"https://wordpress.org/plugins/all-in-one-wp-migration/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/all-in-one-wp-migration.6.59.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:76:\"https://ps.w.org/all-in-one-wp-migration/assets/icon-128x128.png?rev=1268186\";s:2:\"2x\";s:76:\"https://ps.w.org/all-in-one-wp-migration/assets/icon-256x256.png?rev=1268186\";s:7:\"default\";s:76:\"https://ps.w.org/all-in-one-wp-migration/assets/icon-256x256.png?rev=1268186\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:79:\"https://ps.w.org/all-in-one-wp-migration/assets/banner-1544x500.png?rev=1691996\";s:2:\"1x\";s:78:\"https://ps.w.org/all-in-one-wp-migration/assets/banner-772x250.png?rev=1691996\";s:7:\"default\";s:79:\"https://ps.w.org/all-in-one-wp-migration/assets/banner-1544x500.png?rev=1691996\";}s:11:\"banners_rtl\";a:0:{}}s:37:\"breadcrumb-navxt/breadcrumb-navxt.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:30:\"w.org/plugins/breadcrumb-navxt\";s:4:\"slug\";s:16:\"breadcrumb-navxt\";s:6:\"plugin\";s:37:\"breadcrumb-navxt/breadcrumb-navxt.php\";s:11:\"new_version\";s:5:\"5.7.1\";s:3:\"url\";s:47:\"https://wordpress.org/plugins/breadcrumb-navxt/\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/plugin/breadcrumb-navxt.5.7.1.zip\";s:5:\"icons\";a:4:{s:2:\"1x\";s:68:\"https://ps.w.org/breadcrumb-navxt/assets/icon-128x128.png?rev=971477\";s:2:\"2x\";s:68:\"https://ps.w.org/breadcrumb-navxt/assets/icon-256x256.png?rev=971477\";s:3:\"svg\";s:60:\"https://ps.w.org/breadcrumb-navxt/assets/icon.svg?rev=971477\";s:7:\"default\";s:60:\"https://ps.w.org/breadcrumb-navxt/assets/icon.svg?rev=971477\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:70:\"https://ps.w.org/breadcrumb-navxt/assets/banner-772x250.jpg?rev=479408\";s:7:\"default\";s:70:\"https://ps.w.org/breadcrumb-navxt/assets/banner-772x250.jpg?rev=479408\";}s:11:\"banners_rtl\";a:0:{}}s:36:\"contact-form-7/wp-contact-form-7.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/contact-form-7\";s:4:\"slug\";s:14:\"contact-form-7\";s:6:\"plugin\";s:36:\"contact-form-7/wp-contact-form-7.php\";s:11:\"new_version\";s:5:\"4.9.1\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/contact-form-7/\";s:7:\"package\";s:63:\"https://downloads.wordpress.org/plugin/contact-form-7.4.9.1.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:66:\"https://ps.w.org/contact-form-7/assets/icon-128x128.png?rev=984007\";s:2:\"2x\";s:66:\"https://ps.w.org/contact-form-7/assets/icon-256x256.png?rev=984007\";s:7:\"default\";s:66:\"https://ps.w.org/contact-form-7/assets/icon-256x256.png?rev=984007\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:69:\"https://ps.w.org/contact-form-7/assets/banner-1544x500.png?rev=860901\";s:2:\"1x\";s:68:\"https://ps.w.org/contact-form-7/assets/banner-772x250.png?rev=880427\";s:7:\"default\";s:69:\"https://ps.w.org/contact-form-7/assets/banner-1544x500.png?rev=860901\";}s:11:\"banners_rtl\";a:0:{}}s:65:\"wp-job-manager-contact-listing/wp-job-manager-contact-listing.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:44:\"w.org/plugins/wp-job-manager-contact-listing\";s:4:\"slug\";s:30:\"wp-job-manager-contact-listing\";s:6:\"plugin\";s:65:\"wp-job-manager-contact-listing/wp-job-manager-contact-listing.php\";s:11:\"new_version\";s:5:\"1.4.0\";s:3:\"url\";s:61:\"https://wordpress.org/plugins/wp-job-manager-contact-listing/\";s:7:\"package\";s:73:\"https://downloads.wordpress.org/plugin/wp-job-manager-contact-listing.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:83:\"https://ps.w.org/wp-job-manager-contact-listing/assets/icon-256x256.png?rev=1488338\";s:7:\"default\";s:83:\"https://ps.w.org/wp-job-manager-contact-listing/assets/icon-256x256.png?rev=1488338\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:86:\"https://ps.w.org/wp-job-manager-contact-listing/assets/banner-1544x500.png?rev=1488338\";s:2:\"1x\";s:85:\"https://ps.w.org/wp-job-manager-contact-listing/assets/banner-772x250.png?rev=1488338\";s:7:\"default\";s:86:\"https://ps.w.org/wp-job-manager-contact-listing/assets/banner-1544x500.png?rev=1488338\";}s:11:\"banners_rtl\";a:0:{}}s:39:\"cpo-content-types/cpo-content-types.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:31:\"w.org/plugins/cpo-content-types\";s:4:\"slug\";s:17:\"cpo-content-types\";s:6:\"plugin\";s:39:\"cpo-content-types/cpo-content-types.php\";s:11:\"new_version\";s:5:\"1.1.0\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/cpo-content-types/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/cpo-content-types.zip\";s:5:\"icons\";a:2:{s:2:\"1x\";s:70:\"https://ps.w.org/cpo-content-types/assets/icon-128x128.png?rev=1210473\";s:7:\"default\";s:70:\"https://ps.w.org/cpo-content-types/assets/icon-128x128.png?rev=1210473\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:72:\"https://ps.w.org/cpo-content-types/assets/banner-772x250.png?rev=1197738\";s:7:\"default\";s:72:\"https://ps.w.org/cpo-content-types/assets/banner-772x250.png?rev=1197738\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"cpo-widgets/cpo-widgets.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/cpo-widgets\";s:4:\"slug\";s:11:\"cpo-widgets\";s:6:\"plugin\";s:27:\"cpo-widgets/cpo-widgets.php\";s:11:\"new_version\";s:5:\"1.1.0\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/cpo-widgets/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/cpo-widgets.zip\";s:5:\"icons\";a:0:{}s:7:\"banners\";a:2:{s:2:\"1x\";s:66:\"https://ps.w.org/cpo-widgets/assets/banner-772x250.png?rev=1196942\";s:7:\"default\";s:66:\"https://ps.w.org/cpo-widgets/assets/banner-772x250.png?rev=1196942\";}s:11:\"banners_rtl\";a:0:{}}s:35:\"fancybox-for-wordpress/fancybox.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:36:\"w.org/plugins/fancybox-for-wordpress\";s:4:\"slug\";s:22:\"fancybox-for-wordpress\";s:6:\"plugin\";s:35:\"fancybox-for-wordpress/fancybox.php\";s:11:\"new_version\";s:6:\"3.0.13\";s:3:\"url\";s:53:\"https://wordpress.org/plugins/fancybox-for-wordpress/\";s:7:\"package\";s:65:\"https://downloads.wordpress.org/plugin/fancybox-for-wordpress.zip\";s:5:\"icons\";a:0:{}s:7:\"banners\";a:2:{s:2:\"1x\";s:76:\"https://ps.w.org/fancybox-for-wordpress/assets/banner-772x250.jpg?rev=478737\";s:7:\"default\";s:76:\"https://ps.w.org/fancybox-for-wordpress/assets/banner-772x250.jpg?rev=478737\";}s:11:\"banners_rtl\";a:0:{}}s:41:\"google-maps-widget/google-maps-widget.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:32:\"w.org/plugins/google-maps-widget\";s:4:\"slug\";s:18:\"google-maps-widget\";s:6:\"plugin\";s:41:\"google-maps-widget/google-maps-widget.php\";s:11:\"new_version\";s:4:\"3.60\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/google-maps-widget/\";s:7:\"package\";s:61:\"https://downloads.wordpress.org/plugin/google-maps-widget.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:71:\"https://ps.w.org/google-maps-widget/assets/icon-128x128.png?rev=1566956\";s:2:\"2x\";s:71:\"https://ps.w.org/google-maps-widget/assets/icon-256x256.png?rev=1625687\";s:7:\"default\";s:71:\"https://ps.w.org/google-maps-widget/assets/icon-256x256.png?rev=1625687\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:74:\"https://ps.w.org/google-maps-widget/assets/banner-1544x500.png?rev=1653423\";s:2:\"1x\";s:73:\"https://ps.w.org/google-maps-widget/assets/banner-772x250.png?rev=1653423\";s:7:\"default\";s:74:\"https://ps.w.org/google-maps-widget/assets/banner-1544x500.png?rev=1653423\";}s:11:\"banners_rtl\";a:0:{}}s:19:\"if-menu/if-menu.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/if-menu\";s:4:\"slug\";s:7:\"if-menu\";s:6:\"plugin\";s:19:\"if-menu/if-menu.php\";s:11:\"new_version\";s:5:\"0.7.1\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/if-menu/\";s:7:\"package\";s:50:\"https://downloads.wordpress.org/plugin/if-menu.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:60:\"https://ps.w.org/if-menu/assets/icon-128x128.png?rev=1006013\";s:2:\"2x\";s:60:\"https://ps.w.org/if-menu/assets/icon-256x256.png?rev=1006013\";s:7:\"default\";s:60:\"https://ps.w.org/if-menu/assets/icon-256x256.png?rev=1006013\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:62:\"https://ps.w.org/if-menu/assets/banner-772x250.png?rev=1479371\";s:7:\"default\";s:62:\"https://ps.w.org/if-menu/assets/banner-772x250.png?rev=1479371\";}s:11:\"banners_rtl\";a:0:{}}s:35:\"illdy-companion/illdy-companion.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:29:\"w.org/plugins/illdy-companion\";s:4:\"slug\";s:15:\"illdy-companion\";s:6:\"plugin\";s:35:\"illdy-companion/illdy-companion.php\";s:11:\"new_version\";s:5:\"2.0.3\";s:3:\"url\";s:46:\"https://wordpress.org/plugins/illdy-companion/\";s:7:\"package\";s:58:\"https://downloads.wordpress.org/plugin/illdy-companion.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:68:\"https://ps.w.org/illdy-companion/assets/icon-256x256.jpg?rev=1492620\";s:7:\"default\";s:68:\"https://ps.w.org/illdy-companion/assets/icon-256x256.jpg?rev=1492620\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:70:\"https://ps.w.org/illdy-companion/assets/banner-772x250.jpg?rev=1492620\";s:7:\"default\";s:70:\"https://ps.w.org/illdy-companion/assets/banner-772x250.jpg?rev=1492620\";}s:11:\"banners_rtl\";a:0:{}}s:19:\"jetpack/jetpack.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:21:\"w.org/plugins/jetpack\";s:4:\"slug\";s:7:\"jetpack\";s:6:\"plugin\";s:19:\"jetpack/jetpack.php\";s:11:\"new_version\";s:3:\"5.5\";s:3:\"url\";s:38:\"https://wordpress.org/plugins/jetpack/\";s:7:\"package\";s:54:\"https://downloads.wordpress.org/plugin/jetpack.5.5.zip\";s:5:\"icons\";a:4:{s:2:\"1x\";s:59:\"https://ps.w.org/jetpack/assets/icon-128x128.png?rev=969908\";s:2:\"2x\";s:59:\"https://ps.w.org/jetpack/assets/icon-256x256.png?rev=969908\";s:3:\"svg\";s:51:\"https://ps.w.org/jetpack/assets/icon.svg?rev=969908\";s:7:\"default\";s:51:\"https://ps.w.org/jetpack/assets/icon.svg?rev=969908\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:63:\"https://ps.w.org/jetpack/assets/banner-1544x500.png?rev=1173629\";s:2:\"1x\";s:62:\"https://ps.w.org/jetpack/assets/banner-772x250.png?rev=1173629\";s:7:\"default\";s:63:\"https://ps.w.org/jetpack/assets/banner-1544x500.png?rev=1173629\";}s:11:\"banners_rtl\";a:0:{}}s:39:\"kiwi-social-share/kiwi-social-share.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:31:\"w.org/plugins/kiwi-social-share\";s:4:\"slug\";s:17:\"kiwi-social-share\";s:6:\"plugin\";s:39:\"kiwi-social-share/kiwi-social-share.php\";s:11:\"new_version\";s:5:\"2.0.5\";s:3:\"url\";s:48:\"https://wordpress.org/plugins/kiwi-social-share/\";s:7:\"package\";s:66:\"https://downloads.wordpress.org/plugin/kiwi-social-share.2.0.5.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:70:\"https://ps.w.org/kiwi-social-share/assets/icon-256x256.png?rev=1445882\";s:7:\"default\";s:70:\"https://ps.w.org/kiwi-social-share/assets/icon-256x256.png?rev=1445882\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:72:\"https://ps.w.org/kiwi-social-share/assets/banner-772x250.png?rev=1445902\";s:7:\"default\";s:72:\"https://ps.w.org/kiwi-social-share/assets/banner-772x250.png?rev=1445902\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"ninja-forms/ninja-forms.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/ninja-forms\";s:4:\"slug\";s:11:\"ninja-forms\";s:6:\"plugin\";s:27:\"ninja-forms/ninja-forms.php\";s:11:\"new_version\";s:5:\"3.2.4\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/ninja-forms/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/ninja-forms.3.2.4.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:64:\"https://ps.w.org/ninja-forms/assets/icon-128x128.png?rev=1649747\";s:2:\"2x\";s:64:\"https://ps.w.org/ninja-forms/assets/icon-256x256.png?rev=1649747\";s:7:\"default\";s:64:\"https://ps.w.org/ninja-forms/assets/icon-256x256.png?rev=1649747\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:67:\"https://ps.w.org/ninja-forms/assets/banner-1544x500.png?rev=1649747\";s:2:\"1x\";s:66:\"https://ps.w.org/ninja-forms/assets/banner-772x250.png?rev=1649747\";s:7:\"default\";s:67:\"https://ps.w.org/ninja-forms/assets/banner-1544x500.png?rev=1649747\";}s:11:\"banners_rtl\";a:0:{}}s:53:\"wp-job-manager-locations/wp-job-manager-locations.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:38:\"w.org/plugins/wp-job-manager-locations\";s:4:\"slug\";s:24:\"wp-job-manager-locations\";s:6:\"plugin\";s:53:\"wp-job-manager-locations/wp-job-manager-locations.php\";s:11:\"new_version\";s:6:\"1.14.0\";s:3:\"url\";s:55:\"https://wordpress.org/plugins/wp-job-manager-locations/\";s:7:\"package\";s:74:\"https://downloads.wordpress.org/plugin/wp-job-manager-locations.1.14.0.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:77:\"https://ps.w.org/wp-job-manager-locations/assets/icon-256x256.png?rev=1488335\";s:7:\"default\";s:77:\"https://ps.w.org/wp-job-manager-locations/assets/icon-256x256.png?rev=1488335\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:80:\"https://ps.w.org/wp-job-manager-locations/assets/banner-1544x500.png?rev=1488320\";s:2:\"1x\";s:79:\"https://ps.w.org/wp-job-manager-locations/assets/banner-772x250.png?rev=1488318\";s:7:\"default\";s:80:\"https://ps.w.org/wp-job-manager-locations/assets/banner-1544x500.png?rev=1488320\";}s:11:\"banners_rtl\";a:0:{}}s:59:\"responsive-coming-soon-page/responsive-coming-soon-page.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:41:\"w.org/plugins/responsive-coming-soon-page\";s:4:\"slug\";s:27:\"responsive-coming-soon-page\";s:6:\"plugin\";s:59:\"responsive-coming-soon-page/responsive-coming-soon-page.php\";s:11:\"new_version\";s:6:\"1.1.16\";s:3:\"url\";s:58:\"https://wordpress.org/plugins/responsive-coming-soon-page/\";s:7:\"package\";s:77:\"https://downloads.wordpress.org/plugin/responsive-coming-soon-page.1.1.16.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:80:\"https://ps.w.org/responsive-coming-soon-page/assets/icon-128x128.png?rev=1432936\";s:2:\"2x\";s:80:\"https://ps.w.org/responsive-coming-soon-page/assets/icon-256x256.png?rev=1434784\";s:7:\"default\";s:80:\"https://ps.w.org/responsive-coming-soon-page/assets/icon-256x256.png?rev=1434784\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:82:\"https://ps.w.org/responsive-coming-soon-page/assets/banner-772x250.jpg?rev=1432942\";s:7:\"default\";s:82:\"https://ps.w.org/responsive-coming-soon-page/assets/banner-772x250.jpg?rev=1432942\";}s:11:\"banners_rtl\";a:0:{}}s:53:\"simple-custom-post-order/simple-custom-post-order.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:38:\"w.org/plugins/simple-custom-post-order\";s:4:\"slug\";s:24:\"simple-custom-post-order\";s:6:\"plugin\";s:53:\"simple-custom-post-order/simple-custom-post-order.php\";s:11:\"new_version\";s:5:\"2.3.2\";s:3:\"url\";s:55:\"https://wordpress.org/plugins/simple-custom-post-order/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/simple-custom-post-order.zip\";s:5:\"icons\";a:0:{}s:7:\"banners\";a:2:{s:2:\"1x\";s:78:\"https://ps.w.org/simple-custom-post-order/assets/banner-772x250.png?rev=746628\";s:7:\"default\";s:78:\"https://ps.w.org/simple-custom-post-order/assets/banner-772x250.png?rev=746628\";}s:11:\"banners_rtl\";a:0:{}}s:67:\"woocommerce-simple-registration/woocommerce-simple-registration.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:45:\"w.org/plugins/woocommerce-simple-registration\";s:4:\"slug\";s:31:\"woocommerce-simple-registration\";s:6:\"plugin\";s:67:\"woocommerce-simple-registration/woocommerce-simple-registration.php\";s:11:\"new_version\";s:5:\"1.5.1\";s:3:\"url\";s:62:\"https://wordpress.org/plugins/woocommerce-simple-registration/\";s:7:\"package\";s:74:\"https://downloads.wordpress.org/plugin/woocommerce-simple-registration.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:84:\"https://ps.w.org/woocommerce-simple-registration/assets/icon-256x256.png?rev=1488276\";s:7:\"default\";s:84:\"https://ps.w.org/woocommerce-simple-registration/assets/icon-256x256.png?rev=1488276\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:87:\"https://ps.w.org/woocommerce-simple-registration/assets/banner-1544x500.png?rev=1488276\";s:2:\"1x\";s:86:\"https://ps.w.org/woocommerce-simple-registration/assets/banner-772x250.png?rev=1488276\";s:7:\"default\";s:87:\"https://ps.w.org/woocommerce-simple-registration/assets/banner-1544x500.png?rev=1488276\";}s:11:\"banners_rtl\";a:0:{}}s:52:\"testimonials-by-woothemes/woothemes-testimonials.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:39:\"w.org/plugins/testimonials-by-woothemes\";s:4:\"slug\";s:25:\"testimonials-by-woothemes\";s:6:\"plugin\";s:52:\"testimonials-by-woothemes/woothemes-testimonials.php\";s:11:\"new_version\";s:5:\"1.5.4\";s:3:\"url\";s:56:\"https://wordpress.org/plugins/testimonials-by-woothemes/\";s:7:\"package\";s:74:\"https://downloads.wordpress.org/plugin/testimonials-by-woothemes.1.5.4.zip\";s:5:\"icons\";a:0:{}s:7:\"banners\";a:3:{s:2:\"2x\";s:80:\"https://ps.w.org/testimonials-by-woothemes/assets/banner-1544x500.png?rev=841769\";s:2:\"1x\";s:79:\"https://ps.w.org/testimonials-by-woothemes/assets/banner-772x250.png?rev=841769\";s:7:\"default\";s:80:\"https://ps.w.org/testimonials-by-woothemes/assets/banner-1544x500.png?rev=841769\";}s:11:\"banners_rtl\";a:0:{}}s:53:\"themegrill-demo-importer/themegrill-demo-importer.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:38:\"w.org/plugins/themegrill-demo-importer\";s:4:\"slug\";s:24:\"themegrill-demo-importer\";s:6:\"plugin\";s:53:\"themegrill-demo-importer/themegrill-demo-importer.php\";s:11:\"new_version\";s:5:\"1.4.0\";s:3:\"url\";s:55:\"https://wordpress.org/plugins/themegrill-demo-importer/\";s:7:\"package\";s:73:\"https://downloads.wordpress.org/plugin/themegrill-demo-importer.1.4.0.zip\";s:5:\"icons\";a:0:{}s:7:\"banners\";a:2:{s:2:\"1x\";s:79:\"https://ps.w.org/themegrill-demo-importer/assets/banner-772x250.jpg?rev=1689579\";s:7:\"default\";s:79:\"https://ps.w.org/themegrill-demo-importer/assets/banner-772x250.jpg?rev=1689579\";}s:11:\"banners_rtl\";a:0:{}}s:53:\"widget-importer-exporter/widget-importer-exporter.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:38:\"w.org/plugins/widget-importer-exporter\";s:4:\"slug\";s:24:\"widget-importer-exporter\";s:6:\"plugin\";s:53:\"widget-importer-exporter/widget-importer-exporter.php\";s:11:\"new_version\";s:5:\"1.5.2\";s:3:\"url\";s:55:\"https://wordpress.org/plugins/widget-importer-exporter/\";s:7:\"package\";s:73:\"https://downloads.wordpress.org/plugin/widget-importer-exporter.1.5.2.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:76:\"https://ps.w.org/widget-importer-exporter/assets/icon-128x128.jpg?rev=990577\";s:2:\"2x\";s:76:\"https://ps.w.org/widget-importer-exporter/assets/icon-256x256.jpg?rev=990577\";s:7:\"default\";s:76:\"https://ps.w.org/widget-importer-exporter/assets/icon-256x256.jpg?rev=990577\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:79:\"https://ps.w.org/widget-importer-exporter/assets/banner-1544x500.jpg?rev=775677\";s:2:\"1x\";s:78:\"https://ps.w.org/widget-importer-exporter/assets/banner-772x250.jpg?rev=741218\";s:7:\"default\";s:79:\"https://ps.w.org/widget-importer-exporter/assets/banner-1544x500.jpg?rev=775677\";}s:11:\"banners_rtl\";a:0:{}}s:27:\"woocommerce/woocommerce.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:25:\"w.org/plugins/woocommerce\";s:4:\"slug\";s:11:\"woocommerce\";s:6:\"plugin\";s:27:\"woocommerce/woocommerce.php\";s:11:\"new_version\";s:5:\"3.2.3\";s:3:\"url\";s:42:\"https://wordpress.org/plugins/woocommerce/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/plugin/woocommerce.3.2.3.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-128x128.png?rev=1440831\";s:2:\"2x\";s:64:\"https://ps.w.org/woocommerce/assets/icon-256x256.png?rev=1440831\";s:7:\"default\";s:64:\"https://ps.w.org/woocommerce/assets/icon-256x256.png?rev=1440831\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:67:\"https://ps.w.org/woocommerce/assets/banner-1544x500.png?rev=1629184\";s:2:\"1x\";s:66:\"https://ps.w.org/woocommerce/assets/banner-772x250.png?rev=1629184\";s:7:\"default\";s:67:\"https://ps.w.org/woocommerce/assets/banner-1544x500.png?rev=1629184\";}s:11:\"banners_rtl\";a:0:{}}s:41:\"wordpress-importer/wordpress-importer.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:32:\"w.org/plugins/wordpress-importer\";s:4:\"slug\";s:18:\"wordpress-importer\";s:6:\"plugin\";s:41:\"wordpress-importer/wordpress-importer.php\";s:11:\"new_version\";s:5:\"0.6.3\";s:3:\"url\";s:49:\"https://wordpress.org/plugins/wordpress-importer/\";s:7:\"package\";s:67:\"https://downloads.wordpress.org/plugin/wordpress-importer.0.6.3.zip\";s:5:\"icons\";a:0:{}s:7:\"banners\";a:2:{s:2:\"1x\";s:72:\"https://ps.w.org/wordpress-importer/assets/banner-772x250.png?rev=547654\";s:7:\"default\";s:72:\"https://ps.w.org/wordpress-importer/assets/banner-772x250.png?rev=547654\";}s:11:\"banners_rtl\";a:0:{}}s:33:\"wp-job-manager/wp-job-manager.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:28:\"w.org/plugins/wp-job-manager\";s:4:\"slug\";s:14:\"wp-job-manager\";s:6:\"plugin\";s:33:\"wp-job-manager/wp-job-manager.php\";s:11:\"new_version\";s:6:\"1.29.0\";s:3:\"url\";s:45:\"https://wordpress.org/plugins/wp-job-manager/\";s:7:\"package\";s:64:\"https://downloads.wordpress.org/plugin/wp-job-manager.1.29.0.zip\";s:5:\"icons\";a:3:{s:2:\"1x\";s:67:\"https://ps.w.org/wp-job-manager/assets/icon-128x128.png?rev=1035478\";s:2:\"2x\";s:67:\"https://ps.w.org/wp-job-manager/assets/icon-256x256.png?rev=1035478\";s:7:\"default\";s:67:\"https://ps.w.org/wp-job-manager/assets/icon-256x256.png?rev=1035478\";}s:7:\"banners\";a:2:{s:2:\"1x\";s:69:\"https://ps.w.org/wp-job-manager/assets/banner-772x250.png?rev=1035478\";s:7:\"default\";s:69:\"https://ps.w.org/wp-job-manager/assets/banner-772x250.png?rev=1035478\";}s:11:\"banners_rtl\";a:0:{}}s:53:\"wp-job-manager-companies/wp-job-manager-companies.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:38:\"w.org/plugins/wp-job-manager-companies\";s:4:\"slug\";s:24:\"wp-job-manager-companies\";s:6:\"plugin\";s:53:\"wp-job-manager-companies/wp-job-manager-companies.php\";s:11:\"new_version\";s:3:\"1.3\";s:3:\"url\";s:55:\"https://wordpress.org/plugins/wp-job-manager-companies/\";s:7:\"package\";s:71:\"https://downloads.wordpress.org/plugin/wp-job-manager-companies.1.3.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:77:\"https://ps.w.org/wp-job-manager-companies/assets/icon-256x256.png?rev=1488481\";s:7:\"default\";s:77:\"https://ps.w.org/wp-job-manager-companies/assets/icon-256x256.png?rev=1488481\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:80:\"https://ps.w.org/wp-job-manager-companies/assets/banner-1544x500.png?rev=1488481\";s:2:\"1x\";s:79:\"https://ps.w.org/wp-job-manager-companies/assets/banner-772x250.png?rev=1488481\";s:7:\"default\";s:80:\"https://ps.w.org/wp-job-manager-companies/assets/banner-1544x500.png?rev=1488481\";}s:11:\"banners_rtl\";a:0:{}}s:47:\"wp-job-manager-colors/wp-job-manager-colors.php\";O:8:\"stdClass\":9:{s:2:\"id\";s:35:\"w.org/plugins/wp-job-manager-colors\";s:4:\"slug\";s:21:\"wp-job-manager-colors\";s:6:\"plugin\";s:47:\"wp-job-manager-colors/wp-job-manager-colors.php\";s:11:\"new_version\";s:5:\"1.0.1\";s:3:\"url\";s:52:\"https://wordpress.org/plugins/wp-job-manager-colors/\";s:7:\"package\";s:70:\"https://downloads.wordpress.org/plugin/wp-job-manager-colors.1.0.1.zip\";s:5:\"icons\";a:2:{s:2:\"2x\";s:74:\"https://ps.w.org/wp-job-manager-colors/assets/icon-256x256.png?rev=1488491\";s:7:\"default\";s:74:\"https://ps.w.org/wp-job-manager-colors/assets/icon-256x256.png?rev=1488491\";}s:7:\"banners\";a:3:{s:2:\"2x\";s:77:\"https://ps.w.org/wp-job-manager-colors/assets/banner-1544x500.png?rev=1488491\";s:2:\"1x\";s:76:\"https://ps.w.org/wp-job-manager-colors/assets/banner-772x250.png?rev=1488491\";s:7:\"default\";s:77:\"https://ps.w.org/wp-job-manager-colors/assets/banner-1544x500.png?rev=1488491\";}s:11:\"banners_rtl\";a:0:{}}}}','no'),(109,'fresh_site','1','yes'),(110,'_site_transient_timeout_theme_roots','1510657383','no'),(111,'_site_transient_theme_roots','a:13:{s:8:\"affluent\";s:7:\"/themes\";s:9:\"allegiant\";s:7:\"/themes\";s:5:\"ample\";s:7:\"/themes\";s:6:\"enigma\";s:7:\"/themes\";s:5:\"illdy\";s:7:\"/themes\";s:15:\"jobify-extended\";s:7:\"/themes\";s:6:\"jobify\";s:7:\"/themes\";s:5:\"prana\";s:7:\"/themes\";s:8:\"restimpo\";s:7:\"/themes\";s:13:\"twentyfifteen\";s:7:\"/themes\";s:14:\"twentyfourteen\";s:7:\"/themes\";s:15:\"twentyseventeen\";s:7:\"/themes\";s:13:\"twentysixteen\";s:7:\"/themes\";}','no'),(113,'widget_recent-posts','a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}','yes'),(114,'widget_recent-comments','a:2:{i:2;a:2:{s:5:\"title\";s:0:\"\";s:6:\"number\";i:5;}s:12:\"_multiwidget\";i:1;}','yes'),(115,'_site_transient_update_themes','O:8:\"stdClass\":4:{s:12:\"last_checked\";i:1510655592;s:7:\"checked\";a:13:{s:8:\"affluent\";s:5:\"1.0.5\";s:9:\"allegiant\";s:5:\"1.1.5\";s:5:\"ample\";s:5:\"1.1.7\";s:6:\"enigma\";s:3:\"3.5\";s:5:\"illdy\";s:5:\"2.0.4\";s:15:\"jobify-extended\";s:5:\"1.0.0\";s:6:\"jobify\";s:5:\"3.7.1\";s:5:\"prana\";s:7:\"1.2.5.2\";s:8:\"restimpo\";s:5:\"2.0.5\";s:13:\"twentyfifteen\";s:3:\"1.6\";s:14:\"twentyfourteen\";s:3:\"1.8\";s:15:\"twentyseventeen\";s:3:\"1.3\";s:13:\"twentysixteen\";s:3:\"1.3\";}s:8:\"response\";a:3:{s:6:\"enigma\";a:4:{s:5:\"theme\";s:6:\"enigma\";s:11:\"new_version\";s:3:\"3.6\";s:3:\"url\";s:36:\"https://wordpress.org/themes/enigma/\";s:7:\"package\";s:52:\"https://downloads.wordpress.org/theme/enigma.3.6.zip\";}s:13:\"twentyfifteen\";a:4:{s:5:\"theme\";s:13:\"twentyfifteen\";s:11:\"new_version\";s:3:\"1.8\";s:3:\"url\";s:43:\"https://wordpress.org/themes/twentyfifteen/\";s:7:\"package\";s:59:\"https://downloads.wordpress.org/theme/twentyfifteen.1.8.zip\";}s:14:\"twentyfourteen\";a:4:{s:5:\"theme\";s:14:\"twentyfourteen\";s:11:\"new_version\";s:3:\"2.0\";s:3:\"url\";s:44:\"https://wordpress.org/themes/twentyfourteen/\";s:7:\"package\";s:60:\"https://downloads.wordpress.org/theme/twentyfourteen.2.0.zip\";}}s:12:\"translations\";a:0:{}}','no'),(116,'sidebars_widgets','a:5:{s:19:\"wp_inactive_widgets\";a:0:{}s:9:\"sidebar-1\";a:6:{i:0;s:8:\"search-2\";i:1;s:14:\"recent-posts-2\";i:2;s:17:\"recent-comments-2\";i:3;s:10:\"archives-2\";i:4;s:12:\"categories-2\";i:5;s:6:\"meta-2\";}s:9:\"sidebar-2\";a:0:{}s:9:\"sidebar-3\";a:0:{}s:13:\"array_version\";i:3;}','yes'),(117,'theme_mods_twentyseventeen','a:1:{s:18:\"custom_css_post_id\";i:-1;}','yes'),(118,'_transient_is_multi_author','0','yes'),(119,'_transient_twentyseventeen_categories','1','yes'),(120,'WPLANG','es_ES','yes'),(121,'_transient_jm_get_job_listing_type-transient-version','1510656003','yes'),(127,'job_manager_installed_terms','1','yes'),(130,'wp_job_manager_version','1.29.0','yes'),(131,'widget_widget_recent_jobs','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(132,'widget_widget_featured_jobs','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(134,'job_manager_per_page','10','yes'),(135,'job_manager_hide_filled_positions','0','yes'),(136,'job_manager_hide_expired','0','yes'),(137,'job_manager_hide_expired_content','1','yes'),(138,'job_manager_enable_categories','0','yes'),(139,'job_manager_enable_default_category_multiselect','0','yes'),(140,'job_manager_category_filter_type','any','yes'),(141,'job_manager_enable_types','1','yes'),(142,'job_manager_multi_job_type','0','yes'),(143,'job_manager_date_format','relative','yes'),(144,'job_manager_google_maps_api_key','','yes'),(145,'job_manager_enable_regions_filter','1','yes'),(146,'job_manager_regions_filter','0','yes'),(147,'job_manager_user_requires_account','1','yes'),(149,'job_manager_enable_registration','1','yes'),(151,'job_manager_generate_username_from_email','1','yes'),(152,'job_manager_use_standard_password_setup_email','1','yes'),(153,'woocommerce_store_address','','yes'),(154,'job_manager_registration_role','employer','yes'),(155,'woocommerce_store_address_2','','yes'),(156,'job_manager_submission_requires_approval','1','yes'),(157,'woocommerce_store_city','','yes'),(158,'job_manager_user_can_edit_pending_submissions','0','yes'),(159,'woocommerce_default_country','GB','yes'),(160,'job_manager_submission_duration','30','yes'),(161,'woocommerce_store_postcode','','yes'),(162,'job_manager_allowed_application_method','','yes'),(163,'woocommerce_allowed_countries','all','yes'),(164,'job_manager_submit_job_form_page_id','','yes'),(165,'woocommerce_all_except_countries','','yes'),(166,'job_manager_job_dashboard_page_id','','yes'),(167,'woocommerce_specific_allowed_countries','','yes'),(168,'job_manager_jobs_page_id','','yes'),(169,'woocommerce_ship_to_countries','','yes'),(170,'job_manager_job_type_what_color','background','yes'),(171,'woocommerce_specific_ship_to_countries','','yes'),(172,'job_manager_job_type__color','','yes'),(173,'woocommerce_default_customer_address','geolocation','yes'),(174,'_transient_timeout_jm_pending_job_listing_count_user_1','1511260395','no'),(175,'woocommerce_calc_taxes','no','yes'),(176,'_transient_jm_pending_job_listing_count_user_1','0','no'),(177,'woocommerce_demo_store','no','yes'),(178,'woocommerce_demo_store_notice','Esta es una tienda de demostración para realizar pruebas &mdash; no se completará ningún pedido.','no'),(179,'woocommerce_currency','GBP','yes'),(180,'woocommerce_currency_pos','left','yes'),(181,'woocommerce_price_thousand_sep',',','yes'),(182,'job_manager_job_type_freelance_color','','yes'),(183,'woocommerce_price_decimal_sep','.','yes'),(184,'job_manager_job_type_full-time_color','','yes'),(185,'woocommerce_price_num_decimals','2','yes'),(186,'job_manager_job_type_internship_color','','yes'),(187,'woocommerce_weight_unit','kg','yes'),(188,'job_manager_job_type_part-time_color','','yes'),(189,'woocommerce_dimension_unit','cm','yes'),(190,'job_manager_job_type_temporary_color','','yes'),(191,'woocommerce_enable_reviews','yes','yes'),(192,'woocommerce_review_rating_verification_label','yes','no'),(193,'can_compress_scripts','0','no'),(194,'woocommerce_review_rating_verification_required','no','no'),(195,'woocommerce_enable_review_rating','yes','yes'),(196,'woocommerce_review_rating_required','yes','no'),(197,'woocommerce_shop_page_id','','yes'),(198,'woocommerce_shop_page_display','','yes'),(199,'woocommerce_category_archive_display','','yes'),(200,'woocommerce_default_catalog_orderby','menu_order','yes'),(201,'woocommerce_cart_redirect_after_add','no','yes'),(202,'woocommerce_enable_ajax_add_to_cart','yes','yes'),(203,'shop_catalog_image_size','a:3:{s:5:\"width\";s:3:\"300\";s:6:\"height\";s:3:\"300\";s:4:\"crop\";i:1;}','yes'),(204,'shop_single_image_size','a:3:{s:5:\"width\";s:3:\"600\";s:6:\"height\";s:3:\"600\";s:4:\"crop\";i:1;}','yes'),(205,'shop_thumbnail_image_size','a:3:{s:5:\"width\";s:3:\"180\";s:6:\"height\";s:3:\"180\";s:4:\"crop\";i:1;}','yes'),(206,'woocommerce_manage_stock','yes','yes'),(207,'woocommerce_hold_stock_minutes','60','no'),(208,'woocommerce_notify_low_stock','yes','no'),(209,'woocommerce_notify_no_stock','yes','no'),(210,'woocommerce_stock_email_recipient','xavi.hidalgo.fernandez@gmail.com','no'),(211,'woocommerce_notify_low_stock_amount','2','no'),(212,'woocommerce_notify_no_stock_amount','0','yes'),(213,'woocommerce_hide_out_of_stock_items','no','yes'),(214,'woocommerce_stock_format','','yes'),(215,'woocommerce_file_download_method','force','no'),(216,'woocommerce_downloads_require_login','no','no'),(217,'woocommerce_downloads_grant_access_after_payment','yes','no'),(218,'woocommerce_prices_include_tax','no','yes'),(219,'woocommerce_tax_based_on','shipping','yes'),(220,'woocommerce_shipping_tax_class','inherit','yes'),(221,'woocommerce_tax_round_at_subtotal','no','yes'),(222,'woocommerce_tax_classes','Tasa reducida\nTasa cero','yes'),(223,'woocommerce_tax_display_shop','excl','yes'),(224,'woocommerce_tax_display_cart','excl','no'),(225,'woocommerce_price_display_suffix','','yes'),(226,'woocommerce_tax_total_display','itemized','no'),(227,'woocommerce_enable_shipping_calc','yes','no'),(228,'woocommerce_shipping_cost_requires_address','no','no'),(229,'woocommerce_ship_to_destination','billing','no'),(230,'woocommerce_shipping_debug_mode','no','no'),(231,'woocommerce_enable_coupons','yes','yes'),(232,'woocommerce_calc_discounts_sequentially','no','no'),(233,'woocommerce_enable_guest_checkout','yes','no'),(234,'woocommerce_force_ssl_checkout','no','yes'),(235,'woocommerce_unforce_ssl_checkout','no','yes'),(236,'woocommerce_cart_page_id','','yes'),(237,'woocommerce_checkout_page_id','','yes'),(238,'woocommerce_terms_page_id','','no'),(239,'woocommerce_checkout_pay_endpoint','order-pay','yes'),(240,'woocommerce_checkout_order_received_endpoint','order-received','yes'),(241,'woocommerce_myaccount_add_payment_method_endpoint','add-payment-method','yes'),(242,'woocommerce_myaccount_delete_payment_method_endpoint','delete-payment-method','yes'),(243,'woocommerce_myaccount_set_default_payment_method_endpoint','set-default-payment-method','yes'),(244,'woocommerce_myaccount_page_id','','yes'),(245,'woocommerce_enable_signup_and_login_from_checkout','yes','no'),(246,'woocommerce_enable_myaccount_registration','no','no'),(247,'woocommerce_enable_checkout_login_reminder','yes','no'),(248,'woocommerce_registration_generate_username','yes','no'),(249,'woocommerce_registration_generate_password','no','no'),(250,'woocommerce_myaccount_orders_endpoint','orders','yes'),(251,'woocommerce_myaccount_view_order_endpoint','view-order','yes'),(252,'woocommerce_myaccount_downloads_endpoint','downloads','yes'),(253,'woocommerce_myaccount_edit_account_endpoint','edit-account','yes'),(254,'woocommerce_myaccount_edit_address_endpoint','edit-address','yes'),(255,'woocommerce_myaccount_payment_methods_endpoint','payment-methods','yes'),(256,'woocommerce_myaccount_lost_password_endpoint','lost-password','yes'),(257,'woocommerce_logout_endpoint','customer-logout','yes'),(258,'woocommerce_email_from_name','LleidaJobs','no'),(259,'woocommerce_email_from_address','xavi.hidalgo.fernandez@gmail.com','no'),(260,'woocommerce_email_header_image','','no'),(261,'woocommerce_email_footer_text','LleidaJobs','no'),(262,'woocommerce_email_base_color','#96588a','no'),(263,'woocommerce_email_background_color','#f7f7f7','no'),(264,'woocommerce_email_body_background_color','#ffffff','no'),(265,'woocommerce_email_text_color','#3c3c3c','no'),(266,'woocommerce_api_enabled','yes','yes'),(267,'_transient_wc_attribute_taxonomies','a:0:{}','yes'),(268,'_transient_jm_get_product_type-transient-version','1510655614','yes'),(269,'_transient_jm_get_product_visibility-transient-version','1510655615','yes'),(272,'woocommerce_version','3.2.3','yes'),(273,'woocommerce_db_version','3.2.3','yes'),(274,'woocommerce_admin_notices','a:1:{i:0;s:7:\"install\";}','yes'),(275,'_transient_timeout_external_ip_address_127.0.0.1','1511260416','no'),(276,'_transient_external_ip_address_127.0.0.1','91.126.28.57','no'),(277,'_transient_woocommerce_webhook_ids','a:0:{}','yes'),(278,'widget_woocommerce_widget_cart','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(279,'widget_woocommerce_layered_nav_filters','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(280,'widget_woocommerce_layered_nav','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(281,'widget_woocommerce_price_filter','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(282,'widget_woocommerce_product_categories','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(283,'widget_woocommerce_product_search','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(284,'widget_woocommerce_product_tag_cloud','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(285,'widget_woocommerce_products','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(286,'widget_woocommerce_recently_viewed_products','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(287,'widget_woocommerce_top_rated_products','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(288,'widget_woocommerce_recent_reviews','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(289,'widget_woocommerce_rating_filter','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(291,'woothemes-testimonials-version','1.5.4','yes'),(292,'widget_woothemes_testimonials','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(293,'ninja_forms_version','3.2.4','yes'),(294,'ninja_forms_settings','a:7:{s:11:\"date_format\";s:5:\"m/d/A\";s:8:\"currency\";s:3:\"USD\";s:18:\"recaptcha_site_key\";s:0:\"\";s:20:\"recaptcha_secret_key\";s:0:\"\";s:14:\"recaptcha_lang\";s:0:\"\";s:19:\"delete_on_uninstall\";i:0;s:21:\"disable_admin_notices\";i:0;}','yes'),(295,'wp_nf_update_fields_batch_ed82e4296bf519133c26a7c65cacabd8','a:4:{i:0;a:2:{s:2:\"id\";i:1;s:8:\"settings\";a:70:{s:5:\"label\";s:4:\"Name\";s:3:\"key\";s:4:\"name\";s:9:\"parent_id\";i:1;s:4:\"type\";s:7:\"textbox\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:46\";s:9:\"label_pos\";s:5:\"above\";s:8:\"required\";s:1:\"1\";s:5:\"order\";s:1:\"1\";s:11:\"placeholder\";s:0:\"\";s:7:\"default\";s:0:\"\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:10:\"characters\";s:15:\"input_limit_msg\";s:17:\"Character(s) left\";s:10:\"manual_key\";s:0:\"\";s:13:\"disable_input\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:9:\"desc_text\";s:0:\"\";s:28:\"disable_browser_autocomplete\";s:0:\"\";s:4:\"mask\";s:0:\"\";s:11:\"custom_mask\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3277\";}}i:1;a:2:{s:2:\"id\";i:2;s:8:\"settings\";a:62:{s:5:\"label\";s:5:\"Email\";s:3:\"key\";s:5:\"email\";s:9:\"parent_id\";i:1;s:4:\"type\";s:5:\"email\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:47\";s:9:\"label_pos\";s:5:\"above\";s:8:\"required\";s:1:\"1\";s:5:\"order\";s:1:\"2\";s:11:\"placeholder\";s:0:\"\";s:7:\"default\";s:0:\"\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:9:\"desc_text\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3281\";}}i:2;a:2:{s:2:\"id\";i:3;s:8:\"settings\";a:71:{s:5:\"label\";s:7:\"Message\";s:3:\"key\";s:7:\"message\";s:9:\"parent_id\";i:1;s:4:\"type\";s:8:\"textarea\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:47\";s:9:\"label_pos\";s:5:\"above\";s:8:\"required\";s:1:\"1\";s:5:\"order\";s:1:\"3\";s:11:\"placeholder\";s:0:\"\";s:7:\"default\";s:0:\"\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:10:\"characters\";s:15:\"input_limit_msg\";s:17:\"Character(s) left\";s:10:\"manual_key\";s:0:\"\";s:13:\"disable_input\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:9:\"desc_text\";s:0:\"\";s:28:\"disable_browser_autocomplete\";s:0:\"\";s:12:\"textarea_rte\";s:0:\"\";s:18:\"disable_rte_mobile\";s:0:\"\";s:14:\"textarea_media\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3284\";}}i:3;a:2:{s:2:\"id\";i:4;s:8:\"settings\";a:69:{s:5:\"label\";s:6:\"Submit\";s:3:\"key\";s:6:\"submit\";s:9:\"parent_id\";i:1;s:4:\"type\";s:6:\"submit\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:47\";s:16:\"processing_label\";s:10:\"Processing\";s:5:\"order\";s:1:\"5\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:44:\"submit_element_hover_styles_background-color\";s:0:\"\";s:34:\"submit_element_hover_styles_border\";s:0:\"\";s:40:\"submit_element_hover_styles_border-style\";s:0:\"\";s:40:\"submit_element_hover_styles_border-color\";s:0:\"\";s:33:\"submit_element_hover_styles_color\";s:0:\"\";s:34:\"submit_element_hover_styles_height\";s:0:\"\";s:33:\"submit_element_hover_styles_width\";s:0:\"\";s:37:\"submit_element_hover_styles_font-size\";s:0:\"\";s:34:\"submit_element_hover_styles_margin\";s:0:\"\";s:35:\"submit_element_hover_styles_padding\";s:0:\"\";s:35:\"submit_element_hover_styles_display\";s:0:\"\";s:33:\"submit_element_hover_styles_float\";s:0:\"\";s:45:\"submit_element_hover_styles_show_advanced_css\";s:1:\"0\";s:36:\"submit_element_hover_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3287\";}}}','no'),(297,'woocommerce_meta_box_errors','a:0:{}','yes'),(299,'nf_form_1','a:4:{s:2:\"id\";i:1;s:6:\"fields\";a:4:{i:0;a:2:{s:2:\"id\";i:1;s:8:\"settings\";a:70:{s:5:\"label\";s:4:\"Name\";s:3:\"key\";s:4:\"name\";s:9:\"parent_id\";i:1;s:4:\"type\";s:7:\"textbox\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:46\";s:9:\"label_pos\";s:5:\"above\";s:8:\"required\";s:1:\"1\";s:5:\"order\";s:1:\"1\";s:11:\"placeholder\";s:0:\"\";s:7:\"default\";s:0:\"\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:10:\"characters\";s:15:\"input_limit_msg\";s:17:\"Character(s) left\";s:10:\"manual_key\";s:0:\"\";s:13:\"disable_input\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:9:\"desc_text\";s:0:\"\";s:28:\"disable_browser_autocomplete\";s:0:\"\";s:4:\"mask\";s:0:\"\";s:11:\"custom_mask\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3277\";}}i:1;a:2:{s:2:\"id\";i:2;s:8:\"settings\";a:62:{s:5:\"label\";s:5:\"Email\";s:3:\"key\";s:5:\"email\";s:9:\"parent_id\";i:1;s:4:\"type\";s:5:\"email\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:47\";s:9:\"label_pos\";s:5:\"above\";s:8:\"required\";s:1:\"1\";s:5:\"order\";s:1:\"2\";s:11:\"placeholder\";s:0:\"\";s:7:\"default\";s:0:\"\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:9:\"desc_text\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3281\";}}i:2;a:2:{s:2:\"id\";i:3;s:8:\"settings\";a:71:{s:5:\"label\";s:7:\"Message\";s:3:\"key\";s:7:\"message\";s:9:\"parent_id\";i:1;s:4:\"type\";s:8:\"textarea\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:47\";s:9:\"label_pos\";s:5:\"above\";s:8:\"required\";s:1:\"1\";s:5:\"order\";s:1:\"3\";s:11:\"placeholder\";s:0:\"\";s:7:\"default\";s:0:\"\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:11:\"input_limit\";s:0:\"\";s:16:\"input_limit_type\";s:10:\"characters\";s:15:\"input_limit_msg\";s:17:\"Character(s) left\";s:10:\"manual_key\";s:0:\"\";s:13:\"disable_input\";s:0:\"\";s:11:\"admin_label\";s:0:\"\";s:9:\"help_text\";s:0:\"\";s:9:\"desc_text\";s:0:\"\";s:28:\"disable_browser_autocomplete\";s:0:\"\";s:12:\"textarea_rte\";s:0:\"\";s:18:\"disable_rte_mobile\";s:0:\"\";s:14:\"textarea_media\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3284\";}}i:3;a:2:{s:2:\"id\";i:4;s:8:\"settings\";a:69:{s:5:\"label\";s:6:\"Submit\";s:3:\"key\";s:6:\"submit\";s:9:\"parent_id\";i:1;s:4:\"type\";s:6:\"submit\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:47\";s:16:\"processing_label\";s:10:\"Processing\";s:5:\"order\";s:1:\"5\";s:10:\"objectType\";s:5:\"Field\";s:12:\"objectDomain\";s:6:\"fields\";s:10:\"editActive\";s:0:\"\";s:15:\"container_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:28:\"wrap_styles_background-color\";s:0:\"\";s:18:\"wrap_styles_border\";s:0:\"\";s:24:\"wrap_styles_border-style\";s:0:\"\";s:24:\"wrap_styles_border-color\";s:0:\"\";s:17:\"wrap_styles_color\";s:0:\"\";s:18:\"wrap_styles_height\";s:0:\"\";s:17:\"wrap_styles_width\";s:0:\"\";s:21:\"wrap_styles_font-size\";s:0:\"\";s:18:\"wrap_styles_margin\";s:0:\"\";s:19:\"wrap_styles_padding\";s:0:\"\";s:19:\"wrap_styles_display\";s:0:\"\";s:17:\"wrap_styles_float\";s:0:\"\";s:29:\"wrap_styles_show_advanced_css\";s:1:\"0\";s:20:\"wrap_styles_advanced\";s:0:\"\";s:29:\"label_styles_background-color\";s:0:\"\";s:19:\"label_styles_border\";s:0:\"\";s:25:\"label_styles_border-style\";s:0:\"\";s:25:\"label_styles_border-color\";s:0:\"\";s:18:\"label_styles_color\";s:0:\"\";s:19:\"label_styles_height\";s:0:\"\";s:18:\"label_styles_width\";s:0:\"\";s:22:\"label_styles_font-size\";s:0:\"\";s:19:\"label_styles_margin\";s:0:\"\";s:20:\"label_styles_padding\";s:0:\"\";s:20:\"label_styles_display\";s:0:\"\";s:18:\"label_styles_float\";s:0:\"\";s:30:\"label_styles_show_advanced_css\";s:1:\"0\";s:21:\"label_styles_advanced\";s:0:\"\";s:31:\"element_styles_background-color\";s:0:\"\";s:21:\"element_styles_border\";s:0:\"\";s:27:\"element_styles_border-style\";s:0:\"\";s:27:\"element_styles_border-color\";s:0:\"\";s:20:\"element_styles_color\";s:0:\"\";s:21:\"element_styles_height\";s:0:\"\";s:20:\"element_styles_width\";s:0:\"\";s:24:\"element_styles_font-size\";s:0:\"\";s:21:\"element_styles_margin\";s:0:\"\";s:22:\"element_styles_padding\";s:0:\"\";s:22:\"element_styles_display\";s:0:\"\";s:20:\"element_styles_float\";s:0:\"\";s:32:\"element_styles_show_advanced_css\";s:1:\"0\";s:23:\"element_styles_advanced\";s:0:\"\";s:44:\"submit_element_hover_styles_background-color\";s:0:\"\";s:34:\"submit_element_hover_styles_border\";s:0:\"\";s:40:\"submit_element_hover_styles_border-style\";s:0:\"\";s:40:\"submit_element_hover_styles_border-color\";s:0:\"\";s:33:\"submit_element_hover_styles_color\";s:0:\"\";s:34:\"submit_element_hover_styles_height\";s:0:\"\";s:33:\"submit_element_hover_styles_width\";s:0:\"\";s:37:\"submit_element_hover_styles_font-size\";s:0:\"\";s:34:\"submit_element_hover_styles_margin\";s:0:\"\";s:35:\"submit_element_hover_styles_padding\";s:0:\"\";s:35:\"submit_element_hover_styles_display\";s:0:\"\";s:33:\"submit_element_hover_styles_float\";s:0:\"\";s:45:\"submit_element_hover_styles_show_advanced_css\";s:1:\"0\";s:36:\"submit_element_hover_styles_advanced\";s:0:\"\";s:7:\"cellcid\";s:5:\"c3287\";}}}s:7:\"actions\";a:4:{i:0;a:2:{s:2:\"id\";i:1;s:8:\"settings\";a:25:{s:5:\"title\";s:0:\"\";s:3:\"key\";s:0:\"\";s:4:\"type\";s:4:\"save\";s:6:\"active\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:48\";s:5:\"label\";s:16:\"Store Submission\";s:10:\"objectType\";s:6:\"Action\";s:12:\"objectDomain\";s:7:\"actions\";s:10:\"editActive\";s:0:\"\";s:10:\"conditions\";a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}s:16:\"payment_gateways\";s:0:\"\";s:13:\"payment_total\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:2:\"to\";s:0:\"\";s:13:\"email_subject\";s:0:\"\";s:13:\"email_message\";s:0:\"\";s:9:\"from_name\";s:0:\"\";s:12:\"from_address\";s:0:\"\";s:8:\"reply_to\";s:0:\"\";s:12:\"email_format\";s:4:\"html\";s:2:\"cc\";s:0:\"\";s:3:\"bcc\";s:0:\"\";s:10:\"attach_csv\";s:0:\"\";s:12:\"redirect_url\";s:0:\"\";s:19:\"email_message_plain\";s:0:\"\";}}i:1;a:2:{s:2:\"id\";i:2;s:8:\"settings\";a:26:{s:5:\"title\";s:0:\"\";s:3:\"key\";s:0:\"\";s:4:\"type\";s:5:\"email\";s:6:\"active\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:49\";s:5:\"label\";s:18:\"Email Confirmation\";s:2:\"to\";s:13:\"{field:email}\";s:7:\"subject\";s:24:\"This is an email action.\";s:7:\"message\";s:19:\"Hello, Ninja Forms!\";s:10:\"objectType\";s:6:\"Action\";s:12:\"objectDomain\";s:7:\"actions\";s:10:\"editActive\";s:0:\"\";s:10:\"conditions\";a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:0:{}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}s:16:\"payment_gateways\";s:0:\"\";s:13:\"payment_total\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:13:\"email_subject\";s:24:\"Submission Confirmation \";s:13:\"email_message\";s:29:\"<p>{all_fields_table}<br></p>\";s:9:\"from_name\";s:0:\"\";s:12:\"from_address\";s:0:\"\";s:8:\"reply_to\";s:0:\"\";s:12:\"email_format\";s:4:\"html\";s:2:\"cc\";s:0:\"\";s:3:\"bcc\";s:0:\"\";s:10:\"attach_csv\";s:0:\"\";s:19:\"email_message_plain\";s:0:\"\";}}i:2;a:2:{s:2:\"id\";i:3;s:8:\"settings\";a:24:{s:5:\"title\";s:0:\"\";s:3:\"key\";s:0:\"\";s:4:\"type\";s:5:\"email\";s:6:\"active\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:50\";s:10:\"objectType\";s:6:\"Action\";s:12:\"objectDomain\";s:7:\"actions\";s:10:\"editActive\";s:0:\"\";s:5:\"label\";s:18:\"Email Notification\";s:10:\"conditions\";a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}s:16:\"payment_gateways\";s:0:\"\";s:13:\"payment_total\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:2:\"to\";s:20:\"{system:admin_email}\";s:13:\"email_subject\";s:29:\"New message from {field:name}\";s:13:\"email_message\";s:60:\"<p>{field:message}</p><p>-{field:name} ( {field:email} )</p>\";s:9:\"from_name\";s:0:\"\";s:12:\"from_address\";s:0:\"\";s:8:\"reply_to\";s:13:\"{field:email}\";s:12:\"email_format\";s:4:\"html\";s:2:\"cc\";s:0:\"\";s:3:\"bcc\";s:0:\"\";s:10:\"attach_csv\";s:1:\"0\";s:19:\"email_message_plain\";s:0:\"\";}}i:3;a:2:{s:2:\"id\";i:4;s:8:\"settings\";a:27:{s:5:\"title\";s:0:\"\";s:3:\"key\";s:0:\"\";s:4:\"type\";s:14:\"successmessage\";s:6:\"active\";s:1:\"1\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:52\";s:5:\"label\";s:15:\"Success Message\";s:7:\"message\";s:47:\"Thank you {field:name} for filling out my form!\";s:10:\"objectType\";s:6:\"Action\";s:12:\"objectDomain\";s:7:\"actions\";s:10:\"editActive\";s:0:\"\";s:10:\"conditions\";a:6:{s:9:\"collapsed\";s:0:\"\";s:7:\"process\";s:1:\"1\";s:9:\"connector\";s:3:\"all\";s:4:\"when\";a:1:{i:0;a:6:{s:9:\"connector\";s:3:\"AND\";s:3:\"key\";s:0:\"\";s:10:\"comparator\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"when\";}}s:4:\"then\";a:1:{i:0;a:5:{s:3:\"key\";s:0:\"\";s:7:\"trigger\";s:0:\"\";s:5:\"value\";s:0:\"\";s:4:\"type\";s:5:\"field\";s:9:\"modelType\";s:4:\"then\";}}s:4:\"else\";a:0:{}}s:16:\"payment_gateways\";s:0:\"\";s:13:\"payment_total\";s:0:\"\";s:3:\"tag\";s:0:\"\";s:2:\"to\";s:0:\"\";s:13:\"email_subject\";s:0:\"\";s:13:\"email_message\";s:0:\"\";s:9:\"from_name\";s:0:\"\";s:12:\"from_address\";s:0:\"\";s:8:\"reply_to\";s:0:\"\";s:12:\"email_format\";s:4:\"html\";s:2:\"cc\";s:0:\"\";s:3:\"bcc\";s:0:\"\";s:10:\"attach_csv\";s:0:\"\";s:12:\"redirect_url\";s:0:\"\";s:11:\"success_msg\";s:89:\"<p>Form submitted successfully.</p><p>A confirmation email was sent to {field:email}.</p>\";s:19:\"email_message_plain\";s:0:\"\";}}}s:8:\"settings\";a:99:{s:5:\"title\";s:10:\"Contact Me\";s:3:\"key\";s:0:\"\";s:10:\"created_at\";s:19:\"2017-11-14 10:33:42\";s:17:\"default_label_pos\";s:5:\"above\";s:10:\"conditions\";a:0:{}s:10:\"objectType\";s:12:\"Form Setting\";s:10:\"editActive\";s:0:\"\";s:10:\"show_title\";s:1:\"1\";s:14:\"clear_complete\";s:1:\"1\";s:13:\"hide_complete\";s:1:\"1\";s:13:\"wrapper_class\";s:0:\"\";s:13:\"element_class\";s:0:\"\";s:10:\"add_submit\";s:1:\"1\";s:9:\"logged_in\";s:0:\"\";s:17:\"not_logged_in_msg\";s:0:\"\";s:16:\"sub_limit_number\";s:0:\"\";s:13:\"sub_limit_msg\";s:0:\"\";s:12:\"calculations\";a:0:{}s:15:\"formContentData\";a:4:{i:0;a:2:{s:5:\"order\";s:1:\"0\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:4:\"name\";}s:5:\"width\";s:3:\"100\";}}}i:1;a:2:{s:5:\"order\";s:1:\"1\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:5:\"email\";}s:5:\"width\";s:3:\"100\";}}}i:2;a:2:{s:5:\"order\";s:1:\"2\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:7:\"message\";}s:5:\"width\";s:3:\"100\";}}}i:3;a:2:{s:5:\"order\";s:1:\"3\";s:5:\"cells\";a:1:{i:0;a:3:{s:5:\"order\";s:1:\"0\";s:6:\"fields\";a:1:{i:0;s:6:\"submit\";}s:5:\"width\";s:3:\"100\";}}}}s:33:\"container_styles_background-color\";s:0:\"\";s:23:\"container_styles_border\";s:0:\"\";s:29:\"container_styles_border-style\";s:0:\"\";s:29:\"container_styles_border-color\";s:0:\"\";s:22:\"container_styles_color\";s:0:\"\";s:23:\"container_styles_height\";s:0:\"\";s:22:\"container_styles_width\";s:0:\"\";s:26:\"container_styles_font-size\";s:0:\"\";s:23:\"container_styles_margin\";s:0:\"\";s:24:\"container_styles_padding\";s:0:\"\";s:24:\"container_styles_display\";s:0:\"\";s:22:\"container_styles_float\";s:0:\"\";s:34:\"container_styles_show_advanced_css\";s:1:\"0\";s:25:\"container_styles_advanced\";s:0:\"\";s:29:\"title_styles_background-color\";s:0:\"\";s:19:\"title_styles_border\";s:0:\"\";s:25:\"title_styles_border-style\";s:0:\"\";s:25:\"title_styles_border-color\";s:0:\"\";s:18:\"title_styles_color\";s:0:\"\";s:19:\"title_styles_height\";s:0:\"\";s:18:\"title_styles_width\";s:0:\"\";s:22:\"title_styles_font-size\";s:0:\"\";s:19:\"title_styles_margin\";s:0:\"\";s:20:\"title_styles_padding\";s:0:\"\";s:20:\"title_styles_display\";s:0:\"\";s:18:\"title_styles_float\";s:0:\"\";s:30:\"title_styles_show_advanced_css\";s:1:\"0\";s:21:\"title_styles_advanced\";s:0:\"\";s:27:\"row_styles_background-color\";s:0:\"\";s:17:\"row_styles_border\";s:0:\"\";s:23:\"row_styles_border-style\";s:0:\"\";s:23:\"row_styles_border-color\";s:0:\"\";s:16:\"row_styles_color\";s:0:\"\";s:17:\"row_styles_height\";s:0:\"\";s:16:\"row_styles_width\";s:0:\"\";s:20:\"row_styles_font-size\";s:0:\"\";s:17:\"row_styles_margin\";s:0:\"\";s:18:\"row_styles_padding\";s:0:\"\";s:18:\"row_styles_display\";s:0:\"\";s:28:\"row_styles_show_advanced_css\";s:1:\"0\";s:19:\"row_styles_advanced\";s:0:\"\";s:31:\"row-odd_styles_background-color\";s:0:\"\";s:21:\"row-odd_styles_border\";s:0:\"\";s:27:\"row-odd_styles_border-style\";s:0:\"\";s:27:\"row-odd_styles_border-color\";s:0:\"\";s:20:\"row-odd_styles_color\";s:0:\"\";s:21:\"row-odd_styles_height\";s:0:\"\";s:20:\"row-odd_styles_width\";s:0:\"\";s:24:\"row-odd_styles_font-size\";s:0:\"\";s:21:\"row-odd_styles_margin\";s:0:\"\";s:22:\"row-odd_styles_padding\";s:0:\"\";s:22:\"row-odd_styles_display\";s:0:\"\";s:32:\"row-odd_styles_show_advanced_css\";s:1:\"0\";s:23:\"row-odd_styles_advanced\";s:0:\"\";s:35:\"success-msg_styles_background-color\";s:0:\"\";s:25:\"success-msg_styles_border\";s:0:\"\";s:31:\"success-msg_styles_border-style\";s:0:\"\";s:31:\"success-msg_styles_border-color\";s:0:\"\";s:24:\"success-msg_styles_color\";s:0:\"\";s:25:\"success-msg_styles_height\";s:0:\"\";s:24:\"success-msg_styles_width\";s:0:\"\";s:28:\"success-msg_styles_font-size\";s:0:\"\";s:25:\"success-msg_styles_margin\";s:0:\"\";s:26:\"success-msg_styles_padding\";s:0:\"\";s:26:\"success-msg_styles_display\";s:0:\"\";s:36:\"success-msg_styles_show_advanced_css\";s:1:\"0\";s:27:\"success-msg_styles_advanced\";s:0:\"\";s:33:\"error_msg_styles_background-color\";s:0:\"\";s:23:\"error_msg_styles_border\";s:0:\"\";s:29:\"error_msg_styles_border-style\";s:0:\"\";s:29:\"error_msg_styles_border-color\";s:0:\"\";s:22:\"error_msg_styles_color\";s:0:\"\";s:23:\"error_msg_styles_height\";s:0:\"\";s:22:\"error_msg_styles_width\";s:0:\"\";s:26:\"error_msg_styles_font-size\";s:0:\"\";s:23:\"error_msg_styles_margin\";s:0:\"\";s:24:\"error_msg_styles_padding\";s:0:\"\";s:24:\"error_msg_styles_display\";s:0:\"\";s:34:\"error_msg_styles_show_advanced_css\";s:1:\"0\";s:25:\"error_msg_styles_advanced\";s:0:\"\";}}','yes'),(300,'widget_ninja_forms_widget','a:1:{s:12:\"_multiwidget\";i:1;}','yes'),(302,'if-menu-peak','1','yes'),(303,'_transient_timeout_external_ip_address_172.18.0.1','1511260491','no'),(304,'_transient_external_ip_address_172.18.0.1','91.126.28.57','no'),(305,'ai1wm_secret_key','CCPfaL9zfIIC','yes'),(306,'ninja_forms_optin_reported','1','yes'),(307,'_transient_wc_count_comments','O:8:\"stdClass\":7:{s:14:\"total_comments\";i:0;s:3:\"all\";i:0;s:9:\"moderated\";i:0;s:8:\"approved\";i:0;s:4:\"spam\";i:0;s:5:\"trash\";i:0;s:12:\"post-trashed\";i:0;}','yes'),(308,'nf_admin_notice','a:2:{s:16:\"one_week_support\";a:2:{s:5:\"start\";s:10:\"11/21/2017\";s:3:\"int\";i:7;}s:14:\"allow_tracking\";a:2:{s:5:\"start\";s:10:\"11/14/2017\";s:3:\"int\";i:0;}}','yes'),(314,'job_listing_type_children','a:0:{}','yes');
/*!40000 ALTER TABLE `wp_options` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_postmeta`
--

DROP TABLE IF EXISTS `wp_postmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_postmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `post_id` (`post_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_postmeta`
--

LOCK TABLES `wp_postmeta` WRITE;
/*!40000 ALTER TABLE `wp_postmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_postmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_posts`
--

DROP TABLE IF EXISTS `wp_posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_posts` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` bigint(20) unsigned NOT NULL DEFAULT '0',
  `post_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_date_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'publish',
  `comment_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `ping_status` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'open',
  `post_password` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `post_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `to_ping` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `pinged` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_modified` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_modified_gmt` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_content_filtered` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `post_parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `guid` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `menu_order` int(11) NOT NULL DEFAULT '0',
  `post_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT 'post',
  `post_mime_type` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `comment_count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`ID`),
  KEY `post_name` (`post_name`(191)),
  KEY `type_status_date` (`post_type`,`post_status`,`post_date`,`ID`),
  KEY `post_parent` (`post_parent`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_posts`
--

LOCK TABLES `wp_posts` WRITE;
/*!40000 ALTER TABLE `wp_posts` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_relationships`
--

DROP TABLE IF EXISTS `wp_term_relationships`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_relationships` (
  `object_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_taxonomy_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `term_order` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`object_id`,`term_taxonomy_id`),
  KEY `term_taxonomy_id` (`term_taxonomy_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_relationships`
--

LOCK TABLES `wp_term_relationships` WRITE;
/*!40000 ALTER TABLE `wp_term_relationships` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_term_relationships` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_term_taxonomy`
--

DROP TABLE IF EXISTS `wp_term_taxonomy`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_term_taxonomy` (
  `term_taxonomy_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `taxonomy` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `description` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `parent` bigint(20) unsigned NOT NULL DEFAULT '0',
  `count` bigint(20) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_taxonomy_id`),
  UNIQUE KEY `term_id_taxonomy` (`term_id`,`taxonomy`),
  KEY `taxonomy` (`taxonomy`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_term_taxonomy`
--

LOCK TABLES `wp_term_taxonomy` WRITE;
/*!40000 ALTER TABLE `wp_term_taxonomy` DISABLE KEYS */;
INSERT INTO `wp_term_taxonomy` VALUES (1,1,'category','',0,0),(2,2,'job_listing_type','',0,0),(3,3,'job_listing_type','',0,0),(4,4,'job_listing_type','',0,0),(5,5,'job_listing_type','',0,0),(6,6,'job_listing_type','',0,0),(7,7,'product_type','',0,0),(8,8,'product_type','',0,0),(9,9,'product_type','',0,0),(10,10,'product_type','',0,0),(11,11,'product_visibility','',0,0),(12,12,'product_visibility','',0,0),(13,13,'product_visibility','',0,0),(14,14,'product_visibility','',0,0),(15,15,'product_visibility','',0,0),(16,16,'product_visibility','',0,0),(17,17,'product_visibility','',0,0),(18,18,'product_visibility','',0,0),(19,19,'product_visibility','',0,0);
/*!40000 ALTER TABLE `wp_term_taxonomy` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_termmeta`
--

DROP TABLE IF EXISTS `wp_termmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_termmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `term_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `term_id` (`term_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_termmeta`
--

LOCK TABLES `wp_termmeta` WRITE;
/*!40000 ALTER TABLE `wp_termmeta` DISABLE KEYS */;
INSERT INTO `wp_termmeta` VALUES (1,2,'employment_type','FULL_TIME'),(2,3,'employment_type','PART_TIME'),(3,4,'employment_type','TEMPORARY'),(4,5,'employment_type','CONTRACTOR'),(5,6,'employment_type','INTERN');
/*!40000 ALTER TABLE `wp_termmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_terms`
--

DROP TABLE IF EXISTS `wp_terms`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_terms` (
  `term_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `slug` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `term_group` bigint(10) NOT NULL DEFAULT '0',
  PRIMARY KEY (`term_id`),
  KEY `slug` (`slug`(191)),
  KEY `name` (`name`(191))
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_terms`
--

LOCK TABLES `wp_terms` WRITE;
/*!40000 ALTER TABLE `wp_terms` DISABLE KEYS */;
INSERT INTO `wp_terms` VALUES (1,'Uncategorized','uncategorized',0),(2,'Jornada completa','full-time',0),(3,'Media jornada','part-time',0),(4,'Temporal','temporary',0),(5,'Por cuenta propia','freelance',0),(6,'Internado','internship',0),(7,'simple','simple',0),(8,'grouped','grouped',0),(9,'variable','variable',0),(10,'external','external',0),(11,'exclude-from-search','exclude-from-search',0),(12,'exclude-from-catalog','exclude-from-catalog',0),(13,'featured','featured',0),(14,'outofstock','outofstock',0),(15,'rated-1','rated-1',0),(16,'rated-2','rated-2',0),(17,'rated-3','rated-3',0),(18,'rated-4','rated-4',0),(19,'rated-5','rated-5',0);
/*!40000 ALTER TABLE `wp_terms` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_usermeta`
--

DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_usermeta`
--

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','admin'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'comment_shortcuts','false'),(7,1,'admin_color','fresh'),(8,1,'use_ssl','0'),(9,1,'show_admin_bar_front','true'),(10,1,'locale',''),(11,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(12,1,'wp_user_level','10'),(13,1,'dismissed_wp_pointers',''),(14,1,'show_welcome_panel','1'),(15,1,'session_tokens','a:1:{s:64:\"b4d0f2ecc6f47b9aeb57a6246a69a7525420948e40670f78f070e57da3440973\";a:4:{s:10:\"expiration\";i:1510828392;s:2:\"ip\";s:10:\"172.18.0.1\";s:2:\"ua\";s:76:\"Mozilla/5.0 (X11; Ubuntu; Linux x86_64; rv:56.0) Gecko/20100101 Firefox/56.0\";s:5:\"login\";i:1510655592;}}'),(16,1,'_woocommerce_persistent_cart_1','a:1:{s:4:\"cart\";a:0:{}}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_users`
--

DROP TABLE IF EXISTS `wp_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_users` (
  `ID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_login` varchar(60) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_pass` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_nicename` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_url` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_registered` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `user_activation_key` varchar(255) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `user_status` int(11) NOT NULL DEFAULT '0',
  `display_name` varchar(250) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`ID`),
  KEY `user_login_key` (`user_login`),
  KEY `user_nicename` (`user_nicename`),
  KEY `user_email` (`user_email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_users`
--

LOCK TABLES `wp_users` WRITE;
/*!40000 ALTER TABLE `wp_users` DISABLE KEYS */;
INSERT INTO `wp_users` VALUES (1,'admin','$P$BOFlZ0.6UMNFczivV0Oc8uGx1hmGLm/','admin','xavi.hidalgo.fernandez@gmail.com','','2017-11-14 10:33:03','',0,'admin');
/*!40000 ALTER TABLE `wp_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_api_keys`
--

DROP TABLE IF EXISTS `wp_woocommerce_api_keys`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_api_keys` (
  `key_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `permissions` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `consumer_key` char(64) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `consumer_secret` char(43) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `nonces` longtext COLLATE utf8mb4_unicode_520_ci,
  `truncated_key` char(7) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `last_access` datetime DEFAULT NULL,
  PRIMARY KEY (`key_id`),
  KEY `consumer_key` (`consumer_key`),
  KEY `consumer_secret` (`consumer_secret`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_api_keys`
--

LOCK TABLES `wp_woocommerce_api_keys` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_api_keys` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_api_keys` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_attribute_taxonomies`
--

DROP TABLE IF EXISTS `wp_woocommerce_attribute_taxonomies`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_attribute_taxonomies` (
  `attribute_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `attribute_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attribute_label` varchar(200) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `attribute_type` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attribute_orderby` varchar(20) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `attribute_public` int(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`attribute_id`),
  KEY `attribute_name` (`attribute_name`(20))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_attribute_taxonomies`
--

LOCK TABLES `wp_woocommerce_attribute_taxonomies` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_attribute_taxonomies` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_attribute_taxonomies` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_downloadable_product_permissions`
--

DROP TABLE IF EXISTS `wp_woocommerce_downloadable_product_permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_downloadable_product_permissions` (
  `permission_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `download_id` varchar(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `product_id` bigint(20) unsigned NOT NULL,
  `order_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `order_key` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_email` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `downloads_remaining` varchar(9) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `access_granted` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `access_expires` datetime DEFAULT NULL,
  `download_count` bigint(20) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`permission_id`),
  KEY `download_order_key_product` (`product_id`,`order_id`,`order_key`(16),`download_id`),
  KEY `download_order_product` (`download_id`,`order_id`,`product_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_downloadable_product_permissions`
--

LOCK TABLES `wp_woocommerce_downloadable_product_permissions` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_downloadable_product_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_downloadable_product_permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_log`
--

DROP TABLE IF EXISTS `wp_woocommerce_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_log` (
  `log_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `timestamp` datetime NOT NULL,
  `level` smallint(4) NOT NULL,
  `source` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `message` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `context` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`log_id`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_log`
--

LOCK TABLES `wp_woocommerce_log` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_order_itemmeta`
--

DROP TABLE IF EXISTS `wp_woocommerce_order_itemmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_order_itemmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_item_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `order_item_id` (`order_item_id`),
  KEY `meta_key` (`meta_key`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_order_itemmeta`
--

LOCK TABLES `wp_woocommerce_order_itemmeta` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_order_itemmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_order_itemmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_order_items`
--

DROP TABLE IF EXISTS `wp_woocommerce_order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_order_items` (
  `order_item_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `order_item_name` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `order_item_type` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `order_id` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`order_item_id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_order_items`
--

LOCK TABLES `wp_woocommerce_order_items` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_order_items` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_payment_tokenmeta`
--

DROP TABLE IF EXISTS `wp_woocommerce_payment_tokenmeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_payment_tokenmeta` (
  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `payment_token_id` bigint(20) unsigned NOT NULL,
  `meta_key` varchar(255) COLLATE utf8mb4_unicode_520_ci DEFAULT NULL,
  `meta_value` longtext COLLATE utf8mb4_unicode_520_ci,
  PRIMARY KEY (`meta_id`),
  KEY `payment_token_id` (`payment_token_id`),
  KEY `meta_key` (`meta_key`(32))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_payment_tokenmeta`
--

LOCK TABLES `wp_woocommerce_payment_tokenmeta` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_payment_tokenmeta` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_payment_tokenmeta` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_payment_tokens`
--

DROP TABLE IF EXISTS `wp_woocommerce_payment_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_payment_tokens` (
  `token_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `gateway_id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `token` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `type` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `is_default` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`token_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_payment_tokens`
--

LOCK TABLES `wp_woocommerce_payment_tokens` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_payment_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_payment_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_sessions`
--

DROP TABLE IF EXISTS `wp_woocommerce_sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_sessions` (
  `session_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `session_key` char(32) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `session_value` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `session_expiry` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`session_key`),
  UNIQUE KEY `session_id` (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_sessions`
--

LOCK TABLES `wp_woocommerce_sessions` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_sessions` DISABLE KEYS */;
INSERT INTO `wp_woocommerce_sessions` VALUES (1,'2','a:7:{s:4:\"cart\";s:6:\"a:0:{}\";s:11:\"cart_totals\";s:367:\"a:15:{s:8:\"subtotal\";i:0;s:12:\"subtotal_tax\";i:0;s:14:\"shipping_total\";i:0;s:12:\"shipping_tax\";i:0;s:14:\"shipping_taxes\";a:0:{}s:14:\"discount_total\";i:0;s:12:\"discount_tax\";i:0;s:19:\"cart_contents_total\";i:0;s:17:\"cart_contents_tax\";i:0;s:19:\"cart_contents_taxes\";a:0:{}s:9:\"fee_total\";i:0;s:7:\"fee_tax\";i:0;s:9:\"fee_taxes\";a:0:{}s:5:\"total\";i:0;s:9:\"total_tax\";i:0;}\";s:15:\"applied_coupons\";s:6:\"a:0:{}\";s:22:\"coupon_discount_totals\";s:6:\"a:0:{}\";s:26:\"coupon_discount_tax_totals\";s:6:\"a:0:{}\";s:21:\"removed_cart_contents\";s:6:\"a:0:{}\";s:8:\"customer\";s:682:\"a:25:{s:2:\"id\";i:1;s:8:\"postcode\";s:0:\"\";s:4:\"city\";s:0:\"\";s:9:\"address_1\";s:0:\"\";s:7:\"address\";s:0:\"\";s:9:\"address_2\";s:0:\"\";s:5:\"state\";s:0:\"\";s:7:\"country\";s:2:\"GB\";s:17:\"shipping_postcode\";s:0:\"\";s:13:\"shipping_city\";s:0:\"\";s:18:\"shipping_address_1\";s:0:\"\";s:16:\"shipping_address\";s:0:\"\";s:18:\"shipping_address_2\";s:0:\"\";s:14:\"shipping_state\";s:0:\"\";s:16:\"shipping_country\";s:2:\"GB\";s:13:\"is_vat_exempt\";b:0;s:19:\"calculated_shipping\";b:0;s:10:\"first_name\";s:0:\"\";s:9:\"last_name\";s:0:\"\";s:7:\"company\";s:0:\"\";s:5:\"phone\";s:0:\"\";s:5:\"email\";s:32:\"xavi.hidalgo.fernandez@gmail.com\";s:19:\"shipping_first_name\";s:0:\"\";s:18:\"shipping_last_name\";s:0:\"\";s:16:\"shipping_company\";s:0:\"\";}\";}',1510826489);
/*!40000 ALTER TABLE `wp_woocommerce_sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_shipping_zone_locations`
--

DROP TABLE IF EXISTS `wp_woocommerce_shipping_zone_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_shipping_zone_locations` (
  `location_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `zone_id` bigint(20) unsigned NOT NULL,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `location_id` (`location_id`),
  KEY `location_type_code` (`location_type`(10),`location_code`(20))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_shipping_zone_locations`
--

LOCK TABLES `wp_woocommerce_shipping_zone_locations` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_shipping_zone_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_shipping_zone_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_shipping_zone_methods`
--

DROP TABLE IF EXISTS `wp_woocommerce_shipping_zone_methods`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_shipping_zone_methods` (
  `zone_id` bigint(20) unsigned NOT NULL,
  `instance_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `method_id` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `method_order` bigint(20) unsigned NOT NULL,
  `is_enabled` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`instance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_shipping_zone_methods`
--

LOCK TABLES `wp_woocommerce_shipping_zone_methods` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_shipping_zone_methods` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_shipping_zone_methods` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_shipping_zones`
--

DROP TABLE IF EXISTS `wp_woocommerce_shipping_zones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_shipping_zones` (
  `zone_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `zone_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `zone_order` bigint(20) unsigned NOT NULL,
  PRIMARY KEY (`zone_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_shipping_zones`
--

LOCK TABLES `wp_woocommerce_shipping_zones` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_shipping_zones` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_shipping_zones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_tax_rate_locations`
--

DROP TABLE IF EXISTS `wp_woocommerce_tax_rate_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_tax_rate_locations` (
  `location_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `location_code` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tax_rate_id` bigint(20) unsigned NOT NULL,
  `location_type` varchar(40) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`location_id`),
  KEY `tax_rate_id` (`tax_rate_id`),
  KEY `location_type_code` (`location_type`(10),`location_code`(20))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_tax_rate_locations`
--

LOCK TABLES `wp_woocommerce_tax_rate_locations` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_tax_rate_locations` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_tax_rate_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `wp_woocommerce_tax_rates`
--

DROP TABLE IF EXISTS `wp_woocommerce_tax_rates`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_woocommerce_tax_rates` (
  `tax_rate_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tax_rate_country` varchar(2) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate_state` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate` varchar(8) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate_name` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  `tax_rate_priority` bigint(20) unsigned NOT NULL,
  `tax_rate_compound` int(1) NOT NULL DEFAULT '0',
  `tax_rate_shipping` int(1) NOT NULL DEFAULT '1',
  `tax_rate_order` bigint(20) unsigned NOT NULL,
  `tax_rate_class` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`tax_rate_id`),
  KEY `tax_rate_country` (`tax_rate_country`),
  KEY `tax_rate_state` (`tax_rate_state`(2)),
  KEY `tax_rate_class` (`tax_rate_class`(10)),
  KEY `tax_rate_priority` (`tax_rate_priority`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `wp_woocommerce_tax_rates`
--

LOCK TABLES `wp_woocommerce_tax_rates` WRITE;
/*!40000 ALTER TABLE `wp_woocommerce_tax_rates` DISABLE KEYS */;
/*!40000 ALTER TABLE `wp_woocommerce_tax_rates` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-11-14 10:41:25
