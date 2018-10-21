# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 192.168.10.10 (MySQL 5.7.17-0ubuntu0.16.04.1)
# Database: scorecard
# Generation Time: 2018-10-20 23:51:14 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table courses
# ------------------------------------------------------------

DROP TABLE IF EXISTS `courses`;

CREATE TABLE `courses` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `holes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(18) COLLATE utf8mb4_unicode_ci NOT NULL,
  `website` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

LOCK TABLES `courses` WRITE;
/*!40000 ALTER TABLE `courses` DISABLE KEYS */;

INSERT INTO `courses` (`id`, `name`, `holes`, `address`, `phone_number`, `postal_code`, `website`, `email`, `price`, `country`, `state`, `city`, `created_at`, `updated_at`)
VALUES
	(1,'Hillside Golf Club','18','43433 hill st.','3129447345','60631',NULL,'hillside@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),
	(2,'BIlly Claldwell','9','3213 Caldwell rd.','8902137434','90324',NULL,'billy@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),
	(3,'Pebble Beach','18','543 Pebble Dr','7901231234','90001',NULL,'pebble@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),
	(4,'Robert Black','9','432 N. Pratt','3213321332','12389',NULL,'rblack@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL),
	(5,'SunnySide','18','4432 S. Sunnyside','1238945643','54568',NULL,'sunnyside@gmail.com',NULL,NULL,NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `courses` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
