-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for stack_fitbird
CREATE DATABASE IF NOT EXISTS `stack_fitbird` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `stack_fitbird`;

-- Dumping structure for table stack_fitbird.customer_nutrition
CREATE TABLE IF NOT EXISTS `customer_nutrition` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` bigint(20) unsigned DEFAULT NULL,
  `nutrition_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `customer_nutrition_customer_id_foreign` (`customer_id`),
  KEY `customer_nutrition_nutrition_id_foreign` (`nutrition_id`),
  CONSTRAINT `customer_nutrition_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE CASCADE,
  CONSTRAINT `customer_nutrition_nutrition_id_foreign` FOREIGN KEY (`nutrition_id`) REFERENCES `nutrition` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.customer_nutrition: ~0 rows (approximately)
/*!40000 ALTER TABLE `customer_nutrition` DISABLE KEYS */;
INSERT IGNORE INTO `customer_nutrition` (`id`, `customer_id`, `nutrition_id`, `created_at`, `updated_at`) VALUES
	(1, 159, 1, '2023-03-19 11:24:46', '2023-03-19 11:24:47');
/*!40000 ALTER TABLE `customer_nutrition` ENABLE KEYS */;

-- Dumping structure for table stack_fitbird.nutrition
CREATE TABLE IF NOT EXISTS `nutrition` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table stack_fitbird.nutrition: ~0 rows (approximately)
/*!40000 ALTER TABLE `nutrition` DISABLE KEYS */;
INSERT IGNORE INTO `nutrition` (`id`, `title`, `data`, `created_at`, `updated_at`) VALUES
	(1, 'Lose Weight', '<h1>Hello</h1>', '2023-03-19 11:24:30', '2023-03-19 11:24:31');
/*!40000 ALTER TABLE `nutrition` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
